const hourConverter = (totalSeconds) => {
	const totalMinutes = Math.floor(totalSeconds / 60);
	const seconds = Math.floor(totalSeconds % 60);
	const hours = Math.floor(totalMinutes / 60);
	const minutes = Math.floor(totalMinutes % 60);

	if (hours == 0 && minutes != 0) {
		return minutes + ':' + seconds;
	}
	if (hours == 0 && minutes == 0) {
		return '0:' + seconds;
	}
	return hours + ':' + minutes + ':' + seconds;
}

function countdown(time) {
	if (time === undefined) {
		document.querySelector('.quiz-timer').parentElement.style.display = 'none';
		document.querySelector('.quiz-content').style.marginTop = "30px";
		document.querySelector('.quiz-header').style.setProperty('border-radius', '10px', 'important');
		return ;
	}
	// var time =  quizAPI['time']
	var deadline = new Date(Date.now() + time*60000);
	document.querySelector('.quiz-timer > span').innerHTML = `<b> ${hourConverter((deadline - Date.now())/1000)} </b>`
	document.querySelector('.quiz-timer div').style.width = '100%';
	var totalTime = Math.round((deadline - Date.now())/1000);
	var intervalID = setInterval(function() {
		var now = new Date(Date.now());
		var diffTime = (deadline - now)/1000;
		var timePercent = (diffTime*100)/(totalTime);

		document.querySelector('.quiz-timer > span').innerHTML = `<b> ${hourConverter(diffTime)} </b>`
		document.querySelector('.quiz-timer div').style.width = timePercent + '%';
		if (timePercent < 20) {
			document.querySelector('.quiz-timer div').style.backgroundColor = '#ed7d31';
			document.querySelector('.quiz-timer').style.backgroundColor = '#f4b183';
			document.querySelector('.quiz-timer').classList.add('flicker-ani');
		}
		if (diffTime < 1) {
			clearInterval(intervalID);
			document.querySelector('.quiz-timer div').style.width = '0%';
			document.querySelector('.quiz-timer > span').innerHTML = `<b> 0:0 </b>`
			document.querySelector('.quiz-timer').classList.remove('flicker-ani');
		}
	}, 1000);
}	

$(document).ready(() => {
	// function countdown(time) {
	// 	// var time =  quizAPI['time']
	// 	var deadline = new Date(Date.now() + time*60000);
	// 	document.querySelector('.quiz-timer > span').innerHTML = `<b> ${hourConverter((deadline - Date.now())/1000)} </b>`
	// 	document.querySelector('.quiz-timer div').style.width = '100%';
	// 	var totalTime = Math.round((deadline - Date.now())/1000);
	// 	var intervalID = setInterval(function() {
	// 		var now = new Date(Date.now());
	// 		var diffTime = (deadline - now)/1000;
	// 		var timePercent = (diffTime*100)/(totalTime);

	// 		document.querySelector('.quiz-timer > span').innerHTML = `<b> ${hourConverter(diffTime)} </b>`
	// 		document.querySelector('.quiz-timer div').style.width = timePercent + '%';
	// 		if (timePercent < 20) {
	// 			document.querySelector('.quiz-timer div').style.backgroundColor = '#ed7d31';
	// 			document.querySelector('.quiz-timer').style.backgroundColor = '#f4b183';
	// 			document.querySelector('.quiz-timer').classList.add('flicker-ani');
	// 		}
	// 		if (diffTime < 1) {
	// 			clearInterval(intervalID);
	// 			document.querySelector('.quiz-timer div').style.width = '0%';
	// 			document.querySelector('.quiz-timer > span').innerHTML = `<b> 0:0 </b>`
	// 			document.querySelector('.quiz-timer').classList.remove('flicker-ani');
	// 		}
	// 	}, 1000);
	// }	
});