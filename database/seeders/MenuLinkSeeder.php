<?php

namespace Database\Seeders;

use App\Models\MenuLink;
use Illuminate\Database\Seeder;

class MenuLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rootA = MenuLink::create([
            'name' => 'Root A',
            'url' => 'a.jpg',
            'order' => 1,
            'is_root' => true,
        ]);

        $rootB = MenuLink::create([
            'name' => 'Root B',
            'url' => 'b.jpg',
            'order' => 2,
            'is_root' => true,
        ]);

        $sub1 = MenuLink::create([
            'name' => 'Sub 1',
            'url' => null,
            'order' => 1,
            'is_root' => false,
            'parent_id' => $rootA->id,
        ]);

        $sub2 = MenuLink::create([
            'name' => 'Sub 2',
            'url' => null,
            'order' => 1,
            'is_root' => false,
            'parent_id' => $rootB->id,
        ]);

        $sub3 = MenuLink::create([
            'name' => 'Sub 3',
            'url' => null,
            'order' => 2,
            'is_root' => false,
            'parent_id' => $rootB->id,
        ]);
    }
}
