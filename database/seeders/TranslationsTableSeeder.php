<?php

namespace Joy\VoyagerBreadProductCategory\Database\Seeders;

use Illuminate\Database\Seeder;
use Joy\VoyagerBreadProductCategory\Models\ProductCategory;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Translation;

class TranslationsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $this->dataTypesTranslations();
        $this->productCategoriesTranslations();
        $this->menusTranslations();
    }

    /**
     * Auto generate Categories Translations.
     *
     * @return void
     */
    private function productCategoriesTranslations()
    {
        // Adding translations for 'product_categories'
        //
        $cat = ProductCategory::where('name', 'product-category-1')->first();
        if ($cat->exists) {
            $this->trans('pt', $this->arr(['product_categories', 'name'], $cat->id), 'product-category-1');
            $this->trans('pt', $this->arr(['product_categories', 'description'], $cat->id), 'ProductCategory 1');
        }
        $cat = ProductCategory::where('name', 'product-category-2')->first();
        if ($cat->exists) {
            $this->trans('pt', $this->arr(['product_categories', 'name'], $cat->id), 'product-category-2');
            $this->trans('pt', $this->arr(['product_categories', 'description'], $cat->id), 'ProductCategory 2');
        }
    }

    /**
     * Auto generate DataTypes Translations.
     *
     * @return void
     */
    private function dataTypesTranslations()
    {
        // Adding translations for 'display_name_singular'
        //
        $_fld = 'display_name_singular';
        $_tpl = ['data_types', $_fld];
        
        $dtp = DataType::where($_fld, __('joy-voyager-bread-product-category::seeders.data_types.category.singular'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'ProductCategory');
        }

        // Adding translations for 'display_name_plural'
        //
        $_fld = 'display_name_plural';
        $_tpl = ['data_types', $_fld];
        $dtp = DataType::where($_fld, __('joy-voyager-bread-product-category::seeders.data_types.category.plural'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'ProductCategories');
        }
    }

    /**
     * Auto generate Menus Translations.
     *
     * @return void
     */
    private function menusTranslations()
    {
        $_tpl = ['menu_items', 'title'];
        $_item = $this->findMenuItem(__('joy-voyager-bread-product-category::seeders.menu_items.product_categories'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'ProductCategories');
        }
    }

    private function findMenuItem($title)
    {
        return MenuItem::where('title', $title)->firstOrFail();
    }

    private function arr($par, $id)
    {
        return [
            'table_name'  => $par[0],
            'column_name' => $par[1],
            'foreign_key' => $id,
        ];
    }

    private function trans($lang, $keys, $value)
    {
        $_t = Translation::firstOrNew(array_merge($keys, [
            'locale' => $lang,
        ]));

        if (!$_t->exists) {
            $_t->fill(array_merge(
                $keys,
                ['value' => $value]
            ))->save();
        }
    }
}
