// Zuck stories and stories data

var timestamp = function () {
  var timeIndex = 0;
  var shifts = [35, 60, 60 * 3, 60 * 60 * 2, 60 * 60 * 25, 60 * 60 * 24 * 4, 60 * 60 * 24 * 10];

  var now = new Date();
  var shift = shifts[timeIndex++] || 0;
  var date = new Date(now - shift * 1000);

  return date.getTime() / 1000;
};


// Stories data

// Update your story below
// let stories = new Zuck("stories", {
var stories = new Zuck("stories", {
  backNative: false,    // uses window history to enable back button on browsers/android
  previousTap: true,    // use 1/3 of the screen to navigate to previous item when tap the story
  skin: "snapgram",     // container class
  autoFullScreen: false,// enables fullscreen on mobile browsers
  avatars: true,        // shows user photo instead of last story item preview
  list: false,          // displays a timeline instead of carousel
  openEffect: true,     // enables effect when opening story
  cubeEffect: true,     // enables the 3d cube effect when sliding story
  backButton: true,     // adds a back button to close the story viewer
  /* IMP - turn this reactive: FALSE or leave it commented if not using any framework */
  // reactive: true,    // set true if you use frameworks like React to control the timeline 
  rtl: false,           // enable/disable RTL
  localStorage: true,   // set true to save "seen" position. Element must have a id to save properly.
  stories: []
});

$.ajax({
  headers: headers,
  method: 'GET',
  contentType: 'application/json',
  url: apiHost + '/post/news_feed/story/' + parseInt(currentUser),
  success: function (resultStory) {
    if (resultStory.data.length > 0) {
      resultStory.data.forEach(function (story) {
        $.ajax({
          headers: headers,
          method: 'GET',
          contentType: 'application/json',
          url: `${apiHost}/history/select_by_user_entity/${currentUser}/consultation_history/0/${story.user.id}/post/${story.id}/`,
          success: function (resultConsultation) {
            stories.push({
              id: story.user.id,
              photo: story.user.profile_photo_path,
              name: story.user.firstname + ' ' + story.user.lastname,
              link: '',
              lastUpdated: story.updated_at,
              seen: resultConsultation.success ? true : false,
              items: resultStory.data.map(data => ({
                id: data.id,
                type: data.image_type,
                length: 3,
                src: data.image.file_url,
                preview: '',
                link: '',
                linkText: '',
                time: '',
                seen: resultConsultation.success ? true : false,
              }))
            });
          },
          error: function (err) {
            console.error('Erreur lors du chargement des stories', err);
          }
        });
      });

    } else {
    }
  },
  error: function (err) {
    console.error('Erreur lors du chargement des stories', err);
  }
});
