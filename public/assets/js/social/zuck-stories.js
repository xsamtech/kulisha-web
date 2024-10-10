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

    const stories = await Promise.all(resultStory.data.map(async (story) => {
      const items = await Promise.all(story.posts.map(async (item) => {
        try {
          const resultConsultation = await $.ajax({
            headers: headers,
            method: 'GET',
            contentType: 'application/json',
            url: `${apiHost}/history/select_by_user_entity/${currentUser}/consultation_history/0/${story.user.id}/post/${item.id}`
          });
          timestamp = new Date(item.created_at).getTime() / 1000;

          return {
            id: item.id,
            type: item.image_type,
            length: 15,
            src: item.image.file_url,
            preview: '',
            link: '',
            linkText: '',
            time: timestamp,
            seen: resultConsultation.data && resultConsultation.data !== null ? true : false
          };
        } catch (err) {
          console.log(err.responseJSON);
          console.log(err.status);
          console.log(err);
          return null; // Ou une valeur par défaut
        }
      }));

      return {
        id: story.user.id,
        name: `${story.user.firstname} ${story.user.lastname}`,
        avatar: story.user.profile_photo_path,
        link: `${currentHost}/${story.user.username}`,
        lastUpdated: story.user.updated_at,
        items: items.filter(item => item) // Enlever les éléments null
      };
    }));

    console.log("Avatars:", stories.map(story => story.avatar));
    // Formate les données pour Zuck.js
    const zuckStories = stories.map(story => ({
      id: story.id,
      name: story.name,
      photo: story.avatar,
      link: story.link, // Si nécessaire
      lastUpdated: story.lastUpdated,
      items: story.items.map(item => ({
        id: item.id,
        type: item.type,
        length: item.length,
        src: item.src,
        time: item.time,
        seen: item.seen
      }))
    }));

    const storiesElement = document.querySelector("#stories");
    // Initialiser Zuck.js
    const zuck = new Zuck(storiesElement, {
      rtl: false,
      skin: 'snapgram',
      avatars: true,
      stories: zuckStories, // Array of story data
      backButton: true,
      backNative: false,
      paginationArrows: true,
      previousTap: true,
      autoFullScreen: false,
      openEffect: true,
      cubeEffect: true,
      list: false,
      localStorage: true,
      onView: function (storyId) {
        // Appel à votre API avec le storyId
        console.log("Story viewed:", storyId);

        $.ajax({
          headers: headers,
          method: 'GET',
          contentType: 'application/json',
          url: `${apiHost}/post/${storyId}`,
          success: (response) => {
            console.log(response.message);
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

  } catch (err) {
    console.log(err.responseJSON);
    console.log(err.status);
    console.log(err);
  }
}

fetchStories();
