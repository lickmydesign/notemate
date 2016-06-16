# Notes App

A basic notes app built using the Laravel framework.

# Database Creation 

The app expects a mysql database schema named 'notemate'.

Step 1: 

Create the db schema with:
    CREATE SCHEMA `notemate` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci; )

Step 2: 

Either amend the db settings in .env and run 'php artisan migrate' to create a blank database

-- or --

use the '\database\create_database.sql' script to populate it with a user and some test notes.

# Using the app

You can either login as the existing user (email: john@aol.com, password: 123456), or sign up as a new user.

# Note

Email reminders will not work unless smtp, etc. is setup in config (set to 'log' by default).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
