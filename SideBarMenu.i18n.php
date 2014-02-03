<?php
/**
 * Internationalisation file for extension SideBarMenu
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Kim Eik
 */
$messages['en'] = array(
	'sidebarmenu-desc' => 'A simple sidebar menu parser which creates collapsible/expandable menus and sub-menus',
	'sidebarmenu-parser-input-error' => 'Parser returned with error: $1',
	'sidebarmenu-parser-syntax-error' => 'Could not parse "$1", make sure the syntax is correct.',
	'sidebarmenu-js-init-error' => 'Failed loading JavaScript resources.',
	'sidebarmenu-edit' => 'Edit menu',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Invalid value given, value should be one of null,true,false.'
);

/** Message documentation (Message documentation)
 * @author Kim Eik
 * @author Nemo bis
 * @author Shirayuki
 * @author Siebrand
 */
$messages['qqq'] = array(
	'sidebarmenu-desc' => '{{desc|name=Side Bar Menu|url=http://www.mediawiki.org/wiki/Extension:SideBarMenu}}',
	'sidebarmenu-parser-input-error' => 'Error message on parser error. Parameters:
* $1 is the error message returned.',
	'sidebarmenu-parser-syntax-error' => 'Error message on parsing. Parameters:
* $1 is the line which failed to be parsed.',
	'sidebarmenu-js-init-error' => 'General error message.',
	'sidebarmenu-edit' => 'Action link. The text of the link which points to the edit page wherever the sidebarmenu is declared.',
	'sidebarmenu-parser-menuitem-expanded-null' => 'The value of the expanded property of a menuitem',
);

/** Asturian (asturianu)
 * @author Xuacu
 */
$messages['ast'] = array(
	'sidebarmenu-desc' => 'Un simple analizador de la barra llateral que crea menús y submenús que puen contraese y espandese',
	'sidebarmenu-parser-input-error' => "L'analizador tornó col error: $1",
	'sidebarmenu-parser-syntax-error' => 'Non pudo analizase "$1", compruebe que la sintaxis ye correuta.',
	'sidebarmenu-js-init-error' => 'Fallu al cargar los recursos JavaScript.',
	'sidebarmenu-edit' => 'Editar el menú',
	'sidebarmenu-parser-menuitem-expanded-null' => 'El valor dau ye inválidu; el valor tien de ser "null", "true" o "false".',
);

/** Belarusian (Taraškievica orthography) (беларуская (тарашкевіца)‎)
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'sidebarmenu-desc' => 'Просты парсэр для бакавога мэню, які дазваляе ствараць згортваемыя мэню і падмэню',
	'sidebarmenu-parser-input-error' => 'Парсэр павярнуў памылку: $1',
	'sidebarmenu-parser-syntax-error' => 'Не атрымалася разабраць «$1». Запэўніцеся, што сынтэкс карэктны.',
	'sidebarmenu-js-init-error' => 'Не атрымалася загрузіць JavaScript-рэсурсы.',
	'sidebarmenu-edit' => 'Рэдагаваць мэню',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Пададзенае няслушнае значэньне, слушнае — null, true, або false.',
);

/** Breton (brezhoneg)
 * @author Fohanno
 */
$messages['br'] = array(
	'sidebarmenu-edit' => 'Aozañ al lañser',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Metalhead64
 * @author Purodha
 */
$messages['de'] = array(
	'sidebarmenu-desc' => 'Ergänzt den Tag <code lang="en">&lt;sidebarmenu&gt;</code> zum Einbinden ausklappbarer Menüs und Untermenüs in die Seitenleiste',
	'sidebarmenu-parser-input-error' => 'Der Parser hat den folgenden Fehler ausgegeben: $1',
	'sidebarmenu-parser-syntax-error' => '„$1“ konnte nicht verarbeitet werden. Bitte sicherstellen, dass die Syntax richtig ist.',
	'sidebarmenu-js-init-error' => 'Das Laden der JavaScripte ist gescheitert.',
	'sidebarmenu-edit' => 'Menü bearbeiten',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Es wurde ein ungültiger Wert angegeben. Es sollte entweder „true“ oder „false“, bzw. nichts angegeben sein.',
);

/** Lower Sorbian (dolnoserbski)
 * @author Derbeth
 * @author Michawiki
 */
$messages['dsb'] = array(
	'sidebarmenu-desc' => 'Jadnory menijowy parser za bocnicu, kótaryž napórajo złožujobne/rozzłožujobne menije a pódmenije',
	'sidebarmenu-parser-input-error' => 'Parser jo zmólku wróśił: $1',
	'sidebarmenu-parser-syntax-error' => '"$1" njedajo se parsowaś, zawěsć, až syntaksa jo korektna.',
	'sidebarmenu-js-init-error' => 'Zacytowanje JavaScriptowych resursow njejo se raźiło.',
	'sidebarmenu-edit' => 'Meni wobźěłaś',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Njepłaśiwa gódnota pódana, gódnota by dejała pak "null", "true" pak "false" byś.',
);

/** Spanish (español)
 * @author Armando-Martin
 */
$messages['es'] = array(
	'sidebarmenu-desc' => 'Un analizador (parser) de menú lateral simple que crea menús y submenús colapsables y ampliables',
	'sidebarmenu-parser-input-error' => 'El analizador (parser) devolvió el error: $1',
	'sidebarmenu-parser-syntax-error' => 'No se pudo analizar "$1", asegúrese de que la sintaxis es correcta.',
	'sidebarmenu-js-init-error' => 'Error al cargar recursos de JavaScript.',
	'sidebarmenu-edit' => 'Editar el menú',
	'sidebarmenu-parser-menuitem-expanded-null' => 'El valor dado es inválido, debería ser "null", "true" o "false".',
);

/** Persian (فارسی)
 * @author Armin1392
 * @author Mjbmr
 */
$messages['fa'] = array(
	'sidebarmenu-parser-input-error' => 'تجزیه کننده با خطا بازگردانده شد: $1',
	'sidebarmenu-parser-syntax-error' => '"$1" نتوانست تجزیه شود، مطمئن شوید نحو صحیح است.',
	'sidebarmenu-js-init-error' => 'عدم موفقیت بارگذاری منابع جاوااسکرسپت.',
	'sidebarmenu-edit' => 'منوی ویرایش',
);

/** French (français)
 * @author Gomoko
 * @author Wyz
 */
$messages['fr'] = array(
	'sidebarmenu-desc' => 'Un analyseur de barre de menu latérale simple qui crée des menus et des sous-menus rétractables/extensibles',
	'sidebarmenu-parser-input-error' => "L'analyseur a renvoyé une erreur: $1",
	'sidebarmenu-parser-syntax-error' => 'Impossible d\'analyser "$1", assurez-vous que la syntaxe est correcte.',
	'sidebarmenu-js-init-error' => 'Échec au chargement des ressources JavaScript.',
	'sidebarmenu-edit' => 'Modifier le menu',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Valeur fournie non valide, elle doit être null, true ou false.',
);

/** Franco-Provençal (arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'sidebarmenu-edit' => 'Changiér lo menu',
);

/** Galician (galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'sidebarmenu-desc' => 'Un simple analizador da barra lateral que crea menús e submenús que se poden contraer e expandir',
	'sidebarmenu-parser-input-error' => 'O analizador devolveu o seguinte erro: $1',
	'sidebarmenu-parser-syntax-error' => 'Non se puido analizar "$1"; asegúrese de que a sintaxe é correcta.',
	'sidebarmenu-js-init-error' => 'Erro ao cargar os recursos do JavaScript.',
	'sidebarmenu-edit' => 'Editar o menú',
	'sidebarmenu-parser-menuitem-expanded-null' => 'O valor achegado non é válido. O valor debe ser "null", "true" ou "false".',
);

/** Upper Sorbian (hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'sidebarmenu-desc' => 'Jednory menijowy parser za bóčnicu, kotryž fałdujomne/rozfałdujomne menije a podmenij twori',
	'sidebarmenu-parser-input-error' => 'Parser je zmylk wróćił: $1',
	'sidebarmenu-parser-syntax-error' => '"$1" njeda so parsować, zawěsćće, zo syntaksa je korektna.',
	'sidebarmenu-js-init-error' => 'Začitowanje JavaScriptowych resursow je so njeporadźiło.',
	'sidebarmenu-edit' => 'Meni wobdźěłać',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Njepłaćiwa hódnota podata, hódnota dyrbjała pak "null", "true" pak "false" być.',
);

/** Interlingua (interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'sidebarmenu-desc' => 'Un analysator syntactic simple pro le menu del barra lateral que crea menus e submenus plicabile/displicabile',
	'sidebarmenu-parser-input-error' => 'Le analysator syntactic retornava un error: $1',
	'sidebarmenu-parser-syntax-error' => 'Non poteva interpretar "$1". Assecura que le syntaxe es correcte.',
	'sidebarmenu-js-init-error' => 'Le cargamento de ressources JavaScript ha fallite.',
	'sidebarmenu-edit' => 'Modificar menu',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Le valor specificate es invalide. Debe esser null, true o false.',
);

/** Italian (italiano)
 * @author Beta16
 */
$messages['it'] = array(
	'sidebarmenu-desc' => 'Un semplice parser per menu laterali che crea menu e sotto-menu comprimibili/espandibili',
	'sidebarmenu-parser-input-error' => "Il parser ha restituito l'errore: $1",
	'sidebarmenu-parser-syntax-error' => 'Impossibile elaborare "$1", assicurarsi che la sintassi sia corretta.',
	'sidebarmenu-js-init-error' => 'Impossibile caricare risorse JavaScript.',
	'sidebarmenu-edit' => 'Modifica menu',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Inserito valore non valido, dovrebbe essere compreso tra <code>null,true,false</code>.',
);

/** Japanese (日本語)
 * @author Shirayuki
 */
$messages['ja'] = array(
	'sidebarmenu-desc' => '折り畳み/展開できるメニュー/サブメニューを作成する簡易サイドバーメニューのパーサー',
	'sidebarmenu-parser-input-error' => 'パーサーがエラーを返しました: $1',
	'sidebarmenu-parser-syntax-error' => '「$1」を構文解析できませんでした。構文が正しいか確認してください。',
	'sidebarmenu-js-init-error' => 'JavaScript リソースの読み込みに失敗しました。',
	'sidebarmenu-edit' => 'メニューを編集',
	'sidebarmenu-parser-menuitem-expanded-null' => '正しくない値が指定されました。値は null、true、false のいずれかです。',
);

/** Georgian (ქართული)
 * @author David1010
 */
$messages['ka'] = array(
	'sidebarmenu-edit' => 'მენიუს რედაქტირება',
);

/** Korean (한국어)
 * @author Freebiekr
 * @author 아라
 */
$messages['ko'] = array(
	'sidebarmenu-desc' => '메뉴와 서브메뉴를 보이거나 숨길 수 있는 간단한 사이드바 메뉴 파서',
	'sidebarmenu-parser-input-error' => '$1 오류가 발생했습니다.',
	'sidebarmenu-parser-syntax-error' => '"$1"(을)를 분석할 수 없었습니다. 구문이 올바른지 확인하십시오.',
	'sidebarmenu-js-init-error' => '자바스크립트 리소스를 불러오지 못했습니다.',
	'sidebarmenu-edit' => '메뉴 편집',
	'sidebarmenu-parser-menuitem-expanded-null' => '잘못된 값을 주었으며 참, 거짓 또는 비어있어야 합니다.',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'sidebarmenu-desc' => 'Brängk dä Befähl <code lang="en">&lt;sidebarmenu&gt;</code> en et Wiki, öm eijfach Menüüs un Ongermenüüs för zom Ußklappe em Wiki enbenge ze künne.',
	'sidebarmenu-parser-input-error' => 'Dä Paaser hät ene Fähler jefonge: $1',
	'sidebarmenu-parser-syntax-error' => 'Mer kunnte „$1“ nit verärbeide un oplüüse. Bes seescher, dat dat all reeschtesch jerschrevve es un schtemmp?',
	'sidebarmenu-js-init-error' => 'De Javaskrepte kunnte nit jelaade wääde.',
	'sidebarmenu-edit' => 'Et Menü ändere!',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Ene onjöltije Wäät es aanjejovve woode, et sullt <code lang="en>null</code>, <code lang="en>true</code>, udder <code lang="en>false</code> sin.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'sidebarmenu-parser-input-error' => 'Parser-Feeler: $1',
	'sidebarmenu-parser-syntax-error' => '"$1" konnt net verschafft ginn, vergewëssert Iech datt Syntax korrekt ass.',
	'sidebarmenu-js-init-error' => 'De JavaScript konnt net geluede ginn.',
	'sidebarmenu-parser-menuitem-expanded-null' => 'De Wäert ass net valabel, de Wäert soll entweder „true“ „false“ oder eidel (null) sinn.',
);

/** Minangkabau (Baso Minangkabau)
 * @author Iwan Novirion
 */
$messages['min'] = array(
	'sidebarmenu-desc' => 'Menu parser sadarano sidebar nan mambuek menu bukak/tutuik jo sub-menu',
	'sidebarmenu-parser-input-error' => 'Parser mammbuek kasalahan: $1',
	'sidebarmenu-parser-syntax-error' => 'Indak dapek parser "$1", yakinkan syntax nyo batua.',
	'sidebarmenu-js-init-error' => 'Gagal mamuek Skrip Java',
	'sidebarmenu-edit' => 'Menu suntiang',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Nilai indak sah, nilai haruslah satu dari null,true,false.',
);

/** Macedonian (македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'sidebarmenu-desc' => 'Парсер за проста странична лента што создава расклопни менија и подменија во неа',
	'sidebarmenu-parser-input-error' => 'Парсерот се врати со грешката: $1',
	'sidebarmenu-parser-syntax-error' => 'Не можам да го предадам редот „$1“. Проверете дали синтаксата е исправна.',
	'sidebarmenu-js-init-error' => 'Вчитувањето на ресурсите на JavaScript не успеа.',
	'sidebarmenu-edit' => 'Уреди',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Зададена е неважечка вредност. Треба да биде „true“, „false“ или да стои незададена.',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'sidebarmenu-desc' => 'Penghurai menu palang sisi yang ringkas dan membuat menu dan submenu lipat kembang',
	'sidebarmenu-parser-input-error' => 'Penghurai dikembalikan dengan ralat: $1',
	'sidebarmenu-parser-syntax-error' => '"$1" tidak dapat dihuraikan, sila pastikan sintaksnya betul.',
	'sidebarmenu-js-init-error' => 'Sumber-sumber JavaScript gagal dimuatkan.',
	'sidebarmenu-edit' => 'Sunting menu',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Nilai yang tidak sah diberikan; nilai seharusnya sama ada null, true, atau false.',
);

/** Dutch (Nederlands)
 * @author AvatarTeam
 * @author SPQRobin
 * @author Siebrand
 * @author Wiki13
 */
$messages['nl'] = array(
	'sidebarmenu-desc' => "Een eenvoudige menubalkparser waarmee in- en uiklapbare menu's en submenu's gemaakt kunnen worden",
	'sidebarmenu-parser-input-error' => 'Er is een foutmelding uit de parser teruggekomen: $1',
	'sidebarmenu-parser-syntax-error' => 'Het was niet mogelijk om "$1" te verwerken. Zorg ervoor dat de syntaxis correct is.',
	'sidebarmenu-js-init-error' => 'Het laden van de JavaScriptbronnen is mislukt.',
	'sidebarmenu-edit' => 'Menu bewerken',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Er is een ongeldige waarde opgegeven. De waarde moet null, waar of onwaar zijn.',
);

/** Punjabi (ਪੰਜਾਬੀ)
 * @author Babanwalia
 */
$messages['pa'] = array(
	'sidebarmenu-edit' => 'ਸੋਧ ਸੂਚੀ',
);

/** Polish (polski)
 * @author BeginaFelicysym
 * @author Woytecr
 */
$messages['pl'] = array(
	'sidebarmenu-desc' => 'Prosty parser dla menu paska bocznego, który tworzy zwijane/rozwijane menu i podmenu',
	'sidebarmenu-parser-input-error' => 'Analizator zwrócił błąd: $1',
	'sidebarmenu-parser-syntax-error' => 'Nie można przeanalizować "$1", upewnij się, że składnia jest poprawna.',
	'sidebarmenu-js-init-error' => 'Nie powiodło się ładowanie zasobów z kodem JavaScript.',
	'sidebarmenu-edit' => 'Edytuj menu',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Podano niepoprawną wartość, powinna być true, false, null.',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'sidebarmenu-desc' => "N'analisator sempi dla bara dë mnù lateral che a crea dle liste e sot-liste comprimìbij/espandìbij",
	'sidebarmenu-parser-input-error' => "L'analisator a l'ha rëspondù con n'eror: $1",
	'sidebarmenu-parser-syntax-error' => "Impossìbil analisé «$1», ch'as sigura che la sintassi a sia giusta.",
	'sidebarmenu-js-init-error' => "Falì a carié j'arsorse JavaScript.",
	'sidebarmenu-edit' => 'Modifiché la lista',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Valor dàit pa bon, ël valor a dovrìa esse un ëd gnente, ver, fàuss.',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'sidebarmenu-edit' => 'مينو سمول',
);

/** Portuguese (português)
 * @author SandroHc
 */
$messages['pt'] = array(
	'sidebarmenu-edit' => 'Editar menu',
);

/** Brazilian Portuguese (português do Brasil)
 * @author Cainamarques
 */
$messages['pt-br'] = array(
	'sidebarmenu-edit' => 'Editar menu',
);

/** Romanian (română)
 * @author Minisarm
 * @author Stelistcristi
 */
$messages['ro'] = array(
	'sidebarmenu-parser-input-error' => 'Parserul a returnat o eroare: $1',
	'sidebarmenu-edit' => 'Modifică meniul',
);

/** tarandíne (tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'sidebarmenu-desc' => "'Nu semblice menu laterale analizzatore ca ccreje le menu e le sotte menu ca se sconnene e se spannene",
	'sidebarmenu-parser-input-error' => "L'analizzatore ha turnate cu 'n'errore: $1",
	'sidebarmenu-parser-syntax-error' => 'Non ge pozze analizzà "$1", condrolle ca \'a sindasse jè corrette.',
	'sidebarmenu-js-init-error' => 'Carecamende de le resorse JavaScript fallite.',
	'sidebarmenu-edit' => "Cange 'u menu",
	'sidebarmenu-parser-menuitem-expanded-null' => "Valore date invalide, 'u valore avessa essere null, vere, fause.",
);

/** Russian (русский)
 * @author Okras
 */
$messages['ru'] = array(
	'sidebarmenu-desc' => 'Простой синтаксический анализатор меню в боковой панели, который создает сворачиваемые/разворачиваемые меню и подменю',
	'sidebarmenu-parser-input-error' => 'Синтаксический анализатор вернул ошибку: $1',
	'sidebarmenu-parser-syntax-error' => 'Не удалось выполнить разбор строки «$1», убедитесь, что используется правильный синтаксис.',
	'sidebarmenu-js-init-error' => 'Не удалось загрузить ресурсы JavaScript.',
	'sidebarmenu-edit' => 'Редактировать меню',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Задано недопустимое значение, значение должно быть одним из следующих: null (пусто), true («истина»), false («ложь»).',
);

/** Sinhala (සිංහල)
 * @author පසිඳු කාවින්ද
 */
$messages['si'] = array(
	'sidebarmenu-parser-input-error' => 'ව්‍යාකරණ විග්‍රහය දෝෂයක් සමඟ ආපසු පැමිණෙයි: $1',
	'sidebarmenu-js-init-error' => 'JavaScript සම්පත් පූරණය වීම අසාර්ථකයි.',
	'sidebarmenu-edit' => 'මෙනුව සංස්කරණය කරන්න',
);

/** Swedish (svenska)
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'sidebarmenu-desc' => 'En enkel parser i sidofältsmenyn som skapar hopfällbara/expanderbara menyer och undermenyer',
	'sidebarmenu-parser-input-error' => 'Parser returnerade felet: $1',
	'sidebarmenu-parser-syntax-error' => 'Kunde inte tolka "$1", se till att syntaxen är korrekt.',
	'sidebarmenu-js-init-error' => 'Misslyckades att läsa in JavaScript-resurser.',
	'sidebarmenu-edit' => 'Redigeringsmeny',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Ogiltigt värde angavs, värdet bör antingen vara null, true eller false.',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'sidebarmenu-desc' => 'Isang payak na pambanghay sa menu ng panggilid na bareta na lumilikha ng mga naibabagsak/napalalawak na mga menu at kabahaging mga menu',
	'sidebarmenu-parser-input-error' => 'Nagbalik ang pambanghay na may kamalian: $1',
	'sidebarmenu-parser-syntax-error' => 'Hindi maibanghay ang "$1", tiyaking tama ang palaugnayan.',
	'sidebarmenu-js-init-error' => 'Nabigo sa pagkakarga ng mga napagkunang JavaScript.',
	'sidebarmenu-edit' => 'Baguhin ang menu',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Hindi katanggap-tanggap ang ibinigay na halaga, ang halaga ay dapat na isa mula sa walang saysay, tama, mali.',
);

/** Ukrainian (українська)
 * @author Base
 */
$messages['uk'] = array(
	'sidebarmenu-desc' => 'Простий парсер бічного меню, який створює згортабельні/розгортабельні меню і підменю',
	'sidebarmenu-parser-input-error' => 'Парсер повернув помилку: $1',
	'sidebarmenu-parser-syntax-error' => 'Не вдалося проаналізувати «$1», впевніться, що синтаксис коректний.',
	'sidebarmenu-js-init-error' => 'Не вдалось завантажити ресурси JavaScript.',
	'sidebarmenu-edit' => 'Редагувати меню',
	'sidebarmenu-parser-menuitem-expanded-null' => 'Подано некоректне значення, значення повинне бути одним із: null,true,false.',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Linforest
 * @author Yfdyh000
 */
$messages['zh-hans'] = array(
	'sidebarmenu-desc' => '一个简单的，可用于创建可折叠式/可展开式菜单及子菜单的边栏菜单解析器',
	'sidebarmenu-parser-input-error' => '解析器返回错误：$1',
	'sidebarmenu-parser-syntax-error' => '无法解析"$1"，请确认语法是否正确。',
	'sidebarmenu-js-init-error' => 'JavaScript资源加载失败。',
	'sidebarmenu-edit' => '编辑菜单',
	'sidebarmenu-parser-menuitem-expanded-null' => '提供的值无效，值应为null,true,false之一。',
);

/** Traditional Chinese (中文（繁體）‎)
 * @author Justincheng12345
 * @author Shirayuki
 */
$messages['zh-hant'] = array(
	'sidebarmenu-desc' => '一個簡單的，可用於創建可摺疊式/可展開式菜單及子菜單的邊欄菜單解析器',
	'sidebarmenu-parser-input-error' => '解析器返回錯誤：$1',
	'sidebarmenu-parser-syntax-error' => '無法解析"$1"，請確認語法是否正確。',
	'sidebarmenu-js-init-error' => 'JavaScript資源加載失敗。',
	'sidebarmenu-edit' => '編輯菜單',
	'sidebarmenu-parser-menuitem-expanded-null' => '提供的數值無效，數值應為null、true或false。',
);
