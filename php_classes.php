<?php

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "camagru";
class Insert{
    public function __Construct(array $to_insert){
        try{
            if($to_insert == NULL){
                throw new Exception("No information to insert");
            }
            try{
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INTERT INTO $to_insert[0] ($to_insert[1]) VALUES ($to_insert[2])";
                $conn->exec($sql);
                echo "record created";
            }
            catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
        }
        catch(Exception $e){
            echo "Message: " .$e->getMessage();
        }
    }
class Query {
    private $to_return;
    public function __Constructor(array $to_query){
        try{
            if ($to_query == NULL){
                throw new Exception("No information to query");
            }
            try{
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT $to_query[0] FROM $to_query[1]");
                $stmt->execute();
                $goodArray = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $this->to_return = $goodArray;
            }
            catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }
        catch(Exception $e){
            echo "Message: " .$e->getMessage();
        }
    }
    public function getAnswer(){
        return $this->to_return
    }
}
class Update {
    public function __Constructor (array $to_update){
        try{
            if (array $to_update == NULL){
                throw new Exception("No information to update");
            }
            try{
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE $to_update[0] SET $to_update[1] WHERE $to_update[2]";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                echo $stmt->rowCount() . "UPDATED";
            }
            catch(PDOException $e){
                echo $sql . $e->getMessage();
            }
        }
        catch(Exception $e){
            echo "Message: " .$e->getMeassage();
        }
    }
}
class Delete {
    public function __Constructor(array $to_delete){
        try{
            if ($to_delete == NULL){
                throw new Exception("Nothing selected for deletion");
            }
            try{
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "DELETE FROM $to_delete[0] WHERE $to_delete[1]";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                echo $stmt->rowCount() . "DELETED";
            }
            catch(PDOException $e){
                echo $sql . $e->getMessage();
            }
        }
        catch(Exception $e){
            echo "Message: " . $e->getMessage();
        }
    }
}
class UserPics {
    private $allPics;
    public function __Constructor($userId){
        #1 what to select"*" 
        #2 from table *where"pictures WHERE userId='$userId'"
        $QArray = array("*", "pictures WHERE userId='$userId'")
        $picUrl = new Query($QArray);
        $this->allPics = picUrl->getAnswer();
    }
    public function getPics(){
        return $this->$allPics;
    }
}
    
?>