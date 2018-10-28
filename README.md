<p align="center">
    <a href="https://github.com/yaasoft/yii2-yaa-cms" target="_blank">
        <img src="https://avatars1.githubusercontent.com/u/9977297?s=400&v=4" width="400" alt="Yee cms" />
    </a>
</p>

# YAA CMS
YaaCMS - панель управления на Yii2 PHP Framework

Установка
------------
 
 ### 1. Установка Composer.
    
    
   Если Composer еще не установлен это можно сделать по инструкции на
   [getcomposer.org](https://getcomposer.org/download/).
   
   Если Composer установлен, вы можете установить приложение используя следующие команды:
    
   ```bash
   composer global require "fxp/composer-asset-plugin:^1.2.0"
   composer create-project --prefer-dist --stability=dev yaasoft/yii2-yaa-cms mysite.com 
   ```

 ### 2. Инициализируем установленное приложение

   Выполните команду `init` и выберите `dev` или `prod` в качестве среды.

   ```bash
   php init
   ```
  
 ### 3. Настройка веб сервера:

   Для Apache:
     
     ```apacheconf
      <VirtualHost *:80>
             ServerName frontend.test
             DocumentRoot "/path/to/yii-application/frontend/web/"
             
             <Directory "/path/to/yii-application/frontend/web/">
                 # use mod_rewrite for pretty URL support
                 RewriteEngine on
                 # If a directory or a file exists, use the request directly
                 RewriteCond %{REQUEST_FILENAME} !-f
                 RewriteCond %{REQUEST_FILENAME} !-d
                 # Otherwise forward the request to index.php
                 RewriteRule . index.php
     
                 # use index.php as index file
                 DirectoryIndex index.php
     
                 # ...other settings...
                 # Apache 2.4
                 Require all granted
                 
                 ## Apache 2.2
                 # Order allow,deny
                 # Allow from all
             </Directory>
         </VirtualHost>
         
         <VirtualHost *:80>
             ServerName backend.test
             DocumentRoot "/path/to/yii-application/backend/web/"
             
             <Directory "/path/to/yii-application/backend/web/">
                 # use mod_rewrite for pretty URL support
                 RewriteEngine on
                 # If a directory or a file exists, use the request directly
                 RewriteCond %{REQUEST_FILENAME} !-f
                 RewriteCond %{REQUEST_FILENAME} !-d
                 # Otherwise forward the request to index.php
                 RewriteRule . index.php
     
                 # use index.php as index file
                 DirectoryIndex index.php
     
                 # ...other settings...
                 # Apache 2.4
                 Require all granted
                 
                 ## Apache 2.2
                 # Order allow,deny
                 # Allow from all
             </Directory>
         </VirtualHost>
     ```
   Для Nginx:
     
     ```nginx
     server {
             charset utf-8;
             client_max_body_size 128M;
     
             listen 80; ## listen for ipv4
             #listen [::]:80 default_server ipv6only=on; ## listen for ipv6
     
             server_name frontend.test;
             root        /path/to/yii-application/frontend/web/;
             index       index.php;
     
             access_log  /path/to/yii-application/log/frontend-access.log;
             error_log   /path/to/yii-application/log/frontend-error.log;
     
             location / {
                 # Redirect everything that isn't a real file to index.php
                 try_files $uri $uri/ /index.php$is_args$args;
             }
     
             # uncomment to avoid processing of calls to non-existing static files by Yii
             #location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
             #    try_files $uri =404;
             #}
             #error_page 404 /404.html;
     
             # deny accessing php files for the /assets directory
             location ~ ^/assets/.*\.php$ {
                 deny all;
             }
     
             location ~ \.php$ {
                 include fastcgi_params;
                 fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
                 fastcgi_pass 127.0.0.1:9000;
                 #fastcgi_pass unix:/var/run/php5-fpm.sock;
                 try_files $uri =404;
             }
         
             location ~* /\. {
                 deny all;
             }
         }
          
         server {
             charset utf-8;
             client_max_body_size 128M;
         
             listen 80; ## listen for ipv4
             #listen [::]:80 default_server ipv6only=on; ## listen for ipv6
         
             server_name backend.test;
             root        /path/to/yii-application/backend/web/;
             index       index.php;
         
             access_log  /path/to/yii-application/log/backend-access.log;
             error_log   /path/to/yii-application/log/backend-error.log;
         
             location / {
                 # Redirect everything that isn't a real file to index.php
                 try_files $uri $uri/ /index.php$is_args$args;
             }
         
             # uncomment to avoid processing of calls to non-existing static files by Yii
             #location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
             #    try_files $uri =404;
             #}
             #error_page 404 /404.html;
     
             # deny accessing php files for the /assets directory
             location ~ ^/assets/.*\.php$ {
                 deny all;
             }
     
             location ~ \.php$ {
                 include fastcgi_params;
                 fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
                 fastcgi_pass 127.0.0.1:9000;
                 #fastcgi_pass unix:/var/run/php5-fpm.sock;
                 try_files $uri =404;
             }
         
             location ~* /\. {
                 deny all;
             }
         }
     ```
     
       
 ### 4. Настраиваем приложение
 Создайте новую базу данных и внесите соответствующие изменения в секцию `components.db` файла `common/config/main-local.php`

  Примените миграции при помощи консольной команды:
  
  ```php
  php yii migrate --migrationLookup=@yeesoft/yii2-yee-core/migrations/,@yeesoft/yii2-yee-auth/migrations/,@yeesoft/yii2-yee-settings/migrations/,@yeesoft/yii2-yee-menu/migrations/,@yeesoft/yii2-yee-user/migrations/,@yeesoft/yii2-yee-translation/migrations/,@yeesoft/yii2-yee-media/migrations/,@yeesoft/yii2-yee-post/migrations/,@yeesoft/yii2-yee-page/migrations/,@yeesoft/yii2-comments/migrations/,@yeesoft/yii2-yee-comment/migrations/,@yeesoft/yii2-yee-seo/migrations/.
  ```

 ### 6. Создаем Администратора
 
 Выполните в консоли: `php yii init-admin` и введите данные.

 ### 7. Настраиваем почту
 Внесите изменения в секцию `['components']['mailer']` в файле `common/config/main-local.php`.


 ### На этом установка Yaa Сms завершена.
