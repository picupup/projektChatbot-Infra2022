#!/bin/bash
#file getstatistic.sh
#topic: It responses to a request comming from docker and returns statistics.

#set -xv
beginD=${1:?"Please insert starting date and time."} # e.g 2022-09-10 12:30:12
beginT=${2:?"Please insert starting date and time."} # e.g 2022-09-10 12:30:12
endD=${3:?"Please isnert ending time and date."}
endT=${4:?"Please isnert ending time and date."}
f1=$HOME/tmp/dockerstatswatch/data.txt
cat $f1 | sed -n "/^$beginD $beginT/,/^$endD $endT/p" | cut -d "%" -f 1 | rev | cut -d " " -f 1 | rev
#cat $f1 | sed -n "/^$beginD $beginT/,/^$endD $endT/p"
