DROP TABLE IF EXISTS `Type`;

CREATE TABLE IF NOT EXISTS `Type` (
  `typekeyid` smallint(9) NOT NULL AUTO_INCREMENT,
  `statuskeyid` smallint(9) NOT NULL,
  `description` varchar(30) NOT NULL,
  `create_date` datetime NOT NULL,
  `maint_date` timestamp NULL default NULL on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`typekeyid`),
  FOREIGN KEY (`statuskeyid`) REFERENCES Status(`statuskeyid`) ON DELETE RESTRICT
) AUTO_INCREMENT = 1;
 
INSERT INTO Type (description,statuskeyid,create_date)
       VALUES ('Default',1,NOW());
