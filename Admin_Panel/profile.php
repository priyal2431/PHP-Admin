<?php include('index.php'); ?>

<script src="validation.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>  

<div class="col-11">
    <div class="container my-4">
        <div class="row">
            <div class="col-xxl-9" style="margin: auto;">
                <div class="card text-center shadow-sm border-light">
                    <div class="card-body">
                        <img src="images/priyal.jpg" alt="Profile Image" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover; border: 4px solid green;">
                        <h5 class="card-title mb-1" id="profileFullName">Priyal</h5>
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
                                    <input type="text" class="form-control" id="editFullName" name="editFullName" data-validation="required alpha">
                                    <span class="text-danger" id="editFullNameError"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="editEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="editEmail" name="editEmail" data-validation="required email">
                                    <span class="text-danger" id="editEmailError"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="editPhone" class="form-label">Phone No</label>
                                    <input type="text" class="form-control" id="editPhone" name="editPhone" data-validation="required phone" pattern="^[6-9]\d{9}$">
                                    <span class="text-danger" id="editPhoneError"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="editGender" class="form-label">Gender</label>
                                    <select class="form-select" id="editGender" name="editGender" data-validation="required">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <span class="text-danger" id="editGenderError"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="editAddress" class="form-label">Address</label>
                                    <textarea class="form-control" id="editAddress" name="editAddress" rows="3" data-validation="required min" data-min="10"></textarea>
                                    <span class="text-danger" id="editAddressError"></span>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap & jQuery -->




</body>

</html>