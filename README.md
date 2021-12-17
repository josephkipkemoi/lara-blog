## Setup

<a href="larablog.herokuapp.com" target="_blank">Deployed API</a>

## Dependencies

<ul>
    <li>PHP 7.3 | 8.0</li>
</ul>

## Getting Started
Setting up project in development mode:

<ul>
    <li>Ensure PHP 7.3 or greater is installed by running: </li>
    <p>php -v </p>
    <li>Clone the repository to your machine and navigate into it:</li>
    <p>git clone https://github.com/josephkipkemoi/larablog</p>
    <li>Install application dependencies</li>
    <p>composer install</p>
    <li>Create a .env file and include the necessary environment variables. NB- copy from the .env.example and fill in the correct values</li>
</ul>

## Database Setup
<p>Setup database locally on your machine, add <mark>larablog</mark> as a value to the respective environment variable as below:</p>
<ul>
    <li>mysql -p['password']</li>
    <li>CREATE DATABASE larablog;</li> 
    <li>exit;</li>
</ul>

## Running the application
<p>Inside the root folder, run the following commands in your terminal</p>

<ul>
    <li>$ php artisan migrate:fresh</li>
    <li>$ php artisan db:seed</li>
    <li>$ php artisan serve</li>
</ul>

## Running the tests
<ul>
    <li>$ ./vendor/bin/phpunit </li>
    <p>Or</p>
    <li>$ php artisan test</li>
 </ul>
