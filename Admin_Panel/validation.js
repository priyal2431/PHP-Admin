$(document).ready(function () {
    
    function validateField(input) {
        let field = $(input);
        let value = field.val().trim();
        let errorSpan = $("#" + field.attr("name") + "Error");
        let fieldType = field.data("validation") || "";
        let minLength = field.data("min") || 0;
        let maxLength = field.data("max") || 9999;

        let errorMessage = "";

        if (fieldType.includes("required") && value === "") {
            errorMessage = "This field is required.";
        }
        
        else if (fieldType.includes("email") && !/^\S+@\S+\.\S+$/.test(value)) {
            errorMessage = "Enter a valid email.";
        }
        
        else if (fieldType.includes("strongPassword") && !/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/.test(value)) {
            errorMessage = "Password must be at least 8 characters, including uppercase, lowercase, a number, and a special character.";
        }
        
        else if (fieldType.includes("confirmPassword")) {
            let password = $("#" + field.data("password-id")).val().trim();
            if (value !== password) {
                errorMessage = "Passwords do not match.";
            }
        }
        
        else if (fieldType.includes("terms") && !field.is(":checked")) {
            errorMessage = "You must agree to the Terms & Conditions.";
        }
        
        else if (fieldType.includes("alpha") && !/^[A-Za-z\s]+$/.test(value)) {
            errorMessage = "Only letters are allowed.";
        }
        
        else if (fieldType.includes("numeric") && !/^\d+$/.test(value)) {
            errorMessage = "Only numbers are allowed.";
        }
        
        else if (fieldType.includes("min") && value.length < minLength) {
            errorMessage = `Must be at least ${minLength} characters.`;
        }
        
        else if (fieldType.includes("max") && value.length > maxLength) {
            errorMessage = `Must be less than ${maxLength} characters.`;
        }
        else if (fieldType.includes("description") && value.length < 10) {
            errorMessage = "Description must be at least 10 characters long.";
        }

        else if (fieldType.includes("file")) {
            let file = field[0].files[0];
            if (!file) {
                errorMessage = "Please select a file.";
            } else if (!/\.(jpg|jpeg|png)$/i.test(file.name)) {
                errorMessage = "Only JPG, JPEG, or PNG files are allowed.";
            } else if (file.size > 200000) {
                errorMessage = "File size must be less than 200KB.";
            }
        }
        // URL validation (Category Image URL)
        else if (fieldType.includes("url") && !/^(https?:\/\/[^\s]+)/.test(value)) {
            errorMessage = "Enter a valid URL.";
        }

        if (errorMessage) {
            errorSpan.text(errorMessage).show();
            field.addClass("is-invalid").removeClass("is-valid");
        } else {
            errorSpan.text("").hide();
            field.addClass("is-valid").removeClass("is-invalid");
        }
    }

    $("input, select, textarea").on("blur", function () {
        validateField(this);
    });

    $("form").on("submit", function (e) {
        let isValid = true;
        let form = $(this);

        form.find("input, select").each(function () {
            validateField(this);
            if ($(this).hasClass("is-invalid")) {
                isValid = false;
            }
        });

        if (!isValid) {
            e.preventDefault();  
            e.stopPropagation(); 
        } else {
            
        }
    });

    $("#userForm").on("click", function (e) {
        let form = $(this).closest("form");
        let isValid = true;

        form.find("input, select, textarea").each(function () {
            validateField(this);
            if ($(this).hasClass("is-invalid")) {
                isValid = false;
            }
        });
    });
});
