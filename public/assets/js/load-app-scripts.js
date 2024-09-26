/**
 * This scripts are loading "app.blade.php" JS files
 * 
 * Copyright (c) 2024 Xsam Technologies and/or its affiliates. All rights reserved.
 * 
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
// Common variables
const navigator = window.navigator;
const currentLanguage = $('html').attr('lang');
const currentUser = $('[name="kls-visitor"]').attr('content');
const currentHost = $('[name="kls-url"]').attr('content');
const apiHost = $('[name="kls-api-url"]').attr('content');
const appRef = $('[name="kls-ref"]').attr('content');
const csrfToken = $('[name="csrf-token"]').attr('content');
const headers = { 'Authorization': 'Bearer ' + appRef.split('-')[0], 'Accept': $('.mime-type').val(), 'X-localization': navigator.language };
const kulishaBrand = document.querySelectorAll('.kulisha-brand');
// Modals
const modalUser = $('#cropModalUser');
// Preview images
const retrievedAvatar = document.getElementById('retrieved_image');
const retrievedImageProfile = document.getElementById('retrieved_image_profile');
const currentImageProfile = document.querySelector('#profileImageWrapper img');
const retrievedImageRecto = document.getElementById('retrieved_image_recto');
const currentImageRecto = document.querySelector('#rectoImageWrapper img');
const retrievedImageVerso = document.getElementById('retrieved_image_verso');
const currentImageVerso = document.querySelector('#versoImageWrapper img');
var cropper;
// Mobile user agent
const userAgent = navigator.userAgent;
const normalizedUserAgent = userAgent.toLowerCase();
const standalone = navigator.standalone;

const isIos = /ip(ad|hone|od)/.test(normalizedUserAgent) || navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1;
const isAndroid = /android/.test(normalizedUserAgent);
const isSafari = /safari/.test(normalizedUserAgent);
const isWebview1 = appRef.split('-')[1] != 'nai';
const isWebview2 = (isAndroid && /; wv\)/.test(normalizedUserAgent)) || (isIos && !standalone && !isSafari);

const scripts = [
    '/assets/addons/custom/jquery/js/jquery.min.js',
    '/assets/addons/social/bootstrap/dist/js/bootstrap.bundle.min.js',
    '/assets/addons/social/tiny-slider/dist/tiny-slider.js',
    '/assets/addons/social/pswmeter/pswmeter.min.js',
    '/assets/addons/social/OverlayScrollbars-master/js/OverlayScrollbars.min.js',
    '/assets/addons/social/choices.js/public/assets/scripts/choices.min.js',
    '/assets/addons/social/glightbox-master/dist/js/glightbox.min.js',
    '/assets/addons/social/flatpickr/dist/flatpickr.min.js',
    '/assets/addons/social/plyr/plyr.js',
    '/assets/addons/social/dropzone/dist/min/dropzone.min.js',
    '/assets/addons/social/zuck.js/dist/zuck.min.js',
    '/assets/js/social/zuck-stories.js',
    '/assets/js/social/functions.js',
    '/assets/addons/custom/autosize/js/autosize.min.js',
    '/assets/addons/custom/perfect-scrollbar/dist/perfect-scrollbar.min.js',
    '/assets/addons/custom/jquery/scroll4ever/js/jquery.scroll4ever.js',
    '/assets/js/load-app-scripts.js',
    '/assets/js/script.app.js',
];

// Dynamically load JS files
function loadJS(url) {
    return $.getScript(currentHost + url);
}

async function loadScriptsSequentially() {
    for (const script of scripts) {
        try {
            await loadJS(script);
        } catch (error) {
            console.error('Erreur lors du chargement du script:', script);
        }
    }
}

loadScriptsSequentially();
