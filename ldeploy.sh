#!/bin/bash
dst2=/var/www/html/docker-$USER-web/robbi
currentdate=$(date)
echo "$currentdate" > happy.txt
scp -q happy.txt mydocker:$dst2/
rm happy.txt
happy=$(curl -s https://informatik.hs-bremerhaven.de/docker-$USER-web/robbi/happy.txt)
echo "$happy"
echo "$currentdate"
if [ "$happy" = "$currentdate" ]; then
   echo happy
 fi

curl -s https://informatik.hs-bremerhaven.de/docker-$USER-web/robbi/index.html |html2text -utf8

ssh mydocker "mkdir -p $dst2"
scp -rq www/* mydocker:$dst2

