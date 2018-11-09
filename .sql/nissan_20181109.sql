/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50640
Source Host           : 10.0.10.198:3306
Source Database       : nissan

Target Server Type    : MYSQL
Target Server Version : 50640
File Encoding         : 65001

Date: 2018-11-09 12:16:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `wangxun_activity`
-- ----------------------------
DROP TABLE IF EXISTS `wangxun_activity`;
CREATE TABLE `wangxun_activity` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `theme` varchar(32) NOT NULL DEFAULT '' COMMENT '活动主题',
  `brand` varchar(32) NOT NULL DEFAULT '' COMMENT '活动产品的品牌',
  `bg_img_url` varchar(128) NOT NULL DEFAULT '' COMMENT '活动背景图',
  `desc` varchar(1024) NOT NULL DEFAULT '' COMMENT '活动描述',
  `seller_id` int(11) NOT NULL DEFAULT '0' COMMENT '经销商ID',
  `check_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '审核状态  0未审核  1审核通过  2审核未通过',
  `check_remark` varchar(64) DEFAULT '' COMMENT '审核备注',
  `start_time` int(11) DEFAULT '0' COMMENT '活动开始时间',
  `end_time` int(11) DEFAULT '0' COMMENT '活动结束时间',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间，时间戳',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间，时间戳',
  `deleted_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间，时间戳',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='活动信息表，可以关联多个子活动，如：砍价、答题';

-- ----------------------------
-- Records of wangxun_activity
-- ----------------------------
INSERT INTO `wangxun_activity` VALUES ('1', '天籁大优惠', '天籁', 'upload/img/1.img', '', '4665', '0', '未审核', '0', '0', '0', '0', '1541383646');
INSERT INTO `wangxun_activity` VALUES ('2', '4444444', '4444', '1', ' 444 ', '4665', '0', '', '0', '0', '1541147758', '1541383667', '1541486116');
INSERT INTO `wangxun_activity` VALUES ('3', '4444444', '4444', '1', ' 444 ', '4665', '0', '', '0', '1541499745', '1541147779', '1541470944', '1541486112');
INSERT INTO `wangxun_activity` VALUES ('4', '4444444', '4444', '1', '444', '4665', '2', ';;;', '0', '0', '1541147905', '1541406074', '1541486107');
INSERT INTO `wangxun_activity` VALUES ('5', '4444444', '4444', '1', '444', '4665', '2', '...', '0', '0', '1541148273', '1541406063', '1541486101');
INSERT INTO `wangxun_activity` VALUES ('6', '4545', '454545', '1', '45454545454', '4665', '1', '', '0', '0', '1541148294', '1541148294', '1541486095');
INSERT INTO `wangxun_activity` VALUES ('7', '4', '4', '1', ' 5 ', '4665', '0', '', '1541499507', '1541499509', '1541148364', '1541470708', '1541486091');
INSERT INTO `wangxun_activity` VALUES ('8', '4', '4', '1', '5', '4665', '0', '', '0', '0', '1541148407', '1541148407', '1541486119');
INSERT INTO `wangxun_activity` VALUES ('9', '897678', '9638', 'm2YGY36gNuOSrPk0VI38OIXnbvAhrL3AC5FvrEsc.jpeg', ' 9847984 ', '4665', '2', '', '0', '0', '1541148716', '1541383691', '1541486389');
INSERT INTO `wangxun_activity` VALUES ('10', '1', '1', 'pXYEoSPVPY8pWmxppbnJnpxGxWWLXEsPTCBoFUsW.jpeg', '1', '4666', '1', '', '0', '0', '1541149008', '1541466312', '0');
INSERT INTO `wangxun_activity` VALUES ('11', '1', '1', 'T1Vl5UxSjB830ERLwxzikNk6DFt4IjFL8TjrxYP0.jpeg', '11111', '4665', '0', '', '0', '0', '1541467425', '1541467425', '1541486392');
INSERT INTO `wangxun_activity` VALUES ('12', '111', '111', 'Cr7HMALnC6oT1ku3e2EDIRdtQ4JOtZMhcv1PPXxM.jpeg', '11', '4665', '0', '', '0', '0', '1541467449', '1541467449', '1541486395');
INSERT INTO `wangxun_activity` VALUES ('13', '1', '1', 'GDJyLUSvspfsRqgRJ3AFTyLuFSJWIcv1VgYzxFpg.jpeg', '       1       ', '4665', '0', '', '1541499485', '1541499487', '1541468791', '1541478387', '1541486397');
INSERT INTO `wangxun_activity` VALUES ('14', '1', '1', 'EnwYCBcuzxbBITGss0M0Y8FULmoqABoTmsjqDz3h.jpeg', '1', '4665', '0', '', '1541513601', '1541513603', '1541484806', '1541484806', '1541486400');
INSERT INTO `wangxun_activity` VALUES ('15', '双11购车活动', '双11购车活动', 'FyP0V6TUzkwsGqQTazRcvnu2bxMssQFUfWBt0LK8.png', ' 双11购车活动 ', '4665', '0', '', '1541513601', '1541513603', '1541484810', '1541644742', '0');
INSERT INTO `wangxun_activity` VALUES ('16', '全民砍价大狂欢', '全民砍价大狂欢', 'qczmjuswEPmKRTwjgDPMUgluDvhHnHSGKzO7qCvo.jpeg', '全民砍价大狂欢', '4665', '2', '商品准备不足', '1541513601', '1541513603', '1541484858', '1541486458', '0');
INSERT INTO `wangxun_activity` VALUES ('17', '天籁优惠活动开始啦', '天籁', 'XwkNiZzLOk95GFtaKw24JyF2G3y1aafbjhBl919V.jpeg', '天籁优惠活动开始啦 2018-11-06 14:34:26 - 2018-11-06 14:34:28', '4665', '1', '', '1541514866', '1541514868', '1541486072', '1541486418', '0');
INSERT INTO `wangxun_activity` VALUES ('18', 'k', 'k', 'UyNEzL5SV3Etnox3VXmAVZ7gJTuB9Ksr9OEVJtPg.png', 'kkkkk', '4665', '0', '', '1541600237', '1541600238', '1541571451', '1541571451', '0');
INSERT INTO `wangxun_activity` VALUES ('19', '1414', '141', 'N2M9YoQU6tD38z0Jg8Yi4FxUuWCIfdi0jD6rmK9x.png', '达到', '4665', '2', '加奖金', '1541617615', '1541617616', '1541588822', '1541588890', '0');
INSERT INTO `wangxun_activity` VALUES ('20', '17777', '5875785', 'QYclSpoN5PWAJOzvfieRHELFPKU8sDP5n3AR7T8l.png', '         758758758         ', '4665', '1', '', '1541671133', '1541671134', '1541642459', '1541667651', '0');

-- ----------------------------
-- Table structure for `wangxun_activity_goods`
-- ----------------------------
DROP TABLE IF EXISTS `wangxun_activity_goods`;
CREATE TABLE `wangxun_activity_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `activity_id` int(11) NOT NULL COMMENT '活动ID',
  `goods_id` varchar(1024) NOT NULL COMMENT '商品ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COMMENT='活动 - 商品 关联表';

-- ----------------------------
-- Records of wangxun_activity_goods
-- ----------------------------
INSERT INTO `wangxun_activity_goods` VALUES ('1', '16', '10,9');
INSERT INTO `wangxun_activity_goods` VALUES ('2', '17', '10,9');
INSERT INTO `wangxun_activity_goods` VALUES ('3', '15', '');
INSERT INTO `wangxun_activity_goods` VALUES ('4', '18', '14,9');
INSERT INTO `wangxun_activity_goods` VALUES ('5', '19', '14,9');
INSERT INTO `wangxun_activity_goods` VALUES ('6', '20', '20,19,18,14');

-- ----------------------------
-- Table structure for `wangxun_cut`
-- ----------------------------
DROP TABLE IF EXISTS `wangxun_cut`;
CREATE TABLE `wangxun_cut` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '砍价ID',
  `activity_id` int(11) NOT NULL DEFAULT '0' COMMENT '活动ID',
  `goods_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `already_cut_num` int(11) DEFAULT '0' COMMENT '已经砍了的次数',
  `is_finish` tinyint(1) DEFAULT '0' COMMENT '是否已完成砍价 0 未完成   1 已完成',
  `created_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='用户砍价表';

-- ----------------------------
-- Records of wangxun_cut
-- ----------------------------
INSERT INTO `wangxun_cut` VALUES ('1', '16', '1', '1', '25', '1', '0', '1541732913', '0');
INSERT INTO `wangxun_cut` VALUES ('2', '2', '4', '2', '6', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `wangxun_cut_visitor`
-- ----------------------------
DROP TABLE IF EXISTS `wangxun_cut_visitor`;
CREATE TABLE `wangxun_cut_visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `cut_id` int(11) NOT NULL DEFAULT '0' COMMENT '对应cut表的id',
  `visitor_id` int(11) NOT NULL DEFAULT '0' COMMENT '对应cisitor 表的id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COMMENT='砍价 - 帮砍价游客 关联表';

-- ----------------------------
-- Records of wangxun_cut_visitor
-- ----------------------------
INSERT INTO `wangxun_cut_visitor` VALUES ('1', '1', '3');
INSERT INTO `wangxun_cut_visitor` VALUES ('2', '1', '2');
INSERT INTO `wangxun_cut_visitor` VALUES ('3', '1', '4');
INSERT INTO `wangxun_cut_visitor` VALUES ('4', '1', '5');
INSERT INTO `wangxun_cut_visitor` VALUES ('5', '1', '6');
INSERT INTO `wangxun_cut_visitor` VALUES ('6', '1', '7');
INSERT INTO `wangxun_cut_visitor` VALUES ('7', '1', '8');
INSERT INTO `wangxun_cut_visitor` VALUES ('8', '1', '9');
INSERT INTO `wangxun_cut_visitor` VALUES ('9', '1', '10');
INSERT INTO `wangxun_cut_visitor` VALUES ('10', '1', '11');
INSERT INTO `wangxun_cut_visitor` VALUES ('11', '1', '12');
INSERT INTO `wangxun_cut_visitor` VALUES ('12', '1', '13');
INSERT INTO `wangxun_cut_visitor` VALUES ('13', '1', '14');
INSERT INTO `wangxun_cut_visitor` VALUES ('14', '1', '15');
INSERT INTO `wangxun_cut_visitor` VALUES ('15', '1', '16');
INSERT INTO `wangxun_cut_visitor` VALUES ('16', '1', '17');
INSERT INTO `wangxun_cut_visitor` VALUES ('17', '1', '18');
INSERT INTO `wangxun_cut_visitor` VALUES ('18', '1', '19');
INSERT INTO `wangxun_cut_visitor` VALUES ('19', '1', '20');
INSERT INTO `wangxun_cut_visitor` VALUES ('20', '1', '21');
INSERT INTO `wangxun_cut_visitor` VALUES ('21', '1', '22');

-- ----------------------------
-- Table structure for `wangxun_goods`
-- ----------------------------
DROP TABLE IF EXISTS `wangxun_goods`;
CREATE TABLE `wangxun_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `seller_id` int(11) NOT NULL COMMENT '经销商ID',
  `goods_name` varchar(128) NOT NULL COMMENT '车系ID',
  `goods_price` int(11) NOT NULL COMMENT '商品价格',
  `goods_img` varchar(255) NOT NULL COMMENT '商品展示图片',
  `coupon_id` int(32) NOT NULL COMMENT '卡券ID',
  `coupon_price` int(32) NOT NULL COMMENT '卡券价值',
  `card_code` varchar(32) DEFAULT '' COMMENT '卡编码',
  `card_id` int(11) DEFAULT '0' COMMENT '卡ID',
  `coupon_title` varchar(64) DEFAULT NULL COMMENT '卡券名称',
  `coupon_desc` varchar(128) DEFAULT '' COMMENT '卡券描述',
  `need_cut_num` int(11) DEFAULT '0' COMMENT '需砍次数',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  `deleted_at` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`,`coupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COMMENT='商品库';

-- ----------------------------
-- Records of wangxun_goods
-- ----------------------------
INSERT INTO `wangxun_goods` VALUES ('1', '4665', '鸟购置税减半券', '1', '1', '5555', '1', null, '0', null, null, '25', '0', '0', '0');
INSERT INTO `wangxun_goods` VALUES ('2', '4666', '545', '4554', 'QMkgV6A4851OoMCZzCRchIX2YlzWM6YCA315ukh7.jpeg', '455454', '0', null, '0', null, null, '0', '1541150662', '1541150662', '0');
INSERT INTO `wangxun_goods` VALUES ('3', '4665', '876578', '67867', 'VlyL7Q6UflnVoc56TdMxaYdzd2uMktLqoOI73Tg7.jpeg', '67867', '0', null, '0', null, null, '0', '1541150706', '1541150706', '1541485327');
INSERT INTO `wangxun_goods` VALUES ('4', '4665', '85878', '785678', 'XkDlJM8eNIOJEl5gC75RVeuLN2LpigphHVq3WWgj.jpeg', '5785', '0', null, '0', null, null, '0', '1541150730', '1541150730', '1541485330');
INSERT INTO `wangxun_goods` VALUES ('5', '4665', '5452', '75875', 'hfovT1hSmBUJ1lmm7DX1ZycnSeYWDCW8zWhkfkWk.jpeg', '5785', '0', null, '0', null, null, '0', '1541150756', '1541150756', '1541485334');
INSERT INTO `wangxun_goods` VALUES ('6', '4665', '646456', '78678', 'Vb9PN3A2Hty5BnHYf8rIU80lvSrLfh76GZR8VdiW.jpeg', '7468', '0', null, '0', null, null, '0', '1541151472', '1541383720', '1541485337');
INSERT INTO `wangxun_goods` VALUES ('7', '4665', '5875', '578578', 'AJ4GzADI4DMu0lY5AX4ve4qVvhLOQKo9tsCCPUqW.jpeg', '85785785', '0', null, '0', null, null, '0', '1541471007', '1541471007', '1541485339');
INSERT INTO `wangxun_goods` VALUES ('8', '4665', '864', '33223', 'yXsbrC3754nh6vy8d8JViIVfH8cuf9sxDU6vN4Bg.jpeg', '595', '0', '346286103', '595', '2000元购车优惠券-上海车展专用', null, '0', '1541472284', '1541472284', '1541485342');
INSERT INTO `wangxun_goods` VALUES ('9', '4665', '蓝鸟购置税减半券', '555', 'UAlRno1CWhpn300YxQWIxVMTcnosn5hqph3ppvOW.jpeg', '2', '789', '331133301', '55555', '蓝鸟购置税减半券', null, '20', '1541472356', '1541487841', '0');
INSERT INTO `wangxun_goods` VALUES ('10', '4665', '空气净化器+2000元汽车精品套装', '45454', 'HPGEY5MjTarfi2gfvoW5kQvG9IBliujhm5atOX6l.jpeg}', '20', '45525', '399416147', '5555', '劲爽夏日礼-乌鲁木齐专享', '空气净化器+2000元汽车精品套装', '0', '1541472706', '1541487071', '1541487667');
INSERT INTO `wangxun_goods` VALUES ('11', '4665', '双12一波优惠来袭！！！！', '250000', 'KJF3orop0dnkPNEhpjTGurfSgKRGBOjgPyQ23579.jpeg}', '18', '789', '398090704', '18', '2000元购车优惠券-上海车展专用', '适用车系：东风日产全系车（进口车除外）;请在购车前出示此券', '0', '1541486571', '1541487057', '1541487663');
INSERT INTO `wangxun_goods` VALUES ('12', '4665', '2', '2', 'gwhNCjmWhebFLBFfmTGZOTij5pf0xLKsh8XkDnlm.jpeg}}', '99', '789', '307803684', '99', '2000元购车优惠券-上海车展专用', '适用车系：东风日产全系车（进口车除外）;请在购车前出示此券', '0', '1541486688', '1541487036', '1541487654');
INSERT INTO `wangxun_goods` VALUES ('13', '4665', '44', '4', 'lbR6GrvVD6oqLiqWoDoa8QupXt8t9h6iWDLrR8EL.jpeg', '4', '3000', '354938063', '4', '2000元购车优惠券-上海车展专用', '适用车系：东风日产全系车（进口车除外）;请在购车前出示此券', '0', '1541487152', '1541487206', '1541487659');
INSERT INTO `wangxun_goods` VALUES ('14', '4665', '京东购物节活动', '100000', 'JQaeTtOQzrMJyn42TOTsqIyCFZijXh7AjXeB41lK.jpeg', '28', '60', '317255045', '28', '2000元购车优惠券-上海车展专用', '适用车系：东风日产全系车（进口车除外）;请在购车前出示此券', '600', '1541487628', '1541487757', '0');
INSERT INTO `wangxun_goods` VALUES ('15', '4665', '1', '1', 'zWGCvCVfNuCcqYMdWct5HnkUxpG9B47TOye2ls6n.png', '1', '2000', '322307967', '1', '2000元购车优惠券-上海车展专用', '适用车系：东风日产全系车（进口车除外）;请在购车前出示此券', '1', '1541643066', '1541664823', '0');
INSERT INTO `wangxun_goods` VALUES ('16', '4665', '4252', '2452', 'FK985GZfp1RX2cxhdEjSycjF8gtm7LGHeskzazBe.png', '5554', '0', '327153080', '5554', '劲爽夏日礼-青岛专享', '空气净化器+2000元汽车精品套装', '54', '1541648757', '1541648757', '0');
INSERT INTO `wangxun_goods` VALUES ('17', '4665', '85', '58', 'xoPUPfZ9SvS0r0HA8xoGhlnwcsCypgsOaDfcW3U0.png', '58758', '0', '345431563', '58758', '平安银行贴息优惠券', '平安车巴巴在线金融贴息优惠券', '555', '1541649202', '1541649202', '0');
INSERT INTO `wangxun_goods` VALUES ('18', '4665', '8578', '67676', 'R3eyV0jPvK19fT9KrrqCZtLGP7nPUkoQ3q0c4u1G.png', '7679', '0', '330436165', '7679', '礼品劵-2000购车基金', '东风南方劲爽夏令赢 盛惠“1+1”', '6746', '1541649349', '1541649349', '0');
INSERT INTO `wangxun_goods` VALUES ('19', '4665', '333', '333', 'u2I6ZtUzOfVPJzbdFIFTHfMEBE1HJcB4bExywU4H.png', '33', '0', '318609863', '33', '2000元购车优惠券-上海车展专用', '适用车系：东风日产全系车（进口车除外）;请在购车前出示此券', '3333', '1541649936', '1541649936', '0');
INSERT INTO `wangxun_goods` VALUES ('20', '4665', '578578', '58758', '8c5bzS5pgEoVTdCthSpUWCmgY3uQ2Q5QdIsRsZSM.png', '858', '9', '311686976', '858', '2000元购车优惠券-上海车展专用', '适用车系：东风日产全系车（进口车除外）;请在购车前出示此券', '57857857', '1541650072', '1541664837', '0');
INSERT INTO `wangxun_goods` VALUES ('21', '4665', '87578', '578578', 'TmkwyBwKM2rvbr3RYZjMulYEX7OX7Twtdc4fSrE3.png', '5785', '2000', '321770796', '5785', '劲爽夏日礼-海南专享', '空气净化器+2000元汽车精品套装', '5875', '1541728503', '1541728528', '0');

-- ----------------------------
-- Table structure for `wangxun_goods_series`
-- ----------------------------
DROP TABLE IF EXISTS `wangxun_goods_series`;
CREATE TABLE `wangxun_goods_series` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `goods_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `series_ids` varchar(255) NOT NULL DEFAULT '0' COMMENT '车系IDs',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of wangxun_goods_series
-- ----------------------------
INSERT INTO `wangxun_goods_series` VALUES ('1', '18', '6,7,16,17');
INSERT INTO `wangxun_goods_series` VALUES ('2', '19', '6,22,48');
INSERT INTO `wangxun_goods_series` VALUES ('3', '20', '6,7,8,13,14,15,16,17,20,21,22,23,24,26,27,28,29,31,39,40,48,49');
INSERT INTO `wangxun_goods_series` VALUES ('4', '15', '6,23');
INSERT INTO `wangxun_goods_series` VALUES ('5', '21', '6,7,8,13,14,15,27,28,29,31,39');

-- ----------------------------
-- Table structure for `wangxun_seller`
-- ----------------------------
DROP TABLE IF EXISTS `wangxun_seller`;
CREATE TABLE `wangxun_seller` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '经销商名称',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `delete_at` int(11) DEFAULT '0' COMMENT '删除时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of wangxun_seller
-- ----------------------------
INSERT INTO `wangxun_seller` VALUES ('4665', 'test_123', '1541401342', '1541401342', '0');
INSERT INTO `wangxun_seller` VALUES ('4666', 'cbd', '0', '0', '0');

-- ----------------------------
-- Table structure for `wangxun_series`
-- ----------------------------
DROP TABLE IF EXISTS `wangxun_series`;
CREATE TABLE `wangxun_series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gc_id` int(11) DEFAULT '0' COMMENT '车系ID',
  `gc_name` varchar(64) DEFAULT '' COMMENT '车系名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of wangxun_series
-- ----------------------------
INSERT INTO `wangxun_series` VALUES ('1', '6', '新生代TIIDA');
INSERT INTO `wangxun_series` VALUES ('2', '7', '骊威');
INSERT INTO `wangxun_series` VALUES ('3', '8', '玛驰');
INSERT INTO `wangxun_series` VALUES ('4', '13', '全新轩逸');
INSERT INTO `wangxun_series` VALUES ('5', '14', '蓝鸟');
INSERT INTO `wangxun_series` VALUES ('6', '15', '全新天籁');
INSERT INTO `wangxun_series` VALUES ('7', '16', '轩逸·经典');
INSERT INTO `wangxun_series` VALUES ('8', '17', '阳光');
INSERT INTO `wangxun_series` VALUES ('9', '18', '全新天籁·公爵');
INSERT INTO `wangxun_series` VALUES ('10', '20', '西玛');
INSERT INTO `wangxun_series` VALUES ('11', '21', '全新奇骏');
INSERT INTO `wangxun_series` VALUES ('12', '22', '全新逍客');
INSERT INTO `wangxun_series` VALUES ('13', '23', '新楼兰');
INSERT INTO `wangxun_series` VALUES ('14', '24', '启辰T70');
INSERT INTO `wangxun_series` VALUES ('15', '26', '贵士');
INSERT INTO `wangxun_series` VALUES ('16', '27', '370Z');
INSERT INTO `wangxun_series` VALUES ('17', '28', '途乐');
INSERT INTO `wangxun_series` VALUES ('18', '29', 'GT-R');
INSERT INTO `wangxun_series` VALUES ('19', '31', '启辰T90');
INSERT INTO `wangxun_series` VALUES ('20', '39', '启辰M50V');
INSERT INTO `wangxun_series` VALUES ('21', '40', '劲客');
INSERT INTO `wangxun_series` VALUES ('22', '46', '启辰D60');
INSERT INTO `wangxun_series` VALUES ('23', '48', '途达');
INSERT INTO `wangxun_series` VALUES ('24', '49', '轩逸·纯电');

-- ----------------------------
-- Table structure for `wangxun_users`
-- ----------------------------
DROP TABLE IF EXISTS `wangxun_users`;
CREATE TABLE `wangxun_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `phone` char(11) NOT NULL DEFAULT '' COMMENT '手机号',
  `wx_name` varchar(64) DEFAULT '' COMMENT '微信名称',
  `wx_openid` varchar(32) DEFAULT NULL COMMENT '微信ID',
  `wx_head_img_url` varchar(255) DEFAULT '' COMMENT '微信头像',
  `seller_id` int(11) DEFAULT '0' COMMENT '经销商ID',
  `seller_name` varchar(32) DEFAULT '' COMMENT '经销商名称',
  `created_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of wangxun_users
-- ----------------------------
INSERT INTO `wangxun_users` VALUES ('1', 'Zed', '15016711332', null, 'DKKdjalkfDLKDJLKfjlk', 'http://horse-activity.chebaba.com/storage/XwkNiZzLOk95GFtaKw24JyF2G3y1aafbjhBl919V.jpeg', '4665', 'test_123', '1541150706', '1541150708', '0');
INSERT INTO `wangxun_users` VALUES ('2', 'ZZD', '13545487547', null, '5555555', 'http://horse-activity.chebaba.com/storage/XwkNiZzLOk95GFtaKw24JyF2G3y1aafbjhBl919V.jpeg', '4666', 'seller2', '1541150708', '1541150708', '0');

-- ----------------------------
-- Table structure for `wangxun_visitor`
-- ----------------------------
DROP TABLE IF EXISTS `wangxun_visitor`;
CREATE TABLE `wangxun_visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '游客ID',
  `wx_name` varchar(64) DEFAULT NULL COMMENT '微信名称',
  `wx_openid` char(32) DEFAULT NULL COMMENT '微信ID',
  `wx_head_img_url` varchar(255) DEFAULT '' COMMENT '微信头像',
  `seller_id` int(11) DEFAULT '0' COMMENT '经销商ID',
  `created_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of wangxun_visitor
-- ----------------------------
INSERT INTO `wangxun_visitor` VALUES ('1', 'name1', 'rrrr', 'dasdas', '4665', '0', '0', '0');
INSERT INTO `wangxun_visitor` VALUES ('2', 'name2', 'redddd', 'dasdasdasd', '46666', '0', '0', '0');
INSERT INTO `wangxun_visitor` VALUES ('3', '36', '3', '3', '0', '0', '0', '0');
INSERT INTO `wangxun_visitor` VALUES ('4', '99999', '123456', 'http://fsadfasdf', '0', '1541731000', '1541731000', '0');
INSERT INTO `wangxun_visitor` VALUES ('5', '99999', '1234567', 'http://fsadfasdf', '0', '1541731121', '1541731121', '0');
INSERT INTO `wangxun_visitor` VALUES ('6', '99999', '12345678', 'http://fsadfasdf', '0', '1541731123', '1541731123', '0');
INSERT INTO `wangxun_visitor` VALUES ('7', '99999', '123456789', 'http://fsadfasdf', '0', '1541731125', '1541731125', '0');
INSERT INTO `wangxun_visitor` VALUES ('8', '99999', '12345678910', 'http://fsadfasdf', '0', '1541731128', '1541731128', '0');
INSERT INTO `wangxun_visitor` VALUES ('9', '99999', '123456789101', 'http://fsadfasdf', '0', '1541731130', '1541731130', '0');
INSERT INTO `wangxun_visitor` VALUES ('10', '99999', '1234567891011', 'http://fsadfasdf', '0', '1541731132', '1541731132', '0');
INSERT INTO `wangxun_visitor` VALUES ('11', '99999', '12345678910111', 'http://fsadfasdf', '0', '1541731133', '1541731133', '0');
INSERT INTO `wangxun_visitor` VALUES ('12', '99999', '123456789101111', 'http://fsadfasdf', '0', '1541731136', '1541731136', '0');
INSERT INTO `wangxun_visitor` VALUES ('13', '99999', '1234567891011111', 'http://fsadfasdf', '0', '1541731138', '1541731138', '0');
INSERT INTO `wangxun_visitor` VALUES ('14', '99999', '12345678910111111', 'http://fsadfasdf', '0', '1541731305', '1541731305', '0');
INSERT INTO `wangxun_visitor` VALUES ('15', '99999', '123456789101111119', 'http://fsadfasdf', '0', '1541731535', '1541731535', '0');
INSERT INTO `wangxun_visitor` VALUES ('16', '99999', '1234567891011111193', 'http://fsadfasdf', '0', '1541731751', '1541731751', '0');
INSERT INTO `wangxun_visitor` VALUES ('17', '99999', '123456d', 'http://fsadfasdf', '0', '1541731983', '1541731983', '0');
INSERT INTO `wangxun_visitor` VALUES ('18', '99999', '123456d3', 'http://fsadfasdf', '0', '1541732425', '1541732425', '0');
INSERT INTO `wangxun_visitor` VALUES ('19', '99999', '123456d31', 'http://fsadfasdf', '0', '1541732632', '1541732632', '0');
INSERT INTO `wangxun_visitor` VALUES ('20', '99999', '123456d311', 'http://fsadfasdf', '0', '1541732710', '1541732710', '0');
INSERT INTO `wangxun_visitor` VALUES ('21', '99999', '123456d3112', 'http://fsadfasdf', '0', '1541732816', '1541732816', '0');
INSERT INTO `wangxun_visitor` VALUES ('22', '99999', '123456d3116', 'http://fsadfasdf', '0', '1541732913', '1541732913', '0');
