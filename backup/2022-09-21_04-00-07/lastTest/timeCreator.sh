#!/bin/bash
#<<timeCreator.sh>>
#erfkarimi
#2022-09-12_23:34:50
#\Thema:
#
imgtxt=~/tmp/dockerstatswatch/img.txt
imgtxtTime=~/tmp/dockerstatswatch/img2.txt
touch ~/tmp/dockerstatswatch/img2.txt;
counter=0
echo -n "" > $imgtxtTime
for i in $(cat $imgtxt); do 
   echo -e "$(($counter / 60)):$(($counter % 60))\t$i"
   counter=$(($counter + 1))
done > $imgtxtTime
