class HomeController < ApplicationController
  def index
  end
  
  def success
  end
  
  def share
    @graph = Koala::Facebook::API.new(session['fb_access_token'])
    @graph.put_connections("me", "feed", :message => "Mkv app", :link => "http://mkv.herokuapp.com", :name => "Mkv", :description => "A social app integrating Facebook and Netflix")
    redirect_to root_url, :notice => 'Shared'
  end
end
