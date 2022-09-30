$(document).ready(function () {

    $('.datepicker').datepicker({
        inline: true
      });

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

    $("#img-btn").click(function (e) {
        if ($("#photo-data")[0].checkValidity()) {
            e.preventDefault();
            var data = new FormData($("#photo-data")[0])
                $.ajax({
                    url: "profile/photoAction.php",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: data,
                    success: function (response) {
                        //alert(response)
                        $("#photo-data")[0].reset();
                        $('#picmodal').hide();
                        location.reload(true);
                        
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

    $("#doc-btn").click(function (e) {
        if ($("#document-data")[0].checkValidity()) {
            e.preventDefault();

            var data = new FormData($("#document-data")[0])
                $.ajax({
                    url: "profile/attachmentAction.php",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: data,
                    success: function (response) {
                        if(response === "1"){
                            $("#document-data")[0].reset();
                            $('#attachdoc').hide();
    
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Document has been uploaded successfully!',
                                timer: 1900
                              })
                            location.reload(true);
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
                footer: '<code><b>Make Sure you complete filling the form</b></code>'
              })
        }
    });


    $("#resume-btn").click(function (e) {
        if ($("#resume-data")[0].checkValidity()) {
            e.preventDefault();

            var data = new FormData($("#resume-data")[0])
                $.ajax({
                    url: "jobs/resumeAction.php",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: data,
                    success: function (response) {
                        if(response === "1"){
                            setTimeout(2000);
                
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Resume has been uploaded successfully!',
                                timer: 1900
                              })

                            $("#resume-data")[0].reset();
                            $('#attachcv').hide();
                            location.reload(true);
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
                footer: '<code><b>Make Sure you complete filling the form</b></code>'
              })
        }
    });

    $("body").on("click", ".del-application", function (e) {
        
        e.preventDefault();
        let delBtnID = $(this).attr('id');

        Swal.fire({
            icon: 'warning',
            title: 'Do you want to delete this Application?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "jobs/deleteApplication.php",
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
                                location.reload();
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



    $("body").on("click", ".delete-attachment", function (e) {

        let delBtnID = $(this).attr('id');
        //alert(delBtnID)

        Swal.fire({
            icon: 'warning',
            title: 'Do you want to delete this Document?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "profile/deleteAttachment.php",
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
                                location.reload();
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

    $("#interview-btn").click(function (e) {
        if ($("#interview-data")[0].checkValidity()) {
            e.preventDefault();
            var data = new FormData($("#interview-data")[0])
                $.ajax({
                    url: "application/addInterview.php",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: data,
                    success: function (response) {
                      
                            $("#interview-data")[0].reset();
                            $('#interview_modal').hide();
    
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Interview has been scheduled and sent!',
                                timer: 1900
                              })
                              
                              setTimeout(function(){
                                location.reload(true);
                              }, 2000)
                            
                    }
                });
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<code><b>Make Sure you complete filling the form</b></code>'
              })
        }
    });

    $("body").on("click", ".reject-btn", function (e) {
        e.preventDefault();
        let delBtnID = $(this).attr('id');
        Swal.fire({
            icon: 'warning',
            title: 'Do you want to Reject this application?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "application/reject.php",
                    type: "POST",
                    data: {delBtnID:delBtnID},
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title:'Rejected!!',
                            showConfirmButton: false,
                            timer: 1900
                            })

                            setTimeout(function (){
                                location.reload(true);
                            }, 2000); 
                    }
                });
            } else if (result.isDenied) {
              Swal.fire({
                icon: 'warning',
                title:'Cancelled',
                showConfirmButton: false,
                timer: 1900
                })
            }
          })

    });

});