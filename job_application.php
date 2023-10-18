<section id="applicants" class="content-header">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Welcome <b><?php echo $_SESSION['fullname']; ?></b></h3>
                    </div>
                    <div class="box-body no-padding"></div>
                </div>
            </div>
            <div class="col-md-9 bg-white padding-2">
                <h2><i>Recent Aplication</i></h2>

                <?php
                    $sql = "SELECT * FROM job_posts INNER JOIN job_applications ON job_posts.job_post_id=job_applications.job_post_id INNER JOIN applicants ON applicants.applicants_id=job_applications.applicants_id WHERE job_applications.company_id='$_SESSION[company_id]'";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                        ?>
            <div class="attachment-block clearfix padding-2">
                <h4 class="attachment-heading"><a href="user_application.php? id=<?php echo $row['applicants_id']; ?>&job_posts_id=<?php echo $row['job_post_id']; ?>"><?php echo $row['job_title'].' @ ('.$row['fullname'].')';?> </a></h4>
                <div class="attachment-text padding-2">
                    <div class="pull-left"><i class="fa fa-calendar"></i><?php echo $row['created_at']; ?></div>
                    <?php

                    if($row['status'] == 0){
                        echo '<div class="pull-right"><strong class="text-orange">Pending</strong></div>';
                    }else if($row['status']==1){
                        echo '<div class="pull-right"><strong class="text-red">Rejected</strong></div>';
                    }else if($row['status']==2){
                        echo '<div class="pull-right"><strong class="text-green">Under Review</strong></div>';
                    }
                    ?>
                </div>
            </div>
            <?php
                }
             }
                ?>
            </div>
        </div>
    </div>
</section>