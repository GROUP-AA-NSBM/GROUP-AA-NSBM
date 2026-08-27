document.addEventListener("DOMContentLoaded", function () {
    console.log("Admin JS loaded!");


    const deleteButtons = document.querySelectorAll(".btn-delete");
    deleteButtons.forEach(button => {
        button.addEventListener("click", function (e) {
            const confirmed = confirm("Are you sure you want to delete this item?");
            if (!confirmed) {
                e.preventDefault();
            }
        });
    });

});