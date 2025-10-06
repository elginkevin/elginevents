DROP TABLE IF EXISTS `Event`;

CREATE TABLE IF NOT EXISTS `Event` (
  `eventkeyid` bigint(20) NOT NULL AUTO_INCREMENT,
  `userkeyid` smallint(9) NOT NULL,
  `orgkeyid` smallint(9) NOT NULL,
  `catkeyid` smallint(9) NOT NULL,
  `statuskeyid` smallint(9) NOT NULL,
  `venuekeyid` smallint(9) NULL,
  `event_name` varchar(50) NOT NULL,
  `event_descr` varchar(255) NOT NULL,
  `email` varchar(255) NULL,
  `email_v` char(1) NOT NULL DEFAULT 'N',
  `phone` varchar(20) NULL,
  `event_url` varchar(2500) NULL,
  `event_start` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `source_url` varchar(2500) NULL,
  `create_date` datetime NOT NULL,
  `maint_date` timestamp NULL default NULL on update CURRENT_TIMESTAMP,
  PRIMARY KEY (`eventkeyid`),
  FOREIGN KEY (`userkeyid`) REFERENCES User(`userkeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`orgkeyid`) REFERENCES Organization(`orgkeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`catkeyid`) REFERENCES Category(`catkeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`statuskeyid`) REFERENCES Status(`statuskeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`venuekeyid`) REFERENCES Venue(`venuekeyid`) ON DELETE RESTRICT
) AUTO_INCREMENT = 1;
