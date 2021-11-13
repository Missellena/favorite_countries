# favorite_countries
Homework assignment for an job opening for PHP developer

Description: 

This app lets registered users to be able to save favourite countires form a list and add decription/comments to each favourite countries.

Prerequisites:

- PHP 7.0 or greater
- Composer
- MySql database with executed predefined tables in a database countries (run the script ./countries.sql);

Optional 

- Postman

Install the app locally

1. Git clone the repository 

git clone https://github.com/Missellena/favorite_countries

2. Go to root folder

cd /favourite_countries

3. Install dependencies

composer install

4. Open file ./config_sample.php and instert database credentials

5. Rename file to config.php and Save the file

6. Open terminal to root app folder (favourite_countries) and serve app with php -S localhost:8000

7. Go to http://localhost:8000 and log in with predefined credentials
 - username: Test
 - password: password

8. For testing the code with sniffer run 

./vendor/bin/phpcs -n App/

9. For automatically fixing errors run

./vendor/bin/phpcbf -n App/

10. For using postman make sute the cookie form a loged in broser is inserted into the Postam Session.

Enjoy!





