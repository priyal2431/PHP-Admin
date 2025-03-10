<?php

include('index.php');
?>

<script src="validation.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<style>
    tbody tr:nth-child(odd) {
        background-color: white;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
<div class="col-11">
    <div class="container">
        <!-- Manage Categories Section -->
        <div class="manage-categories-section" style="margin-left: auto; margin-right: auto;">
            <div class="text-center ">
                <h2 class="mb-3">Manage Categories</h2>
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    + Add Category
                </button>
            </div>
        </div>

        <!-- Table Section -->
        <div class="table-section mt-4">
            <div class="card text-center shadow-sm">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Repeatable Table Rows -->
                            <tr>
                                <td>1</td>
                                <td>White Shoes</td>
                                <td><img src="images/soe2.avif" style="width: 100px; height: 100px;"></td>
                                <td>
                                    <button class="status-btn status-active toggle-status btn btn-success btn-sm w-100" data-status="active">
                                        Active
                                    </button>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="action-btn view-btn btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal">
                                            <img src="images/eye.svg" alt=""> View
                                        </button>
                                        <button class="action-btn delete-btn btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            <img src="images/trash.svg" alt=""> Delete
                                        </button>
                                        <button class="action-btn edit-btn btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-image="images/soe2.avif">
                                            <img src="images/pencil-square.svg" alt=""> Edit
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Women's Bag</td>
                                <td><img src="images/beg mm.avif" style="width: 100px; height: 100px;"></td>
                                <td>
                                    <button class="status-btn status-active toggle-status btn btn-success btn-sm w-100" data-status="active">
                                        Active
                                    </button>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="action-btn view-btn btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal">
                                            <img src="images/eye.svg" alt=""> View
                                        </button>
                                        <button class="action-btn delete-btn btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            <img src="images/trash.svg" alt=""> Delete
                                        </button>
                                        <button class="action-btn edit-btn btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-image="images/beg mm.avif">
                                            <img src="images/pencil-square.svg" alt=""> Edit
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Men's Wallet</td>
                                <td><img src="images/men-wallet.avif" style="width: 100px; height: 100px;"></td>
                                <td>
                                    <button class="status-btn status-active toggle-status btn btn-success btn-sm w-100" data-status="active">
                                        Active
                                    </button>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="action-btn view-btn btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal">
                                            <img src="images/eye.svg" alt=""> View
                                        </button>
                                        <button class="action-btn delete-btn btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            <img src="images/trash.svg" alt=""> Delete
                                        </button>
                                        <button class="action-btn edit-btn btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-image="images/men-wallet.avif">
                                            <img src="images/pencil-square.svg" alt=""> Edit
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Category Modal -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addCategoryForm" enctype="multipart/form-data">
                            <!-- Category Name -->
                            <div class="mb-3">
                                <label for="newCategoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="category_name" id="newCategoryName" data-validation="required alpha min max" data-min="3" data-max="50">
                                <span class="text-danger error" id="category_nameError"></span>
                            </div>

                            <!-- Image Upload -->
                            <div class="mb-3">
                                <label for="newCategoryImage" class="form-label">Image URL</label>
                                <input type="file" class="form-control" name="category_image" id="newCategoryImage" data-validation="required file">
                                <span class="text-danger error" id="category_imageError"></span>
                            </div>

                            <!-- Status Dropdown -->
                            <div class="mb-3">
                                <label for="categoryStatus" class="form-label">Status</label>
                                <select class="form-select" name="category_status" id="categoryStatus" data-validation="required">
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <span class="text-danger error" id="category_statusError"></span>
                            </div>

                            <input type="submit" class="btn btn-primary w-70" id="submitCategoryForm" value="Add Category">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editCategoryForm">
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" required>
                            </div>
                            <div class="mb-3">
                                <label for="categoryImage" class="form-label">Image URL</label>
                                <input type="url" class="form-control" id="categoryImage" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Are you sure you want to delete this category?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="deleteCategoryBtn">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>