1: First of all install Xampp from following Url 
   https://www.apachefriends.org/ 
according to system need.
2: Then copy api folder in htdocs folder and import sql script file in phpmyadmin that exists in db folder
3: Change base url in api/application/config/config.php like in my case 
    http://localhost/api
4: After that db string in  api/application/config/database.php like hostname,username,password,databasename
5: Run npm install to install all packages
6: Then npm start that's it

