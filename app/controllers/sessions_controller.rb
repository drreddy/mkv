class SessionsController < ApplicationController
	def create
  		auth = request.env["omniauth.auth"]
          
        redirect_to root_url, :notice => auth['info']['name']
	end
    
    def new
      redirect_to '/auth/facebook'
    end
    
    def destroy
      reset_session
      redirect_to root_url, :notice => 'Signed out'
    end
end
