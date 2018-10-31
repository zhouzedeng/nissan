/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : nissan

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-10-31 20:05:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wangxun_activity
-- ----------------------------
DROP TABLE IF EXISTS `wangxun_activity`;
CREATE TABLE `wangxun_activity` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `theme` varchar(32) NOT NULL DEFAULT '' COMMENT '活动主题',
  `brand` varchar(32) NOT NULL DEFAULT '' COMMENT '活动产品的品牌',
  `model-type` varchar(32) NOT NULL DEFAULT '' COMMENT '车型输出',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '活动类型，默认：0 砍价',
  `bg_img_url` varchar(128) NOT NULL DEFAULT '' COMMENT '活动背景图',
  `summary` varchar(1024) NOT NULL DEFAULT '' COMMENT '活动摘要说明，字符限制1024',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间，时间戳',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间，时间戳',
  `deleted_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间，时间戳',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='活动信息表，可以关联多个子活动，如：砍价、答题';
