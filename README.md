ComicApp

ComicApp is a monolithic web application built with Laravel v8.83.27, a popular PHP framework. The application utilizes the Blade template system for rendering views and employs Sass as the CSS preprocessor. The database used is MariaDB.
Tech Details

    Framework: Laravel v8.83.27
    Template System: Blade
    CSS Preprocessor: Sass
    Database: MariaDB

Integrations

ComicApp integrates with Marvel Comics web services. To successfully use the app, you'll need to provide the required API keys in the .env file.
Steps to Run the App Locally

To run ComicApp locally, please follow these steps:

    Make sure you have all the required dependencies installed, including Laravel, Composer, MySQL, and Node (suggested version: 14.10).
    Clone the project repository to your local machine.
    In the root folder of the project, run the npm install command to install the necessary Node dependencies.
    Run the composer install command to install the PHP dependencies managed by Composer.
    Configure your database credentials in the .env file. Additionally, run php artisan config:cache to cache the configuration.
    Start the application by running the command php artisan serve.
    Access the application in your web browser at the specified URL provided by Laravel.

Please ensure that you have a working internet connection and the necessary API keys for Marvel Comics web services before running the application.

Enjoy using ComicApp to explore and discover Marvel Comics content!


Author
ComicApp was created by Alejandro Stivanello.
