# deployuser.pp
user { 'deploy':
	ensure           => 'present',
	comment          => 'Capistrano Deploy User',
	home		 => '/home/deploy',
	password         => '*',
	password_max_age => '99999',
	password_min_age => '0',
	shell            => '/bin/bash',
}

file {'/home/deploy':
	ensure	=> directory,
	owner	=> 'deploy',
	mode	=> '0600',
}

file {'/home/deploy/.ssh':
	ensure	=> directory,
	owner	=> 'deploy',
	mode	=> '0600',
}

file { 'authorized_keys':
	ensure	=> present,
	content	=> template('deploy/authorized_keys.erb'),
	name	=> '/home/deploy/.ssh/authorized_keys',
	owner	=> 'deploy',
	mode	=> '0600',
}

