$(document).ready(function () {

    $("#btn-save").click(function (e) {
            if ($("#company-data")[0].checkValidity()) {
                e.preventDefault();
                if($("#password").val() === $("#password2").val()){
                    $.ajax({
                        url: "registerAction.php",
                        type: "POST",
                        data: $("#company-data").serialize() + "&action=create",
                        success: function (response) {
                            if(response === "1"){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Your Company has been registered',
                                    showConfirmButton: false,
                                    timer: 1900
                                })
                                setTimeout(function (){
                                    location = "/internship/views/login.php";
                                }, 2000);
                                
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    footer: response
                                })
                            }
                            
                            $("#company-data")[0].reset();
                            
                        }
                    });

                }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<code>Passwords do not match</code>'
                        })
                }
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<code>Make Sure you complete filling the form</code>'
                  })
            }
    });


    $('.datepicker').datepicker({
        inline: true
      });


});