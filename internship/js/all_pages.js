$(document).ready(function () {

    $("#save-vacancy").click(function (e) {
            if ($("#vacancy-data")[0].checkValidity()) {
                e.preventDefault();
                    $.ajax({
                        url: "vacancies/add_edit_action.php",
                        type: "POST",
                        data: $("#vacancy-data").serialize() + "&action=create",
                        success: function (response) {
                            if(response === "1"){
                                $("#vacancy-data")[0].reset();

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Vacancy has been added',
                                    showConfirmButton: false,
                                    timer: 1900
                                })
                                setTimeout(function (){
                                    location = "index.php?view=jobs";
                                }, 2000);
                                
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    footer: response
                                })
                            }
                            
                        }
                    });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<code>Make Sure you complete filling the form</code>'
                  })
            }
    });

    $("#update-vacancy").click(function (e) {
        if ($("#vacancy-data")[0].checkValidity()) {
            e.preventDefault();
                $.ajax({
                    url: "vacancies/add_edit_action.php",
                    type: "POST",
                    data: $("#vacancy-data").serialize() + "&action=update",
                    success: function (response) {
                        if(response === "1"){
                            $("#vacancy-data")[0].reset();
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Vacancy has been updated',
                                showConfirmButton: false,
                                timer: 1900
                            })
                            setTimeout(function (){
                                location = "index.php?view=jobs";
                            }, 2000);
                            
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: response
                            })
                        }
                        
                    }
                });
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<code>Make Sure you complete filling the form</code>'
              })
        }
});

    $("body").on("click", ".delete-vacancy", function (e) {
        e.preventDefault();
        let delBtnID = $(this).attr('id');

        Swal.fire({
            icon: 'warning',
            title: 'Do you want to delete this vacancy?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "vacancies/delete_action.php",
                    type: "POST",
                    data: {delBtnID:delBtnID},
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title:'Delete Successful',
                            showConfirmButton: false,
                            timer: 1900
                            })

                            setTimeout(function (){
                                location = "index.php?view=jobs";
                            }, 2000); 
                    }
                });
            } else if (result.isDenied) {
              Swal.fire({
                icon: 'warning',
                title:'Delete Cancelled',
                showConfirmButton: false,
                timer: 1900
                })
            }
          })

    });


});