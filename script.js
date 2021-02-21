(function () {
  function toggleMenu(element) {
    const openClass = "sub-menu__open";
    const visibleClass = "sub-menu__displayed";

    if (element.classList.contains(openClass)) {
      element.classList.remove(openClass);
      setTimeout(function () {
        element.classList.remove(evt.target.parentElement, visibleClass);
      }, 501);
    } else {
      element.classList.add(openClass);
      element.classList.add(visibleClass);
      element.getElementsByTagName("button")[0].focus();
    }
  }
  var menuToggles = document.getElementsByClassName("menu-open");

  for (var i = 0; i < menuToggles.length; i++) {
    menuToggles[i].addEventListener("click", function (evt) {
      toggleMenu(evt.target.nextElementSibling);
    });
  }

  var menuToggles = document.getElementsByClassName("menu-close");

  for (var i = 0; i < menuToggles.length; i++) {
    menuToggles[i].addEventListener("click", function (evt) {
      toggleMenu(evt.target.parentElement);
    });
  }

  const card = document.querySelector(".news-article");
  const mainLink = document.querySelector(".read-more");

  const clickableElements = Array.from(card.querySelectorAll("a"));

  clickableElements.forEach((ele) =>
    ele.addEventListener("click", (e) => e.stopPropagation())
  );

  card.addEventListener("click", handleClick);

  function handleClick(event) {
    const isTextSelected = window.getSelection().toString();
    if (!isTextSelected) {
      mainLink.click();
    }
  }
})();
