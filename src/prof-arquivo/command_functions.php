<?php
  $servername = "127.0.0.1";
  $username = "adminawm";
  $password = "@dminAWM123";
  $dbname = "DBAWM";

  if (isset($_POST['command']) && !empty($_POST['command'])) {  
    $command = $_POST['command'];
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        echo "Error: <br>" . $conn->connect_error;          
        die("Connection failed: " . $conn->connect_error);
    } 

    switch ($command) {
      case 'delete':
        $id = $_POST['id'];
        $sqlDelete = "DELETE FROM Aulas WHERE Id = $id";
        if ($conn->query($sqlDelete) === FALSE) {
          echo "Error: " . $sqlDelete . "<br>" . $conn->error;          
        }
        echo "delete command executed successfully";
        break;
      default:
        echo "Nothing is done here: Unkown $command found.";
    }

    $conn->close();
  }
  else {
    echo "Command not found! Nothing is done here: $command is empty or not set.";
  }
?>