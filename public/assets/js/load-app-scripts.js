/**
 * This scripts are loading "app.blade.php" JS files
 * 
 * Copyright (c) 2025 Xsam Technologies and/or its affiliates. All rights reserved.
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
var emojiRef = $('[name="kls-emoji-ref"]').attr('content');
var csrfToken = $('[name="csrf-token"]').attr('content');
var headers = { 'Authorization': 'Bearer ' + appRef, 'Accept': $('.mime-type').val(), 'X-localization': navigator.language };
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
    currentHost + '/assets/addons/custom/jquery/js/jquery.min.js',
    currentHost + '/assets/addons/social/bootstrap/dist/js/bootstrap.bundle.min.js',
    currentHost + '/assets/addons/social/tiny-slider/dist/tiny-slider.js',
    currentHost + '/assets/addons/social/pswmeter/pswmeter.min.js',
    currentHost + '/assets/addons/social/OverlayScrollbars-master/js/OverlayScrollbars.min.js',
    currentHost + '/assets/addons/social/choices.js/public/assets/scripts/choices.min.js',
    currentHost + '/assets/addons/social/glightbox-master/dist/js/glightbox.min.js',
    currentHost + '/assets/addons/social/flatpickr/dist/flatpickr.min.js',
    currentHost + '/assets/addons/social/flatpickr/dist/fr.min.js',
    currentHost + '/assets/addons/custom/cropper/js/cropper.min.js',
    currentHost + '/assets/addons/custom/quill.js/js/quill.js',
    currentHost + '/assets/addons/social/plyr/plyr.js',
    currentHost + '/assets/addons/social/dropzone/dist/min/dropzone.min.js',
    currentHost + '/assets/js/social/functions.js',
    currentHost + '/assets/addons/custom/autosize/js/autosize.min.js',
    currentHost + '/assets/addons/custom/pdf.js/js/pdf.min.js',
    currentHost + '/assets/js/load-app-scripts.js',
    currentHost + '/assets/js/classes.js',
    currentHost + '/assets/addons/social/zuck.js/dist/zuck.min.js',
    currentHost + '/assets/js/social/zuck-stories.js',
    currentHost + '/assets/js/script.app.js',
    currentHost + '/assets/js/navigation.js',
];

// Dynamically load JS files
function loadJS(url) {
    return $.getScript(url);
}

function removeExistingScripts(scripts) {
    // Select all scripts present in the DOM
    const existingScripts = document.querySelectorAll('script');

    // Browse scripts and delete existing ones
    existingScripts.forEach(script => {
        if (scripts.includes(script.src)) {
            script.remove();
        }
    });
}

function loadScriptsInParallel(scripts) {
    // Delete existing scripts before loading new ones
    removeExistingScripts(scripts);

    // Filter out scripts already loaded in the DOM
    const scriptsToLoad = scripts.filter(src => {
        return !Array.from(document.querySelectorAll('script')).some(script => script.src === src);
    });

    // Load scripts in parallel
    return Promise.all(scriptsToLoad.map(src => {
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

