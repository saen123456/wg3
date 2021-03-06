// Need to wait for loadedmetadata event or playlist length MAY not be valid
videojs.getPlayer('myPlayerID').one('loadedmetadata', function () {
    var myPlayer = this,
        // Assign video to be played at end of playlist
        afterPlaylistVideo = 4607357817001,
        // Get length of playlist for check if playlist over
        lengthOfPlaylist = myPlayer.playlist().length,
        // Create variable for use in check if playlist over
        currentVideoInPlaylist;

    // Start playing first video in playlist
    myPlayer.muted(true);
    myPlayer.play();

    // +++ Define on event handler +++
    // On end of every video check to see if playlist over
    myPlayer.on('ended', function () {
        // Get current video in playlist, add 1 since array 0 indexed
        currentVideoInPlaylist = myPlayer.playlist.currentItem() + 1;
        // Check if playlist is over by comparing length to index of last video played
        console.log('currentVideoInPlaylist', currentVideoInPlaylist);
        console.log('lengthOfPlaylist', lengthOfPlaylist);

        if (lengthOfPlaylist === currentVideoInPlaylist) {
            // Use Video Cloud catalog to get video object
            myPlayer.catalog.getVideo(afterPlaylistVideo, function (error, video) {
                // Load the video object into the player
                myPlayer.catalog.load(video);
                // Play the video
                myPlayer.play();
                // Remove event listener or will be in infinite loop playing last video
                myPlayer.off('ended');
            })
        }
    });
});
