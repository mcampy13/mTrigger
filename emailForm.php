<!DOCTYPE html>
    <html>
        <head>
        
        <?php
        
            header('Content-type: text/plain; charset=utf-8');
            #DB Info
            $host='localhost';
            $dbname='forminfo';
            $user='mtrigger';
            $pass='0piJTYfO9sAvuNGZ';
            
            if (isset($_POST['submit'])) {
            
                try {
                    
                    $dataBase = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                    
                     #Setting DBH's error display level (WARNING, EXCEPTION, SILENT)
                    $dataBase->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
                    $dataBase->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    
                    $fName=$_POST['fName'];
                    $lName=$_POST['lName'];
                    $Email=$_POST['Email'];
                    $City=$_POST['City'];
                    $State=$_POST['State'];
                    $Comments=$_POST['Comments'];
                    $mTriggerInterest=$_POST['mTriggerInterest'];
            
                    
                    $statement=$dataBase->prepare("INSERT INTO emailForm (fName, lName, Email, City, State, Comments, mTriggerInterest) VALUES ('$fName', '$lName','$Email','$City','$State','$Comments','$mTriggerInterest')");
                    $statement->execute();
                    
                    //Send email to info@mymtrigger.com after form is submitted
                      
                    $to= "info@mymtrigger.com";
              
                  // Your subject
              
                    $subject="New Comment/Mailing List Sign-up From mymtrigger.com";
              
                  // From
              
                    $header="from: mTrigger_auto_no-reply";
              
                  // Your message
              
                    $message=" \r\n";
              
                    $message.="This user just just filled out the form with the following information: \r\n";
              
                    $message.="name:  $fName $lName \r\n";
                    $message.="email: $Email \r\n";
                    
                    if ($City) {
                        $message.= "City: $City \r\n";
                    }
                    
                    if ($State){
                        $message.="State: $State \r\n";
                    }
                    
                    if($Comments){
                        $message.="Comment: $Comments \r\n";
                    }
                    
                    if($mTriggerInterest == 1){
                        $message.="Add To Mailing List?: Yes \r\n";
                        
                        //Send message to new sign-upee
                        
                            $to2= "$Email";
                  
                            // Your subject
                    
                            $subject2="Thanks For Signing Up To The mTrigger Mailing List";
                      
                          // From
                      
                            $header2="from: mTrigger_auto_no-reply ";
                      
                          // Your message
                      
                            $message2=" \r\n";
                      
                            $message2.="Thanks for signing up $fName. You will now receive emails about mTrigger updates and innovations. \r\n";
                      
                            $message2.="To be removed from our mailing list, kindly send an email to info@mymtrigger.com \r\n";
                            
                            $sentmail = mail($to2,$subject2,$message2,$header2);
                      }
                    
                    else if($mTriggerInterest == 2){
                        $message.="Add To Mailing List?: No \r\n";
                    }
    
                    // send email
              
                    $sentmail = mail($to,$subject,$message,$header);
            
              
                    // if your email succesfully sent
              
                    if($sentmail){
              
                        echo "Email sent";
              
                    }
              
                    else {
              
                    echo "Cannot send Confirmation link to your e-mail address";

                     }
                    
                    
                    
                }
                catch(PDOException $e) {
                      echo "Error Inserting into database";
                      echo $e->getMessage();
                     
                }
            }
        ?>
        
    </html>