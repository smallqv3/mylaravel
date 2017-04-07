# 项目第一天内容

1. 分析项目 找出项目中的元素并进行建模 (navicat 该工具还可以导出sql语句)
2. 安装laravel (使用composer来安装,如果没有的话建议先安装composer)
3. 配置虚拟主机
4. 创建数据库设置字符集
5. 配置laravel的数据库连接信息
6. 使用'artisan'命令进行模型创建:`php artisan make:model User -m`:-m会自动帮我们创建建模文件,也就是数据迁移文件
7. 创建表结构,如果有关联表的话应该使用:`php artisan make:migration create_post_tag_table` 创建中间表
8. 运行命令来生成数据表:`php artisan migrate`
9. 创建路由规则访问网站后台
10. 在方法中解析模板(尽量做到前后台的一个划分)
11. 将目标模板中的源代码复制到指定的模板中
12. 将模板所需要的js、css、图片内容复制到项目的public目录下, 存放至一个目录中(admins:文件夹的名字不能跟路由名称重名)
13. 在模板中进行路径调整, 建议大家使用asset函数进行路径调整