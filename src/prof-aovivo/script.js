let speechRecon = new webkitSpeechRecognition();
speechRecon.continuous = true;
speechRecon.interimResults = true;

let recognizing = false;
let micactive = false;
let final_transcript = "";
let interim_transcript;
let startTime;
let endTime;
let elapsedTime = 0;

speechRecon.onstart = function () {
        startTime = new Date();
        console.log("speechRecon.onstart");
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
        for (let i = event.resultIndex; i < event.results.length; ++i) {
                if (event.results[i].isFinal) {
                        final_transcript += `${event.results[i][0].transcript}. `;
                } else {
                        interim_transcript += `${event.results[i][0].transcript}. `;
                }
        }
        document.getElementById("readable-text").value = final_transcript;
};

function transmissaoOnClick() {
        if (micactive) {
                micactive = false;
                document.getElementById("mic_img").style.backgroundImage = "url(images/microphone.png)";
                document.getElementById("transmissaoText").textContent="Aguardando";
                recognizing = false;
                speechRecon.stop();
        } else {
                micactive = true;
                document.getElementById("mic_img").style.backgroundImage="url(images/microphone-active.png)";
                document.getElementById("transmissaoText").textContent="Gravando";
                speechRecon.lang = "pt-BR";
                recognizing = true;
                speechRecon.start();
        }
}

function loadDatetime() {
        let dt = new Date();
        document.getElementById("datetime").innerHTML = (("0"+dt.getDate()).slice(-2)) +"/"+ (("0"+(dt.getMonth()+1)).slice(-2)) +"/"+ (dt.getFullYear());
}