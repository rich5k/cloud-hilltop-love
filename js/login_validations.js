$(document).ready(function(){
    $(".next").click(function(){
        var logForm=$("#msform");

        logForm.validate({
            errorElement: 'span',
            errorClass: 'help-block',
            highlight: function(element,errorClass,validClass){
                $(element).closest('.form-group').addClass("has-error");
            },
            unhighlight: function(element,errorClass,validClass){
                $(element).closest('.form-group').removeClass("has-error");
            },
            rules: {
                email: {
                    required: true,
                },
                password: {
                    required: true,
                },

            },
            messages: {
                email: {
                    required: "Email is required",
                },
                password: {
                    required: "Password required",
                },
            },
        });
        if(logForm.valid() === true){
            return true;
        }
        
    });


});
