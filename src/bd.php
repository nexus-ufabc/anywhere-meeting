<?php
function getConn(){
    $config = parse_ini_file(__DIR__ . '/../setup/config.ini', true);
    $servername = $config['database']['servername'];
    $username = $config['database']['username'];
    $password = $config['database']['password'];
    $dbname = $config['database']['dbname'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        echo "Error: <br>" . $conn->connect_error;          
        die("Connection failed: " . $conn->connect_error);
    } 

    return $conn;
}
?>