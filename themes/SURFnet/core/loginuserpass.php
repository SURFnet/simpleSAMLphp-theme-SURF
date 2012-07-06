<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<meta name="HandheldFriendly" content="true" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title><?php
if(array_key_exists('header', $this->data)) {
        echo $this->data['header'];
} else {
        echo 'simpleSAMLphp';
}
?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo SimpleSAML_Module::getModuleURL('themeSURFnet/style.css'); ?>" />
	<link rel="stylesheet" media="all and (orientation:landscape)" href="<?php echo SimpleSAML_Module::getModuleURL('themeSURFnet/style_480.css'); ?>" />	
	<link rel="stylesheet" media="all and (orientation:portrait)" href="<?php echo SimpleSAML_Module::getModuleURL('themeSURFnet/style_320.css'); ?>" />
	<link rel="stylesheet" media="screen and (min-device-width: 680px)" href="<?php echo SimpleSAML_Module::getModuleURL('themeSURFnet/style_desktop.css'); ?>" />
	
	<script type="text/javascript">
	function initiate(){
		document.getElementById('username').focus();
	}
	</script>
	
</head>

<body class="index" onload="initiate()">
	<!-- DE WRAPPER CENTREERT DE CONTENT VAN DE WEBSITE -->
	<div id="wrapper">
	
		<!-- HEADER MET LOGO, EVENTUELE TITEL EN TAAL TOGGLE -->
		<div id="header">
			<img id="logo" src="<?php echo SimpleSAML_Module::getModuleURL('themeSURFnet/surfnet.png'); ?>" /> <!-- DIT IS HET LOGO -->
			<h1 class="mainTitle"></h1>				  <!-- HIER KAN EEN TITEL -->

<?php 
$includeLanguageBar = TRUE;
if (!empty($_POST)) 
	$includeLanguageBar = FALSE;
if (isset($this->data['hideLanguageBar']) && $this->data['hideLanguageBar'] === TRUE) 
	$includeLanguageBar = FALSE;

if ($includeLanguageBar) {
	echo '<ul class="langSelect">';
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
	echo '</ul>';
}
?>

        </div>
		<!-- EINDE HEADER MET LOGO, EVENTUELE TITEL EN TAAL TOGGLE -->
		
		<div id="content">
			<!-- LOGIN VELD MET BIJBEHOREN -->
			<div class="item">
				<h1><?php echo $this->t('{login:user_pass_header}'); ?></h1>
				<p class="info"><?php echo $this->t('{login:user_pass_text}'); ?></p>

<?php
if ($this->data['errorcode'] !== NULL) {
?>
<p class="error">
<!-- <?php echo $this->t('{login:error_header}'); ?> -->
<!-- <?php echo $this->t('{errors:title_' . $this->data['errorcode'] . '}'); ?> -->
<?php echo $this->t('{errors:descr_' . $this->data['errorcode'] . '}'); ?>
</p>
<?php
}
?>
			
				<form id="login" method="POST" action="?" name="f">


					<label for="username"><?php echo $this->t('{login:username}'); ?></label>
					<input type="text" name="username" id="username" value="<?php echo htmlspecialchars($this->data['username']); ?>" autocompletion= "off" />
					<label for="password"><?php echo $this->t('{login:password}'); ?></label>
					<input type="password" name="password" id="password" autocompletion= "off" />
					<input type="submit" name="submit" id="submit" value="<?php echo $this->t('{login:login_button}'); ?>" />

<?php
foreach ($this->data['stateparams'] as $name => $value) {
	echo('<input type="hidden" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '" />');
}
?>

				</form>
				
			</div>
			<!-- EINE LOGIN VELD MET BIJBEHOREN -->
			
			<!-- LIJST MET TIPS -->
			<div class="subitem">
			<div class="createIndex">
				<!-- <ul>
					<h2>Tips:</h2>
					<li>U inlog blijft behouden voor alle websites en applicaties die ervan gebruikmaken zolang u uw browser niet afsluit. <b>Vergeet uw browser niet af te sluiten om misbruik te voorkomen.</b></li>
					<li>Controleer altijd voorafgaand aan het inlog de URL van deze pagina, deze moet beginnen met https://federatie.c-college.nl</li>
					<li>
						Voor problemen bij het inloggen kun je contact opnemen met de servicedesk, via <a href="https://servicedesk.c-college.nl" target="_blank">https://servicedesk.c-college.nl</a>, telefoon 088-4699070 
						of email <a href="mailto: servicedesk@c-college.nl">servicedesk@c-college.nl</a>
					</li>
				</ul> -->
			</div>
			</div>
			<!-- EINDE LIJST MET TIPS -->
		</div>
		
		<!-- FOOTER -->
<!--		<div id="footer">
			<a href="#">Help</a>  <a href="#"> Privacy Policy</a>  Copyright © 2012 Catharijne college
		</div> -->
		<!-- EINDE FOOTER -->
	</div>
</body>
</html>
