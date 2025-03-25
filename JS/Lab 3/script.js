// const body = document.body;
const btn = document.getElementById("btn");
const h1 = document.querySelector("h1");
const body = document.body;

function mouseOnFnc() {
  console.log("Hovered");
  h1.style.opacity = "1";

  // h1.style.visibility = "visible"; // Assuming this makes the text visible
  h1.style.color = "rgb(59 110 211)";
  body.style.backgroundImage = `linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url('./css/2.png')`;
}

function mouseExitFnc() {
  console.log("Mouse exited");
  h1.style.color = "rgba(240, 248, 255, 0.521)";
  // h1.style.visibility = "hidden";
  h1.style.opacity = "0";

  body.style.backgroundImage = `linear-gradient(to right, rgb(0, 0, 0), rgb(0, 0, 0)), url('./css/2.png')`;
}

btn.addEventListener("mouseover", mouseOnFnc);
btn.addEventListener("mouseout", mouseExitFnc);
