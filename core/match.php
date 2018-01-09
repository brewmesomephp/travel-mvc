<?php
//error_reporting(E_ALL);


namespace MatchCore;
class Match {

	public $db;


    protected $userId; //user ID of logged in
    protected $remoteUserId; //user ID of comparison user
    
    private $userAnswers;
    private $remoteAnswers;
    private $diffAnswers;
    
    private $scoreBoard;
    private $explicitRemote;
    private $explicitRemoteScore;
    
    function __construct($userId = "", $db, $remote=""){
        if (isset($userId) && $userId != "") {
            $this->userId = $userId;
        }
            elseif (isset($_SESSION['user_id'])){
                $this->userId = $_SESSION['user_id'];
            }
        if ($remote != ""){
                        $this->explicitRemote = $remote;
        }
//            $this->debug($this->userId);
            //        $this->run();
        $this->db = $db;

        $this->run();
    }

    
    public function setUser($userId){
        //set teh user id, and set the answers to their answers
        $this->userId = $userId;
    }


    
    private function setUserAnswers($userId =""){

        if ($userId == ""){
            $userId = $this->userId;
        }
//        print "userId from inside setUserAnswers: $userId <br />";
        $user = $this->db->query("SELECT `id`,`city`, `country`, `latitude`, `longitude`, `interests`, `is_vip`,`has_traveled`, `where_traveled`, `preferred_destination`, `cruising_or_touring`, `state_of_health`, `active_or_slow_travel`, `distance_to_travel`, `spontaneous_or_itinerary`, `smoker`, `accommodation_type`, `budget`, `luggage_type`, `foodie`, `alcohol`, `rating_lounge_poolside_beach`, `rating_explore`, `rating_shopping`, `rating_casino`, `rating_tours`, `rating_food`, `rating_spa`, `rating_sports`, `rating_concerts`, `group_or_independent`, `small_or_mega_ship_cruising`, `active_or_sedentary` FROM users WHERE id='$userId'");
        $user = $user->fetch_object();


        $user = json_decode(json_encode($user), true);

		$this->userAnswers = $user;
    }
    
    
    public function setRemoteUser($remoteUserId){
        $this->remoteUserId = $remoteUserId;
    }
    
    private function setRemoteUserAnswers($userId){
        $user = $this->db->query("SELECT `id`, `city`, `country`, `marital_status`,`latitude`, `longitude`, `interests`, `is_vip`,`has_traveled`, `where_traveled`, `preferred_destination`, `cruising_or_touring`, `state_of_health`, `active_or_slow_travel`, `distance_to_travel`, `spontaneous_or_itinerary`, `smoker`, `accommodation_type`, `budget`, `luggage_type`, `foodie`, `alcohol`, `rating_lounge_poolside_beach`, `rating_explore`, `rating_shopping`, `rating_casino`, `rating_tours`, `rating_food`, `rating_spa`, `rating_sports`, `rating_concerts`, `group_or_independent`, `small_or_mega_ship_cruising`, `active_or_sedentary` FROM users WHERE id='".$userId."'");
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
//        $this->debug($u);
        if ($r['id'] == 480)
//        $this->debug($r);
        if (!is_object($u) || !is_array($u))
        {

        }
        elseif( is_double($u) || is_float($u) || is_string($u) || is_int($u) || is_numeric($u) || is_real($u) || is_)
        if (intval($u)){}
        //this is where we multiply the difference between answers by the weight of the question and subtract that from 100% (match score)

//        print "<h1>$api</h1>";
//        $diff['marital_status'] = abs($u['marital_status'] != $r['marital_status']);


        $diff['has_traveled'] = abs($u['has_traveled'] != $r['has_traveled']);


//        $where_traveled = abs($u['where'] != $r['marital_status']);
        
        //Compare the arrays and store the count in $diff['matching_locations']
        //this specifically compares people's locations visited prior
        $u_locations = explode("," ,$u['where_traveled']);
        $r_locations = explode("," ,$r['where_traveled']);
        $matching_locations = array_unique(array_intersect($u_locations, $r_locations));
        $diff['matching_locations'] = count($matching_locations);
        $direct_match = isset($direct_match) ? $direct_match += count($matching_locations) : 0;
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
        $diff['accommodation_type'] = abs($u['accommodation_type'] != $r['accommodation_type']);
        $diff['budget'] = abs($u['budget'] != $r['budget']);
        $diff['luggage_type'] = abs($u['luggage_type'] != $r['luggage_type']);
        
        
        $diff['foodie'] = abs($u['foodie'] - $r['foodie']);
        $diff['alcohol'] = abs($u['alcohol'] - $r['alcohol']);
        $diff['rating_lounge_poolside_beach'] = abs($u['rating_lounge_poolside_beach'] - $r['rating_lounge_poolside_beach']);
        $diff['rating_explore'] = abs($u['rating_explore'] - $r['rating_explore']);
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

        $empty = 0;
        foreach($r as $user){
            if ($user == ""){
                $empty++;
            }
        }
        if (!isset($diff['score'])){
            $diff['score'] = 0;
        }
        if ($empty > 5){
            $diff['score']+=50;
        }

//        $diff['score'] = 100 - $diff['score'];

//        $diff['primary_language'] = abs($u['primary_language'] != $r['primary_language']);
        
        //now get the distance between the two user's locations
        /* then find the distance each of them are willing to travel to meet each other to discuss the trip
         * add those two "distance to travel" together. this means that even if they live 100 miles away from each other,
         * if their maximum travel distance is only 50 miles each, they can still meet directly in the middle, therefore
         * still making their traveling possible.
         * Example: Joe lives in San Diego and Billy Lives in Los Angeles (120 Miles Away)
         * Joe is only willing to travel 30 miles to meet his travel buddy
         * Billy is willing to travel 100 miles to meet his travel buddy
         * Since 30 + 100 = 130mi possible traveling distance, and the distance between the two is only 120
         * 130mi > 120mi and therefore, they can meet up to travel, and they are a match.
         */
        $u_lat = $u['latitude'];
        $u_lon = $u['longitude'];
        $r_lat = $u['latitude'];
        $r_lon = $u['longitude'];
//        $miles_distance = distance($u_lat, $u_lon, $r_lat, $r_lon);
        $total_travel_to_meet = intval($u['distance_to_travel']) + intval($r['distance_to_travel']);
//        if ($total_travel_to_meet < )

        $r_address = $r['city'] . " " . $r['country'];
        $r_address = str_replace(" ", "+", $r_address);
        $u_address = $u['city'] . " " . $u['country'];
        $u_address = str_replace(" ", "+", $u_address);

        if (strlen($r_address) < 2){
            $r_address = "";
        }
        if (strlen($u_address) < 2){
            $u_address = "";
        }
//        print $r_address . ", " . $u_address;
        if ($r_address != "" && $u_address != "")
            $api = file_get_contents("http://localhost/distance_api.php?address1=" . $r_address . "&address2=" . $u_address . "&distance=1");
//
//        $distance_json = json_decode($api, 1);
//        $distance_json2 = json_encode($api);
//        print $distance_json;
//        print_r($distance_json);
//        print_r($distance_json2);
        if (isset($api)){
//            print $api;
            $distance = $api;
        }



        if (isset($distance)){
                if ($total_travel_to_meet < $distance){
                    $diff['total_travel_to_meet'] = (int)(( $distance-$total_travel_to_meet) / 75);
                }
                else{
                    $diff['total_travel_to_meet'] = 0;
                }
        }

        //adds up the amount of mismatches (subtracts matching_locations because this is a matching variable, not mismatching)
        $non_matching = array_sum($diff) - $diff['matching_locations'];
        $total_possible_matches = count($diff) - 1;
        
        $matching = $total_possible_matches - $non_matching;
        $matching += $diff['matching_locations']; //add the matching locations to the total matches
        
        
        return $diff;
    }

    function debug($variable=NULL, $title=""){
        print "<div style='background-color:#eee'>";
        print "<h1 style='background-color:#eee;color:#888;font-size:24px;'>Debug: $title</h1>";
        if ($variable==NULL){
//            $variable = "";
            exit;

        }
        else {


            print "variable type: " . gettype($variable) . "<br />";
//        var_export($variable);
            if (is_array($variable) || sizeof($variable) > 1 || is_object($variable)) {
                print "is array, or is > 1";

                print "<p style='font-size:14px;background-color:#eee; font-variant: small-caps;color:#888;'><u>debug (var_dump): </u>";
                var_dump($variable);
                print"</p><br />";
                print "<p style='font-size:14px;background-color:#eee; font-variant: small-caps;color:#888;'><u>prints \$variable['id'] to test): </u>";
                $variable->latitude;
                print"</p><br />";
                foreach ($variable as $key => $v) {
                    print $key . ": " . $v . "<br />";
                }

                $encoded = json_encode($variable);
                print $encoded . " is encoded";
                $decoded = json_decode($encoded, true);
//            print "<br />devoded: $decoded;";
                foreach ($decoded as $key => $vr) {
                    if ($vr == NULL || $vr == "") {
                        $decoded[$key] = -1;
                        $vr = -1;
                    }
                    print "<br />key: $key, value: $vr";
                }

                $variable = json_encode($variable);
                print "<p style='font-size:14px;background-color:#eee; font-variant: small-caps;color:#888;'><u>debug (var_dump): </u>";
                var_dump($variable);
                print"</p><br />";
                print "<p style='font-size:14px;background-color:#eee; font-variant: small-caps;color:#888;'><u>debug (var_export): </u>";
                var_export($variable);
                print"</p><br />";
                print "<p style='font-size:14px;background-color:#eee; font-variant: small-caps;color:#888;'><u>debug (json_encode): </u>";
                print json_encode($variable);
                print"</p><br />";
            } else {
                print "<p style='font-size:14px;background-color:#eee; font-variant: small-caps;color:#888;'><u>debug (print): </u> $variable </p><br />";

            }
            print "</div>";
        }

    }
    public function run(){
//        $this->debug(NULL,"Debug test inside 1, 1");
        //here we have the User, Traveler A, who was previously set and good to go.

        //now we will run through all other users, and compare values :)

        //first we must get the array of all other users
        $this->setUserAnswers($this->userId);
//        $this->debug(NULL,"this->setUsernAnswers was just executed on line 239");


        $db = $this->db;
        $myId = $this->userId;

        if ($this->explicitRemote != ""){
            $query = "SELECT `id`,`city`, `country`, `marital_status`, `longitude`, `interests`, `is_vip`,`has_traveled`, `where_traveled`, `preferred_destination`, `cruising_or_touring`, `state_of_health`, `active_or_slow_travel`, `distance_to_travel`, `spontaneous_or_itinerary`, `smoker`, `accommodation_type`, `budget`, `luggage_type`, `foodie`, `alcohol`, `rating_lounge_poolside_beach`, `rating_explore`, `rating_shopping`, `rating_casino`, `rating_tours`, `rating_food`, `rating_spa`, `rating_sports`, `rating_concerts`, `group_or_independent`, `small_or_mega_ship_cruising`, `active_or_sedentary`, `accommodation_type` FROM users WHERE id='$this->explicitRemote' ORDER BY id DESC";
        }
        else{
            $query = "SELECT `id`,`city`, `country`, `marital_status`, `longitude`, `interests`, `is_vip`,`has_traveled`, `where_traveled`, `preferred_destination`, `cruising_or_touring`, `state_of_health`, `active_or_slow_travel`, `distance_to_travel`, `spontaneous_or_itinerary`, `smoker`, `accommodation_type`, `budget`, `luggage_type`, `foodie`, `alcohol`, `rating_lounge_poolside_beach`, `rating_explore`, `rating_shopping`, `rating_casino`, `rating_tours`, `rating_food`, `rating_spa`, `rating_sports`, `rating_concerts`, `group_or_independent`, `small_or_mega_ship_cruising`, `active_or_sedentary`, `accommodation_type` FROM users WHERE id!='$myId' ORDER BY id DESC";
        }
        if ($result = $db->query($query)) {
//            printf("Select returned %d rows.\n", $result->num_rows);
            foreach($result as $key=>$res){
                //assign each row to its key (id)
                $this->remoteAnswers[$res['id']] = $res;
            }
//            print_r($this->remoteAnswers);
//            print "I am trying to get the id of each individual result for remote.";
//            print "delving into the remote answers";
            foreach($this->remoteAnswers as $key=>$answers){
//                print "key: $key, answers" . print_r($answers, 1) . "<br />";
//             print "<h2>$key</h2><h3>" . print_r($answers, 1) ." get your hands on this </h3>";
            }
//                $this->debug($this->remoteAnswers, "THIS REMOTE ANSWERS!!!!!!!!");

            $result->close();
        }


$u = $this->userAnswers;
        foreach($this->remoteAnswers as $r){
            //set their individual ID as the current remoteUserId
            $this->remoteUserId = $r['id'];
//            print "inside foreach of this->remoteAnswers as r";
//            print_r($r);
            
            //Now we're going to compare those answers
//            print "comparing users now";
            $diff = $this->compareUserAnswers($u, $r);
//            print print_r($diff, 1) . " is the answrs.";
                
            //now we're going to store the differences in answers to the diffAnswers array
            $this->diffAnswers[$this->remoteUserId] = $diff;
            
            $this->diffAnswers[$this->remoteUserId]['score'] = array_sum($diff);
            $this->diffAnswers[$this->remoteUserId]['score'] -= $this->diffAnswers[$this->remoteUserId]['matching_locations'];
            
//                print "<h1>and for the moment of truth,,,</h1><br /><hr><div style='background-color:#eee'>";
//                print_r($this->diffAnswers);
//                print "The sum is: " . array_sum($this->diffAnswers) . "<br />";
//            print "<h1>the sizeof the arryay is: " . sizeof($this->diffAnswers) . "</h1>";
//                print "</div>";
            //Now we're going to weight and store the Match % into the scoreBoard array
        }
        foreach($this->diffAnswers as $key=>$answer_size){
            $array_sum = array_sum($answer_size);
//            print "<h1>The array sum of " . $key . " is : <b>$array_sum</b>";
//            print $key . " is the key...";
//            print $answer_size['score'] < 58 ? " Score : " . $answer_size['score'] .  " , " : "";
            if ($key == "score"){
                if ($answer_size < 60){
//                    print $answer_size;
                }
            }
        }
//        print "User 480 is : " . print_r($this->diffAnswers['480'], 1);
        if ($this->explicitRemote != ""){
            $this->explicitRemoteScore = $this->diffAnswers[$this->explicitRemote]['score'];
            print abs(100 - $this->diffAnswers[$this->explicitRemote]['score']) . "%";
        }


        $this->sortByScore();
        
        
        //select all users
        //traverse through each user as $remoteUser
        //$this->remoteUserId = $remoteUser['id'];
    }



    public function sortByScore(){
        foreach($this->diffAnswers as $key=>$row){
            $this->diffAnswers[$key]['id'] = $key;
//            print "<h1>$key</h1>";
            $score[$key] = $row['score'];
//            print sizeof($row) . " is the size of the row . <br />";
        }
//        asort($score);


        array_multisort($score, SORT_ASC, $this->diffAnswers);
//        print "The sorted version is: " .  print_r($this->diffAnswers, 1) . "<br />";

}
    
    public function getScores(){
        
        return $this->scoreBoard;
    }

    public function distance($lat1, $lon1, $lat2, $lon2, $unit="m") {
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

