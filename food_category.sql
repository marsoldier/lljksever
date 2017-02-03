/*
Navicat MySQL Data Transfer

Source Server         : localhost_1
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : fooddb

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-02-03 13:06:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `food_category`
-- ----------------------------
DROP TABLE IF EXISTS `food_category`;
CREATE TABLE `food_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `count` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of food_category
-- ----------------------------
INSERT INTO `food_category` VALUES ('1', '谷薯芋、杂豆、主食', 'images/4dcdc1ad138bb6481b931469df6fff7f.png', '0');
INSERT INTO `food_category` VALUES ('2', '蛋类、肉类及制品', 'images/82956499bfad6112b3a12bc48a36e281.png', '0');
INSERT INTO `food_category` VALUES ('3', '奶类及制品', 'images/c41e6cbca84d4ba3cca4d54437d7ed91.png', '0');
INSERT INTO `food_category` VALUES ('4', '蔬果和菌藻', 'images/13adf760fa36be45bf2e4f86213fcf02.png', '0');
INSERT INTO `food_category` VALUES ('6', '坚果、大豆及制品', 'images/9fc208fc10e92af782edd27dc3b8d3cf.png', '0');
INSERT INTO `food_category` VALUES ('7', '饮料', 'images/325d543aa3bc7a3a0756622b504ca28f.png', '0');
INSERT INTO `food_category` VALUES ('8', '食用油、油脂及制品', 'images/0fb41506263b86e34150a39419aabcc1.png', '0');
INSERT INTO `food_category` VALUES ('9', '调味品', 'images/740ea72506feadcbcd2dfd24de5eb1e5.png', '0');
INSERT INTO `food_category` VALUES ('10', '零食、点心、冷饮', 'images/b6888e531a1b173a4f700cec750f0af2.png', '0');
INSERT INTO `food_category` VALUES ('11', '其它', 'images/2710c90af1b23b21d8802ef10b0d0e12.png', '0');
INSERT INTO `food_category` VALUES ('12', '菜肴', 'images/d4cebb4fd9723c362f543d790ecb80c3.png', '0');
