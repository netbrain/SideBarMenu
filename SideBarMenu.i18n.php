<?php
/**
 * Internationalisation file for extension SideBarMenu
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 *  @author Kim Eik
 */
$messages['en'] = array(
    'sidebarmenu-desc'                              => 'A simple sidebar menu parser which creates collapsable/expandable menus and sub-menus',
    'sidebarmenu-parser-input-error'                => 'Parser returned with error: $1',
    'sidebarmenu-parser-syntax-error'               => 'Could not parse "$1", make sure the syntax is correct.',
    'sidebarmenu-js-init-error'                     => 'Failed loading JavaScript resources.',
    'sidebarmenu-parser-menuitem-expanded-null'     => '"parser.menuitem.expanded" should be true or false, instead it is null.'
);

/** Message documentation (Message documentation)
 * @author Kim Eik
 */
$messages['qqq'] = array(
	'sidebarmenu-desc' => '{{desc}}',
	'sidebarmenu-parser-input-error' => '$1 is the error message returned',
	'sidebarmenu-parser-syntax-error' => '$1 is the line which failed to be parsed',
	'sidebarmenu-js-init-error' => 'General error message',
	'sidebarmenu-parser-menuitem-expanded-null' => 'parser.menuitem.expanded is a configuration property',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'sidebarmenu-desc' => 'Ergänzt das Tag <code>&lt;sidebarmenu&gt;</code> zum Einbinden ausklappbarer Menüs und Untermenüs in die Seitenleiste',
	'sidebarmenu-parser-input-error' => 'Der Parser hat den folgenden Fehler ausgegeben: $1',
	'sidebarmenu-parser-syntax-error' => '„$1“ konnte nicht verarbeitet werden. Bitte sicherstellen, dass die Syntax richtig ist.',
	'sidebarmenu-js-init-error' => 'Das Laden des JavaScripts ist gescheitert.',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Der Parameter „<code>parser.menuitem.expanded</code>“ sollte mit „true“ oder „false“ festgelegt sein. Stattdessen wurde nichts festgelegt.',
);
