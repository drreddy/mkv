class Appathon < ActiveRecord::Base
  attr_accessible :access_token, :fbid, :friends, :latitude, :longitude, :name
end
