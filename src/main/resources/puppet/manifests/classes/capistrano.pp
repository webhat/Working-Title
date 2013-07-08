# capistrano

package { 'capistrano':
    ensure   => 'installed',
    provider => 'gem',
}

package { 'mcollective':
    ensure   => 'installed',
    provider => 'gem',
}

package {'railsless-deploy':
    ensure   => 'installed',
    provider => 'gem',
}

file{'/usr/share/puppet/configuration':
	ensure	=> 'directory',
	owner	=> 'deploy',
	mode	=> '0755',
}
