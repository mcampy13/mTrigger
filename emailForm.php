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
                    
                }
                catch(PDOException $e) {
                      echo "Error Inserting into database";
                      echo $e->getMessage();
                     
                }
            }
        ?>
        
    </html>