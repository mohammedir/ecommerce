$(function () {
    'use strict';
    // Hid text Placeholder
    $('[placeholder]').focus(function () {
        $(this).attr('text', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    }).blur(function () {
        $(this).attr('placeholder', $(this).attr('text'));
    });
});