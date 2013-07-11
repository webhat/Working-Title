set :user, "root"
role :app, "localhost"
after 'deploy:create_symlink', 'puppet:run'
