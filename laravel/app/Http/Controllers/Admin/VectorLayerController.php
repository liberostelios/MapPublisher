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
		$VectorLayers = \App\Layer::all();

		return view('backend.vectorlayer.index', compact('VectorLayers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$VectorLayer = new \App\Layer();

		return view('backend.vectorlayer.create', compact('VectorLayer'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = \Request::all();

		\App\Layer::create($input);

		return redirect('admin/vectorlayer');
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
		$VectorLayer = \App\Layer::findOrFail($id);

		return view('backend.vectorlayer.edit', compact('VectorLayer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$VectorLayer = \App\Layer::findOrFail($id);

		$input = \Request::all();

		$VectorLayer->update($input);

		return redirect('admin/vectorlayer');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$VectorLayer = \App\Layer::findOrFail($id);

		$VectorLayer->delete();

		return redirect('admin/vectorlayer');
	}

}
