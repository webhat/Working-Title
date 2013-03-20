#!/bin/bash

GAPI=smarty-gettext
GAPI_VERSION=v1.2.11
GAPISHA1=03911a3120fe28831512b57217e933ea7594933a

# DON'T EDIT UNDER THIS LINE

GAPI_ARCHIVE=$GAPI-$GAPI_VERSION.tar.gz
LIBS=ext/php
LOCATION=https://$GAPI.googlecode.com/files/$GAPI_ARCHIVE

mkdir -p ext/php/$GAPI
cd $LIBS/$GAPI

wget -q $LOCATION
sha1sum -c <<EOF
$GAPISHA1  $GAPI_ARCHIVE
EOF

[ $? -gt 0 ] && echo ERROR

tar zxf $GAPI_ARCHIVE

#rm -f $GAPI_ARCHIVE
#rm -rf `pwd`/$GAPI
