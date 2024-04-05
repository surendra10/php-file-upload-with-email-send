 <?php

 		include('smtp/PHPMailerAutoload.php');

              $to   = 'surendrakmr281@gmail.com';
              $subject =  "Resgister user";
              $msg     =  "Thanks for connect me. our employee connect with in 24 Hours";

            echo smtp_mailer('surendrakmr281@gmail.com','welcome our first email','surendra kumar');
            function smtp_mailer($to,$subject, $msg){
              $mail = new PHPMailer(); 
              $mail->IsSMTP(); 
              $mail->SMTPAuth = true; 
              $mail->SMTPSecure = 'tls'; 
              $mail->Host = "smtp.gmail.com";
              $mail->Port = 587; 
              $mail->IsHTML(true);
              $mail->CharSet = 'UTF-8';
              //$mail->SMTPDebug = 2; 
              $mail->Username = "surendrakmr281@gmail.com";
              $mail->Password = "tkflwjryqflepupd";
              $mail->SetFrom("surendrakmr281@gmail.com");
              $mail->Subject = $subject;
              $mail->Body =$msg;
              $mail->AddAddress($to);
              $mail->SMTPOptions=array('ssl'=>array(
                'verify_peer'=>false,
                'verify_peer_name'=>false,
                'allow_self_signed'=>false
              ));
              if(!$mail->Send()){
                echo $mail->ErrorInfo;
              }else{
                return 'Sent';
              }
            }