echo "Checking code style..."
docker-compose exec php-fpm vendor/bin/phpcs -p --standard=PSR2 src
sleep 1
echo "Removing test database schema..."
docker-compose exec php-fpm bin/console doctrine:schema:drop --full-database --force --env=test
sleep 1
echo "Removing migration versions from table log..."
docker-compose exec php-fpm bin/console doctrine:migrations:version --delete --all --env=test -q
sleep 2
echo "Running migrations for tests database..."
docker-compose exec php-fpm bin/console doctrine:migrations:migrate --env=test -q
sleep 5
echo "Running fixtures..."
docker-compose exec php-fpm bin/console doctrine:fixtures:load --env=test -q  --group=group_orm
sleep 5
echo "Running unit tests..."
docker-compose exec php-fpm vendor/bin/simple-phpunit -c phpunit.xml ./tests/unit
sleep 3
echo "Running functional tests..."
docker-compose exec php-fpm vendor/bin/simple-phpunit -c phpunit.xml ./tests/functional