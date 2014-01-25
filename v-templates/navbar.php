<!-- navbar starts here -->
<div class="col-md-12 page_nav">
    <div class="navbar nav_header">
        <!-- Brand and toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="nav navbar-nav navigation">
            	<?php
					//navbar elements for contractor and employee
					if(isset($_SESSION['user']) && $_SESSION['user'] == 'employer'){
				?>
                <li <?php if($pageTitle == 'POST PROJECT'){ echo 'class="navigation_active"';} ?>><a href="post_project.php">Post Project</a></li>
                <li <?php if($pageTitle == 'PROJECT LIST'){ echo 'class="navigation_active"';} ?>><a href="project_list.php">Project List</a></li>
                
                <?php } else if(isset($_SESSION['user']) && $_SESSION['user'] == 'contractor') { ?>
                
                <li <?php if($pageTitle == 'JOB LIST'){ echo 'class="navigation_active"';} ?>><a href="job_list.php">Job List</a></li>
                <li <?php if($pageTitle == 'FIND JOB'){ echo 'class="navigation_active"';} ?>><a href="find_job.php">Find Jobs</a></li>
                <?php } ?>
                
                <li <?php if($pageTitle == 'LOGIN'){ echo 'class="navigation_active"';} ?>> 
				<?php if(!isset($_SESSION['user'])){ echo '<a href="index.php">Login</a>';} else { echo '<a href="v-includes/logout.php">Logout</a>'; }?></li>
                <li <?php if($pageTitle == 'SIGNUP'){echo 'class="navigation_active"';} ?>>
                <?php if(!isset($_SESSION['user'])){ echo '<a href="sign_up.php">Registration</a>';} ?></li>
                
            </ul>
        </div>
    </div>
</div>
<!-- div for showing success message--->
<div class="alert alert-success" id="success_msg"></div>
<!-- div for showing warning message--->
<div class="alert alert-danger" id="warning_msg"></div>
<!-- navbar ends here -->
