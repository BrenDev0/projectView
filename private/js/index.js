import { mobileMenu } from './mobileMenuOperation.js'
import { activateModals } from './modalOperation.js';
import { rowOperation } from './rowOperation.js';

document.addEventListener('DOMContentLoaded', () => {
    mobileMenu();
    activateModals();
    rowOperation()
    console.log('Document Loaded.')
})





