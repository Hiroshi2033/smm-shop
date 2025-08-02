# 卡站多语言功能设置指南

## 概述
已为您的卡站添加了完整的多语言功能，支持**简体中文**和**英语**。包括：
- 前端用户界面多语言切换
- 后台商品管理多语言支持
- 后台商品分类多语言支持
- 商品信息多语言显示
- 商品分类多语言显示

## 安装步骤

### 1. 执行数据库迁移
请在您的数据库中执行以下SQL文件：
```bash
mysql -u [用户名] -p [数据库名] < database/sql/add_multilang_fields.sql
```

或者手动执行SQL：
```sql
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
```

### 2. 功能介绍

#### 前端功能
- **语言切换按钮**：在所有主题的导航栏都添加了语言切换功能
- **自动语言记忆**：用户选择的语言会保存在session中
- **多主题支持**：支持Hyper、Luna、Unicorn三个主题

#### 后台管理功能
- **商品多语言编辑**：后台商品管理页面现在分为多个标签页：
  - 基本信息：包含中英文名称、描述、关键字
  - 价格与库存：价格设置和库存管理
  - 商品详情：中英文购买提示和详细描述
  - 高级配置：其他高级设置

- **商品分类多语言编辑**：后台分类管理页面支持：
  - 基本信息：中英文分类名称设置
  - 智能回退：未设置英文名称时自动显示中文名称
  - 系统信息：创建和更新时间

### 3. 使用方法

#### 后台管理员

**商品管理：**
1. 进入后台 → 商品管理 → 商品
2. 创建或编辑商品时，填写中文信息（必填）
3. 可选择性填写英文信息（如不填写英文版本，前端会自动显示中文）
4. 保存后，前端会根据用户选择的语言自动显示对应版本

**商品分类管理：**
1. 进入后台 → 商品管理 → 商品分类
2. 创建或编辑分类时，填写中文分类名称（必填）
3. 可选择性填写英文分类名称（如：Instagram Accounts、Facebook Accounts等）
4. 前端分类导航会根据用户语言显示对应版本

#### 前端用户
1. 在网站导航栏找到语言切换按钮/下拉菜单
2. 选择"简体中文"或"English"
3. 页面会立即切换到所选语言
4. 商品信息会显示对应语言版本（如有）

### 4. 卡站业务优势

- **国际化销售**：支持英文用户购买社交媒体账号
- **本地化体验**：不同语言用户看到母语界面和分类
- **专业分类**：Instagram账号、Facebook账号等分类支持中英文显示
- **SEO优化**：搜索引擎能正确识别多语言内容
- **管理便捷**：后台一次设置，前端自动切换

#### 📱 卡站分类示例

**中文分类示例：**
- Instagram账号
- Facebook账号  
- Twitter账号
- TikTok账号
- YouTube账号

**对应英文分类：**
- Instagram Accounts
- Facebook Accounts
- Twitter Accounts
- TikTok Accounts
- YouTube Accounts

### 5. 技术特性

- **智能回退**：如果某个商品或分类没有英文版本，自动显示中文版本
- **SEO友好**：正确设置HTML语言属性
- **访问器模式**：使用Laravel访问器实现多语言字段
- **向后兼容**：不影响现有中文内容

### 6. 扩展其他语言

如需添加更多语言支持：

1. 在 `config/dujiaoka.php` 中添加新语言配置：
```php
'language' => [
    'zh_CN' => '简体中文',
    'zh_TW' => '繁体中文',
    'en' => 'English',
    'ja' => '日本語',  // 示例：日语
],
```

2. 为商品表和分类表添加对应字段（如 `gd_name_ja`、`gp_name_ja`）
3. 在 `resources/lang/` 下创建对应语言文件夹
4. 修改模型访问器和服务层逻辑

## 故障排除

### 语言切换不生效
- 检查session存储是否正常工作
- 确认路由 `/switch-language/{locale}` 可访问

### 英文内容不显示
- 确认数据库字段已正确添加
- 检查是否填写了英文内容
- 验证访问器方法是否正常工作

### 后台表单报错
- 确认已执行数据库迁移
- 检查模型的 `fillable` 属性是否包含新字段

## 完成！
您的卡站现在已支持中英双语，可以为不同语言的用户提供本地化体验！🎉