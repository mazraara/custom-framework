

open /etc/host file on you host machine and
add new line:
 - `0.0.0.0 custom-framework.test`

Open terminal:
 - Run: 'cd <cloned project dir>'
 - Run: `docker-compose build`
 - Run: `docker-compose up -d`
 - Run: `docker-compose exec php /bin/bash`
 - Run: `composer install`
 
Run unit tests:
- Run: `docker-compose exec php /bin/bash`
- Run: `php bin/phpunit tests`

PMA:
- http://localhost:8080
