/*
SQLyog  v12.2.6 (64 bit)
MySQL - 5.5.53 : Database - quan
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `activity_pv_uv_stats` */

CREATE TABLE `wangxun_activity_pv_uv_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `relevance_id` int(11) NOT NULL DEFAULT '0' COMMENT '关联类型活动表id',
  `type` int(1) NOT NULL DEFAULT '0' COMMENT '统计类型:1是砍价活动,2是答题',
  `stats_date` date NOT NULL COMMENT '统计时间',
  `pv` int(11) NOT NULL DEFAULT '0' COMMENT '访问量pv',
  `uv` int(11) NOT NULL DEFAULT '0' COMMENT '独立访问量uv',
  `describe` varchar(50) DEFAULT NULL COMMENT '描述',
  `stats_url` varchar(100) DEFAULT NULL COMMENT '统计url',
  PRIMARY KEY (`id`),
  KEY `stats_date_index` (`stats_date`),
  KEY `stats_url_index` (`stats_url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='统计访问量表';

/*Data for the table `activity_pv_uv_stats` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
