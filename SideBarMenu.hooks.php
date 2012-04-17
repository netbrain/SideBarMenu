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

		$output = '<div class="sidebar-menu-container">';
		try {
			$menuParser = new MenuParser($config[SBM_EXPANDED]);
			$output .= $parser->recursiveTagParse($menuParser->getMenuTree($input)->toHTML(), $frame);
		} catch (Exception $x) {
			wfDebug("An error occured during parsing of: '$input' caught exception: $x");
			return wfMsg('sidebarmenu-parser-input-error', $x->getMessage());
		}
		if ($config[SBM_EDIT_LINK]) {
			$output .= Linker::link($frame->getTitle(), wfMsg('sidebarmenu-edit'), array('title' => wfMsg('sidebarmenu-edit'),'class' => 'sidebar-menu-edit-link'), array('action' => 'edit'));
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

	public static function registerMagicWords(&$magicWords, $langCode) {
		$magicWords['sidebarmenu'] = array(0, 'sidebarmenu');
		return true;
	}

	private static function minifyJavascript($js) {
		$js = preg_replace("/[\n\r]/", "", $js); //remove newlines
		$js = preg_replace("/[\s]{2,}/", " ", $js); //remove spaces

		return $js;
	}

	private static function getAsJSEncodedString($s) {
		return "'$s'";
	}

	private static function getJSConfig($config) {
		//javascript config output
		$jsOutput = Html::inlineScript("
            var sidebarmenu = {
                config: {
                    controls: {
                        show: " . self::getAsJSEncodedString($config[SBM_CONTROLS_SHOW]) . ",
                        hide: " . self::getAsJSEncodedString($config[SBM_CONTROLS_HIDE]) . "
                    },
                    js: {
                        animate: " . (filter_var($config[SBM_JS_ANIMATE], FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false') . "
                    }
                }
            };
        ");
		//minify js to prevent <p> tags to be rendered
		return self::minifyJavascript($jsOutput);
	}

	private static function getTagConfig($args) {
		global $wgSideBarMenuConfig;
		$config[SBM_EXPANDED] = array_key_exists(SBM_EXPANDED, $args) ? filter_var($args[SBM_EXPANDED], FILTER_VALIDATE_BOOLEAN) : $wgSideBarMenuConfig[SBM_EXPANDED];
		$config[SBM_CONTROLS_SHOW] = array_key_exists(SBM_CONTROLS_SHOW, $args) ? $args[SBM_CONTROLS_SHOW] : (isset($wgSideBarMenuConfig[SBM_CONTROLS_SHOW]) ? $wgSideBarMenuConfig[SBM_CONTROLS_SHOW] : '[' . wfMsg('showtoc') . ']');
		$config[SBM_CONTROLS_HIDE] = array_key_exists(SBM_CONTROLS_HIDE, $args) ? $args[SBM_CONTROLS_HIDE] : (isset($wgSideBarMenuConfig[SBM_CONTROLS_HIDE]) ? $wgSideBarMenuConfig[SBM_CONTROLS_HIDE] : '[' . wfMsg('hidetoc') . ']');
		$config[SBM_JS_ANIMATE] = array_key_exists(SBM_JS_ANIMATE, $args) ? $args[SBM_JS_ANIMATE] : $wgSideBarMenuConfig[SBM_JS_ANIMATE];
		$config[SBM_EDIT_LINK] = array_key_exists(SBM_EDIT_LINK, $args) ? filter_var($args[SBM_EDIT_LINK], FILTER_VALIDATE_BOOLEAN) : $wgSideBarMenuConfig[SBM_EDIT_LINK];
		return $config;
	}
}
