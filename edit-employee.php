<?php
session_start();
//error_reporting(0);
include "includes/dbconnection.php";
if (strlen($_SESSION["etmsaid"] == 0)) {
    header("location:logout.php");
} else {
    if (isset($_POST["submit"])) {
        $deptname = $_POST["deptname"];
        $empid = $_POST["empid"];
        $empname = $_POST["empname"];
        $empemail = $_POST["empemail"];
        $empcontno = $_POST["empcontno"];
        $designation = $_POST["designation"];
        $empdob = $_POST["empdob"];
        $empadd = $_POST["empadd"];
        $empdoj = $_POST["empdoj"];
        $desc = $_POST["desc"];
        $empresing = $_POST["empresing"];
        $emptype = $_POST["emptype"];
        $empext = $_POST["empext"];
        $empnation = $_POST["empnation"];
        $empremark = $_POST["empremark"];
        $eid = $_GET["editid"];
        $sql =
            "update tblemployee set DepartmentID=:deptname,EmpId=:empid,EmpName=:empname,EmpEmail=:empemail,EmpContactNumber=:empcontno,Designation=:designation,EmpDateofbirth=:empdob,EmpAddress=:empadd,EmpDateofjoining=:empdoj,Description=:desc,EmpDateofResign=:empresing, EmpType=:emptype, EmpExtPeriod=:empext, EmpNationality=:empnation, EmpRemark=:empremark where ID=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(":deptname", $deptname, PDO::PARAM_STR);
        $query->bindParam(":empid", $empid, PDO::PARAM_STR);
        $query->bindParam(":empname", $empname, PDO::PARAM_STR);
        $query->bindParam(":empemail", $empemail, PDO::PARAM_STR);
        $query->bindParam(":empcontno", $empcontno, PDO::PARAM_STR);
        $query->bindParam(":designation", $designation, PDO::PARAM_STR);
        $query->bindParam(":empdob", $empdob, PDO::PARAM_STR);
        $query->bindParam(":empadd", $empadd, PDO::PARAM_STR);
        $query->bindParam(":empdoj", $empdoj, PDO::PARAM_STR);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->bindParam(":empresing", $empresing, PDO::PARAM_STR);
        $query->bindParam(":emptype", $emptype, PDO::PARAM_STR);
        $query->bindParam(":empext", $empext, PDO::PARAM_STR);
        $query->bindParam(":empnation", $empnation, PDO::PARAM_STR);
        $query->bindParam(":empremark", $empremark, PDO::PARAM_STR);
        $query->bindParam(":eid", $eid, PDO::PARAM_STR);
        $query->execute();
        echo '<script>alert("Employee detail has been updated")</script>';
    } ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Employee Task Management System || Update Employee</title>
    
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
     
   </head>
   <body class="inner_page general_elements">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
           <?php include_once "includes/sidebar.php"; ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <?php include_once "includes/header.php"; ?>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Update Employee</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column8 graph">
                      
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Update Employee</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="full">
                                          <div class="padding_infor_info">
                                             <div class="alert alert-primary" role="alert">
                                                <form method="post">
                                                   <?php
                                                   $eid = $_GET["editid"];
                                                   $sql =
                                                       "SELECT tbldepartment.ID as did, tbldepartment.DepartmentName,tblemployee.ID as eid,tblemployee.DepartmentID,tblemployee.EmpName,tblemployee.EmpId,tblemployee.EmpEmail,tblemployee.EmpContactNumber,tblemployee.EmpDateofjoining,tblemployee.Designation,tblemployee.EmpDateofbirth,tblemployee.EmpAddress,tblemployee.Description,tblemployee.ProfilePic,tblemployee.CreationDate, tblemployee.EmpDateofResign, tblemployee.EmpType, tblemployee.EmpExtPeriod, tblemployee.EmpNationality, tblemployee.EmpRemark from tblemployee join tbldepartment on tbldepartment.ID=tblemployee.DepartmentID where tblemployee.ID=:eid";
                                                   $query = $dbh->prepare($sql);
                                                   $query->bindParam(
                                                       ":eid",
                                                       $eid,
                                                       PDO::PARAM_STR
                                                   );
                                                   $query->execute();
                                                   $results = $query->fetchAll(
                                                       PDO::FETCH_OBJ
                                                   );
                                                   $cnt = 1;
                                                   if ($query->rowCount() > 0) {
                                                       foreach (
                                                           $results
                                                           as $row
                                                       ) { ?>
                        <fieldset>
                            
                           <div class="field">
                              <label class="label_field">Department Name</label>
                              <select type="text" name="deptname" value="" class="form-control" required='true'>
                                 <option value="<?php echo htmlentities(
                                     $row->DepartmentID
                                 ); ?>"><?php echo htmlentities(
    $row->DepartmentName
); ?></option>
                                  <?php
                                  $sql2 = "SELECT * from   tbldepartment ";
                                  $query2 = $dbh->prepare($sql2);
                                  $query2->execute();
                                  $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

                                  foreach ($result2 as $row2) { ?>  
   
<option value="<?php echo htmlentities($row2->ID); ?>"><?php echo htmlentities(
    $row2->DepartmentName
); ?></option>
 <?php }
                                  ?>
                              </select>
                           </div>
                          

                           <br>

                           <div class="field">
                              <label class="label_field">Employee ID</label>
                              <input type="text" name="empid" value="<?php echo $row->EmpId; ?>" class="form-control" required='true'>
                           </div>

                           <br>

                           <div class="field">
                              <label class="label_field">Employee Name</label>
                              <input type="text" name="empname" value="<?php echo htmlentities(
                                 $row->EmpName
                              ); ?>" class="form-control" required='true'>
                           </div>

                           <br>

                           <div class="field">
                              <label class="label_field">Employee Email</label>
                              <input type="email" name="empemail" value="<?php echo htmlentities(
                                 $row->EmpEmail
                              ); ?>" class="form-control" required='true'>
                           </div>

                           <br>

                           <div class="field">
                              <label class="label_field">Employee Contact Number</label>
                              <input type="text" name="empcontno" value="<?php echo htmlentities(
                                 $row->EmpContactNumber
                              ); ?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                           </div>

                           <br>

                           <div class="field">
                              <label class="label_field">Employee Designation</label>
                              <input type="text" name="designation" value="<?php echo htmlentities(
                                 $row->Designation
                              ); ?>" class="form-control" required='true'>
                           </div>

                           <br>

                           <div class="field">
                              <label class="label_field">Employment Type</label>
                              <input type="text" name="emptype" value="<?php echo htmlentities(
                                 $row->EmpType
                              ); ?>" class="form-control" required='true'>
                           </div>

                           <br>

                           <div class="field">
                              <label class="label_field">Employee Date of Joining</label>
                              <input type="date" name="empdoj" value="<?php echo htmlentities(
                                 $row->EmpDateofjoining
                              ); ?>" class="form-control" required='true'>
                           </div>

                           <br>

                           <div class="field">
                              <label class="label_field">Employee Date of Resigning</label>
                              <input type="date" name="empresing" value="<?php echo htmlentities(
                                 $row->EmpDateofResign
                              ); ?>" class="form-control">
                           </div>

                           <br>

                           <div class="field">
                              <label class="label_field">Extension Period</label>
                              <input type="text" name="empext" value="<?php echo htmlentities(
                                 $row->EmpExtPeriod
                              ); ?>" class="form-control">
                           </div>

                           <br>

                           <div class="field">
                              <label class="label_field">Nationality</label>
                              <input type="text" name="empnation" value="<?php echo htmlentities(
                                 $row->EmpNationality
                              ); ?>" class="form-control" required='true'>
                           </div>

                           <br>

                           <div class="field">
                              <label class="label_field">Employee Date of Birth</label>
                              <input type="date" name="empdob" value="<?php echo htmlentities(
                                 $row->EmpDateofbirth
                              ); ?>" class="form-control" required='true'>
                           </div>

                           <br>

                           <div class="field">
                              <label class="label_field">Empoyee Address</label>
                              <textarea type="text" name="empadd" class="form-control" required='true'><?php echo htmlentities(
                                 $row->EmpAddress
                              ); ?></textarea>
                           </div>

                           <br>

                           <div class="field">
                              <label class="label_field">Description(if any)</label>
                              <textarea type="text" name="desc" class="form-control"><?php echo htmlentities(
                                 $row->Description
                              ); ?></textarea>
                           </div>

                           <br>

                           <div class="field">
                              <label class="label_field">Remark</label>
                              <textarea type="text" name="empremark" class="form-control"><?php echo htmlentities(
                                 $row->EmpRemark
                              ); ?></textarea>
                           </div>

                           <br>

                           <div class="field">
                              <label class="label_field">Employee Pic</label>
                              <img src="images/<?php echo $row->ProfilePic; ?>" width="100" height="100" value="<?php echo $row->ProfilePic; ?>"><a href="changeimage.php?editid=<?php echo $row->eid; ?>"> &nbsp; Edit Image</a>
                           </div>

                           <br>
                          <?php $cnt = $cnt + 1;}
                                                   }
                                                   ?>

                           <br>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt" type="submit" name="submit" id="submit">Update</button>
                           </div>
                        </fieldset>
                     </form></div>
                                            
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- funcation section -->
                     
                     </div>
                  </div>
                  <!-- footer -->
                 <?php include_once "includes/footer.php"; ?>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
         <!-- model popup -->
    
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html><?php
} ?>
