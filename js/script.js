var current_fs, next_fs, previous_fs; //fieldsets-3
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(document).ready(function(){

	// Custom method to validate username
	$.validator.addMethod("usernameRegex", function(value, element) {
		return this.optional(element) || /^[a-zA-Z0-9]*$/i.test(value);
	}, "Username must contain only letters, numbers");

	$(".next").click(function(){
		var form = $("#msform");
		form.validate({
			errorElement: 'span',
			errorClass: 'help-block',
			highlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').addClass("has-error");
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').removeClass("has-error");
			},
			rules: {
				email: {
					required: true,
					minlength: 6,
				},
				password : {
					required: true,
				},
				cpass : {
					required: true,
					equalTo: '#password',
				},
				fname:{
					required: true,
				},
				lname:{
					required: true,
				},
				phone: {
					required: true,
					minlength: 10,
				},
				dob:{
					required: true,
				},
				username: {
					required: true,
					minlength: 6,
				},
				gender: {
					required: true,
				},
				sexual_orient: {
					required: true,
				},
				filefield: {
					required:true,
					extension: "png|jpeg|jpg",
					minlength:2,
					
				},
				
				
			},
			messages: {
				email: {
					required: "Email required",
				},
				password : {
					required: "Password required",
				},
				cpass : {
					required: "Password required",
					equalTo: "Password don't match",
				},
				fname:{
					required: "please add your firstname",
				},
				lname:{
					required: "please add your lastname",
				},
				phone: {
					required: "phone number required",
				},
				dob:{
					required: "select your date of birth",
				},
				username: {
					required: "Username required",
					
				},
				gender: {
					required: "gender required",
				},
				sexual_orient: {
					required: "sexual orientation required",
				},
				filefield: {
					required:"select picture here of type png:jpeg|jpg ",
					extension: "please select pictures of type png:jpeg|jpg",
					minlength:"Select a minimum of two pictures",
					
				},
				
				
				
			}
		});
		if (form.valid() === true){
			

			if($('#userdetails').is(":visible")){
				current_fs=$('#userdetails');
				next_fs=$('#personal_details');

			}else if ($('#personal_details').is(":visible")){
				current_fs=$('#personal_details');
				next_fs=$('#social_details');
			}

			//activate next step on progressbar using the index of next_fs
			$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

			next_fs.show();
			//current_fs.hide();
			//hide the current fieldset with style
			current_fs.animate({opacity: 0}, {
				step: function(now, mx) {
					//as the opacity of current_fs reduces to 0 - stored in "now"
					//1. scale current_fs down to 80%
					scale = 1 - (1 - now) * 0.2;
					//2. bring next_fs from the right(50%)
					left = (now * 50)+"%";
					//3. increase opacity of next_fs to 1 as it moves in
					opacity = 1 - now;
					current_fs.css({
						'transform': 'scale('+scale+')',
						'position': 'absolute'
					});
					next_fs.css({'left': left, 'opacity': opacity});
				},
				duration: 800,
				complete: function(){
					current_fs.hide();
					animating = false;
				},
				//this comes from the custom easing plugin
				easing: 'easeInOutBack'
			});
		}
	});

	

	$(".previous").click(function(){
		if(animating) return false;
		animating = true;
		
		//current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();
		
		
		
		
		//show the previous fieldset
		//previous_fs.show(); 
		//hide the current fieldset with style
		
		if($('#personal_details').is(":visible")){
			current_fs = $('#personal_details');
			next_fs = $('#userdetails');
		}else if ($('#social_details').is(":visible")){
			current_fs = $('#social_details');
			next_fs = $('#personal_details');
		}
		//de-activate current step on progressbar
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

		next_fs.show(); 
		//current_fs.hide();
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale previous_fs from 80% to 100%
				scale = 0.8 + (1 - now) * 0.2;
				//2. take current_fs to the right(50%) - from 0%
				left = ((1-now) * 50)+"%";
				//3. increase opacity of previous_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'left': left});
				previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	});
	
});





$(".submit").click(function(){
	return true
	
});




function preview_image() 
{
 var total_file=document.getElementById("filefield").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<div id=i style='margin-left:25px;'><img src='"+URL.createObjectURL(event.target.files[i])+"' style='width:100px; height:100px;'></div><br>");
 }
}



/*{
	// Specify validation rules
	rules: {
	  // The key name on the left side is the name attribute
	  // of an input field. Validation rules are defined
	  // on the right side
	  fname: "required",
	  lname: "required",
	  phone: "required",
	  dob: "required",
	  username: "required",
	  email: {
		required: true,
		// Specify that email should be validated
		// by the built-in "email" rule
		email: true
	  },
	  password: {
		required: true,
		minlength: 5
	  },



	},
	// Specify validation error messages
	messages: {
	  firstname: "Please enter your firstname",
	  lastname: "Please enter your lastname",
	  password: {
		required: "Please provide a password",
		minlength: "Your password must be at least 5 characters long"
	  },
	  email: "Please enter a valid email address"
	},
	

	// Make sure the form is submitted to the destination defined
	// in the "action" attribute of the form when valid
	submitHandler: function(form) {
	  form.submit();
	}
  }*/