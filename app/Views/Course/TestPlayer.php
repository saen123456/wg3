<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Workgress</title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('dist2/css/adminlte.min.css'); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('dist2/css/photo.css'); ?>" type="text/css" media="screen">
    <link href="<?php echo base_url('dist2/css/landing-page1.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dropdown.css'); ?>" type="text/css" media="screen">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/course/css/animate.css'); ?>">

    <!-- Theme style  -->
    <link rel="stylesheet" href="<?php echo base_url('assets/course/css/style.css'); ?>">

    <!-- Modernizr JS -->
    <script src="<?php echo base_url('assets/course/js/modernizr-2.6.2.min.js'); ?>"></script>

    <link rel="preload" href="<?php echo base_url('assets/css/footer.css'); ?>" as="style" onload="this.rel='stylesheet'">

    <!-- Css player video -->
    <!-- <script src="https://cdn.plyr.io/3.6.2/plyr.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdn.plyr.io/2.0.13/plyr.css"> -->
    <!-- <script src="<?php echo base_url('assets/VideoPlayer/plyr.js'); ?>"></script> -->
    <!-- <link rel="preload" href="<?php echo base_url('assets/VideoPlayer/plyr.css'); ?>" as="style" onload="this.rel='stylesheet'"> -->

    <!-- progress bar  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/VideoPlayer/kendo.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/VideoPlayer/kendoplayer.css'); ?>" />

    <script src="<?php echo base_url('assets/VideoPlayer/kendo.all.min.js'); ?>"></script>

</head>

<?php
$this->session = \Config\Services::session();
if ($this->session->get("Role_name") == 'student') {
    $role = 'นักเรียน';
} else if ($this->session->get("Role_name") == 'teacher') {
    $role = 'คุณครู';
} else if ($this->session->get("Role_name") == 'admin') {
    $role = 'ผู้ดูแล';
}

if (session('correct')) : ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Workgress!</strong> <?php echo session('correct') ?>
    </div>
<?php
elseif (session('incorrect')) : ?>
    <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Workgress!</strong> <?php echo session('incorrect') ?>
    </div>
<?php
elseif (session('warning')) : ?>
    <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Workgress!</strong> <?php echo session('warning') ?>
    </div>
<?php
endif
?>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <ul class="navbar-nav ml-5">
                <a href="<?php echo base_url('/home'); ?>" class="navbar-brand">
                    <img src="<?php echo base_url('assets/img/logo1.png'); ?>" width="108px" height="44px">
                </a>
            </ul>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right navbar links -->
                <div class="navbar-collapse collapse w-200 order-3 dual-collapse upper" id="navbarSupportedContent">
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <!-- Messages Dropdown Menu -->
                        <div class="input-group input-group-sm">
                            <!-- Notifications Dropdown Menu -->
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                if ($this->session->get("Picture")) { ?>
                                    <img src="<?php echo $this->session->get("Picture"); ?>" width="35" height="35" class="rounded-circle"><?php
                                                                                                                                            } else { ?>
                                    <img src="<?php echo base_url('assets/img/profile.jpg'); ?>" width="40" height="40" class="rounded-circle"><?php
                                                                                                                                                }
                                                                                                                                                ?>
                            </a>
                            <div class="dropdown-menu mx-auto" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?php echo base_url('/profile'); ?>">Profile</a>
                                <?php
                                if ($this->session->get("Role_name") == 'student') {
                                    ?>
                                    <a class="dropdown-item" href="<?php echo base_url('/teacher'); ?>">สอนบน Workgress</a>
                                <?php
                                } else if ($this->session->get("Role_name") == 'admin') { ?>
                                    <a class="dropdown-item" href="<?php echo base_url('/dashboard'); ?>">Dashboard</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/course'); ?>">เพิ่ม Course</a>
                                <?php
                                } else if ($this->session->get("Role_name") == 'teacher') { ?>
                                    <a class="dropdown-item" href="<?php echo base_url('/course'); ?>">เพิ่ม Course</a>
                                <?php
                                }
                                ?>
                                <a class="dropdown-item" href="<?php echo base_url('/profile'); ?>">My Course</a>
                                <a class="dropdown-item" href="<?= site_url('/UserController/User_Logout') ?>">Log Out</a>
                            </div>
                        </div>
                    </ul>
                </div>

            </div>
        </nav>
        <!-- /.navbar -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <header class="masthead">
                <div class="overlay"></div>
                <div class="container">

                </div>
            </header>


            <!-- /.content-header -->
            <!-- Main content -->
            <div class="overlay"></div>
            <div class="container"><br><br><br><br>
                <div style="text-align:center;">


                    <!-- plyr video -->
                    <!-- <?php
                            $count = 0;
                            foreach ($data as $row) :
                                $count++;
                                echo $row['video_id'] . " " . $row['video_name'] . " " . $row['video_link'];
                                echo "<br>";
                                echo "<video id='player$count' playsinline controls data-poster=''>
						<source src='" . $row['video_link'] . "' type='video/webm'>
						</video>"
                                ?>
                        <script>
                            const player<?php echo $count ?> = new Plyr('#player<?php echo $count ?>');
                        </script>
                    <?php
                    endforeach;
                    ?> -->

                    <div id="player">
                        <div class="js-player" data-type="youtube" data-video-id="" data-ytpls="PL533213361AEB44D3"></div>
                        <div class="plyr-playlist-wrapper">
                            <ul class="plyr-playlist"></ul>
                        </div>
                    </div>
                    <script src="https://cdn.plyr.io/2.0.13/plyr.js"></script>
                    <script>
                        // YOUTUBE API 
                        //https://stackoverflow.com/questions/43839217/how-do-i-retrieve-my-youtube-channel-playlists
                        // BY CHANNEL
                        //https://content.googleapis.com/youtube/v3/channels?id=UC_x5XG1OV2P6uZZ5FSM9Ttw&part=snippet%2CcontentDetails%2Cstatistics&key=12345
                        // FOR USERNAME
                        //https://content.googleapis.com/youtube/v3/channels?forUsername=ginocote&part=snippet%2CcontentDetails%2Cstatistics&key=12345

                        // THEN GET BY UPLOAD ID AND LOAD API playlistItems 

                        // BY CHANNEL ID GET ALL
                        //https://content.googleapis.com/youtube/v3/playlists?channelId=UC-VKI9vpl2tSyv0FK9E1-KA&maxResults=50&part=snippet&key=12345

                        var addbuttons = true;

                        var players = plyr.setup(".js-player");

                        /* PLAYLIST  */
                        var myPlaylist = [{
                                type: "youtube",
                                title: "Charlie Puth - Attention [Official Video]",
                                author: "Charlie Puth",
                                sources: [{
                                    src: "nfs8NYg7yQM",
                                    type: "youtube"
                                }],
                                src: "nfs8NYg7yQM",
                                poster: "https://img.youtube.com/vi/nfs8NYg7yQM/hqdefault.jpg"
                            },
                            {
                                type: "youtube",
                                title: "Avicii - SOS ft. Aloe Blacc (Unofficial Video)",
                                author: "Avicii",
                                sources: [{
                                    src: "RnVbU3NYrZw",
                                    type: "youtube"
                                }],
                                poster: "https://i.ytimg.com/vi/RnVbU3NYrZw/default.jpg"
                            },
                            {
                                type: "youtube",
                                title: "Loud Luxury feat. brando - Body (Official Video HD)",
                                author: "Loud Luxury",
                                sources: [{
                                    src: "https://www.youtube.com/watch?v=UyxKu20xmBs",
                                    type: "youtube"
                                }],
                                poster: "https://i.ytimg.com/vi/UyxKu20xmBs/default.jpg"
                            },
                            {
                                type: "youtube",
                                title: "Loud Luxury x anders - Love No More (Official Music Video)",
                                author: "Loud Luxury",
                                sources: [{
                                    src: "https://www.youtube.com/watch?v=PJF0SBwfDq8",
                                    type: "youtube"
                                }],
                                poster: "https://img.youtube.com/vi/PJF0SBwfDq8/hqdefault.jpg"
                            },
                            {
                                type: "audio",
                                title: "Clublife by Tiësto 542 podcast ",
                                author: "Tiësto",
                                sources: [{
                                    src: "http://feed.pippa.io/public/streams/593eded1acfa040562f3480b/episodes/59c0c870ed6a93163c0a193d.m4a",
                                    type: "m4v"
                                }],
                                poster: "https://img.youtube.com/vi/r6KXy0j85AM/hqdefault.jpg"
                            },
                            {
                                type: "audio",
                                title: "Vocal Trance Vol 261",
                                author: "Sonnydeejay",
                                sources: [{
                                    src: "http://archive.org/download/SonnydeejayVocalTranceVol261/Sonnydeejay%20-Vocal%20Trance%20vol%20261.mp3",
                                    type: "mp3"
                                }],
                                poster: "http://4.bp.blogspot.com/-d6IPBUIj6YE/ThpRaIGJXtI/AAAAAAAABQ8/54RNlCrKCv4/s1600/podcast.jpg"
                            },
                            {
                                type: "youtube",
                                title: "2 hours Trance Music - Armin Van Buuren",
                                author: "Armin van Buuren",
                                sources: [{
                                    src: "https://www.youtube.com/watch?v=r6KXy0j85AM",
                                    type: "youtube"
                                }],
                                poster: "https://img.youtube.com/vi/r6KXy0j85AM/hqdefault.jpg"
                            },
                            {
                                type: "youtube",
                                title: "2 hours Trance Music - Armin Van Buuren",
                                author: "Armin van Buuren",
                                sources: [{
                                    src: "https://www.youtube.com/watch?v=r6KXy0j85AM",
                                    type: "youtube"
                                }],
                                poster: "https://img.youtube.com/vi/r6KXy0j85AM/hqdefault.jpg"
                            },
                            {
                                type: "youtube",
                                title: "2 hours Trance Music - Armin Van Buuren",
                                author: "Armin van Buuren",
                                sources: [{
                                    src: "https://www.youtube.com/watch?v=r6KXy0j85AM",
                                    type: "youtube"
                                }],
                                poster: "https://img.youtube.com/vi/r6KXy0j85AM/hqdefault.jpg"
                            },
                            {
                                type: "youtube",
                                title: "2 hours Trance Music - Armin Van Buuren",
                                author: "Armin van Buuren",
                                sources: [{
                                    src: "https://www.youtube.com/watch?v=r6KXy0j85AM",
                                    type: "youtube"
                                }],
                                poster: "https://img.youtube.com/vi/r6KXy0j85AM/hqdefault.jpg"
                            },
                            {
                                type: "youtube",
                                title: "2 hours Trance Music - Armin Van Buuren",
                                author: "Armin van Buuren",
                                sources: [{
                                    src: "https://www.youtube.com/watch?v=r6KXy0j85AM",
                                    type: "youtube"
                                }],
                                poster: "https://img.youtube.com/vi/r6KXy0j85AM/hqdefault.jpg"
                            },
                            {
                                type: "youtube",
                                title: "2 hours Trance Music - Armin Van Buuren",
                                author: "Armin van Buuren",
                                sources: [{
                                    src: "https://www.youtube.com/watch?v=r6KXy0j85AM",
                                    type: "youtube"
                                }],
                                poster: "https://img.youtube.com/vi/r6KXy0j85AM/hqdefault.jpg"
                            }
                        ];

                        /****************************************************************************************/
                        // var myPlaylist = ""; 
                        // Load json playlist OR Youtube api 3. Playlist WILL NOT WORK WITH THIS API KEY
                        /****************************************************************************************/

                        // setTimeout(function(){

                        //   //$("li.pls-playing").removeClass("pls-playing");
                        //   //$(".plyr-playlist-wrapper").remove();

                        //   var target = ".js-player";
                        //   //var limit = 50;
                        //   var apikey = "AIzaSyDDBk8tAkod1VRRNyFZF09fgQyMpnSe5HI";

                        //   loadPlaylist(target, apikey, 10, myPlaylist); 

                        // }, 5000);
                        //   // scrollTo BUG


                        var apikey = "<YOUR_YOUTUBE_API_KEY>"; // GET YOUR YOUTUBE API KEY
                        //var apikey = ""; // ONLY FOR MY CUSTOM PLAYLIST NO NEED FOR YOUTUBE API KEY
                        var target = ".js-player";
                        var limit = 30;

                        $(document).ready(function() {
                            // loadPlaylist(target, apikey, limit = 20, myPlaylist); // LOAD JSON PLAYLIST
                            loadPlaylist(target, apikey, limit, myPlaylist); // LOAD YOUTUBE OR USER VIDEO LIST

                        }); // JQUERY READY END

                        function loadPlaylist(target, apikey, limit = 20, myPlaylist) {

                            $("li.pls-playing").removeClass("pls-playing");
                            $(".plyr-playlist-wrapper").remove();

                            limit = limit - 1;

                            // GET YOUTUBE PLAYLIST
                            //var getPlaylist = $("div[data-type='youtube']").eq(0).data("playlist");
                            //var getPlaylist = $("[data-type='youtube']").data("playlist");
                            //var getPlaylist = $(".js-player").eq(0).data("playlist");

                            if (myPlaylist) {

                                PlyrPlaylist(".plyr-playlist", myPlaylist, limit);
                                //return 
                            } else {

                                var ytplaylist = $(target).attr("data-ytpls");
                                var ytuser = $(target).attr("data-user");

                                //if ($('.js-player[data-ytpls]').length > 0){
                                if (ytplaylist) {
                                    getTYPlaylist(ytplaylist, apikey, limit)
                                    //alert(ytplaylist);
                                } else if (ytuser) {
                                    alert(ytuser);
                                }

                            }

                            //typeof $getYTPls === "undefined") return;

                            //var getPlaylist = $(".js-player").eq(0).data("playlist");
                            //   var $getData = $(".js-player").eq(0);

                            //   var $getYTPls = $getData.data("ytpls");

                            //alert(getPlaylist);
                            //console.log(myPlaylist[0]);

                            //if (typeof $getYTPls === "undefined") return;

                            //var apikey = "AIzaSyB64VbCIHW48wwarovz64tcsRaZrciFkWM";
                            //
                            //var playlistId = "RDQMyFModNyxXx8";
                            //var playlistId = $getYTPls;

                            //"https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&id=YOUR-PLAYLIST-ID&key={YOUR_API_KEY}"

                            function getTYPlaylist(playlistId, apikey, limit) {

                                $.ajax({
                                    url: "https://content.googleapis.com/youtube/v3/playlistItems?&key=" +
                                        apikey +
                                        "&maxResults=" +
                                        limit +
                                        "&part=id,snippet&playlistId=" +
                                        playlistId +
                                        "&type=video",
                                    dataType: "jsonp",
                                    success: function(data) {
                                        console.log(data.items);
                                        //console.log(data.items[0].snippet.title);

                                        resultData = youtubeParser(data);

                                        console.log(resultData);

                                        PlyrPlaylist(".plyr-playlist", resultData, limit);
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        alert(textStatus, +" | " + errorThrown);
                                    }
                                });

                            }

                            //PlyrPlaylist(".plyr-playlist", myPlaylist);

                            function PlyrPlaylist(target, myPlaylist, limit) {
                                $('<div class="plyr-playlist-wrapper"><ul class="plyr-playlist"></ul></div>').insertAfter("#player");

                                var startwith = 0; // Maybe a playlist option to start with choosen video

                                var playingclass = "";
                                var items = [];
                                //var playing == 1 ;
                                $.each(myPlaylist, function(id, val) {
                                    //items.push('<li>' + option.title + '</li>');
                                    //alert(id)

                                    //console.log(val);

                                    if (0 === id) playingclass = "pls-playing";
                                    else playingclass = "";

                                    items.push(
                                        '<li class="' + playingclass + '"><a href="#" data-type="' + val.sources[0].type + '" data-video-id="' + val.sources[0].src + '"><img class="plyr-miniposter" src="' + val.poster + '"> ' +
                                        val.title + " - " + val.author + "</a></li> ");

                                    if (id == limit)
                                        return false;

                                });
                                $(target).html(items.join(""));

                                setTimeout(function() {
                                    //$(target+" .pls-playing").find("a").trigger("click");

                                }, 600);

                                // players[0].on("isReady", function(event) {
                                //   alert("isReady")
                                //   $(target+" .pls-playing").find("a").trigger("click");
                                // });

                                // players[0].on("ready", function(event) {
                                //   //$(".plyr-playlist .pls-playing").find("a").one().trigger("click");
                                //   //players[0].play();
                                //   $(target+" .pls-playing").find("a").trigger("click");
                                // });

                                // hack, play the first video in the playlist
                                // setTimeout(function(){ 
                                //       $(target).find("a").trigger("click");
                                // }, 500);

                                //   var getObj = myPlaylist[startwith];

                                //   var video_id = getObj.youtube;
                                //   var video_title = getObj.title;

                                //   alert(video_id)

                                //   console.log(video_id);

                                //   //console.log(myPlaylist[0]);

                                //   players[0].source({
                                //     type: "video",
                                //     title: "video_title",
                                //     sources: [{ src: "cLcKew4cQq4", type: "youtube" }]
                                //   });

                                //console.log(items[0]);
                            }

                            players[0].on("ready", function(event) {
                                //$(".plyr-playlist .pls-playing").find("a").one().trigger("click");
                                console.log("Ready.....................................................");
                                players[0].play();


                                if (addbuttons) {

                                    $(".plyr-playlist .pls-playing").find("a").trigger("click");

                                    $('<button type="button" class="plyr-prev"><i class="fa fa-step-backward fa-lg"></i></button>').insertBefore('.plyr__controls [data-plyr="play"]');

                                    $('<button type="button" class="plyr-next"><i class="fa fa-step-forward fa-lg"></i></button>').insertAfter('.plyr__controls [data-plyr="pause"]');

                                    addbuttons = false;
                                }

                            }).on("ended", function(event) {
                                var $next = $(".plyr-playlist .pls-playing")
                                    .next()
                                    .find("a")
                                    .trigger("click");
                                //$next.parent().addClass("pls-playing");
                            });

                            // hack, play the first video in the playlist
                            //$(".plyr-playlist .pls-playing").find("a").trigger("click");
                            //$(target).find("pls-playing a").trigger("click");
                            // setTimeout(function(){ 
                            //       $(".plyr-playlist .pls-playing").find("a").trigger("click");
                            // }, 500);

                            $(document).on("click", "ul.plyr-playlist li a", function(event) {
                                    //$("ul.plyr-playlist li a").on("click", function(event) {
                                    event.preventDefault();

                                    $("li.pls-playing").removeClass("pls-playing");
                                    $(this)
                                        .parent()
                                        .addClass("pls-playing");

                                    var video_id = $(this).data("video-id");
                                    var video_type = $(this).data("type");
                                    var video_title = $(this).text();

                                    //alert(video_id);

                                    players[0].source({
                                        type: "video",
                                        title: "video_title",
                                        sources: [{
                                            src: video_id,
                                            type: video_type
                                        }]
                                    });

                                    //ScrollTo($(".pls-playing").attr("href"), 500,0,10);

                                    $(".plyr-playlist").scrollTo(".pls-playing", 300);

                                    // players[0].on("ended", function(event) {
                                    //   console.log("test");
                                    // });
                                })
                                .on("click", ".plyr-prev", function(event) {
                                    var $next = $(".plyr-playlist .pls-playing")
                                        .prev()
                                        .find("a")
                                        .trigger("click");
                                })
                                .on("click", ".plyr-next", function(event) {
                                    var $next = $(".plyr-playlist .pls-playing")
                                        .next()
                                        .find("a")
                                        .trigger("click");
                                });

                            ///////////////////////

                            // GET YOUTUBE PLAYLIST
                            /* YOUTUBE PLAYLIST PARSER */
                            // http://jsfiddle.net/onigetoc/cb2u1y4k/
                            function youtubeParser(data) {
                                var new_Data = data.items.map(function(item) {
                                    var thumb;

                                    if (item.snippet.thumbnails) {
                                        if (item.snippet.thumbnails.default)
                                            //live?
                                            thumb = item.snippet.thumbnails.default.url;

                                        if (item.snippet.thumbnails.medium)
                                            //live?
                                            thumb = item.snippet.thumbnails.default.url;
                                    }

                                    return {
                                        //type: "youtube",
                                        title: item.snippet.title,
                                        description: item.snippet.description,
                                        author: item.snippet.channelTitle,
                                        sources: [{
                                            src: item.snippet.resourceId.videoId,
                                            type: item.kind.split('#')[0]
                                        }],
                                        poster: thumb
                                    };
                                });

                                console.log(new_Data);

                                // var output = {
                                //   item: new_Data
                                // };

                                return new_Data;
                            }
                        }

                        /****** GC ScrollTo **********/
                        // mine: https://jsfiddle.net/onigetoc/5kh0e5f4/
                        // https://stackoverflow.com/questions/2346011/how-do-i-scroll-to-an-element-within-an-overflowed-div
                        jQuery.fn.scrollTo = function(elem, speed, margin) {
                            jQuery(this).animate({
                                    scrollTop: jQuery(this).scrollTop() -
                                        jQuery(this).offset().top +
                                        jQuery(elem).offset().top
                                },
                                speed == undefined ? 1000 : speed
                            );
                            return this;
                        };
                    </script>

                </div>


            </div>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Profile</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="footernew">
            </div>
        </footer>
        <div class="footernew2">
            <a href="<?php echo base_url('/home'); ?>">
                <div class="footerimg">
                    <img src="<?php echo base_url('assets/img/logo2.png'); ?>">
                </div>
            </a>

            <div class="footericonphone">
                <i class="fa fa-phone">
                </i>
            </div>
            <div class="fa-phonetext">
                <h6 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px;">(000) 123 4567</h6>
            </div>

            <div class="footericonemail">
                <i class="fa fa-envelope">
                </i>
            </div>
            <div class="fa-envelopetext">
                <h6 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px;">hello@workgress.com</h6>
            </div>

            <div class="footericonsocial">
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-twitter-square"></i>
                <i class="fab fa-google-plus-square"></i>
                <i class="fab fa-instagram"></i>
            </div>

            <!-- company row -->
            <div class="row">
                <div class="column">
                    <h2 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 22px;">Company</h2><br>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">เกี่ยวกับเรา</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">บล็อค</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">ติดค่อเรา</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Become a Teacger</p>
                </div>
            </div>

            <!-- links row -->
            <div class="row">
                <div class="column2">
                    <h2 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 22px;">LINKS</h2><br>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Courses</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Events</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Gallery</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">FAQs</p>
                </div>
            </div>

            <!-- SUPPORT row -->
            <div class="row">
                <div class="column3">
                    <h2 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 22px;">SUPPORT</h2><br>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Documentation</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Forums</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Lauguage Packs</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Release Status</p>
                </div>
            </div>

            <!-- Recomment row -->
            <div class="row">
                <div class="column4">
                    <h2 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 22px;">RECOMMEND</h2><br>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">WordPress</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">LearnPress</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">WooCommerce</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">bbPress</p>
                </div>
            </div>

            <!-- line -->
            <hr class="line">

            <div class="footerinc">
                <p style="font-family: Roboto;font-style: normal;font-weight: normal;">ลิขสิทธิ์ © 2020 WorkGress, Inc. ข้อกำหนด นโยบายความเป็นส่วนตัวและคุกกี้</p>
            </div>
        </div>
    </div>

    <!-- Content Wrapper. Contains page content -->
    <!-- ./wrapper -->

</body>

</html>