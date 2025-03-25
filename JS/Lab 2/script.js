const body = document.body;
const btn = document.getElementById("btn");

btn.addEventListener("click", () => {
  console.log("Clicked");

  const randomOpacity1 = Math.random();
  const randomOpacity2 = Math.random();
  body.style.backgroundImage = `linear-gradient(to right, rgba(0, 0, 0, ${randomOpacity1}), rgba(0, 0, 0, ${randomOpacity2})), url('./css/2.png')`;

  // const randomColor1 = Math.random() * 256;
  // const randomColor2 = Math.random() * 256;
  // const randomColor3 = Math.random() * 256;
  // body.style.backgroundColor = `rgba(${randomColor1}, ${randomColor2}, ${randomColor3}, 1)`;
});
