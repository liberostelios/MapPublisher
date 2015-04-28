<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class VectorLayerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
<<<<<<< HEAD
		//
=======
		$VectorLayers = \App\Layer::all();

		return view('backend.vectorlayer.index', compact('VectorLayers'));
>>>>>>> temp
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
<<<<<<< HEAD
		//
=======
		$VectorLayer = new \App\Layer();

		return view('backend.vectorlayer.create', compact('VectorLayer'));
>>>>>>> temp
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
<<<<<<< HEAD
	public function store()
	{
		//
=======
	public function store(Requests\CreateOrEditTileLayerRequest $request)
	{
		\App\Layer::create(Request::all());

		return redirect('admin/vectorlayer');
>>>>>>> temp
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
