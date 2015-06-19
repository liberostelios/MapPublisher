<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HelperController extends Controller {

	public function getDataSources() {
		$files = \Storage::disk('local')->files('datasources');

		$maps = array();

		foreach($files as $file)
		{
			// Filter files with *.map name
			if (preg_match('/(.*)\.shp$/U', $file)) {
				array_push($maps, $file);
			}
		}

		echo json_encode($maps);
	}

	public function getMsVersion() {
		return ms_GetVersion();
	}

	public function getAssetsIcons() {
		return \Storage::disk('public')->files('assets/img');
	}

	public function getOutputFormats() {
		$formats = array(
			array('name' => 'png', 'mimetype' => 'image/png'),
			array('name' => 'gif', 'mimetype' => 'image/gif'),
			array('name' => 'png8', 'mimetype' => 'image/png; mode=8bit'),
			array('name' => 'jpeg', 'mimetype' => 'image/jpeg'),
			//array('name' => 'svg', 'mimetype' => 'image/svg+xml'),
			array('name' => 'GTiff', 'mimetype' => 'image/tiff')
		);


		return json_encode($formats);
	}
}
