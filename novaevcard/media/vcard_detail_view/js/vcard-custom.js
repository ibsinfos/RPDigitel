$(document).ready(function(){
	if ($('#audio-player').length) {
		$('#audio-player').mediaelementplayer({
		    alwaysShowControls: true,
		    features: ['playpause','progress'],
		    audioVolume: 'horizontal',
		    audioWidth: 200,
		    audioHeight: 70,
		    iPadUseNativeControls: true,
		    iPhoneUseNativeControls: true,
		    AndroidUseNativeControls: true
	  	});
	}

	// var wavesurfer = WaveSurfer.create({
	//     container: '#waveform',
	//     waveColor: 'silver',
	//     progressColor: 'purple',
	//     height: 50
	// });
	// wavesurfer.load('../media/Raabta.mp3');
	// wavesurfer.load('https://wavesurfer-js.org/example/split-channels/stereo.mp3');
});