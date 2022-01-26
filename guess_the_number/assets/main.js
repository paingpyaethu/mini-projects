const input = document.getElementById('userInput');
const guessSlot = document.querySelector('.previousGuesses')
const playBtn = document.getElementById('playBtn');
const outputLabel = document.getElementById('feedbackLabel');
const hiddenNumLabel = document.getElementById('hiddenNumberLabel');
const score = document.getElementById('score');
const highScore = document.getElementById('highScore');
const continueBtn = document.getElementById('continueBtn');
const livesCount = document.getElementById('livesCount');
const gameOver = document.getElementById('modal')
const retryBtn = document.getElementById('retryBtn');


let numbers = Number([Math.floor(Math.random() * 5) + 1]);

let scoreNum = 0;
let highScoreNum = 0;
let heart = 5;
let previousGuesses = [];



playBtn.addEventListener('click', function (e) {
    e.preventDefault();

    let guessValue = parseInt(input.value);
    previousGuesses.push(guessValue);
    guessSlot.innerHTML += `<span class="guess_div">${guessValue} </span>`;

    validate(guessValue);
    restart();
})


function validate(inValue) {
    if (isNaN(inValue)) {
        displayMessage(`Please enter a valid number.`);
        guessSlot.innerHTML = '';
        input.value = '';
    } else if (inValue < 1 || inValue > 5) {
        displayMessage(`Please enter a number between 1 and 5`);
        guessSlot.innerHTML = '';
        input.value = '';
    } else {
        checkGuessNumber(inValue);
    }
}

function checkGuessNumber(guessValue) {
    if (guessValue === numbers) {
        displayMessage(`You Guessed Correctly`);
        hiddenNumLabel.innerHTML = `${numbers}`;
        score.innerHTML = `${scoreNum += 1}`;
        highScore.innerHTML = `${highScoreNum += 1}`;

        playBtn.disabled = true;
        continueBtn.disabled = false;

    } else if (guessValue < numbers) {
        displayMessage(`Try a Higher Number`);
        livesCount.innerHTML = `${heart -= 1}`;
    } else if (guessValue > numbers) {
        displayMessage(`Try a Lower Number`);
        livesCount.innerHTML = `${heart -= 1}`;
    }
    input.value = '';
}
function displayMessage(message){
    outputLabel.innerHTML = `${message}`;
}

continueBtn.addEventListener('click', function (e) {
    e.preventDefault();
    numbers = Number([Math.floor(Math.random() * 5) + 1]);
    previousGuesses = [];
    guessSlot.innerHTML = '';

    continueBtn.disabled = true;
    playBtn.disabled = false;

    displayMessage(``);
    hiddenNumLabel.innerHTML = `?`;
})

function restart(){
    if (heart === 0) {
        gameOver.classList.add('active');
    }
}

retryBtn.addEventListener('click', function (e) {
    e.preventDefault();
    numbers = Number([Math.floor(Math.random() * 5) + 1]);

    gameOver.classList.remove('active');
    displayMessage(``);
    input.value = '';
    score.innerHTML = 0;
    heart = 5;
    livesCount.innerHTML = `${heart}`;

    previousGuesses = [];
    guessSlot.innerHTML = '';
});