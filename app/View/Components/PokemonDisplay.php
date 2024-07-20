<?php

namespace App\View\Components;

use App\Models\Pokemon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PokemonDisplay extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Pokemon $pokemon
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pokemon-display');
    }
}
