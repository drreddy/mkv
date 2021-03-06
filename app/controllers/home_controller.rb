class HomeController < ApplicationController
  def index
  end
  
  def success
    if session['fb_access_token']
        @graph = Koala::Facebook::API.new(session['fb_access_token'])
    
    else
        redirect_to root_url, :notice => 'Not sighned in'         
    end
  end
  
  def share
    @graph = Koala::Facebook::API.new(session['fb_access_token'])
    @graph.put_connections("me", "feed", :message => "Mkv app", :link => "http://mkv.herokuapp.com", :name => "Mkv", :description => "A social app integrating Facebook and Netflix")
    redirect_to root_url, :notice => 'Shared'
  end
  
end
