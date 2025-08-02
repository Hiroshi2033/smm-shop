-- 修复商品分类多语言字段缺失问题
-- 请在您的数据库管理工具中执行此SQL

-- 为商品分类表添加英语名称字段
ALTER TABLE `goods_group` 
ADD COLUMN `gp_name_en` VARCHAR(200) NULL COMMENT '分类名称(英语)' AFTER `gp_name`;

-- 验证字段是否添加成功
DESCRIBE `goods_group`;

-- 查看现有分类数据
SELECT id, gp_name, gp_name_en, is_open FROM `goods_group`;