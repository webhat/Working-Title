#!/bin/bash

. libs.sh

SWIFT=Swift-4.2.2

# DON'T EDIT UNDER THIS LINE

SWIFT_ARCHIVE=$SWIFT.tar.gz
LOCATION=http://swiftmailer.org/download_file/$SWIFT_ARCHIVE

wget -q $LOCATION
tar zxf $SWIFT_ARCHIVE

rm -f $SWIFT_ARCHIVE

mkdir -p ext/php
cp -Rf $SWIFT/lib $LIBS

rm -rf `pwd`/$SWIFT
