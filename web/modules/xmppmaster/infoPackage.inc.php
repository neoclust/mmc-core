<?php
/**
 * (c) 2015-2016 Siveo, http://www.siveo.net
 *
 * $Id$
 *
 * This file is part of MMC, http://www.siveo.net
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

/**
 * module declaration
 */
require_once("modules/pulse2/version.php");

$mod = new Module("xmppmaster");
$mod->setVersion(VERSION);
$mod->setRevision(REVISION);
$mod->setDescription(_T("xmppmaster", "xmppmaster"));
$mod->setAPIVersion("0:0:0");
$mod->setPriority(800);

$submod = new SubModule("xmppmaster");
$submod->setImg('modules/xmppmaster/img/navbar/xmppmaster');
$submod->setDescription(_T("Audit", "xmppmaster"));

$submod->setDefaultPage("xmppmaster/xmppmaster/index");

$page = new Page("index", _T('xmppmaster status', 'xmppmaster'));
$submod->addPage($page);

$page = new Page("auditdeploy", _T('XMPP audit', 'xmppmaster'));
$submod->addPage($page);

$page = new Page("consolexmpp", _T('XMPP Console', 'xmppmaster'));
$submod->addPage($page);



$page = new Page("consolecomputerxmpp", _T('XMPP Console', 'xmppmaster'));
$submod->addPage($page);

$page = new Page("wakeonlan", _T('Wake on LAN', 'xmppmaster'));
$submod->addPage($page);
// ajax procedure read and send result from log
$page = new Page("ajaxdeploylog");
$page->setFile("modules/xmppmaster/xmppmaster/ajaxdeploylog.php");
$page->setOptions(array("AJAX" => True, "visible" => False));
$submod->addPage($page);




$page = new Page("deployquick", _T("action deploy quick", "xmppmaster"));
$page->setFile("modules/xmppmaster/xmppmaster/deployquick.php");
$page->setOptions(array("visible" => False, "noHeader" => True));
$submod->addPage($page);

$page = new Page("actionwakeonlan");
$page->setFile("modules/xmppmaster/xmppmaster/actionwakeonlan.php");
$page->setOptions(array("AJAX" => True, "visible" => False));
$submod->addPage($page);
    
$page = new Page("actioninventory");
$page->setFile("modules/xmppmaster/xmppmaster/actioninventory.php");
$page->setOptions(array("AJAX" => True, "visible" => False));
$submod->addPage($page);


$page = new Page("actionrestart");
$page->setFile("modules/xmppmaster/xmppmaster/actionrestart.php");
$page->setOptions(array("AJAX" => True, "visible" => False));
$submod->addPage($page);


$page = new Page("actionshutdown");
$page->setFile("modules/xmppmaster/xmppmaster/actionshutdown.php");
$page->setOptions(array("AJAX" => True, "visible" => False));
$submod->addPage($page);






// ajax procedure read and send result from log
$page = new Page("viewlogs");
$page->setFile("modules/xmppmaster/xmppmaster/logs/viewlogs.php");
//$page->setOptions(array("AJAX" => True, "visible" => False));
$submod->addPage($page);

$page = new Page("ajaxstatusxmpp",_T("List all groups of computers","xmppmaster"));
$page->setFile("modules/xmppmaster/xmppmaster/ajaxstatusxmpp.php");
$page->setOptions(array("visible"=>False, "AJAX" =>True));
$submod->addPage($page);

$page = new Page("ajaxstatusxmppscheduler",_T("List computer deploy","xmppmaster"));
$page->setFile("modules/xmppmaster/xmppmaster/ajaxstatusxmppscheduler.php");
$page->setOptions(array("visible"=>False, "AJAX" =>True));
$submod->addPage($page);

$mod->addSubmod($submod);

$MMCApp =& MMCApp::getInstance();
$MMCApp->addModule($mod);


?>
