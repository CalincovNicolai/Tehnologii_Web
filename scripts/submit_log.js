$(function(){
    var $registerForm = $("#forms_validation")
    
    $.validator.addMethod("noSpace", function(value, element){
        return value == '' || value.trim().length != 0
    }, "Spaces are not allowed!")

    $.validator.addMethod("pwcheck", function(value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // contine caracterele date
            && /[a-z]/.test(value) // are o litera mica
            && /\d/.test(value) // are un numar
     });
     

    if($registerForm.length){
        $registerForm.validate({
            rules:{
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                }
            },
            messages:{
                email: {
                    required: "Email cannot be blank!",
                    email: "Email is not valid!"
                },
                password: {
                    required: "Password cannot be blank!",
                }
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                var email =$("#email").val();
                var password =$("#password").val();
                var response = document.getElementById("msg");    
                
                $.ajax({
                    url:'http://localhost/Tehnologii_Web/db/submit_log.php',
                    type: 'POST',
                    cache: false,
                    data: {'email': email, 'password':password},
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        if(!data){
                            response.style.color = "red";
                            response.innerHTML = "Error!";
                        }
                        else{
                            if(data.status == 1) {
                            response.style.color = "green";
                            response.innerHTML = data.mesage;
                        }else{
                            response.style.color = "red";
                            response.innerHTML = data.mesage;
                        }
                        }
                    }
         
                })
            }
        })
    }      
})
