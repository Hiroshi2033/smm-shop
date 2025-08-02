<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultilangToGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods', function (Blueprint $table) {
            // 添加英语版本的字段
            $table->string('gd_name_en', 200)->nullable()->comment('商品名称(英语)')->after('gd_name');
            $table->string('gd_description_en', 200)->nullable()->comment('商品描述(英语)')->after('gd_description');
            $table->string('gd_keywords_en', 200)->nullable()->comment('商品关键字(英语)')->after('gd_keywords');
            $table->text('buy_prompt_en')->nullable()->comment('购买提示(英语)')->after('buy_prompt');
            $table->text('description_en')->nullable()->comment('商品详细描述(英语)')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->dropColumn([
                'gd_name_en',
                'gd_description_en', 
                'gd_keywords_en',
                'buy_prompt_en',
                'description_en'
            ]);
        });
    }
}