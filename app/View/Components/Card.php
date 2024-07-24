<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $judul;
    public $kategori;
    public $penerbit;
    public $penulis;
    public $idreferensi;
    public $jmlhalaman;
    public $tahun;
    public $desc;
    public $img;

    /**
     * Create a new component instance.
     */
    public function __construct($judul,$kategori,$penerbit,$penulis,$idreferensi,$jmlhalaman,
    $tahun,$desc,$img)
    {
        $this->judul = $judul;
        $this->kategori = $kategori;
        $this->penerbit = $penerbit;
        $this->penulis = $penulis;
        $this->idreferensi = $idreferensi;
        $this->jmlhalaman = $jmlhalaman;
        $this->tahun = $tahun;
        $this->desc = $desc;
        $this->img = $img;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
