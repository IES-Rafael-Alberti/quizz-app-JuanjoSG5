function reload() {
    window.location.href = window.location.href.split('?')[0];
    window.location.href = baseUrl + '?retake=true';

    // Check if the element with id 'timer' exists before setting its innerHTML
    var timerElement = document.getElementById('timer');
    if (timerElement) {
        timerElement.innerHTML = 'Time remaining: 5:00';
    }
}

var timer;
var timeLeft = 300; // 5 minutes in seconds

function startTimer() {
    timer = setInterval(function() {
        timeLeft--;

        if (timeLeft <= 0) {
            clearInterval(timer);
            var timerElement = document.getElementById('timer');
            if (timerElement) {
                timerElement.innerHTML = 'Time is up!';
            }
            submitForm(); // Call your submit form function when time is up
        } else {
            var minutes = Math.floor(timeLeft / 60);
            var seconds = timeLeft % 60;
            var timerElement = document.getElementById('timer');
            if (timerElement) {
                timerElement.innerHTML =
                    'Time remaining: ' + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
            }
        }
    }, 1000);
}

function submitForm() {
    document.getElementById('quizForm').submit();
}

window.onload = function() {
    startTimer();
};
