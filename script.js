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

  const cards = document.querySelectorAll(".news-article");
  for (let i = 0; i < cards.length; i++) {
    const card = cards[i]
    const mainLink = card.querySelector(".read-more");

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
  }


  function loadTimelineYear(event){
    const years = document.querySelectorAll('.timeline-year.active');
    for(let i = 0; i < years.length; i++){
      years[i].classList.remove('active');
    }
  
    const album = document.querySelector('.past-productions .album');
    event.target.classList.add('active');
    const yearId = event.target.getAttribute("data-post-id");
    album.innerHTML = "<p>Loading...</p>";
    fetch(`/wp-json/wp/v2/timeline-year/${yearId}/`).then(response => {
      return response.json();
    }).then(jsonResponse => {
      album.innerHTML = jsonResponse.content.rendered;
    });
  }

  const years = document.querySelectorAll('.timeline-year');
  for(let i = 0; i < years.length; i++){
    years[i].addEventListener('click', loadTimelineYear);
  }
})();
