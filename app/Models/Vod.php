<?php namespace App\Models;

use App\Pest\LolEsports;
use Illuminate\Database\Eloquent\Model;

class Vod extends Model {
    protected $fillable = ['type', 'url', 'game_id'];

    /**
     * Before save compute type id
     * Called in EventServiceProvider
     * @return string|null
     */
    public function beforeSaveComputeTypeId(){
        if($this->type == 'youtube'){
            preg_match('/.*?=([^#]*)[#|$]?/', urldecode($this->url), $match);
            $this->type_id = $match[1];
        }
    }
}