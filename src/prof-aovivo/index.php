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
    <link href="./css/main.css" rel="stylesheet" />
    <title>Anywhere Meeting :: Professor - Ministrar ao vivo</title>
  </head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="./script.js"></script>
  <body onload="loadDatetime()">
    <div class="v49_473">
      <div class="v49_474">
        <a href="javascript:novaTransmissaoOnClick();">
          <div class="v49_475">
            <div id="divTransmissao" class="v49_476"></div>
            <div class="v49_477"></div>
            <span id="labelTransmissao" class="v49_478">Iniciar</span>
          </div>
        </a>
        <span class="v49_479">
          <input type="text" id="nomeAula" style="width: 360px; height: 43px; font-size: x-large  ;">
          <input type="hidden" id="codigoAula" value="">
        </span>
      </div>
      <div class="v49_480">
        <div class="v49_481">
          <br />
          <textarea
            id="readable-text"
            readonly
            style="width: 1235px; height: 480px; font-size: xx-large;"
          ></textarea>
        </div>
        <div class="v49_482"></div>
      </div>
      <div class="v49_484">
        <div class="v49_485"></div>
        <span class="v49_486">
        <a href="https://pesquisa.ufabc.edu.br/nexus/">
          Nexus | Sociotechnical Systems Research Initiative
        </a>
        </span>
        <div class="v49_487"></div>
        <div class="v49_488"></div>
        <div class="v49_489"></div>
        <div class="v49_490"></div>
        <div class="v49_491"></div>
        <div class="v49_492"></div>
      </div>
      <a href="javascript:encerrarAulaOnClick();">
        <div class="v49_493">
          <div class="v49_494"></div>
          <span class="v49_495">Encerrar aula</span>
          <div class="v49_496"></div>
        </div>
      </a>
      <div class="v49_497">
        <div class="v49_498"></div>
        <a href="../prof-home/index.html">
          <div class="v49_499">
            <div class="v49_500"></div>
            <div class="v49_501"></div>
            <div class="v49_502"></div>
          </div>
        </a>
        <span class="v49_503">Anywhere Meeting</span>
        <div class="v49_504">
          <div class="v49_505"></div>
          <span class="v49_506">Paulo Castro</span>
          <div class="v49_507"></div>
        </div>
      </div>
      <div class="v49_508">
        <div class="v49_509"></div>
        <div class="v49_510"></div>
      </div>
      <a href="javascript:transmissaoOnClick();">
      <span class="v49_511">Clique para iniciar ou interromper a transmiss??o</span>
      </a>
      <span class="v49_512">Dados da tramiss??o</span
      ><span class="v49_513"></span
      >
      <div class="v49_514">
        <a href="javascript:transmissaoOnClick();">
        <div class="v49_515"></div>
          <div class="v49_541">
            <div class="v49_542">
              <div class="v49_543"></div>
              <div class="v49_544"></div>
              <div class="v49_545"></div>
              <div class="v49_546"></div>
              <div class="v49_547"></div>
            </div>
            <span id="transmissaoText" class="v49_548">Aguardando</span>
          </div>
        <div id="mic_img" class="v49_549"></div>
      </div>
    </a>
      <div class="v49_525">
        <span class="v49_526">Dura????o</span>
        <div class="v49_527"></div>
        <span id="duracao" class="v49_528">00:00:00</span>
      </div>
      <div class="v49_529">
        <span class="v49_530">Data</span>
        <div class="v49_531"></div>
        <span id="datetime" class="v49_532"></span>
      </div>
    </div>
  </body>
</html>
