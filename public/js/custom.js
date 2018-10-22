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
    $("#statistic").on('click', function () {
        $.ajax({
            type: "GET",
            url: "/game/getStatistic",
            async: false,
            success: function (data) {
                options = '<option value="" selected="selected">' + TASK_SELECT + '</option>';
                var obj = $.parseJSON(data);
                $.each(obj, function (index, value) {
                    options += "<option value='" + index + "'>" + value + "</option>";
                });
                $('#created_by').html(options);
                $('.custom-select').selectpicker();
            }
        });
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
                alertMessageDiv.classList.add("alert-warning");
                $('.msg').html("Oops !!!");
                inputField.value = "";
            }
        }
    }

}

function checkInputCount(array_elements) {
    var counts = {};
    array_elements.forEach(function (x) {
        counts[x] = (counts[x] || 0) + 1;
    });
//    counts = JSON.stringify(counts);

    for (cnt in counts) {
        if (counts[cnt] == 5) {
            $('.msg').html("You lossed !!!");
            $("#alert_messsage").show(500);
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
        alertMessageDiv.classList.add("alert-success");
        $('.msg').html("You won !!!");
        matchCount = 0;
        $("input").prop('disabled', true);
//        $("input").prop('disabled', false);
        $("#new_game").css("display", "block");
    }

}
