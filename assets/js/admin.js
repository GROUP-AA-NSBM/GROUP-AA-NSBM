
document.addEventListener("DOMContentLoaded", function () {


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
});