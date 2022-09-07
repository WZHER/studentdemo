/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : stu

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2022-07-13 08:31:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `class`
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `classid` varchar(255) COLLATE utf8_bin NOT NULL,
  `classname` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`classid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of class
-- ----------------------------

-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `courseid` char(20) COLLATE utf8_bin DEFAULT NULL COMMENT '编号',
  `coursename` varchar(255) COLLATE utf8_bin NOT NULL,
  `ccredit` int(11) DEFAULT NULL COMMENT '学分',
  `chours` int(11) DEFAULT NULL COMMENT '学时',
  `cterm` char(255) COLLATE utf8_bin NOT NULL DEFAULT '大二下' COMMENT '开设学期',
  PRIMARY KEY (`coursename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '语文', '2', '4', '大二下');
INSERT INTO `course` VALUES ('2', '英语', '2', '4', '大二下');
INSERT INTO `course` VALUES ('3', '高数', '2', '4', '大二下');

-- ----------------------------
-- Table structure for `grade`
-- ----------------------------
DROP TABLE IF EXISTS `grade`;
CREATE TABLE `grade` (
  `sid` char(20) COLLATE utf8_bin NOT NULL,
  `sname` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `coursename` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `courseid` char(20) COLLATE utf8_bin NOT NULL,
  `grade` char(20) COLLATE utf8_bin DEFAULT NULL,
  `tid` char(20) COLLATE utf8_bin NOT NULL,
  `term` char(20) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`sid`,`courseid`,`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of grade
-- ----------------------------
INSERT INTO `grade` VALUES ('209000252', '符号', '语文', '1', '98', '1', '大二下');
INSERT INTO `grade` VALUES ('209000252', '符号', '英语', '2', '99', '2', '大二下');
INSERT INTO `grade` VALUES ('209000252', '符号', '高数', '3', '78', '3', '大二上');
INSERT INTO `grade` VALUES ('209000252', '符号', '高数', '4', '87', '3', '大一上');
INSERT INTO `grade` VALUES ('209000252', '符号', '体育', '5', '88', '4', '大一下');
INSERT INTO `grade` VALUES ('209000222', '温', '语文', '1', '79', '1', '大一上');
INSERT INTO `grade` VALUES ('209000222', '温', '英语', '2', '94', '2', '大一下');
INSERT INTO `grade` VALUES ('209000222', '温', '高数', '3', '88', '3', '大二上');
INSERT INTO `grade` VALUES ('209000222', '温', '体育', '5', '98', '4', '大二下');
INSERT INTO `grade` VALUES ('209000650', '李培jier', '语文', '1', '0', '1', '大一上');

-- ----------------------------
-- Table structure for `manager`
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `mid` char(20) COLLATE utf8_bin NOT NULL,
  `mname` char(20) COLLATE utf8_bin DEFAULT NULL,
  `collegeid` char(20) COLLATE utf8_bin DEFAULT NULL,
  `mpwd` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of manager
-- ----------------------------

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `sname` varchar(20) COLLATE utf8_bin NOT NULL,
  `ssex` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `sage` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `scredit` varchar(0) COLLATE utf8_bin DEFAULT NULL,
  `spwd` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `sclass` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `sid` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`sname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('符号', '女', '18', null, '123', '12', '209000252');
INSERT INTO `student` VALUES ('温', '女', '12', null, '123', '12', '209000123');
INSERT INTO `student` VALUES ('张三', '男', '18', null, '1234', '12', '209000100');

-- ----------------------------
-- Table structure for `teacher`
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `tname` varchar(20) COLLATE utf8_bin NOT NULL,
  `tsex` char(1) COLLATE utf8_bin NOT NULL,
  `tphone` char(20) COLLATE utf8_bin NOT NULL,
  `tpwd` char(15) COLLATE utf8_bin NOT NULL,
  `tage` char(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`tname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('钱二', '女', '130----0001', '1234', '18');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `usertype` varchar(20) COLLATE utf8_bin NOT NULL,
  `userid` int(20) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`usertype`,`username`,`password`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('teacher', '51234', '赵一', '1234');
INSERT INTO `users` VALUES ('student', '1123', '符号', '1234');
INSERT INTO `users` VALUES ('admin', '912345', 'admin', '12345');
INSERT INTO `users` VALUES ('student', '1124', '温', '123');
INSERT INTO `users` VALUES ('teacher', '51235', '钱二', '1234');
