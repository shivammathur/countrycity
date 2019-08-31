wget https://pecl.php.net/get/mongodb-1.5.5.tgz
tar -xzf mongodb-1.5.5
sh -c "cd mongodb-1.5.5 && phpize && ./configure && sudo make install"
echo "extension=mongodb.so" >> `php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||"`