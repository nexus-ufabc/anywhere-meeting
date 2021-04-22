navigator.mediaDevices.getUserMedia({ audio: true })
.then(function(stream) {
  console.log('You let me use your mic!')
})
.catch(function(err) {
  console.log('No mic for you!')
});

var speechRecon = new webkitSpeechRecognition();
speechRecon.continuous = true;
speechRecon.interimResults = true;

var recognizing = false;
var micactive = false;
var ongoing_class = false;
var interim_transcript = "";
var final_transcript = "";
var startTime;
var endTime;
var elapsedTime = 0;

speechRecon.onstart = function () {
  startTime = new Date();
  console.log("speechRecon.onstart");
  interim_transcript = "";
  final_transcript = "";
};

speechRecon.onend = function () {
  if (recognizing) {
    console.log("Restarting the function. Partial recording");
    speechRecon.start();
  } else {
    endTime = new Date();
    elapsedTime = elapsedTime + (endTime.valueOf() - startTime.valueOf()) / (1000);
    document.getElementById("duracao").textContent = new Date(elapsedTime * 1000).toISOString().substr(11, 8);
    console.log("Ending the function");
  }
};

speechRecon.onresult = function (event) {
  if (typeof event.results == "undefined") {
    speechRecon.onend = null;
    speechRecon.stop();
    return;
  }
  for (var i = event.resultIndex; i < event.results.length; ++i) {
    if (event.results[i].isFinal) {
      final_transcript += event.results[i][0].transcript;
    } else {
      interim_transcript += event.results[i][0].transcript;
    }
  }
  document.getElementById("readable-text").value = final_transcript;
  var codigo = document.getElementById("codigoAula").value;
  updateTranscriptFile(codigo, final_transcript);
};

function updateTranscriptFile(codigo, final_transcript) {
  $.ajax({
    url: 'command_functions.php',
    type: 'POST',
    data: {command: 'update-transcript', codigo: codigo, transcript: final_transcript},
    success:function(response){
      console.log('Success: '+response);
    },
    error:function(x,e){
      console.log('Unknow Error.\n'+x.responseText);
    }
  });
}

function insertNovaAula(codigo, descricao) {
  $.ajax({
    url: 'command_functions.php',
    type: 'POST',
    data: {command: 'new-aula', codigo: codigo, descricao: descricao},
    success:function(response){
      console.log('Success: '+response);
    },
    error:function(x,e){
      console.log('Unknow Error.\n'+x.responseText);
    }
  });
}

function updateAovivo(codigo, aovivo) {
  $.ajax({
    url: 'command_functions.php',
    type: 'POST',
    data: {command: 'update-aovivo', codigo: codigo, aovivo: aovivo},
    success:function(response){
      console.log('Success: '+response);
    },
    error:function(x,e){
      console.log('Unknow Error.\n'+x.responseText);
    }
  });
}

function getNewGuid(){
  var dt = new Date().getTime();
  var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
      var r = (dt + Math.random()*16)%16 | 0;
      dt = Math.floor(dt/16);
      return (c=='x' ? r :(r&0x3|0x8)).toString(16);
  });
  return uuid;
}

function novaTransmissaoOnClick() {
  if (ongoing_class == false) {
    var codigo = getNewGuid();
    var descricao = document.getElementById("nomeAula").value;
    console.log(codigo);

    document.getElementById("nomeAula").readOnly = true;
    document.getElementById("codigoAula").value = codigo;
    document.getElementById("labelTransmissao").textContent = "Pronto";

    insertNovaAula(codigo, descricao);
    ongoing_class = true;
  }
}

function encerrarAulaOnClick() {
  if (micactive) {
    micactive = false;
    recognizing = false;
    ongoing_class = false;
    speechRecon.stop();
    updateAovivo(document.getElementById("codigoAula").value, 0);
    document.getElementById("mic_img").style.backgroundImage = "url(images/microphone.png)";
    document.getElementById("transmissaoText").textContent="Aguardando";
    document.getElementById("nomeAula").value = "";
    document.getElementById("nomeAula").readOnly = false;
    document.getElementById("labelTransmissao").textContent = "Iniciar";
    document.getElementById("divTransmissao").style.backgroundColor = "rgba(78, 78, 78, 1)";
    document.getElementById("readable-text").value = "";
  }
}

function transmissaoOnClick() {
  if (ongoing_class == false) {
    alert("É necessário iniciar uma Aula antes de transmitir!");
  }
  else {
    if (micactive) {
            encerrarAulaOnClick();
    } 
    else {
            micactive = true;
            document.getElementById("mic_img").style.backgroundImage="url(images/microphone-active.png)";
            document.getElementById("transmissaoText").textContent="Gravando";
            document.getElementById("labelTransmissao").textContent = "Ao vivo";
            updateAovivo(document.getElementById("codigoAula").value, 1);
            document.getElementById("divTransmissao").style.backgroundColor = "rgba(255, 106, 106, 1)";
            speechRecon.lang = "pt-BR";
            recognizing = true;
            speechRecon.start();
    }
  }
}

function loadDatetime() {
  var dt = new Date();
  document.getElementById("datetime").innerHTML = (("0"+dt.getDate()).slice(-2)) +"/"+ (("0"+(dt.getMonth()+1)).slice(-2)) +"/"+ (dt.getFullYear());
}
