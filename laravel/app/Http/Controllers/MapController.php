<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MapController extends Controller {

	public function index() {
		$files = \Storage::disk('local')->files();

		$maps = [];

		foreach($files as $file)
		{
			// Filter files with *.map name
			if (preg_match('/(.*)\.map$/U', $file)) {
				$name = str_replace('.map', '', $file);
				$url = url('/map/'.$name);
				$map = array('name' => $name, 'url' => $url);
				array_push($maps, $map);
			}
		}

		return $maps;
	}

	/* This function acts as a wrapper for Mapserver, giving the actual WMS content response */
	public function show($file)
	{
		$req = new \OwsrequestObj();
		$req->loadParams();

		ms_ioinstallstdouttobuffer();

		$map = new \mapObj(storage_path().'/app/'.$file.'.map');
		$map->owsDispatch($req);

		/* wich contenttype has been returned ? */
	 	$contenttype = ms_iostripstdoutbuffercontenttype();
	 	$ctt = explode("/",$contenttype);

		/* Send response with appropriate header */
	 	if ($ctt[0] == 'image') {
			header('Content-type: image/'. $ctt[1]);
			ms_iogetStdoutBufferBytes();
		}
		else {
			header('Content-type: application/vnd.ogc.wms_xml');
			ms_iogetStdoutBufferBytes();
		}

			ms_ioresethandlers();
		}

}
