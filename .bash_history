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
