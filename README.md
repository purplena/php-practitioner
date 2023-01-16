# Setup

- run `docker-compose -f .devcontainer/docker-compose.yml up`
- composer install
- import database structure `cat .devcontainer/database-structure.sql | docker-compose -f .devcontainer/docker-compose.yml exec -T mysql mysql -u user -ppassword main`

