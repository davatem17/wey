<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GamePostRequest;
use App\Game;


class GameController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    public function show(Request $request, Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(GamePostRequest $request)
    {
        $data = $request->validated();
        $game = Game::create($data);
        return redirect()->route('games.index')->with('status', 'Game created!');
    }

    public function edit(Request $request, Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(GamePostRequest $request, Game $game)
    {
        $data = $request->validated();
        $game->fill($data);
        $game->save();
        return redirect()->route('games.index')->with('status', 'Game updated!');
    }

    public function destroy(Request $request, Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('status', 'Game destroyed!');
    }
}
