$(document).ready(function () {

    wow = new WOW({
            mobile: false,       // default
        }
    )
    wow.init();

    $('#top-nav').onePageNav({
        currentClass: 'current',
        changeHash: true,
        scrollSpeed: 1200
    });


    //animated header class
    $(window).scroll(function () {
        if ($(window).scrollTop() > 100) {
            $(".navbar-default").addClass("animated");
        } else {
            $(".navbar-default").removeClass('animated');
        }
    });

    /*$('input, textarea').data('holder', $('input, textarea').attr('placeholder'));

    $('input, textarea').focusin(function () {
        $(this).attr('placeholder', '');
    });
    $('input, textarea').focusout(function () {
        $(this).attr('placeholder', $(this).data('holder'));
    });*/

    //contact form validation
    $("#contact-form").validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            message: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            name: {
                required: "Please enter Your Name",
                minlength: "Your name must consist of at least 2 characters"
            },
            message: {
                required: "Please Write Something",
                minlength: "Your message must consist of at least 2 characters"
            },
            email: "Please enter a valid email address"
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                type: "POST",
                data: $(form).serialize(),
                url: "http://localhost/Adroit_Web/landing/message",
                success: function () {
                    $('#contact-form :input').attr('disabled', 'disabled');
                    $('#contact-form').fadeTo("slow", 0.15, function () {
                        $(this).find(':input').attr('disabled', 'disabled');
                        $(this).find('label').css('cursor', 'default');
                        $('#success').fadeIn();
                    });
                    swal("Thanks!", "Your message sent successfully", "success");
                },
                error: function () {
                    $('#contact-form').fadeTo("slow", 0.15, function () {
                        $('#error').fadeIn();
                        swal("Sorry!", "Your message not delivered successfully, please try again", "error");
                    });
                }
            });
        }
    });

    $("#subscribe").validate({
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                type: "POST",
                data: $(form).serialize(),
                url: "http://localhost/Adroit_Web/landing/subscribe",
                success: function () {
                    swal("Thanks!", "Your message sent successfully", "success");
                },
                error: function () {
                    swal("Sorry!", "Your message not delivered successfully, please try again", "error");
                }
            });
        }
    });
});