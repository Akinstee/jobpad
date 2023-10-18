<?php
    session_start();
    if(empty($_SESSION['company_id'])){
        header("Location: dashboard.php");
        exit();
    }

    require_once("./classes/db.php");
?>

<h2><i>My Company</i></h2>
<p>You can Update your company details in this section</p>
    <div class="row">
        <form action="update_company.php" method="post" enctype="multipart/form-data">
            <?php 
                $sql = "SELECT * FROM company WHERE company_id = '$_SESSION[company_id]'";
                $result = $conn->query($sql);

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                ?>

                <div class="col-md-6 latest-job">
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control input-lg" name="companyname" value="<?php echo $row['companyname']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" class="form-control input-lg" name="website" value="<?php echo $row['website']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control input-lg" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>About Us</label>
                        <textarea class="form-control" name="aboutme" id="aboutme" rows="5"><?php echo $row['website']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn bt-flat btn-success">Update Company Profile</button>
                    </div>
                </div>
                <div class="col-md-6 latest-job">
                    <div class="form-group">
                        <label for="contactno">Contact Number</label>
                        <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" onkeypress="return validatePhone(event);" minlength="11" maxlength="11" value="<?php echo $row['contactno']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="lga">Local Government Area</label>
                        <input type="text" class="form-control input-lg" id="lga" name="lga" placeholder="Local Government Area" onkeypress="return validateName(event);" value="<?php echo $row['lga']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control input-lg" id="state" name="state" placeholder="State" onkeypress="return validateName(event);" value="<?php echo $row['state']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Change Company Logo</label>
                        <input type="file" class="form-control input-lg" id="image" name="image" class="btn btn-default"><?php if($row['logo'] != "") { ?>
                            <img src="../uploads/logo/<?php echo $row['logo']; ?>" class="img-responsive" style="max-height: 200px; max-width:200px;">
                            <?php } ?>
                    </div>
                </div>
                    <?php
                    }
                }
            ?>
        </form>
    </div>
        <?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php echo $_SESSION['uploadError']; ?>
                </div>
            </div>
            <?php unset($_SESSION['uploadError']); } ?>


    <script type="text/javascript">
        function validatePhone(event){
            var key = window.event ? event.keyCode : event.which;

            if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
                return true;
            } else if(key < 48 || key > 57) {
                return false;
            }else return true;
        }

            function valadateName(event) {
                var key = window.event ? event.keyCode : event.which;
                if(event.keyCode == 8 || event.keyCode == 127 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 32) {
                return true;
            } else if(key < 65 || key > 90 && key < 97 || key > 122) {
                return false;
            }else return true;
            }
    </script>