/**
 * Navigation
 * 
 * Copyright (c) 2025 Xsam Technologies and/or its affiliates. All rights reserved.
 * 
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
function navigate(url, element) {
    var page_title;
    var placeholders;
    var ref = element.getAttribute('data-page');

    switch (ref) {
        case 'home':
            page_title = window.Laravel.lang.menu.news_feed;
            placeholders = '<div class="col-lg-3 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<img class="h-50px" src="/assets/img/cover-placeholder.png" class="card-img-top" alt>' +
                                        '<div class="card-body pt-0">' +
                                            '<div class="text-center">' +
                                                '<div class="avatar avatar-lg mt-n5 mb-3">' +
                                                    '<a><img class="avatar-img rounded border border-white border-3" src="/assets/img/avatar-placeholder.png" alt></a>' +
                                                '</div>' +
                                                '<p class="card-text placeholder-glow">' +
                                                    '<span class="placeholder col-7"></span>' +
                                                    '<span class="placeholder col-5"></span>' +
                                                '</p>' +
                                            '</div>' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-lg-3 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';
            document.title = `Kulisha / ${page_title}`;
            document.getElementById('content').innerHTML = placeholders;
            break;

        case 'discover':
            page_title = window.Laravel.lang.menu.discover;
            placeholders = '<div class="col-lg-3 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<img class="h-50px" src="/assets/img/cover-placeholder.png" class="card-img-top" alt>' +
                                        '<div class="card-body pt-0">' +
                                            '<div class="text-center">' +
                                                '<div class="avatar avatar-lg mt-n5 mb-3">' +
                                                    '<a><img class="avatar-img rounded border border-white border-3" src="/assets/img/avatar-placeholder.png" alt></a>' +
                                                '</div>' +
                                                '<p class="card-text placeholder-glow">' +
                                                    '<span class="placeholder col-7"></span>' +
                                                    '<span class="placeholder col-5"></span>' +
                                                '</p>' +
                                            '</div>' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-lg-3 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';
            document.title = `Kulisha / ${page_title}`;
            document.getElementById('content').innerHTML = placeholders;
            break;

        case 'cart':
            page_title = window.Laravel.lang.menu.orders;
            placeholders = '<div class="col-lg-3 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<img class="h-50px" src="/assets/img/cover-placeholder.png" class="card-img-top" alt>' +
                                        '<div class="card-body pt-0">' +
                                            '<div class="text-center">' +
                                                '<div class="avatar avatar-lg mt-n5 mb-3">' +
                                                    '<a><img class="avatar-img rounded border border-white border-3" src="/assets/img/avatar-placeholder.png" alt></a>' +
                                                '</div>' +
                                                '<p class="card-text placeholder-glow">' +
                                                    '<span class="placeholder col-7"></span>' +
                                                    '<span class="placeholder col-5"></span>' +
                                                '</p>' +
                                            '</div>' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-lg-3 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';
            document.title = `Kulisha / ${page_title}`;
            document.getElementById('content').innerHTML = placeholders;
            break;

        case 'notification':
            page_title = window.Laravel.lang.menu.notifications;
            placeholders = '<div class="col-lg-3 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<img class="h-50px" src="/assets/img/cover-placeholder.png" class="card-img-top" alt>' +
                                        '<div class="card-body pt-0">' +
                                            '<div class="text-center">' +
                                                '<div class="avatar avatar-lg mt-n5 mb-3">' +
                                                    '<a><img class="avatar-img rounded border border-white border-3" src="/assets/img/avatar-placeholder.png" alt></a>' +
                                                '</div>' +
                                                '<p class="card-text placeholder-glow">' +
                                                    '<span class="placeholder col-7"></span>' +
                                                    '<span class="placeholder col-5"></span>' +
                                                '</p>' +
                                            '</div>' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-lg-3 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';
            document.title = `Kulisha / ${page_title}`;
            document.getElementById('content').innerHTML = placeholders;
            break;

        case 'community':
            page_title = window.Laravel.lang.menu.communities;
            placeholders = '<div class="col-lg-3 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<img class="h-50px" src="/assets/img/cover-placeholder.png" class="card-img-top" alt>' +
                                        '<div class="card-body pt-0">' +
                                            '<div class="text-center">' +
                                                '<div class="avatar avatar-lg mt-n5 mb-3">' +
                                                    '<a><img class="avatar-img rounded border border-white border-3" src="/assets/img/avatar-placeholder.png" alt></a>' +
                                                '</div>' +
                                                '<p class="card-text placeholder-glow">' +
                                                    '<span class="placeholder col-7"></span>' +
                                                    '<span class="placeholder col-5"></span>' +
                                                '</p>' +
                                            '</div>' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-lg-3 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';
            document.title = `Kulisha / ${page_title}`;
            document.getElementById('content').innerHTML = placeholders;
            break;

        case 'event':
            page_title = window.Laravel.lang.menu.events;
            placeholders = '<div class="col-lg-3 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<img class="h-50px" src="/assets/img/cover-placeholder.png" class="card-img-top" alt>' +
                                        '<div class="card-body pt-0">' +
                                            '<div class="text-center">' +
                                                '<div class="avatar avatar-lg mt-n5 mb-3">' +
                                                    '<a><img class="avatar-img rounded border border-white border-3" src="/assets/img/avatar-placeholder.png" alt></a>' +
                                                '</div>' +
                                                '<p class="card-text placeholder-glow">' +
                                                    '<span class="placeholder col-7"></span>' +
                                                    '<span class="placeholder col-5"></span>' +
                                                '</p>' +
                                            '</div>' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-lg-3 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';
            document.title = `Kulisha / ${page_title}`;
            document.getElementById('content').innerHTML = placeholders;
            break;

        case 'message':
            page_title = window.Laravel.lang.menu.messages;
            placeholders = '<div class="col-lg-3 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<img class="h-50px" src="/assets/img/cover-placeholder.png" class="card-img-top" alt>' +
                                        '<div class="card-body pt-0">' +
                                            '<div class="text-center">' +
                                                '<div class="avatar avatar-lg mt-n5 mb-3">' +
                                                    '<a><img class="avatar-img rounded border border-white border-3" src="/assets/img/avatar-placeholder.png" alt></a>' +
                                                '</div>' +
                                                '<p class="card-text placeholder-glow">' +
                                                    '<span class="placeholder col-7"></span>' +
                                                    '<span class="placeholder col-5"></span>' +
                                                '</p>' +
                                            '</div>' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-lg-3 mt-0">' +
                                    '<div class="card" aria-hidden="true">' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title placeholder-glow">' +
                                                '<span class="placeholder col-6"></span>' +
                                            '</h5>' +
                                            '<p class="card-text placeholder-glow">' +
                                                '<span class="placeholder col-7"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-4"></span>' +
                                                '<span class="placeholder col-6"></span>' +
                                                '<span class="placeholder col-8"></span>' +
                                            '</p>' +
                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';
            document.title = `Kulisha / ${page_title}`;
            document.getElementById('content').innerHTML = placeholders;
            break;
        default:
            break;
    }

    try {
        // Update history
        history.pushState({ url: url, title: page_title, loader: placeholders }, null, url);
        // Fetch and insert content
        fetchAndInsert(url);

    } catch (error) {
        $('#content').html(`<div class="col-sm-6 mx-auto pt-5"><div class="mt-5 bg-image d-flex justify-content-center"><img src="/assets/img/logo.png" width="160"><div class="mask"></div></div><h1 class="mb-0 text-center">${error}</h1></div>`);
    }
}

window.onpopstate = function (event) {
    if (event.state) {
        var currentUrl = event.state.url;

        fetchAndInsert(currentUrl);
        document.title = `Kulisha / ${event.state.title}`;
        document.getElementById('content').innerHTML = event.state.loader;

    } else {
        document.getElementById('content').innerHTML = `<div class="col-sm-6 mx-auto pt-5"><div class="mt-5 bg-image d-flex justify-content-center"><img src="/assets/img/logo.png" width="160"><div class="mask"></div></div><h1 class="mb-0 text-center"><div class="spinner-grow" role="status"><span class="visually-hidden">Loading...</span></div></h1></div>`;
    }
};

function fetchAndInsert(href) {
    $('#content').load(`${href} #content > *`, function (response, status, xhr) {
        if (status == 'error') {
            $('#content').html(`<div class="col-sm-6 mx-auto pt-5"><div class="mt-5 bg-image d-flex justify-content-center"><img src="/assets/img/logo.png" width="160"><div class="mask"></div></div><h1 class="mb-0 text-center">${xhr.status} - ${xhr.statusText}</h1></div>`);

        } else {
            // Force a reload of styles/scripts
            loadCSSForContent();
            // loadScriptsInParallel(scripts2);
            // Reset all tooltips/popovers after loading
            initializeTooltips();
            initializePopovers();
        }
    });
}

function loadCSSForContent() {
    // Remove previous CSS
    $('link[data-content-css]').remove();

    // CSS files list
    var cssFiles = [
        currentHost + '/assets/addons/custom/font-awesome/css/all.min.css',
        currentHost + '/assets/addons/social/bootstrap-icons/bootstrap-icons.min.css',
        currentHost + '/assets/addons/social/OverlayScrollbars-master/css/OverlayScrollbars.min.css',
        currentHost + '/assets/addons/social/tiny-slider/dist/tiny-slider.css',
        currentHost + '/assets/addons/social/choices.js/public/assets/styles/choices.min.css',
        currentHost + '/assets/addons/social/glightbox-master/dist/css/glightbox.min.css',
        currentHost + '/assets/addons/social/dropzone/dist/min/dropzone.min.css',
        currentHost + '/assets/addons/social/flatpickr/dist/flatpickr.min.css',
        currentHost + '/assets/addons/custom/cropper/css/cropper.min.css',
        'https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css',
        currentHost + '/assets/addons/social/plyr/plyr.css',
        currentHost + '/assets/addons/custom/zuck.js/dist/zuck.min.css',
        currentHost + '/assets/css/social/css/style.css',
        currentHost + '/assets/css/style.custom.css',
        currentHost + '/assets/css/reactions.css'
    ];

    // Add CSS link
    cssFiles.forEach(function(cssFile) {
        var link = $('<link>', {
            rel: 'stylesheet',
            type: 'text/css',
            href: cssFile,
            'data-content-css': true  // Attribute to identify dynamically added CSS files
        });

        $('head').append(link);
    });
}

function setActiveLink(element) {
    // Retrieves the value of data-page
    const activePage = element.getAttribute('data-page');
    // All menu links
    const homeLink = document.getElementById('homeLink');
    const discoverLink = document.getElementById('discoverLink');
    const cartLink = document.getElementById('cartLink');
    const notificationLink = document.getElementById('notificationLink');
    const communityLink = document.getElementById('communityLink');
    const eventLink = document.getElementById('eventLink');
    const messageLink = document.getElementById('messageLink');
    // Each link icon
    const iconHome = homeLink.querySelector('i');
    const iconDiscover = discoverLink.querySelector('i');
    const iconCart = cartLink.querySelector('i');
    const iconNotification = notificationLink.querySelector('i');
    const iconCommunity = communityLink.querySelector('i');
    const iconEvent = eventLink.querySelector('i');
    const iconMessage = messageLink.querySelector('i');

    // Removes the "active" class from all links
    homeLink.classList.remove('active');
    discoverLink.classList.remove('active');
    cartLink.classList.remove('active');
    notificationLink.classList.remove('active');
    communityLink.classList.remove('active');
    eventLink.classList.remove('active');
    messageLink.classList.remove('active');
    // Reset the icons to their default states
    iconHome.classList.remove('bi-house-fill');
    iconHome.classList.add('bi-house');
    iconDiscover.classList.remove('bi-compass-fill');
    iconDiscover.classList.add('bi-compass');
    iconCart.classList.remove('bi-basket3-fill');
    iconCart.classList.add('bi-basket3');
    iconNotification.classList.remove('bi-bell-fill');
    iconNotification.classList.add('bi-bell');
    iconCommunity.classList.remove('bi-people-fill');
    iconCommunity.classList.add('bi-people');
    iconEvent.classList.remove('bi-calendar-event-fill');
    iconEvent.classList.add('bi-calendar-event');
    iconMessage.classList.remove('bi-chat-quote-fill');
    iconMessage.classList.add('bi-chat-quote');

    switch (activePage) {
        case 'home':
            homeLink.classList.add('active');
            iconHome.classList.add('bi-house-fill');
            iconHome.classList.remove('bi-house');
            break;

        case 'discover':
            discoverLink.classList.add('active');
            iconDiscover.classList.add('bi-compass-fill');
            iconDiscover.classList.remove('bi-compass');
            break;

        case 'cart':
            cartLink.classList.add('active');
            iconCart.classList.add('bi-basket3-fill');
            iconCart.classList.remove('bi-basket3');
            break;

        case 'notification':
            notificationLink.classList.add('active');
            iconNotification.classList.add('bi-bell-fill');
            iconNotification.classList.remove('bi-bell');
            break;

        case 'community':
            communityLink.classList.add('active');
            iconCommunity.classList.add('bi-people-fill');
            iconCommunity.classList.remove('bi-people');
            break;

        case 'event':
            eventLink.classList.add('active');
            iconEvent.classList.add('bi-calendar-event-fill');
            iconEvent.classList.remove('bi-calendar-event');
            break;

        case 'message':
            messageLink.classList.add('active');
            iconMessage.classList.add('bi-chat-quote-fill');
            iconMessage.classList.remove('bi-chat-quote');
            break;

        default:
            break;
    }
}
