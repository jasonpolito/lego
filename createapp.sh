#!/bash/bash

cd /var/www/;

read -p 'Directory name: ' dir_name;
read -p 'Database name: ' db_name;
read -s -p 'Database password: ' db_pass;
echo;
read -p 'WP admin username: ' admin_name;
read -p 'WP admin email: ' admin_email;
read -s -p 'WP admin password: ' admin_pass;
echo;
read -p 'Site url: https://' site_url;

mysql -u root -p${db_pass} -e "create database ${db_name}";

sudo mkdir ${dir_name};

cd ${dir_name};
sudo mkdir html;
cd html;

sudo wp core download --allow-root;

sudo cp wp-config-sample.php wp-config.php;
sudo sed -i "s/database_name_here/$db_name/g" wp-config.php;
sudo sed -i 's/username_here/root/g' wp-config.php;
sudo sed -i "s/password_here/$db_pass/g" wp-config.php;
echo "define('FS_METHOD', 'direct');" | sudo tee -a ./wp-config.php

sudo wp core install --url=${site_url} --title=${site_url} --admin_user=${admin_name} --admin_password=${admin_pass} --admin_email=${admin_email} --allow-root;

cd /etc/apache2/sites-available/
sudo cp example.com.conf ${site_url}.conf
sudo sed -i "s/ADMIN_PLACEHOLDER/$admin_email/g" ${site_url}.conf;
sudo sed -i "s/URL_PLACEHOLDER/$site_url/g" ${site_url}.conf;
sudo sed -i "s/DIRECTORY_PLACEHOLDER/$dir_name/g" ${site_url}.conf;
sudo a2ensite ${site_url}.conf
sudo service apache2 restart;

cd /var/www/${dir_name}/html;
echo "php_value upload_max_filesize 20M" | sudo tee -a .htaccess;
echo "php_value post_max_size 20M" | sudo tee -a .htaccess;

sudo wp plugin install elementor wordpress-seo --activate --allow-root;
cd /var/www/${dir_name}/html/wp-content/plugins;
sudo cp /home/shared/elementor-pro-3.5.2.zip ./;
sudo cp /home/shared/gp-premium-2.1.1.zip ./;
sudo cp /home/shared/jet-engine.zip ./;
# jet engine key 8b2f9e810d0689fdcb17b6fea46ef60e
sudo wp plugin install gp-premium-2.1.1.zip --activate --allow-root;
sudo wp plugin install elementor-pro-3.5.2.zip --activate --allow-root;
sudo wp plugin install jet-engine.zip --activate --allow-root;
sudo rm elementor-pro-3.5.2.zip;
sudo rm gp-premium-2.1.1.zip;
sudo wp elementor-pro license activate 'ep-vy7vndcOK8EqcH5386kC16364093114j2QBovpUpzh' --allow-root;
sudo wp plugin update elementor-pro --allow-root;
sudo wp plugin update jet-engine --allow-root;
sudo wp plugin update gp-premium --allow-root;
sudo wp option update gen_premium_license_key 98f014c51c5f549e8d321428e5fe5e19 --allow-root;
sudo wp option update gen_premium_license_key_status valid --allow-root;

cd /var/www/${dir_name}/html;

sudo wp theme install generatepress --activate --allow-root;
sudo wp post create --post_type=page --post_title='Home' --post_status=publish --page_template=elementor_header_footer --allow-root;
sudo wp post create --post_type=page --post_title='About' --post_status=publish --page_template=elementor_header_footer --allow-root;
sudo wp post create --post_type=page --post_title='Blog' --post_status=publish --page_template=elementor_header_footer --allow-root;
sudo wp post create --post_type=page --post_title='Contact' --post_status=publish --page_template=elementor_header_footer --allow-root;
sudo wp post create --post_type=page --post_title='Terms of Service' --post_status=publish --page_template=elementor_header_footer --allow-root;

cd /var/www/${dir_name}/;
sudo chown -R root:www-data html && sudo chmod -R 775 html;

sudo certbot -d ${site_url};
