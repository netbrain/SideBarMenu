<?php

class SideBarMenuHooks
{
    public static function init(Parser &$parser){
        $parser->setHook('sidebarmenu','SideBarMenuHooks::renderFromTag');
        return true;
    }

    public static function renderFromTag( $input, array $args, Parser $parser, PPFrame $frame ){
        $parser->getOutput()->addModules('ext.sidebarmenu.core');

        $output = '<div class="sidebar-menu-container">';
        try{
            $output .= MenuParser::getMenuTree($input)->toHTML();
        }catch(Exception $x){
            wfDebug("An error occured during parsing of: '$input' caught exception: $x");
            return wfMsg('parser.input-error',$x->getMessage());
        }
        $output .= '</div>';

        $jsOutput = self::getJSConfig($args);

        return array( $jsOutput.$parser->recursiveTagParse($output,$frame), 'noparse' => true, 'isHTML' => true );
    }

    public static function registerUnitTests( &$files ) {
        $testDir = dirname( __FILE__ ) . '/test/';
        $testFiles = scandir($testDir);
        foreach($testFiles as $testFile){
            $absoluteFile = $testDir . $testFile;
            if(is_file($absoluteFile)){
                $files[] = $absoluteFile;
            }
        }
        return true;
    }

    public static function registerMagicWords(&$magicWords, $langCode){
        $magicWords['sidebarmenu'] = array(0,'sidebarmenu');
        return true;
    }

    private static function minifyJavascript(&$js)
    {
        $js = preg_replace("/[\n\r]/", "", $js); //remove newlines
        $js = preg_replace("/[\s]{2,}/", " ", $js); //remove spaces
    }

    private static function getAsJSEncodedString($s)
    {
        return "'" . $s . "'";
    }

    private static function getJSConfig(&$args){
        global $wgSideBarMenuConfig;
        //default settings
        $defaults['controls.show'] = isset($wgSideBarMenuConfig['controls.show']) ? $wgSideBarMenuConfig['controls.show'] : wfMsg('controls.show');
        $defaults['controls.hide'] = isset($wgSideBarMenuConfig['controls.hide']) ? $wgSideBarMenuConfig['controls.hide'] : wfMsg('controls.hide');
        $defaults['js.animate'] = $wgSideBarMenuConfig['js.animate'];

        //javascript config output
        $jsOutput = Html::inlineScript("
            var sidebarmenu = {
                config: {
                    controls: {
                        show: " . (array_key_exists('controls.show', $args) ? self::getAsJSEncodedString($args['controls.show']) : self::getAsJSEncodedString($defaults['controls.show'])) . ",
                        hide: " . (array_key_exists('controls.hide', $args) ? self::getAsJSEncodedString($args['controls.hide']) : self::getAsJSEncodedString($defaults['controls.hide'])) . "
                    },
                    js: {
                        animate: " . (array_key_exists('js.animate', $args) ? is_bool($args['js.animate']) ? 'true' : 'false' : $defaults['js.animate']) . "
                    }
                }
            };
        ");
        //minify js to prevent <p> tags to be rendered
        self::minifyJavascript($jsOutput);
        return $jsOutput;
    }
}
