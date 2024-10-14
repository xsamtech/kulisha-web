/**
 * Zuck stories and stories data
 * 
 * Copyright (c) 2024 Xsam Technologies and/or its affiliates. All rights reserved.
 * 
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
*/
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

          return [
            `${story.owner_id}-story-${content.story_id}`, // Unique ID for the item
            content.image_type, // Type: "photo" or "video"
            15, // Length in seconds
            content.image_url, // Source URL
            '', // Preview
            '', // Link
            content.post_content, // Link text
            timestamp, // Timestamp
            !!resultConsultation.data // Seen status
          ];

        } catch (err) {
          console.log(`Error fetching consultation for story ID ${content.story_id}:`, err);
          return null; // Or default value
        }
      }));

      // Return a unique object if "contents" has elements
      if (contents.length > 0) {
        const onwner_timestamp = new Date(story.owner_updated_at).getTime() / 1000;

        return Zuck.buildTimelineItem(
          story.owner_id,
          story.profile_photo_path,
          `${story.firstname} ${story.lastname}`,
          '', // Story link (leave empty '' for javascript based zuck)
          onwner_timestamp,
          contents.filter(content => content)
        );
      }

      return null; // Don't add user without items
    }));

    // Filter null values and avoid duplicates
    const uniqueStories = apiData.filter((story, index, self) =>
      story !== null && index === self.findIndex(s => s.id === story.id)
    );

    console.log('Final uniqueStories:', JSON.stringify(uniqueStories, null, 2));

    const validUniqueStories = uniqueStories.filter(story => story && story.items.length > 0);

    // Initialize Zuck.js
    let stories = new Zuck('stories', {
      rtl: false,
      skin: 'snapgram',
      avatars: true,
      stories: validUniqueStories, // Array of story data
      backButton: true,
      backNative: false,
      paginationArrows: true,
      previousTap: true,
      autoFullScreen: false,
      openEffect: false,
      cubeEffect: true,
      list: false,
      localStorage: false,
      onView: function (storyId) {
        try {
          const updateConsultationHistory = $.ajax({
            headers: {
              'Authorization': 'Bearer ' + appRef.split('-')[0],
              'Accept': $('.mime-type').val(),
              'X-localization': navigator.language,
              'X-user-id': currentUser,
              'X-ip-address': currentIpAddr
            },
            method: 'GET',
            contentType: 'application/json',
            url: `${apiHost}/post/${storyId}`
          });

          console.log(`API Response: ${updateConsultationHistory.data}`);

        } catch (error) {
          console.log(`Error viewing story ID ${storyId}: `, error);
          return null; // Or default value
        }
      }
    });

  } catch (err) {
    console.log('Error in fetchStories:', err);
  }
}

document.addEventListener("DOMContentLoaded", async () => {
  await fetchStories();
});
