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