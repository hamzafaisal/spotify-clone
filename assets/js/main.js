var currentPlaylist = [];
var shufflePlaylist = [];
var tempPlaylist = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var shuffle = false;
var userLoggedIn;
var timer;

function openPage(url) {

	if(timer != null) {
		clearTimeout(timer);
	}

	if(url.indexOf("?") == -1) {
		url = url + "?";
	}

	var encodedUrl = encodeURI(url + "&user_login=" + user_login);
	console.log(encodedUrl);
	$("#mainContent").load(encodedUrl);
	$("body").scrollTop(0);
	history.pushState(null, null, url);
}


function createPlaylist() {
	var popup = prompt("Please enter the name of your playlist");

	if(popup != null) {
        
        $.ajax({
           
            url:"includes/ajax/createPlaylist.php",
            data:{ name: popup, username: user_login },
            method:"POST",
            success:function(data){
                
			openPage("mymusic.php?owner=" + user_login + "");
                
            }
                        
        });
        
//
//		$.post("includes/ajax/createPlaylist.php", { name: popup, username: user_login })
//		.done(function(error) {
//
//			//do something when ajax returns
//			openPage("mymusic.php");
//		});
	}
}


function deletePlaylist(id) {
	var popup = confirm("Are you sure to delete playlist");

	if(popup != null) {
        
        $.ajax({
           
            url:"includes/ajax/deletePlaylist.php",
            data:{ id: id },
            method:"POST",
            success:function(data){
                
			openPage("mymusic.php?owner=" + user_login + "");
                
            }
                        
        });
        
//
//		$.post("includes/ajax/createPlaylist.php", { name: popup, username: user_login })
//		.done(function(error) {
//
//			//do something when ajax returns
//			openPage("mymusic.php");
//		});
	}
}
