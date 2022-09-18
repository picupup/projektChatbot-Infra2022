#!/bin/bash

caseNr=${1:-1}
mkdir -p /dev/shm/$USER
cd /dev/shm/$USER

for i in {0..10000};do
  case $caseNr in
    1)
      curl -s -b jar-$i-$$ -c jar-$i-$$ -X 'GET' "https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/call_test.php?question='$input'[0..10000]" >/dev/null 2>&1&
      idArray[${i}]=$!
  ;;
  *)

      curl -s -b jar-$i-$$ -c jar-$i-$$ -X 'GET' "https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/call_test.php?question='$input'[0..10000]" >/dev/null 2>&1&
      idArray[${i}]=$!
  ;;
 esac

  #echo $i
done

echo "in between 2"

for pID in ${idArray[*]}; do
    wait $pID
done
