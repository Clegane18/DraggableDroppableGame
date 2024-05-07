function updateProgress(newCurrentLevel, newLongerTimeLeft) {
  console.log("Updating user profile...");
  $.ajax({
    type: "POST",
    url: "../php/updateUserProgress.php",
    data: {
      "new-current-level": newCurrentLevel,
      "new-longer-time-left": newLongerTimeLeft,
    },
    success: function (response) {
      console.log(response);
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });
}
