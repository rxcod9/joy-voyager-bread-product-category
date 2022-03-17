<?php

namespace Joy\VoyagerBreadProductCategory\Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::where('name', 'admin')->firstOrFail();

        $maxOrder = MenuItem::max('order');
    
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('joy-voyager-bread-product-category::seeders.menu_items.product_categorys'),
            'url'     => '',
            'route'   => 'voyager.product-categorys.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-bread voyager-bread-product-category',
                'color'      => null,
                'parent_id'  => null,
                'order'      => $maxOrder++,
            ])->save();
        }
    }
}
