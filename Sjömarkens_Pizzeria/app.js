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
const openFormButtons = document.querySelectorAll("[data-form-target]");
const closeFormButtons = document.querySelectorAll("[data-close-button]");
const overlay = document.getElementById("overlay");

//opens form if klick on button.
openFormButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const form = document.querySelector(button.dataset.formTarget);
    openForm(form);
  });
});

//closes form if klick outside form
overlay.addEventListener("click", () => {
  const forms = document.querySelectorAll(".form.active");
  forms.forEach((form) => {
    closeForm(form);
  });
});

//closes form if click on close-button
closeFormButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const form = button.closest(".form");
    closeForm(form);
  });
});

//opens form
function openForm(form) {
  if (form == null) return;
  form.classList.add("active");
  overlay.classList.add("active");
}

//closes form
function closeForm(form) {
  if (form == null) return;
  form.classList.remove("active");
  overlay.classList.remove("active");
}
