<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class MenuComponent extends Component
{
    public $menuItems;

    public function __construct()
    {
        $this->menuItems = Menu::all();
    }

    public function render()
    {
        return view('components.menu-component');
    }
}
