<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TileLayer extends Model {

	protected $fillable = ['name', 'url', 'layer', 'format', 'attribution'];

}
