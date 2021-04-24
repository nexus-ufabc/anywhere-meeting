# anywhere-meeting

A web application that offers an alternative to follow video calls through textual feedbacks in a situation where the internet connection is bad.

# Dependencies

- [MySQL](https://www.mysql.com/)
- A PHP web server like [Apache](https://httpd.apache.org/)

# How to setup this project

Once the dependencies are properly installed, follow the steps below:

- Assuming a server is going to be configured, install the dependencies

```console
    $ sudo apt-get update
    $ sudo apt-get install apache2
    $ sudo apt-get install default-jre
    $ sudo apt-get install php libapache2-mod-php php-mysql
    $ sudo chmod 777 /var/www/html/
```

- Make sure SSL is running

```console
    $ sudo a2enmod ssl
    $ sudo a2ensite default-ssl
    $ sudo /etc/init.d/apache2 restart
```

- Clone the project locally and copy it to the web server folder

```console
    $ git clone https://github.com/nexus-ufabc/anywhere-meeting.git
    $ cd anywhere-meeting
    $ sudo cp -a anywhere-meeting/src/. /var/www/html/
    $ sudo mkdir /var/www/setup
    $ sudo cp -a anywhere-meeting/setup/config.ini /var/www/setup/config.ini
```

- Install and configure MySQL

```console
    $ sudo apt-get install mysql-server
    $ sudo mysql --defaults-file=/etc/mysql/debian.cnf
    mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '<your root pwd>';
    mysql> FLUSH PRIVILEGES;
    mysql> CREATE DATABASE DBAWM;
    mysql> CREATE USER '<your db user>'@'localhost' IDENTIFIED BY '<your db user pwd>';
    mysql> GRANT ALL PRIVILEGES ON DBAWM.* TO '<your db user>'@'localhost';
    mysql> FLUSH PRIVILEGES;
    mysql> ALTER USER '<your db user>'@'localhost' IDENTIFIED WITH mysql_native_password BY '<your db user pwd>';
    mysql> FLUSH PRIVILEGES;
    mysql> USE DBAWM;
    mysql> source setup/ddl.mysql.sql
    mysql> EXIT;
```

## License

MIT [license](https://github.com/nexus-ufabc/anywhere-meeting/blob/main/LICENSE)
