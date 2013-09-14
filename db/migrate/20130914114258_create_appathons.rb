class CreateAppathons < ActiveRecord::Migration
  def change
    create_table :appathons do |t|
      t.string :name
      t.string :fbid
      t.string :access_token
      t.string :latitude
      t.string :longitude
      t.string :friends

      t.timestamps
    end
  end
end
