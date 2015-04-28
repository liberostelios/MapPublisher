<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class TileLayerController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$TileLayers = \App\TileLayer::all();

		return view('backend.tilelayer.index', compact('TileLayers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$TileLayer = new \App\TileLayer();

		return view('backend.tilelayer.create', compact('TileLayer'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CreateOrEditTileLayerRequest $request)
	{
		\App\TileLayer::create(Request::all());

		return redirect('admin/tilelayer');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$TileLayer = \App\TileLayer::findOrFail($id);

		return view('backend.tilelayer.edit', compact('TileLayer'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$TileLayer = \App\TileLayer::findOrFail($id);

		return view('backend.tilelayer.edit', compact('TileLayer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Requests\CreateOrEditTileLayerRequest $request)
	{
		$TileLayer = \App\TileLayer::findOrFail($id);

		$input = Request::all();

		$TileLayer->update($input);

		return redirect('admin/tilelayer');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$TileLayer = \App\TileLAyer::findOrFail($id);

		$TileLayer->delete();

		return redirect('admin/tilelayer');
	}

}
