DROP TABLE IF EXISTS `Organization`;

CREATE TABLE IF NOT EXISTS `Organization` (
  `orgkeyid` smallint(9) NOT NULL AUTO_INCREMENT,
  `statuskeyid` smallint(9) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `email` varchar(255) NULL,
  `email_v` char(1) NOT NULL DEFAULT 'N',
  `phone` numeric(10) NULL,
  `org_url` varchar(2500) NULL,
  `create_date` datetime NOT NULL,
  `maint_date` timestamp NULL default NULL on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`orgkeyid`),
  FOREIGN KEY (`statuskeyid`) REFERENCES Status(`statuskeyid`) ON DELETE RESTRICT
) AUTO_INCREMENT = 1;
