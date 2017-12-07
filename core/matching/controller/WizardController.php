<?php
namespace MatchingCore;
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 11/25/2017
 * Time: 4:55 PM
 */


class WizardController
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    function listMatchSets(){

    }

    function isValidMatchSet($match){

    }

    function existsMatchSet(){

    }

    public function index(){

    }

    public function displayMatchSet($match){

    }

    function editMatchSet(){

    }

    function deleteMatchSet(){

    }


    function getTitle(){

    }

    function isValidTitle($match){

    }

    function setTitle(){
        $title = isset($_POST['title']) ? $_POST : 0;
        if ($title) {
            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
        }
    }

    function editTitle(){

    }

    function existsTitle($match){

    }

    function existsTables($match){

    }

    function getTables(){

    }

    function setTables(){
        $tables = isset($_GET['setTables']) ? $_POST : 0;
        if ($tables) {
            foreach ($tables as $key => $postData) {
                $tables[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
            }
        }
    }

    function isValidTables(){

    }

    function editTables(){

    }

    function deleteTables(){

    }

    function cleanTables(){

    }

    function existsCriteria($match){

    }

    function getCriteria(){

    }

    function isValidCriteria(){

    }

    function editCriteria(){

    }

    function deleteCriteria(){

    }

    function cleanCriteria(){

    }

    function setCriteria(){
        $criteria = isset($_GET['setCriteria']) ? $_POST : 0;
        if ($criteria) {
            foreach ($criteria as $key => $postData) {
                $criteria[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
            }
        }
        $wizardModel = $this->getModel('WizardModel', $db);


    }

    function setWeights(){
        $weights = isset($_GET['setCriteria']) ? $_POST : 0;
        if ($weights) {
            foreach ($weights as $key => $postData) {
                $weights[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
            }
        }
    }

    function getWeights(){

    }

    function isValidWeights(){

    }

    function deleteWeights(){

    }

    function editWeights(){

    }

    function existsWeights(){

    }

    function run($user){

    }


    function showLocationCriteria(){

    }

    function setLocationCriteria(){

    }

    function isValidLocationCriteria(){

    }

    function setLocationDistanceCriteria(){

    }


    function showMeetingLocationCriteria(){

    }

    function setMeetingLocationCriteria(){

    }

    function isValidMeetingLocationCriteria(){

    }

    function setMeetingLocationDistanceCriteria(){

    }





}
?>