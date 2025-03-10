<?php
include('index.php');
?>

<script src="validation.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<style>
    .table .btn {
        height: 48px;
        width: 70px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .table .action-buttons {
        display: flex;
        justify-content: center;
        gap: 5px;
    }

    .table td {
        vertical-align: middle;
    }
</style>
<div class="col-11">
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header text-center">
                <h2 class="mb-0">Received Inquiries</h2>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search Inquiries..." onkeyup="searchInquiries()">
                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addInquiryModal">Add Inquiry</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Received On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="inquiryTable">
                            <tr>
                                <td>1</td>
                                <td>Priyal Antala</td>
                                <td>priyal24@gmail.com</td>
                                <td>Order Issue</td>
                                <td>My order has not arrived yet.</td>
                                <td><span class='badge bg-danger'>Pending</span></td>
                                <td>31 Jan 2025, 10:30 AM</td>
                                <td class="action-buttons">
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-outline-info" onclick="viewInquiry(this)">
                                            <i class='fas fa-eye'></i> View
                                        </button>
                                        <button class="btn btn-outline-danger" onclick="updateStatus(this, 'Pending')">Pending</button>
                                        <button class="btn btn-outline-warning" onclick="updateStatus(this, 'Process')">Process</button>
                                        <button class="btn btn-outline-success" onclick="updateStatus(this, 'Done')">Done</button>
                                        <button class="btn btn-outline-danger" onclick="deleteInquiry(this)">
                                            <i class='fas fa-trash'></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Shubham Desai</td>
                                <td>Subham12@gmail.com</td>
                                <td>Order Issue</td>
                                <td>My order has not arrived yet.</td>
                                <td><span class='badge bg-danger'>Pending</span></td>
                                <td>31 Jan 2025, 10:30 AM</td>
                                <td class="action-buttons">
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-outline-info" onclick="viewInquiry(this)">
                                            <i class='fas fa-eye'></i> View
                                        </button>
                                        <button class="btn btn-outline-danger" onclick="updateStatus(this, 'Pending')">Pending</button>
                                        <button class="btn btn-outline-warning" onclick="updateStatus(this, 'Process')">Process</button>
                                        <button class="btn btn-outline-success" onclick="updateStatus(this, 'Done')">Done</button>
                                        <button class="btn btn-outline-danger" onclick="deleteInquiry(this)">
                                            <i class='fas fa-trash'></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Shihans</td>
                                <td>shihans24@gmail.com</td>
                                <td>Order Issue</td>
                                <td>My order has not arrived yet.</td>
                                <td><span class='badge bg-danger'>Pending</span></td>
                                <td>31 Jan 2025, 10:30 AM</td>
                                <td class="action-buttons">
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-outline-info" onclick="viewInquiry(this)">
                                            <i class='fas fa-eye'></i> View
                                        </button>
                                        <button class="btn btn-outline-danger" onclick="updateStatus(this, 'Pending')">Pending</button>
                                        <button class="btn btn-outline-warning" onclick="updateStatus(this, 'Process')">Process</button>
                                        <button class="btn btn-outline-success" onclick="updateStatus(this, 'Done')">Done</button>
                                        <button class="btn btn-outline-danger" onclick="deleteInquiry(this)">
                                            <i class='fas fa-trash'></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Shihans</td>
                                <td>shihans24@gmail.com</td>
                                <td>Order Issue</td>
                                <td>My order has not arrived yet.</td>
                                <td><span class='badge bg-danger'>Pending</span></td>
                                <td>31 Jan 2025, 10:30 AM</td>
                                <td class="action-buttons">
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-outline-info" onclick="viewInquiry(this)">
                                            <i class='fas fa-eye'></i> View
                                        </button>
                                        <button class="btn btn-outline-danger" onclick="updateStatus(this, 'Pending')">Pending</button>
                                        <button class="btn btn-outline-warning" onclick="updateStatus(this, 'Process')">Process</button>
                                        <button class="btn btn-outline-success" onclick="updateStatus(this, 'Done')">Done</button>
                                        <button class="btn btn-outline-danger" onclick="deleteInquiry(this)">
                                            <i class='fas fa-trash'></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Shihans</td>
                                <td>shihans24@gmail.com</td>
                                <td>Order Issue</td>
                                <td>My order has not arrived yet.</td>
                                <td><span class='badge bg-danger'>Pending</span></td>
                                <td>31 Jan 2025, 10:30 AM</td>
                                <td class="action-buttons">
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-outline-info" onclick="viewInquiry(this)">
                                            <i class='fas fa-eye'></i> View
                                        </button>
                                        <button class="btn btn-outline-danger" onclick="updateStatus(this, 'Pending')">Pending</button>
                                        <button class="btn btn-outline-warning" onclick="updateStatus(this, 'Process')">Process</button>
                                        <button class="btn btn-outline-success" onclick="updateStatus(this, 'Done')">Done</button>
                                        <button class="btn btn-outline-danger" onclick="deleteInquiry(this)">
                                            <i class='fas fa-trash'></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Shihans</td>
                                <td>shihans24@gmail.com</td>
                                <td>Order Issue</td>
                                <td>My order has not arrived yet.</td>
                                <td><span class='badge bg-danger'>Pending</span></td>
                                <td>31 Jan 2025, 10:30 AM</td>
                                <td class="action-buttons">
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-outline-info" onclick="viewInquiry(this)">
                                            <i class='fas fa-eye'></i> View
                                        </button>
                                        <button class="btn btn-outline-danger" onclick="updateStatus(this, 'Pending')">Pending</button>
                                        <button class="btn btn-outline-warning" onclick="updateStatus(this, 'Process')">Process</button>
                                        <button class="btn btn-outline-success" onclick="updateStatus(this, 'Done')">Done</button>
                                        <button class="btn btn-outline-danger" onclick="deleteInquiry(this)">
                                            <i class='fas fa-trash'></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal for Viewing Inquiry -->
        <div class="modal fade" id="viewInquiryModal" tabindex="-1" aria-labelledby="viewInquiryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewInquiryModalLabel">Inquiry Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Name:</strong> <span id="modalName"></span></p>
                        <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                        <p><strong>Subject:</strong> <span id="modalSubject"></span></p>
                        <p><strong>Message:</strong> <span id="modalMessage"></span></p>
                        <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                        <p><strong>Received On:</strong> <span id="modalDate"></span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Adding Inquiry -->
        <div class="modal fade" id="addInquiryModal" tabindex="-1" aria-labelledby="addInquiryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addInquiryModalLabel">Add New Inquiry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addInquiryForm">
                            <div class="mb-3">
                                <label for="inquiryName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inquiryName" name="inquiryName" data-validation="required alpha">
                                <span class="text-danger" id="inquiryNameError"></span>
                            </div>
                            <div class="mb-3">
                                <label for="inquiryEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inquiryEmail" name="inquiryEmail" data-validation="required email">
                                <span class="text-danger" id="inquiryEmailError"></span>
                            </div>
                            <div class="mb-3">
                                <label for="inquirySubject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="inquirySubject" name="inquirySubject" data-validation="required alpha">
                                <span class="text-danger" id="inquirySubjectError"></span>
                            </div>
                            <div class="mb-3">
                                <label for="inquiryMessage" class="form-label">Message</label>
                                <textarea class="form-control" id="inquiryMessage" name="inquiryMessage" rows="3" data-validation="required description"></textarea>
                                <span class="text-danger" id="inquiryMessageError"></span>
                            </div>
                            <div class="mb-3">
                                <label for="inquiryStatus" class="form-label">Status</label>
                                <select class="form-control" id="inquiryStatus" name="inquiryStatus" data-validation="required">
                                    <option value="">Select Status</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Process">Process</option>
                                    <option value="Done">Done</option>
                                </select>
                                <span class="text-danger" id="inquiryStatusError"></span>
                            </div>
                            <div class="mb-3">
                                <label for="inquiryDate" class="form-label">Received On</label>
                                <input type="datetime-local" class="form-control" id="inquiryDate" name="inquiryDate" data-validation="required">
                                <span class="text-danger" id="inquiryDateError"></span>
                            </div>
                            <div class="mb-3 text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit Inquiry</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewInquiryModal" tabindex="-1" aria-labelledby="viewInquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewInquiryModalLabel">Inquiry Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="modalName"></span></p>
                <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                <p><strong>Subject:</strong> <span id="modalSubject"></span></p>
                <p><strong>Message:</strong> <span id="modalMessage"></span></p>
                <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                <p><strong>Received On:</strong> <span id="modalDate"></span></p>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    function viewInquiry(button) {
        let row = button.closest("tr");
        let columns = row.getElementsByTagName("td");

        document.getElementById("modalName").innerText = columns[1].innerText;
        document.getElementById("modalEmail").innerText = columns[2].innerText;
        document.getElementById("modalSubject").innerText = columns[3].innerText;
        document.getElementById("modalMessage").innerText = columns[4].innerText;
        document.getElementById("modalStatus").innerHTML = columns[5].innerHTML;
        document.getElementById("modalDate").innerText = columns[6].innerText;

        var modal = new bootstrap.Modal(document.getElementById("viewInquiryModal"));
        modal.show();
    }

    function deleteInquiry(button) {
        if (confirm("Are you sure you want to delete this inquiry?")) {
            let row = button.closest("tr");
            row.remove();
        }
    }

    function updateStatus(button, status) {
        let row = button.closest("tr");
        let statusColumn = row.getElementsByTagName("td")[5];

        let badgeClass = status === "Pending" ? "bg-danger" :
            status === "Process" ? "bg-warning" :
            "bg-success";

        statusColumn.innerHTML = `<span class='badge ${badgeClass}'>${status}</span>`;
    }

    function searchInquiries() {
        let input = document.getElementById("searchInput").value.toLowerCase();
        let rows = document.querySelectorAll("#inquiryTable tr");

        rows.forEach(row => {
            let cells = row.getElementsByTagName("td");
            let matchFound = false;

            for (let i = 0; i < cells.length; i++) {
                let cellText = cells[i].innerText.toLowerCase();
                if (cellText.includes(input)) {
                    matchFound = true;
                    break;
                }
            }

            row.style.display = matchFound ? "" : "none";
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>