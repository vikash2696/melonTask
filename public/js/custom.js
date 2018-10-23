var matchCount = 0;
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
$(document).ready(function () {
    wordLength = document.getElementById("word_length").value;
    inputCount = new Array();
    alertMessageDiv = document.getElementById("alert_messsage");
    $("#alert_messsage").css("display", "none");
    $("#new_game").on('click', function () {
        location.reload();
    });
    wonGame = parseInt($("#won_game").val());
    lossGame = parseInt($("#lossed_game").val());
    var options = {
        title: {
            text: "Won and lost Data"
        },
        data: [
            {
                type: "column",
                dataPoints: [
                    {label: "Won", y: wonGame},
                    {label: "Loss", y: lossGame},
                ]
            }
        ]
    };
    $("#chartContainer").CanvasJSChart(options);
});
function alphaOnly(char, id) {
    if(document.getElementById("input_id_" + id).value){
        $("#alert_messsage").css("display", "none");
        var inputField = document.getElementById("input_id_" + id);
        var inputChar = inputField.value;
        inputCount.push("input_id_" + id);
        var isCharacter = isChar(inputChar);
        if (isCharacter == false || isCharacter == null) {
            inputField.classList.add("error");
            inputField.value = "";
        } else {
            if (char.toLowerCase() == inputChar.toLowerCase()) {
                $(inputField).parent().next().find('input').focus();
                inputField.value = inputChar;
                inputField.classList.remove("error");
                $("#alert_messsage").css("display", "block")
                $("#alert_messsage").removeClass();
                alertMessageDiv.classList.add("alert-success");
                $('.msg').html("Great !!!");
                matchCount++;
                $("#attempt_"+id).html("");
                isWordComplete(matchCount, wordLength);
                return true;
            } else {
                var input = checkInputCount(inputCount, inputField,id);
            }
        }
    }
   

}

function checkInputCount(array_elements, inputField,id) {
    counts = {};
    array_elements.forEach(function (x) {
        counts[x] = (counts[x] || 0) + 1;
    });
    $.each(counts, function (key, value) {
        $("#attempt_"+id).html((5-value) + " Attempt left");
        if (value == 5) {
            $('.msg').html("You lost !!!");
            $("#alert_messsage").css("display", "block")
            $("#alert_messsage").removeClass();
            alertMessageDiv.classList.add("alert-danger");
            $("input").prop('disabled', true);
            $("#new_game").css("display", "block");
            updateUserRecord("no");
            return false;
        } else {
            inputField.classList.add("error");
            $("#alert_messsage").css("display", "block")
            $("#alert_messsage").removeClass();
            alertMessageDiv.classList.add("alert-warning");
            $('.msg').html("Oops !!!");
//            inputField.value = "";
            return true;
        }
    });
}
function isChar(str) {
    str = str.toLowerCase();
    return str.match(/[a-z]/i);
}

function isWordComplete(matchCount, wordLength) {
    if ((matchCount + 2) == wordLength) {
        $("#alert_messsage").css("display", "block")
        $("#alert_messsage").removeClass();
        alertMessageDiv.classList.add("alert-success");
        $('.msg').html("You won !!!");
        updateUserRecord("yes");
        matchCount = 0;
        $("#hint_btn").css("display", "none");
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
            console.log("Success");
        }
    });
}
