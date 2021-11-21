$(function(){
    var $registerForm = $("#formValidation")
    $.validator.addMethod("noSpace", function(value, element){
        return value == '' || value.trim().length != 0
    }, "Spaces are not allowed!")

    $.validator.addMethod("pwcheck", function(value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // contine caracterele date
            && /[a-z]/.test(value) // are o litera mica
            && /\d/.test(value) // are un numar
     });

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
      }, "Letters only please!"); 
     
    if($registerForm.length){
        $registerForm.validate({
            rules:{
                fname: {
                    required: true,
                    noSpace: true,
                    lettersonly: true
                },
                sname: {
                    required: true,
                    noSpace: true,
                    lettersonly: true
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
            }
        })
    }
})


$(function(){
    var $registerForm = $("#formContact")
    $.validator.addMethod("noSpace", function(value, element){
        return value == '' || value.trim().length != 0
    }, "Spaces are not allowed!")

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
      }, "Letters only please!"); 

    if($registerForm.length){
        $registerForm.validate({
            rules:{
                name:{
                    required: true,
                    noSpace: true,
                    lettersonly: true
                },
                email: {
                    required: true,
                    email: true,
                },
                message: {
                    required: true,
                    noSpace: true,
                    minlength: 20
                }
            },
            messages:{
                name:{
                    required: "Name cannot be blank!",
                    noSpace: "Write something!",
                    lettersonly: "Write only letters!" 
                },
                email: {
                    required: "Email cannot be blank!",
                    email: "Email is not valid!"
                },
                message: {
                    required: "Message cannot be blank!",
                    noSpace: "Write something!",
                    minlength: "Message should not be less then 20 characters!"
                }
            }
        })
    }
})
