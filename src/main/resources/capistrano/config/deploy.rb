set :application, "set your application name here"
set :repository,  "set your repository location here"

#ssh_options[:keys] = ["/etc/keys/id_rsa-capistrano"]
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
