$(document).ready(function () {
    $("#signUp").click(function(e){
        Swal.fire({
            icon: 'question',
            title: 'Click YES, if you are a Job Seeker or NO if you are an Employer ',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
               location = "/internship/views/registration/intern/register.php"
            } else if (result.isDenied) {
                location = "/internship/views/registration/company/register.php"
            }
          })
    })

    //User Login ajax requests
    $('#login').click(function (e) {
        
        if ($("#data")[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: "loginAction.php",
                type: "POST",
                data: $("#data").serialize() + "&action=login",
                success: function (response) {
                    if(response == ""){

                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Login Successful',
                            showConfirmButton: false,
                            timer: 1900
                          })

                        $('#data')[0].reset();
                        setTimeout(function (){

                            location.reload();
                        }, 2000);
                    }else{
                        Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: 'Invalid User Credentials',
                            showConfirmButton: true
                          })

                    }
                }
            });
        }

    });

    $("body").on("click", ".forgot_password", function (e) {
        alert("Contact the administrator to renew your password")
    })
});