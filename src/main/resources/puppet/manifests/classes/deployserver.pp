# deployserver.pp

file{'/etc/hosts':
	content	=> template('deploy/hosts'),
	mode	=> 0644,
}

file{'hostname.sh':
	path	=> '/tmp/hostname.sh',
	content	=> template('deploy/hostname.sh'),
	mode	=> 0700,
	before	=> Exec['/tmp/hostname.sh'],
}

exec{'/tmp/hostname.sh':
}


