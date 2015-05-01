<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WmsMapController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$files = \Storage::disk('local')->files();

		$maps = [];

		foreach($files as $file)
		{
			// Filter files with *.map name
			if (preg_match('/(.*)\.map$/U', $file)) {
				$map = new \mapObj(storage_path().'/app/'.$file);
				$maps[str_replace('.map', '', $file)] = $map;
			}
		}

		return view('backend.mapserver.map.index', compact('maps'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	public function edit($file)
	{
		$map = new \mapObj(storage_path().'/app/'.$file.'.map');

		return view('backend.mapserver.map.edit', ['map' => $map, 'file' => str_replace('.map', '', $file)]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $file
	 * @return Response
	 */
	public function update($file)
	{
		// Load the input parameters
		$input = \Request::all();

		// Load the existing map file
		$map = new \mapObj(storage_path().'/app/'.$file.'.map');

		// Update map attributes
		$map->name = $input['name'];
		$map->setextent($input['extminx'], $input['extminy'], $input['extmaxx'],$input['extmaxy']);

		// Save changes to the map file
		$map->save(storage_path().'/app/'.$file.'.map');

		return $this->index();
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
