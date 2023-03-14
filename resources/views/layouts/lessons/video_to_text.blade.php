<button id="transcribeButton">Transcribe</button>
<div id="transcription">subtitle :</div>


<script>
 const video = document.getElementById('myVideo');
const transcription = document.getElementById('transcription');
const transcribeButton = document.getElementById('transcribeButton');

let recognition = null;

transcribeButton.addEventListener('click', () => {
  if (recognition) {
    return;
  }

  recognition = new window.webkitSpeechRecognition();
  recognition.lang = 'en-US';
  recognition.continuous = true;

  recognition.onresult = (event) => {
    const result = event.results[event.results.length - 1][0].transcript;
    transcription.innerHTML += result;
  };

  recognition.onend = () => {
    recognition = null;
  };

  recognition.start();
});

video.addEventListener('pause', () => {
  if (recognition) {
    recognition.stop();
  }
});


</script>