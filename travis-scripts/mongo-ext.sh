wget https://pecl.php.net/get/mongodb-1.1.6.tgz
tar -xzf mongodb-1.1.6
sh -c "cd mongodb-1.1.6 && phpize && ./configure && sudo make install"
echo "extension=mongodb.so" >> `php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||"`