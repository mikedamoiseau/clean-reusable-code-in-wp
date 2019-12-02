#!/bin/bash -e

echo "Installing WordPress client tool..."
cd /var/www/html && curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && chmod +x wp-cli.phar && mv wp-cli.phar /usr/local/bin/wp

wp_present() {
  [ -f wp-login.php ]
}

wp_config_present() {
  [ -f wp-config.php ]
}

wait_for_db() {
  counter=0
  echo "Connecting to mysql"
  while ! curl --silent mysql:3306 >/dev/null; do
    counter=$((counter+1))
    if [ $counter == 30 ]; then
      echo "Error: Couldn't connect to mysql."
      exit 1
    fi
    echo "Trying to connect to mysql. Attempt $counter."
    sleep 5
  done
}

##########

echo "Install MySQL client if needed..."
apt-get update && apt-get install mariadb-client -y

# If no WordPress files found, download the core
if ! wp_present; then
    echo "wp core download --allow-root"
	wp core download --allow-root
fi

# If no configuration file found, configure and install the instance
if ! wp_config_present; then

  wp config create --dbname="example" --dbuser=root --dbpass="buzzwoo" --dbhost=mysql --dbprefix="wp_" --allow-root

  wp core install --url=localhost --title="example" --admin_user="admin" --admin_password="qwertyUIOP1234%^&*" --admin_email="adminwp@buzzwoo.de" --allow-root
fi

# Wait for the database
wait_for_db

echo "Starting the Apache process..."
apache2-foreground
