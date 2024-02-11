function togglePo() {
    const popup = document.getElementById('popup');
    popup.style.display = popup.style.display === 'none' ? 'flex' : 'none';
}

function togglePopupp() {
    const popup = document.getElementById('popupp');
    popup.style.display = popup.style.display === 'none' ? 'flex' : 'none';
}

function togglePopu() {
    const popup = document.getElementById('pop');
    popup.style.display = popup.style.display === 'none' ? 'flex' : 'none';
}
function getUserId(userIdInput, row) {
    var userId = row.getElementsByTagName("td")[0].textContent;
    userIdInput.value = userId;
}

function getPrice(userIdInput, row) {
    var pricee = row.getElementsByTagName("td")[4].textContent;
    userIdInput.value = pricee;
}
function getUserId(userIdInput, row) {
    var use = row.getElementsByTagName("td")[0].textContent;
    userIdInput.value = use;
}


// Function to start the countdown
function startCountdown() {
    var countdownElement = document.getElementById('countdown');
    var timeInSeconds = 30 * 60; // 30 minutes in seconds

    function updateCountdown() {
        var minutes = Math.floor(timeInSeconds / 60);
        var seconds = timeInSeconds % 60;

        // Format the time and update the countdown element
        countdownElement.textContent = minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');

        // Check if the countdown has reached zero
        if (timeInSeconds === 0) {
            clearInterval(intervalId);
            countdownElement.textContent = "Time's up!";
        } else {
            timeInSeconds--;
        }
    }

    // Initial call to set up the countdown
    updateCountdown();

    // Set up interval to update the countdown every second
    var intervalId = setInterval(updateCountdown, 1000);
}

// Call the function to start the countdown when the page loads
window.onload = startCountdown;


document.addEventListener('DOMContentLoaded', function () {
    var dateInput = document.getElementById('Date');
    var currentDate = new Date();
    var month = currentDate.getMonth() + 1;
    var day = currentDate.getDate();
    var year = currentDate.getFullYear();

    dateInput.value = year + '/' + month + '/' + day;
});

