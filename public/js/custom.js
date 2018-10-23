var matchCount = 0;
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
$(document).ready(function () {
    wordLength = document.getElementById("word_length").value;
    inputCount = new Array();
    alertMessageDiv = document.getElementById("alert_messsage");
    $("#alert_messsage").hide();
    $("#new_game").on('click', function () {
        location.reload();
    });
});
function alphaOnly(char, id) {
    $("#alert_messsage").hide();
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
            $("#alert_messsage").show(500);
             $("#alert_messsage").removeClass();
            alertMessageDiv.classList.add("alert-success");
            $('.msg').html("Great !!!");
            $(this).next('.word_input').focus();
            matchCount++;
            isWordComplete(matchCount, wordLength);
            return true;
        } else {
            var input = checkInputCount(inputCount);
            if (input) {
                inputField.classList.add("error");
                $("#alert_messsage").show(500);
                $("#alert_messsage").removeClass();
                alertMessageDiv.classList.add("alert-warning");
                $('.msg').html("Oops !!!");
                inputField.value = "";
            }
        }
    }

}

function checkInputCount(array_elements) {
    counts = {};
    array_elements.forEach(function (x) {
        counts[x] = (counts[x] || 0) + 1;
    });
//    counts = JSON.stringify(counts);

    for (cnt in counts) {
        console.log(counts[cnt]);
        if (counts[cnt] == 5) {
            $('.msg').html("You lossed !!!");
            $("#alert_messsage").show(500);
             $("#alert_messsage").removeClass();
            alertMessageDiv.classList.add("alert-danger");
            return false;
        }
        return true
    }
}
function isChar(str) {
    str = str.toLowerCase();
    return str.match(/[a-z]/i);
}

function isWordComplete(matchCount, wordLength) {
    if ((matchCount + 2) == wordLength) {
        $("#alert_messsage").show(500);
         $("#alert_messsage").removeClass();
        alertMessageDiv.classList.add("alert-success");
        $('.msg').html("You won !!!");
        updateUserRecord("yes");
        matchCount = 0;
        $("input").prop('disabled', true);
        $("#new_game").css("display", "block");
    }

}

function updateUserRecord(record) {
    $.ajax({
        type: "GET",
        data: {"data": record},
        url: "/game/updateStatistic",
        async: false,
        success: function (data) {
            alert("done");
        }
    });
}
