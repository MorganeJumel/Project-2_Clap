# CLAP!

This repository is a project for "La Pellicule Ensorcelée", a french cinema association.
Link to their website: http://www.lapelliculeensorcelee.org/


# Duration
2020/10/19-2020/11/27


# Description

Creation of a website mixing Popcorn Garage and Pinterest, the player need to find the movie reference in a vast choice of pictures. And in addition of that,
the user can add his own reference to the game!


# Developpers Team:

- Adeline Beaufils    
- Morgane Jumel  
- Bruno Lagasse 
- Victor Bijot


# Technical specificities

- PHP    - MySQL
- HTML   - CSS
- MVC    - TWIG 
- GrumPHP 
- GITHUB   - GIT

# URLs availables

- Homepage at localhost:8000/ 
- Category Page at http://localhost:8000/references?category=1
- Adding reference page at http://localhost:8000/references/add

## HOW TO USE 
 
## Steps

1. Clone the repo from Github.
2. Run `composer install`.
3. Create *config/db.php* from *config/db.php.dist* file and add your DB parameters. Don't delete the *.dist* file, it must be kept.
```php
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PWD', 'your_db_password');
```
4. Import `clap.sql` in your SQL server,
5. Run the internal PHP webserver with `php -S localhost:8000 -t public/`. The option `-t` with `public` as parameter means your localhost will target the `/public` folder.
6. Go to `localhost:8000` with your favorite browser.
7. From this starter kit, create your own web application.

