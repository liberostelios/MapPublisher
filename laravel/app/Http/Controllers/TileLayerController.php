<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TileLayerController extends Controller {

	//
	public function index()
	{
		return \App\TileLayer::all();
	}

	public function show($id)
	{
		return \App\TileLayer::findOrFail($id);
	}
}
