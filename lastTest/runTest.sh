#!/bin/bash
#<<runTest.sh>>
#infra team e
#2022-09-20_17:13:35
#
#\Thema: this script simpily runs the startTest.sh and gives it different Loop Numbers for the curl.sh script and after each test it saves the test result (png picture ) and carries on.
testNr=${1:-4} #Number of loops in this file 
mass=${2:-200000} #Number of loops in curl.sh file
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


for i in $(seq 1 $testNr);do
  loopNr=$(($i * $mass))
  echo "curl test Nr: 1000 x $loopNr"
  ./startTest.sh $loopNr > ~/tmp/test.log
  cp $out/last.png $testF/$loopNr.png
  echo "https://informatik.hs-bremerhaven.de/$USER/test_result/$loopNr.png"
done
  
rm -r $result/*
cp $testF/* $result/
