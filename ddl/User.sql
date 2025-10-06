DROP TABLE IF EXISTS `User`;

CREATE TABLE IF NOT EXISTS `User` (
  `userkeyid` smallint(9) NOT NULL AUTO_INCREMENT,
  `statuskeyid` smallint(9) NOT NULL DEFAULT 1,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(30) NULL,
  `email_primary` varchar(255) NOT NULL,
  `email_primary_v` char(1) NOT NULL DEFAULT 'N',
  `email_primary_hash` varchar(32) NULL,
  `email_other` varchar(255) NULL,
  `email_other_v` char(1) NOT NULL DEFAULT 'N',
  `email_other_hash` varchar(32) NULL,
  `phone_mobile` varchar(20) NULL,
  `phone_other` varchar(20) NULL,
  `passhash` varchar(256) NOT NULL,
  `passsalt` varchar(32) NOT NULL,
  `resethash` varchar(32) NULL,
  `create_date` datetime NOT NULL,
  `maint_date` timestamp NULL default NULL on update CURRENT_TIMESTAMP,
  PRIMARY KEY (`userkeyid`),
  UNIQUE KEY `email_primary` (`email_primary`),
  FOREIGN KEY (`statuskeyid`) REFERENCES Status(`statuskeyid`) ON DELETE RESTRICT
) AUTO_INCREMENT = 1;
