# anywhere-meeting

A web application that offers an alternative to follow video calls through textual feedbacks in a situation where the internet connection is bad.

# Dependencies

- [MySQL](https://www.mysql.com/)
- A [PHP](https://www.php.net/) web server like [Apache](https://httpd.apache.org/)

# How to run this project

As soon as the [Dependencies](#Dependencies) are installed properly and the project is ready following the [Setup section](#how-to-setup-this-project), start the project using the [index.html](https://github.com/nexus-ufabc/anywhere-meeting/blob/main/src/index.html) file inside the folder [anywhere-meeting/src](https://github.com/nexus-ufabc/anywhere-meeting/tree/main/src).

The [POC section](#poc-and-first-tests) provides how this project was validated using a proof of concept (POC) scenario.

# POC and first tests

This project was validated using a proof of concept (POC) scenario with two users: professor and student. The following logins are pre-configured in the system:

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

Don't forget to follow the instructions in the [Setup section](#how-to-setup-this-project) in order to run the system correctly.

# How to setup this project

- Install the dependencies

```console
    $ sudo apt-get update
    $ sudo apt-get install apache2
    $ sudo apt-get install default-jre
    $ sudo apt-get install php libapache2-mod-php php-mysql
    $ sudo chmod 777 /var/www/html/
```

- If you are not running this product locally, make sure SSL is configured in your server (HTTPS calls). This product uses the Chrome [Web Speech API](https://wicg.github.io/speech-api/), therefore, all server installations should run on HTTPS as stated [here](https://developers.google.com/web/updates/2013/01/Voice-Driven-Web-Apps-Introduction-to-the-Web-Speech-API).

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

The last setup script (poc.sql) is optional, however, you need to run it if you want to test this app as the [POC section](#poc-and-first-tests) explained.

- Configure the ini file according with the database values

```console
    $ sudo vi /var/www/setup/config.ini
```

Finally, you are able to run this project according with the [Run instruction section](#how-to-run-this-project).

## License

MIT [license](https://github.com/nexus-ufabc/anywhere-meeting/blob/main/LICENSE)
