/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : nissan

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-10-31 20:05:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wangxun_activity_cut_price
-- ----------------------------
DROP TABLE IF EXISTS `wangxun_activity_cut_price`;
CREATE TABLE `wangxun_activity_cut_price` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '砍价活动主键id',
  `act_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'activity表关联的id',
  `agency_id` int(11) NOT NULL,
  `item_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '砍价商品的id',
  `prize_ids` varchar(32) NOT NULL,
  `start` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '砍价开始时间戳',
  `end` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '砍价结束时间戳',
  `times` int(32) unsigned NOT NULL DEFAULT '0' COMMENT '可砍次数',
  `theme` varchar(32) NOT NULL DEFAULT '' COMMENT '分享标题',
  `summary` varchar(1024) NOT NULL DEFAULT '' COMMENT '砍价摘要说明，字符限制1024',
  `remark` varchar(1024) NOT NULL DEFAULT '' COMMENT '补充说明或备注，字符限制1024',
  `helped_cut_user_ids` varchar(2048) NOT NULL,
  `is_stop` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否停止该砍价活动：默认：0 启动，1 停止 ',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='砍价活动信息表';
