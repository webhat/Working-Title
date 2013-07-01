# mongodb

package {'mongo-10gen-server':
	ensure => present,
}

package {'mongo-10gen':
	ensure => present,
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
}

