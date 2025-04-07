const fetchBtn = document.getElementById("fetchDataBtn");
const dataContainer = document.querySelector(".dataContainer");
const loadingScreen = document.querySelector(".loadingScreen");
const cards = document.querySelectorAll(".card");
const h1 = document.querySelector("h1");
const full = document.querySelector(".full");

// Color for each  Card
const shadowColors = ["8901fe", "fb961a", "23faf6", "d2eff9", "ea4335"];

fetchBtn.addEventListener("click", () => {
  fetchBtn.style.display = "none";
  loadingScreen.style.display = "flex";
  dataContainer.style.display = "none";

  setTimeout(() => {
    loadingScreen.style.display = "none";
    dataContainer.style.display = "block";
  }, 2000);
});

function mouseOnFnc(e, index) {
  console.log(`Hovered on card ${index + 1}`);
  full.style.backgroundImage = `linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url('./css/${
    index + 1
  }.png')`;
  full.style.opacity = 0.3;
  cards.forEach((card) => {
    card.style.boxShadow = `0 1px 20px #${shadowColors[index]}, 0 1px 2px -1px #${shadowColors[index]}`;
    h1.style.color = `#${shadowColors[index]}`;
  });
}

function mouseExitFnc() {
  console.log("Mouse exited");
  full.style.opacity = 0;
  h1.style.color = "silver";
  cards.forEach((card) => {
    card.style.boxShadow = "0 1px 4px white, 0 1px 2px -1px white";
  });
}

cards.forEach((card, index) => {
  console.log(card[index]);
  card.addEventListener("mouseover", (e) => mouseOnFnc(e, index));
  card.addEventListener("mouseout", mouseExitFnc);
});
