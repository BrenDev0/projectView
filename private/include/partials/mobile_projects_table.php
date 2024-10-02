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
            $sql = "SELECT * FROM projects WHERE user = $user";
            $stmt = $conn->query($sql);

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $project_name = $row['name'];
                $project_row = "<tr>
                <td>
                    <button><i class='fas fa-chevron-circle-right'></i></button>
                    <span>$project_name</span>
                </td>
                <td>54</td>
                <td>13%</td>
                </tr>";
                
                // display row
                echo $project_row;

                // Get parts to every project
                $project = $row['project_id'];
                $parts_sql = $parts_sql = "SELECT * FROM parts WHERE project = $project";
                $parts_stmt = $conn->query($parts_sql);

                while($parts_row = $parts_stmt->fetch(PDO::FETCH_ASSOC)){
                    $part_name = $parts_row['name'];
                    $sub_row = "<tr class='hidden'>
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