<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Game;
use App\User;

class GameControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_game_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);

        $game = factory(Game::class)->make();
        $data = $game->attributesToArray();
        $response = $this->post(route('games.store'), $data);
        $response->assertRedirect(route('games.index'));
        $response->assertSessionHas('status', 'Game created!');
    }

    /**
     * @test
     */
    public function it_updates_game_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $game = factory(Game::class)->create();
        $data = factory(Game::class)->make()->attributesToArray();
        $response = $this->put(route('games.update', ['game' => $game]), $data);
        $response->assertRedirect(route('games.index'));
        $response->assertSessionHas('status', 'Game updated!');
    }

    /**
     * @test
     */
    public function it_destroys_game_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $game = factory(Game::class)->create();
        $response = $this->delete(route('games.destroy', ['game' => $game]));
        $response->assertRedirect(route('games.index'));
        $response->assertSessionHas('status', 'Game destroyed!');
    }
}
