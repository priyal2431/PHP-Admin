<?php
include('index.php');
?>

<script src="validation.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

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
                        <input type="text" class="form-control" id="addProductName" name="addProductName" data-validation="required alpha">
                        <span class="text-danger" id="addProductNameError"></span>
                    </div>
                    <div class="mb-3">
                        <label for="addProductDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" id="addProductDescription" name="addProductDescription" data-validation="required description">
                        <span class="text-danger" id="addProductDescriptionError"></span>
                    </div>
                    <div class="mb-3">
                        <label for="addProductPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="addProductPrice" name="addProductPrice" data-validation="required numeric min" data-min="1">
                        <span class="text-danger" id="addProductPriceError"></span>
                    </div>
                    <div class="mb-3">
                        <label for="addProductDiscount" class="form-label">Discount (%)</label>
                        <input type="number" class="form-control" id="addProductDiscount" name="addProductDiscount" data-validation="required numeric min max" data-min="0" data-max="100">
                        <span class="text-danger" id="addProductDiscountError"></span>
                    </div>
                    <div class="mb-3">
                        <label for="addProductStock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="addProductStock" name="addProductStock" data-validation="required numeric min" data-min="1">
                        <span class="text-danger" id="addProductStockError"></span>
                    </div>

                    <input type="submit" class="btn btn-outline-primary" value="Add Product" id="addProductForm">

                </form>
            </div>
        </div>
    </div>
</div>



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
</style>

<div class=" col-11">
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
                <button type="submit" id="addProductBtn" class="btn btn-primary">Add Product</button>
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


<script>
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

        //document.getElementById('addProductForm').reset();


        const myModal = new bootstrap.Modal(document.getElementById('addProductModal'));
        myModal.show();
    });

    // document.getElementById('addProductForm').addEventListener('submit', function(e) {
    //     e.preventDefault();

    //     const newProduct = {
    //         name: document.getElementById('addProductName').value,
    //         description: document.getElementById('addProductDescription').value,
    //         price: parseFloat(document.getElementById('addProductPrice').value),
    //         discount: parseFloat(document.getElementById('addProductDiscount').value),
    //         stock: parseInt(document.getElementById('addProductStock').value),
    //         status: 'Active'
    //     };

    //     products.push(newProduct);
    //     renderProducts();

    //     const myModal = bootstrap.Modal.getInstance(document.getElementById('addProductModal'));
    //     myModal.hide();
    // });

    renderProducts();
</script>