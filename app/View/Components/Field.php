<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Field extends Component
{
    public $nama;
    public $id;

    /**
     * Create a new component instance.
     *
     * @param string $nama
     * @param string $id
     */
    public function __construct($nama, $id)
    {
        $this->nama = $nama;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.field');
    }
}
