
const sidebar = document.getElementById("sidebar");
sidebar.addEventListener("mouseenter", () => {
  sidebar.classList.remove('collapsed');
  sidebar.style.width = "10%";

});

sidebar.addEventListener("mouseleave", () => {
  sidebar.classList.add('collapsed');
  sidebar.style.width = "70px";
});

sidebar.addEventListener("mouseenter", () => {

  if (window.innerWidth > 768) {
    sidebar.classList.remove('collapsed');
    sidebar.style.width = "200px";
  }
});

sidebar.addEventListener("mouseleave", () => {
  if (window.innerWidth > 768) {
    sidebar.classList.add('collapsed');
    sidebar.style.width = "70px";
  }
});
