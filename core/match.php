<?php
//error_reporting(E_ALL);
class Match {
    
    public $domain;
	public $db;
    
    protected $userId; //user ID of logged in
    protected $remoteUserId; //user ID of comparison user
    
    private $userAnswers;
    private $remoteAnswers;
    private $diffAnswers;
    
    private $scoreBoard;
    
    function __construct(){
        
    }
    
    function __construct($userId){
        //set teh user id, and set the answers to their answers
        $this->userId = $userId;
        $this->setUserAnswers();
    }
    
    public function setUser($userId){
        //set teh user id, and set the answers to their answers
        $this->userId = $userId;
        $this->setUserAnswers();

    }
    
    private function setUserAnswers($userId = $this->userId){
        $user = $this->db->query("SELECT * FROM users WHERE id='".$userId."'");
		$user = $user->fetch_object();
		$this->userAnswers = $user;
    }
    
    
    public function setRemoteUser($remoteUserId){
        $this->remoteUserId = $remoteUserId;
    }
    
    private function setRemoteUserAnswers($userId = $this->remoteUserId){
        $user = $this->db->query("SELECT * FROM users WHERE id='".$userId."'");
		$user = $user->fetch_object();
		$this->userAnswers = $user;
    }
    
    private function compareUserAnswers($u, $r){
        //this is where we multiply the difference between answers by the weight of the question and subtract that from 100% (match score)
        $diff['marital_status'] = abs($u['marital_status'] - $r['marital_status']);
        $diff['has_traveled'] = abs($u['has_traveled'] - $r['has_traveled']);
//                where_traveled = abs($u['where'] - $r['marital_status']);
//                preferred_destination = abs($u['marital_status'] - $r['marital_status']);
        $diff['cruising_or_touring'] = abs($u['cruising_or_touring'] - $r['cruising_or_touring']);
        $diff['state_of_health'] = abs($u['state_of_health'] - $r['state_of_health']);
        $diff['active_or_slow_travel'] = abs($u['active_or_slow_travel'] - $r['active_or_slow_travel']);
//                distance_to_travel = abs($u['distance_to_travel'] - $r['distance_to_travel']);
        $diff['spontaneous_or_itinerary'] = abs($u['spontaneous_or_itinerary'] - $r['spontaneous_or_itinerary']);
        $diff['smoker'] = abs($u['smoker'] - $r['smoker']);
        $diff['accommodation_type'] = abs($u['acommodation_type'] - $r['accomodation_type']);
        $diff['budget'] = abs($u['budget'] - $r['budget']);
        $diff['luggage_type'] = abs($u['luggage_type'] - $r['luggage_type']);
        $diff['foodie'] = abs($u['foodie'] - $r['foodie']);
        $diff['alcohol'] = abs($u['alcohol'] - $r['alcohol']);
        $diff['rating_lounge_poolside_beach'] = abs($u['rating_lounge_poolside_beach'] - $r['rating_lounge_poolside_beach']);
        $diff['rating_explore'] = abs($u['rating_explore'] - $r['rateing_explore']);
        $diff['rating_shopping'] = abs($u['rating_shopping'] - $r['rating_shopping']);
        $diff['rating_casino'] = abs($u['rating_casino'] - $r['rating_casino']);
        $diff['rating_tours'] = abs($u['rating_tours'] - $r['rating_tours']);
        $diff['rating_food'] = abs($u['rating_food'] - $r['rating_food']);
        $diff['rating_spa'] = abs($u['rating_spa'] - $r['rating_spa']);
        $diff['rating_sports'] = abs($u['rating_sports'] - $r['rating_sports']);
        $diff['rating_concerts'] = abs($u['rating_concerts'] - $r['rating_concerts']);
        $diff['group_or_independent'] = abs($u['group_or_independent'] - $r['group_or_independent']);
        $diff['small_or_mega_ship_cruising'] = abs($u['small_or_mega_ship_cruising'] - $r['small_or_mega_ship_cruising']);
        $diff['active_or_sedentary'] = abs($u['active_or_sedentary'] - $r['active_or_sedentary']);
        $diff['primary_language'] = abs($u['primary_language'] - $r['primary_language']);
        return $diff;
    }
    
    public function run(){
        //here we have the User, Traveler A, who was previously set and good to go.
        
        //now we will run through all other users, and compare values :)
        
        //first we must get the array of all other users
        $remoteUser = $this->db->query("SELECT * FROM users WHERE id!='".$this->userId."'");
		$remoteUserAnswers = $remoteUser->fetch_object();

        //then, one at a time (foreach) we will compare values, and set the differences in an array
        $u=$this->userAnswers;
        foreach($remoteUserAnswers as $r){
            //set their individual ID as the current remoteUserId
            $this->remoteUserId = $r['id'];
            
            //Now we're going to compare those answers
            $diff = this->compareUserAnswers($u, $r);
                
            //now we're going to store the differences in answers to the diffAnswers array
            $this->diffAnswers[$this->remoteUserId] = $diff;
            
            
            //Now we're going to weight and store the Match % into the scoreBoard array
        }
        
        
        //select all users
        //traverse through each user as $remoteUser
        //$this->remoteUserId = $remoteUser['id'];
    }
    
    public function getScores(){
        
        return $this->scoreBoard;
    }
    
    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
            return ($miles * 1.609344);
            } else if ($unit == "N") {
              return ($miles * 0.8684);
            } else {
                return $miles;
            }
    }
    
    public function get

}

