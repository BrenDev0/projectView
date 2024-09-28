export const mobileMenu = () => {
    const openButton = document.getElementById('menu-button');
    const closeButton = document.getElementById('mobile-menu-close-btn')
    const menu = document.getElementById('nav-con')

    // Open mobile menu
    const handleMobileMenu = (action) => {
        action === 'OPEN' ? menu.style.top = '0' :  menu.style.top = '-100%';
        return;
    }

    openButton.addEventListener('click', () => handleMobileMenu('OPEN'));
    closeButton.addEventListener('click', () => handleMobileMenu('CLOSE'))
    return;
}