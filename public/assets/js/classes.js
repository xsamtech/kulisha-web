/**
 * All classes
 * 
 * Copyright (c) 2024 Xsam Technologies and/or its affiliates. All rights reserved.
 * 
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */

/**
 * (1) "AddPost" class to add a new post
 */
class AddPost {
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
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(retrieve_data),
                url: `${apiHost}/post`
            });

        } catch (error) {
            console.log(`API send post error: ${error}`);
        }
    }
}

