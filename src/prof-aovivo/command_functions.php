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
      case 'new-aula':
        $codigo = $_POST['codigo'];
        $descricao = $_POST['descricao'];
        $sqlInsert = "INSERT INTO Aulas(IdProfessor, Codigo, Data, Descricao) VALUES (1, '{$codigo}', NOW(), '{$descricao}')";
        if ($conn->query($sqlInsert) === FALSE) {
          echo "Error: " . $sqlInsert . "<br>" . $conn->error;          
        }
        echo "new-aula command executed successfully";
        break;
      case 'update-transcript':
        if (isset($_POST['transcript']) && !empty($_POST['transcript'])) { 
          $codigo = $_POST['codigo'];
          $transcript = $_POST['transcript'];
          $sqlUpdate = "UPDATE Aulas SET Transcript = '{$transcript}' WHERE Codigo = '{$codigo}'";
          if ($conn->query($sqlUpdate) === FALSE) {
            echo "Error: " . $sqlUpdate . "<br>" . $conn->error;          
          }
          echo "update-transcript command executed successfully";
        }
        break;
      case 'update-aovivo':
        $codigo = $_POST['codigo'];
        $aovivo = $_POST['aovivo'];
        $sqlUpdateAovivo = "UPDATE Aulas SET Aovivo = $aovivo WHERE Codigo = '{$codigo}'";
        if ($conn->query($sqlUpdateAovivo) === FALSE) {
          echo "Error: " . $sqlUpdateAovivo . "<br>" . $conn->error;          
        }
        echo "update-aovivo command executed successfully";
      default:
        echo "Nothing is done here: Unkown $command found.";
    }

    $conn->close();
  }
  else {
    echo "Command not found! Nothing is done here: $command is empty or not set.";
  }
?>