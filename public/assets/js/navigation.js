/**
 * Navigation
 * 
 * Copyright (c) 2024 Xsam Technologies and/or its affiliates. All rights reserved.
 * 
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
function navigate(url, element) {
    ref = element.getAttribute('data-page');

    switch (ref) {
        case 'home':
            document.title = '{{ "Kulisha / " . __("miscellaneous.menu.public.news_feed") }}'
            document.getElementById('content').innerHTML = '<div class="col-lg-3 mt-0">' +
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
                                                                        '<img src="..." class="card-img-top" alt="...">' +
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
                                                                        '<img src="..." class="card-img-top" alt="...">' +
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
                                                            '</div>';
            break;

        case 'discover':
            document.title = '{{ "Kulisha / " . __("miscellaneous.menu.discover") }}'
            document.getElementById('content').innerHTML = '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                        '</div>' +
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
                                                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
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
                                                                        '<img src="..." class="card-img-top" alt="...">' +
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
                                                            '</div>';
            break;

        case 'cart':
            document.title = '{{ "Kulisha / " . __("miscellaneous.menu.public.orders.cart.title") }}'
            document.getElementById('content').innerHTML = '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                        '</div>' +
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
                                                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
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
                                                                        '<img src="..." class="card-img-top" alt="...">' +
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
                                                            '</div>';
            break;

        case 'notification':
            document.title = '{{ "Kulisha / " . __("miscellaneous.menu.notifications.title") }}'
            document.getElementById('content').innerHTML = '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                        '</div>' +
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
                                                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
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
                                                                        '<img src="..." class="card-img-top" alt="...">' +
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
                                                            '</div>';
            break;

        case 'community':
            document.title = '{{ __("miscellaneous.menu.public.communities.title") }}'
            document.getElementById('content').innerHTML = '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                        '</div>' +
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
                                                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
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
                                                                        '<img src="..." class="card-img-top" alt="...">' +
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
                                                            '</div>';
            break;

        case 'event':
            document.title = '{{ __("miscellaneous.menu.public.events.title") }}'
            document.getElementById('content').innerHTML = '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                        '</div>' +
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
                                                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
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
                                                                        '<img src="..." class="card-img-top" alt="...">' +
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
                                                            '</div>';
            break;

        case 'message':
            document.title = '{{ __("miscellaneous.menu.messages") }}'
            document.getElementById('content').innerHTML = '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                        '</div>' +
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
                                                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
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
                                                                        '<img src="..." class="card-img-top" alt="...">' +
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
                                                            '</div>';
            break;
        default:
            break;
    }

    fetch(url).then(response => {
        if (!response.ok) {
            console.error('*****Response error: ', response.status);
            throw new Error('<?= __("notifications.network_error") ?>');
        }

        console.log('*****url: ' + url);

        return response.text();

    }).then(html => {
        // Using DOMParser to parse HTML
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');

        const extractedPart1 = doc.querySelector('#partial1').innerHTML; 
        const extractedPart2 = doc.querySelector('#partial2').innerHTML; 
        const extractedPart3 = doc.querySelector('#partial3').innerHTML; 

        let columnsHtml = '';

        if (extractedPart3) {
            if (extractedPart1) {
                columnsHtml += `<div class="col-lg-3 mt-0">${extractedPart1}</div>`;
            }

            if (extractedPart2) {
                columnsHtml += `<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">${extractedPart2}</div>`;
            }

            if (extractedPart3) {
                columnsHtml += `<div class="col-lg-3 mt-0">${extractedPart3}</div>`;
            }

        } else {
            if (extractedPart1) {
                columnsHtml += `<div class="col-lg-9 mt-0">${extractedPart1}</div>`;
            }

            if (extractedPart2) {
                columnsHtml += `<div class="col-lg-3 mt-0">${extractedPart2}</div>`;
            }
        }

        // Insert columns into main content
        document.getElementById('content').innerHTML = columnsHtml;

        // Update history
        history.pushState({ url: url }, '', url);
        // loadScriptsInParallel(scripts).then(initializeComponents);
        loadScriptsInParallel(scripts).then(() => {
            initializeComponents();
            setActiveLink(element);
        }).catch(error => {
            console.error('*****Error loading scripts: ', error);
        });

        setActiveLink(element)

    }).catch(error => {
        document.getElementById('content').innerHTML = `<div class="col-sm-6 mx-auto pt-5"><div class="mt-5 bg-image d-flex justify-content-center"><img src="/assets/img/logo.png" width="160"><div class="mask"></div></div><h1 class="mb-0 text-center">${error}</h1></div>`;
    });
}

window.onpopstate = function(event) {
    if (event.state) {
        fetch(event.state.url).then(response => {
            if (!response.ok) {
                throw new Error('<?= __("notifications.network_error") ?>');
            }

            console.log('*****event.state.url: ' + event.state.url);
            console.log('*****response.text(): ' + response.text());

            return response.text();

        }).then(html => {
            // Using DOMParser to parse HTML
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');

            const extractedPart1 = doc.querySelector('#partial1').innerHTML; 
            const extractedPart2 = doc.querySelector('#partial2').innerHTML; 
            const extractedPart3 = doc.querySelector('#partial3').innerHTML; 

            let columnsHtml = '';

            if (extractedPart3) {
                if (extractedPart1) {
                    columnsHtml += `<div class="col-lg-3 mt-0">${extractedPart1}</div>`;
                }

                if (extractedPart2) {
                    columnsHtml += `<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">${extractedPart2}</div>`;
                }

                if (extractedPart3) {
                    columnsHtml += `<div class="col-lg-3 mt-0">${extractedPart3}</div>`;
                }

            } else {
                if (extractedPart1) {
                    columnsHtml += `<div class="col-lg-9 mt-0">${extractedPart1}</div>`;
                }

                if (extractedPart2) {
                    columnsHtml += `<div class="col-lg-3 mt-0">${extractedPart2}</div>`;
                }
            }

            // Insert columns into main content
            document.getElementById('content').innerHTML = columnsHtml;

            // loadScriptsInParallel(scripts).then(initializeComponents);
            loadScriptsInParallel(scripts).then(() => {
                initializeComponents();
                setActiveLink(element);
            }).catch(error => {
                console.error('*****Error loading scripts: ', error);
            });

            setActiveLink(element)

        }).catch(error => {
            console.error('*****Error while loading data: ', error);
        });

    } else {
        document.getElementById('content').innerHTML = `<div class="col-sm-6 mx-auto pt-5"><div class="mt-5 bg-image d-flex justify-content-center"><img src="/assets/img/logo.png" width="160"><div class="mask"></div></div><h1 class="mb-0 text-center"><div class="spinner-grow" role="status"><span class="visually-hidden">Loading...</span></div></h1></div>`;
    }
};

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
    iconEvent.classList.remove( 'bi-calendar-event-fill');
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
