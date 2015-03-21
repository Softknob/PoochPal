CREATE TABLE `dog_table` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `lat` decimal(12,8) DEFAULT NULL,
  `lon` decimal(12,8) DEFAULT NULL,
  `userName` varchar(45) DEFAULT NULL,
  `timeStamp` datetime DEFAULT NULL,
  `imageURL` varchar(50) DEFAULT NULL,
  `details` varchar(150) DEFAULT NULL,
  `incidentType` varchar(15) DEFAULT NULL,
  `point` point DEFAULT NULL,
  PRIMARY KEY (`pk`),
  UNIQUE KEY `pk_UNIQUE` (`pk`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
