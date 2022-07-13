#!/bash/bash

# get app info
read -p 'Directory name: ' dir_name;
read -p 'Database name: ' db_name;
read -s -p 'Database password: ' db_pass;
echo;
read -p 'Site url: https://' site_url;

# create database
mysql -u root -p${db_pass} -e "create database ${db_name}";

# setup vhost
cd /etc/apache2/sites-available/
sudo cp example.com.conf ${site_url}.conf
sudo sed -i "s/ADMIN_PLACEHOLDER/$admin_email/g" ${site_url}.conf;
sudo sed -i "s/URL_PLACEHOLDER/$site_url/g" ${site_url}.conf;
sudo sed -i "s/DIRECTORY_PLACEHOLDER/$dir_name/g" ${site_url}.conf;
sudo a2ensite ${site_url}.conf
sudo service apache2 restart;

# clone repo
cd /var/www/;
sudo mkdir ${dir_name};
cd ${dir_name};
sudo git clone https://github.com/jasonpolito/lego.git html;
cd html;
sudo composer install --no-interaction;

# configure env
echo "ADMIN_APP_URL=${site_url}" | sudo tee -a .env;
echo "ADMIN_APP_PATH=admin" | sudo tee -a .env;

# run migrations
cd /var/www/${dir_name}/html;
sudo php artisan migrate;

# set upload limits
cd /var/www/${dir_name}/html/public;
echo "php_value upload_max_filesize 20M" | sudo tee -a .htaccess;
echo "php_value post_max_size 20M" | sudo tee -a .htaccess;

# fix permissions
cd /var/www/${dir_name}/;
sudo chown -R root:www-data html && sudo chmod -R 775 html;

# install ssl
sudo certbot -d ${site_url};

# create admin
cd /var/www/${dir_name}/html;
sudo php artisan twill:superadmin;