#!/bin/bash
#<<runTest.sh>>
#infra team e
#2022-09-20_17:13:35
#
#\Thema: this script simpily runs the startTest.sh and gives it different Loop Numbers for the curl.sh script and after each test it saves the test result (png picture ) and carries on.
testNr=${1:-8}
loopNr=10
counter=1
out=/var/www/html/$USER
result=$out/test_result
mkdir -p $result
rm -r $result/*
out=/var/www/html/$USER
mkdir -p ~/tmp
touch ~/tmp/test.log


for i in $(seq 1 $testNr);do
  loopNr=$(($loopNr + $i * 1000))
  ./startTest.sh $loopNr > ~/tmp/test.log
  cp $out/last.png $result/$loopNr.png
  echo "https://informatik.hs-bremerhaven.de/$USER/test_result/$loopNr.png"
done
