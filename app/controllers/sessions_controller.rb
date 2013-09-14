class SessionsController < ApplicationController
	def create
  		auth = request.env["omniauth.auth"]
          #data = "Full Name: "+ auth['info']['name'] + " || Email Id: "+ auth['info']['email']
          mssg = "Hi, "+ auth['info']['name'] + " Thanks for loggin into our website using facebook more interesting things will be happening soon !!!"
        session['fb_access_token'] = auth['credentials']['token']
        redirect_to success_url, :notice => mssg
	end
    
    def new
      redirect_to '/auth/facebook'
    end
    
    def destroy
      reset_session
      redirect_to root_url, :notice => 'Signed out'
    end
end
