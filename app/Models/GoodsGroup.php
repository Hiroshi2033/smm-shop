<?php

namespace App\Models;


use App\Events\GoodsGroupDeleted;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodsGroup extends BaseModel
{

    use SoftDeletes;

    protected $table = 'goods_group';

    protected $dispatchesEvents = [
        'deleted' => GoodsGroupDeleted::class
    ];

    /**
     * 可批量赋值字段 - 添加英语字段
     */
    protected $fillable = [
        'gp_name', 'gp_name_en', 'is_open', 'ord'
    ];

    /**
     * 关联商品
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @author    assimon<ashang@utf8.hk>
     * @copyright assimon<ashang@utf8.hk>
     * @link      http://utf8.hk/
     */
    public function goods()
    {
        return $this->hasMany(Goods::class, 'group_id');
    }

    /**
     * 获取当前语言的分类名称
     *
     * @return string
     */
    public function getLocalizedNameAttribute()
    {
        $locale = app()->getLocale();
        
        if ($locale === 'en' && !empty($this->gp_name_en)) {
            return $this->gp_name_en;
        }
        
        return $this->gp_name;
    }

}
