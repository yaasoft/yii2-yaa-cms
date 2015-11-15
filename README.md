# YEE CMS
YeeCMS - Control Panel Based On Yii2 PHP Framework

Installation
------------

### Installing Yee CMS application. 

  1. Installing (using Composer)

    If you do not have [Composer](http://getcomposer.org/), follow the instructions in the
    [Installing Yii](https://github.com/yiisoft/yii2/blob/master/docs/guide/start-installation.md#installing-via-composer) section of the definitive guide to install it.

    With Composer installed, you can then install the application using the following commands:

    ```bash
    cd /var/www/
    composer global require "fxp/composer-asset-plugin:~1.0.0"
    composer create-project --prefer-dist --stability=dev yeesoft/yii2-yee-cms mysite.com 
    ```

  2. Initialize the installed application

     Execute the `init` command and select `dev` or `prod` as environment.

      ```bash
      cd /var/www/mysite.com/
      php init
      ```
  
  3. Configurate your web server:

     For Apache config file could be the following:
     
     ```apacheconf
     <VirtualHost *:80>
       ServerName mysite.com
       ServerAlias www.mysite.com
       DocumentRoot "/var/www/mysite.com/"
       <Directory "/var/www/mysite.com/">
         AllowOverride All
       </Directory>
     </VirtualHost>
     ```
       
  4. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.

  5. Apply all migrations with console command `php yii migrate --migrationLookup=@yeesoft/yii2-yee-core/migrations/,@yeesoft/yii2-yee-auth/migrations/,@yeesoft/yii2-yee-settings/migrations/,@yeesoft/yii2-yee-menu/migrations/,@yeesoft/yii2-yee-user/migrations/,@yeesoft/yii2-yee-translation/migrations/,@yeesoft/yii2-yee-media/migrations/,@yeesoft/yii2-yee-post/migrations/,@yeesoft/yii2-yee-page/migrations/,@yeesoft/yii2-comments/migrations/,@yeesoft/yii2-yee-comment/migrations/`.

  6. Configurate your mailer `['components']['mailer']` in `common/config/main-local.php`.

#####Your `Yee CMS` application is installed. Visit your site, the site should work and message _Congratulations! You have successfully created your Yii-powered application_ should be displayed.
