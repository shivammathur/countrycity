sudo apt update -y
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update -y
sudo apt install -y php$1 curl mongodb
sudo update-alternatives --set php /usr/bin/php$1
php -v
sudo curl -s https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer