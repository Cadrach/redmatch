<?php
/**
 * Created by PhpStorm.
 * User: Rachid
 * Date: 29/05/15
 * Time: 10:21
 */

namespace App\Pest;

use Pest;

class Youtube extends AbstractPest {

    const CHANNEL_ID_LOLESPORTS = 'UCvqRdlKsE5Q8mf8YXbdIJLw';
    const CHANNEL_ID_LOLEVENTVODS = 'UCQJT7rpynlR7SSdn3OyuI_Q';

    public function __construct(){
        $this->_pest = new Pest('https://www.googleapis.com/youtube/v3/');
    }

    public function get($service, array $params=array()){
        $params['key'] = env('GOOGLE_API_KEY');
        return parent::get($service, $params);
    }

    public function videos(array $ids){
        return $this->get('videos', array(
            'part' => 'statistics',
            'id' => implode(',', $ids),
        ));
//        videos?part=statistics&id=cznI8UXU0Dc&key={YOUR_API_KEY}
    }
} 