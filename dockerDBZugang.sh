#!/bin/bash
#<<deploy_DB_zug_aufDocker.sh>>
#erfkarimi
#2022-09-07_21:28:46
#\Thema:
#



~/repos/infra-2022-e/erstelle_DB_zugang.sh

scp -r /var/www/html/$USER/private mydocker:/var/www/html/docker-$USER-web/
