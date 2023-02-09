First of all install Xampp from following Url 
https://www.apachefriends.org/ according to system need.
then copy api folder in htdocs folder and import sql script file in phpmyadmin that exists in db folder
change base url in api/application/config/config.php like in my case http://localhost/api
After that db string in  api/application/config/database.php like hostname,username,password,databasename
Run npm install
then npm start that's it

