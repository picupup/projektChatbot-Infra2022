#!/bin/bash
#<<erstelle_DB_zugang.sh>>
#team infra chat bot
#2022-08-26_09:13:26
#Thema: Erstelt im Ordner "private" den Zugang zur DatenBank

# wenn das Verzeichnis nicht existiert, wird es erstellt

con_redis=/var/www/html/$USER/private/redis.inc.php
con=/var/www/html/$USER/private/dbconnection.inc.php
dir=/var/www/html/$USER/private/

if test ! -e $con_redis; then
	echo "<?php" > $con_redis;
	echo "\$redispassword='_pw_';" >> $con_redis;
	echo "\$redisport='_port_';" >> $con_redis;
	echo "?>" >> $con_redis;
	pwline=$(grep ^password ~/.my.cnf|head -n1)
	pw=${pwline#*=}
	sed -i "s/_pw_/$pw/" $con_redis
	port=$(hbv_dockerport redis)
	sed -i "s/_port_/$port/" $con_redis
fi

if test ! -e $con;then
  echo "Im in the if statment";
  (umask 007; mkdir -p $dir ; echo "created => private");
  touch $con;
  cat ~/.my.cnf | grep = | sed -E -e 's/^/$/g' -e 's/=/="/g' -e 's/$/";/g'  | (echo "<?php" ; cat) > $con;
fi

# kopiert den Inhalt von /private/ ins Web-Verzeichnis des jeweiligen Docker-Containers

ssh mydocker "mkdir -p /var/www/html/docker-$USER-web/private/"
scp $dir/* mydocker:/var/www/html/docker-$USER-web/private/


