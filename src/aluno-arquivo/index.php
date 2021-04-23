<!DOCTYPE html>
<html>
  <head>
    <link
      href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Amiko&display=swap"
      rel="stylesheet"
    />
    <link defer href="./css/main.css" rel="stylesheet" />
    <title>Anywhere Meeting :: Aluno - Ver aquivo</title>
  </head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="./script.js"></script>
  <body>
    <div class="v37_658">
      <span class="v37_673">Upload de transcrição</span
      ><span class="v37_674"
        >Os arquivos não devem ter sido manipulados ou serem provenientes de
        fonte não autorizada.</span
      >
      <div class="v37_682">
        <div class="v37_683"></div>
        <span class="v37_684">
        <table border="0" cellspacing="0" cellpadding="0">
          <?php
            include "../bd.php";
            $conn = getConn();

            $sql = "SELECT * FROM Aulas WHERE IdProfessor = 1";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
                  printf("<tr>");
                  printf("<td>%s</td>", $row["Descricao"]);
                  printf("<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>");
                  printf("<td>");
                  printf("<a href='javascript:editAulaOnClick(%d);'>", $row["Id"]);
                  printf("<img src='./images/v49_160.png' width='20' height='25'>");
                  printf("</a>");
                  printf("</td>");
                  printf("<td>&nbsp;&nbsp;&nbsp;</td>");
                  printf("<td>");
                  printf("<a href='javascript:deleteAulaOnClick(%d);'>", $row["Id"]);
                  printf("<img src='./images/v49_159.png' width='20' height='25'>");
                  printf("</a>");
                  printf("</td>");
                  //printf("<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>");
                  //printf("<td>%s</td>", $row["Data"]);
                  printf("</tr>");        
                }
            } else {
                echo "0 results";
            }
            
            mysqli_close($conn);
          ?>
          </table>
        </span>
      </div>
      <span class="v37_675"
        >Selecione uma aula listada abaixo para iniciar sua transmissão</span
      ><span class="v37_686">Aulas arquivadas</span>
      <div class="v43_336">
        <div class="v43_337"></div>
        <span class="v43_338">
          <a href="https://pesquisa.ufabc.edu.br/nexus/">
          Nexus | Sociotechnical Systems Research Initiative
          </a>
        </span>
        <div class="v43_339"></div>
        <div class="v43_340"></div>
        <div class="v43_341"></div>
        <div class="v43_342"></div>
        <div class="v43_343"></div>
        <div class="v43_344"></div>
      </div>
      <div class="v43_345">
        <div class="v43_346"></div>
        <a href="../aluno-home/index.php">
          <div class="v47_33">
            <div class="v43_347"></div>
            <div class="v43_348"></div>
            <div class="v43_349"></div>
          </div>
        </a>
        <span class="v43_350">Anywhere Meeting</span>
        <div class="v43_351">
          <div class="v43_352"></div>
          <span class="v43_353">Pedro Sampaio</span>
          <div class="v43_354"></div>
        </div>
      </div>
      <div class="v43_355" style="display: none !important">
        <div class="v43_356">
          <div class="v43_357"></div>
          <div class="v43_358"></div>
          <span class="v43_359">Ao vivo</span>
        </div>
        <span class="v43_360"
          >Paulo Castro em “Introdução às metodologias ágeis”</span
        >
      </div>
      <div class="v43_363">
        <div class="v43_364"></div>
        <span class="v43_365">Buscar arquivo</span>
        <div class="v43_362"></div>
      </div>
    </div>
  </body>
</html>
