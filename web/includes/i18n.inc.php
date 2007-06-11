<?php
/**
 * (c) 2004-2007 Linbox / Free&ALter Soft, http://linbox.com
 *
 * $Id$
 *
 * This file is part of LMC.
 *
 * LMC is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * LMC is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with LMC; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>
<?php

/**
 * provide internationalization for the whole program
 */



if (!function_exists('_T')) {
    /**
    * alias for dgettext
    * if domain not specify, use $_GET['module'] instead
    **/
    function _T($var,$domain = null) {
        if ($domain == null) {
            $domain = $_GET['module'];
        }
        return dgettext($domain,$var);
    }

    /**
     * return supported locales as an array
     */
    function getArrLocale() {
        $res = array("C" => "english",
                     "fr_FR.utf8" => "french",
                     "es_ES.utf8" => "spanish",
                     "nb_NO.utf8" => "norwegian");
        return $res;
    }
}

// Set language
if (!$_SESSION['lang']) {
    if (!$_COOKIE['lang']) {
        $_SESSION['lang'] = 'C';
    } else {
        $_SESSION['lang'] = $_COOKIE['lang'];
    }

}



setlocale(LC_ALL, $_SESSION['lang']);

if (!is_array($_SESSION["supportModList"])) { //if supportModList not available
					      //ex: not logged
	$_SESSION["supportModList"] = array();
}

foreach ($_SESSION["supportModList"] as $mod) { //bind all supported mod list for
                                                //dgettext function and _T() alias
    bindtextdomain ($mod, "./modules/$mod/locale");
}

textdomain ("base"); //define default domain for gettext and _() alias

?>
