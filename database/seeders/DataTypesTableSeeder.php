<?php

namespace Joy\VoyagerBreadProductCategory\Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'product-categories');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'product_categories',
                'display_name_singular' => __('joy-voyager-bread-product-category::seeders.data_types.product_category.singular'),
                'display_name_plural'   => __('joy-voyager-bread-product-category::seeders.data_types.product_category.plural'),
                'icon'                  => 'voyager-bread voyager-bread-product-category voyager-categories',
                'model_name'            => 'Joy\\VoyagerBreadProductCategory\\Models\\ProductCategory',
                // 'policy_name'           => 'Joy\\VoyagerBreadProductCategory\\Policies\\ProductCategoryPolicy',
                // 'controller'            => 'Joy\\VoyagerBreadProductCategory\\Http\\Controllers\\VoyagerBreadProductCategoryController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
