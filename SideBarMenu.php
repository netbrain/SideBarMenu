<?php

if (!defined('MEDIAWIKI')) {
	die('Not an entry point.');
}

if (!defined('ParamProcessor_VERSION')) {
	die('SideBarMenu requires extension ParamProcessor');
}

if ( is_readable( __DIR__ . '/vendor/autoload.php' ) ) {
	include_once( __DIR__ . '/vendor/autoload.php' );
}

//SideBarMenu constants
const SBM_EXPANDED = 'expanded';
const SBM_CONTROLS_SHOW = 'show';
const SBM_CONTROLS_HIDE = 'hide';
const SBM_JS_ANIMATE = 'animate';
const SBM_EDIT_LINK = 'editlink';
const SBM_CLASS = 'class';
const SBM_STYLE = 'style';
const SBM_MINIMIZED = 'minimized';

$wgSideBarMenuConstants = array(
	SBM_EXPANDED,
	SBM_CONTROLS_SHOW,
	SBM_CONTROLS_HIDE,
	SBM_JS_ANIMATE,
	SBM_EDIT_LINK,
	SBM_CLASS,
	SBM_STYLE,
	SBM_MINIMIZED,
);

/*spl_autoload_register( function ( $className ) {
	$className = ltrim( $className, '\\' );
	$fileName = '';
	$namespace = '';

	if ( $lastNsPos = strripos( $className, '\\') ) {
		$namespace = substr( $className, 0, $lastNsPos );
		$className = substr( $className, $lastNsPos + 1 );
		$fileName  = str_replace( '\\', '/', $namespace ) . '/';
	}

	$fileName .= str_replace( '_', '/', $className ) . '.php';

	$namespaceSegments = explode( '\\', $namespace );

	if ( $namespaceSegments[0] === 'SideBarMenu' ) {
		$fileName = substr($fileName,strlen($namespaceSegments[0]));
		if ( count( $namespaceSegments ) === 1 || $namespaceSegments[1] !== 'Tests' ) {
			require_once (__DIR__ . '/src/' . $fileName);
		}
	}
} );*/

//call_user_func( function() {
	global $wgExtensionCredits, $wgExtensionMessagesFiles, $wgExtensionFunctions, $wgResourceModules;

	$wgExtensionCredits['parserhook'][] = array(
		'path' => __FILE__,
		'name' => 'SideBarMenu',
		'version' => '0.2',
		'author' => 'Kim Eik',
		'url' => 'https://www.mediawiki.org/wiki/Extension:SideBarMenu',
		'descriptionmsg' => 'sidebarmenu-desc'
	);

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

	$wgExtensionFunctions[] = function() {
		global $wgHooks;

		// Specify the function that will initialize the parser function.
		$wgHooks['ParserFirstCallInit'][] = 'SideBarMenu\Hooks::init';

		// Sepcify phpunit tests
		$wgHooks['UnitTestsList'][]	= 'SideBarMenu\Hooks::registerUnitTests';
	};

//} );

require_once(__DIR__.'/SideBarMenu.settings.php');