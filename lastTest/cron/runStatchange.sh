#!/bin/bash


mkdir -p ~/tmp
mkdir -p ~/tmp/dockerstatswatch

f1=$HOME/tmp/dockerstatswatch/dataB.txt
f2=$HOME/tmp/dockerstatswatch/err.log

touch $f1
touch $f2

line=$(cat $HOME/tmp/dockerstatswatch/dataB.txt |wc -l)
sleep 0.7
line2=$(cat $HOME/tmp/dockerstatswatch/dataB.txt |wc -l)
if test $line2 -gt $line;then
	line=$(tail -1 $HOME/tmp/dockerstatswatch/dataB.txt |grep "\-\-")
	if test -z "$line";then
		exit -1
	fi
fi


echo -n "" > $f1
sudo -u l-admin /usr/local/bin/sudo_hbv_dockerstatswatch |ts '%F %T'|grep --line-buffered -v 'CONTAINER' > $f1 2>&1& 

#echo $!
