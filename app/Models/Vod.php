<?php namespace App\Models;

use App\Pest\LolEsports;
use Illuminate\Database\Eloquent\Model;

class Vod extends Model {
    protected $fillable = ['type', 'url', 'game_id'];
}