#!/bin/bash
#<<curlCommand.sh>>
#team infra 2022
#2022-09-06_12:47:18
#\Thema:This script is a one time curl of the website
# Wichtig da dockerstatwatch einmaig für immer läuft sollt ./startstate.sh einmalig durchgeführt werden.

input=${1:-"how are you"}
input=$(echo "$input" |sed -E "s/ /%20/g")
#echo "$input"
#./startstate.sh
sleep 0.7
dateBegin="$(date '+%Y-%m-%d')"
hourBegin="$(date '+%H:%M:%S')"
echo -e "Starting at \n $dateBegin $hourBegin" 
for i in {0..3}; do

  nohup $( seq 10000 | parallel ulimit -u --max-args 0 --jobs 1020 "curl -X 'GET' -s https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/call_test.php?question='$input'" ) >/dev/null 2>&1&

done

seq 10000 | parallel --max-args 0 --jobs 1020 "curl -X 'GET' -s https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/call_test.php?question='$input'" >/dev/null


#echo "$(date '+%Y-%m-%d_%H:%M:%S')"

dateEnd="$(date '+%Y-%m-%d')"
hourEnd="$(date '+%H:%M:%S')"

sleep 0.7

f1=~/tmp/dockerstatswatch/data.txt
imgtxt=~/tmp/dockerstatswatch/img.txt
touch ~/tmp/dockerstatswatch/img.txt

cat $f1 | sed -n "/^$dateBegin $hourBegin/,/^$dateEnd $hourEnd/p" | cut -d "%" -f 1 | rev | cut -d " " -f 1 | rev > $imgtxt
#cat $f1 | sed -n "/$dateBegin $hourBegin/,/$dateEnd $hourEnd/p"
./timeCreator.sh
./createPlotPng.sh
echo -e "\nEnding at $dateEnd $hourEnd"

echo -e "check out the results under \n https://informatik.hs-bremerhaven.de/$USER/last.png"
