-- 为商品表和商品分类表添加多语言字段
-- 请在数据库中手动执行此SQL文件

-- 1. 为商品表添加多语言字段
ALTER TABLE `goods` 
ADD COLUMN `gd_name_en` VARCHAR(200) NULL COMMENT '商品名称(英语)' AFTER `gd_name`,
ADD COLUMN `gd_description_en` VARCHAR(200) NULL COMMENT '商品描述(英语)' AFTER `gd_description`,
ADD COLUMN `gd_keywords_en` VARCHAR(200) NULL COMMENT '商品关键字(英语)' AFTER `gd_keywords`,
ADD COLUMN `buy_prompt_en` TEXT NULL COMMENT '购买提示(英语)' AFTER `buy_prompt`,
ADD COLUMN `description_en` TEXT NULL COMMENT '商品详细描述(英语)' AFTER `description`;

-- 2. 为商品分类表添加多语言字段
ALTER TABLE `goods_group` 
ADD COLUMN `gp_name_en` VARCHAR(200) NULL COMMENT '分类名称(英语)' AFTER `gp_name`;

-- 3. 验证字段是否添加成功
DESCRIBE `goods`;
DESCRIBE `goods_group`;