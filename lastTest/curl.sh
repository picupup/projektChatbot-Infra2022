#!/bin/bash
#topic: the arguments choses a number of loops and curl command with query to be excecuted.
loopNr=${1:-10}
caseNr=${2:-1}
input=${3:-"how are you"}
input=$(echo "$input" |sed -E "s/ /%20/g")

mkdir -p /dev/shm/$USER
cd /dev/shm/$USER

for i in $(seq 0 $loopNr);do
  case $caseNr in
    1)
      curl -s -b jar-$i-$$ -c jar-$i-$$ -X 'GET' "https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/call_test.php?question='$input%20[0..10000]'" >/dev/null 2>&1&
      idArray[${i}]=$!
  ;;
    2)
        curl -s -b jar-$i-$$ -c jar-$i-$$ -X 'GET' "https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/call_test.php?question='Hello,%20how%20are%20you?%20Und%20sonst%20so?%20lorem%20ipsum%20we%20compare%20this%20string%20with%20the%20result%20of%20the%20other%20one%20[0..10000]'" >/dev/null 2>&1&
        idArray[${i}]=$!
    ;;
  *)
      curl -s -b jar-$i-$$ -c jar-$i-$$ -X 'GET' "https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/call_test.php?question='$input%20[0..10000]'" >/dev/null 2>&1&
      idArray[${i}]=$!
  ;;
 esac

  #echo $i
done

echo "in between 2"

for pID in ${idArray[*]}; do
    wait $pID
done
