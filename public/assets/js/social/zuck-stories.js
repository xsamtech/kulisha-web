/**
 * Zuck stories and stories data
 * 
 * Copyright (c) 2024 Xsam Technologies and/or its affiliates. All rights reserved.
 * 
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
*/
let stories;

async function fetchStories() {
  try {
    const resultStory = await $.ajax({
      headers: headers,
      method: 'GET',
      contentType: 'application/json',
      url: `${apiHost}/post/stories_feed/${currentUser}`
    });

    if (!resultStory.data || !Array.isArray(resultStory.data)) {
      throw new Error('Unexpected data structure received from API');
    }

    const apiData = await Promise.all(resultStory.data.map(async (story) => {
      const contents = await Promise.all(story.posts.map(async (content) => {
        try {
          const resultConsultation = await $.ajax({
            headers: headers,
            method: 'GET',
            contentType: 'application/json',
            url: `${apiHost}/history/select_by_user_entity/${currentUser}/consultation_history/0/${story.owner_id}/post/${content.story_id}`
          });

          const timestamp = new Date(content.created_at).getTime() / 1000;

          return {
            id: `${story.owner_id}-story-${content.story_id}`,
            apiId: content.story_id,
            type: content.image_type,
            length: 15,
            src: content.image_url,
            preview: '',
            link: (content.shared_post_id ? `${currentHost}/posts/${content.shared_post_id}` : `${currentHost}/posts/${content.story_id}`),
            linkText: content.post_content,
            time: timestamp,
            timeAgo: content.created_at_ago,
            seen: !!resultConsultation.data
          };

        } catch (err) {
          console.log(`Error fetching consultation for story ID ${content.story_id}:`, err);
          return null; // Or default value
        }
      }));

      // Return a unique object if "contents" has elements
      if (contents.length > 0) {
        const onwner_timestamp = new Date(story.owner_last_update).getTime() / 1000;

        return {
          id: story.owner_id,
          name: `${story.firstname} ${story.lastname}`,
          photo: story.owner_avatar,
          link: story.owner_link,
          lastUpdated: onwner_timestamp,
          items: contents.filter(content => content) // Removes null elements
        };
      }

      return null; // Don't add user without items
    }));

    // Filter null values and avoid duplicates
    const uniqueStories = apiData.filter((story, index, self) =>
      story !== null && index === self.findIndex(s => s.id === story.id)
    );

    // console.log('Final uniqueStories:', JSON.stringify(uniqueStories, null, 2));

    let currentStoryId = null; // ID of the story currently displayed
    let currentItemIndex = 0; // Index of the currently displayed item
    const validUniqueStories = uniqueStories.filter(story => story && story.items.length > 0);

    // console.log('Final validUniqueStories:', JSON.stringify(validUniqueStories, null, 2));

    const storiesOptions = {
      rtl: false,
      skin: 'snapgram',
      avatars: true,
      stories: validUniqueStories, // Array of stories data
      backButton: true,
      backNative: false,
      paginationArrows: true,
      previousTap: true,
      autoFullScreen: false,
      openEffect: true,
      cubeEffect: true,
      list: false,
      localStorage: false,
      callbacks: {
        onOpen(storyId, callback) {
          currentStoryId = storyId; // Update the ID of the currently opened story
          const story = validUniqueStories.find(s => s.id === storyId);

          if (story) {
            // Use an event or a delay
            setTimeout(() => {
              const items = story.items; // Retreive all items
              const timeElements = document.querySelectorAll('#zuck-modal-content .story-viewer .head .left .info .time');

              // Ensure there is "timeElement" for each item
              if (timeElements.length > 0 && items.length > 0) {
                // console.log(timeElements);

                items.forEach((item, index) => {
                  // Check if the index does not exceed the number of time elements
                  if (timeElements[index]) {
                    timeElements[index].innerHTML = item.timeago; // Replace "timestamp" by "timeAgo" for each item
                  }
                });

              } else {
                console.error('No time elements or items found');
              }
            }, 300); // Increase the delay if necessary
          }
          callback();  // on open story viewer
        },
        onView: function (storyId) {
          const story = validUniqueStories.find(s => s.id === storyId);

          if (story) {
            // Retrieve the currently displayed item based on "currentItemIndex"
            const item = story.items[currentItemIndex];

            console.log(currentIpAddr);

            if (item) {
              if (!item.seen) {
                const updateConsultationHistory = $.ajax({
                  headers: {
                    'Authorization': 'Bearer ' + appRef.split('-')[0],
                    'X-localization': navigator.language,
                    'X-user-id': currentUser,
                    'X-ip-address': currentIpAddr
                  },
                  method: 'GET',
                  contentType: 'application/json',
                  url: `${apiHost}/post/${item.apiid}`
                });

                console.log(`API ID: ${item.apiid}`);
                console.log(`API Response: ${updateConsultationHistory.data}`);
              }
            }
          }
        },
        onEnd(storyId, callback) {
          callback();  // on end story
          currentItemIndex = 0; // Reset index when story ends
        },
        onClose(storyId, callback) {
          callback();  // on close story viewer
          currentItemIndex = 0; // Reset index when closing display
        },
        onNavigateItem(storyId, nextStoryId, callback) {
          const story = validUniqueStories.find(s => s.id === storyId);

          if (story) {
            // Update "currentItemIndex" based on navigation
            currentItemIndex = (currentItemIndex + 1) % story.items.length; // Manage the cycle
          }

          callback();  // on navigate item of story

          // Retrieve current item after navigation
          const item = story.items[currentItemIndex];

          if (item) {
            console.log('API ID (navigated):', item.apiid);
          }
        },
        onDataUpdate(currentState, callback) {
          callback(); // use to update state on your reactive framework
        }
      }
    };
    const storiesElement = document.querySelector('#stories');

    if (!storiesElement) {
      console.error('Stories element not found in the DOM');
      return;
    }

    // Initialize Zuck.js
    stories = Zuck(storiesElement, storiesOptions);

  } catch (err) {
    console.log('Error in fetchStories:', err);
  }
}

async function addStoryFromPost(post) {
  const storyData = {
    id: post.story_id,
    name: `${post.owner_firstname} ${post.owner_lastname}`,
    photo: post.owner_avatar,
    link: post.owner_link,
    lastUpdated: Math.floor(new Date(post.owner_last_update).getTime() / 1000),
    items: [{
      id: `${post.user_id}-story-${post.story_id}`,
      apiId: post.story_id,
      type: post.image_type,
      length: 15,
      src: post.image_url,
      preview: '',
      link: (post.shared_post_id ? `${currentHost}/posts/${post.shared_post_id}` : `${currentHost}/posts/${post.story_id}`),
      linkText: post.post_content,
      time: Math.floor(new Date(post.created_at).getTime() / 1000),
      timeAgo: post.created_at_ago,
      seen: false
    }]
  };

  // Update stories with new data
  stories.update(storyData);
}

document.addEventListener('DOMContentLoaded', async () => {
  await fetchStories();
});

// Create story
$('#image_story').on('change', function (e) {
  var files = e.target.files;
  var done = function (url) {
    retrievedImageRecto.src = url;
    var modal = new bootstrap.Modal(document.getElementById('cropModal_story'), { keyboard: false });

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

$('#cropModal_story').on('shown.bs.modal', function () {
  cropper = new Cropper(retrievedImageStory, {
    // aspectRatio: 4 / 3,
    viewMode: 3,
    preview: '#cropModal_story .preview'
  });

}).on('hidden.bs.modal', function () {
  cropper.destroy();

  cropper = null;
});

$('#cropModal_story #crop_story').on('click', function () {
  var canvas = cropper.getCroppedCanvas(/*{width: 1280, height: 960}*/);

  canvas.toBlob(function (blob) {
    URL.createObjectURL(blob);
    var reader = new FileReader();

    reader.readAsDataURL(blob);
    reader.onloadend = function () {
      var base64_data = reader.result;

      $(currentImageStory).attr('src', base64_data);
      $('#data_story').attr('value', base64_data);
    };
  });
});

const sendStory = document.getElementById('sendStory');

sendStory.addEventListener('click', async () => {
  // "AddPost" object
  const post = new AddPost();
  // Form data
  const postUrl = document.getElementById('postUrl');
  const postTitle = document.getElementById('postTitle');
  const postContent = document.getElementById('postContent');
  const sharedPostId = document.getElementById('sharedPostId');
  const price = document.getElementById('price');
  const currency = document.getElementById('currency');
  const quantity = document.getElementById('quantity');
  const answeredFor = document.getElementById('answeredFor');
  const latitude = document.getElementById('latitude');
  const longitude = document.getElementById('longitude');
  const city = document.getElementById('city');
  const region = document.getElementById('region');
  const country = document.getElementById('country');
  const typeId = document.getElementById('typeId');
  const categoryId = document.getElementById('categoryId');
  const statusId = document.getElementById('statusId');
  const visibilityId = document.getElementById('visibilityId');
  const coverageAreaId = document.getElementById('coverageAreaId');
  const budgetId = document.getElementById('budgetId');
  const communityId = document.getElementById('communityId');
  const eventId = document.getElementById('eventId');
  const userId = document.getElementById('userId');

  post.setUniqueVariables(
    (postUrl ? postUrl.value : null), (postUrl ? postTitle.value : null), (postContent ? postContent.value : null),
    (sharedPostId ? sharedPostId.value : null), (price ? price.value : null), (currency ? currency.value : null),
    (quantity ? quantity.value : null), (answeredFor ? answeredFor.value : null), (latitude ? latitude.value : null),
    (longitude ? longitude.value : null), (city ? city.value : null), (region ? region.value : null), (country ? country.value : null),
    (typeId ? typeId.value : null), (categoryId ? categoryId.value : null), (statusId ? statusId.value : null),
    (visibilityId ? visibilityId.value : null), (coverageAreaId ? coverageAreaId.value : null), (budgetId ? budgetId.value : null),
    (communityId ? communityId.value : null), (eventId ? eventId.value : null), (userId ? userId.value : null)
  );

  const choicesContents = document.querySelectorAll('[name="choicesContents"]');
  const iconsFonts = document.querySelectorAll('[name="iconsFonts"]');
  const imagesUrls = document.querySelectorAll('[name="imagesUrls"]');

  if (choicesContents.length > 0) {
    for (let i = 0; i < choicesContents.length; i++) {
      post.addPollData(choicesContents[i], iconsFonts[i], imagesUrls[i]);
    }
  }

  const savedPost = await post.sendData(); // Register post and retreive response

  await addStoryFromPost(savedPost.data); // Add a new story
});
