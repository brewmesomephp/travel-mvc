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
<!--
									<div class="form-group">
										<label><?=$lang['Full_Name']?></label>
										<input type="text" name="full_name" value="<?=$user->marital_status?>" class="form-control" required>
									</div>
-->
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
                                    <!-- travel to meet-->
                                    <div class="form-group">
										<label><?=$lang['Travel_To_Meet']?></label>
										<select name="travel_to_meet" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<?php
											if($user->travel_to_meet == 'No') {
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
												echo '<option value="Average"> '.$lang['Moderate'].' </option>';
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
                                    
                                    <!-- Favorite activities -->
                                    <div class="form-group">
										<label><?=$lang['Favorite_Activities']?></label>
                                        <br />
<!--                                        must go in  and add these items to the database-->
                                        <label><?=$lang['Lounge']?></label>
                                        <?php rating_scale($user->sexual_interest, "sexual_orientation");?>
									</div>
                                    
                                    <?php
                                        function rating_scale($userCol, $select_name)
                                        {?>
                                            <select name="<?=$select_name?>" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
                                                <option value="1" <?php if($userCol == 1) { echo 'selected'; } ?>> 1 </option>
                                                <option value="2" <?php if($userCol == 2) { echo 'selected'; } ?>> 2 </option>
                                                <option value="3" <?php if($userCol == 3) { echo 'selected'; } ?>> 3 </option>
                                                <option value="4" <?php if($userCol == 4) { echo 'selected'; } ?>> 4 </option>
                                                <option value="5" <?php if($userCol == 5) { echo 'selected'; } ?>> 5 </option>
                                            </select>
                                        <?}
                                        
                                    ?>
                                    
                                    
                                    
									<div class="form-group" style="display:none;">
										<label><?=$lang['Height']?></label>
										<div class="input-group">
											<input type="text" name="height" value="<?=$user->height?>" class="form-control" required>
											<span class="input-group-addon"><?=$unit['height']?></span>
										</div>
									</div>
									<div class="form-group" style="display:none;">
										<label><?=$lang['Weight']?></label>
										<div class="input-group">
											<input type="text" name="weight" value="<?=$user->weight?>" class="form-control" required>
											<span class="input-group-addon"><?=$unit['weight']?></span>
										</div>
									</div>
									<div class="form-group" style="display:none;">
										<label><?=$lang['Sexual_Orientation']?></label>
										<select name="sexual_orientation" class="selectpicker" data-style="no-style form-control" data-menu-style="" required>
											<option value="1" <?php if($user->sexual_interest == 1) { echo 'selected'; } ?>> <?=$lang['Straight']?> </option>
											<option value="2" <?php if($user->sexual_interest == 2) { echo 'selected'; } ?>> <?=$lang['Gay']?> </option>
											<option value="3" <?php if($user->sexual_interest == 3) { echo 'selected'; } ?>> <?=$lang['Lesbian']?> </option>
											<option value="4" <?php if($user->sexual_interest == 4) { echo 'selected'; } ?>> <?=$lang['Bisexual']?> </option>
										</select>
									</div>
									

									<button type="submit" name="save_1" class="btn btn-theme"> <?=$lang['Save']?> </button>
								</form>
							</div>
                            
<!--
                            
							<div class="col-md-5 pull-left">
								<form action="" method="post" enctype="multipart/form-data">
									<h3>
										<span style="font-size:22px;" class="font600"><?=$lang['Account_Tab_Title']?></span>
									</h3>
									<hr class="mt-0">
									<div class="form-group">
										<label><?=$lang['Profile_Photo']?></label>
										<div class="fileinput fileinput-new input-group" data-provides="fileinput">
											<div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
											<span class="input-group-addon btn btn-inverse btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="hidden"><input type="file" name="profile_photo"></span>
											<a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
										</div>
									</div>
									<div class="form-group">
										<label><?=$lang['Email']?></label>
										<input type="email" name="email" value="<?=$user->email?>" class="form-control" required>
									</div>
									<div class="form-group">
										<label><?=$lang['New_Password']?></label>
										<input type="password" name="new_password" class="form-control">
									</div>
									<div class="form-group">
										<label><?=$lang['Confirm_Password']?></label>
										<input type="password" name="confirm_new_password" class="form-control">
									</div>
									<div class="form-group">
										<label><?=$lang['Language']?></label>
										<select name="website_language" class="selectpicker" data-style="no-style form-control" data-menu-style="">
											<?php
											$lang_dir = scandir('languages');
											foreach($lang_dir as $file) {
												if(file_exists('languages/'.$file.'/language.php')) {
													if($user->language == $file) {
														echo '<option value="'.$file.'" selected>'.ucfirst($file).'</option>';
													} else {
														echo '<option value="'.$file.'">'.ucfirst($file).'</option>';
													}
												}
											}
											?>
										</select>
									</div>
									<div class="form-group">
										<label><?=$lang['Instagram_Username']?></label>
										<div class="input-group">
											<input type="text" name="instagram_username" value="<?=$user->instagram_username?>" class="form-control">
											<div class="input-group-btn">
												<a href="?sync" class="btn btn-default"> <i class="icon icon-loop2"></i> Sync </a>
											</div>
										</div>
										<small class="help-block text-muted"><?=$lang['Instagram_Tab_Description']?></small>
									</div>
									<button type="submit" name="save_2" class="btn btn-theme"> <?=$lang['Save']?> </button>
								</form>
							</div>
-->

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
