Install PHP, Composer, and a Database Server (if not already installed):

Composer: This is the dependency manager for PHP, necessary for installing Laravel dependencies.

Download it from getcomposer.org.

Database Server: Laravel supports MySQL, PostgreSQL, SQLite, and SQL Server.

You can use MySQL (often bundled with tools like XAMPP, WAMP, or MAMP) or install the database server independently.

Open the  Project Folder

Install Dependencies:

If this is the first time you're running the project, install its dependencies by running:

composer install

Set Up the  .env File

Open the .env file and configure the necessary settings, especially database configuration:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

Generate an Application Key:

Laravel requires an application key, which you can generate by running:

php artisan key:generate

Migrate the Database (if applicable):

If your Laravel project has migrations, you can set up the database tables by running:

php artisan migrate

Run the Laravel Development Server:

To start the Laravel development server, run:

php artisan serve

Stop the Server:

To stop the Laravel server, press Ctrl + C in your terminal.






