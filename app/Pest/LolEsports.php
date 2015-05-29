<?php
/**
 * Created by PhpStorm.
 * User: Rachid
 * Date: 29/05/15
 * Time: 10:21
 */

namespace App\Pest;

use Pest;

class LolEsports extends AbstractPest {

    public function __construct(){
        $this->_pest = new Pest('http://euw.lolesports.com:80/api/');
    }

    /**
     * Returns list of leagues
     * @return
     */
    public function leagues(){
        return $this->get('league', array(
            'parameters[method]' => 'all',
            'parameters[published]' => '1,0',
        ))->leagues;
    }
} 