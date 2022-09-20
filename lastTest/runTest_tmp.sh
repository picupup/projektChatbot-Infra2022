#!/bin/bash
#<<runTest.sh>>
#infra team e
#2022-09-20_17:13:35
#
#\Thema: this script simpily runs the startTest.sh and gives it different Loop Numbers for the curl.sh script and after each test it saves the test result (png picture ) and carries on.
loopNr=10
counter=1
out=/var/www/html/$USER
mkdir -p $out/test_result
rm -r $out/test_result/*
out=/var/www/html/$USER
touch ~/tmpt/test.log


for i in {1..10};do
  loopNr=$(($loopNr * $counter))
  ./startTest.sh $loopNr > ~/tmpt/test.log
  cp $out/last.png $out/test_result/$loopNr.png
  echo "https://informatik.hs-bremerhaven.de/$USER/test_result/$loopNr.png"
  counter=$(($counter + 1))
done
