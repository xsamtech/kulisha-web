<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="xsamtech.com">
        <meta name="keywords" content="@lang('miscellaneous.keywords')">
        <meta name="kls-url" content="{{ getWebURL() }}">
        <meta name="kls-api-url" content="{{ getApiURL() }}">
        <meta name="kls-visitor" content="{{ Auth::check() ? $current_user['id'] : null }}">
        <meta name="kls-ip" content="{{ Request::ip() }}">
        <meta name="kls-ref" content="{{ (Auth::check() ? $current_user['api_token'] : 'nat') . '-' . (request()->has('app_id') ? request()->get('app_id') : 'nai') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">

        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

        <!-- Plugins CSS -->
        {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/font-awesome/css/all.min.css') }}">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> --}}
        <link rel="stylesheet" href="{{ asset('assets/addons/social/bootstrap-icons/bootstrap-icons.min.css') }}">

        <!-- Material Design for Boostrap CSS -->
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/custom/mdb/css/mdb.min.css') }}"> --}}
        <!-- Overlay Scrollbars CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/OverlayScrollbars-master/css/OverlayScrollbars.min.css') }}">
        <!-- Tiny Slider CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/tiny-slider/dist/tiny-slider.css') }}">
        <!-- Choices CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/choices.js/public/assets/styles/choices.min.css') }}">
        <!-- Glightbox CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/glightbox-master/dist/css/glightbox.min.css') }}">
        <!-- Dropzone CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/dropzone/dist/min/dropzone.min.css') }}">
        <!-- Flatpickr CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/flatpickr/dist/flatpickr.min.css') }}">
        <!-- Plyr CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/plyr/plyr.css') }}">
        <!-- Zuck CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/custom/zuck.js/dist/zuck.min.css') }}">
        <!-- Theme CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/social/css/style.css') }}">
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.custom.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/reactions.css') }}">

        <style>
            .kls-fs-7 { font-size: 0.7rem; }
            .kls-text-secondary { color: var(--bs-secondary-text-emphasis); }
            .btn-check:checked + .btn-secondary-soft, :not(.btn-check) + .btn-secondary-soft:active, .btn-secondary-soft:first-child:active, .btn-secondary-soft.active, .btn-secondary-soft.show { color: #fff!important; background-color: #14191e !important; border-color: #14191e !important; }
            [data-bs-theme=dark] .btn-check:checked + .btn-secondary-soft, [data-bs-theme=dark] :not(.btn-check) + .btn-secondary-soft:active, [data-bs-theme=dark] .btn-secondary-soft:first-child:active, [data-bs-theme=dark] .btn-secondary-soft.active, [data-bs-theme=dark] .btn-secondary-soft.show { color: var(--bs-body-bg)!important; background-color: rgba(var(--bs-secondary-rgb)) !important; border-color: transparent !important; }
            /* Stories */
            #zuck-modal-content .story-viewer .tip {text-transform: inherit!important;}
        </style>

        <title>
@if (!empty($page_title))
            {{ $page_title }}
@else
            Kulisha
@endif
        </title>

    </head>

    <body>
        <!-- Pre loader -->
        <div class="preloader perfect-scrollbar">
            <div class="preloader-item">
                <div class="spinner-grow text-primary"></div>
            </div>
        </div>

        <!-- Responsive navbar toggler -->
        <button class="close-navbar-toggler navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"></button>

        <!-- Responsive navbar toggler -->
        <div id="successMessageWrapper" class="position-fixed w-100 top-0 start-0 d-none" style="z-index: 99999;">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-11 mx-auto">
                    <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
                        <i class="bi bi-info-circle me-3 fs-5"></i>
                        <div class="custom-message"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
        <div id="errorMessageWrapper" class="position-fixed w-100 top-0 start-0 d-none" style="z-index: 99999;">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-11 mx-auto">
                    <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle me-3 fs-5"></i>
                        <div class="custom-message"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>

@include('layouts.navigation')

        <!-- **************** MAIN CONTENT START **************** -->
        <main>
            <!-- Container START -->
            <div class="container">
                <div id="content" class="row g-4" style="min-height: 40rem;">

@yield('app-content')

                </div>
            </div>
            <!-- Container END -->
        </main>
        <!-- **************** MAIN CONTENT END **************** -->


        <!-- **************** MODALS START **************** -->
@include('layouts.modals')
        <!-- **************** MODALS END **************** -->

        <!-- ======================= JS libraries, plugins and custom scripts -->
        <!-- jQuery JS -->
        <script src="{{ asset('assets/addons/custom/jquery/js/jquery.min.js') }}"></script>
        <!-- Bootstrap JS -->
        <script src="{{ asset('assets/addons/social/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Tiny slider -->
        <script src="{{ asset('assets/addons/social/tiny-slider/dist/tiny-slider.js') }}"></script>
        <!-- PswMeter -->
        <script src="{{ asset('assets/addons/social/pswmeter/pswmeter.min.js') }}"></script>
        <!-- Overlay scrollbars -->
        <script src="{{ asset('assets/addons/social/OverlayScrollbars-master/js/OverlayScrollbars.min.js') }}"></script>
        <!-- Choices -->
        <script src="{{ asset('assets/addons/social/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        <!-- Glightbox -->
        <script src="{{ asset('assets/addons/social/glightbox-master/dist/js/glightbox.min.js') }}"></script>
        <!-- Flatpickr -->
        <script src="{{ asset('assets/addons/social/flatpickr/dist/flatpickr.min.js') }}"></script>
        <!-- Plyr -->
        <script src="{{ asset('assets/addons/social/plyr/plyr.js') }}"></script>
        <!-- Dropzone -->
        <script src="{{ asset('assets/addons/social/dropzone/dist/min/dropzone.min.js') }}"></script>
        <!-- Theme Functions -->
        <script src="{{ asset('assets/js/social/functions.js') }}"></script>
        <!-- Autoresize textarea -->
        <script src="{{ asset('assets/addons/custom/autosize/js/autosize.min.js') }}"></script>
        <!-- Perfect scrollbar -->
        <script src="{{ asset('assets/addons/custom/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
        <!-- PDF.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
        <!-- Custom scripts -->
        <script src="{{ asset('assets/js/load-app-scripts.js') }}"></script>
        <script src="{{ asset('assets/js/classes.js') }}"></script>
@if (Route::is('home'))
        <!-- Zuck -->
        <script src="{{ asset('assets/addons/custom/zuck.js/dist/zuck.min.js') }}"></script>
        <script src="{{ asset('assets/js/social/zuck-stories.js') }}"></script>
@endif
        <script src="{{ asset('assets/js/script.app.js') }}"></script>
        <script type="text/javascript">
            /**
             * Injected data
             */
            window.Laravel = {
                data: {
                    user: @json($current_user),
                    ipinfo: @json($ipinfo_data),
                }
            };

            console.log(window.Laravel.data.user);
            
            /**
             * Native functions
             * 
             * I. Unable "submit" button
             *    I.1. Textarea
             *    I.2. Files
             *    I.3. Checkboxes
             * II. Remove a file from the input file
             * III. Set location data from IpInfo
             */
            // -------------------------
            // I. Unable "submit" button
            // -------------------------
            // I.1. Textarea
            // -------------
            function toggleSubmitText(element) {
                var imagesFiles = document.getElementById('imagesInput');
                var documentsFiles = document.getElementById('documentsInput');

                if (element.value.trim() === '' && imagesFiles.files.length === 0 && documentsFiles.files.length === 0) {
                    $('#newPost .send-post').removeClass('btn-primary');
                    $('#newPost .send-post').addClass('btn-primary-soft');
                    $('#newPost .send-post').addClass('disabled');

                } else {
                    $('#newPost .send-post').removeClass('disabled');
                    $('#newPost .send-post').removeClass('btn-primary-soft');
                    $('#newPost .send-post').addClass('btn-primary');
                }
            }

            // ----------
            // I.2. Files
            // ----------
            function toggleSubmitFiles(element_id) {
                var elem = document.getElementById(element_id);
                var imagesFiles = document.getElementById('imagesInput');
                var documentsFiles = document.getElementById('documentsInput');
                var textarea = document.getElementById('post-textarea');

                if (element_id === 'imagesInput') {
                    if (textarea.value.trim() === '' && elem.files.length === 0 && documentsFiles.files.length === 0) {
                        $('#newPost .send-post').removeClass('btn-primary');
                        $('#newPost .send-post').addClass('btn-primary-soft');
                        $('#newPost .send-post').addClass('disabled');
                    } else {
                        $('#newPost .send-post').removeClass('disabled');
                        $('#newPost .send-post').removeClass('btn-primary-soft');
                        $('#newPost .send-post').addClass('btn-primary');
                    }
                }

                if (element_id === 'documentsInput') {
                    if (textarea.value.trim() === '' && elem.files.length === 0 && imagesFiles.files.length === 0) {
                        $('#newPost .send-post').removeClass('btn-primary');
                        $('#newPost .send-post').addClass('btn-primary-soft');
                        $('#newPost .send-post').addClass('disabled');
                    } else {
                        $('#newPost .send-post').removeClass('disabled');
                        $('#newPost .send-post').removeClass('btn-primary-soft');
                        $('#newPost .send-post').addClass('btn-primary');
                    }
                }
            }

            // ---------------
            // I.3. Checkboxes
            // ---------------
            function toggleSubmitCheckboxes(checkboxesWrapperId, submitButtonId) {
                // Checks if at least one box is checked
                const anyChecked = $(`#${checkboxesWrapperId} .form-check-input:checked`).length > 0;

                // If at least one box is checked, activates the button (removes the "disabled" class)
                if (anyChecked) {
                    $(`#${submitButtonId}`).removeClass('disabled');
                    $(`#${submitButtonId}`).removeClass('btn-primary-soft');
                    $(`#${submitButtonId}`).addClass('btn-primary');

                // Otherwise, disable the button (add the class "disabled")
                } else {
                    $(`#${submitButtonId}`).addClass('disabled');
                    $(`#${submitButtonId}`).removeClass('btn-primary');
                    $(`#${submitButtonId}`).addClass('btn-primary-soft');
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                toggleSubmitCheckboxes('modalSelectRestrictions .user-list', 'sendCheckedUsers');
            });

            // -------------------------------------
            // II. Remove a file from the input file
            // -------------------------------------
            function removeFileFromInput(file, element) {
                var input = $(element)[0];
                var files = Array.from(input.files);
                var newFiles = files.filter(function(f) {
                    return f !== file;
                });

                // Resetting the input file with remaining files
                var dataTransfer = new DataTransfer();

                newFiles.forEach(function(f) {
                    dataTransfer.items.add(f);
                });
                input.files = dataTransfer.files;
            }

            // ----------------------------------
            // III. Set location data from IpInfo
            // ----------------------------------
            function handleLocationData(data) {
                // Extract information from JSON
                var location = data.loc.split(',');  // Separate latitude and longitude
                var latitude = location[0];
                var longitude = location[1];
                var city = data.city;
                var region = data.region;
                var country = data.country;

                // Update hidden inputs
                $('#latitude').val(latitude);
                $('#longitude').val(longitude);
                $('#city').val(city);
                $('#region').val(region);
                $('#country').val(country);

                // Show information in div
                $('#locationInfo').html(`<h5 class="h5 mb-1">${city} (${country})</h5>`);
            }

            /**
             * jQuery data
             * 
             * I. Toggle post type
             * II. Toggle visibility
             * III. Upload file
             *    III.1. Images
             *    III.2. Documents
             * IV. Location detection
             * V. Send post
             * VI. Reactions
             */
            $(function () {
                // -----------------
                // I. Toggle post type
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
                // II. Toggle visibility
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
                            const action = 'choose-among-users';
                            const currentModalId = 'modalSelectRestrictions';
                            const apiURL = `${apiHost}/subscription/user_subscribers/${currentUser}`;
                            const userListId = 'modalSelectRestrictions .user-list';
                            const loadingSpinnerId = 'modalSelectRestrictions .loading-spinner';
                            const userModal = new User(action, currentModalId, apiURL, userListId, loadingSpinnerId);

                            // Open the modal and load users
                            userModal.openModal();

                            $('form#chooseFollowers').submit(function (e) {
                                e.preventDefault();

                                let formData = new FormData(this);
                                let followers = [];

                                // Retrieving selected checkboxes
                                document.querySelectorAll('[name="followers_ids"]:checked').forEach(item => {
                                    // Collection of data associated with each user
                                    let follower = {
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
                                let htmlContent = '<input type="hidden" name="restrict-users" id="restrict-users" value="' + followers.map(f => f.id).join(',') + '">';

                                htmlContent += '<div class="d-flex flex-row">';

                                // Showing the first 3 users
                                for (let i = 0; i < Math.min(3, followers.length); i++) {
                                    let follower = followers[i];

                                    htmlContent += `<div class="restrict-user-${i + 1}">
                                                        <img src="${follower.avatar}" alt="${follower.firstname} ${follower.lastname}" width="30" class="rounded-circle me-1" title="${follower.firstname} ${follower.lastname}">
                                                    </div>`;
                                }

                                // If there are more than 3 users, display the remaining number
                                if (followers.length > 3) {
                                    let remainingCount = followers.length - 3;

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
                                $('#sendCheckedUsers').addClass('disabled');
                                $('#sendCheckedUsers').removeClass('btn-primary');
                                $('#sendCheckedUsers').addClass('btn-primary-soft');
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
                    const action = 'choose-among-users';
                    const currentModalId = 'modalSelectRestrictions';
                    const apiURL = `${apiHost}/subscription/user_subscribers/${currentUser}`;
                    const userListId = 'modalSelectRestrictions .user-list';
                    const loadingSpinnerId = 'modalSelectRestrictions .loading-spinner';
                    const userModal = new User(action, currentModalId, apiURL, userListId, loadingSpinnerId);

                    // Open the modal and load users
                    userModal.openModal();

                    $('form#chooseFollowers').submit(function (e) {
                        e.preventDefault();

                        let formData = new FormData(this);
                        let followers = [];

                        // Retrieving selected checkboxes
                        document.querySelectorAll('[name="followers_ids"]:checked').forEach(item => {
                            // Collection of data associated with each user
                            let follower = {
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
                        let htmlContent = '<input type="hidden" name="restrict-users" id="restrict-users" value="' + followers.map(f => f.id).join(',') + '">';

                        htmlContent += '<div class="d-flex flex-row">';

                        // Showing the first 3 users
                        for (let i = 0; i < Math.min(3, followers.length); i++) {
                            let follower = followers[i];

                            htmlContent += `<div class="restrict-user-${i + 1}">
                                                <img src="${follower.avatar}" alt="${follower.firstname} ${follower.lastname}" width="30" class="rounded-circle me-1" title="${follower.firstname} ${follower.lastname}">
                                            </div>`;
                        }

                        // If there are more than 3 users, display the remaining number
                        if (followers.length > 3) {
                            let remainingCount = followers.length - 3;

                            htmlContent += `<p class="m-0 ms-1">
                                                <span class="btn btn-light px-2 pt-1 pb-0 rounded-pill">+${remainingCount}</span>
                                            </p>`;
                        }

                        htmlContent += '</div>';

                        // Add generated content to ".users-list"
                        $('#restrictions .users-list').html(htmlContent);
                        $('#restrictions').removeClass('d-none');
                        // Disable submit button after sending
                        $('#sendCheckedUsers').addClass('disabled');
                        $('#sendCheckedUsers').removeClass('btn-primary');
                        $('#sendCheckedUsers').addClass('btn-primary-soft');
                    });
                });

                // ----------------
                // III. Upload file
                // ----------------
                // III.1. Images
                // -------------
                // When the user clicks the button to select the files
                $('#uploadImages').on('click', function() {
                    $('#imagesInput').click();
                });

                // When a file is selected
                $('#imagesInput').on('change', function(event) {
                    var files = event.target.files;
                    var previewContainer = $('#imagesPreviews');
                    var validExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'mp4', 'avi', 'ogg'];

                    previewContainer.empty(); // Clear existing previews
                    previewContainer.removeClass('d-none');
                    $('#previewsSpinner').removeClass('d-none');

                    // File type validation (Image only)
                    var validFiles = Array.from(files).filter(function(file) {
                        var extension = file.name.split('.').pop().toLowerCase(); // Retrieves the file extension

                        return validExtensions.includes(extension); // Check if the extension is valid
                    });

                    if (validFiles.length === 0) {
                        $('#errorMessageWrapper').removeClass('d-none');
                        $('#errorMessageWrapper .custom-message').html('Please select only image files.');
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
                    Array.from(files).forEach(function(file) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var previewItem = $('<div class="previewItem"></div>');
                            var fileElement;

                            // Check the file type (image or video)
                            if (file.type.startsWith('image')) {
                                fileElement = $('<img src="' + e.target.result + '" alt="Preview">');
                            } else if (file.type.startsWith('video')) {
                                fileElement = $('<video><source src="' + e.target.result + '" type="' + file.type + '"></video>');
                            }

                            // Add a button to remove the preview item
                            var removeBtn = $('<button type="button" class="removeBtn"><i class="bi bi-x"></i></button>').on('click', function() {
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
                // III.2. Documents
                // ----------------
                // When the user clicks the button to select the files
                $('#uploadDocuments').on('click', function() {
                    $('#documentsInput').click();
                });

                // When a file is selected
                $('#documentsInput').on('change', function(event) {
                    var files = event.target.files;
                    var previewContainer = $('#documentsPreviews');
                    var validExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx'];

                    previewContainer.empty(); // Clear existing previews
                    previewContainer.removeClass('d-none');
                    $('#previewsSpinner').removeClass('d-none');

                    // File type validation (Document only)
                    var validFiles = Array.from(files).filter(function(file) {
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

						$('#errorMessageWrapper .custom-message').html('Please select only Document files.');

                        return;
                    }

                    // Counter to track number of files loaded
                    var filesLoaded = 0;

                    // Browsing selected files
                    validFiles.forEach(function(file) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var fileElement;
                            var fileData = e.target.result;
                            var previewItem = $('<div class="previewItem"></div>');
                            var removeBtn = $('<button type="button" class="removeBtn"><i class="bi bi-x"></i></button>').on('click', function() {
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

                                loadingTask.promise.then(function(pdf) {
                                    pdf.getPage(1).then(function(page) {
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
                // IV. Location detection
                // ----------------------
                // When the user clicks the location detection button
                $("#detectLocation").on('click', function(e) {
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

                // -------------
                // V. Send post
                // -------------
                $('#modalCreatePost').on('submit', function(event) {
                });

                // ------------
                // VI. Reactions
                // ------------
                $('.reaction-btn').each(function () {
                    var reactionIcon = $(this).find('.reaction-icon');
                    var currentReaction = $(this).find('.current-reaction');
                    var currentReactionData = currentReaction.attr('data-current-reaction');
                    var reactionName = $(this).find('.reaction-name');

                    $(this).hover(function() {
                        reactionIcon.each(function(i, e) {
                            setTimeout(function() {
                                $(e).addClass('show');
                            }, i * 100);
                        });
                    }, function() {
                        reactionIcon.removeClass('show');
                    });

                    $(this).on('click', '.reaction-icon', function() {
                        var reactionIconDataId = $(this).attr('data-reaction-id');
                        var reactionIconDataAlias = $(this).attr('data-reaction-alias');
                        var reactionIconDataName = $(this).attr('data-reaction-name');
                        var reactionIconDataColor = $(this).attr('data-reaction-color');

                        currentReaction.html(`<img src="${currentHost}/assets/img/reaction/${reactionIconDataAlias}.png" alt="">`);
                        currentReaction.attr('data-current-reaction', currentReactionData);
                        reactionName.html(reactionIconDataName);
                        reactionName.css('color', reactionIconDataColor);
                    });

                    $(this).on('click', function(e) {
                        e.stopPropagation();

                        // if (currentReactionData.trim() !== null) {
                        //     $(currentReaction).html('<i class="fa-solid fa-thumbs-up"></i>');
                        //     $(reactionName).html(`<?= __('miscellaneous.like') ?>`);
                        // }

                        reactionIcon.each(function(i, e) {
                            setTimeout(function() {
                                $(e).addClass('show');
                            }, i * 100);
                        });
                    });
                });
            });
        </script>
        <script src="{{ asset('assets/js/navigation.js') }}"></script>
    </body>
</html>
