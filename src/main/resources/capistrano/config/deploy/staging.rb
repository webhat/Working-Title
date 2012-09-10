set :user, "ec2-user"
role :app, "localhost"
after 'deploy:create_symlink', 'puppet:run'
