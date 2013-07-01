# nginx.pp

package {'nginx':
	ensure => '1.4.1-1.el6.ngx',
}

file {'nginx.repo':
      path => '/etc/yum.repos.d/nginx.repo',
      ensure  => present,
      mode    => 0644,
      content => "[nginx]
name=nginx repo
baseurl=http://nginx.org/packages/centos/6/x86_64/
gpgcheck=0
enabled=1",
      before => Package['nginx'],
}

