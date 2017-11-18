<template>
    <div class="row">
        <div class="col-md-6" id="map" style=" height:500px;"></div>
        <div class="card col-md-6">
            <div class="card-body">
                <div id="panel" style="height:auto;"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                bubble:false,
                ui:null,
                behaviour:null,
                map:null,
                waypoint0: '6.44353,3.47514', // Fernsehturm
                waypoint1: '6.57015,3.32143',
            }
        },
        mounted: function () {
            this.init();
        },
        computed: {
            mapContainer: function () {
                return document.getElementById('map');
            },
            routeInstructionsContainer: function () {
                return document.getElementById('panel');
            },
            platform: function () {
                return new H.service.Platform({
                    'app_id': 'njPCpjldWLDokbhA74cX',
                    'app_code': 'RkttCWFr-QDBsBAcPDO9AQ',
                    useCIT: true,
                    //useHTTPS: true
                });
            }
        },
         methods: {
                calculateRouteFromAtoB (platform) {
                    var router = platform.getRoutingService(),
                        routeRequestParams = {
                            mode: 'fastest;car;traffic:enabled',
                            representation: 'display',
                            waypoint0: this.waypoint0, // Fernsehturm
                            waypoint1: this.waypoint1,  // Kurfürstendamm
                            routeattributes: 'waypoints,summary,shape,legs',
                            maneuverattributes: 'direction,action'
                        };
                    router.calculateRoute(
                        routeRequestParams,
                        this.onSuccess,
                        this.onError
                    );
                },
                onSuccess(result) {
                    var route = result.response.route[0];
                    this.addRouteShapeToMap(route);
                    this.addManueversToMap(route);
                    this.addWaypointsToPanel(route.waypoint);
                    this.addManueversToPanel(route);
                    this.addSummaryToPanel(route.summary);
                    // ... etc.
                },
                onError(error) {
                    alert('Ooops!');
                },
                init(){
                    var mapContainer = this.mapContainer;
                    var routeInstructionsContainer = this.routeInstructionsContainer;
                    //Step 1: initialize communication with the platform

                    var platform = this.platform;
                    var defaultLayers = platform.createDefaultLayers();

                    //Step 2: initialize a map - this map is centered over Berlin
                    var map = new H.Map(mapContainer, defaultLayers.normal.map, {
                            center: {lat: 6.5244, lng: 3.3792},
                            zoom: 13
                        });
                    this.map =map;

                    var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
                    this.behaviour =behavior;
                    // Create the default UI components
                    var ui = H.ui.UI.createDefault(map, defaultLayers);
                    this.ui =ui;
                    this.calculateRouteFromAtoB (platform);

                },
                openBubble(position, text) {
                    if (!this.bubble) {
                        this.bubble = new H.ui.InfoBubble(
                            position,
                            // The FO property holds the province name.
                            {content: text});
                        this.ui.addBubble(bubble);
                    } else {
                        this.bubble.setPosition(position);
                        this.bubble.setContent(text);
                        this.bubble.open();
                    }
                },

                addRouteShapeToMap(route) {
                    var lineString = new H.geo.LineString(),
                        routeShape = route.shape,
                        polyline;

                    routeShape.forEach(function (point) {
                        var parts = point.split(',');
                        lineString.pushLatLngAlt(parts[0], parts[1]);
                    });

                    polyline = new H.map.Polyline(lineString, {
                        style: {
                            lineWidth: 4,
                            strokeColor: 'rgba(0, 128, 255, 0.7)'
                        }
                    });
                    // Add the polyline to the map
                   this.map.addObject(polyline);
                    // And zoom to its bounding rectangle
                    this.map.setViewBounds(polyline.getBounds(), true);
                },

                addManueversToMap(route) {
                    var svgMarkup = '<svg width="18" height="18" ' +
                            'xmlns="http://www.w3.org/2000/svg">' +
                            '<circle cx="8" cy="8" r="8" ' +
                            'fill="#1b468d" stroke="white" stroke-width="1"  />' +
                            '</svg>',
                        dotIcon = new H.map.Icon(svgMarkup, {anchor: {x: 8, y: 8}}),
                        group = new H.map.Group(),
                        i,
                        j;

                    // Add a marker for each maneuver
                    var maneuver;
                    for (i = 0; i < route.leg.length; i += 1) {
                        for (j = 0; j < route.leg[i].maneuver.length; j += 1) {
                            // Get the next maneuver.
                             maneuver = route.leg[i].maneuver[j];
                            // Add a marker to the maneuvers group
                            var marker = new H.map.Marker({
                                    lat: maneuver.position.latitude,
                                    lng: maneuver.position.longitude
                                },
                                {icon: dotIcon});
                            marker.instruction = maneuver.instruction;
                            group.addObject(marker);
                        }
                    }

                    group.addEventListener('tap', function (evt) {
                        this.map.setCenter(evt.target.getPosition());
                        this.openBubble(
                            evt.target.getPosition(), evt.target.instruction);
                    }, false);

                    // Add the maneuvers group to the map
                    this.map.addObject(group);
                },

                addWaypointsToPanel(waypoints) {


                    var nodeH3 = document.createElement('h5'),
                        waypointLabels = [],
                        i;
                    for (i = 0; i < waypoints.length; i += 1) {
                        waypointLabels.push(waypoints[i].label)
                    }

                    nodeH3.textContent = waypointLabels.join(' - ');

                    this.routeInstructionsContainer.innerHTML = '';
                    this.routeInstructionsContainer.appendChild(nodeH3);
                },

                addSummaryToPanel(summary) {
                    var summaryDiv = document.createElement('div'),
                        content = '';
                    content += '<b>Total distance</b>: ' + summary.distance + 'm. <br/>';
                    content += '<b>Travel Time</b>: ' + this.toMMSS(summary.travelTime) + ' (in current traffic)';


                    summaryDiv.style.fontSize = 'small';
                    summaryDiv.style.marginLeft = '5%';
                    summaryDiv.style.marginRight = '5%';
                    summaryDiv.innerHTML = content;
                    this.routeInstructionsContainer.appendChild(summaryDiv);
                },

             toMMSS (time) {
                return  Math.floor(time / 60)  +' minutes '+ (time % 60)  + ' seconds.';
                },
                addManueversToPanel(route) {


                    var nodeOL = document.createElement('ol'),
                        i,
                        j;

                    nodeOL.style.fontSize = 'small';
                    nodeOL.style.marginLeft = '5%';
                    nodeOL.style.marginRight = '5%';
                    nodeOL.className = 'directions';

                    // Add a marker for each maneuver
                    var maneuver;
                    for (i = 0; i < route.leg.length; i += 1) {
                        for (j = 0; j < route.leg[i].maneuver.length; j += 1) {
                            // Get the next maneuver.
                            maneuver = route.leg[i].maneuver[j];

                            var li = document.createElement('li'),
                                spanArrow = document.createElement('span'),
                                spanInstruction = document.createElement('span');

                            spanArrow.className = 'arrow ' + maneuver.action;
                            spanInstruction.innerHTML = maneuver.instruction;
                            li.appendChild(spanArrow);
                            li.appendChild(spanInstruction);

                            nodeOL.appendChild(li);
                        }
                    }

                    this.routeInstructionsContainer.appendChild(nodeOL);
                },


            }
        }
</script>
<style>
    .directions li span.arrow {
        display: inline-block;
        min-width: 28px;
        min-height: 28px;
        background-position: 0px;
        background-image: url("../../img/arrows.png");
        position: relative;
        top: 8px;
    }

    .directions li span.depart {
        background-position: -28px;
    }

    .directions li span.rightUTurn {
        background-position: -56px;
    }

    .directions li span.leftUTurn {
        background-position: -84px;
    }

    .directions li span.rightFork {
        background-position: -112px;
    }

    .directions li span.leftFork {
        background-position: -140px;
    }

    .directions li span.rightMerge {
        background-position: -112px;
    }

    .directions li span.leftMerge {
        background-position: -140px;
    }

    .directions li span.slightRightTurn {
        background-position: -168px;
    }

    .directions li span.slightLeftTurn {
        background-position: -196px;
    }

    .directions li span.rightTurn {
        background-position: -224px;
    }

    .directions li span.leftTurn {
        background-position: -252px;
    }

    .directions li span.sharpRightTurn {
        background-position: -280px;
    }

    .directions li span.sharpLeftTurn {
        background-position: -308px;
    }

    .directions li span.rightRoundaboutExit1 {
        background-position: -616px;
    }

    .directions li span.rightRoundaboutExit2 {
        background-position: -644px;
    }

    .directions li span.rightRoundaboutExit3 {
        background-position: -672px;
    }

    .directions li span.rightRoundaboutExit4 {
        background-position: -700px;
    }

    .directions li span.rightRoundaboutPass {
        background-position: -700px;
    }

    .directions li span.rightRoundaboutExit5 {
        background-position: -728px;
    }

    .directions li span.rightRoundaboutExit6 {
        background-position: -756px;
    }

    .directions li span.rightRoundaboutExit7 {
        background-position: -784px;
    }

    .directions li span.rightRoundaboutExit8 {
        background-position: -812px;
    }

    .directions li span.rightRoundaboutExit9 {
        background-position: -840px;
    }

    .directions li span.rightRoundaboutExit10 {
        background-position: -868px;
    }

    .directions li span.rightRoundaboutExit11 {
        background-position: 896px;
    }

    .directions li span.rightRoundaboutExit12 {
        background-position: 924px;
    }

    .directions li span.leftRoundaboutExit1 {
        background-position: -952px;
    }

    .directions li span.leftRoundaboutExit2 {
        background-position: -980px;
    }

    .directions li span.leftRoundaboutExit3 {
        background-position: -1008px;
    }

    .directions li span.leftRoundaboutExit4 {
        background-position: -1036px;
    }

    .directions li span.leftRoundaboutPass {
        background-position: 1036px;
    }

    .directions li span.leftRoundaboutExit5 {
        background-position: -1064px;
    }

    .directions li span.leftRoundaboutExit6 {
        background-position: -1092px;
    }

    .directions li span.leftRoundaboutExit7 {
        background-position: -1120px;
    }

    .directions li span.leftRoundaboutExit8 {
        background-position: -1148px;
    }

    .directions li span.leftRoundaboutExit9 {
        background-position: -1176px;
    }

    .directions li span.leftRoundaboutExit10 {
        background-position: -1204px;
    }

    .directions li span.leftRoundaboutExit11 {
        background-position: -1232px;
    }

    .directions li span.leftRoundaboutExit12 {
        background-position: -1260px;
    }

    .directions li span.arrive {
        background-position: -1288px;
    }

    .directions li span.leftRamp {
        background-position: -392px;
    }

    .directions li span.rightRamp {
        background-position: -420px;
    }

    .directions li span.leftExit {
        background-position: -448px;
    }

    .directions li span.rightExit {
        background-position: -476px;
    }

    .directions li span.ferry {
        background-position: -1316px;
    }

    .directions li span.enter {
        background-position: -1516px;
    }

    .directions li span.leave {
        background-position: -1540px;
    }
</style>

