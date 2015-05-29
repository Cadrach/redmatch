<?php namespace App\Http\Controllers;

use App\Models\Tournament;
use \Illuminate\Contracts\Foundation\Application;
use App\Models\League;

class LolEsportsController extends Controller {

    public function __construct(Application $app){
        $this->app = $app;
    }

    public function getLeagues(){
        League::updateTableFromLolEsports();
    }


    public function getReddit(){
        echo '<pre>';
        print_r($this->app['Pest_Reddit']->search('test'));
    }

    public function getTournaments(){
        foreach($this->app['Pest_LolEsports']->tournaments() as $key=>$tournament){
            $id = str_replace('tourney','',$key);
            $model = Tournament::findOrNew($id);
            $model->id = $id;
            $model->name = $tournament->tournamentName;
            $model->season = $tournament->season;
            $model->dateBegin = $tournament->dateBegin;
            $model->dateEnd = $tournament->dateEnd;
            $model->no_vod = $tournament->noVods;
            $model->finished = $tournament->isFinished;
            $model->published = $tournament->published;
            $model->save();
        }
    }
}
