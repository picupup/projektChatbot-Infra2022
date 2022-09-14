#!/bin/bash
#<<curlCommand.sh>>
#team infra 2022
#2022-09-06_12:47:18
#\Thema:This script is a one time curl of the website
# Wichtig da dockerstatwatch einmaig für immer läuft sollt ./startstate.sh einmalig durchgeführt werden.

input=${1:-"how are you"}
input=$(echo "$input" |sed -E "s/ /%20/g")
mkdir -p ~/tmp/dockerstatswatch
echo -n "" > ~/tmp/dockerstatswatch/data.txt

#echo "$input"
./startstate.sh
#sleep 0.7
dateBegin="$(date '+%Y-%m-%d')"
hourBegin="$(date '+%H:%M:%S')"
echo -e "Starting at \n $dateBegin $hourBegin" 
sleep 0.3

tmpDir=$(pwd)
./curl.sh

echo "in between"
cd $tmpDir

#nohup $( seq 1000 | parallel --max-args 0 --jobs 100"curl -X 'GET' -s https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/call_test.php?question='$input'" ) >/dev/null 2>&1&

#echo "$(date '+%Y-%m-%d_%H:%M:%S')"

dateEnd="$(date '+%Y-%m-%d')"
hourEnd="$(date '+%H:%M:%S')"

sleep 0.3

imgtxt=~/tmp/dockerstatswatch/img.txt
touch ~/tmp/dockerstatswatch/img.txt
echo -n "" > $imgtxt
#ssh hopper repos/infra-2022-e/lastTest/dockerREQ/getstatistic.sh $dateBegin $hourBegin $dateEnd $hourEnd 
#cat $f1 | sed -n "/$dateBegin $hourBegin/,/$dateEnd $hourEnd/p"
./timeCreator.sh
./createPlotPng.sh
echo -e "\nEnding at $dateEnd $hourEnd"

ww=docker-infra-2022-e-web
if test $(echo $USER |grep docker) = "";then
  ww=$USER
fi
echo -e "check out the results under \n https://informatik.hs-bremerhaven.de/$ww/last.png"
