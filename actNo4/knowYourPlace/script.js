$(document).ready(function () {
  let draggableObjects;
  let dropPoints;
  const startButton = $("#start");
  const result = $("#result");
  const controls = $(".controls-container");
  const dragContainer = $(".draggable-objects");
  const dropContainer = $(".drop-points");
  const timer = $("#timer");
  const data = [
    "beer",
    "dango",
    "hot pot",
    "juice",
    "meat bun",
    "noodles",
    "onigiri",
    "rice bowl",
    "soft drinks",
    "tempura",
    "water",
    "wine",
  ];

  let count = 0;
  let timeLeft = 20;
  let timerInterval;

  const startTimer = () => {
    timerInterval = setInterval(() => {
      timeLeft -= 1;
      timer.text(`Time Left: ${timeLeft}s`);

      if (timeLeft === 0) {
        clearInterval(timerInterval);
        timer.text("Time's Up!");
        controls.removeClass("hide");
        startButton.text("Retry");
        startButton.removeClass("hide");
        startButton.off("click").on("click", function () {
          location.reload();
        });
      }
    }, 1000);
  };

  const resetTimer = () => {
    clearInterval(timerInterval);
    timeLeft = 20;
    timer.text(`Time Left: ${timeLeft}s`);
  };

  const drop = (event, ui) => {
    const draggedElementData = ui.draggable.attr("id");
    const droppableElementData = $(event.target).attr("data-id");
    if (draggedElementData === droppableElementData) {
      $(event.target).addClass("dropped");
      ui.draggable.hide();
      ui.draggable.draggable("disable");
      $(event.target).empty();
      $(event.target).append(`<img src="foods/${draggedElementData}.png">`);
      $(event.target).css("background-color", "#9effa8");

      count += 1;
    } else {
      $(event.target).css("background-color", "#ff6961");
      setTimeout(() => {
        $(event.target).css("background-color", "");
      }, 1000);
    }

    if (count === 5) {
      result.text("You Won!");
      clearInterval(timerInterval);
      controls.removeClass("hide");
      startButton.text("Proceed to Level 2");
      startButton.removeClass("hide");
      startButton.off("click").on("click", function () {
        updateProgress("Level 1", timeLeft);
        window.location.href = "index2.html";
      });
    }
  };

  const creator = () => {
    dragContainer.empty();
    dropContainer.empty();
    let randomData = [];

    for (let i = 1; i <= 5; i++) {
      let randomValue = randomValueGenerator();
      if (!randomData.includes(randomValue)) {
        randomData.push(randomValue);
      } else {
        i -= 1;
      }
    }

    for (let i of randomData) {
      const flagDiv = $("<div>", {
        class: "draggable-image",
        draggable: true,
        id: i,
      }).html(`<img src="foods/${i}.png">`);
      dragContainer.append(flagDiv);
    }

    randomData = randomData.sort(() => 0.5 - Math.random());
    for (let i of randomData) {
      const countryDiv = $("<div>", {
        class: "countries",
        "data-id": i,
      }).html(`${i.charAt(0).toUpperCase() + i.slice(1).replace("-", "")}`);
      dropContainer.append(countryDiv);
    }

    draggableObjects = $(".draggable-image");
    dropPoints = $(".countries");
  };

  const randomValueGenerator = () => {
    return data[Math.floor(Math.random() * data.length)];
  };

  startButton.on("click", function () {
    controls.addClass("hide");
    resetTimer();
    startTimer();
    creator();
    count = 0;

    draggableObjects.draggable({
      revert: "invalid",
      zIndex: 100,
      start: function (event, ui) {
        $(this).css("z-index", 101);
      },
    });

    dropPoints.droppable({
      accept: ".draggable-image",
      drop: drop,
    });
  });
});
