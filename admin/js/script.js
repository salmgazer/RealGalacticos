/**Ajax Request**/
function sendRequest(u){
    // Send request to server
    //u a url as a string
    //async is type of request
    var obj=$.ajax({url:u,async:false});
    //Convert the JSON string to object
    var result=$.parseJSON(obj.responseText);
    return result;	//return object
}

/** Admin **/
function loginAdmin(){
    var username = $("#username").val();
    var admin_password = $("#admin_password").val();

    var strUrl = "controller/controller.php?cmd=12&username="+username+"&admin_password="+admin_password;
    var objResult = sendRequest(strUrl);

    if(objResult.result == 0){
        alert(objResult.message);
        return;
    }
    window.location.href = "home.html";
    return;
    //Could not log in
}

function adminLogout(){
    var strUrl = "controller/controller.php?cmd=13";
    var objResult = sendRequest(strUrl);
    if (objResult.result==0){
        alert(objResult.message);
        return;
    }
    window.location.href = "index.html";
}

function confirmAdmin(){
    var strUrl = "controller/controller.php?cmd=14";
    var objResult = sendRequest(strUrl);
    if (objResult.result == 0) {
        window.location.href = "index.html";
        alert(objResult.message);
        return;
    }
}
/** Admin End **/

/** Navigation **/
function news() {
	$("#management").load("views/news.html");
}

function training() {
	$("#management").load("views/training.html");
}

function stunt() {
	$("#management").load("views/stunts.html");
}

function matchvideo() {
	$("#management").load("views/matchvideo.html");
}

function slides(){
    $("#management").load("views/slides.html");
}
function manager() {
	$("#management").load("views/managers.html");
}

function match() {
	$("#management").load("views/matches.html");
}

function videos(){
	$("#management").load("views/videos.html");
}

/**Gallery**/
function gallery(){
    $("#management").load("views/gallery.html");
}

function addMatchGallery(){
    $("#gallerycont").load("views/addMatchGallery.html");
}

function addTrainingGallery(){
    $("#gallerycont").load("views/addTrainingGallery.html");
}

function collapseaddGallery(){
    $("#gallerycont").load("");
}

function addTrainingPic(){
    $("#gallerycont").load("views/addTrainingPic.html");
    trainingList();
}

function addMatchPic(){
    $("#gallerycont").load("views/addMatchPic.html");
    matchList();
}

function fillselect(data, id, item_name, value_name) {
    var newSelect = document.getElementById(id);
    //var opt = document.createElement("option");
    //opt.innerHTML ="--select Category--";
    //newSelect.appendChild(opt);
    for(i = 0; i < data.length; i++){
        var opt = document.createElement("option");
        opt.value = data[i][value_name];
        opt.innerHTML = data[i][item_name];
        newSelect.appendChild(opt);
    }
}

function matchList(){
    var strUrl = "controller/controller.php?cmd=4";
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert("No matches found, you must first add a match Gallery");
    }
    matchlists = objResult.matchlist;
    fillselect(matchlists, 'matchList','galleryname', 'gallery_id');
    /*list = "";
    for(i = 0; i < matchlist.length; i++){
        list += '<option value="'+matchlist[i]['gallery_id']+'">'+matchlist[i]['galleryname']+'</option>';
    }
    document.getElementById("matchList").innerHTML = list;
    */
}

function trainingList(){
    var strUrl = "controller/controller.php?cmd=5";
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert("No matches found, you must first add a Training Gallery");
    }
    traininglists = objResult.traininglist;
    fillselect(traininglists, 'trainingList', 'galleryname', 'gallery_id');
    /*list = "";
    for(i = 0; i < traininglist.length; i++){
        list += '<option value="'+traininglist[i]['gallery_id']+'">'+traininglist[i]['galleryname']+'</option>';
    }
    document.getElementById("trainingList").innerHTML = list;
    */
}

function addNewMatchGallery(){
    var galleryname = $("#galleryname").val();
    var match_date = $("#match_date").val();
    var description = $("#description").val();
    var pictrure = $("#picture").val();

    var strUrl = "controller/controller.php?cmd=6&galleryname="+galleryname+"&match_date="+match_date+"&description="+description+"&picture="+pictrure;
    var objResult = sendRequest(strUrl);
    alert(objResult.message);
    if(objResult.result == 1){
        document.getElementById("galleryname").innerHTML = "";
        document.getElementById("description").innerHTML = "";
        document.getElementById("picture").innerHTML = "";
    }
    return;
}

function addNewTrainingGallery(){
    var galleryname = $("#galleryname").val();
    var training_date = $("#training_date").val();
    var description = $("#description").val();
    var pictrure = $("#picture").val();

    var strUrl = "controller/controller.php?cmd=7&galleryname="+galleryname+"&training_date="+training_date+"&description="+description+"&picture="+pictrure;
    var objResult = sendRequest(strUrl);
    alert(objResult.message);
    if(objResult.result == 1){
        document.getElementById("galleryname").innerHTML = "";
        document.getElementById("description").innerHTML = "";
        document.getElementById("picture").innerHTML = "";
    }
    return;
}

/** End Gallery **/
/**News**/
function addnews() {
	$("#newscont").load("views/addnews.html");
}

function addslide(){
    $("#slidescont").load("views/addslide.html");
}

function oldslides(){
    $("#slidescont").load("views/oldslides.html");
}

function oldnews() {
	$("#newscont").load("views/oldnews.html");
}

function collapsenewscontent() {
	$("#newscont").load("");
}

/** Training **/
function addtraining() {
	$("#trainingcont").load("views/addtraining.html");
}

function oldtraining() {
	$("#trainingcont").load("views/oldtraining.html");
}

function collapsetraining(){
	$("#trainingcont").load("");
}


/** Stunts **/
function addstunt() {
	$("#stuntcont").load("views/addstunt.html");
}

function oldstunt() {
	$("#stuntcont").load("views/oldstunt.html");
}

/** Match video **/
function addmatchvideo() {
	$("#matchvideocont").load("views/addmatchvideo.html");
}

function oldmatchvideo() {
	$("#matchvideocont").load("views/oldmatchvideo.html");
}

/** Match **/
function addmatch() {
	$("#matchcont").load("views/addmatch.html");
}

function just(){
    alert("Good job");
}

function tenlatematches(){
    var strUrl = "controller/controller.php?cmd=8";
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert(objResult.message);
        return;
    }
    var matches = objResult.tenlatematches;
    var matchmodals = "";
    var oldmatches = '<div class="panel panel-primary"><div class="panel-heading"><h1 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i>Edit Matches</h1> </div> <div class="panel-body">';
    for(i = 0; i < matches.length; i++){
        match_id = matches[i]['id'];
        score = matches[i]['score'];
        opponent_score = matches[i]['opponent_score'];
        opponent = matches[i]['opponent'];
        oldmatches += '<div class="col-lg-6"><h2 class="teal-text">Real Galacticos Vs '+opponent+'</h2><h3>Match status: '+matches[i]['venue_status']+'</h3> <h4 id="date_info'+match_id+'">Match Date: '+matches[i]['match_date']+'</h4><h1>RG <strong id="scoreline'+match_id+'" style="color: red;">'+score+' : '+opponent_score+' </strong> '+matches[i]['opponent_initials']+'</h1> '+opponent+' <div id="tester"><p><br><p>Division: '+matches[i]['division']+'</p><a data-toggle="modal" data-target="#update-match'+match_id+'" class="btn btn-success btn-large">Edit</a> </p></div></div>';
        matchmodals += '<div id="update-match'+matches[i]['id']+'" class="modal fade" role="dialog"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <a class="close" data-dismiss="modal">x</a> <h3>Update Real Galacticos vs '+matches[i]['opponent']+'</h3></div><div class="modal-body"> <label>Real Galacticos score</label><input type="number" class="form-control" id="score'+match_id+'" value="'+score+'"> <label>'+matches[i]['opponent']+' score</label><input type="number" class="form-control" id="opponent_score'+match_id+'" value="'+matches[i]['opponent_score']+'"><label>Current Date: '+matches[i]['match_date']+'</label><input type="datetime-local" class="form-control" id="match_date'+match_id+'"></div> <div class="modal-footer"> <center><button class="btn btn-success" onclick="updatematch('+match_id+')">Update</button> </center> <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a> </div> </div> </div> </div>';
    }
    oldmatches += "</div></div><div id='mymatchmodals'></div>";
    document.getElementById("matchcont").innerHTML = oldmatches;
    document.getElementById("mymatchmodals").innerHTML = matchmodals;
}

function updatematch(match_id){
    var score = $("#score"+match_id).val();
    var opponent_score = $("#opponent_score"+match_id).val();
    var match_date  = $("#match_date"+match_id).val();
    var strUrl = "controller/controller.php?cmd=9&match_id="+match_id+"&score="+score+"&opponent_score="+opponent_score+"&match_date="+match_date;
    var objResult = sendRequest(strUrl);
    if(objResult.result == 1){
        document.getElementById("scoreline"+match_id).innerHTML = score+' : '+opponent_score;
        document.getElementById("date_info"+match_id).innerHTML = match_date;
    }
    alert(objResult.message);
    return;
}

/*function tenlatematchesmodals(){
    var strUrl = "controller/controller.php?cmd=8";
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert(objResult.message);
        return;
    }
    var matches = objResult.tenlatematches;
    var matchmodals = "";
    for(i = 0; i < matches.length; i++){
        matchmodals += '<div id="update-match'+matches[i]['id']+'" class="modal fade" role="dialog"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <a class="close" data-dismiss="modal">x</a> <h3>Update Real Galacticos vs '+matches[i]['opponent']+'</h3></div><div class="modal-body"> <label>Number of matches</label><input type="number" class="form-control" id="score" value="'+matches[i]['score']+'"> <label>Number of goals</label><input type="number" class="form-control" id="opponent_score" value="'+matches[i]['opponent_score']+'"> </div> <div class="modal-footer"> <center><button class="btn btn-success" onclick="updateMatch('+matches[i]['id']+')">Update</button> </center> <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a> </div> </div> </div> </div>';
    }
    document.getElementById("mymatchmodals").innerHTML = matchmodals;
}*/




function collapseAddMatch(){
    $("#matchcont").load("");
}

/** Manager **/
function addmanager() {
	$("#managercont").load("views/addmanager.html");
}

function oldmanager() {
	$("#managercont").load("views/oldmanager.html");
}

/** Player **/
function addplayer() {
	$("#playercont").load("views/addplayer.html");
}

function get_players_byDivisionAdmin(division){
    var strUrl = "controller/controller.php?cmd=10&division="+division;
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert(objResult.message);
        return;
    }
    //alert(objResult.players[0]['name']);
    displayPlayersAdmin(objResult.players);
    return;
}

function displayPlayersAdmin(players){
    //document.getElementById('players').innerHTML = '<div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue"><div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div></div></div>';
    playersDivision = '<br><div class="card-panel teal" id="current_players"> <span class="white-text"><strong class="card-title" style="font-size: 20px;">Under '+players[0]['current_division']+' Players</strong></span> </div>';
    playerDivision = players[0]['current_division'];
    document.getElementById('playercont').innerHTML = playerDivision;
    theplayers = playersDivision;
    theplayers += '<div style="display: inline" align="center">';
    for(i = 0; i < players.length; i++) {
        var player_id = players[i]['id']
        num_matches_id = 'num_matches' + player_id;
        num_goals_id = 'num_goals' + player_id;
        player_name = players[i]['name'];
            theplayers += '<div class="card col s12 m4" align="center"><div class="card-image waves-effect waves-block waves-light"><img class="activator" src="../images/players/' + players[i]['picture']+'"> </div> <div class="card-content"> <span class="card-title activator grey-text text-darken-4">' + player_name + '<i class="mdi-navigation-more-vert right"></i></span> <p><a href="#">Position: ' + players[i]['current_position'] + '</a></p> </div> <div class="card-reveal"> <span class="card-title grey-text text-darken-4">'+player_name+'<i class="mdi-navigation-close right"></i></span> <p>Number of matches:</p><input type="number" class="form-control" value="'+players[i]['num_matches']+'" id="'+num_matches_id+'"><br>Goals:<input type="number" class="form-control" value="'+players[i]['goals']+'" id="'+num_goals_id+'"><br><button class="btn btn-success" onclick="updatePlayer('+player_id+')">Update</button> <center><!--<a href="#">View Profile</a>--></a> </center></div> </div>';
    }
    theplayers += '</div>';
    document.getElementById('playercont').innerHTML = theplayers;
    //document.getElementById('close-players').innerHTML = '<a style="margin-top: 20px; margin-bottom: 30px; width: 100%;" href="#"  class="waves-effect waves-light btn-large" onclick="close_players()">Close Under '+playerDivision+' Players</a>';
}

function updatePlayer(id){
    var goals = $("#num_goals"+id).val();
    var num_matches = $("#num_matches"+id).val();
    var strUrl = "controller/controller.php?cmd=11&goals="+goals+"&num_matches="+num_matches+"&player_id="+id;
    var objResult = sendRequest(strUrl);
    alert(objResult.message);
}

function manage13() {
    get_players_byDivisionAdmin(13);

}

function manage15(){
    get_players_byDivisionAdmin(15);
}

function collapseAddPlayer(){
    $("#playercont").load("");
}

function collapseStory(){
    $("#storycont").load("");
}

function collapseVision(){
    $("#visioncont").load("");
}

function player() {
    $("#management").load("views/players.html");
}

function about_us(){
    $("#management").load("views/change_about.html");
    //$("#new-about").load("../../includes/about.txt");
    document.getElementById('new-about').innerHTML = "The bioy";
}

function collapseAbout(){
    $("#aboutcont").load("");
}

function vision(){
    $("#management").load("views/change_vision.html");
}

function story(){
    $("#management").load("views/change_story.html");
}

function addPlayer(){
    name = $("#player_name").val();
    birth = $("#date_of_birth").val();
    division = document.getElementById('division').options[document.getElementById('division').selectedIndex].text;
    position = document.getElementById('position').options[document.getElementById('position').selectedIndex].text;
    about = $("#about").val();
    signed = $("#signed").val();
    picture = $("#player_picture").val();
    var strUrl = "controller/controller.php?cmd=1&name="+name+"&birth="+birth+"&division="+division+"&position="+position+"&about="+about+"&signed="+signed+"&picture="+picture;
    var objResult = sendRequest(strUrl);
    alert(objResult.message);
    return;
}

function addSlide(){
    firstline = $("#firstline").val();
    secondline = $("#secondline").val();
    picture = $("#slide_picture").val();

    var strUrl = "controller/controller.php?cmd=2&firstline="+firstline+"&secondline="+secondline+"&picture="+picture;
    var objResult = sendRequest(strUrl);
    if(objResult.result == 1){
        document.getElementById('firstline').innerHTML = "";
        document.getElementById('secondline').innerHTML = "";
        document.getElementById('slide_picture').innerHTML = "";
    }
    alert(objResult.message);
}

function collapseAddSlide(){
    $("#slidescont").load("");
}

function add_new_match(){
    category = document.getElementById('match_category').options[document.getElementById('match_category').selectedIndex].text;
    match_date = $("#match_date").val();
    opponent = $("#opponent_name").val();
    initials = $("#opponent_initials").val();
    venue_status = document.getElementById('venue_status').options[document.getElementById('venue_status').selectedIndex].text;
    venue = $("#venue").val();
    description = $("#match_description").val();
    division = document.getElementById('division').options[document.getElementById('division').selectedIndex].text;

    var strUrl = "controller/controller.php?cmd=3&category="+category+"&match_date="+match_date+"&opponent="+opponent+"&initials="+initials+"&venue="+venue+"&venue_status="+venue_status+"&description="+description+"&division="+division;
    var objResult = sendRequest(strUrl);
    if(objResult.result == 1){
        document.getElementById('opponent_name').innerHTML = "";
        document.getElementById('opponent_initials').value = "";
        document.getElementById('venue').value = "";
    }
    alert(objResult.message);
    return;
}

