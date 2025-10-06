DROP TABLE IF EXISTS `UserAddress`;

CREATE TABLE IF NOT EXISTS `UserAddress` (
  `userkeyid` smallint(9) NOT NULL,
  `addresskeyid` smallint(9) NOT NULL,
  `typekeyid` smallint(9) NOT NULL,
  `statuskeyid` smallint(9) NOT NULL,
  `create_date` datetime NOT NULL,
  `maint_date` timestamp NULL default NULL on update CURRENT_TIMESTAMP,
  PRIMARY KEY (`userkeyid`,`addresskeyid`),
  FOREIGN KEY (`userkeyid`) REFERENCES User(`userkeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`addresskeyid`) REFERENCES Address(`addresskeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`typekeyid`) REFERENCES Type(`typekeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`statuskeyid`) REFERENCES Status(`statuskeyid`) ON DELETE RESTRICT
);
