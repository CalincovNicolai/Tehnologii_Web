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
                fname: {
                    required: true,
                    noSpace: true,
                },
                sname: {
                    required: true,
                    noSpace: true,
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    noSpace: true,
                    minlength:8,
                    pwcheck: true
                },
                password2: {
                    required: true,
                    equalTo: password
                }
            },
            messages:{
                fname: {
                    required: "Name cannot be blank!",
                    noSpace: "Write something!",
                    lettersonly: "Write only letters!" 
                },
                sname: {
                    required: "Name cannot be blank!",
                    noSpace: "Write something!",
                    lettersonly: "Write only letters!" 
                },
                email: {
                    required: "Email cannot be blank!",
                    email: "Email is not valid!"
                },
                password: {
                    required: "Password cannot be blank!",
                    minlength: "Password should not be less then 8 characters!",
                    pwcheck: "Password should contain numbers and letters!"
                },
                password2: {
                    required: "Password cannot be blank!",
                    equalTo: "Password is not valid!"
                }
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                var fname =$("#fname").val();
                var sname =$("#sname").val();
                var email =$("#email").val();
                var password =$("#password").val();
                var password2 =$("#password2").val();
                var response = document.getElementById("msg");

                $.ajax({
                    url:'http://localhost/Tehnologii_Web/db/submit_reg.php',
                    type: 'POST',
                    cache: false,
                    data: {'fname': fname, 'sname': sname, 'email': email, 'password': password, 'password2': password2},
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