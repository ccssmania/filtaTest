<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuLink extends Model
{

    /**
     * Get the children of the menu link
     */
    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MenuLink::class, 'parent_id', 'id');
    }

    /**
     * Get the scope for root menu links
     */
    public function scopeRootLinks()
    {
        return $this->where('is_root', true);
    }
}
