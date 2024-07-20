<?php

namespace App\Console\Commands;

use App\Models\Pokemon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchPokeApi extends Command
{

    private $POKEMON_URL = "https://pokeapi.co/api/v2/pokemon";
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-poke-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates entire pokemon table using data from pokeapi';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo("Processing pokeapi \n");
        $pokeResponse = Http::get($this->POKEMON_URL, [
            "offset" => 0,
            "limit" => 100000,
        ]);
        $body = $pokeResponse->body();
        $collected = json_decode($body)->results;
        foreach ($collected as $pokemonEntry) {
            $pokemonLink = $pokemonEntry->url;
            $response = Http::get($pokemonLink);
            $body = $response->body();
            $deserialized = json_decode($body);
            $attributes = [];
            foreach ($deserialized->stats as $stat) {
                $attributes[$stat->stat->name] = $stat->base_stat;
            }
            Pokemon::updateOrCreate(
                ['name' => $deserialized->name, 'apiId' => $deserialized->id],
                ['image' => $deserialized->sprites->front_default,
                'hp' => $attributes["hp"],
                'atk' => $attributes["attack"],
                'def' => $attributes["defense"],
                'special_atk' => $attributes["special-attack"],
                'special_def' => $attributes["special-defense"],
                'speed' => $attributes["speed"],
                ]
            );
            // Hate to do it this way, but I keep getting IP banned by pokeapi
            sleep(1);
        }
    }
}
