<?php namespace App\Http\Controllers;

use App\Models\League;

class LolEsportsController extends Controller {

    public function getLeagues(){
        League::updateTableFromLolEsports();
    }

}
