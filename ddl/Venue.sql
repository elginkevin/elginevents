DROP TABLE IF EXISTS `Venue`;

CREATE TABLE IF NOT EXISTS `Venue` (
  `venuekeyid` smallint(9) NOT NULL AUTO_INCREMENT,
  `statuskeyid` smallint(9) NOT NULL,
  `venue_name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `email` varchar(255) NULL,
  `email_v` char(1) NOT NULL DEFAULT 'N',
  `phone` numeric(10) NULL,
  `url` varchar(2500) NULL,
  `create_date` datetime NOT NULL,
  `maint_date` timestamp NULL default NULL on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`venuekeyid`),
  FOREIGN KEY (`statuskeyid`) REFERENCES Status(`statuskeyid`) ON DELETE RESTRICT
) AUTO_INCREMENT = 1;
