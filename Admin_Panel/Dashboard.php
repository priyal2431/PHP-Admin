<?php
include('index.php');
?>
<style>
    body {
        margin: 0;
        padding: 0;
    }

    .content {
        padding: 20px;
    }

    .dashboard-container .card {
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        min-height: 150px;
    }

    .dashboard-container .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    .dashboard-container .card-body {
        text-align: center;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .dashboard-container .card-title {
        font-size: clamp(1rem, 2vw, 1.2rem);
        font-weight: bold;
    }

    .dashboard-container .card-value {
        font-size: clamp(1.8rem, 3vw, 2.5rem);
        margin-top: 5px;
        font-weight: bold;
        color: #007bff;
    }
</style>

<div class="col-11">
    <div class="container mt-4">
        <div class="dashboard-container">

            <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Users demodfghjk</h5>
                            <div class="card-value">1,234</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Products</h5>
                            <div class="card-value">567</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders</h5>
                            <div class="card-value">345</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3 mt-2">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Inquiries</h5>
                            <div class="card-value">78</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Active Users</h5>
                            <div class="card-value">890</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Inactive Users</h5>
                            <div class="card-value">344</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3 mt-2">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pending Orders</h5>
                            <div class="card-value">23</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Today's Orders</h5>
                            <div class="card-value">12</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>