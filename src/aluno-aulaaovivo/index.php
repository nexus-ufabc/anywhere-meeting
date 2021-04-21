<!DOCTYPE html>
<?php
  $page = $_SERVER['PHP_SELF'];
  $sec = "3";
?>
<html>
  <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <link
      defer
      href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
      rel="stylesheet"
    />
    <link
      defer
      href="https://fonts.googleapis.com/css?family=Amiko&display=swap"
      rel="stylesheet"
    />
    <link defer href="./css/main.css" rel="stylesheet" />
    <title>Anywhere Meeting :: Aluno - Assistir ao vivo</title>
    <script defer type="text/javascript" src="./script.js"></script>
  </head>
  <body>
    <div class="v41_2">
      <div class="v41_3">
        <div class="v41_4">
        <?php
          $servername = "127.0.0.1";
          $username = "adminawm";
          $password = "@dminAWM123";
          $dbname = "DBAWM";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              echo "Error: <br>" . $conn->connect_error;          
              die("Connection failed: " . $conn->connect_error);
          } 

          $transcript = "";
          $sql = "SELECT * FROM Aulas WHERE IdProfessor = 1 AND Aovivo = 1";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              printf("<div class='v41_5'></div>");
              printf("<div class='v41_6'></div>");
              printf("<span class='v41_7'>Ao vivo</span>");
              printf("</div>");
              printf("<span class='v41_8'>%s</span>", $row["Descricao"]);
              $transcript = $row["Transcript"];
            }
          } 
          else {
            printf("<div></div>");
            printf("<div></div>");
            printf("<span>&nbsp;</span>");
            printf("</div>");
            printf("<span class='v41_8'>Nenhuma aula online no momento</span>");
          }

          printf("</div>");
          printf("<div class='v41_9'>");
          printf("<div class='v41_10'></div>");
          printf("<div class='v41_11'></div>");
          printf("<span class='v41_12'>%s</span>", $transcript);
          printf("</div>");

          mysqli_close($conn);
        ?>
      <div class="v41_13">
        <div class="v41_14"></div>
        <span class="v41_15">
          Nexus | Sociotechnical Systems Research Initiative</span
        >
        <div class="v41_16"></div>
        <div class="v41_17"></div>
        <div class="v41_18"></div>
        <div class="v41_19"></div>
        <div class="v41_20"></div>
        <div class="v41_21"></div>
      </div>
      <div class="v41_22">
        <div class="v41_23"></div>
        <a href="../aluno-home/index.php">
          <div class="v47_22">
            <div class="v41_24"></div>
            <div class="v41_25"></div>
            <div class="v41_26"></div>
          </div>
        </a>
        <span class="v41_27">Anywhere Meeting</span>
        <div class="v41_28">
          <div class="v41_29"></div>
          <span class="v41_30">Pedro Sampaio</span>
          <div class="v41_31"></div>
        </div>
      </div>
      <div class="v41_32" style="display: none !important">
        <div class="v41_33">
          <div class="v41_34"></div>
          <div class="v41_35"></div>
          <div class="v41_36"></div>
          <div class="v41_37"></div>
          <div class="v41_38"></div>
        </div>
        <span class="v41_39">Reproduzindo...</span>
      </div>
      <div class="v41_40">
        <div class="v41_41"></div>
        <a onclick="speechSynthesis.cancel(); playbackEffect('stop');">
          <div class="v41_42"></div>
        </a>
      </div>
      <div class="v41_43">
        <a href="../aluno-home/index.php">
          <div class="v47_22">
            <div class="v41_24"></div>
            <div class="v41_25"></div>
            <div class="v41_26"></div>
          </div>
          <div class="v41_44"></div>
          <span class="v41_45">Deixar aula</span>
          <div class="v41_46"></div>
        </a>
      </div>
      <div class="v41_47">
        <div class="v41_48"></div>
        <a onclick="speechSynthesis.pause(); playbackEffect('pause');">
          <div class="v41_49"></div>
        </a>
      </div>
      <div class="v41_50">
        <div class="v41_51"></div>
        <a onclick="listen()">
          <div class="v41_52"></div>
        </a>
      </div>
      <div class="v41_53">
        <span class="v41_54">Tonalidade</span>
        <div class="v41_55"></div>
        <div class="v41_56"></div>
        <div class="v41_57"></div>
        <a onclick="increase('.v41_59')">
          <div class="v41_58"></div>
        </a>
        <span class="v41_59">0.9x</span>
        <a onclick="decrease('.v41_59')">
          <div class="v41_60"></div>
        </a>
      </div>
      <div class="v41_61">
        <span class="v41_62">Velocidade</span>
        <div class="v41_63"></div>
        <div class="v41_64"></div>
        <div class="v41_65"></div>
        <a onclick="increase('.v41_67')">
          <div class="v41_66"></div>
        </a>
        <span class="v41_67">1.0x</span>
        <a onclick="decrease('.v41_67')">
          <div class="v41_68"></div>
        </a>
      </div>
    </div>
  </body>
</html>
