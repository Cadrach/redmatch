<?php namespace App\Models;

use App\Pest\LolEsports;
use Illuminate\Database\Eloquent\Model;

class League extends Model {
    public static function updateTableFromLolEsports(){

        $pest = new LolEsports();

        foreach($pest->leagues() as $league){
            $model = League::findOrNew($league->id);
            $model->id = $league->id;
            $model->name = $league->shortName;
            $model->image = $league->leagueImage;
            $model->url = $league->url;
            $model->color = $league->color;
            $model->weight = $league->menuWeight;
            $model->published = $league->published;
            $model->save();
        }
    }
}