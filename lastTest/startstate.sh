#!/bin/bash
#<<startstate.sh>>
#team e infra
#2022-09-11_17:46:50
#\Thema: save docker statistcs in a file
# Please excecute this once

mkdir -p ~/tmp
mkdir -p ~/tmp/dockerstatswatch
touch ~/tmp/dockerstatswatch/data22.txt
touch ~/tmp/dockerstatswatch/err.log

f1=~/tmp/dockerstatswatch/data.txt
f2=~/tmp/dockerstatswatch/err.log

echo -e "" > $f1

hbv_dockerstatswatch >> $f1 2> $f2 &

echo $!
