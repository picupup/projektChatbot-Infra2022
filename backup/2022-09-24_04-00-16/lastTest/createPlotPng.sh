#!/bin/bash
#<<createPlotPng.sh>>
#team e infra
#2022-09-12_23:48:04
#\Thema: It creates a new gp -> png fil from data in img.txt
#

input=${1:-"Project test"}
#imgtxt=~/tmp/dockerstatswatch/img.txt
imgtxtTime=$HOME/tmp/dockerstatswatch/img2.txt
touch $imgtxtTime
lastgp=$HOME/tmp/dockerstatswatch/last.gp
touch $lastgp
output=/var/www/html/$USER/last.png
touch $output
echo -n "" > $output
  #set yrange [0:100]
#smooth csplines
echo "set terminal pngcairo size 800,600 font 'Arial,12'
  set output '$output'
  set title '$input'
  set ylabel 'Workload [%]'
  set xdata time
  set xlabel 'Time [Min.]'
  set timefmt '%M:%S'
  set xrange [ '00:00' : ]
  set format x '%M:%S'
  set style line 12 lc rgb '#808080' lt 1 lw 1
  set grid back ls 12
  set style line 11 lc rgb '#808080' lt 1
  set border 3 back ls 11
  set tics font ', 12'
  set ytics nomirror
  set xtics nomirror
  plot '$imgtxtTime' using 1:2 \
      with linespoints \
        title '%' linewidth 4 linecolor rgb '#00A000' " > $lastgp;
gnuplot $lastgp;

#cat $f1 | sed -n "/^$dateBegin $hourBegin/,/^$dateEnd $hourEnd/p"

#echo -e "\n$dateEnd $hourEnd"
