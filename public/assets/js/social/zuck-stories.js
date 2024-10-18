/**
 * Zuck stories and stories data
 * 
 * Copyright (c) 2024 Xsam Technologies and/or its affiliates. All rights reserved.
 * 
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
*/
function addStory() {

}

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
            link: (content.shared_post_id ? `${currentHost}/posts/${content.shared_post_id}` : `${currentHost}/${story.username}`),
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
        const onwner_timestamp = new Date(story.owner_updated_at).getTime() / 1000;

        return {
          id: story.owner_id,
          name: `${story.firstname} ${story.lastname}`,
          photo: story.profile_photo_path,
          link: story.owner_link,
          lastUpdated: onwner_timestamp,
          items: contents.filter(content => content) // Élimine les éléments null
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

    console.log('Final validUniqueStories:', JSON.stringify(validUniqueStories, null, 2));

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
                  // Vérifiez si l'index ne dépasse pas le nombre d'éléments de temps
                  if (timeElements[index]) {
                    timeElements[index].innerHTML = item.timeago; // Replace "timestamp" by "timeAgo" for each item
                  }
                });

              } else {
                console.error('No time elements or items found');
              }
            }, 300); // Augmentez le délai si nécessaire
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
    const stories = Zuck(storiesElement, storiesOptions);

  } catch (err) {
    console.log('Error in fetchStories:', err);
  }
}

document.addEventListener("DOMContentLoaded", async () => {
  await fetchStories();
});
