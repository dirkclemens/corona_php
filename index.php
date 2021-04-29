<!DOCTYPE html>
<html>
  <head>
  <style>
    body {
	font-family: "Helvetica Neue", Arial, Helvetica, sans-serif;
        font-size: 100%;
        color: #2d2c2e;
    }
  </style>
  </head>
  <body>
<?php

// ini_set('error_reporting', E_ALL);
// Melde alle PHP Fehler (siehe Changelog)
// error_reporting(E_ALL);
error_reporting(0);

// $debug = true;
$debug = false;

$rkiuri = "https://services7.arcgis.com/mOBPykOjAyBO2ZKk/arcgis/rest/services/RKI_Landkreisdaten/FeatureServer/0/query?where=1%3D1&outFields=cases7_per_100k,ca$

if ($debug == true){
    $json = '{"objectIdFieldName":"OBJECTID","uniqueIdField":{"name":"OBJECTID","isSystemMaintained":true},"globalIdFieldName":"","geometryType":"esriGeometryP$
    echo "debug mode<br/>";
} else {
    $json = file_get_contents($rkiuri);
}

$data = array();
$data = json_decode($json, true);
// echo "<pre>";
// print_r($data['features']);
// echo "</pre>";

echo "7 Tage Inzidenz VIE: ".round($data['features']['0']['attributes']['cases7_per_100k'],0)."<br>";
echo "7 Tage Inzidenz NRW: ".round($data['features']['0']['attributes']['cases7_bl_per_100k'],0)."<br>";
echo "Stand: ".$data['features']['0']['attributes']['last_update']."<br>";

?>
  </body>
</html>
