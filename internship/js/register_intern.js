$(document).ready(function () {

    $("#btn-save").click(function (e) {
            if ($("#intern-data")[0].checkValidity()) {
                e.preventDefault();

                var data = new FormData($("#intern-data")[0])

                if($("#password").val() === $("#password2").val()){
                    $.ajax({
                        url: "registerAction.php",
                        type: "POST",
                        contentType: false,
                        processData: false,
                        data: data,
                        success: function (response) {
                            if(response === "1"){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Applicant has been registered',
                                    showConfirmButton: false,
                                    timer: 1900
                                })
                                setTimeout(function (){
                                    location = "/internship/views/login.php";
                                }, 2000);
                                $("#intern-data")[0].reset();
                                
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

});