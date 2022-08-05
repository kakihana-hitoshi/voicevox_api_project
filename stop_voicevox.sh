#!/bin/bash

ProcessName=VOICEVOX

count=`ps -ef | grep $ProcessName | grep -v grep | wc -l`
if [ $count = 0 ]; then
  echo "$ProcessName is dead."
else
  PID=`ps x | grep -v grep | grep "$ProcessName" | awk '{ print $1 }'`
  echo "$ProcessName"
  kill -9 $PID
  echo "stop."
fi