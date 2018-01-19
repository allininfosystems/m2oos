pwd
rm -rf var/*
rm -rf pub/static/*
php bin/magento cache:status
php bin/magento cache:clean
php bin/magento cache:flush
php bin/magento indexer:reindex
php bin/magento setup:static-content:deploy
php bin/magento setup:static-content:deploy -f
chmod -R 7777 var pub/static
rm -rf var/*
rm -rf pub/static/*
php bin/magento cache:flush
php bin/magento cache:clean
php bin/magento setup:static-content:deploy -f
chmod -R 7777 var pub/static
rm -rf var/*
rm -rf pub/static/*
php bin/magento cache:flush
php bin/magento cache:clean
php bin/magento setup:static-content:deploy -f
chmod -R 7777 var pub/static
rm -rf var/*
rm -rf pub/static/*
php bin/magento cache:flush
php bin/magento cache:clean
php bin/magento setup:static-content:deploy -f
chmod -R 7777 var pub/static
pwd
rm -rf var/* pub/static/*
php bin/magento cache:status
php bin/magento cache:clean
php bin/magento cache:flush
php bin/magento setup:static-content:deploy
php bin/magento setup:static-content:deploy -f
chmod -R 7777 var pub/static
php bin/magento deploy:mode:
rm -rf var/* pub/static/*
php bin/magento cache:flush
php bin/magento cache:clean
php bin/magento setup:static-content:deploy -f
chmod -R 777 var pub/static
rm -rf var/* pub/static/*
php bin/magento cache:clean
php bin/magento cache:flush
php bin/magento indexer:reindex
php bin/magento setup:static-content:deploy -f
chmod -R 777 var pub/static
php bin/magento deploy:mode:show
rm -rf var/* pub/static/*
php bin/magento cache:clean
php bin/magento cache:flush
php bin/magento setup:static-content:deploy -f
chmod -R 777 var pub/static
pwd
mysqldump -u m2oos -p m2oos>
mysqldump -u m2oos -p m2oos >m2oos.sql
mysqldump -u m2oos -p m2oos > m2oos.sql
mysqldump -um2oos -p m2oos > m2oos.sql
pwd
rm -rf var/*
rm -rf pub/static/*
php bin/magento setup:static-content:deploy -f 
chmod -R 777 var pub/static
php bin/magento indexer:reindex
m2oos@2017
pwd
rm -rf var/*
rm -rf pub/static/*
php bin/magento setup:static-content:deploy -f
chmod -R 777 var pub/static
pwd
php bin/magento cache:status
php bin/magento deploy:mode:show
rm -rf var/* pub/static/*
php bin/magento cache:clear
php bin/magento cache:clean
php bin/magento cache:flush
php bin/magento setup:static-content:deploy
php bin/magento setup:static-content:deploy -f
php bin/magento indexer:reindex
chmod -R 777 var pub/static
php bin/magento module:status
