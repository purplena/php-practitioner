Here is the code that was created by [Jeffrey Way](https://github.com/JeffreyWay) from [laracasts.com](https://laracasts.com/)
The course is called [**The PHP Practitioner**](https://laracasts.com/series/php-for-beginners)

# Setup

## Github Codespace

- Soon

## Manual install

- run `docker-compose -f .devcontainer/docker-compose.yml up`
- composer install `docker-compose -f .devcontainer/docker-compose.yml exec web composer install`
- import database structure `cat .devcontainer/database-structure.sql | docker-compose -f .devcontainer/docker-compose.yml exec -T mysql mysql -u user -ppassword main`
- create the `.env` file from the `.env.example` file

## Next steps

- Codespace ready
- Code Linter (php cs fixer : https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)
