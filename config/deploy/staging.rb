set :branch, 'master'
# set :branch, 'mobile_deploy_v_3_login_test'

WEB_SERVERS = ["web1qa.atpayup.com","web2qa.atpayup.com"]
set  :application_env, "staging"
role :app, *WEB_SERVERS
role :web, *WEB_SERVERS
