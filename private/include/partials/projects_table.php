<div id="projects-table">
    <h2 class="h-con ha-center va-center">Projects</h2>
    <div class="h-con va-center">
        <button class="h-con ha-center va-center" id="dt-new-project">New Project</button>
        <form class="va-center" id="new-project-bar" method="post">
            <div class="h-con form-elements">
                <input type="text" name="name" placeholder="project name">
                <select name="type" id="">
                    <option value="personal">Personal</option>
                    <option value="professional">Professional</option>
                </select>
            </div>
            <button name="new_project">Submit</button>
        </form>
    </div>
        <table>
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Hours</th>
                    <th>Progress</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Get the projects
                $projects = new Project;
                $user_projects = $projects->get_user_projects($_SESSION['account']);
                
                // Gather all required data to populate the table
                foreach($user_projects as $project){
                    $project_name = htmlentities($project['name']);
                    $project_id = $project['project_id'];
                    $project_hours = htmlentities($projects->get_project_hours($project_id));
                    $progress = htmlentities($projects->get_project_progress($project_id));
                    
                    //render the data to table
                    echo "<tr class='project-table-row' id='$project_id'>
                    <td>$project_name</td>
                    <td>$project_hours</td>
                    <td class='h-con va-center' id='progress'>
                        <div class='wide' id='progress-bar-con'>
                            <div style=' height: 100%; width: $progress%; background: green;' id='progress-bar-fill'></div>
                        </div>
                        <p class='full h-con ha-center va-center'>$progress%</p>
                    </td>
                    <td><form class='full h-con' method='post'>
                            <button class='view-project-btn' name='project_id' value='$project_id'>View</button>
                            <button class='delete-project-btn' name='delete_project' value='$project_id'>Delete</button>
                        </form>
                    </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>