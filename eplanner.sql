/*
Navicat MySQL Data Transfer

Source Server         : local_db
Source Server Version : 50611
Source Host           : 127.0.0.1:3306
Source Database       : eplanner_new

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-12-02 17:00:25
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
  `created_date` timestamp NULL DEFAULT NULL,
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
-- Table structure for `goal_categories`
-- ----------------------------
DROP TABLE IF EXISTS `goal_categories`;
CREATE TABLE `goal_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of goal_categories
-- ----------------------------
INSERT INTO `goal_categories` VALUES ('1', 'Animals');
INSERT INTO `goal_categories` VALUES ('2', ' Architecture');
INSERT INTO `goal_categories` VALUES ('3', 'Art');
INSERT INTO `goal_categories` VALUES ('4', 'Business');
INSERT INTO `goal_categories` VALUES ('5', 'Cars & Motorcycles');
INSERT INTO `goal_categories` VALUES ('6', 'Celebrities');
INSERT INTO `goal_categories` VALUES ('7', 'Design');
INSERT INTO `goal_categories` VALUES ('8', 'Education');
INSERT INTO `goal_categories` VALUES ('9', 'Family');
INSERT INTO `goal_categories` VALUES ('10', 'Film, Music & Books');
INSERT INTO `goal_categories` VALUES ('11', 'Food & Drink');
INSERT INTO `goal_categories` VALUES ('12', 'Gardening');
INSERT INTO `goal_categories` VALUES ('13', 'Geek');
INSERT INTO `goal_categories` VALUES ('14', 'Hair & Beauty');
INSERT INTO `goal_categories` VALUES ('15', 'Health & Fitness');
INSERT INTO `goal_categories` VALUES ('16', ' History');
INSERT INTO `goal_categories` VALUES ('17', 'Holidays & Events');
INSERT INTO `goal_categories` VALUES ('18', 'Home Decor');
INSERT INTO `goal_categories` VALUES ('19', 'Humor');
INSERT INTO `goal_categories` VALUES ('20', 'Illustrations & Posters');
INSERT INTO `goal_categories` VALUES ('21', 'Kids');
INSERT INTO `goal_categories` VALUES ('22', 'Men\'s Fashion');
INSERT INTO `goal_categories` VALUES ('23', 'Outdoors');
INSERT INTO `goal_categories` VALUES ('24', 'Photography');
INSERT INTO `goal_categories` VALUES ('25', 'Products');
INSERT INTO `goal_categories` VALUES ('26', 'Science & Nature');
INSERT INTO `goal_categories` VALUES ('27', 'Sports');
INSERT INTO `goal_categories` VALUES ('28', 'Tattoos');
INSERT INTO `goal_categories` VALUES ('29', 'Technology');
INSERT INTO `goal_categories` VALUES ('30', 'Travel');
INSERT INTO `goal_categories` VALUES ('31', 'Weddings ');
INSERT INTO `goal_categories` VALUES ('32', 'Women\'s Fashion');
INSERT INTO `goal_categories` VALUES ('33', 'Other');

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
-- Table structure for `relation_goals_categories`
-- ----------------------------
DROP TABLE IF EXISTS `relation_goals_categories`;
CREATE TABLE `relation_goals_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`category_id`),
  KEY `g_id` (`goal_id`),
  CONSTRAINT `cat_id` FOREIGN KEY (`category_id`) REFERENCES `goal_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `g_id` FOREIGN KEY (`goal_id`) REFERENCES `goal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of relation_goals_categories
-- ----------------------------

-- ----------------------------
-- Table structure for `task`
-- ----------------------------
DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `profile` (`user_id`),
  CONSTRAINT `profile` FOREIGN KEY (`user_id`) REFERENCES `profile` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of task
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
