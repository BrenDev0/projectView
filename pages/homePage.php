
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styles/styles.css">
    <title>ProjectView Home</title>
</head>
<body id="home-body">
   <header class="h-con">
    <h1>ProjectView.</h1>
    <button id="menu-button">
        <i class="fas fa-bars"></i>
    </button>
   </header>
   <?php 
    include ('./templates/mobileNav.php')
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