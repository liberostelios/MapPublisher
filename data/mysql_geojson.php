<?php
/**
 * Title:   MySQL to GeoJSON (Requires https://github.com/phayes/geoPHP)
 * Notes:   Query a MySQL table or view and return the results in GeoJSON format, suitable for use in OpenLayers, Leaflet, etc.
 * Author:  Bryan R. McBride, GISP
 * Contact: bryanmcbride.com
 * GitHub:  https://github.com/bmcbride/PHP-Database-GeoJSON
 */

# Include required geoPHP library and define wkb_to_json function
include_once('geoPHP/geoPHP.inc');
function wkb_to_json($wkb) {
    $geom = geoPHP::load($wkb,'wkb');
    return $geom->out('json');
}

$server = $_GET['server'];
$dbname = $_GET['dbname'];
$username = $_GET['username'];
$password = $_GET['password'];
$table = $_GET['table'];
$geocolumn = $_GET['geocolumn'];

# Connect to MySQL database
$conn = new PDO("mysql:host=$server;dbname=$dbname",$username,$password);

# Build SQL SELECT statement and return the geometry as a WKB element
$sql = "SELECT *, AsWKB($geocolumn) AS wkb FROM $table";

# Try query or error
$rs = $conn->query($sql);
if (!$rs) {
    echo 'An SQL error occured.\n';
    exit;
}

# Build GeoJSON feature collection array
$geojson = array(
   'type'      => 'FeatureCollection',
   'features'  => array(),
   'crs' => array('type' => 'name', 'properties' => array('name' => 'urn:ogc:def:crs:EPSG::2100'))
);

# Loop through rows to build feature arrays
while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
    $properties = $row;
    # Remove wkb and geometry fields from properties
    unset($properties['wkb']);
    unset($properties[$geocolumn]);
    $feature = array(
         'type' => 'Feature',
         'geometry' => json_decode(wkb_to_json($row['wkb'])),
         'properties' => $properties
    );

    # Add feature arrays to feature collection array
    array_push($geojson['features'], $feature);
}

header('Content-type: application/json');
echo json_encode($geojson, JSON_NUMERIC_CHECK);
$conn = NULL;
?>
