<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *
 * @package   block_lambdacb
 * @copyright 2024 redPIthemes
 *
 */

$string['pluginname'] = 'Lambda Content Block';
$string['no_blocktype'] = '<i class="lambda icon-settings" aria-hidden="true"></i> Bitte klicken Sie auf das Bearbeitungssymbol, um die Einstellungen zu konfigurieren.';

//Block Type
$string['block_type'] = 'Blocktyp';
$string['block_type_00'] = 'nicht definiert';
$string['block_type_01'] = 'Text und Medien';
$string['block_type_02'] = 'Diashow';
$string['block_type_03'] = 'Slider';
$string['block_type_04'] = 'Kurskontakte';
$string['block_type_05'] = 'Bildergalerie';

//Editor
$string['content'] = 'Texteditor';

//Text und Medien - Hintergrundbild
$string['header_bg'] = 'Hintergrundeinstellungen';
$string['block_bgcolor'] = 'Hintergrundfarbe';
$string['block_bgimage'] = 'Hintergrundbild';
$string['block_bgimage_style'] = 'Eigenschaft des Hintergrundbildes';
$string['block_bgimage_style_01'] = 'enthalten';
$string['block_bgimage_style_02'] = 'abdecken';
$string['block_bgimage_style_03'] = 'wiederholen';
$string['block_bgimage_style_04'] = 'Parallax';
$string['block_bgimage_posx'] = 'Horizontale Bildposition';
$string['block_bgimage_posy'] = 'Vertikale Bildposition';
$string['block_bgimage_pos_center'] = 'zentrieren';
$string['block_bgimage_pos_top'] = 'oben';
$string['block_bgimage_pos_bottom'] = 'unten';
$string['block_bgimage_pos_left'] = 'links';
$string['block_bgimage_pos_right'] = 'rechts';
$string['block_border_radius'] = 'abgerundeter Rand';
$string['block_img_opacity'] = 'Deckkraft Hintergrundbild';

//Text und Medien - Breite &amp; R&auml;nder
$string['header_width'] = 'Breite &amp; R&auml;nder';
$string['block_fullwidth'] = 'Seitenbreite';
$string['block_px'] = 'Horizontale Innenabst&auml;nde (Padding)';
$string['block_py'] = 'Vertikale Innenabst&auml;nde (Padding)';
$string['block_my'] = 'Vertikale Au&szlig;enabst&auml;nde (Margin)';

//Diashow - Allgemeine Einstellungen
$string['header_slideshow'] = 'Diashow-Einstellungen';
$string['block_slideshowratio'] = 'Bildverh&auml;ltnis';
$string['block_slideshownav'] = 'Navigationsstil der Diashow';
$string['block_slideshownav_01'] = 'Pfeile (immer sichtbar)';
$string['block_slideshownav_02'] = 'Pfeile (bei Hover anzeigen)';
$string['block_slideshownav_03'] = 'Punktnavigation';
$string['block_slideshowanim'] = '&Uuml;bergangseffekt';
$string['block_slideshowanim_01'] = 'gleiten';
$string['block_slideshowanim_02'] = 'verblassen';
$string['block_slideshowanim_03'] = 'skalieren';
$string['block_slideshowanim_04'] = 'aufziehen';
$string['block_slideshowautoplay'] = 'Automatische Wiedergabe';
$string['block_slideshowautoplaytxt'] = 'automatische Wiedergabe aktivieren';
$string['block_slideshowinterval'] = 'Intervall f&uuml;r automatische Wiedergabe';

//Slider - Allgemeine Einstellungen
$string['header_slider'] = 'Slider-Einstellungen';
$string['block_slidergap'] = 'Abstand';
$string['block_slidergaptxt'] = 'einen Abstand zwischen den Slider-Elementen anwenden';
$string['block_sliderset'] = 'Anzahl Bilder pro Set';
$string['block_slidernav'] = 'Navigationsstil';
$string['block_slidernav_01'] = 'Pfeile (immer sichtbar)';
$string['block_slidernav_02'] = 'Pfeile (bei Hover anzeigen)';
$string['block_slidernav_03'] = 'Navigation au&szlig;erhalb';
$string['block_slidercontent'] = 'Inhalts-/Overlay-Stil';
$string['block_slidercontent_01'] = 'Immer sichtbar (wei&szlig;e Textfarbe)';
$string['block_slidercontent_02'] = 'Immer sichtbar (dunkle Textfarbe)';
$string['block_slidercontent_03'] = 'Immer sichtbar (helles Overlay)';
$string['block_slidercontent_04'] = 'Immer sichtbar (dunkles Overlay)';
$string['block_slidercontent_05'] = 'Immer sichtbar (Overlay in Hauptfarbe)';
$string['block_slidercontent_06'] = 'Bei Hover sichtbar (wei&szlig;e Textfarbe)';
$string['block_slidercontent_07'] = 'Bei Hover sichtbar (dunkle Textfarbe)';
$string['block_slidercontent_08'] = 'Bei Hover sichtbar (helles Overlay)';
$string['block_slidercontent_09'] = 'Bei Hover sichtbar (dunkles Overlay)';
$string['block_slidercontent_10'] = 'Bei Hover sichtbar (Overlay in Hauptfarbe)';
$string['block_slidercontent_11'] = 'Inhalt unter dem Slide-Bild';

//Slides
$string['block_slides'] = 'Anzahl der Slides';
$string['header_slide'] = 'Slide';
$string['block_slide_image'] = 'Bild';
$string['block_slide_heading'] = '&Uuml;berschrift';
$string['block_slide_txt'] = 'Text';
$string['block_overlaypos'] = 'Bildtext - Position';
$string['block_overlaypos_01'] = 'Zentriert';
$string['block_overlaypos_02'] = 'Unten';
$string['block_overlaypos_03'] = 'Overlay links';
$string['block_overlaypos_04'] = 'Overlay rechts';
$string['block_overlaypos_05'] = 'Overlay unten';
$string['block_overlaypos_06'] = 'Overlay unten rechts';
$string['block_overlaystyle'] = 'Bildtext - Stil';
$string['block_overlaystyle_01'] = 'Hell';
$string['block_overlaystyle_02'] = 'Dunkel';
$string['block_slide_btntxt'] = 'Schaltfl&auml;che - Beschriftung';
$string['block_slide_btnurl'] = 'Schaltfl&auml;che - URL';

//Kurskontakte
$string['header_contacts'] = 'Einstellungen f&uuml;r Kurskontakte';
$string['block_contactroles'] = 'Diese Rollen anzeigen';
$string['block_contactrolesdesc'] = 'Diese Einstellung erm&ouml;glicht es Ihnen zu steuern, welche Benutzer im Block <em>Kurskontakte</em> angezeigt werden. Benutzer m&uuml;ssen mindestens eine dieser Rollen in einem Kurs haben, um im Block angezeigt zu werden.';
$string['block_contactlink'] = 'Link zur Profilseite hinzuf&uuml;gen';
$string['block_contactlinkdesc'] = 'Aktivieren Sie dieses Kontrollk&auml;stchen, um einen Link zur Profilseite der Benutzer hinzuzuf&uuml;gen, die in diesem Block angezeigt werden.';

//Galerie
$string['header_gallery'] = 'Galerie-Einstellungen';
$string['block_gallery_imgages'] = 'Galerie-Bilder';