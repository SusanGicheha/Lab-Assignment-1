<?php
include_once 'connection.php';
include_once 'interface.php';

if(!isset($_SESSION)) {session_start();}

class User implements Account{
    private $Username, $Email, $Password, $Residency, $ProfilePic;

    public function __construct() {}
   public function setUsername($Username)
    {
        return $this->Username = $Username;
    }
    public function getUserName()
    {
        return $this->Username;
    }
    public function setEmail($Email)
    {
        return $this->Email =$Email;
    }
    public function getEmail()
    {
        return $this->Email;
    }
    public function setProfilePic($ProfilePic)
    {
        return $this->ProfilePic =$ProfilePic;
    }
    public function getProfilePic()
    {
        return $this->ProfilePic;
    }
    public function setResidency($Residency)
    {
        return $this->Residency =$Residency;
    }
    public function getResidency()
    {
        return $this->Residency;
    }
    public function setPassword($Password)
    {
        return $this->Password =$Password;
    }
    public function getPassword()
    {
        return $this->Password;
    }
    public function register($pdo){


   $file_name=$this->ProfilePic["name"];
   $file_type_location=$this->ProfilePic["tmp_name"];
         $file_type=substr($file_name,strpos($file_name,'.'),strlen($file_name));
    $file_path = "asset/";
        $password = password_hash($this->Password,PASSWORD_DEFAULT);
        $image_name=time().$file_type;
    if(move_uploaded_file($file_type_location, $file_path.$image_name)){

    	try{
    		$stmt=$pdo->prepare("INSERT INTO users(id,Username,Password,Email,Residency,ProfilePic)VALUES (?,?,?,?,?,?) ");
    		$stmt->execute(["",$this->Username,$password,$this->Email,$this->Residency,$image_name]);
    		$stmt= null;
    		return "successful";

    	}
    	catch (PDOException $e){
    		return $e->getMessage();
    	}
    }
}

public function login($pdo)
{
    try
    {
        $stmt=$pdo->prepare("SELECT Password FROM users WHERE Email = ?");
        $stmt->execute([$this->Email]);
        $row = $stmt->fetch();
        if($row == null){
          return "Account does not exist";
        }
        if (password_verify($this->Password,$row['Password'])){
          return "success";
        }
        return "Your username or password is not correct";
    }
    catch(PDOException $e)
    {
        return $e->getMessage();
    }
}


}
?>
