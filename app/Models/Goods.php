<?php

namespace App\Models;


use App\Events\GoodsDeleted;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends BaseModel
{

    use SoftDeletes;

    protected $table = 'goods';

    protected $dispatchesEvents = [
        'deleted' => GoodsDeleted::class
    ];

    /**
     * 可批量赋值字段 - 添加英语字段
     */
    protected $fillable = [
        'group_id', 'gd_name', 'gd_description', 'gd_keywords', 'picture',
        'retail_price', 'actual_price', 'in_stock', 'sales_volume', 'ord',
        'buy_limit_num', 'buy_prompt', 'description', 'type', 'wholesale_price_cnf',
        'other_ipu_cnf', 'api_hook', 'is_open',
        // 英语字段
        'gd_name_en', 'gd_description_en', 'gd_keywords_en', 'buy_prompt_en', 'description_en'
    ];

    /**
     * 关联分类
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @author    assimon<ashang@utf8.hk>
     * @copyright assimon<ashang@utf8.hk>
     * @link      http://utf8.hk/
     */
    public function group()
    {
        return $this->belongsTo(GoodsGroup::class, 'group_id');
    }

    /**
     * 关联优惠券
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     * @author    assimon<ashang@utf8.hk>
     * @copyright assimon<ashang@utf8.hk>
     * @link      http://utf8.hk/
     */
    public function coupon()
    {
        return $this->belongsToMany(Coupon::class, 'coupons_goods', 'goods_id', 'coupons_id');
    }

    /**
     * 关联卡密
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @author    assimon<ashang@utf8.hk>
     * @copyright assimon<ashang@utf8.hk>
     * @link      http://utf8.hk/
     */
    public function carmis()
    {
        return $this->hasMany(Carmis::class, 'goods_id');
    }

    /**
     * 库存读取器,将自动发货的库存更改为未出售卡密的数量
     *
     * @author    assimon<ashang@utf8.hk>
     * @copyright assimon<ashang@utf8.hk>
     * @link      http://utf8.hk/
     */
    public function getInStockAttribute()
    {
        if (isset($this->attributes['carmis_count'])
            &&
            $this->attributes['type'] == self::AUTOMATIC_DELIVERY
        ) {
           $this->attributes['in_stock'] = $this->attributes['carmis_count'];
        }
        return $this->attributes['in_stock'];
    }

    /**
     * 获取组建映射
     *
     * @return array
     *
     * @author    assimon<ashang@utf8.hk>
     * @copyright assimon<ashang@utf8.hk>
     * @link      http://utf8.hk/
     */
    public static function getGoodsTypeMap()
    {
        return [
            self::AUTOMATIC_DELIVERY => admin_trans('goods.fields.automatic_delivery'),
            self::MANUAL_PROCESSING => admin_trans('goods.fields.manual_processing')
        ];
    }

    /**
     * 获取当前语言的商品名称
     *
     * @return string
     */
    public function getLocalizedNameAttribute()
    {
        $locale = app()->getLocale();
        
        if ($locale === 'en' && !empty($this->gd_name_en)) {
            return $this->gd_name_en;
        }
        
        return $this->gd_name;
    }

    /**
     * 获取当前语言的商品描述
     *
     * @return string
     */
    public function getLocalizedDescriptionAttribute()
    {
        $locale = app()->getLocale();
        
        if ($locale === 'en' && !empty($this->gd_description_en)) {
            return $this->gd_description_en;
        }
        
        return $this->gd_description;
    }

    /**
     * 获取当前语言的商品关键字
     *
     * @return string
     */
    public function getLocalizedKeywordsAttribute()
    {
        $locale = app()->getLocale();
        
        if ($locale === 'en' && !empty($this->gd_keywords_en)) {
            return $this->gd_keywords_en;
        }
        
        return $this->gd_keywords;
    }

    /**
     * 获取当前语言的购买提示
     *
     * @return string
     */
    public function getLocalizedBuyPromptAttribute()
    {
        $locale = app()->getLocale();
        
        if ($locale === 'en' && !empty($this->buy_prompt_en)) {
            return $this->buy_prompt_en;
        }
        
        return $this->buy_prompt;
    }

    /**
     * 获取当前语言的详细描述
     *
     * @return string
     */
    public function getLocalizedDetailDescriptionAttribute()
    {
        $locale = app()->getLocale();
        
        if ($locale === 'en' && !empty($this->description_en)) {
            return $this->description_en;
        }
        
        return $this->description;
    }

}
