<?php

return [

    /*
     * The api key used when sending Geocoding requests to Google.
     */
    'key' => env('GOOGLE_MAPS_GEOCODING_API_KEY'),
    /*
     * The language param used to set response translations for textual data.
     *
     * More info: https://developers.google.com/maps/faq#languagesupport
     */

    'language' => '',

    /*
     * The region param used to finetune the geocoding process.
     *
     * More info: https://developers.google.com/maps/documentation/geocoding/intro#RegionCodes
     */
    'region' => '',

];
