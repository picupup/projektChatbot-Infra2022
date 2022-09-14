#!/bin/bash


mkdir -p ~/tmp
mkdir -p ~/tmp/dockerstatswatch

f1=$HOME/tmp/dockerstatswatch/data.txt
f2=$HOME/tmp/dockerstatswatch/err.log

touch $f1
touch $f2

line=$(cat $HOME/tmp/dockerstatswatch/dataB.txt |wc -l)
sleep 0.7
line2=$(cat $HOME/tmp/dockerstatswatch/dataB.txt |wc -l)
if test $line2 -gt $line;then
	exit -1
fi



echo -n "" > $f1

/usr/local/bin/hbv_dockerstatswatch > $f1 2>&1 

#echo $!
