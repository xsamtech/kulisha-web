/**
 * All classes
 * 
 * Copyright (c) 2025 Xsam Technologies and/or its affiliates. All rights reserved.
 * 
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */

/**
 * (1) "User" class to handle users
 */
class User {
    constructor(action, currentModalId = null, apiURL = null, usersListId = null, loadingSpinnerId = null, firstname = null) {
        this.page = 1;  // Initialize page to 1
        this.loading = false;  // Indicator to check if a query is in progress

        // If a parameter is "null", use a default value
        this.action = action;
        this.currentModalId = currentModalId || '';
        this.apiURL = apiURL || '';
        this.usersListId = usersListId || '';
        this.loadingSpinnerId = loadingSpinnerId || '';
        this.firstname = firstname || '';

        // Creating the modal
        this.currentModal = new bootstrap.Modal(document.getElementById(this.currentModalId), { keyboard: false });

        // Linking events
        this.setupEventListeners();
    }

    /**
     * Method to manage the opening of the modal
     */
    openModal() {
        this.currentModal.show();
    }

    /**
     * Method to handle scroll event in user list
     */
    setupEventListeners() {
        if (this.action === 'restrictions-among-users' || this.action === 'speakers-among-users') {
            // Open the modal and load the users
            $(`#${this.currentModalId}`).on('shown.bs.modal', () => {
                if (this.action === 'restrictions-among-users') {
                    $('#modalCreatePost').css('z-index', '1040');
                    $(this).css('z-index', '1060');
                }

                if (this.action === 'speakers-among-users') {
                    $('#newEventModal').css('z-index', '1040');
                    $(this).css('z-index', '1060');
                }

                this.page = 1;  // Reset page number
                $(`#${this.usersListId}`).empty();  // Empty the list before loading new users
                this.loadUsersToCheck();  // Load users when opening modal
            });

            // Reset user list when modal is closed
            $(`#${this.currentModalId}`).on('hidden.bs.modal', () => {
                if (this.action === 'restrictions-among-users') {
                    $('#modalCreatePost').css('z-index', '1060');
                    $(this).css('z-index', '1040');
                }

                if (this.action === 'speakers-among-users') {
                    $('#newEventModal').css('z-index', '1060');
                    $(this).css('z-index', '1040');
                }

                // Reset user list contents
                $(`#${this.usersListId}`).empty();  // Use ".empty()" to remove all child elements
                this.page = 1;  // Reset page number
                this.loading = false;  // Reset loading state
                $(window).off('scroll');  // Disable scroll event to avoid calls after closing
            });

            // Handle scroll for infinite loading inside modal
            $(`#${this.usersListId}`).on('scroll', () => {
                // Check if the user is at the bottom of the list
                if ($(`#${this.usersListId}`).scrollTop() + $(`#${this.usersListId}`).innerHeight() >= $(`#${this.usersListId}`)[0].scrollHeight - 50) {
                    if (!this.loading) { // Make sure there is not already a call in progress
                        this.loadUsersToCheck();  // Load more users if needed
                    }
                }
            });
        }
    }

    /**
     * Method to load users
     */
    loadUsersToCheck() {
        if (this.loading) return;  // Prevent multiple requests if a request is already in progress

        this.loading = true;  // Mark that a request is in progress

        // Show loading spinner
        document.querySelector(`#${this.loadingSpinnerId}`).classList.remove('opacity-0');
        document.querySelector(`#${this.loadingSpinnerId}`).classList.add('opacity-100');

        $.ajax({
            headers: headers,
            type: 'GET',
            contentType: 'application/json',
            url: this.apiURL,  // The API URL to retrieve users
            dataType: 'json',
            data: { page: this.page },  // Send page number
            success: (response) => {
                // If no data is returned, stop loading
                if (response.data.length === 0) {
                    var userItem = document.createElement('p');

                    userItem.setAttribute('id', 'empty-text');
                    userItem.setAttribute('class', 'm-0 text-center');

                    // Empty list text
                    userItem.innerHTML = window.Laravel.lang.empty_list;

                    // If the element does not already exist, it is added to the list
                    if (!document.querySelector('#empty-text')) {
                        document.querySelector(`#${this.usersListId}`).appendChild(userItem);
                    }

                    // Stop scroll loading
                    $(window).off('scroll');
                    // Hide loading spinner
                    document.querySelector(`#${this.loadingSpinnerId}`).classList.remove('opacity-100');
                    document.querySelector(`#${this.loadingSpinnerId}`).classList.add('opacity-0');

                    // Reset the "loading" status
                    this.loading = false;

                    return;
                }

                // Loop through users and add them to the list
                response.data.forEach(user => {
                    var userItem = document.createElement('label');

                    if (this.action === 'restrictions-among-users') {
                        userItem.setAttribute('for', `follower-${user.follower.id}`);
                        userItem.setAttribute('role', 'button');
                        userItem.classList.add('form-check-label', 'd-block', 'mb-4');

                        userItem.innerHTML = `
                            <img src="${user.follower.profile_photo_path}" alt="" width="50" class="me-3 rounded-circle float-start">
                            <input type="checkbox" name="followers_ids" id="follower-${user.follower.id}" class="form-check-input float-end" 
                                value="${user.follower.id}" data-firstname="${user.follower.firstname}" data-lastname="${user.follower.lastname}" 
                                data-avatar="${user.follower.profile_photo_path}" onchange="toggleSubmitCheckboxes('modalSelectRestrictions .users-list', 'sendCheckedUsers1')">
                            <div>
                                <h6 class="mb-0">${user.follower.firstname} ${user.follower.lastname}</h6>
                                <small>@${user.follower.username}</small>
                            </div>
                        `;

                        // Check if item with id "follower-{user.follower.id}" already exists
                        if (!document.querySelector(`#follower-${user.follower.id}`)) {
                            // If the element does not already exist, it is added to the list
                            document.querySelector(`#${this.usersListId}`).appendChild(userItem);
                        }
                    }

                    if (this.action === 'speakers-among-users') {
                        userItem.setAttribute('for', `connection-${user.id}`);
                        userItem.setAttribute('role', 'button');
                        userItem.classList.add('form-check-label', 'd-block', 'mb-4');

                        userItem.innerHTML = `
                            <img src="${user.profile_photo_path}" alt="" width="50" class="me-3 rounded-circle float-start">
                            <input type="checkbox" name="connections_ids" id="connection-${user.id}" class="form-check-input float-end" 
                                value="${user.id}" data-firstname="${user.firstname}" data-lastname="${user.lastname}" 
                                data-avatar="${user.profile_photo_path}" onchange="toggleSubmitCheckboxes('modalSelectSpeakers .users-list', 'sendCheckedUsers2')">
                            <div>
                                <h6 class="mb-0">${user.firstname} ${user.lastname}</h6>
                                <small>@${user.username}</small>
                            </div>
                        `;

                        // Check if item with id "connection-{user.id}" already exists
                        if (!document.querySelector(`#connection-${user.id}`)) {
                            // If the element does not already exist, it is added to the list
                            document.querySelector(`#${this.usersListId}`).appendChild(userItem);
                        }
                    }
                });

                // Check if the last page has been reached
                if (this.page < response.lastPage) {
                    this.page++;  // Go to next page
                } else {
                    // If you are on the last page, disable scrolling
                    $(`#${this.usersListId}`).off('scroll');
                }

                // Hide loading spinner
                document.querySelector(`#${this.loadingSpinnerId}`).classList.remove('opacity-100');
                document.querySelector(`#${this.loadingSpinnerId}`).classList.add('opacity-0');

                // Reset the "loading" status
                this.loading = false;
            },
            error: () => {
                // If an error occurs, hide the spinner and reset the "loading" status
                document.querySelector(`#${this.loadingSpinnerId}`).classList.remove('opacity-100');
                document.querySelector(`#${this.loadingSpinnerId}`).classList.add('opacity-0');
                this.loading = false;
            }
        });
    }
}

/**
 * (2) "Post" class to handle posts
 */
class Post {
    constructor(postsListId = null) {
        this.postsListId = postsListId || '';

        // Form data
        this.formData = null;
        this.imagesId = null;
        this.documentsId = null;
        this.imagesArrayName = null;
        this.documentsArrayName = null;

        // Ordinary post data
        this.post_url = null;
        this.post_title = null;
        this.post_content = null;
        this.shared_post_id = null;
        this.price = null;
        this.currency = null;
        this.quantity = null;
        this.answered_for = null;
        this.latitude = null;
        this.longitude = null;
        this.city = null;
        this.region = null;
        this.country = null;
        this.type_id = null;
        this.category_id = null;
        this.status_id = null;
        this.visibility_id = null;
        this.coverage_area_id = null;
        this.budget_id = null;
        this.community_id = null;
        this.event_id = null;
        this.user_id = null;

        // Data in array for poll
        this.choices_contents = [];
        this.icons_fonts = [];
        this.images_urls = [];

        // Data in array for visibility
        this.exceptions_ids = [];

        // Data in array for files
        this.images_urls = [];
        this.documents_urls = [];
    }

    /**
     * Method to load posts
     */
    loadPosts() {
        if (this.loading) return;  // Prevent multiple requests if a request is already in progress

        this.loading = true;  // Mark that a request is in progress

        // Show loading spinner
        document.querySelector(`#${this.loadingSpinnerId}`).classList.remove('opacity-0');
        document.querySelector(`#${this.loadingSpinnerId}`).classList.add('opacity-100');

        $.ajax({
            headers: headers,
            type: 'GET',
            contentType: 'application/json',
            url: this.apiURL,  // The API URL to retrieve users
            dataType: 'json',
            data: { page: this.page },  // Send page number
            success: (response) => {
                // If no data is returned, stop loading
                if (response.data.length === 0) {
                    var postItem = document.createElement('p');

                    postItem.setAttribute('id', 'empty-text');
                    postItem.setAttribute('class', 'm-0 text-center');

                    // Empty list text
                    postItem.innerHTML = window.Laravel.lang.empty_list;

                    // If the element does not already exist, it is added to the list
                    if (!document.querySelector('#empty-text')) {
                        document.querySelector(`#${this.postsListId}`).appendChild(postItem);
                    }

                    // Stop scroll loading
                    $(window).off('scroll');
                    // Hide loading spinner
                    document.querySelector(`#${this.loadingSpinnerId}`).classList.remove('opacity-100');
                    document.querySelector(`#${this.loadingSpinnerId}`).classList.add('opacity-0');

                    // Reset the "loading" status
                    this.loading = false;

                    return;
                }

                // Loop through users and add them to the list
                response.data.forEach(user => {
                    var userItem = document.createElement('label');

                    if (this.action === 'restrictions-among-users') {
                        userItem.setAttribute('for', `follower-${user.follower.id}`);
                        userItem.setAttribute('role', 'button');
                        userItem.classList.add('form-check-label', 'd-block', 'mb-4');

                        userItem.innerHTML = `
                            <img src="${user.follower.profile_photo_path}" alt="" width="50" class="me-3 rounded-circle float-start">
                            <input type="checkbox" name="followers_ids" id="follower-${user.follower.id}" class="form-check-input float-end" 
                                value="${user.follower.id}" data-firstname="${user.follower.firstname}" data-lastname="${user.follower.lastname}" 
                                data-avatar="${user.follower.profile_photo_path}" onchange="toggleSubmitCheckboxes('modalSelectRestrictions .users-list', 'sendCheckedUsers1')">
                            <div>
                                <h6 class="mb-0">${user.follower.firstname} ${user.follower.lastname}</h6>
                                <small>@${user.follower.username}</small>
                            </div>
                        `;

                        // Check if item with id "follower-{user.follower.id}" already exists
                        if (!document.querySelector(`#follower-${user.follower.id}`)) {
                            // If the element does not already exist, it is added to the list
                            document.querySelector(`#${this.postsListId}`).appendChild(userItem);
                        }
                    }

                    if (this.action === 'speakers-among-users') {
                        userItem.setAttribute('for', `connection-${user.id}`);
                        userItem.setAttribute('role', 'button');
                        userItem.classList.add('form-check-label', 'd-block', 'mb-4');

                        userItem.innerHTML = `
                            <img src="${user.profile_photo_path}" alt="" width="50" class="me-3 rounded-circle float-start">
                            <input type="checkbox" name="connections_ids" id="connection-${user.id}" class="form-check-input float-end" 
                                value="${user.id}" data-firstname="${user.firstname}" data-lastname="${user.lastname}" 
                                data-avatar="${user.profile_photo_path}" onchange="toggleSubmitCheckboxes('modalSelectSpeakers .users-list', 'sendCheckedUsers2')">
                            <div>
                                <h6 class="mb-0">${user.firstname} ${user.lastname}</h6>
                                <small>@${user.username}</small>
                            </div>
                        `;

                        // Check if item with id "connection-{user.id}" already exists
                        if (!document.querySelector(`#connection-${user.id}`)) {
                            // If the element does not already exist, it is added to the list
                            document.querySelector(`#${this.postsListId}`).appendChild(userItem);
                        }
                    }
                });

                // Check if the last page has been reached
                if (this.page < response.lastPage) {
                    this.page++;  // Go to next page
                } else {
                    // If you are on the last page, disable scrolling
                    $(`#${this.postsListId}`).off('scroll');
                }

                // Hide loading spinner
                document.querySelector(`#${this.loadingSpinnerId}`).classList.remove('opacity-100');
                document.querySelector(`#${this.loadingSpinnerId}`).classList.add('opacity-0');

                // Reset the "loading" status
                this.loading = false;
            },
            error: () => {
                // If an error occurs, hide the spinner and reset the "loading" status
                document.querySelector(`#${this.loadingSpinnerId}`).classList.remove('opacity-100');
                document.querySelector(`#${this.loadingSpinnerId}`).classList.add('opacity-0');
                this.loading = false;
            }
        });
    }

    /**
     * Method to store ordinary post data
     * 
     * @param string post_url
     * @param string post_title
     * @param string post_content
     * @param int shared_post_id
     * @param float price
     * @param string currency
     * @param int quantity
     * @param int answered_for
     * @param string latitude
     * @param string longitude
     * @param string city
     * @param string region
     * @param string country
     * @param int type_id
     * @param int category_id
     * @param int status_id
     * @param int visibility_id
     * @param int coverage_area_id
     * @param int budget_id
     * @param int community_id
     * @param int event_id
     * @param int user_id
     */
    setUniqueVariables(post_url, post_title, post_content, shared_post_id, price, currency, quantity, answered_for, latitude, longitude, city, region, country, type_id, category_id, status_id, visibility_id, coverage_area_id, budget_id, community_id, event_id, user_id) {
        this.post_url = post_url;
        this.post_title = post_title;
        this.post_content = post_content;
        this.shared_post_id = shared_post_id;
        this.price = price;
        this.currency = currency;
        this.quantity = quantity;
        this.answered_for = answered_for;
        this.latitude = latitude;
        this.longitude = longitude;
        this.city = city;
        this.region = region;
        this.country = country;
        this.type_id = type_id;
        this.category_id = category_id;
        this.status_id = status_id;
        this.visibility_id = visibility_id;
        this.coverage_area_id = coverage_area_id;
        this.budget_id = budget_id;
        this.community_id = community_id;
        this.event_id = event_id;
        this.user_id = user_id;
    }

    /**
     * Method to store data in array for poll
     * 
     * @param string choiceContent
     * @param string iconFont
     * @param string imageUrl
     */
    addPollData(choiceContent, iconFont, imageUrl) {
        this.choices_contents.push(choiceContent);
        this.icons_fonts.push(iconFont);
        this.images_urls.push(imageUrl);
    }

    /**
     * Method to store data in array for visibility
     * 
     * @param int userId
     */
    addRestrictionData(userId) {
        this.exceptions_ids.push(userId);
    }

    /**
     * Method to prepare data to send
     * 
     * @param string imageURL
     */
    prepareFormData(formData, imagesId, documentsId, imagesArrayName, documentsArrayName) {
        this.formData = formData;
        this.imagesId = imagesId;
        this.documentsId = documentsId;
        this.imagesArrayName = imagesArrayName;
        this.documentsArrayName = documentsArrayName;

        var images = document.getElementById(imagesId).files;
        var documents = document.getElementById(documentsId).files;
        // Use a table to keep track of files already added
        var addedImages = new Set();
        var addedDocuments = new Set();

        if (images.length > 0) {
            for (var i = 0; i < images.length; i++) {
                var imageName = images[i].name;

                if (!addedImages.has(imageName)) {
                    formData.append(imagesArrayName, images[i]);
                    addedImages.add(imageName); // Add image name to all added files
                }
            }

        } else {
            console.log('No images selected.');
        }

        if (documents.length > 0) {
            for (var i = 0; i < documents.length; i++) {
                var documentName = documents[i].name;

                if (!addedDocuments.has(documentName)) {
                    formData.append(documentsArrayName, documents[i]);
                    addedDocuments.add(documentName); // Add the document name to the set of added files
                }
            }

        } else {
            console.log('No documents selected.');
        }

        if (images.length === 0 && documents.length === 0) {
            console.log('No files (image or document) have been selected.');
        }

        return formData;
    }


    /**
     * Method to send all data
     */
    sendData(formData) {
        return new Promise((resolve, reject) => {
            try {
                var xhr = new XMLHttpRequest();

                formData.append('post_url', this.post_url);
                formData.append('post_title', this.post_title);
                formData.append('post_content', this.post_content);
                formData.append('shared_post_id', this.shared_post_id);
                formData.append('price', this.price);
                formData.append('currency', this.currency);
                formData.append('quantity', this.quantity);
                formData.append('answered_for', this.answered_for);
                formData.append('latitude', this.latitude);
                formData.append('longitude', this.longitude);
                formData.append('city', this.city);
                formData.append('region', this.region);
                formData.append('country', this.country);
                formData.append('type_id', this.type_id);
                formData.append('category_id', this.category_id);
                formData.append('status_id', this.status_id);
                formData.append('visibility_id', this.visibility_id);
                formData.append('coverage_area_id', this.coverage_area_id);
                formData.append('budget_id', this.budget_id);
                formData.append('community_id', this.community_id);
                formData.append('event_id', this.event_id);
                formData.append('user_id', this.user_id);

                if (this.exceptions_ids.length > 0) {
                    for (var i = 0; i < this.exceptions_ids.length; i++) {
                        formData.append('exceptions_ids[' + i + ']', this.exceptions_ids[i]);
                    }
                }

                if (this.choices_contents.length > 0) {
                    for (var i = 0; i < this.choices_contents.length; i++) {
                        formData.append('choices_contents[' + i + ']', this.choices_contents[i]);
                        formData.append('icons_fonts[' + i + ']', this.icons_fonts[i]);
                        formData.append('images_urls[' + i + ']', this.images_urls[i]);
                    }
                }

                // API Endpoint
                xhr.open('POST', `${apiHost}/post`, true);
                // Add necessary headers
                xhr.setRequestHeader('Authorization', 'Bearer ' + appRef);
                xhr.setRequestHeader('X-localization', navigator.language);
    
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) { // When the query is complete
                        if (xhr.status === 200) {
                            try {
                                const response = JSON.parse(xhr.responseText);
                                resolve(response); // Returning the response
                            } catch (e) {
                                reject('Error parsing response');
                            }
                        } else {
                            reject(`Error sending post: ${xhr.status} - ${xhr.statusText}`);
                        }
                    }
                };
    
                // Envoi des données via FormData
                xhr.send(formData);
            } catch (error) {
                reject(`API send post error: ${error}`);
            }
        });
    }    
}

