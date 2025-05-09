/**
 * Custom script
 * 
 * Copyright (c) 2025 Xsam Technologies and/or its affiliates. All rights reserved.
 * 
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */

/**
 * Native functions
 * 
 * I. If the window is webview, hide some elements
 * II. Format number
 *    II.1. Format long number
 *    II.2. Format thousand number
 * III. Theme management
 *    III.1. Set theme to light
 *    III.2. Set theme to dark
 *    III.3. Set theme to auto
 * IV. Check string is numeric
 * V. Get cookie by name
 * VI. Switch between two elements visibility
 * VII. Unable "submit" button
 *    VII.1. Textarea
 *    VII.2. Files
 *    VII.3. Checkboxes
 * VIII. Remove a file from the input file
 * IX. Set location data from IpInfo
 * X. Show emojis picker in dropdown
 *    X.1. Handle shown emoji
 *    X.2. Function to retrieve emojis via an API
 * XI. Function to show PDF first page
 * XII. Bootstrap components
 *    XII.1. Tooltip
 *    XII.2. Popover
 * XIII. Function to show popover
 */
// -----------------------------------------------
// I. If the window is webview, hide some elements
// -----------------------------------------------
if (isWebview1 || isWebview2) {
    $('.detect-webview').addClass('d-none');

} else {
    $('.detect-webview').removeClass('d-none');
}

// ------------------
// II. Format number
// ----------------------------
// II.1. Format long number
// ----------------------------
function formatLongNumber(number) {
    // Make sure `number` is a number
    number = Number(number);

    // Check if conversion to number failed
    if (isNaN(number)) {
        number = 0;
    }

    var units = ['', 'k', 'm', 'b', 't'];
    var unitIndex = 0;

    // If the number is already less than 1000, we return it directly
    if (number < 1000) {
        return number;
    }

    // We continue to divide the number by 1000 until it is less than 1000
    while (number >= 1000 && unitIndex < units.length - 1) {
        number /= 1000;
        unitIndex++;
    }

    // The number is rounded to 1 digit after the decimal point for readability.
    return number.toFixed(1) + units[unitIndex];
}

// ----------------------------
// II.2. Format thousand number
// ----------------------------
function formatThousandNumber(number) {
    // Detect application language
    const locale = navigator.language || 'en'; // Use "navigator.language" to detect browser language

    if (locale === 'fr') {
        // If the language is French, use a space to separate thousands.
        return number.toLocaleString('fr-FR');
    } else {
        // By default (for English), use a comma
        return number.toLocaleString('en-US');
    }
}

// --------------------
// III. Theme management
// ------------------------
// III.1. Set theme to light
// ------------------------
function themeLight() {
    document.documentElement.setAttribute('data-bs-theme', 'light');

    for (var i = 0; i < kulishaBrand.length; i++) {
        kulishaBrand[i].setAttribute('src', currentHost + '/assets/img/brand.png');
    }

    document.cookie = "theme=light; SameSite=None; Secure";
}

// -----------------------
// III.2. Set theme to dark
// -----------------------
function themeDark() {
    document.documentElement.setAttribute('data-bs-theme', 'dark');

    for (var i = 0; i < kulishaBrand.length; i++) {
        kulishaBrand[i].setAttribute('src', currentHost + '/assets/img/brand-reverse.png');
    }

    document.cookie = "theme=dark; SameSite=None; Secure";
}

// -----------------------
// III.3. Set theme to auto
// -----------------------
function themeAuto() {
    var darkThemeMq = window.matchMedia("(prefers-color-scheme: dark)");

    if (darkThemeMq.matches) {
        document.documentElement.setAttribute('data-bs-theme', 'dark');

        for (var i = 0; i < kulishaBrand.length; i++) {
            kulishaBrand[i].setAttribute('src', currentHost + '/assets/img/brand-reverse.png');
        }

    } else {
        document.documentElement.setAttribute('data-bs-theme', 'light');

        for (var i = 0; i < kulishaBrand.length; i++) {
            kulishaBrand[i].setAttribute('src', currentHost + '/assets/img/brand.png');
        }
    }

    document.cookie = "theme=auto; SameSite=None; Secure";
}

// ----------------------------
// IV. Check string is numeric
// ----------------------------
function isNumeric(str) {
    if (typeof str != "string") {
        return false
    } // we only process strings!

    return !isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
        !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
}

// ----------------------
// V. Get cookie by name
// ----------------------
function getCookie(cname) {
    var name = cname + '=';
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');

    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];

        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }

        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }

    return '';
}

// -----------------------------------------
// VI. Switch between two elements visibility
// -----------------------------------------
function switchDisplay(current, form_id, element1, element2, message1, message2) {
    var _form = document.getElementById(form_id);
    var el1 = document.getElementById(element1);
    var el2 = document.getElementById(element2);

    _form.reset();
    el1.classList.toggle('d-none');
    el2.classList.toggle('d-none');

    if (el1.classList.contains('d-none')) {
        current.innerHTML = message1;
    }

    if (el2.classList.contains('d-none')) {
        current.innerHTML = message2;
    }
}

// -------------------------
// VII. Unable "submit" button
// -------------------------
// VII.1. Textarea
// -------------
function toggleSubmitText(element, ref) {
    if (ref === 'post') {
        var imagesFiles = document.getElementById('imagesInput');
        var documentsFiles = document.getElementById('documentsInput');

        if (element.value.trim() === '' && imagesFiles.files.length === 0 && documentsFiles.files.length === 0) {
            $('#newPost .send-post').removeClass('btn-primary').addClass('btn-primary-soft').addClass('disabled');

        } else {
            $('#newPost .send-post').removeClass('disabled').removeClass('btn-primary-soft').addClass('btn-primary');
        }
    }

    if (ref === 'event') {
        // Checks if at least one box is checked
        var elem = document.getElementById(element);
        var details = document.getElementById('event_descritpion');
        var anyChecked = $('#choose_fields .form-check-input:checked').length > 0;

        if (elem.value.trim() === '' || details.value.trim() === '' || anyChecked) {
            $('#newEvent .send-event').removeClass('btn-primary').addClass('btn-primary-soft').addClass('disabled');

        } else {
            $('#newEvent .send-event').removeClass('disabled').removeClass('btn-primary-soft').addClass('btn-primary');
        }
    }
}

// ----------
// VII.2. Files
// ----------
function toggleSubmitFiles(element_id) {
    var elem = document.getElementById(element_id);
    var imagesFiles = document.getElementById('imagesInput');
    var documentsFiles = document.getElementById('documentsInput');
    var textarea = document.getElementById('post-textarea');

    if (element_id === 'imagesInput') {
        if (textarea.value.trim() === '' && elem.files.length === 0 && documentsFiles.files.length === 0) {
            $('#newPost .send-post').removeClass('btn-primary').addClass('btn-primary-soft').addClass('disabled');
        } else {
            $('#newPost .send-post').removeClass('disabled').removeClass('btn-primary-soft').addClass('btn-primary');
        }
    }

    if (element_id === 'documentsInput') {
        if (textarea.value.trim() === '' && elem.files.length === 0 && imagesFiles.files.length === 0) {
            $('#newPost .send-post').removeClass('btn-primary').addClass('btn-primary-soft').addClass('disabled');
        } else {
            $('#newPost .send-post').removeClass('disabled').removeClass('btn-primary-soft').addClass('btn-primary');
        }
    }
}

// ---------------
// VII.3. Checkboxes
// ---------------
function toggleSubmitCheckboxes(checkboxesWrapperId, submitButtonId) {
    // Checks if at least one box is checked
    var anyChecked = $(`#${checkboxesWrapperId} .form-check-input:checked`).length > 0;

    // If at least one box is checked, activates the button (removes the "disabled" class)
    if (anyChecked) {
        $(`#${submitButtonId}`).removeClass('disabled').removeClass('btn-primary-soft').addClass('btn-primary');

        // Otherwise, disable the button (add the class "disabled")
    } else {
        $(`#${submitButtonId}`).addClass('disabled').removeClass('btn-primary').addClass('btn-primary-soft');
    }
}

// -------------------------------------
// VIII. Remove a file from the input file
// -------------------------------------
function removeFileFromInput(file, element) {
    var input = $(element)[0];
    var files = Array.from(input.files);
    var newFiles = files.filter(function (f) {
        return f !== file;
    });

    // Resetting the input file with remaining files
    var dataTransfer = new DataTransfer();

    newFiles.forEach(function (f) {
        dataTransfer.items.add(f);
    });
    input.files = dataTransfer.files;
}

// ----------------------------------
// IX. Set location data from IpInfo
// ----------------------------------
function handleLocationData(data) {
    // Extract information from JSON
    var location = data.loc.split(',');  // Separate latitude and longitude
    var latitude = location[0];
    var longitude = location[1];
    var city = data.city;
    var region = data.region;
    var country = data.country_name;

    // Update hidden inputs
    $('#latitude').val(latitude);
    $('#longitude').val(longitude);
    $('#city').val(city);
    $('#region').val(region);
    $('#country').val(country);

    // Show information in div
    $('#locationInfo').html(`<h5 class="h5 m-0">${city}</h5><p class="m-0">${country}</p>`);
}

// -----------------------------------
// X. Show emojis picker in dropdown
// -----------------------------------
// X.1. Handle shown emoji
// ------------------------
function handleEmoji(buttonId, inputId, submitId) {
    var emojiButton = document.getElementById(buttonId);
    var emojiInput = document.getElementById(inputId);
    var emojiDropdown = document.getElementById('emojiDropdown');
    var submitButton = document.querySelector(submitId);

    // Show or hide emoji dropdown
    emojiButton.addEventListener('click', function () {
        if (emojiDropdown.style.display === 'block') {
            emojiDropdown.style.display = 'none';
        } else {
            emojiDropdown.style.display = 'block';
            loadEmojis(emojiDropdown, emojiInput, submitButton); // Load emojis when menu is displayed
        }
    });

    // Hide emoji dropdown if user clicks elsewhere
    document.addEventListener('click', function (event) {
        if (!emojiButton.contains(event.target) && !emojiDropdown.contains(event.target)) {
            emojiDropdown.style.display = 'none';
        }
    });
}

// --------------------------------------------
// X.2. Function to retrieve emojis via an API
// --------------------------------------------
function loadEmojis(emojiDropdown, emojiInput, submitButton) {
    var emojiAPI = `https://emoji-api.com/emojis?access_key=${emojiRef}`;

    fetch(emojiAPI).then(response => response.json()).then(data => {
        emojiDropdown.innerHTML = ''; // Empty the dropdown before filling it
        data.forEach(emoji => {
            var emojiElem = document.createElement('span');

            emojiElem.style.display = 'inline-block';
            emojiElem.style.margin = '3px';
            emojiElem.classList.add('emoji');
            emojiElem.textContent = emoji.character;
            emojiElem.setAttribute('data-emoji', emoji.character);
            emojiDropdown.appendChild(emojiElem);

            // Add an event to insert the emoji into the textarea
            emojiElem.addEventListener('click', function () {
                var emojiCharacter = emoji.character;
                var emojiInputElem = emojiInput; // Référence à votre textarea

                // On récupère la position actuelle du curseur
                var cursorPos = emojiInputElem.selectionStart;
                var textBefore = emojiInputElem.value.substring(0, cursorPos);
                var textAfter = emojiInputElem.value.substring(cursorPos);

                // Insérer l'émoji à la position du curseur
                emojiInputElem.value = textBefore + emojiCharacter + textAfter;

                // Déplace le curseur juste après l'émoji inséré
                emojiInputElem.selectionStart = emojiInputElem.selectionEnd = cursorPos + emojiCharacter.length;

                if ($(submitButton).hasClass('disabled')) {
                    $(submitButton).removeClass('disabled').removeClass('btn-primary-soft').addClass('btn-primary');
                }
            });
        });
    }).catch(error => console.error(`${window.Laravel.lang.error_label} ${error}`));
}

// ----------------------------------
// XI. Function to show PDF first page
// ----------------------------------
function loadPDFPreview(fileUrl, index) {
    var canvas = document.getElementById(`canvas-${index}`);

    if (!canvas) {
        console.error(`Canvas with id canvas-${index} not found`);

        return;
    }

    var ctx = canvas.getContext('2d');

    // Using PDF.js to retrieve PDF
    pdfjsLib.getDocument(fileUrl).promise.then(function (pdf) {
        // Retrieve the first page of the PDF
        pdf.getPage(1).then(function (page) {
            var scale = 0.5; // Ajuster la taille de la vignette
            var viewport = page.getViewport({ scale: scale });

            // Set canvas size according to page
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Render PDF page to canvas
            page.render({
                canvasContext: ctx,
                viewport: viewport
            }).promise.then(function () {
                // Rendering is complete, the thumbnail is now ready
                console.log('PDF overview loaded');
            });
        });
    }).catch(function (error) {
        console.error(`PDF loading error: ${error}`);
    });
}

// -------------------------
// XII. Bootstrap components
// -------------------------
// XII.1. Tooltip
// -------------------------
function initializeTooltips() {
    if (typeof bootstrap !== 'undefined') {
        // Disable all existing tooltips before resetting
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));

        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            var tooltipInstance = bootstrap.Tooltip.getInstance(tooltipTriggerEl); // Retrieves the existing instance

            if (tooltipInstance) {
                tooltipInstance.dispose(); // Disables the existing tooltip
            }
        });

        // Reset all tooltips
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
}

// -------------------------
// XII.2. Popover
// -------------------------
function initializePopovers() {
    if (typeof bootstrap !== 'undefined') {
        // Disable all existing popovers before resetting
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));

        popoverTriggerList.forEach(function (popoverTriggerEl) {
            var popoverInstance = bootstrap.Popover.getInstance(popoverTriggerEl); // Retrieves the existing instance

            if (popoverInstance) {
                popoverInstance.dispose(); // Disables the existing popover
            }
        });

        // Reset all popovers
        popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
    }
}

// ----------------------------
// XIII. Function to show popover
// ----------------------------
function popoverOnHover(entity, elementsSelector) {
    if (entity === 'user') {
        var userInfos = document.querySelectorAll(elementsSelector);

        userInfos.forEach(function (link) {
            var popover = null; // Reference to popover
            var timeoutId = null; // ID for timeout (to delay the disappearance)
            var isMouseOverPopover = false; // Indicator if mouse is over popover

            // On hover over the link, create and show the popover
            link.addEventListener('mouseenter', function () {
                var userId = link.getAttribute('data-user-id');

                // Check if a popover already exists, if it exists, delete it
                if (popover) {
                    popover.hide();
                    popover = null; // Reset reference
                }

                // Fetch user data via AJAX
                fetch(`${apiHost}/user/${userId}`)
                    .then(response => response.json())
                    .then(res => {
                        if (!res.success) {
                            console.error(res.message);
                            return;
                        }

                        async function getFollowerStatus() {
                            try {
                                var response = await $.ajax({
                                    headers: headers,
                                    method: 'GET',
                                    contentType: 'application/json',
                                    url: `${apiHost}/subscription/is_connected_as/${currentUser}/${res.data.id}/follower`
                                });

                                return response.data;

                            } catch (error) {
                                console.error(`Is follower error: ${error}`);
                            }
                        }

                        async function createPopoverContent() {
                            try {
                                // Wait for follower status to be recovered
                                var followerStatus = await getFollowerStatus();
                                // Create the popover content with the fetched data
                                var popoverContent = `<div class="card overflow-hidden bg-transparent border-0">
                                                            <div class="card-body p-0">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-lg mb-3 me-2">
                                                                        <a><img class="avatar-img rounded-circle" src="${res.data.profile_photo_path}" alt></a>
                                                                    </div>

                                                                    <div>
                                                                        <h5 class="mb-0"> <a>${res.data.firstname} ${res.data.lastname}</a></h5>
                                                                        <small>@${res.data.username}</small>
                                                                        <p class="card-text mt-1 mb-0 small">${res.data.about_me || ''}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="hstack gap-2 gap-xl-3 justify-content-center text-center">
                                                                    <div class="flex-fill">
                                                                        <h6 class="mb-0 small">${formatLongNumber(res.data.regular_posts.length)}</h6>
                                                                        <small class="kls-fs-7">${res.data.regular_posts.length > 1 ? window.Laravel.lang.public.profile.statistics.posts : window.Laravel.lang.public.profile.statistics.post}</small>
                                                                    </div>
                                                                    <div class="vr" style="z-index: 9999;"></div>
                                                                        <div class="flex-fill">
                                                                            <h6 class="mb-0 small">${formatLongNumber(res.data.followers.length)}</h6>
                                                                            <small class="kls-fs-7">${res.data.followers.length > 1 ? window.Laravel.lang.public.profile.statistics.followers : window.Laravel.lang.public.profile.statistics.follower}</small>
                                                                        </div>
                                                                        <div class="vr" style="z-index: 9999;"></div>
                                                                            <div class="flex-fill">
                                                                                <h6 class="mb-0 small">${formatLongNumber(res.data.following.length)}</h6>
                                                                                <small class="kls-fs-7">${res.data.following.length > 1 ? window.Laravel.lang.public.profile.statistics.followings : window.Laravel.lang.public.profile.statistics.following}</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>`;

                                if (res.data.id != parseInt(currentUser)) {
                                    popoverContent += `<div class="d-flex mt-3">
                                                            <a role="button" class="btn btn-sm ${followerStatus === 1 ? 'btn-primary' : 'btn-primary-soft'} flex-fill rounded follow-button me-2" data-user-id="${res.data.id}">
                                                                <i class="${followerStatus === 1 ? 'bi bi-person-check-fill' : 'fa-solid fa-plus'} me-2"></i>${followerStatus === 1 ? window.Laravel.lang.followed : window.Laravel.lang.follow}
                                                            </a>
                                                            <a href="${currentHost}/messages/${res.data.id}" class="btn btn-sm btn-secondary-soft flex-fill rounded">
                                                                <i class="bi bi-chat-quote me-2"></i>${window.Laravel.lang.message}
                                                            </a>
                                                        </div>`;

                                }

                                if (res.data.id == parseInt(currentUser)) {
                                    popoverContent += `<div class="mt-3">
                                                            <a href="${currentHost}/${res.data.username}" class="btn btn-sm btn-primary w-100 rounded">${window.Laravel.lang.menu.profile.title}</a>
                                                        </div>`;
                                }

                                popoverContent += `</div>
                                                </div>`;

                                // Initialize the popover
                                popover = new bootstrap.Popover(link, {
                                    container: 'body',
                                    html: true,
                                    content: popoverContent,
                                });

                                popover.show();

                            } catch (error) {
                                console.error(`Error creating popover : ${error}`);
                            }
                        }

                        // Call the function to display the popover
                        createPopoverContent();
                    })
                    .catch(error => {
                        console.error(`Get user error: ${error}`);
                    });
            });

            // When mouse leaves the link, we set a timeout to hide the popover
            link.addEventListener('mouseleave', function () {
                // If a timeout is in progress, clear it to avoid hiding the popover immediately
                if (timeoutId) {
                    clearTimeout(timeoutId);
                }

                // Delay to hide the popover (500ms)
                timeoutId = setTimeout(() => {
                    if (popover && !isMouseOverPopover) {
                        popover.hide();
                        popover = null; // Reset reference
                    }
                }, 500);
            });

            // Detect when mouse enters the popover to keep the popover visible
            document.body.addEventListener('mouseenter', function (e) {
                if (popover && e.target.closest('.popover') === popover.tip) {
                    isMouseOverPopover = true;
                }
            });

            // When mouse leaves both the link and the popover, we hide the popover after a delay
            document.body.addEventListener('mouseleave', function (e) {
                if (popover && !popover.tip.contains(e.target) && !link.contains(e.target)) {
                    isMouseOverPopover = false;

                    timeoutId = setTimeout(() => {
                        if (!isMouseOverPopover) {
                            popover.hide();
                            popover = null; // Reset reference
                        }
                    }, 500); // Delay of 500ms
                }
            });
        });
    }
}

/**
 * jQuery scripts
 * 
 * I. Miscellaneous
 * II. Auto-resize textarea
 * III. On select change, update de country phone code
 * IV. On check, show/hide some blocs
 *    V.1. Transaction type
 * V. Theme management
 *    V.1. Default facts
 *    V.2. User chooses light
 *    V.3. User chooses dark
 * VI. Crop image and send
 *    VI.1. Avatar with ajax
 *    VI.2. Avatar without ajax
 *    VI.3. Cover without ajax
 *    VI.4. ID card recto without ajax
 *    VI.5. ID card verso without ajax
 * VII. Toggle post type
 * VIII. Toggle visibility
 * IX. Upload file
 *    IX.1. Images
 *    IX.2. Documents
 * X. Location detection
 * XI. Date/Time picker
 * XII. Choose speakers
 * XIII. Handle poll
 * XIV. Handle anonymous question
 * XV. Send post
 * XVI. Reactions
 */
$(function () {
    // ----------------
    // I. Miscellaneous
    // ----------------
    $('.navbar, .card, .btn').addClass('shadow-0');
    $('.btn').css({ textTransform: 'inherit', paddingBottom: '0.5rem' });
    $('.back-to-top').click(function (e) {
        $("html, body").animate({ scrollTop: '0' });
    });

    // ------------------------
    // II. Auto-resize textarea
    // ------------------------
    autosize($('textarea'));

    // --------------------------------------------------
    // III. On select change, update de country phone code
    // --------------------------------------------------
    $('#select_country').on('change', function () {
        var countryData = $(this).val();
        var countryDataArray = countryData.split('-');
        // Get ID and Phone code from splitted data
        var countryId = countryDataArray[1];
        var countryPhoneCode = countryDataArray[0];

        $('#phone_code_text .text-value').text(countryPhoneCode);
        $('#country_id').val(countryId);
        $('#phone_code').val(countryPhoneCode);
    });

    // ---------------------------------
    // IV. On check, show/hide some blocs
    // ---------------------------------
    // IV.1. Transaction type
    // ---------------------
    $('#paymentMethod .form-check-input').each(function () {
        $(this).on('click', function () {
            if ($('#bank_card').is(':checked')) {
                $('#phoneNumberForMoney').addClass('d-none');

            } else {
                $('#phoneNumberForMoney').removeClass('d-none');
            }
        });
    });

    // --------------------
    // V. Theme management
    // --------------------
    // V.1. Default facts
    // -------------------
    if (isNumeric(currentUser)) {
        $.ajax({
            headers: headers,
            type: 'GET',
            contentType: 'application/json',
            url: apiHost + '/user/' + parseInt(currentUser),
            success: function (result) {
                if (result.data.prefered_theme !== null) {
                    if (result.data.prefered_theme === 'Dark') {
                        themeDark();

                    } else {
                        if (result.data.prefered_theme === 'Light') {
                            themeLight();
                        } else {
                            themeAuto();
                        }
                    }

                } else {
                    themeAuto();
                }
            },
            error: function (xhr, error, status_description) {
                console.log(xhr.responseJSON);
                console.log(xhr.status);
                console.log(error);
                console.log(status_description);
            }
        });

    } else {
        if (getCookie('theme') === 'Dark') {
            themeDark();

        } else {
            if (getCookie('theme') === 'Light') {
                themeLight();
            } else {
                themeAuto();
            }
        }
    }

    // ------------------------
    // V.2. User chooses light
    // ------------------------
    $('#themeToggler .light').on('click', function (e) {
        e.preventDefault();
        $('#themeToggler .current-theme').html('<i class="bi bi-sun"></i>');
        themeLight();

        // If user is connected, set is theme preference
        if (isNumeric(currentUser)) {
            themeLight();

            $.ajax({
                headers: headers,
                type: 'PUT',
                contentType: 'application/json',
                url: apiHost + '/user/' + currentUser,
                data: JSON.stringify({ 'id': currentUser, 'prefered_theme': 'Light' }),
                success: function () {
                    $(this).unbind('click');
                    e.stopPropagation();
                    e.stopImmediatePropagation();
                },
                error: function (xhr, error, status_description) {
                    console.log(xhr.responseJSON);
                    console.log(xhr.status);
                    console.log(error);
                    console.log(status_description);
                }
            });
        }
    });

    // -----------------------
    // V.3. User chooses dark
    // -----------------------
    $('#themeToggler .dark').on('click', function (e) {
        e.preventDefault();
        $('#themeToggler .current-theme').html('<i class="bi bi-moon-fill"></i>');
        themeDark();

        // If user is connected, set is theme preference
        if (isNumeric(currentUser)) {
            $.ajax({
                headers: headers,
                type: 'PUT',
                contentType: 'application/json',
                url: apiHost + '/user/' + currentUser,
                data: JSON.stringify({ 'id': currentUser, 'prefered_theme': 'Dark' }),
                success: function () {
                    $(this).unbind('click');
                    e.stopPropagation();
                    e.stopImmediatePropagation();
                },
                error: function (xhr, error, status_description) {
                    console.log(xhr.responseJSON);
                    console.log(xhr.status);
                    console.log(error);
                    console.log(status_description);
                }
            });
        }
    });

    // -----------------------
    // V.4. User chooses auto
    // -----------------------
    $('#themeToggler .auto').on('click', function (e) {
        e.preventDefault();
        $('#themeToggler .current-theme').html('<i class="bi bi-circle-half"></i>');
        themeAuto();

        // If user is connected, set is theme preference
        if (isNumeric(currentUser)) {
            $.ajax({
                headers: headers,
                type: 'PUT',
                contentType: 'application/json',
                url: apiHost + '/user/' + currentUser,
                data: JSON.stringify({ 'id': currentUser, 'prefered_theme': 'Auto' }),
                success: function () {
                    $(this).unbind('click');
                    e.stopPropagation();
                    e.stopImmediatePropagation();
                },
                error: function (xhr, error, status_description) {
                    console.log(xhr.responseJSON);
                    console.log(xhr.status);
                    console.log(error);
                    console.log(status_description);
                }
            });
        }
    });

    // ------------------------
    // VI. Crop image and send
    // ------------------------
    // VI.1. Avatar with ajax
    // -----------------------
    $('#avatar').on('change', function (e) {
        var files = e.target.files;
        var done = function (url) {
            retrievedAvatar.src = url;
            var modal = new bootstrap.Modal(document.getElementById('cropModal_avatar'), { keyboard: false });

            modal.show();
        };

        if (files && files.length > 0) {
            var reader = new FileReader();

            reader.onload = function () {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $(modalUser).on('shown.bs.modal', function () {
        cropper = new Cropper(retrievedAvatar, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '#cropModal_avatar .preview',
            done: function (data) { console.log(data); },
            error: function (data) { console.log(data); }
        });

    }).on('hidden.bs.modal', function () {
        cropper.destroy();

        cropper = null;
    });

    $('#cropModal_avatar #crop_avatar').click(function () {
        // Ajax loading image to tell user to wait
        $('.user-image').attr('src', currentHost + '/assets/img/ajax-loading.gif');

        var canvas = cropper.getCroppedCanvas({
            width: 700,
            height: 700
        });

        canvas.toBlob(function (blob) {
            URL.createObjectURL(blob);

            var reader = new FileReader();

            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64_data = reader.result;
                var mUrl = apiHost + '/user/update_avatar_picture/' + parseInt(currentUser);
                var datas = JSON.stringify({ 'id': parseInt(currentUser), 'user_id': currentUser, 'image_64': base64_data });

                $.ajax({
                    headers: headers,
                    type: 'PUT',
                    contentType: 'application/json',
                    url: mUrl,
                    dataType: 'json',
                    data: datas,
                    success: function (res) {
                        $('.user-image').attr('src', res);
                        location.reload(true);
                    },
                    error: function (xhr, error, status_description) {
                        console.log(xhr.responseJSON);
                        console.log(xhr.status);
                        console.log(error);
                        console.log(status_description);
                    }
                });
            };
        });
    });

    // --------------------------
    // VI.2. Avatar without ajax
    // --------------------------
    $('#image_profile').on('change', function (e) {
        var files = e.target.files;
        var done = function (url) {
            retrievedImageProfile.src = url;
            var modal = new bootstrap.Modal(document.getElementById('cropModal_profile'), { keyboard: false });

            modal.show();
        };

        if (files && files.length > 0) {
            var reader = new FileReader();

            reader.onload = function () {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $('#cropModal_profile').on('shown.bs.modal', function () {
        cropper = new Cropper(retrievedImageProfile, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '#cropModal_profile .preview'
        });

    }).on('hidden.bs.modal', function () {
        cropper.destroy();

        cropper = null;
    });

    $('#cropModal_profile #crop_profile').on('click', function () {
        var canvas = cropper.getCroppedCanvas({
            width: 700,
            height: 700
        });

        canvas.toBlob(function (blob) {
            URL.createObjectURL(blob);
            var reader = new FileReader();

            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64_data = reader.result;

                $(currentImageProfile).attr('src', base64_data);
                $('#data_profile').attr('value', base64_data);
            };
        });
    });

    // --------------------------
    // VI.3. Cover without ajax
    // --------------------------
    $('#image_cover').on('change', function (e) {
        var files = e.target.files;
        var done = function (url) {
            retrievedImageCover.src = url;
            var modal = new bootstrap.Modal(document.getElementById('cropModal_cover'), { keyboard: false });

            modal.show();
        };

        if (files && files.length > 0) {
            var reader = new FileReader();

            reader.onload = function () {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $('#cropModal_cover').on('shown.bs.modal', function () {
        cropper = new Cropper(retrievedImageCover, {
            aspectRatio: 2.39 / 1,
            viewMode: 3,
            preview: '#cropModal_cover .preview'
        });

        $('#newEventModal').css('z-index', '1040');
        $(this).css('z-index', '1060');

    }).on('hidden.bs.modal', function () {
        cropper.destroy();

        cropper = null;

        $('#newEventModal').css('z-index', '1060');
        $(this).css('z-index', '1040');
    });

    $('#cropModal_cover #crop_cover').on('click', function () {
        var canvas = cropper.getCroppedCanvas({
            width: 1672,
            height: 700
        });

        canvas.toBlob(function (blob) {
            URL.createObjectURL(blob);
            var reader = new FileReader();

            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64_data = reader.result;

                $(currentImageCover).attr('src', base64_data);
                $('#data_cover').attr('value', base64_data);
            };
        });
    });

    // ---------------------------------
    // VI.4. ID card recto without ajax
    // ---------------------------------
    $('#image_recto').on('change', function (e) {
        var files = e.target.files;
        var done = function (url) {
            retrievedImageRecto.src = url;
            var modal = new bootstrap.Modal(document.getElementById('cropModal_recto'), { keyboard: false });

            modal.show();
        };

        if (files && files.length > 0) {
            var reader = new FileReader();

            reader.onload = function () {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $('#cropModal_recto').on('shown.bs.modal', function () {
        cropper = new Cropper(retrievedImageRecto, {
            aspectRatio: 4 / 3,
            viewMode: 3,
            preview: '#cropModal_recto .preview'
        });

    }).on('hidden.bs.modal', function () {
        cropper.destroy();

        cropper = null;
    });

    $('#cropModal_recto #crop_recto').on('click', function () {
        var canvas = cropper.getCroppedCanvas({
            width: 1280,
            height: 960
        });

        canvas.toBlob(function (blob) {
            URL.createObjectURL(blob);
            var reader = new FileReader();

            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64_data = reader.result;

                $(currentImageRecto).attr('src', base64_data);
                $('#data_recto').attr('value', base64_data);
            };
        });
    });

    // ---------------------------------
    // VI.5. ID card verso without ajax
    // ---------------------------------
    $('#image_verso').on('change', function (e) {
        var files = e.target.files;
        var done = function (url) {
            retrievedImageVerso.src = url;
            var modal = new bootstrap.Modal(document.getElementById('cropModal_verso'), { keyboard: false });

            modal.show();
        };

        if (files && files.length > 0) {
            var reader = new FileReader();

            reader.onload = function () {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $('#cropModal_verso').on('shown.bs.modal', function () {
        cropper = new Cropper(retrievedImageVerso, {
            aspectRatio: 4 / 3,
            viewMode: 3,
            preview: '#cropModal_verso .preview'
        });

    }).on('hidden.bs.modal', function () {
        cropper.destroy();

        cropper = null;
    });

    $('#cropModal_verso #crop_verso').on('click', function () {
        var canvas = cropper.getCroppedCanvas({
            width: 1280,
            height: 960
        });

        canvas.toBlob(function (blob) {
            URL.createObjectURL(blob);
            var reader = new FileReader();

            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64_data = reader.result;

                $(currentImageVerso).attr('src', base64_data);
                $('#data_verso').attr('value', base64_data);
            };
        });
    });

    // -----------------
    // VII. Toggle post type
    // -----------------
    $('#newPostType .form-check').each(function () {
        $(this).on('click', function () {
            $('[id^="check-category-"]').prop('checked', false);

            if ($('#postService').is(':checked')) {
                $('#serviceCategories, .service-type-title').removeClass('d-none');
                $('#productCategories, .product-type-title').addClass('d-none');

            } else {
                $('#serviceCategories, .service-type-title').addClass('d-none');
                $('#productCategories, .product-type-title').removeClass('d-none');
            }
        });
    });

    // ------------------
    // VIII. Toggle visibility
    // ------------------
    $('#visibility li a').each(function () {
        $(this).on('click', function () {
            var _this = $(this);
            var isChecked = $(this).find('.is-checked');
            var alias = $(this).data('alias');
            var visibilityIcon = $(this).attr('data-icon');
            var visibilityData = $(this).attr('id');
            var visibilityDataArray = visibilityData.split('-');

            // If exception exist, check excepted users before switching visibility
            if (alias === 'everybody_except' || alias === 'nobody_except') {
                // Create an instance of the User class
                var action = 'restrictions-among-users';
                var currentModalId = 'modalSelectRestrictions';
                var apiURL = `${apiHost}/subscription/user_subscribers/${currentUser}`;
                var userListId = 'modalSelectRestrictions .users-list';
                var loadingSpinnerId = 'modalSelectRestrictions .loading-spinner';
                var userModal = new User(action, currentModalId, apiURL, userListId, loadingSpinnerId);

                // Open the modal and load users
                userModal.openModal();

                $('form#chooseFollowers').submit(function (e) {
                    e.preventDefault();

                    var formData = new FormData(this);
                    var followers = [];

                    // Retrieving selected checkboxes
                    document.querySelectorAll('[name="followers_ids"]:checked').forEach(item => {
                        // Collection of data associated with each user
                        var follower = {
                            id: parseInt(item.value),
                            firstname: item.dataset.firstname,
                            lastname: item.dataset.lastname,
                            avatar: item.dataset.avatar
                        };

                        // Adding user to followers ARRAY
                        followers.push(follower);
                    });

                    // Adding data to FormData
                    followers.forEach((follower, i) => {
                        formData.append('followers_ids[' + i + '][id]', follower.id);
                        formData.append('followers_ids[' + i + '][firstname]', follower.firstname);
                        formData.append('followers_ids[' + i + '][lastname]', follower.lastname);
                        formData.append('followers_ids[' + i + '][avatar]', follower.avatar);
                    });

                    // Limit display to 3 users
                    var htmlContent = '<input type="hidden" name="restrict-users" id="restrict-users" value="' + followers.map(f => f.id).join(',') + '">';

                    htmlContent += '<div class="d-flex flex-row">';

                    // Showing the first 3 users
                    for (var i = 0; i < Math.min(3, followers.length); i++) {
                        var follower = followers[i];

                        htmlContent += `<div class="restrict-user-${i + 1}">
                                                        <img src="${follower.avatar}" alt="${follower.firstname} ${follower.lastname}" width="30" class="rounded-circle me-1" title="${follower.firstname} ${follower.lastname}">
                                                    </div>`;
                    }

                    // If there are more than 3 users, display the remaining number
                    if (followers.length > 3) {
                        var remainingCount = followers.length - 3;

                        htmlContent += `<p class="m-0 ms-1">
                                                        <span class="btn btn-light px-2 pt-1 pb-0 rounded-pill">+${remainingCount}</span>
                                                    </p>`;
                    }

                    htmlContent += '</div>';

                    // Add generated content to ".users-list"
                    $('#restrictions .users-list').html(htmlContent);
                    $('#restrictions').removeClass('d-none');

                    // Set selected link to "active"
                    $('#visibility li a .is-checked').removeClass('opacity-100').addClass('opacity-0');
                    isChecked.removeClass('opacity-0').addClass('opacity-100');
                    $('#visibility li a').removeClass('active');
                    _this.addClass('active');

                    // Change visibility icon at the toggle button
                    $('#post-visibility').val(visibilityDataArray[1]);
                    $('#toggleVisibility').html(`<i class="${visibilityIcon} fs-6"></i>`);
                    // Disable submit button after sending
                    $('#sendCheckedUsers1').addClass('disabled').removeClass('btn-primary').addClass('btn-primary-soft');
                });

                // Otherwise, switch visibility directly
            } else {
                // Set selected link to "active"
                $('#visibility li a .is-checked').removeClass('opacity-100').addClass('opacity-0');
                isChecked.removeClass('opacity-0').addClass('opacity-100');
                $('#visibility li a').removeClass('active');
                $(this).addClass('active');

                // Change visibility icon at the toggle button
                $('#post-visibility').val(visibilityDataArray[1]);
                $('#toggleVisibility').html(`<i class="${visibilityIcon} fs-6"></i>`);

                if (!$('#restrictions').hasClass('d-none')) {
                    $('#restrictions .users-list').html('');
                    $('#restrictions').addClass('d-none');
                }
            }
        });
    });

    $('#retry-select-restrictions').click(function (e) {
        e.preventDefault();

        // Create an instance of the User class
        var action = 'restrictions-among-users';
        var currentModalId = 'modalSelectRestrictions';
        var apiURL = `${apiHost}/subscription/user_subscribers/${currentUser}`;
        var userListId = 'modalSelectRestrictions .users-list';
        var loadingSpinnerId = 'modalSelectRestrictions .loading-spinner';
        var userModal = new User(action, currentModalId, apiURL, userListId, loadingSpinnerId);

        // Open the modal and load users
        userModal.openModal();

        $('form#chooseFollowers').submit(function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            var followers = [];

            // Retrieving selected checkboxes
            document.querySelectorAll('[name="followers_ids"]:checked').forEach(item => {
                // Collection of data associated with each user
                var follower = {
                    id: parseInt(item.value),
                    firstname: item.dataset.firstname,
                    lastname: item.dataset.lastname,
                    avatar: item.dataset.avatar
                };

                // Adding user to followers ARRAY
                followers.push(follower);
            });

            // Adding data to FormData
            followers.forEach((follower, i) => {
                formData.append('followers_ids[' + i + '][id]', follower.id);
                formData.append('followers_ids[' + i + '][firstname]', follower.firstname);
                formData.append('followers_ids[' + i + '][lastname]', follower.lastname);
                formData.append('followers_ids[' + i + '][avatar]', follower.avatar);
            });

            // Limit display to 3 users
            var htmlContent = '<input type="hidden" name="restrict-users" id="restrict-users" value="' + followers.map(f => f.id).join(',') + '">';

            htmlContent += '<div class="d-flex flex-row">';

            // Showing the first 3 users
            for (var i = 0; i < Math.min(3, followers.length); i++) {
                var follower = followers[i];

                htmlContent += `<div class="restrict-user-${i + 1}">
                                                <img src="${follower.avatar}" alt="${follower.firstname} ${follower.lastname}" width="30" class="rounded-circle me-1" title="${follower.firstname} ${follower.lastname}">
                                            </div>`;
            }

            // If there are more than 3 users, display the remaining number
            if (followers.length > 3) {
                var remainingCount = followers.length - 3;

                htmlContent += `<p class="m-0 ms-1">
                                                <span class="btn btn-light px-2 pt-1 pb-0 rounded-pill">+${remainingCount}</span>
                                            </p>`;
            }

            htmlContent += '</div>';

            // Add generated content to ".users-list"
            $('#restrictions .users-list').html(htmlContent);
            $('#restrictions').removeClass('d-none');
            // Disable submit button after sending
            $('#sendCheckedUsers1').addClass('disabled').removeClass('btn-primary').addClass('btn-primary-soft');
        });
    });

    // ----------------
    // IX. Upload file
    // ----------------
    // IX.1. Images
    // -------------
    // When the user clicks the button to select the files
    $('#uploadImages').on('click', function () {
        $('#imagesInput').click();
    });

    // When a file is selected
    $('#imagesInput').on('change', function (event) {
        var files = event.target.files;
        var previewContainer = $('#imagesPreviews');
        var validExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'mp4', 'avi', 'ogg'];

        previewContainer.empty(); // Clear existing previews
        previewContainer.removeClass('d-none');
        $('#previewsSpinner').removeClass('d-none');

        // File type validation (Image only)
        var validFiles = Array.from(files).filter(function (file) {
            var extension = file.name.split('.').pop().toLowerCase(); // Retrieves the file extension

            return validExtensions.includes(extension); // Check if the extension is valid
        });

        if (validFiles.length === 0) {
            $('#errorMessageWrapper').removeClass('d-none');
            $('#errorMessageWrapper .custom-message').html(window.Laravel.lang.upload.image_error);
            $('#previewsSpinner').addClass('d-none'); // Hide spinner if no valid files

            return;

        } else {
            if (!$('#errorMessageWrapper').hasClass('d-none')) {
                $('#errorMessageWrapper').addClass('d-none');
            }
        }

        // Counter to track number of files loaded
        var filesLoaded = 0;

        // Browsing selected files
        Array.from(files).forEach(function (file) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var previewItem = $('<div class="previewItem"></div>');
                var fileElement;

                // Check the file type (image or video)
                if (file.type.startsWith('image')) {
                    fileElement = $('<img src="' + e.target.result + '" alt="Preview">');
                } else if (file.type.startsWith('video')) {
                    fileElement = $('<video><source src="' + e.target.result + '" type="' + file.type + '"></video>');
                }

                // Add a button to remove the preview item
                var removeBtn = $('<button type="button" class="removeBtn"><i class="bi bi-x"></i></button>').on('click', function () {
                    // Delete the preview
                    previewItem.remove();
                    // Delete file from input when clicking "x"
                    removeFileFromInput(file, '#imagesInput');
                    // Check submit
                    toggleSubmitFiles('imagesInput');

                    // Check if the preview container is empty and hide it if so
                    if (previewContainer.children().length === 0) {
                        previewContainer.addClass('d-none');
                    }
                });

                previewItem.append(fileElement).append(removeBtn);
                previewContainer.append(previewItem);

                // Increment the counter when a file is successfully loaded
                filesLoaded++;

                // Once all files are loaded, hide the spinner
                if (filesLoaded === files.length) {
                    $('#previewsSpinner').addClass('d-none'); // Hide the spinner when all files are processed
                }
            };

            // Read the file
            reader.readAsDataURL(file);
        });
    });

    // ----------------
    // IX.2. Documents
    // ----------------
    // When the user clicks the button to select the files
    $('#uploadDocuments').on('click', function () {
        $('#documentsInput').click();
    });

    // When a file is selected
    $('#documentsInput').on('change', function (event) {
        var files = event.target.files;
        var previewContainer = $('#documentsPreviews');
        var validExtensions = ['pdf'];

        previewContainer.empty(); // Clear existing previews
        previewContainer.removeClass('d-none');
        $('#previewsSpinner').removeClass('d-none');

        // File type validation (Document only)
        var validFiles = Array.from(files).filter(function (file) {
            var extension = file.name.split('.').pop().toLowerCase(); // Retrieves the file extension

            return validExtensions.includes(extension); // Check if the extension is valid
        });

        if (validFiles.length === 0) {
            if ($('#errorMessageWrapper').hasClass('d-none')) {
                $('#errorMessageWrapper').removeClass('d-none');

            } else {
                $('#errorMessageWrapper').addClass('d-none');
                $('#errorMessageWrapper').removeClass('d-none');
            }

            $('#errorMessageWrapper .custom-message').html(window.Laravel.lang.upload.document_error);

            return;
        }

        // Counter to track number of files loaded
        var filesLoaded = 0;

        // Browsing selected files
        validFiles.forEach(function (file) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var fileElement;
                var fileData = e.target.result;
                var previewItem = $('<div class="previewItem"></div>');
                var removeBtn = $('<button type="button" class="removeBtn"><i class="bi bi-x"></i></button>').on('click', function () {
                    // Delete the preview
                    previewItem.remove();
                    // Delete file from input when clicking "x"
                    removeFileFromInput(file, '#documentsInput');
                    // Check submit
                    toggleSubmitFiles('documentsInput');

                    // Check if the preview container is empty and hide it if so
                    if (previewContainer.children().length === 0) {
                        previewContainer.addClass('d-none');
                    }
                });

                // Using PDF.js to preview PDF
                if (file.type === 'application/pdf') {
                    // Creating a canvas element to display the PDF
                    var canvas = $('<canvas></canvas>');

                    previewItem.append(canvas).append(removeBtn);
                    previewContainer.append(previewItem);

                    // Load and display the first page of the PDF
                    var loadingTask = pdfjsLib.getDocument(fileData);

                    loadingTask.promise.then(function (pdf) {
                        pdf.getPage(1).then(function (page) {
                            var viewport = page.getViewport({ scale: 0.5 });
                            var context = canvas[0].getContext('2d');
                            canvas[0].height = viewport.height;
                            canvas[0].width = viewport.width;

                            // Rendering the first page on the canvas
                            page.render({ canvasContext: context, viewport: viewport });
                        });
                    });

                } else {
                    fileElement = $('<img src="' + fileData + '" alt="Preview">');
                    fileElement = $('<span class="d-inline-block px-4 py-2 bg-light border-secondary"><small>' + file.name + '</small></span>');

                    previewItem.append(fileElement).append(removeBtn);
                    previewContainer.append(previewItem);
                }

                // Increment the counter when a file is successfully loaded
                filesLoaded++;

                // Once all files are loaded, hide the spinner
                if (filesLoaded === files.length) {
                    $('#previewsSpinner').addClass('d-none'); // Hide the spinner when all files are processed
                }
            };

            // Read file as DataURL
            reader.readAsArrayBuffer(file);
        });
    });

    // ----------------------
    // X. Location detection
    // ----------------------
    // When the user clicks the location detection button
    $("#detectLocation").on('click', function (e) {
        e.preventDefault();

        if (window.Laravel.data.user.allow_location_detection === 0) {
            // If user has not allowed localization, show modal
            modalAllowLocation.show();

        } else {
            var $
            // If the user has allowed location, access the data directly
            handleLocationData(window.Laravel.data.ipinfo);
        }
    });

    // If the user accepts the localization in the modal
    $('#allow-location-btn').on('click', function (e) {
        e.preventDefault();

        // Close the modal
        modalAllowLocation.hide();

        // Access location data
        handleLocationData(window.Laravel.data.ipinfo);
    });

    // ---------------------
    // XI. Date/Time picker
    // ---------------------
    $('#newEventModal').on('shown.bs.modal', function () {
        setTimeout(function () {
            flatpickr('#date_start', {
                minDate: new Date(),  // Forbidden dates before now
                maxDate: '2030-12-31',  // Authorized ending date
                dateFormat: dateFormat,  // Format for user display
                locale: locale,  // Locale setting
                enableTime: true,  // Enable time selection
                noCalendar: false,  // Allows date selection
                defaultDate: $('#date_start').val(),  // Set default date for Flatpickr
                onChange: function (selectedDates, dateStr, instance) {
                    // Formatting before sending to server
                    var formattedDate = instance.formatDate(selectedDates[0], 'Y-m-d H:i:s');
                    $('#start_at').val(formattedDate);
                }
            });

            flatpickr('#date_end', {
                minDate: new Date(),  // Forbidden dates before now
                maxDate: '2030-12-31',  // Authorized ending date
                dateFormat: dateFormat,  // Format for user display
                locale: locale,  // Locale setting
                enableTime: true,  // Enable time selection
                noCalendar: false,  // Allows date selection
                defaultDate: $('#date_end').val(),  // Set default date for Flatpickr
                onChange: function (selectedDates, dateStr, instance) {
                    // Formatting before sending to server
                    var formattedDate = instance.formatDate(selectedDates[0], 'Y-m-d H:i:s');
                    $('#end_at').val(formattedDate);
                }
            });
        }, 1000);

        // Make sure certain criteria are met before activating the button to create
        function validateForm() {
            var isTitleFilled = $('#event_title').val().trim() !== '';
            var isPlaceFilled = $('#event_place').val().trim() !== '';
            var isDescriptionFilled = $('#event_descritpion').val().trim() !== '';
            var isCheckboxChecked = $('#newEvent .form-check-input:checked').length > 0;

            if (isTitleFilled && isPlaceFilled && isDescriptionFilled && isCheckboxChecked) {
                $('#newEvent [type="submit"]').removeClass('disabled btn-primary-soft').addClass('btn-primary');
            } else {
                $('#newEvent [type="submit"]').removeClass('btn-primary').addClass('btn-primary-soft disabled');
            }
        }
        $('#newEvent input, #newEvent textarea').on('keyup change', validateForm);
        $('#newEvent .form-check-input').on('change click', validateForm);
    });

    // ---------------------
    // XII. Choose speakers
    // ---------------------
    $('#select-speakers').click(function (e) {
        e.preventDefault();

        // Create an instance of the User class
        var action = 'speakers-among-users';
        var currentModalId = 'modalSelectSpeakers';
        var apiURL = `${apiHost}/subscription/user_connections/${currentUser}`;
        var userListId = 'modalSelectSpeakers .users-list';
        var loadingSpinnerId = 'modalSelectSpeakers .loading-spinner';
        var userModal = new User(action, currentModalId, apiURL, userListId, loadingSpinnerId);

        // Open the modal and load users
        userModal.openModal();

        $('form#chooseFollowers').submit(function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            var connections = [];

            // Retrieving selected checkboxes
            document.querySelectorAll('[name="connections_ids"]:checked').forEach(item => {
                // Collection of data associated with each user
                var connection = {
                    id: parseInt(item.value),
                    firstname: item.dataset.firstname,
                    lastname: item.dataset.lastname,
                    avatar: item.dataset.avatar
                };

                // Adding user to connections ARRAY
                connections.push(connection);
            });

            // Adding data to FormData
            connections.forEach((connection, i) => {
                formData.append('connections_ids[' + i + '][id]', connection.id);
                formData.append('connections_ids[' + i + '][firstname]', connection.firstname);
                formData.append('connections_ids[' + i + '][lastname]', connection.lastname);
                formData.append('connections_ids[' + i + '][avatar]', connection.avatar);
            });

            // Limit display to 3 users
            var htmlContent = '<input type="hidden" name="connections" id="connections" value="' + connections.map(f => f.id).join(',') + '">';

            htmlContent += '<div class="d-flex flex-row">';
            htmlContent += `<span class="d-inline-block me-2 pt-1">${window.Laravel.lang.public.events.new.data.speakers}</span>`;

            // Showing the first 3 users
            for (var i = 0; i < Math.min(3, connections.length); i++) {
                var connection = connections[i];

                htmlContent += `<div class="connection-${i + 1}">
                                                <img src="${connection.avatar}" alt="${connection.firstname} ${connection.lastname}" width="30" class="rounded-circle me-1" title="${connection.firstname} ${connection.lastname}">
                                            </div>`;
            }

            // If there are more than 3 users, display the remaining number
            if (connections.length > 3) {
                var remainingCount = connections.length - 3;

                htmlContent += `<p class="m-0 ms-1">
                                                <span class="btn btn-light px-2 pt-1 pb-0 rounded-pill">+${remainingCount}</span>
                                            </p>`;
            }

            htmlContent += '</div>';

            // Add generated content to ".users-list"
            $('#speackers .users-list').html(htmlContent);
            $('#speackers').removeClass('d-none');
            // Disable submit button after sending
            $('#sendCheckedUsers').addClass('disabled').removeClass('btn-primary').addClass('btn-primary-soft');
        });

        $('#modalSelectSpeakers').on('shown.bs.modal', function () {
            $('#newEventModal').css('z-index', '1040');
            $(this).css('z-index', '1060');

        }).on('hidden.bs.modal', function () {
            $('#newEventModal').css('z-index', '1060');
            $(this).css('z-index', '1040');
        });
    });

    // --------------------
    // XIII. Handle poll
    // --------------------
    $('#pollModal').on('shown.bs.modal', function () {
        // Add other options
        var optionCount = 2;

        $('#add_option_button').click(function () {
            optionCount++;

            var newOption = `<div class="input-group mb-3">
                                            <span class="input-group-text" id="option_${optionCount}">Option ${optionCount}</span>
                                            <input type="text" name="choices_contents[]" id="choices_contents_${optionCount}" class="form-control" placeholder="Contenu de l'option" aria-describedby="option_${optionCount}" value="">
                                        </div>`;

            $(newOption).insertBefore('#add_option_button').fadeIn();
            document.querySelector(`#choices_contents_${optionCount}`).focus();
        });

        // Make sure certain criteria are met before activating the button to create
        $('#newPoll input, #newPoll textarea').on('keyup', function () {
            var isQuestionFilled = $('#poll_question').val().trim() !== '';
            var isOptions1Filled = $('#choices_contents_1').val().trim() !== '';
            var isOptions2Filled = $('#choices_contents_2').val().trim() !== '';

            if (isQuestionFilled && isOptions1Filled && isOptions2Filled) {
                $('#newPoll .send-poll').removeClass('disabled btn-primary-soft').addClass('btn-primary');
            } else {
                $('#newPoll .send-poll').removeClass('btn-primary').addClass('btn-primary-soft disabled');
            }
        });
    });

    // ----------------------------
    // XIV. Handle anonymous question
    // ----------------------------
    $('#anonymousQuestionRequestModal').on('shown.bs.modal', function () {
        // Focus on the right textarea
        if ($('#question_content').val().trim() !== '') {
            var textarea = document.getElementById('question_request_content');

            textarea.focus();
            textarea.setSelectionRange(textarea.value.length, textarea.value.length);

            // Make sure certain criteria are met before activating the button to create
            $('#question_request_content').on('keyup', function () {
                var isQuestionFilled = $(this).val().trim() !== '';

                if (isQuestionFilled) {
                    $('#anonymousQuestionRequestModal .send-question').removeClass('disabled btn-primary-soft').addClass('btn-primary');
                } else {
                    $('#anonymousQuestionRequestModal .send-question').removeClass('btn-primary').addClass('btn-primary-soft disabled');
                }
            });

        } else {
            var textarea = document.getElementById('question_content');

            textarea.value = '';
            textarea.focus();
            $('#anonymousQuestionRequestModal form').attr('id', 'newAnonymousQuestion');

            // Make sure certain criteria are met before activating the button to create
            $('#question_content').on('keyup', function () {
                var isQuestionFilled = $(this).val().trim() !== '';

                if (isQuestionFilled) {
                    $('#anonymousQuestionRequestModal .send-question').removeClass('disabled btn-primary-soft').addClass('btn-primary');
                } else {
                    $('#anonymousQuestionRequestModal .send-question').removeClass('btn-primary').addClass('btn-primary-soft disabled');
                }
            });
        }
    });

    // --------------
    // XV. Send post
    // --------------
    $('form#newPost').submit(function (e) {
        e.preventDefault();
        $('#waitingNewPost').removeClass('d-none');

        var formData = new FormData(this);
        var post = new Post();

        // Send main data
        post.setUniqueVariables(
            '', '', formData.get('post_content'), '', formData.get('price'), formData.get('currency'),
            formData.get('quantity'), '', formData.get('latitude'), formData.get('longitude'), formData.get('city'),
            formData.get('region'), formData.get('country'), formData.get('type_id'), formData.get('category_id'),
            window.Laravel.data.operational_status.id, formData.get('visibility_id'), '', '', '', '', parseInt(currentUser));

        // Check for any restrictions in visibility
        if (parseInt(formData.get('visibility_id')) === window.Laravel.data.everybody_except_visibility.id || parseInt(formData.get('visibility_id')) === window.Laravel.data.nobody_except_visibility.id) {
            var restrictUsersInput = formData.get('restrict-users').split(',');

            restrictUsersInput.forEach((userId, index) => {
                post.addRestrictionData(parseInt(userId)); // Dynamically adding restricted users IDs
            });
        }

        // Prepare files to send
        post.prepareFormData(formData, 'imagesInput', 'documentsInput', 'images_urls[]', 'documents_urls[]');

        // Check the files added in FormData
        for (var pair of formData.entries()) {
            var fieldName = pair[0];
            var value = pair[1];

            if (value instanceof File) {
                console.log(`${fieldName}:`);
                console.log(`  File name: ${value.name}`);
                console.log(`  File size: ${value.size} octets`);
                console.log(`  MIME Type: ${value.type}`);

            } else {
                console.log(`${fieldName}: ${value}`);
            }
        }

        // Send post data
        post.sendData(formData)
            .then(function (response) {
                console.log(`The post was sent successfully: ${JSON.stringify(response)}`);
                // Reset all inputs
                $('#imagesInput, #documentsInput, #latitude, #longitude, #city, #region, #country, #post-textarea').val('');
                $('#imagesPreviews, #documentsPreviews, #locationInfo').html('');

                if (!$('#restrictions').hasClass('d-none')) {
                    $('#restrictions').addClass('d-none');
                    $('#restrictions .users-list').html('');
                }

                $('#waitingNewPost').addClass('d-none');

                // Add the new post as a page bloc
                var newPostElement = `<div class="card card-body text-center mt-3">
                                        <h4 class="mb-1 fw-bold">${window.Laravel.lang.public.posts.posted.message}</h4>
                                        <a href="${currentHost}/posts/${response.data.id}" class="card-link">${window.Laravel.lang.public.posts.posted.see}</a>
                                    </div>`;

                // Select the item after which you want to add the map
                var waitingNewPost = document.querySelector('div#waitingNewPost');

                // Insert HTML after selected element
                waitingNewPost.insertAdjacentHTML('afterend', newPostElement);
                loadScriptsInParallel(scripts);
            })
            .catch(function (error) {
                console.log(`Error sending post: ${error}`);
                $('#waitingNewPost').addClass('d-none');
                $('#errorMessageWrapper').removeClass('d-none');
                $('#errorMessageWrapper .custom-message').html(error);
            });
    });

    // --------------
    // XVI. Reactions
    // --------------
    $('.reaction-btn').each(function () {
        var reactionIcon = $(this).find('.reaction-icon');
        var currentReaction = $(this).find('.current-reaction');
        var currentReactionData = currentReaction.attr('data-current-reaction');
        var reactionName = $(this).find('.reaction-name');

        $(this).hover(function () {
            reactionIcon.each(function (i, e) {
                setTimeout(function () {
                    $(e).addClass('show');
                }, i * 100);
            });
        }, function () {
            reactionIcon.removeClass('show');
        });

        $(this).on('click', '.reaction-icon', function () {
            var reactionIconDataId = $(this).attr('data-reaction-id');
            var reactionIconDataAlias = $(this).attr('data-reaction-alias');
            var reactionIconDataName = $(this).attr('data-reaction-name');
            var reactionIconDataColor = $(this).attr('data-reaction-color');

            currentReaction.html(`<img src="${currentHost}/assets/img/reaction/${reactionIconDataAlias}.png" alt="">`);
            currentReaction.attr('data-current-reaction', currentReactionData);
            reactionName.html(reactionIconDataName);
            reactionName.css('color', reactionIconDataColor);
        });

        $(this).on('click', function (e) {
            e.stopPropagation();

            // if (currentReactionData.trim() !== null) {
            //     $(currentReaction).html('<i class="fa-solid fa-thumbs-up"></i>');
            //     $(reactionName).html(`<?= __('miscellaneous.like') ?>`);
            // }

            reactionIcon.each(function (i, e) {
                setTimeout(function () {
                    $(e).addClass('show');
                }, i * 100);
            });
        });
    });
});

// Run some scripts on DOM content is loaded
document.addEventListener('DOMContentLoaded', function () {
    handleEmoji('selectEmoji', 'post-textarea', '#modalCreatePost [type="submit"]');
    toggleSubmitCheckboxes('modalSelectRestrictions .users-list', 'sendCheckedUsers1');
    toggleSubmitCheckboxes('modalSelectSpeakers .users-list', 'sendCheckedUsers2');
    initializeTooltips();
    initializePopovers();
    popoverOnHover('user', '.user-infos');
});
