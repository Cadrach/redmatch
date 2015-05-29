<?php namespace App\Http\Controllers;

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
}
