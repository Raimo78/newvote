<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=phppoll", 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}catch (Exception $e){
    die('Cannot connect to mySQL server.');
}

class contacts_object{

    function __construct(PDO $db){
        $this->db = $db;
    }

    function fetch_all(){
        $sql = 'SELECT * FROM polls';
        $statement = $this->db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    function fetch_by_id($id){
        $sql = 'SELECT * FROM polls WHERE id=:id';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $this->user, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function add($data){
        $sql = 'INSERT into polls (id, title, desc)
                                  VALUES (:id, :title, :desc)';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id',    $data['id'], PDO::PARAM_STR);
        $statement->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $statement->bindParam(':desc', $data['desc'], PDO::PARAM_STR);
        $statement->execute();
    }
    function update($data, $id){
        $sql = 'UPDATE polls SET id=:id, title=:title, desc=:desc, WHERE id=:id';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id',      $id, PDO::PARAM_INT);
        $statement->bindParam(':title',    $data['title'], PDO::PARAM_STR);
        $statement->bindParam(':desc', $data['desc'], PDO::PARAM_STR);
        $statement->execute();
    }

    function delete($id){
        $sql = 'DELETE FROM polls WHERE id=:id';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $this->user, PDO::PARAM_INT);
        $statement->execute();
    }
}

$contact = new contacts_object($db);

$do = null;
if(isset($_GET['do'])){
    $do = $_GET['do'];
}

switch($do){
    case "add":
        if($_SERVER['REQUEST_METHOD']=='POST'){
           
            if(id, title, desc are set){ {
                
                $data = array('id'=>$_POST['id'],
                              'title'=>$_POST['title'],
                              'desc'=>$_POST['desc'],
                $contact->add($data);
            }           
        }

        break;
    case "edit":
       
        if(!empty($_GET['id']) && is_numeric($_GET['id'])){
            $result = $contact->fetch_by_id($_GET['id']);
        }else{
            exit(header('Location: mypollvote.php'));
        }
 
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            if(id, title, desc are set){
                $data = array('id'=>$_POST['id'],
                              'title'=>$_POST['title'],
                              'desc'=>$_POST['desc'],
                $contact->update($data, $_POST['id']);
            }           
        }

        break;

    case "delete":
    
        if(!empty($_GET['id']) && is_numeric($_GET['id'])){
            $contact->delete($_GET['id']);
            exit(header('Location: mypollvote.php'));
        }
        break;

    default:
    
    $result = $contact->fetch_all();
    
    break;
}
?> 