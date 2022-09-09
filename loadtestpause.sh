#!/bin/bash
mkdir -p /dev/shm/$USER
cd /dev/shm/$USER
t1=$(date +%T | sed 's/://g')
tt1=$(date +%s)
pwd="/home/$USER/swe3-21-team-t/testing/"

for i in {1..50}; do
    /bin/bash $pwd/ktaherivand/curl/$1 $i >/dev/null &
    pidsArray[${i}]=$!
    echo $i
done

for pID in ${pidsArray[*]}; do
    wait $pID
done

sleep 10

for i in {1..50}; do
    /bin/bash $pwd/ktaherivand/curl/$1 $i >/dev/null &
    pidsArray[${i}]=$!
    echo $i
done

for pID in ${pidsArray[*]}; do
    wait $pID
done

x="t"

tt2=$(date +%s)
t3=$((tt2-tt1))
echo "time it took to send 100k request to the library Controller "$t3"sec"

while [ $x == "t" ]; do
  y=$(tail -n 1 /var/log/tomcat9/localhost.$(date +%Y-%m-%d).log | awk  '{print $7}')
  if [ "$y" == "0" ]; then
    t2=$(date +%T | sed 's/://g')
    /bin/bash $pwd/srathgeber/testObserver.sh $t1 $t2
    x="f"
  fi
done
