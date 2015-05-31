<?php namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Match;
use App\Models\Tournament;
use App\Models\League;
use App\Models\Vod;
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

    public function getGames(){
        $games = Game::all();
        $pest = $this->pestLolEsports();

        foreach($games as $game){
            $data = $pest->game($game->id);
            $game->date_time = $data->dateTime;
            $game->legs_url = $data->legsUrl;
            $game->length = $data->gameLength;
            $game->team_blue_id = $data->contestants->blue->id;
            $game->team_red_id = $data->contestants->red->id;
            $game->team_winner_id = $data->winnerId;

            //Save players => in other function, based on tournaments
            //Save Teams => in other function, based on tournaments
            //Save Game Players data

            //Get legs data
            if($data->legsUrl){
                try{
                    $jsonLegs = file_get_contents($data->legsUrl);
                    $legs = json_decode($jsonLegs);
                    $game->patch = $legs->gameVersion;
                    $game->date_time = date("Y-m-d H:i:s", $legs->gameCreation/1000);
                    $game->legs_data = $jsonLegs;
                }catch(\Exception $e){
                    $game->legs_data = json_encode(['error'=>$e->getMessage()]);
                }
            }

            //Save Game
            $game->save();

            //Save Vods
            if($data->vods){
                foreach($data->vods as $vod){
                    Vod::firstOrCreate([
                        'type' => $vod->type,
                        'url' => $vod->URL,
                        'game_id' => $game->id,
                    ]);
                }
            }

            sleep(5);
            set_time_limit(30);
        }
    }
}
