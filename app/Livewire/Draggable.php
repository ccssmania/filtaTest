<?php

namespace App\Livewire;

use App\Models\MenuLink;
use Livewire\Component;

class Draggable extends Component
{

    public $menuLinks;

    public function updateLinkOrder($menuLinks)
    {
        foreach ($menuLinks as $parentOrder) {
            $parent = MenuLink::find($parentOrder['value']);
            $parent->order = $parentOrder['order'];
            foreach ($parentOrder['items'] as $linkOrder) {
                $link = MenuLink::find($linkOrder['value']);
                $link->order = $linkOrder['order'];
                $link->parent_id = $parent->id;
                $link->save();

            }
            $parent->save();
        }

        $this->menuLinks = MenuLink::with('children')->rootLinks()->orderBy('order', 'asc')->get();
    }
    public function render()
    {
        return view('livewire.draggable');
    }
}
