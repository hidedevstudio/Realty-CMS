// Modal
document.addEventListener("DOMContentLoaded", () => {
     document.querySelectorAll(".modal-btn").forEach((button) => {
          button.addEventListener("click", () => {
               document.getElementById("modal").classList.add("open");
               document.body.classList.add("backdrop");
          });
     });

     document.getElementById("modal-close").addEventListener("click", () => {
          closeModal();
     });

     document.getElementById("modal").addEventListener("click", (e) => {
          if (e.target === document.getElementById("modal")) {
               closeModal();
          }
     });

     function closeModal() {
          document.getElementById("modal").classList.remove("open");
          document.body.classList.remove("backdrop");
     }
});
// Dropdown
document.addEventListener("click", function (event) {
     const dropdownButton = document.getElementById("dropLang");
     const dropdownContent = document.getElementById("dropContent");

     const isClickInside = dropdownButton.contains(event.target) || dropdownContent.contains(event.target);

     if (isClickInside) {
          dropdownButton.classList.toggle("active");
          dropdownContent.classList.toggle("open");
     } else {
          dropdownButton.classList.remove("active");
          dropdownContent.classList.remove("open");
     }
});
