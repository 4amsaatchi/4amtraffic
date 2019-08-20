<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Celke - ADM</title>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<meta name="google-signin-client_id" content="248326849205-kvo6uc0hr27tnp6uu1bne809lruv7unb.apps.googleusercontent.com">
    </head>
    <body>
		Bem vindo <?php echo $_SESSION['userName']; ?>!
		
		<a href="#" onclick="signOut();">Sign out</a>
		<script>
		  function signOut() {
		    var auth2 = gapi.auth2.getAuthInstance();
		    auth2.signOut().then(function () {
		      console.log('User signed out.');
		    });
		  }
		</script>
		
    </body>
</html>