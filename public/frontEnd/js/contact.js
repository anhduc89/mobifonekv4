$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                name: {
                    required: "Vui lòng nhập tên của bạn",
                    minlength: "Nhiều hơn  2 ký tự"
                },
                subject: {
                    required: "Vui lòng nhập số điện thoại của bạn",
                    minlength: "Nhiều hơn  4 ký tự"
                },
                number: {
                    required: "Vui lòng nhập số điện thoại của bạn",
                    minlength: "Nhiều hơn  5 ký tự"
                },
                email: {
                    required: "Vui lòng nhập email của bạn"
                },
                message: {
                    required: "Vui lòng nhập lời nhắn của bạn đến chúng tôi",
                    minlength: "Nhiều hơn  20 ký tự"
                }
            },
            submitHandler: function(form) {
                $(form).submit();

                // ajax submit

                // $(form).ajaxSubmit({
                //     type:"POST",
                //     data: $(form).serialize(),
                //     url:"contact_process.php",
                //     success: function() {
                //         $('#contactForm :input').attr('disabled', 'disabled');
                //         $('#contactForm').fadeTo( "slow", 1, function() {
                //             $(this).find(':input').attr('disabled', 'disabled');
                //             $(this).find('label').css('cursor','default');
                //             $('#success').fadeIn()
                //             $('.modal').modal('hide');
		        //         	$('#success').modal('show');
                //         })
                //     },
                //     error: function() {
                //         $('#contactForm').fadeTo( "slow", 1, function() {
                //             $('#error').fadeIn()
                //             $('.modal').modal('hide');
		        //         	$('#error').modal('show');
                //         })
                //     }
                // })
            }
        })
    })
        
 })(jQuery)
})