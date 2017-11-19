/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : localhost
 Source Database       : wshiyi

 Target Server Type    : MySQL
 Target Server Version : 50717
 File Encoding         : utf-8

 Date: 11/20/2017 00:15:41 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `sy_article`
-- ----------------------------
DROP TABLE IF EXISTS `sy_article`;
CREATE TABLE `sy_article` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '文章标题',
  `keywords` varchar(100) NOT NULL COMMENT '关键字',
  `digest` text NOT NULL COMMENT '文章摘要',
  `thumb` varchar(225) NOT NULL DEFAULT '' COMMENT '缩略图',
  `content` text NOT NULL COMMENT '文章内容',
  `browse` int(20) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updated_at` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `cate_id` int(20) NOT NULL DEFAULT '0' COMMENT '所属分类',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0删除',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
--  Table structure for `sy_article_tag`
-- ----------------------------
DROP TABLE IF EXISTS `sy_article_tag`;
CREATE TABLE `sy_article_tag` (
  `article_id` int(20) NOT NULL DEFAULT '0' COMMENT '文章id',
  `tag_id` int(20) NOT NULL DEFAULT '0' COMMENT '标签id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章标签中间表';

-- ----------------------------
--  Table structure for `sy_category`
-- ----------------------------
DROP TABLE IF EXISTS `sy_category`;
CREATE TABLE `sy_category` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '分类名称',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '分类标识',
  `pid` int(20) NOT NULL DEFAULT '0' COMMENT '父级id',
  `sort` int(20) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `_token` varchar(50) NOT NULL DEFAULT '' COMMENT 'csrf验证',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
--  Table structure for `sy_config`
-- ----------------------------
DROP TABLE IF EXISTS `sy_config`;
CREATE TABLE `sy_config` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='配置表';

-- ----------------------------
--  Table structure for `sy_link`
-- ----------------------------
DROP TABLE IF EXISTS `sy_link`;
CREATE TABLE `sy_link` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
--  Table structure for `sy_search`
-- ----------------------------
DROP TABLE IF EXISTS `sy_search`;
CREATE TABLE `sy_search` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `search` varchar(80) NOT NULL DEFAULT '',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='搜索记录表';

-- ----------------------------
--  Table structure for `sy_signature`
-- ----------------------------
DROP TABLE IF EXISTS `sy_signature`;
CREATE TABLE `sy_signature` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL COMMENT '签名内容',
  `created_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updated_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='个性签名表';

-- ----------------------------
--  Table structure for `sy_tag`
-- ----------------------------
DROP TABLE IF EXISTS `sy_tag`;
CREATE TABLE `sy_tag` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '标签名称',
  `color` varchar(20) NOT NULL DEFAULT '' COMMENT '标签颜色',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `_token` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='标签表';

-- ----------------------------
--  Table structure for `sy_users`
-- ----------------------------
DROP TABLE IF EXISTS `sy_users`;
CREATE TABLE `sy_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(80) NOT NULL DEFAULT '',
  `remember_token` varchar(100) DEFAULT '',
  `created_at` varchar(50) NOT NULL DEFAULT '',
  `updated_at` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
