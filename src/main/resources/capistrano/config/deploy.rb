set :application, "set your application name here"
set :repository,  "set your repository location here"

#ssh_options[:keys] = ["/etc/keys/id_rsa-capistrano"]
ssh_options[:keys] = [File.join(ENV["HOME"], ".ssh", "deploy")]
ssh_options[:keys] = ["/root/.ssh/deploy"]
#
require 'mcollective'

#### MCOLLECTIVE STUFF ####

class MCProxy
    include MCollective::RPC

    def initialize(agent)
        @agent = rpcclient(agent)
    end

    def runaction(action, args)
        printrpc @agent.send(action, args)
    end
end

namespace :puppet do
    desc <<-DESC
    Run Puppet to pull the latest versions
    DESC
    task :run do
        puppet = MCProxy.new("puppetd")
        puppet.runaction("runonce",:concurrency => '2')
    end
end

namespace :webinit do
	desc <<-DESC
	Run Website Initializer
	DESC
	task :run do
		run "cd #{release_path} && sh/libs.sh production"
	end
end
