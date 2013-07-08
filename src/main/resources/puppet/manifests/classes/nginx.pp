# nginx.pp

package {'nginx':
	ensure => '1.4.1-1.el6.ngx',
	before => Service['nginx'],
}

package{'php-fpm':
	ensure => latest,
	before => Service['nginx'],
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

service{'nginx':
	ensure => running,
}

service{'php-fpm':
	ensure => running,
}


file {'nginx.conf':
      notify  => Service["nginx"],
      path => '/etc/nginx/nginx.conf',
      ensure  => present,
      mode    => 0644,
      content => template('nginx/nginx.erb'),
      before => Service['nginx'],
}

file { "/var/www/vhosts/wt365":
  ensure => 'directory',
}
