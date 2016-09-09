<?php
include('class.phpmailer.php');

    $mail = new PHPMailer();  
    $mail->IsHTML(true);
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->Username = "Xarafire";
    $mail->Password = "symwe!@#123";
    $fromname = "Asiimwe Apollo Abraham";

$To = trim($email,"\r\n");
      $tContent   = '';
	  $abcd="Stuff is Hard";

      $tContent .="<table width='550px' colspan='2' cellpadding='4'>
            <tr><td align='center'><img src='imgpath' width='100' height='100'></td></tr>
            <tr><td height='20'>&nbsp;</td></tr>
            <tr>
              <td>
                <table cellspacing='1' cellpadding='1' width='100%' height='100%'>
                <tr><td align='center'><h2>Hello World<h2></td></tr/>
                <tr><td>&nbsp;</td></tr>
                <tr><td align='center'>Name: ".trim(NAME,"\r\n")."</td></tr>
                <tr><td align='center'>ABCD TEXT: ".$abcd."</td></tr>
                <tr><td>&nbsp;</td></tr>                
                </table>
              </td>
            </tr>
            </table>";
      $mail->From = "aasiimwe@dcareug.com";
      $mail->FromName = $fromname;        
      $mail->Subject = "John Doe"; 
      $mail->Body = $tContent;
      $mail->AddAddress($To); 
      $mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low
      $mail->Send();