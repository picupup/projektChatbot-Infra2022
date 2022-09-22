#!/bin/bash
#<<runTest.sh>>
#infra team e
#2022-09-20_17:13:35
#
#\Thema: this script simply runs the Test.sh and gives it different Loop Numbers for the curl.sh script and after each test it saves the test result (png picture ) and carries on.
testNr=${1:-4} #Number of loops in this file 
mass=${2:-200000} #Number of loops in curl.sh file
case=${3:-1}
loopNr=10
counter=1
out=/var/www/html/$USER
result=$out/test_result
mkdir -p $result
mkdir -p ~/tmp
touch ~/tmp/test.log
testF=~/tmp/tmpTest
mkdir -p $testF
rm -r $testF/*

f=""
for i in $(seq 1 $testNr);do
  loopNr=$(($i * $mass))
  echo "curl test Nr: 10000 x $loopNr"
  if test ! -e $result/$loopNr\_$case.png ;then

    ./Test.sh $loopNr $case > ~/tmp/test.log
    if test -n "$!";then #Returns true if the string or file exists.
     f="Number of requests were to big to handle"
     break
    fi

  cp $out/last.png $testF/$loopNr\_$case.png

  echo "https://informatik.hs-bremerhaven.de/$USER/test_result/$loopNr.png"
  else
    echo -e "\nThis particular Test ($loopNr case: $case) is being skiped since it already exists online.\n"
  fi
done

if test -z "$f";then
  #rm -r $result/*
  cp $testF/* $result/
exit 1
fi

echo "$f"

