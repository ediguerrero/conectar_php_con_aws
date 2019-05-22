# conectar_php_con_aws
## Descripción
aun necesita habilitar el php en el servidor httpd ademas, estan los comandos para hacer del composer global


## este es el comando
###
```

curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

```

## y el comando para instalar los require para aws

### 
```
sudo php /usr/local/bin/composer require aws/aws-sdk-php
```

si sale algun error de xml el siguiente comando lo soluciona
```
sudo yum install php-xml
```
y listo solo faltaria habilitar el servicio para que php conecte con el index

## instalar todas las dependencias para php
### sudo yum install php php-mysql php-devel php-gd php-pecl-memcache php-pspell php-snmp php-xmlrpc php-xml


## o con estos comandos es mas facil
##
```
#!/bin/bash
yum update -y
amazon-linux-extras install -y lamp-mariadb10.2-php7.2 php7.2
yum install -y httpd mariadb-server
systemctl start httpd
systemctl enable httpd
usermod -a -G apache ec2-user
chown -R ec2-user:apache /var/www
chmod 2775 /var/www
find /var/www -type d -exec chmod 2775 {} \;
find /var/www -type f -exec chmod 0664 {} \;
echo "<?php phpinfo(); ?>" > /var/www/html/phpinfo.php
```
