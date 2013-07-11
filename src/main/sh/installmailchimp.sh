#!/bin/bash

. libs.sh

DIR=MailChimp

# DON'T EDIT UNDER THIS LINE

ARCHIVE=mailchimp-api-class.zip
LOCATION=http://apidocs.mailchimp.com/api/downloads/$ARCHIVE

mkdir $DIR
pushd $DIR

wget -q $LOCATION
unzip $ARCHIVE

rm -f $ARCHIVE

popd

mkdir -p $LIBS
cp -Rf $DIR/MCAPI.class.php $LIBS

rm -rf `pwd`/$DIR
