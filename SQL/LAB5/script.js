console.log("Script loaded?");
const addBtn = document.getElementById("addBtn");
const addTodoConfirmation = document.querySelector(".addTodoConfirmation");
const cancelBtn = document.querySelector(".cancelBtn");
const form = document.querySelector(".addItem");
const search = document.querySelector(".searchDiv");
const success = document.querySelector(".success");
const h1 = document.querySelector("h1");
const searchBtn = document.querySelector(".searchBtn");

addBtn.addEventListener("click", function () {
  addBtn.style.display = "none"; // Hide the "Add Book" button
  addTodoConfirmation.style.display = "block"; // Show the form to add book
});

cancelBtn.addEventListener("click", function () {
  console.log("Clear");
  addTodoConfirmation.style.display = "none"; // Hide the form
  addBtn.style.display = "block"; // Show the "Add Book" button again
  form.reset();
});
search.addEventListener("click", function () {
  console.log("Searched");
  search.style.width = "100%"; // Show the "Add Book" button again
});

search.addEventListener("mouseleave", function () {
  search.style.width = "17%"; // Show the "Add Book" button again
});

window.onload = () => {
  setTimeout(function () {
    const successMessage = document.querySelector(".successDiv");
    if (successMessage) {
      successMessage.style.display = "none";
      h1.style.backgroundImage =
        "linear-gradient(to right, rgb(0, 0, 0), rgb(0, 0, 0)), url(./6.png)";
    }
  }, 3500);
};
