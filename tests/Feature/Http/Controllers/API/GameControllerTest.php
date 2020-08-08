<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Game;
use App\User;
use Laravel\Passport\Passport;

class GameControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_game_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/games']);
        $game = factory(Game::class)->make();
        $data = $game->attributesToArray();
        $response = $this->json('POST','api/games',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_game_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/games']);
        $game = factory(Game::class)->create();
        $data = factory(Game::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/games/'.$game->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_game_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/games']);
        $game = factory(Game::class)->create();
        $response = $this->json('DELETE','api/games/'.$game->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $game->refresh();
        $this->assertSoftDeleted('games',['id' => $game->id]);

    }
}
