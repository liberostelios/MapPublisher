<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use PDO;
use App\Libraries\geoPHP\geoPHP;

class Layer extends Model {

	protected $fillable = ['name', 'group', 'connection_string', 'username', 'password', 'table_name', 'geometry_field_name'];

	protected $hidden = ['connection_string', 'username', 'password'];

	function wkt_to_json($wkt) {
			$geom = geoPHP::load($wkt,'wkt');
			return $geom->out('json');
	}

	public function getGeoJsonAttribute() {
		$connection_string = $this->attributes['connection_string'];
		$username = $this->attributes['username'];
		$password = $this->attributes['password'];
		$table = $this->attributes['table_name'];
		$geocolumn = $this->attributes['geometry_field_name'];;

		$conn_type = explode(':', $connection_string)[0];
		if ($conn_type == "shp") {
			$geojson = $this->loadShpData($connection_string);
		} else {
			$geojson = $this->loadPDOData($connection_string, $username, $password, $table, $geocolumn);
		}

		header('Content-type: application/json');
		echo json_encode($geojson, JSON_NUMERIC_CHECK);
		$conn = NULL;
	}

	public function loadShpData($connection_string) {
		$filename = explode(':', $connection_string)[1];

		//$shp = new \App\Libraries\ShpLibrary\ShapeFile($filename, array('noparts' => false));
		//echo $shp->getError();
		$shp = new \App\Libraries\ShpParser\ShpParser();
		$shp->load($filename);

		# Build GeoJSON feature collection array
		$geojson = array(
			'type'      => 'FeatureCollection',
			'features'  => array(),
			'crs' => array('type' => 'name', 'properties' => array('name' => 'urn:ogc:def:crs:EPSG::2100'))
		);

		foreach ($shp->getShapeData() as $record) {
			//dd($record);
			$properties = array();
			$feature = array(
					'type' => 'Feature',
					'geometry' => json_decode($this->wkt_to_json($record['geom']['wkt'])),
					'properties' => $properties
			);

			# Add feature arrays to feature collection array
			array_push($geojson['features'], $feature);
		}

		return $geojson;
	}

	// This function loads the data in case it's a PDO connection
	public function loadPDOData($connection_string, $username, $password, $table, $geocolumn)
	{
		# Connect to MySQL database
		$conn = new PDO($connection_string, $username, $password);

		$conn_type = explode(':', $connection_string)[0];

		switch ($conn_type) {
			case 'mysql':
				$sql = "SELECT *, AsWKT($geocolumn) AS wkt FROM $table";
				break;
			case 'pgsql':
				$sql = "SELECT *, ST_AsText($geocolumn) AS wkt FROM $table";
				break;
		}

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
		    unset($properties['wkt']);
		    unset($properties[$geocolumn]);
		    $feature = array(
		         'type' => 'Feature',
		         'geometry' => json_decode($this->wkt_to_json($row['wkt'])),
		         'properties' => $properties
		    );

		    # Add feature arrays to feature collection array
		    array_push($geojson['features'], $feature);
		}

		return $geojson;
	}
}
