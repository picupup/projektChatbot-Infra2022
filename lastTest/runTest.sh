#!/bin/bash
#<<runTest.sh>>
#infra team e
#2022-09-20_17:13:35
#
#\Thema: this script simply runs the Test.sh and gives it different Loop Numbers for the curl.sh script and after each test it saves the test result (png picture ) and carries on.
nr_of_runs=${1:-4}      #Number of loops in this file 
nr_of_curl_first_run=${2:-200000} #Number of loops in curl.sh file
curl_type=${3:-1}       #Number of curl_type in curl.sh

out=/var/www/html/$USER
result_path=$out/test_result
mkdir -p $result_path   # legt den Ordner "test_result" im webverzeichnis des Ausführers an.
mkdir -p ~/tmp          # legt den Ordner "tmp" im Homeverzeichnis des Ausführers an.
testF=~/tmp/tmpTest
touch ~/tmp/test.log    # legt die Datei "test.log" imt "tmp"-Ordner an, der im Homeverzeichnis des Ausführers liegt
mkdir -p $testF         # legt den Ordner "tmpTest" im "tmp"-Verzeichnis im Homverzeichnis des ausführenden Users an.
rm -r $testF/*          # löscht den Inhalt des "tmpTest"-Ordners

f=""
loopNr = $nr_of_curl_first_run
for i in $(seq 1 $nr_of_runs)             # läuft von 1 bis $nr_of_runs
do
  if [ $i > 1 ]
  then
    loopNr=$((2 * $nr_of_curl_first_run))  # mulitpliziert die Laufvariable mit $nr_of_curl_first_run
  fi
  echo "curl test Nr: 10000 x $loopNr"
  if test ! -e $result_path/$loopNr\_$curl_type.png #Wenn die datei *nicht* existiert:
  then
    ./Test.sh $loopNr $curl_type > ~/tmp/test.log
    if test -n "$!"                         # -n ist für Strings deshalb die Quotes. if länge des String nicht Null.
    then                                    #Returns true if the string or file exists.
      f="Number of requests were to big to handle"
      break
    fi
    cp $out/last.png $testF/$loopNr\_$curl_type.png # Backslash als Ersatz für Anführungszeichen. Der Unterstrich wird wörtlich genommen.
    echo "https://informatik.hs-bremerhaven.de/$USER/test_result/$loopNr\_$curl_type.png"
  else
    echo -e "\nThis particular Test ($loopNr case: $curl_type) is being skiped since it already exists online.\n"
  fi
done

if test -z "$f"
then
  #rm -r $result_path/*
  cp $testF/* $result_path/
  exit 1
fi
echo "$f"

