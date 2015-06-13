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

}
