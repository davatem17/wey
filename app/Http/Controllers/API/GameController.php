<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\GamePostRequest;
use App\Http\Controllers\Controller;
use App\Game;

class GameController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth:api');
    }


    public function index()
    {
        return Game::all();
    }

    public function show(Request $request, Game $game)
    {
        return $game;
    }

    public function store(GamePostRequest $request)
    {
        $data = $request->validated();
        $game = Game::create($data);
        return $game;
    }

    public function update(GamePostRequest $request, Game $game)
    {
        $data = $request->validated();
        $game->fill($data);
        $game->save();

        return $game;
    }

    public function destroy(Request $request, Game $game)
    {
        $game->delete();
        return $game;
    }

}
