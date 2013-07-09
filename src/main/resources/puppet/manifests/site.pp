# /etc/puppet/manifests/site.pp
 
import "classes/*"
 
node default {
    include sudo
}

node 'wt365-mongo' {
	include mongodb_master
}

node 'wt365-web' {
	include mongodb_slave
}

filebucket { 'main':
    server => 'ip-10-34-224-43.eu-west-1.compute.internal',
    path   => false,
}

package { "tzdata":
	ensure => installed
}

file { "/etc/localtime":
	require => Package["tzdata"],
	source => "file:///usr/share/zoneinfo/UTC"
}
