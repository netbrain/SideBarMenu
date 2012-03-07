<?php

class SideBarMenuHooks
{

    public static function init(&$parser){
        $parser->setHook('sidebarmenu','SideBarMenuHooks::renderFromTag');
        return true;
    }

    public static function renderFromTag( $input, array $args, Parser $parser, PPFrame $frame ){
        $parser->getOutput()->addModules('ext.sidebarmenu.core');
        try{
            $menuHTML = '<div class="sidebar-menu-container">';
            $menuHTML .= MenuParser::getMenuTree($input)->toHTML();
            $menuHTML .= '</div>';
            return $parser->recursiveTagParse($menuHTML,$frame);
        }catch(Exception $x){
            wfDebug("An error occured during parsing of: '$input' caught exception: $x");
            return "FATAL ERROR: Could not parse the following input:</br><pre>$input</pre>";
        }
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

    public static function javascriptConfigVars(&$vars){
        global $wgSideBarMenuConfigShowHTML,$wgSideBarMenuConfigHideHTML;
        $vars['wgSideBarMenuConfigShowHTML'] = $wgSideBarMenuConfigShowHTML;
        $vars['wgSideBarMenuConfigHideHTML'] = $wgSideBarMenuConfigHideHTML;
        return true;
    }

}
