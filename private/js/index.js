import { mobileMenu } from './mobileMenuOperation.js'
import { activateModals } from './modalOperation.js';
import { handleFormBar } from './new_project_bar.js'
document.addEventListener('DOMContentLoaded', () => {
    mobileMenu();
    activateModals();
    handleFormBar()
    console.log('Document Loaded.')
})





