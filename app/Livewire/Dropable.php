<?php

namespace App\Livewire;

use App\Models\MenuLink;
use Livewire\Component;

class Dropable extends Component
{
    public $items = [];
    public $parentId;
    public function reorder($items)
    {
        foreach ($items as $order => $linkId) {
            $menuLink = MenuLink::find($linkId);
            $menuLink->parent_id = $this->parentId;
            $menuLink->order = $order;
            $menuLink->save();
        }

        $rootLink = MenuLink::find($this->parentId);
        $this->items = $rootLink->children()->orderBy('order', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.dropable');
    }
}
