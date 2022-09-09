#!/bin/bash
#<<curlCommand.sh>>
#team infra 2022
#2022-09-06_12:47:18
#\Thema:This script is a one time curl of the website
#

input=${1:-"how are you"}
input=$(echo "$input" |sed -E "s/ /%20/g")
#echo "$input"
echo "$(date '+%Y-%m-%d_%H:%M:%S')"

seq 100 | parallel --max-args 0 --jobs 10 "curl -X 'GET' -s https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/call_test.php?question='$input'"


echo "$(date '+%Y-%m-%d_%H:%M:%S')"
