#!/bin/bash

. libs.sh

GETTEXT=php-gettext
GETTEXT_VERSION=1.0.11

# DON'T EDIT UNDER THIS LINE

GETTEXT_ARCHIVE=$GETTEXT-$GETTEXT_VERSION.tar.gz
LOCATION=https://launchpad.net/php-gettext/trunk/$GETTEXT_VERSION/+download/$GETTEXT_ARCHIVE

wget -q $LOCATION
tar zxf $GETTEXT_ARCHIVE

rm -f $GETTEXT_ARCHIVE

mkdir -p ext/php
cp -Rf $GETTEXT-$GETTEXT_VERSION $LIBS/$GETTEXT

rm -rf `pwd`/$GETTEXT-$GETTEXT_VERSION
