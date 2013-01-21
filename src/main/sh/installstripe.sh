#!/bin/bash

GAPI=stripe-php
GAPI_VERSION=1.7.12
GAPISHA1=d471c7cd66f7d2a67aa1967af9d74a21e8fe7e59

# DON'T EDIT UNDER THIS LINE

GAPI_ARCHIVE=$GAPI-latest.tar.gz
LIBS=ext/php
LOCATION=https://code.stripe.com/$GAPI_ARCHIVE

wget -q $LOCATION
sha1sum -c <<EOF
$GAPISHA1  $GAPI_ARCHIVE
EOF

[ $? -gt 0 ] && echo ERROR

tar zxf $GAPI_ARCHIVE

rm -f $GAPI_ARCHIVE

mkdir -p ext/php/$GAPI
cp -Rf $GAPI-$GAPI_VERSION/lib $LIBS/$GAPI

rm -rf `pwd`/$GAPI-$GAPI_VERSION
