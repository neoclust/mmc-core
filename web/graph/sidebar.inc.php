<?php
/**
 * (c) 2004-2007 Linbox / Free&ALter Soft, http://linbox.com
 * (c) 2007 Mandriva, http://www.mandriva.com
 *
 * $Id$
 *
 * This file is part of Mandriva Management Console (MMC).
 *
 * MMC is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * MMC is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with MMC; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>
<?php
/* $Id$ */

?>

<div id="help">
    help here
</div>

<div id="sidebar">
<?php
echo "<ul class=\"" . $sidebar["class"] . "\">\n";

foreach ($sidebar["content"] as $item) {
    /* Verify ACL before making the sidebar item */
    $arrUrl = parse_url($item["link"]);    
    /* Replace ampersand entity char */
    $arrUrl = str_replace("&amp;", "&", $arrUrl);
    foreach(split('&amp;', $arrUrl["query"]) as $arg) {
        list($key,$value) = split('=',$arg);
        /* Storing arg in an array */
        $arrArg[$key] = $value;
    }
    if (hasCorrectAcl($arrArg["module"], $arrArg["submod"], $arrArg["action"])) {
        echo "<li id=\"" . $item["id"] . "\">";
        echo "<a href=\"" . $root . $item["link"] . "\" target=\"_self\">" . $item["text"] . "</a></li>\n";
    }
}
?>

</ul>
</div>


