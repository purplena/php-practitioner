Here is the code that was created by [Jeffrey Way](https://github.com/JeffreyWay) from [laracasts.com](https://laracasts.com/)
The course is called [**The PHP Practitioner**](https://laracasts.com/series/php-for-beginners)

# Setup

## Github Codespace

- Todo

## Manual install

- run `docker-compose -f .devcontainer/docker-compose.yml up`
- composer install `docker-compose -f .devcontainer/docker-compose.yml exec web composer install`
- create the `.env` file from the `.env.example` file
- import database structure `docker-compose -f .devcontainer/docker-compose.yml exec web php core/install.php`

##  Code formatting

- To run code Linter use `composer fix`
  - php cs fixer : https://github.com/PHP-CS-Fixer/PHP-CS-Fixer
  - php cs configurator : https://mlocati.github.io/php-cs-fixer-configurator
