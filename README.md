this application accept API(CRUD) with laratrust permissions.
Author is Arash Pirhadi.

for install

step1 : make your .env file and make connection with your database.

step2 : run composer install.

step3 : run php atisan migrate.

step4 : run php artisan db:seed. (for creating sample users with permissions)

step5 : watch for the "api_token" column in users table for specific user authentication. (bearer token)

enjoy ;)