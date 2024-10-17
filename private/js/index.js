import { mobileMenu } from './mobileMenuOperation.js'
import { toolbarOperation } from './toolbarOperation.js';
import { formBarOperation } from './new_project_bar.js';

document.addEventListener('DOMContentLoaded', () => {
    mobileMenu();
    toolbarOperation();
    formBarOperation();
    console.log('Document Loaded.')
});





