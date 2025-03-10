<?php include('index.php'); ?>

<div class="col-11">
    <div class="container my-4">
        <div class="row">
            <div class="col-xxl-9" style="margin: auto;">
                <div class="card text-center shadow-sm border-light">
                    <div class="card-body">
                        <img src="images/blackfulldress.avif" alt="Profile Image" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover; border: 4px solid green;">
                        <h5 class="card-title mb-1" id="profileFullName">Shihans</h5>
                        <p class="text-muted" id="profileRole">Web Developer</p>
                        <div class="d-flex justify-content-center mt-4">
                            <div class="p-2 rounded">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-light">
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-3">Profile Details</h5>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-bold">Full Name</label>
                            <div class="col-sm-8">
                                <p class="form-control-plaintext" id="profileFullName">Priyal Jayantibhai Antala</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-bold">Email</label>
                            <div class="col-sm-8">
                                <p class="form-control-plaintext" id="profileEmail">Priyal07@admin.com</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-bold">Phone No</label>
                            <div class="col-sm-8">
                                <p class="form-control-plaintext" id="profilePhone">123 456 7890</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-bold">Gender</label>
                            <div class="col-sm-8">
                                <p class="form-control-plaintext" id="profileGender">Male</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-bold">Address</label>
                            <div class="col-sm-8">
                                <p class="form-control-plaintext" id="profileAddress">Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Profile Modal -->
            <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editProfileForm">
                                <div class="mb-3">
                                    <label for="editFullName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="editFullName" name="editFullName">
                                </div>
                                <div class="mb-3">
                                    <label for="editEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="editEmail" name="editEmail">
                                </div>
                                <div class="mb-3">
                                    <label for="editPhone" class="form-label">Phone No</label>
                                    <input type="text" class="form-control" id="editPhone" name="editPhone">
                                </div>
                                <div class="mb-3">
                                    <label for="editGender" class="form-label">Gender</label>
                                    <select class="form-select" id="editGender" name="editGender">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="editAddress" class="form-label">Address</label>
                                    <textarea class="form-control" id="editAddress" name="editAddress" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-outline-primary" data-bs-dismiss="modal">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap & jQuery -->


<script>
    $(document).ready(function() {

        if (localStorage.getItem('profileData')) {
            let profileData = JSON.parse(localStorage.getItem('profileData'));
            $('#profileFullName').text(profileData.fullName);
            $('#profileEmail').text(profileData.email);
            $('#profilePhone').text(profileData.phone);
            $('#profileGender').text(profileData.gender);
            $('#profileAddress').text(profileData.address);
        }

        $('#editProfileForm').validate({
            rules: {
                editFullName: {
                    required: true,
                    minlength: 3,
                    maxlength: 50,
                    pattern: /^[A-Za-z\s]+$/
                },
                editEmail: {
                    required: true,
                    email: true
                },
                editPhone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                    pattern: /^[0-9]{10}$/
                },
                editGender: {
                    required: true
                },
                editAddress: {
                    required: true,
                    minlength: 5,
                    maxlength: 255
                }
            },
            messages: {
                editFullName: {
                    required: "Full Name is required.",
                    minlength: "Must be at least 3 characters.",
                    maxlength: "Cannot exceed 50 characters.",
                    pattern: "Only letters and spaces allowed."
                },
                editEmail: {
                    required: "Email is required.",
                    email: "Enter a valid email (e.g., user@example.com)."
                },
                editPhone: {
                    required: "Phone number is required.",
                    digits: "Only numbers allowed.",
                    minlength: "Phone must be 10 digits.",
                    maxlength: "Phone must be 10 digits.",
                    pattern: "Enter a valid 10-digit number."
                },
                editGender: {
                    required: "Please select a gender."
                },
                editAddress: {
                    required: "Address is required.",
                    minlength: "Must be at least 5 characters.",
                    maxlength: "Cannot exceed 255 characters."
                }
            },
            errorClass: "is-invalid",
            errorElement: "div",
            highlight: function(element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function(element) {
                $(element).removeClass("is-invalid");
            },
            submitHandler: function(form) {
                var profileData = {
                    fullName: $('#editFullName').val(),
                    email: $('#editEmail').val(),
                    phone: $('#editPhone').val(),
                    gender: $('#editGender').val(),
                    address: $('#editAddress').val()
                };

                localStorage.setItem('profileData', JSON.stringify(profileData));

                $('#profileFullName').text(profileData.fullName);
                $('#profileEmail').text(profileData.email);
                $('#profilePhone').text(profileData.phone);
                $('#profileGender').text(profileData.gender);
                $('#profileAddress').text(profileData.address);

                $('#editProfileModal').modal('hide');
                alert("Profile updated successfully!");
            }
        });

        $.validator.addMethod("pattern", function(value, element, param) {
            return this.optional(element) || param.test(value);
        }, "Invalid input format.");
    });
</script>

</body>

</html>