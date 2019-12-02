# example
Short description of the project.
## Installation
Download Docker
```
https://www.docker.com/community-edition
```
Clone the repository
```
git clone git@git.buzzwoo.de:buzzwoo/example.git
```
Setup Docker Container / Images
```
cd example && docker-compose up
```
SSH Into the Docker container
```
cd example && docker-compose exec php bash
```
Composer Install
```
cd /var/www/html && composer install && composer dump-autoload
```
## Documentation
### Generate the documentation
Generating Documentation with Swagger
```
cd /var/www/development && chmod +x swagger.sh
./swagger.sh
```
### View the documentation
[http://localhost/swagger](http://localhost/swagger)
# clean-reusable-code-in-wp
