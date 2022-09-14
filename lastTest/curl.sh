#!/bin/bash


mkdir -p /dev/shm/$USER
cd /dev/shm/$USER

for i in {0..10000};do
  curl -s -b jar-$i-$$ -c jar-$i-$$ -X 'GET' "https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/call_test.php?question='$input'[0..10000]" >/dev/null 2>&1&
  idArray[${i}]=$!
  echo $i
done

echo "in between 2"

for pID in ${idArray[*]}; do
    wait $pID
done
