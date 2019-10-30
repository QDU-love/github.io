<?php
	// Start session.
	session_start();
	
	// Set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
	
	if ( ! isset($_SESSION['formMessage'])) {
		$_SESSION['formMessage'] = 'Fill in the form below to send me an email.';	
	}
	
	if ( ! isset($_SESSION['formFooter'])) {
		$_SESSION['formFooter'] = ' ';
	}
	
	if ( ! isset($_SESSION['form'])) {
		$_SESSION['form'] = array();
	}
	
	function check($field, $type = '', $value = '') {
		$string = "";
		if (isset($_SESSION['form'][$field])) {
			switch($type) {
				case 'checkbox':
					$string = 'checked="checked"';
					break;
				case 'radio':
					if($_SESSION['form'][$field] === $value) {
						$string = 'checked="checked"';
					}
					break;
				case 'select':
					if($_SESSION['form'][$field] === $value) {
						$string = 'selected="selected"';
					}
					break;
				default:
					$string = $_SESSION['form'][$field];
			}
		}
		return $string;
	}
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="" content="" />
		<meta name="robots" content="index, follow" />
		<meta name="generator" content="RapidWeaver" />
		
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="Untitled Page | Zhang Bo|张博">
	<meta name="twitter:image" content="https://bill178.github.io//resources/engineer.png">
	<meta name="twitter:url" content="http://bill178.github.io/contact-form/index.php">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Zhang Bo|张博">
	<meta property="og:title" content="Untitled Page | Zhang Bo|张博">
	<meta property="og:image" content="https://bill178.github.io//resources/engineer.png">
	<meta property="og:url" content="http://bill178.github.io/contact-form/index.php">
	
	<title>Untitled Page | Zhang Bo|张博</title>
	<link rel="stylesheet" type="text/css" media="all" href="../rw_common/themes/Engineer/consolidated.css?rwcache=593708541" />
		
	    
</head>

<!-- This page was created with RapidWeaver from Realmac Software. http://www.realmacsoftware.com -->

<body>
	<div class="hero" id="hero">
		<nav class="navbar navbar-expand-lg">
			<a class="navbar-brand" href="http://bill178.github.io/"><img src="../rw_common/images/engineer.png" width="918" height="178" alt="Zhang Bo|张博"/> <span class="navbar-title">Zhang Bo|张博</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto"><li class="nav-item"><a href="../" rel="" class="nav-link">Home</a></li><li class="nav-item"><a href="../blog/" rel="" class="nav-link">Blog</a></li><li class="nav-item"><a href="../photos/" rel="" class="nav-link">Gallery</a></li><li class="nav-item active"><a href="./" rel="" class="nav-link">Untitled Page</a></li><li class="nav-item"><a href="../markdown/" rel="" class="nav-link">Untitled Page 2</a></li></ul>
			</div>
		</nav>

		<div class="hero-content container d-flex align-items-center" id="hero">
			<div class="">
				<h1 class="hero-title">Zhang Bo|张博</h1>
				<p class="hero-slogan display-4"></p>
			</div>
			<div class="hero-background" title="Zhang Bo|张博"></div>
			<div class="hero-overlay"></div>
		</div>

	</div>

    <div class="content">
        <section class="main" style="position: relative;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 main">
                        
<div class="message-text"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div><br />

<form class="rw-contact-form" action="./files/mailer.php" method="post" enctype="multipart/form-data">
	 <div>
		<label>Your Name</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element0'); ?>" name="form[element0]" size="40"/><br /><br />

		<label>Your Email</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element1'); ?>" name="form[element1]" size="40"/><br /><br />

		<label>Subject</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element2'); ?>" name="form[element2]" size="40"/><br /><br />

		<label>Message</label> *<br />
		<textarea class="form-input-field" name="form[element3]" rows="8" cols="38"><?php echo check('element3'); ?></textarea><br /><br />

		<div style="display: none;">
			<label>Spam Protection: Please don't fill this in:</label>
			<textarea name="comment" rows="1" cols="1"></textarea>
		</div>
		<input type="hidden" name="form_token" value="<?php echo $security_token; ?>" />
		
		<input class="form-input-button" type="submit" name="submitButton" value="Submit" />
	</div>
</form>

<br />
<div class="form-footer"><?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div><br />

<?php unset($_SESSION['form']); ?>

                    </div>

                    <div class="col-sm-12 sidebar">
                        <h2></h2>
                         
                    </div>
                </div>
            </div>
        </section>
    </div>

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 footer-content">
					<ul class="navbar-nav ml-auto"><li class="nav-item"><a href="../" rel="" class="nav-link">Home</a></li><li class="nav-item"><a href="../blog/" rel="" class="nav-link">Blog</a></li><li class="nav-item"><a href="../photos/" rel="" class="nav-link">Gallery</a></li><li class="nav-item active"><a href="./" rel="" class="nav-link">Untitled Page</a></li><li class="nav-item"><a href="../markdown/" rel="" class="nav-link">Untitled Page 2</a></li></ul>
					&copy; 2019 Zhangbo <a href="#" id="rw_email_contact">Contact Me</a><script type="text/javascript">var _rwObsfuscatedHref0 = "mai";var _rwObsfuscatedHref1 = "lto";var _rwObsfuscatedHref2 = ":zb";var _rwObsfuscatedHref3 = "18@";var _rwObsfuscatedHref4 = "tsi";var _rwObsfuscatedHref5 = "ngh";var _rwObsfuscatedHref6 = "ua.";var _rwObsfuscatedHref7 = "org";var _rwObsfuscatedHref8 = ".cn";var _rwObsfuscatedHref = _rwObsfuscatedHref0+_rwObsfuscatedHref1+_rwObsfuscatedHref2+_rwObsfuscatedHref3+_rwObsfuscatedHref4+_rwObsfuscatedHref5+_rwObsfuscatedHref6+_rwObsfuscatedHref7+_rwObsfuscatedHref8; document.getElementById("rw_email_contact").href = _rwObsfuscatedHref;</script>
				</div>
			</div>
		</div>
	</footer>

	<script type="text/javascript" src="../rw_common/themes/Engineer/js/main.js?rwcache=593708541"></script>
</body>

</html>