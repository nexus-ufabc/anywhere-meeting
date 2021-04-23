<?php
  include "../bd.php";
  $conn = getConn();

  if (isset($_POST['command']) && !empty($_POST['command'])) {  
    $command = $_POST['command'];

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