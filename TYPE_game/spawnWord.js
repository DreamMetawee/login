function spawnWord() {
    const wordLength = Math.floor(Math.random() * (8 - 3) + 3); // Random word length between 3 and 8 characters
    const word = Array.from({length: wordLength}, () => String.fromCharCode(Math.floor(Math.random() * (122 - 97) + 97))).join('');
    const div = document.createElement('div');
    div.textContent = word;
    div.className = 'enemyWord';
    div.style.top = '0px';
    div.style.left = `${Math.random() * 90}%`;
    gameArea.appendChild(div);
    activeWords.push(div);

    moveWord(div);
}
