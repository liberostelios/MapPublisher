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
		$map = new \mapObj('');

		return view('backend.mapserver.map.create', ['map' => $map, 'file' => 'new']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = \Request::all();

		$i = 0;
		while(\Storage::disk('local')->exists('mapfile'.$i))
			$i++;

		$file = 'mapfile'.$i;

		$map = new \mapObj('');

		$this->updateMapFileFromInput($map, $input);

		$map->save(storage_path().'/app/'.$file.'.map');

		return $this->index();
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

		$this->updateMapFileFromInput($map, $input);

		// Save changes to the map file
		$map->save(storage_path().'/app/'.$file.'.map');

		return $this->index();
	}

	public function updateMapFileFromInput($map, $input)
	{
		// MAP SECTION

		// Map Name
		$map->name = $input['name'];

		// Map Extents
		$map->setextent($input['extminx'], $input['extminy'], $input['extmaxx'],$input['extmaxy']);

		// Map Size
		$map->setSize($input['width'], $input['height']);

		$map->setProjection($input['projection'], true);

		// Map Units
		$map->units = $input['units'];

		// Map Status
		if (!empty($input['status'])) {
			$map->status = $input['status'] == 'ON';
		}
		else {
			$map->status = 0;
		}

		// WEB SUBSECTION

		// Update all metadata
		foreach ($input['metadata'] as $key => $value) {
			$map->web->metadata->set($key, $value);
		}

		// LAYERS SUBSECTIONS
		$layer_count = 0;
		if (array_key_exists('layer', $input)) {
			$layer_count = count($input['layer']);
			foreach($input['layer'] as $key => $value) {
				if ($key < $map->numlayers) {
					$layer = $map->getlayer($key);
				}
				else {
					$layer = new \layerObj($map);
				}
				$layer->name = $value['name'];
				$layer->data = $value['data'];
				$layer->type = $value['type'];
			}
		}

		for($i = $layer_count; $i < $map->numlayers; $i++) {
			$map->removeLayer($i);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($file)
	{
		\Storage::disk('local')->delete($file.'.map');

		return $this->index();
	}

}
