DROP TABLE IF EXISTS `Status`;

CREATE TABLE IF NOT EXISTS `Status` (
  `statuskeyid` smallint(9) NOT NULL AUTO_INCREMENT,
  `description` varchar(30) NOT NULL,
  `create_date` datetime NOT NULL,
  `maint_date` timestamp NULL default NULL on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`statuskeyid`)
) AUTO_INCREMENT = 1;
 
INSERT INTO Status (description,create_date)
       VALUES ('Unverified',NOW());
