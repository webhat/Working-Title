# /etc/puppet/manifests/site.pp
 
import "classes/*"
 
node default {
    include sudo
 }

filebucket { 'main':
    server => 'ip-10-34-224-43.eu-west-1.compute.internal',
    path   => false,
 }
