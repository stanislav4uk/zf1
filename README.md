Installation instructions:

1) Install web server:
   Apache https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-14-04 
or Nginx https://www.digitalocean.com/community/tutorials/how-to-set-up-nginx-server-blocks-virtual-hosts-on-ubuntu-14-04-lts

2) Besides standard vhost settings setup Cache-Control (don't forget to reload the webserver afterwards):
   - Apache2 (if you haven't enabled expires module yet it's about time. For this use: `a2enmod expires`):

     <VirtualHost *:80>
         ...
         <IfModule mod_expires.c>
             <FilesMatch "\.(ico|pdf|flv|jpg|jpeg|png|gif|js|css|swf)$">
                 Header set Cache-Control "max-age=604800, public"
             </FilesMatch>
         </IfModule>
         ...
     </VirtualHost>

   - Nginx

     server {
         ...
         location ~* ^.+\.(rss|atom|jpg|jpeg|gif|png|ico|rtf|js|css)$ {
             expires max;
         }
         ...
     }

3) Install Redis https://www.digitalocean.com/community/tutorials/how-to-configure-redis-caching-to-speed-up-wordpress-on-ubuntu-14-04

   NOTE! Don't forget about security. Leaving Redis with it's default settings may b e insecure. For more details follow this link http://antirez.com/news/96

4) Install Composer https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx

5) Clone project in local directory using following command:

   git clone https://github.com/stanislav4uk/zf1.git /path/to/zf1 

6) In order to install dependencies cd into a newly created folder and run 
   
   composer install

7) Configure access to the database in your project file app/application/configs/application.ini (database should already exist)

8) Run migration

   php vendor/bin/phinx migrate -e development

   NOTE! MySQL setup is optional since application uses Redis to store exchange rates by default.

9) Execute following command to fetch exchange rates from remote source:

   php /path/to/app/cronjobs/rates.php -a cron/rates

10) In order to get exchange rates up-to-date you should also setup a cron job to run with required frequency (once per hour in our case): 

   0 */1 * * * php /path/to/app/cronjobs/rates.php -a cron/rates

11) Open the page in the browser using the link you set in vhost settings