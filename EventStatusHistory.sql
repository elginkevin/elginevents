DROP TABLE IF EXISTS `EventStatusHistory`;

CREATE TABLE IF NOT EXISTS `EventStatusHistory` (
  `eventkeyid` smallint(9) NOT NULL,
  `statuskeyid` smallint(9) NOT NULL,
  `userkeyid` smallint(9) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY  (`eventkeyid`,`statuskeyid`),
  FOREIGN KEY (`eventkeyid`) REFERENCES Event(`eventkeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`statuskeyid`) REFERENCES Status(`statuskeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`userkeyid`) REFERENCES User(`userkeyid`) ON DELETE RESTRICT
);
