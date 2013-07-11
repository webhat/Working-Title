# nginx.pp

class nginx_base {
	package {'nginx':
		ensure => '1.4.1-1.el6.ngx',
		before => Service['nginx'],
	}

	package{'php-fpm':
		ensure => absent,
	}

	package{'php':
		ensure => latest,
	}

	package{'spawn-fcgi':
		ensure => latest,
		before => Package['php'],
	}

	package{'php-pecl-mongo':
		notify  => Service["spawn-fcgi"],
		ensure => latest,
	}

	package{'php-pecl-imagick':
		notify  => Service["spawn-fcgi"],
		ensure => latest,
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


	file {'fedoraproject.repo':
	      path => '/etc/yum.repos.d/fedoraproject.repo',
	      ensure  => present,
	      mode    => 0644,
	      content => "[fedoraproject]
name=FedoraProject repo
baseurl=http://dl.fedoraproject.org/pub/epel/6/x86_64/
gpgcheck=0
enabled=1",
	      before => Package['spawn-fcgi'],
	}


	service{'nginx':
		ensure => running,
	}

	service{'spawn-fcgi':
		ensure => running,
	}

	file {'spawn-fcgi.conf':
	      notify  => Service["spawn-fcgi"],
	      path => '/etc/sysconfig/spawn-fcgi',
	      ensure  => present,
	      mode    => 0644,
	      content => template('nginx/spawn-fcgi.erb'),
	      before => Service['spawn-fcgi'],
	}

	file {'fastcgi_params':
	      notify  => Service["nginx"],
	      path => '/etc/nginx/fastcgi_params',
	      ensure  => present,
	      mode    => 0644,
	      content => template('nginx/fastcgi_params.erb'),
	      before => Service['nginx'],
	}

	file {'/var/data':
	  ensure => 'directory',
	}

	file {'/var/data/ext':
	  ensure => 'directory',
	}

	file {'/var/data/ext/upload/':
		ensure	=> 'directory',
		mode	=> 0777,
	}

	file {'/var/data/ext/libs':
	  ensure => 'directory',
	}

	file{'WTConfig.class.php':
		path	=> "/var/data/ext/libs/WTConfig.class.php",
		content	=> template('nginx/WTConfig.php'),
	}
}

class nginx_files inherits nginx_base {
	file {'nginx.conf':
	      notify  => Service["nginx"],
	      path => '/etc/nginx/nginx.conf',
	      ensure  => present,
	      mode    => 0644,
	      content => template('nginx/nginx-fileserver.erb'),
	      before => Service['nginx'],
	}
}

class nginx inherits nginx_base {
	file {'nginx.conf':
	      notify  => Service["nginx"],
	      path => '/etc/nginx/nginx.conf',
	      ensure  => present,
	      mode    => 0644,
	      content => template('nginx/nginx.erb'),
	      before => Service['nginx'],
	}
}

