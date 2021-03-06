/*
Navicat MySQL Data Transfer

Source Server         : mdxyz
Source Server Version : 100109
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 100109
File Encoding         : 65001

Date: 2015-12-22 19:56:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for abonelikler
-- ----------------------------
DROP TABLE IF EXISTS `abonelikler`;
CREATE TABLE `abonelikler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of abonelikler
-- ----------------------------

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for aktiviteler
-- ----------------------------
DROP TABLE IF EXISTS `aktiviteler`;
CREATE TABLE `aktiviteler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_data` text NOT NULL,
  `target_data` text NOT NULL,
  `target_type` tinyint(4) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aktiviteler
-- ----------------------------

-- ----------------------------
-- Table structure for arkadaslar
-- ----------------------------
DROP TABLE IF EXISTS `arkadaslar`;
CREATE TABLE `arkadaslar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user1` (`user1`),
  KEY `user2` (`user2`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of arkadaslar
-- ----------------------------

-- ----------------------------
-- Table structure for bildirimler
-- ----------------------------
DROP TABLE IF EXISTS `bildirimler`;
CREATE TABLE `bildirimler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `target_data` varchar(222) NOT NULL,
  `target_type` int(1) NOT NULL,
  `read` int(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bildirimler
-- ----------------------------

-- ----------------------------
-- Table structure for bolumler
-- ----------------------------
DROP TABLE IF EXISTS `bolumler`;
CREATE TABLE `bolumler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `show_id` int(11) NOT NULL,
  `season` int(11) NOT NULL,
  `episode` int(11) NOT NULL,
  `description` text NOT NULL,
  `embed` text NOT NULL,
  `subtitle` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL,
  `liked` bigint(11) NOT NULL,
  `unliked` bigint(11) NOT NULL,
  `views` bigint(20) NOT NULL,
  `checked` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`show_id`),
  KEY `season` (`season`),
  KEY `episode` (`episode`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bolumler
-- ----------------------------
INSERT INTO `bolumler` VALUES ('1', '1', '1', '1', 'Pilot', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=899e8f6eb5b09cd8&itag=18&source=picasa&cmo=secure_transport=yes&ip=0.0.0.0&ipbits=0&expire=1431889969&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=8D1737C9E0ED85F333372316C8E771CB0CEFCC3C.6554FD4441FAC766753B34370990DA7200F602F8&key=lh1\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=899e8f6eb5b09cd8&itag=22&source=picasa&cmo=secure_transport=yes&ip=0.0.0.0&ipbits=0&expire=1431889969&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=2D020BD7D2209DA26A603E3D4E48056F55DC5BCE.2BD3D61C4506AD99570C025914302EB367F6630A&key=lh1\",label: \"720p\",type: \"mp4\"}]', '', '2015-12-16 22:09:53', '10', '7', '91', '1');
INSERT INTO `bolumler` VALUES ('2', '1', '1', '2', 'Düğün', 'sources: [{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m18\",label: \"360p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m22\",label: \"720p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m37\",label: \"1080p\",type: \"mp4\"}]', '', '2015-12-16 22:22:40', '17', '5', '75', '0');
INSERT INTO `bolumler` VALUES ('3', '1', '1', '3', 'Halı Saha', 'sources: [{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m18\",label: \"360p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m22\",label: \"720p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m37\",label: \"1080p\",type: \"mp4\"}]', '', '2015-12-16 22:58:23', '5', '2', '13', '0');
INSERT INTO `bolumler` VALUES ('4', '1', '1', '4', 'Fidye', 'sources: [{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m18\",label: \"360p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m22\",label: \"720p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m37\",label: \"1080p\",type: \"mp4\"}]', '', '2015-12-16 23:00:02', '3', '3', '9', '0');
INSERT INTO `bolumler` VALUES ('5', '1', '1', '5', 'Şöhret', 'sources: [{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m18\",label: \"360p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m22\",label: \"720p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m37\",label: \"1080p\",type: \"mp4\"}]', '', '2015-12-16 23:00:29', '6', '1', '12', '0');
INSERT INTO `bolumler` VALUES ('6', '9', '1', '1', 'Pilot', 'sources: [{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m18\",label: \"360p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m22\",label: \"720p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m37\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-12-16 23:01:38', '7', '0', '19', '0');
INSERT INTO `bolumler` VALUES ('7', '9', '1', '2', 'Brother, Can You Spare a Brain?', 'sources: [{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m18\",label: \"360p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m22\",label: \"720p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m37\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-12-16 23:02:30', '7', '0', '13', '0');
INSERT INTO `bolumler` VALUES ('8', '9', '1', '3', 'The Exterminator', 'sources: [{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m18\",label: \"360p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m22\",label: \"720p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m37\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-06-04 23:02:53', '2', '0', '7', '0');
INSERT INTO `bolumler` VALUES ('9', '9', '1', '4', 'Liv and Let Clive', 'sources: [{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m18\",label: \"360p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m22\",label: \"720p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m37\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-06-06 23:02:53', '95', '0', '7', '0');
INSERT INTO `bolumler` VALUES ('10', '9', '1', '5', 'Flight of the Living Dead', 'sources: [{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m18\",label: \"360p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m22\",label: \"720p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/FaBQQiOEAHoeYv86TJHPR1ThJJMI_y03PfEQV9PYucdF=m37\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-12-16 11:08:42', '2', '1', '40', '1');
INSERT INTO `bolumler` VALUES ('11', '10', '1', '1', 'Phase Six', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=355af17f9f812446&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251096&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=84F7087078078F7C77952C9EFF09B837EC4A89DE.7ADEFD6CB202B2573656AE8EE3B17C6EBFE46F16&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=355af17f9f812446&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251096&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=428287501910D891E9B7E4C467E5699DAD2EC0C1.8F53BADB90D95759575B4A74198A48026C13B63&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=355af17f9f812446&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251096&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=6B717D3379A45E3256C050325938A12D14190594.9007DF5A8507F25D6ABB7D66AE340DD57A47DBAB&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-12-16 11:08:42', '3', '0', '16', '1');
INSERT INTO `bolumler` VALUES ('12', '10', '1', '2', 'Welcome to Gitmo', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=6851a850e933e961&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251116&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=86883ADACBB4A71B57648E262330D90C18FE2247.1E06047552C68E8CF96E59BB519930F7DB289A7C&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=6851a850e933e961&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251116&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=5AE5F8E2A324EBD66759A07ACB558DFE6220774F.97AA3B0DDCF4D70B0FFEC0ED3DB75D3DB3D61ED&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=6851a850e933e961&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251116&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=765A87FA16BD4787AE35FB78DE2A11CE2EBA5ABA.9F006BACF24EDF7A0CCD9FBF4DE0BD9EC3CEABC7&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-12-16 11:08:42', '1', '2', '5', '1');
INSERT INTO `bolumler` VALUES ('13', '10', '1', '3', 'Dead Reckoning', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=3aa195c4ccd33f42&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251136&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=56F93B84DC269E4B939555266070F77F7DD3504F.AEA630C809D1E5EED75877AE1EAE4E185F0345F5&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=3aa195c4ccd33f42&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251136&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=9834DED31309B0152C64EB1A7A8DAE98085B6787.51244225F13C64FBE09DBDE56CA879032BBAE5E5&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=3aa195c4ccd33f42&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251136&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=759D4223F973A84CB3DA430303E515504F30C154.9631E9A72C1B67CDCF01A5214E77B65FB744B030&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-04-17 23:27:52', '0', '0', '3', '0');
INSERT INTO `bolumler` VALUES ('14', '10', '1', '4', 'We\'ll Get There', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=28f4a235d00598b6&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251143&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=6A6B2AD2164917A72B3744BBA01A506A1F71AF71.2D385E47F4F4697C04D8B668D78E33704AB3FA70&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=28f4a235d00598b6&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251143&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=34B2AA64090E09B825400C5BA7B8DFD03BE31F74.B7B623047BCA3A4050AE8A3190E26AB7014EC6B7&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=28f4a235d00598b6&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251143&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=B01051501BAACFEE760FD76F6C7B8A0F0AFF70B7.529DFC0E0EFAB2C620F46DAAF23ECFD1C2236944&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-04-17 23:28:00', '0', '0', '1', '0');
INSERT INTO `bolumler` VALUES ('15', '10', '1', '5', 'El Toro', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=8e4101f8ae8da84c&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251157&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=1CF62FCFADD83A19B48FCD3BDC32E50ADDF022D3.3B3166F95466E2F7A2E3828BA0308D8CCDE1881B&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=8e4101f8ae8da84c&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251157&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=4D1A55F2F371B565C7340BC4C04B16C5018BF46C.14BF683BF40650E08A36A6EC309278B1FE4E5A77&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=8e4101f8ae8da84c&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251157&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=5DEB0B428109AB4A53D293AEA0A07CD3C1ABC30D.6B732FBF8DB03398B3CCAF635D8E674685810F96&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-12-16 11:08:42', '0', '0', '4', '1');
INSERT INTO `bolumler` VALUES ('16', '4', '1', '1', 'Uno', 'sources: [{file: \"https://lh3.googleusercontent.com/15T3yGL1uocJXXHjJLur5uAt5rg3oCxlq6e0ZOaam_M=m18\",label: \"360p\",type: \"mp4\"},{file: \"https://lh3.googleusercontent.com/15T3yGL1uocJXXHjJLur5uAt5rg3oCxlq6e0ZOaam_M=m22\",label: \"720p\",type: \"mp4\"}]', '1', '2015-02-09 12:45:57', '0', '1', '7', '0');
INSERT INTO `bolumler` VALUES ('17', '4', '1', '2', 'Mijo', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=5d2bf5c8dba8bbf1&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248849&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=95F740FA998742C29C4B339C021F40A96FDD24E6.38067A9D915B7A4256A54125AD71F1C2FC220F64&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=5d2bf5c8dba8bbf1&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248849&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=9D72FD9FF5BDA94E40D4D35A5271E30C15C1FC7A.2DB6A87758FFAA4EA088A8EAF2A3B37068B23492&key=ck2\",label: \"720p\",type: \"mp4\"}]', '1', '2015-02-10 12:46:13', '0', '1', '6', '0');
INSERT INTO `bolumler` VALUES ('18', '4', '1', '3', 'Nacho', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=955c357f6bf33ec3&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248858&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=6F646FB3D0953CE0CA7F885969BED5C909EEB290.29145B81CEA5FF2963D26F1A8A507AB374134632&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=955c357f6bf33ec3&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248858&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=1554AA6EBAA562955AF7C55A04B0CDAB48584C1E.76D536D0C6DFB3BDF620888533EF71B19FFC8B1F&key=ck2\",label: \"720p\",type: \"mp4\"}]', '1', '2015-02-17 12:46:13', '0', '0', '3', '0');
INSERT INTO `bolumler` VALUES ('19', '4', '1', '4', 'Hero', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=bd50515cdce2f328&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248877&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=63A7D1975BDFED65AB6AE5DD3D7E10A893A65BF0.AFB19E02CA9B40331386BB59D1689FE50FE6DA82&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=bd50515cdce2f328&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248877&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=1008549B2D8466CE5B800D3B8FA78BB4995E1BF0.4423E08F0DBD2FCAB3643D972B52C2E757DC8505&key=ck2\",label: \"720p\",type: \"mp4\"}]', '1', '2015-02-24 12:46:13', '0', '0', '3', '0');
INSERT INTO `bolumler` VALUES ('20', '4', '1', '5', 'Alpine Shepherd Boy', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=f956a65382aafe30&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248912&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=39D0D58608FD1C35982EDC3580A3BD1D76D32BE1.196259D9939412A4FAB2AC97C5DF688600762179&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=f956a65382aafe30&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248912&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=6A05399518E80756C7756D48CA2032A5AE1524D7.1FF9305BA8ED10D36F77DAB358DB78E2AC3A6972&key=ck2\",label: \"720p\",type: \"mp4\"}]', '1', '2015-03-03 12:46:26', '0', '0', '2', '0');
INSERT INTO `bolumler` VALUES ('21', '4', '1', '6', 'Five-O', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=21b5493702eacd77&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248948&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=8BFB63AED38129CD70304B2A3A1270EDD3DD4992.1A004B9A9A1A047974DFE9C74291A4B13CDE3B82&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=21b5493702eacd77&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248948&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=962D6CC9A8E76716FF4CFE46BDE66F678A25A2E2.CA150AAE4440A0399EB043953A837F8A2225257&key=ck2\",label: \"720p\",type: \"mp4\"}]', '1', '2015-03-10 12:46:26', '0', '0', '2', '0');
INSERT INTO `bolumler` VALUES ('22', '4', '1', '7', 'Bingo', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=00ec2b84621584f9&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248919&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=5E5649D7E72F31F3DBBC865925D4913E294C374C.29290CADE633E80F82989C09FDCA974E33EDC69D&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=00ec2b84621584f9&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248919&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=9A5CB371CEE98A20583A1C38131CCFF141222897.3A2DACFCE1F4C97A8449A57906A4B4DD74EA7ABE&key=ck2\",label: \"720p\",type: \"mp4\"}]', '1', '2015-03-17 12:46:26', '0', '0', '2', '0');
INSERT INTO `bolumler` VALUES ('23', '4', '1', '8', 'Rico', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=5f4e54581e20aacc&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248927&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=A6783F355942B8D2D94653219A08F4E78D5B6876.7A7A8A35D9483E9F084B4F72C3676B5A7920632D&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=5f4e54581e20aacc&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248927&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=353381739E55DF36B327B9EF79A7DBC6F2459C9F.8C0A479B7BCCF275E697100D38126C8B4DAA0F5D&key=ck2\",label: \"720p\",type: \"mp4\"}]', '1', '2015-03-24 12:46:26', '0', '0', '4', '0');
INSERT INTO `bolumler` VALUES ('24', '4', '1', '9', 'Pimento', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=6ceece55e5046d0e&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248928&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=1FD9080AF1F8DDC52EE0D7D73EFFE70200D9F58A.756A293406E737598F8B4E3552A92EAD14DC1255&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=6ceece55e5046d0e&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248928&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=841B17D95E1846362AE19BEEB2DC2B09CC5C795.9E8B0237C06EAEB231CE797886A90DEAA3C90E76&key=ck2\",label: \"720p\",type: \"mp4\"}]', '1', '2015-12-16 11:08:42', '0', '1', '7', '1');
INSERT INTO `bolumler` VALUES ('25', '4', '1', '10', 'Marco', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=ea7f40617aed719a&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248925&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=2F88C1E1AAD31E1A55CD82BAB820642E41E93BE3.B0A66B7719DF4B856EC76F519A33AB0A3B8D8582&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=ea7f40617aed719a&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433248925&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=7D8DC8A51DC5A4178FC29CC5DB074189767F878E.A7067293443BE995AE7F70ED207B37DAB7A1F4C4&key=ck2\",label: \"720p\",type: \"mp4\"}]', 'test', '2015-12-16 11:08:42', '0', '0', '9', '1');
INSERT INTO `bolumler` VALUES ('26', '10', '1', '6', 'Lockdown', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=7f878d848576dbfd&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251169&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=432CD70CAF09AB8AE32626ACCC2F3763ECD447D1.521DE8C05EDE793138C8D87B0F35BA213AC4059A&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=7f878d848576dbfd&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251169&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=59787E135810F2864403C622824DB65613A06283.12267282D2EE18A4BF9DDB6E98C49B2446E444A3&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=7f878d848576dbfd&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251169&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=99C9D5B15909CC1B4141399E892D2BBFD3E74446.8ACA427F52CB69FA965C7B28F88DEE231770001C&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-04-18 12:48:54', '0', '0', '3', '0');
INSERT INTO `bolumler` VALUES ('27', '10', '1', '7', 'SOS', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=5f90d96a71643556&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251186&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=792552CA5E5FF26015AE096254FCF733A616BED6.B1AAD3A3B6AEA6F0186853A685B19E384D8520A3&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=5f90d96a71643556&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251186&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=8119D8C0BB237C8BF5D4C7C52AFBA818152CBF49.B49BD0107EC326B26B93C372065875A274DB3870&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=5f90d96a71643556&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251186&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=557482A2CA1090634AD5DBD93F6C5C3C0EB8F260.4B1E6A7406E5F22A62B7BDAEFD087B6F65C87180&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-04-18 12:48:58', '0', '0', '2', '0');
INSERT INTO `bolumler` VALUES ('28', '10', '1', '8', 'Two Sailors Walk Into a Bar...', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=83965820f1cca7e5&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251046&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=2C428CA75E6385DDFE1613955AFC987ACF81B620.6E581C5CAAB2D7B8CC46034F57B42B2F4260A050&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=83965820f1cca7e5&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251046&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=72392C6368FCB489A019FD40DA4A3A58E1EAAEE9.A1C429C9DFDCF2BEE859B2E6C515A0F317508F42&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=83965820f1cca7e5&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251046&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=4B5C85C7AF8F2100FAEC771317932211BB393CC.9F1FB01FF086004B1578A551B60954C07E9E8&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-04-18 12:49:03', '0', '0', '0', '0');
INSERT INTO `bolumler` VALUES ('29', '10', '1', '9', 'Trials', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=7ecb49cf6928b1bc&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251210&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=9178921BA2580778C2E82ADA30BECD1CD80F6B67.B3D47DC538C2EAE1F6890332BDB3C80FEEA670A&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=7ecb49cf6928b1bc&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251210&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=AF2CB4F0D27AA43CE78DC78B128E3EC473982B55.208CEF27299463A89A1F65D113347531741685B5&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=7ecb49cf6928b1bc&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251210&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=8B6C4C2C0610AE6723DAC294211DCEC5719AE5E8.558A0087513E92D17D8ADE02568310AAD75D1E1E&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-04-18 12:49:07', '0', '0', '1', '0');
INSERT INTO `bolumler` VALUES ('30', '10', '1', '10', 'No Place Like Home', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=8450bcade215c7b4&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251219&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=4814F431417FA5CB06934224B7989BD471BA9505.79C21F2EA63AC04F891E9A8B43C37CF822C55754&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=8450bcade215c7b4&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251219&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=8ADE3D460EFF0B26ACABA216556E099A51A61F45.2B5303E74F2E75B44F2AB1739F1C38AC5FB38F66&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=8450bcade215c7b4&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1433251219&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=64DAF5A575227CA84E79E1C4E3F4FF97F8A1B376.8CC6AB4A41A9A94646055B1AA42E8393264C9C84&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '1', '2015-12-16 11:08:42', '0', '0', '2', '1');
INSERT INTO `bolumler` VALUES ('31', '1', '1', '6', '', '', '', '2015-04-18 13:31:16', '0', '1', '3', '0');
INSERT INTO `bolumler` VALUES ('32', '1', '1', '7', '', '', '', '2015-04-18 13:31:20', '0', '1', '2', '0');
INSERT INTO `bolumler` VALUES ('33', '1', '1', '8', '', '', '', '2015-04-18 13:31:26', '1', '0', '4', '0');
INSERT INTO `bolumler` VALUES ('34', '1', '1', '9', '', '', '', '2015-04-18 13:31:30', '1', '1', '2', '0');
INSERT INTO `bolumler` VALUES ('35', '1', '1', '10', '', '', '', '2015-04-18 13:31:35', '0', '1', '2', '0');
INSERT INTO `bolumler` VALUES ('36', '1', '1', '11', '', '', '', '2015-04-18 13:31:40', '0', '0', '1', '0');
INSERT INTO `bolumler` VALUES ('37', '1', '1', '12', '', '', '', '2015-04-18 13:31:53', '0', '0', '2', '0');
INSERT INTO `bolumler` VALUES ('38', '1', '1', '13', '', '', '', '2015-04-18 13:31:57', '0', '0', '2', '0');
INSERT INTO `bolumler` VALUES ('39', '1', '1', '14', '', '', '', '2015-04-18 13:32:01', '1', '0', '3', '0');
INSERT INTO `bolumler` VALUES ('40', '1', '1', '15', '', '', '', '2015-04-18 13:32:04', '0', '0', '2', '0');
INSERT INTO `bolumler` VALUES ('41', '1', '1', '16', '', '', '', '2015-04-18 13:32:08', '0', '0', '2', '0');
INSERT INTO `bolumler` VALUES ('42', '1', '1', '17', '', '', '', '2015-04-18 13:32:12', '0', '0', '3', '0');
INSERT INTO `bolumler` VALUES ('43', '1', '1', '18', '', '', '', '2015-04-18 13:32:16', '0', '0', '3', '0');
INSERT INTO `bolumler` VALUES ('44', '1', '1', '19', '', '', '', '2015-04-18 13:32:21', '0', '1', '4', '0');
INSERT INTO `bolumler` VALUES ('45', '1', '1', '20', '', '', '', '2015-04-18 13:32:26', '4', '2', '3', '0');
INSERT INTO `bolumler` VALUES ('46', '1', '2', '1', '', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=128be42a54c733cb&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434419061&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=B1AEEC9CF306597ED6A22D6D7E3AB9D7623FAC85.800EB365F4BCEB5A1D08A34CA5F62984BE0CE958&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=128be42a54c733cb&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434419061&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=40C1854950882CD4BC85A52AB58426276E4B3BE4.73132CEAD213DD9F370ABB449AF0899168ED56D7&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=128be42a54c733cb&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434419061&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=8A994004A11A50A8EC846748E0409D6CF352BE84.1AF2FE6A343B311C597912B2720B267560C4061&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '', '2015-04-18 13:32:36', '0', '0', '2', '0');
INSERT INTO `bolumler` VALUES ('47', '1', '2', '2', '', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=4e9fe83ec7675995&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434419147&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=2705CFEB0E6EECA7106062FB6C617E0DDA2BA7F7.3B0891CFEC72F50CFE600B5C4D97989CAF9317B6&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=4e9fe83ec7675995&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434419147&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=37E02A771F9BDA3CAE527B4E27952DE3E521453.620141D573B986D83407BF8F10EC85ED72240CC9&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=4e9fe83ec7675995&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434419147&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=57689B602A11B2475406E89E8419A102CCFBB52.AA6A61DD62FB4C51123D04C33415BA681F36EBB3&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '', '2015-04-18 13:33:42', '0', '0', '3', '0');
INSERT INTO `bolumler` VALUES ('48', '1', '2', '3', '', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=f92867b9f55d7edc&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434419477&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=540AF70B1BDDFE6808A7796919DD71385018CFBE.B3CBCA4C4E5D892FE3A5EC94A0CDCED9EDDF353&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=f92867b9f55d7edc&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434419477&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=7F12285218E06A6ADB379F774A16ECD2F2541AF8.BB7D0458B42D76B59D8D6D16B390DD421B608F96&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=f92867b9f55d7edc&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434419477&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=805A7E6C2D60980BBEE68A288004ED9A834F3DCA.9BF556EEAA7CC47E5BB2535B5B8604DE649DD4AA&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '', '2015-04-18 13:34:12', '0', '0', '2', '0');
INSERT INTO `bolumler` VALUES ('49', '1', '2', '4', '', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=481266aeca42bb5a&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434419889&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=95D373A66666F3FD248882B6B7DE475193BE401C.66E763C479D5EDA747A2D0B50E28B23EA703F02E&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=481266aeca42bb5a&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434419889&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=8F787B229164C07695BDD7BE0CD6BFF7799E9B02.4FBC2FD580087BBEF897A091333A9690CD0D047A&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=481266aeca42bb5a&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434419889&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=56A38A01151A9950463AD9077B268FB983E3659F.436636AF8A3CDB796684EBC62DE106BC2053CE8F&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '', '2015-04-18 13:34:17', '0', '0', '2', '0');
INSERT INTO `bolumler` VALUES ('50', '1', '2', '5', '', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=d23833e32a8cb4f4&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420038&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=64F65FE7A6B5B2B6613DCCB7D8DDEDE64AB080D4.346C8CA1CC2516C3D14893D65F3E732C4A3D2AA2&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=d23833e32a8cb4f4&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420038&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=5AC9E534A69A5A7C6C276A4A5D596E69274A4A89.1409A1640BB40BEE7C249A1104BAC99F119FE467&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=d23833e32a8cb4f4&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420038&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=956355D9744E35FC87B72753F9B4F7A3E3F94D28.222525A6EE25C225B24199847480B67189E12E6C&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '', '2015-04-18 13:34:21', '0', '0', '2', '0');
INSERT INTO `bolumler` VALUES ('51', '1', '2', '6', '', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=b0104fdfc044b1f0&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420159&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=BC34617392A74DF17BB266AF8CCDA8CB49FDA3E5.660955077647F84E9A9A2552B8ECF9324C9A06C2&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=b0104fdfc044b1f0&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420159&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=1D3F9845067352A08E82A9DF9AEB5EB09DD3E7CD.56C16DC75A968CE34E6CD5E6B607C9C4EFCC5729&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=b0104fdfc044b1f0&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420159&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=2D9E048AA39110EA544FB6E400CF1C5EE3E3C0D8.30D16A9C318EFBD46CE31F7FF10B26524CE5D931&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '', '2015-04-18 13:34:25', '0', '0', '2', '0');
INSERT INTO `bolumler` VALUES ('52', '1', '2', '7', '', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=29938b676fc37ce9&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420428&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=96F9D6AD857FC99FC2ADB216C2D4297450C9B4AF.EF9BC39845C9A67C35E977931D832988904DD70&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=29938b676fc37ce9&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420428&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=BAF37623BE294C8A11A44D6B62F6A21E40ECA7BC.A8EEA3241AC1417599EAB4E4557B2BBB9668C4A8&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=29938b676fc37ce9&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420428&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=A138D812F96CA991C22BCCF5AF44F75976B830E3.B5891D668FC628421522D3BA8EB460D86BE77ABC&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '', '2015-04-18 13:34:29', '1', '0', '3', '0');
INSERT INTO `bolumler` VALUES ('53', '1', '2', '8', '', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=23a660b32e4e8443&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420534&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=9E7E4A8C25FBBB99788CF9AD084D4D92A0F43E53.A3809FAEF49F3E97B004635C13472B7AB15FE4F4&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=23a660b32e4e8443&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420534&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=9571EB0F1EFB499FE479FFD8F40FE7281BDC9BC3.42F9C42888C46EC1C5D9CA8474647D3AEB98CDE5&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=23a660b32e4e8443&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420534&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=6F47C321653A873EECB6568FC158D3A914A55896.3C3A313A6638243E90B1C5C039E1835CBD31E820&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '', '2015-04-18 13:34:32', '0', '0', '1', '0');
INSERT INTO `bolumler` VALUES ('54', '1', '2', '9', '', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=65de000cf3c4ce78&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420598&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=9B739DFFADE9B380F50D775F1FD348EACA98056A.5BB0EBC9AFA979D184980807498AAF440037C3C6&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=65de000cf3c4ce78&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420598&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=692297CE98A1B1F9BEECC094FBEB93B032F74B51.46933C83ABD02A52852500A6E842BBCE9BF4716F&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=65de000cf3c4ce78&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420598&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=3C7E42632EF1F5DDD85E472A1F6DAAF01AC9C0D8.47EF6C03399133ECEEB4DD070FAB3EEB1F0C0C08&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '', '2015-04-18 13:34:36', '0', '0', '1', '0');
INSERT INTO `bolumler` VALUES ('55', '1', '2', '10', '', 'sources: [{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=66b0b3de09842b1a&itag=18&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420673&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=27160906965B2520739E44AC7CBE0FC2ACAD6FA8.2115605554B3A721F28F66915A62F510ED528649&key=ck2\",label: \"360p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=66b0b3de09842b1a&itag=22&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420673&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=B6E73910B782F3AE32BCEBCA11AFA1C9A7B585E8.4AD17F08FECB95BFE2669F7957D0B8C2A93C7597&key=ck2\",label: \"720p\",type: \"mp4\"},{file: \"https://redirector.googlevideo.com/videoplayback?requiressl=yes&shardbypass=yes&cmbypass=yes&id=66b0b3de09842b1a&itag=37&source=webdrive&cmo=secure_transport%3Dyes&ip=0.0.0.0&ipbits=0&expire=1434420673&sparams=requiressl,shardbypass,cmbypass,id,itag,source,ip,ipbits,expire&signature=5F6F71D2EC462B0ACB5AE34501AB8462D3BD6366.13E284F61E3986F4C389BD82295668DA8BC5ED82&key=ck2\",label: \"1080p\",type: \"mp4\"}]', '', '2015-04-18 13:34:40', '0', '0', '2', '0');
INSERT INTO `bolumler` VALUES ('128', '6', '4', '20', '', 'sources: [{\r\n                file: \"https://lh3.googleusercontent.com/tGHjLpjpPcZCxkQRXUCiu9o8rbl4aQCs7jUzJLTAcfOA=m18\",\r\n                label: \"360p\",\r\n                type: \"mp4\"\r\n            },{\r\n                file: \"https://lh3.googleusercontent.com/tGHjLpjpPcZCxkQRXUCiu9o8rbl4aQCs7jUzJLTAcfOA=m22\",\r\n                label: \"720p\",\r\n                type: \"mp4\"\r\n            },{\r\n                file: \"https://lh3.googleusercontent.com/tGHjLpjpPcZCxkQRXUCiu9o8rbl4aQCs7jUzJLTAcfOA=m37\",\r\n                label: \"1080p\",\r\n                type: \"mp4\"\r\n            }]\r', '', '2015-12-22 19:35:26', '0', '0', '1', '1');

-- ----------------------------
-- Table structure for diziler
-- ----------------------------
DROP TABLE IF EXISTS `diziler`;
CREATE TABLE `diziler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `imdb_id` varchar(20) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `country` varchar(22) NOT NULL,
  `year_started` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `imdb_rating` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permalink` (`permalink`),
  KEY `title` (`title`),
  KEY `imdb_id` (`imdb_id`),
  KEY `imdb_rating` (`imdb_rating`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of diziler
-- ----------------------------
INSERT INTO `diziler` VALUES ('1', 'Leyla ile Mecnun', 'Turkish television comedy series set in Istanbul, Leyla and Mecnun is a surreal and absurd comedy that revolves around the fictional love story between Leyla and Mecnun.', 'leyla-ile-mecnun', 'tt1831164', '80', 'Türkiye', '2011', 'Dram|Komedi|Macera', '4', '9.2');
INSERT INTO `diziler` VALUES ('2', 'Game of Thrones', 'Dizi Westeros kıtasındaki birleşik Yedi Krallık\'ın uzun yazdan çıkmasının ve kışın yaklaşması ile başlar. Lord Eddard Stark\'ın eski ve yakın arkadaşı Kral Robert Baratheon, eski Kral Eli ve Eddard\'ın akıl hocasıJon Arryn\'nin ölmesi üzerine kendisinden yeni Kral Eli olmasını ister. Eddard, Jon\'un öldürüldüğü ile aldığı bir mesajdan sonra isteksiz de olsa bu görevi kabul eder.\r\n\r\nBu arada, Robert\'ın tahta hak iddia edenleri yok etmesinin ardından batı kıta olan Essos\'a sürülen Targaryen Hanesi\'nin çocukları, Westeros\'a dönmenin ve \'gaspçı\'yı tahttan indirmenin yollarını aramaktadırlar. Bu amaçla Viserys Targaryen, kız kardeşi Daenerys Targaryen ve 40.000 Dothraki\'nin lideri olan Khal Drogo arasında bir evlilik düzenler. Amacı ise Dothraki ordusunu Westeros\'u işgalinde kullanmaktır. Daenerys ise sadece Kral Robert\'ın suikastçılarından ve abisinin entrikalarından sığınacak güvenli bir yer arar.\r\n\r\nSon olarak da Yedi Krallık\'ın kuzeyini çevreleyen Sur\'un yeminli kardeşleri olan Gece Nöbetçileri, binlerce yıldır buzdan yapılmış devasa surda bekçilik yapmaya devam etmektedir. Nöbet Sur\'u, Sur\'un Ötesi\'nde yaşayan yabanıllar\'ın yağmalarından korumakla görevlidir. Fakat bazı söylentilere göre Daimi Kış Toprakları\'n da yeni bir tehdit söz konusudur.', 'game-of-thrones', 'tt0944947', '55', 'USA, UK', '2011', 'Fantastik|Dram|Macera', '1', '9.5');
INSERT INTO `diziler` VALUES ('3', 'Breaking Bad', 'A chemistry teacher diagnosed with a terminal lung cancer, teams up with his former student, Jesse Pinkman, to cook and sell crystal meth.', 'breaking-bad', 'tt0903747', '45', 'USA', '2008', 'Gerilim|Dram|Suç', '3', '9.5');
INSERT INTO `diziler` VALUES ('4', 'Better Call Saul', 'Breaking Bad spin-off’u. Breaking Bad’te Walter White ve Jesse’nin avukatı ve aynı zamanda suçluların bir numaralı adresi olan Saul Goodman odaklı olacak dizi bir “prequel” olacak. Yani Breaking Bad’teki zamanın daha öncelerine bir yolculuk yapacağız ve Saul Goodman henüz Walter ve Jesse ile tanışmamış olacak. Saul Goodman’ı bol bol mahkemelerde göreceğiz.', 'better-call-saul', 'tt3032476', '60', 'USA', '2015', 'Dram|Suç|Komedi', '2', '9.2');
INSERT INTO `diziler` VALUES ('5', 'The Walking Dead', 'Sheriff\'s Deputy Rick Grimes leads a group of survivors in a world overrun by zombies.', 'the-walking-dead', 'tt1520211', '44', 'USA', '2010', 'Gerilim|Korku|Dram', '2', '8.7');
INSERT INTO `diziler` VALUES ('6', 'Person of Interest', 'An ex-assassin and a wealthy programmer save lives via a surveillance AI that sends them the identities of civilians involved in impending crimes. However, the details of the crimes--including the civilians\' roles--are left a mystery.', 'person-of-interest', 'tt1839578', '43', 'USA', '2011', 'Bilim Kurgu|Gizem|Dram|Aksiyon', '1', '8.5');
INSERT INTO `diziler` VALUES ('7', 'Dexter', 'A Miami police forensics expert moonlights as a serial killer of criminals whom he believes have escaped justice.', 'dexter', 'tt0773262', '55', 'USA', '2006', 'Gizem|Dram|Suç', '3', '8.9');
INSERT INTO `diziler` VALUES ('8', 'Arrow', 'Spoiled billionaire playboy Oliver Queen is missing and presumed dead when his yacht is lost at sea. He returns five years later a changed man, determined to clean up the city as a hooded vigilante armed with a bow.', 'arrow', 'tt2193021', '42', 'USA', '2012', 'Gizem|Suç|Macera|Aksiyon', '2', '8.2');
INSERT INTO `diziler` VALUES ('9', 'iZombie', 'A medical resident finds that being a zombie has its perks, which she uses to assist the police.', 'izombie', 'tt3501584', '23', 'USA', '2015', 'Korku|Dram|Suç', '1', '8.1');
INSERT INTO `diziler` VALUES ('10', 'The Last Ship', 'Dizi, William Brinkley’in 1988′de yayınlanan aynı isimli romanının uyarlaması... İnsanlık yok olmanın eşiğinde; çünkü dünya genelinde bir felaket gerçekleşmiştir. Bir virüs ortalığı kasıp kavurmuş ve bir avuç insan hayatta kalmıştır. Bir muhribin (torpido, top ve denizaltılara karşı silahlarla donatılmış, küçük, hızlı giden savaş gemisi) mürettebatı, virüsün çaresini bulmak ve insanlığı kurtarmak için ellerinden geleni yapmak zorundadırlar.\r\n\r\nMichael Bay, Bryan Fuller ve Andrew Form üçlüsü yapımcılığı, ilk bölümü kaleme alan Hank Steinberg ve Steven Kane de dizinin yürütücülüğünü üstlenecek.', 'the-last-ship', 'tt2402207', '60', 'USA', '2014', 'Bilim Kurgu|Dram|Aksiyon', '2', '7.3');
INSERT INTO `diziler` VALUES ('11', 'Vikings', 'The adventures of Ragnar Lothbrok: the greatest hero of his age. The series tells the saga of Ragnar\'s band of Viking brothers and his family as he rises to become King of the Viking tribes...', 'vikings', 'tt2306299', '44', 'Ireland, Canada', '2013', 'Tarih|Dram|Aksiyon', '1', '8.6');
INSERT INTO `diziler` VALUES ('12', 'Daredevil', 'A blind lawyer, with his other senses superhumanly enhanced, fights crime as a costumed superhero.', 'daredevil', 'tt3322312', '60', 'USA', '2015', 'Bilim Kurgu|Aksiyon', '3', '9.3');
INSERT INTO `diziler` VALUES ('13', 'The Last Man On Earth', 'Phil miller was a normal guy, but when a plague struck, he became the last man on earth. His only wish was to have company, preferably a female. When he meets a survivor named carol, he starts to rethink his wish.', 'the-last-man-on-earth', 'tt3230454', '30', 'USA', '2015', 'Komedi|Aksiyon', '2', '7.8');
INSERT INTO `diziler` VALUES ('14', 'The Flash', 'Barry Allen wakes up 9 months after he was struck by lightning and discovers that the bolt gave him the power of super speed. With his new team and powers, Barry becomes \\\"The Flash\\\" and fights crime in Central City.', 'the-flash', 'tt3107288', '0', 'USA', '2014', 'Dram|Macera|Aksiyon', '2', '8.2');
INSERT INTO `diziler` VALUES ('15', 'Lost', 'The survivors of a plane crash are forced to work together in order to survive on a seemingly deserted tropical island.', 'lost', 'tt0411008', '44', 'ABD', '2004', 'Bilim Kurgu|Fantastik|Dram|Macera', '3', '8.5');
INSERT INTO `diziler` VALUES ('16', 'The Strain', 'A thriller that tells the story of Dr. Ephraim Goodweather, the head of the Center for Disease Control Canary Team in New York City. He and his team are called upon to investigate a ...', 'the-strain', 'tt2654620', '43', 'ABD', '2014', 'Gerilim|Korku|Dram', '2', '7.7');

-- ----------------------------
-- Table structure for forum_konular
-- ----------------------------
DROP TABLE IF EXISTS `forum_konular`;
CREATE TABLE `forum_konular` (
  `id` int(33) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `showid` int(11) DEFAULT NULL,
  `bermalink` varchar(255) DEFAULT NULL,
  `owner` int(33) DEFAULT NULL,
  `date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of forum_konular
-- ----------------------------

-- ----------------------------
-- Table structure for forum_mesajlar
-- ----------------------------
DROP TABLE IF EXISTS `forum_mesajlar`;
CREATE TABLE `forum_mesajlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `like` int(11) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `bost_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of forum_mesajlar
-- ----------------------------

-- ----------------------------
-- Table structure for haberler
-- ----------------------------
DROP TABLE IF EXISTS `haberler`;
CREATE TABLE `haberler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(33) NOT NULL,
  `content` varchar(255) NOT NULL,
  `pic` varchar(33) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of haberler
-- ----------------------------
INSERT INTO `haberler` VALUES ('2', 'dizi arşivi ve beta süreci', 'beta sürecinde arşivimizi 350-400 diziye ulaştırmayı hedefliyoruz. arşivimizi bir anda birkaç yıllık dizi sitesi arşivine ulaştırmayacağımızı kabullenelim. öncelikli dizi istekleriniz için geri bildirimlerinizi takip ediyor olacağız.', '6_news', '2015-04-30 15:49:00');
INSERT INTO `haberler` VALUES ('3', 'alternatif video kaynakları.', 'dizileri barındırdığımız video kaynaklarını henüz stabilleştirebilmiş değiliz. yakın zamanda tüm bölümler için alternatif video kaynaklarını sunacağız. şimdilik karşılaştığınız hataları \"hata bildir\" ile bildirebilirsiniz.', '8_news', '2015-05-13 18:25:43');
INSERT INTO `haberler` VALUES ('1', 'dizilab. yayın hayatına başladı!', 'uzun süredir üzerinde uğraştığımız dizilab. yayın hayatına nihayet başladı. birbirinin klonu onlarca dizi sitesi varken bize şans vermenizi ümit ediyoruz.', '5_news', '2015-04-27 22:06:03');

-- ----------------------------
-- Table structure for istekler
-- ----------------------------
DROP TABLE IF EXISTS `istekler`;
CREATE TABLE `istekler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `who` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of istekler
-- ----------------------------

-- ----------------------------
-- Table structure for izlediklerim
-- ----------------------------
DROP TABLE IF EXISTS `izlediklerim`;
CREATE TABLE `izlediklerim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=214 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of izlediklerim
-- ----------------------------

-- ----------------------------
-- Table structure for oyuncular
-- ----------------------------
DROP TABLE IF EXISTS `oyuncular`;
CREATE TABLE `oyuncular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `bermalink` varchar(255) DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of oyuncular
-- ----------------------------
INSERT INTO `oyuncular` VALUES ('1', 'Ezgi Asaroglu', 'ezgi-asaroglu', 'Izmir, Türkiye', '1987-06-18');

-- ----------------------------
-- Table structure for uyeler
-- ----------------------------
DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE `uyeler` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `birthday` varchar(10) NOT NULL DEFAULT '',
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `photo` int(11) NOT NULL,
  `type` enum('n','f','t','w','g') NOT NULL DEFAULT 'n',
  `info` varchar(255) DEFAULT '',
  `permission` int(1) NOT NULL DEFAULT '0',
  `last_activity` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `konum` varchar(255) NOT NULL,
  `adsoyad` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uyeler
-- ----------------------------
INSERT INTO `uyeler` VALUES ('1', 'root', 'test', '', 'm', '', '', '', '0', 'n', '', '2', '2015-12-20 01:04:45', '2015-05-15 22:32:34', '1', '', '');
INSERT INTO `uyeler` VALUES ('2', 'atmin', 'test', '', 'm', '', '', '', '0', 'f', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '');
INSERT INTO `uyeler` VALUES ('8', 'knk', 'test', '', 'f', '', '', '', '0', 'n', '', '0', '2015-06-16 00:14:56', '0000-00-00 00:00:00', '1', '', '');

-- ----------------------------
-- Table structure for yaptiklarim
-- ----------------------------
DROP TABLE IF EXISTS `yaptiklarim`;
CREATE TABLE `yaptiklarim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL DEFAULT '0',
  `target_id` int(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1',
  `wall` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yaptiklarim
-- ----------------------------

-- ----------------------------
-- Table structure for yorumlar
-- ----------------------------
DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `target_id` int(11) DEFAULT NULL,
  `content` varchar(377) NOT NULL,
  `type` int(1) NOT NULL,
  `liked` int(11) NOT NULL,
  `unliked` int(11) NOT NULL,
  `spoiler` int(11) NOT NULL,
  `tarih` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yorumlar
-- ----------------------------
