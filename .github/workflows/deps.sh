chmod a+x travis-scripts/mongo-ext.sh
travis-scripts/mongo-ext.sh
composer self-update
composer install
mkdir -p build/logs
mongod --dbpath=data/db &
sleep 3
mongorestore data/db/dump/countrycity/geo.bson
sleep 3