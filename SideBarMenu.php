<?php

if (!defined('MEDIAWIKI')) {
    die('Not an entry point.');
}

$wgExtensionCredits['parserhook'][] = array(
    'path' => __FILE__,
    'name' => 'SideBarMenu',
    'version' => 0.1,
    'author' => 'Kim Eik',
    'url' => 'https://www.mediawiki.org/wiki/Extension:SideBarMenu',
    'descriptionmsg' => 'A simple sidebar menu parser which creates collapsable/expandable menus and sub-menus.'
);


// Specify the function that will initialize the parser function.
$wgHooks['ParserFirstCallInit'][] = 'init';

// Specify the function that will register the magic words for the parser function.
$wgHooks['LanguageGetMagic'][] = 'registerMagicWords';

// Sepcify phpunit tests
$wgHooks['UnitTestsList'][] = 'registerUnitTests';

//Autoload
$wgMyExtensionIncludes = dirname(__FILE__) . '/includes';
## Special page class
$wgAutoloadClasses['MenuParser'] = $wgMyExtensionIncludes . '/MenuParser.php';
$wgAutoloadClasses['MenuItem'] = $wgMyExtensionIncludes . '/MenuItem.php';


function init(&$parser){
    $parser->setHook('sidebarmenu','renderFromTag');
    return true;
}

function registerMagicWords(&$magicWords, $langCode){
    $magicWords['sidebarmenu'] = array(0,'sidebarmenu');
    return true;
}

function renderFromTag( $input, array $args, Parser $parser, PPFrame $frame ){
    try{
        $menuHTML = MenuParser::getMenuTree($input)->toHTML();
        return $parser->recursiveTagParse($menuHTML,$frame);
    }catch(Exception $x){
        wfDebug("An error occured during parsing of: '$input' caught exception: $x");
        return "FATAL ERROR: Could not parse the following input:</br><pre>$input</pre>";
    }
}

function registerUnitTests( &$files ) {
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
