/* global $ , alert , console */
$(function() {
    'use strict';

    // setting error statues
    var usererro = true,
        emailerror = true,
        msgerror = true;


    $('.username').blur(function() {
        if ($(this).val().length <= 3) { // show errors
            $(this).css('border', '1px solid red');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.astrics').fadeIn(200);
            usererro = true;
        } else { // no errors
            $(this).css('border', '1px solid #1AF')
            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).parent().find('.astrics').fadeOut(200);
            usererro = false;
        }
    });

    $('.email').blur(function() { // show errors
        if ($(this).val() === '') {
            $(this).css('border', '1px solid red');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.astrics').fadeIn(200);
            emailerror = true;
        } else { // no errors
            $(this).css('border', '1px solid #1AF')
            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).parent().find('.astrics').fadeOut(200);
            emailerror = false;
        }
    });

    $('.message').blur(function() { // show errors
        if ($(this).val().length < 11) {
            $(this).css('border', '1px solid red');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.astrics').fadeIn(200);
            msgerror = true;
        } else { // no erros
            $(this).css('border', '1px solid #1AF')
            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).parent().find('.astrics').fadeOut(200);
            msgerror = false;
        }
    });

    // submit form validation
    $('.content-form').submit(function(e) {
        if (usererro == true || emailerror == true || msgerror == true) {
            e.preventDefault();
            $('.username , .email , .message ').blur();
        }

    });
});