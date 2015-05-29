<?php
/**
 * Created by PhpStorm.
 * User: Rachid
 * Date: 29/05/15
 * Time: 10:23
 */

namespace App\Pest;


abstract class AbstractPest {

    protected $_pest;

    public function getPest(){
        return $this->_pest;
    }

    public function get($service, $params){
        return json_decode($this->_pest->get($service, $params));
    }
} 