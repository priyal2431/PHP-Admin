<div class="modal" id="addProductModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProductForm">
                    <div class="mb-3">
                        <label for="addProductName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="addProductName" required>
                    </div>
                    <div class="mb-3">
                        <label for="addProductDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" id="addProductDescription" required>
                    </div>
                    <div class="mb-3">
                        <label for="addProductPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="addProductPrice" required>
                    </div>
                    <div class="mb-3">
                        <label for="addProductDiscount" class="form-label">Discount (%)</label>
                        <input type="number" class="form-control" id="addProductDiscount" required>
                    </div>
                    <div class="mb-3">
                        <label for="addProductStock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="addProductStock" required>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('index.php');
?>

<!-- Styles -->
<style>
    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }

    table {
        width: 100%;
    }

    .btn-sm {
        height: 48px;
        width: 110px;
        padding: 8px;
        border-radius: 10px;
    }

    .btn-outline-success {
        border-color: #28a745;
        color: #28a745;
    }

    .btn-outline-success:hover {
        background-color: #28a745;
        color: white;
    }

    .btn-outline-warning {
        border-color: #ffc107;
        color: #ffc107;
    }

    .btn-outline-warning:hover {
        background-color: #ffc107;
        color: white;
    }

    .btn-outline-danger {
        border-color: #dc3545;
        color: #dc3545;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    .table-striped tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .table-striped tbody tr:nth-child(even) {
        background-color: #ffffff;
    }

    .is-invalid {
        border-color: red;
        background-color: #f8d7da;
    }

    .is-valid {
        border-color: green;
        background-color: #d4edda;
    }
</style>

<div class="col-11">
    <div class="container">
        <!-- Manage Order Section -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2>Manage Offers</h2>
            </div>
        </div>

        <!-- Add Product Button -->
        <div class="row mb-4">
            <div class="col-12 text-end">
                <button id="addProductBtn" class="btn btn-outline-success btn-sm">Add Product</button>
            </div>
        </div>

        <div class="row">
            <div class="col-12 table-container table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Discount (%)</th>
                            <th>Final Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="product-table-body"></tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="modal" id="editProductModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm">
                        <div class="mb-3">
                            <label for="editProductName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="editProductName" name="productName">
                        </div>
                        <div class="mb-3">
                            <label for="editProductDescription" class="form-label">Description</label>
                            <input type="text" class="form-control" id="editProductDescription" name="productDescription">
                        </div>
                        <div class="mb-3">
                            <label for="editProductPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="editProductPrice" name="productPrice" min="0" step="0.01">
                        </div>
                        <div class="mb-3">
                            <label for="editProductDiscount" class="form-label">Discount (%)</label>
                            <input type="number" class="form-control" id="editProductDiscount" name="productDiscount" min="0" max="100">
                        </div>
                        <div class="mb-3">
                            <label for="editProductStock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="editProductStock" name="productStock" min="0">
                        </div>
                        <button type="submit" class="btn btn-outline-success">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>

<script>
    $(document).ready(function() {
        $("#editProductForm").validate({
            rules: {
                productName: {
                    required: true,
                    minlength: 3,
                    pattern: /^[A-Za-z0-9\s]+$/ // Fixed regular expression format
                },
                productDescription: {
                    required: true,
                    minlength: 10,
                    pattern: /^[A-Za-z0-9\s,.!?-]+$/ // Fixed regular expression format
                },
                productPrice: {
                    required: true,
                    min: 0,
                    number: true
                },
                productDiscount: {
                    required: true,
                    min: 0,
                    max: 100
                },
                productStock: {
                    required: true,
                    min: 0,
                    number: true
                }
            },
            messages: {
                productName: {
                    required: "Please enter a product name.",
                    minlength: "Product name must be at least 3 characters long.",
                    pattern: "Product name can only contain letters, numbers, and spaces."
                },
                productDescription: {
                    required: "Please provide a product description.",
                    minlength: "Description must be at least 10 characters long.",
                    pattern: "Description can contain letters, numbers, spaces, commas, periods, exclamation marks, and hyphens."
                },
                productPrice: {
                    required: "Please enter a product price.",
                    min: "Price must be a positive value.",
                    number: "Please enter a valid number."
                },
                productDiscount: {
                    required: "Please enter a discount.",
                    min: "Discount must be a positive value.",
                    max: "Discount cannot exceed 100%."
                },
                productStock: {
                    required: "Please enter the stock quantity.",
                    min: "Stock cannot be negative.",
                    number: "Please enter a valid number."
                }
            },
            highlight: function(element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            },
            submitHandler: function(form) {
                // If validation passes, you can add custom submit logic here or just let it submit normally
                form.submit();
            }
        });
    });

    const products = [{
            name: 'shoes',
            description: '',
            price: 1000,
            discount: 10,
            stock: 50,
            status: 'Active'
        },
        {
            name: 'woman bag',
            description: '',
            price: 700,
            discount: 5,
            stock: 100,
            status: 'Active'
        },
        {
            name: 'wallet',
            description: '',
            price: 500,
            discount: 8,
            stock: 75,
            status: 'Active'
        },
        {
            name: 'jacket',
            description: '',
            price: 150,
            discount: 12,
            stock: 150,
            status: 'Active'
        }
    ];

    let currentEditingIndex = null;

    function renderProducts() {
        const tableBody = document.getElementById('product-table-body');
        tableBody.innerHTML = '';
        products.forEach((product, index) => {
            const finalPrice = product.price - (product.price * (product.discount / 100));
            const statusClass = product.status === 'Active' ? 'text-success' : 'text-danger';
            const buttonClass = product.status === 'Active' ? 'btn-outline-danger' : 'btn-outline-success';
            tableBody.innerHTML += `
    <tr>
        <td>${product.name}</td>
        <td>${product.description}</td>
        <td>$${product.price}</td>
        <td>${product.discount}%</td>
        <td>$${finalPrice.toFixed(2)}</td>
        <td>${product.stock}</td>
        <td class="action-buttons">
            <button class="btn btn-outline-warning btn-sm" onclick="editProduct(${index})">Edit</button>
            <button class="btn ${buttonClass} btn-sm" onclick="toggleStatus(${index})">${product.status === 'Active' ? 'Deactivate' : 'Activate'}</button>
            <button class="btn btn-outline-danger btn-sm" onclick="deleteProduct(${index})">Delete</button>
        </td>
        <td id="status-${index}" class="${statusClass} fw-bold">${product.status}</td>
    </tr>`;
        });
    }

    function toggleStatus(index) {
        products[index].status = products[index].status === 'Active' ? 'Inactive' : 'Active';
        renderProducts();
    }

    function deleteProduct(index) {
        if (confirm('Are you sure you want to delete this product?')) {
            products.splice(index, 1);
            renderProducts();
        }
    }

    function editProduct(index) {
        const product = products[index];
        currentEditingIndex = index;
        document.getElementById('editProductName').value = product.name;
        document.getElementById('editProductDescription').value = product.description;
        document.getElementById('editProductPrice').value = product.price;
        document.getElementById('editProductDiscount').value = product.discount;
        document.getElementById('editProductStock').value = product.stock;

        const myModal = new bootstrap.Modal(document.getElementById('editProductModal'));
        myModal.show();
    }

    document.getElementById('editProductForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const updatedProduct = {
            name: document.getElementById('editProductName').value,
            description: document.getElementById('editProductDescription').value,
            price: parseFloat(document.getElementById('editProductPrice').value),
            discount: parseFloat(document.getElementById('editProductDiscount').value),
            stock: parseInt(document.getElementById('editProductStock').value),
            status: 'Active'
        };

        products[currentEditingIndex] = updatedProduct;
        renderProducts();

        const myModal = bootstrap.Modal.getInstance(document.getElementById('editProductModal'));
        myModal.hide();
    });

    document.getElementById('addProductBtn').addEventListener('click', function() {

        document.getElementById('addProductForm').reset();


        const myModal = new bootstrap.Modal(document.getElementById('addProductModal'));
        myModal.show();
    });

    document.getElementById('addProductForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const newProduct = {
            name: document.getElementById('addProductName').value,
            description: document.getElementById('addProductDescription').value,
            price: parseFloat(document.getElementById('addProductPrice').value),
            discount: parseFloat(document.getElementById('addProductDiscount').value),
            stock: parseInt(document.getElementById('addProductStock').value),
            status: 'Active'
        };

        products.push(newProduct);
        renderProducts();

        const myModal = bootstrap.Modal.getInstance(document.getElementById('addProductModal'));
        myModal.hide();
    });

    renderProducts();
</script>