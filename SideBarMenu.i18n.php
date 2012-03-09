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

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'sidebarmenu-desc' => 'Просты парсэр для бакавога мэню, які дазваляе ствараць згортваемыя мэню і падмэню',
	'sidebarmenu-parser-input-error' => 'Парсэр павярнуў памылку: $1',
	'sidebarmenu-parser-syntax-error' => 'Не атрымалася разабраць «$1». Запэўніцеся, што сынтэкс карэктны.',
	'sidebarmenu-js-init-error' => 'Не атрымалася загрузіць JavaScript-рэсурсы.',
	'sidebarmenu-parser-menuitem-expanded-null' => '«parser.menuitem.expanded» мусіць павяртаць true ці false, але выстаўлены ў null.',
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

/** Spanish (Español)
 * @author Armando-Martin
 */
$messages['es'] = array(
	'sidebarmenu-desc' => 'Un analizador (parser) de menú lateral simple que crea menús y submenús colapsables y ampliables',
	'sidebarmenu-parser-input-error' => 'El analizador (parser) devolvió el error: $1',
	'sidebarmenu-parser-syntax-error' => 'No se pudo analizar "$1", asegúrese de que la sintaxis es correcta.',
	'sidebarmenu-js-init-error' => 'Error al cargar recursos de JavaScript.',
	'sidebarmenu-parser-menuitem-expanded-null' => '"parser.menuitem.expanded" debe tener el valor "true" o "false", en vez de "null".',
);

/** French (Français)
 * @author Gomoko
 */
$messages['fr'] = array(
	'sidebarmenu-desc' => 'Un analyseur de barre de menu latérale simple qui crée des menus et des sous-menus rétractables/extensibles',
	'sidebarmenu-parser-input-error' => "L'analyseur a renvoyé une erreur: $1",
	'sidebarmenu-parser-syntax-error' => 'Impossible d\'analyser "$1", assurez-vous que la syntaxe est correcte.',
	'sidebarmenu-js-init-error' => 'Échec au chargement des ressources JavaScript.',
	'sidebarmenu-parser-menuitem-expanded-null' => '"parser.menuitem.expanded" doit être true ou false, mais il est null.',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'sidebarmenu-desc' => 'Jednory menijowy parser za bóčnicu, kotryž fałdujomne/rozfałdujomne menije a podmenij twori',
	'sidebarmenu-parser-input-error' => 'Parser je zmylk wróćił: $1',
	'sidebarmenu-parser-syntax-error' => '"$1" njeda so parsować, zawěsćće, zo syntaksa je korektna.',
	'sidebarmenu-js-init-error' => 'Začitowanje JavaScriptowych resursow je so njeporadźiło.',
	'sidebarmenu-parser-menuitem-expanded-null' => '"parser.menuitem.expanded" dyrbjał hódnotu "true" abo "false" měć, Město toho  hódnota je nul.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'sidebarmenu-desc' => 'Un analysator syntactic simple pro le menu del barra lateral que crea menus e submenus plicabile/displicabile',
	'sidebarmenu-parser-input-error' => 'Le analysator syntactic retornava un error: $1',
	'sidebarmenu-parser-syntax-error' => 'Non poteva interpretar "$1". Assecura que le syntaxe es correcte.',
	'sidebarmenu-js-init-error' => 'Le cargamento de ressources JavaScript ha fallite.',
	'sidebarmenu-parser-menuitem-expanded-null' => '"parser.menuitem.expanded" debe esser "true" (ver) o "false" (false), ma illo es "null" (sin valor).',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'sidebarmenu-desc' => 'Парсер за проста странична лента што создава расклопни менија и подменија во неа',
	'sidebarmenu-parser-input-error' => 'Парсерот се врати со грешката: $1',
	'sidebarmenu-parser-syntax-error' => 'Не можам да го предадам редот „$1“. Проверете дали синтаксата е исправна.',
	'sidebarmenu-js-init-error' => 'Вчитувањето на ресурсите на JavaScript не успеа.',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Параметарот „parser.menuitem.expanded“ треба да има зададено „true“ или „false“, а моментално нема ништо.',
);

