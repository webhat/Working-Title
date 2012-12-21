#!/bin/bash

JASMINE_VERSION=1.3.1
JASMINE=jasmine-standalone-$JASMINE_VERSION

# DON'T EDIT UNDER THIS LINE

JASMINE_ARCHIVE=$JASMINE.zip
LIBS=ext/php
LOCATION=https://github.com/downloads/pivotal/jasmine/$JASMINE_ARCHIVE

mkdir -p $JASMINE
pushd $JASMINE
wget --no-check-certificate -q $LOCATION
unzip $JASMINE_ARCHIVE

rm -f $JASMINE_ARCHIVE

popd

mkdir -p ext/php
cp -Rf $JASMINE/lib/jasmine-$JASMINE_VERSION $LIBS

rm -rf `pwd`/$JASMINE
