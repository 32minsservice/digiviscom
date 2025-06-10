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
 * @package        block_lambdacb
 * @copyright      2024 redPIthemes
 * @fr translation Dominique-Alain Jan
 */

$string['pluginname'] = 'Bloc de contenu Lambda';
$string['no_blocktype'] = '<i class="lambda icon-settings" aria-hidden="true"></i> Cliquez sur l\'icône de modification pour configurer les paramètres.';

//Block Type
$string['block_type'] = 'Type de bloc';
$string['block_type_00'] = 'non défini';
$string['block_type_01'] = 'Texte et média';
$string['block_type_02'] = 'Diaporama';
$string['block_type_03'] = 'Carrousel';
$string['block_type_04'] = 'Contacts du cours';
$string['block_type_05'] = 'Galerie d\'images';

//Editor
$string['content'] = 'Éditeur de texte';

//Text and Media - Background Image
$string['header_bg'] = 'Paramètre d\'arrière-plan';
$string['block_bgcolor'] = 'Couleur d\'arrière-plan';
$string['block_bgimage'] = 'Image d\'arrière-plan';
$string['block_bgimage_style'] = 'Propriété de l\'image d\'arrière-plan';
$string['block_bgimage_style_01'] = 'contenir';
$string['block_bgimage_style_02'] = 'couvrir';
$string['block_bgimage_style_03'] = 'répéter';
$string['block_bgimage_style_04'] = 'parallaxe';
$string['block_bgimage_posx'] = 'Position horizontale de l\'image';
$string['block_bgimage_posy'] = 'Position verticale de l\'image';
$string['block_bgimage_pos_center'] = 'centré';
$string['block_bgimage_pos_top'] = 'en haut';
$string['block_bgimage_pos_bottom'] = 'en bas';
$string['block_bgimage_pos_left'] = 'à gauche';
$string['block_bgimage_pos_right'] = 'à droite';
$string['block_border_radius'] = 'Rayon de la bordure';
$string['block_img_opacity'] = 'Opacité de l\'image d\'arrière-plan';

//Text and Media - Width & Margins
$string['header_width'] = 'Largeur &amp; marges';
$string['block_fullwidth'] = 'Largeur de la page';
$string['block_px'] = 'Espacement horizontal interne (remplissage)';
$string['block_py'] = 'Espacement vertical interne (remplissage)';
$string['block_my'] = 'Espacement vertical externe (marges)';

//Slideshow - General Settings
$string['header_slideshow'] = 'Paramètres du diaporama';
$string['block_slideshowratio'] = 'Ratio des images';
$string['block_slideshownav'] = 'Style de navigation du diaporama';
$string['block_slideshownav_01'] = 'Flèches (toujours visibles)';
$string['block_slideshownav_02'] = 'Flèches (afficher au survol)';
$string['block_slideshownav_03'] = 'Pagination par puces';
$string['block_slideshowanim'] = 'Effet de transition';
$string['block_slideshowanim_01'] = 'glissement';
$string['block_slideshowanim_02'] = 'estompage';
$string['block_slideshowanim_03'] = 'échelle';
$string['block_slideshowanim_04'] = 'pousser';
$string['block_slideshowautoplay'] = 'Lancer automatiquement';
$string['block_slideshowautoplaytxt'] = 'activer les animations automatiques';
$string['block_slideshowinterval'] = 'Intervalle entre les animations';

//Slider - General Settings
$string['header_slider'] = 'Paramètres du carrousel';
$string['block_slidergap'] = 'Intervalle';
$string['block_slidergaptxt'] = 'appliquer un intervalle entre chaque élément du carrousel';
$string['block_sliderset'] = 'Jeu de diapositives';
$string['block_slidernav'] = 'Style de navigation';
$string['block_slidernav_01'] = 'Flèches (toujours visibles)';
$string['block_slidernav_02'] = 'Flèches (afficher au survol)';
$string['block_slidernav_03'] = 'Navigation en dehors';
$string['block_slidercontent'] = 'Contenu/Style du recouvrement';
$string['block_slidercontent_01'] = 'Toujours visible (texte en blanc)';
$string['block_slidercontent_02'] = 'Toujours visible (texte en couleur foncée)';
$string['block_slidercontent_03'] = 'Toujours visible (superposition claire)';
$string['block_slidercontent_04'] = 'Toujours visible (superposition foncée)';
$string['block_slidercontent_05'] = 'Toujours visible (superposition dans la couleur principale)';
$string['block_slidercontent_06'] = 'Visible au survol (texte en blanc)';
$string['block_slidercontent_08'] = 'Visible au survol (superposition claire)';
$string['block_slidercontent_09'] = 'Visible au survol (superposition foncée)';
$string['block_slidercontent_10'] = 'Visible au survol (superposition dans la couleur principale)';
$string['block_slidercontent_11'] = 'Contenu en dessous de l\'image de la diapositive';

//Slides
$string['block_slides'] = 'Nombre de diapositives';
$string['header_slide'] = 'Diapositive';
$string['block_slide_image'] = 'Image';
$string['block_slide_heading'] = 'En-tête';
$string['block_slide_txt'] = 'Texte';
$string['block_overlaypos'] = 'Position du contenu';
$string['block_overlaypos_01'] = 'Centré';
$string['block_overlaypos_02'] = 'En bas';
$string['block_overlaypos_03'] = 'Superposition à gauche';
$string['block_overlaypos_04'] = 'Superposition à droite';
$string['block_overlaypos_05'] = 'Superposition en bas';
$string['block_overlaypos_06'] = 'Superposition en bas à droite';
$string['block_overlaystyle'] = 'Style du contenu';
$string['block_overlaystyle_01'] = 'Clair';
$string['block_overlaystyle_02'] = 'Foncé';
$string['block_slide_btntxt'] = 'Bouton - Texte';
$string['block_slide_btnurl'] = 'Bouton - URL';

//Course contacts
$string['header_contacts'] = 'Paramètres des contacts du cours';
$string['block_contactroles'] = 'Afficher ces rôles';
$string['block_contactrolesdesc'] = 'Ce paramètre vous permet de contrôler quels utilisateurs apparaissent dans le type de bloc <em>Contacts du cours</em>. Les utilisateurs doivent avoir au moins l\'un des rôles suivants dans un cours pour apparaître dans le bloc.';
$string['block_contactlink'] = 'Ajouter un lien vers la page du profil';
$string['block_contactlinkdesc'] = 'Cochez cette case pour ajouter un lien vers la page de profil des utilisateurs qui apparaissent dans ce bloc.';

//Gallery
$string['header_gallery'] = 'Paramètre de la galerie d\'images';
$string['block_gallery_imgages'] = 'Images de la galerie';