up:
	docker-compose run php composer install && docker-compose up -d

down:
	docker-compose down

test:
	docker-compose exec php vendor/bin/phpunit tests