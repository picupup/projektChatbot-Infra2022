#!/bin/bash
#<<curlCommand.sh>>
#team infra 2022
#2022-09-06_12:47:18
#\Thema:This script is a one time curl of the website
# Wichtig da dockerstatwatch einmaig für immer läuft sollt ./startstate.sh einmalig durchgeführt werden.

input=${1:-"how are you"}
input=$(echo "$input" |sed -E "s/ /%20/g")
mkdir -p ~/tmp/dockerstatswatch

dateBegin="$(date '+%Y-%m-%d')"
hourBegin="$(date '+%H:%M:%S')"
echo -e "Starting at \n $dateBegin $hourBegin" 
sleep 0.3

dir=$(pwd)
./curl.sh

cd $dir

dateEnd="$(date '+%Y-%m-%d')"
hourEnd="$(date '+%H:%M:%S')"

sleep 0.3
imgtxt=$HOME/tmp/dockerstatswatch/img.txt
touch $imgtxt
echo -n "" > $imgtxt

data=$(cd $dir && ./getstatistic.sh $dateBegin $hourBegin $dateEnd $hourEnd)
echo -n $data > $imgtxt
echo -e "data:\n $data"
if test -z "$data";then 
  echo -e "There were no input from dockerstatwatch.\n Exiting now"
  exit 1
fi 
echo "section 1"
./timeCreator.sh
echo "section 2"
./createPlotPng.sh
echo "section 3"
echo -e "\nEnding at $dateEnd $hourEnd"

echo -e "check out the results under \n https://informatik.hs-bremerhaven.de/$USER/last.png"
