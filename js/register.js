$(document).ready(function() {
    $('#register-form').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'php/register.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
            }
        });
    });
});
