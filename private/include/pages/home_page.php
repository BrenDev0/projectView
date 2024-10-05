<!DOCTYPE html>
<html lang="en">
<?php
include '../private/include/partials/html_head.php';
?>
<body id="home-body"> 
    <!-- Mobile -->
   <main id="home-main-mobile">
   <?php 
    include '../private/include/partials/mobile_header.php';
    include '../private/include/partials/mobile_nav.php';
    include '../private/include/partials/toolbar.php';
    // Modals
    include '../private/include/partials/new_project_modal.php';
    include '../private/include/partials/new_idea_modal.php';
    // Recent projects component
    include '../private/include/partials/recent_projects_table.php'
    ?>
    <div class="h-con va-center" id="dashboard-elements-con">
        <div class="dashboard-element"></div>
        <div class="dashboard-element"></div>
    </div>
   </main> 

   <!-- Desktop -->
   <main id="home-main">
    <?php
    include '../private/include/partials/dt_header.php';
    include '../private/include/partials/nav_bar.php';
    ?>
    <div class="con h-con">
        <div class="v-con ha-center stacked">
        <?php
        include '../private/include/partials/recent_projects_table.php';
        ?>
        <div id="hours full">Hours this week</div>
        </div>
        <div class="long">Todays tasks</div>
        <div class="v-con ha-center stacked">
            <div class="dashboard-form-con full">
                <form class="dashboard-form v-con va-center full" method="post" action="">
                    <h2>New Project</h2>
                    <div class="h-con va-center name-select-con" >
                        <input type="text" placeholder="project name">
                        <select name="" id="">
                            <option value="">--Project Type--</option>
                            <option value="personal">Personal</option>
                            <option value="professional">Professional</option>
                        </select>
                    </div>
                    <textarea name="description" cols="40" rows="7" id="" placeholder="project discription"></textarea>
                    <button>Submit</button>
                </form>
            </div>
            <div class="dashboard-form-con full">
                <form class="dashboard-form v-con va-center full" method="post" action="">
                    <h2>New Idea</h2>
                    <div class="h-con va-center name-select-con" >
                        <input type="text" placeholder="title">
                        <select name="" id="">
                            <option value="">--Project--</option>
                            <option value="">No Project</option>
                            <option value="">option</option>
                        </select>
                    </div>
                    <textarea name="" cols="40" rows="7" id="" placeholder="idea..."></textarea>
                    <button>Submit</button>
                </form>
            </div>
        </div>
    </div>
    </main>
</body>
<?php
require '../private/include/partials/script.php';
?>
</html>