DROP TABLE IF EXISTS `UserOrganization`;

CREATE TABLE IF NOT EXISTS `UserOrganization` (
  `userkeyid` smallint(9) NOT NULL,
  `orgkeyid` smallint(9) NOT NULL,
  `rolekeyid` smallint(9) NOT NULL,
  `statuskeyid` smallint(9) NOT NULL,
  `create_date` datetime NOT NULL,
  `maint_date` timestamp NULL default NULL on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`userkeyid`,`orgkeyid`),
  FOREIGN KEY (`userkeyid`) REFERENCES User(`userkeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`orgkeyid`) REFERENCES Organization(`orgkeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`rolekeyid`) REFERENCES Role(`rolekeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`statuskeyid`) REFERENCES Status(`statuskeyid`) ON DELETE RESTRICT
);
