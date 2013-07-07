# mongodb

package {'mongo-10gen-server':
	ensure => present,
	before => Service['mongod'],
}

package {'mongo-10gen':
	ensure => present,
        before => Package['mongo-10gen-server'],
}

file {'10gen.repo':
      path => '/etc/yum.repos.d/10gen.repo',
      ensure  => present,
      mode    => 0644,
      content => "[10gen]
name=10gen Repository
baseurl=http://downloads-distro.mongodb.org/repo/redhat/os/x86_64
gpgcheck=0
enabled=1",
      before => Package['mongo-10gen'],
}

service{'mongod':
	ensure => running,
}

file{'mongod.conf':
      path => '/etc/mongod.conf',
      ensure  => present,
      mode    => 0644,
      content => template('mongod/mongod.erb'),
      before => File['mongod.key'],
}

file{'mongod.key':
	# generated by openssl rand -base64 753
	notify  => Service["mongod"],
	content => template('mongod/key.erb'),
	path => '/etc/mongod.key',
	ensure  => present,
	owner => 'mongod',
	mode    => 0600,
	before => Service['mongod'],
}
