<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php'); // Include database connection file

// Check if session variable is not set or empty, redirect to logout.php
if (strlen($_SESSION['etmsaid']) == 0 || !isset($_SESSION['etmsaid'])) {
    header('location:logout.php');
    exit(); // Ensure script stops execution after redirection
}

// Check if viewid is set in the URL
if (isset($_GET['viewid'])) {
    $viewid = intval($_GET['viewid']); // Sanitize viewid as integer

    // Fetch employee details from the database based on viewid
    $sql = "SELECT e.*, d.DepartmentName 
            FROM tblemployee e 
            LEFT JOIN tbldepartment d ON e.DepartmentID = d.ID 
            WHERE e.ID = :viewid";
    $query = $dbh->prepare($sql); // Prepare SQL statement
    $query->bindParam(':viewid', $viewid, PDO::PARAM_INT); // Bind viewid parameter
    $query->execute(); // Execute SQL query
    $employee = $query->fetch(PDO::FETCH_ASSOC); // Fetch employee details

    // Fetch assigned tasks/projects for the employee
    if ($employee) {
        $empid = $employee['ID']; // Get employee ID
        $sql_tasks = "SELECT TaskTitle FROM tbltask WHERE AssignTaskto = :empid";
        $query_tasks = $dbh->prepare($sql_tasks);
        $query_tasks->bindParam(':empid', $empid, PDO::PARAM_INT);
        $query_tasks->execute();
        $tasks = $query_tasks->fetchAll(PDO::FETCH_COLUMN); // Fetch tasks as array
    }

    // Display employee details and tasks if employee found
    if ($employee) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Task Management System || View Employee</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="css/responsive.css"/>
    <link rel="stylesheet" href="css/colors.css"/>
    <link rel="stylesheet" href="css/bootstrap-select.css"/>
    <link rel="stylesheet" href="css/perfect-scrollbar.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
    <link rel="stylesheet" href="css/jquery.fancybox.css"/>
    <style>
        /* Custom styles for table text color */
        .table-bordered th,
        .table-bordered td {
            color: #333; /* Darker text color */
        }
        .profile-pic {
            display: block;
            margin: 0 auto;
            max-width: 150px; /* Adjust as needed */
            max-height: 150px; /* Adjust as needed */
            border-radius: 50%;
        }
        .profile-pic-container {
            text-align: center;
            padding-top: 35px;
        }
    </style>
</head>
<body class="inner_page tables_page">
<div class="full_container">
    <div class="inner_container">
        <?php include_once('includes/sidebar.php'); ?>
        <div id="content">
            <?php include_once('includes/header.php'); ?>
            <div class="midde_cont">
                <div class="container-fluid">
                    <div class="row column_title">
                        <div class="col-md-12">
                            <div class="page_title">
                                <h2>Employee Details</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                                <div class="profile-pic-container">
                                    <?php if (!empty($employee['ProfilePic'])): ?>
                                        <img src="images/<?php echo $employee['ProfilePic']; ?>" alt="Profile Picture" class="profile-pic">
                                    <?php else: ?>
                                        <p>No image available</p>
                                    <?php endif; ?>
                                </div>
                                <div class="table_section padding_infor_info">
                                    <div class="table-responsive-sm">
                                        <table class="table table-hover table-bordered ">
                                        <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <td><?php echo htmlentities($employee['EmpName']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Employee ID</th>
                                                <td><?php echo htmlentities($employee['EmpId']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Department Name</th>
                                                <td><?php echo htmlentities($employee['DepartmentName']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Contact</th>
                                                <td><?php echo htmlentities($employee['EmpContactNumber']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo htmlentities($employee['EmpEmail']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Designation</th>
                                                <td><?php echo htmlentities($employee['Designation']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Employment Type</th>
                                                <td><?php echo htmlentities($employee['EmpType']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Joined On</th>
                                                <td><?php echo htmlentities($employee['EmpDateofjoining']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Resigned On</th>
                                                <td><?php echo htmlentities($employee['EmpDateofResign']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Extension Period</th>
                                                <td><?php echo htmlentities($employee['EmpExtPeriod']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Assigned on Projects</th>
                                                <td>
                                                    <?php if (!empty($tasks)): ?>
                                                        <ul>
                                                            <?php foreach ($tasks as $task): ?>
                                                                <li><?php echo htmlentities($task); ?></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php else: ?>
                                                        No projects assigned
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Any Remark</th>
                                                <td><?php echo htmlentities($employee['EmpRemark']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Employee Date of Birth</th>
                                                <td><?php echo htmlentities($employee['EmpDateofbirth']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nationality</th>
                                                <td><?php echo htmlentities($employee['EmpNationality']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Employee Address</th>
                                                <td><?php echo htmlentities($employee['EmpAddress']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td><?php echo htmlentities($employee['Description']); ?></td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once('includes/footer.php'); ?>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/animate.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/Chart.bundle.min.js"></script>
<script src="js/utils.js"></script>
<script src="js/analyser.js"></script>
<script src="js/perfect-scrollbar.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/semantic.min.js"></script>
</body>
</html>
<?php
    } else {
        echo '<p>Employee not found.</p>';
    }
} else {
    echo '<p>Invalid request.</p>';
}
?>
