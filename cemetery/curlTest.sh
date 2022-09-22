#!/bin/bash

mkdir -p /dev/shm/$USER
cd /dev/shm/$USER

curl -X POST -F 'email=curl@mit.com' -F 'password=12345' https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/index.php

#curl -b jar-$i-$$ -c jar-$i-$$ -X 'GET' "https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/call_algorithm.php?question='what%20up'"
