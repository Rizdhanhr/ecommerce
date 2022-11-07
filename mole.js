/**
 *  "The" Game class
 */
function Game() {
    this.settings = {
        selectors: {
            counter: '#counter',
            timer: '#timer',
            mole: '.mole-img',
            startGame: '#newgame',
            pauseGame: '#pausegame',
            endGame: '#endgame',
            resetGame: '#resetgame',
            continueGame: '#continuegame'
        },
        visibleMoleTime: 3,
        gameDuration: 60,
        refreshMoleTime: 0.5
    };

    this.board = new Board(this.settings.selectors.mole, this.settings.visibleMoleTime, this.settings.refreshMoleTime);
    this.hammer = new Hammer(this.settings.selectors.mole, this.board.removeOne, this.score);
    this.timer = new Timer(this.settings.selectors.timer, 60, this.theEnd);
    this.counter = new Counter(this.settings.selectors.counter);

}

/**
 *  Initialize the game
 */
Game.prototype.init = function () {
    this.hammer.init();
    this.board.init();
    this.timer.init();

    this.counter.reset();

    var menu = this.getMenuInstance();
    menu.pauseGame.classList.remove('disabled');
    menu.endGame.classList.remove('disabled');
    menu.resetGame.classList.remove('disabled');
}

/**
 *  The user just hit a mole :)
 */
Game.prototype.score = function () {
    this.counter.add();
}

/**
 *  Stop the game
 */
Game.prototype.theEnd = function () {
    // var endValue = this.counter.getValue();

    // stop
    this.board.stop();
    
    var menu = this.getMenuInstance();
    menu.pauseGame.classList.add('disabled');
    menu.endGame.classList.add('disabled');
    menu.resetGame.classList.add('disabled');
}

/**
 *  Get the menu DOM elements
 */
Game.prototype.getMenuInstance = function () {
    var startGame = document.querySelector(this.settings.selectors.startGame);
    var pauseGame = document.querySelector(this.settings.selectors.pauseGame);
    var endGame = document.querySelector(this.settings.selectors.endGame);
    var resetGame = document.querySelector(this.settings.selectors.resetGame);
    var continueGame = document.querySelector(this.settings.selectors.continueGame);

    return {
        startGame: startGame,
        pauseGame: pauseGame,
        endGame: endGame,
        resetGame: resetGame,
        continueGame: continueGame
    };
}

/**
 *  Pause the game
 */
Game.prototype.pause = function () {
    this.board.setPause(true);
    this.hammer.setPause(true);
    this.timer.setPause(true);

    var menu = this.getMenuInstance();
    menu.continueGame.classList.remove('hide');
}

/**
 *  UnPause the game
 */
Game.prototype.continue = function () {
    this.board.setPause(false);
    this.hammer.setPause(false);
    this.timer.setPause(false);

    var menu = this.getMenuInstance();
    menu.continueGame.classList.add('hide');
}

/**
 *  Initialize the links on the screen
 */
Game.prototype.setLinks = function () {
    var menu = this.getMenuInstance();

    var scope = this;
    menu.startGame.addEventListener('click', function (event) {
        event.preventDefault();

        if (this.classList.contains('disabled')) {
            return;
        }

        scope.init();
    });

    menu.endGame.addEventListener('click', function (event) {
        event.preventDefault();

        if (this.classList.contains('disabled')) {
            return;
        }

        scope.timer.stop();
    });

    menu.resetGame.addEventListener('click', function (event) {
        event.preventDefault();

        if (this.classList.contains('disabled')) {
            return;
        }

        scope.timer.stop();
        scope.init();
    });

    menu.pauseGame.addEventListener('click', function (event) {
        event.preventDefault();

        if (this.classList.contains('disabled')) {
            return;
        }

        scope.pause();
    });

    menu.continueGame.addEventListener('click', function (event) {
        event.preventDefault();

        if (this.classList.contains('disabled')) {
            return;
        }

        scope.continue();
    });
}

/**
 *  Board class
 *  @param {string} moleSelector
 *  @param {number} visibleMoleTime
 *  @param {number} refreshTime
 */
function Board(moleSelector, visibleMoleTime, refreshTime) {
    this.moles = document.querySelectorAll(moleSelector);
    this.length = this.moles.length;
    this.activeMoles = [];
    this.refreshTime = refreshTime * 1000;
    this.visibleMoleTime = visibleMoleTime * 1000;
    this.intervalInstance = null;
    this.isPaused = false;
}

/**
 *  Initialize the board and start generating moles
 */
Board.prototype.init = function () {
    var scope = this;
    this.intervalInstance = setInterval(function () {
        if (scope.isPaused) {
            return;
        }
        scope.pickOne();
    }, this.refreshTime);
}

/**
 *  Generate a random time for the mole to be visible
 */
Board.prototype.generateTime = function(min, max) {
    return Math.round(Math.random() * (max - min) + min);
}

/**
 *  Generate a mole on the board
 */
Board.prototype.pickOne = function () {
    var position = Math.floor(Math.random() * 10);

    var isAlreadyIn = this.activeMoles.find(function (item) {
        return Number(item) === Number(position);
    })

    if (!!isAlreadyIn) {
        return this.pickOne();
    }

    this.activeMoles.push(position);

    if (this.moles[position]) {
        this.moles[position].classList.remove('hide');
    }

    var time = this.generateTime(500, this.visibleMoleTime);

    var scope = this;
    // this has to be an interval, so we can emulate the game being paused
    var interval = setInterval(function () {
        if (scope.isPaused) {
            return;
        }

        if (scope.moles[position]) {
            scope.moles[position].classList.add('hide');
        }

        // removing the selected mole from the array
        var deletePosition = scope.activeMoles.indexOf(position);
        if (deletePosition > -1) {
            scope.activeMoles.splice(deletePosition, 1);
        }

        clearInterval(interval);
    }, time);
}

/**
 *  Remove a mole from the click event
 */
Board.prototype.removeOne = function (position) {
    if (!position) {
        return;
    }

    var deletePosition = this.activeMoles.indexOf(position);

    if (deletePosition > -1) {
        this.activeMoles.splice(deletePosition, 1);

        if (this.moles[position]) {
            this.moles[position].classList.add('hide');
        }

        this.pickOne();
    }
}

/**
 *  Stop generating moles in the screen
 */
Board.prototype.stop = function () {
    clearInterval(this.intervalInstance);

    // hiding all moles
    this.moles.forEach(function (mole) {
        mole.classList.add('hide');
    });

    this.activeMoles = [];
}

/**
 *  Set the pause state
 */
Board.prototype.setPause = function (isPaused) {
    this.isPaused = isPaused;
}

/**
 *  Hammer class
 *  @param {string} moleSelector
 *  @param {function} onClickCallback
 *  @param {function} onHitCallback
 */
function Hammer(moleSelector, onClickCallback, onHitCallback) {
    this.moles = document.querySelectorAll(moleSelector);
    this.onClickCallback = onClickCallback;
    this.onHitCallback = onHitCallback;
    this.isPaused = false;
}

/**
 *  Init the click event that emulate the hammer on the screen
 */
Hammer.prototype.init = function () {
    var scope = this;
    this.moles.forEach(function (element, index) {
        var clickEvent = function () {
            if (scope.isPaused) {
                return;
            }
            scope.onClickCallback.call(game.board, index);
            scope.onHitCallback.call(game);
        };

        element.onclick = clickEvent;
    });
}

/**
 *  Set the pause state
 */
Hammer.prototype.setPause = function (isPaused) {
    this.isPaused = isPaused;
}

/**
 *  Counter class
 *  @param {string} selector
 */
function Counter(selector) {
    this.counter = 0;
    this.element = document.querySelector(selector);
}

/**
 *  Add one to the counter and refresh the UI
 */
Counter.prototype.add = function () {
    this.counter++;
    this.element.innerHTML = Number(this.counter).toString();
}

/**
 *  Reset the value to zero
 */
Counter.prototype.reset = function () {
    this.counter = 0;
    this.element.innerHTML = '0';
}

/**
 *  Get the end result points
 */
Counter.prototype.getValue = function () {
    return this.counter;
}


/**
 *  Timer class
 *  @param {string} selector
 *  @param {number} duration
 *  @param {function} callback
 */
function Timer(selector, duration, callback) {
    this.element = document.querySelector(selector);
    this.duration = duration;
    this.initialDate = null;
    this.timerInterval = null;
    this.callback = callback;
    this.isPaused = false;
    this.lastTimePaused = null;
    this.pausedTime = 0;

    this.refresh(this.duration);
}

/**
 *  Refresh the timer given a time value
 *
 * @param {number} time
 */
Timer.prototype.refresh = function (time) {
    this.element.innerHTML = Number(time).toFixed(2);
}

/**
 *  Start the countdown
 */
Timer.prototype.init = function () {
    this.initialDate = new Date();
    var scope = this;

    this.timerInterval = setInterval(function () {
        if (scope.isPaused) {
            return;
        }

        var now = new Date();
        var difference = (scope.duration - now.diffInSeconds(scope.initialDate)) + scope.pausedTime;

        if (difference > 0) {
            scope.refresh(difference);
        } else {
            scope.stop();
        }
    }, 50);
}

/**
 *  Put the timer on pause or continue
 */
Timer.prototype.setPause = function (isPaused) {
    this.isPaused = isPaused;

    if (isPaused) {
        return this.lastTimePaused = new Date();
    }

    if (!!this.lastTimePaused) {
        var now = new Date();
        var difference = now.diffInSeconds(this.lastTimePaused);
        this.pausedTime += Number(difference);
        this.lastTimePaused = null;
    }
}

/**
 *  Stop the counting
 */
Timer.prototype.stop = function () {
    clearInterval(this.timerInterval);
    this.refresh(this.duration);
    this.pausedTime = 0;
    this.lastTimePaused = null;
    this.callback.call(game);

    alert(this.counter);
}

/**
 * ======================================
 *   Utils
 * ======================================
 */
Date.prototype.diffInSeconds = function (initialDate) {
    var difference = this.getTime() - initialDate.getTime();

    if (difference <= 0) {
        return 0;
    }

    return difference / 1000;
}

var game = new Game();

window.onload = function () {
    game.setLinks();
}
