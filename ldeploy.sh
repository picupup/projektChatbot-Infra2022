#/bin/bash
## which user is executing?
if [ $USER = "infra-2022-e" ]
	then
		repo=/home/$USER/repos/$USER
	else
		repo=$PWD
	fi
## preparations
dst=/var/www/html/docker-$USER-web/robbi
ssh mydocker "mkdir -p $dst"
## mirroring
rsync -av $repo/www/ mydocker:$dst --delete --progress
## Happybit
currentdate=$(date)
echo "$currentdate" > happy.txt
scp -q happy.txt mydocker:$dst/
rm happy.txt
happy=$(curl -s https://informatik.hs-bremerhaven.de/docker-$USER-web/robbi/happy.txt)
echo "$happy"
echo "$currentdate"
if [ "$happy" = "$currentdate" ]; 
then
   echo happy
else
   echo unhappy!
   exit
fi
 ## Output what the browser is showing.
curl -s https://informatik.hs-bremerhaven.de/docker-$USER-web/robbi/chat.php | html2text -utf8




