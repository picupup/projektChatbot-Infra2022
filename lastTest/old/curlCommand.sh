#!/bin/bash
#<<curlCommand.sh>>
#team infra 2022
#2022-09-06_12:47:18
#\Thema:This script is a one time curl of the website
#

input=${1:-"how are you"}
input=$(echo "$input" |sed -E "s/ /%20/g")
#echo "$input"

curl -X "GET" -s "https://informatik.hs-bremerhaven.de/docker-infra-2019-e-web/robbi/call_test.php?question='$input'" [1-2000]
