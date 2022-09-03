sudo -i -u infra-2022-e ssh mydocker "mkdir -p /var/www/html/docker-infra-2022-e-web/robbi/"
scp www/* | (sudo -i -u infra-2022-e scp -rq mydocker:$dst)
#rsync www/* infra-2022-e@hopper.hs-bremerhaven.de:$dst 