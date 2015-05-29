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
        $pest = $this->app['Pest_LolEsports'];
        foreach(Tournament::all() as $model){
            $tournament = $pest->tournament($model->id);
            $model->name = $tournament->name;
            $model->season = $tournament->season;
            $model->dateBegin = $tournament->dateBegin;
            $model->dateEnd = $tournament->dateEnd;
            $model->no_vod = $tournament->noVods;
            $model->finished = $tournament->isFinished;
            $model->published = $tournament->published;
            $model->save();

            //Do not abuse the service
            sleep(10);
            set_time_limit(30);
        }
    }
}
