require 'capistrano/ext/multistage'
#require 'capistrano/gitflow'

set :repository,  "git@github.com:RevoContent/payup_admin.git"
set :stages, %w(development staging production demo)
set :default_stage, "development"

set :application, "payup_admin"
set :deploy_to, "/home/playup/applications/#{application}"
set :user, "playup"
set :use_sudo, false


set :scm, :git
set :scm_user, 'ankit-playup'
set :deploy_via, :remote_cache
set :repository_cache, "cached_copy"
set :copy_exclude, [ '.git' ]

ssh_options[:forward_agent] = true
default_run_options[:pty] = true

namespace :deploy do
  task :start do ; end
  task :stop do ; end
  task :restart, :roles => :web, :except => { :no_release => true } do
  end

end

set :keep_releases, 10
after "deploy:update", "deploy:cleanup"