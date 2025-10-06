DROP TABLE IF EXISTS `Category`;

CREATE TABLE IF NOT EXISTS `Category` (
  `catkeyid` smallint(9) NOT NULL AUTO_INCREMENT,
  `statuskeyid` smallint(9) NOT NULL,
  `description` varchar(30) NOT NULL,
  `create_date` datetime NOT NULL,
  `maint_date` timestamp NULL default NULL on update CURRENT_TIMESTAMP,
  PRIMARY KEY (`catkeyid`),
  FOREIGN KEY (`statuskeyid`) REFERENCES Status(`statuskeyid`) ON DELETE RESTRICT
) AUTO_INCREMENT = 1;
 
INSERT INTO `Category` (statuskeyid,description,create_date)
       VALUES (1,'Default',NOW());
