#!/bin/sh

if [ -z "$1" ] ;
	then
			echo "missing argument"
			exit -1
fi

FILE=${1%%.json}
COLLECTION=$(basename $FILE)


cat $FILE.json | tr -d '\n' > $FILE.import.json

mongoimport --collection $COLLECTION --db wt365 --file $FILE.import.json --jsonArray --upsert
