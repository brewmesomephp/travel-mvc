<?php
namespace  MatchCore;
//error_reporting(E_ALL);



class App {
    /*during a wizard, $_SESSION ['wizard'] stores the position in the wizard we currently are
     * also, during a wizard, we store the $_SESSION['matchID'] as well -- which is the ID of the match
     *
     */

    public $domain;
    public $db;

    protected $userId; //user ID of logged in

    private $matchID;

    private $userAnswers;
    private $remoteAnswers;
    private $diffAnswers;

    private $scoreBoard;

    private $wizardStep;

    function __construct(){

    }

    function __construct($userId){
        //set teh user id, and set the answers to their answers
        $this->userId = $userId;
        $this->setUserAnswers();
    }

    function getCurrentMatch(){
        $this->wizardStep =  (isset($_SESSION['wizard'])) ? $_SESSION['wizard'][0] : -1;
    }

    function getMatchByID(){
        $matchData = $this->db->prepare("SELECT * FROM matching WHERE id=':matchid';");
        $matchData->bindParam(':matchid', $_SESSION['matchID']);
        $matchData->fetch();

    }

    function setMatchTitle(){

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

    function setTables(){
        //sanitize data inside post from Table checklist, then insert them into the database under the current matchID
        $tables = isset($_GET['setTables']) ? $_POST : -0;
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

    function setCriteria(){
        /*
         * At this stage in the Wizard, The user will have already selected the Tables.
         * These tables as defined here are simply the names of the containers that hold the categories that we
         * want to compare, user to user, with one another, and return a score.
         *
         * MatchCore1 Example
         * Table: GamerProfile, DatingProfile
         * Columns:
         * GamerProflie: {PlaysConsole, OnlineGamer, ActionGames}
         * DatingProfile: {DesiredColor, DesiredBodyType, DesiredHairType}
         *
         * We are at the section in which we go into the database, into table 'matching', and format that data listed
         * above and insert it into the row
         *
         * Array (
         *  [gamerProfile] => Array ( [0] => LikesConsoles [1] => LikesPCGames [2] => LikesPCGames )
         *  [datingProfile] => Array ( [0] => BodyType [1] => HairLength [2] => Teeth ) )
         *
         * Difficult to explain in plain English. But........
         * Each table has a subset of criteria, or Columns, that must be selected (your choice), to be compared to another
         * user's .
         * will return data in this form {tableName: tableColumn1, tableColumn2}, {tableName2: tableColumnA1, tableColumnA2}
         *
         */

        // sanitize data inside post from Table checklist, then insert them into the database under the current matchID

        $criteria = isset($_GET['setCriteria']) ? $_POST : -0;
        if ($criteria){
            foreach($criteria as $key => $postData){
                $criteria[$key] = filter_input(INPUT_POST, $postData, FILTER_SANITIZE_STRING);
            }
            $dbColumns = implode(",", $criteria);
            $tableQuery = $this->db->prepare("UPDATE matching SET dbcolumns = :dbColumns WHERE matchid = :matchID");
            $tableQuery->bindParam(':dbColumns', $dbColumns);
            $tableQuery->bindParam(':matchID', $this->matchID);
            $tableQuery->execute();
        }
    }


    function selectTables(){

    }

    function selectColumns(){

    }

    function displayTables(){
        $tables = $this->db->query("SELECT TABLE.NAME from INFORMATION_SCHEMA.TABLES");

    }

    function displayCriteria(){
        $criteria = $this->db->query("SELECT COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='users'");
    }

    function displayWeights(){

    }

    function addMore(){

    }




}



