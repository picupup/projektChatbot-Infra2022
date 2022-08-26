#!/bin/bash
# dst=/var/www/html/infra-2022-e/
# cp -r www/* $dst
# currentdate=$(date)
# echo "$currentdate" > $dst/happy.txt
# happy=$(curl -s https://informatik.hs-bremerhaven.de/infra-2022-e/happy.txt)
# echo "$happy"
# echo "$currentdate"
# if ["$happy" = "$currentdate"]; then
#   echo happy
# fi
# curl -s https://informatik.hs-bremerhaven.de/infra-2022-e/*|html2text -utf8



dst2=/var/www/html/docker-$USER-web/
ssh mydocker "mkdir -p $dst2"
scp -r www/* mydocker:$dst2

