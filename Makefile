for-linux-env:
	echo "UID=$$(id -u)" >> .env
	echo "GID=$$(id -g)" >> .env
install:
	@make build
	@make up
	docker-compose exec app-client composer install
	docker-compose exec app-client cp .env.example .env
	docker-compose exec app-client php artisan key:generate
	docker-compose exec app-client chmod -R 777 storage bootstrap/cache
	docker-compose exec app-payment composer install
	docker-compose exec app-payment cp .env.example .env
	docker-compose exec app-payment php artisan key:generate
	docker-compose exec app-payment chmod -R 777 storage bootstrap/cache
	docker-compose exec app-payment php artisan migrate
	docker-compose exec app-payment php artisan migrate:refresh --seed
build:
	docker-compose build
up:
	docker-compose up --detach
stop:
	docker-compose stop
down:
	docker-compose down --remove-orphans
down-v:
	docker-compose down --remove-orphans --volumes
restart:
	@make down
	@make up
destroy:
	docker-compose down --rmi all --volumes --remove-orphans
remake:
	@make destroy
	@make install
ps:
	docker-compose ps
run-client:
	docker-compose exec app-client php artisan serve --host=0.0.0.0 --port=8000
run-payment:
	docker-compose exec app-payment php artisan serve --host=0.0.0.0 --port=8001
run-payment-queue:
	docker-compose exec app-payment php artisan queue:work

