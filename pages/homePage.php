<body id="home-body">
   <header class="h-con">
    <h1>ProjectView.</h1>
    <button id="menu-button">
        <i class="fas fa-bars"></i>
    </button>
   </header>
   <?php 
    include ('./templates/mobile_nav.php')
    ?>
   <main>

   </main> 
</body>

<script>
    const openButton = document.getElementById('menu-button');
    const closeButton = document.getElementById('mobile-menu-close-btn')
    const menu = document.getElementById('nav-con')

    // Open mobile menu
    const openMobileMenu = () => {
    
        menu.style.top = '0';
        return;
    }

    // Close mobile menu
    const closeMobileMenu = () => {

        menu.style.top = '-100%';
        return;
    }

    openButton.addEventListener('click', openMobileMenu)
    closeButton.addEventListener('click', closeMobileMenu)
    
</script>
</html>