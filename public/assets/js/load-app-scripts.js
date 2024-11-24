/**
 * This scripts are loading "app.blade.php" JS files
 * 
 * Copyright (c) 2024 Xsam Technologies and/or its affiliates. All rights reserved.
 * 
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
// Common variables
var navigator = window.navigator;
var currentLanguage = $('html').attr('lang');
var dateFormat = currentLanguage === 'fr' ? 'j M Y à H:i' : 'M j, Y \\a\\t H:i K';
var locale = currentLanguage === 'fr' ? 'fr' : 'en';
var currentUser = $('[name="kls-visitor"]').attr('content');
var currentIpAddr = $('[name="kls-ip"]').attr('content');
var currentHost = $('[name="kls-url"]').attr('content');
var apiHost = $('[name="kls-api-url"]').attr('content');
var appRef = $('[name="kls-ref"]').attr('content');
var csrfToken = $('[name="csrf-token"]').attr('content');
var headers = { 'Authorization': 'Bearer ' + appRef.split('-')[0], 'Accept': $('.mime-type').val(), 'X-localization': navigator.language };
var kulishaBrand = document.querySelectorAll('.kulisha-brand');
// Modals
var modalUser = $('#cropModal_avatar');
var modalAllowLocation = new bootstrap.Modal(document.getElementById('allowLocationModal'), { keyboard: false });
// Preview images
var retrievedAvatar = document.getElementById('retrieved_image_avatar');
var retrievedImageProfile = document.getElementById('retrieved_image_profile');
var currentImageProfile = document.querySelector('#profileImageWrapper img');
var retrievedImageCover = document.getElementById('retrieved_image_cover');
var currentImageCover = document.querySelector('#coverImageWrapper img');
var retrievedImageRecto = document.getElementById('retrieved_image_recto');
var currentImageRecto = document.querySelector('#rectoImageWrapper img');
var retrievedImageVerso = document.getElementById('retrieved_image_verso');
var currentImageVerso = document.querySelector('#versoImageWrapper img');
var cropper;
// Mobile user agent
var userAgent = navigator.userAgent;
var normalizedUserAgent = userAgent.toLowerCase();
var standalone = navigator.standalone;

var isIos = /ip(ad|hone|od)/.test(normalizedUserAgent) || navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1;
var isAndroid = /android/.test(normalizedUserAgent);
var isSafari = /safari/.test(normalizedUserAgent);
var isWebview1 = appRef.split('-')[1] != 'nai';
var isWebview2 = (isAndroid && /; wv\)/.test(normalizedUserAgent)) || (isIos && !standalone && !isSafari);

var scripts = [
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
    '/assets/js/social/functions.js',
    '/assets/addons/custom/autosize/js/autosize.min.js',
    '/assets/addons/custom/perfect-scrollbar/dist/perfect-scrollbar.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js',
    '/assets/js/load-app-scripts.js',
    '/assets/addons/social/zuck.js/dist/zuck.min.js',
    '/assets/js/classes.js',
    '/assets/js/social/zuck-stories.js',
    '/assets/js/script.app.js',
];

// Dynamically load JS files
function loadJS(url) {
    return $.getScript(currentHost + url);
}

function loadScriptsInParallel(scripts) {
    return Promise.all(scripts.map(src => {
        return new Promise((resolve, reject) => {
            const script = document.createElement('script');
            script.src = src;
            script.async = true;
            script.onload = resolve;
            script.onerror = reject;
            document.body.appendChild(script);
        });
    }));
}

function initializeComponents() {
    // Initialize dropdowns
    const dropdowns = document.querySelectorAll('[data-bs-toggle="dropdown"]');

    dropdowns.forEach(dropdown => new bootstrap.Dropdown(dropdown));
}

