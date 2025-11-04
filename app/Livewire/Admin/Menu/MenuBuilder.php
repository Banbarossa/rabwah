<?php

namespace App\Livewire\Admin\Menu;

use App\Models\Menu;
use App\Models\MenuItem;
use Livewire\Component;

class MenuBuilder extends Component
{
    public $menuId;
    public $menuItems = [];
    public $title, $url, $target, $parent_id;

    protected $listeners = ['updateMenuOrder'];
    public function mount($menuId =null)
    {
        if($menuId){

        $this->menuId = $menuId;
        }else{
            $menu = Menu::latest()->first();
            $this->menuId = $menu?->id;
        }
        $this->loadMenu();
    }

    public function loadMenu()
    {
        $this->menuItems = Menu::with('items.children')->find($this->menuId)?->items ?? [];
    }

    public function addItem()
    {
        MenuItem::create([
            'menu_id' => $this->menuId,
            'parent_id' => $this->parent_id,
            'title' => $this->title,
            'url' => $this->url,
            'target' => $this->target,
            'order' => MenuItem::where('menu_id', $this->menuId)->count() + 1
        ]);

        $this->reset(['title', 'url', 'target', 'parent_id']);
        $this->loadMenu();
    }

    public function deleteItem($id)
    {
        MenuItem::find($id)?->delete();
        $this->loadMenu();
    }

    public function updateMenuOrder($orderedItems)
    {
        foreach ($orderedItems as $index => $item) {
            MenuItem::where('id', $item['id'])->update([
                'order' => $index,
                'parent_id' => $item['parent_id'] ?? null,
            ]);
        }
        $this->loadMenu();
    }
    public function render()
    {
        return view('livewire.admin.menu.menu-builder');
    }
}
