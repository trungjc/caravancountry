<?php defined('_JEXEC') or die;JHtml::_('behavior.framework', true);
JPlugin::loadLanguage( 'tpl_SG1' ); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<jdoc:include type="head" />
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/template_css.css" type="text/css" />
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/style_css.css" type="text/css" />
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/editor.css" type="text/css" />
<!-- <link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/bootstrap-responsive.css" type="text/css" /> -->
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/editor-responsive.css" type="text/css" />

	<script language="javascript" type="text/javascript"><!--
	var bversion=navigator.userAgent.toLowerCase();
	if ((bversion.indexOf("firefox") != -1) || (bversion.indexOf("shiretoko") != -1) ){
	document.write("<link rel='stylesheet' href='templates/<?php echo $this->template ?>/css/firefox_css.css' type='text/css' />");
	};
	if ((bversion.indexOf("safari") != -1)){
	document.write("<link rel='stylesheet' href='templates/<?php echo $this->template ?>/css/safari_css.css' type='text/css' />");
	};
	// --></script>
    
	<!--[if gte IE 9]>
	<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/ie9_css.css" type="text/css" />
	<![endif]-->
	<!--[if IE 8]>
	<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/ie8_css.css" type="text/css" />
	<![endif]-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/ie7_css.css" type="text/css" />
	<![endif]-->
	
</head>
<body>

	<div class="menu-responsive">&#9776;</div>
<div id="Top-Container">
	<div id="Background-Container">
		<div id="Top-Background">
		</div>
		<?php if($this->countModules('Top-Title')) : ?>
			<div id="Top-Title">
				<jdoc:include type="modules" name="Top-Title" style="" />
			</div>
		<?php endif; ?>
		<?php if($this->countModules('Top-Banner')) : ?>
			<div id="Container-MenuBanner">
				<?php if($this->countModules('Top-Menu')) : ?>
					<div id="Top-Menu">
						<jdoc:include type="modules" name="Top-Menu" style="" />
					</div>
				<?php endif; ?>
				<?php if($this->countModules('Top-Banner')) : ?>
					<div id="Top-Banner">
						<jdoc:include type="modules" name="Top-Banner" style="" />
					</div>
				<?php endif; ?>
			</div>
		<?php else: ?>
			<?php if($this->countModules('Top-Menu')) : ?>
				<div id="Top-Menu" class="menu">

					<jdoc:include type="modules" name="Top-Menu" style="" />
				</div>
			<?php endif; ?>
		<?php endif; ?>
			<div id="Top-Spacer">
			</div>
		<?php if($this->countModules('Top-Featured')) : ?>
			<div id="Top-Featured">
				<jdoc:include type="modules" name="Top-Featured" style="" />
			</div>
		<?php endif; ?>
	</div>
</div>
<div id="Content-Container">
	<div id="Main-Container">
		<div id="Main-Content">
			<jdoc:include type="message" />
			<jdoc:include type="component" />
		</div>
	</div>
</div>
<div id="Footer-Container">
	<div id="Bottom-Container">
		<?php if($this->countModules('Footer-Bottom')) : ?>
			<div id="Footer-Bottom">
				<jdoc:include type="modules" name="Footer-Bottom" style="" />
			</div>
		<?php endif; ?>
	<div id="Main-Container">
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19318810-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>