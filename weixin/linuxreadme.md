1. 查看进程的用户名操作: ps -ef | grep php-fpm
                      ps -ef | grep nginx
2. 更改文件的所有者: chown -R www-data:www-data  网站目录 (你网站的目录就行 www下有一个aaa项目 那就是 chown -R www-data:www-data  aa/)
3. 更改目录权限: chmod 764 网站目录 -R

4. linux下创建数据库操作: CREATE SCHEMA `new_schema` DEFAULT CHARACTER SET utf8 ;('new_schema'是数据库名称)
