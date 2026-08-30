
document.addEventListener("DOMContentLoaded", function () {
  console.log("Admin JS loaded successfully.");

  const deleteButtons = document.querySelectorAll(".btn-delete");
  deleteButtons.forEach((button) => {
    button.addEventListener("click", function (e) {
      const confirmed = confirm("Are you sure you want to delete this item? This action cannot be undone.");
      if (!confirmed) {
        e.preventDefault();
      }
    });
  });

  const createEventForm = document.querySelector("#createEventForm");
  if (createEventForm) {
    createEventForm.addEventListener("submit", function (e) {
      const title = document.querySelector("#eventTitle").value.trim();
      const category = document.querySelector("#eventCategory").value;
      const date = document.querySelector("#eventDate").value;

      if (!title || !category || !date) {
        e.preventDefault();
        alert("Please complete all required fields before publishing.");
      }
    });
  }

  const addCategoryForm = document.querySelector("#addCategoryForm");
  if (addCategoryForm) {
    addCategoryForm.addEventListener("submit", function (e) {
      const categoryInput = this.querySelector('input[name="category_name"]').value.trim();
      if (categoryInput.length < 2) {
        e.preventDefault();
        alert("Category name must be at least 2 characters long.");
      }
    });
  }

  const announcementForm = document.querySelector("#announcementForm");
  if (announcementForm) {
    announcementForm.addEventListener("submit", function (e) {
      const title = this.querySelector('input[name="title"]').value.trim();
      const content = this.querySelector('textarea[name="content"]').value.trim();

      if (!title || !content) {
        e.preventDefault();
        alert("Please provide both a title and message content for the announcement.");
      }
    });
  }
});