<?php

return [
    'labels' => [
        'Goods' => 'Products',
        'goods' => 'Products',
    ],
    'fields' => [
        'actual_price' => 'Actual Price',
        'group_id' => 'Category',
        'api_hook' => 'Callback Event',
        'buy_prompt' => 'Purchase Notice',
        'description' => 'Product Description',
        'gd_name' => 'Product Name',
        'gd_description' => 'Product Description',
        'gd_keywords' => 'Product Keywords',
        'in_stock' => 'Stock',
        'ord' => 'Sort Weight',
        'other_ipu_cnf' => 'Other Input Configuration',
        'picture' => 'Product Image',
        'retail_price' => 'Retail Price',
        'sales_volume' => 'Sales Volume',
        'type' => 'Product Type',
        'buy_limit_num' => 'Maximum Purchase Limit',
        'wholesale_price_cnf' => 'Wholesale Price Configuration',
        'automatic_delivery' => 'Automatic Delivery',
        'manual_processing' => 'Manual Processing',
        'is_open' => 'Available',
        'coupon_id' => 'Available Coupons'
    ],
    'options' => [
    ],
    'helps' => [
        'retail_price' => 'Optional, mainly for display',
        'picture' => 'Optional, default image will be used',
        'in_stock' => 'When product type is "Manual Processing", manual stock quantity will take effect. For "Automatic Delivery" products, system will automatically detect stock quantity',
        'buy_limit_num' => 'Prevent malicious stock abuse, 0 means no limit on maximum quantity per order',
        'other_ipu_cnf' => 'Format: [unique_identifier(english)=input_name=required], example: qq_account=QQ Account=true means product detail page will add a [QQ Account] input field, customers can enter [QQ Account], true=required, false=optional. (One per line)',
        'wholesale_price_cnf' => 'Example: 5=3 means when customers buy 5 or more pieces, each piece costs 3. One per line',

    ]
];