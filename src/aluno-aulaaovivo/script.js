const selector = selector => document.querySelector(selector);

function listen() {
        selector(".v41_39").innerText = "Reproduzindo...";
        selector(".v41_32").style.display = "block";
        selector(".v41_33").style.display = "block";

        if(speechSynthesis.speaking || speechSynthesis.paused) {
                speechSynthesis.resume();
        } else {
                speechSynthesis.cancel();
                let hear = new SpeechSynthesisUtterance;

                hear.lang = 'pt-BR';
                hear.rate = selector(".v41_67").textContent.substr(0,3)
                hear.pitch = selector(".v41_59").textContent.substr(0,3);
                hear.text = "";

                let txtContent = selector(".v41_12_2");
                if(txtContent.value.substring(txtContent.selectionStart, txtContent.selectionEnd)) {
                        hear.text = txtContent.value.substring(txtContent.selectionStart, txtContent.selectionEnd);
                } else {
                        hear.text = selector(".v41_12_2").value;
                }

                speechSynthesis.speak(hear);
        }
}

function increase(property) {
        let value = parseFloat(selector(property).textContent.substr(0,3));

        if(value == "2.0") return;
        else selector(property).innerText = `${(value+0.1).toFixed(1)}x`;
}

function decrease(property) {
        let value = parseFloat(selector(property).textContent.substr(0,3));

        if(value == "0.1") return;
        else selector(property).innerText = `${(value-0.1).toFixed(1)}x`;
}

function playbackEffect(val) {
        if (val == 'pause') {
                selector(".v41_39").innerText = "Pausado.";
                selector(".v41_33").style.display = "none";
        } else selector(".v41_32").style.display = "none";
}