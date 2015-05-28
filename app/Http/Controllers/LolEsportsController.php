<?php namespace App\Http\Controllers;

class LolEsportsController extends Controller {

    public function getLeagues(){

        $data = $this->_reqEsports('league', array(
            'parameters[method]' => 'all',
            'parameters[published]' => '1,0',
        ));

        print_r($data);
    }

}
