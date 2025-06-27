How to run this demo project using Herd?

Clone the project

Clone the project in your Herd folder


Install the necessary dependencies

Open the Herd terminal
From within the homedir of the project, execute composer install



Create the .env file

Copy .env.example to .env



Generate the application key

Execute herd php artisan key:generate



Execute the migrations and seeders

Execute herd php artisan migrate

Execute herd php artisan db:seed



Activate HTTPS

In the Herd control panel, activate HTTPS for the site