OmniAuth.config.logger = Rails.logger

Rails.application.config.middleware.use OmniAuth::Builder do
  	provider :facebook, Mkv::Application.config.app_id, Mkv::Application.config.app_secret,
  			:scope => 'email,user_birthday,read_stream'
end
