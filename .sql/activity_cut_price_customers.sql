/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : nissan

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-10-29 21:29:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for activity_cut_price_customers
-- ----------------------------
DROP TABLE IF EXISTS `activity_cut_price_customers`;
CREATE TABLE `activity_cut_price_customers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id，消费者id',
  `customer_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '参与砍价活动的用户id',
  `act_cut_price_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关联的砍价活动id',
  `helped_cut_customer_ids` varchar(1024) NOT NULL DEFAULT '' COMMENT '帮忙砍价的用户id集合，用英文","隔开，如：”44,1256,545“',
  `has_cut_prices` varchar(1024) NOT NULL DEFAULT '' COMMENT '每个顾客帮忙砍价的价格，以“分”为单位，用英文逗号隔开","  如：“500,400,1200”  注意：价格与用户id一一对应',
  `helpded_cut_datetime` varchar(11) NOT NULL DEFAULT '' COMMENT '帮忙砍价用户砍价的时间,用英文逗号隔开，注意：此处与“helped_cut_customer_ids”一一对应',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
