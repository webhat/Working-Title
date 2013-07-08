#!/bin/bash

. libs.sh

GAPI=google-api-php-client
GAPI_VERSION=0.6.0
GAPISHA1=95109e0dd65443ea72496168d2ed95ead225f1b2

# DON'T EDIT UNDER THIS LINE

GAPI_ARCHIVE=$GAPI-$GAPI_VERSION.tar.gz
LOCATION=https://$GAPI.googlecode.com/files/$GAPI_ARCHIVE

wget -q $LOCATION
sha1sum -c <<EOF
$GAPISHA1  $GAPI_ARCHIVE
EOF

[ $? -gt 0 ] && echo ERROR

tar zxf $GAPI_ARCHIVE

rm -f $GAPI_ARCHIVE

mkdir -p ext/php/$GAPI
cp -Rf $GAPI/src $LIBS/$GAPI

rm -rf `pwd`/$GAPI
