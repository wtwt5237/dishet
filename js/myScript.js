/**
 * Created by danni on 8/14/17.
 */
$(window).on('load', function(){
    $("#file1").val("");
    $("#file1display").val("");
    $("#file2").val("");
    $("#file2display").val("");
    $("#file3").val("");
    $("#file3display").val("");
});
$(document).ready(function(){
    $(function(){
        $('input[name="file1"]').change(function(){
            var input1 = $(this).val();
            input1 = input1.substring(input1.lastIndexOf("\\") + 1, input1.length);
            document.getElementById("file1display").value = input1;
        })
    });
    $(function(){
    $('input[name="file2"]').change(function(){
            var input2 = $(this).val();
            input2 = input2.substring(input2.lastIndexOf("\\") + 1, input2.length);
            document.getElementById("file2display").value = input2;
        })
    });
    $(function(){
        $('input[name="file3"]').change(function(){
            var input3 = $(this).val();
            input3 = input3.substring(input3.lastIndexOf("\\") + 1, input3.length);
            document.getElementById("file3display").value = input3;
        })
    });
    $("#cycle").on('keyup', function () {
        var cyclyerr=$("#cycleErr");
        cyclyerr.text("");
        var amt = parseInt($(this).val());
        if ($(this).val().length > 0) {
            if($(this).val().charAt(0) === '0'||!$.isNumeric($(this).val())
                ||parseInt(Number($(this).val())) !==Number($(this).val())||isNaN(parseInt($(this).val(), 10))){
                cyclyerr.text("Please enter an integer");
                $('#cycle').addClass("errorbox");
                $('.submitbt').attr("disabled", true);
            }else if(amt <= 0||amt > 100000){
                cyclyerr.text("The range must be between 1 to 100000 (inclusive)");
                $('#cycle').addClass("errorbox");
                $('.submitbt').attr("disabled", true);
            }else{
                $('#cycle').removeClass("errorbox");
                $('.submitbt').attr("disabled", false);
            }
        }else{
            cyclyerr.text("Please enter an integer");
            $('#cycle').addClass("errorbox");
            $('.submitbt').attr("disabled", true);
        }
    });
    $("#mean").on('keyup', function () {
        var meanerr=$("#meanErr");
        meanerr.text("");
        var amt = parseInt($(this).val());
        if ($(this).val().length > 0) {
          if($(this).val().charAt(0) === '0'||!$.isNumeric($(this).val())
              ||parseInt(Number($(this).val())) !==Number($(this).val())||isNaN(parseInt($(this).val(), 10))){
                meanerr.text("Please enter an integer");
                $('#mean').addClass("errorbox");
                $('.submitbt').attr("disabled", true);
            }else if(amt <= 0||amt > 1000){
                meanerr.text("The range must be between 1 to 1000 (inclusive)");
                $('#mean').addClass("errorbox");
                $('.submitbt').attr("disabled", true);
            }else{
                $('#mean').removeClass("errorbox");
                $('.submitbt').attr("disabled", false);
            }
        }else{
            meanerr.text("Please enter an integer");
            $('#mean').addClass("errorbox");
            $('.submitbt').attr("disabled", true);
        }
    });
    $("#stroma").on('keyup', function () {
        var stromaerr = $("#stromaErr");
        stromaerr.text("");
        var amt = parseFloat($(this).val());
        if ($(this).val().length > 0) {
            if(!$.isNumeric($(this).val())){
                stromaerr.text("Please enter a decimal number");
                $('#stroma').addClass("errorbox");
                $('.submitbt').attr("disabled", true);
            }else if(Math.floor(amt) < 0||Math.ceil(amt) > 1||amt===0){
                stromaerr.text("The range must be between 0 to 1 (not including 0)");
                $('#stroma').addClass("errorbox");
                $('.submitbt').attr("disabled", true);
            }else{
                $('#stroma').removeClass("errorbox");
                $('.submitbt').attr("disabled", false);
            }
        }else{
            stromaerr.text("Please enter a decimal number");
            $('#stroma').addClass("errorbox");
            $('.submitbt').attr("disabled", true);
        }
    });
    $("#tumor").on('keyup', function () {
        var tumorerr=$("#tumorErr");
        tumorerr.text("");
        var amt = parseFloat($(this).val());
        if ($(this).val().length > 0) {
            if(!$.isNumeric($(this).val())){
                tumorerr.text("Please enter a decimal number");
                $('#tumor').addClass("errorbox");
                $('.submitbt').attr("disabled", true);
            }else if(Math.floor(amt) < 0||Math.ceil(amt) > 1||amt===0){
                tumorerr.text("value must be between 0 to 1 (not including 0)");
                $('#tumor').addClass("errorbox");
                $('.submitbt').attr("disabled", true);
            }else{
                $('#tumor').removeClass("errorbox");
                $('.submitbt').attr("disabled", false);
            }
        }else{
            tumorerr.text("Please enter a decimal number");
            $('#tumor').addClass("errorbox");
            $('.submitbt').attr("disabled", true);
        }
    });
    $("#normal").on('keyup', function () {
        var normalerr=$("#normalErr");
        normalerr.text("");
        var amt = parseFloat($(this).val());
        if ($(this).val().length > 0) {
            if(!$.isNumeric($(this).val())){
                normalerr.text("Please enter a decimal number");
                $('#normal').addClass("errorbox");
                $('.submitbt').attr("disabled", true);
            }else if(Math.floor(amt) < 0||Math.ceil(amt) > 1||amt===0){
                normalerr.text("value must be between 0 to 1 (not including 0)");
                $('#normal').addClass("errorbox");
                $('.submitbt').attr("disabled", true);
            }else{
                $('#normal').removeClass("errorbox");
                $('.submitbt').attr("disabled", false);
            }
        }else{
            normalerr.text("Please enter a decimal number");
            $('#normal').addClass("errorbox");
            $('.submitbt').attr("disabled", true);
        }
    });
});