<?php
/* Copyright (C) 2026 MMI Mathieu Moulin <contact@iprospective.fr>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 * \file    mmicommon/lib/mmi_home.lib.php
 * \brief   Gabarit partage des pages d'accueil des modules MMI (RM3579).
 */

/**
 * Affiche l'entete d'une page d'accueil (titre + onglets).
 *
 * @param string $title  Titre de la page (traduit)
 * @param array  $tabs   ref => array('url'=>..., 'label'=>...)
 * @param string $active Ref de l'onglet actif
 * @return void
 */
function MMIHomeHeader($title, $tabs, $active)
{
	llxHeader('', $title);

	print load_fiche_titre($title, '', '');

	$head = array();
	$h = 0;
	foreach ($tabs as $ref => $tab) {
		$head[$h][0] = $tab['url'];
		$head[$h][1] = $tab['label'];
		$head[$h][2] = $ref;
		$h++;
	}
	print dol_get_fiche_head($head, $active, $title, 0, '');
}

/**
 * Affiche le pied de page.
 *
 * @return void
 */
function MMIHomeFooter()
{
	print dol_get_fiche_end();
	llxFooter();
}

/**
 * Rend une liste de liens rapides.
 *
 * @param array  $links label => url
 * @param string $title Titre du bloc (traduit, optionnel)
 * @return string
 */
function MMIHomeLinks($links, $title = '')
{
	$out = '';
	if ($title) {
		$out .= '<h3>'.dol_escape_htmltag($title).'</h3>';
	}
	$out .= '<ul class="mmihome-links">';
	foreach ($links as $label => $url) {
		$out .= '<li><a href="'.dol_escape_htmltag($url).'">'.dol_escape_htmltag($label).'</a></li>';
	}
	$out .= '</ul>';
	return $out;
}

/**
 * Rend un bloc de contenu.
 *
 * @param string $title Titre du bloc (traduit)
 * @param string $html  Contenu
 * @return string
 */
function MMIHomeBlock($title, $html)
{
	return '<div class="mmihome-block"><h3>'.dol_escape_htmltag($title).'</h3>'.$html.'</div>';
}
