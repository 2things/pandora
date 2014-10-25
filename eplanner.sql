/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : eplanner

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-10-25 16:55:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `goal`
-- ----------------------------
DROP TABLE IF EXISTS `goal`;
CREATE TABLE `goal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `img_attach` longblob,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  CONSTRAINT `owner_id` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of goal
-- ----------------------------

-- ----------------------------
-- Table structure for `profile`
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `website_url` varchar(250) DEFAULT NULL,
  `fb_url` varchar(250) DEFAULT NULL,
  `twitter_url` varchar(250) DEFAULT NULL,
  `followers` int(11) DEFAULT NULL,
  `followings` int(11) DEFAULT NULL,
  `wishlist` int(11) DEFAULT NULL,
  `goals` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `profession` int(11) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_rating` tinyint(2) DEFAULT NULL,
  `profile_type` varchar(30) NOT NULL DEFAULT 'individual',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES ('1', '9', null, null, null, null, null, null, null, null, null, null, null, null, null, '2014-10-24 14:30:15', null, 'individual');
INSERT INTO `profile` VALUES ('2', '10', null, null, null, null, null, null, null, null, null, null, null, null, null, '2014-10-24 14:37:13', null, 'individual');

-- ----------------------------
-- Table structure for `todo`
-- ----------------------------
DROP TABLE IF EXISTS `todo`;
CREATE TABLE `todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of todo
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'makaryan.gevorg@mail.ru', 'toktik', 'abc');
INSERT INTO `user` VALUES ('4', 'makaryan.gevorg@mail.com', 'toktik22', '8787');
INSERT INTO `user` VALUES ('5', 'makaryan.gevorg1@mail.ru', 'toktik2', '123123');
INSERT INTO `user` VALUES ('6', 'makaryan.gevorg2@mail.ru', 'toktik3', 'c20ad4d76fe97759aa27a0c99bff6710');
INSERT INTO `user` VALUES ('7', 'test.user@mail.ru', 'test', '098f6bcd4621d373cade4e832627b4f6');
INSERT INTO `user` VALUES ('8', 'marashlyan.suren@mail.ru', 'suren', '202cb962ac59075b964b07152d234b70');
INSERT INTO `user` VALUES ('9', 'mak.gev@mail.com', 'gevorg', '54eb9c413fd20404c0e4da1b5eb41bf6');
INSERT INTO `user` VALUES ('10', 'ms@mail.ru', 'gevorg1', 'af4599c4ddc76d02e8114774f196c0e4');
DROP TRIGGER IF EXISTS `create_profile`;
DELIMITER ;;
CREATE TRIGGER `create_profile` AFTER INSERT ON `user` FOR EACH ROW BEGIN
INSERT INTO `profile` (user_id) VALUES (NEW.id);
END
;;
DELIMITER ;
