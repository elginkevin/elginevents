DROP TABLE IF EXISTS `User`;

CREATE TABLE IF NOT EXISTS `User` (
  `userkeyid` smallint(9) NOT NULL AUTO_INCREMENT,
  `statuskeyid` smallint(9) NOT NULL DEFAULT 1,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(30) NULL,
  `email_primary` varchar(255) NOT NULL,
  `email_primary_v` char(1) NOT NULL DEFAULT 'N',
  `email_other` varchar(255) NULL,
  `email_other_v` char(1) NOT NULL DEFAULT 'N',
  `phone_mobile` numeric(10) NULL,
  `phone_other` numeric(10) NULL,
  `passhash` varchar(255) NOT NULL,
  `passsalt` varchar(16) NOT NULL,
  `create_date` datetime NOT NULL,
  `maint_date` timestamp NULL default NULL on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`userkeyid`),
  UNIQUE KEY `email_primary` (`email_primary`),
  FOREIGN KEY (`statuskeyid`) REFERENCES Status(`statuskeyid`) ON DELETE RESTRICT
) AUTO_INCREMENT = 1;
