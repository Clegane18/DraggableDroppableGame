$(document).ready(function () {
  $("#back-button").on("click", function () {
    $("#myModal").css("display", "block");
  });

  $(".close, .modal").on("click", function () {
    $("#myModal").css("display", "none");
  });

  $(".modal-content").click(function (e) {
    e.stopPropagation();
  });

  $("#confirm-quit").on("click", function () {
    window.location.href = "../html/homepage.html";
  });

  $("#cancel-quit").on("click", function () {
    $("#myModal").css("display", "none");
  });
});
