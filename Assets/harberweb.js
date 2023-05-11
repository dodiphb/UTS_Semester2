$(document).ready(function () {
  $("#btnsearch").click(function (e) {
    var txtInput = $("#srchInv").val();
    $("#infoinvaccr").html("Nama anda : " + txtInput);
    $.ajax({
      type: "POST",
      url: "./assets/getcurl.php",
      data: "",
      success: function (response) {
        $("#infoinvaccr").html("<br/> Response <br/> " + response);
      },
    });
  });
});
