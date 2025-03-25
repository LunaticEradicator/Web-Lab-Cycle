const newPassword = document.getElementById("newPassword");
const confirmPassword = document.getElementById("confirmPassword");
const errorMessage = document.querySelector(".error-Message");

const form = document.querySelector(".formed");
const pAll = document.querySelectorAll("p");
const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const emailId = document.getElementById("emailId");
const phoneNumber = document.getElementById("phoneNumber");

function validatePassword() {
  console.log(newPassword.value);
  confirmPassword.value !== newPassword.value
    ? confirmPassword.setCustomValidity(errorMessage)
    : confirmPassword.setCustomValidity("");
}

confirmPassword.onkeyup = validatePassword;

function ElementValueNull(elementName, elementIndex, e, pAll) {
  e.preventDefault();
  pAll[elementIndex].style.visibility = "visible"; // add err class
  elementName.addEventListener("click", (e) => {
    pAll[elementIndex].style.removeProperty("visibility"); // remove the css element property [remove above]
  });
}

form.addEventListener("submit", (e) => {
  pAll.forEach(() => {
    if (firstName.value.trim() === "") {
      ElementValueNull(firstName, 0, e, pAll);
    }
    if (lastName.value.trim() === "") {
      ElementValueNull(lastName, 1, e, pAll);
    }
    if (emailId.value.trim() === "") {
      ElementValueNull(emailId, 2, e, pAll);
    }
    if (phoneNumber.value.trim() === "") {
      ElementValueNull(phoneNumber, 3, e, pAll);
    }
    if (newPassword.value.trim() === "") {
      ElementValueNull(newPassword, 4, e, pAll);
    }
    if (confirmPassword.value.trim() === "") {
      ElementValueNull(confirmPassword, 5, e, pAll);
    }
  });
});

//prevent the browser from showing default error bubble / hint
document.addEventListener(
  "invalid",
  (function () {
    return function (e) {
      e.preventDefault();
    };
  })(),
  true
);
