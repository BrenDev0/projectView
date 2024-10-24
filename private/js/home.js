import { formBarOperation } from './new_project_bar.js';
import { toolbarOperation } from './toolbarOperation.js';

document.addEventListener('DOMContentLoaded', () => {
    formBarOperation();
    toolbarOperation();
    console.log('Home operations ready.')
});