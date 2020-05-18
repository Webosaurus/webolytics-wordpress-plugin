<?php

function set_variable($variableName,$boolean=false){

	if( 
		(isset($_SESSION[$variableName])) ||
		(isset($_COOKIE[$variableName])) ||
		(isset($_GET[$variableName])) || 
		(isset($_POST[$variableName])) 
		){
		if(isset($_SESSION[$variableName])){
	        $returnVariable = $_SESSION[$variableName];
	    }
	    if(isset($_COOKIE[$variableName])){
	        $returnVariable = $_COOKIE[$variableName];
	    }
	    if(isset($_POST[$variableName])){
	        $returnVariable = $_POST[$variableName];
	    }
	    if(isset($_GET[$variableName])){
	        $returnVariable = $_GET[$variableName];
	    }
	                                
	} else {
		if($boolean){
			$returnVariable = 0;
		} else {
			$returnVariable = false;
		}
	    
	}

	return $returnVariable;
}

function api_call	($url, 
					$method = 'GET', 
					$data = false, 
					$headers = false, 
					$returnInfo = false,
					$jsonDecode = false) {    
    $ch = curl_init();
    
    if($method == 'POST') {
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        if($data !== false) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }
    } else {
        if($data !== false) {
            if(is_array($data)) {
                $dataTokens = array();
                foreach($data as $key => $frue) {
                    array_push($dataTokens, urlencode($key).'='.urlencode($frue));
                }
                $data = implode('&', $dataTokens);
            }
            curl_setopt($ch, CURLOPT_URL, $url.'?'.$data);
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
        }
    }
    curl_setopt($ch, CURLOPT_HEADER, false);
    //curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 90);
    if($headers !== false) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    $contents = curl_exec($ch);
    
    if($jsonDecode){
    	$contents = json_decode($contents, true);
    }
    if($returnInfo) {
        $info = curl_getinfo($ch);
    }

    curl_close($ch);

    if($returnInfo) {
        return array('contents' => $contents, 'info' => $info, 'data' => $data, 'method' => $method);
    } else {
        return $contents;
    }
}

function detectDevice(){
	$userAgent = $_SERVER["HTTP_USER_AGENT"];
	$devicesTypes = array(
        "computer" => array("msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
        "tablet"   => array("tablet", "android", "ipad", "tablet.*firefox"),
        "mobile"   => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
        "bot"      => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis"),
        "API"      => array("Postman")
    );
 	foreach($devicesTypes as $deviceType => $devices) {           
        foreach($devices as $device) {
            if(preg_match("/" . $device . "/i", $userAgent)) {
                $deviceName = $deviceType;
            }
        }
    }
    if(!isset($deviceName)){
    	$deviceName='Unknown';
        
    }
    return ucfirst($deviceName);
}

function browsers(){
	return array(
		0=>	'Avant Browser','Arora', 'Flock', 'Konqueror','OmniWeb','Phoenix','Firebird','Mobile Explorer',	'Opera Mini','Netscape',
			'Iceweasel','KMLite', 'Midori', 'SeaMonkey', 'Lynx', 'Fluid', 'chimera', 'NokiaBrowser',
			'Firefox','Chrome','MSIE','Internet Explorer','Opera','Safari','Mozilla','trident'
		);	
}
/* List of popular web robots ---------- */
function robots(){
	return  array(
		0=>	'GTmetrix','Googlebot', 'Googlebot-Image', 'MSNBot', 'Yahoo! Slurp', 'Yahoo', 'AskJeeves','FastCrawler','InfoSeek Robot', 'Lycos','YandexBot','YahooSeeker','Google Page Speed Insights','X11'
		);	
}
/* List of popular os platforms ---------- */
function platforms(){
	return  array(
		0=>	'iPad', 'iPhone', 'iPod','iOS', 'macOS','tvOS', 'Mac OS X', 'Macintosh', 'Power PC Mac', 'Windows', 'Windows CE',
			'Symbian', 'SymbianOS', 'Symbian S60', 'Ubuntu', 'Debian', 'NetBSD', 'GNU/Linux', 'OpenBSD', 'Android', 'Linux',
			'Mobile','Tablet',
		);	
}

function get_browser_info($arg='',$agent='') {
	if(empty($agent) ) {
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	}
	
	/*----------------------------------------- browser name ---------------------------------------------*/
	$name='';
	foreach( browsers() as $key){
		if(strpos(strtolower($agent), strtolower(trim($key))) ){ 	
			$name= trim($key);
			break;  
		}else{
			continue;
		}
	}
	
	/*----------------------------------------- robot name ---------------------------------------------*/
	foreach(robots() as $key){
		if (preg_match("|".preg_quote(strtolower(trim($key)))."|i", $agent)){
			$is_bot = TRUE;
			$name= trim($key);
			break;  
		}else{
			$is_bot = false;
			continue;
		}
	}
	
	
	/*----------------------------------------- Platform ---------------------------------------------*/
	foreach(platforms() as $key){
		if (preg_match("|".preg_quote(trim($key))."|i", $agent)){
			$platform=trim($key);
			break;  
		}else{
			continue;
		}
	}
	
	/*----------------------------------------- Version ---------------------------------------------*/
	$known = array('version',strtolower($name), 'other');
	$pattern = '#(?<browser>' . join('|', $known) .')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	$version=0;	
	if (preg_match_all($pattern,strtolower($agent), $matches )) 
	{	
		if (count($matches['browser'])>0)
		{
			if (strripos($agent,"version") < strripos($agent,strtolower($name)) ){	
				$version= $matches['version'][0];
			}else {
				//$version= $matches['version'][1];
				if(isset($matches['version'][1])){
					$version= $matches['version'][1];
				} else {
					$version = null;
				}
					
			}
		}else{
			$version=0;	
		}
		if ($version==null || $version=="") {$version="?";}
		$version=(int)round($version);
	}
	/*----------------------------------------- Browser Info ---------------------------------------------*/
	$browser['agent']=$agent;
	if($name=='trident'){
		$browser['name']='Internet Explorer';
		$browser['version']='11';
	}elseif(empty($name)){
		$browser['name']='Unknown';
		$browser['version']=0;	
	}else{
		$browser['name']=$name;
		$browser['version']=$version;
	}
	$browser['is_bot']=$is_bot;
	if(isset($platform)){
		$browser['platform']=$platform;
	}
	
	if($arg){
		return $browser[$arg];
	}else{	
		return $browser;
	}
}

function api_add_acquisition_complete(	$webolyticsURL,
										$acquisitionID,
										$formSectionID,
										$campaignGroup,
										$relationUser,
										$formGroupID,
										$publishedID,
										$formData,
										$moduleData,
										$trackingData){

	$curlURL = $webolyticsURL.'catchForm';
	
	$data=array();
	$data=[
		'acquisitionID' => $acquisitionID,
		'formSectionID' => $formSectionID,
		'campaignGroup' => $campaignGroup,
		'relationUser' => $relationUser,
		'formGroupID' => $formGroupID,
		'publishedID' => $publishedID,
		'formData' => $formData,
		'moduleData' => $moduleData,
		'trackingData' => $trackingData,
	];
	//print_r($data);
	$getData = api_call($curlURL, 
						$method = 'POST', 
						$data, 
						$headers = false, 
						$returnInfo = false,
						$jsonDecode = true);

	return $getData;

}

function listpage() {

	global $wpdb;
	
	//print_r($res);
    ?>
    <div class="wrap">

		<h1 class="wp-heading-inline"><?php
			echo esc_html( __( 'Webolytics Forms', 'Webolytics-Forms' ) );
		?></h1>

		<?php
			
				echo sprintf( '<a href="%1$s" class="add-new-h2">%2$s</a>',
					esc_url( menu_page_url( 'Add-New-Webolytics-Forms', false ) ),
					esc_html( __( 'Add New', 'Add-New-Webolytics-Forms' ) ) );
			

			
		?>

		<hr class="wp-header-end">



	</div>
	<?php if(isset($_GET['delete-prompt-id'])){
		$fid = esc_sql($_GET['delete-prompt-id']);
		$resDelPrompt=$wpdb->get_row("SELECT form_title, wp_form_id, fsid, cgid, next_button, previous_button, finish_button FROM wp_webolytics_form WHERE wp_form_id = '$fid' ");

		$linkDeleteConfirm = add_query_arg(
		            array(
		                'page' => 'Webolytics-Forms', // as defined in the hidden page
		                'delete-confirm-id' => $resDelPrompt->wp_form_id,
		            ),
		            admin_url('admin.php')
		        );
		$linkDeleteCancel = add_query_arg(
		            array(
		                'page' => 'Webolytics-Forms', // as defined in the hidden page
		            ),
		            admin_url('admin.php')
		        );
		echo '<div class="notice notice-info"><p>Are you sure that you want to delete <strong>'.$resDelPrompt->form_title.'</strong><br>
		<a href="'.$linkDeleteConfirm.'">Yes</a> | <a href="'.$linkDeleteCancel.'">No</a></p></div>';
	}

	if(isset($_GET['delete-confirm-id'])){
		$fidc = esc_sql($_GET['delete-confirm-id']);
		$resDelConfirm=$wpdb->get_row("DELETE FROM wp_webolytics_form WHERE wp_form_id = '$fidc' ");

		$linkDeleteBack = add_query_arg(
		            array(
		                'page' => 'Webolytics-Forms', // as defined in the hidden page
		            ),
		            admin_url('admin.php')
		        );
		echo '<div class="notice notice-success"><p><strong>Form has been successfully deleted</strong><br>
		<a href="'.$linkDeleteBack.'">Back</a></p></div>';
	} 
	$res=$wpdb->get_results("SELECT form_title, wp_form_id, fsid, cgid FROM wp_webolytics_form ORDER BY wp_form_id DESC ");
	?>
	<table class="wp-list-table widefat fixed striped users">
		<thead>
			<tr>
				<th scope="col" id="username" class="manage-column column-name">Form Name</th>
				<th scope="col" id="name" class="manage-column column-name">Shortcode</th>
				<th scope="col" id="email" class="manage-column column-name">Edit</th>
			</tr>
		</thead>

		<tbody id="the-list" >
			<?php foreach($res as $wfr){ 
				$linkEdit = add_query_arg(
		            array(
		                'page' => 'Edit-Webolytics-Forms', // as defined in the hidden page
		                'id' => $wfr->wp_form_id,
		            ),
		            admin_url('admin.php')
		        );

		        $linkDelete = add_query_arg(
		            array(
		                'page' => 'Webolytics-Forms', // as defined in the hidden page
		                'delete-prompt-id' => $wfr->wp_form_id,
		            ),
		            admin_url('admin.php')
		        );


					?>
				<tr >
					
					<td class="username column-username has-row-actions column-primary" data-colname="Username"><strong><a href="<?php echo $linkEdit ; ?>"><?php echo $wfr->form_title ; ?></a></strong></td>
					<td class="name column-name" data-colname="Name"><strong>[webolyticsform webolytics_id="<?php echo $wfr->wp_form_id ; ?>"]</strong></td>
					<td class="email column-email" data-colname="Email"><a href="<?php echo $linkEdit ; ?>">Edit</a> | <a href="<?php echo $linkDelete ; ?>">Delete</a></td>

				</tr>
			<?php } ?>	
		</tbody>

		<tfoot>
			<tr>
				<th scope="col" id="username" class="manage-column column-name">Form Name</th>
				<th scope="col" id="name" class="manage-column column-name">Shortcode</th>
				<th scope="col" id="email" class="manage-column column-name">Edit</th>
			</tr>
		</tfoot>

	</table>

    <?php 
	
  
	
	
	}


function addform() {
    ?>
    <div class="wrap">
    	
    	<h1 class="wp-heading-inline"><?php
			echo esc_html( __( 'Webolytics Forms', 'Webolytics-Forms' ) );
		?></h1>

		

		<hr class="wp-header-end">
    </div>
    <?php $current_user = wp_get_current_user();
	    global $wpdb;

		if(isset($_POST['submit'])){
			$getFormURL = 'https://webolytics.webosaurus.co.uk/inbound/getForm?CGID='.$_POST['cgid'].'&FSID='.$_POST['fsid'];
			/*$data=array();
			$data = [
				'CGID' => $_POST['cgid'],
				'FSID' => $_POST['fsid'],

			];*/
			$getData = api_call($getFormURL, 
						$method = 'GET', 
						$data = false, 
						$headers = false, 
						$returnInfo = false,
						$jsonDecode = true);
			if($getData['status'] == '201'){
				$loginAdminEmail=$current_user->user_email;	
				$formTitle=esc_sql($_POST['formTitle']);
				$fsid=esc_sql($_POST['fsid']);
				$cgid=esc_sql($_POST['cgid']);
				$next=esc_sql($_POST['next']);
				$previous=esc_sql($_POST['previous']);
				$finished=esc_sql($_POST['finished']);
				$sql="INSERT INTO wp_webolytics_form(form_title,cgid,fsid,next_button,previous_button,finish_button) VALUES ('$formTitle','$cgid','$fsid','$next','$previous','$finished') ; ";
				$wpdb->query($sql);
				$res=$wpdb->get_row("SELECT form_title, wp_form_id, fsid, cgid FROM wp_webolytics_form ORDER BY wp_form_id DESC ");
	            $id=$res->wp_form_id;
	            //print_r($res);
		       
		        echo '<div class="notice notice-success"><p>Your Shortcode is : <strong>[webolyticsform webolytics_id="'.$id.'"]</strong></p></div>';
	    	} else {
	    		echo '<div class="notice notice-error"><p>Webolytics notification: '.$getData['message'].'</p></div>';
	    	}
		} ?>

   
	<form method="post">
	<table class="form-table" role="presentation">

		<tbody>
			<tr>
				<th scope="row">
					<label for="formTitle">Enter Form Title</label>
				</th>
				<td>
					<input type="text" required name="formTitle" placeholder="Enter Form Title" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="fsid">Enter FSID</label>
				</th>
				<td>
					<input type="text" required name="fsid" placeholder="Enter Form Section ID (FSID)" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="cgid">Enter CGID</label>
				</th>
				<td>
					<input type="text" required name="cgid" placeholder="Enter Campaign Group ID (CGID)" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="next">Enter Next Button Value</label>
				</th>
				<td>
					<input type="text" required name="next" placeholder="Next Button Label" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="previous">Enter Previous Button Value</label>
				</th>
				<td>
					<input type="text" required name="previous" placeholder="Previous Button Label" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="finished">Enter Finish Button Value</label>
				</th>
				<td>
					<input type="text" required name="finished" placeholder="Finished Button Label" class="regular-text">
				</td>
			</tr>


		</tbody>
	</table>
	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
	</form>
	<?php
	}

	function editform() {
		?>
		<div class="wrap">
    	
    	<h1 class="wp-heading-inline"><?php
			echo esc_html( __( 'Webolytics Forms', 'Webolytics-Forms' ) );
		?></h1>

		<?php
			
				echo sprintf( '<a href="%1$s" class="add-new-h2">%2$s</a>',
					esc_url( menu_page_url( 'Add-New-Webolytics-Forms', false ) ),
					esc_html( __( 'Add New', 'Add-New-Webolytics-Forms' ) ) );
			

			
		?>

		<hr class="wp-header-end">
    </div>
		<?php global $wpdb;
		if(isset($_GET['id'])){
			$current_user = wp_get_current_user();
	    global $wpdb;

		if(isset($_POST['submit'])){
			$getFormURL = 'https://webolytics.webosaurus.co.uk/inbound/getForm?CGID='.$_POST['cgid'].'&FSID='.$_POST['fsid'];
			/*$data=array();
			$data = [
				'CGID' => $_POST['cgid'],
				'FSID' => $_POST['fsid'],

			];*/
			$getData = api_call($getFormURL, 
						$method = 'GET', 
						$data = false, 
						$headers = false, 
						$returnInfo = false,
						$jsonDecode = true);
			if($getData['status'] == '201'){
				$loginAdminEmail=$current_user->user_email;	
				$formUpdateID = esc_sql($_POST['formUpdateID']);
				$formTitle=esc_sql($_POST['formTitle']);
				$fsid=esc_sql($_POST['fsid']);
				$cgid=esc_sql($_POST['cgid']);
				$next=esc_sql($_POST['next']);
				$previous=esc_sql($_POST['previous']);
				$finished=esc_sql($_POST['finished']);
				$sql="UPDATE wp_webolytics_form SET form_title = '$formTitle', 
													cgid = '$cgid',
													fsid = '$fsid',
													next_button = '$next',
													previous_button = '$previous',
													finish_button = '$finished'
												WHERE wp_form_id = '$formUpdateID' ; ";
				//print_r($sql);
				$wpdb->query($sql);
				$res=$wpdb->get_row("SELECT form_title, wp_form_id, fsid, cgid FROM wp_webolytics_form ORDER BY wp_form_id DESC ");
	            $id=$res->wp_form_id;
	           // print_r($res);
		        
		        echo '<div class="notice notice-success"><p>Your Shortcode is : <strong>[webolyticsform webolytics_id="'.$formUpdateID.'"]</strong></p></div>';
	    	} else {
	    		
	    		echo '<div class="notice notice-error"><p>Webolytics notification: '.$getData['message'].'</p></div>';
	    	}
		}


			$fid = esc_sql($_GET['id']);
			$res=$wpdb->get_row("SELECT form_title, wp_form_id, fsid, cgid, next_button, previous_button, finish_button FROM wp_webolytics_form WHERE wp_form_id = '$fid' ");
		
    ?>

    

	<form method="post">
		<input name="formUpdateID" type="hidden" value="<?php echo $res->wp_form_id ; ?>" >
		<table class="form-table" role="presentation">

			<tbody>
				<tr>
					<th scope="row">
						<label for="formTitle">Enter Form Title</label>
					</th>
					<td>
						<input type="text" required name="formTitle" placeholder="Enter Form Title" class="regular-text" value="<?php echo $res->form_title ; ?>" >
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="fsid">Enter FSID</label>
					</th>
					<td>
						<input type="text" required name="fsid" placeholder="Enter Form Section ID (FSID)" class="regular-text" value="<?php echo $res->fsid ; ?>" >
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="cgid">Enter CGID</label>
					</th>
					<td>
						<input type="text" required name="cgid" placeholder="Enter Campaign Group ID (CGID)" class="regular-text"value="<?php echo $res->cgid ; ?>" >
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="next">Enter Next Button Value</label>
					</th>
					<td>
						<input type="text" required name="next" placeholder="Next Button Label" class="regular-text" value="<?php echo $res->next_button ; ?>" >
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="previous">Enter Previous Button Value</label>
					</th>
					<td>
						<input type="text" required name="previous" placeholder="Previous Button Label" class="regular-text" value="<?php echo $res->previous_button ; ?>" >
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="finished">Enter Finish Button Value</label>
					</th>
					<td>
						<input type="text" required name="finished" placeholder="Finished Button Label" class="regular-text" value="<?php echo $res->finish_button ; ?>" >
					</td>
				</tr>


			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
		</p>
	</form>
	
	<?php 
		
		} else {

			echo '<div class="notice notice-error"><p>No form selected</p></div>';
		}

	    
	
	
	
	}

function webolytics_get_form( $atts ) {
	global $wpdb,
			$webolyticsURL,
			$statusArr,
			$varFormContentType,
			$numNull,
			$label,
			$varFormFieldRequired,
			$varWhitelist,
			$varModules,
			$apiTitle,
			$apiVersion;
	//wpa_inspect_styles();

	$formGroupID = set_variable('formGroupID');
	$fgid = set_variable('FGID');

   	if($formGroupID){
   	   
       $formSectionID = set_variable('formSectionID');
       $publishedID = set_variable('publishedID');
       $campaignGroup = set_variable('campaignGroup');
       $relationUser = set_variable('relationUser');
       $acquisitionID = set_variable('acquisitionID');
       $formData =  set_variable('formData');
       $moduleData =  set_variable('moduleData');
       $trackingData = set_variable('trackingData');
       $addAcquisition = api_add_acquisition_complete( $webolyticsURL,
                                                       $acquisitionID,
                                                       $formSectionID,
                                                       $campaignGroup,
                                                       $relationUser,
                                                       $formGroupID,
                                                       $publishedID,
                                                       $formData,
                                                      $moduleData,
                                                      $trackingData);
       //print_r($statusArr['204']['code'].'<br>');
       //print_r($addAcquisition);
        if($addAcquisition['status'] == $statusArr['204']['code']){
           /* echo '<pre>';
           //print_r($_POST);
           //echo '<hr>';
           print_r($addAcquisition);
          
           echo '</pre>';*/
           if(isset($addAcquisition['response']['acquisition_group']['response'])){
              $paqid = $addAcquisition['response']['acquisition_group']['response']['acquisition_id'];
            } else {
              $paqid = $addAcquisition['response']['acquisition_group']['record_data']['acquisition_id'];
            }
            if(isset($_POST['FGID_N'])){
            	$fgid_n = $_POST['FGID_N'];
            } 
            $msg =  '<div class="alert alert-success" >'.
                      '<strong>'.$addAcquisition['message'].'</strong>';
            

            $msg .= '</div>';
        } else {

          if(isset($addAcquisition['response'])){
          	if($acquisitionID){
          		$paqid=$acquisitionID;
          		$fgid=$formGroupID;
          	}
            $responseRequired='';
            foreach($addAcquisition['response'] as $ar){
              if(isset($ar['failed_field'])){
                $responseRequired .= $ar['failed_field'].' '.$ar['message'].'<br>';
              }
              if(isset($ar['error_type'])){
                	//if(isset($arR['error_type']['message'])){
                		 $responseRequired .= $ar['error_type']['message'].'<br>'; 
                	//}
              }
            }
          }
            $msg =  '<div class="alert alert-danger" >'.
                      '<strong>'.$addAcquisition['message'].'</strong>';
            if(isset($responseRequired)){
              $msg .= '<br>'.$responseRequired;
            }

            $msg .= '</div>';

           // print_r($addAcquisition);
        }


   	}

	 //print_r($atts);
	$id=esc_sql($atts['webolytics_id']);
	$res=$wpdb->get_row("SELECT `wp_form_id`,
			  `cgid`,
			  `fsid`,
			  `next_button`,
			  `previous_button`,
			  `finish_button`,
			  `form_title`,
			  `created` 
			   FROM wp_webolytics_form 
			   WHERE wp_form_id = '$id' ; ");
	$fsid=$res->fsid;
	$cgid=$res->cgid;
	
	$getFormURL = 'https://webolytics.webosaurus.co.uk/inbound/getForm?CGID='.$cgid.'&FSID='.$fsid;
	if( (isset($fgid_n)) || 
		($fgid) ){
		if(isset($fgid_n)){
			$getFormURL .= '&FGID='.$fgid_n;
		}
		if($fgid){
			$getFormURL .= '&FGID='.$fgid;
		}
		
	}
//print_r($getFormURL);
$result= api_call($getFormURL, 
						$method = 'GET', 
						$data = false, 
						$headers = false, 
						$returnInfo = false,
						$jsonDecode = true);
//print_r($result);		
if($result['status']=="201" ){

	 $fg=$result['record_data'];



	 $fgid=$fg['form_group']['value'];

	 
    //$fgid_n = set_variable('next_page');
    
    if(isset($fg['previous_page'])){
	    $fgid_p=$fg['previous_page']['value'];
	}

	if(isset($paqid)){
		$aqid=$paqid;
	} else {
		$aqid = set_variable('AQID');
	}
	
	$renderForm = '<div class="webolytics-forms">'.
				'<form action="" method="post" >';
	if(isset($msg )){
		$renderForm.=$msg;
	}
	$renderForm .= '<input type="hidden" name="formSectionID" value="'.$fsid .'" /> ';
	$renderForm .= '<input type="hidden" name="formGroupID" value="'.$fgid .'" /> ';
	
	if(isset($fg['next_page'])){
	    $renderForm .= '<input type="hidden" name="'.$fg['next_page']['name'].'" value="'.$fg['next_page']['value'] .'" /> ';
	}

	if(isset($cgid)){
        $renderForm .= '<input type="hidden" name="campaignGroup" value="'.$cgid .'" /> ';
    } 

    if(isset($fg['published_status'])){
        $renderForm .= '<input type="hidden" name="publishedID" value="'.$fg['published_status']['value'] .'" /> ';
    }

    if($aqid){
        $renderForm .= '<input type="hidden" name="acquisitionID" value="'.$aqid .'" /> ';
    } else {
        $clickDevice = detectDevice();
        $checkBrowser = get_browser_info();
        $currentURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $renderForm .= '<input type="hidden" name="trackingData[ip]" value="'.$_SERVER['REMOTE_ADDR'].'" /> ';
        //$renderForm .= '<input type="hidden" name="trackingData[ip]" value="151.231.228.134" /> ';
        
        if( 
            (isset($_SERVER['HTTP_REFERER'])) && 
            ($_SERVER['HTTP_REFERER'] != "")
        ){
        	$renderForm .= '<input type="hidden" name="trackingData[refererURL]" value="'.$_SERVER['HTTP_REFERER'].'" /> ';
        }
        	
        $renderForm .= '<input type="hidden" name="trackingData[currentURL]" value="'.$currentURL.'" /> ';
        $renderForm .= '<input type="hidden" name="trackingData[browser]" value="'.$checkBrowser['name'].'" /> ';
        $renderForm .= '<input type="hidden" name="trackingData[device]" value="'.$clickDevice.'" /> ';
        $renderForm .= '<input type="hidden" name="trackingData[platform]" value="'.$checkBrowser['platform'].'" /> ';
        $renderForm .= '<input type="hidden" name="trackingData[api]" value="'.$apiTitle.' V'.$apiVersion.'" /> ';
                    
    }

	$r=0; 
	foreach($fg as $kfr=>$fr){
		
		if(!isset($fr['type'])){
			$fcCount = count($fr);
			if($fcCount > 0){
				$renderForm .= '<div class="webolytics-row">';
				$c=0;
				foreach($fr as $fc){
					$checkNextContentReorder =  12 / $fcCount ;
					if( (!isset($fc['type'])) && 
						(!isset($fc['phone'])) ){
						
						foreach($fc as $fcac){
							$formRowContentOrder = $r.'-'.$c;
							$renderForm .= '<div class="webolytics-col-md-'.$checkNextContentReorder.' ">';
							$renderForm .= systems_form_input_type($formRowContentOrder, 
			                                                       $fcac) ;
							$renderForm .= '</div>';
							$c++;
						}
					} else {
						
						$formRowContentOrder = $r.'-'.$c;
						$renderForm .= '<div class="webolytics-col-md-'.$checkNextContentReorder.' ">';
						$renderForm .= systems_form_input_type($formRowContentOrder, 
		                                                       $fc) ;
						$renderForm .= '</div>';
						$c++;
					}
					
							
				}
				$renderForm .= '</div>';
			}
			$r++;	
		}

	}

	if ($r>0) { 
		if(isset($fg['next_page']))  {
			$renderForm .= '<div class="webolytics-row">'.
        		'<div class="webolytics-col-md-3">';
        		if((isset($fgid_p)) && ($fgid_p != '')){
        			$prevLink = '?FGID='.$fgid_p;
        		} else {
        			$prevLink='';
        		}
        		if($aqid){
        			if($prevLink==''){
        				$prevLink = '?AQID='.$aqid;
        			} else {
        				$prevLink .= '&AQID='.$aqid;
        			}
        			
        		}
                if((isset($fgid_p)) && ($fgid_p != '')){
                    $renderForm .= '<a href="'.$prevLink.'" '.
                        'class="btn btn-lg " '.
	                    'style="width:100%;" '.
                        '> '.$res->previous_button.'</a>';
                } 
    		$renderForm .= '</div>' .
            	'<div class="webolytics-col-md-9"> ';
            
                if(isset($fg['next_page']))  {
	                $renderForm .= '<button '.
	                        'type="submit" '.
	                        'class="btn btn-lg " '.
	                        'style="width:100%;" '.
	                        '> '.$res->next_button.'</button>';
                } else {
                	$renderForm .= '<button '.
	                        'type="submit" '.
	                        'class="btn btn-lg " '.
	                        'style="width:100%;" '.
	                        '> '.$res->finish_button.'</button>';	
                }
            
	    	$renderForm .= '</div>'.
	        	'</div>';
    	}
    }
    $renderForm .= '</form>'.
    				'</div>';

   

} else {
	$renderForm =  '<div class="webolytics-forms">'.
					'<div class="notice notice-error">'.
                      $result['message'];
            

            $renderForm .= '</div>'.
            			'</div>';
}



return $renderForm;
	
	
	
  //$content = include("fsid.php");
}

function systems_form_input_type(	$formRowOrder, 
									$fc){
	global 	
			$statusArr,
			$varFormContentType,
			$numNull,
			$label,
			$varFormFieldRequired,
			$varWhitelist,
			$varModules;
	
	if(isset($fc['type'])){
		foreach($varFormContentType as $fct){
			if($fct['label'] == $fc['type']){
				$formContentType = $fct['value'];
			}
		}	
	}

	
	
	if(isset($fc['phone']['type'])){
		$formContentType = $varFormContentType['phone']['value'];
	} else {
		if(!isset($formContentType)){
			//print_r($fc);
			foreach($varModules as $fmt){
				//print_r($fmt['label']);
				if($fmt['label'] == $fc['type']){
					//$formContentType = $fmt['value'];
					$formContentType = $varFormContentType['form_content_module']['value'];
					//print_r($formContentType);
				}
			}
			//print_r($fc['type']);
		}
	}
	
	//print_r($formContentType.' - '.$fc['type']);

	switch($formContentType){
		case $varFormContentType['text_field']['value']:
			$response = '<div class="input-text form-group">'.
							'<label>'. $fc['placeholder'].'</label>'.
							'<input type="text" '.
								'class="input-name form-control ';
			if($fc['min_length'] > 0){
				$response .= 'min-length ';	
			}
			if($fc['max_length'] > 0){
				$response .= 'max-length ';	
			}
			$response .=	'" '.
								'name="'.$fc['name'].'" '.
								'value=""  ';
			if($fc['min_length'] > 0){
				$response .=	'data-min-length="'.$fc['min_length'].'" ';
			}
			if($fc['max_length'] > 0){
				$response .=	'data-max-length="'.$fc['max_length'].'" ';
			}
			if($fc['required'] == $varFormFieldRequired['required']['value']){
				$response .= 'required="required" ';
			}
			
			$response .= 'id="input-'.$formRowOrder.'"'.
							' /> ';
			if($fc['min_length'] > 0){
				$response .= '<div class="charNumMin"></div>';
			}
			if($fc['max_length'] > 0){
				$response .= '<div class="charNumMax"></div>';
			}
			$response .='</div>';

		break;
		case $varFormContentType['text_area']['value']:
			$response = '<div class="input-text form-group">'.
							'<label>'. $fc['placeholder'].'</label>'.
							'<textarea '.
								'class="textarea-message form-control ';
			if($fc['min_length'] > 0){
				$response .= 'min-length ';	
			}
			if($fc['max_length'] > 0){
				$response .= 'max-length ';	
			}
			$response .=	'" '.
								'name="'.$fc['name'].'" '.
								'cols="30" '.
								'rows="4"  ';
			if($fc['min_length'] > 0){
				$response .=	'data-min-length="'.$fc['min_length'].'" ';
			}
			if($fc['max_length'] > 0){
				$response .=	'data-max-length="'.$fc['max_length'].'" ';
			}
			if($fc['required'] == $varFormFieldRequired['required']['value']){
				$response .= 'required="required" ';
			}
			
			$response .= 'id="input-'.$formRowOrder.'"'.
							' >'.
							'</textarea>';
			if($fc['min_length'] > 0){
				$response .= '<div class="charNumMin"></div>';
			}
			if($fc['max_length'] > 0){
				$response .= '<div class="charNumMax"></div>';
			}
			$response .='</div>';
		break;
		case $varFormContentType['email']['value']:
			$response = '<div class="input-text form-group">'.
							'<label>'. $fc['placeholder'].'</label> '.
							'<input type="email" '.
								'class="input-name form-control ';
			if($fc['min_length'] > 0){
				$response .= 'min-length ';	
			}
			if($fc['max_length'] > 0){
				$response .= 'max-length ';	
			}
			$response .=	'" '.
								'name="'.$fc['name'].'" '.
								'value=""  ';
			if($fc['min_length'] > 0){
				$response .=	'data-min-length="'.$fc['min_length'].'" ';
			}
			if($fc['max_length'] > 0){
				$response .=	'data-max-length="'.$fc['max_length'].'" ';
			}
			if($fc['required'] == $varFormFieldRequired['required']['value']){
				$response .= 'required="required" ';
			}
			
			$response .= 'id="input-'.$formRowOrder.'"'.
							' /> ';
			if($fc['min_length'] > 0){
				$response .= '<div class="charNumMin"></div>';
			}
			if($fc['max_length'] > 0){
				$response .= '<div class="charNumMax"></div>';
			}
			$response .='</div>';

		break;
		case $varFormContentType['phone']['value']:
			$response = '<div class="input-text form-group">';
			
            $response .= '<label>'. $fc['phone']['placeholder'].'</label> ';
            $response .='<div class="webolytics-row"> '.
            			'<div class="webolytics-col-md-3 webolytics-col-xs-4">';
            $response .= '<select '.
						'name="'.$fc['country']['name'].'" '.
						//'data-md-selectize'.
						'class="input-name form-control"  ';
			$response .= 'required="required" ';
			
			
			$response .= '>';
            $response .= '<option value="">'. $label['instruction_please_select'].'</option>';
            if(count($fc['country']['options']) > 0){
            	foreach($fc['country']['options'] as $fcv){
            		$response .= '<option value="'.$fcv['value'].'" data-name="'. $fcv['country'].'">'. $fcv['option_label'].'</option>';
            	}
			}                   
            $response .= '</select>';
            $response .='</div>
            <div class="webolytics-col-md-9 webolytics-col-xs-8">';

            $response .='<input type="text" '.
							'class="input-name form-control phone-number" '.
							'name="'.$fc['phone']['name'].'" '.
							'value="" '.
							'id="input-'.$formRowOrder.'"'.
						' /> ';
			$response .='</div>'.
						'</div>';
			$response .= '</div>';
		break;
		case $varFormContentType['date']['value']:
			$response = '<div class="input-text form-group">'.
							'<label>'. $fc['placeholder'].'</label> '.
							'<input type="text" '.
								'class="input-name form-control" '.
								'name="'.$fc['name'].'" ';
			
			if($fc['required'] == $varFormFieldRequired['required']['value']){
				$response .= 'required="required" ';
			}
			
			$response .= 'id="input-'.$formRowOrder.'"'.
							' /> '.
						'</div>';
		break;
		case $varFormContentType['password']['value']:
			$response = '<div class="input-text form-group">'.
							'<label>'. $fc['placeholder'].'</label> '.
							'<input type="password" '.
								'class="input-name form-control ';
			if($fc['min_length'] > 0){
				$response .= 'min-length ';	
			}
			if($fc['max_length'] > 0){
				$response .= 'max-length ';	
			}
			$response .=	'" '.
								'name="'.$fc['name'].'" '.
								'value=""  ';
			if($fc['min_length'] > 0){
				$response .=	'data-min-length="'.$fc['min_length'].'" ';
			}
			if($fc['max_length'] > 0){
				$response .=	'data-max-length="'.$fc['max_length'].'" ';
			}
			if($fc['required'] == $varFormFieldRequired['required']['value']){
				$response .= 'required="required" ';
			}
			
			$response .= 'id="input-'.$formRowOrder.'"'.
							' /> ';
			if($fc['min_length'] > 0){
				$response .= '<div class="charNumMin"></div>';
			}
			if($fc['max_length'] > 0){
				$response .= '<div class="charNumMax"></div>';
			}
			$response .='</div>';
		break;
		case $varFormContentType['select']['value']:
		case $varFormContentType['select_country_field']['value']:
			$response = '<div class="input-text form-group">'.
							'<label>'. $fc['label'].'</label> ';
			$response .= '<select '.
						'name="'.$fc['name'].'" '.
						//'data-md-selectize'.
						'class="input-name form-control"  ';
			
			if($fc['required'] == $varFormFieldRequired['required']['value']){
				$response .= 'required="required" ';
			}
			
			$response .= 'id="input-'.$formRowOrder.'"'.
						'>';
            $response .= '<option value="">'. $label['instruction_please_select'].'</option>';
            if(count($fc['options']) > 0){
            	foreach($fc['options'] as $fcv){
            		$response .= '<option value="'.$fcv['value'].'" data-name="'. $fcv['label'].'">'. $fcv['label'].'</option>';
            	}
			}                   
            $response .= '</select>'.
						'</div>';


 			
		break;
		case $varFormContentType['radio']['value']:
			
            $response = '<div class="input-text form-group">'.
							'<label>'. $fc['label'].'</label> ';
			
            
            if($fc['options'] > 0){
            	foreach($fc['options'] as $fcv){
            		$response .= 	'<p><label class="form-check-label"> '. $fcv['label'].
	                                    '<input type="radio" '.
		                                    'name="'.$fc['name'].'" '.
		                                    'value="'.$fcv['value'].'" ';
		            if($fc['required'] == $varFormFieldRequired['required']['value']){
						$response .= 'required="required" ';
					}
	            	$response .= ' /> '.
	                                    //'<label class="inline-label">'. $fcv['label'].'</label>'.
                                    '</label></p>';
            						
            	}
			}                   
            $response .= '</div>';
		break;
		case $varFormContentType['checkbox']['value']:
			$response = '<div class="input-text form-group">'.
							'<label>'. $fc['label'].'</label> ';
			
            
            if($fc['options'] > 0){
            	foreach($fc['options'] as $fcv){
            		$response .= 	'<p><label class="form-check-label"> '. $fcv['label'].
	                                    '<input type="checkbox" '.
		                                    'name="'.$fc['name'].'" '.
		                                    'value="'.$fcv['value'].'" ';
		            /*if($fc['required'] == $varFormFieldRequired['required']['value']){
						$response .= 'required="required" ';
					}*/
	            	$response .= ' /> '.
	                                    //'<label class="inline-label">'. $fcv['label'].'</label>'.
                                    '</label></p>';
            						
            	}
			}
			$response.='</div>';
		break;
		case $varFormContentType['hidden_field']['value']:
			$response = '<input type="hidden" '.
							'name="'.$fc['name'].'" '.
							'value="'. $fc['value'].'" '.
						' /> ';

		break;
		case $varFormContentType['hidden_country_field']['value']:
			$response = '<input type="hidden" '.
						'name="'.$fc['name'].'" '.
						'value="'.$fc['value'].'" ';
            /*if($fc['values_count'] > 0){
            	$addFCC=false;
            	foreach($fc['options'] as $fcv){
            		if($addFCC == false){
	            		$response .= ' value="'.$fcv['form_content_value'].'" ';
	            		$addFCC=true;
            		}
            	}
			}  */                 
            $response .= ' /> ';


 			
		break;
		case $varFormContentType['free_text']['value']:
			$response = $fc['placeholder'];
		break;
		case $varFormContentType['form_content_module']['value']:
		case $varFormContentType['conversion_snippet']['value']:
			$response = form_content_modules($fc,$formRowOrder);
			//print_r($response);
			
			
		//$response = false;
		break;
		case $varFormContentType['conversion_snippet_catch_postback']['value']:
			$response = "<script type='text/javascript'> ".
							"document.addEventListener('DOMContentLoaded', function() { ";
							if($fc['options'] > 0){
				            	foreach($fc['options'] as $fcv){
				            		$response .= "var ".$fcv['label']." = ''; ";
				            	}
							}
			$response .= 		"var params = window.location.search.substring(1).split('&'); ".
							    
							    "for (var i=0; i<params.length; i++) { ".
									"var pair = params[i].split(/=(.+)/); ";
									if($fc['options'] > 0){
						            	foreach($fc['options'] as $fcv){
						            		$response .= "if ((pair[0] == '".$fcv['label']."') && pair[1]) { ".
												$fcv['label']." = pair[1]; ".
											"} ";
						            	}
									}
									
			$response .= 		"} ".
							    "if ( ";
							    if($fc['options'] > 0){
							    	$optionCount = count($fc['options']);
							    	$oc = 1;
						            	foreach($fc['options'] as $fcv){
						            		$response .= $fcv['label'];
						            		if($oc < $optionCount){
						            			$response .=" || ";
						            		}
						            		$oc ++;
						            	}
									}
			$response .= 		") { ".
									"var d = new Date(); ".
									"d.setTime(d.getTime() + (365*24*60*60*1000)); ".
									"var expires = 'expires=' + d.toUTCString() + '; '; ".
									"var hostnameParts = window.location.hostname.split('.').reverse(); ".
									"var domain = hostnameParts[0]; ".
									"for (var j=1; j<hostnameParts.length; j++) { ".
									    "domain = hostnameParts[j] + '.' + domain; ".
									    "document.cookie = 'webolytics___cd=1; ' + expires + 'domain=' + domain + '; path=/; secure; '; ".
									    "if (document.cookie.indexOf('webolytics___cd=1') > -1) ".
										"break; ".
									"} ".
									"var cookieEnd = '; ' + expires + 'domain=' + domain + '; path=/; secure; '; ".
									"document.cookie = 'webolytics___cd=' + domain + cookieEnd; ";
									if($fc['options'] > 0){
						            	foreach($fc['options'] as $fcv){
						            		$response .= "if (".$fcv['label'].") { ".
												"document.cookie = 'webolytics___".$fcv['label']."=' + ".$fcv['label']." + cookieEnd; ".
											"} ";
						            	}
									}
									
			$response .= 		"} ".

							"}, false);" .
						"</script>";
		break;
		case $varFormContentType['conversion_snippet_push_postback']['value']:
			$response = "<script type='text/javascript'> ".
							"document.addEventListener('DOMContentLoaded', function() { ".
							"const existingScript = document.getElementById('conversion-postback'); ";
							if($fc['options'] > 0){
				            	foreach($fc['options'] as $fcv){
				            		$response .= "var ".$fcv['label']." = ''; ";
				            	}
							}
			$response .= 	"var params = window.location.search.substring(1).split('&'); ".
						    "for (var i=0; i<params.length; i++) { ".
								"var pair = params[i].split(/=(.+)/); ";
									if($fc['options'] > 0){
						            	foreach($fc['options'] as $fcv){
						            		$response .= "if ((pair[0] == '".$fcv['label']."') && pair[1]) { ".
												$fcv['label']." = pair[1]; ".
											"} ";
						            	}
									}
									
			$response .= 	"} ".
						    "var ca = document.cookie.split(';'); ".
						    "for (var j=0; j<ca.length; j++) { ".
								"var c = ca[j].trim().split(/=(.+)/); ";
								if($fc['options'] > 0){
					            	foreach($fc['options'] as $fcv){
					            		$response .= "if (!".$fcv['label']." && (c[0] == 'webolytics___".$fcv['label']."')) { ".
											$fcv['label']." = c[1]; ".
										"} ";
					            	}
								}
								
			$response .= 	"} ".

						    
						    "if (!existingScript) { ".
						        "var tag = document.createElement('script'); ".
						        "tag.id = 'conversion-postback'; ".
							    "tag.type = 'text/javascript'; ";

							    $response .=  "tag.src = '".$fc['postback'] ; 
							    if($fc['options'] > 0){
							    	$optionCount = count($fc['options']);
							    	$oc = 0;
							    	$qsAppend=false;
					            	foreach($fc['options'] as $fcv){
					            		if($oc < $optionCount){
						            		if($qsAppend){
						            			$response .= "&";
						            		} else {
						            			$response .= "?";
						            		}
					            		}
					            		$response .= $fcv['label']."=' + ".$fcv['label'];
					            		
										$qsAppend=true;
										$oc ++;
										if($oc < $optionCount){
					            			$response .= " + '";
					            		}
					            	}
								}
							    	$response .= " ; ";
			$response .= 		"document.body.appendChild(tag); ".
							"} ".

						    
						
						   "}, false); ".
						"</script>" ;
		break;
		case $varFormContentType['file_upload']['value']:
			$response =	'<div class=" mb-20">'.
							'<div class="pb-20">'.
								'<p class="geta">'. $fc['placeholder'].'</p>'.
								'<input ';
			if(count($fc['allowed_file_formats']) > 0){
				$response .= 'accept=" ';
            	foreach($fc['allowed_file_formats'] as $fcv){
            		$response .= $fcv['value'].', ';
	            	
            	}
            	$response .= '" ';
			}					
			$response .=		'name="'.$fc['name'].'" '.
								'type="file" '.
								'class="dropify" ';
			if($fc['required'] == $varFormFieldRequired['required']['value']){
				$response .= 'required="required" ';
			}

			$response .= 	' />'.
								'<span class="statusMsg"></span>'.
							'</div>'.
						'</div>';
			
		
		break;
	}
	return $response;
}

function form_content_modules($fc,$formRowOrder){
	global 	$varModules,
			$varFormFieldRequired,
			$ratedPeopleURL,
			$label,
			$isRPJL;
			//echo $fc['type'].'<br>';
//print_r($varModules);
	if(isset($fc['type'])){
		foreach($varModules as $fmt){
			if($fmt['label'] == $fc['type']){
				$formContentType = $fmt['value'];
			}
		}	
	
		//foreach($fc['form_content_modules'] as $fcm){
			switch($formContentType){
				case $varModules['rated_people_jobs_list']['value']:
					if( (isset($isRPJL)) && ($isRPJL == true) ){
						$response = '<div class="input-text form-group">'.
			            $response .= '<label>What type of job is it?</label> '.
			            	'<select '.
							'name="'.$fc['name'].'" '.
							'id="RPJobsList" '.
							//'data-md-selectize'.
							'class="input-name form-control" ';
							if($fc['form_content_required'] == $varFormFieldRequired['required']['value']){
								$response .= 'required="required" ';
							}
						$response .= '>';
						/*$response .= '<option value="">Please select a trade</option>';
				        if(count($fc['options']) > 0){
			            	foreach($fc['options'] as $fcv){
			            		foreach($fcv as $fctv){
			            			$response .= '<option value="'.$fctv['value'].'" data-name="'. $fctv['job_type'].'">'. $fctv['label'].'</option>';
			            		}
			            	}
						} */           
				        $response .= '</select>'.
			            				'</div>';
					} else {
						$listData = rated_people_json_list('jobsList.json');
						$response = '<label>'. $fc['label'].'</label> ';
						$response.='<input type="hidden" name="'.$fc['name'].'" '.
									'value="'. $fc['form_content_placeholder'].'" />';
						$response .= '<select '.
							'name="formData['.$formRowOrder .']['.($fc['form_content_meta']['meta_content_order'] + 1) .'][joblist]" '.
							//'data-md-selectize'.
							'class="md-input" ';
						if($fc['form_content_required'] == $varFormFieldRequired['required']['value']){
							$response .= 'required="required" ';
						}
						$response .= '>';
				        $response .= '<option value="">'. $fc['form_content_placeholder'].'</option>';
				            foreach($listData as $value){
				            	if($fc['form_content_placeholder'] == $value['TradeName']){
				            		$response .= '<option value="'.$value['TradeSubNameID'].'">'. $value['TradeSubName'].'</option>';
				            	}
				            }                   
				        $response .= '</select>';
					}
				break;

				case $varModules['rated_people_tradesman_and_jobs_list']['value']:
					$response = '<div class="input-text form-group">'.
					$response .= '<label>What type of tradesman do you need?</label> '.
		            	'<select '.
						'name="'.$fc['name'].'" '.
						'class="json-data-source input-name form-control" ';
						if($fc['form_content_required'] == $varFormFieldRequired['required']['value']){
							$response .= 'required="required" ';
						}
						$response .= '>';
						$response .= '<option value="">'. $label['instruction_please_select'].'</option>';
			            if(count($fc['options']) > 0){
			            	foreach($fc['options'] as $fcv){
			            		$response .= '<option value="'.$fcv['value'].'" '. 
			            		'data-jsonsource="'.$ratedPeopleURL.'getJsonList.php?json=jobsList" '.
								'data-targetinput="RPJobsList" '.
								'data-displaykey="'.$fcv['value'].'" '.
								'data-name="'. $fcv['label'].'" '.
			            		'>'. $fcv['label'].'</option>';
			            	}
						}
			                      
			        $response .= '</select>'.
		            				'</div>';

					$isRPJL=true;
		            
				break;

				case $varModules['rated_people_budget_list']['value']:
					$response = '<div class="input-text form-group">'.
					$response = '<label>'. $fc['label'].'</label> ';
					$response .= '<select '.
						'name="'.$fc['name'].'" '.
						//'data-md-selectize'.
						'class="input-name form-control" ';
					if($fc['form_content_required'] == $varFormFieldRequired['required']['value']){
						$response .= 'required="required" ';
					}
					$response .= '>';
			        
			        $response .= '<option value="">'. $label['instruction_please_select'].'</option>';
		            if(count($fc['options']) > 0){
		            	foreach($fc['options'] as $fcv){
		            		$response .= '<option value="'.$fcv['value'].'" data-name="'. $fcv['label'].'">'. $fcv['label'].'</option>';
		            	}
					}                   
			        $response .= '</select>'.
			        			'</div>';
				break;

				case $varModules['rated_people_start_time_list']['value']:
					$response = '<div class="input-text form-group">'.
					$response = '<label>'. $fc['label'].'</label> ';
					$response .= '<select '.
						'name="'.$fc['name'].'" '.
						//'data-md-selectize'.
						'class="input-name form-control" ';
					if($fc['form_content_required'] == $varFormFieldRequired['required']['value']){
						$response .= 'required="required" ';
					}
					$response .= '>';
			        /*$response .= '<option value="">'. $fc['form_content_placeholder'].'</option>';
			            foreach($listData as $value){
			            	$response .= '<option value="'.$value['value'].'">'. $value['label'].'</option>';
			            }  */
			        $response .= '<option value="">'. $label['instruction_please_select'].'</option>';
		            if(count($fc['options']) > 0){
		            	foreach($fc['options'] as $fcv){
		            		$response .= '<option value="'.$fcv['value'].'" data-name="'. $fcv['label'].'">'. $fcv['label'].'</option>';
		            	}
					}                  
			        $response .= '</select>'.
			        			'</div>';
			
				break;

				default:
					$response = false;
				break;
			}
		//}
	} else {
		$response = false;
	}

	return $response;
}

function rated_people_json_list($jsonFile){
	global $ratedPeopleURL;
	$curlURL = $ratedPeopleURL.$jsonFile;
	
	$getData = api_call($curlURL, 
						$method = 'GET', 
						$data = false, 
						$headers = false, 
						$returnInfo = false,
						$jsonDecode = true);

	return $getData;
}

?>