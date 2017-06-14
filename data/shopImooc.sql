CREATE DATABASE IF NOT EXISTS `shopimooc`;
USE `shopimooc`;
##管理员表
DROP TABLE IF EXISTS `imooc_admin`;
CREATE TABLE `imooc_admin`(
  `id` TINYINT UNSIGNED AUTO_INCREMENT KEY ,
  `username` VARCHAR(20) NOT NULL UNIQUE ,
  `password` CHAR(32) NOT NULL ,
  `email` VARCHAR(50) NOT NULL
);

##分类表
DROP TABLE IF EXISTS `imooc_cate`;
CREATE TABLE `imooc_cate`(
  `id` SMALLINT UNSIGNED AUTO_INCREMENT KEY ,
  `cName` VARCHAR(50) UNIQUE
);

##商品表
DROP TABLE IF EXISTS `imooc_pro`;
CREATE TABLE `imooc_pro`(
  `id` INT UNSIGNED AUTO_INCREMENT KEY ,
  `pName` VARCHAR(50) NOT NULL UNIQUE,
  `pSn` VARCHAR(50) NOT NULL ,
  `pNum` INT UNSIGNED DEFAULT 1,
  `mPrice` DECIMAL(10,2) NOT NULL ,
  `iPrice` DECIMAL(10,2) NOT NULL ,
  `pDesc` TEXT,
  `pImg` VARCHAR(50) NOT NULL ,
  `pubTime` INT UNSIGNED NOT NULL ,
  `isShow` TINYINT(1) DEFAULT 1,
  `isHot` TINYINT(1) DEFAULT 0,
  `cId` SMALLINT UNSIGNED NOT NULL
);

##用户表
DROP TABLE IF EXISTS `imooc_user`;
CREATE TABLE `imooc_user`(
  `id` INT UNSIGNED AUTO_INCREMENT KEY ,
  `username` VARCHAR(20) NOT NULL UNIQUE,
  `password` VARCHAR(32) NOT NULL ,
  `sex` ENUM('man','woman','unknown') NOT NULL DEFAULT 'unknown',
  `face` VARCHAR(50) NOT NULL ,
  `regTime` INT UNSIGNED NOT NULL
);

##相册表
DROP TABLE IF EXISTS `imooc_album`;
CREATE TABLE `imooc_album`(
  `id` INT UNSIGNED AUTO_INCREMENT KEY ,
  `pid` INT UNSIGNED NOT NULL,
  `albumPath` VARCHAR(50) NOT NULL
);
