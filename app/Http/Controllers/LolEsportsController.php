<?php namespace App\Http\Controllers;

use App\Pest\Reddit;
use App\Models\League;

class LolEsportsController extends Controller {

    public function getLeagues(){
        League::updateTableFromLolEsports();
    }


    public function getReddit(){
        $pest = new Reddit;
        echo '<pre>';
        print_r($pest->search('test'));
    }
}
