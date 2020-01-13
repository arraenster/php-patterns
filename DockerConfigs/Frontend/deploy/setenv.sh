#!/bin/sh

DB_USER=$bamboo_dbUser
DB_PASSWORD=$bamboo_dbPwd
DB_HOST=$bamboo_dbHost
DB_NAME=$bamboo_dbName

sed -i "/DATABASE_URL/c\DATABASE_URL=mysql://$DB_USER:$DB_PASSWORD@$DB_HOST/$DB_NAME" .env
sed -i "/DATABASE_TEST_URL/c\DATABASE_TEST_URL=mysql://$DB_USER:$DB_PASSWORD@$DB_HOST/$DB_NAME_test" .env