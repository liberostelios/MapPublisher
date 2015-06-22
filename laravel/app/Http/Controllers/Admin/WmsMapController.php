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

		for ($i = 0; $i < $map->numlayers; $i++) {
			if ($map->getLayer($i)->numclasses == 0) {
				$class = new \classObj($map->getLayer($i));
			}

			if ($map->getLayer($i)->getClass(0)->numstyles == 0) {
				$style = new \styleObj($map->getLayer($i)->getClass(0));
			}
		}

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

		$map->name = $input['name'];

		$map->setextent($input['extminx'], $input['extminy'], $input['extmaxx'],$input['extmaxy']);

		$map->setSize($input['width'], $input['height']);

		if (array_key_exists('projection', $input)) {
			$map->setProjection($input['projection'][0], MS_TRUE);
		}

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
			if (is_array($value)) {
				$value = implode(' ', $value);
			}
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
				$layer->data = $value['data'][0];
				$layer->type = $value['type'];
				if (array_key_exists('projection', $value)) {
					$layer->setProjection($value['projection'][0]);
				}

				// Prepare the layer style
				if ($layer->numclasses == 0) {
					$class = new \classObj($layer);
				}
				if ($layer->getClass(0)->numstyles == 0) {
					$style = new \styleObj($layer->getClass(0));
				}

				if (array_key_exists('color', $value)) {
					stringToColorObj($value['color'], $layer->getClass(0)->getStyle(0)->color);
					stringToColorObj($value['outlinecolor'], $layer->getClass(0)->getStyle(0)->outlinecolor);
					stringToColorObj($value['backgroundcolor'], $layer->getClass(0)->getStyle(0)->backgroundcolor);
				}
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
