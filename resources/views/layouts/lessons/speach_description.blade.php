
	<style>
		#speak-button {
			background-color: transparent;
			border: none;
			cursor: pointer;
		}
		#voice-icon {
			display: none;
			cursor: pointer;
		}
	</style>
	<textarea id="input-text" hidden>{{$lesson->description}}</textarea>
	<button id="speak-button">
		<img style="width:5%;height: 5%;" src="{{asset('lessons/icon/voice-svgrepo-com.svg')}}" alt="icone de voix">
	</button>

	<script>
		const speakButton = document.getElementById('speak-button');
		const inputText = document.getElementById('input-text');
		const voiceIcon = speakButton.querySelector('img');
		const utterance = new SpeechSynthesisUtterance();

		speakButton.addEventListener('click', () => {
			utterance.text = inputText.value;
			speechSynthesis.speak(utterance);
		});

		utterance.onstart = () => {
			voiceIcon.style.display = 'inline-block';
		}

		utterance.onend = () => {
			voiceIcon.style.display = 'none';
		}

		voiceIcon.addEventListener('click', () => {
			speechSynthesis.cancel();
			voiceIcon.style.display = 'none';
		});
	</script>
