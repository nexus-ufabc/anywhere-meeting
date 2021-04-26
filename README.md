# anywhere-meeting

A web application that offers an alternative to follow video calls through textual feedbacks in a situation where the internet connection is bad.

# Dependencies

- [MySQL](https://www.mysql.com/)
- A PHP web server like [Apache](https://httpd.apache.org/)

# How to run this project

As soon as the [Dependencies](#Dependencies) are installed properly, clone the project locally and start the project using the [index.html](https://github.com/nexus-ufabc/anywhere-meeting/blob/main/src/index.html) file inside the folder anywhere-meeting/src/index.html.

The [POC section](# POC and first tests) provides how this project was validated using a proof of concept (POC) scenario.

Installation further details and directions can be done following the [setup section](# How to setup this project).

# POC and first tests

This project was validated using a proof of concept (POC) scenario, using two users: professor and student. The following logins are pre-configured in the system:

<details>
    <summary>Professor</summary>
    <p>User: professorpaulo</p>
    <p>Password: 1234</p>
</details>

<details>
    <summary>Student</summary>
    <p>User: alunopedro</p>
    <p>Password: 5678</p>
</details>

Don't forget to follow the instructions in the [setup section](# How to setup this project) in order to run the system correctly.

# How to setup this project

- Install the dependencies

```console
    $ sudo apt-get update
    $ sudo apt-get install apache2
    $ sudo apt-get install default-jre
    $ sudo apt-get install php libapache2-mod-php php-mysql
    $ sudo chmod 777 /var/www/html/
```

- Make sure SSL is running (Assuming a HTTPS server is going to be configured)

```console
    $ sudo a2enmod ssl
    $ sudo a2ensite default-ssl
    $ sudo /etc/init.d/apache2 restart
```

- Clone the project locally and copy it to the web server folder

```console
    $ git clone https://github.com/nexus-ufabc/anywhere-meeting.git
    $ sudo cp -a anywhere-meeting/src/. /var/www/html/
    $ sudo mkdir /var/www/setup
    $ sudo cp -a anywhere-meeting/setup/config.ini /var/www/setup/config.ini
    $ cd anywhere-meeting
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
    mysql> source setup/poc.sql
    mysql> EXIT;
```

The last setup script (poc.sql) is optional, however, you need to run it if you want to test this app as the [POC section](# POC and first tests) explained.

- Configure the ini file according with the database values

```console
    $ vi setup/config.ini
```

## License

MIT [license](https://github.com/nexus-ufabc/anywhere-meeting/blob/main/LICENSE)
