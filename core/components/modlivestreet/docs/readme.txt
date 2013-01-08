--------------------
modLivestreet
LiveStreet runner plugin
Плагин для взаимодействия с LiveStreet
--------------------

Author: Nikolay Lanets <n.lanets@newpg.ru>
http://modxlivestreet.ru/
--------------------

After install configure rewrite rules for Livestreet static files on your web-server.
Samples:

location /templates/{
    root   /var/www/site.ru/livestreet/public_html;
    access_log   off;
    expires      30d;
}
location /uploads/{
    root   /var/www/site.ru/livestreet/public_html;
    access_log   off;
    expires      30d;
}
location ~/engine/.*\.js{
    root   /var/www/site.ru/livestreet/public_html;
    access_log   off;
    expires      30d;
}


