/*
Navicat MySQL Data Transfer

Date: 2016-03-16 14:02:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for access_list
-- ----------------------------
DROP TABLE IF EXISTS `access_list`;
CREATE TABLE `access_list` (
  `roles_name` varchar(32) NOT NULL,
  `resources_name` varchar(32) NOT NULL,
  `access_name` varchar(32) NOT NULL,
  `allowed` int(3) NOT NULL,
  PRIMARY KEY (`roles_name`,`resources_name`,`access_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for resources
-- ----------------------------
DROP TABLE IF EXISTS `resources`;
CREATE TABLE `resources` (
  `name` varchar(32) NOT NULL,
  `description` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for resources_accesses
-- ----------------------------
DROP TABLE IF EXISTS `resources_accesses`;
CREATE TABLE `resources_accesses` (
  `resources_name` varchar(32) NOT NULL,
  `access_name` varchar(32) NOT NULL,
  PRIMARY KEY (`resources_name`,`access_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `name` varchar(32) NOT NULL,
  `description` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for roles_inherits
-- ----------------------------
DROP TABLE IF EXISTS `roles_inherits`;
CREATE TABLE `roles_inherits` (
  `roles_name` varchar(32) NOT NULL,
  `roles_inherit` varchar(32) NOT NULL,
  PRIMARY KEY (`roles_name`,`roles_inherit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
