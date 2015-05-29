<?php
/**
 * Created by PhpStorm.
 * User: Rachid
 * Date: 29/05/15
 * Time: 10:21
 */

namespace App\Pest;

use Pest;

class Reddit extends AbstractPest {

    public function __construct(){
        $this->_pest = new Pest('http://www.reddit.com/r/');
    }

    /**
     * Returns list of leagues
     * @param $search
     * @return mixed
     */
    public function search($search){
        return $this->get('search.json', array(
            'q'=>$search
        ));
    }
} 