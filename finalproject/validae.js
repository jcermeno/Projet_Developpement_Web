$(document).ready(function() {
   
    $("#username").blur(function() {
        var username = $(this).val();

       
        if (username.length < 8) {
            $("#username_error").text("Username must be at least 8 characters long.");
            return;
        }

      
        $.ajax({
            url: 'php/check_username.php',
            type: 'post',
            data: {
                'username_check': 1,
                'username': username,
            },
            success: function(response) {
                if (response == 'exists') {
                    $("#username_error").text("Username already exists!");
                } else {
                    $("#username_error").text("");
                }
            }
        });
    });

    
    $("#password, #confirm_password").blur(function() {
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();

      
        if (password.length < 8) {
            $("#password_error").text("Password must be at least 8 characters long.");
            return;
        } else {
            $("#password_error").text("");
        }

     
        if (password !== confirm_password) {
            $("#confirm_password_error").text("Passwords do not match.");
        } else {
            $("#confirm_password_error").text("");
        }
    });
});
