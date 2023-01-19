# Setup

- run `docker-compose -f .devcontainer/docker-compose.yml up`
- composer install `docker-compose -f .devcontainer/docker-compose.yml exec web composer install`
- import database structure `cat .devcontainer/database-structure.sql | docker-compose -f .devcontainer/docker-compose.yml exec -T mysql mysql -u user -ppassword main`
- create the `.env` file from the `.env.example` file
