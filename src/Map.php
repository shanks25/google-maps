<?php

namespace EvilGenius; 

class Map
{

    public $key ; 


    public function __construct($key)
    {

        $this->key = $key ;
    }  



    public   function getTwoPointDistance($firstLat, $firstLong, $secLat, $secLong)
    {

        $output = $this->callGoogleMaps($firstLat, $firstLong, $secLat, $secLong);
        if (array_key_exists('error_message', $output)) {
           return $output['error_message'] ;
       } 
       if (isset($output['routes'][0])) {
        $distancekm = $output['routes'][0]['legs'][0]['distance']['value'];
            // $distanceshow = $output['routes'][0]['legs'][0]['distance']['text'];

        $distance = $distancekm * 0.001;
        $distanceshow = number_format($distance, 2);
            // round(($distance),2);
    } else {
        $distance = 0;
        $distanceshow = '0';
    }
    return $distance;
}


public   function getTwoPointTimeInSeconds($firstLat, $firstLong, $secLat, $secLong)
{

   $output = $this->callGoogleMaps($firstLat, $firstLong, $secLat, $secLong);
   if (array_key_exists('error_message', $output)) {
       return $output['error_message'] ;
   } 
   if (isset($output['routes'][0])) {
     $seconds = $output['routes'][0]['legs'][0]['duration']['value'];

 }   
 return $seconds;
 
}


public function callGoogleMaps($firstLat, $firstLong, $secLat, $secLong)
{

    $pick_point1 = $firstLat . ',' . $firstLong;
    $drop_point1 = urlencode($secLat . ',' . $secLong);

    $key =  $this->key;

    $url = 'https://maps.googleapis.com/maps/api/directions/json?origin=' . $firstLat . ',' . $firstLong . '&destination=' . $secLat . ',' . $secLong . '&sensor=false&mode=driving&key=' . $key;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    curl_close($ch);


    return    $output = json_decode($result, true);

}

}