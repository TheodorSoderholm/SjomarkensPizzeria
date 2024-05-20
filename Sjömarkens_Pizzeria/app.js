//mobile-menu
const menu = document.querySelector("#mobile-menu");
const menuLinks = document.querySelector(".navbar .menu");

// adds class
menu.addEventListener("click", function () {
  menu.classList.toggle("is-active");
  menuLinks.classList.toggle("active");
});

//auto move scroller
window.smoothScroll = function (target) {
  var scrollTarget = target;
  do {
    //find scroll container
    scrollTarget = scrollTarget.parentNode;
    if (!scrollTarget) return;
    scrollTarget.scrollTop += 1;
  } while (scrollTarget.scrollTop == 0);

  var targetY = 0;
  do {
    //find top of container
    if (target == scrollTarget) break;
    targetY += target.offsetTop;
  } while ((target = target.offsetParent));

  scroll = function (a, b, c, d) {
    d++;
    if (d > 30) return;
    a.scrollTop = b + ((c - b) / 30) * d;
    setTimeout(function () {
      scroll(a, b, c, d);
    }, 20);
  };
  //scrolling
  scroll(scrollTarget, scrollTarget.scrollTop, targetY, 0);
};

//popup-form
//selects id of elements for variables
const openFormButtons = document.querySelectorAll("[data-form-target]");
const openReceiptButtons = document.querySelectorAll("[data-receipt-target]");
const closeFormButtons = document.querySelectorAll("[data-close-button]");
const formContainer = document.getElementById("form-container");
const overlay = document.getElementById("overlay");
const body = document.getElementById("body");

//calls "openForm" if user click on button
openFormButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const form = document.querySelector(button.dataset.formTarget);
    openForm(form);
  });
});

//calls "openReceipt" if user clicks on "submit"
openReceiptButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const receipt = document.querySelector(button.dataset.receiptTarget);
    openReceipt(receipt);
  });
});

//calls "closeForm" if user click on "close-button"
closeFormButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const form = button.closest(".form");
    closeForm(form);
  });
});

//calls "closeForm" if user click outside the form, on "overlay"
overlay.addEventListener("click", () => {
  const forms = document.querySelectorAll(".form.active");
  forms.forEach((form) => {
    closeForm(form);
  });
});

//opens form, adds class "active" to the element with id="form", id="overlay" and id="body"
function openForm(form) {
  if (form == null) return;
  //calls "closeReceipt" when "form" is not null to reset form
  const receipts = document.querySelectorAll(".receipt.active-receipt");
  receipts.forEach((receipt) => {
    closeReceipt(receipt);
  });
  form.classList.add("active");
  overlay.classList.add("active");
  body.classList.add("active");
}

//opens receipt, adds class "active-receipt" to the element with id="receipt" and id="form-container"
function openReceipt(receipt) {
  if (receipt == null) return;
  receipt.classList.add("active-receipt");
  formContainer.classList.add("active-receipt");
}

//closes receipt, removes class "active-receipt" from the element with id="receipt" and id="form-container"
function closeReceipt(receipt) {
  if (receipt == null) return;
  receipt.classList.remove("active-receipt");
  formContainer.classList.remove("active-receipt");
}

//closes form, removes class "active" of the element with id="form", element with id="overlay" and id="body"
function closeForm(form) {
  if (form == null) return;
  form.classList.remove("active");
  overlay.classList.remove("active");
  body.classList.remove("active");
}

//calculates time to make order and displays in HTML     INTE KLAR, ÄNDRA TIMEINMINUTES TILL FUNKTION
let timeInMinutes = 10;
var timeString = `<p>Din beställning är redo att hämtas om ${timeInMinutes} minuter.</p>`;
document.getElementById("time").innerHTML = timeString;
