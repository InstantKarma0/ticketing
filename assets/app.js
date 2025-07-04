import './bootstrap.js';
import 'bootstrap/dist/css/bootstrap.min.css';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.scss';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉')

document.addEventListener('turbo:load', function (e) {
    // this enables bootstrap tooltips globally
    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new Tooltip(tooltipTriggerEl)
    });
});


// Bootstrap Toast Handling
const appToast = document.querySelector('#appToast')
console.log(appToast);
if (appToast) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(appToast)
    toastBootstrap.show()
}