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
    <title>Anywhere Meeting :: Professor - Gerenciar arquivos</title>
  </head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="./script.js"></script>
  <body>
    <div class="v49_99">
      <span class="v49_100">Upload de transcrição</span
      ><span class="v49_101"
        >Os arquivos adicionados serão armazenados e listados para todos os
        assinantes deste canal. Irão constar na lista ao lado, “Aulas
        arquivadas”.</span
      >
      <div class="v49_102">
        <div class="v49_103"></div>
        <span class="v49_104">
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
      <span class="v49_106">Edite ou delete as aulas listadas abaixo</span
      ><span class="v49_107">Aulas arquivadas</span>
      <div class="v49_108">
        <div class="v49_109"></div>
        <span class="v49_110">
          Nexus | Sociotechnical Systems Research Initiative</span
        >
        <div class="v49_111"></div>
        <div class="v49_112"></div>
        <div class="v49_113"></div>
        <div class="v49_114"></div>
        <div class="v49_115"></div>
        <div class="v49_116"></div>
      </div>
      <div class="v49_134">
        <div class="v49_135"></div>
        <span class="v49_136">Adicionar arquivo</span>
        <div class="v49_137"></div>
      </div>
      <div class="v49_138">
        <div class="v49_139"></div>
        <a href="../prof-home/index.html">
          <div class="v49_140">
            <div class="v49_141"></div>
            <div class="v49_142"></div>
            <div class="v49_143"></div>
          </div>
        </a>
        <span class="v49_144">Anywhere Meeting</span>
        <div class="v49_145">
          <div class="v49_146"></div>
          <span class="v49_147">Paulo Castro</span>
          <div class="v49_148"></div>
        </div>
      </div>
    </div>
  </body>
</html>
