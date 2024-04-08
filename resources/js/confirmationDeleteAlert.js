import Swal from "sweetalert2";

document.addEventListener("DOMContentLoaded", function() {
    deleteButton(); 
});

function deleteButton() {
  const deleteAction = document.querySelectorAll('#delete');
  deleteAction.forEach( del => {
    del.addEventListener("click", function(e) {
      e.preventDefault();
      let eraseForm = e.target.form.id;
      Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
            const del = document.querySelector(`#${eraseForm}`);
            del.submit();
          }
        });
    });
  })        
}
