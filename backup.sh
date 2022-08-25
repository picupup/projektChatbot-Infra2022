#!/bin/bash

cd $HOME/repos/infra-2022-e
mkdir -p backup
dir=backup/$(date '+%Y-%m-%d_%H-%M-%S')
mkdir -p $dir

for i in $(ls); do
  if test -d $i -a "$i" != "backup"; then
  cp -r $i $dir/
  fi
 done
