#!/bin/bash

. libs.sh

MAXMIND=GeoIPCountryCSV

# DON'T EDIT UNDER THIS LINE

MAXMIND_ARCHIVE=$MAXMIND.zip
LOCATION=http://geolite.maxmind.com/download/geoip/database/$MAXMIND_ARCHIVE

mkdir -p $MAXMIND
pushd $MAXMIND
wget --no-check-certificate -q $LOCATION
unzip -o $MAXMIND_ARCHIVE

rm -f $MAXMIND_ARCHIVE

popd

mkdir -p ext
cp -Rf $MAXMIND/* $LIBS/$MAXMIND.csv

rm -rf `pwd`/$MAXMIND


mongoimport -d wt365test -c things --type csv --file $LIBS/$MAXMIND.csv -f startip,endip,startip_long,endip_long,countrycode,country

