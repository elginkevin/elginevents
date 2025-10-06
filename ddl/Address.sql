DROP TABLE IF EXISTS `Address`;

CREATE TABLE IF NOT EXISTS `Address` (
  `addresskeyid` smallint(9) NOT NULL AUTO_INCREMENT,
  `statuskeyid` smallint(9) NOT NULL,
  `address_street` varchar(50) NULL,
  `address_city` varchar(50) NULL,
  `address_state` char(2) NULL,
  `address_zip` char(5) NULL,
  `create_date` datetime NOT NULL,
  `maint_date` timestamp NULL default NULL on update CURRENT_TIMESTAMP,
  PRIMARY KEY (`addresskeyid`),
  FOREIGN KEY (`statuskeyid`) REFERENCES Status(`statuskeyid`) ON DELETE RESTRICT
) AUTO_INCREMENT = 1;
