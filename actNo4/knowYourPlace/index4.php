<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Know Your Place</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <link rel="stylesheet" href="style4.css" />
    <link rel="stylesheet" href="modal.css" /> 
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      crossorigin="anonymous"
    />

</head>
<body>
    <div class="container">
        <button id="back-button"><i class="fas fa-arrow-left"></i></button>
        <h3>Level 4</h3><br>
        <div id="timer"></div>
        <div class="draggable-objects"></div>
        <div class="drop-points"></div>
    </div>
    <div class="controls-container">
        <p id="result"></p>
        <button id="start">Start Level 4</button>
    </div>
    <div class="confirmation-dialog" id="myModal" style="display: none">
    <div class="confirmation-box">
        <h3>Are you sure you want to quit?</h3>
        <div class="confirmation-buttons">
        <button class="cancel" id="cancel-quit">Cancel</button>
        <button class="confirm" id="confirm-quit">Quit</button>
        </div>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="progressTracker.js"></script> 
    <script src="script4.js"></script>
    <script src="modal.js"></script> 
</body>
</html>
