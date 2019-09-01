phpunit --configuration phpunit.xml.dist --coverage-clover build/logs/clover.xml
sh -c php vendor/bin/coveralls -v
bash <(curl -s https://codecov.io/bash)