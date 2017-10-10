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
    
   /**
     * compareUserAnswers explanation: 
     * The objective is to compare the answers of the logged in user with the other user that we want to match against
     * Each array slot contains a String or Numerical Value 
     * If they they are string values, they will only be compared (!=) and the answer is stored in its respective 'diff' variable
     * This means that if the values are not matching, then the number 1 is stored. Else, 0 is stored. This allows a mismatching number
     * To be easily counted.
     *
     * Example: $u['preferred_destination'] = 'Lima'; $r[...] = "China"; $diff['preferred_destination'] = abs($u['pref...'] != $r['pref...'];
     * Result: $diff['pref...'] = 1;
     * 
     * If the values ARE numbers, then we find the difference between the two values, and get its absolute value
     * This allows for more specificity in differences when the category in question uses a range or scale
     * Again, though, differences are measured in non-zero numbers. Matches = 0. 
     *
     * Example: $u['rating_food'] = '5'; $r[...] = "2"; $diff['rating_food'] = abs($u['rating...'] - $r['rating...']);
     * Result: $diff['rating_...'] = 3;
     * This allows us to show that there is more of a difference of the two people, and it will reflect on their matching score.
     * 
     * @param array (User) $u [logged in user]
     * @param array (User) $r [remote user / user being matched against]
     * @return array (differences in users)
     */
    private function compareUserAnswers($u, $r){
        
        //this is where we multiply the difference between answers by the weight of the question and subtract that from 100% (match score)
        $diff['marital_status'] = abs($u['marital_status'] != $r['marital_status']);
        $diff['has_traveled'] = abs($u['has_traveled'] != $r['has_traveled']);

        
        
//        $where_traveled = abs($u['where'] != $r['marital_status']);
        
        //Compare the arrays and store the count in $diff['matching_locations']
        //this specifically compares people's locations visited prior
        $u_locations = explode("," $u['where_traveled']); 
        $r_locations = explode("," $r['where_traveled']);
        $matching_locations = array_unique(array_intersect($u_locations, $r_locations));
        $diff['matching_locations'] = count($matching_locations);
        
        $direct_match += count($matching_locations); //use this as a running counter of matches? 
        //in $diff['matching_locations'], remember that these are MATCHES. The rest of this application
        //deals in mismatches.
        //stored into matching_locations
        
        //not numerical answers (for comparison rather than finding the difference)
        //checks != so that it can use a 1 as a value, 1 means that there is a difference
        $diff['preferred_destination'] = abs($u['preferred_destination'] != $r['preferred_destination']);
        $diff['cruising_or_touring'] = abs($u['cruising_or_touring'] != $r['cruising_or_touring']);
        $diff['state_of_health'] = abs($u['state_of_health'] != $r['state_of_health']);
        $diff['active_or_slow_travel'] = abs($u['active_or_slow_travel'] != $r['active_or_slow_travel']);
//                distance_to_travel = abs($u['distance_to_travel'] != $r['distance_to_travel']);
        $diff['spontaneous_or_itinerary'] = abs($u['spontaneous_or_itinerary'] != $r['spontaneous_or_itinerary']);
        $diff['smoker'] = abs($u['smoker'] != $r['smoker']);
        $diff['accommodation_type'] = abs($u['acommodation_type'] != $r['accomodation_type']);
        $diff['budget'] = abs($u['budget'] != $r['budget']);
        $diff['luggage_type'] = abs($u['luggage_type'] != $r['luggage_type']);
        
        
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
        $diff['group_or_independent'] = abs($u['group_or_independent'] != $r['group_or_independent']);
        $diff['small_or_mega_ship_cruising'] = abs($u['small_or_mega_ship_cruising'] != $r['small_or_mega_ship_cruising']);
        $diff['active_or_sedentary'] = abs($u['active_or_sedentary'] != $r['active_or_sedentary']);
        $diff['primary_language'] = abs($u['primary_language'] != $r['primary_language']);
        
        //adds up the amount of mismatches (subtracts matching_locations because this is a matching variable, not mismatching)
        $non_matching = array_sum($diff) - $diff['matching_locations'];
        $total_possible_matches = count($diff) - 1;
        
        $matching = $total_possible_matches - $non_matching;
        $matching += $diff['matching_locations']; //add the matching locations to the total matches
        
        
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
            
            $this->diffAnswers[$this->remoteUserId]['score'] = array_sum($diff);
            $this->diffAnswers[$this->remoteUserId]['score'] -= $this->diffAnswers[$this->remoteUserId]['matching_locations'];
            
                
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

