<?php include("index.php"); ?>

<script src="validation.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<style>
    .table-container {
        padding: 20px;
    }

    .status-btn {
        border-radius: 10px;
        border: none;
        padding: 8px;
        min-width: 120px;
        font-size: 14px;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .product-img {
        max-height: 100px;
        width: auto;
        border-radius: 5px;
    }

    /* Ensure table is responsive */
    .table-responsive {
        overflow-x: auto;
    }

    /* Custom style for invalid input */
    .is-invalid {
        border-color: #dc3545 !important;
        /* Red border color for invalid fields */
    }

    /* Custom error message styling */
    .is-invalid+div {
        color: #dc3545;
        /* Red color for error messages */
    }

    /* Success state (Optional) */
    .is-valid {
        border-color: #28a745 !important;
        /* Green border for valid fields */
    }

    /* Focus styling for input fields */
    .form-control:focus {
        border-color: #80bdff !important;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        /* Light blue focus border */
    }

    /* Adjust margin when sidebar is open */
    @media (max-width: 992px) {
        .table-container {
            margin-left: 0;
            padding: 10px;
        }
    }
</style>

<div class="col-11">
    <div class="container">
        <!-- Manage Order Section -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2>Manage Order</h2>
            </div>
        </div>

        <!-- Add Order Button (Now Below the Heading) -->
        <div class="row mb-3">
            <div class="col-12 text-start">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOrderModal">Add Order</button>
            </div>
        </div>

        <!-- Table Section -->
        <div class="row">
            <div class="col-12 table-container table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Order ID</th>
                            <th>Full Name</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Price</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Priyal Antala</td>
                            <td>LV X Pharrell Williams Shoes</td>
                            <td><img src="images/beg mm.avif" class="product-img" alt="Product"></td>
                            <td>RS.100000</td>
                            <td>2025-02-10</td>
                            <td><button class="status-btn btn-danger">Not Delivered</button></td>
                            <td><button class="status-btn btn-success">Payment Done</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Shihans Patel</td>
                            <td>LV X Pharrell Williams Shoes</td>
                            <td><img src="images/soe1.avif" class="product-img" alt="Product"></td>
                            <td>RS.108900</td>
                            <td>2025-02-11</td>
                            <td><button class="status-btn btn-success">Delivered</button></td>
                            <td><button class="status-btn btn-danger">Payment Pending</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Shubham Desai</td>
                            <td>LV X Pharrell Williams Shoes</td>
                            <td><img src="images/jacket1.avif" class="product-img" alt="Product"></td>
                            <td>RS.800000</td>
                            <td>2025-02-12</td>
                            <td><button class="status-btn btn-success">Delivered</button></td>
                            <td><button class="status-btn btn-success">Payment Done</button></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Shivam Patel</td>
                            <td>LV X Pharrell Williams Shoes</td>
                            <td><img src="images/men-wallet.avif" class="product-img" alt="Product"></td>
                            <td>RS.50000</td>
                            <td>2025-02-13</td>
                            <td><button class="status-btn btn-danger">Not Delivered</button></td>
                            <td><button class="status-btn btn-danger">Payment Pending</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Order Modal -->
        <div class="modal fade" id="addOrderModal" tabindex="-1" aria-labelledby="addOrderModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addOrderModalLabel">Add Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addOrderForm">
                            <div class="mb-3">
                                <label for="orderId" class="form-label">Order ID</label>
                                <input type="text" class="form-control" id="orderId" name="orderId" data-validation="required alphanumeric">
                                <span class="text-danger" id="orderIdError"></span>
                            </div>
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" data-validation="required alpha">
                                <span class="text-danger" id="fullNameError"></span>
                            </div>
                            <div class="mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="productName" data-validation="required alpha">
                                <span class="text-danger" id="productNameError"></span>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price" data-validation="required numeric">
                                <span class="text-danger" id="priceError"></span>
                            </div>
                            <div class="mb-3">
                                <label for="orderDate" class="form-label">Order Date</label>
                                <input type="date" class="form-control" id="orderDate" name="orderDate" data-validation="required">
                                <span class="text-danger" id="orderDateError"></span>
                            </div>
                            <div class="mb-3">
                                <label for="orderStatus" class="form-label">Order Status</label>
                                <select class="form-control" id="orderStatus" name="orderStatus" data-validation="required">
                                    <option value="">Select Status</option>
                                    <option value="Not Delivered">Not Delivered</option>
                                    <option value="Delivered">Delivered</option>
                                </select>
                                <span class="text-danger" id="orderStatusError"></span>
                            </div>
                            <div class="mb-3">
                                <label for="paymentStatus" class="form-label">Payment Status</label>
                                <select class="form-control" id="paymentStatus" name="paymentStatus" data-validation="required">
                                    <option value="">Select Payment Status</option>
                                    <option value="Payment Pending">Payment Pending</option>
                                    <option value="Payment Done">Payment Done</option>
                                </select>
                                <span class="text-danger" id="paymentStatusError"></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS (Required for Modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</div>

<!-- Bootstrap JS (Required for Modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</div>

<!-- Include jQuery and jQuery Validation Script -->
<script src=""></script>

<script>
    $(document).ready(function() {
        // Initialize form validation
        $('#editProfileForm').validate({
            rules: {
                editFullName: {
                    required: true,
                    minlength: 3
                },
                editEmail: {
                    required: true,
                    email: true
                }
            },
            messages: {
                editFullName: {
                    required: "Full Name is required",
                    minlength: "Your name must be at least 3 characters long"
                },
                editEmail: {
                    required: "Email is required",
                    email: "Please enter a valid email"
                }
            },
            errorClass: "is-invalid", // Custom error class for invalid fields
            errorElement: "div", // Error messages as div
            highlight: function(element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function(element) {
                $(element).removeClass("is-invalid");
            }
        });
    });
</script>