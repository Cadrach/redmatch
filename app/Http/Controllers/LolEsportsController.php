<?php namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Match;
use App\Models\Tournament;
use App\Models\League;
use \Illuminate\Contracts\Foundation\Application;

class LolEsportsController extends Controller {

    public function __construct(Application $app){
        $this->app = $app;
    }

    public function getLeagues(){
        League::updateTableFromLolEsports();
    }


    public function getReddit(){
        echo '<pre>';
        print_r($this->pestReddit()->search('test'));
    }

    public function getTournaments(){
        $pest = $this->pestLolEsports();
        foreach(Tournament::all() as $model){
            $tournament = $pest->tournament($model->id);
            $model->name = $tournament->name;
            $model->season = $tournament->season;
            $model->dateBegin = $tournament->dateBegin;
            $model->dateEnd = $tournament->dateEnd;
            $model->no_vod = $tournament->noVods;
            $model->finished = $tournament->isFinished;
            $model->published = $tournament->published;
            $model->save();

            //Do not abuse the service
            sleep(10);
            set_time_limit(30);
        }
    }

    public function getMatches(){
        //CURDATE() BETWEEN dateBegin AND dateEnd
        $tournaments = Tournament::whereRaw('no_vod=0 AND published=1 AND finished=0 AND (season = year(curdate()) OR season = year(curdate())+1)')->get();
        $pest = $this->pestLolEsports();
        foreach($tournaments as $tournament){
            foreach($pest->schedule($tournament->id) as $key=>$match){
                $model = Match::findOrNew($match->matchId);
                $model->id = $match->matchId;
                $model->league_id = $tournament->league_id;
                $model->tournament_id = $tournament->id;
                if($match->contestants){
                    try{
                        $model->team_blue_id = $match->contestants->blue->id;
                        $model->team_red_id = $match->contestants->red->id;
//                        $model->score_blue = $match->contestants->blue->wins;
//                        $model->score_red = $match->contestants->red->wins;
                    }catch(\Exception $e){
                        //Ignore errors
                    }
                }
                $model->url = $match->url;
                $model->date_time = $match->dateTime;
                $model->team_winner_id = $match->winnerId;
                $model->max_games = $match->maxGames;
                $model->is_live = $match->isLive;
                $model->is_finished = $match->isFinished;
                $model->polldaddy_id = $match->polldaddyId;
                $model->name = $match->name;
                $model->save();

                foreach($match->games as $gameKey=>$game){
                    $position = str_replace('game', '', $gameKey);

                    $gameModel = Game::findOrNew($game->id);
                    $gameModel->id = $game->id;
                    $gameModel->league_id = $tournament->league_id;
                    $gameModel->tournament_id = $tournament->id;
                    $gameModel->match_id = $model->id;
                    $gameModel->has_vod = $game->hasVod;
                    $gameModel->no_vods = $game->noVods;
                    $gameModel->order = $position;
                    $gameModel->save();
                }
            }

            sleep(5);
            set_time_limit(30);
        }
    }
}
