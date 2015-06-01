<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Debug\Dumper;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    public function dump($v){
        (new Dumper())->dump($v);
    }

    /**
     * @return \App\Pest\LolEsports
     */
    public function pestLolEsports(){
        return $this->app['Pest_LolEsports'];
    }

    /**
     * @return \App\Pest\Reddit
     */
    public function pestReddit(){
        return $this->app['Pest_Reddit'];
    }

    /**
     * @return \App\Pest\Youtube
     */
    public function pestYoutube(){
        return $this->app['Pest_Youtube'];
    }
}
