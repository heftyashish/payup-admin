set :branch, 'master'
# set :branch, 'mobile_deploy_v_3_login_test'

WEB_SERVERS = ["web1.atpayup.com","web2.atpayup.com"]
set  :application_env, "production"
role :app, *WEB_SERVERS
role :web, *WEB_SERVERS
