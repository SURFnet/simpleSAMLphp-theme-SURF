<?php
/**
 * Do not allow to frame simpleSAMLphp pages from another location.
 * This prevents clickjacking attacks in modern browsers.
 *
 * If you don't want any framing at all you can even change this to
 * 'DENY', or comment it out if you actually want to allow foreign
 * sites to put simpleSAMLphp in a frame. The latter is however
 * probably not a good security practice.
 */
header('X-Frame-Options: SAMEORIGIN');
?>

<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<meta name="HandheldFriendly" content="true" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="robots" content="noindex, nofollow" />
	<meta name="googlebot" content="noarchive, nofollow" />
	
	<title><?php
if(array_key_exists('header', $this->data)) {
        echo $this->data['header'];
} else {
        echo 'simpleSAMLphp';
}
?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo SimpleSAML_Module::getModuleURL('themesurf/assets/style.css'); ?>" />
	<link rel="stylesheet" media="screen and (max-width: 370px)" href="<?php echo SimpleSAML_Module::getModuleURL('themesurf/assets/style_320.css'); ?>" />
	<link rel="stylesheet" media="screen and (max-device-width: 480px), handheld" href="<?php echo SimpleSAML_Module::getModuleURL('themesurf/assets/style_480.css'); ?>" />

</head>

<body class="storing">
	<!-- DE WRAPPER CENTREERT DE CONTENT VAN DE WEBSITE -->
	<div id="wrapper">
	
		<!-- HEADER MET LOGO, EVENTUELE TITEL EN TAAL TOGGLE -->
		<div id="header">
			<img id="logo" src="<?php echo SimpleSAML_Module::getModuleURL('themesurf/assets/logo.svg'); ?>" alt="" />
			<h1 class="mainTitle"></h1>
			<ul class="langSelect">

<?php 
$includeLanguageBar = FALSE;
if (!empty($_POST)) 
	$includeLanguageBar = FALSE;
if (isset($this->data['hideLanguageBar']) && $this->data['hideLanguageBar'] === TRUE) 
	$includeLanguageBar = FALSE;

if ($includeLanguageBar) {
	$languages = $this->getLanguageList();
	$langnames = array();
	foreach($languages as $k => $v) {
		$langnames[$k] = strtoupper($k);
	}	
	$textarray = array();
	foreach ($languages AS $lang => $current) {
		$lang = strtolower($lang);
		if ($current) {
			$textarray[] = '<li class="active">' . $langnames[$lang] . "</li>";
		} else {
			$textarray[] = '<li><a href="' . htmlspecialchars(SimpleSAML_Utilities::addURLparameter(SimpleSAML_Utilities::selfURL(), array('language' => $lang))) . '">' .
				$langnames[$lang] . '</a></li>';
		}
	}
	echo join($textarray);
}
?>

<!--
				<li class="active"><a href="#">NL</a>
				<li><a href="#">EN</a>
				<li><a href="#">DE</a>
-->
			</ul>
		</div>
		<!-- EINDE HEADER MET LOGO, EVENTUELE TITEL EN TAAL TOGGLE -->
		
		<div id="content">
			<!-- CONTENT MET WITTE ACHTERGROND -->
			<div class="item">


<h1>Error while performing second factor authentication</h1>

<?php
if (
    $this->data['status'] === "urn:oasis:names:tc:SAML:2.0:status:Responder" &&
    $this->data['subStatus'] === "urn:oasis:names:tc:SAML:2.0:status:AuthnFailed" ):
?>

<p>Authentication not successful:<br/><br/>
<strong>
    <?= htmlspecialchars($this->data['statusMessage']) ?>
</strong></p>

<?php
elseif (
    $this->data['status'] === "urn:oasis:names:tc:SAML:2.0:status:Responder" &&
    $this->data['subStatus'] === "urn:oasis:names:tc:SAML:2.0:status:NoAuthnContext" ):
?>

<p>You could not be authenticated at the requested level.<br/>
<?=htmlspecialchars($this->data['statusMessage'])?></p>

<p>Do you have a token registered with the required level?<br/><br/>
Please go to the <a href="<?=$this->data['selfserviceUrl']?>">Selfservice Registration Portal</a>
to review or enroll your token.</p>

<?php
else:
?>

<p>Unexpected error occurred while performing second factor authentication.<br/><br/>
<?=htmlspecialchars($this->data['status'])?><br/>
<?=htmlspecialchars($this->data['subStatus'])?><br/>
<?=htmlspecialchars($this->data['statusMessage'])?></p>

<p>Please try again or contact your support desk.</p>

<?php
endif;
?>

			</div>	
			<!-- EINDE CONTENT MET WITTE ACHTERGROND -->			
		</div>
		
		<!-- FOOTER -->
<!--
  		<div id="footer">
			<p><a href="#">Help</a>  <a href="#"> Privacy Policy</a>  &copy; 2012 Catharijne college</p>
		</div>
-->
		<!-- EINDE FOOTER -->
	</div>
</body>
</html>
