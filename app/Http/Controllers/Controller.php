<?php namespace App\Http\Controllers;

use Pest;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Debug\Dumper;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    public function dump($v){
        (new Dumper())->dump($v);
    }
}
