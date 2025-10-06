DROP TABLE IF EXISTS `EventCategory`;

CREATE TABLE IF NOT EXISTS `EventCategory` (
  `eventkeyid` smallint(9) NOT NULL,
  `catkeyid` smallint(9) NOT NULL,
  `statuskeyid` smallint(9) NOT NULL,
  `create_date` datetime NOT NULL,
  `maint_date` timestamp NULL default NULL on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`eventkeyid`,`catkeyid`),
  FOREIGN KEY (`eventkeyid`) REFERENCES Event(`eventkeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`catkeyid`) REFERENCES Category(`catkeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`statuskeyid`) REFERENCES Status(`statuskeyid`) ON DELETE RESTRICT
);
