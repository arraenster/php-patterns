echo "Checking code style..."
docker-compose exec php vendor/bin/phpcs -p --standard=PSR2 src tests
sleep 1
echo "Removing test database schema..."
docker-compose exec php bin/console doctrine:schema:drop --full-database --force --env=test
sleep 1
echo "Removing migration versions from table log..."
docker-compose exec php bin/console doctrine:migrations:version --delete --all --env=test -q
sleep 2
echo "Running migrations for tests database..."
docker-compose exec php bin/console doctrine:migrations:migrate --env=test -q
sleep 5
echo "Running fixtures..."
docker-compose exec php bin/console doctrine:fixtures:load --purge-with-truncate --env=test -q
echo "Running tests..."
docker-compose exec php vendor/bin/simple-phpunit -c phpunit.xml ./tests --coverage-html public/codecoverage
sleep 3