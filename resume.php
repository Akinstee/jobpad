<?php 
session_start();

require_once("Db.php");

?>

<div class="col-md-9 bg-white padding-2">
    <h2><i>Applicants Resume</i></h2>
    <p>This section is to download all applicants resume</p>
    <div class="row mt-20">
        <div class="col-md-12">
            <div class="box-body table-responsive no-padding">
                <table id="plate2" class="table table-hover">
                    <thead>
                        <th>Applicants</th>
                        <th>Qualification</th>
                        <th>Skills</th>
                        <th>lga</th>
                        <th>State</th>
                        <th>Download Resume</th>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM job_posts INNER JOIN job_applications ON job_posts.job_post_id=job_applications.job_post_id INNER JOIN applicants ON applicants.applicants_id=job_applications.applicants_id";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                    $skills = $row['skills'];
                                    $skills = explode(',', $skills);
                            ?>
                            <tr>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['qualification']; ?></td>
                                <td>
                                    <?php 
                                        foreach ($skills as $value){
                                            echo '<span class="label label-success">'.$value.'</span>';
                                        }
                                    ?>
                                </td>
                                <td><?php echo $row['lga']; ?></td>
                                <td><?php echo $row['state']; ?></td>
                                <td><a href="../uploads/resume/<?php echo $row['resume']; ?>" download="<?php echo $row['fullname']. 'resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td>
                            </tr>
                            <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#plate2').DataTable({
            'paging' : true,
            'lengthChange' : false,
            'searching' : false,
            'ordering' : true,
            'info' : true,
            'autoWidth' : false
        });
    });
</script>