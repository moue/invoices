#Ma Advo Invoice

Open-source tool to keep track of subscriptions, invoices, payments, and advertisements. Can be used by the business staff of an organization to record sales and track clients. Can be used by clients to track orders and payments. 

Built using Laravel 4.1. Features include heavy integration with the Stripe API. This tool was originally built for the business staff of a magazine publication.

To connect, follow [@yuqih](https://twitter.com/yuqih) or [@harvardadvocate](https://twitter.com/harvardadvocate).

----------


##Features
* [Bootstrap 3.x](http://getbootstrap.com/)
* [DataTables](https://datatables.net) dynamic table sorting and filtering
* [Gulp](http://gulpjs.com/) streaming build system
* [Stripe](https://stripe.com) payment system
* Business Portal 
	* Client creation and management
	* Invoice creation and management
* Client Portal
	* User login, registration, forgot password
	* User account settings
	* Review invoices
	* Make payments
* Custom Error Pages
	* 403 for forbidden page accesses
	* 404 for not found pages
	* 500 for internal server errors
* Packages included:
	* [Confide](https://github.com/Zizaco/confide)
	* [Entrust](https://github.com/Zizaco/entrust)
	* [Ardent](https://github.com/laravelbook/ardent)
	* [Carbon](https://github.com/briannesbitt/Carbon)
	* [Presenter](https://github.com/robclancy/presenter)
	* [Generators](https://github.com/JeffreyWay/Laravel)



###Roadmap

* Import/export clients and subscriptions
* Buy a subscription landing page
* Upload and update images
* View ads history by issue
* Remove Basset and move all asset management to Gulp
* Create different levels of admin permission

##Requirements
* Laravel 4.1
* PHP >= 5.4.0 (Entrust requires 5.4, this is an increase over Laravel's 5.3.7 requirement)
* MCrypt PHP Extension

##How to install
### Step 1: Get the code
#### Option 1: Git Clone

	git clone git@github.com:moue/invoices.git

#### Option 2: Download the repository

    https://github.com/moue/invoices/archive/master.zip

### Step 2: Use Composer to install dependencies
#### Option 1: Composer is not installed globally

    cd laravel
	curl -s http://getcomposer.org/installer | php
	php composer.phar install --dev
#### Option 2: Composer is installed globally

    cd laravel
	composer install --dev

If you haven't already, you might want to make [composer be installed globally](http://andrewelkins.com/programming/php/setting-up-composer-globally-for-laravel-4/) for future ease of use.

Please note the use of the `--dev` flag.

Some packages used to pre-process and minify assets are required on the development environment.

When you deploy your project on a production environment you will want to upload the ***composer.lock*** file used on the development environment and only run `php composer.phar install` on the production server.

This will skip the development packages and ensure the version of the packages installed on the production server match those you developed on.

NEVER run `php composer.phar update` on your production server.

### Step 3: Configure Environments

Laravel 4 will load configuration files depending on your environment. 

Open ***bootstrap/start.php*** and edit the following lines to match your settings. You want to be using your machine name in Windows and your hostname in OS X and Linux (type `hostname` in terminal). Using the machine name will allow the `php artisan` command to use the right configuration files as well.

    $env = $app->detectEnvironment(array(

        'local' => array('your-local-machine-name'),
        'staging' => array('your-staging-machine-name'),
        'production' => array('your-production-machine-name'),

    ));

Now create the folder inside ***app/config*** that corresponds to the environment the code is deployed in. This will most likely be ***local*** when you first start a project.

You will now be copying the initial configuration file inside this folder before editing it. Let's start with ***app/config/app.php***. So ***app/config/local/app.php*** will probably look something like this, as the rest of the configuration can be left to their defaults from the initial config file:

    <?php

    return array(

        'providers' => append_config(array(
            'Barryvdh\Debugbar\ServiceProvider',
            'Way\Generators\GeneratorsServiceProvider',
            'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider', 
        
        ))
    );

### Step 4: Configure Database

Now that you have the environment configured, you need to create a database configuration for it. Copy the file ***app/config/database.php*** in ***app/config/local*** and edit it to match your local database settings. You can remove all the parts that you have not changed as this configuration file will be loaded over the initial one.

### Step 5: Configure Mailer

In the same fashion, copy the ***app/config/mail.php*** configuration file in ***app/config/local/mail.php***. Now set the `address` and `name` from the `from` array in ***config/mail.php***. Those will be used to send account confirmation and password reset emails to the users.
If you don't set that registration will fail because it cannot send the confirmation email.

### Step 6: Populate Database
Run these commands to create and populate Users table:

	php artisan migrate
	php artisan db:seed

### Step 7: Set up Stripe
Create a new file at ***app/config/local/stripe.php*** and populate it with information from your Stripe account.

    return [
    	'secret_key' => 'your secret stripe test key',
    	'publishable_key' => 'your publishable stripe test key '
    ];

For production, your file ***app/config/local/stripe.php*** to your production environment folder at ***app/config/production/stripe.php*** and replace the keys with your live keys.

### Step 8: Make sure app/storage is writable by your web server.

If permissions are set correctly:

    chmod -R 775 app/storage

Should work, if not try

    chmod -R 777 app/storage

### Step 9: Set up Gulp
Install node and npm using one of the techniques from [node-and-npm-in-30-seconds.sh](https://gist.github.com/isaacs/579814). Then install gulp globally. 
```
npm install -g gulp
gulp
```
To run a single task:
```
gulp name-of-task
```

### Step 10: Start Page

### Client portal login
Navigate to your Laravel 4 website and login at /user/login:

    username : user
    password : user

Create a new user at /user/create

To test the payment interface, use the following test card information and any valid expiration date:
```
card number: 4242424242424242 
cvc: 4242 
expiration date: 5/2016
```
### Business portal login
Navigate to /admin

    username: admin
    password: admin

-----
## Application Structure

The structure of this starter site is the same as default Laravel 4 with one exception.
This starter site adds a `library` folder and a `helpers` folder. Both folders house application specific library files, services, and validators.
The files within library could also be handled within a composer package, but is included here as an example.

### Production Launch

By default debugging is enabled. Before you go to production you should disable debugging in `app/config/app.php`

###Fortrabbit

Included fortrabbit.yml file for Fortrabbit deployment. Note that Fortrabbit does not install dev packages by default.

-----
## License

This is free software distributed under the terms of the MIT license

## Additional information

Based on [Laravel-4-Bootstrap-Starter-Site](https://github.com/andrewelkins/Laravel-4-Bootstrap-Starter-Site) by Andrew Welkins, with help from [Laracasts](https://laracasts.com). 