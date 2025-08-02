<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultilangToGoodsGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods_group', function (Blueprint $table) {
            // 添加英语版本的分类名称字段
            $table->string('gp_name_en', 200)->nullable()->comment('分类名称(英语)')->after('gp_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods_group', function (Blueprint $table) {
            $table->dropColumn('gp_name_en');
        });
    }
}