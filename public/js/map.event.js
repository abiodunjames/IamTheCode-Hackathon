H.util.eval("var Bl={};function Cl(a){var b=a.ownerDocument,b=b.documentElement||b.body.parentNode||b.body,c;try{c=a.getBoundingClientRect()}catch(d){c={top:0,right:0,bottom:0,left:0,height:0,width:0}}return{x:c.left+(\"number\"===typeof window.pageXOffset?window.pageXOffset:b.scrollLeft),y:c.top+(\"number\"===typeof window.pageYOffset?window.pageYOffset:b.scrollTop)}}var Dl=/Edge\\/\\d+/.test(navigator.appVersion),El=Function(\"return this\")();function Fl(a,b,c,d,e,f,g){Fl.u.constructor.call(this,a);this.pointers=b;this.changedPointers=c;this.targetPointers=d;this.currentPointer=e;this.originalEvent=g;this.target=f}v(Fl,Bc);r(\"H.mapevents.Event\",Fl);function Gl(a,b,c,d,e,f){if(isNaN(a))throw Error(\"x needs to be a number\");if(isNaN(b))throw Error(\"y needs to be a number\");if(isNaN(c))throw Error(\"pointer must have an id\");this.viewportX=a;this.viewportY=b;this.target=null;this.id=c;this.type=d;this.dragTarget=null;this.a=this.button=Ta(e)?e:-1;this.buttons=Ta(f)?f:0}r(\"H.mapevents.Pointer\",Gl);\nfunction Hl(a,b,c){if(isNaN(b))throw Error(\"x needs to be a number\");if(isNaN(c))throw Error(\"y needs to be a number\");a.viewportX=b;a.viewportY=c}Gl.prototype.c=function(){return this.a};Gl.prototype.getLastChangedButton=Gl.prototype.c;function Il(a,b){a.a=b;a.buttons|=Gl.prototype.b[+b]||0}function Jl(a,b){a.a=b;a.buttons&=~(Gl.prototype.b[+b]||0)}Gl.prototype.b=[1,4,2];var Kl={NONE:-1,LEFT:0,MIDDLE:1,RIGHT:2};Gl.Button=Kl;function Ll(a){this.a=a instanceof Array?a.slice(0):[]}p=Ll.prototype;p.clear=function(){this.a.splice(0,this.a.length)};p.length=function(){return this.a.length};p.indexOf=function(a){for(var b=this.a.length;b--;)if(this.a[b].id===a)return b;return-1};function Ml(a,b){var c=a.indexOf(b);return-1!==c?a.a[c]:null}p.remove=function(a){a=this.indexOf(a);return-1!==a?this.a.splice(a,1)[0]:null};function Nl(a,b){for(var c=a.a.length,d=[];c--;)a.a[c].type!==b&&d.push(a.a[c]);a.a=d}\nfunction Ol(a,b){for(var c=a.a.length;c--;)if(a.a[c].dragTarget===b)return!0;return!1}p.push=function(a){if(a instanceof Gl)return this.a.push(a);throw Error(\"list needs a pointer\");};p.clone=function(){return new Ll(this.a)};function Pl(a,b,c){c=c||{};if(!(a instanceof Q))throw Error(\"events: map instance required\");if(!(b instanceof Array))throw Error(\"events: map array required\");xc.call(this);this.C=c.Vi||300;this.P=c.Ui||50;this.O=c.Yi||50;this.U=c.Zi||500;this.N=c.Xi||900;this.T=c.Wi||50;this.map=a;this.j=this.map.va;this.l=this.j.element;this.A=b;this.a=new Ll;this.c=new Ll;this.i={};this.f=null;this.s=!0;this.v={};this.o={};this.m=null;this.Wc=z(this.Wc,this);this.I={pointerdown:this.Ph,pointermove:this.Qh,pointerup:this.Rh,\npointercancel:this.Oh};Ql(this)}v(Pl,xc);function Ql(a,b){for(var c,d,e=0,f=a.A.length,e=0;e<f;e++)d=a.A[e],c=d.listener,\"function\"===typeof c&&(b?(d.target||a.l).removeEventListener(d.La,c):(d.target||a.l).addEventListener(d.La,c))}\nfunction Rl(a,b,c){var d,e=a.I[b],f,g;if(\"function\"===typeof e)for(\"pointermove\"!==b&&(a.s=!0),f=0,g=a.c.length();f<g;f++)b=a.c.a[f],a.l.contains(c.target)?(d=a,d=d.f===b?b.target:0<=b.viewportX&&b.viewportX<d.j.width&&0<=b.viewportY&&b.viewportY<d.j.height?d.map.s(b.viewportX,b.viewportY)||d.map:null):d=null,Sl(b.id,a.v),e.call(a,b,d,c);a.c.clear()}p=Pl.prototype;\np.Rh=function(a,b,c){a.target=b;Tl(this,a,c);Ul(this,b,\"pointerup\",c,a);\"mouse\"!==a.type&&Ul(this,b,\"pointerleave\",c,a);b=this.i[a.id];var d={x:a.viewportX,y:a.viewportY},e=c.timeStamp,f=a.target,g=this.m;b&&b.target===f&&b.ue.distance(d)<this.O&&e-b.Ef<this.U?(Ul(this,f,\"tap\",c,a),g&&g.target===f&&e-g.Ef<this.C?g.ue.distance({x:a.viewportX,y:a.viewportY})<this.P&&(Ul(this,f,\"dbltap\",c,a),this.m=null):this.m={target:f,ue:new M(a.viewportX,a.viewportY),Ef:c.timeStamp}):this.m=null;this.i={};Sl(a.id,\nthis.o)};function Tl(a,b,c){b===a.f&&(Ul(a,b.dragTarget,\"dragend\",c,b),a.f=null,Sl(b.id,a.v));b.dragTarget=null}p.Wc=function(a,b){var c=this;Ul(this,a.dragTarget,\"drag\",b,a);Sl(a.id,this.v);this.v[a.id]=setTimeout(function(){c.Wc(a,b)},150)};function Sl(a,b){b[a]&&(clearTimeout(b[a]),delete b[a])}\nfunction Vl(a,b,c){var d=b.target,e=new M(b.viewportX,b.viewportY),f=b.id;Sl(f,a.o);a.o[f]=setTimeout(function(){d&&d===b.target&&e.distance({x:b.viewportX,y:b.viewportY})<a.T&&(Ul(a,d,\"longpress\",c,b),delete a.i[b.id])},a.N)}\np.Qh=function(a,b,c){var d=a.dragTarget,e=a.id,f;f=a.target;a.target=b;f!==b&&(Ul(this,f,\"pointerleave\",c,a),Ul(this,b,\"pointerenter\",c,a));d?this.f?this.Wc(a,c):this.s?this.s=!1:(this.f=a,Ul(this,d,\"dragstart\",c,a),this.Wc(a,c),delete this.i[e],this.s=!0):(!this.f||this.f&&this.f.dragTarget!==b&&this.f.dragTarget!==this.map)&&Ul(this,b,\"pointermove\",c,a)};\np.Ph=function(a,b,c){var d=!(/^(?:mouse|pen)$/.test(a.type)&&0!==c.button),e;b&&(a.target=b,this.i[a.id]={ue:new M(a.viewportX,a.viewportY),target:a.target,Ef:c.timeStamp},\"mouse\"!==a.type&&Ul(this,b,\"pointerenter\",c,a),e=Ul(this,b,\"pointerdown\",c,a),!this.f&&d&&(b.draggable&&!Ol(this.a,b)?a.dragTarget=b:!this.map.draggable||e.defaultPrevented||Ol(this.a,this.map)||(a.dragTarget=this.map)),Vl(this,a,c))};\np.Oh=function(a,b,c){a.target=null;b?(Ul(this,b,\"pointerleave\",c,a),Ul(this,b,\"pointercancel\",c,a)):Ul(this,this.map,\"pointercancel\",c,a);Tl(this,a,c);this.i={};Sl(a.id,this.o)};function Ul(a,b,c,d,e){var f;if(b&&\"function\"===typeof b.dispatchEvent){f=Fl;var g=a.a.a,h=a.c.a;a=a.a;var k,l=a.a.length,m=[];for(k=0;k<l;k++)a.a[k].target===b&&m.push(a.a[k]);f=new f(c,g,h,m,e,b,d);e.button=/^(?:longpress|(?:dbl)?tap|pointer(?:down|up))$/.test(c)?e.a:Kl.NONE;b.dispatchEvent(f)}return f}\np.D=function(){Ql(this,!0);this.a.clear();this.c.clear();var a=this.v,b;for(b in a)Sl(b,a);var a=this.o,c;for(c in a)Sl(c,a);this.f=this.i=this.m=this.map=this.c=this.a=this.A=this.b=null;xc.prototype.D.call(this)};function Wl(a){this.g=z(this.g,this);Pl.call(this,a,[{La:\"touchstart\",listener:this.g},{La:\"touchmove\",listener:this.g},{La:\"touchend\",listener:this.g},{La:\"touchcancel\",listener:this.g}]);this.F={touchstart:\"pointerdown\",touchmove:\"pointermove\",touchend:\"pointerup\",touchcancel:\"pointercancel\"};this.B=(a=(a=a.j)?a.b:null)?Array.prototype.slice.call(a.querySelectorAll(\"a\"),0):[]}v(Wl,Pl);\nWl.prototype.g=function(a){var b=a.touches,c=this.a.length(),d;if(\"touchstart\"===a.type&&c>=b.length){c=this.a.clone();for(d=b.length;d--;)c.remove(b[d].identifier);for(d=c.length();d--;)this.a.remove(c.a[d].id);this.c=c;Rl(this,\"pointercancel\",a);this.c.clear()}if(this.F[a.type]){b=Cl(this.j.element);c=a.type;d=a.changedTouches;var e=d.length,f,g,h,k,l,m;this.c.clear();for(m=0;m<e;m++)if(h=d[m],l=Ml(this.a,h.identifier),f=h.pageX-b.x,g=h.pageY-b.y,l)if(\"touchmove\"===c){if(h=Math.abs(l.viewportX-\nf),k=Math.abs(l.viewportY-g),1<h||1<k||1===h&&1===k)Hl(l,f,g),this.c.push(l)}else\"touchend\"===c&&(this.a.remove(l.id),this.c.push(l),Jl(l,Kl.LEFT));else l=new Gl(f,g,h.identifier,\"touch\",Kl.LEFT,1),this.a.push(l),this.c.push(l);Rl(this,this.F[a.type],a);-1===this.B.indexOf(a.target)&&a.preventDefault()}};Wl.prototype.D=function(){this.B=null;Pl.prototype.D.call(this)};function Xl(a){var b=[],b=Yl(this);(navigator.pointerEnabled||navigator.msPointerEnabled)&&b.push({La:\"MSHoldVisual\",listener:\"prevent\"});Pl.call(this,a,b)}v(Xl,Pl);function Yl(a){var b=navigator.pointerEnabled,c,d,e=[];a.g=z(a.g,a);\"MSPointerDown MSPointerMove MSPointerUp MSPointerCancel MSPointerOut MSPointerOver\".split(\" \").forEach(function(f){c=f.toLowerCase().replace(/ms/g,\"\");d=b?c:f;e.push({La:d,listener:a.g,target:\"MSPointerUp\"===f||\"MSPointerMove\"===f?window:null})});return e}\nvar Zl={2:\"touch\",3:\"pen\",4:\"mouse\"};\nXl.prototype.g=function(a){var b=navigator.wi?a.type:a.type.toLowerCase().replace(/ms/g,\"\"),c=Cl(this.l),d=Ml(this.a,a.pointerId),e=a.pageX-c.x,c=a.pageY-c.y,f=Zl[a.pointerType]||a.pointerType;Dl&&\"rtl\"===w.getComputedStyle(this.j.element).direction&&(e-=(w.devicePixelRatio-1)*this.j.width);if(!(d||b in{pointerup:1,pointerout:1,pointercancel:1}||\"touch\"===f&&\"pointerdown\"!==b)){var d={x:e,y:c},g=a.pointerType;\"number\"===typeof g&&(g=Zl[g]);d=new Gl(d.x,d.y,a.pointerId,g,a.button,a.buttons);this.a.push(d)}d&&\n(b in{pointerup:1,pointercancel:1}?(\"touch\"===f&&this.a.remove(d.id),Jl(d,a.button)):\"pointerdown\"===b&&(\"touch\"===a.pointerType&&(Nl(this.a,\"mouse\"),Nl(this.a,\"pen\")),Il(d,a.button)),this.c.push(d),\"pointermove\"!==b?(Hl(d,e,c),Rl(this,\"pointerout\"===b||\"pointerover\"===b?\"pointermove\":b,a)):d.viewportX===e&&d.viewportY===c||a.target===document.documentElement||(Hl(d,e,c),Rl(this,b,a)));this.c.clear()};function $l(a,b,c,d){$l.u.constructor.call(this,\"contextmenu\");this.items=[];this.viewportX=a;this.viewportY=b;this.target=c;this.originalEvent=d}v($l,Bc);r(\"H.mapevents.ContextMenuEvent\",$l);function am(a){this.He=z(this.He,this);this.Je=z(this.Je,this);this.Ie=z(this.Ie,this);this.B=!1;this.g=-1;this.F=0;am.u.constructor.call(this,a,[{La:\"contextmenu\",listener:this.He},{target:a,La:\"longpress\",listener:this.Je},{target:a,La:\"dbltap\",listener:this.Ie}])}v(am,Pl);p=am.prototype;p.Je=function(a){var b=a.currentPointer;\"touch\"===b.type&&1===a.pointers.length&&bm(this,b.viewportX,b.viewportY,a.originalEvent,a.target)};p.Ie=function(a){\"touch\"===a.currentPointer.type&&(this.F=Date.now())};\np.He=function(a){var b=this;-1===this.g?this.g=setTimeout(function(){var c=Cl(b.l),d=a.pageX-c.x,c=a.pageY-c.y;b.g=-1;bm(b,d,c,a)},this.C):(clearInterval(this.g),this.g=-1);a.preventDefault()};function bm(a,b,c,d,e){var f=a.map;e=e||f.s(b,c)||f;var g=Date.now()-a.F;!a.B&&g>a.N&&(a.B=!0,e.dispatchEvent(new $l(b,c,e,d)),ti(f.b,a.Nf,a.cg,!1,a))}p.Nf=[\"mousedown\",\"touchstart\",\"pointerdown\",\"wheel\"];p.cg=function(){this.B&&(this.B=!1,this.map.dispatchEvent(new Bc(\"contextmenuclose\",this.map)))};\np.D=function(){var a=this.map.b;clearInterval(this.g);a&&vi(a,this.Nf,this.cg,!1,this);Pl.prototype.D.call(this)};function cm(a,b,c,d,e){cm.u.constructor.call(this,\"wheel\");this.delta=a;this.viewportX=b;this.viewportY=c;this.target=d;this.originalEvent=e}v(cm,Bc);r(\"H.mapevents.WheelEvent\",cm);function dm(a){var b=\"onwheel\"in document;this.K=b;this.F=(b?\"d\":\"wheelD\")+\"elta\";this.g=z(this.g,this);dm.u.constructor.call(this,a,[{La:(b?\"\":\"mouse\")+\"wheel\",listener:this.g}]);this.B=this.map.va}v(dm,Pl);\ndm.prototype.g=function(a){var b=Cl(this.l),c;c=a.pageX-b.x;var b=a.pageY-b.y,d=this.F,e=a[d+(d+\"Y\"in a?\"Y\":\"\")],f,g,h;Dl&&\"rtl\"===w.getComputedStyle(this.B.element).direction&&(c-=(w.devicePixelRatio-1)*this.B.width);e&&(h=Math.abs,f=h(e),e=(!(g=a[d+\"X\"])||3<=f/h(g))&&(!(g=a[d+\"Z\"])||3<=f/h(g))?((0<e)-(0>e))*(this.K?1:-1):0);a=new cm(e,c,b,null,a);a.delta&&((a.target=c=this.map.Ma(a.viewportX,a.viewportY)[0])&&sa(c.dispatchEvent)&&c.dispatchEvent(a),a.defaultPrevented||this.map.dispatchEvent(a))};function em(a){var b=window;this.g=z(this.g,this);Pl.call(this,a,[{La:\"mousedown\",listener:this.g},{La:\"mousemove\",listener:this.g,target:b},{La:\"mouseup\",listener:this.g,target:b},{La:\"mouseover\",listener:this.g},{La:\"mouseout\",listener:this.g},{La:\"dragstart\",listener:this.B}])}v(em,Pl);\nem.prototype.g=function(a){var b=a.type,c=Cl(this.l),c={x:a.pageX-c.x,y:a.pageY-c.y},d;(d=this.a.a[0])||(d=new Gl(c.x,c.y,1,\"mouse\"),this.a.push(d));this.c.push(d);Hl(d,c.x,c.y);/^mouse(?:move|over|out)$/.test(b)?Rl(this,\"pointermove\",a):(/^mouse(down|up)$/.test(b)&&(c=a.which-1,\"up\"===El.RegExp.$1?Jl(d,c):Il(d,c)),Rl(this,b.replace(\"mouse\",\"pointer\"),a));this.c.clear()};em.prototype.B=function(a){a.preventDefault()};function fm(a){var b=a.va.element.style;if(-1!==gm.indexOf(a))throw Error(\"InvalidArgument: map is already in use\");this.a=a;gm.push(a);b.msTouchAction=b.touchAction=\"none\";this.f=this.g=this.b=this.c=null;navigator.msPointerEnabled||navigator.pointerEnabled?this.c=new Xl(this.a):(this.c=new Wl(this.a),this.b=new em(this.a));this.g=new dm(this.a);this.f=new am(this.a);this.a.Eb(this.J,this);xc.call(this)}v(fm,xc);r(\"H.mapevents.MapEvents\",fm);var gm=[];\nfm.prototype.J=function(){this.a=null;this.c.J();this.g.J();this.f.J();this.b&&this.b.J();gm.splice(gm.indexOf(this.a),1);xc.prototype.J.call(this)};fm.prototype.dispose=fm.prototype.J;fm.prototype.i=function(){return this.a};fm.prototype.getAttachedMap=fm.prototype.i;function hm(a,b){if(-1!==im.indexOf(a))throw new C(hm,0,\"events are already used\");var c=b||{},d;xc.call(this);this.a=d=a.a;this.m=a;im.push(a);d.draggable=!0;this.i=c.kinetics||{duration:600,Be:Nj};this.l=7;this.enable(c.enabled||this.l);c=Q.EngineType;this.c=d.va;this.f=this.c.element;this.j=c.P2D;d.addEventListener(\"dragstart\",this.wg,!1,this);d.addEventListener(\"drag\",this.Ng,!1,this);d.addEventListener(\"dragend\",this.Og,!1,this);d.addEventListener(\"wheel\",this.Qg,!1,this);d.addEventListener(\"dbltap\",\nthis.Mg,!1,this);d.addEventListener(\"tap\",this.Pg,!1,this);d.addEventListener(\"pointermove\",this.Ug,!1,this);ui(this.f,\"contextmenu\",this.Lg,!1,this);a.Eb(this.J,this)}v(hm,xc);r(\"H.mapevents.Behavior\",hm);var im=[];hm.prototype.b=0;hm.DRAGGING=1;hm.WHEELZOOM=2;hm.DBLTAPZOOM=4;p=hm.prototype;\np.wg=function(a){var b=a.pointers,c=this.c;a=b[0];b=b[1]||{};if(this.b&1&&(c.startInteraction(17,this.i),c.interaction(a.viewportX,a.viewportY,b.viewportX,b.viewportY),this.b&2)){c=a.viewportX;a=a.viewportY;var d;this.g&&(b=this.a.getZoom(),d=Math[0>this.g?\"ceil\":\"floor\"](b),b!==d&&(this.g=null,this.zoom(b,d,c,a)))}};p.Ng=function(a){var b=a.pointers[0],c=a.pointers[1]||Bl;this.b&1&&(this.c.interaction(b.viewportX,b.viewportY,c.viewportX,c.viewportY),a.originalEvent.preventDefault())};\np.Og=function(){this.b&1&&this.c.endInteraction(!this.i)};p.zoom=function(a,b,c,d){var e=this.a.c;if(isNaN(+a))throw Error(\"start zoom needs to be a number\");if(isNaN(+b))throw Error(\"to zoom needs to be a number\");0!==+b-+a&&(e.startControl(null,c,d),e.control(0,0,.006),e.endControl(!0,function(a){a.zoom=b}))};\np.Qg=function(a){var b,c,d,e;this.b&2&&(b=a.delta,c=this.a.getZoom(),e=Math[0>b?\"ceil\":\"floor\"](c-b),d=this.a,d.g().type===this.j?(this.zoom(c,e,a.viewportX,a.viewportY),this.g=b):(c=this.a.c.Ab(),c.fov+=16*b,d.c.Jb(c)),a.originalEvent.preventDefault())};p.Pg=function(a){a=a.currentPointer;this.a.g().type===Pi&&(a=this.a.Va(a.viewportX,a.viewportY),this.a.c.Jb(a))};p.Ug=function(a){a=a.currentPointer;this.a.g().sa(a.viewportX,a.viewportY)};\np.Mg=function(a){var b=a.currentPointer,c=this.a.getZoom(),d=a.currentPointer.type;this.j===this.a.g().type&&(a=\"mouse\"===d?0===a.originalEvent.button?-1:1:0<a.pointers.length?1:-1,a=Math[0>a?\"ceil\":\"floor\"](c-a),this.b&4&&this.zoom(c,a,b.viewportX,b.viewportY))};p.Lg=function(a){return this.b&4?(a.preventDefault(),!1):!0};\np.J=function(){var a=this.a;a&&(a.draggable=!1,a.removeEventListener(\"dragstart\",this.wg,!1,this),a.removeEventListener(\"drag\",this.Ng,!1,this),a.removeEventListener(\"dragend\",this.Og,!1,this),a.removeEventListener(\"wheel\",this.Qg,!1,this),a.removeEventListener(\"tap\",this.Pg,!1,this),a.removeEventListener(\"dbltap\",this.Mg,!1,this),a.removeEventListener(\"pointermove\",this.Ug,!1,this),this.a=null);this.f&&(this.f.style.msTouchAction=\"\",vi(this.f,\"contextmenu\",this.Lg,!1,this),this.f=null);this.i=this.c=\nnull;im.splice(im.indexOf(this.m),1);xc.prototype.J.call(this)};hm.prototype.dispose=hm.prototype.J;hm.prototype.disable=function(a){this.c.endInteraction(!0);a?this.b&a&&(this.b-=a,a&1&&(this.a.draggable=!1)):(this.b=0,this.a.draggable=!1)};hm.prototype.disable=hm.prototype.disable;hm.prototype.enable=function(a){a?this.b&a||(this.b+=a,a&1&&(this.a.draggable=!0)):(this.b=this.l,this.a.draggable=!0)};hm.prototype.enable=hm.prototype.enable;\nhm.prototype.o=function(a){if(isNaN(a))throw Error(\"behavior: number required\");return!!(this.b&a)};hm.prototype.isEnabled=hm.prototype.o;r(\"H.mapevents.buildInfo\",function(){return Bh(\"mapsjs-mapevents\",\"0.16.0\",\"ed0390e\")});\n");
