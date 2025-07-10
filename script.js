document.addEventListener("DOMContentLoaded", function() {
  // Remove current-menu-item from all footer nav items on page load
  const footerNav = document.querySelector('footer nav'); // Adjust selector if needed
  if (footerNav) {
    const footerNavItems = footerNav.querySelectorAll('ul li.current-menu-item');
    footerNavItems.forEach(li => li.classList.remove('current-menu-item'));
  }

  // Header navigation scrollspy and highlighting
  const headerNav = document.querySelector('#site-navigation');
  const navLi = headerNav ? headerNav.querySelectorAll("ul li") : [];
  const sections = document.querySelectorAll(".block");
  const header = document.querySelector("header");
  const headerHeight = header ? header.offsetHeight : 0;
  const isCaseStudyPage = window.location.pathname.includes("/case-study"); // Adjust pattern if needed

  function highlightNav() {
    let current = sections[0].getAttribute("id");
    for (let i = 0; i < sections.length; i++) {
      const sectionTop = sections[i].offsetTop - headerHeight;
      if (window.scrollY >= sectionTop) {
        current = sections[i].getAttribute("id");
      }
    }
    navLi.forEach((li) => {
      li.classList.remove("current-menu-item");
      const link = li.querySelector("a");
      if (link && link.hash === `#${current}`) {
        li.classList.add("current-menu-item");
      }
    });
  }

  function highlightWorkNavOnly() {
    navLi.forEach((li) => {
      li.classList.remove("current-menu-item");
      const link = li.querySelector("a");
      if (link && link.hash === "#work") {
        li.classList.add("current-menu-item");
      }
    });
  }

  if (headerNav) {
    if (isCaseStudyPage) {
      highlightWorkNavOnly();
    } else {
      highlightNav();
      window.addEventListener("scroll", highlightNav);
    }
  }
});
