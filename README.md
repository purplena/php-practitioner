Here is the code that was created by [Jeffrey Way](https://github.com/JeffreyWay) from [laracasts.com](https://laracasts.com/)
The course is called [**The PHP Practitioner**](https://laracasts.com/series/php-for-beginners)

# Setup

## Github Codespace

- This app is codespace ready, you don't need to run any install command, just open the codespace and you are ready to go.

## Manual install

- run `docker-compose -f .devcontainer/docker-compose.yml up`
- composer install `docker-compose -f .devcontainer/docker-compose.yml exec web composer install`
- import database structure `cat .devcontainer/database-structure.sql | docker-compose -f .devcontainer/docker-compose.yml exec -T mysql mysql -u user -ppassword main`
- create the `.env` file from the `.env.example` file

##  Code formatting

- To run code Linter use `composer fix`
  - php cs fixer : https://github.com/PHP-CS-Fixer/PHP-CS-Fixer
  - php cs configurator : https://mlocati.github.io/php-cs-fixer-configurator
