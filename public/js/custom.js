var matchCount = 0;
$(document).ready(function () {
    wordLength = document.getElementById("word_length").value;
    inputCount = new Array();
});
function alphaOnly(char, id) {
    var inputField = document.getElementById("input_id_" + id);
    var inputChar = inputField.value;
    inputCount.push("input_id_" + id);
    var isCharacter = isChar(inputChar);
    if (isCharacter == false || isCharacter == null) {
        inputField.classList.add("error");
        inputField.value = "";
    } else {
        if (char.toLowerCase() == inputChar.toLowerCase()) {
            inputField.value = inputChar;
            inputField.classList.remove("error");
            matchCount++;
            isWordComplete(matchCount, wordLength);
            return true;
        } else {
            checkInputCount(inputCount);
            inputField.classList.add("error");
            inputField.value = "";
        }
    }

}

function checkInputCount(array_elements) {
    var counts = {};
    array_elements.forEach(function (x) {
        counts[x] = (counts[x] || 0) + 1;
    });
    counts = JSON.stringify(counts);
    for (cnt in counts) {
        if(counts[cnt] == 5) {
            alert("You lossed!!!");
        }
    }
}
function isChar(str) {
    str = str.toLowerCase();
    return str.match(/[a-z]/i);
}

function isWordComplete(matchCount, wordLength) {
    if ((matchCount + 2) == wordLength) {
        alert("You Won!!!");
        matchCount = 0;
        setTimeout(function () {
            location.reload();
        }, 1000);
    }

}