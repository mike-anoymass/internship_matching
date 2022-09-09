$(document).ready(function () {


    //insert Course ajax requests
    $("#btn-save").click(function (e) {
            if ($("#company-data")[0].checkValidity()) {
                e.preventDefault();
                $.ajax({
                    url: "companyRegisterAction.php",
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
                    footer: '<code>Make Sure you complete filling the form</code>'
                  })
            }
    });


});