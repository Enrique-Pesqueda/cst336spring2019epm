      // Your JavaScript goes here
      var randomNumber = Math.floor(Math.random() * 99) + 1;
      var guesses = document.querySelector('#guesses');
      var lastResult = document.querySelector('#lastResult');
      var lowOrHi = document.querySelector('#lowOrHi');
      var scoreBoard = document.querySelector("#scoreBoard");

      var guessSubmit = document.querySelector('.guessSubmit');
      var guessField = document.querySelector('.guessField');
      
      
      
      var timesWon = 0;
      var timesLost = 0;
      
      var guessCount = 1;
      var resetButton = document.querySelector('#reset');
      resetButton.style.display = 'none';
      guessField.focus();
      
      function checkGuess() {
            var userGuess = Number(guessField.value);
            if(userGuess > 99 || !Number.isInteger(userGuess)){
                    alert("Sorry that was not vslid input");
                    --guessCount;
            }
            else if (guessCount === 1) {
                guesses.innerHTML = 'Previous guesses: ';
                
            }
            guesses.innerHTML += userGuess + ' ';
            
              if (userGuess === randomNumber) {
                lastResult.innerHTML = 'Congratulations! You got it right!';
                lastResult.style.backgroundColor = 'green';
                lowOrHi.innerHTML = '';
                timesWon++;
                setGameOver();
              } else if (guessCount === 7) {
                lastResult.innerHTML = 'Sorry, you lost!';
                timesLost++;
                setGameOver();
              } else {
                if(userGuess < randomNumber) {
                    lowOrHi.innerHTML = 'Last guess was too low!';
                    lastResult.innerHTML = 'Wrong!';
                    lastResult.style.backgroundColor = 'red';
                } 
                else if(userGuess > randomNumber) {
                    lowOrHi.innerHTML = 'Last guess was too high!';
                    lastResult.innerHTML = 'Wrong!';
                    lastResult.style.backgroundColor = 'red';
                }
              }
              scoreBoard.innerHTML = 'Times Won: ' + timesWon + '        ' + 'Times Lost: ' + timesLost;
              guessCount++;
              guessField.value = '';
              guessField.focus();
      }
      
      guessSubmit.addEventListener('click', checkGuess);
      
      function setGameOver() {
        guessField.disabled = true;
        guessSubmit.disabled = true;
        resetButton.style.display = 'inline';
        resetButton.addEventListener('click', resetGame);
      }
      
      function resetGame() {
        guessCount = 1;
      
        var resetParas = document.querySelectorAll('.resultParas p');
        for (var i = 0 ; i < resetParas.length ; i++) {
          resetParas[i].textContent = '';
        }
      
        resetButton.style.display = 'none';
      
        guessField.disabled = false;
        guessSubmit.disabled = false;
        guessField.value = '';
        guessField.focus();
      
        lastResult.style.backgroundColor = 'white';
      
        randomNumber = Math.floor(Math.random() * 99) + 1;
      }