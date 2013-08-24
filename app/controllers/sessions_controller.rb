class SessionsController < ApplicationController
	def create
  		auth = request.env["omniauth.auth"]
          data = "Full Name: "+ auth['info']['name'] + " || Email Id: "+ auth['info']['email']
        redirect_to success_url, :notice => data
        session['fb_access_token'] = auth['credentials']['token']
	end
    
    def new
      redirect_to '/auth/facebook'
    end
    
    def destroy
      reset_session
      redirect_to root_url, :notice => 'Signed out'
    end
end
