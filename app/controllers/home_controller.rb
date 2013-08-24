class HomeController < ApplicationController
  def index
  end
  
  def success
  end
  
  def share
    client = OAuth2::Client.new(Mkv::Application.config.app_id, Mkv::Application.config.app_secret, :site => 'https://graph.facebook.com')
    token = OAuth2::AccessToken.new(client, session['fb_access_token'])
    token.post('/me/feed', :message => "Mkv app")
    redirect_to root_url, :notice => 'Shared'
  end
end
