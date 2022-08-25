#!/bin/bash


dir=backup/$(date '+%Y-%m-%d_%H-%M-%S')
mkdir $dir

for i in $(ls); do
  if test -d $i -a "$i" != "backup"; then
  cp -r $i $dir/
  fi
 done
