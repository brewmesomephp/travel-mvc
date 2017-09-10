<!--match this form with the language.php of the questionnaire-->
<div class="wrapper">
	<div class="section">
		<div class="container">

			<div class="row">
				<div class="col-lg-12">

					<div class="panel bg-white">
						<div class="panel-body" style="padding:10px;">
							<div class="col-md-5 pull-left">
								<h3>
									<span style="font-size:22px;" class="font600"><?=$lang['Questionnaire_Tab_Title']?></span>
								</h3>
								<hr class="mt-0">
								<form action="" method="post">

									<div class="form-group">
										<label><?=$lang['Marital_Status']?></label>
										<select name="marital_status" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->marital_status == 'Divorced') {
												echo '<option value="Single"> '.$lang['Single'].' </option>';
												echo '<option value="Married"> '.$lang['Married'].' </option>';
												echo '<option value="Divorced"  selected> '.$lang['Divorced'].' </option>';
											} 
                                            elseif($user->marital_status == 'Married') {
                                                echo '<option value="Single"> '.$lang['Single'].' </option>';
												echo '<option value="Married" selected> '.$lang['Married'].' </option>';
												echo '<option value="Divorced"> '.$lang['Divorced'].' </option>';
    
                                            } 
                                            elseif($user->marital_status == 'Single') {
                                                echo '<option value="Single" selected> '.$lang['Single'].' </option>';
												echo '<option value="Married"> '.$lang['Married'].' </option>';
												echo '<option value="Divorced"> '.$lang['Divorced'].' </option>';
											}
                                            else {
                                                echo '<option value="Single"> '.$lang['Single'].' </option>';
												echo '<option value="Married"> '.$lang['Married'].' </option>';
												echo '<option value="Divorced"> '.$lang['Divorced'].' </option>';
											}
											?>
										</select>
									</div>
                                    
                                    <!-- Has Traveled Before -->
									<div class="form-group">
										<label><?=$lang['Has_Traveled']?></label>
										<select name="has_traveled" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->has_traveled == 'No') {
												echo '<option value="Yes"> '.$lang['Yes'].' </option>';
												echo '<option value="No" selected> '.$lang['No'].' </option>';
											} 
                                            else{
												echo '<option value="Yes" selected> '.$lang['Yes'].' </option>';
												echo '<option value="No"> '.$lang['No'].' </option>';
											} 
                                    ?>
                                    </select>
									</div>
                                    
                                    <!--Where Traveled? -->
                                    <div class="form-group">
										<label><?=$lang['Where_Traveled']?></label>
										<input name="where_traveled" class="tagsinput tag-default" value="<?=$user->where_traveled?>">
										<small class="help-block text-muted">Enter your previous destinations and press enter</small>
									</div>

                                    <!-- Preferred Destination -->
                                    <div class="form-group">
										<label><?=$lang['Preferred_Destination']?></label>
										<div class="input-group">
								            <input type="text" name="preferred_destination" value="<?=$user->preferred_destination?>" class="form-control" required>

										</div>
									</div>
                                    
                                    <!-- Cruising Or Touring -->
                                    <div class="form-group">
										<label><?=$lang['Cruising_Or_Touring']?></label>
										<select name="cruising_or_touring" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->cruising_or_touring == 'Touring') {
												echo '<option value="Cruising"> '.$lang['Cruising'].' </option>';
												echo '<option value="Touring" selected> '.$lang['Touring'].' </option>';
											} 
                                            else{
												echo '<option value="Cruising" selected> '.$lang['Cruising'].' </option>';
												echo '<option value="Touring"> '.$lang['Touring'].' </option>';
											} 
                                    ?>
                                    </select>
									</div>
                                    
                                    <!-- Active Or Slow Travel -->
                                    <div class="form-group">
										<label><?=$lang['Active_Or_Slow_Travel']?></label>
										<select name="active_or_slow_travel" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->active_or_slow_travel == 'Slow') {
												echo '<option value="Active"> '.$lang['Active'].' </option>';
												echo '<option value="Slow" selected> '.$lang['Slower'].' </option>';
											} 
                                            else{
												echo '<option value="Active" selected> '.$lang['Active'].' </option>';
												echo '<option value="Slow"> '.$lang['Slower'].' </option>';
											} 
                                    ?>
                                    </select>
									</div>
                                    <!-- State of health-->
                                    <div class="form-group">
										<label><?=$lang['State_Of_Health']?></label>
										<select name="state_of_health" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->state_of_health == 'Poor') {
												echo '<option value="Excellent"> '.$lang['Excellent'].' </option>';
												echo '<option value="Average"> '.$lang['Average'].' </option>';
												echo '<option value="Poor" selected> '.$lang['Poor'].' </option>';
											} 
                                            elseif($user->state_of_health == 'Average') {
												echo '<option value="Excellent"> '.$lang['Excellent'].' </option>';
												echo '<option value="Average" selected> '.$lang['Average'].' </option>';
												echo '<option value="Poor"> '.$lang['Poor'].' </option>';
											} 
                                            else{
												echo '<option value="Excellent" selected> '.$lang['Excellent'].' </option>';
												echo '<option value="Average"> '.$lang['Average'].' </option>';
												echo '<option value="Pooe"> '.$lang['Poor'].' </option>';
											} 
                                    ?>
                                    </select>
									</div>
                                    
                                    
                                    
                                    <!-- Distance To Travel -->
                                    <div class="form-group">
										<label><?=$lang['Distance_To_Travel']?></label>
										<div class="input-group">
								            <input type="text" name="distance_to_travel" value="<?=$user->distance_to_travel?>" class="form-control" required>

										</div>
									</div>
                                    
                                    <!-- Spontaneous or Itinerary-->
                                    <div class="form-group">
										<label><?=$lang['Spontaneous_Or_Itinerary']?></label>
										<select name="spontaneous_or_itinerary" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->spontaneous_or_itinerary == 'Itinerary') {
												echo '<option value="Spontaneous"> '.$lang['Spontaneous'].' </option>';
												echo '<option value="Itinerary" selected> '.$lang['Itinerary'].' </option>';
											} 
                                            else{
												echo '<option value="Spontaneous" selected> '.$lang['Spontaneous'].' </option>';
												echo '<option value="Itinerary"> '.$lang['Itinerary'].' </option>';
											} 
                                    ?>
                                    </select>
									</div>
                                    
                                    <!-- smoker -->
                                    <div class="form-group">
										<label><?=$lang['Smoker']?></label>
										<select name="smoker" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->smoker == 'No') {
												echo '<option value="Yes"> '.$lang['Yes'].' </option>';
												echo '<option value="No" selected> '.$lang['No'].' </option>';
											} 
                                            else{
												echo '<option value="Yes" selected> '.$lang['Yes'].' </option>';
												echo '<option value="No"> '.$lang['No'].' </option>';
											} 
                                    ?>
                                    </select>
									</div>
                                    
                                    <!-- State of health-->
                                    <div class="form-group">
										<label><?=$lang['Accommodation_Type']?></label>
										<select name="accommodation_type" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->accommodation_type == 'Budget') {
												echo '<option value="Hight_End"> '.$lang['High_End'].' </option>';
												echo '<option value="Moderate"> '.$lang['Moderate'].' </option>';
												echo '<option value="Budget" selected> '.$lang['Budget'].' </option>';
											} 
                                            elseif($user->accommodation_type == 'Moderate') {
												echo '<option value="High_End"> '.$lang['High_End'].' </option>';
												echo '<option value="Moderate" selected> '.$lang['Moderate'].' </option>';
												echo '<option value="Budget"> '.$lang['Budget'].' </option>';
											} 
                                            else{
												echo '<option value="Excellent" selected> '.$lang['High_End'].' </option>';
												echo '<option value="Moderate"> '.$lang['Moderate'].' </option>';
												echo '<option value="Budget"> '.$lang['Budget'].' </option>';
											} 
                                    ?>
                                    </select>
									</div>
                                    
                                    <!-- Budget To Travel -->
                                    <div class="form-group">
										<label><?=$lang['Budget']?></label>
										<div class="input-group">
								            <input type="text" name="budget" value="<?=$user->budget?>" class="form-control" required>

										</div>
									</div>
                                    
                                    <!-- Light or Heavy Packer -->
                                    <div class="form-group">
										<label><?=$lang['Luggage_Type']?></label>
										<select name="luggage_type" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->luggage_type == 'Lot_Of_Luggage') {
												echo '<option value="Light_Packer"> '.$lang['Light_Packer'].' </option>';
												echo '<option value="Lot_Of_Luggage" selected> '.$lang['Lot_Of_Luggage'].' </option>';
											} 
                                            else{
												echo '<option value="Light_Packer" selected> '.$lang['Light_Packer'].' </option>';
												echo '<option value="Lot_Of_Luggage"> '.$lang['Lot_Of_Luggage'].' </option>';
											} 
                                    ?>
                                    </select>
									</div>
                                    
                                    <!-- foodie -->
                                    <div class="form-group">
										<label><?=$lang['Foodie']?></label>
										<select name="foodie" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->foodie == 'No') {
												echo '<option value="Yes"> '.$lang['Yes'].' </option>';
												echo '<option value="No" selected> '.$lang['No'].' </option>';
											} 
                                            else{
												echo '<option value="Yes" selected> '.$lang['Yes'].' </option>';
												echo '<option value="No"> '.$lang['No'].' </option>';
											} 
                                    ?>
                                    </select>
									</div>
                                    
                                    <!-- alcohol -->
                                    <div class="form-group">
										<label><?=$lang['Alcohol']?></label>
										<select name="alcohol" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->alcohol == 'No') {
												echo '<option value="Yes"> '.$lang['Yes'].' </option>';
												echo '<option value="No" selected> '.$lang['No'].' </option>';
											} 
                                            else{
												echo '<option value="Yes" selected> '.$lang['Yes'].' </option>';
												echo '<option value="No"> '.$lang['No'].' </option>';
											} 
                                    ?>
                                    </select>
									</div>
                                    
                                    
                                    
                                    
      
                                    
                                    
                                    
                                    
                                    <?php
                                        function rating_scale($userCol, $select_name)
                                        {?>
                                            <select name="<?=$select_name?>" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
                                                <option value="5" <?php if($userCol == 5) { echo 'selected'; } ?>> 5 </option>
                                                <option value="4" <?php if($userCol == 4) { echo 'selected'; } ?>> 4 </option>
                                                <option value="3" <?php if($userCol == 3) { echo 'selected'; } ?>> 3 </option>
                                                <option value="2" <?php if($userCol == 2) { echo 'selected'; } ?>> 2 </option>
                                                <option value="1" <?php if($userCol == 1) { echo 'selected'; } ?>> 1 </option>
                                            </select>
                                        <?}
                                        
                                    ?>

									

									<button type="submit" name="save_1" class="btn btn-theme"> <?=$lang['Save']?> </button>
								</form>
							</div>
                            
                            
							<div class="col-md-5 pull-left">
                                <form action="" method="post">

									<h3>
										<span style="font-size:22px;" class="font600"></span>
									</h3>
									<hr class="mt-0">
									<!-- Favorite activities -->
                                    <div class="form-group">
										<label><?=$lang['Favorite_Activities']?></label>
                                        <br />
<!--                                        must go in  and add these items to the database-->
                                        <label><?=$lang['Lounge']?></label>
                                        <?php rating_scale($user->rating_lounge_poolside_beach, "rating_lounge_poolside_beach");?>
									</div>
                                    
                                    <div class="form-group">
                                        <label><?=$lang['Explore']?></label>
                                        <?php rating_scale($user->rating_explore, "rating_explore");?>
									</div>
                                    <div class="form-group">
                                        <label><?=$lang['Shopping']?></label>
                                        <?php rating_scale($user->rating_shopping, "rating_shopping");?>
									</div>
                                    <div class="form-group">
                                        <label><?=$lang['Casino']?></label>
                                        <?php rating_scale($user->rating_casino, "rating_casino");?>
									</div>
                                    <div class="form-group">
                                        <label><?=$lang['Tours']?></label>
                                        <?php rating_scale($user->rating_tours, "rating_tours");?>
									</div>
                                    <div class="form-group">
                                        <label><?=$lang['Food']?></label>
                                        <?php rating_scale($user->rating_food, "rating_food");?>
									</div>
                                    <div class="form-group">
                                        <label><?=$lang['Spa']?></label>
                                        <?php rating_scale($user->rating_spa, "rating_spa");?>
									</div>
                                    <div class="form-group">
                                        <label><?=$lang['Sports']?></label>
                                        <?php rating_scale($user->rating_sports, "rating_sports");?>
									</div>
                                    <div class="form-group">
                                        <label><?=$lang['Concerts']?></label>
                                        <?php rating_scale($user->rating_concerts, "rating_concerts");?>
									</div>
                                    
                                    
                                    
                                    
                                    <!-- back to non-rating based questionnaire -->
                                    
                                    <!-- Group or Independent -->
                                    <div class="form-group">
										<label><?=$lang['Group_Or_Independent']?></label>
										<select name="group_or_independent" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->group_or_independent == 'Group') {
												echo '<option value="Independent"> '.$lang['Independent'].' </option>';
												echo '<option value="Group" selected> '.$lang['Group'].' </option>';
											} 
                                            else{
												echo '<option value="Independent" selected> '.$lang['Independent'].' </option>';
												echo '<option value="Group"> '.$lang['Group'].' </option>';
											} 
                                    ?>
                                    </select>
									</div>
                                    
                                    <!-- Small_Or_Mega_Ship_Cruisingr -->
                                    <div class="form-group">
										<label><?=$lang['Small_Or_Mega_Ship_Cruising']?></label>
										<select name="small_or_mega_ship_cruising" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->small_or_mega_ship_cruising == 'Mega_Ship_Cruising') {
												echo '<option value="Small_Ship_Cruising"> '.$lang['Small_Ship_Cruising'].' </option>';
												echo '<option value="Mega_Ship_Cruising" selected> '.$lang['Mega_Ship_Cruising'].' </option>';
											} 
                                            else{
												echo '<option value="Small_Ship_Cruising" selected> '.$lang['Small_Ship_Cruising'].' </option>';
												echo '<option value="Mega_Ship_Cruising"> '.$lang['Mega_Ship_Cruising'].' </option>';
											} 
                                    ?>
                                    </select>
									</div>
                                    
                                    <!-- Active_Or_Sedentary -->
                                    <div class="form-group">
										<label><?=$lang['Active_Or_Sedentary']?></label>
										<select name="active_or_sedentary" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->active_or_sedentary == 'Active') {
												echo '<option value="Sedentary"> '.$lang['Sedentary'].' </option>';
												echo '<option value="Active" selected> '.$lang['Active'].' </option>';
											} 
                                            else{
												echo '<option value="Sedentary" selected> '.$lang['Sedentary'].' </option>';
												echo '<option value="Active"> '.$lang['Active'].' </option>';
											} 
                                    ?>
                                    </select>
									</div>   
                                    

                                    
                                    <div class="form-group">
                                        <label><?=$lang['Primary_Language']?></label>
                                    
                                            <select name="primary_language" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
                                              <option value="Afrikanns" <?php if($user->primary_language == "Afrikanns") { echo 'selected'; } ?>>Afrikanns</option>
                                              <option value="Albanian" <?php if($user->primary_language == "Albanian") { echo 'selected'; } ?>>Albanian</option>
                                              <option value="Arabic" <?php if($user->primary_language == "Arabic") { echo 'selected'; } ?>>Arabic</option>
                                              <option value="Armenian" <?php if($user->primary_language == "Armenian") { echo 'selected'; } ?>>Armenian</option>
                                              <option value="Basque" <?php if($user->primary_language == "Basque") { echo 'selected'; } ?>>Basque</option>
                                              <option value="Bengali" <?php if($user->primary_language == "Bengali") { echo 'selected'; } ?>>Bengali</option>
                                              <option value="Bulgarian" <?php if($user->primary_language == "Bulgarian") { echo 'selected'; } ?>>Bulgarian</option>
                                              <option value="Catalan" <?php if($user->primary_language == "Catalan") { echo 'selected'; } ?>>Catalan</option>
                                              <option value="Cambodian" <?php if($user->primary_language == "Cambodian") { echo 'selected'; } ?>>Cambodian</option>
                                              <option value="Mandarin" <?php if($user->primary_language == "Mandarin") { echo 'selected'; } ?>>Chinese (Mandarin)</option>
                                              <option value="Croation" <?php if($user->primary_language == "Croation") { echo 'selected'; } ?>>Croation</option>
                                              <option value="Czech" <?php if($user->primary_language == "Czech") { echo 'selected'; } ?>>Czech</option>
                                              <option value="Danish" <?php if($user->primary_language == "Danish") { echo 'selected'; } ?>>Danish</option>
                                              <option value="Dutch" <?php if($user->primary_language == "Dutch") { echo 'selected'; } ?>>Dutch</option>
                                              <option value="English" <?php if($user->primary_language == "English") { echo 'selected'; } ?>>English</option>
                                              <option value="Estonian" <?php if($user->primary_language == "Estonian") { echo 'selected'; } ?>>Estonian</option>
                                              <option value="Fiji" <?php if($user->primary_language == "Fiji") { echo 'selected'; } ?>>Fiji</option>
                                              <option value="Finnish" <?php if($user->primary_language == "Finnish") { echo 'selected'; } ?>>Finnish</option>
                                              <option value="French" <?php if($user->primary_language == "French") { echo 'selected'; } ?>>French</option>
                                              <option value="Georgian" <?php if($user->primary_language == "Georgian") { echo 'selected'; } ?>>Georgian</option>
                                              <option value="German" <?php if($user->primary_language == "German") { echo 'selected'; } ?>>German</option>
                                              <option value="Greek" <?php if($user->primary_language == "Greek") { echo 'selected'; } ?>>Greek</option>
                                              <option value="Gujarati" <?php if($user->primary_language == "Gujarati") { echo 'selected'; } ?>>Gujarati</option>
                                              <option value="Hebrew" <?php if($user->primary_language == "Hebrew") { echo 'selected'; } ?>>Hebrew</option>
                                              <option value="Hindi" <?php if($user->primary_language == "Hindi") { echo 'selected'; } ?>>Hindi</option>
                                              <option value="Hungarian" <?php if($user->primary_language == "Hungarian") { echo 'selected'; } ?>>Hungarian</option>
                                              <option value="Icelandic" <?php if($user->primary_language == "Icelandic") { echo 'selected'; } ?>>Icelandic</option>
                                              <option value="Indonesian" <?php if($user->primary_language == "Indonesian") { echo 'selected'; } ?>>Indonesian</option>
                                              <option value="Irish" <?php if($user->primary_language == "Irish") { echo 'selected'; } ?>>Irish</option>
                                              <option value="Italian" <?php if($user->primary_language == "Italian") { echo 'selected'; } ?>>Italian</option>
                                              <option value="Japanese" <?php if($user->primary_language == "Japanese") { echo 'selected'; } ?>>Japanese</option>
                                              <option value="Javanese" <?php if($user->primary_language == "Javanese") { echo 'selected'; } ?>>Javanese</option>
                                              <option value="Korean" <?php if($user->primary_language == "Korean") { echo 'selected'; } ?>>Korean</option>
                                              <option value="Latin" <?php if($user->primary_language == "Latin") { echo 'selected'; } ?>>Latin</option>
                                              <option value="Latvian" <?php if($user->primary_language == "Latvian") { echo 'selected'; } ?>>Latvian</option>
                                              <option value="Lithuanian" <?php if($user->primary_language == "Lithuanian") { echo 'selected'; } ?>>Lithuanian</option>
                                              <option value="Macedonian" <?php if($user->primary_language == "Macedonian") { echo 'selected'; } ?>>Macedonian</option>
                                              <option value="Malay" <?php if($user->primary_language == "Malay") { echo 'selected'; } ?>>Malay</option>
                                              <option value="Malayalam" <?php if($user->primary_language == "Malayalam") { echo 'selected'; } ?>>Malayalam</option>
                                              <option value="Maltese" <?php if($user->primary_language == "Maltese") { echo 'selected'; } ?>>Maltese</option>
                                              <option value="Maori" <?php if($user->primary_language == "Maori") { echo 'selected'; } ?>>Maori</option>
                                              <option value="Marathi" <?php if($user->primary_language == "Marathi") { echo 'selected'; } ?>>Marathi</option>
                                              <option value="Mongolian" <?php if($user->primary_language == "Mongolian") { echo 'selected'; } ?>>Mongolian</option>
                                              <option value="Nepali" <?php if($user->primary_language == "Nepali") { echo 'selected'; } ?>>Nepali</option>
                                              <option value="Norwegian" <?php if($user->primary_language == "Norwegian") { echo 'selected'; } ?>>Norwegian</option>
                                              <option value="Persian" <?php if($user->primary_language == "Persian") { echo 'selected'; } ?>>Persian</option>
                                              <option value="Polish" <?php if($user->primary_language == "Polish") { echo 'selected'; } ?>>Polish</option>
                                              <option value="Portuguese" <?php if($user->primary_language == "Portuguese") { echo 'selected'; } ?>>Portuguese</option>
                                              <option value="Punjabi" <?php if($user->primary_language == "Punjabi") { echo 'selected'; } ?>>Punjabi</option>
                                              <option value="Quechua" <?php if($user->primary_language == "Quechua") { echo 'selected'; } ?>>Quechua</option>
                                              <option value="Romanian" <?php if($user->primary_language == "Romanian") { echo 'selected'; } ?>>Romanian</option>
                                              <option value="Russian" <?php if($user->primary_language == "Russian") { echo 'selected'; } ?>>Russian</option>
                                              <option value="Samoan" <?php if($user->primary_language == "Samoan") { echo 'selected'; } ?>>Samoan</option>
                                              <option value="Serbian" <?php if($user->primary_language == "Serbian") { echo 'selected'; } ?>>Serbian</option>
                                              <option value="Slovak" <?php if($user->primary_language == "Slovak") { echo 'selected'; } ?>>Slovak</option>
                                              <option value="Slovenian" <?php if($user->primary_language == "Slovenian") { echo 'selected'; } ?>>Slovenian</option>
                                              <option value="Spanish" <?php if($user->primary_language == "Spanish") { echo 'selected'; } ?>>Spanish</option>
                                              <option value="Swahili" <?php if($user->primary_language == "Swahili") { echo 'selected'; } ?>>Swahili</option>
                                              <option value="Swedish " <?php if($user->primary_language == "Swedish") { echo 'selected'; } ?>>Swedish </option>
                                              <option value="Tamil" <?php if($user->primary_language == "Tamil") { echo 'selected'; } ?>>Tamil</option>
                                              <option value="Tatar" <?php if($user->primary_language == "Tatar") { echo 'selected'; } ?>>Tatar</option>
                                              <option value="Telugu" <?php if($user->primary_language == "Telugu") { echo 'selected'; } ?>>Telugu</option>
                                              <option value="Thai" <?php if($user->primary_language == "Thai") { echo 'selected'; } ?>>Thai</option>
                                              <option value="Tibetan" <?php if($user->primary_language == "Tibetan") { echo 'selected'; } ?>>Tibetan</option>
                                              <option value="Tonga" <?php if($user->primary_language == "Tonga") { echo 'selected'; } ?>>Tonga</option>
                                              <option value="Turkish" <?php if($user->primary_language == "Turkish") { echo 'selected'; } ?>>Turkish</option>
                                              <option value="Ukranian" <?php if($user->primary_language == "Ukranian") { echo 'selected'; } ?>>Ukranian</option>
                                              <option value="Urdu" <?php if($user->primary_language == "Urdu") { echo 'selected'; } ?>>Urdu</option>
                                              <option value="Uzbek" <?php if($user->primary_language == "Uzbek") { echo 'selected'; } ?>>Uzbek</option>
                                              <option value="Vietnamese" <?php if($user->primary_language == "Vietnamese") { echo 'selected'; } ?>>Vietnamese</option>
                                              <option value="Welsh" <?php if($user->primary_language == "Welsh") { echo 'selected'; } ?>>Welsh</option>
                                              <option value="Xhosa" <?php if($user->primary_language == "Xhosa") { echo 'selected'; } ?>>Xhosa</option>
                                            </select>                                
									</div>
									<button type="submit" name="save_2" class="btn btn-theme"> <?=$lang['Save']?> </button>
								</form>
							</div>


<!--
							<div class="col-md-2 pull-right">
								<img src="<?=$system->getProfilePicture($user)?>" class="img-responsive img-rounded hidden-xs hidden-sm" style="max-height:150px;max-width:150px;margin-top:108px;margin-left:10px;">
							</div>
-->

						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>

<!-- Messages Modal -->
<div class="modal fade" id="messages" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content chat-modal">
<div class="modal-body-xl no-padding" style="overflow:hidden;">
<div class="chat-container">
	<div class="chat-left pull-left">
		<div class="chat-sidebar-top">
			&nbsp
		</div>
		<div class="chats-list"></div>
	</div>
	<div class="chat-area pull-left">
		<div class="chat-top-right"></div>
		<div class="chat-content-wrap">
			<div class="chat-content"></div>
		</div>
		<div class="emoji-menu" style="display:none;">
			<div class="emoji-top">
				<span class="emoji-top-link emj" onclick="loadEmojis(); setActiveEmojiLink('.emoji-top-link');">
					<i class="ti-face-smile"></i>
				</span>
				<span class="emoji-sticker-packs">
				</span>
			</div>
			<div class="emoji-content-wrap">
				<div class="emoji-content"></div>
			</div>
		</div>
		<div class="gift-menu" style="display:none;">
			<div class="gift-content-wrap">
				<div class="gift-content"></div>
			</div>
		</div>
		<div class="chat-bottom">
			<div class="chat-addons">
                <a href="#" onclick="toggleEmojiMenu(); return false;"> <i class="ti-face-smile emoji-toggle"></i></a>
                <a href="#" onclick="toggleChatGifts(); return false;"> <i class="ti-gift"></i></a>
			</div>
			<div class="chat-input">
				<input type="text" id="message" name="message" class="form-control input-sm">
				<a href="#" class="btn btn-default btn-icon btn-sm btn-fill chat-message-send" onclick="sendMessage()"> <i class="ti-angle-right"></i> </a>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>

<!-- Send Gift Modal -->
<div class="modal fade" id="chat-send-gift" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<form action="<?=$system->getDomain?>/send-gift.php" method="post">
<div class="modal-content">
<div class="modal-body text-center gift-modal-container">
</div>
</div>
</form>
</div>
</div>

<input type="hidden" id="profile_id" value="<?=$profile->id?>">
<input type="hidden" id="receiver_id">
<input type="hidden" id="gift_id">
