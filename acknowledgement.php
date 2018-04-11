<?php
//$EmailFrom = "chriscoyier@gmail.com";
$EmailTo = "finallyfreerec@gmail.com";
$Subject = "Nice & Simple Contact Form by CSS-Tricks";
$FirstName = Trim(stripslashes($_POST['FirstName'])); 
$LastName = Trim(stripslashes($_POST['LastName'])); 
//$Tel = Trim(stripslashes($_POST['Tel'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$Phone = Trim(stripslashes($_POST['PhoneNumber'])); 
// $ProjectType = Trim(stripslashes($_POST['ProjectType'])); 
$ZipCode = Trim(stripslashes($_POST['ZipCode'])); 

// $CompanyName = Trim(stripslashes($_POST['CompanyName'])); 
// $BudgetRange = Trim(stripslashes($_POST['BudgetRange']));  
// $HearAboutUs = Trim(stripslashes($_POST['HearAboutUs'])); 


// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "FirstName: ";
// $Body .= $Name;
$Body .= $FirstName;
$Body .= "\n";
$Body .= "LastName: ";
$Body .= $LastName;
$Body .= "\n";
// $Body .= "Company Name: ";
// $Body .= $CompanyName;
// $Body .= "\n";
//$Body .= "Tel: ";
// $Body .= $Tel;
// $Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $Phone;
$Body .= "\n";
// $Body .= "Project Type: ";
// $Body .= $ProjectType;
// $Body .= "\n";
// $Body .= "Budget Range: ";
// $Body .= $BudgetRange;
// $Body .= "\n";
// $Body .= "How Did You Hear About Us: ";
// $Body .= $HearAboutUs;
// $Body .= "\n";
// $Body .= "Message: ";
// $Body .= $Message;
// $Body .= "\n";
$Body .= "ZipCode: ";
$Body .= $ZipCode;

echo $Body;
$headers = "From: siddhesh.andhari@gmail.com\r\n";
$headers .= 'Content-Type: text/plain; charset=utf-8';
$succes = mail($EmailTo, $Subject, $Body, $headers);

echo $succes;
if(isset($_POST['submit']))
{
function CheckCaptcha($userResponse) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LddLEYUAAAAAGtOPrIYLe-rZEM4wOVt9Bhj8O0d',
            'response' => $userResponse
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
        $res = curl_exec($ch);
        curl_close($ch);
        return json_decode($res, true);
    }
    // Call the function CheckCaptcha
    $result = CheckCaptcha($_POST['g-recaptcha-response']);
    if ($result['success']) {
        //If the user has checked the Captcha box
        // echo "Captcha verified Successfully";
        // $success = mail($EmailTo, $Body, "From: <$Body>");
            // $success = mail($EmailTo, $Body, "From: New Client Contact");
        $success = mail($EmailTo, "FFP: New Client Request", $Body);
	
    } else {
        // If the CAPTCHA box wasn't checked
       echo '<script>alert("Please veryify the robot check before submit."); setTimeout(function(){window.location.href ="http://www.finallyfreeproductions.com/index.html"},1000);</script>';

       // header("Location: http://www.finallyfreeproductions.com/index.html");
    }
}

//send email



// send email 
// $success = mail($EmailTo, $Body, "From: <$Body>");
//header("Location: http://www.finallyfreeproductions.com/services.html");
//echo "<script type=\"text/javascript\">\n"; 
//echo "alert('Thank you for submitting our form.');\n"; 
//echo "window.location = ('http://www.finallyfreeproductions.com/services.html');\n"; 
//echo "</script>";  

// redirect to success page 
// if ($success){

//     echo "<script type=\"text/javascript\">\n"; 
//     echo "alert('Thank you for submitting your request. Our team will reachout to you within the next 24 to 48 hours.');\n"; 
// //    echo " document.getElementById(\"alertModal\").modal('show');\n";
//     echo "window.location = ('http://www.finallyfreeproductions.com/index.html');\n"; 
//     echo "</script>";  
    
// //  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php\">";
// }
//else{
 // print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
//}
?>