DROP TABLE IF EXISTS `OrganizationStatusHistory`;

CREATE TABLE IF NOT EXISTS `OrganizationStatusHistory` (
  `orgkeyid` smallint(9) NOT NULL,
  `statuskeyid` smallint(9) NOT NULL,
  `userkeyid` smallint(9) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`orgkeyid`,`statuskeyid`,`userkeyid`),
  FOREIGN KEY (`orgkeyid`) REFERENCES Organization(`orgkeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`statuskeyid`) REFERENCES Status(`statuskeyid`) ON DELETE RESTRICT,
  FOREIGN KEY (`userkeyid`) REFERENCES User(`userkeyid`) ON DELETE RESTRICT
);
