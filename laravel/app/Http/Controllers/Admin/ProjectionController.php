<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProjectionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Projections = \App\Projection::all();

		return view('backend.projection.index', compact('Projections'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$Projection = new \App\Projection();

		return view('backend.projection.create', compact('Projection'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = \Request::all();

		\App\Projection::create($input);

		return redirect('admin/projection');
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
		$Projection = \App\Projection::findOrFail($id);

		return view('backend.projection.edit', compact('Projection'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$Projection = \App\Projection::findOrFail($id);

		$input = \Request::all();

		$Projection->update($input);

		return redirect('admin/projection');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$Projection = \App\Projection::findOrFail($id);

		$Projection->delete();

		return redirect('admin/projection');
	}

}
