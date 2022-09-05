echo "###########################################################################"
echo "Link: https://informatik.hs-bremerhaven.de/docker-infra-2022-e-web/robbi/"
echo "Deine Änderungen werden erst Sichtbar, nachdem 'git push' ausgeführt wurde."
echo "###########################################################################"

sudo -i -u infra-2022-e git -C /home/infra-2022-e/repos/infra-2022-e/ pull
sudo -i -u infra-2022-e sh /home/infra-2022-e/repos/infra-2022-e/ldeploy.sh
