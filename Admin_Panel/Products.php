<?php
include('index.php');
?>

<script src="validation.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<style>
    .size {
        width: 25%;
    }
</style>
<div class="col-11">
    <div class="container p-1">
        <div class="card text-center shadow-sm">
            <h2 class="mb-4 text-center">Product Management</h2>

            <div class="card p-4">
                <button class="btn btn-primary mb-3 size" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="fas fa-plus"></i> Add Product
                </button>
                <h4>Product</h4>
                <div class="table-responsive">
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="shoesProductTableBody">
               </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="productForm">
                            <input type="hidden" id="editIndex" name="editIndex">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="productName" data-validation="required">
                                <span class="text-danger" id="productNameError"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" id="productDesc" name="productDesc" rows="3" data-validation="required description"></textarea>
                                <span class="text-danger" id="productDescError"></span>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Price ($)</label>
                                    <input type="number" class="form-control" id="productPrice" name="productPrice" data-validation="required numeric min" data-min="1">
                                    <span class="text-danger" id="productPriceError"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-control" id="productCategory" name="productCategory" data-validation="required">
                                        <option value="">-- Select Category --</option>
                                        <option value="Women's Bag">Women's Bag</option>
                                        <option value="Men's Wallet">Men's Wallet</option>
                                        <option value="Cloth">Cloth</option>
                                        <option value="Shoes">Shoes</option>
                                    </select>
                                    <span class="text-danger" id="productCategoryError"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Stock Quantity</label>
                                    <input type="number" class="form-control" id="productStock" name="productStock" data-validation="required numeric min" data-min="1">
                                    <span class="text-danger" id="productStockError"></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Product Image</label>
                                <input type="file" class="form-control" id="productImage" name="productImage" data-validation="file">
                                <span class="text-danger" id="productImageError"></span>
                            </div>

                            <input type="submit" class="btn btn-primary w-100" value="Save Product">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>

<!-- <script>
    let shoes = [];
    let wallets = [];
    let cloth = [];
    let womanBags = [];
    let editMode = false;
    let currentCategory = 'shoes';

    function renderProducts() {
        let products;
        let tableBodyId;

        switch (currentCategory) {
            case 'shoes':
                products = shoes;
                tableBodyId = 'shoesProductTableBody';
                break;
            case 'wallets':
                products = wallets;
                tableBodyId = 'walletProductTableBody';
                break;
            case 'cloth':
                products = cloth;
                tableBodyId = 'clothProductTableBody';
                break;
            case 'womanBags':
                products = womanBags;
                tableBodyId = 'womanBagProductTableBody';
                break;
            default:
                products = shoes;
                tableBodyId = 'shoesProductTableBody';
        }

        const tbody = document.getElementById(tableBodyId);
        tbody.innerHTML = "";

        products.forEach((product, index) => {
            tbody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td><img src="${product.image || 'placeholder.jpg'}" width="50" height="50" alt="Product"></td>
                    <td>${product.name}</td>
                    <td>${product.category}</td>
                    <td>$${product.price}</td>
                    <td>${product.stock}</td>
                    <td>
                        <button class="action-btn edit-btn btn btn-outline-warning btn-sm" onclick="editProduct(${index})"><i class="fas fa-edit"></i> Edit</button>
                        <button class="action-btn delete-btn btn btn-outline-danger btn-sm" onclick="deleteProduct(${index})"><i class="fas fa-trash"></i> Delete</button>
                    </td>
                </tr>
            `;
        });
    }

    document.getElementById("productForm").addEventListener("submit", function(event) {
        event.preventDefault();

        const name = document.getElementById("productName").value;
        const description = document.getElementById("productDesc").value;
        const price = document.getElementById("productPrice").value;
        const category = document.getElementById("productCategory").value;
        const stock = document.getElementById("productStock").value;
        const image = document.getElementById("productImage").files[0];

        let imageURL = "placeholder.jpg";
        if (image) {
            imageURL = URL.createObjectURL(image);
        }

        const product = {
            name,
            description,
            price,
            category,
            stock,
            image: imageURL
        };

        if (editMode) {
            const index = document.getElementById("editIndex").value;
            switch (currentCategory) {
                case 'shoes':
                    shoes[index] = product;
                    break;
                case 'wallets':
                    wallets[index] = product;
                    break;
                case 'cloth':
                    cloth[index] = product;
                    break;
                case 'womanBags':
                    womanBags[index] = product;
                    break;
            }
            editMode = false;
        } else {
            switch (currentCategory) {
                case 'shoes':
                    shoes.push(product);
                    break;
                case 'wallets':
                    wallets.push(product);
                    break;
                case 'cloth':
                    cloth.push(product);
                    break;
                case 'womanBags':
                    womanBags.push(product);
                    break;
            }
        }

        document.getElementById("productForm").reset();
        document.getElementById("editIndex").value = "";
        renderProducts();
        var modal = new bootstrap.Modal(document.getElementById("addProductModal"));
        modal.hide();
    });

    function editProduct(index) {
        let products;
        switch (currentCategory) {
            case 'shoes':
                products = shoes;
                break;
            case 'wallets':
                products = wallets;
                break;
            case 'cloth':
                products = cloth;
                break;
            case 'womanBags':
                products = womanBags;
                break;
            default:
                products = shoes;
        }

        const product = products[index];

        document.getElementById("productName").value = product.name;
        document.getElementById("productDesc").value = product.description;
        document.getElementById("productPrice").value = product.price;
        document.getElementById("productCategory").value = product.category;
        document.getElementById("productStock").value = product.stock;
        document.getElementById("editIndex").value = index;

        editMode = true;
        var modal = new bootstrap.Modal(document.getElementById("addProductModal"));
        modal.show();
    }

    function deleteProduct(index) {
        if (confirm("Are you sure you want to delete this product?")) {
            switch (currentCategory) {
                case 'shoes':
                    shoes.splice(index, 1);
                    break;
                case 'wallets':
                    wallets.splice(index, 1);
                    break;
                case 'cloth':
                    cloth.splice(index, 1);
                    break;
                case 'womanBags':
                    womanBags.splice(index, 1);
                    break;
            }
            renderProducts();
        }
    }

</script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>