$(function(){
    var $registerForm = $("#formContact")
    $.validator.addMethod("noSpace", function(value, element){
        return value == '' || value.trim().length != 0
    }, "Spaces are not allowed!")

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
      }, "Letters only please"); 

    if($registerForm.length){
        $registerForm.validate({
            rules:{
                fname:{
                    required: true,
                    noSpace: true,
                    lettersonly: true
                },
                email: {
                    required: true,
                    email: true,
                },

                comment: {
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
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                var name =$("#name").val();
                var email =$("#email").val();
                var message =$("#message").val();
                var response = document.getElementById("msg");    
                
                $.ajax({
                    url:'http://localhost/Tehnologii_Web/db/submit_con.php',
                    type: 'POST',
                    cache: false,
                    data: {'name':name, 'email':email, 'message': message},
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
