#!/bin/bash
#<<curlCommand.sh>>
#team infra 2022
#2022-09-06_12:47:18
#\Thema:This script is a one time curl of the website
#

input=${1:-"how are you"}
input=$(echo "$input" |sed -E "s/ /%20/g")
#echo "$input"

curl "https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/call_test.sh?question=\'$input\'" | html2text
