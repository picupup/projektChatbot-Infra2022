#!/bin/bash
#<<curlCommand.sh>>
#team infra 2022
#2022-09-06_12:47:18
#\Thema:This script is a one time curl of the website
#

input=${1:-"how are you"}
input=$(echo "$input" |sed -E "s/ /%20/g")
#echo "$input"
./startstate.sh

dateBegin="$(date '+%Y-%m-%d')"
hourBegin="$(date '+%H:%M:%S')"

seq 10000 | parallel --max-args 0 --jobs 1020 "curl -X 'GET' -s https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/call_test.php?question='$input'" >/dev/null


#echo "$(date '+%Y-%m-%d_%H:%M:%S')"

dateEnd="$(date '+%Y-%m-%d')"
hourEnd="$(date '+%H:%M:%S')"


f1=~/tmp/dockerstatswatch/data.txt

echo -e "Data will be shwon now \n $dateBegin $hourBegin" 


cat $f1 | sed -n "/^$dateBegin $hourBegin/,/^$dateEnd $hourEnd/p" | cut -d "%" -f 1 | rev | cut -d " " -f 1 | rev

mkdir -p ~/tmp
f2=~/tmp/last.gp
touch $f2
  #Gnuplot erzeugen
echo -e "\n $dateEnd $hourEnd" 
