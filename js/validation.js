$(document).ready(function(){
    var error_name = false
    var error_email = false
    var error_message = false
    var error_service = false
    $("#contactValidation").validate({
       debug:true,
       rules:{
            name:{
                required:true
            },
            email:{
                required:true,
                email:true,
                accept:"[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}" 
            },
            message:{
                required:true
            },
            service:{
                required:true
            }
       },
       messages:{
            name:{
                required:"Please enter your name"
            },
            email:{
                required:"Please enter your name",
                email: "Please enter a valide email"
            },
            message:{
                required:"Please write your message"
            },
            service:{
                required:"Please choose a service"
            }
       }
    })
})