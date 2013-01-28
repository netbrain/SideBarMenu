<?php

if (!defined('MEDIAWIKI')) {
	die('Not an entry point.');
}

//SideBarMenu constants
const SBM_EXPANDED = 'parser.menuitem.expanded';
const SBM_CONTROLS_SHOW = 'controls.show';
const SBM_CONTROLS_HIDE = 'controls.hide';
const SBM_JS_ANIMATE = 'js.animate';
const SBM_EDIT_LINK = 'editlink';
const SBM_CLASS = 'class';
const SBM_STYLE = 'style';
const SBM_MINIMIZED = 'minimized';

//default settings
$wgSideBarMenuConfig[SBM_CONTROLS_SHOW] = null;
$wgSideBarMenuConfig[SBM_CONTROLS_HIDE] = null;
$wgSideBarMenuConfig[SBM_JS_ANIMATE] = true;
$wgSideBarMenuConfig[SBM_EXPANDED] = true;
$wgSideBarMenuConfig[SBM_EDIT_LINK] = true;
$wgSideBarMenuConfig[SBM_MINIMIZED] = false;


$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,
	'name' => 'SideBarMenu',
	'version' => 0.1,
	'author' => 'Kim Eik',
	'url' => 'https://www.mediawiki.org/wiki/Extension:SideBarMenu',
	'descriptionmsg' => 'sidebarmenu-desc'
);


// Specify the function that will initialize the parser function.
$wgHooks['ParserFirstCallInit'][] = 'SideBarMenuHooks::init';

// Sepcify phpunit tests
$wgHooks['UnitTestsList'][] = 'SideBarMenuHooks::registerUnitTests';

//Autoload hooks
$wgAutoloadClasses['SideBarMenuHooks'] = dirname(__FILE__) . '/SideBarMenu.hooks.php';

//Autoload classes
$wgMyExtensionIncludes = dirname(__FILE__) . '/includes';
## Special page class
$wgAutoloadClasses['MenuParser'] = $wgMyExtensionIncludes . '/MenuParser.php';
$wgAutoloadClasses['MenuItem'] = $wgMyExtensionIncludes . '/MenuItem.php';

//i18n
$wgExtensionMessagesFiles['SideBarMenu'] = dirname(__FILE__) . '/SideBarMenu.i18n.php';

//Resources
$wgResourceModules['ext.sidebarmenu.core'] = array(
	'scripts' => array(
		'js/ext.sidebarmenu.js'
	),
	'styles' => array(
		'css/ext.sidebarmenu.css'
	),
	'dependencies' => array(
		'jquery.ui.core',
		'jquery.effects.core',
	),
	'messages' => array(
		'sidebarmenu-js-init-error'
	),
	'group' => 'ext.sidebarmenu',
	'localBasePath' => dirname(__FILE__),
	'remoteExtPath' => 'SideBarMenu'
);
