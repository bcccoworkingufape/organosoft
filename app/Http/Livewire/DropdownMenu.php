<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DropdownMenu extends Component
{
    public $show;
    public $name;
    public $links;

    public function render()
    {
        return view('livewire.dropdown-menu');
    }

    public function toggleMenu()
    {
        $this->show = !$this->show;
    }

    public function filterActive($links) {
        foreach($links as $link) {
            if ($link['active']) {
                return $link;
            }
        }
    }
}
