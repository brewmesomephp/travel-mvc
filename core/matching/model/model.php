<?php
namespace MatchingCore;
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 11/25/2017
 * Time: 4:55 PM
 */

class WizardModel
{
    public $string;

    public function __construct(){
        $this->string = "MVC + PHP = Awesome!";
    }

    function setTitle($title){

        $matchQuery = $this->db->prepare("INSERT INTO matching (title) VALUES (:title);");
        $matchQuery->bindParam(':title', $title);
        $matchQuery->execute();
        $this->matchID = $matchQuery->lastInsertId(); //gets the value of the last auto-increment column
        $_SESSION['matchID'] = $this->matchID;

        return (isset($_SESSION['matchID']) && $_SESSION['matchID'] !!= '') ? $this->matchID : -1;
    }
    function setTables($tables){

        $dbTables = json_encode($tables);
        $tableQuery = $this->db->prepare("UPDATE matching SET matchtables = :dbTables WHERE matchid = :matchID");
        $tableQuery->bindParam(':dbTables', $dbTables);
        $tableQuery->bindParam(':matchID', $this->matchID);
        $tableQuery->execute();
    }

    function setColumns($columns){
        //sanitize data inside post from Table checklist, then insert them into the database under the current matchID

        foreach ($tables as $key => $postData) {
            $tables[$key] = filter_input(INPUT_POST, $postData, FILTER_SANITIZE_STRING);
        }
        $dbTables = implode(",", $tables);
        $tableQuery = $this->db->prepare("UPDATE matching SET matchtables = :dbTables WHERE matchid = :matchID");
        $tableQuery->bindParam(':dbTables', $dbTables);
        $tableQuery->bindParam(':matchID', $this->matchID);
        $tableQuery->execute();
    }

    function setWeights(){
        //sanitize data inside post from Table checklist, then insert them into the database under the current matchID
        $tables = isset($_GET['setTables']) ? $_POST : 0;
        if ($tables){
            foreach($tables as $key => $postData){
                $tables[$key] = filter_input(INPUT_POST, $postData, FILTER_SANITIZE_STRING);
            }
            $dbTables = implode(",", $tables);
            $tableQuery = $this->db->prepare("UPDATE matching SET matchtables = :dbTables WHERE matchid = :matchID");
            $tableQuery->bindParam(':dbTables', $dbTables);
            $tableQuery->bindParam(':matchID', $this->matchID);
            $tableQuery->execute();
        }
    }

    function getTables(){
        $q = $this->db->prepare('SELECT * FROM users WHERE id = :user_id LIMIT 1');
        $q->execute([':user_id' => $userId]);
        $user = $q->fetch();
        return $user ? $user : null;
    }

    function getColumns(){
        $q = $this->db->prepare('SELECT * FROM users WHERE id = :user_id LIMIT 1');
        $q->execute([':user_id' => $userId]);
        $user = $q->fetch();
        return $user ? $user : null;
    }

    function getWeights(){
        $q = $this->db->prepare('SELECT * FROM users WHERE id = :user_id LIMIT 1');
        $q->execute([':user_id' => $userId]);
        $user = $q->fetch();
        return $user ? $user : null;
    }

    function getAllMatchSets(){
        $q = $this->db->prepare('SELECT * FROM users WHERE id = :user_id LIMIT 1');
        $q->execute([':user_id' => $userId]);
        $user = $q->fetch();
        return $user ? $user : null;
    }

    function addNewMatchSet(){
        //sanitize the title from POST if exists and assign to title
        $title = isset($_POST['title']) ? filter_input(INPUT_POST, $_POST['title'], FILTER_SANITIZE_STRING) : -0;
        if ($title) {
            $matchQuery = $this->db->prepare("INSERT INTO matching (title) VALUES (:title);");
            $matchQuery->bindParam(':title', $title);
            $matchQuery->execute();
            $this->matchID = $matchQuery->lastInsertId(); //returns the value of the last auto-increment column
            $_SESSION['matchID'] = $this->matchID;
        }
    }

    function setLocationMatch(){
        //sanitize data inside post from Table checklist, then insert them into the database under the current matchID
        $tables = isset($_GET['setTables']) ? $_POST : 0;
        if ($tables){
            foreach($tables as $key => $postData){
                $tables[$key] = filter_input(INPUT_POST, $postData, FILTER_SANITIZE_STRING);
            }
            $dbTables = implode(",", $tables);
            $tableQuery = $this->db->prepare("UPDATE matching SET matchtables = :dbTables WHERE matchid = :matchID");
            $tableQuery->bindParam(':dbTables', $dbTables);
            $tableQuery->bindParam(':matchID', $this->matchID);
            $tableQuery->execute();
        }
    }

    function setMeetLocationMatch(){
        //sanitize data inside post from Table checklist, then insert them into the database under the current matchID
        $tables = isset($_GET['setTables']) ? $_POST : 0;
        if ($tables){
            foreach($tables as $key => $postData){
                $tables[$key] = filter_input(INPUT_POST, $postData, FILTER_SANITIZE_STRING);
            }
            $dbTables = implode(",", $tables);
            $tableQuery = $this->db->prepare("UPDATE matching SET matchtables = :dbTables WHERE matchid = :matchID");
            $tableQuery->bindParam(':dbTables', $dbTables);
            $tableQuery->bindParam(':matchID', $this->matchID);
            $tableQuery->execute();
        }
    }



}
?>