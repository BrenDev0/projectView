export const mobileMenu = () =>{
    const button = document.getElementById('menu-button');

    button.addEventListener("click", handleMobileMenu)

   const  handleMobileMenu = () => {
    button.style.top == '-100%' ? button.style.top = '0' : button.style.top = '-100%';
   }
}