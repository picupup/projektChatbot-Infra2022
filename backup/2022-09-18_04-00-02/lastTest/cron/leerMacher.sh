#!/bin/bash


mkdir -p ~/tmp
mkdir -p ~/tmp/dockerstatswatch

f1=$HOME/tmp/dockerstatswatch/dataB.txt
f2=$HOME/tmp/dockerstatswatch/err.log

touch $f1
touch $f2

echo -n "" > $f1
echo -n "" > $f2

#echo $!
