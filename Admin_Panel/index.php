<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="validation.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script src="additional-methods.min.js"></script>

    <style>
        /* webkith */
        /* Width of the scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        /* Track (background of the scrollbar) */
        ::-webkit-scrollbar-track {
            /* background: #1e1e1e; */
            /* Dark background */
            border-radius: 10px;
        }

        /* Handle (draggable part of the scrollbar) */
        ::-webkit-scrollbar-thumb {
            background: navy;
            /* Green color */
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: navy;
        }
    </style>

</head>

<body>
    <div class="row">
        <div class="col-1">

            <aside id="sidebar" style="height:100vh; position: fixed;">
                <div class=" d-flex">
                    <button class="toggle-btn" type="button">
                        <img src="images/Louis_Vuitton-Logo.wine.png" style="height: 50px; margin-left: -30px;" alt="">
                    </button>
                    <div class="sidebar-logo">
                        <a href="#">Louis Vitton</a>
                    </div>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="Dashboard.php" class="sidebar-link">
                            <i class="lni lni-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="User.php" class="sidebar-link">
                            <i class="lni lni-user"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="Categories.php" class="sidebar-link">
                            <i class="lni lni-list"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="Products.php" class="sidebar-link">
                            <i class="lni lni-cart"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="inquiry.php" class="sidebar-link">
                            <i class="lni lni-comments"></i>
                            <span>Inquiries</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="Orders.php" class="sidebar-link">
                            <i class="bi bi-card-checklist"></i>
                            <span>Orders</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="offers.php" class="sidebar-link">
                            <i class="lni lni-offer"></i>
                            <span>Offers</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="profile.php" class="sidebar-link">
                            <i class="lni lni-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                </ul>
                <div class="sidebar-footer">
                    <a href="logout.php" class="sidebar-link">
                        <i class="lni lni-exit"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </aside>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                crossorigin="anonymous"></script>
            <script src="script.js"></script>
        </div>