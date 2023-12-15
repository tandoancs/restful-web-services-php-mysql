# restful-web-services-php-mysql
**php mysql api tutorials API: PHP Restful Web Services in PHP Example – PHP + MySQL**

**1. Folder Structure**
Let's the folder for writting our web services

api
├─── config/
├────── database.php – connecting to the database.
├─── objects/
├────── user.php – User model class to exe signup and login data
├─── User/
├────── signup.php – handle the data from user
├────── login.php – handle username & password and validate to login
assets/
├─── css/
├────── login.css - css for login.php (login front-end) file in client folder
├────── style.css - css for index.php (signup front-end) file in root folder
├─── client/
├────── login.php - front-end for login view
index.php - front-end for signup view

**2. Creating phptutorials database & users table**

In MySQL, we create a new database is **phptutorials** database. After we will create a new **users** table with few columns:

CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `fullname` varchar(55) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone_number` varchar(55) NOT NULL,
  `gender` varchar(55) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

**3. Connect the database**
**4. Creating User Model Class include signup and login methods
5. Creating signup and login api**
