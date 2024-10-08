<div class="full" id="recent-projects-table">
    <h2 class="h-con ha-center va-center">Projects</h2>
        <table>
            <thead>
                <th>Project</th>
                <th>Hours</th>
                <th>Progress</th>
            </thead>
            <tbody>
                <?php
                // Get the projects
                $projects = new Project;
                $user_projects = $projects->get_user_projects($_SESSION['account']);
                
                // Gather all required data to populate the table
                foreach($user_projects as $project){
                    $project_name = $project['name'];
                    $project_id = $project['project_id'];
                    $project_hours = $projects->get_project_hours($project_id);
                    $progress = $projects->get_project_progress($project_id);
                    
                    //render the data to table
                    echo "<tr id='$project_id'>
                    <td>$project_name</td>
                    <td>$project_hours</td>
                    <td>$progress %</td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>