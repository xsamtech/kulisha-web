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

    // console.log('Result Story:', resultStory.data);

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

          // console.log(`Processed item: ${content.story_id}`);

          // return {
          //   id: content.story_id,
          //   type: content.image_type,
          //   length: 15,
          //   src: content.image_url,
          //   preview: '',
          //   link: '',
          //   linkText: content.post_content,
          //   time: timestamp,
          //   seen: !!resultConsultation.data
          // };
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
          return null; // Ou une valeur par défaut
        }
      }));

      // Retourner un objet uniquement si contents a des éléments
      if (contents.length > 0) {
        const onwner_timestamp = new Date(story.owner_updated_at).getTime() / 1000;

        // return {
        //   id: story.owner_id,
        //   name: `${story.firstname} ${story.lastname}`,
        //   photo: story.profile_photo_path,
        //   link: story.owner_link,
        //   lastUpdated: onwner_timestamp,
        //   items: contents.filter(content => content) // Élimine les éléments null
        // };
        return Zuck.buildTimelineItem(
          story.owner_id,
          story.profile_photo_path,
          `${story.firstname} ${story.lastname}`,
          '', // Story link (leave empty '' for javascript based zuck)
          onwner_timestamp,
          contents.filter(content => content)
        );
      }

      return null; // Ne pas ajouter d'utilisateur sans items
    }));

    // Filtrer les valeurs null et éviter les doublons
    const uniqueStories = apiData.filter((story, index, self) =>
      story !== null && index === self.findIndex(s => s.id === story.id)
    );

    console.log('Final uniqueStories:', JSON.stringify(uniqueStories, null, 2));

    const validUniqueStories = uniqueStories.filter(story => story && story.items.length > 0);

    // console.log('Unique stories:', uniqueStories);

    // Vérifiez la structure de uniqueStories
    // uniqueStories.forEach(story => { console.log('Story:', story); });

    // const storiesElement = document.querySelector('#stories');

    // if (!storiesElement) {
    //   console.error('Stories element not found in the DOM');
    //   return;
    // }

    // console.log('Stories element:', storiesElement);

    // Initialiser Zuck.js
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
        console.log("Story viewed:", storyId);

        $.ajax({
          headers: {
            'Authorization': 'Bearer ' + appRef.split('-')[0],
            'Accept': $('.mime-type').val(),
            'X-localization': navigator.language,
            'X-user-id': currentUser,
            'X-ip-address': currentIpAddr
          },
          method: 'GET',
          contentType: 'application/json',
          url: `${apiHost}/post/${storyId}`,
          success: (response) => {
            console.log(`API Response: ${response}`);

            if (response.message) {
              console.log(`Viewed message: ${response.message}`);
            } else {
              console.log("Message property not found in response");
            }
          },
          error: function (xhr, error, status_description) {
            console.log(xhr.responseJSON ? xhr.responseJSON : xhr.responseText);
            console.log(xhr.status ? xhr.status : 'no_status');
            console.log(error);
            console.log(status_description);
          }
        });
      }
    });

  } catch (err) {
    console.log('Error in fetchStories:', err);
  }
}

document.addEventListener("DOMContentLoaded", async () => {
  await fetchStories();
});
