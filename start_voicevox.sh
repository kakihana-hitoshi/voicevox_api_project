#!/bin/bash

ProcessName=VOICEVOX

count=`ps -ef | grep $ProcessName | grep -v grep | wc -l`
if [ $count = 0 ]; then
  echo "$ProcessName"
  open -a $ProcessName
  sleep 13
  echo "start."
else
  echo "$ProcessName is alive."
fi