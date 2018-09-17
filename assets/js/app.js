/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.scss in this case)
require('../css/app.scss');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');

require('bootstrap');
//require('bootstrap-datepicker');


$(document).ready(function() {
    $('[data-toggle="popover"]').popover();

    $('.js-datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
});

var $terminal = $('#taxi_booking_airport');
// When airport gets selected ...
$terminal.change(function() {
    // ... retrieve the corresponding form.
    var $form = $(this).closest('form');
    // Simulate form data, but only include the selected airport value.
    var data = {};
    data[$terminal.attr('name')] = $terminal.val();
    // Submit data via AJAX to the form's action path.
    $.ajax({
        url : $form.attr('action'),
        type: $form.attr('method'),
        data : data,
        success: function(html) {
            // Replace current terminal field ...
            $('#taxi_booking_terminal').replaceWith(
                // ... with the returned one from the AJAX response.
                $(html).find('#taxi_booking_terminal')
            );
            // Terminal field now displays the appropriate terminals.
        }
    });
});
