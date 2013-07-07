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
