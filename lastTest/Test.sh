#!/bin/bash
#<<curlCommand.sh>>
#team infra 2022
#2022-09-06_12:47:18
#\Thema:This script is a one time curl of the website
# Wichtig da dockerstatwatch einmaig für immer läuft sollt ./startstate.sh einmalig durchgeführt werden.
loopNr=${1:-10}
case=${2:-1}
mkdir -p ~/tmp/dockerstatswatch

dateBegin="$(date '+%Y-%m-%d')"
hourBegin="$(date '+%H:%M:%S')"
echo -e "Starting at \n $dateBegin $hourBegin" # "echo -e" is for considering \n for example
sleep 0.3

dir=$(pwd)
./curl.sh $loopNr $case # at this point the script trigger the curl-script is executed
cd $dir

dateEnd="$(date '+%Y-%m-%d')"
hourEnd="$(date '+%H:%M:%S')"

sleep 0.3
imgtxt=$HOME/tmp/dockerstatswatch/img.txt
touch $imgtxt
echo -n "" > $imgtxt

data=$(cd $dir && ./getstatistic.sh $dateBegin $hourBegin $dateEnd $hourEnd)
echo -n $data > $imgtxt # "echo -n" avoids the word wrap after the command
echo -e "data:\n $data" # "echo -e" enables echo to interpret \n.
if test -z "$data"
then                    # "test -z" returns 0 if "$data" exists.
  echo -e "There were no input from dockerstatwatch.\n Exiting now"
  exit 1
fi
./timeCreator.sh
./createPlotPng.sh "Project Test; Curl requests: 10000 x $loopNr; case: $case; Time:$dateBegin $hourBegin"
echo -e "\nEnding at $dateEnd $hourEnd"
echo -e "check out the results under \n https://informatik.hs-bremerhaven.de/$USER/last.png"
