$(document).ready(function() {
    $('#registerForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        // Get form data
        var formData = $(this).serialize();

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: 'php/register.php',
            data: formData,
            success: function(response) {
                alert(response); // Display response message
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error message
            }
        });
    });
});