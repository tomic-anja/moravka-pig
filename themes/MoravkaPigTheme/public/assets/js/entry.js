function demoClick() {
  alert("demo");
}

// STICKY HEADER TOGGLE
document.addEventListener("DOMContentLoaded", () => {
  const selectHeader = document.querySelector(".header");

  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 0) {
        selectHeader.classList.add("header-sticky");
      } else {
        selectHeader.classList.remove("header-sticky");
      }
    };

    window.addEventListener("load", headerScrolled);
    document.addEventListener("scroll", headerScrolled);
  }
});