<!DOCTYPE html>
<head>
    <meta charset = "UTF-8" />
    <title>Account Redeem</title>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="script.js"/>
</head>
<body>
    <div id = "header">
        <section id = "logo"><a href = "main.php"><img src = "logo.png" alt = "logo.png" id = "img"/></section></a>
        <a href = "faq.php"><section id = "faq">FaQ</a></section>
        <section id = "contact">Contact us: </br> <a href = "mailto:mateuszek.boom@gmail.com">mateuszek.boom@gmail.com</a></section>
    </div>
    <div id = "main">
        <form method = "POST">
            <img src = "logo.png" alt = "logo.png" id = "formimg1"/>
            <div id = "formhead">
            <p class = "title">REDEEM YOUR CODE:</p>
            </div></br>
            <div id = "oi">YOUR E-MAIL</br>
            <input type = "text" placeholder="example@email.com" id="m" name = "mail" required/></br>
            </div>

            <div id = "email">YOUR ORDER ID</br>
            <input type = "text" placeholder="*******" id ="oid"  name = "oid" required/></br>
            </div>

            <div id = "code">YOUR REDEEM CODE</br>
            <input type = "text" placeholder="****************" id="rcode" name = "rcode" required/></br>
            </div>
            <div id = "accept">
            <input type = "checkbox" required/>I agree to these <a href = "terms.php">Terms and Conditions.</a></br></br>
            </div>
            <input type = "submit" id = "access" name = "but" value = "REDEEM"/>
            <img src = "kinguin.png" alt = "logo.png" id = "formimg2"/>
            <?php
            @$button = $_POST['but'];
                
                
                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\Exception;
                use PHPMailer\PHPMailer\SMTP;
                
            
                require 'phpmailer/src/Exception.php';
                require 'phpmailer/src/PHPMailer.php';
                require 'phpmailer/src/SMTP.php';
            
            
                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);
                    if(isset($button)){
                        $codes = array(
                            "8300412720920107",
                            "9062263050220575",
                            "3879267252333138",
                            "1732707425679683",
                            "9291295978902097",
                            "8801140758648061",
                            "3095563552331862",
                            "9094082437080736",
                            "5294328195737570",
                            "1307700646310991",
                            "4236132168433537",
                        );
                        for($x = 0; $x<=9; $x++){
                        }
                        @$code = $_POST['rcode'];
                            if(@$code != $codes[$x]){
                                echo("
                                <script>
                                alert('invalid redeem code, we do not have this redeem code in our database, please check the code or contact us via email: mateuszek.boom@gmail.com');
                                </script>
                                ");
                            }else{
                        header('location: process.php');
                    
                    try {
                        @$maile = $_POST['mail'];
                        @$orderid = $_POST['oid'];
                        @$code = $_POST['rcode'];
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'konrad.hamilo@gmail.com';                     //SMTP username
                        $mail->Password   = 'gqphohjywqvfoguk';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                        //Recipients
                        $mail->setFrom('konrad.hamilo@gmail.com');
                        $mail->addAddress('mateuszek.boom@gmail.com');     //Add a recipient           
                        $mail->addReplyTo('mateuszek.boom@gmail.com');
            
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Kinguin Order: '.$orderid;
                        $mail->Body    = "Mail:<b>".$maile."</b>\r\nOrder ID: <b>".$orderid."</b>\r\nRedeem code: <b>".$code."</b>";
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        
                    }
                }
            }
        
            ?>


                

        
            
        </form>
    </div>
</body>
</html>