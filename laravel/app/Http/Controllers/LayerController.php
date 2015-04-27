<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LayerController extends Controller {

	public function index()
	{
		return \App\Layer::all();
	}

	public function show($id)
	{
		return \App\Layer::findOrFail($id)->geo_json;
	}

}
