<?php namespace App\Http\Controllers;

use Pest;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    protected $_pestEsports;

    protected function _reqEsports($service, $params){
        if( ! $this->_pestEsports){
            $this->_pestEsports = new Pest('http://euw.lolesports.com:80/api/');
        }

        return $this->_pestEsports->get($service, $params);
    }
}
