<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MapController extends Controller {

	public function index($file)
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
 if ($ctt[0] == 'image')
	{
	header('Content-type: image/'. $ctt[1]);
	ms_iogetStdoutBufferBytes();
	}
else
	{
	header('Content-type: application/vnd.ogc.wms_xml');
	ms_iogetStdoutBufferBytes();
	}

ms_ioresethandlers();
	}

}
