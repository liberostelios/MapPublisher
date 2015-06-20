<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProjectionController extends Controller {

	public function index()
	{
		return \App\Projection::all();
	}

	public function show($id)
	{
		return \App\Projection::findOrFail($id);
	}

}
