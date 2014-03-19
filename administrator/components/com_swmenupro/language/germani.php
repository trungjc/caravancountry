<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php
/**
* swmenupro v4.5
* http://swonline.biz
* Copyright 2006 Sean White
* German Translation by Stefan Mueller, milchi@milchi.de
**/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
define( '_SW_CORNER', 'Corner' );
define( '_SW_BORDER', 'Border' );
define( '_SW_LEVELX', 'Level X' );
define( '_SW_AUTO', 'Auto' );
define( '_SW_TOP_MENU_ACTIVE', 'Top Menu Active' );
define( '_SW_SUB_MENU_ACTIVE', 'Sub Menu Active' );
define( '_SW_BORDER_WIDTH', 'Border Width' );
//define( '_SW_OUTSIDE_BORDER', 'Outside Border' );
//define( '_SW_INSIDE_BORDER', 'Inside Border' );

define( '_SW_TOP_SUB_INDICATOR_IMAGE', 'Top Menu - Sub Indicator Image' );
define( '_SW_EDIT_JOOMLA_PROPERTIES', 'Edit Joomla! module properties' );
define( '_SW_SUB_SUB_INDICATOR_IMAGE', 'Sub Menu - Sub Indicator Image' );
define( '_SW_BACKGROUND_INDICATOR_TAB', 'Backgrounds & Indicators' );
define( '_SW_BACKGROUND_REPEAT', 'Repeat' );
define( '_SW_BACKGROUND_POSITION', 'Position' );
define( '_SW_TABLET_HACK', 'Mobile/Tablet friendly' );
define( '_SW_TABLET_HACK_TIP', 'Enable this to make the menu more usable on tablet or mobile operating systems.  Makes all parent menu items to be non-links.' );
define('_SW_BACKGROUND_INDICATORS_TAB','Backgrounds &amp; Sub Indicators');



//top tabs
define( '_SW_ITEM_PROPERTIES_TAB2', 'Menu Item Properties' );
define( '_SW_ITEM_CSS_TAB2', 'Custom CSS' );
define( '_SW_MULTIPLE_TAB2', 'Configure Multiple Menu Items' );

define( '_SW_MENU_ITEM_IMAGES', 'Custom Images' );
define( '_SW_MENU_ITEM_HTML', 'Custom HTML' );
define( '_SW_MENU_PLACE_HTML', 'Put the above HTML' );
define( '_SW_MENU_PLACE_HTML_TIP', 'The HTML in the box above can be placed before, after or as a floating tooltip for the specified menu item.  A special feature also alows the loading of any module using this format  <b>{swmenuload&nbsp;modulename}</b>  Repace modulename with the name of the module you want to load.  Modules can also be loaded into tooltips.' );
define( '_SW_AFTER', 'After the menu item' );
define( '_SW_BEFORE', 'Before the menu item' );
define( '_SW_TOOLTIP', 'As a tootip' );

define( '_SW_FOLDER_MENU_ITEM', 'Folder Item' );
define( '_SW_DOCUMENT_MENU_ITEM', 'Document Item' );
define( '_SW_TREE_INDENT_LABEL', 'Tree Indents <i>(use: 2px 0px 2px 16px for lines)</i>' );
define( '_SW_TREE_WIDTH_ALIGN_LABEL', 'Menu Width & Alignment' );
define( '_SW_TREE_ICONS_LINES_LABEL', 'Tree Icons and Lines' );
define( '_SW_COMPLETE_MENU_BORDER', 'Complete Menu Border' );
define( '_SW_BORDER_STYLE', 'Border Style' );
define( '_SW_BORDER_SIZE', 'Border Size' );
define( '_SW_BORDER_COLOR', 'Border Color' );
// new swMenuPro7.5 terms

define( '_SW_EXPAND_ALL', 'Expand All Submenus by Default' );
define( '_SW_EXPAND_ALL_TIP', 'Expand all submenus by default when the page loads.' );

define( '_SW_DISABLE_PARENT_LINKS', 'Use Top Item Placeholders(disable link)' );
define( '_SW_DISABLE_PARENT_LINKS_TIP', 'Make top menu items that have submenus act as placeholders so they do not reload the page when clicked.' );

define( '_SW_UPLOAD_TTF', 'Upload Cufon Font File' );

define( '_SW_OPENED', 'Opened' );
define( '_SW_CLOSED', 'Closed' );
define( '_SW_CLEAR', 'Clear' );

define( '_SW_HOVER', 'Hover' );
define( '_SW_ACTIVE', 'Active' );
define( '_SW_INSIDE', 'Inside' );
define( '_SW_OUTSIDE', 'Outside' );
define( '_SW_MENU_HACKS', 'Menu Hacks' );
define( '_SW_LIVE_PREVIEW', 'Menu Preview' );
define( '_SW_PREVIEW_BACKGROUND', 'Background Color:' );
define( '_SW_PREVIEW_REFRESH', 'Refresh Preview' );

define( '_SW_TOP_MENU_ITEM', 'Top Menu Item' );
define( '_SW_SUB_MENU_ITEM', 'Sub Menu Item' );

define( '_SW_BACKGROUND_EFFECT_TAB', 'Backgrounds & Effects' );
define( '_SW_FONTS_TEXT_TAB', 'Fonts & Text' );
define( '_SW_BORDERS_CORNERS_TAB', 'Borders & Corners' );


define( '_SW_TRUE_TYPE_FONTS_LABEL', 'True Type Fonts' );
define( '_SW_TEXT_WRAPPING_LABEL', 'Text Wrapping' );
define( '_SW_ADDITIONAL_STYLES_LABEL', 'Additional Text Styling' );
define( '_SW_TOP_MENU_MARGINS_LABEL', 'Top Menu Margins' );
define( '_SW_CORNER_STYLES_LABEL', 'Corner Styling' );
define( '_SW_CORNER_STYLE', 'Corner Style' );
define( '_SW_CORNER_SIZE', 'Corner Size' );
define( '_SW_CORNER_ASSIGNMENT_LABEL', 'Corner Assignments' );
define( '_SW_CORNER_TOP_LEFT', 'Top Left Corner' );
define( '_SW_CORNER_TOP_RIGHT', 'Top Right Corner' );
define( '_SW_CORNER_BOTTOM_LEFT', 'Bottom Left Corner' );
define( '_SW_CORNER_BOTTOM_RIGHT', 'Bottom Right Corner' );

define( '_SW_COMPLETE_MENU', 'Complete Menu' );
define( '_SW_COMPLETE_MENU_PADDING', 'Complete Menu Padding' );

define( '_SW_ACTIVE_BACKGROUND_COLOR', 'Active Background Color' );
define( '_SW_ACTIVE_BACKGROUND_IMAGE', 'Active Background' );
define( '_SW_COMPLETE_BACKGROUND_IMAGE', 'Complete Background' );
define( '_SW_COMPLETE_BACKGROUND_COLOR', 'Complete Background Color' );
define( '_SW_COLOR_WHEEL_LABEL', 'Color Wheel Picker' );
define( '_SW_BORDER_IMAGE_LABEL', 'Borders & Items Color Assignments' );
define( '_SW_FONT_STYLE_SIZES_LABEL', 'Font Styles and Sizes' );
define( '_SW_PADDING_ALIGNMENT_LABEL', 'Menu Item Padding and Text Alignment' );

define( '_SW_DISABLE_JQUERY', 'Disable jQuery Link' );
define( '_SW_FLASH_HACK', 'Overlay Flash Files' );
define( '_SW_DISABLE_JQUERY_TIP', 'Disable jQuery link from the source HTML.  Useful when jquery is allready loaded by your site and to prevent jQery conflicts.' );
define( '_SW_FLASH_HACK_TIP', 'Overlay flash files by applying a javascript function to make there wmode=transparent' );

define( '_SW_SUPERFISH_MENU', 'Superfish Menu' );

//new 7.0 terms
define( '_SW_OVERLAY_HACK', 'Force Overlay' );
define( '_SW_OVERLAY_HACK_TIP', 'Make submenus overlay other page elements and fix any transmenu submenu position problems.' );

//swMenuPro 6.7 new terms
define( '_SW_COLUMN_MENU', 'Multi Column Menu' );
define( '_SW_COLUMN_COUNT', 'Number of Submebnu Columns' );

define( '_SW_SPECIAL_EFFECTS_TIP', 'Apply an effect to the submenus' );
define( '_SW_SPECIAL_EFFECTS_NONE', 'None' );
define( '_SW_SPECIAL_EFFECTS_SLIDE', 'Slide' );
define( '_SW_SPECIAL_EFFECTS_FADE', 'Fade' );

//swMenuPro 6.5 new terms
define( '_SW_ACCORDIAN_MENU', 'Dynamic Drive Accordian Menu' );
define( '_SW_SUB_ACTIVATE_TIP', 'Select yes to activate submenus with a click, Select no to activate menus on mouseover.' );
define( '_SW_SUB_ACTIVATE_LABEL', 'Activate submenus by click?' );



//swMenuPro 6.0 new terms
define( '_SW_AUTO_POSITION', 'Auto Position Sub Menus' );
define( '_SW_AUTO_POSITION_TIP', 'Reposition submenus onto the page if they would otherwise overlap the page.' );
define( '_SW_AUTO_SUB', 'Active Sub Menu' );
define( '_SW_AUTO_SUB_TIP', 'Open the active submenu automatically under the relevent active top menu item.' );
define( '_SW_AUTO_DYN_SUB', 'Autoclose Sub Menu' );
define( '_SW_AUTO_DYN_SUB_TIP', 'Close submenus on mouseout and return to the active menu state.' );
define( '_SW_AUTO_CLOSE_TIP', 'Auto close open submenus when another menu item is clicked.' );
define( '_SW_SUB_WRAP', 'Wrap Submenu' );
define( '_SW_SUB_WRAP_TIP', 'Display the submenu by wrapping accross multiple lines if it is too large for a single line.' );
define( '_SW_TREE_COOKIE', 'Use Cookies' );
define( '_SW_TREE_COOKIE_TIP', 'Use cookies to preserve the menu state between screen refresh.  Allows for multiple active submenus.' );
define( '_SW_SAVE_SWMENUFREE_MESSAGE', 'Sucessfully copied swMenuFree module to swMenuPro.' );
define( '_SW_COPY_SWMENUFREE', 'Copy Menu Module From swMenuFree' );
define( '_SW_COPY_SWMENUFREE_BUTTON', 'Click here to cop menu module from swMenuFree to swMenuPro, new menu module will be called swMenuFree Copy' );


//swMenuPro 5.3 new terms

define( '_SW_COPY_IMAGES', 'Also copy custom images & CSS' );

define( '_SW_CLICK_TRANS_MENU', 'Click-Trans Menu' );

define( '_SW_PADDING_HACK', 'IE Size/Padding Hack' );

define( '_SW_PADDING_HACK_TIP', 'If you have menu item size differences between Internet Explorer and other browsers then try this hack.' );


//swMenuPro 5.0 new terms

define( '_SW_SLIDECLICK_MENU', 'Accordian Menu' );
define( '_SW_AUTO_CLOSE_LABEL', 'Auto Close Open Submenus?' );
define( '_SW_UPGRADE_VERSIONS', 'Current Installed swMenuPro Versions' );
define( '_SW_SELECTED_LANGUAGE_HEADING', 'Current Language File' );
define( '_SW_LANGUAGE_FILES', 'Select New Language File' );
define( '_SW_LANGUAGE_CHANGE_BUTTON', 'Change Language' );
define( '_SW_UPLOAD_LANGUAGE_HEADING', 'Upload New Language File' );
define( '_SW_LANGUAGE_UPLOAD_BUTTON', 'Upload Language File' );
define( '_SW_FILE_PERMISSIONS', 'Current File Permissions' );
define( '_SW_LANGUAGE_SUCCESS', 'Succesfully Added New swMenuPro Language File.' );
define( '_SW_LANGUAGE_FAIL', 'Could not upload language file, please make sure all directories listed below are writable.' );



//Menu Names
define( '_SW_TIGRA_MENU', 'Tigra Men�' );
define( '_SW_TRANS_MENU', 'Trans Men�' );
define( '_SW_MYGOSU_MENU', 'MyGosu Men�' );
define( '_SW_CLICK_MENU', 'Click Men�' );
define( '_SW_TAB_MENU', 'CSS Tab Men�' );
define( '_SW_DYN_TAB_MENU', 'Dynamic Tab Men�' );
define( '_SW_TREE_MENU', 'Tree Men�' );

//Page Names
define( '_SW_MENU_MODULE_MANAGER', 'Men� Modul Manager' );
define( '_SW_MANUAL_CSS_EDITOR', 'CSS Editor' );
define( '_SW_INDIVIDUAL_ITEM_EDITOR', 'Individueller Men�punkt Editor' );
define( '_SW_MODULE_EDITOR', 'Modul Editor' );
define( '_SW_UPGRADE_FACILITY', 'Upgrade Men�' );


//Common Terms
define( '_SW_WRITABLE', 'Beschreibbar' );
define( '_SW_UNWRITABLE', 'Nicht beschreibbar' );
define( '_SW_YES', 'Ja' );
define( '_SW_NO', 'Nein' );
define( '_SW_HYBRID', 'gemischt' );


//Menu Module Manager Page (list menu modules)
define( '_SW_MENU_MODULES', 'Men� Module' );
define( '_SW_DISPLAY', 'anzeigen' );
define( '_SW_USE_DEFAULT_MODULE', 'Benutze Standard Men� Style' );
define( '_SW_COPY_MODULE', 'Kopiere existierenden Men� Style' );
define( '_SW_CREATE_MODULE', 'Erstelle neues Men�modul' );
define( '_SW_MODULE_NAME', 'Modul Name' );
define( '_SW_SELECT_MENU', 'W�hle Men� System' );
define( '_SW_SELECT_STYLE', 'W�hle Men� Style zum kopieren' );


//Tool Tips
define( '_SW_SELECT_ITEM_TIP', 'W�hle einen Men�eintrag indem du auf seine Bezeichnung klickst.' );
define( '_SW_EDIT_MODULE_TIP', 'Klicke hier um den Style sowie die Einstellung des %s Men�moduls zu bearbeiten' );
define( '_SW_COPY_STYLE_TIP', 'W�hle ein existierendes Men�modul um dessen Styleeinstellungen auf ein neues Modul zu �bertragen' );
define( '_SW_EDIT_CSS_TIP', 'Klicke hier um das externe Stylesheet f�r das %s Men�modul manuell zu bearbeiten' );
define( '_SW_EXPORT_MODULE_TIP', 'Klicke hier um das Stylesheet f�r das %s Men�modul zu exportieren');
define( '_SW_EDIT_IMAGES_TIP', 'Klicke hier um individuelle Men�eintragsbilder, CCS und Eigenschaft des %s Men�moduls zu bearbeiten' );
define( '_SW_PREVIEW_MODULE_TIP', 'Klicke hier um eine Vorschau des %s Men�moduls in einem PopUp Fenster zu betrachen' );
define( '_SW_DELETE_MODULE_TIP', 'Klicke hier um das %s Men�modul zu l�schen' );
define( '_SW_MENU_SYSTEM_INFO_TIP', '<b>Klicke hier</b> um mehr Informationen �ber die verschiedenen Men�systeme zu erhalten' );
define( '_SW_MODULE_TIP', '<b>Men� Style:</b> %s<br /><b>QuellMen�:</b> %s<br /><b>Position:</b> %s<br /><b>Zugriff:</b> %s<br /><b>Ver�ffentlicht:</b> %s');
define( '_SW_CREATE_MENU_TIP', 'Klicke hier um dein eigenes neues Modul zu erstellen.');

define( '_SW_SAVE_TIP', 'Klicke hier um alle Style und Modul�nderungen in der Datenbank zu speichern' );
define( '_SW_APPLY_TIP', 'Klicke hier um alle Style und Modul�nderungen in die Datenbank zu �bernehmen' );
define( '_SW_CANCEL_TIP', 'Klicke hier um alle �nderungen zu verwerfen und zum Modulmanager zur�ckzukehren' );
define( '_SW_PREVIEW_TIP', 'Klicke hier f�r eine Vorschau des Men�modul in einem neuen Fenster' );
define( '_SW_EXPORT_TIP', 'Klicke hier um ein externe Stylesheet mit den aktuellen Einstellungen zu exportieren' );

//Buttons text
define( '_SW_SAVE_BUTTON', 'speichern' );
define( '_SW_APPLY_BUTTON', 'anwenden' );
define( '_SW_CANCEL_BUTTON', 'abbrechen' );
define( '_SW_PREVIEW_BUTTON', 'vorschau' );
define( '_SW_EXPORT_BUTTON', 'exportieren' );
define( '_SW_CREATE_BUTTON', 'Jetzt erstellen' );
define( '_SW_EDIT_BUTTON', 'bearbeiten' );
define( '_SW_DELETE_BUTTON', 'l�schen' );
define( '_SW_EDITCSS_BUTTON', 'bearbeite CSS' );
define( '_SW_GET_IMAGE_BUTTON', 'lade Bild' );
define( '_SW_UPDATE_CSS_BUTTON', 'Aktualisiere CSS' );
define( '_SW_UPLOAD_BUTTON', 'Datei hochladen' );
define( '_SW_UPDATE_OVER_CSS_BUTTON', 'Aktualisiere die CSS' );


//Internal program links
define( '_SW_UPGRADE_LINK', 'Upgrade/Repariere swMenuPro.' );
define( '_SW_MANAGER_LINK', 'Editiere Men�moduleigenschaften' );
define( '_SW_CSS_LINK', 'Editiere externe CSS Datei' );
define( '_SW_EXPORT_LINK', 'Exportiere eine CSS Datei' );
define( '_SW_RETURN_MANAGER_LINK', 'Kehre zum swMenuPro Modulmanager zur�ck' );


//Program Notices
define( '_SW_NO_MODULE_NOTICE', 'Du musst auch das Modul installieren, damit swMenuPro richtig funktioniert.' );
define( '_SW_NO_MENU_NOTICE', 'Bitte w�hle ein Men�system aus der Auswahlliste.' );
define( '_SW_DELETE_MODULE_NOTICE', 'Bist du sicher das du dieses Modul l�schen m�chtest?' );
define( '_SW_MAKE_MODULE_NOTICE', 'Bitte erstelle ein neues Men�modul mit Hilfe des Assistenten auf der rechten Seite.' );
define( '_SW_UPLOAD_FILE_NOTICE', 'Bitte w�hle eine Datei zum hochladen aus.' );
define( '_SW_MENU_CHANGE_NOTICE', 'Du hast die Datenquelle f�r das Men�modul ge�ndert. Diese Seite kann nicht angezeigt werden, bis du die Einstellungen gespeichert oder sie verworfen hast.' );


//Program Messages
define( '_SW_DELETE_MODULE_MESSAGE', 'Men�modul erfolgreich gel�scht' );
define( '_SW_SAVE_MENU_MESSAGE', 'Einstellungen erfolgreich gespeichert' );
define( '_SW_SAVE_MENU_CSS_MESSAGE', 'Einstellungen gespeichert und externe CSS Datei erfolgreich erstellt' );
define( '_SW_SAVE_CSS_MESSAGE', 'Externe CSS Datei erfolgreich gespeichert' );
define( '_SW_NO_SAVE_MENU_CSS_MESSAGE', 'Externe CSS Datei konnte nicht erstellt werden. Bitte stell sicher das der Ordner modules/mod_swmenupro/styles beschreibbar ist.' );


//////////////////////////
//Upgrade page
/////////////////////////
define( '_SW_OK', 'Alles ist OK' );
define( '_SW_MESSAGES', 'Nachrichten' );
define( '_SW_MODULE_SUCCESS', 'Modul wurde erfolgreich aktualisiert.' );
define( '_SW_MODULE_FAIL', 'Modul konnte nicht aktualisiert werden. Bitte stell sicher das der /modules Ordner beschreibbar ist.' );
define( '_SW_TABLE_UPGRADE', 'Aktualisierte Tabelle %s' );
define( '_SW_TABLE_CREATE', 'Erstellte Tabelle %s' );
define( '_SW_UPDATE_LINKS', 'Aktualisierte AdminMen� Links' );

define( '_SW_MODULE_VERSION', 'Aktuelle swMenuPro Modul Version' );
define( '_SW_COMPONENT_VERSION', 'Aktuelle swMenuPro Komponenten Version' );
define( '_SW_UPLOAD_UPGRADE', 'Lade swMenuPro Upgrade/Release Datei hoch' );
define( '_SW_UPLOAD_UPGRADE_BUTTON', 'Upload & Installiere Datei' );

define( '_SW_COMPONENT_SUCCESS', 'swMenuPro Komponente erfolgreich aktualisiert.' );
define( '_SW_COMPONENT_FAIL', 'Aktualisierung fehlgeschlagen. Bitte stellen Sie sicher das alle unten aufgef�hrten Verzeichnisse beschreibbar sind.' );
define( '_SW_INVALID_FILE', 'Dies scheint keiner g�ltige neue swMenuPro upgrade/release Datei zu sein.' );



//////////////////////////
//Item images and CSS page
/////////////////////////
define( '_SW_AUTO_MULTIPLE_LABEL', 'Bearbeite automatisch mehrere Men�eintr�ge.' );
define( '_SW_AUTO_CSS_CREATOR_LABEL', 'CSS Assistent.' );
define( '_SW_PROPERTIES_LABEL', 'Men�eintrags Eigenschaften' );

//top tabs
define( '_SW_ITEM_PROPERTIES_TAB', 'Eigenschaften<br /> Bilder' );
define( '_SW_ITEM_CSS_TAB', 'Normal / Mouse Over<br /> CSS' );
define( '_SW_MULTIPLE_TAB', 'Bearbeite <br />Mehrere Eintr�ge' );

//general text
define( '_SW_STEP_1', 'Schritt 1' );
define( '_SW_STEP_2', 'Schritt 2' );
define( '_SW_STEP_3', 'Schritt 3' );
define( '_SW_SELECTED_ITEM', 'Ausgew�hlter Men�eintrag' );
define( '_SW_NONE_SELECTED', 'Nichts ausgew�hlt' );
define( '_SW_ITEM_PROPERTIES', 'Eintragseigenschaften' );
define( '_SW_SHOW_ITEM', 'Zeige Men�eintrag' );
define( '_SW_SHOW_ITEM_NAME', 'Zeige den Namen des Men�eintrags' );
define( '_SW_IS_LINK', 'Der Eintrag ist ein Link' );
define( '_SW_IMAGE_ALIGN', 'Bild Ausrichtung' );

//Select box text
define( '_SW_CSS_SELECT', 'W�hle eine CSS Einstellung zum bearbeiten aus' );
define( '_SW_COMPLETE_BORDER_SELECT', 'Komplett umrandet' );
define( '_SW_BORDER_TOP_SELECT', 'Rand oben' );
define( '_SW_BORDER_RIGHT_SELECT', 'Rand rechts' );
define( '_SW_BORDER_BOTTOM_SELECT', 'Rand unten' );
define( '_SW_BORDER_LEFT_SELECT', 'Rand links' );
define( '_SW_PADDING_SELECT', 'Padding' );
define( '_SW_MARGIN_SELECT', 'Einzug' );
define( '_SW_BACKGROUND_SELECT', 'Hintergrund' );
define( '_SW_TEXT_SELECT', 'Text' );
define( '_SW_FONT_SELECT', 'Schrift' );
define( '_SW_OFFSET_SELECT', 'Offsets' );
define( '_SW_DIMENSION_SELECT', 'Dimensionen' );
define( '_SW_EFFECT_SELECT', 'Spezialeffekte' );

define( '_SW_AUTO_SELECT', 'Gew�hlte Men�eintr�ge' );
define( '_SW_AUTO_ALL_SELECT', 'Alle Men�eintr�ge' );
define( '_SW_AUTO_TOP_SELECT', 'Top Men�eintr�ge' );
define( '_SW_AUTO_SUB_SELECT', 'Unter-Men�eintr�ge' );
define( '_SW_AUTO_FOLDER_SELECT', 'Ordner Men�eintr�ge' );
define( '_SW_AUTO_DOCUMENT_SELECT', 'Dokumenten Men�eintr�ge' );

define( '_SW_ATTRIBUTE_SELECT', 'W�hle ein Attribut zum bearbeiten' );
define( '_SW_ATTRIBUTE_IMAGE_SELECT', 'Bild' );
define( '_SW_ATTRIBUTE_OVER_IMAGE_SELECT', 'Mouse Over Bild' );
define( '_SW_ATTRIBUTE_SHOW_NAME_SELECT', 'Zeige Eintragtitel' );
define( '_SW_ATTRIBUTE_DONT_SHOW_NAME_SELECT', 'Zeige Eintragstitel nicht an' );
define( '_SW_ATTRIBUTE_IS_LINK_SELECT', 'Eintrag ist ein Link' );
define( '_SW_ATTRIBUTE_IS_NOT_LINK_SELECT', 'Eintrag ist kein Link' );
define( '_SW_ATTRIBUTE_SHOW_ITEM_SELECT', 'Zeige Men�eintrag' );
define( '_SW_ATTRIBUTE_DONT_SHOW_ITEM_SELECT', 'Zeige Men�eintrag nicht an' );
define( '_SW_ATTRIBUTE_IMAGE_LEFT_SELECT', 'Bild links anordnen' );
define( '_SW_ATTRIBUTE_IMAGE_RIGHT_SELECT', 'Bild rechts anordnen' );
define( '_SW_ATTRIBUTE_CSS_SELECT', 'Normal CSS' );
define( '_SW_ATTRIBUTE_OVER_CSS_SELECT', 'Mouse Over CSS' );


//Extra CSS text
define( '_SW_CSS', 'CSS' );
define( '_SW_CSS_OVER', 'Mouse Over CSS' );
define( '_SW_IMAGE', 'Bild' );
define( '_SW_IMAGE_OVER', 'Mouse Over Bild' );
define( '_SW_PREVIEW', 'Vorschau' );
define( '_SW_IMAGE_URL', 'Bild URL' );
define( '_SW_HSPACE', 'H Abstand' );
define( '_SW_VSPACE', 'V Abstand' );
define( '_SW_REPEAT', 'Wiederholung' );
define( '_SW_TEXT_DECORATION', 'Rand' );
define( '_SW_TEXT_TRANSFORM', 'Transform' );
define( '_SW_TEXT_INDENT', 'Zeileneinzug' );
define( '_SW_WHITE_SPACE', 'Leerzeichen' );
define( '_SW_FONT_STYLE', 'Schriftart' );

//tool tips
define( '_SW_STEP_1_TIP', 'W�hle die Men�eintr�ge auf die du die Einstellungen anwenden m�chtest.' );
define( '_SW_STEP_2_TIP', 'W�hle die Attribute die du �ndern m�chtest.' );
define( '_SW_STEP_3_TIP', 'Klicke auf anwenden um die ausgew�hlten Attribute auf die Eintr�ge anzuwenden.' );



//////////////////////////////
//Size Position & Offsets Page
/////////////////////////////
define( '_SW_POSITION_LABEL', 'Men�position und Orientierung' );
define( '_SW_SIZES_LABEL', 'Men�eintragsgr��e' );
define( '_SW_TOP_OFFSETS_LABEL', 'Men� Abstand' );
define( '_SW_SUB_OFFSETS_LABEL', 'Untermen� Abstand' );
define( '_SW_CLICK_DIMENSIONS_LABEL', 'Klicke f�r Men�dimensionen' );
define( '_SW_ALIGNMENT_LABEL', 'Men�ausrichtung' );
define( '_SW_WIDTHS_LABEL', 'Men�eintragsbreite' );
define( '_SW_HEIGHTS_LABEL', 'Men�eintragsh�he' );
define( '_SW_COMPLETE_PADDING_LABEL', 'Komplettes Men�padding' );

//tree menus
define( '_SW_OTHER_SETTINGS_LABEL', 'Sonstige Einstellungen' );
define( '_SW_TREE_WIDTH_LABEL', 'Men�breite' );
define( '_SW_FOLDER_LINKS', 'Ordner haben Links?' );
define( '_SW_USE_LINES', 'Benutze Linien?' );
define( '_SW_USE_ICONS', 'Benutze Icons?' );

define( '_SW_TOP_MENU', 'Men�' );
define( '_SW_SUB_MENU', 'Untermen�' );
define( '_SW_ALIGNMENT', 'Ausrichtungt' );
define( '_SW_POSITION', 'Position' );
define( '_SW_ORIENTATION', 'Orientierung' );
define( '_SW_ITEM_WIDTH', 'Breite' );
define( '_SW_ITEM_HEIGHT', 'H�he' );
define( '_SW_TOP_OFFSET', 'Oberer Abstand' );
define( '_SW_LEFT_OFFSET', 'Linker Abstand' );
define( '_SW_LEVEL', 'Level' );
define( '_SW_AUTOSIZE', '(gebe 0 ein f�r automatische Gr��e)' );
define( '_SW_TAB_MARGIN', 'Abstand zwischen Tabs' );


//////////////////////
//Fonts & Padding Page
/////////////////////
define( '_SW_FONT_FAMILY_LABEL', 'Schriftart' );
define( '_SW_FONT_SIZE_LABEL', 'Schriftgr��e' );
define( '_SW_FONT_ALIGNMENT_LABEL', 'Text Ausrichtung' );
define( '_SW_FONT_WEIGHT_LABEL', 'Schriftstil' );
define( '_SW_PADDING_LABEL', 'Einzug' );


define( '_SW_TOP', 'Oben' );
define( '_SW_RIGHT', 'Rechts' );
define( '_SW_BOTTOM', 'Unten' );
define( '_SW_LEFT', 'Links' );
define( '_SW_FONT_SIZE', 'Schriftgr��e' );
define( '_SW_FONT_ALIGNMENT', 'Text Ausrichtung' );
define( '_SW_FONT_WEIGHT', 'Schriftstil'  );
define( '_SW_PADDING', 'Einzug' );
define( '_SW_FONT_TIP', 'Alle Browser zeigen Schriftarten und Gr��en unterschiedlich an. Die Liste unten zeigt wie dein Browser die m�glichen Schriftarten und Gr��en dargestellt hat.' );

/////////////////////////
//Borders & Effects Page
////////////////////////
define( '_SW_BORDER_WIDTHS_LABEL', 'Randdicke' );
define( '_SW_BORDER_STYLES_LABEL', 'Randstil' );
define( '_SW_SPECIAL_EFFECTS_LABEL', 'Spezialeffekte' );

define( '_SW_OUTSIDE_BORDER', 'Au�enseitiger Rand' );
define( '_SW_INSIDE_BORDER', 'Innerer Rand' );
define( '_SW_NORMAL_BORDER', 'Rand' );
define( '_SW_OVER_BORDER', 'Mouse Over Rand' );
define( '_SW_WIDTH', 'Breite' );
define( '_SW_HEIGHT', 'H�he' );
define( '_SW_DIVIDER', 'Trenner' );
define( '_SW_STYLE', 'Style' );
define( '_SW_DELAY', '�ffnen/Schlie�en Verz�gerung' );
define( '_SW_OPACITY', 'Transparenz' );

///////////////////////////
//Colors & Backgrounds Page
///////////////////////////
define( '_SW_BACKGROUND_IMAGE_LABEL', 'Hintergrund Bilder' );
define( '_SW_BACKGROUND_COLOR_LABEL', 'Hintergrund Farben' );
define( '_SW_FONT_COLOR_LABEL', 'Schriftfarben' );
define( '_SW_BORDER_COLOR_LABEL', 'Randfarben' );

//tab menus
define( '_SW_TAB_ACTIVE', 'Aktiver Reiter' );
define( '_SW_TAB_TOP', 'Men� Reiter' );
define( '_SW_DIVIDER_COLOR', 'Farbe des Trenners' );

//tree menu
define( '_SW_ICONS_LABEL', 'Men� Icons' );
define( '_SW_ICON_TOP', 'Top Icon' );
define( '_SW_ICON_FOLDER', 'Ordner Icon' );
define( '_SW_ICON_FOLDER_OPEN', 'offener Ordner Icon' );
define( '_SW_ICON_DOCUMENT', 'Dokumenten Icon' );


define( '_SW_BACKGROUND', 'Hintergrund' );
define( '_SW_OVER_BACKGROUND', 'Mouse Over Hintergrund' );
define( '_SW_COLOR', 'Farbe' );
define( '_SW_OVER_COLOR', 'Mouse Over Farbe' );
define( '_SW_FONT', 'Schriftfarbe' );
define( '_SW_OVER_FONT', 'Mouse Over Schriftfarbe' );
define( '_SW_OUTSIDE_BORDER_COLOR', '�u�ere Randfarbe' );
define( '_SW_INSIDE_BORDER_COLOR', 'Innere Randfarbe' );
define( '_SW_NORMAL_BORDER_COLOR', 'Randfarbe' );
define( '_SW_OVER_BORDER_COLOR', 'Mouse Over Randfarbe' );
define( '_SW_GET', 'hole' );
define( '_SW_COLOR_TIP', 'W�hle eine Farbe vom Farbrad und klicke danach auf %s neben der Farbauswahl Box um die Farbe anzuwenden.');
define( '_SW_PRESENT_COLOR', 'aktuelle Farbe' );
define( '_SW_SELECTED_COLOR', 'ausgew�hlte Farbe' );


///////////////////////////
//Menu Module Settings Page
///////////////////////////
define( '_SW_MENU_SOURCE_LABEL', 'Men�quelle Einstellungen' );
define( '_SW_STYLE_SHEET_LABEL', 'Stylesheet Einstellungen' );
define( '_SW_AUTO_ITEM_LABEL', 'Automatische Men�eintr�ge' );
define( '_SW_CACHE_LABEL', 'Cache Einstellungen' );
define( '_SW_GENERAL_LABEL', 'Allgemeine Moduleinstellungen' );
define( '_SW_POSITION_ACCESS_LABEL', 'Position & Zugriff' );
define( '_SW_PAGES_LABEL', 'Zeige Men�modul auf folgenden Seiten' );
define( '_SW_CONDITIONS_LABEL', 'Bedingungen' );

//Select box text
define( '_SW_CSS_DYNAMIC_SELECT', 'Schreibe Stylesheet direkt in die Seite' );
define( '_SW_CSS_LINK_SELECT', 'Linke auf ein externes Stylesheet' );
define( '_SW_CSS_IMPORT_SELECT', 'Importiere ein externes Stylesheet' );
define( '_SW_CSS_NONE_SELECT', 'Verlinke kein Stylesheet' );

define( '_SW_SOURCE_CONTENT_SELECT', 'Nur Inhalte benutzen' );
define( '_SW_SOURCE_EXISTING_SELECT', 'existierendes Men� w�hlen');

define( '_SW_SHOW_TABLES_SELECT', 'Darstellung als Tabelle' );
define( '_SW_SHOW_BLOGS_SELECT', 'Darstellung als Blog' );

define( '_SW_10SECOND_SELECT', '10 Sekunden' );
define( '_SW_1MINUTE_SELECT', '1 Minute' );
define( '_SW_30MINUTE_SELECT', '30 Minuten' );
define( '_SW_1HOUR_SELECT', '1 Stunde' );
define( '_SW_6HOUR_SELECT', '6 Stunden' );
define( '_SW_12HOUR_SELECT', '12 Stunden' );
define( '_SW_1DAY_SELECT', '1 Tag' );
define( '_SW_3DAY_SELECT', '3 Tage' );
define( '_SW_1WEEK_SELECT', '1 Woche' );

//top tabs text
define( '_SW_MODULE_SETTINGS_TAB', 'Men�modul Einstellungen' );
define( '_SW_SIZE_OFFSETS_TAB', 'Gr��e, Position & Abst�nde' );
define( '_SW_COLOR_BACKGROUNDS_TAB', 'Farbe & Hintergr�nde' );
define( '_SW_FONTS_PADDING_TAB', 'Schriftart & Einzug' );
define( '_SW_BORDERS_EFFECTS_TAB', 'R�nder & Effekte' );
define( '_SW_IMAGES_CSS_TAB', 'Eintragsbilder & CSS' );
define( '_SW_TREE_SIZE_TAB', 'Gr��e & andere Einstellungen' );

//general text
define( '_SW_MENU_SOURCE', 'Men�quelle' );
define( '_SW_PARENT', 'Einstiegspunkt' );
define( '_SW_STYLE_SHEET', 'Lade Stylesheet' );
define( '_SW_CLASS_SFX', 'Modul Klassen Suffix' );
define( '_SW_HYBRID_MENU', 'Hybrid Men�' );
define( '_SW_TABLES_BLOGS', 'Verwende Tabellen/Blogs' );
define( '_SW_CACHE_ITEMS', 'Cache Men�eintr�ge' );
define( '_SW_CACHE_REFRESH', 'Cache Aktualisierungszeit' );
define( '_SW_SHOW_NAME', 'Zeige Modulnamen' );
define( '_SW_PUBLISHED', 'Ver�ffentlicht');
define( '_SW_ACTIVE_MENU', 'Aktives Men�' );
define( '_SW_MAX_LEVELS', 'Maximale Tiefe' );
define( '_SW_PARENT_LEVEL', 'Ausgangstiefe' );
define( '_SW_SELECT_HACK', 'Select Box Hack' );
define( '_SW_SUB_INDICATOR', 'Untermen� Symbol' );
define( '_SW_SHOW_SHADOW', 'Zeige Schatten' );
define( '_SW_MODULE_POSITION', 'Modul Position' );
define( '_SW_MODULE_ORDER', 'Modul Reihenfolge' );
define( '_SW_ACCESS_LEVEL', 'Zugriffslevel' );
define( '_SW_TEMPLATE', 'Template' );
define( '_SW_LANGUAGE', 'Sprache' );
define( '_SW_COMPONENT', 'Komponente' );

//tool tips
define( '_SW_MENU_SOURCE_TIP', 'W�hlen ein g�ltiges Men� als Quelle f�r die Men�eintr�ge dieses Men�s aus.' );
define( '_SW_PARENT_TIP', 'W�hlen einen Einstiegspunkt um eine Teilmenge des Men�s anzuzeigen. W�hle TOP um alle Eintr�ge anzuzeigen.' );
define( '_SW_STYLE_SHEET_TIP', '<b>In die Seite:</b> schreibt das Stylesheet direkt in das Dokument, welches das Modul aufruft.<br /><b>Extern verlinken: </b>linkt auf ein externes Stylesheet welches exportiert werden muss.<br /><b>�Nicht verlinken: </b> kopieren sie ihren eigenen Link zum externen Stylesheet in den Head Bereich ihres Templates. Das Men�modul wird dann komplett validiert.' );
define( '_SW_CLASS_SFX_TIP', 'Suffix f�r die CSS Klassen des Moduls. Kann verwendet werden um Konflikte zu vermeiden.' );
define( '_SW_HYBRID_MENU_TIP', 'Automatisches Anh�ngen von Inhaltsseiten an diese Men�. Die Eintr�ge m�ssen vom Typ Section/Category sein.' );
define( '_SW_TABLES_BLOGS_TIP', 'Zeige automatisch erstellte Eintr�ge als Tabellen oder Blogs.' );
define( '_SW_CACHE_ITEMS_TIP', 'Benutze einen Dateicache um die Men�eintr�ge zu cachen und die Geschwindigkeit zu verbessern. Besonders n�tzlich bei Hybriden Men�s mit vielen automatisch erstellten Eintr�ge (viele SQL Statements). Diese werden nurnoch einmal innerhalb des Cache Intevalls geladen.' );
define( '_SW_CACHE_REFRESH_TIP', 'Zeitintervall nachdem sich der Cache f�r die Men�eintr�ge aktualisiert.' );
define( '_SW_SHOW_NAME_TIP', 'Zeigt den Men�modulnamen.' );
define( '_SW_PUBLISHED_TIP', 'Ver�ffentlich oder unver�ffentlicht das Men�modul.');
define( '_SW_ACTIVE_MENU_TIP', 'Beh�lt den momentan ausgew�hlten Eintrag als aktiven Eintrag. So kann man erkennen, welche Seite man gerade besucht.' );
define( '_SW_MAX_LEVELS_TIP', 'Maximale Anzahl an Ebenen des Quellmen�s, welche dargestellt wird. W�hle 0 um alle Ebenen anzuzeigen.' );
define( '_SW_PARENT_LEVEL_TIP', 'Erweiterte Einstellung welche das Quellmen� bis zu einem gewissen Level zur�ckverfolgt. Normalerweise auf 0 gestellt.' );
define( '_SW_SELECT_HACK_TIP', 'Verwende einen Hack um die Darstellung von Untermen�s �ber Auswahlboxen  im Internet Explorer zu erm�glichen.' );
define( '_SW_SUB_INDICATOR_TIP', 'Zeigt einen kleinen Pfeil um anzuzeigen, das ein Men�eintrag noch weitere Untereintr�ge besitzt.' );
define( '_SW_SHOW_SHADOW_TIP', 'Zeigt einen Schatten um Untermen�s.' );
define( '_SW_MODULE_POSITION_TIP', 'Position des Men�moduls im Template.' );
define( '_SW_MODULE_ORDER_TIP', 'Reihenfolge des Men�moduls in der Templateposition.' );
define( '_SW_ACCESS_LEVEL_TIP', 'Zugriffslevel f�r das Men�modul.' );
define( '_SW_TEMPLATE_TIP', 'Das Men�modul wird nur bei folgenden Templates dargestellt.' );
define( '_SW_LANGUAGE_TIP', 'Das Men�modul wird nur in folgenden Sprachen dargestellt.' );
define( '_SW_COMPONENT_TIP', 'Das Men�modul wird nur bei folgenden Komponenten dargestellt.' );
define( '_SW_PAGES_TIP', 'W�hle die Seiten: <i>(halte STRG gedr�ckt w�hrend du mit der linken Maustaste Eintr�ge ausw�hlst um mehrere zu w�hlen.)</i>' );


?>