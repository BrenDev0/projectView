<body id="home-body">
   <header class="h-con">
    <h1>ProjectView.</h1>
    <button id="menu-button">
        <i class="fas fa-bars"></i>
    </button>
   </header>
   <main id="home-main">
   <?php 
    require('./require/templates/mobile_nav.php');
    require('./require/templates/nav_bar.php');
    ?>
    <div class="h-con" id="tool-bar">
        <input id="new-project-btn" type="button" value="New Project">
        <input type="button" value="New Idea">
        <input type="button" value="toolbar">
        <input type="button" value="toolbar">
    </div>
    <div class="h-con ha-center va-center full" id="new-project-modal">
        <form class="v-con va-center ha-center" action="submit">
            <h2>Create a New Project</h2>
            <div class="v-con ha-center form-elements">
                <label for="">Project Name</label>
                <input type="text">
            </div>
            <div class="v-con ha-center form-elements">
                <label for="">label</label>
                <input type="text">
            </div>
            <div class="v-con ha-center form-elements">
                <label for="">label</label>
                <input type="text">
            </div>
            <div class="v-con ha-center form-elements">
                <label for="">label</label>
                <input type="text">
            </div>
            <div class="h-con ha-end va-center wide modal-form-btn-con">
                <button>Create</button>
                <button>Cancel</button>
            </div>
        </form>
    </div>
    <div>
        <ul>
            <li>recent Project</li>
            <li>recent project</li>
            <li>recent project</li>
            <li>recentproject</li>
        </ul>
    </div>
    <div>
    <table>
        <thead>
            <th>project name</th>
            <th>hours</th>
            <th>something</th>
        </thead>
        <tbody>
            <tr>
                <td>data</td>
                <td>data</td>
                <td>data</td>
            </tr>
            <tr>
                <td>data</td>
                <td>data</td>
                <td>data</td>
            </tr>
            <tr>
                <td>data</td>
                <td>data</td>
                <td>data</td>
            </tr>
        </tbody>
    </table>
    </div>
    <div>
        side by side
        <p>link to new project form</p>
        <p>link to new idea form</p>
    </div>
   </main> 
</body>

<script src="./js/mobileMenu.js" ></script> 


</html>