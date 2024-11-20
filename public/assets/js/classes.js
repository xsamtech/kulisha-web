/**
 * All classes
 * 
 * Copyright (c) 2024 Xsam Technologies and/or its affiliates. All rights reserved.
 * 
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */

/**
 * (1) "User" class to handle users
 */
class User {
    constructor(action, currentModalId = null, apiURL = null, userListId = null, loadingSpinnerId = null, firstname = null) {
        this.page = 1;  // Initialize page to 1
        this.loading = false;  // Indicator to check if a query is in progress

        // If a parameter is "null", use a default value
        this.action = action;
        this.currentModalId = currentModalId || '';
        this.apiURL = apiURL || '';
        this.userListId = userListId || '';
        this.loadingSpinnerId = loadingSpinnerId || '';
        this.firstname = firstname || '';

        // Creating the modal
        this.currentModal = new bootstrap.Modal(document.getElementById(this.currentModalId), { keyboard: false });

        // Linking events
        this.setupEventListeners();
    }

    // Function to manage the opening of the modal
    openModal() {
        this.currentModal.show();
    }

    // Function to handle scroll event in user list
    setupEventListeners() {
        if (this.action === 'choose-among-users') {
            // Open the modal and load the users
            $(`#${this.currentModalId}`).on('shown.bs.modal', () => {
                this.page = 1;  // Reset page number
                $(`#${this.userListId}`).empty();  // Empty the list before loading new users
                this.loadUsersToCheck();  // Load users when opening modal
            });

            // Reset user list when modal is closed
            $(`#${this.currentModalId}`).on('hidden.bs.modal', () => {
                // Reset user list contents
                $(`#${this.userListId}`).empty();  // Use ".empty()" to remove all child elements
                this.page = 1;  // Reset page number
                this.loading = false;  // Reset loading state
                $(window).off('scroll');  // Disable scroll event to avoid calls after closing
            });

            // Handle scroll for infinite loading inside modal
            $(`#${this.userListId}`).on('scroll', () => {
                // Check if the user is at the bottom of the list
                if ($(`#${this.userListId}`).scrollTop() + $(`#${this.userListId}`).innerHeight() >= $(`#${this.userListId}`)[0].scrollHeight - 50) {
                    if (!this.loading) { // Make sure there is not already a call in progress
                        this.loadUsersToCheck();  // Load more users if needed
                    }
                }
            });
        }
    }

    // Function to load users
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
                    const userItem = document.createElement('p');

                    userItem.setAttribute('id', 'empty-text');
                    userItem.setAttribute('class', 'm-0 text-center');

                    // Empty list text
                    userItem.innerHTML = window.Laravel.lang.empty_list;

                    if (!document.querySelector('#empty-text')) {
                        // If the element does not already exist, it is added to the list
                        document.querySelector(`#${this.userListId}`).appendChild(userItem);
                    }

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
                    const userItem = document.createElement('label');

                    userItem.setAttribute('for', `follower-${user.follower.id}`);
                    userItem.setAttribute('role', 'button');
                    userItem.classList.add('form-check-label', 'd-block', 'mb-4');

                    userItem.innerHTML = `
                        <img src="${user.follower.profile_photo_path}" alt="" width="50" class="me-3 rounded-circle float-start">
                        <input type="checkbox" name="followers_ids" id="follower-${user.follower.id}" class="form-check-input float-end" 
                            value="${user.follower.id}" data-firstname="${user.follower.firstname}" data-lastname="${user.follower.lastname}" 
                            data-avatar="${user.follower.profile_photo_path}" onchange="toggleSubmitCheckboxes('modalSelectRestrictions .user-list', 'sendCheckedUsers')">
                        <div>
                            <h6 class="mb-0">${user.follower.firstname} ${user.follower.lastname}</h6>
                            <small>@${user.follower.username}</small>
                        </div>
                    `;

                    // Check if item with id "follower-{user.follower.id}" already exists
                    if (!document.querySelector(`#follower-${user.follower.id}`)) {
                        // If the element does not already exist, it is added to the list
                        document.querySelector(`#${this.userListId}`).appendChild(userItem);
                    }
                });

                // Check if the last page has been reached
                if (this.page < response.lastPage) {
                    this.page++;  // Go to next page
                } else {
                    // If you are on the last page, disable scrolling
                    $(`#${this.userListId}`).off('scroll');
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
    constructor() {
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
     * Method to send all data
     */
    sendData() {
        try {
            var retrieve_data = {
                post_url: this.post_url,
                post_title: this.post_title,
                post_content: this.post_content,
                shared_post_id: this.shared_post_id,
                price: this.price,
                currency: this.currency,
                quantity: this.quantity,
                answered_for: this.answered_for,
                latitude: this.latitude,
                longitude: this.longitude,
                city: this.city,
                region: this.region,
                country: this.country,
                type_id: this.type_id,
                category_id: this.category_id,
                status_id: this.status_id,
                visibility_id: this.visibility_id,
                coverage_area_id: this.coverage_area_id,
                budget_id: this.budget_id,
                community_id: this.community_id,
                event_id: this.event_id,
                user_id: this.user_id,
                choices_contents: this.choices_contents,
                icons_fonts: this.icons_fonts,
                images_urls: this.images_urls,
                exceptions_ids: this.exceptions_ids
            };

            return $.ajax({
                headers: headers,
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(retrieve_data),
                url: `${apiHost}/post`
            });

        } catch (error) {
            console.log(`API send post error: ${error}`);
        }
    }
}

