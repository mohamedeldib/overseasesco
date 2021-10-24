<?php
	$owner_email = "procurement@overseasesco.com";
	$headers = 'From:' . $_POST["email"];
	$subject = 'A message from your site visitor ' . $_POST["name"];
	$messageBody = "";
	
	if($_POST['name']!='nope'){
		$messageBody .= '<p>Visitor: ' . $_POST["name"] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['email']!='nope'){
		$messageBody .= '<p>Email Address: ' . $_POST['email'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}else{
		$headers = '';
	} if($_POST['phone']!='nope'){		
		$messageBody .= '<p>Phone Number: ' . $_POST['phone'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	} if($_POST['message']!='nope'){
		$messageBody .= '<p>Message: ' . $_POST['message'] . '</p>' . "\n";
	} if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	} 
	if($_POST['spam'] == "5"){
	try{
		if(!mail($owner_email, $subject, $messageBody, $headers)){
			throw new Exception('');
			$Exception="Sorry..!, Mail Failed Please Try Again";
		}else{
		
		 	$submitted="Mail Sent, Thank you for Contacting us . We will respond to you as soon as possible";
		}
	}catch(Exception $e){
		echo $e->getMessage() ."\n";
	}

	$owner_email = $_POST["email"];
	$headers = 'From:procurement@overseasesco.com';
	$subject = 'Thank you for Contacting us ' . $_POST["name"];
	$messageBody = "Thank you for Contacting us . We will respond to you as soon as possible";
	if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	}
	
	try{
		if(!mail($owner_email, $subject, $messageBody, $headers)){
			throw new Exception('');
			$Exception="Sorry..!, Mail Failed Please Try Again";
         
		}else{
		 	$owner_email ='';
		 	$headers ='';
		 	$subject ='';
		 	$messageBody ='';
		 	$_POST["name"] ='';
		 	$_POST["email"] ='';
		 	$_POST['phone'] ='';
		 	$_POST['message'] ='';
		 	$_POST['spam'] ='';
		 	$submitted="Mail Sent, Thank you for Contacting us . We will respond to you as soon as possible";
          
            
		}
	}catch(Exception $e){
		echo $e->getMessage() ."\n";
	}
	} else{$Exception="Sorry..!, Please Enter the Correct Number into Spam Field and Try Again";

          }
?>


<html>
    <head>
        <meta http-equiv="refresh" content="10;url=http://www.overseasesco.com/" />
            	<!-- meta character set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Overseas Engineer for Services</title>		
		<!-- Meta Description -->
        <meta name="description" content="Overseas Engineer for Services">
        <meta name="keywords" content="Overseas Engineer for Services">
        <meta name="author" content="Ahmed Farouk">
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
		
		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <center>
        <h2><?php echo $Exception; ?></h2>
        <h2><?php echo $submitted; ?></h2>
        <h4>Redirecting in 10 seconds...</h4>
       </center>
    </body>
</html>