<?php
$webolyticsURL = 'https://webolytics.webosaurus.co.uk/inbound/';
$ratedPeopleURL = 'https://webolytics.webosaurus.co.uk/modules/rated-people/';
$endRow = 16;
$isPagination = 1;
$numNull = 0;
$nullField = '';
$topPerformers = 10;
$topThree = 3;
$topPerformersBig = 50;
$percentTolerance=0.1;
$delemeter = ',';
/*Dates*/
$copyDate = date("Y");
$fileDate = date("U");
$thedate = date("Y-m-d H:i:s");
$thedateYMD = date("Y-m-d");
$dateFormat=array();
$dateFormat['short_date'] = 'd/m/Y';
$filterDateStart = date("d-m-Y", strtotime('-30 days'));
$filterDateEnd = date("d-m-Y");

/*Published*/
$varPublished = array();
$varPublished['published'] = 1;
$varPublished['not_published'] = 2;
$varPublished['verify'] = 3;
$varPublished['refused'] = 4;

$varProcessed = array();
$varProcessed['processed']['value'] = 1;
$varProcessed['processed']['label'] = $label['title_processed'];
$varProcessed['not_processed']['value'] = 2;
$varProcessed['not_processed']['label'] = $label['title_not_processed'];

/*Password Type*/
$varPW = array();
$varPW['main_pw'] = 1;

/*Primary*/
$varPrimary = array();
$varPrimary['primary'] = 1;
$varPrimary['not_primary'] = 2;
$varPrimary['billing_address'] = 3;

/*Relation*/
$varRelation = array();
$varRelation['user'] = 1;
$varRelation['vendor'] = 2;
$varRelation['country'] = 3;
$varRelation['address'] = 4;
$varRelation['currency'] = 5;


/*Name Type*/
$varName = array();
$varName['first_name'] = 1;
$varName['middle_name'] = 2;
$varName['last_name'] = 3;
$varName['vendor_name'] = 4;


/*Soical Portals*/
$varSocial = array();
$varSocial['facebook'] = 1;
$varSocial['twitter'] = 2;
$varSocial['linkedin'] = 3;
$varSocial['pinterest'] = 4;
$varSocial['instagram'] = 5;

/*Name Type*/
$varExpiry = array();
$varExpiry['trial_expiry'] = 1;
$varExpiry['payment_pending'] = 2;
$varExpiry['not_verified'] = 3;
$varExpiry['suspended'] = 4;
$varExpiry['not_processed'] = 5;
$varExpiry['awaiting_approval'] = 6;
$varExpiry['awaiting_acquisition_active'] = 7;
$varExpiry['rejected'] = 8;

$varQualified=array();
$varQualified['qualified'] = 9;

/*Tax Type*/
$varCCYTax = array();
$varCCYTax['VAT'] = 1;
$varCCYTax['GST'] = 2;

/*Vendor type*/
$varVendor = array();
$varVendor['advertiser'] = 1;
$varVendor['supplier'] = 2;
$varVendor['agency'] = 3;
$varVendor['jv'] = 4;




/*Meta Sections*/
$varMetaSectionType['form']['value'] = 1;
$varMetaSectionType['form']['label'] = $label['panel_form'];
$varMetaSectionType['campaign']['value'] = 2;
$varMetaSectionType['campaign']['label'] = $label['panel_campaign'];
$varMetaSectionType['cms_default']['value'] = 3;
$varMetaSectionType['cms_default']['label'] = $label['panel_cms_default'];

/*campaigns*/
$varCampaignSectionType = array();
$varCampaignSectionType['default_campaign']['value'] = 1;
$varCampaignSectionType['default_campaign']['label'] = $label['panel_campaign_default'];

/*monetisation*/
$varMonetisationType = array();
$varMonetisationType['default_cpl']['value'] = 7;
$varMonetisationType['default_cpl']['label'] = $label['title_cpl'];
$varMonetisationType['default_cpa']['value'] = 2;
$varMonetisationType['default_cpa']['label'] = $label['title_cpa'];
$varMonetisationType['default_cpc']['value'] = 1;
$varMonetisationType['default_cpc']['label'] = $label['title_cpc'];
/*$varMonetisationType['default_cpi']['value'] = 3;
$varMonetisationType['default_cpi']['label'] = $label['title_cpi'];*/
$varMonetisationType['default_fixed_fee']['value'] = 4;
$varMonetisationType['default_fixed_fee']['label'] = $label['title_fixed_fee'];
/*$varMonetisationType['default_rev_share_budget']['value'] = 5;
$varMonetisationType['default_rev_share_budget']['label'] = $label['title_rev_share_budget'];*/
$varMonetisationType['default_rev_share_roi']['value'] = 6;
$varMonetisationType['default_rev_share_roi']['label'] = $label['title_rev_share_roi'];


/*search Froms*/
$varAcquisitionPriceType=array();
$varAcquisitionPriceType['advertiser']['value'] = $varVendor['advertiser'];
$varAcquisitionPriceType['advertiser']['label'] = $label['title_advertiser'];
$varAcquisitionPriceType['supplier']['value'] = $varVendor['supplier'];
$varAcquisitionPriceType['supplier']['label'] = $label['title_supplier'];


$varMetaGroupPriceType=array();
$varMetaGroupPriceType['campaign_group_monetisation']['value'] = 1;
$varMetaGroupPriceType['campaign_group_monetisation']['label'] = $label['panel_campaign_group_monetisation'];


$varCampaignRowType = array();
$varCampaignRowType['ctr_campaign_row']['value'] = 1;
$varCampaignRowType['ctr_campaign_row']['label'] = $label['panel_campaign_ctr_row'];


/*Forms*/
$varFormSectionType = array();
$varFormSectionType['default_form']['value'] = 1;
$varFormSectionType['default_form']['label'] = $label['panel_form_default'];


$varFormRowType = array();
$varFormRowType['default_form_row']['value'] = 1;
$varFormRowType['default_form_row']['label'] = $label['panel_form_default_row'];



/*Form Input Types*/
$varFormContentType=array();
$varFormContentType['text_field']['value'] = 1;
$varFormContentType['text_field']['label'] = $label['title_form_text_field'];
$varFormContentType['text_field']['icon'] = $labelIcon['text_field'];
$varFormContentType['text_area']['value'] = 2;
$varFormContentType['text_area']['label'] = $label['title_form_text_area'];
$varFormContentType['text_area']['icon'] = $labelIcon['text_area'];
$varFormContentType['email']['value'] = 3;
$varFormContentType['email']['label'] = $label['title_form_email'];
$varFormContentType['email']['icon'] = $labelIcon['email'];
$varFormContentType['phone']['value'] = 4;
$varFormContentType['phone']['label'] = $label['title_form_phone'];
$varFormContentType['phone']['icon'] = $labelIcon['phone'];
$varFormContentType['phone']['country'] = $label['title_country'];
$varFormContentType['date']['value'] = 5;
$varFormContentType['date']['label'] = $label['title_form_date'];
$varFormContentType['date']['icon'] = $labelIcon['date_field'];
$varFormContentType['password']['value'] = 6;
$varFormContentType['password']['label'] = $label['title_form_password'];
$varFormContentType['password']['icon'] = $labelIcon['password_field'];
$varFormContentType['select']['value'] = 7;
$varFormContentType['select']['label'] = $label['title_form_select'];
$varFormContentType['select']['icon'] = $labelIcon['select_field'];
$varFormContentType['radio']['value'] = 8;
$varFormContentType['radio']['label'] = $label['title_form_radio'];
$varFormContentType['radio']['icon'] = $labelIcon['radio_field'];
$varFormContentType['checkbox']['value'] = 9;
$varFormContentType['checkbox']['label'] = $label['title_form_checkbox'];
$varFormContentType['checkbox']['icon'] = $labelIcon['checkbox_field'];
$varFormContentType['free_text']['value'] = 10;
$varFormContentType['free_text']['label'] = $label['title_free_text'];
$varFormContentType['free_text']['icon'] = $labelIcon['free_text'];
$varFormContentType['form_content_module']['value'] = 11;
$varFormContentType['form_content_module']['label'] = $label['title_form_content_module'];
$varFormContentType['form_content_module']['icon'] = $labelIcon['modules'];
$varFormContentType['hidden_field']['value'] = 12;
$varFormContentType['hidden_field']['label'] = $label['title_form_hidden_field'];
$varFormContentType['hidden_field']['icon'] = $labelIcon['hidden'];
$varFormContentType['hidden_country_field']['value'] = 13;
$varFormContentType['hidden_country_field']['label'] = $label['title_form_hidden_country_field'];
$varFormContentType['hidden_country_field']['icon'] = $labelIcon['countries'];
$varFormContentType['select_country_field']['value'] = 14;
$varFormContentType['select_country_field']['label'] = $label['title_form_country_select'];
$varFormContentType['select_country_field']['icon'] = $labelIcon['countries'];

/*Form Input Types*/
$varFormFieldRequired=array();
$varFormFieldRequired['required']['value'] = 1;
$varFormFieldRequired['required']['label'] = $label['title_required'];
$varFormFieldRequired['optional']['value'] = 2;
$varFormFieldRequired['optional']['label'] = $label['title_optional'];


/*Row Count*/
$varRowCount=array();
//$varRowCount[2] = 2;
$varRowCount[16] = 16;
$varRowCount[24] = 24;
$varRowCount[50] = 50;
$varRowCount[100] = 100;

/*front end styles and names */
$varCSSNames=array();
$varCSSNames['simple_filter_form'] = "simple-filter-form";


/*search Froms*/
$varSearchPublished=array();
$varSearchPublished['all_published']['value'] = $numNull;
$varSearchPublished['all_published']['label'] = $label['instruction_all'];
$varSearchPublished['published']['value'] = $varPublished['published'];
$varSearchPublished['published']['label'] = $label['instruction_published'];
$varSearchPublished['not_published']['value'] = $varPublished['not_published'];
$varSearchPublished['not_published']['label'] = $label['instruction_not_published'];


/*search Froms*/
$varVendorType=array();
$varVendorType['all_type']['value'] = $numNull;
$varVendorType['all_type']['label'] = $label['instruction_all'];
$varVendorType['advertiser']['value'] = $varVendor['advertiser'];
$varVendorType['advertiser']['label'] = $label['title_advertiser'];
$varVendorType['supplier']['value'] = $varVendor['supplier'];
$varVendorType['supplier']['label'] = $label['title_supplier'];
$varVendorType['agency']['value'] = $varVendor['agency'];
$varVendorType['agency']['label'] = $label['title_agency'];
$varVendorType['jv']['value'] = $varVendor['jv'];
$varVendorType['jv']['label'] = $label['title_jv'];


/*search Froms*/
$varSearchPrimary=array();
$varSearchPrimary['not_primary']['value'] = $varPrimary['not_primary'];
$varSearchPrimary['not_primary']['label'] = $label['title_not_primary'];
$varSearchPrimary['primary']['value'] = $varPrimary['primary'];
$varSearchPrimary['primary']['label'] = $label['title_is_primary'];

/*search Froms*/
$varSocialAccount=array();
$varSocialAccount['twitter']['value'] = $varSocial['twitter'];
$varSocialAccount['twitter']['label'] = $label['title_twitter'];
$varSocialAccount['twitter']['icon'] = 'uk-icon-twitter';
$varSocialAccount['facebook']['value'] = $varSocial['facebook'];
$varSocialAccount['facebook']['label'] = $label['title_facebook'];
$varSocialAccount['facebook']['icon'] = 'uk-icon-facebook-official';
$varSocialAccount['linkedin']['value'] = $varSocial['linkedin'];
$varSocialAccount['linkedin']['label'] = $label['title_linkedin'];
$varSocialAccount['linkedin']['icon'] = 'uk-icon-linkedin';
$varSocialAccount['instagram']['value'] = $varSocial['instagram'];
$varSocialAccount['instagram']['label'] = $label['title_instagram'];
$varSocialAccount['instagram']['icon'] = 'uk-icon-instagram';
$varSocialAccount['pinterest']['value'] = $varSocial['pinterest'];
$varSocialAccount['pinterest']['label'] = $label['title_pinterest'];
$varSocialAccount['pinterest']['icon'] = 'uk-icon-pinterest';

/*search Froms*/
$varExpiryList=array();
$varExpiryList['trial_expiry']['value'] = $varExpiry['trial_expiry'];
$varExpiryList['trial_expiry']['label'] = $statusArr['103']['value'];
$varExpiryList['trial_expiry']['text_status'] = $labelPublished['text-danger'];
$varExpiryList['trial_expiry']['bg_status'] = $labelPublished['not_published_bg'] ;
$varExpiryList['trial_expiry']['button_bg_status'] = $labelPublished['not_published'];
$varExpiryList['payment_pending']['value'] = $varExpiry['payment_pending'];
$varExpiryList['payment_pending']['label'] = $statusArr['105']['value'];
$varExpiryList['payment_pending']['text_status'] = $labelPublished['text-danger'];
$varExpiryList['payment_pending']['bg_status'] = $labelPublished['not_published_bg'] ;
$varExpiryList['payment_pending']['button_bg_status'] = $labelPublished['not_published'];
$varExpiryList['not_verified']['value'] = $varExpiry['not_verified'];
$varExpiryList['not_verified']['label'] = $statusArr['106']['value'];
$varExpiryList['not_verified']['text_status'] = $labelPublished['text-danger'];
$varExpiryList['not_verified']['bg_status'] = $labelPublished['not_published_bg'] ;
$varExpiryList['not_verified']['button_bg_status'] = $labelPublished['not_published'];
$varExpiryList['suspended']['value'] = $varExpiry['suspended'];
$varExpiryList['suspended']['label'] = $statusArr['108']['value'];
$varExpiryList['suspended']['text_status'] = $labelPublished['text-danger'];
$varExpiryList['suspended']['bg_status'] = $labelPublished['not_published_bg'] ;
$varExpiryList['suspended']['button_bg_status'] = $labelPublished['not_published'];
$varExpiryList['not_processed']['value'] = $varExpiry['not_processed'];
$varExpiryList['not_processed']['label'] = $statusArr['112']['value'];
$varExpiryList['not_processed']['text_status'] = $labelPublished['text-danger'];
$varExpiryList['not_processed']['bg_status'] = $labelPublished['not_published_bg'] ;
$varExpiryList['not_processed']['button_bg_status'] = $labelPublished['not_published'];
$varExpiryList['awaiting_approval']['value'] = $varExpiry['awaiting_approval'];
$varExpiryList['awaiting_approval']['label'] = $statusArr['113']['value'];
$varExpiryList['awaiting_approval']['text_status'] = $labelPublished['text-danger'];
$varExpiryList['awaiting_approval']['bg_status'] = $labelPublished['not_published_bg'] ;
$varExpiryList['awaiting_approval']['button_bg_status'] = $labelPublished['not_published'];
$varExpiryList['awaiting_acquisition_active']['value'] = $varExpiry['awaiting_acquisition_active'];
$varExpiryList['awaiting_acquisition_active']['label'] = $statusArr['114']['value'];
$varExpiryList['awaiting_acquisition_active']['text_status'] = $labelPublished['text-danger'];
$varExpiryList['awaiting_acquisition_active']['bg_status'] = $labelPublished['not_published_bg'] ;
$varExpiryList['awaiting_acquisition_active']['button_bg_status'] = $labelPublished['not_published'];
$varExpiryList['rejected']['value'] = $varExpiry['rejected'];
$varExpiryList['rejected']['label'] = $statusArr['116']['value'];
$varExpiryList['rejected']['text_status'] = $labelPublished['text-danger'];
$varExpiryList['rejected']['bg_status'] = $labelPublished['not_published_bg'] ;
$varExpiryList['rejected']['button_bg_status'] = $labelPublished['not_published'];
$varExpiryList['qualified']['value'] = $varQualified['qualified'];
$varExpiryList['qualified']['label'] = $statusArr['117']['value'];
$varExpiryList['qualified']['text_status'] = $labelPublished['text-success'];
$varExpiryList['qualified']['bg_status'] = $labelPublished['published_bg'] ;
$varExpiryList['qualified']['button_bg_status'] = $labelPublished['published'];


/*search Froms*/
$varNameList=array();
$varNameList['first_name']['value'] = $varName['first_name'];
$varNameList['first_name']['label'] = $label['title_first_name'];
$varNameList['middle_name']['value'] = $varName['middle_name'];
$varNameList['middle_name']['label'] = $label['title_middle_name'];
$varNameList['last_name']['value'] = $varName['last_name'];
$varNameList['last_name']['label'] = $label['title_last_name'];
$varNameList['vendor_name']['value'] = $varName['vendor_name'];
$varNameList['vendor_name']['label'] = $label['title_vendor_name'];

/*search Froms*/
$varPWList=array();
$varPWList['login_password']['value'] = $varPW['main_pw'];
$varPWList['login_password']['label'] = $label['title_login_password'];

/*Order directions*/
$varOrder=array();
$varOrder['up']['value'] = 1;
$varOrder['up']['label'] = $label['title_up'];
$varOrder['down']['value'] = 2;
$varOrder['down']['label'] = $label['title_down'];

/*Order directions*/
$varAddress=array();
$varAddress['address_line_1']['value'] = 1;
$varAddress['address_line_1']['label'] = $label['title_address_line_1'];
$varAddress['address_line_2']['value'] = 2;
$varAddress['address_line_2']['label'] = $label['title_address_line_2'];
$varAddress['address_line_3']['value'] = 3;
$varAddress['address_line_3']['label'] = $label['title_address_line_3'];
$varAddress['address_city']['value'] = 4;
$varAddress['address_city']['label'] = $label['title_address_city'];
$varAddress['address_postcode']['value'] = 5;
$varAddress['address_postcode']['label'] = $label['title_address_postcode'];
$varAddress['address_county']['value'] = 6;
$varAddress['address_county']['label'] = $label['title_address_county'];
$varAddress['address_country']['value'] = 7;
$varAddress['address_country']['label'] = $label['panel_country'];


/*Map form fields to user data input types*/
$varMapFormContent=array();
$varMapFormContent['name']['value'] = 1;
$varMapFormContent['name']['label'] = $label['title_users_name'];
$varMapFormContent['name']['icon'] = $labelIcon['name'];
$varMapFormContent['name']['sub-list'] = $varNameList;
$varMapFormContent['email']['value'] = 2;
$varMapFormContent['email']['label'] = $label['title_form_email'];
$varMapFormContent['email']['icon'] = $labelIcon['email'];
$varMapFormContent['phone']['value'] = 3;
$varMapFormContent['phone']['label'] = $label['title_form_phone'];
$varMapFormContent['phone']['icon'] = $labelIcon['phone'];
$varMapFormContent['address']['value'] = 4;
$varMapFormContent['address']['label'] = $label['title_address'];
$varMapFormContent['address']['icon'] = $labelIcon['address'];
$varMapFormContent['address']['sub-list'] = $varAddress;
$varMapFormContent['social']['value'] = 5;
$varMapFormContent['social']['label'] = $label['title_social_accounts'];
$varMapFormContent['social']['icon'] = $labelIcon['social'];
$varMapFormContent['social']['sub-list'] = $varSocialAccount;
$varMapFormContent['password']['value'] = 6;
$varMapFormContent['password']['label'] = $label['title_form_password'];
$varMapFormContent['password']['icon'] = $labelIcon['password_field'];


$varAcquisitionStamp = array();
$varAcquisitionStamp['clickthrough']['value'] = 1;
$varAcquisitionStamp['clickthrough']['label'] = $label['title_clickthrough'];
$varAcquisitionStamp['clickthrough']['icon'] = $labelIcon['clickthrough'];
$varAcquisitionStamp['lead']['value'] = 2;
$varAcquisitionStamp['lead']['label'] = $label['title_lead'];
$varAcquisitionStamp['lead']['icon'] = $labelIcon['acquisitions'];
$varAcquisitionStamp['acquisition']['value'] = 3;
$varAcquisitionStamp['acquisition']['label'] = $label['panel_acquisition'];
$varAcquisitionStamp['acquisition']['icon'] = $labelIcon['acquisitions'];



$varTracking = array();
$varTracking['url']['value'] = 13;
$varTracking['url']['label'] = $label['title_url'];
$varTracking['url']['icon'] = $labelIcon['url'];
$varTracking['url_host']['value'] = 14;
$varTracking['url_host']['label'] = $label['title_url_host'];
$varTracking['url_host']['icon'] = $labelIcon['url_host'];
$varTracking['url_path']['value'] = 15;
$varTracking['url_path']['label'] = $label['title_url_path'];
$varTracking['url_path']['icon'] = $labelIcon['url_path'];
$varTracking['url_variable']['value'] = 1;
$varTracking['url_variable']['label'] = $label['title_url_variable'];
$varTracking['url_variable']['icon'] = $labelIcon['url_variable'];
$varTracking['time_stamp']['value'] = 2;
$varTracking['time_stamp']['label'] = $label['title_timestamp'];
$varTracking['time_stamp']['icon'] = $labelIcon['date_field'];
$varTracking['ip']['value'] = 3;
$varTracking['ip']['label'] = $label['title_ip'];
$varTracking['ip']['icon'] = $labelIcon['ip'];
$varTracking['browser']['value'] = 4;
$varTracking['browser']['label'] = $label['title_browser'];
$varTracking['browser']['icon'] = $labelIcon['browser'];
$varTracking['device']['value'] = 5;
$varTracking['device']['label'] = $label['title_device'];
$varTracking['device']['icon'] = $labelIcon['device'];
$varTracking['country_id']['value'] = 6;
$varTracking['country_id']['label'] = $label['title_country'];
$varTracking['country_id']['icon'] = $labelIcon['countries'];
$varTracking['city']['value'] = 7;
$varTracking['city']['label'] = $label['title_city'];
$varTracking['city']['icon'] = $labelIcon['city'];
$varTracking['timezone']['value'] = 8;
$varTracking['timezone']['label'] = $label['title_timezone'];
$varTracking['timezone']['icon'] = $labelIcon['timezone'];
$varTracking['postcode']['value'] = 9;
$varTracking['postcode']['label'] = $label['title_postcode'];
$varTracking['postcode']['icon'] = $labelIcon['address'];
$varTracking['lat']['value'] = 10;
$varTracking['lat']['label'] = $label['title_lat'];
$varTracking['lat']['icon'] = $labelIcon['lat_long'];
$varTracking['long']['value'] = 11;
$varTracking['long']['label'] = $label['title_long'];
$varTracking['long']['icon'] = $labelIcon['lat_long'];
$varTracking['network_provider']['value'] = 12;
$varTracking['network_provider']['label'] = $label['title_network_provider'];
$varTracking['network_provider']['icon'] = $labelIcon['network_provider'];
$varTracking['url_referer']['value'] = 17;
$varTracking['url_referer']['label'] = $label['title_url_referer'];
$varTracking['url_referer']['icon'] = $labelIcon['url_referer'];
$varTracking['url_referer_host']['value'] = 18;
$varTracking['url_referer_host']['label'] = $label['title_url_referer_host'];
$varTracking['url_referer_host']['icon'] = $labelIcon['url_referer_host'];
$varTracking['url_referer_path']['value'] = 19;
$varTracking['url_referer_path']['label'] = $label['title_url_referer_path'];
$varTracking['url_referer_path']['icon'] = $labelIcon['url_referer_path'];
$varTracking['url_referer_variable']['value'] = 16;
$varTracking['url_referer_variable']['label'] = $label['title_url_referer_variable'];
$varTracking['url_referer_variable']['icon'] = $labelIcon['url_referer_variable'];
$varTracking['platform']['value'] = 20;
$varTracking['platform']['label'] = $label['title_platform'];
$varTracking['platform']['icon'] = $labelIcon['browser'];
$varTracking['api']['value'] = 21;
$varTracking['api']['label'] = $label['title_api'];
$varTracking['api']['icon'] = $labelIcon['browser'];
$varTracking['bespoke']['value'] = 22;
$varTracking['bespoke']['label'] = $label['title_bespoke_tracking'];
$varTracking['bespoke']['icon'] = $labelIcon['browser'];


$varRoleType=array();
$varRoleType['admin']['value']=1;
$varRoleType['user']['value']=2;
//Roles variables array
$varRoles = array();
$varRoles['super_admin']['value'] = 1;
$varRoles['super_admin']['label'] = $label['title_super_admin'];
$varRoles['super_admin']['type'] = $varRoleType['admin']['value'];
$varRoles['super_admin_countries']['value'] = 2;
$varRoles['super_admin_countries']['label'] = $label['title_super_admin_countries'];
$varRoles['super_admin_countries']['type'] = $varRoleType['admin']['value'];
$varRoles['super_admin_vendors']['value'] = 3;
$varRoles['super_admin_vendors']['label'] = $label['title_super_admin_vendors'];
$varRoles['super_admin_vendors']['type'] = $varRoleType['admin']['value'];
$varRoles['super_admin_accounts']['value'] = 4;
$varRoles['super_admin_accounts']['label'] = $label['title_super_admin_accounts'];
$varRoles['super_admin_accounts']['type'] = $varRoleType['admin']['value'];
$varRoles['super_admin_acquisitions']['value'] = 5;
$varRoles['super_admin_acquisitions']['label'] = $label['title_super_admin_acquisitions'];
$varRoles['super_admin_acquisitions']['type'] = $varRoleType['admin']['value'];
$varRoles['super_admin_currencies']['value'] = 6;
$varRoles['super_admin_currencies']['label'] = $label['title_super_admin_currencies'];
$varRoles['super_admin_currencies']['type'] = $varRoleType['admin']['value'];
$varRoles['super_admin_users']['value'] = 7;
$varRoles['super_admin_users']['label'] = $label['title_super_admin_users'];
$varRoles['super_admin_users']['type'] = $varRoleType['admin']['value'];
$varRoles['super_admin_roles']['value'] = 12;
$varRoles['super_admin_roles']['label'] = $label['title_super_admin_roles'];
$varRoles['super_admin_roles']['type'] = $varRoleType['admin']['value'];
$varRoles['super_admin_modules']['value'] = 13;
$varRoles['super_admin_modules']['label'] = $label['title_super_admin_modules'];
$varRoles['super_admin_modules']['type'] = $varRoleType['admin']['value'];
$varRoles['super_admin_api_access']['value'] = 14;
$varRoles['super_admin_api_access']['label'] = $label['title_super_admin_api_access'];
$varRoles['super_admin_api_access']['type'] = $varRoleType['user']['value'];
$varRoles['super_admin_dashboard']['value'] = 15;
$varRoles['super_admin_dashboard']['label'] = $label['title_super_admin_dashboard'];
$varRoles['super_admin_dashboard']['type'] = $varRoleType['admin']['value'];
$varRoles['super_admin_white_label']['value'] = 17;
$varRoles['super_admin_white_label']['label'] = $label['title_super_admin_white_label'];
$varRoles['super_admin_white_label']['type'] = $varRoleType['admin']['value'];
$varRoles['super_admin_email_settings']['value'] = 18;
$varRoles['super_admin_email_settings']['label'] = $label['title_super_admin_email_settings'];
$varRoles['super_admin_email_settings']['type'] = $varRoleType['admin']['value'];
$varRoles['super_admin_legals']['value'] = 19;
$varRoles['super_admin_legals']['label'] = $label['title_super_admin_legals'];
$varRoles['super_admin_legals']['type'] = $varRoleType['admin']['value'];
$varRoles['user']['value'] = 8;
$varRoles['user']['label'] = $label['title_user_dashboard'];
$varRoles['user']['type'] = $varRoleType['user']['value'];
$varRoles['user_form_builder']['value'] = 9;
$varRoles['user_form_builder']['label'] = $label['title_user_form_builder'];
$varRoles['user_form_builder']['type'] = $varRoleType['user']['value'];
$varRoles['user_campaigns']['value'] = 10;
$varRoles['user_campaigns']['label'] = $label['title_user_campaigns'];
$varRoles['user_campaigns']['type'] = $varRoleType['user']['value'];
$varRoles['user_acquisitions']['value'] = 11;
$varRoles['user_acquisitions']['label'] = $label['title_user_acquisitions'];
$varRoles['user_acquisitions']['type'] = $varRoleType['user']['value'];
$varRoles['user_download']['value'] = 16;
$varRoles['user_download']['label'] = $label['title_download'];
$varRoles['user_download']['type'] = $varRoleType['user']['value'];


$topNav=array();
$topNav['admin']['url'] = $siteURL.$adminFolder;
$topNav['admin']['icon'] = $labelIcon['admin_section'];
$topNav['admin']['label'] = $label['admin_panel'];
$topNav['admin']['type'] = $varRoleType['admin']['value'];
$topNav['portal']['url'] = $siteURL.$clientPortaLFolder;
$topNav['portal']['icon'] = $labelIcon['dashboard_portal_section'];
$topNav['portal']['label'] = $label['company_name'];
$topNav['portal']['type'] = $varRoleType['user']['value'];

$varRolesCRUD=array();
$varRolesCRUD['not_assigned']['value'] = 0;
$varRolesCRUD['not_assigned']['label'] = $label['title_not_assigned'];
$varRolesCRUD['all_records']['value'] = 1;
$varRolesCRUD['all_records']['label'] = $label['title_all_records'];
$varRolesCRUD['only_self']['value'] = 2;
$varRolesCRUD['only_self']['label'] = $label['title_only_self'];

$varModuleTypes=array();
$varModuleTypes['form_conversion']['value'] = 1;
$varModuleTypes['form_conversion']['label'] = $label['title_form_conversion_module'];
$varModuleTypes['form_content']['value'] = 2;
$varModuleTypes['form_content']['label'] = $label['title_form_content_module'];
$varModuleTypes['form_rendering']['value'] = 3;
$varModuleTypes['form_rendering']['label'] = $label['title_form_rendering_module'];
$varModuleTypes['vendor']['value'] = 4;
$varModuleTypes['vendor']['label'] = $label['title_vendor_module'];
$varModuleTypes['universal_crm']['value'] = 5;
$varModuleTypes['universal_crm']['label'] = $label['title_universal_crm_module'];
$varModuleTypes['acquisition_stamp']['value'] = 6;
$varModuleTypes['acquisition_stamp']['label'] = $label['instruction_acquisition_stamp'];


$varModules=array();
$varModules['iframe_url']['value'] = 8;
$varModules['iframe_url']['label'] = $label['title_iframe_url'];
$varModules['iframe_url']['type'] = $varModuleTypes['form_rendering']['value'];
$varModules['de_duplication']['value'] = 7;
$varModules['de_duplication']['label'] = $label['title_de_duplication'];
$varModules['de_duplication']['type'] = $varModuleTypes['form_conversion']['value'];
$varModules['validate_email']['value'] = 9;
$varModules['validate_email']['label'] = $label['title_validate_email'];
$varModules['validate_email']['type'] = $varModuleTypes['form_conversion']['value'];
$varModules['validate_phone']['value'] = 10;
$varModules['validate_phone']['label'] = $label['title_validate_phone'];
$varModules['validate_phone']['type'] = $varModuleTypes['form_conversion']['value'];
$varModules['validate_address']['value'] = 11;
$varModules['validate_address']['label'] = $label['title_validate_address'];
$varModules['validate_address']['type'] = $varModuleTypes['form_conversion']['value'];
$varModules['whitelabel']['value'] = 12;
$varModules['whitelabel']['label'] = $label['title_whitelabel'];
$varModules['whitelabel']['type'] = $varModuleTypes['vendor']['value'];
$varModules['email_settings']['value'] = 13;
$varModules['email_settings']['label'] = $label['title_email_settings'];
$varModules['email_settings']['type'] = $varModuleTypes['vendor']['value'];
$varModules['country_whitelist']['value'] = 23;
$varModules['country_whitelist']['label'] = $label['title_country_whitelist'];
$varModules['country_whitelist']['type'] = $varModuleTypes['form_conversion']['value'];

$varModules['clear_reports_tracking']['value'] = 1;
$varModules['clear_reports_tracking']['label'] = $label['title_clear_reports_tracking'];
$varModules['clear_reports_tracking']['type'] = $varModuleTypes['form_conversion']['value'];

$varModules['rated_people_jobs_list']['value'] = 2;
$varModules['rated_people_jobs_list']['label'] = $label['title_rated_people_jobs_list'];
$varModules['rated_people_jobs_list']['type'] = $varModuleTypes['form_content']['value'];
$varModules['rated_people_budget_list']['value'] = 3;
$varModules['rated_people_budget_list']['label'] = $label['title_rated_people_budget_list'];
$varModules['rated_people_budget_list']['type'] = $varModuleTypes['form_content']['value'];
$varModules['rated_people_start_time_list']['value'] = 4;
$varModules['rated_people_start_time_list']['label'] = $label['title_rated_people_start_time_list'];
$varModules['rated_people_start_time_list']['type'] = $varModuleTypes['form_content']['value'];
$varModules['rated_people_process_lead']['value'] = 5;
$varModules['rated_people_process_lead']['label'] = $label['title_rated_people_process_lead'];
$varModules['rated_people_process_lead']['type'] = $varModuleTypes['form_conversion']['value'];
$varModules['rated_people_tradesman_and_jobs_list']['value'] = 6;
$varModules['rated_people_tradesman_and_jobs_list']['label'] = $label['title_rated_people_tradesman_and_jobs_list'];
$varModules['rated_people_tradesman_and_jobs_list']['type'] = $varModuleTypes['form_content']['value'];

$varModules['pcuk_process_lead']['value'] = 14;
$varModules['pcuk_process_lead']['label'] = $label['title_pcuk_process_lead'];
$varModules['pcuk_process_lead']['type'] = $varModuleTypes['form_conversion']['value'];

$varModules['salesforce']['value'] = 15;
$varModules['salesforce']['label'] = $label['title_salesforce_lead_capture'];
$varModules['salesforce']['type'] = $varModuleTypes['universal_crm']['value'];
$varModules['salesforce_opportunity']['value'] = 16;
$varModules['salesforce_opportunity']['label'] = $label['title_salesforce_opportunity_capture'];
$varModules['salesforce_opportunity']['type'] = $varModuleTypes['acquisition_stamp']['value'];
$varModules['salesforce_contact']['value'] = 17;
$varModules['salesforce_contact']['label'] = $label['title_salesforce_contact_capture'];
$varModules['salesforce_contact']['type'] = $varModuleTypes['acquisition_stamp']['value'];
$varModules['salesforce_account']['value'] = 18;
$varModules['salesforce_account']['label'] = $label['title_salesforce_account_capture'];
$varModules['salesforce_account']['type'] = $varModuleTypes['acquisition_stamp']['value'];

$varModules['capital_index_process_lead']['value'] = 19;
$varModules['capital_index_process_lead']['label'] = $label['title_capital_index_process_lead'];
$varModules['capital_index_process_lead']['type'] = $varModuleTypes['form_conversion']['value'];

$varModules['gus_salesforce_lead_capture']['value'] = 20;
$varModules['gus_salesforce_lead_capture']['label'] = $label['title_gus_salesforce_lead_capture'];
$varModules['gus_salesforce_lead_capture']['type'] = $varModuleTypes['form_conversion']['value'];

$varModules['mt4_account']['value'] = 21;
$varModules['mt4_account']['label'] = $label['title_mt4_account'];
$varModules['mt4_account']['type'] = $varModuleTypes['form_conversion']['value'];

$varModules['swan_account']['value'] = 22;
$varModules['swan_account']['label'] = $label['title_swan_account'];
$varModules['swan_account']['type'] = $varModuleTypes['acquisition_stamp']['value'];


$varDedupe=array();
$varDedupe['email']['value'] = 1;
$varDedupe['email']['label'] = $label['title_email_address'];

$varDeviceBlackList=array();
$varDeviceBlackList['bot']['value'] = 1;
$varDeviceBlackList['bot']['label'] = $label['title_bot'];
$varDeviceBlackList['api']['value'] = 2;
$varDeviceBlackList['api']['label'] = $label['title_api'];
$varDeviceBlackList['unknown']['value'] = 3;
$varDeviceBlackList['unknown']['label'] = $label['title_unknown'];


$varAddressBlackList=array();
$varAddressBlackList['postcode'][0] = 'rp9 9rp';
$varAddressBlackList['postcode'][1] = 'rp99rp';

$varWLImg=array();
$varWLImg['login']['value']=1;
$varWLImg['login']['label']=$label['title_login_logo'];
$varWLImg['login']['width']=290;
$varWLImg['login']['height']=290;
$varWLImg['login']['is_vector']=true;
$varWLImg['main']['value']=2;
$varWLImg['main']['label']=$label['title_main_logo'];
$varWLImg['main']['width']=190;
$varWLImg['main']['height']=190;
$varWLImg['main']['is_vector']=true;
$varWLImg['email']['value']=3;
$varWLImg['email']['label']=$label['title_email_logo'];
$varWLImg['email']['width']=290;
$varWLImg['email']['height']=290;
$varWLImg['email']['is_vector']=false;

$varWLHex=array();
$varWLHex['primary']['value']=1;
$varWLHex['primary']['label']=$label['title_primary_colour'];
$varWLHex['secondary']['value']=2;
$varWLHex['secondary']['label']=$label['title_secondary_colour'];
$varWLHex['link']['value']=3;
$varWLHex['link']['label']=$label['title_link_colour'];

$varWLGradient=array();
$varWLGradient['gradient']['value']=1;
$varWLGradient['gradient']['label']=$label['title_gradient'];
$varWLGradient['no_gradient']['value']=2;
$varWLGradient['no_gradient']['label']=$label['title_no_gradient'];

$varImageFormat=array();
$varImageFormat['raster']='raster';
$varImageFormat['vector']='vector';

$varImageType=array();
$varImageType['gif']['value']='image/gif';
$varImageType['gif']['label']='gif';
$varImageType['gif']['extension']='.gif';
$varImageType['gif']['image_from']='imagegif';
$varImageType['gif']['type']=$varImageFormat['raster'];
$varImageType['pjpeg']['value']='image/pjpeg';
$varImageType['pjpeg']['label']='jpg';
$varImageType['pjpeg']['extension']='.jpg';
$varImageType['pjpeg']['image_from']='imagejpeg';
$varImageType['pjpeg']['type']=$varImageFormat['raster'];
$varImageType['jpeg']['value']='image/jpeg';
$varImageType['jpeg']['label']='jpg';
$varImageType['jpeg']['extension']='.jpg';
$varImageType['jpeg']['image_from']='imagejpeg';
$varImageType['jpeg']['type']=$varImageFormat['raster'];
$varImageType['jpg']['value']='image/jpg';
$varImageType['jpg']['label']='jpg';
$varImageType['jpg']['extension']='.jpg';
$varImageType['jpg']['image_from']='imagejpeg';
$varImageType['jpg']['type']=$varImageFormat['raster'];
$varImageType['png']['value']='image/png';
$varImageType['png']['label']='png';
$varImageType['png']['extension']='.png';
$varImageType['png']['image_from']='imagepng';
$varImageType['png']['type']=$varImageFormat['raster'];
$varImageType['svg']['value']='image/svg+xml';
$varImageType['svg']['label']='svg';
$varImageType['svg']['extension']='.svg';
$varImageType['svg']['type']=$varImageFormat['vector'];

$varEmailSecure=array();
$varEmailSecure['ssl']['value']=1;
$varEmailSecure['ssl']['label']='ssl';
$varEmailSecure['tls']['value']=2;
$varEmailSecure['tls']['label']='tls';

$varYesNo=array();
$varYesNo['yes']['value']=1;
$varYesNo['yes']['label']=$label['title_yes'];
$varYesNo['no']['value']=2;
$varYesNo['no']['label']=$label['title_no'];

$varRiskType=array();
$varRiskType['lead_quota']['value']=1;
$varRiskType['lead_quota']['label']=$label['title_lead_quota'];
$varRiskType['acquisition_quota']['value']=2;
$varRiskType['acquisition_quota']['label']=$label['title_acquisition_quota'];
$varRiskType['percent_not_processed']['value']=3;
$varRiskType['percent_not_processed']['label']=$label['title_percent_not_processed'];
$varRiskType['take_profit']['value']=4;
$varRiskType['take_profit']['label']=$label['title_take_profit'];
$varRiskType['stop_loss']['value']=5;
$varRiskType['stop_loss']['label']=$label['title_stop_loss'];

$varRiskCycle=array();
$varRiskCycle['from_now']['value']=1;
$varRiskCycle['from_now']['label']=$label['title_from_now'];
$varRiskCycle['hourly']['value']=2;
$varRiskCycle['hourly']['label']=$label['title_hourly'];
$varRiskCycle['daily']['value']=3;
$varRiskCycle['daily']['label']=$label['title_daily'];
$varRiskCycle['weekly']['value']=4;
$varRiskCycle['weekly']['label']=$label['title_weekly'];
$varRiskCycle['monthly']['value']=5;
$varRiskCycle['monthly']['label']=$label['title_monthly'];
$varRiskCycle['annually']['value']=6;
$varRiskCycle['annually']['label']=$label['title_annually'];

$varLegalType = array();
$varLegalType['login']['value'] = 1;
$varLegalType['login']['label'] = $label['title_on_login'];
$varLegalType['campaign_section']['value'] = 2;
$varLegalType['campaign_section']['label'] = $label['title_campaign_section'] ;

$varLegalContentType = array();
$varLegalContentType['free_text']['value'] = 1;
$varLegalContentType['free_text']['label'] = $label['title_free_text'];

$varLegalCycle=array();
$varLegalCycle['from_now']['value']=1;
$varLegalCycle['from_now']['label']=$label['title_from_now'];
$varLegalCycle['daily']['value']=3;
$varLegalCycle['daily']['label']=$label['title_daily'];
$varLegalCycle['weekly']['value']=4;
$varLegalCycle['weekly']['label']=$label['title_weekly'];
$varLegalCycle['monthly']['value']=5;
$varLegalCycle['monthly']['label']=$label['title_monthly'];
$varLegalCycle['annually']['value']=6;
$varLegalCycle['annually']['label']=$label['title_annually'];

$varROIType=array();
$varROIType['cumulative']['value']=1;
$varROIType['cumulative']['label']=$label['title_cumulative'];
$varROIType['total']['value']=2;
$varROIType['total']['label']=$label['title_total'];


$varTradingAccountType=array();
$varTradingAccountType['live_account']['value']=1;
$varTradingAccountType['live_account']['label']=$label['title_live_account'];
$varTradingAccountType['demo_account']['value']=2;
$varTradingAccountType['demo_account']['label']=$label['title_demo_account'];

$varLeadPush=array();
$varLeadPush['push']['value']=1;
$varLeadPush['push']['label']=$label['title_push_to_api'];
$varLeadPush['dont_push']['value']=2;
$varLeadPush['dont_push']['label']=$label['title_dont_push_to_api'];

$varWhitelist=array();
$varWhitelist['whitelist']['value']=1;
$varWhitelist['whitelist']['label']=$label['title_whitelist'];
$varWhitelist['blacklist']['value']=2;
$varWhitelist['blacklist']['label']=$label['title_blacklist'];
?>