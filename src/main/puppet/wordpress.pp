define wordpress($domain, $path, $db, $db_user, $db_pass) {

    $auth_key = sha1("auth_key$name")
    $secure_auth_key = sha1("secure_auth_key$name")
    $logged_in_key = sha1("logged_in_key$name")
    $nonce_key = sha1("nonce_key$name")
    $auth_salt = sha1("auth_salt$name")
    $secure_auth_salt = sha1("secure_auth_salt$name")
    $logged_in_salt = sha1("logged_in_salt$name")
    $nonce_salt = sha1("nonce_salt$name")

    include mysql-server-50
    # php5 auto-includes apache2
    include php5

    file { "$path":
        ensure => "directory",
        source => "puppet://puppet.example.com/dist/apps/wordpress/wordpress",
        recurse => "true",
        force => true,
        mode => "0644",
    }

    file { "$path/wp-config.php":
        content => template("/etc/puppet/dist/apps/wordpress/wp-config.php.erb"),
        mode => "0644",
        require => File["$path"],
    }

    file { "$path/wp-content/plugins":
        source => "puppet://puppet.realslmshaney.com/dist/apps/wordpress/plugins",
        recurse => "true",
        force => true,
        group => "www",
        mode => "0644",
        require => File["$path"],
    }
    file { "$path/.htaccess":
        ensure => "file",
        group => "www",
        mode => "0664",
        require => File["$path"],
    }
    file { "$path/wp-content/cache":
        ensure => "directory",
        group => "www",
        mode => "0664",
        require => File["$path/wp-content/plugins"],
    }
}
