    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '390',
            width: '640',
            videoId: 'Wkr7lNb4G6g',
            playerVars: {
                'autoplay': 0,
                'controls': 1
            },
            events: {
                'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
            }
        });

    }

    var playerReady = false;
    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        playerReady = true;

         $('iframe').attr('data-src', function() { return $(this).attr('src'); })
        // .removeAttr('src');


    }


    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.ENDED) {
            // alert('done');

        }
    }