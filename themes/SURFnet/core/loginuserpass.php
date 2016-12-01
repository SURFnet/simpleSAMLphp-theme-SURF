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
	<title><?php
if(array_key_exists('header', $this->data)) {
        echo $this->data['header'];
} else {
        echo 'simpleSAMLphp';
}
?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo SimpleSAML_Module::getModuleURL('themeSURFnet/style.css'); ?>" />
  <link rel="stylesheet" media="screen and (max-width: 370px)" href="<?php echo SimpleSAML_Module::getModuleURL('themeSURFnet/style_320.css'); ?>" />
	<link rel="stylesheet" media="screen and (max-device-width: 480px), handheld" href="<?php echo SimpleSAML_Module::getModuleURL('themeSURFnet/style_480.css'); ?>" />
	
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
			<img id="logo" src="<?php echo SimpleSAML_Module::getModuleURL('themeSURFnet/logo.png'); ?>" alt="" /> <!-- DIT IS HET LOGO -->
			<h1 class="mainTitle"></h1>				        <!-- HIER KAN EEN TITEL -->
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
			<!-- LOGIN VELD MET BIJBEHOREN -->
			<div class="item">
				<h1><?php echo $this->t('{login:user_pass_header}'); ?></h1>
				<p class="info"><?php echo $this->t('{login:user_pass_text}'); ?></p>

<?php
if ($this->data['errorcode'] !== NULL) {
?>

				<p class="error"><?php echo $this->t('{errors:descr_' . $this->data['errorcode'] . '}'); ?></p> <!-- ERRORHANDLER BIJ HET INLOGGEN -->

<?php
}
?>				
				<form id="login" method="POST" action="?" name="f">
					<label for="username"><?php echo $this->t('{login:username}'); ?></label> <!-- <span class="example">(bv. 123456@catherijne.nl)</span> -->
					<input type="text" name="username" id="username" value="<?php echo htmlspecialchars($this->data['username']); ?>" autocomplete= "off" />
					<label for="password"><?php echo $this->t('{login:password}'); ?></label>
					<input type="password" name="password" id="password" autocomplete= "off" />
					<!-- <a href="#" class="recover">Wachtwoord vergeten?</a> -->
					<input onclick="this.value='Processing...';this.disabled=true;this.form.submit();return true;" type="submit" value="<?php echo $this->t('{login:login_button}'); ?>" />

<?php
foreach ($this->data['stateparams'] as $name => $value) {
	echo('<input type="hidden" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '" />');
}
?>

				</form>
				
			</div>
			<!-- EINDE LOGIN VELD MET BIJBEHOREN -->
			
			<!-- LIJST MET TIPS -->
			<div class="subitem">

			  <div class="createIndex">
                <h2><?php echo $this->t('{login:help_header}');?></h2>
                <p><?php echo $this->t('{login:help_text}');?></p>
<!--
       		    <ul>
					<h2>Tips:</h2>
					<li><b>Sluit uw browser af om misbruik te voorkomen.</b> Uw inlog blijft behouden voor alle websites en applicaties die ervan gebruikmaken zolang u uw browser niet afsluit.</li>
					<li>Controleer altijd voorafgaand aan het inloggen de URL van deze pagina. Deze moet beginnen met <b>https://federatie.c-college.nl</b></li>
					<li>Heeft uw aanhoudende problemen met inloggen? Neem dan contact opnemen met de servicedesk: e-mail <a href="mailto: servicedesk@c-college.nl">servicedesk@c-college.nl</a>, telefoon 088-4699070</li>
				</ul>
-->
			 </div>
			</div>

			<!-- EINDE LIJST MET TIPS -->
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
