<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ZType Inspired Typing Game</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="gameArea">
    <div id="playerCharacter">🚀</div>
</div>
<div id="typingArea">Typing Area: <span id="typedWord"></span></div>

<script>
    const gameArea = document.getElementById('gameArea');
    const typedWordSpan = document.getElementById('typedWord');
    let activeEnemies = [];
    let waveNumber = 1;
    let enemiesInCurrentWave = 0;
    let clearedEnemies = 0;

    const words = ["innovate", "harmony", "clarity", "zenith", "quaint", "jubilant"];

    function spawnEnemy() {
        const wordIndex = Math.floor(Math.random() * words.length);
        const word = words[wordIndex];
        const enemy = document.createElement('div');
        enemy.className = 'enemy';

        const enemyChar = document.createElement('div');
        enemyChar.textContent = '👾'; // Enemy character icon
        enemyChar.className = 'enemyChar';

        const enemyWord = document.createElement('div');
        enemyWord.textContent = word;
        enemyWord.className = 'enemyWord';

        enemy.appendChild(enemyWord);
        enemy.appendChild(enemyChar);
        enemy.style.top = '0px';
        enemy.style.left = `${Math.random() * 90}%`;
        gameArea.appendChild(enemy);
        activeEnemies.push({ element: enemy, word: word });

        moveEnemy(enemy);
        enemiesInCurrentWave++;
    }

    function moveEnemy(enemy) {
        let top = 0;
        const interval = setInterval(() => {
            top += 1;
            enemy.style.top = `${top}px`;

            if (top > gameArea.offsetHeight) {
                clearInterval(interval);
                gameArea.removeChild(enemy);
                activeEnemies = activeEnemies.filter(e => e.element !== enemy);
                // Implement game over or life deduction logic here
            }
        }, 20);
    }

    function startNextWave() {
        if (clearedEnemies >= enemiesInCurrentWave) {
            waveNumber++;
            enemiesInCurrentWave = 0;
            clearedEnemies = 0;
            for (let i = 0; i < waveNumber; i++) {
                setTimeout(spawnEnemy, i * 1000); // Stagger enemy spawns within the wave
            }
        }
    }

    document.addEventListener('keydown', (event) => {
        const character = String.fromCharCode(event.keyCode).toLowerCase();
        typedWordSpan.textContent += character;

        const matchingEnemyIndex = activeEnemies.findIndex(e => e.word.startsWith(typedWordSpan.textContent));
        if (matchingEnemyIndex >= 0) {
            const matchingEnemy = activeEnemies[matchingEnemyIndex];
            if (matchingEnemy.word === typedWordSpan.textContent) {
                gameArea.removeChild(matchingEnemy.element);
                activeEnemies.splice(matchingEnemyIndex, 1);
                typedWordSpan.textContent = ''; // Clear typed word
                clearedEnemies++;
                startNextWave();
            }
        } else {
            typedWordSpan.textContent = ''; // Reset on incorrect start
        }
    });

    startNextWave(); // Start the first wave
</script>

</body>
</html>
