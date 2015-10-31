/**
 * Created by Sal on 5/7/2015.
 */
function sendRequest(u){
    // Send request to server
    //u a url as a string
    //async is type of request
    var obj=$.ajax({url:u,async:false});
    //Convert the JSON string to object
    var result=$.parseJSON(obj.responseText);
    return result;	//return object
}


function load_about(){
    $("#about_us").load('./includes/about.txt');
}

function load_vision(){
    $("#vision").load('./includes/vision.txt');
}

function load_story(){
    $("#story").load('./includes/story.txt');
}

function load_contact_message(){
    document.getElementById('contact-message').innerHTML = '<div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue"><div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div></div></div>';
    $("#contact-message").load('./includes/contact.txt');
}

function next_match(){
    var strUrl = "controller/controller.php?cmd=1";
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        //no match
        return;
    }
    nextmatch = "";
    mymatch = objResult.thematch[0];
    opponent = mymatch['opponent_initials'];
    if(mymatch['venue_status'] == 'home'){
        nextmatch = 'RG vs '+opponent;
    }else{
        nextmatch = opponent+' vs RG';
    }
    document.getElementById('next_game').innerHTML = nextmatch;
}

function upcomingmatches(){
    var strUrl = "controller/controller.php?cmd=12";
    var objResult = sendRequest(strUrl);

    var count = 0;

    if(objResult.result == 1){
        var matches = objResult.upcomingmatches;
        var theupcoming = "";

        for(i = 0; i < matches.length; i++){
            count++;
            var vn = matches[i]['venue_status'];
            score = matches[i]['score'];
            opponent = matches[i]['opponent_initials'];
            opponent_score = matches[i]['opponent_score'];
            division = matches[i]['division'];
            match_date = matches[i]['match_date'];
            if(vn == 'home'){
                theupcoming += ' <li class="collection-item"><a href="#"><h4><strong class="rg-match home-team">RG</strong><b id="versus"> VS </b> <strong class="away-team" style="color: black;">'+opponent+'</strong> <strong class="match-time light">U-'+division+' '+match_date+'</strong> </h4></a></li>';
            }else if(vn == 'away'){
                theupcoming += ' <li class="collection-item"><a href="#"><h4><strong class="home-team" style="color: black;">'+opponent+'</strong><b id="versus"> VS </b> <strong class="rg-match away-team">RG</strong> <strong class="match-time light">U-'+division+' '+match_date+'</strong> </h4></a></li>';
            }
        }
        document.getElementById("upcomingmatches").innerHTML = theupcoming;
    }

    num_matches = 7 - count;
    latestmatches(num_matches);
}

function latestmatches(num_matches){
    //alert(num_matches);
    var strUrl = "controller/controller.php?cmd=13&num_matches="+num_matches;
    var objResult = sendRequest(strUrl);
    if(objResult.result == 1){
        var matches = objResult.latestmatches;
        var thelatest = "";
        for(i = 0; i < matches.length; i++){
            var vn = matches[i]['venue_status'];
            score = matches[i]['score'];
            opponent = matches[i]['opponent_initials'];
            opponent_score = matches[i]['opponent_score'];
            division = matches[i]['division'];
            match_date = matches[i]['match_date'];
            if(vn == 'home'){
                thelatest += ' <li class="collection-item"><a href="#"><h4><strong class="home-team rg-match">RG</strong><b id="versus">    '+score+' : '+opponent_score+' </b> <strong class="away-team" style="color: black;">'+opponent+'</strong> <strong class="match-time light">U-'+division+' '+match_date+'</strong> </h4></a></li>';
            }else if(vn == 'away'){
                thelatest += '<li class="collection-item"><a href="#"><h4><strong class="home-team" style="color: black;">'+opponent+'</strong> <b id="versus">    '+opponent_score+' : '+score+' </b> <strong class="away-team rg-match">RG</strong> <strong class="match-time light">U-'+division+' '+match_date+'</strong> </h4></a></li>';
            }
        }
        document.getElementById("latestmatches").innerHTML = thelatest;
    }

}

function get_players_byDivision(division){
    var strUrl = "controller/controller.php?cmd=3&division="+division;
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert(objResult.message);
        return;
    }
    //alert(objResult.players[0]['name']);
    displayPlayers(objResult.players);
    return;
}


function displayPlayers(players) {
    document.getElementById('players').innerHTML = '<div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue"><div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div></div></div>';
    playersDivision = '<br><div class="card-panel teal" id="current_players"> <span class="white-text"><strong class="card-title" style="font-size: 20px;">Under '+players[0]['current_division']+' Players</strong></span> </div>';
    playerDivision = players[0]['current_division'];
    theplayers = playersDivision;
    theplayers += '<div style="display: inline" align="center">';
    for(i = 0; i < players.length; i++) {
        theplayers += '<div class="card col s12 m4" align="center"><div class="card-image waves-effect waves-block waves-light"><img class="activator" src=images/players/' + players[i]['picture'] + '> </div> <div class="card-content"> <span class="card-title activator grey-text text-darken-4">' + players[i]['name'] + '<i class="mdi-navigation-more-vert right"></i></span> <p><a href="#">Position: ' + players[i]['current_position'] + '</a></p> </div> <div class="card-reveal"> <span class="card-title grey-text text-darken-4">About<i class="mdi-navigation-close right"></i></span> <p>Number of matches: '+players[i]['num_matches']+'<br>Goals: '+players[i]['goals']+'<center><!--<a href="#">View Profile</a>--></a> </center></p> </div> </div>';
    }
    theplayers += '</div>';
    document.getElementById('players').innerHTML = theplayers;
    document.getElementById('close-players').innerHTML = '<a style="margin-top: 20px; margin-bottom: 30px; width: 100%;" href="#team"  class="waves-effect waves-light btn-large" onclick="close_players()">Close Under '+playerDivision+' Players</a>';
}

function close_players(){
    document.getElementById('players').innerHTML = "";
    document.getElementById('close-players').innerHTML = "";
}

function get_slide_picture(){
    var strUrl = "controller/controller.php?cmd=4";
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert(objResult.message);
    }

    //displaySlides(objResult.slides);
    //loading image
    document.getElementById("mylanding").style.background = "url('./images/slider/"+objResult.slide[0]['picture_path']+"') center / cover";
    document.getElementById("slide_message").innerHTML = objResult.slide[0]['picture_heading'];
}


function get_home_news(){
    document.getElementById('most_recent_news').innerHTML = '<div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active" align="center"></div>';
    var strUrl = "controller/controller.php?cmd=14&items=5";
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert(objResult.message);
        return;
    }
    alert(objResult.result);
}


function get_latest_video(){
    document.getElementById('latest_video').innerHTML = '<div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue"><div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div></div></div>';
    var strUrl = "controller/controller.php?cmd=6";
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert(objResult.message);
        return;
    }
    video = objResult.video;
    document.getElementById('latest_video').innerHTML = '<a href="#"><div class="col-sm-6 col-md-4 smallboxes"> <div id="news3"> <iframe style="width: 100%;" src="'+video[0]['youtube_url']+'" frameborder="0" allowfullscreen></iframe> <h3>'+video[0]['title']+'</h3> </div> </div> </a>';
}

function sendMessage(){
    name = $("#sender_name").val();
    email = $("#sender_email").val();
    subject = $("#sender_subject").val();
    message = $("#sender_message").val();

    var strUrl = "controller/controller.php?cmd=7&name="+name+"&email="+email+"&subject="+subject+"&message="+message;
    var objResult = sendRequest(strUrl);
    if(objResult.result==1){
        document.getElementById('sender_name').innerHTML = "";
        document.getElementById('sender_email').innerHTML = "";
        document.getElementById('sender_subject').innerHTML = "";
        document.getElementById('sender_message').innerHTML = "";
    }
    alert(objResult.message);

}

function closeGallery(){
    document.getElementById("thegallery").innerHTML = "";
}
function matchGallery(){
    var strUrl = "controller/controller.php?cmd=10";
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert(objResult.message);
        return;
    }
    galleries = objResult.galleries;
    displayGallery("Match Gallery", galleries, "match");
}

function trainingGallery(){
    var strUrl = "controller/controller.php?cmd=11";
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert(objResult.message);
        return;
    }
    galleries = objResult.galleries;
    displayGallery("Training Gallery", galleries, "train");
}

function displayGallery(name, galleries, galleryType){
    document.getElementById('thegallery').innerHTML = '<div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue"><div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div></div></div>';
    var gallery = '<div class="card-panel orange center"> <span class="white-text"><strong class="card-title" style="font-size: 20px;">'+name+'</strong></span> </div><div class="center">';
    if(galleryType == "train"){
        for(i = 0; i < galleries.length; i++){
            var galname = galleries[i]['galleryname'];
            gallery += '<div class="card small col s12 m4 center" style="margin-left: 20px; width: 30%;"><div class="card-image"><img src="images/gallery/'+galleries[i]['picture']+'"> <span class="card-title">'+galname+'</span> </div> <div class="card-content"> <p>'+galleries[i]['description']+'</p> </div> <div class="card-action"><a href="#thegallerypics"><button class="waves-effect waves-light btn-large orange" onclick="trainingPics('+galleries[i]['gallery_id']+')">Browse Gallery</button></a></div></div>';
        }
    }else if(galleryType == "match"){
        for(i = 0; i < galleries.length; i++){
            var galname = galleries[i]['galleryname'];
            gallery += '<div class="card small col s12 m4 center" style="margin-left: 20px; width: 30%;"><div class="card-image"><img src="images/gallery/'+galleries[i]['picture']+'"> <span class="card-title">'+galname+'</span> </div> <div class="card-content"> <p>'+galleries[i]['description']+'</p> </div> <div class="card-action"><a href="#thegallerypics"><button class="waves-effect waves-light btn-large orange" onclick="matchPics('+galleries[i]['gallery_id']+')">Browse Gallery</button></a></div></div>';
        }
    }
    gallery += "</div>";
    //gallery += '</div><div class="row"><button class="waves-effect waves-light btn-large" style="position: absolute; bottom: 0;" onclick="closeGallery()">Close Gallery</button></div>';
    document.getElementById('thegallery').innerHTML = gallery;
}

function closeGallery(){
    document.getElementById('thegallery').innerHTML = "";
    document.getElementById("thegallerypics").innerHTML = "";
}

function matchPics(mgid){
    document.getElementById('thegallerypics').innerHTML = '<div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue"><div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div></div></div>';
    var strUrl = "controller/controller.php?cmd=8&mgid="+mgid;
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert("No pictures for this album");
    }
    pictures = objResult.pictures;
    displayGalleryPhotos(pictures);
}

function trainingPics(tgid){
    document.getElementById('thegallerypics').innerHTML = '<div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue"><div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div></div></div>';
    var strUrl = "controller/controller.php?cmd=9&tgid="+tgid;
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert("No pictures for this album");
    }
    pictures = objResult.pictures;
    displayGalleryPhotos(pictures);
}

function displayGalleryPhotos(pictures){
    document.getElementById('thegallerypics').innerHTML = '<div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue"><div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div></div></div>';
    //var photos = '<center style="color: #000000;">'+galleryname+'</center>';
    var photos = '';
    for(i = 0; i < pictures.length; i++){
        photos += '<div class="col s12 m4 center"><img class="singlegalpic" src=images/gallery/'+pictures[i]['picture']+'></div>';
    }
    document.getElementById("thegallerypics").innerHTML = photos;
}

function iexist(){

}
