<?php
$host = 'localhost';
$db = 'admin_panel';
$user = 'root';
$pass = '';

?>
<script src="validation.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<style>
    .user-img {
        width: 2rem;
        height: 2rem;
        object-fit: cover;
        border-radius: 50%;
        display: block;
        margin: 0 auto;
    }

    .table td,
    .table th {
        text-align: center;
        vertical-align: middle;
    }

    .btn-group .btn {
        min-width: 70px;
    }
</style>

<?php include('index.php'); ?>
<div class="col-11">
    <div class="container">
        <div class="row my-4">
            <div class="col-12 text-center ">
                <h2 class="mb-4">Manage Users</h2>
                <div class="d-flex justify-content-between">
                    <form class="d-flex" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search" name="query" id="searchInput">
                        <button class="btn btn-dark" type="submit">Search</button>
                    </form>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">+ Add User</button>
                </div>
            </div>
        </div>

        <?php
        $host = 'localhost';
        $db = 'admin_panel';
        $user = 'root';
        $pass = '';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->query("SELECT * FROM users");
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
        ?>

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="userTable">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>User Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr id="userRow<?= $user['id'] ?>" class="<?= $user['status'] === 'Active' ? 'bg-white' : 'bg-lightgray' ?>">
                                    <td><?= $user['id'] ?></td>
                                    <td>
                                        <img src="<?= $user['image'] ?: 'images/default.png' ?>" alt="User Image" class="user-img">
                                    </td>
                                    <td><?= $user['name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['password'] ?></td>
                                    <td><?= $user['mobile'] ?: 'N/A' ?></td>
                                    <td>
                                        <button class="btn <?= $user['status'] === 'Active' ? 'btn-success' : 'btn-secondary' ?> btn-sm w-100 statusBtn"
                                            onclick="toggleStatus(<?= $user['id'] ?>, this)">
                                            <?= $user['status'] ?>
                                        </button>
                                    </td>
                                    <td><?= $user['type'] ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-outline-warning btn-sm" onclick="editUser(<?= $user['id'] ?>)">Edit</button>
                                            <button class="btn btn-outline-danger btn-sm" onclick="deleteUser(<?= $user['id'] ?>)">Delete</button>
                                            <button class="btn btn-outline-info btn-sm" onclick="viewUser(<?= $user['id'] ?>)">View</button>
                                            <button class="btn btn-outline-primary btn-sm" onclick="addToCart(<?= $user['id'] ?>)">Cart</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php
        // Close the database connection
        $pdo = null;
        ?>

    </div>


    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm" enctype="multipart/form-data">
                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="addName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" id="addName"
                                data-validation="required alpha min max" data-min="3" data-max="50">
                            <span class="text-danger error" id="nameError"></span>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="addEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="addEmail"
                                data-validation="required email">
                            <span class="text-danger error" id="emailError"></span>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="addPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="addPassword"
                                data-validation="required strongPassword min max" data-min="8" data-max="15">
                            <span class="text-danger error" id="passwordError"></span>
                        </div>

                        <!-- Mobile -->
                        <div class="mb-3">
                            <label for="addMobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" name="mobile" id="addMobile"
                                data-validation="required numeric min max" data-min="10" data-max="10">
                            <span class="text-danger error" id="mobileError"></span>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="addStatus" class="form-label">Status</label>
                            <select class="form-select" name="status" id="addStatus" data-validation="required">
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            <span class="text-danger error" id="statusError"></span>
                        </div>

                        <!-- User Type -->
                        <div class="mb-3">
                            <label for="addUserType" class="form-label">User Type</label>
                            <select class="form-select" name="user_type" id="addUserType" data-validation="required">
                                <option value="">Select User Type</option>
                                <option value="Admin">Admin</option>
                                <option value="Normal User">Normal User</option>
                            </select>
                            <span class="text-danger error" id="userTypeError"></span>
                        </div>

                        <!-- Profile Image -->
                        <div class="mb-3">
                            <label for="addImage" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" name="image" id="addImage"
                                data-validation="required file">
                            <span class="text-danger error" id="imageError"></span>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" id="submitUserForm" value="Add User">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="editName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="editMobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="editMobile" required>
                        </div>
                        <div class="mb-3">
                            <label for="editStatus" class="form-label">Status</label>
                            <select class="form-select" id="editStatus" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveUserChanges()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View User Modal -->
    <div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewUserModalLabel">View User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="viewName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="viewName" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="viewEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="viewEmail" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="viewMobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="viewMobile" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="viewStatus" class="form-label">Status</label>
                        <input type="text" class="form-control" id="viewStatus" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add to Cart Modal -->
    <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addToCartModalLabel">Add to Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addToCartForm">
                        <div class="mb-3">
                            <label for="cartName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="cartName">
                        </div>
                        <div class="mb-3">
                            <label for="cartEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="cartEmail" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="cartMobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="cartMobile" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="cartStatus" class="form-label">Status</label>
                            <input type="text" class="form-control" id="cartStatus" disabled>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addUserToCart()">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>