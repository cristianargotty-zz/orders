# orders
Application Test API Symfony + GraphQL + React
========================

Requirements
------------

  * PHP 7.1.3 or higher;
  * Yarn [install yarn][2];
  * composer;
  * and the [usual Symfony application requirements][1].

Installation
------------

Execute this command to install the project:

```bash
$ composer install
```

## Database
To define the database connection parameters you have to edit the `.env` file (for example MySQL).
```dotenv
DATABASE_URL=mysql://user:password@mysql:3306/dbname
```
you can let it create the database for you (if you did not already created it):

```bash
bin/console doctrine:database:create --if-not-exists
```

Update the Database Tables/Schema:

```bash
bin/console doctrine:schema:update -f
```

## Assets
install node modules:

```bash
yarn install
```
To build the assets, run:

```bash
 yarn encore dev
```

Usage
-----

Execute this command to run the built-in web server and access the application in your
browser at <http://localhost:8000>:

```bash
bin/console server:run
```

[1]: https://symfony.com/doc/current/reference/requirements.html
[2]: https://yarnpkg.com/lang/en/docs/install/
