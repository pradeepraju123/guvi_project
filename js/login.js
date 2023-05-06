
$(document).ready(function() {
    $('#loginForm').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'php/login.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
            }
        });
    });
});