<?php
class User{
    public $id;
    public $name;
    public $surname;
    public $mail;
    public $number;

    public function __construct($id, $name, $surname, $mail, $number) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->mail = $mail;
        $this->number = $number;
    }

    public function toString()
    {
    }
    public static function save($conn){

        $stmt = $conn->prepare("INSERT INTO users (name, surname, mail, number) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_POST['name'], $_POST['surname'], $_POST['mail'], $_POST['number'],);//63500658
       try{ 
            $stmt->execute();
       }catch(Exception $e){
           echo $e->getMessage();
       }
        $stmt->close();
        $conn->close();
    }

}