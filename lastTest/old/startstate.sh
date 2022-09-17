#!/bin/bash
#<<startstate.sh>>
#team e infra
#2022-09-11_17:46:50
#\Thema: save docker statistcs in a file
# Please excecute this once

mkdir -p ~/tmp
mkdir -p ~/tmp/dockerstatswatch

f1=$HOME/tmp/dockerstatswatch/dataC.txt
f2=$HOME/tmp/dockerstatswatch/err.log

touch $f1
touch $f2


echo -n "" > $f1

/usr/local/bin/hbv_dockerstatswatch > $f1 2>&1 &

echo $!
