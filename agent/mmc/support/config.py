#!/usr/bin/python
# -*- coding: utf-8; -*-
#
# (c) 2004-2007 Linbox / Free&ALter Soft, http://linbox.com
# (c) 2007 Mandriva, http://www.mandriva.com/
#
# $Id$
#
# This file is part of Mandriva Management Console (MMC).
#
# MMC is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# MMC is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with MMC; if not, write to the Free Software
# Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

import mmctools
from ConfigParser import *

class ConfigException(Exception):
    pass

class PluginConfig(ConfigParser):

    def __init__(self, name, conffile = None):
        ConfigParser.__init__(self)
        if not conffile: self.conffile = mmctools.getConfigFile(name)
        else: self.conffile = conffile
        self.setDefault()
        fp = file(self.conffile, "r")
        self.readfp(fp, self.conffile)
        self.readConf()

    def readConf(self):
        """Read the configuration file"""
        try: self.disabled = self.getboolean("main", "disable")
        except NoSectionError, NoOptionError: pass

    def setDefault(self):
        """Set reasonable default"""
        self.disabled = True

    def check(self):
        """
        Check the values set in the configuration file.

        Must be implemented by the subclass.
        ConfigException is raised with a corresponding error string if a check
        fails.
        """
        pass