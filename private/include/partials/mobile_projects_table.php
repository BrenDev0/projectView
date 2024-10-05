<div class="h-con ha-center va-center" id="projects-table-con" >
    <table>
        <thead>
            <th>Name</th>
            <th>Hours</th>
            <th>Progress</th>
        </thead>
        <tbody>
            <?php
            // Get projects
            $user = $_SESSION['account'];
            $projects = new Project;
            $project_rows = $projects->get_users_projects($user);

            while($row = $project_rows->fetch(PDO::FETCH_ASSOC)){
                $project_id = $row['project_id'];
                $project_name = $row['name'];
                $project_html = "<tr class='project-rows' id='$project_id'>
                <td>
                    <button class='show-rows'><i class='fas fa-chevron-circle-right'></i></button>
                    <span>$project_name</span>
                </td>
                <td>54</td>
                <td>13%</td>
                </tr>";
                
                // display row
                echo $project_html;

                // Get parts to every project
                $parts_sql = "SELECT * FROM parts WHERE project = $project";
                $parts_stmt = $conn->query($parts_sql);

                while($parts_row = $parts_stmt->fetch(PDO::FETCH_ASSOC)){
                    $part_name = $parts_row['name'];
                    $sub_row = "<tr class='sub-row hidden' data-project='$project'>
                    <td>$part_name</td>
                    <td>12</td>
                    <td>20%</td>
                    </tr>";

                    //display subrow
                    echo $sub_row;
                }
            }
            ?> 
        </tbody>
    </table>
</div>