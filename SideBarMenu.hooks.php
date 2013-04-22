<?php

class SideBarMenuHooks {

	public static function init(Parser &$parser) {
		$parser->setHook('sidebarmenu', 'SideBarMenuHooks::renderFromTag');
		return true;
	}

	public static function renderFromTag($input, array $args, Parser $parser, PPFrame $frame) {
		$parser->getOutput()->addModules('ext.sidebarmenu.core');

		//default settings
		$config = self::getTagConfig($args);

		$output = '<div class="sidebar-menu-container'.(is_null($config[SBM_CLASS])? '' : ' '.$config[SBM_CLASS]).'"'.(is_null($config[SBM_STYLE])? '' : ' style="'.$config[SBM_STYLE].'"').'>';
		try {
			$menuParser = new MenuParser($config);
			$menuHTML = $menuParser->getMenuTree($input)->toHTML();
			$output .= $parser->recursiveTagParse($menuHTML, $frame);
		} catch (Exception $x) {
			wfDebug("An error occured during parsing of: '$input' caught exception: $x");
			return wfMessage('sidebarmenu-parser-input-error', $x->getMessage())->text();
		}
		if ($config[SBM_EDIT_LINK]) {
			$output .= Linker::link($frame->getTitle(), wfMessage('sidebarmenu-edit')->escaped(), array('title' => wfMessage('sidebarmenu-edit')->escaped(), 'class' => 'sidebar-menu-edit-link'), array('action' => 'edit'));
		}
		$output .= '</div>';

		$jsOutput = self::getJSConfig($config);

		return array($jsOutput . $output, 'noparse' => true, 'isHTML' => true);
	}

	public static function registerUnitTests(&$files) {
		$testDir = dirname(__FILE__) . '/test/';
		$testFiles = scandir($testDir);
		foreach ($testFiles as $testFile) {
			$absoluteFile = $testDir . $testFile;
			if (is_file($absoluteFile)) {
				$files[] = $absoluteFile;
			}
		}
		return true;
	}

	private static function minifyJavascript($js) {
		$js = preg_replace("/[\n\r]/", "", $js); //remove newlines
		$js = preg_replace("/[\s]{2,}/", " ", $js); //remove spaces

		return $js;
	}

	private static function getJSConfig($config) {
		//javascript config output
		$jsOutput = 'var sidebarmenu = '.json_encode($config);
		$jsOutput = Html::inlineScript($jsOutput);
		//minify js to prevent <p> tags to be rendered
		$jsOutput = self::minifyJavascript($jsOutput);
		return $jsOutput;
	}

	private static function getTagConfig($args) {
		global $wgSideBarMenuConfig;
		$config[SBM_EXPANDED] = array_key_exists(SBM_EXPANDED, $args) ? filter_var($args[SBM_EXPANDED], FILTER_VALIDATE_BOOLEAN) : $wgSideBarMenuConfig[SBM_EXPANDED];
		$config[SBM_CONTROLS_SHOW] = array_key_exists(SBM_CONTROLS_SHOW, $args) ? $args[SBM_CONTROLS_SHOW] : (isset($wgSideBarMenuConfig[SBM_CONTROLS_SHOW]) ? $wgSideBarMenuConfig[SBM_CONTROLS_SHOW] : '[' . wfMessage('showtoc')->escaped() . ']');
		$config[SBM_CONTROLS_HIDE] = array_key_exists(SBM_CONTROLS_HIDE, $args) ? $args[SBM_CONTROLS_HIDE] : (isset($wgSideBarMenuConfig[SBM_CONTROLS_HIDE]) ? $wgSideBarMenuConfig[SBM_CONTROLS_HIDE] : '[' . wfMessage('hidetoc')->escaped() . ']');
		$config[SBM_JS_ANIMATE] =  array_key_exists(SBM_JS_ANIMATE, $args) ? filter_var($args[SBM_JS_ANIMATE], FILTER_VALIDATE_BOOLEAN) : $wgSideBarMenuConfig[SBM_JS_ANIMATE];
		$config[SBM_EDIT_LINK] = array_key_exists(SBM_EDIT_LINK, $args) ? filter_var($args[SBM_EDIT_LINK], FILTER_VALIDATE_BOOLEAN) : $wgSideBarMenuConfig[SBM_EDIT_LINK];
		$config[SBM_CLASS] =  array_key_exists(SBM_CLASS, $args) ? $args[SBM_CLASS] : null;
		$config[SBM_STYLE] =  array_key_exists(SBM_STYLE, $args) ? $args[SBM_STYLE] : null;
		$config[SBM_MINIMIZED] = array_key_exists(SBM_MINIMIZED, $args) ? filter_var($args[SBM_MINIMIZED], FILTER_VALIDATE_BOOLEAN) : $wgSideBarMenuConfig[SBM_MINIMIZED];
		return $config;
	}
}
