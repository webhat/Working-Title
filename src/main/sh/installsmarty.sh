#!/bin/bash

SMARTY=Smarty-3.1.11

# DON'T EDIT UNDER THIS LINE

SMARTY_ARCHIVE=$SMARTY.tar.gz
LIBS=ext/php
LOCATION=http://www.smarty.net/files/$SMARTY_ARCHIVE

wget -q $LOCATION
tar zxf $SMARTY_ARCHIVE

rm -f $SMARTY_ARCHIVE

mkdir -p ext/php
cp -Rf $SMARTY/libs $LIBS

rm -rf `pwd`/$SMARTY
