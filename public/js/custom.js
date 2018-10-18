function alphaOnly(event, char, id) {
    var key;
    if (window.event) {
        key = window.event.key;
    } else if (event) {
        key = event.which;
    }
    var inputChar = String.fromCharCode(key);
    var isAlpha = ((key >= 65 && key <= 90) || (key >= 95 && key <= 122));
    if (isAlpha == true) {
        validateCharacter(char, inputChar, id);
    }
    return isAlpha;
}
function validateCharacter(char, inputChar, id) {
    var abc = document.getElementById("input_id_" + id);
    if (char.toLowerCase() == inputChar.toLowerCase()) {
        alert("matched");
        abc.value = inputChar;
        abc.classList.remove("error");
        return true;
    } else {
        alert("fail");
        abc.classList.add("error");
        abc.value = " ";
        return 0;
    }

}