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
14. 调整404页面

15. 可以使用工具格式化html代码:	eg:http://www.sojson.com/jshtml.html

16. 资源控制器

17. sublime 安装 laravel artisan 插件
18. 将代码回推 shift + tab

19. 隐式控制器和restful控制器区别 (都是为了简化路由规则)
	1. restful  1 = 7
		隐式	1 = n
	2. restful 控制器会自动帮我们生成方法名 更加简洁一些 隐式控制器则不会
	3. 方法名 隐式控制器 需要在方法名前面添加 请求方法(get, post)
20. 分类的规律
	如果是顶级分类 则 pid 和 path都是0
	如果不是顶级分类 则pid应该是父级分类的id, path应该是父级分类的path, 父级分类的id

	分类显示按父子分类排序:select *,concat(path,',',id) as paths from cates order by paths; => concat()连接字符串

21. ErrorException in 5aaf0ae1bb6f027141d96fe0e84b46e3 line 36: 这样的问题 解决方案
	sublime 快捷键 ctrl + p 找文件		ctrl + g 定位行数

22. 请求方法伪造
	<form action="/foo/bar" method="POST">
	    <input type="hidden" name="_method" value="PUT">
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>