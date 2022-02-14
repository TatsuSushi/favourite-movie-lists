## Lumina Learning Developer Test (Chiew Yi-Jian)
###Technology choices
Framework used:
1) React & Laravel

Packages used:
1) axios
2) bootstrap
3) react-bootstrap
4) sass
5) prettier
6) Laravel Breeze
7) Laravel Mix

Database:
1) MYSQL via XAMPP PHPMyAdmin

## Assumptions
1) For security purposes, users can only see their own favourite movies list and able to make changes to their own list
2) Based on the task format, users should know the movie's IMDB ID that they like to add

## Solution Explanation
### Authentication
I have used Laravel Breeze to implement the basic authentication system and adjusted to the task's requirements accordingly. This is useful to save time and be able to focus more on the main tasks given.

### Back-end
1) I made some changes to the original SQL dump code as follows:

    a) To suit the syntax for laravel in the create_users_table migration file.
    
    b) Changed the data database structure such that users's favourite movies are stored in another table called user_favourite_movies. I think this could be a better solution in the long run because It not only can store each movie as an individual record and track which user it belongs to, it is easier to manage the database and send the information to the front-end.
    
    c) Created a UserSeeder file based on theSQL dump, this automatically fills in data to the right tables.
    
2) Created DashboardController to manage the dashboard page including displaying, adding and removing movies.
    
3) Data required gets passed through the dashboard.blade.php file for front-end to call

### Front-end
1) Used Laravel Mix to compile js in react format and scss files. Js files are rendered in blade files according to id.

2) All the pages and components are created with React.js and scss. They are separated into different directories for better management purposes.
 
## How to use it?
1) Clone the repo
2) Use XAMPP to make connections to MYSQL(Port 3306) & Apache(Port 80,443)
3) Access phpmyadmin localhost at the web browser (link:http://localhost/phpmyadmin/index.php) and create a database called favourite-movie-list
4) To make migrations to the database, open a command prompt in the repo's directory and run: php artisan:migrate
5) In the command prompt run: "yarn" or "npm install" to install packages required for the project
6) To start the application, open another command prompt and run : "php artisan serve"
7) On a web browser, access the application at localhost:8000 and you can begin using the application

## Evaluation
1) The most trouble I had was trying to retrieve information properly from the API calls and displaying them accordingly in a sustainable, future-proof way.

### Things to add
2) A feature to allow users to view other users' favourite movie lists without the privilege to make any changes.
3) Create a dropdown box in Action column to consist of "Remove Movie" and "More Details" buttons
