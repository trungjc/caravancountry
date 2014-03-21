-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2014 at 07:13 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `caravancountry`
--

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_advancedmodules`
--

CREATE TABLE `i4aj7_advancedmodules` (
  `moduleid` int(11) unsigned NOT NULL DEFAULT '0',
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`moduleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i4aj7_advancedmodules`
--

INSERT INTO `i4aj7_advancedmodules` (`moduleid`, `asset_id`, `params`) VALUES
(1, 77, '{"assignto_menuitems_selection":[],"assignto_menuitems":0}'),
(19, 66, '{"assignto_menuitems_selection":[],"assignto_menuitems":0}'),
(21, 67, '{"assignto_menuitems_selection":[],"assignto_menuitems":0}'),
(22, 78, '{"assignto_menuitems_selection":[],"assignto_menuitems":0}'),
(24, 64, '{"assignto_menuitems_selection":["115"],"assignto_menuitems":1}'),
(26, 79, '{"assignto_menuitems_selection":["115"],"assignto_menuitems":1}'),
(47, 68, '{"assignto_menuitems_selection":[],"assignto_menuitems":0}'),
(48, 69, '{"assignto_menuitems_selection":[],"assignto_menuitems":0}'),
(87, 70, '{"assignto_menuitems_selection":[],"assignto_menuitems":0}'),
(89, 71, '{"assignto_menuitems_selection":[],"assignto_menuitems":0}'),
(90, 72, '{"assignto_menuitems_selection":[],"assignto_menuitems":0}'),
(91, 80, '{"hideempty":"0","color":"none","mirror_module":"0","mirror_moduleid":"92","match_method":"and","show_assignments":"1","assignto_menuitems":"1","assignto_menuitems_selection":["115"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_date":"0","assignto_date_publish_up":"-0001-11-30 00:00:00","assignto_date_publish_down":"-0001-11-30 00:00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0","assignto_urls":"0","assignto_urls_selection":"","assignto_urls_regex":"0","assignto_os":"0","assignto_browsers":"0","assignto_components":"0","assignto_tags":"0","assignto_tags_inc_children":"0","assignto_contentpagetypes":"0","assignto_cats":"0","assignto_cats_inc_children":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_articles":"0","assignto_articles_keywords":""}'),
(93, 73, '{"assignto_menuitems_selection":[],"assignto_menuitems":0}'),
(94, 74, '{"assignto_menuitems_selection":[],"assignto_menuitems":0}'),
(95, 75, '{"assignto_menuitems_selection":[],"assignto_menuitems":0}'),
(96, 76, '{"assignto_menuitems_selection":[],"assignto_menuitems":0}'),
(102, 65, '{"hideempty":"0","color":"none","mirror_module":"0","mirror_moduleid":"92","match_method":"and","show_assignments":"1","assignto_menuitems":"0","assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"1","assignto_date":"0","assignto_date_publish_up":"-0001-11-30 00:00:00","assignto_date_publish_down":"-0001-11-30 00:00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0","assignto_urls":"0","assignto_urls_selection":"","assignto_urls_regex":"0","assignto_os":"0","assignto_browsers":"0","assignto_components":"0","assignto_tags":"0","assignto_tags_inc_children":"0","assignto_contentpagetypes":"0","assignto_cats":"0","assignto_cats_inc_children":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_articles":"0","assignto_articles_keywords":""}');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_ak_profiles`
--

CREATE TABLE `i4aj7_ak_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `configuration` longtext,
  `filters` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `i4aj7_ak_profiles`
--

INSERT INTO `i4aj7_ak_profiles` (`id`, `description`, `configuration`, `filters`) VALUES
(1, 'Default Backup Profile', '###AES128###Mg6T75RDIhfBSCZUOivw5SH/16rKzHCc1SuHNWurGYAQmcOZgrBmyK72+GpwM8IcO6/SfNLGQdO9aCG5SEMKVH4wSqnARfwa5JPOWJNHA2fT/w+QfpYQgjZLGqBAdaqkGyGiWHGOyaL1Nxk+kNasE1Nkph8vmmQ3/a4tbc8vrpN49101xGfq0/NHERpQ7RGAQ1PmvuMjeL6RVOd7t6HaHHBkBOWuY6r11PPkfNudVx2b0ZOh7D8775JAPWuxqxRKYnpBcPb+3312dwgIwSKPxyzSOXn+WOg+mTzNfipmC4AfAV9yw3aTMN+2t45laYhKzigI1YZanzRf69tU13uH7FYodsxI4nV/k+jBL4kU+U6e64fbGtBCe1MG65FCdwbksovedG+9oSjxrzQGS2VzXEjhBdC15qkpHloyyGyPxBkdP7wD+zjDiz+rMnPxiHDllGC9s8+DTiShvzqHBF7ELlXNaZjlkRvTEfPU3eFJXN3tyvQZbOTt9fdTtPkYrE2eShKm+G2e0op1aDPDqqRt9RO+5o6nlnHmEvjZ05SuDf7EqUZ2wAnfskPiMWA92pycrdM5T/2ov6zsD3AHIQFWM/uGMPcdFUCz5p7YBhjGEEVJe4PuPk75OOFd8KNZamCs++DfjLlyqRZ3Stf2i5qV5SmbinNJbXhdJNjDSUReHNFmUpyA4Hnzi1dBgGb9eVfN93R+eVNlG3+Nw2+TqCjcI2meKj6dm8dZvggnKOD177VKRupHBVwGm+uHpSK9lUUTOHRsSvIonfHIEVRNORhhsSZwZnzj4EGwtnNT2AqjXNLThj9L680IhVRPfntCqle6U6y5K1nM8QhEnnZbRHQ7CQJ6MzIIqsG8RqtUM7dxHgGFbV3j+6myCCqKxRod6njC1S0UFYizPCdbQddTFibFVR7mge97mw7sJO+4/f7dA8FS+qbrkS3vNobCv6ER/OFVXUc/DnOQZaghqGjhWQ9NxaiL2yjUw7+NK3cKWkBmCXto28vMCcEttK1iDgzMgbBicmuVDKbz/txyHqoC+1SmW+hzE7aIczw2M5ImkPWNa1FPDEA3GB4aDulgC17EktiEpFqPWu91UMFKvjIpcXKewK/xvy9TtQPCoaVfLLFxEzpPrJsnQLDK5q1OHRViDWuYpSj8f2U9x/yS3ZmDBOcVFz2cdCIeINfh4kTPT5xpLwR1eROzZtiY3DnBV9Ckn03+k9Js8ynccvEH0yh8uV5hp62vpTCjAzowdCzahoEQeJge+VJifHPpeg+JVYAlVCJ0hM1r/mB1AiIWA23t3AkqSUPbTmCcsnFeQ6SQnLnLjSIhC53U0kY+AqofjKI/4/kLLQdpOvX7A+CsZpplY21q8ex0IKiFY7/SCbRmbgNcooQd6w9z3k6sMYCmQDGjnoLaX29KeE1ss/I8DrDKuF9Li6SrADcPBvD3dg4PYB98RX7ANB81Z2tV+630ob3+pL/MjjEjq7t766JWUTV0Kg9eBGPOvzCSe7gBAgnfoSBdWDfq6WznPK1d/5Zee6Rjsk8ICmTCwOJRdUxxKIWf7WO4l3cax40HVD3m6vEECo1X7dUEIwMxfR3DlQ5NStjP3vHAuekyTBMkjLKGCW0a4k1tu35T8CkmP7i7IqJhJ4nS56HrRKVeiYHaiosGJA66Bb/SFdNzmnWFFHqXpINq+liouMHqlGMs/XC+oa8oE+HoH4/mHyVFtU4p4Uk+c8aVhWoRcFM9fXYkquCpxxKG1GuCD7VTEb318ILSj3yvvYG3blAOgWtQAeAF1wELYuHIdgOamNA65OWLlLWD0+QRoAciJcRBqyf9sFjSxHzTUI5uu0saJyYC6MCsX0aPg/Ik+AVa6ZJP6NlwG2JXA0lS6xRRR2xfP0f3UVKF4tHoJuF1K00jR4sbfTWPTGPiajnPrOHDVzF//SPHzqrr0Dv46nimYoeYmbpFFeomTBK1l0cbmouj2lHvebiwLpi27Xj73Yi0wW+AYdAU6IKgXyivFI28zjivk5sBbzZ2a/v4idzIazIOnJ+Dz6F83Ny0LuDWg+uj1UrIcQ/nHsd1n//tblZlYsx1TQMz00L7ITjhZmxYIZ8z6mDz2MTiboQ6w/gzJJbjltHDrRB/nkKuB4hkpVHPuqkM73mZlglxYbSSNzj2QDRstQ3MKr/1VTddK3+xrqNygEt7w8o4bVYfOEyVoIZj35toAy6Pfx4fgBCmRJRA+JU6OeTq0qN+73x6dN/MUP0JWg688rnOwPFHdQg/Tyn0pIyAIuxeIHmToNYGtBJ8h60cTKRdXW5KgNeFzFuM+2TqpEBO+4J9quMaIsMxo2XAXNgUE38xkgYBaqN9UNffRIfXXRLqMc/TmSRvYBvN23opgSiT0AZ+XvxbVTelfZFatw9X/nMfzkJWl91W+s1wiRBPjDQgI98uKREFJnMX5g4OLWoRsOB7X8z/Dujq4ECfw4o/C6htn0joIB0R6+CpbO+QRwjB7OYnMXZZkqojk0MMGLI9ugKng6K66Fi+5Ly82krfl2cI4THpZs55FKUMhiMVm9k2J8JRv4tA/snE8uh3xWxMsuLprzfJ2+2npe3EXPQDAEeCdDLLunR0CuOZsulrXeCTL/S/MRs4he36jeqBGeu8bgYQRw/ZmBI0iNTV5iceUQI43Mr0RZMT6JK4ED2Edtf+xYi/UJ1a8JU07NmgULZqbcjpXMQEOQ7q6RUZc+9SmOIwsT1L/eon8El2bpR/11ImtZZYcxrbW4npGIwxZLUs9swFKmE3eG0N7LbcR4hT26YPd7dIlxWU/clVzm/f2X/wmV3anKuqcciEtbAC8EKCIjimb/DDvSVwW+B1yLiJaNMKDm41p5yUe2BFETGPp1m1q/pvpaJbPVhT0ISROGaF2NdC6vUusADQmoJ1PoPDGKC9gaKGgKTJpm7NAi1ZGeC5dC2z3e1qjGMkgnOWXC+e5Dsqubw+BC0p1CAGqZUpwMpsKY30q4g+c9wrpjvp7bnP/qqL+f6ygn4Glaj+zuxuJvCN9hOBMNQuDZrLvzAqrRB/SfwW8Va7rw8ACGUr3sSsmvtUIWaDwh0KXtIAupOWj69kDDoghULmPhYCDEJtJQB/t4ogArWhN0iltSb+lNoEI/BOryCtAvtkB8ONsCVlQs8HHrMRbHNMLUPhDQ4wctWgp6XU/AAZqJdGsKLOnrReCQDeNjjYCZRWRB8gBDxFBtYsvvOCK+A7xY0M6n1kWFypRdvV1Dq96XvbXuaIRiXGXs4j0sVbKaehxgZ5DvaHqf4XtLVTAQHWd4aFgSMe/YTLryBMdjxgEtup4i4ltlzhg9HO8eyhbTnG2Grnn3vWTQj03W2E4KCMHBVvCfKSOIf7pg9t0b40jkiYManOT6d3xglfAvZ3VlEqKMjN978XqhFbTSguyPCjmbVABVuLKzdzXdmxf1CAeOlofbn0MRDtcd3mG9FyUySfj7FN/LNJPMCh1Db3co8iwTgcWLNxf4Dpf69qKFgJ+Yli4xOoyLyyl05Omag9TSnXpkJWRpmuvzi9Zm5suIsiivjLiQEkPCMwiTx96/w6S5qAS4s0TRxUxCbe5jBVi2kkK3LhC1S0NzoWnGWHsP6/nJ8GXnKb86kjClQCEB+KUrULaqJZRMvu0ILt2OeYdVrdsLO+9fY5t86Oltt0Mp6gIefMF6d4qOZ39LI9OXYqhHSg2UoCNbBfPW5Ydl5HrSn+3Y/vri9ENkoRUSrQRDgLheWdMPx9kaR+TWCNSUfjyDhIVABa9PRgquQrTQwj0S8RfJ6CSHf4AEUH6agEfBmD7wcOn3PWu2rniK4SguzAgd+37QH6nq/Zw/UDNEVfLYqnY27bgkCegUdq9x2yc06wYxQMkfp3kIQxKILxeG2HK6fPp52g2V+c27e+FYcyJ4G7Vze8MMQa8hZO4J12SywePzQCBcK1jjofOeH67V1tjWFcCycWM1lR2g/iiXtJCMJ/JGYsEUjunF5sq/nxRK28gAQItStb7exko/L4Px/iQhd7j/ubllfe3qsVuwJbHD2XrIwJ9uO/tAplhFuTLHgIG+Id8FtaOi7AUHY6rbf+DviFFyKEjtX0le5oMheOw+iAxyHz92wa+sh3J3XFySD+m0mZgjz1QSs2Dn5RD6RjlEEZk5mb0mgl/PioFaEfTspFM9Vw1BlB2lMopeGnTtKd6KTz5yz0PIqAEm9AmZsw4VENeTDGA7WCDJnzUQYvkwndaRQmRcglQW2YdgTpLvPxkiRtVtczf+eUXmlOY2TsgIN1iLNASmHl4d1JR3JGfZAiRHKJNlR6O8hl5ZkQGs0mRB2Nbay8JfQLD0KP1YmusTFUuwBUJK6SutFo7AUWVPBx4tTjPYzpilJGN8GTblbqQAkg2r2xCBuPdZPwX0BIpRgm/0wcPUQAL+nzrf2hyKmvA3lfN4+jBC5mHjZL9hPezgv/YWyZpE8SC9PzAk1twKDOhtXtttCjN4p/M4BlamoTe2+uNYtfDrEHxvNHeMh+7AKWZpVqHUEwKfVEq7u6MJAhk3i6vJipmFFb6TzKh7ypdCDvAbkMlI1QIsHuVpbZ1IqKQRR1A09qQHUKvf7TxddBe+gtKHNe8yw5RcfNibPXIjloCOvtHNbKNO+wH/ffc2WBCWOx1ago7qEvaSDy5FpccUS3XtbAdSFbbXUuDq6eh/Vd9ORwDuja5JRqbsbEcQqDJHGyTkSe/cILhsGK5bWMkQgu7EhCf4gPHZ0HlZQay17Jlur7YrrAg4mBKhuGXLkduLx7IyAcCIm/UdJ97jTEKIFvwBGTG0PQxVojt1IP/tEjAjzBVQAxX0vhE7FcQ93BtURzXUbv7TF2lqvG22tqLvq5fsOhfuX/nlVHm/wcA5QzLqrITfbZzjGBgkdHxRSqrB/B/Wyb62FZEImNczuhjqsSkJ0rAVZdJzBhkBlvrMH24Jr8rZieR5MbVny49SPCm/coxxBmpZ3Tk56iAepYWE0cGeZNrmh47bcwz+/s1bTb8YfT3i8rzxk1Y1Z84lc2cJSHcH5fki5KVT26p1OpA73t4NnsUPcHRW2FSUri4Ma7v+ORA0NrJI5hdzOTL8XrWuAOAAA=', '');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_ak_stats`
--

CREATE TABLE `i4aj7_ak_stats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `comment` longtext,
  `backupstart` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `backupend` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('run','fail','complete') NOT NULL DEFAULT 'run',
  `origin` varchar(30) NOT NULL DEFAULT 'backend',
  `type` varchar(30) NOT NULL DEFAULT 'full',
  `profile_id` bigint(20) NOT NULL DEFAULT '1',
  `archivename` longtext,
  `absolute_path` longtext,
  `multipart` int(11) NOT NULL DEFAULT '0',
  `tag` varchar(255) DEFAULT NULL,
  `filesexist` tinyint(3) NOT NULL DEFAULT '1',
  `remote_filename` varchar(1000) DEFAULT NULL,
  `total_size` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_fullstatus` (`filesexist`,`status`),
  KEY `idx_stale` (`status`,`origin`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_ak_storage`
--

CREATE TABLE `i4aj7_ak_storage` (
  `tag` varchar(255) NOT NULL,
  `lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data` longtext,
  PRIMARY KEY (`tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_assets`
--

CREATE TABLE `i4aj7_assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set parent.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `level` int(10) unsigned NOT NULL COMMENT 'The cached level in the nested tree.',
  `name` varchar(50) NOT NULL COMMENT 'The unique name for the asset.\n',
  `title` varchar(100) NOT NULL COMMENT 'The descriptive title for the asset.',
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_asset_name` (`name`),
  KEY `idx_lft_rgt` (`lft`,`rgt`),
  KEY `idx_parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `i4aj7_assets`
--

INSERT INTO `i4aj7_assets` (`id`, `parent_id`, `lft`, `rgt`, `level`, `name`, `title`, `rules`) VALUES
(1, 0, 0, 161, 0, 'root.1', 'Root Asset', '{"core.login.site":{"6":1,"2":1},"core.login.admin":{"6":1},"core.login.offline":{"6":1},"core.admin":{"8":1},"core.manage":{"7":1},"core.create":{"6":1,"3":1},"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1},"core.edit.own":{"6":1,"3":1}}'),
(2, 1, 1, 2, 1, 'com_admin', 'com_admin', '{}'),
(3, 1, 3, 6, 1, 'com_banners', 'com_banners', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(4, 1, 7, 8, 1, 'com_cache', 'com_cache', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(5, 1, 9, 10, 1, 'com_checkin', 'com_checkin', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(6, 1, 11, 12, 1, 'com_config', 'com_config', '{}'),
(7, 1, 13, 16, 1, 'com_contact', 'com_contact', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(8, 1, 17, 62, 1, 'com_content', 'com_content', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":[],"core.edit":{"4":1},"core.edit.state":{"5":1},"core.edit.own":[]}'),
(9, 1, 63, 64, 1, 'com_cpanel', 'com_cpanel', '{}'),
(10, 1, 65, 66, 1, 'com_installer', 'com_installer', '{"core.admin":[],"core.manage":{"7":0},"core.delete":{"7":0},"core.edit.state":{"7":0}}'),
(11, 1, 67, 68, 1, 'com_languages', 'com_languages', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(12, 1, 69, 70, 1, 'com_login', 'com_login', '{}'),
(13, 1, 71, 72, 1, 'com_mailto', 'com_mailto', '{}'),
(14, 1, 73, 74, 1, 'com_massmail', 'com_massmail', '{}'),
(15, 1, 75, 76, 1, 'com_media', 'com_media', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":{"5":1}}'),
(16, 1, 77, 78, 1, 'com_menus', 'com_menus', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(17, 1, 79, 80, 1, 'com_messages', 'com_messages', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(18, 1, 81, 82, 1, 'com_modules', 'com_modules', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(19, 1, 83, 86, 1, 'com_newsfeeds', 'com_newsfeeds', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(20, 1, 87, 88, 1, 'com_plugins', 'com_plugins', '{"core.admin":{"7":1},"core.manage":[],"core.edit":[],"core.edit.state":[]}'),
(21, 1, 89, 90, 1, 'com_redirect', 'com_redirect', '{"core.admin":{"7":1},"core.manage":[]}'),
(22, 1, 91, 92, 1, 'com_search', 'com_search', '{"core.admin":{"7":1},"core.manage":{"6":1}}'),
(23, 1, 93, 94, 1, 'com_templates', 'com_templates', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(24, 1, 95, 98, 1, 'com_users', 'com_users', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(25, 1, 99, 102, 1, 'com_weblinks', 'com_weblinks', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":[],"core.edit":{"4":1},"core.edit.state":{"5":1},"core.edit.own":[]}'),
(26, 1, 103, 104, 1, 'com_wrapper', 'com_wrapper', '{}'),
(27, 8, 18, 19, 2, 'com_content.category.2', 'General', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(28, 3, 4, 5, 2, 'com_banners.category.3', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(29, 7, 14, 15, 2, 'com_contact.category.4', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(30, 19, 84, 85, 2, 'com_newsfeeds.category.5', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(31, 25, 100, 101, 2, 'com_weblinks.category.6', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(32, 24, 96, 97, 1, 'com_users.category.7', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(33, 1, 105, 106, 1, 'com_finder', 'com_finder', '{"core.admin":{"7":1},"core.manage":{"6":1}}'),
(34, 1, 107, 108, 1, 'com_joomlaupdate', 'com_joomlaupdate', '{"core.admin":[],"core.manage":[],"core.delete":[],"core.edit.state":[]}'),
(35, 1, 109, 110, 1, 'com_tags', 'com_tags', '{"core.admin":[],"core.manage":[],"core.manage":[],"core.delete":[],"core.edit.state":[]}'),
(37, 54, 33, 34, 3, 'com_content.article.1', 'Home Testing Page', ''),
(38, 54, 31, 32, 3, 'com_content.article.2', 'Home', ''),
(39, 54, 29, 30, 3, 'com_content.article.3', 'History', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(40, 54, 35, 36, 3, 'com_content.article.4', 'New caravans', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(41, 54, 41, 42, 3, 'com_content.article.5', 'Pre-owned caravans old', ''),
(42, 54, 37, 38, 3, 'com_content.article.6', 'Our Services', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(43, 54, 25, 26, 3, 'com_content.article.7', 'Contact us', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(44, 54, 43, 44, 3, 'com_content.article.8', 'Regal Caravans', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(45, 54, 27, 28, 3, 'com_content.article.9', 'Coronet Caravans', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(46, 54, 49, 50, 3, 'com_content.article.10', 'The Prince', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(47, 54, 45, 46, 3, 'com_content.article.11', 'The Carrington', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(48, 54, 47, 48, 3, 'com_content.article.12', 'The Farren', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(49, 54, 21, 22, 3, 'com_content.article.13', '404', ''),
(50, 54, 39, 40, 3, 'com_content.article.14', 'Pre-owned caravans', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(51, 54, 23, 24, 3, 'com_content.article.15', 'Caravans In Stock', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(52, 1, 111, 112, 1, 'com_chronoforms', 'chronoforms', '{}'),
(53, 1, 113, 114, 1, 'com_swmenupro', 'com_swmenupro', '{}'),
(54, 8, 20, 53, 2, 'com_content.category.8', 'General', '{"core.create":{"6":1,"3":1},"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1},"core.edit.own":{"6":1,"3":1}}'),
(55, 1, 115, 116, 1, 'com_twojtoolbox', 'twojtoolbox', '{}'),
(56, 1, 117, 118, 1, 'com_2jgallery', '2jgallery', '{}'),
(57, 1, 119, 120, 1, 'com_mijosef', 'com_mijosef', '{"core.admin":{"1":0,"9":0,"6":0,"7":0,"2":0,"3":0,"4":0,"5":0,"8":0},"core.manage":{"1":0,"9":0,"6":0,"7":0,"2":0,"3":0,"4":0,"5":0,"8":0},"extensions":{"1":0,"9":0,"6":0,"7":0,"2":0,"3":0,"4":0,"5":0,"8":0},"purgeupdate":{"1":0,"9":0,"6":0,"7":0,"2":0,"3":0,"4":0,"5":0,"8":0},"restoremigrate":{"1":0,"9":0,"6":0,"7":0,"2":0,"3":0,"4":0,"5":0,"8":0},"upgrade":{"1":0,"9":0,"6":0,"7":0,"2":0,"3":0,"4":0,"5":0,"8":0},"urls":{"1":0,"9":0,"6":0,"7":0,"2":0,"3":0,"4":0,"5":0,"8":0},"metadata":{"1":0,"9":0,"6":0,"7":0,"2":0,"3":0,"4":0,"5":0,"8":0},"sitemap":{"1":0,"9":0,"6":0,"7":0,"2":0,"3":0,"4":0,"5":0,"8":0},"tags":{"1":0,"9":0,"6":0,"7":0,"2":0,"3":0,"4":0,"5":0,"8":0},"ilinks":{"1":0,"9":0,"6":0,"7":0,"2":0,"3":0,"4":0,"5":0,"8":0},"bookmarks":{"1":0,"9":0,"6":0,"7":0,"2":0,"3":0,"4":0,"5":0,"8":0}}'),
(58, 1, 121, 122, 1, 'com_rsfirewall', 'rsfirewall', '{"core.admin":[],"core.manage":[],"check.run":[],"dbcheck.run":[],"logs.view":[],"lists.maange":[],"exceptions.manage":[],"feeds.manage":[],"updates.view":[]}'),
(59, 1, 123, 124, 1, 'com_akeeba', 'akeeba', '{"core.admin":[],"core.manage":[],"akeeba.backup":[],"akeeba.configure":[],"akeeba.download":[]}'),
(60, 8, 54, 61, 2, 'com_content.category.9', 'Slideshow', '{"core.create":{"6":1,"3":1},"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1},"core.edit.own":{"6":1,"3":1}}'),
(61, 60, 55, 56, 3, 'com_content.article.16', 'Slide 1', '{"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1}}'),
(62, 60, 57, 58, 3, 'com_content.article.17', 'Slide 2', '{"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1}}'),
(63, 60, 59, 60, 3, 'com_content.article.18', 'Slide 3', '{"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1}}'),
(64, 1, 125, 126, 1, 'com_advancedmodules.module.24', 'com_advancedmodules.module.24', ''),
(65, 1, 127, 128, 1, 'com_advancedmodules.module.102', 'JM Slideshow Responsive', '{"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1}}'),
(66, 1, 129, 130, 1, 'com_advancedmodules.module.19', 'com_advancedmodules.module.19', ''),
(67, 1, 131, 132, 1, 'com_advancedmodules.module.21', 'com_advancedmodules.module.21', ''),
(68, 1, 133, 134, 1, 'com_advancedmodules.module.47', 'com_advancedmodules.module.47', ''),
(69, 1, 135, 136, 1, 'com_advancedmodules.module.48', 'com_advancedmodules.module.48', ''),
(70, 1, 137, 138, 1, 'com_advancedmodules.module.87', 'com_advancedmodules.module.87', ''),
(71, 1, 139, 140, 1, 'com_advancedmodules.module.89', 'com_advancedmodules.module.89', ''),
(72, 1, 141, 142, 1, 'com_advancedmodules.module.90', 'com_advancedmodules.module.90', ''),
(73, 1, 143, 144, 1, 'com_advancedmodules.module.93', 'com_advancedmodules.module.93', ''),
(74, 1, 145, 146, 1, 'com_advancedmodules.module.94', 'com_advancedmodules.module.94', ''),
(75, 1, 147, 148, 1, 'com_advancedmodules.module.95', 'com_advancedmodules.module.95', ''),
(76, 1, 149, 150, 1, 'com_advancedmodules.module.96', 'com_advancedmodules.module.96', ''),
(77, 1, 151, 152, 1, 'com_advancedmodules.module.1', 'com_advancedmodules.module.1', ''),
(78, 1, 153, 154, 1, 'com_advancedmodules.module.22', 'com_advancedmodules.module.22', ''),
(79, 1, 155, 156, 1, 'com_advancedmodules.module.26', 'com_advancedmodules.module.26', ''),
(80, 1, 157, 158, 1, 'com_advancedmodules.module.91', 'S5 Image Fader v3', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(81, 1, 159, 160, 1, 'com_jce', 'jce', '{}'),
(82, 54, 51, 52, 3, 'com_content.article.19', ' ET2 Series Extenda Touring Range', '{"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1}}');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_associations`
--

CREATE TABLE `i4aj7_associations` (
  `id` int(11) NOT NULL COMMENT 'A reference to the associated item.',
  `context` varchar(50) NOT NULL COMMENT 'The context of the associated item.',
  `key` char(32) NOT NULL COMMENT 'The key for the association computed from an md5 on associated ids.',
  PRIMARY KEY (`context`,`id`),
  KEY `idx_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_banners`
--

CREATE TABLE `i4aj7_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `imptotal` int(11) NOT NULL DEFAULT '0',
  `impmade` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `clickurl` varchar(200) NOT NULL DEFAULT '',
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `custombannercode` varchar(2048) NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `params` text NOT NULL,
  `own_prefix` tinyint(1) NOT NULL DEFAULT '0',
  `metakey_prefix` varchar(255) NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT '-1',
  `track_clicks` tinyint(4) NOT NULL DEFAULT '-1',
  `track_impressions` tinyint(4) NOT NULL DEFAULT '-1',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reset` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `language` char(7) NOT NULL DEFAULT '',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_state` (`state`),
  KEY `idx_own_prefix` (`own_prefix`),
  KEY `idx_metakey_prefix` (`metakey_prefix`),
  KEY `idx_banner_catid` (`catid`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_banner_clients`
--

CREATE TABLE `i4aj7_banner_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `contact` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `extrainfo` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `metakey` text NOT NULL,
  `own_prefix` tinyint(4) NOT NULL DEFAULT '0',
  `metakey_prefix` varchar(255) NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT '-1',
  `track_clicks` tinyint(4) NOT NULL DEFAULT '-1',
  `track_impressions` tinyint(4) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`),
  KEY `idx_own_prefix` (`own_prefix`),
  KEY `idx_metakey_prefix` (`metakey_prefix`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_banner_tracks`
--

CREATE TABLE `i4aj7_banner_tracks` (
  `track_date` datetime NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL,
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`track_date`,`track_type`,`banner_id`),
  KEY `idx_track_date` (`track_date`),
  KEY `idx_track_type` (`track_type`),
  KEY `idx_banner_id` (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_betterpreview_sefs`
--

CREATE TABLE `i4aj7_betterpreview_sefs` (
  `url` char(255) NOT NULL,
  `sef` char(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i4aj7_betterpreview_sefs`
--

INSERT INTO `i4aj7_betterpreview_sefs` (`url`, `sef`, `created`) VALUES
('index.php?option=com_content&view=article&id=10&catid=8&Itemid=10', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=10&amp;catid=8&amp;Itemid=10', '2014-03-21 05:58:44'),
('index.php?option=com_content&view=article&id=10&Itemid=10', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=10&amp;Itemid=10', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=article&id=11&Itemid=11', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=11', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=article&id=12&Itemid=12', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=12&amp;Itemid=12', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=article&id=14&Itemid=13', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=14&amp;Itemid=13', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=article&id=15&Itemid=14', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=15&amp;Itemid=14', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=article&id=19&catid=8&Itemid=115', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=19&amp;catid=8&amp;Itemid=115', '2014-03-21 06:01:58'),
('index.php?option=com_content&view=article&id=2&Itemid=9', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=2&amp;Itemid=9', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=article&id=3&Itemid=2', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=3&amp;Itemid=2', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=article&id=4&Itemid=3', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=4&amp;Itemid=3', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=article&id=5&Itemid=4', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=5&amp;Itemid=4', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=article&id=6&Itemid=5', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=6&amp;Itemid=5', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=article&id=7&Itemid=6', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=7&amp;Itemid=6', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=article&id=8&Itemid=7', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=8&amp;Itemid=7', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=article&id=9&catid=8&Itemid=8', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=9&amp;catid=8&amp;Itemid=8', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=article&id=9&Itemid=8', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=article&amp;id=9&amp;Itemid=8', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=category&id=8&Itemid=115', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=category&amp;id=8&amp;Itemid=115', '2014-03-21 05:31:32'),
('index.php?option=com_content&view=featured&Itemid=115', '/joomla_devel/caravancountry/index.php?option=com_content&amp;view=featured&amp;Itemid=115', '2014-03-21 05:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_categories`
--

CREATE TABLE `i4aj7_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `extension` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `metadesc` varchar(1024) NOT NULL COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) NOT NULL COMMENT 'The meta keywords for the page.',
  `metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `cat_idx` (`extension`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_path` (`path`),
  KEY `idx_left_right` (`lft`,`rgt`),
  KEY `idx_alias` (`alias`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `i4aj7_categories`
--

INSERT INTO `i4aj7_categories` (`id`, `asset_id`, `parent_id`, `lft`, `rgt`, `level`, `path`, `extension`, `title`, `alias`, `note`, `description`, `published`, `checked_out`, `checked_out_time`, `access`, `params`, `metadesc`, `metakey`, `metadata`, `created_user_id`, `created_time`, `modified_user_id`, `modified_time`, `hits`, `language`, `version`) VALUES
(1, 0, 0, 0, 15, 0, '', 'system', 'ROOT', 'root', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{}', '', '', '', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(3, 28, 1, 1, 2, 1, 'uncategorised', 'com_banners', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":"","foobar":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(4, 29, 1, 3, 4, 1, 'uncategorised', 'com_contact', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(5, 30, 1, 5, 6, 1, 'uncategorised', 'com_newsfeeds', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(6, 31, 1, 7, 8, 1, 'uncategorised', 'com_weblinks', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(7, 32, 1, 9, 10, 1, 'uncategorised', 'com_users', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(8, 54, 1, 11, 12, 1, 'general', 'com_content', 'General', 'general', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":"","tags":null}', 706, '2013-05-18 06:52:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(9, 60, 1, 13, 14, 1, 'slideshow', 'com_content', 'Slideshow', 'slideshow', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 706, '2014-03-21 04:17:34', 0, '0000-00-00 00:00:00', 0, '*', 1);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_chronoforms`
--

CREATE TABLE `i4aj7_chronoforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `form_type` tinyint(1) NOT NULL,
  `content` longtext NOT NULL,
  `wizardcode` longtext,
  `events_actions_map` longtext,
  `params` longtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `app` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `i4aj7_chronoforms`
--

INSERT INTO `i4aj7_chronoforms` (`id`, `name`, `form_type`, `content`, `wizardcode`, `events_actions_map`, `params`, `published`, `app`) VALUES
(1, 'ContactForm', 1, '<div class="ccms_form_element cfdiv_text" id="name1_container_div" style=""><label>Name</label><input maxlength="150" size="30" class="cf_inputbox validate[''required'']" title="" type="text" value="" name="name" />\r\n<div class="clear"></div><div id="error-message-name"></div></div><div class="ccms_form_element cfdiv_text" id="phone1_container_div" style=""><label>Phone</label><input maxlength="150" size="30" class="cf_inputbox validate[''required'',''phone'']" title="" type="text" value="" name="phone" />\r\n<div class="clear"></div><div id="error-message-phone"></div></div><div class="ccms_form_element cfdiv_text" id="email1_container_div" style=""><label>Email</label><input maxlength="150" size="30" class="cf_inputbox validate[''required'',''email'']" title="" type="text" value="" name="email" />\r\n<div class="clear"></div><div id="error-message-email"></div></div><div class="ccms_form_element cfdiv_text" id="postcode1_container_div" style=""><label>Postcode</label><input maxlength="150" size="30" class="cf_inputbox" title="" type="text" value="" name="postcode" />\r\n<div class="clear"></div><div id="error-message-postcode"></div></div><div class="ccms_form_element cfdiv_text" id="hear_about_us1_container_div" style=""><label>How did you hear about us?</label><input maxlength="150" size="30" class="cf_inputbox" title="" type="text" value="" name="hear_about_us" />\r\n<div class="clear"></div><div id="error-message-hear_about_us"></div></div><div class="ccms_form_element cfdiv_textarea" id="enquiry1_container_div" style=""><label>Enquiry</label><textarea cols="30" rows="3" class="cf_inputbox validate[''required'']" title="" name="enquiry"></textarea>\r\n<div class="clear"></div><div id="error-message-enquiry"></div></div><div class="ccms_form_element cfdiv_text" id="chrono_verification1_container_div" style=""><label>Enter the code</label><input maxlength="5" size="5" class="chrono_captcha_input" title="" type="text" value="" name="chrono_verification" />\r\n{chronocaptcha_img}<div class="clear"></div><div id="error-message-chrono_verification"></div></div><div class="ccms_form_element cfdiv_submit" id="input_submit_81_container_div" style="text-align:left"><input name="input_submit_8" class="" value="Submit" type="submit" />\r\n<div class="clear"></div><div id="error-message-input_submit_8"></div></div><div class="ccms_form_element cfdiv_empty" id="empty_container_div" style=""><div class="clear"></div><div id="error-message-empty"></div></div>', 'array (\n  ''field_1'' => \n  array (\n    ''input_text_1_input_id'' => '''',\n    ''input_text_1_label_text'' => ''Name'',\n    ''input_text_1_input_name'' => ''name'',\n    ''input_text_1_input_value'' => '''',\n    ''input_text_1_input_maxlength'' => ''150'',\n    ''input_text_1_input_size'' => ''30'',\n    ''input_text_1_input_class'' => ''cf_inputbox'',\n    ''input_text_1_input_title'' => '''',\n    ''input_text_1_label_over'' => ''0'',\n    ''input_text_1_hide_label'' => ''0'',\n    ''input_text_1_multiline_start'' => ''0'',\n    ''input_text_1_multiline_add'' => ''0'',\n    ''input_text_1_validations'' => ''required'',\n    ''input_text_1_instructions'' => '''',\n    ''input_text_1_tooltip'' => '''',\n    ''tag'' => ''input'',\n    ''type'' => ''text'',\n    ''container_id'' => ''0'',\n  ),\n  ''field_2'' => \n  array (\n    ''input_text_2_input_id'' => '''',\n    ''input_text_2_label_text'' => ''Phone'',\n    ''input_text_2_input_name'' => ''phone'',\n    ''input_text_2_input_value'' => '''',\n    ''input_text_2_input_maxlength'' => ''150'',\n    ''input_text_2_input_size'' => ''30'',\n    ''input_text_2_input_class'' => ''cf_inputbox'',\n    ''input_text_2_input_title'' => '''',\n    ''input_text_2_label_over'' => ''0'',\n    ''input_text_2_hide_label'' => ''0'',\n    ''input_text_2_multiline_start'' => ''0'',\n    ''input_text_2_multiline_add'' => ''0'',\n    ''input_text_2_validations'' => ''required,phone'',\n    ''input_text_2_instructions'' => '''',\n    ''input_text_2_tooltip'' => '''',\n    ''tag'' => ''input'',\n    ''type'' => ''text'',\n    ''container_id'' => ''0'',\n  ),\n  ''field_3'' => \n  array (\n    ''input_text_3_input_id'' => '''',\n    ''input_text_3_label_text'' => ''Email'',\n    ''input_text_3_input_name'' => ''email'',\n    ''input_text_3_input_value'' => '''',\n    ''input_text_3_input_maxlength'' => ''150'',\n    ''input_text_3_input_size'' => ''30'',\n    ''input_text_3_input_class'' => ''cf_inputbox'',\n    ''input_text_3_input_title'' => '''',\n    ''input_text_3_label_over'' => ''0'',\n    ''input_text_3_hide_label'' => ''0'',\n    ''input_text_3_multiline_start'' => ''0'',\n    ''input_text_3_multiline_add'' => ''0'',\n    ''input_text_3_validations'' => ''required,email'',\n    ''input_text_3_instructions'' => '''',\n    ''input_text_3_tooltip'' => '''',\n    ''tag'' => ''input'',\n    ''type'' => ''text'',\n    ''container_id'' => ''0'',\n  ),\n  ''field_4'' => \n  array (\n    ''input_text_4_input_id'' => '''',\n    ''input_text_4_label_text'' => ''Postcode'',\n    ''input_text_4_input_name'' => ''postcode'',\n    ''input_text_4_input_value'' => '''',\n    ''input_text_4_input_maxlength'' => ''150'',\n    ''input_text_4_input_size'' => ''30'',\n    ''input_text_4_input_class'' => ''cf_inputbox'',\n    ''input_text_4_input_title'' => '''',\n    ''input_text_4_label_over'' => ''0'',\n    ''input_text_4_hide_label'' => ''0'',\n    ''input_text_4_multiline_start'' => ''0'',\n    ''input_text_4_multiline_add'' => ''0'',\n    ''input_text_4_validations'' => '''',\n    ''input_text_4_instructions'' => '''',\n    ''input_text_4_tooltip'' => '''',\n    ''tag'' => ''input'',\n    ''type'' => ''text'',\n    ''container_id'' => ''0'',\n  ),\n  ''field_5'' => \n  array (\n    ''input_text_5_input_id'' => '''',\n    ''input_text_5_label_text'' => ''How did you hear about us?'',\n    ''input_text_5_input_name'' => ''hear_about_us'',\n    ''input_text_5_input_value'' => '''',\n    ''input_text_5_input_maxlength'' => ''150'',\n    ''input_text_5_input_size'' => ''30'',\n    ''input_text_5_input_class'' => ''cf_inputbox'',\n    ''input_text_5_input_title'' => '''',\n    ''input_text_5_label_over'' => ''0'',\n    ''input_text_5_hide_label'' => ''0'',\n    ''input_text_5_multiline_start'' => ''0'',\n    ''input_text_5_multiline_add'' => ''0'',\n    ''input_text_5_validations'' => '''',\n    ''input_text_5_instructions'' => '''',\n    ''input_text_5_tooltip'' => '''',\n    ''tag'' => ''input'',\n    ''type'' => ''text'',\n    ''container_id'' => ''0'',\n  ),\n  ''field_6'' => \n  array (\n    ''input_textarea_6_input_id'' => '''',\n    ''input_textarea_6_label_text'' => ''Enquiry'',\n    ''input_textarea_6_input_name'' => ''enquiry'',\n    ''input_textarea_6_input_value'' => '''',\n    ''input_textarea_6_input_class'' => ''cf_inputbox'',\n    ''input_textarea_6_input_title'' => '''',\n    ''input_textarea_6_label_over'' => ''0'',\n    ''input_textarea_6_hide_label'' => ''0'',\n    ''input_textarea_6_input_cols'' => ''30'',\n    ''input_textarea_6_input_rows'' => ''3'',\n    ''input_textarea_6_wysiwyg_editor'' => ''0'',\n    ''input_textarea_6_editor_buttons'' => ''1'',\n    ''input_textarea_6_editor_width'' => ''400'',\n    ''input_textarea_6_editor_height'' => ''200'',\n    ''input_textarea_6_multiline_start'' => ''0'',\n    ''input_textarea_6_multiline_add'' => ''0'',\n    ''input_textarea_6_validations'' => ''required'',\n    ''input_textarea_6_instructions'' => '''',\n    ''input_textarea_6_tooltip'' => '''',\n    ''tag'' => ''input'',\n    ''type'' => ''textarea'',\n    ''container_id'' => ''0'',\n  ),\n  ''field_7'' => \n  array (\n    ''input_captcha_7_input_id'' => '''',\n    ''input_captcha_7_label_text'' => ''Enter the code'',\n    ''input_captcha_7_input_name'' => ''chrono_verification'',\n    ''input_captcha_7_input_value'' => '''',\n    ''input_captcha_7_input_maxlength'' => ''5'',\n    ''input_captcha_7_input_size'' => ''5'',\n    ''input_captcha_7_input_class'' => ''chrono_captcha_input'',\n    ''input_captcha_7_input_title'' => '''',\n    ''input_captcha_7_label_over'' => ''0'',\n    ''input_captcha_7_hide_label'' => ''0'',\n    ''input_captcha_7_validations'' => '''',\n    ''input_captcha_7_instructions'' => '''',\n    ''input_captcha_7_tooltip'' => '''',\n    ''tag'' => ''input'',\n    ''type'' => ''captcha'',\n    ''real_type'' => ''text'',\n    ''after'' => ''{chronocaptcha_img}'',\n    ''container_id'' => ''0'',\n  ),\n  ''field_8'' => \n  array (\n    ''input_submit_8_input_id'' => '''',\n    ''input_submit_8_input_name'' => ''input_submit_8'',\n    ''input_submit_8_input_value'' => ''Submit'',\n    ''input_submit_8_input_class'' => '''',\n    ''input_submit_8_button_type'' => ''submit'',\n    ''input_submit_8_button_align'' => ''left'',\n    ''input_submit_8_back_button'' => ''0'',\n    ''input_submit_8_reset_button'' => ''0'',\n    ''input_submit_8_back_button_value'' => ''Back'',\n    ''input_submit_8_reset_button_value'' => ''Reset'',\n    ''input_submit_8_multiline_start'' => ''0'',\n    ''input_submit_8_multiline_add'' => ''0'',\n    ''tag'' => ''input'',\n    ''type'' => ''submit'',\n    ''container_id'' => ''0'',\n  ),\n)', 'YToxOntzOjY6ImV2ZW50cyI7YToyOntzOjQ6ImxvYWQiO2E6MTp7czo3OiJhY3Rpb25zIjthOjI6e3M6MjA6ImNmYWN0aW9uX3Nob3dfaHRtbF8wIjtzOjA6IiI7czoyMzoiY2ZhY3Rpb25fbG9hZF9jYXB0Y2hhXzEiO3M6MDoiIjt9fXM6Njoic3VibWl0IjthOjE6e3M6NzoiYWN0aW9ucyI7YTozOntzOjI0OiJjZmFjdGlvbl9jaGVja19jYXB0Y2hhXzIiO2E6MTp7czo2OiJldmVudHMiO2E6Mjp7czozNzoiY2ZhY3Rpb25ldmVudF9jaGVja19jYXB0Y2hhXzJfc3VjY2VzcyI7czowOiIiO3M6MzQ6ImNmYWN0aW9uZXZlbnRfY2hlY2tfY2FwdGNoYV8yX2ZhaWwiO2E6MTp7czo3OiJhY3Rpb25zIjthOjE6e3M6MjE6ImNmYWN0aW9uX2V2ZW50X2xvb3BfMyI7czowOiIiO319fX1zOjE2OiJjZmFjdGlvbl9lbWFpbF80IjtzOjA6IiI7czozMDoiY2ZhY3Rpb25fc2hvd190aGFua3NfbWVzc2FnZV81IjtzOjA6IiI7fX19fQ==', '{"form_mode":"advanced","form_method":"post","auto_detect_settings":"1","load_files":"1","tight_layout":"1","action_url":"","form_tag_attach":"","add_form_tags":"1","relative_url":"1","dynamic_files":"0","show_top_errors":"1","datepicker_config":"","datepicker_type":"0","datepicker_moo_style":"datepicker_dashboard","enable_jsvalidation":"0","jsvalidation_errors":"1","jsvalidation_theme":"red","jsvalidation_lang":"en","jsvalidation_showErrors":"0","jsvalidation_errorsLocation":"1","adminview_actions":"","dataview_actions":"","app_exclusive":"0"}', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_chronoform_actions`
--

CREATE TABLE `i4aj7_chronoform_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chronoform_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `params` longtext NOT NULL,
  `order` int(11) NOT NULL,
  `content1` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `i4aj7_chronoform_actions`
--

INSERT INTO `i4aj7_chronoform_actions` (`id`, `chronoform_id`, `type`, `enabled`, `params`, `order`, `content1`) VALUES
(8, 1, 'load_captcha', 1, '{"fonts":"1","encoded_image":"1","refresh_button":"1"}', 1, ''),
(9, 1, 'event_loop', 1, '{"target_event":"","quit_next":"1"}', 3, ''),
(10, 1, 'check_captcha', 1, '{"error":"You have entered a wrong verification code!"}', 2, ''),
(11, 1, 'email', 1, '{"to":"andrew@earthlinkdesign.com.au","cc":"","bcc":"","subject":"Regency Caravans Contact Form","fromname":"Regency Caravans","fromemail":"sales@regencycaravans.com.au","replytoname":"","replytoemail":"","dto":"","dcc":"","dbcc":"","dsubject":"","dfromname":"","dfromemail":"","dreplytoname":"","dreplytoemail":"","recordip":"1","attachments":"","sendas":"html","action_label":"","encrypt_enabled":"0","gpg_sec_key":"","replace_nulls":"0"}', 4, '<table cellpadding="5" cellspacing="5" border="0">\r\n	<tr>\r\n		<td>\r\n			<strong>Name</strong>\r\n		</td>\r\n		<td>\r\n			{name}\r\n		</td>\r\n	</tr>\r\n	<tr>\r\n		<td>\r\n			<strong>Phone</strong>\r\n		</td>\r\n		<td>\r\n			{phone}\r\n		</td>\r\n	</tr>\r\n	<tr>\r\n		<td>\r\n			<strong>Email</strong>\r\n		</td>\r\n		<td>\r\n			{email}\r\n		</td>\r\n	</tr>\r\n	<tr>\r\n		<td>\r\n			<strong>Postcode</strong>\r\n		</td>\r\n		<td>\r\n			{postcode}\r\n		</td>\r\n	</tr>\r\n	<tr>\r\n		<td>\r\n			<strong>How did you hear about us?</strong>\r\n		</td>\r\n		<td>\r\n			{hear_about_us}\r\n		</td>\r\n	</tr>\r\n	<tr>\r\n		<td>\r\n			<strong>Enquiry</strong>\r\n		</td>\r\n		<td>\r\n			{enquiry}\r\n		</td>\r\n	</tr>\r\n	<tr>\r\n		<td>\r\n			<strong>Enter the code</strong>\r\n		</td>\r\n		<td>\r\n			{chrono_verification}\r\n		</td>\r\n	</tr>\r\n</table>'),
(7, 1, 'show_html', 1, '{"data_republish":"1","display_errors":"1","curly_replacer":"1","load_token":"1","keep_alive":"1","submit_event":"submit","page_number":"1","form_container":""}', 0, ''),
(12, 1, 'show_thanks_message', 1, '[]', 5, 'Thank you for submitting an enquiry.');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_contact_details`
--

CREATE TABLE `i4aj7_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `con_position` varchar(255) DEFAULT NULL,
  `address` text,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `misc` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `email_to` varchar(255) DEFAULT NULL,
  `default_con` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `catid` int(11) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `webpage` varchar(255) NOT NULL DEFAULT '',
  `sortname1` varchar(255) NOT NULL,
  `sortname2` varchar(255) NOT NULL,
  `sortname3` varchar(255) NOT NULL,
  `language` char(7) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`published`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_content`
--

CREATE TABLE `i4aj7_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` varchar(5120) NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `language` char(7) NOT NULL COMMENT 'The language code for the article.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `i4aj7_content`
--

INSERT INTO `i4aj7_content` (`id`, `asset_id`, `title`, `alias`, `introtext`, `fulltext`, `state`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`, `featured`, `language`, `xreference`) VALUES
(1, 37, 'Home Testing Page', 'home-testing-page', '<h2>Lorem ipsum dolor sit amet</h2>\r\n<br />\r\n<p>Integer ut sem sit amet ligula semper condimentum sit amet nec risus. Aliquam fringilla sodales magna ultrices egestas. Suspendisse id tellus dolor, sit amet egestas justo. Mauris accumsan sollicitudin dui ac pellentesque. Etiam est lorem, aliquet ut sagittis ut, facilisis et nisl. Nunc pretium, ipsum in rutrum sagittis, justo nunc malesuada sapien, ac sodales purus nisi a enim. Fusce ac nisl vitae metus varius commodo. Vivamus et nulla et nisl porttitor tincidunt. Pellentesque erat risus, dictum elementum consectetur ac, posuere sit amet ligula. Praesent non mauris augue. Integer pharetra nulla interdum mauris tincidunt vel ultrices ante aliquet.</p>', '', 0, 8, '2011-05-05 04:51:53', 706, '', '2013-05-18 06:52:12', 706, 0, '0000-00-00 00:00:00', '2011-05-05 04:51:53', '0000-00-00 00:00:00', '', '', '{"show_title":"","link_titles":"","show_intro":"","show_section":"","link_section":"","show_category":"","link_category":"","show_vote":"","show_author":"","show_create_date":"","show_modify_date":"","show_pdf_icon":"","show_print_icon":"","show_email_icon":"","language":"","keyref":"","readmore":""}', 5, 2, '', '', 1, 0, '{"robots":"","author":""}', 0, '*', ''),
(2, 38, 'Home', 'home', '<h2>Living the dream</h2>\r\n<br />\r\n<p>You are about to embark on a spectacular journey, roaming through plains that dinosaurs once roamed, rainforests that have some of the world’s oldest and most exotic plants and Cultures that Compare with the world oldest civilisations. You will visit the world’s best beaches and make wonderful lasting new friendships. If your dream is retirement, friendship, romance or adventure, then live that dream.</p>\r\n<p><a href="index.php?option=com_content&amp;view=article&amp;id=3&amp;Itemid=2"><img alt="journey-button" src="images/stories/template/journey-button.png" height="45" width="200" /></a></p>', '', 1, 8, '2011-05-05 06:03:50', 62, '', '2013-05-18 06:52:12', 706, 0, '0000-00-00 00:00:00', '2011-05-05 06:03:50', '0000-00-00 00:00:00', '', '', '{"show_title":"0","link_titles":"","show_intro":"","show_section":"","link_section":"","show_category":"","link_category":"","show_vote":"","show_author":"","show_create_date":"","show_modify_date":"","show_pdf_icon":"","show_print_icon":"","show_email_icon":"","language":"","keyref":"","readmore":""}', 7, 15, '', '', 1, 14574, '{"robots":"","author":""}', 1, '*', ''),
(3, 39, 'History', 'history', '<div class="rci" title="prince.jpg"><img src="images/stories/prince/prince.jpg" alt="prince" width="479" height="600" /></div>\r\n<h1>History</h1>\r\n<p><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-AU</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:DontVertAlignCellWithSp/>\r\n   <w:DontBreakConstrainedForcedTables/>\r\n   <w:DontVertAlignInTxbx/>\r\n   <w:Word11KerningPairs/>\r\n   <w:CachedColBalance/>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n  <m:mathPr>\r\n   <m:mathFont m:val="Cambria Math"/>\r\n   <m:brkBin m:val="before"/>\r\n   <m:brkBinSub m:val="&#45;-"/>\r\n   <m:smallFrac m:val="off"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val="0"/>\r\n   <m:rMargin m:val="0"/>\r\n   <m:defJc m:val="centerGroup"/>\r\n   <m:wrapIndent m:val="1440"/>\r\n   <m:intLim m:val="subSup"/>\r\n   <m:naryLim m:val="undOvr"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--></p>\r\n<p><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\n  DefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\n  LatentStyleCount="267">\r\n  <w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>\r\n  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>\r\n  <w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Title"/>\r\n  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>\r\n  <w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>\r\n  <w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>\r\n  <w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Table Grid"/>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>\r\n  <w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>\r\n  <w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>\r\n  <w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>\r\n  <w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>\r\n  <w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>\r\n  <w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>\r\n  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>\r\n  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin:0cm;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:"Calibri","sans-serif";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:"Times New Roman";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:"Times New Roman";\r\n	mso-bidi-theme-font:minor-bidi;}\r\n</style>\r\n<![endif]--></p>\r\n<p class="MsoNormal"><span style="mso-ansi-language: EN-SG;" lang="EN-SG">Caravan Country has a large site based on the easily accessible Canterbury Road  in Bayswater Victoria. We are authorised distributers for the New Coronet and Regal Caravans. We also offer one of the most comprehensive range of pre – owned Caravans in Victoria.</span></p>\r\n<p class="MsoNormal"><span style="mso-ansi-language: EN-SG;" lang="EN-SG"> </span></p>\r\n<p class="MsoNormal"><span style="mso-ansi-language: EN-SG;" lang="EN-SG">We stand by our Caravans so much that we ensure that every van sold has some form of Warranty protection. For example our new Coronet Vans offer a 5 year Manufacturers Warranty unseen by many if any other Caravan Manufacturer. Regal offers a 2 year Manufacturers Warranty and all pre owned vans come with our 6 month “Umbrella Of Protection” Warranty.</span></p>\r\n<p class="MsoNormal"><span style="mso-ansi-language: EN-SG;" lang="EN-SG"> </span></p>\r\n<p class="MsoNormal"><span style="mso-ansi-language: EN-SG;" lang="EN-SG">Our professional sales team come from design, production, service and sales backgrounds in the Caravan and RV industry, so they can assist you with only the most accurate information to make your Caravan purchase as easy and painless as possible.</span></p>\r\n<p class="MsoNormal"><span style="mso-ansi-language: EN-SG;" lang="EN-SG"> </span></p>\r\n<p class="MsoNormal"><span style="mso-ansi-language: EN-SG;" lang="EN-SG">We are open 7 days a week for your convenience</span></p>\r\n<p><a href="index.php?option=com_content&amp;view=article&amp;id=4&amp;Itemid=3"><img src="images/stories/template/new-caravans-btn.png" alt="new-caravans-btn" width="200" height="45" style="margin-right: 20px;" /></a><a href="index.php?option=com_content&amp;view=article&amp;id=14&amp;Itemid=13"><img src="images/stories/template/pre-owned-caravans-btn.png" alt="pre-owned-caravans-btn" width="200" height="45" /></a></p>', '', 1, 8, '2011-05-05 06:04:09', 62, '', '2014-01-04 05:41:26', 65, 0, '0000-00-00 00:00:00', '2011-05-05 06:04:09', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 18, 14, '', '', 1, 2200, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', ''),
(4, 40, 'New caravans', 'new-caravans', '<h1>New caravans</h1>\r\n<p>View our New Regal and Coronet Caravans. There is also a large range of quality used caravans.</p>\r\n<p> </p>\r\n<div class="rci"><a href="index.php?option=com_content&amp;view=article&amp;id=8&amp;Itemid=7"><img src="images/stories/regal-1.jpg" alt="regal-1" width="435" height="290" /></a></div>\r\n<div class="rci"><a href="index.php?option=com_content&amp;view=article&amp;id=9&amp;Itemid=8"><img src="images/stories/farren.jpg" alt="farren" width="435" height="290" /></a></div>', '', 1, 8, '2011-05-05 06:04:24', 62, '', '2013-05-18 07:23:31', 706, 0, '0000-00-00 00:00:00', '2011-05-05 06:04:24', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":null,"urlatext":"","targeta":"","urlb":null,"urlbtext":"","targetb":"","urlc":null,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 11, 13, '', '', 1, 1641, '{"robots":"","author":"","rights":"","xreference":"","tags":null}', 0, '*', ''),
(5, 41, 'Pre-owned caravans old', 'pre-owned-caravans-old', 'Pre-owned caravans', '', 0, 8, '2011-05-05 06:04:39', 62, '', '2013-05-18 06:52:12', 706, 0, '0000-00-00 00:00:00', '2011-05-05 06:04:39', '0000-00-00 00:00:00', '', '', '{"show_title":"","link_titles":"","show_intro":"","show_section":"","link_section":"","show_category":"","link_category":"","show_vote":"","show_author":"","show_create_date":"","show_modify_date":"","show_pdf_icon":"","show_print_icon":"","show_email_icon":"","language":"","keyref":"","readmore":""}', 2, 12, '', '', 1, 17, '{"robots":"","author":""}', 0, '*', ''),
(6, 42, 'Our Services', 'our-services', '<h1>Our Services</h1>\r\n<p>It was our vision to create a R.V. Industry “One Stop Shop” at 120 Canterbury Road Bayswater. You can come and view New Regal and Coronet Caravans. There is also a large range of quality used caravans. The vision includes full service, repair and insurance claim workshop facilities along with caravan manufacturing  and motor home sales on site.<br /><br /></p>\r\n<h3>Mission Statement</h3>\r\n<p>Put yourself in your Customers position, what would you reasonably and fairly expect and accept. If you wouldn’t accept it don’t expect your customer to.</p>\r\n<div class="rci"><img src="images/stories/regal-1.jpg" alt="regal-1" width="435" height="290" /></div>\r\n<div class="rci"><img src="images/stories/farren.jpg" alt="farren" width="435" height="290" /></div>\r\n<p><a href="index.php?option=com_content&amp;view=article&amp;id=4&amp;Itemid=3"><img src="images/stories/template/new-caravans-btn.png" alt="new-caravans-btn" width="200" height="45" style="margin-right: 20px; margin-left: 20px;" /></a><a href="index.php?option=com_content&amp;view=article&amp;id=14&amp;Itemid=13"><img src="images/stories/template/pre-owned-caravans-btn.png" alt="pre-owned-caravans-btn" width="200" height="45" /></a></p>', '', 1, 8, '2011-05-05 06:05:03', 62, '', '2013-05-18 07:24:54', 706, 0, '0000-00-00 00:00:00', '2011-05-05 06:05:03', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":null,"urlatext":"","targeta":"","urlb":null,"urlbtext":"","targetb":"","urlc":null,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 17, 11, '', '', 1, 1676, '{"robots":"","author":"","rights":"","xreference":"","tags":null}', 0, '*', ''),
(7, 43, 'Contact us', 'contact-us', '<h1>Contact Us</h1>\r\n<div style="clear: both;"> </div>\r\n<div style="float: left;"><br style="clear: both;" /> {loadposition ContactForm}</div>\r\n<div style="float: right; width: 300px; margin-top: 0px;">\r\n<h2>Caravan Country</h2>\r\n<p>120 Canterbury Rd<br />Bayswater Nth 3135<br /> Melbourne Victoria</p>\r\n<p>E: <a href="mailto:sales@caravancountry.com.au">sales@caravancountry.com.au</a><br /> W: <a href="http://www.caravancountry.com.au/">www.caravancountry.com.au</a><br /> P: (03)9761-5388</p>\r\n</div>', '', 1, 8, '2011-05-05 06:05:27', 62, '', '2013-11-04 05:52:00', 706, 0, '0000-00-00 00:00:00', '2011-05-05 06:05:27', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 19, 10, '', '', 1, 1852, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', ''),
(8, 44, 'Regal Caravans', 'regal-caravans', '<div class="rci"><img src="images/stories/regal/Dewar_Regal.jpg" alt="Dewar_Regal" width="500" height="333" /></div>\r\n<h1>Regal Caravans</h1>\r\n<p>Regal create and build caravans to your specifications, that not only suit your needs and taste, but also your budget. Because Regal''s craftsmen take pride in hand building caravans to your specifications, you can be sure that your caravan will be built to spec, down to the smallest detail, and when you take delivery of your Regal caravan or pop-top you will know that you have all the features that will make caravanning a pleasure. <a class="jce_file" href="images/stories/docs/Regal_Standards_List.pdf" target="_blank">Download the Regal Caravans Standards List</a> .</p>\r\n<p><strong>Regal has four simple steps to Total Luxury:</strong></p>\r\n<h3>1) Choose your “Size"</h3>\r\n<p>Select the size of your caravan to suit your towing vehicles specifications. From single axle to tandem axle, you can design your new caravan according to your needs.</p>\r\n<h3>2) Choose your "Floor Plan"</h3>\r\n<p>Pick from a range of pre-designed floor plans or we can help you to design your very own.</p>\r\n<h3>3) Choose your "Colours"</h3>\r\n<p>Select colours for your caravans internal décor, including floor coverings, curtains, couch, table, walls, ceiling, bathroom and kitchen, as well as external colours. We have all the latest colours to choose from.</p>\r\n<h3>4) Choose your "Appliances"</h3>\r\n<p>Would you like a DVD player, flat screen TV, battery pack, solar pack or maybe even a dishwasher? Select the items you want to include and leave out those you don''t need.</p>\r\n<p>{loadposition regalgallery}</p>', '', 1, 8, '2011-08-14 03:41:50', 62, '', '2013-05-18 07:38:58', 706, 0, '0000-00-00 00:00:00', '2011-08-14 03:41:50', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":null,"urlatext":"","targeta":"","urlb":null,"urlbtext":"","targetb":"","urlc":null,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 17, 9, '', '', 1, 4870, '{"robots":"","author":"","rights":"","xreference":"","tags":null}', 0, '*', ''),
(9, 45, 'Coronet Caravans', 'coronet-caravans', '<h1>Coronet Caravans</h1>\r\n<p>Coronet has a unique history, first established in 1959 manufacturing from Ballarat Victoria then from 1991 under the ownership of Andrew Phillips manufacturing recommenced in Bayswater Victoria where head office is today.</p>\r\n<p>We are a boutique recreational vehicle manufacturer specializing in traditional, contemporary and modern designs with a flexible range of interior layouts. Our design team can also produce a specific custom design to suit your lifestyle.</p>\r\n<p>Our new 5 year warranty on all workmanship and construction (from July 2013) is just one of many reasons why a Coronet Caravan will provide years of pleasure.</p>\r\n<p>Select from Five caravan styles to suit your needs:-</p>\r\n<div class="rci">\r\n<h3>ET2 Series - Extenda Touring Range</h3>\r\n<p><a href="index.php?option=com_content&amp;view=article&amp;id=19&amp;Itemid=158"><img src="images/ET2.jpg" alt="ET2" /></a></p>\r\n</div>\r\n<div class="rci">\r\n<h3>ST2 Series - Super Touring Range</h3>\r\n<p><a href="index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=11"><img src="images/ST2.jpg" alt="ST2" /></a></p>\r\n</div>\r\n<div class="rci">\r\n<h3>FS2 Series - Fashion Statement Range</h3>\r\n<p><a href="index.php?option=com_content&amp;view=article&amp;id=12&amp;Itemid=12"><img src="images/FS2.jpg" alt="FS2" /></a></p>\r\n</div>\r\n<div style="clear: both;"><br />&nbsp;</div>\r\n<div class="rci">\r\n<h3>CD2 Series - Custom Design Range</h3>\r\n<p><a href="index.php?option=com_content&amp;view=article&amp;id=10&amp;Itemid=10"><img src="images/CD2.jpg" alt="CD2" /></a></p>\r\n</div>\r\n<div class="rci">\r\n<h3>XT1 Series - X Trail Range</h3>\r\n<p><a href="index.php?option=com_content&amp;view=article&amp;id=10&amp;Itemid=10"><img src="images/XT1.jpg" alt="XT1" /></a></p>\r\n</div>', '', 1, 8, '2011-08-14 03:42:17', 62, '', '2014-03-21 06:03:16', 706, 0, '0000-00-00 00:00:00', '2011-08-14 03:42:17', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 24, 8, '', '', 1, 4063, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', ''),
(10, 46, 'The Prince', 'the-prince', '<h1>The Prince</h1>\r\n<p>For those who use caravan parks or other serviced sites, The Prince is an ideal choice. Because they don’t have the additional weight and space involved in an on-board shower, extra water tanks, a cassette toilet and similar fittings, this range is both lighter and more economical to purchase and to use. Available as either standard full roof caravans or as pop-top caravans, The Prince can be customised with those options you desire to create a caravan which suits your purposes completely. Luxury options such as leather seating, LCD TV with DVD, solar power, water filtration, big 12-inch brakes and air conditioning are available. The Prince is available in all sizes from 12ft to 25ft in length. If you have a family to cater for, the Prince is available as a family caravan with bunks in 16ft versions and longer. There are numerous floor plans to choose from, with single beds, double beds, island beds, L-shaped kitchens and dinettes. <a class="jce_file" href="images/stories/docs/Coronet_Prince_2011_HighRes.pdf" target="_blank"><img class="jce_icon" src="plugins/editors/jce/tiny_mce/plugins/filemanager/img/ext/pdf_small.gif" alt="pdf" style="border: 0px; vertical-align: middle;" /> Download The Prince brochure</a> or view the <a href="images/stories/docs/Coronet_Layouts_2011_HighRes.pdf" target="_blank">layouts here</a>.</p>\r\n<p>The Prince has an extensive list of external features as standard, including:</p>\r\n<div style="width: 48%; padding: 1%; float: left;">\r\n<h4>GENERAL INTERIOR PRINCE</h4>\r\nEasy Lift Roof System including Struts (Pop-Top only) STD<br /> Four Detachable Flyscreen Openings (Pop-Top only) STD<br /> 12 Volt Fluorescent Lighting in Roof STD<br /> 12 Volt Lighting STD<br /> CD Radio Unit with 2 Speakers STD<br /> LCD 12 Volt / 240 Volt Flat Screen TV with DVD OPT<br /> Push Button Catches on all Cupboards STD<br /> Lounge Pillow Upholstery OPT<br /> Leather Trim OPT<br /> Coloured Timber Pelmets STD<br /> Choice of Interior Colours STD<br /> Polyester Wall Finish STD<br /> Quality Flooring STD<br /> Air Conditioning OPT<br />\r\n<h4>KITCHEN</h4>\r\nMicrowave Oven STD<br /> 4 – Burner Stove &amp; Grill STD<br /> Full Oven OPT<br /> Large Deep Bowl Sink STD<br /> 12 Volt Stainless Steel Rangehood STD<br /> 12 volt Light over Sink STD<br /> Dometic 3 – Way Fridge (110Litres) STD<br /> Larger Dometic Fridge OPT<br /> WAECO Fridge OPT<br /> Mains Pressure STD<br /> 12 Volt Water Pump STD<br /> Foot Pump to Sink STD<br /> Water Tank Gauge STD<br /> Drop Down Table Extension OPT<br /> Pull out Pantry STD<br /> Pot Drawer STD<br /> Timber Edge Bench Tops STD<br /> Fire Extinguisher &amp; Smoke Detector STD<br />\r\n<h4>BEDROOM</h4>\r\n<p>Lift up Boxed Queen Size Bed on Struts STD<br /> Queen Size Bed STD<br /> Inner Spring Mattress &amp; Bedspread STD<br /> Mirrored Doors to Robes STD<br /> Corner Dressing Table STD<br /> Reading Lamps STD</p>\r\n</div>\r\n<div style="width: 48%; padding: 1%; float: right;">\r\n<h4>ENSUITE</h4>\r\nFull One – Piece Shower Cubicle &amp; Cassette Toilet N/A<br /> 21 Litre Hot Water Service OPT<br /> Flick Mixer Tap System STD<br /> Fan / Hatch System OPT<br />\r\n<h4>EXTERIOR</h4>\r\nBattery Pack OPT<br /> Solar Package OPT<br /> Supergal Chassis STD<br /> Off Road Jacks STD<br /> Jacking Point for Trailmate Jack STD<br /> 10 Inch Electric Brakes STD<br /> 12 Inch Electric Brakes OPT<br /> Cable Handbrake STD<br /> Chrome Alloy Rims STD<br /> 60 Litre Water Tank &amp; Cover STD<br /> 2 x 80 Litre Water Tanks OPT<br /> Lockable Water Filler STD<br /> Tap on A – Frame STD<br /> 2 x 4KG Gas Bottles STD<br /> 2 x 9KG Gas Bottles OPT<br /> Dometic Awning STD<br /> Camec Triple lock Door STD<br /> Rear Window Over Bed STD<br /> Tinted Windows STD<br /> Protector Shade on Front Window STD<br /> Protector Shade on Rear Window OPT<br /> Pebble Guard to Top of Boot STD<br /> Wheel Spats STD<br /> Pressure Hatch STD<br /> Wineguard Antenna OPT<br /> 12 Volt External Annexe Light STD<br /> 12 Volt Bargman Handle Light STD<br /> Insulation STD<br /> Full Bumper STD<br /> Spare Wheel located in boot OPT<br /> Spare Wheel on Rear Bar STD<br /> LED 12 Volt Running Lights STD</div>\r\n<p> </p>\r\n<div style="clear: both;"> </div>\r\n<p>{loadposition princegallery}</p>', '', 1, 8, '2011-08-14 04:02:24', 62, '', '2013-05-18 07:49:16', 706, 0, '0000-00-00 00:00:00', '2011-08-14 04:02:24', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":null,"urlatext":"","targeta":"","urlb":null,"urlbtext":"","targetb":"","urlc":null,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 15, 7, '', '', 1, 1057, '{"robots":"","author":"","rights":"","xreference":"","tags":null}', 0, '*', ''),
(11, 47, 'The Carrington', 'the-carrington', '<h1>The Carrington</h1>\r\n<p>Looking for a fully featured luxury touring caravan? The options for other brands are standard on your Carrington. Every Carrington has a toilet, shower with flick tap, hot water service, two big gas bottles, quality innerspring mattress, air conditioning, 12-volt LCD TV with DVD and Winegard antenna, on-board battery with smart charger and many other features. Check out the Standard Features list and you’ll agree that The Carrington represents real value for money! The Carrington is available as a true family caravan complete with 2/3/4 bunks in 21ft versions and longer. The Carrington is available in sizes ranging from 16ft6in up to 28ft, as a standard caravan or as a pop-top van. With at least 15 different layouts and the possibility of one designed especially for you, there’s certain to be a model of The Carrington that will delight. <a class="jce_file" href="images/stories/docs/Coronet_Carrington_2011_HighRes.pdf" target="_blank"><img class="jce_icon" src="plugins/editors/jce/tiny_mce/plugins/filemanager/img/ext/pdf_small.gif" alt="pdf" style="border: 0px; vertical-align: middle;" /> Download the Carrington brochure</a> or view the <a href="images/stories/docs/Coronet_Layouts_2011_HighRes.pdf" target="_blank">layouts here</a>.</p>\r\n<p>The Carrington has an extensive list of external features as standard, including:</p>\r\n<div style="width: 48%; padding: 1%; float: left;">\r\n<h4>GENERAL INTERIOR CARRINGTON</h4>\r\nEasy Lift Roof System including Struts (Pop-Top only) STD<br /> Four Detachable Flyscreen Openings (Pop-Top only) STD<br /> 12 Volt Fluorescent Lighting in Roof STD<br /> 12 Volt Lighting STD<br /> CD Radio Unit with 2 Speakers STD<br /> LCD 12 Volt / 240 Volt Flat Screen TV with DVD STD<br /> Push Button Catches on all Cupboards STD<br /> Lounge Pillow Upholstery OPT<br /> Leather Trim OPT<br /> Coloured Timber Pelmets STD<br /> Choice of Interior Colours STD<br /> Polyester Wall Finish STD<br /> Quality Flooring STD<br /> Air Conditioning STD<br />\r\n<h4>KITCHEN</h4>\r\nMicrowave Oven STD<br /> 4 – Burner Stove &amp; Grill STD<br /> Full Oven OPT<br /> Large Deep Bowl Sink STD<br /> 12 Volt Stainless Steel Rangehood STD<br /> 12 volt Light over Sink STD<br /> Dometic 3 – Way Fridge (150Litres) STD<br /> Larger Dometic Fridge OPT<br /> WAECO Fridge OPT<br /> Mains Pressure STD<br /> 12 Volt Water Pump STD<br /> Water Tank Gauge STD<br /> Drop Down Table Extension OPT<br /> Pull out Pantry STD<br /> Pot Drawer STD<br /> Timber Edge Bench Tops STD<br /> Fire Extinguisher &amp; Smoke Detector STD<br />\r\n<h4>BEDROOM</h4>\r\nLift up Boxed Queen Size Bed on Struts STD<br /> Queen Size Bed STD<br /> Inner Spring Mattress &amp; Bedspread STD<br /> Mirrored Doors to Robes STD<br /> Corner Dressing Table STD<br /> Reading Lamps STD</div>\r\n<div style="width: 48%; padding: 1%; float: right;">\r\n<h4>ENSUITE</h4>\r\nFull One – Piece Shower Cubicle &amp; Cassette Toilet STD<br /> 21 Litre Hot Water Service STD<br /> Flick Mixer Tap System STD<br /> Fan / Hatch System STD<br />\r\n<h4>EXTERIOR</h4>\r\nBattery Pack STD<br /> Solar Package OPT<br /> Supergal Chassis STD<br /> Off Road Jacks STD<br /> Jacking Point for Trailmate Jack STD<br /> 10 Inch Electric Brakes STD<br /> 12 Inch Electric Brakes OPT<br /> Cable Handbrake STD<br /> Chrome Alloy Rims STD<br /> 2 x 80 Litre Water Tanks with cover STD<br /> Lockable Water Filler STD<br /> Tap on A – Frame STD<br /> 2 x 4KG Gas Bottles OPT<br /> 2 x 9KG Gas Bottles STD<br /> Dometic Awning STD<br /> Camec Triple lock Door STD<br /> Rear Window Over Bed STD<br /> Wind – Out Windows (Powder Coated) STD<br /> Tinted Windows STD<br /> Protector Shade on Front Window STD<br /> Protector Shade on Rear Window OPT<br /> Pebble Guard to Top of Boot STD<br /> Wheel Spats STD<br /> Pressure Hatch STD<br /> Wineguard Antenna STD<br /> 12 Volt External Annexe Light STD<br /> 12 Volt Bargman Handle Light STD<br /> Insulation STD<br /> Full Bumper STD<br /> Spare Wheel located in boot OPT<br /> Spare Wheel on Rear Bar STD<br /> LED 12 Volt Running Lights STD</div>\r\n<p> </p>\r\n<div style="clear: both;"> </div>\r\n<p>{loadposition carringtongallery}</p>', '', 1, 8, '2011-08-14 04:02:50', 62, '', '2013-05-18 07:46:52', 706, 0, '0000-00-00 00:00:00', '2011-08-14 04:02:50', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":null,"urlatext":"","targeta":"","urlb":null,"urlbtext":"","targetb":"","urlc":null,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 11, 6, '', '', 1, 1319, '{"robots":"","author":"","rights":"","xreference":"","tags":null}', 0, '*', '');
INSERT INTO `i4aj7_content` (`id`, `asset_id`, `title`, `alias`, `introtext`, `fulltext`, `state`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`, `featured`, `language`, `xreference`) VALUES
(12, 48, 'The Farren', 'the-farren', '<h1>The Farren</h1>\r\n<p>Compact on the road, extended in room and spaciousness when you are parked, The Farren is our hybrid caravan built with as much attention to detail as all of our other units. The main feature of The Farren is the sleeping pod that extends from either one end or both ends to provide extra  uncluttered floor space for the living area. Choose from the one- or two-pod units, fixed roof or pop-top styles, in lengths from 12ft to 20ft (pods folded), you be will surprised at the spaciousness of the Farren. <a class="jce_file" href="images/stories/docs/Coronet_Farren_2011_HighRes.pdf" target="_blank"><img class="jce_icon" src="plugins/editors/jce/tiny_mce/plugins/filemanager/img/ext/pdf_small.gif" alt="pdf" style="border: 0px; vertical-align: middle;" /> Download the Farren brochure</a> or view the <a class="jce_file" href="images/stories/docs/Coronet_Layouts_2011_HighRes.pdf" target="_blank">layouts here</a>.</p>\r\n<p>The Farren has an extensive list of external features as standard, including:</p>\r\n<div style="width: 48%; padding: 1%; float: left;">\r\n<h4>GENERAL INTERIOR FARREN</h4>\r\nEasy Lift Roof System including Struts (Pop-Top only) STD<br /> Four Detachable Flyscreen Openings (Pop-Top only) STD<br /> 12 Volt Fluorescent Lighting in Roof STD<br /> 12 Volt Lighting STD<br /> CD Radio Unit with 2 Speakers STD<br /> LCD 12 Volt / 240 Volt Flat Screen TV with DVD OPT<br /> Push Button Catches on all Cupboards STD<br /> Lounge Pillow Upholstery OPT<br /> Leather Trim OPT<br /> Coloured Timber Pelmets STD<br /> Choice of Interior Colours STD<br /> Polyester Wall Finish STD<br /> Quality Flooring STD<br /> Air Conditioning OPT <br />\r\n<h4>KITCHEN</h4>\r\nMicrowave Oven STD<br /> 4 – Burner Stove &amp; Grill STD<br /> Full Oven OPT<br /> Large Deep Bowl Sink STD<br /> 12 Volt Stainless Steel Rangehood STD<br /> 12 volt Light over Sink STD<br /> Dometic 3 – Way Fridge (110Litres) STD<br /> Larger Dometic Fridge OPT<br /> WAECO Fridge OPT<br /> Mains Pressure STD<br /> 12 Volt Water Pump STD<br /> Foot Pump to Sink STD<br /> Water Tank Gauge STD<br /> Drop Down Table Extension OPT<br /> Pull out Pantry STD<br /> Pot Drawer STD<br /> Timber Edge Bench Tops STD<br /> Fire Extinguisher &amp; Smoke Detector STD</div>\r\n<div style="width: 48%; padding: 1%; float: right;">\r\n<h4>ENSUITE</h4>\r\nFull One – Piece Shower Cubicle &amp; Cassette Toilet OPT<br /> 21 Litre Hot Water Service OPT<br /> Flick Mixer Tap System STD<br /> Fan / Hatch System OPT <br />\r\n<h4>EXTERIOR</h4>\r\nBattery Pack OPT<br /> Solar Package OPT<br /> Supergal Chassis STD<br /> Off Road Jacks STD<br /> Jacking Point for Trailmate Jack STD<br /> 10 Inch Electric Brakes STD<br /> 12 Inch Electric Brakes OPT<br /> Cable Handbrake STD<br /> Chrome Alloy Rims STD<br /> 60 Litre Water Tank &amp; Cover STD<br /> 2 x 80 Litre Water Tanks OPT<br /> Lockable Water Filler STD<br /> Tap on A – Frame STD<br /> 2 x 4KG Gas Bottles STD<br /> 2 x 9KG Gas Bottles OPT<br /> Dometic Awning STD<br /> Camec Triple lock Door STD<br /> Rear Window Over Bed STD<br /> Tinted Windows STD<br /> Protector Shade on Front Window STD<br /> Protector Shade on Rear Window OPT<br /> Pebble Guard to Top of Boot STD<br /> Wheel Spats STD<br /> Pressure Hatch STD<br /> Wineguard Antenna OPT<br /> 12 Volt External Annexe Light STD<br /> 12 Volt Bargman Handle Light STD<br /> Insulation STD<br /> Full Bumper STD<br /> Spare Wheel located in boot OPT<br /> Spare Wheel on Rear Bar STD <br /> LED 12 Volt Running Lights STD</div>\r\n<p> </p>\r\n<div style="clear: both;"> </div>\r\n<p>{loadposition farrengallery}</p>', '', 1, 8, '2011-08-14 04:03:12', 62, '', '2013-05-18 07:48:44', 706, 0, '0000-00-00 00:00:00', '2011-08-14 04:03:12', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":null,"urlatext":"","targeta":"","urlb":null,"urlbtext":"","targetb":"","urlc":null,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 9, 5, '', '', 1, 629, '{"robots":"","author":"","rights":"","xreference":"","tags":null}', 0, '*', ''),
(13, 49, '404', '404', '<h1>404: Not Found</h1>\r\n<h2>Sorry, but the content you requested could not be found</h2>', '', 1, 8, '2004-11-11 12:44:38', 62, '', '2013-05-18 18:58:17', 706, 0, '0000-00-00 00:00:00', '2004-10-17 00:00:00', '0000-00-00 00:00:00', '', '', '{"menu_image":"-1","item_title":"0","pageclass_sfx":"","back_button":"","rating":"0","author":"0","createdate":"0","modifydate":"0","pdf":"0","print":"0","email":"0"}', 1, 1, '', '', 1, 3596, '', 0, '*', ''),
(14, 50, 'Pre-owned caravans', 'pre-owned-caravans', '<h1>Pre-owned caravans</h1>\r\n<p>{loadposition carsales}</p>', '', 1, 8, '2012-08-21 09:50:55', 62, '', '2013-05-18 07:06:36', 706, 0, '0000-00-00 00:00:00', '2012-08-21 09:50:55', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":null,"urlatext":"","targeta":"","urlb":null,"urlbtext":"","targetb":"","urlc":null,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 7, 4, '', '', 1, 2251, '{"robots":"","author":"","rights":"","xreference":"","tags":null}', 0, '*', ''),
(15, 51, 'Caravans In Stock', 'caravans-in-stock', '<h1>Caravans In Stock</h1>\r\n<p>{loadposition instock}</p>', '', 1, 8, '2013-03-02 04:36:08', 62, '', '2013-05-18 07:25:45', 706, 0, '0000-00-00 00:00:00', '2013-03-02 04:36:08', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":null,"urlatext":"","targeta":"","urlb":null,"urlbtext":"","targetb":"","urlc":null,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 3, 3, '', '', 1, 285, '{"robots":"","author":"","rights":"","xreference":"","tags":null}', 0, '*', ''),
(16, 61, 'Slide 1', 'slide-1', '', '', 1, 9, '2014-03-21 04:19:19', 706, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2014-03-21 04:19:19', '0000-00-00 00:00:00', '{"image_intro":"images\\/banners\\/900x400_fill_Slide1new.jpg","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 1, 2, '', '', 1, 0, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', ''),
(17, 62, 'Slide 2', 'slide-2', '', '', 1, 9, '2014-03-21 04:19:35', 706, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2014-03-21 04:19:35', '0000-00-00 00:00:00', '{"image_intro":"images\\/banners\\/900x400_fill_Slide2newa.jpg","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 1, 1, '', '', 1, 0, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', ''),
(18, 63, 'Slide 3', 'slide-3', '', '', 1, 9, '2014-03-21 04:19:51', 706, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2014-03-21 04:19:51', '0000-00-00 00:00:00', '{"image_intro":"images\\/banners\\/900x400_fill_Slide3new.jpg","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 1, 0, '', '', 1, 0, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', ''),
(19, 82, ' ET2 Series Extenda Touring Range', 'et2-series-extenda-touring-range', '<p>Designed for compact on road performance, extends to create spaciousness when parked, that''s our Extenda Touring Range. Well described as a Hybrid within the Industry this is truly a very clever concept combining the attributes of a compact body when closed and a full length body when fully extended. Sleeping pods extend from either one or both ends to create more useable space and privacy unique to this design. Full height or Pop Top versions are available together with single or tandem axle configurations. Standard features include 12 v Battery with charging system, LED Lighting, European style widows, Roll out awning, Insulation, Alloy wheels and electric brakes. AL – KO anti sway is also fitted and air conditioning is optional. The ET 2 – Series, just ideal for limited storage space when not in use, compact on road touring and remarkable openness when extended.</p>\r\n<div class="externalfeaturesBlock">\r\n<h6>The ET2 Series has an extensive list of external features as standard, including:</h6>\r\n<div class="detailsColum1">\r\n<ul>\r\n<li><strong>INTERIOR</strong><cite><em>s</em><small>o</small></cite></li>\r\n<li><span>Pop Top</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Easy Lift Roof System including struts</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Full Height Caravan</span><cite><em>y</em></cite></li>\r\n<li><span>Four Detachable Flyscreen openings (pop top)</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>12Volt lighting throughout</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>CD Radio with USB, in built speakers &amp; Antenna</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>12V TV with inbuilt DVD &amp;USB</span><cite><em>y</em></cite></li>\r\n<li><span>12V Setec battery charge monitor. </span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Positive lock catches on Cupboards</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Lounge - Plush Fabric Upholstery</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Leather upholstery</span><cite><em>y</em></cite></li>\r\n<li><span>Choice of interior colours from our extensive Range</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Durable cushion comfort Vinyl flooring</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Polyester Wall Finish </span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Under bunk &amp; seat storage </span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Gloss bench tops</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Air conditioning (heat &amp; cool)</span><cite><em>y</em></cite></li>\r\n<li><span>Diesel or gas floor heating</span><cite><em>y</em></cite></li>\r\n</ul>\r\n</div>\r\n<div class="detailsColum1 detailsColum2">\r\n<ul>\r\n<li><strong>KITCHEN</strong><cite><em>s</em><small>o</small></cite></li>\r\n<li><span>Microwave</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Hot plates – 3 gas &amp; 1 Electric &amp; Grill</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Gas Oven</span><cite><em>y</em></cite></li>\r\n<li><span>Large capacity deep bowl sink</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>12V stainless Steel slimline Range Hood</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>240V/12V &amp; LP gas 104 litre fridge</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>240/ 12V Compressor Fridge</span><cite><em>y</em></cite></li>\r\n<li><span>Mains pressure water with 12V pump</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Water Tank gauge</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>European style pull out pantry (some models)</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Flick Mixer Tap</span><cite><em>y</em><small> </small></cite></li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="externalfeaturesBlock">\r\n<div class="detailsColum1">\r\n<ul>\r\n<li><strong>BATHROOM/ENSUITE IF FITTED</strong><cite><em>s</em><small>o</small></cite></li>\r\n<li>Combined shower base /toilet combo with mixer tap.<br /> (ET2 - 5650 -1 - T)<cite><em>y</em></cite></li>\r\n<li>21 litre gas / electric hot water service with 12V ignition<cite><em>y</em></cite></li>\r\n<li><span> Exhaust fan/ hatch</span><cite><em>y</em></cite></li>\r\n<li><span> Hand Basin</span><cite><em>y</em></cite></li>\r\n</ul>\r\n</div>\r\n<div class="detailsColum1 detailsColum2">\r\n<ul>\r\n<li><strong>BEDROOM</strong><cite><em>s</em><small>o</small></cite></li>\r\n<li><span>Easy Design Fold Out Front Bed Extension &amp; Composite roof</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Extenda bed series (front, rear or both)</span><cite><em>y</em></cite></li>\r\n<li><span>Double lamented bed base on cables</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Matching Mattress Covers to suit Upholstery</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Bunk Beds available on specific models</span><cite><em>y</em></cite></li>\r\n<li><span>High Density Foam Mattress</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Inner Spring Mattress</span><cite><em>y</em></cite></li>\r\n<li><span>Superior Grade breathable Canvas Walls with Fly Screens</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Privacy Curtains</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Robe(s)</span><cite><em>y</em><small> </small></cite></li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="externalfeaturesBlock">\r\n<div class="detailsColum1">\r\n<ul>\r\n<li><strong>EXTERIOR</strong><cite><em>s</em><small>o</small></cite></li>\r\n<li><span>1 x 12v 100amp Battery with Setec charging system </span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Wired for solar panel</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>1 x 60 Litre water tank and stone guard</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>2 x 80 Litre water tanks on shower models</span><cite><em>y</em></cite></li>\r\n<li><span>Lockable water filler. Inc - town water entry point.</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Water Tap on Chassis A Frame</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>2 x 4.5Kg Gas Bottles</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>2 x 9Kg Gas Bottles on Shower Models</span><cite><em>y</em></cite></li>\r\n<li><span>European Style Windows. Double glazed acrylic.</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Roll Out side Awning </span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Lockable Entrance Door with Flyscreen</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Custom designed wheel spats</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>High Grade European sourced White Aluminium Cladding</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>High Grade European sourced Two Tone Aluminium Cladding</span><cite><em>y</em></cite></li>\r\n<li><span>Drop Down Picnic table</span><cite><em>y</em></cite></li>\r\n<li><span>TV Antenna entry point</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>12V Entrance Door Handle Light</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>LED 12V Annexe Light</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Insulation installed to Roof &amp; Walls</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Rear Bumper Bar</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Full Size Spare Wheel</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>1 or 2 x Jerry Can holders</span><cite><em>y</em></cite></li>\r\n<li><span>LED 12V Tail, Brake &amp; Side clearance lighting</span><cite><em>y</em><small> </small></cite></li>\r\n</ul>\r\n</div>\r\n<div class="detailsColum1 detailsColum2">\r\n<ul>\r\n<li><strong>CHASSIS</strong><cite><em>s</em><small>o</small></cite></li>\r\n<li><span>G &amp; S Australian made, engineered to suit each model</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Extended or Std length "A" Frame with mesh insert</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Single axle configuration</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Tandem axle configuration (ET2 - 5650 - 1 - T) only</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Super gal coated chassis for superior protection</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Solid axle with spring suspension</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Electric brakes</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Jockey wheel</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>50mm ball coupling</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Stabilizer jacks to each corner</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Handbrake</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Universal Jacking Points, also suits Trailamate</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>15" Chrome Alloy Wheels including Spare</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Jack &amp; Wheel Brace</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Independent suspension</span><cite><em>y</em></cite></li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="externalfeaturesBlock">\r\n<div class="detailsColum1">\r\n<ul>\r\n<li><strong>SAFETY FEATURES INTERIOR</strong><cite><em>s</em><small>o</small></cite></li>\r\n<li><span>Fire Extinguisher</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>9v Battery Smoke Detector</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Fire Blanket</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>240v RCD Safety trip switch</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>12v LED power save &amp; Low heat generating Lighting</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Safety labelling to all LP Gas Appliances</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>LP Gas certified</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span>Tempering valve to shower</span><cite><em>y</em><small> </small></cite></li>\r\n</ul>\r\n</div>\r\n<div class="detailsColum1 detailsColum2">\r\n<ul>\r\n<li><strong>SAFETY FEATURES EXTERIOR</strong><cite><em>s</em><small>o</small></cite></li>\r\n<li><span> AL –KO Electronic Stability Control (ESC) Sway control</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span> 12v Electric controlled braking system</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span> Bright LED Running Lights</span><cite><em>y</em><small> </small></cite></li>\r\n<li>Breakaway Safety Brake fitted to single axle greater<br /> than 2000kgs and all tandem axle configurations<cite><em>y</em><small> </small></cite></li>\r\n<li><span> 12 pin flat connector</span><cite><em>y</em><small> </small></cite></li>\r\n<li><span> Certified Safety Chains</span><cite><em>y</em><small> </small></cite></li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="plans">\r\n<div class="moduletable">\r\n<h3>et2 floor plans</h3>\r\n<div>\r\n<ul>\r\n<li>\r\n<div class="figure"><img src="/images/floorplans/et2/ET2-3750-1-S-thumb.jpg" alt="ET2-3750-1-S-thumb" /><a class="fancybox" href="/images/floorplans/et2/ET2-3750-1-S.jpg"><strong>Click to enlarge</strong></a></div>\r\n<span>ET2-3750-1-S</span></li>\r\n<li>\r\n<div class="figure"><img src="/images/floorplans/et2/ET2-3950-1-S-thumb.jpg" alt="ET2-3950-1-S-thumb" /><a class="fancybox" href="/images/floorplans/et2/ET2-3950-1-S.jpg"><strong>Click to enlarge</strong></a></div>\r\n<span>ET2-3950-1-S</span></li>\r\n<li>\r\n<div class="figure"><img src="/images/floorplans/et2/ET2-5050-1-S-thumb.jpg" alt="ET2-5050-1-S-thumb" /><a class="fancybox" href="/images/floorplans/et2/ET2-5050-1-S.jpg"><strong>Click to enlarge</strong></a></div>\r\n<span>ET2-5050-1-S</span></li>\r\n<li>\r\n<div class="figure"><img src="/images/floorplans/et2/ET2-5050-2-S-thumb.jpg" alt="ET2-5050-2-S-thumb" /><a class="fancybox" href="/images/floorplans/et2/ET2-5050-2-S.jpg"><strong>Click to enlarge</strong></a></div>\r\n<span>ET2-5050-2-S</span></li>\r\n<li>\r\n<div class="figure"><img src="/images/floorplans/et2/ET2-5650-1-T-thumb.jpg" alt="ET2-5650-1-T-thumb" /><a class="fancybox" href="/images/floorplans/et2/ET2-5650-1-T.jpg"><strong>Click to enlarge</strong></a></div>\r\n<span>ET2-5650-1-T</span></li>\r\n</ul>\r\n<p>Our Nomenclature explained. Example ET2 – 3950 – 1 – S<br /> ET2 = Extend Series 2<br /> 3950 = Nominal body length in mm <br /> 1 = Internal Design Code<br /> S = Single Axle Conﬁguration (T = Tandem axle conﬁguration)</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="tagButtons"><a class="wf_file" href="/images/brochures/Coronet-ET2.pdf" target="_blank"><span class="wf_file_text">Download Brochure</span></a></div>', '', 1, 8, '2014-03-21 06:01:53', 706, '', '2014-03-21 06:02:55', 706, 0, '0000-00-00 00:00:00', '2014-03-21 06:01:53', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 3, 0, '', '', 1, 11, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', '');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_contentitem_tag_map`
--

CREATE TABLE `i4aj7_contentitem_tag_map` (
  `type_alias` varchar(255) NOT NULL DEFAULT '',
  `core_content_id` int(10) unsigned NOT NULL COMMENT 'PK from the core content table',
  `content_item_id` int(11) NOT NULL COMMENT 'PK from the content type table',
  `tag_id` int(10) unsigned NOT NULL COMMENT 'PK from the tag table',
  `tag_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date of most recent save for this tag-item',
  `type_id` mediumint(8) NOT NULL COMMENT 'PK from the content_type table',
  UNIQUE KEY `uc_ItemnameTagid` (`type_id`,`content_item_id`,`tag_id`),
  KEY `idx_tag_type` (`tag_id`,`type_id`),
  KEY `idx_date_id` (`tag_date`,`tag_id`),
  KEY `idx_tag` (`tag_id`),
  KEY `idx_type` (`type_id`),
  KEY `idx_core_content_id` (`core_content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Maps items from content tables to tags';

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_content_frontpage`
--

CREATE TABLE `i4aj7_content_frontpage` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i4aj7_content_frontpage`
--

INSERT INTO `i4aj7_content_frontpage` (`content_id`, `ordering`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_content_rating`
--

CREATE TABLE `i4aj7_content_rating` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(10) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(10) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_content_types`
--

CREATE TABLE `i4aj7_content_types` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_title` varchar(255) NOT NULL DEFAULT '',
  `type_alias` varchar(255) NOT NULL DEFAULT '',
  `table` varchar(255) NOT NULL DEFAULT '',
  `rules` text NOT NULL,
  `field_mappings` text NOT NULL,
  `router` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`type_id`),
  KEY `idx_alias` (`type_alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `i4aj7_content_types`
--

INSERT INTO `i4aj7_content_types` (`type_id`, `type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `router`) VALUES
(1, 'Article', 'com_content.article', '{"special":{"dbtable":"#__content","key":"id","type":"Content","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"state","core_alias":"alias","core_created_time":"created","core_modified_time":"modified","core_body":"introtext", "core_hits":"hits","core_publish_up":"publish_up","core_publish_down":"publish_down","core_access":"access", "core_params":"attribs", "core_featured":"featured", "core_metadata":"metadata", "core_language":"language", "core_images":"images", "core_urls":"urls", "core_version":"version", "core_ordering":"ordering", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"catid", "core_xreference":"xreference", "asset_id":"asset_id"}, "special": {"fulltext":"fulltext"}}', 'ContentHelperRoute::getArticleRoute'),
(2, 'Weblink', 'com_weblinks.weblink', '{"special":{"dbtable":"#__weblinks","key":"id","type":"Weblink","prefix":"WeblinksTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"state","core_alias":"alias","core_created_time":"created","core_modified_time":"modified","core_body":"description", "core_hits":"hits","core_publish_up":"publish_up","core_publish_down":"publish_down","core_access":"access", "core_params":"params", "core_featured":"featured", "core_metadata":"metadata", "core_language":"language", "core_images":"images", "core_urls":"url", "core_version":"version", "core_ordering":"ordering", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"catid", "core_xreference":"xreference", "asset_id":"null"}, "special": {}}', 'WeblinksHelperRoute::getWeblinkRoute'),
(3, 'Contact', 'com_contact.contact', '{"special":{"dbtable":"#__contact_details","key":"id","type":"Contact","prefix":"ContactTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"name","core_state":"published","core_alias":"alias","core_created_time":"created","core_modified_time":"modified","core_body":"address", "core_hits":"hits","core_publish_up":"publish_up","core_publish_down":"publish_down","core_access":"access", "core_params":"params", "core_featured":"featured", "core_metadata":"metadata", "core_language":"language", "core_images":"image", "core_urls":"webpage", "core_version":"version", "core_ordering":"ordering", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"catid", "core_xreference":"xreference", "asset_id":"null"}, "special": {"con_position":"con_position","suburb":"suburb","state":"state","country":"country","postcode":"postcode","telephone":"telephone","fax":"fax","misc":"misc","email_to":"email_to","default_con":"default_con","user_id":"user_id","mobile":"mobile","sortname1":"sortname1","sortname2":"sortname2","sortname3":"sortname3"}}', 'ContactHelperRoute::getContactRoute'),
(4, 'Newsfeed', 'com_newsfeeds.newsfeed', '{"special":{"dbtable":"#__newsfeeds","key":"id","type":"Newsfeed","prefix":"NewsfeedsTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"name","core_state":"published","core_alias":"alias","core_created_time":"created","core_modified_time":"modified","core_body":"description", "core_hits":"hits","core_publish_up":"publish_up","core_publish_down":"publish_down","core_access":"access", "core_params":"params", "core_featured":"featured", "core_metadata":"metadata", "core_language":"language", "core_images":"images", "core_urls":"link", "core_version":"version", "core_ordering":"ordering", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"catid", "core_xreference":"xreference", "asset_id":"null"}, "special": {"numarticles":"numarticles","cache_time":"cache_time","rtl":"rtl"}}', 'NewsfeedsHelperRoute::getNewsfeedRoute'),
(5, 'User', 'com_users.user', '{"special":{"dbtable":"#__users","key":"id","type":"User","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"name","core_state":"null","core_alias":"username","core_created_time":"registerdate","core_modified_time":"lastvisitDate","core_body":"null", "core_hits":"null","core_publish_up":"null","core_publish_down":"null","access":"null", "core_params":"params", "core_featured":"null", "core_metadata":"null", "core_language":"null", "core_images":"null", "core_urls":"null", "core_version":"null", "core_ordering":"null", "core_metakey":"null", "core_metadesc":"null", "core_catid":"null", "core_xreference":"null", "asset_id":"null"}, "special": {}}', 'UsersHelperRoute::getUserRoute'),
(6, 'Article Category', 'com_content.category', '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"null", "core_urls":"null", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"parent_id", "core_xreference":"null", "asset_id":"asset_id"}, "special": {"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}', 'ContentHelperRoute::getCategoryRoute'),
(7, 'Contact Category', 'com_contact.category', '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"null", "core_urls":"null", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"parent_id", "core_xreference":"null", "asset_id":"asset_id"}, "special": {"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}', 'ContactHelperRoute::getCategoryRoute'),
(8, 'Newsfeeds Category', 'com_newsfeeds.category', '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"null", "core_urls":"null", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"parent_id", "core_xreference":"null", "asset_id":"asset_id"}, "special": {"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}', 'NewsfeedsHelperRoute::getCategoryRoute'),
(9, 'Weblinks Category', 'com_weblinks.category', '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"null", "core_urls":"null", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"parent_id", "core_xreference":"null", "asset_id":"asset_id"}, "special": {"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}', 'WeblinksHelperRoute::getCategoryRoute'),
(10, 'Tag', 'com_tags.tag', '{"special":{"dbtable":"#__tags","key":"tag_id","type":"Tag","prefix":"TagsTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"featured", "core_metadata":"metadata", "core_language":"language", "core_images":"images", "core_urls":"urls", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"null", "core_xreference":"null", "asset_id":"null"}, "special": {"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path"}}', 'TagsHelperRoute::getTagRoute');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_core_log_searches`
--

CREATE TABLE `i4aj7_core_log_searches` (
  `search_term` varchar(128) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_extensions`
--

CREATE TABLE `i4aj7_extensions` (
  `extension_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `element` varchar(100) NOT NULL,
  `folder` varchar(100) NOT NULL,
  `client_id` tinyint(3) NOT NULL,
  `enabled` tinyint(3) NOT NULL DEFAULT '1',
  `access` int(10) unsigned NOT NULL DEFAULT '1',
  `protected` tinyint(3) NOT NULL DEFAULT '0',
  `manifest_cache` text NOT NULL,
  `params` text NOT NULL,
  `custom_data` text NOT NULL,
  `system_data` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) DEFAULT '0',
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`extension_id`),
  KEY `element_clientid` (`element`,`client_id`),
  KEY `element_folder_clientid` (`element`,`folder`,`client_id`),
  KEY `extension` (`type`,`element`,`folder`,`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10059 ;

--
-- Dumping data for table `i4aj7_extensions`
--

INSERT INTO `i4aj7_extensions` (`extension_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `manifest_cache`, `params`, `custom_data`, `system_data`, `checked_out`, `checked_out_time`, `ordering`, `state`) VALUES
(1, 'com_mailto', 'component', 'com_mailto', '', 0, 1, 1, 1, '{"name":"com_mailto","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MAILTO_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'com_wrapper', 'component', 'com_wrapper', '', 0, 1, 1, 1, '{"name":"com_wrapper","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_WRAPPER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(3, 'com_admin', 'component', 'com_admin', '', 1, 1, 1, 1, '{"name":"com_admin","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_ADMIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'com_banners', 'component', 'com_banners', '', 1, 1, 1, 0, '{"name":"com_banners","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_BANNERS_XML_DESCRIPTION","group":""}', '{"purchase_type":"3","track_impressions":"0","track_clicks":"0","metakey_prefix":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(5, 'com_cache', 'component', 'com_cache', '', 1, 1, 1, 1, '{"name":"com_cache","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CACHE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(6, 'com_categories', 'component', 'com_categories', '', 1, 1, 1, 1, '{"name":"com_categories","type":"component","creationDate":"December 2007","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CATEGORIES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(7, 'com_checkin', 'component', 'com_checkin', '', 1, 1, 1, 1, '{"name":"com_checkin","type":"component","creationDate":"Unknown","author":"Joomla! Project","copyright":"(C) 2005 - 2008 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CHECKIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(8, 'com_contact', 'component', 'com_contact', '', 1, 1, 1, 0, '{"name":"com_contact","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CONTACT_XML_DESCRIPTION","group":""}', '{"show_contact_category":"hide","show_contact_list":"0","presentation_style":"sliders","show_name":"1","show_position":"1","show_email":"0","show_street_address":"1","show_suburb":"1","show_state":"1","show_postcode":"1","show_country":"1","show_telephone":"1","show_mobile":"1","show_fax":"1","show_webpage":"1","show_misc":"1","show_image":"1","image":"","allow_vcard":"0","show_articles":"0","show_profile":"0","show_links":"0","linka_name":"","linkb_name":"","linkc_name":"","linkd_name":"","linke_name":"","contact_icons":"0","icon_address":"","icon_email":"","icon_telephone":"","icon_mobile":"","icon_fax":"","icon_misc":"","show_headings":"1","show_position_headings":"1","show_email_headings":"0","show_telephone_headings":"1","show_mobile_headings":"0","show_fax_headings":"0","allow_vcard_headings":"0","show_suburb_headings":"1","show_state_headings":"1","show_country_headings":"1","show_email_form":"1","show_email_copy":"1","banned_email":"","banned_subject":"","banned_text":"","validate_session":"1","custom_reply":"0","redirect":"","show_category_crumb":"0","metakey":"","metadesc":"","robots":"","author":"","rights":"","xreference":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(9, 'com_cpanel', 'component', 'com_cpanel', '', 1, 1, 1, 1, '{"name":"com_cpanel","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CPANEL_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10, 'com_installer', 'component', 'com_installer', '', 1, 1, 1, 1, '{"name":"com_installer","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_INSTALLER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(11, 'com_languages', 'component', 'com_languages', '', 1, 1, 1, 1, '{"name":"com_languages","type":"component","creationDate":"2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_LANGUAGES_XML_DESCRIPTION","group":""}', '{"administrator":"en-GB","site":"en-GB"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(12, 'com_login', 'component', 'com_login', '', 1, 1, 1, 1, '{"name":"com_login","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_LOGIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(13, 'com_media', 'component', 'com_media', '', 1, 1, 0, 1, '{"name":"com_media","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MEDIA_XML_DESCRIPTION","group":""}', '{"upload_extensions":"bmp,csv,doc,gif,ico,jpg,jpeg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,GIF,ICO,JPG,JPEG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS","upload_maxsize":"10","file_path":"images","image_path":"images","restrict_uploads":"1","allowed_media_usergroup":"3","check_mime":"1","image_extensions":"bmp,gif,jpg,png","ignore_extensions":"","upload_mime":"image\\/jpeg,image\\/gif,image\\/png,image\\/bmp,application\\/x-shockwave-flash,application\\/msword,application\\/excel,application\\/pdf,application\\/powerpoint,text\\/plain,application\\/x-zip","upload_mime_illegal":"text\\/html"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(14, 'com_menus', 'component', 'com_menus', '', 1, 1, 1, 1, '{"name":"com_menus","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MENUS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(15, 'com_messages', 'component', 'com_messages', '', 1, 1, 1, 1, '{"name":"com_messages","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MESSAGES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(16, 'com_modules', 'component', 'com_modules', '', 1, 1, 1, 1, '{"name":"com_modules","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MODULES_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(17, 'com_newsfeeds', 'component', 'com_newsfeeds', '', 1, 1, 1, 0, '{"name":"com_newsfeeds","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_NEWSFEEDS_XML_DESCRIPTION","group":""}', '{"show_feed_image":"1","show_feed_description":"1","show_item_description":"1","feed_word_count":"0","show_headings":"1","show_name":"1","show_articles":"0","show_link":"1","show_description":"1","show_description_image":"1","display_num":"","show_pagination_limit":"1","show_pagination":"1","show_pagination_results":"1","show_cat_items":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(18, 'com_plugins', 'component', 'com_plugins', '', 1, 1, 1, 1, '{"name":"com_plugins","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_PLUGINS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(19, 'com_search', 'component', 'com_search', '', 1, 1, 1, 0, '{"name":"com_search","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_SEARCH_XML_DESCRIPTION","group":""}', '{"enabled":"0","show_date":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(20, 'com_templates', 'component', 'com_templates', '', 1, 1, 1, 1, '{"name":"com_templates","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_TEMPLATES_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(21, 'com_weblinks', 'component', 'com_weblinks', '', 1, 1, 1, 0, '{"name":"com_weblinks","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_WEBLINKS_XML_DESCRIPTION","group":""}', '{"show_comp_description":"1","comp_description":"","show_link_hits":"1","show_link_description":"1","show_other_cats":"0","show_headings":"0","show_numbers":"0","show_report":"1","count_clicks":"1","target":"0","link_icons":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(22, 'com_content', 'component', 'com_content', '', 1, 1, 0, 1, '{"name":"com_content","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CONTENT_XML_DESCRIPTION","group":""}', '{"article_layout":"_:default","show_title":"1","link_titles":"0","show_intro":"0","info_block_position":"0","show_category":"0","link_category":"0","show_parent_category":"0","link_parent_category":"0","show_author":"0","link_author":"0","show_create_date":"0","show_modify_date":"0","show_publish_date":"0","show_item_navigation":"0","show_vote":"0","show_readmore":"1","show_readmore_title":"0","readmore_limit":"100","show_tags":"0","show_icons":"0","show_print_icon":"0","show_email_icon":"0","show_hits":"0","show_noauth":"0","urls_position":"0","show_publishing_options":"1","show_article_options":"1","show_urls_images_frontend":"0","show_urls_images_backend":"1","targeta":0,"targetb":0,"targetc":0,"float_intro":"left","float_fulltext":"left","category_layout":"_:blog","show_category_heading_title_text":"1","show_category_title":"0","show_description":"0","show_description_image":"0","maxLevel":"1","show_empty_categories":"0","show_no_articles":"1","show_subcat_desc":"1","show_cat_num_articles":"0","show_base_description":"1","maxLevelcat":"-1","show_empty_categories_cat":"0","show_subcat_desc_cat":"1","show_cat_num_articles_cat":"1","num_leading_articles":"1","num_intro_articles":"4","num_columns":"2","num_links":"4","multi_column_order":"0","show_subcategory_content":"0","show_pagination_limit":"1","filter_field":"hide","show_headings":"1","list_show_date":"0","date_format":"","list_show_hits":"1","list_show_author":"1","orderby_pri":"order","orderby_sec":"rdate","order_date":"published","show_pagination":"2","show_pagination_results":"1","show_feed_link":"1","feed_summary":"0","feed_show_readmore":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(23, 'com_config', 'component', 'com_config', '', 1, 1, 0, 1, '{"name":"com_config","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CONFIG_XML_DESCRIPTION","group":""}', '{"filters":{"1":{"filter_type":"NH","filter_tags":"","filter_attributes":""},"9":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"6":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"7":{"filter_type":"NONE","filter_tags":"","filter_attributes":""},"2":{"filter_type":"NH","filter_tags":"","filter_attributes":""},"3":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"4":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"5":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"8":{"filter_type":"NONE","filter_tags":"","filter_attributes":""}}}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(24, 'com_redirect', 'component', 'com_redirect', '', 1, 1, 0, 1, '{"name":"com_redirect","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_REDIRECT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(25, 'com_users', 'component', 'com_users', '', 1, 1, 0, 1, '{"name":"com_users","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_USERS_XML_DESCRIPTION","group":""}', '{"allowUserRegistration":"1","new_usertype":"2","guest_usergroup":"9","sendpassword":"1","useractivation":"1","mail_to_admin":"0","captcha":"","frontend_userparams":"1","site_language":"0","change_login_name":"0","reset_count":"10","reset_time":"1","mailSubjectPrefix":"","mailBodySuffix":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(27, 'com_finder', 'component', 'com_finder', '', 1, 1, 0, 0, '{"name":"com_finder","type":"component","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_FINDER_XML_DESCRIPTION","group":""}', '{"show_description":"1","description_length":255,"allow_empty_query":"0","show_url":"1","show_advanced":"1","expand_advanced":"0","show_date_filters":"0","highlight_terms":"1","opensearch_name":"","opensearch_description":"","batch_size":"50","memory_table_limit":30000,"title_multiplier":"1.7","text_multiplier":"0.7","meta_multiplier":"1.2","path_multiplier":"2.0","misc_multiplier":"0.3","stemmer":"snowball"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(28, 'com_joomlaupdate', 'component', 'com_joomlaupdate', '', 1, 1, 0, 1, '{"name":"com_joomlaupdate","type":"component","creationDate":"February 2012","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_JOOMLAUPDATE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(29, 'com_tags', 'component', 'com_tags', '', 1, 1, 1, 1, '{"name":"com_tags","type":"component","creationDate":"December 2013","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.1.0","description":"COM_TAGS_XML_DESCRIPTION","group":""}', '{"show_tag_title":"0","tag_list_show_tag_image":"0","tag_list_show_tag_description":"0","tag_list_image":"","show_tag_num_items":"0","tag_list_orderby":"title","tag_list_orderby_direction":"ASC","show_headings":"0","tag_list_show_date":"0","tag_list_show_item_image":"0","tag_list_show_item_description":"0","tag_list_item_maximum_characters":0,"return_any_or_all":"1","include_children":"0","maximum":200,"tag_list_language_filter":"all","tags_layout":"_:default","all_tags_orderby":"title","all_tags_orderby_direction":"ASC","all_tags_show_tag_image":"0","all_tags_show_tag_descripion":"0","all_tags_tag_maximum_characters":20,"all_tags_show_tag_hits":"0","filter_field":"1","show_pagination_limit":"1","show_pagination":"2","show_pagination_results":"1","tag_field_ajax_mode":"1","show_feed_link":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(100, 'PHPMailer', 'library', 'phpmailer', '', 0, 1, 1, 1, '{"name":"PHPMailer","type":"library","creationDate":"2001","author":"PHPMailer","copyright":"(c) 2001-2003, Brent R. Matzelle, (c) 2004-2009, Andy Prevost. All Rights Reserved., (c) 2010-2013, Jim Jagielski. All Rights Reserved.","authorEmail":"jimjag@gmail.com","authorUrl":"https:\\/\\/github.com\\/PHPMailer\\/PHPMailer","version":"5.2.6","description":"LIB_PHPMAILER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(101, 'SimplePie', 'library', 'simplepie', '', 0, 1, 1, 1, '{"name":"SimplePie","type":"library","creationDate":"2004","author":"SimplePie","copyright":"Copyright (c) 2004-2009, Ryan Parman and Geoffrey Sneddon","authorEmail":"","authorUrl":"http:\\/\\/simplepie.org\\/","version":"1.2","description":"LIB_SIMPLEPIE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(102, 'phputf8', 'library', 'phputf8', '', 0, 1, 1, 1, '{"name":"phputf8","type":"library","creationDate":"2006","author":"Harry Fuecks","copyright":"Copyright various authors","authorEmail":"hfuecks@gmail.com","authorUrl":"http:\\/\\/sourceforge.net\\/projects\\/phputf8","version":"0.5","description":"LIB_PHPUTF8_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(103, 'Joomla! Platform', 'library', 'joomla', '', 0, 1, 1, 1, '{"name":"Joomla! Platform","type":"library","creationDate":"2008","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"http:\\/\\/www.joomla.org","version":"12.2","description":"LIB_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(104, 'IDNA Convert', 'library', 'idna_convert', '', 0, 1, 1, 1, '{"name":"IDNA Convert","type":"library","creationDate":"2004","author":"phlyLabs","copyright":"2004-2011 phlyLabs Berlin, http:\\/\\/phlylabs.de","authorEmail":"phlymail@phlylabs.de","authorUrl":"http:\\/\\/phlylabs.de","version":"0.8.0","description":"LIB_IDNA_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(200, 'mod_articles_archive', 'module', 'mod_articles_archive', '', 0, 1, 1, 0, '{"name":"mod_articles_archive","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters.\\n\\t\\tAll rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_ARTICLES_ARCHIVE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(201, 'mod_articles_latest', 'module', 'mod_articles_latest', '', 0, 1, 1, 0, '{"name":"mod_articles_latest","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LATEST_NEWS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(202, 'mod_articles_popular', 'module', 'mod_articles_popular', '', 0, 1, 1, 0, '{"name":"mod_articles_popular","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_POPULAR_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(203, 'mod_banners', 'module', 'mod_banners', '', 0, 1, 1, 0, '{"name":"mod_banners","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_BANNERS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(204, 'mod_breadcrumbs', 'module', 'mod_breadcrumbs', '', 0, 1, 1, 1, '{"name":"mod_breadcrumbs","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_BREADCRUMBS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(205, 'mod_custom', 'module', 'mod_custom', '', 0, 1, 1, 1, '{"name":"mod_custom","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_CUSTOM_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(206, 'mod_feed', 'module', 'mod_feed', '', 0, 1, 1, 0, '{"name":"mod_feed","type":"module","creationDate":"July 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_FEED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(207, 'mod_footer', 'module', 'mod_footer', '', 0, 1, 1, 0, '{"name":"mod_footer","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_FOOTER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(208, 'mod_login', 'module', 'mod_login', '', 0, 1, 1, 1, '{"name":"mod_login","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LOGIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(209, 'mod_menu', 'module', 'mod_menu', '', 0, 1, 1, 1, '{"name":"mod_menu","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_MENU_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(210, 'mod_articles_news', 'module', 'mod_articles_news', '', 0, 1, 1, 0, '{"name":"mod_articles_news","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_ARTICLES_NEWS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(211, 'mod_random_image', 'module', 'mod_random_image', '', 0, 1, 1, 0, '{"name":"mod_random_image","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_RANDOM_IMAGE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(212, 'mod_related_items', 'module', 'mod_related_items', '', 0, 1, 1, 0, '{"name":"mod_related_items","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_RELATED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(213, 'mod_search', 'module', 'mod_search', '', 0, 1, 1, 0, '{"name":"mod_search","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_SEARCH_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(214, 'mod_stats', 'module', 'mod_stats', '', 0, 1, 1, 0, '{"name":"mod_stats","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_STATS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(215, 'mod_syndicate', 'module', 'mod_syndicate', '', 0, 1, 1, 1, '{"name":"mod_syndicate","type":"module","creationDate":"May 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_SYNDICATE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(216, 'mod_users_latest', 'module', 'mod_users_latest', '', 0, 1, 1, 0, '{"name":"mod_users_latest","type":"module","creationDate":"December 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_USERS_LATEST_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(217, 'mod_weblinks', 'module', 'mod_weblinks', '', 0, 1, 1, 0, '{"name":"mod_weblinks","type":"module","creationDate":"July 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_WEBLINKS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(218, 'mod_whosonline', 'module', 'mod_whosonline', '', 0, 1, 1, 0, '{"name":"mod_whosonline","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_WHOSONLINE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(219, 'mod_wrapper', 'module', 'mod_wrapper', '', 0, 1, 1, 0, '{"name":"mod_wrapper","type":"module","creationDate":"October 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_WRAPPER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(220, 'mod_articles_category', 'module', 'mod_articles_category', '', 0, 1, 1, 0, '{"name":"mod_articles_category","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_ARTICLES_CATEGORY_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(221, 'mod_articles_categories', 'module', 'mod_articles_categories', '', 0, 1, 1, 0, '{"name":"mod_articles_categories","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_ARTICLES_CATEGORIES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(222, 'mod_languages', 'module', 'mod_languages', '', 0, 1, 1, 1, '{"name":"mod_languages","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LANGUAGES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(223, 'mod_finder', 'module', 'mod_finder', '', 0, 1, 0, 0, '{"name":"mod_finder","type":"module","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_FINDER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(300, 'mod_custom', 'module', 'mod_custom', '', 1, 1, 1, 1, '{"name":"mod_custom","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_CUSTOM_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(301, 'mod_feed', 'module', 'mod_feed', '', 1, 1, 1, 0, '{"name":"mod_feed","type":"module","creationDate":"July 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_FEED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(302, 'mod_latest', 'module', 'mod_latest', '', 1, 1, 1, 0, '{"name":"mod_latest","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LATEST_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(303, 'mod_logged', 'module', 'mod_logged', '', 1, 1, 1, 0, '{"name":"mod_logged","type":"module","creationDate":"January 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LOGGED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(304, 'mod_login', 'module', 'mod_login', '', 1, 1, 1, 1, '{"name":"mod_login","type":"module","creationDate":"March 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LOGIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(305, 'mod_menu', 'module', 'mod_menu', '', 1, 1, 1, 0, '{"name":"mod_menu","type":"module","creationDate":"March 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_MENU_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(307, 'mod_popular', 'module', 'mod_popular', '', 1, 1, 1, 0, '{"name":"mod_popular","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_POPULAR_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(308, 'mod_quickicon', 'module', 'mod_quickicon', '', 1, 1, 1, 1, '{"name":"mod_quickicon","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_QUICKICON_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(309, 'mod_status', 'module', 'mod_status', '', 1, 1, 1, 0, '{"name":"mod_status","type":"module","creationDate":"Feb 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_STATUS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(310, 'mod_submenu', 'module', 'mod_submenu', '', 1, 1, 1, 0, '{"name":"mod_submenu","type":"module","creationDate":"Feb 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_SUBMENU_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(311, 'mod_title', 'module', 'mod_title', '', 1, 1, 1, 0, '{"name":"mod_title","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_TITLE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(312, 'mod_toolbar', 'module', 'mod_toolbar', '', 1, 1, 1, 1, '{"name":"mod_toolbar","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_TOOLBAR_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(313, 'mod_multilangstatus', 'module', 'mod_multilangstatus', '', 1, 1, 1, 0, '{"name":"mod_multilangstatus","type":"module","creationDate":"September 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_MULTILANGSTATUS_XML_DESCRIPTION","group":""}', '{"cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(314, 'mod_version', 'module', 'mod_version', '', 1, 1, 1, 0, '{"name":"mod_version","type":"module","creationDate":"January 2012","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_VERSION_XML_DESCRIPTION","group":""}', '{"format":"short","product":"1","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(315, 'mod_stats_admin', 'module', 'mod_stats_admin', '', 1, 1, 1, 0, '{"name":"mod_stats_admin","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_STATS_XML_DESCRIPTION","group":""}', '{"serverinfo":"0","siteinfo":"0","counter":"0","increase":"0","cache":"1","cache_time":"900","cachemode":"static"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(316, 'mod_tags_popular', 'module', 'mod_tags_popular', '', 0, 1, 1, 0, '{"name":"mod_tags_popular","type":"module","creationDate":"January 2013","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.1.0","description":"MOD_TAGS_POPULAR_XML_DESCRIPTION","group":""}', '{"maximum":"5","timeframe":"alltime","owncache":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(317, 'mod_tags_similar', 'module', 'mod_tags_similar', '', 0, 1, 1, 0, '{"name":"mod_tags_similar","type":"module","creationDate":"January 2013","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.1.0","description":"MOD_TAGS_SIMILAR_XML_DESCRIPTION","group":""}', '{"maximum":"5","matchtype":"any","owncache":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(400, 'plg_authentication_gmail', 'plugin', 'gmail', 'authentication', 0, 0, 1, 0, '{"name":"plg_authentication_gmail","type":"plugin","creationDate":"February 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_GMAIL_XML_DESCRIPTION","group":""}', '{"applysuffix":"0","suffix":"","verifypeer":"1","user_blacklist":""}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(401, 'plg_authentication_joomla', 'plugin', 'joomla', 'authentication', 0, 1, 1, 1, '{"name":"plg_authentication_joomla","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_AUTH_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(402, 'plg_authentication_ldap', 'plugin', 'ldap', 'authentication', 0, 0, 1, 0, '{"name":"plg_authentication_ldap","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_LDAP_XML_DESCRIPTION","group":""}', '{"host":"","port":"389","use_ldapV3":"0","negotiate_tls":"0","no_referrals":"0","auth_method":"bind","base_dn":"","search_string":"","users_dn":"","username":"admin","password":"bobby7","ldap_fullname":"fullName","ldap_email":"mail","ldap_uid":"uid"}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(404, 'plg_content_emailcloak', 'plugin', 'emailcloak', 'content', 0, 1, 1, 0, '{"name":"plg_content_emailcloak","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTENT_EMAILCLOAK_XML_DESCRIPTION","group":""}', '{"mode":"1"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(406, 'plg_content_loadmodule', 'plugin', 'loadmodule', 'content', 0, 1, 1, 0, '{"name":"plg_content_loadmodule","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_LOADMODULE_XML_DESCRIPTION","group":""}', '{"style":"xhtml"}', '', '', 0, '2011-09-18 15:22:50', 0, 0),
(407, 'plg_content_pagebreak', 'plugin', 'pagebreak', 'content', 0, 1, 1, 0, '{"name":"plg_content_pagebreak","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTENT_PAGEBREAK_XML_DESCRIPTION","group":""}', '{"title":"1","multipage_toc":"1","showall":"1"}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(408, 'plg_content_pagenavigation', 'plugin', 'pagenavigation', 'content', 0, 1, 1, 0, '{"name":"plg_content_pagenavigation","type":"plugin","creationDate":"January 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_PAGENAVIGATION_XML_DESCRIPTION","group":""}', '{"position":"1"}', '', '', 0, '0000-00-00 00:00:00', 5, 0),
(409, 'plg_content_vote', 'plugin', 'vote', 'content', 0, 1, 1, 0, '{"name":"plg_content_vote","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_VOTE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 6, 0),
(410, 'plg_editors_codemirror', 'plugin', 'codemirror', 'editors', 0, 1, 1, 1, '{"name":"plg_editors_codemirror","type":"plugin","creationDate":"28 March 2011","author":"Marijn Haverbeke","copyright":"","authorEmail":"N\\/A","authorUrl":"","version":"1.0","description":"PLG_CODEMIRROR_XML_DESCRIPTION","group":""}', '{"linenumbers":"0","tabmode":"indent"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(411, 'plg_editors_none', 'plugin', 'none', 'editors', 0, 1, 1, 1, '{"name":"plg_editors_none","type":"plugin","creationDate":"August 2004","author":"Unknown","copyright":"","authorEmail":"N\\/A","authorUrl":"","version":"3.0.0","description":"PLG_NONE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(412, 'plg_editors_tinymce', 'plugin', 'tinymce', 'editors', 0, 1, 1, 0, '{"name":"plg_editors_tinymce","type":"plugin","creationDate":"2005-2012","author":"Moxiecode Systems AB","copyright":"Moxiecode Systems AB","authorEmail":"N\\/A","authorUrl":"tinymce.moxiecode.com\\/","version":"3.5.6","description":"PLG_TINY_XML_DESCRIPTION","group":""}', '{"mode":"1","skin":"0","entity_encoding":"raw","lang_mode":"0","lang_code":"en","text_direction":"ltr","content_css":"1","content_css_custom":"","relative_urls":"1","newlines":"0","invalid_elements":"script,applet,iframe","extended_elements":"","toolbar":"top","toolbar_align":"left","html_height":"550","html_width":"750","resizing":"true","resize_horizontal":"false","element_path":"1","fonts":"1","paste":"1","searchreplace":"1","insertdate":"1","format_date":"%Y-%m-%d","inserttime":"1","format_time":"%H:%M:%S","colors":"1","table":"1","smilies":"1","media":"1","hr":"1","directionality":"1","fullscreen":"1","style":"1","layer":"1","xhtmlxtras":"1","visualchars":"1","nonbreaking":"1","template":"1","blockquote":"1","wordcount":"1","advimage":"1","advlink":"1","advlist":"1","autosave":"1","contextmenu":"1","inlinepopups":"1","custom_plugin":"","custom_button":""}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(413, 'plg_editors-xtd_article', 'plugin', 'article', 'editors-xtd', 0, 1, 1, 1, '{"name":"plg_editors-xtd_article","type":"plugin","creationDate":"October 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_ARTICLE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(414, 'plg_editors-xtd_image', 'plugin', 'image', 'editors-xtd', 0, 1, 1, 0, '{"name":"plg_editors-xtd_image","type":"plugin","creationDate":"August 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_IMAGE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(415, 'plg_editors-xtd_pagebreak', 'plugin', 'pagebreak', 'editors-xtd', 0, 1, 1, 0, '{"name":"plg_editors-xtd_pagebreak","type":"plugin","creationDate":"August 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_EDITORSXTD_PAGEBREAK_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(416, 'plg_editors-xtd_readmore', 'plugin', 'readmore', 'editors-xtd', 0, 1, 1, 0, '{"name":"plg_editors-xtd_readmore","type":"plugin","creationDate":"March 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_READMORE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(417, 'plg_search_categories', 'plugin', 'categories', 'search', 0, 1, 1, 0, '{"name":"plg_search_categories","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_CATEGORIES_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(418, 'plg_search_contacts', 'plugin', 'contacts', 'search', 0, 1, 1, 0, '{"name":"plg_search_contacts","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_CONTACTS_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(419, 'plg_search_content', 'plugin', 'content', 'search', 0, 1, 1, 0, '{"name":"plg_search_content","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_CONTENT_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(420, 'plg_search_newsfeeds', 'plugin', 'newsfeeds', 'search', 0, 1, 1, 0, '{"name":"plg_search_newsfeeds","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_NEWSFEEDS_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(421, 'plg_search_weblinks', 'plugin', 'weblinks', 'search', 0, 1, 1, 0, '{"name":"plg_search_weblinks","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_WEBLINKS_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(422, 'plg_system_languagefilter', 'plugin', 'languagefilter', 'system', 0, 0, 1, 1, '{"name":"plg_system_languagefilter","type":"plugin","creationDate":"July 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SYSTEM_LANGUAGEFILTER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(423, 'plg_system_p3p', 'plugin', 'p3p', 'system', 0, 1, 1, 0, '{"name":"plg_system_p3p","type":"plugin","creationDate":"September 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_P3P_XML_DESCRIPTION","group":""}', '{"headers":"NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(424, 'plg_system_cache', 'plugin', 'cache', 'system', 0, 0, 1, 1, '{"name":"plg_system_cache","type":"plugin","creationDate":"February 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CACHE_XML_DESCRIPTION","group":""}', '{"browsercache":"0","cachetime":"15"}', '', '', 0, '0000-00-00 00:00:00', 9, 0);
INSERT INTO `i4aj7_extensions` (`extension_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `manifest_cache`, `params`, `custom_data`, `system_data`, `checked_out`, `checked_out_time`, `ordering`, `state`) VALUES
(425, 'plg_system_debug', 'plugin', 'debug', 'system', 0, 1, 1, 0, '{"name":"plg_system_debug","type":"plugin","creationDate":"December 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_DEBUG_XML_DESCRIPTION","group":""}', '{"profile":"1","queries":"1","memory":"1","language_files":"1","language_strings":"1","strip-first":"1","strip-prefix":"","strip-suffix":""}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(426, 'plg_system_log', 'plugin', 'log', 'system', 0, 1, 1, 1, '{"name":"plg_system_log","type":"plugin","creationDate":"April 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_LOG_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 5, 0),
(427, 'plg_system_redirect', 'plugin', 'redirect', 'system', 0, 0, 1, 1, '{"name":"plg_system_redirect","type":"plugin","creationDate":"April 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_REDIRECT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 6, 0),
(428, 'plg_system_remember', 'plugin', 'remember', 'system', 0, 1, 1, 1, '{"name":"plg_system_remember","type":"plugin","creationDate":"April 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_REMEMBER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 7, 0),
(429, 'plg_system_sef', 'plugin', 'sef', 'system', 0, 1, 1, 0, '{"name":"plg_system_sef","type":"plugin","creationDate":"December 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEF_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 8, 0),
(430, 'plg_system_logout', 'plugin', 'logout', 'system', 0, 1, 1, 1, '{"name":"plg_system_logout","type":"plugin","creationDate":"April 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SYSTEM_LOGOUT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(431, 'plg_user_contactcreator', 'plugin', 'contactcreator', 'user', 0, 0, 1, 0, '{"name":"plg_user_contactcreator","type":"plugin","creationDate":"August 2009","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTACTCREATOR_XML_DESCRIPTION","group":""}', '{"autowebpage":"","category":"34","autopublish":"0"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(432, 'plg_user_joomla', 'plugin', 'joomla', 'user', 0, 1, 1, 0, '{"name":"plg_user_joomla","type":"plugin","creationDate":"December 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2009 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_USER_JOOMLA_XML_DESCRIPTION","group":""}', '{"autoregister":"1"}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(433, 'plg_user_profile', 'plugin', 'profile', 'user', 0, 0, 1, 0, '{"name":"plg_user_profile","type":"plugin","creationDate":"January 2008","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_USER_PROFILE_XML_DESCRIPTION","group":""}', '{"register-require_address1":"1","register-require_address2":"1","register-require_city":"1","register-require_region":"1","register-require_country":"1","register-require_postal_code":"1","register-require_phone":"1","register-require_website":"1","register-require_favoritebook":"1","register-require_aboutme":"1","register-require_tos":"1","register-require_dob":"1","profile-require_address1":"1","profile-require_address2":"1","profile-require_city":"1","profile-require_region":"1","profile-require_country":"1","profile-require_postal_code":"1","profile-require_phone":"1","profile-require_website":"1","profile-require_favoritebook":"1","profile-require_aboutme":"1","profile-require_tos":"1","profile-require_dob":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(434, 'plg_extension_joomla', 'plugin', 'joomla', 'extension', 0, 1, 1, 1, '{"name":"plg_extension_joomla","type":"plugin","creationDate":"May 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_EXTENSION_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(435, 'plg_content_joomla', 'plugin', 'joomla', 'content', 0, 1, 1, 0, '{"name":"plg_content_joomla","type":"plugin","creationDate":"November 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTENT_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(436, 'plg_system_languagecode', 'plugin', 'languagecode', 'system', 0, 0, 1, 0, '{"name":"plg_system_languagecode","type":"plugin","creationDate":"November 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SYSTEM_LANGUAGECODE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 10, 0),
(437, 'plg_quickicon_joomlaupdate', 'plugin', 'joomlaupdate', 'quickicon', 0, 1, 1, 1, '{"name":"plg_quickicon_joomlaupdate","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_QUICKICON_JOOMLAUPDATE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(438, 'plg_quickicon_extensionupdate', 'plugin', 'extensionupdate', 'quickicon', 0, 1, 1, 1, '{"name":"plg_quickicon_extensionupdate","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_QUICKICON_EXTENSIONUPDATE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(439, 'plg_captcha_recaptcha', 'plugin', 'recaptcha', 'captcha', 0, 1, 1, 0, '{"name":"plg_captcha_recaptcha","type":"plugin","creationDate":"December 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CAPTCHA_RECAPTCHA_XML_DESCRIPTION","group":""}', '{"public_key":"","private_key":"","theme":"clean"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(440, 'plg_system_highlight', 'plugin', 'highlight', 'system', 0, 1, 1, 0, '{"name":"plg_system_highlight","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SYSTEM_HIGHLIGHT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 7, 0),
(441, 'plg_content_finder', 'plugin', 'finder', 'content', 0, 0, 1, 0, '{"name":"plg_content_finder","type":"plugin","creationDate":"December 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTENT_FINDER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(442, 'plg_finder_categories', 'plugin', 'categories', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_categories","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_CATEGORIES_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(443, 'plg_finder_contacts', 'plugin', 'contacts', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_contacts","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_CONTACTS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(444, 'plg_finder_content', 'plugin', 'content', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_content","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_CONTENT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(445, 'plg_finder_newsfeeds', 'plugin', 'newsfeeds', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_newsfeeds","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_NEWSFEEDS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(446, 'plg_finder_weblinks', 'plugin', 'weblinks', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_weblinks","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_WEBLINKS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 5, 0),
(447, 'plg_finder_tags', 'plugin', 'tags', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_tags","type":"plugin","creationDate":"February 2013","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_TAGS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(503, 'beez3', 'template', 'beez3', '', 0, 1, 1, 0, '{"name":"beez3","type":"template","creationDate":"25 November 2009","author":"Angie Radtke","copyright":"Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.","authorEmail":"a.radtke@derauftritt.de","authorUrl":"http:\\/\\/www.der-auftritt.de","version":"3.1.0","description":"TPL_BEEZ3_XML_DESCRIPTION","group":""}', '{"wrapperSmall":"53","wrapperLarge":"72","sitetitle":"","sitedescription":"","navposition":"center","templatecolor":"nature"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(504, 'hathor', 'template', 'hathor', '', 1, 1, 1, 0, '{"name":"hathor","type":"template","creationDate":"May 2010","author":"Andrea Tarr","copyright":"Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.","authorEmail":"hathor@tarrconsulting.com","authorUrl":"http:\\/\\/www.tarrconsulting.com","version":"3.0.0","description":"TPL_HATHOR_XML_DESCRIPTION","group":""}', '{"showSiteName":"0","colourChoice":"0","boldText":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(506, 'protostar', 'template', 'protostar', '', 0, 1, 1, 0, '{"name":"protostar","type":"template","creationDate":"4\\/30\\/2012","author":"Kyle Ledbetter","copyright":"Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"","version":"1.0","description":"TPL_PROTOSTAR_XML_DESCRIPTION","group":""}', '{"templateColor":"","logoFile":"","googleFont":"1","googleFontName":"Open+Sans","fluidContainer":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(507, 'isis', 'template', 'isis', '', 1, 1, 1, 0, '{"name":"isis","type":"template","creationDate":"3\\/30\\/2012","author":"Kyle Ledbetter","copyright":"Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"","version":"1.0","description":"TPL_ISIS_XML_DESCRIPTION","group":""}', '{"templateColor":"","logoFile":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(600, 'English (United Kingdom)', 'language', 'en-GB', '', 0, 1, 1, 1, '{"name":"English (United Kingdom)","type":"language","creationDate":"2013-03-07","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.1.4","description":"en-GB site language","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(601, 'English (United Kingdom)', 'language', 'en-GB', '', 1, 1, 1, 1, '{"name":"English (United Kingdom)","type":"language","creationDate":"2013-03-07","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.1.4","description":"en-GB administrator language","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(700, 'files_joomla', 'file', 'joomla', '', 0, 1, 1, 1, '{"name":"files_joomla","type":"file","creationDate":"August 2013","author":"Joomla! Project","copyright":"(C) 2005 - 2013 Open Source Matters. All rights reserved","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.1.5","description":"FILES_JOOMLA_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10000, 'earthlinkdesign', 'template', 'earthlinkdesign', '', 1, 1, 1, 0, '{"name":"earthlinkdesign","type":"template","creationDate":"3\\/30\\/2012","author":"Andrew Mouawad","copyright":"Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.","authorEmail":"info@earthlinkdesign.com.au","authorUrl":"","version":"1.0","description":"TPL_EARTHLINKDESIGN_XML_DESCRIPTION","group":""}', '{"templateColor":"#13294A","headerColor":"#184A7D","logoFile":"","admin_menus":"1","displayHeader":"1","statusFixed":"1","stickyToolbar":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10004, 'RegencyCaravans', 'template', 'regencycaravans', '', 0, 1, 1, 0, '{"name":"Regency Caravans","type":"template","creationDate":"Unknown","author":"Earthlink Design","copyright":"Regency Caravans","authorEmail":"","authorUrl":"","version":"1.0.0","description":"Regency Caravans, Joomla 1.5 custom template","group":""}', '[]', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10005, 'chronoforms', 'component', 'com_chronoforms', '', 1, 1, 0, 0, '{"name":"ChronoForms","type":"component","creationDate":"25.April.2013","author":"Chronoman","copyright":"ChronoEngine.com 2013","authorEmail":"webmaster@chronoengine.com","authorUrl":"www.chronoengine.com","version":"4.0","description":"Create everytype of Forms with whatever features you like!!","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10006, 'chronoforms', 'plugin', 'chronoforms', 'content', 0, 0, 1, 0, '{"name":"chronoforms","type":"plugin","creationDate":"08.January.2013","author":"ChronoEngine.com","copyright":"(C) ChronoEngine.com","authorEmail":"webmaster@chronoengine.com","authorUrl":"www.chronoengine.com","version":"V4 RC3.5.3","description":"\\n\\tThis plugin must have ChronoForms component in order for it to work.\\n\\tYou just need to put the name of the form you want to show between : {chronoforms}&{\\/chronoforms}, Example: {chronoforms}form1{\\/chronoforms} where form1 is the form name which will be displayed!!\\n\\t","group":""}', '{"after_text_forms":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10007, 'ChronoForms', 'module', 'mod_chronoforms', '', 0, 1, 0, 0, '{"name":"ChronoForms","type":"module","creationDate":"08.January.2013","author":"ChronoEngine.com","copyright":"Copyright (C) 2006 - 2011 ChronoEngine.com. All rights reserved.","authorEmail":"webmaster@chronoengine.com","authorUrl":"www.chronoengine.com","version":"V4 RC3.5.3","description":"Show a Chronoform, works on J1.6 and with ChronoForms V4","group":""}', '{"cache":"0","chronoform":"","moduleclass_sfx":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10008, 'swMenuPro', 'module', 'mod_swmenupro', '', 0, 1, 0, 0, '{"name":"swMenuPro","type":"module","creationDate":"APR 2013","author":"Sean White","copyright":"Copyright (C) 2010-2011 Sean White. All rights reserved.","authorEmail":"sean@swmenupro.com","authorUrl":"http:\\/\\/swmenupro.com","version":"9.7","description":"","group":""}', '{"cache":"1","cache_time":"900","cachemode":"static"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10009, 'com_swmenupro', 'component', 'com_swmenupro', '', 1, 1, 0, 0, '{"name":"COM_SWMENUPRO","type":"component","creationDate":"28\\/04\\/2013","author":"Sean White","copyright":"This Component is Proprietry Software","authorEmail":"sean@swmenupro.com","authorUrl":"http:\\/\\/www.swmenupro.com","version":"9.7","description":"Joomla DHTML Menu Component","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10010, 'S5 Image Fader v3', 'module', 'mod_s5_imagefader', '', 0, 1, 0, 0, '{"name":"S5 Image Fader v3","type":"module","creationDate":"October 2007","author":"Shape5.com","copyright":"","authorEmail":"contact@shape5.com","authorUrl":"www.shape5.com","version":"3.0.0","description":"The Image Fader 3.0 runs off of mootools and allows you to use an unlimited number of images to rotate through. You simply select a directory on your server to pull images from and the module will pull and display all the images from that directory! You can choose from fade in\\/out, zoom\\/pan and slide for the transition effects between images. We still included the legacy option running of S5 Effects if you need to run the older version of this module.","group":""}', '{"pretext":"","moduleclass_sfx":"","height":"183","width":"482","tween_time":"0.75","display_time":"3","background":"","s5_imagefaderver":"0","If using version 2.0 fill in details below, if version 1.0 click the ''advanced'' bar below to enter in image urls etc for version 2":"If using version 2.0 fill in details below, if version 1.0 click the ''other'' bar below to enter in image urls etc for version 2","imageurldirectory":"","thumbnails":"0","overlaycontrols":"0","imageoverlap":"0","jseffectstyle":"fade","s5_imagefaderstyle":"0","reflection":"0","":"You may enter up to 10 images. If you do not wish to use 10 simply leave the extra fields blank. IMPORTANT - Do not leave fields blank between images, ie: If you are only using 4 images then fields for images 1,2,3,4 should be filled in, not images 1,3,5,6 or any other order like it.","picture1":"","picture1link":"","picture1target":"1","picture2":"","picture2link":"","picture2target":"0","picture3":"","picture3link":"","picture3target":"0","picture4":"","picture4link":"","picture4target":"0","picture5":"","picture5link":"","picture5target":"0","picture6":"","picture6link":"","picture6target":"0","picture7":"","picture7link":"","picture7target":"0","picture8":"","picture8link":"","picture8target":"0","picture9":"","picture9link":"","picture9target":"0","picture10":"","picture10link":"","picture10target":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10011, 'ARI Image Slider', 'module', 'mod_ariimageslider', '', 0, 1, 0, 0, '{"name":"ARI Image Slider","type":"module","creationDate":"March 2013","author":"ARI Soft","copyright":"ARI Soft","authorEmail":"info@ari-soft.com","authorUrl":"www.ari-soft.com","version":"2.1.0","description":"ARI_IMAGE_SLIDER_MODULE","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10012, 'twojtoolbox', 'component', 'com_twojtoolbox', '', 1, 1, 0, 0, '{"name":"TwoJToolBox","type":"component","creationDate":"2013","author":"2Joomla Team","copyright":"Copyright (c) 2008-2013 2Joomla.net All rights reserved","authorEmail":"support@2joomla.net","authorUrl":"http:\\/\\/www.2joomla.net","version":"1.0.15","description":"COM_TWOJTOOLBOX_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10013, '2jgallery', 'component', 'com_2jgallery', '', 1, 1, 0, 0, '{"name":"2J Gallery","type":"component","creationDate":"2012","author":"2Joomla Team","copyright":"Copyright (c) 2008-2012 2Joomla.net All rights reserved","authorEmail":"support@2joomla.net","authorUrl":"http:\\/\\/www.2joomla.net","version":"1.0.4","description":"","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10014, '2JToolBox Module', 'module', 'mod_twojtoolbox', '', 0, 1, 0, 0, '{"name":"2JToolBox Module","type":"module","creationDate":"2011","author":"2Joomla Team","copyright":"Copyright (C) 2011 2Joomla. All rights reserved.","authorEmail":"support@2joomla.net","authorUrl":"www.2joomla.net","version":"1.0.0","description":"MOD_TWOJTOOLBOX_XML_DESCRIPTION","group":""}', '{"cache":"1","cache_time":"900","cachemode":"static","twojInclude":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10015, 'plg_system_twojtoolbox', 'plugin', 'twojtoolbox', 'system', 0, 1, 1, 0, '{"name":"plg_system_twojtoolbox","type":"plugin","creationDate":"2011","author":"2Joomla Team","copyright":"Copyright (C) 2007 - 2012 All rights reserved.","authorEmail":"support@2joomla.net","authorUrl":"www.2joomla.net","version":"1.6.0","description":"PLG_TWOJTOOLBOX_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10016, 'plg_editors-xtd_twojtoolboxbutton', 'plugin', 'twojtoolboxbutton', 'editors-xtd', 0, 1, 1, 0, '{"name":"plg_editors-xtd_twojtoolboxbutton","type":"plugin","creationDate":"2011","author":"2Joomla Team","copyright":"Copyright (C) 2011 2Joomla. All rights reserved.","authorEmail":"support@2joomla.net","authorUrl":"www.2joomla.net","version":"1.0.0","description":"PLG_EDITORSXTD_TWOJTOOLBOX_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10017, 'plg_sys_topofthepage', 'plugin', 'topofthepage', 'system', 0, 1, 1, 0, '{"name":"plg_sys_topofthepage","type":"plugin","creationDate":"April 2011","author":"Michael Richey","copyright":"Copyright (C) 2005 - 2011 Michael Richey. All rights reserved.","authorEmail":"topofthepage@richeyweb.com","authorUrl":"www.richeyweb.com","version":"1.22","description":"PLG_SYS_TOPOFTHEPAGE_XML_DESCRIPTION","group":""}', '{"runinadmin":"0","jsframework":"mootools","loadjsframework":"1","spyposition":"200","visibleopacity":"100","omittext":"0","topalways":"0","smoothscrollduration":"500","smoothscrolltransition":"linear","smoothscrolleasing":"easeInOut","linklocation":"bottom_right","usestyle":"1","linkstyle":"#gototop{\\r\\n\\tmargin:5px;\\r\\n\\tpadding:5px;\\r\\n\\tbackground-color:#9466B8;\\r\\n\\tcolor:#000;\\r\\n} #gototop:hover{background-color:#000;color:#9466B8;}","smoothscroll":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10018, 'com_mijosef', 'component', 'com_mijosef', '', 1, 1, 0, 0, '{"name":"COM_MIJOSEF","type":"component","creationDate":"May 2013","author":"Mijosoft LLC","copyright":"2009-2013 Mijosoft LLC","authorEmail":"info@mijosoft.com","authorUrl":"mijosoft.com","version":"1.3.4","description":"MijoSEF is a flexible and powerful SEF URLs, Metadata, Sitemap and Tags generator with an easy-to-use graphical user interface that simplifies the management of your site SEO rank.","group":""}', '{"mode":1,"generate_sef":1,"version_checker":0,"pid":"YW5kcmV3QGVhcnRobGlua2Rlc2lnbi5jb20uYXU=","cache_instant":1,"cache_versions":1,"cache_extensions":0,"cache_urls":0,"cache_urls_size":"10000","cache_metadata":0,"cache_sitemap":0,"cache_urls_moved":0,"cache_tags":0,"cache_ilinks":1,"seo_nofollow":0,"page404":"custom","url_lowercase":1,"global_smart_itemid":1,"ignore_multi_itemid":0,"numeral_duplicated":0,"record_duplicated":1,"url_suffix":".html","replacement_character":"-","parent_menus":0,"menu_url_part":"title","title_alias":"title","append_itemid":0,"remove_trailing_slash":1,"tolerant_to_trailing_slash":1,"url_strip_chars":"^$%@#()+*!?.~:;|[]{},&\\u00a6","source_tracker":0,"insert_active_itemid":0,"remove_sid":0,"set_query_string":1,"base_href":3,"append_non_sef":1,"prevent_dup_error":1,"show_db_errors":0,"check_url_by_id":1,"non_sef_vars":"format=feed, type=rss, type=atom","disable_sef_vars":"tmpl, format=raw, format=json, no_html=1, format=xml, aklazy, nonce","skip_menu_vars":"","db_404_errors":1,"log_404_errors":0,"sent_headers_error":0,"multilang":"0","joomfish_main_lang":"0","joomfish_lang_code":1,"multilang_home_code":1,"joomfish_trans_url":1,"joomfish_cookie":1,"joomfish_browser":1,"utf8_url":0,"char_replacements":"\\u00c1|A, \\u00c2|A, \\u00c5|A, \\u0102|A, \\u00c4|A, \\u00c0|A, \\u00c3|A, \\u0106|C, \\u00c7|C, \\u010c|C, \\u010e|D, \\u00c9|E, \\u00c8|E, \\u00cb|E, \\u011a|E, \\u00ca|E, \\u00cc|I, \\u00cd|I, \\u00ce|I, \\u00cf|I, \\u0139|L, \\u0143|N, \\u0147|N, \\u00d1|N, \\u00d2|O, \\u00d3|O, \\u00d4|O, \\u00d5|O, \\u00d6|O, \\u0150|O, \\u0154|R, \\u0158|R, \\u0160|S, \\u015a|O, \\u0164|T, \\u016e|U, \\u00da|U, \\u0170|U, \\u00dc|U, \\u00dd|Y, \\u017d|Z, \\u0179|Z, \\u00e1|a, \\u00e2|a, \\u00e5|a, \\u00e4|a, \\u00e0|a, \\u00e3|a, \\u0107|c, \\u00e7|c, \\u010d|c, \\u010f|d, \\u0111|d, \\u00e9|e, \\u0119|e, \\u00eb|e, \\u011b|e, \\u00e8|e, \\u00ea|e, \\u00ec|i, \\u00ed|i, \\u00ee|i, \\u00ef|i, \\u013a|l, \\u0144|n, \\u0148|n, \\u00f1|n, \\u00f2|o, \\u00f3|o, \\u00f4|o, \\u0151|o, \\u00f6|o, \\u00f5|o, \\u0161|s, \\u015b|s, \\u0159|r, \\u0155|r, \\u0165|t, \\u016f|u, \\u00fa|u, \\u0171|u, \\u00fc|u, \\u00fd|y, \\u017e|z, \\u017a|z, \\u02d9|-, \\u00df|ss, \\u0104|A, \\u00b5|u, \\u0104|A, \\u00b5|u, \\u0105|a, \\u0104|A, \\u0119|e, \\u0118|E, \\u015b|s, \\u015a|S, \\u017c|z, \\u017b|Z, \\u017a|z, \\u0179|Z, \\u0107|c, \\u0106|C, \\u0142|l, \\u0141|L, \\u00f3|o, \\u00d3|O, \\u0144|n, \\u0143|N, \\u0411|B, \\u0431|b, \\u0412|V, \\u0432|v, \\u0413|G, \\u0433|g, \\u0414|D, \\u0434|d, \\u0416|Zh, \\u0436|zh, \\u0417|Z, \\u0437|z, \\u0418|I, \\u0438|i, \\u0419|Y, \\u0439|y, \\u041a|K, \\u043a|k, \\u041b|L, \\u043b|l, \\u043c|m, \\u041d|N, \\u043d|n, \\u041f|P, \\u043f|p, \\u0442|t, \\u0423|U, \\u0443|u, \\u0424|F, \\u0444|f, \\u0425|Ch, \\u0445|ch, \\u0426|Ts, \\u0446|ts, \\u0427|Ch, \\u0447|ch, \\u0428|Sh, \\u0448|sh, \\u0429|Sch, \\u0449|sch, \\u042b|I, \\u044b|i, \\u042d|E, \\u044d|e, \\u042e|U, \\u044e|iu, \\u042f|Ya, \\u044f|ya, \\u015e|S, \\u0130|I, \\u011e|G, \\u015f|s, \\u011f|g, \\u0131|i, $|S, \\u00a5|Y, \\u00a3|L, \\u00f9|u, \\u00b0|o, \\u00ba|o, \\u00aa|a","redirect_to_www":1,"redirect_to_sef":1,"redirect_to_sef_gen":0,"jsef_to_mijosef":1,"force_ssl":[],"url_append_limit":0,"purge_ext_urls":1,"delete_other_sef":1,"meta_core":1,"meta_title":1,"meta_title_tag":1,"meta_desc":3,"meta_key":3,"meta_generator":"","meta_generator_rem":1,"meta_abstract":"","meta_revisit":"","meta_direction":"","meta_googlekey":"","meta_livekey":"","meta_yahookey":"","meta_alexa":"","meta_name_1":"","meta_name_2":"","meta_name_3":"","meta_con_1":"","meta_con_2":"","meta_con_3":"","meta_t_seperator":"-","meta_t_sitename":"","meta_t_usesitename":2,"meta_t_prefix":"","meta_t_suffix":"","meta_key_blacklist":"a, able, about, above, abroad, according, accordingly, across, actually, adj, after, afterwards, again, against, ago, ahead, ain''t, all, allow, allows, almost, alone, along, alongside, already, also, although, always, am, amid, amidst, among, amongst, an, and, another, any, anybody, anyhow, anyone, anything, anyway, anyways, anywhere, apart, appear, appreciate, appropriate, are, aren''t, around, as, a''s, aside, ask, asking, associated, at, available, away, awfully, b, back, backward, backwards, be, became, because, become, becomes, becoming, been, before, beforehand, begin, behind, being, believe, below, beside, besides, best, better, between, beyond, both, brief, but, by, c, came, can, cannot, cant, can''t, caption, cause, causes, certain, certainly, changes, clearly, c''mon, co, co., com, come, comes, concerning, consequently, consider, considering, contain, containing, contains, corresponding, could, couldn''t, course, c''s, currently, d, dare, daren''t, definitely, described, despite, did, didn''t, different, directly, do, does, doesn''t, doing, done, don''t, down, downwards, during, e, each, edu, eg, eight, eighty, either, else, elsewhere, end, ending, enough, entirely, especially, et, etc, even, ever, evermore, every, everybody, everyone, everything, everywhere, ex, exactly, example, except, f, fairly, far, farther, few, fewer, fifth, first, five, followed, following, follows, for, forever, former, formerly, forth, forward, found, four, from, further, furthermore, g, get, gets, getting, given, gives, go, goes, going, gone, got, gotten, greetings, h, had, hadn''t, half, happens, hardly, has, hasn''t, have, haven''t, having, he, he''d, he''ll, hello, help, , hence, her, here, hereafter, hereby, herein, here''s, hereupon, hers, herself, he''s, hi, him, himself, his, hither, hopefully, how, howbeit, however, hundred, i, i''d, ie, if, ignored, i''ll, i''m, immediate, in, inasmuch, inc, inc., indeed, indicate, indicated, indicates, inner, inside, insofar, instead, into, inward, is, isn''t, it, it''d, it''ll, its, it''s, itself, i''ve, j, just, k, keep, keeps, kept, know, known, knows, l, last, lately, later, latter, latterly, least, less, lest, let, let''s, like, liked, likely, likewise, little, look, looking, looks, low, lower, ltd, m, made, mainly, make, makes, many, may, maybe, mayn''t, me, mean, meantime, meanwhile, merely, might, mightn''t, mine, minus, miss, more, moreover, most, mostly, mr, mrs, much, must, mustn''t, my, myself, n, name, namely, nd, near, nearly, necessary, need, needn''t, needs, neither, never, neverf, neverless, nevertheless, new, next, nine, ninety, no, nobody, non, none, nonetheless, noone, no-one, nor, normally, not, nothing, notwithstanding, novel, now, nowhere, o, obviously, of, off, often, oh, ok, okay, old, on, once, one, ones, one''s, only, onto, opposite, or, other, others, otherwise, ought, oughtn''t, our, ours, ourselves, out, outside, over, overall, own, p, particular, particularly, past, per, perhaps, placed, please, plus, possible, presumably, probably, provided, provides, q, que, quite, qv, r, rather, rd, re, really, reasonably, recent, recently, regarding, regardless, regards, relatively, respectively, right, round, s, said, same, saw, say, saying, says, second, secondly, , see, seeing, seem, seemed, seeming, seems, seen, self, selves, sensible, sent, serious, seriously, seven, several, shall, shan''t, she, she''d, she''ll, she''s, should, shouldn''t, since, six, so, some, somebody, someday, somehow, someone, something, sometime, sometimes, somewhat, somewhere, soon, sorry, specified, specify, specifying, still, sub, such, sup, sure, t, take, taken, taking, tell, tends, th, than, thank, thanks, thanx, that, that''ll, thats, that''s, that''ve, the, their, theirs, them, themselves, then, thence, there, thereafter, thereby, there''d, therefore, therein, there''ll, there''re, theres, there''s, thereupon, there''ve, these, they, they''d, they''ll, they''re, they''ve, thing, things, think, third, thirty, this, thorough, thoroughly, those, though, three, through, throughout, thru, thus, till, to, together, too, took, toward, towards, tried, tries, truly, try, trying, t''s, twice, two, u, un, under, underneath, undoing, unfortunately, unless, unlike, unlikely, until, unto, up, upon, upwards, us, use, used, useful, uses, using, usually, v, value, various, versus, very, via, viz, vs, w, want, wants, was, wasn''t, way, we, we''d, welcome, well, we''ll, went, were, we''re, weren''t, we''ve, what, whatever, what''ll, what''s, what''ve, when, whence, whenever, where, whereafter, whereas, whereby, wherein, where''s, whereupon, wherever, whether, which, whichever, while, whilst, whither, who, who''d, whoever, whole, who''ll, whom, whomever, who''s, whose, why, will, willing, wish, with, within, without, wonder, won''t, would, wouldn''t, x, y, yes, yet, you, you''d, you''ll, your, you''re, yours, yourself, yourselves, you''ve, z, zero","meta_key_whitelist":"","sm_file":"sitemap","sm_xml_date":1,"sm_xml_freq":1,"sm_xml_prior":1,"sm_dot_tree":1,"sm_ping_type":"link","sm_ping":1,"sm_yahoo_appid":"","sm_ping_services":"http:\\/\\/blogsearch.google.com\\/ping\\/RPC2, http:\\/\\/rpc.pingomatic.com\\/","sm_freq":"weekly","sm_priority":"0.5","sm_auto_mode":1,"sm_auto_components":["com_content"],"sm_auto_enable_cats":0,"sm_auto_filter_s":".pdf","sm_auto_filter_r":"format=pdf, format=feed, type=rss","sm_auto_cron_mode":0,"sm_auto_cron_freq":24,"sm_auto_cron_last":"1286615325","sm_auto_xml":1,"sm_auto_ping_c":0,"sm_auto_ping_s":0,"tags_mode":0,"tags_area":1,"tags_components":["com_content"],"tags_enable_cats":0,"tags_in_cats":0,"tags_in_page":15,"tags_order":"ordering","tags_position":2,"tags_limit":20,"tags_show_tag_desc":0,"tags_show_prefix":1,"tags_show_item_desc":1,"tags_exp_item_desc":0,"tags_published":1,"tags_auto_mode":0,"tags_auto_components":["com_content"],"tags_auto_length":4,"tags_auto_filter_s":".pdf","tags_auto_filter_r":"format=pdf, format=feed, type=rss","tags_auto_blacklist":"a, able, about, above, abroad, according, accordingly, across, actually, adj, after, afterwards, again, against, ago, ahead, ain''t, all, allow, allows, almost, alone, along, alongside, already, also, although, always, am, amid, amidst, among, amongst, an, and, another, any, anybody, anyhow, anyone, anything, anyway, anyways, anywhere, apart, appear, appreciate, appropriate, are, aren''t, around, as, a''s, aside, ask, asking, associated, at, available, away, awfully, b, back, backward, backwards, be, became, because, become, becomes, becoming, been, before, beforehand, begin, behind, being, believe, below, beside, besides, best, better, between, beyond, both, brief, but, by, c, came, can, cannot, cant, can''t, caption, cause, causes, certain, certainly, changes, clearly, c''mon, co, co., com, come, comes, concerning, consequently, consider, considering, contain, containing, contains, corresponding, could, couldn''t, course, c''s, currently, d, dare, daren''t, definitely, described, despite, did, didn''t, different, directly, do, does, doesn''t, doing, done, don''t, down, downwards, during, e, each, edu, eg, eight, eighty, either, else, elsewhere, end, ending, enough, entirely, especially, et, etc, even, ever, evermore, every, everybody, everyone, everything, everywhere, ex, exactly, example, except, f, fairly, far, farther, few, fewer, fifth, first, five, followed, following, follows, for, forever, former, formerly, forth, forward, found, four, from, further, furthermore, g, get, gets, getting, given, gives, go, goes, going, gone, got, gotten, greetings, h, had, hadn''t, half, happens, hardly, has, hasn''t, have, haven''t, having, he, he''d, he''ll, hello, help, , hence, her, here, hereafter, hereby, herein, here''s, hereupon, hers, herself, he''s, hi, him, himself, his, hither, hopefully, how, howbeit, however, hundred, i, i''d, ie, if, ignored, i''ll, i''m, immediate, in, inasmuch, inc, inc., indeed, indicate, indicated, indicates, inner, inside, insofar, instead, into, inward, is, isn''t, it, it''d, it''ll, its, it''s, itself, i''ve, j, just, k, keep, keeps, kept, know, known, knows, l, last, lately, later, latter, latterly, least, less, lest, let, let''s, like, liked, likely, likewise, little, look, looking, looks, low, lower, ltd, m, made, mainly, make, makes, many, may, maybe, mayn''t, me, mean, meantime, meanwhile, merely, might, mightn''t, mine, minus, miss, more, moreover, most, mostly, mr, mrs, much, must, mustn''t, my, myself, n, name, namely, nd, near, nearly, necessary, need, needn''t, needs, neither, never, neverf, neverless, nevertheless, new, next, nine, ninety, no, nobody, non, none, nonetheless, noone, no-one, nor, normally, not, nothing, notwithstanding, novel, now, nowhere, o, obviously, of, off, often, oh, ok, okay, old, on, once, one, ones, one''s, only, onto, opposite, or, other, others, otherwise, ought, oughtn''t, our, ours, ourselves, out, outside, over, overall, own, p, particular, particularly, past, per, perhaps, placed, please, plus, possible, presumably, probably, provided, provides, q, que, quite, qv, r, rather, rd, re, really, reasonably, recent, recently, regarding, regardless, regards, relatively, respectively, right, round, s, said, same, saw, say, saying, says, second, secondly, , see, seeing, seem, seemed, seeming, seems, seen, self, selves, sensible, sent, serious, seriously, seven, several, shall, shan''t, she, she''d, she''ll, she''s, should, shouldn''t, since, six, so, some, somebody, someday, somehow, someone, something, sometime, sometimes, somewhat, somewhere, soon, sorry, specified, specify, specifying, still, sub, such, sup, sure, t, take, taken, taking, tell, tends, th, than, thank, thanks, thanx, that, that''ll, thats, that''s, that''ve, the, their, theirs, them, themselves, then, thence, there, thereafter, thereby, there''d, therefore, therein, there''ll, there''re, theres, there''s, thereupon, there''ve, these, they, they''d, they''ll, they''re, they''ve, thing, things, think, third, thirty, this, thorough, thoroughly, those, though, three, through, throughout, thru, thus, till, to, together, too, took, toward, towards, tried, tries, truly, try, trying, t''s, twice, two, u, un, under, underneath, undoing, unfortunately, unless, unlike, unlikely, until, unto, up, upon, upwards, us, use, used, useful, uses, using, usually, v, value, various, versus, very, via, viz, vs, w, want, wants, was, wasn''t, way, we, we''d, welcome, well, we''ll, went, were, we''re, weren''t, we''ve, what, whatever, what''ll, what''s, what''ve, when, whence, whenever, where, whereafter, whereas, whereby, wherein, where''s, whereupon, wherever, whether, which, whichever, while, whilst, whither, who, who''d, whoever, whole, who''ll, whom, whomever, who''s, whose, why, will, willing, wish, with, within, without, wonder, won''t, would, wouldn''t, x, y, yes, yet, you, you''d, you''ll, your, you''re, yours, yourself, yourselves, you''ve, z, zero","ilinks_mode":1,"ilinks_area":1,"ilinks_components":["com_content"],"ilinks_enable_cats":0,"ilinks_in_cats":0,"ilinks_case":1,"ilinks_published":1,"ilinks_nofollow":0,"ilinks_blank":0,"ilinks_limit":10,"bookmarks_mode":0,"bookmarks_area":1,"bookmarks_components":["com_content"],"bookmarks_enable_cats":0,"bookmarks_in_cats":0,"bookmarks_twitter":"","bookmarks_addthis":"","bookmarks_taf":"","bookmarks_icons_pos":2,"bookmarks_icons_txt":"Share:","bookmarks_icons_line":35,"bookmarks_published":1,"bookmarks_type":"icon","ui_cpanel":2,"ui_sef_language":0,"ui_sef_published":1,"ui_sef_used":1,"ui_sef_locked":1,"ui_sef_blocked":0,"ui_sef_cached":1,"ui_sef_date":0,"ui_sef_hits":1,"ui_sef_id":0,"ui_moved_published":1,"ui_moved_hits":1,"ui_moved_clicked":1,"ui_moved_cached":1,"ui_moved_id":1,"ui_metadata_keys":1,"ui_metadata_published":1,"ui_metadata_cached":1,"ui_metadata_id":0,"ui_sitemap_title":1,"ui_sitemap_published":1,"ui_sitemap_id":1,"ui_sitemap_parent":1,"ui_sitemap_order":1,"ui_sitemap_date":1,"ui_sitemap_frequency":1,"ui_sitemap_priority":1,"ui_sitemap_cached":1,"ui_tags_published":1,"ui_tags_ordering":1,"ui_tags_cached":1,"ui_tags_hits":1,"ui_tags_id":0,"ui_ilinks_published":1,"ui_ilinks_nofollow":1,"ui_ilinks_blank":1,"ui_ilinks_limit":1,"ui_ilinks_cached":1,"ui_ilinks_id":1,"ui_bookmarks_published":1,"ui_bookmarks_id":1}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10019, 'MijoSEF - Quick Icons', 'module', 'mod_mijosef_quickicons', '', 1, 1, 2, 0, '{"name":"MijoSEF - Quick Icons","type":"module","creationDate":"February 2013","author":"Mijosoft LLC","copyright":"(C) 2009-2013 Mijosoft LLC","authorEmail":"info@mijosoft.com","authorUrl":"mijosoft.com","version":"1.3.0","description":"This module shows MijoSEF Quick Icons on the Admin area Home Page. Publish in \\"icon\\" position.","group":""}', '{"mijosef_version":"1","mijosef_configuration":"0","mijosef_extensions":"0","mijosef_urls":"1","mijosef_metadata":"1","mijosef_sitemap":"1","mijosef_tags":"1","mijosef_ilinks":"0","mijosef_bookmarks":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10020, 'System - MijoSEF', 'plugin', 'mijosef', 'system', 0, 1, 1, 0, '{"name":"System - MijoSEF","type":"plugin","creationDate":"February 2013","author":"Mijosoft LLC","copyright":"(C) 2009-2013 Mijosoft LLC","authorEmail":"info@mijosoft.com","authorUrl":"mijosoft.com","version":"1.3.0","description":"Provides a custom URL rewriting class.","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10021, 'System - MijoSEF Meta Manager (Content)', 'plugin', 'mijosefmetacontent', 'system', 0, 1, 1, 0, '{"name":"System - MijoSEF Meta Manager (Content)","type":"plugin","creationDate":"February 2013","author":"Mijosoft LLC","copyright":"(C) 2009-2013 Mijosoft LLC","authorEmail":"info@mijosoft.com","authorUrl":"mijosoft.com","version":"1.3.0","description":"MijoSEF Meta Manager plugin for Content (Articles) component.","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10022, 'rsfirewall', 'component', 'com_rsfirewall', '', 1, 1, 0, 0, '{"name":"RSFirewall!","type":"component","creationDate":"October 2012","author":"RSJoomla!","copyright":"(C) 2009-2013 www.rsjoomla.com","authorEmail":"support@rsjoomla.com","authorUrl":"www.rsjoomla.com","version":"1.4.0 R49","description":"COM_RSFIREWALL_INSTALL_DESC","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10023, 'System - RSFirewall! Active Scanner', 'plugin', 'rsfirewall', 'system', 0, 1, 1, 0, '{"name":"System - RSFirewall! Active Scanner","type":"plugin","creationDate":"October 2012","author":"RSJoomla!","copyright":"(C) 2009-2012 www.rsjoomla.com","authorEmail":"support@rsjoomla.com","authorUrl":"www.rsjoomla.com","version":"1.4.0","description":"PLG_SYSTEM_RSFIREWALL_DESC","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', -999, 0),
(10024, 'RSFirewall! Control Panel Module', 'module', 'mod_rsfirewall', '', 1, 1, 2, 0, '{"name":"RSFirewall! Control Panel Module","type":"module","creationDate":"October 2012","author":"RSJoomla!","copyright":"(C) 2009-2012 www.rsjoomla.com","authorEmail":"support@rsjoomla.com","authorUrl":"www.rsjoomla.com","version":"1.4.0","description":"MOD_RSFIREWALL_DESC","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10025, 'akeeba', 'component', 'com_akeeba', '', 1, 1, 0, 0, '{"name":"Akeeba","type":"component","creationDate":"2013-05-11","author":"Nicholas K. Dionysopoulos","copyright":"Copyright (c)2006-2012 Nicholas K. Dionysopoulos","authorEmail":"nicholas@dionysopoulos.me","authorUrl":"http:\\/\\/www.akeebabackup.com","version":"3.7.7","description":"Akeeba Backup Pro - Full Joomla! site backup solution, Professional Edition","group":""}', '{"frontend_enable":"0","frontend_secret_word":"","frontend_email_on_finish":"0","frontend_email_address":"","frontend_email_subject":"","frontend_email_body":"","siteurl":"http:\\/\\/localhost:8888\\/joomla_devel\\/caravancountry\\/","jversion":"1.6","jlibrariesdir":"\\/Applications\\/MAMP\\/htdocs\\/joomla_devel\\/caravancountry\\/libraries","lastversion":"3.7.7","angieupgrade":"1","usesvnsource":"0","update_dlid":"1e44bd347fa81d9f0304345bdf1ca9b8","minstability":"stable","displayphpwarning":"1","lastupdatecheck":"2009-01-01","updateini":"","liveupdate":"stuck=0\\nlastcheck=1395197900\\nupdatedata=\\"\\"{\\"supported\\":true,\\"stuck\\":false,\\"version\\":\\"\\",\\"date\\":\\"\\",\\"stability\\":\\"\\",\\"downloadURL\\":\\"\\",\\"infoURL\\":\\"\\",\\"releasenotes\\":\\"\\"}\\"\\"\\n\\n[update]\\nstuck=0\\nlastcheck=1395376123\\nupdatedata=\\"\\"{\\\\\\"supported\\\\\\":true,\\\\\\"stuck\\\\\\":false,\\\\\\"version\\\\\\":\\\\\\"\\\\\\",\\\\\\"date\\\\\\":\\\\\\"\\\\\\",\\\\\\"stability\\\\\\":\\\\\\"\\\\\\",\\\\\\"downloadURL\\\\\\":\\\\\\"\\\\\\",\\\\\\"infoURL\\\\\\":\\\\\\"\\\\\\",\\\\\\"releasenotes\\\\\\":\\\\\\"\\\\\\"}\\"\\"","useencryption":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10026, 'MOD_AKADMIN_TITLE', 'module', 'mod_akadmin', '', 1, 1, 2, 0, '{"name":"MOD_AKADMIN_TITLE","type":"module","creationDate":"2013-05-11","author":"Nicholas K. Dionysopoulos","copyright":"Copyright (c)2009-2013 Nicholas K. Dionysopoulos","authorEmail":"nicholas@dionysopoulos.me","authorUrl":"http:\\/\\/www.akeebabackup.com","version":"3.7.7","description":"MOD_AKADMIN_XML_DESCRIPTION","group":""}', '{"enablewarning":"1","warnfailed":"1","maxbackupperiod":"24"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10027, 'PLG_SYSTEM_AKLAZY_TITLE', 'plugin', 'aklazy', 'system', 0, 0, 1, 0, '{"name":"PLG_SYSTEM_AKLAZY_TITLE","type":"plugin","creationDate":"2013-03-08","author":"Nicholas K. Dionysopoulos","copyright":"Copyright (c)2010-2013 Nicholas K. Dionysopoulos","authorEmail":"nicholas@dionysopoulos.me","authorUrl":"http:\\/\\/www.akeebabackup.com","version":"3.7.GOODBYE","description":"THIS PLUGIN IS NOT SUPPORTED SINCE MAY 2011. We warned our users that it would be removed. Here we are now. In this version it has been modified to do ABSOLUTELY NOTHING. It will be completely removed in Akeeba Backup 3.9.","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10028, 'PLG_SYSTEM_AKEEBAUPDATECHECK_TITLE', 'plugin', 'akeebaupdatecheck', 'system', 0, 0, 1, 0, '{"name":"PLG_SYSTEM_AKEEBAUPDATECHECK_TITLE","type":"plugin","creationDate":"2011-05-26","author":"Nicholas K. Dionysopoulos","copyright":"Copyright (c)2009-2013 Nicholas K. Dionysopoulos","authorEmail":"nicholas@dionysopoulos.me","authorUrl":"http:\\/\\/www.akeebabackup.com","version":"1.1","description":"PLG_AKEEBAUPDATECHECK_DESCRIPTION","group":""}', '{"language_override":"","email":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10029, 'PLG_SRP_TITLE', 'plugin', 'srp', 'system', 0, 1, 1, 0, '{"name":"PLG_SRP_TITLE","type":"plugin","creationDate":"2013-05-11","author":"Nicholas K. Dionysopoulos","copyright":"Copyright (c)2011 Nicholas K. Dionysopoulos","authorEmail":"nicholas@dionysopoulos.me","authorUrl":"http:\\/\\/www.akeebabackup.com","version":"3.7.7","description":"PLG_SRP_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10030, 'System - One Click Action', 'plugin', 'oneclickaction', 'system', 0, 0, 1, 0, '{"name":"System - One Click Action","type":"plugin","creationDate":"2011-05-26","author":"Nicholas K. Dionysopoulos \\/ AkeebaBackup.com","copyright":"Copyright (c)2011-2013 Nicholas K. Dionysopoulos","authorEmail":"nicholas@dionysopoulos.me","authorUrl":"http:\\/\\/www.akeebabackup.com","version":"2.1","description":"PLG_ONCECLICK_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10031, 'PLG_JMONITORING_AKEEBABACKUP_TITLE', 'plugin', 'akeebabackup', 'jmonitoring', 0, 1, 1, 0, '{"name":"PLG_JMONITORING_AKEEBABACKUP_TITLE","type":"plugin","creationDate":"May 2012","author":"Nicholas K. Dionysopoulos \\/ AkeebaBackup.com","copyright":"","authorEmail":"nicholas@dionysopoulos.me","authorUrl":"http:\\/\\/www.akeebabackup.com","version":"1.0","description":"PLG_JMONITORING_AKEEBABACKUP_DESCRIPTION","group":""}', '{"maxbackupperiod":"24"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10032, 'plg_quickicon_akeebabackup', 'plugin', 'akeebabackup', 'quickicon', 0, 1, 1, 0, '{"name":"plg_quickicon_akeebabackup","type":"plugin","creationDate":"2012-09-26","author":"Nicholas K. Dionysopoulos","copyright":"Copyright (c)2012 Nicholas K. Dionysopoulos","authorEmail":"nicholas@akeebabackup.com","authorUrl":"http:\\/\\/www.akeebabackup.com","version":"1.0","description":"PLG_QUICKICON_AKEEBABACKUP_XML_DESCRIPTION","group":""}', '{"context":"mod_quickicon","enablewarning":"1","warnfailed":"1","maxbackupperiod":"24"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10033, 'FOF', 'library', 'lib_fof', '', 0, 1, 1, 0, '{"name":"FOF","type":"library","creationDate":"2013-05-11","author":"Nicholas K. Dionysopoulos \\/ Akeeba Ltd","copyright":"(C)2011-2013 Nicholas K. Dionysopoulos","authorEmail":"nicholas@akeebabackup.com","authorUrl":"https:\\/\\/www.akeebabackup.com","version":"2.1.a1","description":"Framework-on-Framework (FOF) - A rapid component development framework for Joomla!","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10034, 'AkeebaStrapper', 'file', 'files_strapper', '', 0, 1, 0, 0, '{"name":"AkeebaStrapper","type":"file","creationDate":"July 2012","author":"Nicholas K. Dionysopoulos","copyright":"(C) 2012-2013 Akeeba Ltd.","authorEmail":"nicholas@dionysopoulos.me","authorUrl":"https:\\/\\/www.akeebabackup.com","version":"1.0.0","description":"Namespaced jQuery, jQuery UI and Bootstrap for Akeeba products.","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `i4aj7_extensions` (`extension_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `manifest_cache`, `params`, `custom_data`, `system_data`, `checked_out`, `checked_out_time`, `ordering`, `state`) VALUES
(10035, 'COM_NONUMBERMANAGER', 'component', 'com_nonumbermanager', '', 1, 1, 0, 0, '{"name":"COM_NONUMBERMANAGER","type":"component","creationDate":"November 2013","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2013 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"4.2.8","description":"COM_NONUMBERMANAGER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10039, 'PLG_SYSTEM_ARTICLESANYWHERE', 'plugin', 'articlesanywhere', 'system', 0, 1, 1, 0, '{"name":"PLG_SYSTEM_ARTICLESANYWHERE","type":"plugin","creationDate":"February 2014","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2014 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.5.0FREE","description":"PLG_SYSTEM_ARTICLESANYWHERE_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10040, 'PLG_EDITORS-XTD_ARTICLESANYWHERE', 'plugin', 'articlesanywhere', 'editors-xtd', 0, 1, 1, 0, '{"name":"PLG_EDITORS-XTD_ARTICLESANYWHERE","type":"plugin","creationDate":"February 2014","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2014 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.5.0FREE","description":"PLG_EDITORS-XTD_ARTICLESANYWHERE_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10042, 'PLG_SYSTEM_BETTERPREVIEW', 'plugin', 'betterpreview', 'system', 0, 1, 1, 0, '{"name":"PLG_SYSTEM_BETTERPREVIEW","type":"plugin","creationDate":"February 2014","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2014 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.2.1FREE","description":"PLG_SYSTEM_BETTERPREVIEW_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', -1, 0),
(10043, 'PLG_EDITORS-XTD_BETTERPREVIEW', 'plugin', 'betterpreview', 'editors-xtd', 0, 1, 1, 0, '{"name":"PLG_EDITORS-XTD_BETTERPREVIEW","type":"plugin","creationDate":"February 2014","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2014 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.2.1FREE","description":"PLG_EDITORS-XTD_BETTERPREVIEW_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10045, 'PLG_SYSTEM_CACHECLEANER', 'plugin', 'cachecleaner', 'system', 0, 1, 1, 0, '{"name":"PLG_SYSTEM_CACHECLEANER","type":"plugin","creationDate":"March 2014","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2014 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.3.4FREE","description":"PLG_SYSTEM_CACHECLEANER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10046, 'MOD_CACHECLEANER', 'module', 'mod_cachecleaner', '', 1, 1, 3, 0, '{"name":"MOD_CACHECLEANER","type":"module","creationDate":"March 2014","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2014 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.3.4FREE","description":"MOD_CACHECLEANER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10048, 'System - Admin Branding Reloaded', 'plugin', 'adminbrandingreloaded', 'system', 0, 1, 1, 0, '{"name":"System - Admin Branding Reloaded","type":"plugin","creationDate":"10.10.2012","author":"Sabuj Kundu","copyright":"Copyright (C) 2011 codeboxr.com. All rights reserved.","authorEmail":"sabuj@codeboxr.com","authorUrl":"http:\\/\\/codeboxr.com","version":"1.5","description":"Admin Branding for Joomla3.0.","group":""}', '{"hidelogo":"1","showslogo":"1","customlogo":"images\\/admin\\/earthlink-design.png","customlogow":"150","customlogoh":"50","headerheight":"36","usebrandlogo":"0","brandlogo":"","brandlogow":"","brandlogoh":"20","headrchnge":"1","headerbg":"#184a7d","headrgrad":"1","headergradstart":"#17568c","headergradend":"#1a3867","titleleftmargin":"0","showcllogo":"1","customlogologin":"images\\/admin\\/ED-Admin-Logo.png","customlogologinh":"75","lfootericon":"1","lbodycolor":"0","lbodycolorval":"#e0dedf","lbodyimage":"1","lbodyimageval":"images\\/admin\\/ed-admin-background.jpg","lbodyimagetile":"0","lbodyimageposx":"center","lbodyimageposy":"center"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10049, 'JM Slideshow Responsive', 'module', 'mod_jmslideshow', '', 0, 1, 0, 0, '{"name":"JM Slideshow Responsive","type":"module","creationDate":"Mar 2014","author":"JoomlaMan.com","copyright":"\\u00a9 2012-2014 JoomlaMan.com","authorEmail":"info@joomlaman.com","authorUrl":"www.joomlaman.com","version":"2.0.2","description":"\\n        \\n    ","group":""}', '{"jmslideshow_responsive":"1","jmslideshow_width":"700","jmslideshow_image_width":"700","jmslideshow_image_height":"400","jmslideshow_image_style":"1","moduleclass_sfx":"","slider_source":"0","jmslideshow_k2_categories":"","jmslideshow_hikashop_categories":"","jmslideshow_image_source":"0","jmslideshow_article_image_source":"3","jmslideshow_ordering":"0","jmslideshow_orderby":"0","jmslideshow_count":"5","jmslideshow_layout":"default","jmslideshow_effect":"fade","jmslideshow_speed":"500","jmslideshow_auto":"1","jmslideshow_timeout":"5000","jmslideshow_caption_position":"topleft","jmslideshow_caption_left":"30","jmslideshow_caption_top":"30","jmslideshow_caption_right":"30","jmslideshow_caption_bottom":"30","jmslideshow_caption_width":"500","jmslideshow_desc_length":"150","jmslideshow_desc_html":"","jmslideshow_readmore_text":"Read more","jmslideshow_show_nav_buttons":"1","jmslideshow_show_pager":"1","jmslideshow_pager_type":"1","jmslideshow_pager_position":"bottomleft","jmslideshow_image_thumbnail_width":"100","jmslideshow_image_thumbnail_height":"65","jmslideshow_pager_left":"30","jmslideshow_pager_top":"30","jmslideshow_pager_right":"30","jmslideshow_pager_bottom":"30","jmslideshow_include_jquery":"2","jmslideshow_about":"MOD_JMSLIDESHOW_ABOUT_TAB_DESC","jmslideshow_update":"UPDATE will be revealed later!"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10051, 'com_advancedmodules', 'component', 'com_advancedmodules', '', 1, 1, 0, 0, '{"name":"com_advancedmodules","type":"component","creationDate":"December 2013","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2013 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"4.8.3FREE","description":"COM_ADVANCEDMODULES_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10052, 'plg_system_advancedmodules', 'plugin', 'advancedmodules', 'system', 0, 1, 1, 0, '{"name":"plg_system_advancedmodules","type":"plugin","creationDate":"December 2013","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2013 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"4.8.3FREE","description":"PLG_SYSTEM_ADVANCEDMODULES_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10054, 'plg_editors_jce', 'plugin', 'jce', 'editors', 0, 1, 1, 0, '{"name":"plg_editors_jce","type":"plugin","creationDate":"12 December 2013","author":"Ryan Demmer","copyright":"2006-2010 Ryan Demmer","authorEmail":"info@joomlacontenteditor.net","authorUrl":"http:\\/\\/www.joomlacontenteditor.net","version":"2.3.4.4","description":"WF_EDITOR_PLUGIN_DESC","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10055, 'plg_quickicon_jcefilebrowser', 'plugin', 'jcefilebrowser', 'quickicon', 0, 1, 1, 0, '{"name":"plg_quickicon_jcefilebrowser","type":"plugin","creationDate":"12 December 2013","author":"Ryan Demmer","copyright":"Copyright (C) 2006 - 2013 Ryan Demmer. All rights reserved","authorEmail":"@@email@@","authorUrl":"www.joomalcontenteditor.net","version":"2.3.4.4","description":"PLG_QUICKICON_JCEFILEBROWSER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10056, 'jce', 'component', 'com_jce', '', 1, 1, 0, 0, '{"name":"JCE","type":"component","creationDate":"12 December 2013","author":"Ryan Demmer","copyright":"Copyright (C) 2006 - 2013 Ryan Demmer. All rights reserved","authorEmail":"info@joomlacontenteditor.net","authorUrl":"www.joomlacontenteditor.net","version":"2.3.4.4","description":"WF_ADMIN_DESC","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10057, 'MOD_ADDTOMENU', 'module', 'mod_addtomenu', '', 1, 1, 3, 0, '{"name":"MOD_ADDTOMENU","type":"module","creationDate":"February 2014","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2014 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.0.5FREE","description":"MOD_ADDTOMENU_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10058, 'PLG_SYSTEM_NNFRAMEWORK', 'plugin', 'nnframework', 'system', 0, 1, 1, 0, '{"name":"PLG_SYSTEM_NNFRAMEWORK","type":"plugin","creationDate":"March 2014","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2014 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"14.3.6","description":"PLG_SYSTEM_NNFRAMEWORK_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_filters`
--

CREATE TABLE `i4aj7_finder_filters` (
  `filter_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL,
  `created_by_alias` varchar(255) NOT NULL,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `map_count` int(10) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `params` mediumtext,
  PRIMARY KEY (`filter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links`
--

CREATE TABLE `i4aj7_finder_links` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `indexdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `md5sum` varchar(32) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `state` int(5) DEFAULT '1',
  `access` int(5) DEFAULT '0',
  `language` varchar(8) NOT NULL,
  `publish_start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `list_price` double unsigned NOT NULL DEFAULT '0',
  `sale_price` double unsigned NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL,
  `object` mediumblob NOT NULL,
  PRIMARY KEY (`link_id`),
  KEY `idx_type` (`type_id`),
  KEY `idx_title` (`title`),
  KEY `idx_md5` (`md5sum`),
  KEY `idx_url` (`url`(75)),
  KEY `idx_published_list` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`list_price`),
  KEY `idx_published_sale` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`sale_price`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_terms0`
--

CREATE TABLE `i4aj7_finder_links_terms0` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_terms1`
--

CREATE TABLE `i4aj7_finder_links_terms1` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_terms2`
--

CREATE TABLE `i4aj7_finder_links_terms2` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_terms3`
--

CREATE TABLE `i4aj7_finder_links_terms3` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_terms4`
--

CREATE TABLE `i4aj7_finder_links_terms4` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_terms5`
--

CREATE TABLE `i4aj7_finder_links_terms5` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_terms6`
--

CREATE TABLE `i4aj7_finder_links_terms6` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_terms7`
--

CREATE TABLE `i4aj7_finder_links_terms7` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_terms8`
--

CREATE TABLE `i4aj7_finder_links_terms8` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_terms9`
--

CREATE TABLE `i4aj7_finder_links_terms9` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_termsa`
--

CREATE TABLE `i4aj7_finder_links_termsa` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_termsb`
--

CREATE TABLE `i4aj7_finder_links_termsb` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_termsc`
--

CREATE TABLE `i4aj7_finder_links_termsc` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_termsd`
--

CREATE TABLE `i4aj7_finder_links_termsd` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_termse`
--

CREATE TABLE `i4aj7_finder_links_termse` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_links_termsf`
--

CREATE TABLE `i4aj7_finder_links_termsf` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_taxonomy`
--

CREATE TABLE `i4aj7_finder_taxonomy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `state` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `access` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `state` (`state`),
  KEY `ordering` (`ordering`),
  KEY `access` (`access`),
  KEY `idx_parent_published` (`parent_id`,`state`,`access`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_taxonomy_map`
--

CREATE TABLE `i4aj7_finder_taxonomy_map` (
  `link_id` int(10) unsigned NOT NULL,
  `node_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`node_id`),
  KEY `link_id` (`link_id`),
  KEY `node_id` (`node_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_terms`
--

CREATE TABLE `i4aj7_finder_terms` (
  `term_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '0',
  `soundex` varchar(75) NOT NULL,
  `links` int(10) NOT NULL DEFAULT '0',
  `language` char(3) NOT NULL DEFAULT '',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `idx_term` (`term`),
  KEY `idx_term_phrase` (`term`,`phrase`),
  KEY `idx_stem_phrase` (`stem`,`phrase`),
  KEY `idx_soundex_phrase` (`soundex`,`phrase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_terms_common`
--

CREATE TABLE `i4aj7_finder_terms_common` (
  `term` varchar(75) NOT NULL,
  `language` varchar(3) NOT NULL,
  KEY `idx_word_lang` (`term`,`language`),
  KEY `idx_lang` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i4aj7_finder_terms_common`
--

INSERT INTO `i4aj7_finder_terms_common` (`term`, `language`) VALUES
('a', 'en'),
('about', 'en'),
('after', 'en'),
('ago', 'en'),
('all', 'en'),
('am', 'en'),
('an', 'en'),
('and', 'en'),
('ani', 'en'),
('any', 'en'),
('are', 'en'),
('aren''t', 'en'),
('as', 'en'),
('at', 'en'),
('be', 'en'),
('but', 'en'),
('by', 'en'),
('for', 'en'),
('from', 'en'),
('get', 'en'),
('go', 'en'),
('how', 'en'),
('if', 'en'),
('in', 'en'),
('into', 'en'),
('is', 'en'),
('isn''t', 'en'),
('it', 'en'),
('its', 'en'),
('me', 'en'),
('more', 'en'),
('most', 'en'),
('must', 'en'),
('my', 'en'),
('new', 'en'),
('no', 'en'),
('none', 'en'),
('not', 'en'),
('noth', 'en'),
('nothing', 'en'),
('of', 'en'),
('off', 'en'),
('often', 'en'),
('old', 'en'),
('on', 'en'),
('onc', 'en'),
('once', 'en'),
('onli', 'en'),
('only', 'en'),
('or', 'en'),
('other', 'en'),
('our', 'en'),
('ours', 'en'),
('out', 'en'),
('over', 'en'),
('page', 'en'),
('she', 'en'),
('should', 'en'),
('small', 'en'),
('so', 'en'),
('some', 'en'),
('than', 'en'),
('thank', 'en'),
('that', 'en'),
('the', 'en'),
('their', 'en'),
('theirs', 'en'),
('them', 'en'),
('then', 'en'),
('there', 'en'),
('these', 'en'),
('they', 'en'),
('this', 'en'),
('those', 'en'),
('thus', 'en'),
('time', 'en'),
('times', 'en'),
('to', 'en'),
('too', 'en'),
('true', 'en'),
('under', 'en'),
('until', 'en'),
('up', 'en'),
('upon', 'en'),
('use', 'en'),
('user', 'en'),
('users', 'en'),
('veri', 'en'),
('version', 'en'),
('very', 'en'),
('via', 'en'),
('want', 'en'),
('was', 'en'),
('way', 'en'),
('were', 'en'),
('what', 'en'),
('when', 'en'),
('where', 'en'),
('whi', 'en'),
('which', 'en'),
('who', 'en'),
('whom', 'en'),
('whose', 'en'),
('why', 'en'),
('wide', 'en'),
('will', 'en'),
('with', 'en'),
('within', 'en'),
('without', 'en'),
('would', 'en'),
('yes', 'en'),
('yet', 'en'),
('you', 'en'),
('your', 'en'),
('yours', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_tokens`
--

CREATE TABLE `i4aj7_finder_tokens` (
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '1',
  `context` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `language` char(3) NOT NULL DEFAULT '',
  KEY `idx_word` (`term`),
  KEY `idx_context` (`context`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_tokens_aggregate`
--

CREATE TABLE `i4aj7_finder_tokens_aggregate` (
  `term_id` int(10) unsigned NOT NULL,
  `map_suffix` char(1) NOT NULL,
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `term_weight` float unsigned NOT NULL,
  `context` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `context_weight` float unsigned NOT NULL,
  `total_weight` float unsigned NOT NULL,
  `language` char(3) NOT NULL DEFAULT '',
  KEY `token` (`term`),
  KEY `keyword_id` (`term_id`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_finder_types`
--

CREATE TABLE `i4aj7_finder_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `mime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_languages`
--

CREATE TABLE `i4aj7_languages` (
  `lang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang_code` char(7) NOT NULL,
  `title` varchar(50) NOT NULL,
  `title_native` varchar(50) NOT NULL,
  `sef` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(512) NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `sitename` varchar(1024) NOT NULL DEFAULT '',
  `published` int(11) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lang_id`),
  UNIQUE KEY `idx_sef` (`sef`),
  UNIQUE KEY `idx_image` (`image`),
  UNIQUE KEY `idx_langcode` (`lang_code`),
  KEY `idx_access` (`access`),
  KEY `idx_ordering` (`ordering`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `i4aj7_languages`
--

INSERT INTO `i4aj7_languages` (`lang_id`, `lang_code`, `title`, `title_native`, `sef`, `image`, `description`, `metakey`, `metadesc`, `sitename`, `published`, `access`, `ordering`) VALUES
(1, 'en-GB', 'English (UK)', 'English (UK)', 'en', 'en', '', '', '', '', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_menu`
--

CREATE TABLE `i4aj7_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(24) NOT NULL COMMENT 'The type of menu this item belongs to. FK to #__menu_types.menutype',
  `title` varchar(255) NOT NULL COMMENT 'The display title of the menu item.',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'The SEF alias of the menu item.',
  `note` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(1024) NOT NULL COMMENT 'The computed path of the menu item based on the alias field.',
  `link` varchar(1024) NOT NULL COMMENT 'The actually link the menu item refers to.',
  `type` varchar(16) NOT NULL COMMENT 'The type of link: Component, URL, Alias, Separator',
  `published` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The published state of the menu link.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'The parent menu item in the menu tree.',
  `level` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The relative level in the tree.',
  `component_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to #__extensions.id',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to #__users.id',
  `checked_out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'The time the menu item was checked out.',
  `browserNav` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The click behaviour of the link.',
  `access` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The access level required to view the menu item.',
  `img` varchar(255) NOT NULL COMMENT 'The image of the menu item.',
  `template_style_id` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL COMMENT 'JSON encoded data for the menu item.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `home` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Indicates if this menu item is the home or default page.',
  `language` char(7) NOT NULL DEFAULT '',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_client_id_parent_id_alias_language` (`client_id`,`parent_id`,`alias`,`language`),
  KEY `idx_componentid` (`component_id`,`menutype`,`published`,`access`),
  KEY `idx_menutype` (`menutype`),
  KEY `idx_left_right` (`lft`,`rgt`),
  KEY `idx_alias` (`alias`),
  KEY `idx_path` (`path`(255)),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=159 ;

--
-- Dumping data for table `i4aj7_menu`
--

INSERT INTO `i4aj7_menu` (`id`, `menutype`, `title`, `alias`, `note`, `path`, `link`, `type`, `published`, `parent_id`, `level`, `component_id`, `checked_out`, `checked_out_time`, `browserNav`, `access`, `img`, `template_style_id`, `params`, `lft`, `rgt`, `home`, `language`, `client_id`) VALUES
(1, '', 'Menu_Item_Root', 'root', '', '', '', '', 1, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 151, 0, '*', 0),
(2, 'mainmenu', 'History', 'history', '', 'history', 'index.php?option=com_content&view=article&id=3', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_tags":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":1,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 3, 4, 0, '*', 0),
(3, 'mainmenu', 'New caravans', 'new-caravans', '', 'new-caravans', 'index.php?option=com_content&view=article&id=4', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_tags":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":1,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 5, 14, 0, '*', 0),
(4, 'mainmenu', 'Pre-owned caravans-old', 'pre-owned-caravans-old', '', 'pre-owned-caravans-old', 'index.php?option=com_content&view=article&id=5', 'component', 0, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_noauth":"","show_title":"","link_titles":"","show_intro":"","show_section":"","link_section":"","show_category":"","link_category":"","show_author":"","show_create_date":"","show_modify_date":"","show_item_navigation":"","show_readmore":"","show_vote":"","show_icons":"","show_pdf_icon":"","show_print_icon":"","show_email_icon":"","show_hits":"","feed_summary":"","page_title":"","show_page_title":"1","pageclass_sfx":"","menu_image":null,"secure":"0","show_page_heading":"1"}', 21, 22, 0, '*', 0),
(5, 'mainmenu', 'Our services', 'our-services', '', 'our-services', 'index.php?option=com_content&view=article&id=6', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_tags":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":1,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 17, 18, 0, '*', 0),
(6, 'mainmenu', 'Contact us', 'contact-us', '', 'contact-us', 'index.php?option=com_content&view=article&id=7', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_tags":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":1,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 19, 20, 0, '*', 0),
(7, 'mainmenu', 'Regal Caravans', 'regal-caravans', '', 'new-caravans/regal-caravans', 'index.php?option=com_content&view=article&id=8', 'component', 1, 3, 2, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_tags":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":1,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 6, 7, 0, '*', 0),
(8, 'mainmenu', 'Coronet Caravans', 'coronet-caravans', '', 'new-caravans/coronet-caravans', 'index.php?option=com_content&view=article&id=9', 'component', 1, 3, 2, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_tags":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":1,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 8, 9, 0, '*', 0),
(9, 'mainmenu', 'submenu item', 'submenu-item', '', 'new-caravans/submenu-item', 'index.php?option=com_content&view=article&id=2', 'component', 0, 3, 2, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_noauth":"","show_title":"","link_titles":"","show_intro":"","show_section":"","link_section":"","show_category":"","link_category":"","show_author":"","show_create_date":"","show_modify_date":"","show_item_navigation":"","show_readmore":"","show_vote":"","show_icons":"","show_pdf_icon":"","show_print_icon":"","show_email_icon":"","show_hits":"","feed_summary":"","page_title":"","show_page_title":"1","pageclass_sfx":"","menu_image":null,"secure":"0","show_page_heading":"1"}', 10, 11, 0, '*', 0),
(10, 'HiddenMenu', 'The Prince', 'the-prince', '', 'the-prince', 'index.php?option=com_content&view=article&id=10', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 27, 28, 0, '*', 0),
(11, 'HiddenMenu', 'The Carrington', 'the-carrington', '', 'the-carrington', 'index.php?option=com_content&view=article&id=11', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 25, 26, 0, '*', 0),
(12, 'HiddenMenu', 'The Farren', 'the-farren', '', 'the-farren', 'index.php?option=com_content&view=article&id=12', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '', 23, 24, 0, '*', 0),
(13, 'mainmenu', 'Pre-owned caravans', 'pre-owned-caravans', '', 'pre-owned-caravans', 'index.php?option=com_content&view=article&id=14', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_tags":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":1,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 15, 16, 0, '*', 0),
(14, 'mainmenu', 'Caravans In Stock', 'caravans-in-stock', '', 'new-caravans/caravans-in-stock', 'index.php?option=com_content&view=article&id=15', 'component', 1, 3, 2, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_tags":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 12, 13, 0, '*', 0),
(16, 'menu', 'com_banners', 'Banners', '', 'Banners', 'index.php?option=com_banners', 'component', 0, 1, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners', 0, '', 29, 38, 0, '*', 1),
(17, 'menu', 'com_banners', 'Banners', '', 'Banners/Banners', 'index.php?option=com_banners', 'component', 0, 16, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners', 0, '', 30, 31, 0, '*', 1),
(18, 'menu', 'com_banners_categories', 'Categories', '', 'Banners/Categories', 'index.php?option=com_categories&extension=com_banners', 'component', 0, 16, 2, 6, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-cat', 0, '', 32, 33, 0, '*', 1),
(19, 'menu', 'com_banners_clients', 'Clients', '', 'Banners/Clients', 'index.php?option=com_banners&view=clients', 'component', 0, 16, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-clients', 0, '', 34, 35, 0, '*', 1),
(20, 'menu', 'com_banners_tracks', 'Tracks', '', 'Banners/Tracks', 'index.php?option=com_banners&view=tracks', 'component', 0, 16, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-tracks', 0, '', 36, 37, 0, '*', 1),
(21, 'menu', 'com_contact', 'Contacts', '', 'Contacts', 'index.php?option=com_contact', 'component', 0, 1, 1, 8, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact', 0, '', 39, 44, 0, '*', 1),
(22, 'menu', 'com_contact', 'Contacts', '', 'Contacts/Contacts', 'index.php?option=com_contact', 'component', 0, 21, 2, 8, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact', 0, '', 40, 41, 0, '*', 1),
(23, 'menu', 'com_contact_categories', 'Categories', '', 'Contacts/Categories', 'index.php?option=com_categories&extension=com_contact', 'component', 0, 21, 2, 6, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact-cat', 0, '', 42, 43, 0, '*', 1),
(24, 'menu', 'com_messages', 'Messaging', '', 'Messaging', 'index.php?option=com_messages', 'component', 0, 1, 1, 15, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages', 0, '', 45, 50, 0, '*', 1),
(25, 'menu', 'com_messages_add', 'New Private Message', '', 'Messaging/New Private Message', 'index.php?option=com_messages&task=message.add', 'component', 0, 24, 2, 15, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages-add', 0, '', 46, 47, 0, '*', 1),
(26, 'menu', 'com_messages_read', 'Read Private Message', '', 'Messaging/Read Private Message', 'index.php?option=com_messages', 'component', 0, 24, 2, 15, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages-read', 0, '', 48, 49, 0, '*', 1),
(27, 'menu', 'com_newsfeeds', 'News Feeds', '', 'News Feeds', 'index.php?option=com_newsfeeds', 'component', 0, 1, 1, 17, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds', 0, '', 51, 56, 0, '*', 1),
(28, 'menu', 'com_newsfeeds_feeds', 'Feeds', '', 'News Feeds/Feeds', 'index.php?option=com_newsfeeds', 'component', 0, 27, 2, 17, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds', 0, '', 52, 53, 0, '*', 1),
(29, 'menu', 'com_newsfeeds_categories', 'Categories', '', 'News Feeds/Categories', 'index.php?option=com_categories&extension=com_newsfeeds', 'component', 0, 27, 2, 6, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds-cat', 0, '', 54, 55, 0, '*', 1),
(30, 'menu', 'com_redirect', 'Redirect', '', 'Redirect', 'index.php?option=com_redirect', 'component', 0, 1, 1, 24, 0, '0000-00-00 00:00:00', 0, 0, 'class:redirect', 0, '', 57, 58, 0, '*', 1),
(31, 'menu', 'com_search', 'Basic Search', '', 'Basic Search', 'index.php?option=com_search', 'component', 0, 1, 1, 19, 0, '0000-00-00 00:00:00', 0, 0, 'class:search', 0, '', 59, 60, 0, '*', 1),
(32, 'menu', 'com_weblinks', 'Weblinks', '', 'Weblinks', 'index.php?option=com_weblinks', 'component', 0, 1, 1, 21, 0, '0000-00-00 00:00:00', 0, 0, 'class:weblinks', 0, '', 61, 66, 0, '*', 1),
(33, 'menu', 'com_weblinks_links', 'Links', '', 'Weblinks/Links', 'index.php?option=com_weblinks', 'component', 0, 32, 2, 21, 0, '0000-00-00 00:00:00', 0, 0, 'class:weblinks', 0, '', 62, 63, 0, '*', 1),
(34, 'menu', 'com_weblinks_categories', 'Categories', '', 'Weblinks/Categories', 'index.php?option=com_categories&extension=com_weblinks', 'component', 0, 32, 2, 6, 0, '0000-00-00 00:00:00', 0, 0, 'class:weblinks-cat', 0, '', 64, 65, 0, '*', 1),
(35, 'menu', 'com_finder', 'Smart Search', '', 'Smart Search', 'index.php?option=com_finder', 'component', 0, 1, 1, 27, 0, '0000-00-00 00:00:00', 0, 0, 'class:finder', 0, '', 67, 68, 0, '*', 1),
(36, 'menu', 'com_joomlaupdate', 'Joomla! Update', '', 'Joomla! Update', 'index.php?option=com_joomlaupdate', 'component', 0, 1, 1, 28, 0, '0000-00-00 00:00:00', 0, 0, 'class:joomlaupdate', 0, '', 69, 70, 0, '*', 1),
(37, 'main', 'com_tags', 'Tags', '', 'Tags', 'index.php?option=com_tags', 'component', 0, 1, 1, 29, 0, '0000-00-00 00:00:00', 0, 1, 'class:tags', 0, '', 71, 72, 0, '', 1),
(115, 'mainmenu', 'Home', 'home', '', 'home', 'index.php?option=com_content&view=featured', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"featured_categories":[""],"layout_type":"blog","num_leading_articles":"1","num_intro_articles":"3","num_columns":"3","num_links":"0","multi_column_order":"1","orderby_pri":"","orderby_sec":"front","order_date":"","show_pagination":"2","show_pagination_results":"1","show_title":"","link_titles":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_readmore":"","show_readmore_title":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","show_feed_link":"1","feed_summary":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":1,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 1, 2, 1, '*', 0),
(121, 'main', 'COM_CHRONOFORMS', 'com-chronoforms', '', 'com-chronoforms', 'index.php?option=com_chronoforms', 'component', 0, 1, 1, 10005, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_chronoforms/CF.png', 0, '', 73, 82, 0, '', 1),
(122, 'main', 'COM_CHRONOFORMS_FORMS_MANAGER', 'com-chronoforms-forms-manager', '', 'com-chronoforms/com-chronoforms-forms-manager', 'index.php?option=com_chronoforms', 'component', 0, 121, 2, 10005, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 74, 75, 0, '', 1),
(123, 'main', 'COM_CHRONOFORMS_WIZARD', 'com-chronoforms-wizard', '', 'com-chronoforms/com-chronoforms-wizard', 'index.php?option=com_chronoforms&task=form_wizard', 'component', 0, 121, 2, 10005, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 76, 77, 0, '', 1),
(124, 'main', 'COM_CHRONOFORMS_EASY_WIZARD', 'com-chronoforms-easy-wizard', '', 'com-chronoforms/com-chronoforms-easy-wizard', 'index.php?option=com_chronoforms&task=form_wizard&wizard_mode=easy', 'component', 0, 121, 2, 10005, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 78, 79, 0, '', 1),
(125, 'main', 'COM_CHRONOFORMS_VALIDATE', 'com-chronoforms-validate', '', 'com-chronoforms/com-chronoforms-validate', 'index.php?option=com_chronoforms&task=validatelicense', 'component', 0, 121, 2, 10005, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 80, 81, 0, '', 1),
(126, 'main', 'COM_SWMENUPRO', 'com-swmenupro', '', 'com-swmenupro', 'index.php?option=com_swmenupro', 'component', 0, 1, 1, 10009, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_swmenupro/images/swmenupro_icon.png', 0, '', 83, 84, 0, '', 1),
(127, 'main', 'COM_TWOJTOOLBOX_MENU', 'com-twojtoolbox-menu', '', 'com-twojtoolbox-menu', 'index.php?option=com_twojtoolbox', 'component', 0, 1, 1, 10012, 0, '0000-00-00 00:00:00', 0, 1, '../components/com_twojtoolbox/css/admin/twojtoolbox-16x16.png', 0, '', 85, 86, 0, '', 1),
(128, 'main', 'COM_2JGALLERY_MENU', 'com-2jgallery-menu', '', 'com-2jgallery-menu', 'index.php?option=com_2jgallery', 'component', 0, 1, 1, 10013, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_2jgallery/2jgallery_16.png', 0, '', 87, 88, 0, '', 1),
(129, 'main', 'COM_MIJOSEF', 'com-mijosef', '', 'com-mijosef', 'index.php?option=com_mijosef', 'component', 0, 1, 1, 10018, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_mijosef/assets/images/mijosef.png', 0, '', 89, 112, 0, '', 1),
(130, 'main', 'COM_COM_MIJOSEF_CPANEL', 'com-com-mijosef-cpanel', '', 'com-mijosef/com-com-mijosef-cpanel', 'index.php?option=com_mijosef', 'component', 0, 129, 2, 10018, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_mijosef/assets/images/mijosef.png', 0, '', 90, 91, 0, '', 1),
(131, 'main', 'COM_COM_MIJOSEF_CONFIG', 'com-com-mijosef-config', '', 'com-mijosef/com-com-mijosef-config', 'index.php?option=com_mijosef&controller=config&task=edit', 'component', 0, 129, 2, 10018, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_mijosef/assets/images/icon-16-config.png', 0, '', 92, 93, 0, '', 1),
(132, 'main', 'COM_COM_MIJOSEF_EXTENSIONS', 'com-com-mijosef-extensions', '', 'com-mijosef/com-com-mijosef-extensions', 'index.php?option=com_mijosef&controller=extensions&task=view', 'component', 0, 129, 2, 10018, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_mijosef/assets/images/icon-16-extensions.png', 0, '', 94, 95, 0, '', 1),
(133, 'main', 'COM_COM_MIJOSEF_URLS', 'com-com-mijosef-urls', '', 'com-mijosef/com-com-mijosef-urls', 'index.php?option=com_mijosef&controller=sefurls&task=view', 'component', 0, 129, 2, 10018, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_mijosef/assets/images/icon-16-urls.png', 0, '', 96, 97, 0, '', 1),
(134, 'main', 'COM_COM_MIJOSEF_METADATA', 'com-com-mijosef-metadata', '', 'com-mijosef/com-com-mijosef-metadata', 'index.php?option=com_mijosef&controller=metadata&task=view', 'component', 0, 129, 2, 10018, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_mijosef/assets/images/icon-16-metadata.png', 0, '', 98, 99, 0, '', 1),
(135, 'main', 'COM_COM_MIJOSEF_SITEMAP', 'com-com-mijosef-sitemap', '', 'com-mijosef/com-com-mijosef-sitemap', 'index.php?option=com_mijosef&controller=sitemap&task=view', 'component', 0, 129, 2, 10018, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_mijosef/assets/images/icon-16-sitemap.png', 0, '', 100, 101, 0, '', 1),
(136, 'main', 'COM_COM_MIJOSEF_TAGS', 'com-com-mijosef-tags', '', 'com-mijosef/com-com-mijosef-tags', 'index.php?option=com_mijosef&controller=tags&task=view', 'component', 0, 129, 2, 10018, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_mijosef/assets/images/icon-16-tags.png', 0, '', 102, 103, 0, '', 1),
(137, 'main', 'COM_COM_MIJOSEF_ILINKS', 'com-com-mijosef-ilinks', '', 'com-mijosef/com-com-mijosef-ilinks', 'index.php?option=com_mijosef&controller=ilinks&task=view', 'component', 0, 129, 2, 10018, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_mijosef/assets/images/icon-16-ilinks.png', 0, '', 104, 105, 0, '', 1),
(138, 'main', 'COM_COM_MIJOSEF_BOOKMARKS', 'com-com-mijosef-bookmarks', '', 'com-mijosef/com-com-mijosef-bookmarks', 'index.php?option=com_mijosef&controller=bookmarks&task=view', 'component', 0, 129, 2, 10018, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_mijosef/assets/images/icon-16-bookmarks.png', 0, '', 106, 107, 0, '', 1),
(139, 'main', 'COM_COM_MIJOSEF_UPGRADE', 'com-com-mijosef-upgrade', '', 'com-mijosef/com-com-mijosef-upgrade', 'index.php?option=com_mijosef&controller=upgrade&task=view', 'component', 0, 129, 2, 10018, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_mijosef/assets/images/icon-16-upgrade.png', 0, '', 108, 109, 0, '', 1),
(140, 'main', 'COM_COM_MIJOSEF_SUPPORT', 'com-com-mijosef-support', '', 'com-mijosef/com-com-mijosef-support', 'index.php?option=com_mijosef&controller=support&task=support', 'component', 0, 129, 2, 10018, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_mijosef/assets/images/icon-16-support.png', 0, '', 110, 111, 0, '', 1),
(141, 'main', 'RSFirewall', 'rsfirewall', '', 'rsfirewall', 'index.php?option=com_rsfirewall', 'component', 0, 1, 1, 10022, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_rsfirewall/assets/images/rsfirewall.gif', 0, '', 113, 132, 0, '', 1),
(142, 'main', 'COM_RSFIREWALL_OVERVIEW', 'com-rsfirewall-overview', '', 'rsfirewall/com-rsfirewall-overview', 'index.php?option=com_rsfirewall', 'component', 0, 141, 2, 10022, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 114, 115, 0, '', 1),
(143, 'main', 'COM_RSFIREWALL_SYSTEM_CHECK', 'com-rsfirewall-system-check', '', 'rsfirewall/com-rsfirewall-system-check', 'index.php?option=com_rsfirewall&view=check', 'component', 0, 141, 2, 10022, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 116, 117, 0, '', 1),
(144, 'main', 'COM_RSFIREWALL_DATABASE_CHECK', 'com-rsfirewall-database-check', '', 'rsfirewall/com-rsfirewall-database-check', 'index.php?option=com_rsfirewall&view=dbcheck', 'component', 0, 141, 2, 10022, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 118, 119, 0, '', 1),
(145, 'main', 'COM_RSFIREWALL_SYSTEM_LOGS', 'com-rsfirewall-system-logs', '', 'rsfirewall/com-rsfirewall-system-logs', 'index.php?option=com_rsfirewall&view=logs', 'component', 0, 141, 2, 10022, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 120, 121, 0, '', 1),
(146, 'main', 'COM_RSFIREWALL_FIREWALL_CONFIGURATION', 'com-rsfirewall-firewall-configuration', '', 'rsfirewall/com-rsfirewall-firewall-configuration', 'index.php?option=com_rsfirewall&view=configuration', 'component', 0, 141, 2, 10022, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 122, 123, 0, '', 1),
(147, 'main', 'COM_RSFIREWALL_LISTS', 'com-rsfirewall-lists', '', 'rsfirewall/com-rsfirewall-lists', 'index.php?option=com_rsfirewall&view=lists', 'component', 0, 141, 2, 10022, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 124, 125, 0, '', 1),
(148, 'main', 'COM_RSFIREWALL_EXCEPTIONS', 'com-rsfirewall-exceptions', '', 'rsfirewall/com-rsfirewall-exceptions', 'index.php?option=com_rsfirewall&view=exceptions', 'component', 0, 141, 2, 10022, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 126, 127, 0, '', 1),
(149, 'main', 'COM_RSFIREWALL_RSS_FEEDS_CONFIGURATION', 'com-rsfirewall-rss-feeds-configuration', '', 'rsfirewall/com-rsfirewall-rss-feeds-configuration', 'index.php?option=com_rsfirewall&view=feeds', 'component', 0, 141, 2, 10022, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 128, 129, 0, '', 1),
(150, 'main', 'COM_RSFIREWALL_UPDATES', 'com-rsfirewall-updates', '', 'rsfirewall/com-rsfirewall-updates', 'index.php?option=com_rsfirewall&view=updates', 'component', 0, 141, 2, 10022, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 130, 131, 0, '', 1),
(151, 'main', 'COM_AKEEBA', 'com-akeeba', '', 'com-akeeba', 'index.php?option=com_akeeba', 'component', 0, 1, 1, 10025, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_akeeba/icons/akeeba-16.png', 0, '', 133, 134, 0, '', 1),
(152, 'menu', 'COM_NONUMBERMANAGER', 'nonumbermanager', '', 'nonumbermanager', 'index.php?option=com_nonumbermanager', 'component', 1, 1, 1, 10035, 0, '0000-00-00 00:00:00', 0, 1, '../media/nonumbermanager/images/icon_nonumbermanager.png', 0, '', 135, 136, 0, '*', 1),
(153, 'main', 'JCE', 'jce', '', 'jce', 'index.php?option=com_jce', 'component', 0, 1, 1, 10056, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_jce/media/img/menu/logo.png', 0, '', 139, 148, 0, '', 1),
(154, 'main', 'WF_MENU_CPANEL', 'wf-menu-cpanel', '', 'jce/wf-menu-cpanel', 'index.php?option=com_jce', 'component', 0, 153, 2, 10056, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_jce/media/img/menu/jce-cpanel.png', 0, '', 140, 141, 0, '', 1),
(155, 'main', 'WF_MENU_CONFIG', 'wf-menu-config', '', 'jce/wf-menu-config', 'index.php?option=com_jce&view=config', 'component', 0, 153, 2, 10056, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_jce/media/img/menu/jce-config.png', 0, '', 142, 143, 0, '', 1),
(156, 'main', 'WF_MENU_PROFILES', 'wf-menu-profiles', '', 'jce/wf-menu-profiles', 'index.php?option=com_jce&view=profiles', 'component', 0, 153, 2, 10056, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_jce/media/img/menu/jce-profiles.png', 0, '', 144, 145, 0, '', 1),
(157, 'main', 'WF_MENU_INSTALL', 'wf-menu-install', '', 'jce/wf-menu-install', 'index.php?option=com_jce&view=installer', 'component', 0, 153, 2, 10056, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_jce/media/img/menu/jce-install.png', 0, '', 146, 147, 0, '', 1),
(158, 'HiddenMenu', ' ET2 Series Extenda Touring Range', 'et2-series-extenda-touring-range', '', 'et2-series-extenda-touring-range', 'index.php?option=com_content&view=article&id=19', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_tags":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu_text":"1","show_page_heading":"0","secure":"0"}', 149, 150, 0, '*', 0);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_menu_types`
--

CREATE TABLE `i4aj7_menu_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menutype` varchar(24) NOT NULL,
  `title` varchar(48) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_menutype` (`menutype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `i4aj7_menu_types`
--

INSERT INTO `i4aj7_menu_types` (`id`, `menutype`, `title`, `description`) VALUES
(1, 'mainmenu', 'Main Menu', 'The main menu for the site'),
(2, 'HiddenMenu', 'HiddenMenu', 'HiddenMenu');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_messages`
--

CREATE TABLE `i4aj7_messages` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id_from` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id_to` int(10) unsigned NOT NULL DEFAULT '0',
  `folder_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `priority` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_messages_cfg`
--

CREATE TABLE `i4aj7_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cfg_name` varchar(100) NOT NULL DEFAULT '',
  `cfg_value` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_mijosef_bookmarks`
--

CREATE TABLE `i4aj7_mijosef_bookmarks` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `html` text NOT NULL,
  `btype` varchar(20) NOT NULL DEFAULT '',
  `placeholder` varchar(150) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `i4aj7_mijosef_bookmarks`
--

INSERT INTO `i4aj7_mijosef_bookmarks` (`id`, `name`, `html`, `btype`, `placeholder`, `published`) VALUES
(1, 'Digg.com', '<a rel="nofollow" href="http://digg.com/" title="Digg!" target="_blank" onclick="window.open(''http://digg.com/submit?url=*mijosef*url*&title=*mijosef*title*&bodytext=*mijosef*description*''); return false;"><img height="18px" width="18px" src="*mijosef*imageDirectory*/digg.png" alt="Digg!" title="Digg!" /></a>', 'icon', '{mijosef icon}', 1),
(2, 'Digg.com - Normal', '<script type="text/javascript">digg_url=''*mijosef*url*''; digg_title=''*mijosef*title*''; digg_bodytext=''*mijosef*description*''; digg_bgcolor=''*mijosef*bgcolor*''; digg_window=''new'';</script><script src="http://digg.com/tools/diggthis.js" type="text/javascript"></script>', 'badge', '{mijosef Digg1}', 1),
(3, 'Digg.com - Compact', '<script type="text/javascript">digg_url=''*mijosef*url*''; digg_title=''*mijosef*title*''; digg_bodytext=''*mijosef*description*''; digg_bgcolor=''*mijosef*bgcolor*''; digg_skin=''compact''; digg_window = ''new'';</script><script src="http://digg.com/tools/diggthis.js" type="text/javascript"></script>', 'badge', '{mijosef Digg2}', 1),
(4, 'Reddit.com', '<a rel="nofollow" onclick="window.open(''http://reddit.com/submit?url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://reddit.com" title="Reddit!" target="_blank"><img height="18px" width="18px" src="*mijosef*imageDirectory*/reddit.png" alt="Reddit!" title="Reddit!" /></a>', 'icon', '{mijosef icon}', 1),
(5, 'Reddit.com - Style 1', '<script>reddit_url=''*mijosef*url*''</script><script>reddit_title=''*mijosef*title*''</script><script type="text/javascript" src="http://reddit.com/button.js?t=1"></script>', 'badge', '{mijosef Reddit1}', 1),
(6, 'Reddit.com - Style 2', '<script>reddit_url=''*mijosef*url*''</script><script>reddit_title=''*mijosef*title*''</script><script type="text/javascript" src="http://reddit.com/button.js?t=2"></script>', 'badge', '{mijosef Reddit2}', 1),
(7, 'Reddit.com - Style 3', '<script>reddit_url=''*mijosef*url*''</script><script>reddit_title=''*mijosef*title*''</script><script type="text/javascript" src="http://reddit.com/button.js?t=3"></script>', 'badge', '{mijosef Reddit3}', 1),
(8, 'Del.icio.us', '<a rel="nofollow" href="http://del.icio.us/" title="Del.icio.us!" target="_blank" onclick="window.open(''http://del.icio.us/post?v=4&noui&jump=close&url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;"><img height="18px" width="18px" src="*mijosef*imageDirectory*/delicious.png" alt="Del.icio.us!" title="Del.icio.us!" /></a>', 'icon', '{mijosef icon}', 1),
(9, 'Del.icio.us - Tall', '<script src="http://images.del.icio.us/static/js/blogbadge.js"></script>', 'badge', '{mijosef Delicious2}', 1),
(10, 'Del.icio.us - One Line', '<script type="text/javascript">if (typeof window.Delicious == "undefined") window.Delicious = {}; Delicious.BLOGBADGE_DEFAULT_CLASS = ''delicious-blogbadge-line'';</script><script src="http://images.del.icio.us/static/js/blogbadge.js"></script>', 'badge', '{mijosef Delicious2}', 1),
(11, 'Mixx', '<a rel="nofollow" onclick="window.open(''http://www.mixx.com/submit?page_url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://www.mixx.com/" title="Mixx!" target="_blank"><img height="18px" width="18px" src="*mijosef*imageDirectory*/mixx.png" alt="Mixx!" title="Mixx!" /></a>', 'icon', '{mijosef icon}', 1),
(12, 'EntirelyOpenSource.com', '<a onclick="window.open(''http://www.entirelyopensource.com/submit.php?url=*mijosef*url_encoded*''); return false;" href="http://www.entirelyopensource.com/" title="Free and Open Source Software News" target="_blank"><img height="18px" width="18px" src="*mijosef*imageDirectory*/entirelyopensource.png" alt="Free and Open Source Software News" title="Free and Open Source Software News" /></a>', 'icon', '{mijosef icon}', 1),
(13, 'Google Bookmarks', '<a rel="nofollow" onclick="window.open(''http://www.google.com/bookmarks/mark?op=edit&bkmk=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://www.google.com/bookmarks/" title="Google!" target="_blank"><img height="18px" width="18px" src="*mijosef*imageDirectory*/google.png" alt="Google!" title="Google!" /></a>', 'icon', '{mijosef icon}', 1),
(14, 'Live.com', '<a rel="nofollow" onclick="window.open(''https://favorites.live.com/quickadd.aspx?url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="https://favorites.live.com/" title="Live!" target="_blank"><img height="18px" width="18px" src="*mijosef*imageDirectory*/live.png" alt="Live!" title="Live!" /></a>', 'icon', '{mijosef icon}', 1),
(15, 'Facebook.com', '<a rel="nofollow" onclick="window.open(''http://www.facebook.com/sharer.php?u=*mijosef*url_encoded*&t=*mijosef*title_encoded*''); return false;" href="https://www.facebook.com/" title="Facebook!" target="_blank"><img height="18px" width="18px" src="*mijosef*imageDirectory*/facebook.png" alt="Facebook!" title="Facebook!" /></a>', 'icon', '{mijosef icon}', 1),
(16, 'Slashdot.org', '<a rel="nofollow" onclick="window.open('' http://slashdot.org/bookmark.pl?url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://slashdot.org/" title="Slashdot!" target="_blank"><img height="18px" width="18px" src="*mijosef*imageDirectory*/slashdot.png" alt="Slashdot!" title="Slashdot!" /></a>', 'icon', '{mijosef icon}', 1),
(17, 'Netscape.com', '<a rel="nofollow" onclick="window.open(http://www.netscape.com/submit/?U=*mijosef*url_encoded*&T=*mijosef*title_encoded*''); return false;" href="http://www.netscape.com/" title="Netscape!" target="_blank"><img height="18px" width="18px" src="*mijosef*imageDirectory*/netscape.png" alt="Netscape!" title="Netscape!" /></a>', 'icon', '{mijosef icon}', 1),
(18, 'Technorati.com', '<a rel="nofollow" onclick="window.open(''http://www.technorati.com/faves?add=*mijosef*url_encoded*''); return false;" href="http://www.technorati.com/" title="Technorati!" target="_blank"><img src="*mijosef*imageDirectory*/technorati.png" alt="Technorati!" title="Technorati!" /></a>', 'icon', '{mijosef icon}', 1),
(19, 'StumbleUpon.com', '<a rel="nofollow" onclick="window.open(''http://www.stumbleupon.com/submit?url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://www.stumbleupon.com/" title="StumbleUpon!" target="_blank"><img src="*mijosef*imageDirectory*/stumbleupon.png" alt="StumbleUpon!" title="StumbleUpon!" /></a>', 'icon', '{mijosef icon}', 1),
(20, 'MySpace.com', '<a rel="nofollow" href="http://www.myspace.com/" title="MySpace!" target="_blank" onclick="window.open(''http://www.myspace.com/Modules/PostTo/Pages/?t=*mijosef*title*&u=*mijosef*url*''); return false;"><img height="18px" width="18px" src="*mijosef*imageDirectory*/myspace.png" alt="MySpace!" title="MySpace!" /></a>', 'icon', '{mijosef icon}', 1),
(21, 'Spurl.net', '<a rel="nofollow" onclick="window.open(''http://www.spurl.net/spurl.php?url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://www.spurl.net/" title="Spurl!" target="_blank"><img src="*mijosef*imageDirectory*/spurl.png" alt="Spurl!" title="Spurl!" /></a>', 'icon', '{mijosef icon}', 1),
(22, 'Wists.com', '<a rel="nofollow" onclick="window.open(''http://wists.com/r.php?c=&r=*mijosef*url_encoded*&tot;e=*mijosef*title_encoded*''); return false;" href="http://wists.com/" title="Wists!" target="_blank"><img src="*mijosef*imageDirectory*/wists.png" alt="Wists!" title="Wists!" /></a>', 'icon', '{mijosef icon}', 1),
(23, 'Simpy.com', '<a rel="nofollow" onclick="window.open(''http://www.simpy.com/simpy/LinkAdd.do?href=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://www.simpy.com/" title="Simpy!" target="_blank"><img src="*mijosef*imageDirectory*/simpy.png" alt="Simpy!" title="Simpy!" /></a>', 'icon', '{mijosef icon}', 1),
(24, 'Newsvine.com', '<a rel="nofollow" onclick="window.open('' http://www.newsvine.com/_wine/save?u=*mijosef*url_encoded*&h=*mijosef*title_encoded*''); return false;" href="http://www.newsvine.com/" title="Newsvine!" target="_blank"><img src="*mijosef*imageDirectory*/newsvine.png" alt="Newsvine!" title="Newsvine!" /></a>', 'icon', '{mijosef icon}', 1),
(25, 'BlinkList.com', '<a rel="nofollow" onclick="window.open('' http://blinklist.com/index.php?Action=Blink/addblink.php&Url=*mijosef*url_encoded*&Title=*mijosef*title_encoded*''); return false;" href="http://www.blinklist.com/" title="Blinklist!" target="_blank"><img src="*mijosef*imageDirectory*/blinklist.png" alt="Blinklist!" title="Blinklist!" /></a>', 'icon', '{mijosef icon}', 1),
(26, 'Furl.net', '<a rel="nofollow" onclick="window.open(''http://furl.net/storeIt.jsp?u=*mijosef*url_encoded*&t=*mijosef*title_encoded*''); return false;" href="http://www.furl.net/" title="Furl!" target="_blank"><img src="*mijosef*imageDirectory*/furl.png" alt="Furl!" title="Furl!" /></a>', 'icon', '{mijosef icon}', 1),
(27, 'Fark.com', '<a rel="nofollow" onclick="window.open(''http://cgi.fark.com/cgi/fark/submit.pl?new_url=*mijosef*url_encoded*&new_comment=*mijosef*title_encoded*&linktype='');return false;" href="http://fark.com" title="Fark!" target="_blank"><img src="*mijosef*imageDirectory*/fark.png" alt="Fark!" title="Fark!" /></a>', 'icon', '{mijosef icon}', 1),
(28, 'BlogMarks.net', '<a rel="nofollow" onclick="window.open(''http://blogmarks.net/my/new.php?mini=1&simple=1&url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://blogmarks.net/" title="Blogmarks!" target="_blank"><img src="*mijosef*imageDirectory*/blogmarks.png" alt="Blogmarks!" title="Blogmarks!" /></a>', 'icon', '{mijosef icon}', 1),
(29, 'Yahoo! Buzz', '<a rel="nofollow" onclick="window.open(''http://myweb2.search.yahoo.com/myresults/bookmarklet?u=*mijosef*url_encoded*&t=*mijosef*title_encoded*''); return false;" href="http://myweb2.search.yahoo.com/" title="Yahoo!" target="_blank"><img src="*mijosef*imageDirectory*/yahoo.png" alt="Yahoo!" title="Yahoo!" /></a>', 'icon', '{mijosef icon}', 1),
(30, 'Smarking.com', '<a rel="nofollow" onclick="window.open(''http://smarking.com/editbookmark/?url=*mijosef*url_encoded*''); return false;" href="http://smarking.com/" title="Smarking!" target="_blank"><img src="*mijosef*imageDirectory*/smarking.png" alt="Smarking!" title="Smarking!" /></a>', 'icon', '{mijosef icon}', 1),
(31, 'Netvouz.com', '<a rel="nofollow" onclick="window.open(''http://www.netvouz.com/action/submitBookmark?url=*mijosef*url_encoded*&title=*mijosef*title_encoded*&popup=no''); return false;" href="http://www.netvouz.com/" title="Smarking!" target="_blank"><img src="*mijosef*imageDirectory*/netvouz.png" alt="Netvouz!" title="Netvouz!" /></a>', 'icon', '{mijosef icon}', 1),
(32, 'Mister-Wong.com', '<a rel="nofollow" onclick="window.open(''http://www.mister-wong.com/index.php?action=addurl&bm_url=*mijosef*url_encoded*&bm_description=*mijosef*title_encoded*''); return false;" href="http://www.mister-wong.com/" title="Mister-Wong!" target="_blank"><img src="*mijosef*imageDirectory*/mister-wong.png" alt="Mister-Wong!" title="Mister-Wong!" /></a>', 'icon', '{mijosef icon}', 1),
(33, 'RawSugar.com', '<a rel="nofollow" onclick="window.open(''http://www.rawsugar.com/tagger/?turl=*mijosef*url_encoded*&tttl=*mijosef*title_encoded*&editorInitialized=1''); return false;" href="http://www.rawsugar.com/" title="RawSugar!" target="_blank"><img src="*mijosef*imageDirectory*/rawsugar.png" alt="RawSugar!" title="RawSugar!" /></a>', 'icon', '{mijosef icon}', 1),
(34, 'Ma.gnolia.com', '<a rel="nofollow" onclick="window.open(''http://ma.gnolia.com/bookmarklet/add?url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://ma.gnolia.com/" title="Ma.gnolia!" target="_blank"><img src="*mijosef*imageDirectory*/magnolia.png" alt="Ma.gnolia!" title="Ma.gnolia!" /></a>', 'icon', '{mijosef icon}', 1),
(35, 'Squidoo.com', '<a rel="nofollow" onclick="window.open(''http://www.squidoo.com/lensmaster/bookmark?*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://www.squidoo.com/" title="Squidoo!" target="_blank"><img src="*mijosef*imageDirectory*/squidoo.png" alt="Squidoo!" title="Squidoo!" /></a>', 'icon', '{mijosef icon}', 1),
(36, 'FeedMeLinks.com', '<a rel="nofollow" onclick="window.open(''http://feedmelinks.com/categorize?from=toolbar&op=submit&url=*mijosef*url_encoded*&name=*mijosef*title_encoded*''); return false;" href="http://feedmelinks.com/" title="FeedMeLinks!" target="_blank"><img src="*mijosef*imageDirectory*/feedmelinks.png" alt="FeedMeLinks!" title="FeedMeLinks!" /></a>', 'icon', '{mijosef icon}', 1),
(37, 'BlinkBits.com', '<a rel="nofollow" onclick="window.open(''http://www.blinkbits.com/bookmarklets/save.php?v=1&source_url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://www.blinkbits.com/" title="BlinkBits!" target="_blank"><img src="*mijosef*imageDirectory*/blinkbits.png" alt="BlinkBits!" title="BlinkBits!" /></a>', 'icon', '{mijosef icon}', 1),
(38, 'TailRank.com', '<a rel="nofollow" onclick="window.open(''http://tailrank.com/share/?link_href=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://tailrank.com/" title="Tailrank!" target="_blank"><img src="*mijosef*imageDirectory*/tailrank.png" alt="Tailrank!" title="Tailrank!" /></a>', 'icon', '{mijosef icon}', 1),
(39, 'linkaGoGo.com', '<a rel="nofollow" onclick="window.open(''http://www.linkagogo.com/go/AddNoPopup?url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://www.linkagogo.com/" title="linkaGoGo!" target="_blank"><img src="*mijosef*imageDirectory*/linkagogo.png" alt="linkaGoGo!" title="linkaGoGo!" /></a>', 'icon', '{mijosef icon}', 1),
(40, 'Cannotea.org', '<a rel="nofollow" onclick="window.open(''http://www.connotea.org/addpopup?continue=confirm&uri=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://www.cannotea.org/" title="Cannotea!" target="_blank"><img src="*mijosef*imageDirectory*/cannotea.png" alt="Cannotea!" title="Cannotea!" /></a>', 'icon', '{mijosef icon}', 1),
(41, 'Diigo.com', '<a rel="nofollow" onclick="window.open(''http://www.diigo.com/post?url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://www.diigo.com/" title="Diigo!" target="_blank"><img src="*mijosef*imageDirectory*/diigo.png" alt="Diigo!" title="Diigo!" /></a>', 'icon', '{mijosef icon}', 1),
(42, 'Faves.com', '<a rel="nofollow" onclick="window.open(''http://faves.com/Authoring.aspx?u=*mijosef*url_encoded*&t=*mijosef*title_encoded*''); return false;" href="http://faves.com/" title="Faves!" target="_blank"><img src="*mijosef*imageDirectory*/faves.png" alt="Faves!" title="Faves!" /></a>', 'icon', '{mijosef icon}', 1),
(43, 'Ask.com', '<a rel="nofollow" onclick="window.open(''http://myjeeves.ask.com/mysearch/BookmarkIt?v=1.2&t=webpages&url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://faves.com/" title="Ask!" target="_blank"><img src="*mijosef*imageDirectory*/ask.png" alt="Ask!" title="Ask!" /></a>', 'icon', '{mijosef icon}', 1),
(44, 'DZone.com', '<a rel="nofollow" onclick="window.open(''http://www.dzone.com/links/add.html?url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://www.dzone.com/" title="DZone!" target="_blank"><img src="*mijosef*imageDirectory*/dzone.png" alt="DZone!" title="DZone!" /></a>', 'icon', '{mijosef icon}', 1),
(45, 'DZone.com - Tall', '<script type="text/javascript">var dzone_url = ''*mijosef*url*'';</script><script type="text/javascript">var dzone_title = ''*mijosef*title*'';</script><script type="text/javascript">var dzone_blurb=''*mijosef*description*'';</script><script type="text/javascript">var dzone_style = ''1'';</script><script language="javascript" src="http://widgets.dzone.com/widgets/zoneit.js"></script>', 'badge', '{mijosef DZone1}', 1),
(46, 'DZone.com - Wide', '<script type="text/javascript">var dzone_url = ''*mijosef*url*'';</script><script type="text/javascript">var dzone_title = ''*mijosef*title*'';</script><script type="text/javascript">var dzone_blurb=''*mijosef*description*'';</script><script type="text/javascript">var dzone_style = ''2'';</script><script language="javascript" src="http://widgets.dzone.com/widgets/zoneit.js"></script>', 'badge', '{mijosef DZone2}', 1),
(47, 'Swik.net', '<a rel="nofollow" onclick="window.open(''http://stories.swik.net/?submitUrl&url=*mijosef*url_encoded*''); return false;" href="http://stories.swik.net/" title="Swik!" target="_blank"><img src="*mijosef*imageDirectory*/swik.png" alt="Swik!" title="Swik!" /></a>', 'icon', '{mijosef icon}', 1),
(48, 'Shoutwire.com', '<a rel="nofollow" onclick="window.open(''http://www.shoutwire.com/?p=submit&link=*mijosef*url_encoded*''); return false;" href="http://wwww.shoutwire.net/" title="ShoutWire!" target="_blank"><img src="*mijosef*imageDirectory*/shoutwire.png" alt="ShoutWire!" title="ShoutWire!" /></a>', 'icon', '{mijosef icon}', 1),
(49, 'MyLinkVault.com', '<a rel="nofollow" onclick="window.open(''http://www.mylinkvault.com/link-quick.php?u=*mijosef*url_decoded*&n=*mijosef*title_encoded*''); return false;" href="http://wwww.mylinkvault.net/" title="MyLinkVault!" target="_blank"><img src="*mijosef*imageDirectory*/mylinkvault.png" alt="MyLinkVault!" title="MyLinkVault!" /></a>', 'icon', '{mijosef icon}', 1),
(50, 'Maple.nu', '<a rel="nofollow" onclick="window.open(''http://www.maple.nu/submit.php?url=*mijosef*url_encoded*&title=*mijosef*title_encoded*''); return false;" href="http://maple.nu/" title="Maple!" target="_blank"><img src="*mijosef*imageDirectory*/maple.png" alt="Maple!" title="Maple!" /></a>', 'icon', '{mijosef icon}', 1),
(51, 'BlogRolling.com', '<a rel="nofollow" onclick="window.open(''http://www.blogrolling.com/add_links_pop.phtml?u=*mijosef*url_encoded*&t=*mijosef*title_encoded*''); return false;" href="http://www.blogrolling.com/" title="BlogRolling!" target="_blank"><img src="*mijosef*imageDirectory*/blogrolling.png" alt="BlogRolling!" title="BlogRolling!" /></a>', 'icon', '{mijosef icon}', 1),
(52, 'AddThis.com - Drop Down', '<!-- AddThis Bookmark Button BEGIN --><script type="text/javascript">addthis_url=''*mijosef*url*''; addthis_title=''*mijosef*title*''; addthis_pub=''*mijosef*addThisPubId*'';</script><script type="text/javascript" src="http://s7.addthis.com/js/addthis_widget.php?v=12" ></script><!-- AddThis Bookmark Button END -->', 'iconset', '{mijosef AddThis1}', 1),
(53, 'AddThis.com - Style 1', '<!-- AddThis Bookmark Button BEGIN --><a href="http://www.addthis.com/bookmark.php" onclick="addthis_url=''*mijosef*url*''; addthis_title=''*mijosef*title*''; return addthis_click(this);" target="_blank"><img src="http://s9.addthis.com/button0-bm.gif" width="83" height="16" border="0" alt="AddThis Social Bookmark Button" /></a> <script type="text/javascript">var addthis_pub=''*mijosef*addThisPubId*'';</script><script type="text/javascript" src="http://s9.addthis.com/js/widget.php?v=10"></script>  <!-- AddThis Bookmark Button END -->', 'iconset', '{mijosef AddThis2}', 1),
(54, 'AddThis.com - Style 2', '<!-- AddThis Bookmark Button BEGIN --><a href="http://www.addthis.com/bookmark.php" onclick="addthis_url=''*mijosef*url*''; addthis_title=''*mijosef*title*''; return addthis_click(this);" target="_blank"><img src="http://s9.addthis.com/button1-bm.gif" width="125" height="16" border="0" alt="AddThis Social Bookmark Button" /></a> <script type="text/javascript">var addthis_pub=''*mijosef*addThisPubId*'';</script><script type="text/javascript" src="http://s9.addthis.com/js/widget.php?v=10"></script>  <!-- AddThis Bookmark Button END -->', 'iconset', '{mijosef AddThis3}', 1),
(55, 'AddThis.com - Style 3', '<!-- AddThis Bookmark Button BEGIN --><a href="http://www.addthis.com/bookmark.php" onclick="addthis_url=''*mijosef*url*''; addthis_title=''*mijosef*title*''; return addthis_click(this);" target="_blank"><img src="http://s9.addthis.com/button1-share.gif" width="125" height="16" border="0" alt="AddThis Social Bookmark Button" /></a> <script type="text/javascript">var addthis_pub=''*mijosef*addThisPubId*'';</script><script type="text/javascript" src="http://s9.addthis.com/js/widget.php?v=10"></script>  <!-- AddThis Bookmark Button END -->', 'iconset', '{mijosef AddThis4}', 1),
(56, 'AddThis.com - Style 4', '<!-- AddThis Bookmark Button BEGIN --><a href="http://www.addthis.com/bookmark.php" onclick="addthis_url=''*mijosef*url*''; addthis_title=''*mijosef*title*''; return addthis_click(this);" target="_blank"><img src="http://s9.addthis.com/button1-addthis.gif" width="125" height="16" border="0" alt="AddThis Social Bookmark Button" /></a> <script type="text/javascript">var addthis_pub=''*mijosef*addThisPubId*'';</script><script type="text/javascript" src="http://s9.addthis.com/js/widget.php?v=10"></script><!-- AddThis Bookmark Button END -->', 'iconset', '{mijosef AddThis5}', 1),
(57, 'AddThis.com - Style 5', '<!-- AddThis Bookmark Button BEGIN --><a href="http://www.addthis.com/bookmark.php" onclick="addthis_url=''*mijosef*url*''; addthis_title=''*mijosef*title*''; return addthis_click(this);" target="_blank"><img src="http://s9.addthis.com/button2-bm.png" width="160" height="24" border="0" alt="AddThis Social Bookmark Button" /></a> <script type="text/javascript">var addthis_pub=''*mijosef*addThisPubId*'';</script><script type="text/javascript" src="http://s9.addthis.com/js/widget.php?v=10"></script><!-- AddThis Bookmark Button END -->', 'iconset', '{mijosef AddThis6}', 1),
(58, 'GodSurfer.com', '<a rel="nofollow" href="http://www.godsurfer.com/" title="GodSurfer!" target="_blank"\r\nonclick="window.open(''http://www.godsurfer.com/addStory.php?url=*mijosef*url*''); return false;">\r\n<img height="18px" width="18px" src="*mijosef*imageDirectory*/godsurfer.png" alt="GodSurfer!" title="GodSurfer!" /></a>', 'icon', '{mijosef icon}', 1),
(59, 'GodSurfer.com - Large', '<script type="text/javascript">GODSurfer_url = "*mijosef*url*";</script><script src="http://www.godsurfer.com/tools/GODSurfer.js" type="text/javascript"></script>', 'badge', '{mijosef GodSurfer1}', 1),
(60, 'GodSurfer.com - Compact', '<script type="text/javascript">GODSurfer_url = "*mijosef*url*"; GODSurfer_skin = "compact";</script><script src="http://www.godsurfer.com/tools/GODSurfer.js" type="text/javascript"></script>', 'badge', '{mijosef GodSurfer2}', 1),
(61, 'Tell-a-Friend', '<script src="http://cdn.socialtwist.com/*mijosef*TellAFriendId*/script.js"></script><img style="border:0;padding:0;margin:0;" src="http://images.socialtwist.com/*mijosef*TellAFriendId*/button.png" onmouseout="hideHoverMap(this)" onmouseover="showHoverMap(this, ''*mijosef*TellAFriendId*'', window.location, document.title)" onclick="cw(this, {id: ''*mijosef*TellAFriendId*'',link: window.location, title: document.title })"/>', 'iconset', '{mijosef TellAFriend}', 1),
(62, 'Google Buzz', '<a rel="nofollow" onclick="window.open(''http://www.google.com/reader/link?url=*mijosef*url_encoded*&title=*mijosef*title_encoded*&srcUrl=*mijosef*domain*&srcTitle=*mijosef*sitename*&snippet=*mijosef*description*''); return false;" href="http://www.google.com/" title="Buzz" target="_blank"><img src="*mijosef*imageDirectory*/googlebuzz.png" alt="Buzz" title="Buzz" /></a>', 'icon', '{mijosef icon}', 1),
(63, 'Twitter', '<script type="text/javascript">tweetmeme_url=''*mijosef*url_encoded*'';tweetme_window=''new'';tweetme_bgcolor=''*mijosef*bgcolor*'';tweetmeme_source=''*mijosef*twitterAccount*'';tweetmeme_service=''bit.ly'';tweetme_title=''*mijosef*title*'';tweetmeme_hashtags='''';</script><script type="text/javascript" src="http://tweetmeme.com/i/scripts/button.js"></script>', 'badge', '{mijosef Twitter}', 1),
(64, 'Google Buzz', '<a title="Post on Google Buzz" class="google-buzz-button" href="http://www.google.com/buzz/post" data-button-style="normal-count" ></a><script type="text/javascript" src="http://www.google.com/buzz/api/button.js"></script>', 'badge', '{mijosef GoogleBuzz}', 1),
(65, 'Yahoo! Buzz', '<script type="text/javascript">yahooBuzzArticleId = window.location.href;</script><script type="text/javascript" src="http://d.yimg.com/ds/badge2.js" badgetype="square"></script>', 'badge', '{mijosef YahooBuzz}', 1),
(66, 'MySpace', '<a href="javascript:void(window.open(''http://www.myspace.com/Modules/PostTo/Pages/?u=''+encodeURIComponent(document.location.toString()),''ptm'',''height=450,width=440'').focus())"><img src="http://cms.myspacecdn.com/cms/ShareOnMySpace/LargeSquare.png" border="0" alt="Share on MySpace" /></a>', 'badge', '{mijosef MySpace}', 1),
(67, 'Stumbleupon', '<script src="http://www.stumbleupon.com/hostedbadge.php?s=5"></script>', 'badge', '{mijosef Stumbleupon}', 1),
(68, 'Google Buzz (with counter)', '<a title="Buzz" class="google-buzz-button" href="http://www.google.com/buzz/post" data-button-style="small-count"></a><script type="text/javascript" src="http://www.google.com/buzz/api/button.js"></script>', 'badge', '{mijosef GoogleBuzz2}', 1),
(69, 'Twitter (with counter)', '<a href="http://twitter.com/share?url=*mijosef*url_encoded*" class="twitter-share-button" data-text="*mijosef*title*:" data-count="horizontal" data-via="*mijosef*twitterAccount*">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>', 'badge', '{mijosef Twitter2}', 1),
(70, 'Facebook (with counter)', '<iframe src="http://www.facebook.com/plugins/like.php?href=*mijosef*url_encoded*&amp;layout=button_count&amp;width=90&amp;height=20&amp;show_faces=false&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:20px;" allowTransparency="true"></iframe>', 'badge', '{mijosef Facebook2}', 1),
(71, 'Facebook Share', '<script>var fbShare = {url: "*mijosef*url_encoded*"}</script><script src="http://widgets.fbshare.me/files/fbshare.js"></script>', 'badge', '{mijosef Facebook}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_mijosef_extensions`
--

CREATE TABLE `i4aj7_mijosef_extensions` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `extension` varchar(45) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `extension` (`extension`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `i4aj7_mijosef_extensions`
--

INSERT INTO `i4aj7_mijosef_extensions` (`id`, `name`, `extension`, `params`) VALUES
(1, 'MijoSEF', 'com_mijosef', '{"router":3,"skip_menu":0,"prefix":""}'),
(2, 'Banners', 'com_banners', '{"router":3,"prefix":"banner","skip_menu":0}'),
(3, 'Contact', 'com_contact', '{"router":3,"skip_menu":"1","prefix":""}'),
(4, 'Content', 'com_content', '{"article_part":"global","category_part":"global","section_part":"global","smart_itemid":"1","layout_prefix":"2","blog_prefix":"","list_prefix":"List","url_structure":"joomla","custom_structure":"{category}\\/{article}","articleid_inc":"1","category_inc":"1","categoryid_inc":"1","section_inc":"1","sectionid_inc":"1","cat_suffix":"1","default_index":"","google_news":"1","google_news_pos":"2","google_news_digits":"3","google_news_dateformat":"ddmm","google_news_cats":["all"],"router":"3","prefix":"","skip_menu":"1","global_smart_itemid":"global","ignore_multi_itemid":"global","numeral_duplicated":"global","record_duplicated":"global","limit_num":"","override":"1","override_id":"","menu_start_level":"0","menu_length_level":"0","non_sef_vars":"ret","disable_sef_vars":"","skip_menu_vars":"","meta_title":"global","separator":"-","custom_sitename":"","use_sitename":"2","title_prefix":"","title_suffix":"","page_number":"2","meta_desc":"global","desc_inc_title":"2","desc_clip":"1","desc_clip_s":"2","desc_clip_w":"20","desc_clip_c":"250","meta_key":"global","keywords_word":"3","keywords_count":"15","keywords_backlist":"global","blacklist":"a, able, about, above, abroad, according, accordingly, across, actually, adj, after, afterwards, again, against, ago, ahead, ain''t, all, allow, allows, almost, alone, along, alongside, already, also, although, always, am, amid, amidst, among, amongst, an, and, another, any, anybody, anyhow, anyone, anything, anyway, anyways, anywhere, apart, appear, appreciate, appropriate, are, aren''t, around, as, a''s, aside, ask, asking, associated, at, available, away, awfully, b, back, backward, backwards, be, became, because, become, becomes, becoming, been, before, beforehand, begin, behind, being, believe, below, beside, besides, best, better, between, beyond, both, brief, but, by, c, came, can, cannot, cant, can''t, caption, cause, causes, certain, certainly, changes, clearly, c''mon, co, co., com, come, comes, concerning, consequently, consider, considering, contain, containing, contains, corresponding, could, couldn''t, course, c''s, currently, d, dare, daren''t, definitely, described, despite, did, didn''t, different, directly, do, does, doesn''t, doing, done, don''t, down, downwards, during, e, each, edu, eg, eight, eighty, either, else, elsewhere, end, ending, enough, entirely, especially, et, etc, even, ever, evermore, every, everybody, everyone, everything, everywhere, ex, exactly, example, except, f, fairly, far, farther, few, fewer, fifth, first, five, followed, following, follows, for, forever, former, formerly, forth, forward, found, four, from, further, furthermore, g, get, gets, getting, given, gives, go, goes, going, gone, got, gotten, greetings, h, had, hadn''t, half, happens, hardly, has, hasn''t, have, haven''t, having, he, he''d, he''ll, hello, help, , hence, her, here, hereafter, hereby, herein, here''s, hereupon, hers, herself, he''s, hi, him, himself, his, hither, hopefully, how, howbeit, however, hundred, i, i''d, ie, if, ignored, i''ll, i''m, immediate, in, inasmuch, inc, inc., indeed, indicate, indicated, indicates, inner, inside, insofar, instead, into, inward, is, isn''t, it, it''d, it''ll, its, it''s, itself, i''ve, j, just, k, keep, keeps, kept, know, known, knows, l, last, lately, later, latter, latterly, least, less, lest, let, let''s, like, liked, likely, likewise, little, look, looking, looks, low, lower, ltd, m, made, mainly, make, makes, many, may, maybe, mayn''t, me, mean, meantime, meanwhile, merely, might, mightn''t, mine, minus, miss, more, moreover, most, mostly, mr, mrs, much, must, mustn''t, my, myself, n, name, namely, nd, near, nearly, necessary, need, needn''t, needs, neither, never, neverf, neverless, nevertheless, new, next, nine, ninety, no, nobody, non, none, nonetheless, noone, no-one, nor, normally, not, nothing, notwithstanding, novel, now, nowhere, o, obviously, of, off, often, oh, ok, okay, old, on, once, one, ones, one''s, only, onto, opposite, or, other, others, otherwise, ought, oughtn''t, our, ours, ourselves, out, outside, over, overall, own, p, particular, particularly, past, per, perhaps, placed, please, plus, possible, presumably, probably, provided, provides, q, que, quite, qv, r, rather, rd, re, really, reasonably, recent, recently, regarding, regardless, regards, relatively, respectively, right, round, s, said, same, saw, say, saying, says, second, secondly, , see, seeing, seem, seemed, seeming, seems, seen, self, selves, sensible, sent, serious, seriously, seven, several, shall, shan''t, she, she''d, she''ll, she''s, should, shouldn''t, since, six, so, some, somebody, someday, somehow, someone, something, sometime, sometimes, somewhat, somewhere, soon, sorry, specified, specify, specifying, still, sub, such, sup, sure, t, take, taken, taking, tell, tends, th, than, thank, thanks, thanx, that, that''ll, thats, that''s, that''ve, the, their, theirs, them, themselves, then, thence, there, thereafter, thereby, there''d, therefore, therein, there''ll, there''re, theres, there''s, thereupon, there''ve, these, they, they''d, they''ll, they''re, they''ve, thing, things, think, third, thirty, this, thorough, thoroughly, those, though, three, through, throughout, thru, thus, till, to, together, too, took, toward, towards, tried, tries, truly, try, trying, t''s, twice, two, u, un, under, underneath, undoing, unfortunately, unless, unlike, unlikely, until, unto, up, upon, upwards, us, use, used, useful, uses, using, usually, v, value, various, versus, very, via, viz, vs, w, want, wants, was, wasn''t, way, we, we''d, welcome, well, we''ll, went, were, we''re, weren''t, we''ve, what, whatever, what''ll, what''s, what''ve, when, whence, whenever, where, whereafter, whereas, whereby, wherein, where''s, whereupon, wherever, whether, which, whichever, while, whilst, whither, who, who''d, whoever, whole, who''ll, whom, whomever, who''s, whose, why, will, willing, wish, with, within, without, wonder, won''t, would, wouldn''t, x, y, yes, yet, you, you''d, you''ll, your, you''re, yours, yourself, yourselves, you''ve, z, zero","keywords_whitelist":"global","whitelist":"","item_desc":"1","sm_auto_enable_cats":"global","sm_auto_filter_s":"","sm_auto_filter_r":"","sm_auto_xml":"global","sm_auto_ping_c":"global","sm_auto_ping_s":"global","tags_area":"global","tags_prefix":"","tags_position":"global","tags_in_cats":"global","tags_enable_cats":"global","ilinks_area":"global","ilinks_enable_cats":"global","bookmarks_area":"global","bookmarks_icons_pos":"global","bookmarks_in_cats":"global","bookmarks_enable_cats":"global"}'),
(5, 'Mail To', 'com_mailto', '{"router":3,"prefix":"mail","skip_menu":0}'),
(6, 'News Feeds', 'com_newsfeeds', '{"router":3,"skip_menu":0,"prefix":""}'),
(7, 'Search', 'com_search', '{"router":3,"prefix":"search","non_sef_vars":"ordering, searchphrase, submit, searchword, areas","skip_menu":0}'),
(8, 'Tags', 'com_tags', '{"router":3,"non_sef_vars":"types","skip_menu":0,"prefix":""}'),
(9, 'Users', 'com_users', '{"router":3,"prefix":"user","non_sef_vars":"layout, activate","disable_sef_vars":"activation, return","skip_menu":0}'),
(10, 'Web Links', 'com_weblinks', '{"router":3,"skip_menu":0,"prefix":""}'),
(11, 'Wrapper', 'com_wrapper', '{"router":3,"skip_menu":0,"prefix":""}'),
(12, '', 'com_2jgallery', '{"router":1,"prefix":"","skip_menu":0}'),
(13, '', 'com_akeeba', '{"router":1,"prefix":"","skip_menu":0}'),
(14, '', 'com_chronoforms', '{"router":1,"prefix":"","skip_menu":0}'),
(15, '', 'com_finder', '{"router":2,"prefix":"","skip_menu":0}'),
(16, '', 'com_rsfirewall', '{"router":1,"prefix":"","skip_menu":0}'),
(17, '', 'com_spupgrade', '{"router":1,"prefix":"","skip_menu":0}'),
(18, '', 'com_swmenupro', '{"router":1,"prefix":"","skip_menu":0}'),
(19, '', 'com_twojtoolbox', '{"router":1,"prefix":"","skip_menu":0}');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_mijosef_ilinks`
--

CREATE TABLE `i4aj7_mijosef_ilinks` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(255) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `nofollow` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `iblank` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ilimit` varchar(30) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  UNIQUE KEY `word` (`word`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_mijosef_metadata`
--

CREATE TABLE `i4aj7_mijosef_metadata` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `url_sef` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `lang` varchar(30) NOT NULL DEFAULT '',
  `robots` varchar(30) NOT NULL DEFAULT '',
  `googlebot` varchar(30) NOT NULL DEFAULT '',
  `canonical` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_sef` (`url_sef`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `i4aj7_mijosef_metadata`
--

INSERT INTO `i4aj7_mijosef_metadata` (`id`, `url_sef`, `published`, `title`, `description`, `keywords`, `lang`, `robots`, `googlebot`, `canonical`) VALUES
(1, 'history.html', 1, 'History - Regency Caravans', '', '', '', '', '', ''),
(2, 'new-caravans.html', 1, 'New caravans - Regency Caravans', '', '', '', '', '', ''),
(3, 'our-services.html', 1, 'Our Services - Regency Caravans', '', '', '', '', '', ''),
(4, 'contact-us.html', 1, 'Contact us - Regency Caravans', '', '', '', '', '', ''),
(5, 'pre-owned-caravans.html', 1, 'Pre-owned caravans - Regency Caravans', '', '', '', '', '', ''),
(6, 'regal-caravans.html', 1, 'Regal Caravans - Regency Caravans', '', '', '', '', '', ''),
(7, 'coronet-caravans.html', 1, 'Coronet Caravans - Regency Caravans', '', '', '', '', '', ''),
(8, 'caravans-in-stock.html', 1, 'Caravans In Stock - Regency Caravans', '', '', '', '', '', ''),
(9, 'the-prince.html', 1, 'The Prince - Regency Caravans', '', '', '', '', '', ''),
(10, 'the-carrington.html', 1, 'The Carrington - Regency Caravans', '', '', '', '', '', ''),
(11, 'the-farren.html', 1, 'The Farren - Regency Caravans', '', '', '', '', '', ''),
(12, 'home.html', 1, 'Home - Caravan Country', '', '', '', '', '', ''),
(13, '404.html', 1, '404 - Caravan Country', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_mijosef_sitemap`
--

CREATE TABLE `i4aj7_mijosef_sitemap` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `url_sef` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sdate` date NOT NULL DEFAULT '0000-00-00',
  `frequency` varchar(30) NOT NULL DEFAULT '',
  `priority` varchar(10) NOT NULL DEFAULT '',
  `sparent` int(12) unsigned NOT NULL DEFAULT '0',
  `sorder` int(5) unsigned NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_sef` (`url_sef`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `i4aj7_mijosef_sitemap`
--

INSERT INTO `i4aj7_mijosef_sitemap` (`id`, `url_sef`, `title`, `published`, `sdate`, `frequency`, `priority`, `sparent`, `sorder`) VALUES
(1, '', '', 1, '2013-05-18', 'weekly', '0.5', 0, 1000),
(2, 'history.html', '', 1, '2013-05-18', 'weekly', '0.5', 0, 1000),
(3, 'new-caravans.html', '', 1, '2013-05-18', 'weekly', '0.5', 0, 1000),
(4, 'our-services.html', '', 1, '2013-05-18', 'weekly', '0.5', 0, 1000),
(5, 'contact-us.html', '', 1, '2013-05-18', 'weekly', '0.5', 0, 1000),
(6, 'pre-owned-caravans.html', '', 1, '2013-05-18', 'weekly', '0.5', 0, 1000),
(7, 'regal-caravans.html', '', 1, '2013-05-18', 'weekly', '0.5', 0, 1000),
(8, 'coronet-caravans.html', '', 1, '2013-05-18', 'weekly', '0.5', 0, 1000),
(9, 'caravans-in-stock.html', '', 1, '2013-05-18', 'weekly', '0.5', 0, 1000),
(10, 'the-prince.html', '', 1, '2013-05-20', 'weekly', '0.5', 0, 1000),
(11, 'the-carrington.html', '', 1, '2013-05-20', 'weekly', '0.5', 0, 1000),
(12, 'the-farren.html', '', 1, '2013-05-20', 'weekly', '0.5', 0, 1000),
(13, 'home.html', '', 1, '2013-11-12', 'weekly', '0.5', 0, 1000),
(14, '404.html', '', 1, '2013-12-29', 'weekly', '0.5', 0, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_mijosef_tags`
--

CREATE TABLE `i4aj7_mijosef_tags` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL DEFAULT '',
  `alias` varchar(150) NOT NULL DEFAULT '',
  `description` varchar(150) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ordering` int(12) NOT NULL DEFAULT '0',
  `hits` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_mijosef_tags_map`
--

CREATE TABLE `i4aj7_mijosef_tags_map` (
  `url_sef` varchar(255) NOT NULL DEFAULT '',
  `tag` varchar(150) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_mijosef_urls`
--

CREATE TABLE `i4aj7_mijosef_urls` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `url_sef` varchar(255) NOT NULL DEFAULT '',
  `url_real` varchar(255) NOT NULL DEFAULT '',
  `cdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `used` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hits` int(12) unsigned NOT NULL DEFAULT '0',
  `source` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_real` (`url_real`),
  KEY `url_sef` (`url_sef`),
  KEY `used` (`used`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `i4aj7_mijosef_urls`
--

INSERT INTO `i4aj7_mijosef_urls` (`id`, `url_sef`, `url_real`, `cdate`, `mdate`, `used`, `hits`, `source`, `params`) VALUES
(24, 'the-farren.html', 'index.php?option=com_content&Itemid=12&catid=8&id=12&view=article', '2013-11-04 16:49:55', '0000-00-00 00:00:00', 0, 76, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(23, 'the-carrington.html', 'index.php?option=com_content&Itemid=11&catid=8&id=11&view=article', '2013-11-04 16:49:55', '0000-00-00 00:00:00', 0, 78, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(22, 'the-prince.html', 'index.php?option=com_content&Itemid=10&catid=8&id=10&view=article', '2013-11-04 16:49:55', '0000-00-00 00:00:00', 0, 68, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(21, 'caravans-in-stock.html', 'index.php?option=com_content&Itemid=14&catid=8&id=15&view=article', '2013-11-04 16:49:55', '0000-00-00 00:00:00', 0, 192, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(20, 'coronet-caravans.html', 'index.php?option=com_content&Itemid=8&catid=8&id=9&view=article', '2013-11-04 16:49:55', '0000-00-00 00:00:00', 0, 352, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(19, 'regal-caravans.html', 'index.php?option=com_content&Itemid=7&catid=8&id=8&view=article', '2013-11-04 16:49:55', '0000-00-00 00:00:00', 0, 186, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(18, 'pre-owned-caravans.html', 'index.php?option=com_content&Itemid=13&catid=8&id=14&view=article', '2013-11-04 16:49:55', '0000-00-00 00:00:00', 0, 1190, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(17, 'contact-us.html', 'index.php?option=com_content&Itemid=6&catid=8&id=7&view=article', '2013-11-04 16:49:55', '0000-00-00 00:00:00', 0, 204, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(16, 'our-services.html', 'index.php?option=com_content&Itemid=5&catid=8&id=6&view=article', '2013-11-04 16:49:54', '0000-00-00 00:00:00', 0, 162, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(15, 'new-caravans.html', 'index.php?option=com_content&Itemid=3&catid=8&id=4&view=article', '2013-11-04 16:49:54', '0000-00-00 00:00:00', 0, 98, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(14, 'history.html', 'index.php?option=com_content&Itemid=2&catid=8&id=3&view=article', '2013-11-04 16:49:54', '0000-00-00 00:00:00', 0, 278, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(13, '', 'index.php?option=com_content&Itemid=115&view=featured', '2013-11-04 16:49:54', '0000-00-00 00:00:00', 0, 0, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(25, 'home.html', 'index.php?option=com_content&catid=8&id=2&view=article', '2013-11-12 15:47:37', '0000-00-00 00:00:00', 0, 30, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(26, 'home.html', 'index.php?option=com_content&Itemid=0&catid=8&id=2&view=article', '2013-11-12 16:14:27', '0000-00-00 00:00:00', 0, 0, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(27, 'admin', 'admin', '2013-12-29 21:31:58', '0000-00-00 00:00:00', 0, 5, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(28, '404.html', 'index.php?option=com_content&Itemid=99999&catid=8&id=13&view=article', '2013-12-29 21:31:58', '0000-00-00 00:00:00', 0, 0, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(29, '404.html', 'index.php?option=com_content&catid=8&id=13&view=article', '2013-12-29 21:31:59', '0000-00-00 00:00:00', 0, 0, '', '{"custom":0,"published":1,"locked":0,"blocked":0,"trashed":0,"notfound":0,"tags":1,"ilinks":1,"bookmarks":1,"visited":0,"notes":""}'),
(30, 'wp-login.php', 'wp-login.php', '2013-12-29 21:32:00', '0000-00-00 00:00:00', 0, 11, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(31, 'user', 'user', '2013-12-29 21:32:02', '0000-00-00 00:00:00', 0, 5, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(32, 'calendar/install/index.php', 'calendar/install/index.php', '2014-01-19 05:40:40', '0000-00-00 00:00:00', 0, 3, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(33, 'cal/install/index.php', 'cal/install/index.php', '2014-01-19 05:40:45', '0000-00-00 00:00:00', 0, 3, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(34, 'event/install/index.php', 'event/install/index.php', '2014-01-19 05:40:47', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(35, 'events/install/index.php', 'events/install/index.php', '2014-01-19 05:40:48', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(36, 'fbcalendar/install/index.php', 'fbcalendar/install/index.php', '2014-01-19 05:40:49', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(37, 'install/index.php', 'install/index.php', '2014-01-19 05:40:50', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(38, 'menu/install/index.php', 'menu/install/index.php', '2014-01-19 05:40:51', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(39, 'schedule/install/index.php', 'schedule/install/index.php', '2014-01-19 05:40:52', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(40, 'webcalendar/install/index.php', 'webcalendar/install/index.php', '2014-01-19 05:40:53', '0000-00-00 00:00:00', 0, 5, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(41, 'webcal/install/index.php', 'webcal/install/index.php', '2014-01-19 05:40:57', '0000-00-00 00:00:00', 0, 3, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(42, 'web/install/index.php', 'web/install/index.php', '2014-01-19 05:40:59', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(43, 'blog/wp-login.php', 'blog/wp-login.php', '2014-01-26 11:04:28', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(44, 'wordpress/wp-login.php', 'wordpress/wp-login.php', '2014-01-26 11:04:29', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(45, 'wp/wp-login.php', 'wp/wp-login.php', '2014-01-26 11:04:30', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(46, 'test/wp-login.php', 'test/wp-login.php', '2014-01-26 11:04:32', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(47, 'old/wp-login.php', 'old/wp-login.php', '2014-01-26 11:04:33', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(48, 'store/wp-login.php', 'store/wp-login.php', '2014-01-26 11:04:35', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(49, 'phpmyadmin/scripts/setup.php', 'phpmyadmin/scripts/setup.php', '2014-01-26 13:38:05', '0000-00-00 00:00:00', 0, 3, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(50, 'mysqladmin/scripts/setup.php', 'mysqladmin/scripts/setup.php', '2014-01-26 13:38:09', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(51, 'pma/scripts/setup.php', 'pma/scripts/setup.php', '2014-01-26 13:38:11', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(52, 'wp-includes/js/tinymce/themes/advanced/about.htm', 'wp-includes/js/tinymce/themes/advanced/about.htm', '2014-02-22 03:04:17', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}'),
(53, 'weblinks-categories', 'weblinks-categories', '2014-03-19 08:15:53', '0000-00-00 00:00:00', 0, 1, '', '{"custom":0,"published":0,"locked":0,"blocked":0,"trashed":0,"notfound":1,"tags":0,"ilinks":0,"bookmarks":0,"visited":0,"notes":""}');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_mijosef_urls_moved`
--

CREATE TABLE `i4aj7_mijosef_urls_moved` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `url_new` varchar(255) NOT NULL DEFAULT '',
  `url_old` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `hits` int(12) unsigned NOT NULL DEFAULT '0',
  `last_hit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_old` (`url_old`),
  KEY `url_new` (`url_new`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_modules`
--

CREATE TABLE `i4aj7_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) NOT NULL DEFAULT '',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `showtitle` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `i4aj7_modules`
--

INSERT INTO `i4aj7_modules` (`id`, `title`, `note`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `published`, `module`, `access`, `showtitle`, `params`, `client_id`, `language`) VALUES
(1, 'Main Menu', '', '', 2, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 1, 1, '{"menutype":"mainmenu","moduleclass_sfx":"_menu"}', 0, '*'),
(2, 'Login', '', '', 1, 'login', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_login', 1, 1, '', 1, '*'),
(3, 'Popular Articles', '', '', 3, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_popular', 3, 1, '{"count":"5","catid":"","user_id":"0","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1"}', 1, '*'),
(4, 'Recently Added Articles', '', '', 4, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_latest', 3, 1, '{"count":"5","ordering":"c_dsc","catid":"","user_id":"0","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1"}', 1, '*'),
(8, 'Toolbar', '', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_toolbar', 3, 1, '', 1, '*'),
(9, 'Quick Icons', '', '', 1, 'icon', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_quickicon', 3, 1, '', 1, '*'),
(10, 'Logged-in Users', '', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_logged', 3, 1, '{"count":"5","name":"1","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1"}', 1, '*'),
(12, 'Admin Menu', '', '', 1, 'menu', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 3, 1, '{"layout":"","moduleclass_sfx":"","shownew":"1","showhelp":"1","cache":"0"}', 1, '*'),
(13, 'Admin Submenu', '', '', 1, 'submenu', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_submenu', 3, 1, '', 1, '*'),
(14, 'User Status', '', '', 2, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_status', 3, 1, '', 1, '*'),
(15, 'Title', '', '', 1, 'title', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_title', 3, 1, '', 1, '*'),
(16, 'Custom Content', '', '', 3, 'left', 64, '2011-08-22 02:55:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_customcontent', 1, 1, '{"greeting":"1","name":"0"}', 0, '*'),
(17, 'Latest News Intro Text', '', '', 4, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_latestnewsintrotext', 1, 1, '{"count":"5","ordering":"create_dsc","show_front":"1","show_date":"1","truncatedtext":"..."}', 0, '*'),
(18, 'ChronoForms', '', '', 4, 'ContactForm', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_chronocontact', 1, 0, '{"cache":"0","chronoformname":"ContactForm","moduleclass_sfx":""}', 0, '*'),
(19, 'Top Logo and Info', '', '<img alt="regency-logo" src="images/stories/template/regency-logo.png" height="100" width="282" style="float:left;" /><img alt="title-info" src="images/stories/template/title-info.png" height="80" width="291" style="float:right; margin-top:12px;" /><br style="clear:both;" />', 0, 'Top-Title', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_custom', 1, 0, '{"moduleclass_sfx":""}', 0, '*'),
(21, 'Featured', '', '<a href="index.php?option=com_content&amp;view=article&amp;id=9&amp;Itemid=8" class="featured-01"><span><img alt="featured_01" src="images/stories/template/featured-01.jpg" height="180" width="290" /></span></a> <a href="index.php?option=com_content&amp;view=article&amp;id=8&amp;Itemid=7" class="featured-02"><img alt="featured_02" src="images/stories/template/featured-02.jpg" height="180" width="290" /></a> <a href="index.php?option=com_content&amp;view=article&amp;id=14&amp;Itemid=13" class="featured-03"><img alt="featured_03" src="images/stories/template/featured-03.jpg" height="180" width="290" /></a>', 0, 'Top-Featured', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_custom', 1, 0, '{"moduleclass_sfx":""}', 0, '*'),
(22, 'Footer', '', '<div style="float: right; margin-top: -29px; color: #502c6d; font-size: 11px;">© Caravan Country 2013 All Rights Reserved</div>\r\n<p> </p>\r\n<div style="float: right; clear: right; margin-top: -20px; font-size: 11px;"><a href="http://www.earthlinkdesign.com.au/" target="_blank" style="color: #9466b8;">Website Design by</a> <span style="color: #502c6d;">Earthlink Design</span></div>', 2, 'Footer-Bottom', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_custom', 1, 0, '{"prepare_content":"0","backgroundimage":"","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(24, ' Home-Banner-Background', '', '<p><img src="images/stories/template/black-trans-70.png" alt="home-img-placeholder" width="960" height="295" style="position: absolute; z-index: -1;" /></p>\r\n<div id="Rotator-Container"> </div>', 1, 'Top-Banner', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_custom', 1, 0, '{"prepare_content":"0","backgroundimage":"","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(25, 'S5 Image Fader v3', '', '', 3, 'Top-Banner', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', -2, 'mod_s5_imagefader', 1, 0, '{"pretext":"\\r","moduleclass_sfx":"\\r","height":"273\\r","width":"667\\r","tween_time":"1\\r","display_time":"5\\r","background":"\\r","s5_imagefaderver":"1\\r","imageurldirectory":"http:\\/\\/www.regencycaravans.com.au\\/images\\/stories\\/banners\\/\\r","thumbnails":"0\\r","overlaycontrols":"0\\r","imageoverlap":"0\\r","jseffectstyle":"fade\\r","ie9notwork":"1\\r","s5_imagefaderstyle":"1\\r","reflection":"1\\r","picture1":"http:\\/\\/www.regencycaravans.com.au\\/images\\/stories\\/banners\\/banner-01.jpg\\r","picture1link":"\\r","picture1target":"1\\r","picture2":"http:\\/\\/www.regencycaravans.com.au\\/images\\/stories\\/banners\\/banner-02.jpg\\r","picture2link":"\\r","picture2target":"1\\r","picture3":"\\r","picture3link":"\\r","picture3target":"0\\r","picture4":"\\r","picture4link":"\\r","picture4target":"0\\r","picture5":"\\r","picture5link":"\\r","picture5target":"0\\r","picture6":"\\r","picture6link":"\\r","picture6target":"0\\r","picture7":"\\r","picture7link":"\\r","picture7target":"0\\r","picture8":"\\r","picture8link":"\\r","picture8target":"0\\r","picture9":"\\r","picture9link":"\\r","picture9target":"0\\r","picture10":"\\r","picture10link":"\\r","picture10target":"0\\r"}', 0, '*'),
(26, 'Home-Banner-Content', '', '<div id="Banner-Content"><img src="images/stories/template/this-weeks-special.jpg" alt="this-weeks-special" width="270" height="46" /></div>', 4, 'Top-Banner', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_custom', 1, 0, '{"prepare_content":"0","backgroundimage":"","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(27, 'EXP Autos - Cat Drop Down', '', '', 5, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_expautos_catdropdown', 1, 1, '{"show_count":"1"}', 0, '*'),
(28, 'EXP Autos - Stats', '', '', 6, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_expautos_stats', 1, 1, '{"showCatAll":"1"}', 0, '*'),
(29, 'EXP Autos - Categories', '', '', 7, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_expautos_categories', 1, 1, '{"showCount":"1"}', 0, '*'),
(30, 'EXP Autos - New Search', '', '', 8, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_expautos_newsearch', 1, 1, '{"show_name":"1","expnsname":"New Search","show_zip":"1"}', 0, '*'),
(31, 'EXP Autos Top Images', '', '', 6, 'Top-Banner', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_expautos_topimages', 1, 0, '{"moduleclass_sfx":"","imgcount":"5","imgcolumn":"5","showtitle":"0","titlename":"Your Title","catsort":"0","imgsort":"2","imggroupby":"id","imgorderby":"DESC"}', 0, '*'),
(32, 'EXP Autos First Images', '', '', 10, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_expautos_images', 1, 1, '{"imgcount":"5","imgcolumn":"5","imggroupby":"id","imgorderby":"DESC"}', 0, '*'),
(33, 'EXP Autos - RSS', '', '', 11, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_expautos_rss', 1, 1, '', 0, '*'),
(34, 'EXP Autos Top Images Sumo', '', '', 12, 'left', 64, '2011-08-22 02:52:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_expautos_topimages_sumo', 1, 1, '{"imgcount":"5","imgcolumn":"5","widthcolumn":"250","newdate":"3","imggroupby":"id","imgorderby":"DESC"}', 0, '*'),
(35, 'EXP Autos jQuery Top Images', '', '', 13, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_expautos_jqtopimages', 1, 1, '{"imgcount":"5","titlename":"Your Title","imggroupby":"id","imgorderby":"DESC"}', 0, '*'),
(36, 'EXP Autos - Search', '', '', 14, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_expautos_search', 1, 1, '{"minyearnum":"1950","show_advsearch":"1","show_id":"1","show_vincode":"1","show_condit":"1","show_smodel":"1","show_btype":"1","show_year":"1","show_price":"1","show_mileag":"1","show_fuel":"1","show_trans":"1","show_locat":"1","show_dealer":"1","show_zip":"1","show_radius":"1","show_ageof":"1","show_sortby":"1"}', 0, '*'),
(37, 'EXP Autos Left Images', '', '', 15, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_expautos_leftimages', 1, 1, '{"imgcount":"5","imggroupby":"id","imgorderby":"DESC"}', 0, '*'),
(38, 'EXP Autos - Share', '', '', 16, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_expautos_share', 1, 1, '{"globaltop":"440","verttop":"20"}', 0, '*'),
(39, 'EXP Autos Keyword Search', '', '', 17, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_exputos_keyword', 1, 1, '{"width":"20"}', 0, '*'),
(40, 'EXP Autos - Menu', '', '', 18, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_expautos_menu', 1, 1, '{"showDealer":"1","showAdVehicle":"1","showMyVehicle":"1"}', 0, '*'),
(41, 'EXP Autos Slide Nivo', '', '', 19, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_expautos_slidenivo', 1, 1, '{"imgcount":"5","imgeffect":"random","imganimspeed":"500","imgpausetime":"3000","imgdirnav":"1","imgcntnav":"1","imgponhover":"1","imgcapopacity":"0.8","imggroupby":"id","imgorderby":"DESC"}', 0, '*'),
(45, 'HiddenMenu', '', '', 1, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_menu', 1, 1, '{"menutype":"HiddenMenu"}', 0, '*'),
(47, 'Carsales Wrapper', '', '', 1, 'carsales', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_wrapper', 1, 0, '{"url":"http:\\/\\/regencycaravans.caravancampingsales.com.au\\/listing-content","add":"0","scrolling":"yes","width":"1000","height":"4000","height_auto":"0","frameborder":"1","target":"","layout":"_:default","moduleclass_sfx":"","cache":"0","cache_time":"900","cachemode":"static","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(48, 'Instock Wrapper', '', '', 1, 'instock', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_wrapper', 1, 0, '{"url":"http:\\/\\/regencycaravans.caravancampingsales.com.au\\/listing-content?~StockCategory|~StockSubCategory|~Make|~Model|~FormattedDescription=&AdvertDetails__mb__Product_Details__mb__Listing_Type=New&StockCategory=&StockSubCategory=&Make=&_min_StockPrice=&_max_StockPrice=&_min_Year=&_max_Year=&_as=1","add":"1","scrolling":"auto","width":"1000","height":"4000","height_auto":"0","frameborder":"0","target":"","layout":"_:default","moduleclass_sfx":"","cache":"0","cache_time":"900","cachemode":"static","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(79, 'Multilanguage status', '', '', 1, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_multilangstatus', 3, 1, '{"layout":"_:default","moduleclass_sfx":"","cache":"0"}', 1, '*'),
(86, 'Joomla Version', '', '', 1, 'footer', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_version', 3, 1, '{"format":"short","product":"1","layout":"_:default","moduleclass_sfx":"","cache":"0"}', 1, '*'),
(87, 'ChronoForms', '', '', 1, 'ContactForm', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_chronoforms', 1, 0, '{"cache":"0","chronoform":"ContactForm","moduleclass_sfx":"","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(89, 'Top Menu', '', '', 1, 'Top-Menu', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_swmenupro', 1, 0, '{"moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(90, 'Footer Menu', '', '', 1, 'Footer-Bottom', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_swmenupro', 1, 0, '{"moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(91, 'S5 Image Fader v3', '', '', 5, 'Top-Banner', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_s5_imagefader', 1, 0, '{"pretext":"","moduleclass_sfx":"","height":"273","width":"667","tween_time":"1","display_time":"5","background":"","s5_imagefaderver":"1","imageurldirectory":"images\\/stories\\/banners\\/","thumbnails":"0","overlaycontrols":"0","imageoverlap":"0","jseffectstyle":"fade","s5_imagefaderstyle":"1","reflection":"1","picture1":"images\\/stories\\/banners\\/banner-01.jpg","picture1link":"","picture1target":"0","picture2":"images\\/stories\\/banners\\/banner-02.jpg","picture2link":"","picture2target":"0","picture3":"","picture3link":"","picture3target":"0","picture4":"","picture4link":"","picture4target":"0","picture5":"","picture5link":"","picture5target":"0","picture6":"","picture6link":"","picture6target":"0","picture7":"","picture7link":"","picture7target":"0","picture8":"","picture8link":"","picture8target":"0","picture9":"","picture9link":"","picture9target":"0","picture10":"","picture10link":"","picture10target":"0","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(92, 'ARI Image Slider', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_ariimageslider', 1, 1, '', 0, '*'),
(93, 'Regal Caravans Gallery', '', '', 1, 'regalgallery', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_twojtoolbox', 1, 0, '{"type":"gallery","id":"1","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static","twojInclude":"0","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(94, 'Prince Gallery', '', '', 1, 'princegallery', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_twojtoolbox', 1, 0, '{"type":"gallery","id":"4","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static","twojInclude":"0","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(95, 'Carrington Gallery', '', '', 1, 'carringtongallery', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_twojtoolbox', 1, 0, '{"type":"gallery","id":"3","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static","twojInclude":"0","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(96, 'Farren Gallery', '', '', 1, 'farrengallery', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_twojtoolbox', 1, 0, '{"type":"gallery","id":"2","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static","twojInclude":"0","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(97, 'MijoSEF - Quick Icons', '', '', 0, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_mijosef_quickicons', 1, 1, '', 1, '*'),
(98, 'RSFirewall! Control Panel Module', '', '', 1, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_rsfirewall', 1, 1, '', 1, '*'),
(99, 'Akeeba Backup Notification Module', '', '', 2, 'icon', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_akadmin', 1, 1, '', 1, '*'),
(101, 'NoNumber Cache Cleaner', '', '', 4, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_cachecleaner', 3, 1, '', 1, '*'),
(102, 'JM Slideshow Responsive', '', '', 2, 'Top-Banner', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_jmslideshow', 1, 0, '{"jmslideshow_responsive":"1","jmslideshow_width":"700","jmslideshow_image_width":"667","jmslideshow_image_height":"273","jmslideshow_image_style":"fit","moduleclass_sfx":"","slider_source":"1","jmslideshow_categories":["9"],"jmslideshow_article_ids":"","jmslideshow_k2_ids":"","jmslideshow_hikashop_ids":"","jmslideshow_file_image_url":"","jmslideshow_file_image_title":"","jmslideshow_file_image_title_link":"","jmslideshow_file_image_desc":"","jmslideshow_file_image":"","jmslideshow_foder_image":"","jmslideshow_image_source":"0","jmslideshow_article_image_source":"1","jmslideshow_ordering":"ASC","jmslideshow_orderby":"1","jmslideshow_count":"5","jmslideshow_layout":"default","jmslideshow_effect":"fade","jmslideshow_speed":"500","jmslideshow_auto":"1","jmslideshow_timeout":"5000","jmslideshow_caption_position":"topleft","jmslideshow_caption_left":"30","jmslideshow_caption_top":"30","jmslideshow_caption_right":"30","jmslideshow_caption_bottom":"30","jmslideshow_caption_width":"500","jmslideshow_desc_length":"150","jmslideshow_desc_html":"","jmslideshow_readmore_text":"Read more","jmslideshow_show_nav_buttons":"1","jmslideshow_show_pager":"0","jmslideshow_pager_type":"1","jmslideshow_pager_position":"bottomleft","jmslideshow_image_thumbnail_width":"100","jmslideshow_image_thumbnail_height":"65","jmslideshow_pager_left":"30","jmslideshow_pager_top":"30","jmslideshow_pager_right":"30","jmslideshow_pager_bottom":"30","jmslideshow_include_jquery":"2","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(103, 'NoNumber Add to Menu', '', '', 3, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_addtomenu', 3, 1, '', 1, '*');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_modules_menu`
--

CREATE TABLE `i4aj7_modules_menu` (
  `moduleid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`moduleid`,`menuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i4aj7_modules_menu`
--

INSERT INTO `i4aj7_modules_menu` (`moduleid`, `menuid`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0),
(24, 115),
(25, 0),
(26, 115),
(27, 0),
(28, 0),
(29, 0),
(30, 0),
(31, 0),
(32, 0),
(33, 0),
(34, 0),
(35, 0),
(36, 0),
(37, 0),
(38, 0),
(39, 0),
(40, 0),
(41, 0),
(45, 0),
(47, 0),
(48, 0),
(79, 0),
(86, 0),
(87, 0),
(89, 0),
(90, 0),
(91, 115),
(93, 0),
(94, 0),
(95, 0),
(96, 0),
(97, 0),
(98, 0),
(99, 0),
(100, 0),
(101, 0),
(102, 0),
(103, 0);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_newsfeeds`
--

CREATE TABLE `i4aj7_newsfeeds` (
  `catid` int(11) NOT NULL DEFAULT '0',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `link` varchar(200) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `numarticles` int(10) unsigned NOT NULL DEFAULT '1',
  `cache_time` int(10) unsigned NOT NULL DEFAULT '3600',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rtl` tinyint(4) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `images` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`published`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_oneclickaction_actions`
--

CREATE TABLE `i4aj7_oneclickaction_actions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) unsigned NOT NULL,
  `actionurl` varchar(4000) NOT NULL,
  `otp` char(64) NOT NULL,
  `expiry` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_overrider`
--

CREATE TABLE `i4aj7_overrider` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `constant` varchar(255) NOT NULL,
  `string` text NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_redirect_links`
--

CREATE TABLE `i4aj7_redirect_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `old_url` varchar(255) NOT NULL,
  `new_url` varchar(255) NOT NULL,
  `referer` varchar(150) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_link_old` (`old_url`),
  KEY `idx_link_modifed` (`modified_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_rsfirewall_configuration`
--

CREATE TABLE `i4aj7_rsfirewall_configuration` (
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `type` varchar(16) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i4aj7_rsfirewall_configuration`
--

INSERT INTO `i4aj7_rsfirewall_configuration` (`name`, `value`, `type`) VALUES
('active_scanner_status', '1', 'int'),
('capture_backend_password', '1', 'int'),
('verify_upload', '1', 'int'),
('verify_upload_blacklist_exts', 'php\r\njs\r\nexe\r\ncom\r\nbat\r\ncmd\r\nmp3', 'text'),
('monitor_core', '1', 'int'),
('monitor_users', '706', 'array-int'),
('active_scanner_status_backend', '1', 'int'),
('backend_password_enabled', '0', 'int'),
('backend_password', 'c800cae7cdf2ae34f095f974c3331411', 'text'),
('log_emails', 'andrew@earthlinkdesign.com.au', 'text'),
('log_alert_level', 'critical', 'array-text'),
('log_history', '30', 'int'),
('log_overview', '5', 'int'),
('verify_agents', 'perl\ncurl\njava', 'array-text'),
('verify_multiple_exts', '1', 'int'),
('capture_backend_login', '1', 'int'),
('code', '', 'text'),
('verify_generator', '1', 'int'),
('grade', '0', 'int'),
('verify_emails', '0', 'int'),
('offset', '300', 'int'),
('enable_backend_captcha', '0', 'int'),
('backend_captcha', '3', 'int'),
('blocked_countries', '', 'array-text'),
('autoban_attempts', '10', 'int'),
('enable_autoban', '1', 'int'),
('enable_autoban_login', '1', 'int'),
('log_hour_limit', '50', 'int'),
('log_emails_count', '0', 'int'),
('log_emails_send_after', '0', 'int'),
('lfi', '1', 'int'),
('rfi', '1', 'int'),
('enable_php_for', 'get', 'array-text'),
('enable_sql_for', 'get', 'array-text'),
('enable_js_for', 'post', 'array-text'),
('filter_js', '1', 'int'),
('filter_uploads', '1', 'int'),
('disable_installer', '0', 'int'),
('disable_new_admin_users', '0', 'int'),
('admin_users', '', 'array-int');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_rsfirewall_exceptions`
--

CREATE TABLE `i4aj7_rsfirewall_exceptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(4) NOT NULL,
  `regex` tinyint(1) NOT NULL,
  `match` text NOT NULL,
  `php` tinyint(1) NOT NULL,
  `sql` tinyint(1) NOT NULL,
  `js` tinyint(1) NOT NULL,
  `uploads` tinyint(1) NOT NULL,
  `reason` text NOT NULL,
  `date` datetime NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_rsfirewall_feeds`
--

CREATE TABLE `i4aj7_rsfirewall_feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `limit` tinyint(4) NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `i4aj7_rsfirewall_feeds`
--

INSERT INTO `i4aj7_rsfirewall_feeds` (`id`, `url`, `limit`, `ordering`, `published`) VALUES
(1, 'http://feeds.joomla.org/JoomlaSecurityNews', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_rsfirewall_hashes`
--

CREATE TABLE `i4aj7_rsfirewall_hashes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` text NOT NULL,
  `hash` varchar(32) NOT NULL,
  `type` varchar(64) NOT NULL,
  `flag` varchar(1) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `i4aj7_rsfirewall_hashes`
--

INSERT INTO `i4aj7_rsfirewall_hashes` (`id`, `file`, `hash`, `type`, `flag`, `date`) VALUES
(1, 'plugins/user/joomla/joomla.php', '37c680d3f1965de56b6907731392055f', '2.5.7', '', ''),
(2, 'plugins/authentication/joomla/joomla.php', '493aa7e7fdcc8810d20c852ac8793ca5', '2.5.7', '', ''),
(3, 'index.php', '7b8842445269965a434c7bae60db279d', '2.5.7', '', ''),
(4, 'administrator/index.php', '43aa843ec0f3bbb0c0ee7654378a6470', '2.5.7', '', ''),
(5, 'plugins/user/joomla/joomla.php', '37c680d3f1965de56b6907731392055f', '2.5.8', '', ''),
(6, 'plugins/authentication/joomla/joomla.php', '493aa7e7fdcc8810d20c852ac8793ca5', '2.5.8', '', ''),
(7, 'index.php', '7b8842445269965a434c7bae60db279d', '2.5.8', '', ''),
(8, 'administrator/index.php', '43aa843ec0f3bbb0c0ee7654378a6470', '2.5.8', '', ''),
(9, 'plugins/user/joomla/joomla.php', '37c680d3f1965de56b6907731392055f', '2.5.9', '', ''),
(10, 'plugins/authentication/joomla/joomla.php', 'ac4e4c99f29c34feffabfa7521ca1c06', '2.5.9', '', ''),
(11, 'index.php', '9d9b87b6e0d9e7caa1bddb5c34fd2097', '2.5.9', '', ''),
(12, 'administrator/index.php', '49008f8372adc026f2c4229c4dddb717', '2.5.9', '', ''),
(13, 'plugins/user/joomla/joomla.php', '37c680d3f1965de56b6907731392055f', '2.5.10', '', ''),
(14, 'plugins/authentication/joomla/joomla.php', 'ac4e4c99f29c34feffabfa7521ca1c06', '2.5.10', '', ''),
(15, 'index.php', '9d9b87b6e0d9e7caa1bddb5c34fd2097', '2.5.10', '', ''),
(16, 'administrator/index.php', '49008f8372adc026f2c4229c4dddb717', '2.5.10', '', ''),
(17, 'plugins/user/joomla/joomla.php', '37c680d3f1965de56b6907731392055f', '2.5.11', '', ''),
(18, 'plugins/authentication/joomla/joomla.php', 'ac4e4c99f29c34feffabfa7521ca1c06', '2.5.11', '', ''),
(19, 'index.php', '9d9b87b6e0d9e7caa1bddb5c34fd2097', '2.5.11', '', ''),
(20, 'administrator/index.php', '49008f8372adc026f2c4229c4dddb717', '2.5.11', '', ''),
(21, 'plugins/user/joomla/joomla.php', 'cdc25e22efba44c2ee96765f7f29fc94', '3.0.0', '', ''),
(22, 'plugins/authentication/joomla/joomla.php', '8ed6639864a180fbc2206a44441a8b7d', '3.0.0', '', ''),
(23, 'index.php', '5ef1a5edf66502c473de1439650b7157', '3.0.0', '', ''),
(24, 'administrator/index.php', 'ee513c632afbd46b64cb6ddb11579862', '3.0.0', '', ''),
(25, 'plugins/user/joomla/joomla.php', 'cdc25e22efba44c2ee96765f7f29fc94', '3.0.1', '', ''),
(26, 'plugins/authentication/joomla/joomla.php', '8ed6639864a180fbc2206a44441a8b7d', '3.0.1', '', ''),
(27, 'index.php', '5ef1a5edf66502c473de1439650b7157', '3.0.1', '', ''),
(28, 'administrator/index.php', 'ee513c632afbd46b64cb6ddb11579862', '3.0.1', '', ''),
(29, 'plugins/user/joomla/joomla.php', 'cdc25e22efba44c2ee96765f7f29fc94', '3.0.2', '', ''),
(30, 'plugins/authentication/joomla/joomla.php', '8ed6639864a180fbc2206a44441a8b7d', '3.0.2', '', ''),
(31, 'index.php', '5ef1a5edf66502c473de1439650b7157', '3.0.2', '', ''),
(32, 'administrator/index.php', 'ee513c632afbd46b64cb6ddb11579862', '3.0.2', '', ''),
(33, 'plugins/user/joomla/joomla.php', '9fd830d97736f5f7536f6f9c7e180995', '3.0.3', '', ''),
(34, 'plugins/authentication/joomla/joomla.php', '6f323887899ea20d4dc5a42ef99b9176', '3.0.3', '', ''),
(35, 'index.php', 'd5a79d6d4694694a225a6b9a678ec6b1', '3.0.3', '', ''),
(36, 'administrator/index.php', '3527f9b34bd165f74e91c9425e8cc85a', '3.0.3', '', ''),
(37, 'plugins/user/joomla/joomla.php', '9fd830d97736f5f7536f6f9c7e180995', '3.0.4', '', ''),
(38, 'plugins/authentication/joomla/joomla.php', '6f323887899ea20d4dc5a42ef99b9176', '3.0.4', '', ''),
(39, 'index.php', 'd5a79d6d4694694a225a6b9a678ec6b1', '3.0.4', '', ''),
(40, 'administrator/index.php', '3527f9b34bd165f74e91c9425e8cc85a', '3.0.4', '', ''),
(41, 'plugins/user/joomla/joomla.php', '3cd9d1f8beff4cad347fe808d8e48acf', '3.1.0', '', ''),
(42, 'plugins/authentication/joomla/joomla.php', '37ef6204d8dfcd41b5d7fd7f97cdf526', '3.1.0', '', ''),
(43, 'index.php', 'd5a79d6d4694694a225a6b9a678ec6b1', '3.1.0', '', ''),
(44, 'administrator/index.php', '3527f9b34bd165f74e91c9425e8cc85a', '3.1.0', '', ''),
(45, 'plugins/user/joomla/joomla.php', '3cd9d1f8beff4cad347fe808d8e48acf', '3.1.1', '', ''),
(46, 'plugins/authentication/joomla/joomla.php', '37ef6204d8dfcd41b5d7fd7f97cdf526', '3.1.1', '', ''),
(47, 'index.php', 'd5a79d6d4694694a225a6b9a678ec6b1', '3.1.1', '', ''),
(48, 'administrator/index.php', '3527f9b34bd165f74e91c9425e8cc85a', '3.1.1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_rsfirewall_ignored`
--

CREATE TABLE `i4aj7_rsfirewall_ignored` (
  `path` text NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_rsfirewall_lists`
--

CREATE TABLE `i4aj7_rsfirewall_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(64) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`),
  KEY `published` (`published`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_rsfirewall_logs`
--

CREATE TABLE `i4aj7_rsfirewall_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` enum('low','medium','high','critical') NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `page` text NOT NULL,
  `referer` text NOT NULL,
  `code` varchar(255) NOT NULL,
  `debug_variables` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `i4aj7_rsfirewall_logs`
--

INSERT INTO `i4aj7_rsfirewall_logs` (`id`, `level`, `date`, `ip`, `user_id`, `username`, `page`, `referer`, `code`, `debug_variables`) VALUES
(1, 'low', '2013-11-04 05:45:38', '124.180.207.127', 706, 'edadmin', 'http://www.caravancountry.com.au/administrator/index.php', 'http://www.caravancountry.com.au/administrator/index.php?option=com_rsfirewall&view=configuration', 'BACKEND_LOGIN_OK', ''),
(2, 'medium', '2013-11-06 04:10:48', '113.61.73.234', 0, '', 'http://www.caravancountry.com.au/administrator/index.php', 'http://www.caravancountry.com.au/administrator/', 'BACKEND_LOGIN_ERROR', ''),
(3, 'medium', '2013-11-06 04:14:55', '113.61.73.234', 0, '', 'http://www.caravancountry.com.au/administrator/index.php', 'http://www.caravancountry.com.au/administrator/', 'BACKEND_LOGIN_ERROR', ''),
(4, 'low', '2013-11-06 04:23:24', '124.180.207.127', 0, '', 'http://www.caravancountry.com.au/administrator/index.php', 'http://www.caravancountry.com.au/administrator/index.php', 'BACKEND_LOGIN_OK', ''),
(5, 'medium', '2013-11-06 04:28:43', '113.61.73.234', 0, '', 'http://www.caravancountry.com.au/administrator/index.php', 'http://www.caravancountry.com.au/administrator/', 'BACKEND_LOGIN_ERROR', ''),
(6, 'low', '2013-11-06 04:30:28', '113.61.73.234', 0, '', 'http://www.caravancountry.com.au/administrator/index.php', 'http://www.caravancountry.com.au/administrator/index.php', 'BACKEND_LOGIN_OK', ''),
(7, 'low', '2013-11-06 04:44:45', '113.61.73.234', 0, '', 'http://www.caravancountry.com.au/administrator/index.php', 'http://www.caravancountry.com.au/administrator/index.php', 'BACKEND_LOGIN_OK', ''),
(8, 'low', '2013-11-11 11:00:02', '138.217.80.58', 0, '', 'http://www.caravancountry.com.au/administrator/index.php', 'http://www.caravancountry.com.au/administrator/', 'BACKEND_LOGIN_OK', ''),
(9, 'low', '2013-11-24 22:48:33', '113.61.73.234', 0, '', 'http://www.caravancountry.com.au/administrator/index.php', 'http://www.caravancountry.com.au/administrator/', 'BACKEND_LOGIN_OK', ''),
(10, 'low', '2013-11-24 22:54:19', '113.61.73.234', 0, '', 'http://www.caravancountry.com.au/administrator/index.php', 'http://www.caravancountry.com.au/administrator/index.php', 'BACKEND_LOGIN_OK', ''),
(11, 'low', '2014-01-04 05:11:30', '113.61.73.234', 0, '', 'http://www.caravancountry.com.au/administrator/index.php', 'http://www.caravancountry.com.au/administrator/', 'BACKEND_LOGIN_OK', ''),
(12, 'low', '2014-01-04 05:39:22', '113.61.73.234', 0, '', 'http://www.caravancountry.com.au/administrator/index.php', 'http://www.caravancountry.com.au/administrator/', 'BACKEND_LOGIN_OK', ''),
(13, 'low', '2014-01-16 03:30:40', '60.230.122.163', 0, '', 'http://www.caravancountry.com.au/administrator/index.php', 'http://www.caravancountry.com.au/administrator/', 'BACKEND_LOGIN_OK', ''),
(14, 'low', '2014-03-19 02:58:00', '124.180.106.217', 0, '', 'http://www.caravancountry.com.au/administrator/index.php', 'http://www.caravancountry.com.au/administrator/', 'BACKEND_LOGIN_OK', ''),
(15, 'low', '2014-03-19 04:28:18', '::1', 0, '', 'http://localhost:8888/joomla_devel/caravancountry/administrator/index.php', 'http://localhost:8888/joomla_devel/caravancountry/administrator/index.php', 'BACKEND_LOGIN_OK', ''),
(16, 'medium', '2014-03-19 11:31:07', '::1', 0, '', 'http://localhost:8888/joomla_devel/caravancountry/administrator/index.php', 'http://localhost:8888/joomla_devel/caravancountry/administrator/index.php?option=com_cache&view=purge', 'BACKEND_LOGIN_ERROR', ''),
(17, 'low', '2014-03-19 11:31:13', '::1', 0, '', 'http://localhost:8888/joomla_devel/caravancountry/administrator/index.php', 'http://localhost:8888/joomla_devel/caravancountry/administrator/index.php', 'BACKEND_LOGIN_OK', '');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_rsfirewall_offenders`
--

CREATE TABLE `i4aj7_rsfirewall_offenders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(64) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_rsfirewall_signatures`
--

CREATE TABLE `i4aj7_rsfirewall_signatures` (
  `signature` varchar(255) NOT NULL,
  `type` varchar(16) NOT NULL,
  `reason` varchar(255) NOT NULL,
  PRIMARY KEY (`signature`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i4aj7_rsfirewall_signatures`
--

INSERT INTO `i4aj7_rsfirewall_signatures` (`signature`, `type`, `reason`) VALUES
('eval\\(base64_decode\\((?s).*?\\)\\)', 'regex', 'Possible PHP injection (encoded code - base64)'),
('\\(gzinflate\\(base64_decode\\((?s).*\\)', 'regex', 'Possible PHP injection (compressed code - gzip)'),
('str_rot13\\(base64_decode\\((?s).*?\\)\\)', 'regex', 'Possible PHP injection (encoded code - str_rot13())'),
('strrev\\(base64_decode\\((?s).*?\\)\\)', 'regex', 'Possible PHP injection (encoded code - strrev())'),
('eval\\(stripslashes\\(\\$_(.*?)\\)\\)', 'regex', 'Possible PHP injection (code executed from superglobal variable)'),
('eval\\(\\$_(.*?)\\)', 'regex', 'Possible PHP injection (code executed from superglobal variable)'),
('_il_exec\\(\\)', 'regex', 'Possible risk - ionCube encrypted file'),
('header(\\s+)?\\(["|''](l|L)ocation:(\\s+)?http:(.*?)\\)', 'regex', 'Possible PHP injection (redirect)'),
('\\$wp_add_filter\\(', 'regex', 'PHP injection (obfuscated code)'),
('if\\(function_exists\\(''ob_start''\\)&&!isset\\(\\$GLOBALS\\[(.*?)\\]\\)\\){\\$GLOBALS\\[(.*?)\\]=', 'regex', 'PHP injection'),
('\\$_[a-zA-Z]=__FILE__;\\$_[a-zA-Z]=', 'regex', 'PHP injection (obfuscated code)'),
('mail(\\s+)?\\(("|'')(.*@)', 'regex', 'Possible PHP injection (mailer)'),
('strrev\\((''|")edoced_46esab(''|")\\)', 'regex', 'Possible PHP injection (obfuscated code)'),
('(shell_exec|passthru|system|exec|popen)\\s?\\((''|")(wget|lynx|links|curl)', 'regex', 'Possible PHP Injection (file download)'),
('<script .*?src=["|'']https?://(.*)["|'']', 'regex', 'Suspicious JS inclusion'),
('bash_history', 'filename', 'Possible hijacked server'),
('bitchx', 'filename', 'IRC Client - possible hijacked server'),
('brute *force', 'filename', 'Bruteforce'),
('c99shell', 'filename', 'PHP Shell'),
('cwings', 'filename', 'PHP Shell'),
('DALnet', 'filename', 'IRC Client - possible hijacked server'),
('directmail', 'filename', 'Mailer - possible hijacked server'),
('eggdrop', 'filename', 'IRC Bot - possible hijacked server'),
('guardservices', 'filename', 'Possible hijacked server'),
('m0rtix', 'filename', 'Backdoor - possible hijacked server'),
('phpremoteview', 'filename', 'PHP Shell'),
('phpshell', 'filename', 'PHP Shell'),
('psyBNC', 'filename', 'IRC Client - possible hijacked server'),
('r0nin', 'filename', 'Exploit - possible hijacked server'),
('w00t', 'filename', 'Exploit - possible hijacked server'),
('r57shell', 'filename', 'PHP Shell'),
('raslan58', 'filename', 'Possible hijacked server'),
('spymeta', 'filename', 'Possible hijacked server'),
('shellbot', 'filename', 'Backdoor - possible hijacked server'),
('undernet', 'filename', 'IRC Client - possible hijacked server'),
('void\\.ru', 'filename', 'Possible hijacked server'),
('vulnscan', 'filename', 'Vulnerability Scanner - possible hijacked server'),
('\\.ru/', 'filename', 'Possible hijacked server'),
('r57\\.gen\\.tr', 'regex', 'PHP Shell - General variant'),
('h4cker\\.tr', 'regex', 'PHP Shell - General variant'),
('\\$QBDB51E25BF9A7F3D2475072803D1C36D', 'regex', 'PHP Shell - c99shell variant compressed'),
('antichat', 'filename', 'PHP Shell - c99shell Antichat variant'),
('PHPencoder', 'regex', 'PHP Encoded file - PHPencoder variant, please review manually'),
('ccteam\\.ru', 'regex', 'PHP Shell - c99shell variant'),
('c99shell', 'regex', 'PHP Shell - c99shell variant'),
('act=phpinfo', 'regex', 'PHP Shell - c99shell variant'),
('cgi', 'filename', 'PHP Shell - c99shell Cgi variant'),
('CWShellDumper', 'filename', 'PHP Shell - c99shell CWShellDumper variant'),
('ekin0x', 'filename', 'PHP Shell - c99shell ekin0x variant'),
('kacak', 'filename', 'PHP Shell - c99shell kacak variant'),
('liz0zim', 'filename', 'PHP Shell - c99shell liz0zim variant'),
('r57shell', 'regex', 'PHP Shell - r57shell variant'),
('\\/etc\\/passwd', 'regex', 'PHP Shell - suspicious code'),
('ps -aux', 'regex', 'PHP Shell - suspicious code'),
('\\$_POST\\[''cmd''\\]\\=\\="php_eval"', 'regex', 'PHP Shell - r57shell variant'),
('safe0ver', 'filename', 'PHP Shell - c99shell safe0ver variant'),
('\\$_GET\\[''sws''\\]\\=\\= ''phpinfo''', 'regex', 'PHP Shell - Saudi Sh3ll variant'),
('Saudi Sh3ll', 'filename', 'PHP Shell - Saudi Sh3ll variant'),
('sosyete', 'filename', 'PHP Shell - c99shell sosyete variant'),
('tryag', 'filename', 'PHP Shell - c99shell tryag variant'),
('zehir4', 'filename', 'PHP Shell - c99shell zehir4 variant'),
('create\\_function\\(\\''\\$\\''(.*)', 'regex', 'Possible PHP injection (create_function() call)'),
('Upload Gagal', 'regex', 'PHP Shell - File uploader'),
('^GIF89;([^\\n]*\\n+)+(\\<\\?php)', 'regex', 'PHP injection - Hidden inside GIF file'),
('exec\\((.*)\\/bin\\/sh', 'regex', 'Possible PHP Injection (shell execution)'),
('preg_replace\\("/\\.\\*/e"', 'regex', 'Possible PHP injection (obfuscated code using /e modifier)'),
('\\("/[a-zA-Z0-9]+/e",', 'regex', 'Possible PHP injection (obfuscated code using /e modifier)'),
('ob_start\\("callbck"\\)', 'regex', 'PHP Injection'),
('eval\\("\\?\\>"\\.base64_decode', 'regex', 'Possible PHP injection (encoded code - base64)'),
('eval[\\s]?\\([\\s]?base64_decode\\([\\s]?.*?\\)\\)', 'regex', 'Possible PHP injection (encoded code - base64)'),
('(wget|lynx|links|curl) https?:\\/\\/.*?; perl .*?', 'regex', 'Possible PHP Injection (file download and execution)'),
('(wget|lynx|links|curl) https?:\\/\\/.*?; chmod .*?; \\.\\/', 'regex', 'Possible PHP Injection (file download and execution)');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_rsfirewall_snapshots`
--

CREATE TABLE `i4aj7_rsfirewall_snapshots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `snapshot` text NOT NULL,
  `type` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `i4aj7_rsfirewall_snapshots`
--

INSERT INTO `i4aj7_rsfirewall_snapshots` (`id`, `user_id`, `snapshot`, `type`) VALUES
(3, 706, 'Tzo4OiJzdGRDbGFzcyI6OTp7czo4OiJhZGphY2VudCI7YToxOntzOjE4OiJ1c2VyX3VzZXJncm91cF9tYXAiO2E6MTp7aTowO086ODoic3RkQ2xhc3MiOjI6e3M6NzoidXNlcl9pZCI7czozOiI3MDYiO3M6ODoiZ3JvdXBfaWQiO3M6MToiOCI7fX19czo3OiJ1c2VyX2lkIjtzOjM6IjcwNiI7czo0OiJuYW1lIjtzOjEwOiJTdXBlciBVc2VyIjtzOjg6InVzZXJuYW1lIjtzOjc6ImVkYWRtaW4iO3M6NToiZW1haWwiO3M6Mjk6ImFuZHJld0BlYXJ0aGxpbmtkZXNpZ24uY29tLmF1IjtzOjg6InBhc3N3b3JkIjtzOjY1OiJhNWI2OTZjODg2MTVhODM3ZjhlYmIzZTQwYjE1MThkYTp2ZlpEYjBoOHRWMG1DUE1kYW9zRTc3djY2cEFFVzA0aSI7czo1OiJibG9jayI7czoxOiIwIjtzOjk6InNlbmRFbWFpbCI7czoxOiIxIjtzOjY6InBhcmFtcyI7czowOiIiO30=', 'protect');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_schemas`
--

CREATE TABLE `i4aj7_schemas` (
  `extension_id` int(11) NOT NULL,
  `version_id` varchar(20) NOT NULL,
  PRIMARY KEY (`extension_id`,`version_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i4aj7_schemas`
--

INSERT INTO `i4aj7_schemas` (`extension_id`, `version_id`) VALUES
(700, '3.1.5'),
(10012, '1.0.8'),
(10025, '3.6.0-2012-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_session`
--

CREATE TABLE `i4aj7_session` (
  `session_id` varchar(200) NOT NULL DEFAULT '',
  `client_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `guest` tinyint(4) unsigned DEFAULT '1',
  `time` varchar(14) DEFAULT '',
  `data` mediumtext,
  `userid` int(11) DEFAULT '0',
  `username` varchar(150) DEFAULT '',
  PRIMARY KEY (`session_id`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i4aj7_session`
--

INSERT INTO `i4aj7_session` (`session_id`, `client_id`, `guest`, `time`, `data`, `userid`, `username`) VALUES
('0403f33af1bb4fef2aca6f3829b934b2', 0, 1, '1395382354', '__default|a:8:{s:15:"session.counter";i:21;s:19:"session.timer.start";i:1395381443;s:18:"session.timer.last";i:1395382292;s:17:"session.timer.now";i:1395382354;s:22:"session.client.browser";s:81:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:27.0) Gecko/20100101 Firefox/27.0";s:8:"registry";O:9:"JRegistry":1:{s:7:"\\0\\0\\0data";O:8:"stdClass":1:{s:15:"com_twojtoolbox";O:8:"stdClass":1:{s:6:"plugin";O:8:"stdClass":1:{s:8:"workdata";O:8:"stdClass":1:{s:7:"gallery";O:8:"stdClass":1:{s:10:"def_params";O:9:"JRegistry":1:{s:7:"\\0\\0\\0data";O:8:"stdClass":73:{s:7:"orderby";s:1:"0";s:5:"items";s:0:"";s:18:"preload_label_main";s:0:"";s:7:"preload";s:1:"0";s:12:"preloadImage";s:34:"%%CSS_URL%%/images/ajax-loader.gif";s:13:"preloadEffect";s:1:"1";s:7:"preview";s:0:"";s:12:"galleryWidth";s:0:"";s:12:"galleryAlign";s:6:"centre";s:14:"galleryBgColor";s:11:"transparent";s:14:"galleryPadding";s:0:"";s:18:"galleryPadding_top";s:0:"";s:20:"galleryPadding_right";s:0:"";s:19:"galleryPadding_left";s:0:"";s:21:"galleryPadding_bottom";s:0:"";s:26:"borderspacer_label_gallery";s:0:"";s:13:"galleryBorder";s:63:"{''enabled'': 0, ''width'': 1, ''style'': ''solid'', ''color'':''#000000''}";s:13:"galleryShadow";s:62:"{''enabled'': 0, ''width'': 4, ''color'':''#000000'', ''opacity'': ''30''}";s:9:"showTitle";s:1:"0";s:22:"thumbHoverEffect_label";s:0:"";s:16:"thumbHoverEffect";s:1:"0";s:10:"thumbStyle";s:1:"0";s:17:"thumbStyleBgColor";s:7:"#ffffff";s:19:"thumbStyleBgOpacity";s:2:"30";s:14:"showTitleHover";s:1:"1";s:13:"showDescHover";s:1:"1";s:15:"showButtonHover";s:1:"1";s:9:"clickText";s:10:"Click Here";s:18:"borderspacer_label";s:0:"";s:11:"innerborder";s:45:"{''enabled'': 1, ''width'': 4, ''color'':''#ffffff''}";s:6:"border";s:63:"{''enabled'': 0, ''width'': 1, ''style'': ''solid'', ''color'':''#000000''}";s:6:"shadow";s:62:"{''enabled'': 1, ''width'': 4, ''color'':''#000000'', ''opacity'': ''30''}";s:23:"hoverborderspacer_label";s:0:"";s:16:"hoverinnerborder";s:45:"{''enabled'': 1, ''width'': 4, ''color'':''#ffffff''}";s:11:"hoverborder";s:63:"{''enabled'': 0, ''width'': 1, ''style'': ''solid'', ''color'':''#000000''}";s:11:"hovershadow";s:62:"{''enabled'': 1, ''width'': 4, ''color'':''#000000'', ''opacity'': ''70''}";s:17:"sizePadding_label";s:0:"";s:11:"thumb_width";s:3:"220";s:12:"thumb_height";s:3:"160";s:19:"thumb_type_resizing";s:1:"2";s:21:"thumb_resize_position";s:1:"0";s:11:"thumb_color";s:7:"#ffffff";s:12:"thumbPadding";s:0:"";s:16:"thumbPadding_top";s:0:"";s:18:"thumbPadding_right";s:0:"";s:17:"thumbPadding_left";s:0:"";s:19:"thumbPadding_bottom";s:0:"";s:14:"showPagination";s:1:"1";s:15:"countPagination";s:2:"20";s:18:"paginationPosition";s:1:"1";s:15:"paginationTheme";s:5:"light";s:17:"goToTopPagination";s:1:"0";s:18:"nextTextPagination";s:4:"Next";s:18:"prevTextPagination";s:4:"Prev";s:24:"showPaginationPagesInBar";s:1:"5";s:13:"lightboxStyle";s:1:"0";s:12:"lightboxDesc";s:1:"0";s:14:"lightbox_label";s:0:"";s:17:"big_type_resizing";s:1:"3";s:9:"big_width";s:3:"500";s:10:"big_height";s:3:"375";s:9:"big_color";s:7:"#ffffff";s:19:"big_resize_position";s:1:"0";s:22:"lightboxAdvanced_label";s:0:"";s:10:"lightboxBg";s:50:"{''enabled'': 0, ''color'':''#000000'', ''opacity'': ''80''}";s:19:"lightboxIframeWidth";s:3:"640";s:20:"lightboxIframeHeight";s:3:"360";s:19:"lightboxInlineWidth";s:3:"98%";s:20:"lightboxInlineHeight";s:3:"98%";s:19:"lightboxTextCurrent";s:26:"image {current} of {total}";s:20:"lightboxTextPrevious";s:8:"previous";s:16:"lightboxTextNext";s:4:"next";s:17:"lightboxTextClose";s:5:"close";}}}}}}}}s:4:"user";O:5:"JUser":24:{s:9:"\\0\\0\\0isRoot";b:0;s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:5:"block";N;s:9:"sendEmail";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:6:"groups";a:1:{i:0;s:1:"9";}s:5:"guest";i:1;s:13:"lastResetTime";N;s:10:"resetCount";N;s:10:"\\0\\0\\0_params";O:9:"JRegistry":1:{s:7:"\\0\\0\\0data";O:8:"stdClass":0:{}}s:14:"\\0\\0\\0_authGroups";a:2:{i:0;i:1;i:1;i:9;}s:14:"\\0\\0\\0_authLevels";a:3:{i:0;i:1;i:1;i:1;i:2;i:5;}s:15:"\\0\\0\\0_authActions";N;s:12:"\\0\\0\\0_errorMsg";N;s:10:"\\0\\0\\0_errors";a:0:{}s:3:"aid";i:0;}s:20:"com_rsfirewall.geoip";s:0:"";}', 0, ''),
('23008815bbbd79abc9adfa55867697c7', 1, 0, '1395381797', '__default|a:9:{s:15:"session.counter";i:123;s:19:"session.timer.start";i:1395379328;s:18:"session.timer.last";i:1395381796;s:17:"session.timer.now";i:1395381797;s:22:"session.client.browser";s:81:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:27.0) Gecko/20100101 Firefox/27.0";s:8:"registry";O:9:"JRegistry":1:{s:7:"\\0\\0\\0data";O:8:"stdClass":5:{s:11:"application";O:8:"stdClass":1:{s:4:"lang";s:0:"";}s:11:"com_content";O:8:"stdClass":1:{s:4:"edit";O:8:"stdClass":1:{s:7:"article";O:8:"stdClass":2:{s:2:"id";a:0:{}s:4:"data";N;}}}s:13:"com_installer";O:8:"stdClass":3:{s:7:"message";s:0:"";s:17:"extension_message";s:0:"";s:12:"redirect_url";N;}s:9:"com_users";O:8:"stdClass":1:{s:4:"edit";O:8:"stdClass":1:{s:4:"user";O:8:"stdClass":2:{s:2:"id";a:0:{}s:4:"data";N;}}}s:19:"com_nonumbermanager";O:8:"stdClass":1:{s:7:"default";O:8:"stdClass":1:{s:8:"ordercol";N;}}}}s:4:"user";O:5:"JUser":24:{s:9:"\\0\\0\\0isRoot";b:1;s:2:"id";s:3:"706";s:4:"name";s:10:"Super User";s:8:"username";s:7:"edadmin";s:5:"email";s:29:"andrew@earthlinkdesign.com.au";s:8:"password";s:65:"a5b696c88615a837f8ebb3e40b1518da:vfZDb0h8tV0mCPMdaosE77v66pAEW04i";s:14:"password_clear";s:0:"";s:5:"block";s:1:"0";s:9:"sendEmail";s:1:"1";s:12:"registerDate";s:19:"2013-05-18 04:12:25";s:13:"lastvisitDate";s:19:"2014-03-21 02:39:24";s:10:"activation";s:1:"0";s:6:"params";s:0:"";s:6:"groups";a:1:{i:8;s:1:"8";}s:5:"guest";i:0;s:13:"lastResetTime";s:19:"0000-00-00 00:00:00";s:10:"resetCount";s:1:"0";s:10:"\\0\\0\\0_params";O:9:"JRegistry":1:{s:7:"\\0\\0\\0data";O:8:"stdClass":6:{s:11:"admin_style";s:0:"";s:14:"admin_language";s:0:"";s:8:"language";s:0:"";s:6:"editor";s:3:"jce";s:8:"helpsite";s:0:"";s:8:"timezone";s:0:"";}}s:14:"\\0\\0\\0_authGroups";a:2:{i:0;i:1;i:1;i:8;}s:14:"\\0\\0\\0_authLevels";a:4:{i:0;i:1;i:1;i:1;i:2;i:2;i:3;i:3;}s:15:"\\0\\0\\0_authActions";N;s:12:"\\0\\0\\0_errorMsg";N;s:10:"\\0\\0\\0_errors";a:0:{}s:3:"aid";i:0;}s:20:"com_rsfirewall.geoip";s:0:"";s:13:"session.token";s:32:"e63794f7aa612423d838ec323c265986";}__akeeba|a:1:{s:7:"profile";i:1;}__wf|a:1:{s:13:"session.token";s:32:"4ed83490ae202080893809f9066e79ad";}', 706, 'edadmin'),
('2981e5a788411370667c95855347f5d2', 0, 1, '1395381718', '__default|a:7:{s:15:"session.counter";i:1;s:19:"session.timer.start";i:1395381718;s:18:"session.timer.last";i:1395381718;s:17:"session.timer.now";i:1395381718;s:8:"registry";O:9:"JRegistry":1:{s:7:"\\0\\0\\0data";O:8:"stdClass":0:{}}s:4:"user";O:5:"JUser":23:{s:9:"\\0\\0\\0isRoot";N;s:2:"id";s:3:"706";s:4:"name";s:10:"Super User";s:8:"username";s:7:"edadmin";s:5:"email";s:29:"andrew@earthlinkdesign.com.au";s:8:"password";s:65:"a5b696c88615a837f8ebb3e40b1518da:vfZDb0h8tV0mCPMdaosE77v66pAEW04i";s:14:"password_clear";s:0:"";s:5:"block";s:1:"0";s:9:"sendEmail";s:1:"1";s:12:"registerDate";s:19:"2013-05-18 04:12:25";s:13:"lastvisitDate";s:19:"2014-03-21 05:22:49";s:10:"activation";s:1:"0";s:6:"params";s:0:"";s:6:"groups";a:1:{i:8;s:1:"8";}s:5:"guest";i:0;s:13:"lastResetTime";s:19:"0000-00-00 00:00:00";s:10:"resetCount";s:1:"0";s:10:"\\0\\0\\0_params";O:9:"JRegistry":1:{s:7:"\\0\\0\\0data";O:8:"stdClass":0:{}}s:14:"\\0\\0\\0_authGroups";N;s:14:"\\0\\0\\0_authLevels";N;s:15:"\\0\\0\\0_authActions";N;s:12:"\\0\\0\\0_errorMsg";N;s:10:"\\0\\0\\0_errors";a:0:{}}s:20:"com_rsfirewall.geoip";s:0:"";}', 0, ''),
('b65f1f5b98d6bc8a79f51bf2dc63bd90', 0, 1, '1395381524', '__default|a:7:{s:15:"session.counter";i:1;s:19:"session.timer.start";i:1395381524;s:18:"session.timer.last";i:1395381524;s:17:"session.timer.now";i:1395381524;s:8:"registry";O:9:"JRegistry":1:{s:7:"\\0\\0\\0data";O:8:"stdClass":0:{}}s:4:"user";O:5:"JUser":23:{s:9:"\\0\\0\\0isRoot";N;s:2:"id";s:3:"706";s:4:"name";s:10:"Super User";s:8:"username";s:7:"edadmin";s:5:"email";s:29:"andrew@earthlinkdesign.com.au";s:8:"password";s:65:"a5b696c88615a837f8ebb3e40b1518da:vfZDb0h8tV0mCPMdaosE77v66pAEW04i";s:14:"password_clear";s:0:"";s:5:"block";s:1:"0";s:9:"sendEmail";s:1:"1";s:12:"registerDate";s:19:"2013-05-18 04:12:25";s:13:"lastvisitDate";s:19:"2014-03-21 05:22:49";s:10:"activation";s:1:"0";s:6:"params";s:0:"";s:6:"groups";a:1:{i:8;s:1:"8";}s:5:"guest";i:0;s:13:"lastResetTime";s:19:"0000-00-00 00:00:00";s:10:"resetCount";s:1:"0";s:10:"\\0\\0\\0_params";O:9:"JRegistry":1:{s:7:"\\0\\0\\0data";O:8:"stdClass":0:{}}s:14:"\\0\\0\\0_authGroups";N;s:14:"\\0\\0\\0_authLevels";N;s:15:"\\0\\0\\0_authActions";N;s:12:"\\0\\0\\0_errorMsg";N;s:10:"\\0\\0\\0_errors";a:0:{}}s:20:"com_rsfirewall.geoip";s:0:"";}', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_swmenupro_styles`
--

CREATE TABLE `i4aj7_swmenupro_styles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moduleid` int(11) NOT NULL,
  `params` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `i4aj7_swmenupro_styles`
--

INSERT INTO `i4aj7_swmenupro_styles` (`id`, `moduleid`, `params`) VALUES
(2, 0, 'position=left\r\norientation=vertical/right\r\nmain_width=0\r\nmain_height=0\r\nsub_width=0\r\nsub_height=0\r\nmain_top=0\r\nmain_left=0\r\nlevel1_sub_top=0\r\nlevel1_sub_left=0\r\nlevel2_sub_top=0\r\nlevel2_sub_left=0\r\ncomplete_margin_top=6\r\ncomplete_margin_right=16\r\ncomplete_margin_bottom=16\r\ncomplete_margin_left=16\r\ntop_margin_top=10\r\ntop_margin_right=0\r\ntop_margin_bottom=0\r\ntop_margin_left=0\r\nmain_pad_top=11\r\nmain_pad_right=28\r\nmain_pad_bottom=11\r\nmain_pad_left=20\r\nsub_pad_top=9\r\nsub_pad_right=28\r\nsub_pad_bottom=10\r\nsub_pad_left=15\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\ncomplete_background=#3F6AA1\r\nactive_background=#942E8D\r\nmain_back=#225480\r\nmain_over=#163961\r\nsub_back=#3F8296\r\nsub_over=#334787\r\ntop_sub_indicator=images/swmenupro/arrows/whiteleft-on.gif\r\ntop_sub_indicator_align=right\r\ntop_sub_indicator_top=0\r\ntop_sub_indicator_left=0\r\nsub_sub_indicator=\r\nsub_sub_indicator_align=right\r\nsub_sub_indicator_top=0\r\nsub_sub_indicator_left=0\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nmain_font_color=#E3E7ED\r\nmain_font_color_over=#FFE70F\r\nsub_font_color=#FEFFF5\r\nsub_font_color_over=#F0E807\r\nactive_font=#F0F09E\r\nmain_font_size=15\r\nsub_font_size=15\r\nfont_weight=normal\r\nfont_weight_over=normal\r\nmain_align=left\r\nsub_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\nmain_border_over_style=none\r\nmain_border_color_over=#F34AFF\r\nmain_border_over_width=0\r\nsub_border_style=none\r\nsub_border_color=#061C1B\r\nsub_border_width=0\r\nsub_border_over_style=none\r\nsub_border_color_over=#94FFB4\r\nsub_border_over_width=0\r\nc_corner_style=none\r\nc_corner_size=23\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\nt_corner_style=curvycorner\r\nt_corner_size=10\r\nttl_corner=1\r\nttr_corner=1\r\ntbl_corner=1\r\ntbr_corner=1\r\ns_corner_style=none\r\ns_corner_size=10\r\nstl_corner=1\r\nstr_corner=1\r\nsbl_corner=1\r\nsbr_corner=1\r\nsi_corner_style=none\r\nsi_corner_size=\r\nmenutype=mainmenu\r\nparentid=0\r\nactive_menu=1\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nhybrid=0\r\ntables=0\r\noverlay_hack=0\r\npadding_hack=0\r\nauto_position=1\r\nflash_hack=0\r\ndisable_jquery=0\r\ntablet_hack=1\r\nextra=0\r\nspecialB=321\r\nspecialA=80\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=mainmenu\r\nimages_preview=1\r\ntitle=trans2\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=transmenu\r\ntask=saveedit\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nreturntask=save\r\ndefaultfolder=swmenupro\r\n'),
(5, 0, 'main_width=187\r\nposition=center\r\ntree_lines=black\r\ntree_top_icon=images/swmenupro/tree_icons/base.gif\r\ntree_folder_icon=images/swmenupro/tree_icons/folder.gif\r\ntree_folder_open_icon=images/swmenupro/tree_icons/folder-open.gif\r\ntree_file_icon=images/swmenupro/tree_icons/doc.gif\r\nc_corner_style=curvycorner\r\nc_corner_size=15\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\ntop_margin_top=2\r\ntop_margin_right=0\r\ntop_margin_bottom=2\r\ntop_margin_left=16\r\ncomplete_margin_top=14\r\ncomplete_margin_right=0\r\ncomplete_margin_bottom=12\r\ncomplete_margin_left=15\r\nmain_pad_top=0\r\nmain_pad_right=0\r\nmain_pad_bottom=2\r\nmain_pad_left=16\r\nsub_pad_top=0\r\nsub_pad_right=0\r\nsub_pad_bottom=2\r\nsub_pad_left=16\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\ncomplete_background=#1A7ABA\r\nactive_background=\r\nmain_back=\r\nmain_over=\r\nsub_back=\r\nsub_over=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\ntot_border=1\r\ntor_border=1\r\ntob_border=1\r\ntol_border=1\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nmain_font_color=#F5F5F5\r\nmain_font_color_over=#E8EBBA\r\nsub_font_color=#E6E5E3\r\nsub_font_color_over=#EEF283\r\nactive_font=#F0F09E\r\nmain_font_size=15\r\nsub_font_size=15\r\nfont_weight=bold\r\nfont_weight_over=normal\r\nmain_align=left\r\nsub_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nmenutype=mainmenu\r\nparentid=0\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nactive_menu=1\r\nuse_cookie=0\r\ndisable_parent=1\r\nexpand_all=0\r\nhybrid=0\r\ntables=0\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=mainmenu\r\nimages_preview=1\r\ntitle=dtree\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=treemenu\r\ntask=saveedit\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nreturntask=save\r\ndefaultfolder=swmenupro/tree_icons\r\n'),
(6, 0, 'main_width=187\r\nposition=center\r\ntree_lines=red\r\ntree_top_icon=images/swmenupro/tree_icons/base.gif\r\ntree_folder_icon=images/swmenupro/tree_icons/folder.gif\r\ntree_folder_open_icon=images/swmenupro/tree_icons/folder-open.gif\r\ntree_file_icon=images/swmenupro/tree_icons/doc.gif\r\nc_corner_style=curvycorner\r\nc_corner_size=15\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\ntop_margin_top=2\r\ntop_margin_right=0\r\ntop_margin_bottom=2\r\ntop_margin_left=16\r\ncomplete_margin_top=14\r\ncomplete_margin_right=0\r\ncomplete_margin_bottom=12\r\ncomplete_margin_left=15\r\nmain_pad_top=0\r\nmain_pad_right=0\r\nmain_pad_bottom=2\r\nmain_pad_left=16\r\nsub_pad_top=0\r\nsub_pad_right=0\r\nsub_pad_bottom=2\r\nsub_pad_left=16\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\ncomplete_background=#F5EBB8\r\nactive_background=\r\nmain_back=\r\nmain_over=\r\nsub_back=\r\nsub_over=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\ntot_border=1\r\ntor_border=1\r\ntob_border=1\r\ntol_border=1\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nmain_font_color=#0A0A0A\r\nmain_font_color_over=#7A7A7A\r\nsub_font_color=#212120\r\nsub_font_color_over=#5C7FF2\r\nactive_font=#F0F09E\r\nmain_font_size=15\r\nsub_font_size=15\r\nfont_weight=bold\r\nfont_weight_over=normal\r\nmain_align=left\r\nsub_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nmenutype=mainmenu\r\nparentid=0\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nactive_menu=1\r\nuse_cookie=0\r\ndisable_parent=1\r\nexpand_all=0\r\nhybrid=0\r\ntables=0\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=mainmenu\r\nimages_preview=1\r\ntitle=treeview2\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=treeview\r\ntask=saveedit\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nreturntask=save\r\ndefaultfolder=swmenupro/tree_icons\r\n'),
(8, 0, 'position=center\r\nlevelx_align=right\r\norientation=vertical\r\nmain_width=0\r\nmain_height=0\r\nsub_width=0\r\nsub_height=0\r\nlevelx_sub_width=0\r\nlevelx_sub_height=0\r\nmain_top=0\r\nmain_left=0\r\nlevel1_sub_top=2\r\nlevel1_sub_left=0\r\nlevelx_sub_top=0\r\nlevelx_sub_left=0\r\ncomplete_margin_top=11\r\ncomplete_margin_right=14\r\ncomplete_margin_bottom=17\r\ncomplete_margin_left=14\r\ntop_margin_top=6\r\ntop_margin_right=0\r\ntop_margin_bottom=0\r\ntop_margin_left=0\r\nmain_pad_top=11\r\nmain_pad_right=48\r\nmain_pad_bottom=11\r\nmain_pad_left=30\r\nsub_pad_top=9\r\nsub_pad_right=5\r\nsub_pad_bottom=10\r\nsub_pad_left=13\r\nlevelx_sub_pad_top=10\r\nlevelx_sub_pad_right=15\r\nlevelx_sub_pad_bottom=7\r\nlevelx_sub_pad_left=24\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nsub_active_background_image=\r\nsub_active_background_repeat=repeat\r\nsub_active_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\nlevelx_sub_back_image=\r\nlevelx_sub_background_repeat=repeat\r\nlevelx_sub_background_position=left top\r\nlevelx_sub_back_image_over=<br />\r\nlevelx_sub_hover_background_repeat=repeat\r\nlevelx_sub_hover_background_position=left top\r\ncomplete_background=#C9C9C9\r\nactive_background=#C75228\r\nsub_active_background=#081C1B\r\nmain_back=#2E51A3\r\nmain_over=#2D611A\r\nsub_back=#3F8296\r\nsub_over=#334787\r\nlevelx_sub_back=#3299AD\r\nlevelx_sub_over=#3F37AD\r\ntop_sub_indicator=images/swmenupro/arrows/whiteleft-on.gif\r\ntop_sub_indicator_align=right\r\ntop_sub_indicator_top=10\r\ntop_sub_indicator_left=-5\r\nsub_sub_indicator=images/swmenupro/arrows/white-down.gif\r\nsub_sub_indicator_align=right\r\nsub_sub_indicator_top=10\r\nsub_sub_indicator_left=-5\r\nlevelx_sub_indicator=images/swmenupro/arrows/blackleft-off.gif\r\nlevelx_sub_indicator_align=right\r\nlevelx_sub_indicator_top=0\r\nlevelx_sub_indicator_left=0\r\nfont_family=Arial, Helvetica, sans-serif\r\nsub_font_family=Arial, Helvetica, sans-serif\r\nlevelx_sub_font_family=Arial, Helvetica, sans-serif\r\ntop_ttf=\r\nsub_ttf=\r\nlevelx_sub_ttf=\r\nactive_font=#F0F09E\r\nsub_active_font=#FF8138\r\nmain_font_color=#EBEFF5\r\nmain_font_color_over=#E1EBE4\r\nsub_font_color=#FEFFF5\r\nsub_font_color_over=#F0E807\r\nlevelx_sub_font_color=#F2F2F2\r\nlevelx_sub_font_color_over=#D8E65C\r\nmain_font_size=15\r\nsub_font_size=15\r\nlevelx_sub_font_size=15\r\nfont_weight=normal\r\nfont_weight_over=normal\r\nlevelx_sub_font_weight=normal\r\nmain_align=left\r\nsub_align=left\r\nlevelx_sub_font_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\nlevelx_sub_font_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nlevelx_sub_font_extra=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=1\r\ntot_border=1\r\ntor_border=1\r\ntob_border=1\r\ntol_border=1\r\nmain_border_over_style=none\r\nmain_border_color_over=#020103\r\nmain_border_over_width=2\r\ntit_border=1\r\ntir_border=1\r\ntib_border=1\r\ntil_border=1\r\nt_auto_border=1\r\nsub_border_style=none\r\nsub_border_color=#061C1B\r\nsub_border_width=0\r\nsub_border_over_style=none\r\nsub_border_color_over=#94FFB4\r\nsub_border_over_width=0\r\nlevelx_outside_border_style=none\r\nlevelx_outside_border_color=#4DCFFF\r\nlevelx_outside_border_width=0\r\nlevelx_inside_border_style=none\r\nlevelx_inside_border_color=#121212\r\nlevelx_inside_border_width=0\r\nxit_border=1\r\nxir_border=1\r\nxib_border=1\r\nxil_border=1\r\nc_corner_style=round\r\nc_corner_size=21\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\nt_corner_style=none\r\nt_corner_size=10\r\nttl_corner=1\r\nttr_corner=1\r\ntbl_corner=1\r\ns_corner_style=none\r\ns_corner_size=10\r\nstl_corner=1\r\nstr_corner=1\r\nsbl_corner=1\r\nsi_corner_style=none\r\nsi_corner_size=7\r\nx_corner_style=none\r\nx_corner_size=7\r\nxi_corner_style=none\r\nxi_corner_size=\r\nmenutype=aboutjoomla\r\nparentid=0\r\nactive_menu=1\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nhybrid=1\r\ntables=0\r\nexpand_all=0\r\nautoclose=1\r\nrevealtype=0\r\ndisable_parent=0\r\noverlay_hack=0\r\ndisable_jquery=0\r\ntablet_hack=1\r\nextra=none\r\nspecialB=321\r\nspecialA=80\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=aboutjoomla\r\nimages_preview=1\r\ntitle=at2\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=accordtransmenu\r\ntask=saveedit\r\nreturntask=save\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nexport2=\r\ndefaultfolder=swmenupro/arrows\r\n'),
(1, 0, 'position=left\r\norientation=vertical/right\r\nmain_width=0\r\nmain_height=0\r\nsub_width=0\r\nsub_height=0\r\nmain_top=0\r\nmain_left=0\r\nlevel1_sub_top=0\r\nlevel1_sub_left=0\r\nlevel2_sub_top=0\r\nlevel2_sub_left=0\r\ncomplete_margin_top=6\r\ncomplete_margin_right=16\r\ncomplete_margin_bottom=16\r\ncomplete_margin_left=16\r\ntop_margin_top=10\r\ntop_margin_right=0\r\ntop_margin_bottom=0\r\ntop_margin_left=0\r\nmain_pad_top=11\r\nmain_pad_right=28\r\nmain_pad_bottom=11\r\nmain_pad_left=20\r\nsub_pad_top=9\r\nsub_pad_right=28\r\nsub_pad_bottom=10\r\nsub_pad_left=15\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\ncomplete_background=#3F6AA1\r\nactive_background=#942E8D\r\nmain_back=#225480\r\nmain_over=#163961\r\nsub_back=#3F8296\r\nsub_over=#334787\r\ntop_sub_indicator=images/swmenupro/arrows/whiteleft-on.gif\r\ntop_sub_indicator_align=right\r\ntop_sub_indicator_top=0\r\ntop_sub_indicator_left=0\r\nsub_sub_indicator=images/swmenupro/arrows/blackleft-on.gif\r\nsub_sub_indicator_align=right\r\nsub_sub_indicator_top=0\r\nsub_sub_indicator_left=0\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nmain_font_color=#E3E7ED\r\nmain_font_color_over=#FFE70F\r\nsub_font_color=#FEFFF5\r\nsub_font_color_over=#F0E807\r\nactive_font=#F0F09E\r\nmain_font_size=15\r\nsub_font_size=15\r\nfont_weight=normal\r\nfont_weight_over=normal\r\nmain_align=left\r\nsub_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\nmain_border_over_style=none\r\nmain_border_color_over=#F34AFF\r\nmain_border_over_width=0\r\nsub_border_style=none\r\nsub_border_color=#061C1B\r\nsub_border_width=0\r\nsub_border_over_style=none\r\nsub_border_color_over=#94FFB4\r\nsub_border_over_width=0\r\nc_corner_style=curvycorner\r\nc_corner_size=23\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\nt_corner_style=curvycorner\r\nt_corner_size=10\r\nttl_corner=1\r\nttr_corner=1\r\ntbl_corner=1\r\ntbr_corner=1\r\ns_corner_style=curvycorner\r\ns_corner_size=10\r\nstl_corner=1\r\nstr_corner=1\r\nsbl_corner=1\r\nsbr_corner=1\r\nsi_corner_style=none\r\nsi_corner_size=\r\nmenutype=mainmenu\r\nparentid=0\r\nactive_menu=1\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nhybrid=0\r\ntables=0\r\noverlay_hack=0\r\npadding_hack=0\r\nauto_position=1\r\nflash_hack=0\r\ndisable_jquery=0\r\ntablet_hack=1\r\nextra=fade\r\nspecialB=321\r\nspecialA=80\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=mainmenu\r\nimages_preview=1\r\ntitle=myGosu\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=gosumenu\r\ntask=saveedit\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nreturntask=save\r\ndefaultfolder=swmenupro\r\n'),
(7, 0, 'position=center\r\norientation=horizontal/down\r\nmain_width=0\r\nmain_height=0\r\nsub_width=0\r\nsub_height=0\r\nlevelx_sub_width=0\r\nlevelx_sub_height=0\r\nmain_top=0\r\nmain_left=0\r\nlevel1_sub_top=0\r\nlevel1_sub_left=0\r\nlevelx_sub_top=0\r\nlevelx_sub_left=0\r\ncomplete_margin_top=5\r\ncomplete_margin_right=7\r\ncomplete_margin_bottom=14\r\ncomplete_margin_left=16\r\ntop_margin_top=10\r\ntop_margin_right=19\r\ntop_margin_bottom=0\r\ntop_margin_left=0\r\nmain_pad_top=11\r\nmain_pad_right=28\r\nmain_pad_bottom=11\r\nmain_pad_left=20\r\nsub_pad_top=9\r\nsub_pad_right=28\r\nsub_pad_bottom=10\r\nsub_pad_left=15\r\nlevelx_sub_pad_top=3\r\nlevelx_sub_pad_right=5\r\nlevelx_sub_pad_bottom=3\r\nlevelx_sub_pad_left=10\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nsub_active_background_image=\r\nsub_active_background_repeat=repeat\r\nsub_active_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\nlevelx_sub_back_image=\r\nlevelx_sub_background_repeat=repeat\r\nlevelx_sub_background_position=left top\r\nlevelx_sub_back_image_over=\r\nlevelx_sub_hover_background_repeat=repeat\r\nlevelx_sub_hover_background_position=left top\r\ncomplete_background=#4E84CC\r\nactive_background=#942E8D\r\nsub_active_background=#3B3B3B\r\nmain_back=#346CA3\r\nmain_over=#999997\r\nsub_back=#3F8296\r\nsub_over=#334787\r\nlevelx_sub_back=#7AFFFB\r\nlevelx_sub_over=#C2C6FF\r\ntop_sub_indicator=images/swmenupro/arrows/whiteleft-on.gif\r\ntop_sub_indicator_align=right\r\ntop_sub_indicator_top=0\r\ntop_sub_indicator_left=0\r\nsub_sub_indicator=images/swmenupro/arrows/blackleft-on.gif\r\nsub_sub_indicator_align=right\r\nsub_sub_indicator_top=0\r\nsub_sub_indicator_left=0\r\nlevelx_sub_indicator=\r\nlevelx_sub_indicator_align=left\r\nlevelx_sub_indicator_top=\r\nlevelx_sub_indicator_left=\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\nlevelx_sub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nlevelx_sub_ttf=\r\nactive_font=#F0F09E\r\nsub_active_font=#FF195E\r\nmain_font_color=#EBEFF5\r\nmain_font_color_over=#111211\r\nsub_font_color=#FEFFF5\r\nsub_font_color_over=#F0E807\r\nlevelx_sub_font_color=#242424\r\nlevelx_sub_font_color_over=#6B6B6B\r\nmain_font_size=15\r\nsub_font_size=15\r\nlevelx_sub_font_size=15\r\nfont_weight=normal\r\nfont_weight_over=normal\r\nlevelx_sub_font_weight=normal\r\nmain_align=left\r\nsub_align=left\r\nlevelx_sub_font_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\nlevelx_sub_font_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nlevelx_sub_font_extra=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\nmain_border_over_style=none\r\nmain_border_color_over=#F34AFF\r\nmain_border_over_width=0\r\nsub_border_style=none\r\nsub_border_color=#061C1B\r\nsub_border_width=0\r\nsub_border_over_style=none\r\nsub_border_color_over=#94FFB4\r\nsub_border_over_width=0\r\nlevelx_outside_border_style=none\r\nlevelx_outside_border_color=#8D85FF\r\nlevelx_outside_border_width=0\r\nlevelx_inside_border_style=none\r\nlevelx_inside_border_color=#FFCF4D\r\nlevelx_inside_border_width=0\r\nc_corner_style=curvycorner\r\nc_corner_size=23\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\nt_corner_style=curvycorner\r\nt_corner_size=10\r\nttl_corner=1\r\nttr_corner=1\r\ntbl_corner=1\r\ntbr_corner=1\r\ns_corner_style=curvycorner\r\ns_corner_size=10\r\nstl_corner=1\r\nstr_corner=1\r\nsi_corner_style=none\r\nsi_corner_size=\r\nx_corner_style=none\r\nx_corner_size=0\r\nxi_corner_style=none\r\nxi_corner_size=13\r\nxitl_corner=1\r\nxitr_corner=1\r\nxibl_corner=1\r\nxibr_corner=1\r\nmenutype=mainmenu\r\nparentid=0\r\nactive_menu=1\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nhybrid=0\r\ntables=0\r\nrevealtype=0\r\ndisable_parent=0\r\noverlay_hack=0\r\nauto_position=1\r\nflash_hack=0\r\ndisable_jquery=0\r\ntablet_hack=1\r\nextra=none\r\nspecialB=321\r\nspecialA=100\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=aboutjoomla\r\nimages_preview=1\r\ntitle=mc2\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=columnmenu\r\ntask=saveedit\r\nreturntask=save\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nexport2=\r\ndefaultfolder=swmenupro\r\n'),
(4, 0, 'position=left\r\norientation=vertical\r\nmain_width=0\r\nmain_height=0\r\nsub_width=0\r\nsub_height=0\r\nmain_top=0\r\nmain_left=0\r\nlevel1_sub_top=0\r\nlevel1_sub_left=0\r\nlevel2_sub_top=0\r\nlevel2_sub_left=0\r\ncomplete_margin_top=6\r\ncomplete_margin_right=16\r\ncomplete_margin_bottom=16\r\ncomplete_margin_left=16\r\ntop_margin_top=10\r\ntop_margin_right=0\r\ntop_margin_bottom=0\r\ntop_margin_left=0\r\nmain_pad_top=11\r\nmain_pad_right=28\r\nmain_pad_bottom=11\r\nmain_pad_left=20\r\nsub_pad_top=9\r\nsub_pad_right=28\r\nsub_pad_bottom=10\r\nsub_pad_left=15\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\ncomplete_background=#3F6AA1\r\nactive_background=#942E8D\r\nmain_back=#225480\r\nmain_over=#163961\r\nsub_back=#3F8296\r\nsub_over=#334787\r\ntop_sub_indicator=images/swmenupro/arrows/whiteleft-on.gif\r\ntop_sub_indicator_align=right\r\ntop_sub_indicator_top=13\r\ntop_sub_indicator_left=-8\r\nsub_sub_indicator=images/swmenupro/arrows/white-down.gif\r\nsub_sub_indicator_align=right\r\nsub_sub_indicator_top=13\r\nsub_sub_indicator_left=-8\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nmain_font_color=#E3E7ED\r\nmain_font_color_over=#FFE70F\r\nsub_font_color=#FEFFF5\r\nsub_font_color_over=#F0E807\r\nactive_font=#F0F09E\r\nmain_font_size=15\r\nsub_font_size=15\r\nfont_weight=normal\r\nfont_weight_over=normal\r\nmain_align=left\r\nsub_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\ntot_border=1\r\ntor_border=1\r\ntob_border=1\r\ntol_border=1\r\nmain_border_over_style=none\r\nmain_border_color_over=#F34AFF\r\nmain_border_over_width=0\r\ntit_border=1\r\ntir_border=1\r\ntib_border=1\r\ntil_border=1\r\nt_auto_border=1\r\nsub_border_style=none\r\nsub_border_color=#061C1B\r\nsub_border_width=0\r\nsub_border_over_style=none\r\nsub_border_color_over=#94FFB4\r\nsub_border_over_width=0\r\nc_corner_style=curvycorner\r\nc_corner_size=23\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\nt_corner_style=curvycorner\r\nt_corner_size=10\r\nttl_corner=1\r\nttr_corner=1\r\ntbl_corner=1\r\ntbr_corner=1\r\ns_corner_style=curvycorner\r\ns_corner_size=10\r\nstl_corner=1\r\nstr_corner=1\r\nsbl_corner=1\r\nsbr_corner=1\r\nsi_corner_style=none\r\nsi_corner_size=\r\nmenutype=mainmenu\r\nparentid=0\r\nactive_menu=1\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nhybrid=0\r\ntables=0\r\nexpand_all=0\r\nautoclose=1\r\nrevealtype=1\r\ndisable_parent=1\r\ndisable_jquery=0\r\ntablet_hack=1\r\nspecialB=321\r\nspecialA=80\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=mainmenu\r\nimages_preview=1\r\ntitle=accordion2\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=accordian\r\ntask=saveedit\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nreturntask=save\r\ndefaultfolder=swmenupro/arrows\r\n'),
(9, 0, 'position=center\r\norientation=horizontal/right\r\nlevel1_align=auto\r\nlevel1_width=complete\r\ncomplete_width=96\r\nmain_width=0\r\nmain_height=0\r\nsub_width=0\r\nsub_height=0\r\nlevelx_sub_width=0\r\nlevelx_sub_height=0\r\nmain_top=0\r\nmain_left=0\r\nlevel1_sub_top=0\r\nlevel1_sub_left=0\r\nlevelx_sub_top=0\r\nlevelx_sub_left=0\r\ncomplete_margin_top=15\r\ncomplete_margin_right=0\r\ncomplete_margin_bottom=0\r\ncomplete_margin_left=0\r\ntop_margin_top=0\r\ntop_margin_right=17\r\ntop_margin_bottom=0\r\ntop_margin_left=0\r\nmain_pad_top=10\r\nmain_pad_right=17\r\nmain_pad_bottom=15\r\nmain_pad_left=20\r\nsub_pad_top=10\r\nsub_pad_right=28\r\nsub_pad_bottom=10\r\nsub_pad_left=15\r\nlevelx_sub_pad_top=9\r\nlevelx_sub_pad_right=10\r\nlevelx_sub_pad_bottom=9\r\nlevelx_sub_pad_left=15\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nsub_active_background_image=\r\nsub_active_background_repeat=repeat\r\nsub_active_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\nlevelx_sub_back_image=\r\nlevelx_sub_background_repeat=repeat\r\nlevelx_sub_background_position=left top\r\nlevelx_sub_back_image_over=\r\nlevelx_sub_hover_background_repeat=repeat\r\nlevelx_sub_hover_background_position=left top\r\ncomplete_background=#4E84CC\r\nactive_background=#942E8D\r\nsub_active_background=#2B2B2B\r\nmain_back=#346CA3\r\nmain_over=#163961\r\nsub_back=#3F8296\r\nsub_over=#334787\r\nlevelx_sub_back=#4BFF45\r\nlevelx_sub_over=#73FFB4\r\ntop_sub_indicator=images/swmenupro/arrows/white-down.gif\r\ntop_sub_indicator_align=right\r\ntop_sub_indicator_top=0\r\ntop_sub_indicator_left=0\r\nsub_sub_indicator=images/swmenupro/arrows/blackleft-on.gif\r\nsub_sub_indicator_align=right\r\nsub_sub_indicator_top=0\r\nsub_sub_indicator_left=0\r\nlevelx_sub_indicator=\r\nlevelx_sub_indicator_align=left\r\nlevelx_sub_indicator_top=\r\nlevelx_sub_indicator_left=\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\nlevelx_sub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nlevelx_sub_ttf=\r\nactive_font=#F0F09E\r\nsub_active_font=#EDEDED\r\nmain_font_color=#EBEFF5\r\nmain_font_color_over=#E1EBE4\r\nsub_font_color=#FEFFF5\r\nsub_font_color_over=#F0E807\r\nlevelx_sub_font_color=#2B2B2B\r\nlevelx_sub_font_color_over=#808080\r\nmain_font_size=15\r\nsub_font_size=15\r\nlevelx_sub_font_size=15\r\nfont_weight=normal\r\nfont_weight_over=normal\r\nlevelx_sub_font_weight=normal\r\nmain_align=left\r\nsub_align=left\r\nlevelx_sub_font_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\nlevelx_sub_font_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nlevelx_sub_font_extra=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\ntot_border=1\r\ntor_border=1\r\ntob_border=1\r\ntol_border=1\r\nmain_border_over_style=none\r\nmain_border_color_over=#F34AFF\r\nmain_border_over_width=0\r\nsub_border_style=none\r\nsub_border_color=#061C1B\r\nsub_border_width=0\r\nsub_border_over_style=none\r\nsub_border_color_over=#94FFB4\r\nsub_border_over_width=0\r\nlevelx_outside_border_style=none\r\nlevelx_outside_border_color=#D6E1FF\r\nlevelx_outside_border_width=0\r\nlevelx_inside_border_style=none\r\nlevelx_inside_border_color=#30A5FF\r\nlevelx_inside_border_width=0\r\nc_corner_style=curvycorner\r\nc_corner_size=23\r\nctl_corner=1\r\nctr_corner=1\r\nt_corner_style=curvycorner\r\nt_corner_size=10\r\nttl_corner=1\r\nttr_corner=1\r\ns_corner_style=none\r\ns_corner_size=10\r\nstl_corner=1\r\nstr_corner=1\r\nsbl_corner=1\r\nsi_corner_style=none\r\nsi_corner_size=\r\nx_corner_style=none\r\nx_corner_size=0\r\nxi_corner_style=none\r\nxi_corner_size=0\r\nmenutype=aboutjoomla\r\nparentid=0\r\nactive_menu=1\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nhybrid=0\r\ntables=0\r\nrevealtype=1\r\ndisable_parent=1\r\nlevel1_open=1\r\nrevert2default=1\r\nlevel1_fillempty=0\r\nflash_hack=0\r\noverlay_hack=0\r\ndisable_jquery=0\r\ntablet_hack=1\r\nextra=none\r\nspecialB=321\r\nspecialA=80\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=aboutjoomla\r\nimages_preview=1\r\ntitle=megatab2\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=multitabmenu\r\ntask=saveedit\r\nreturntask=save\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nexport2=\r\ndefaultfolder=swmenupro/arrows\r\n'),
(3, 0, 'position=left\r\norientation=vertical\r\nmain_width=0\r\nmain_height=0\r\nsub_width=0\r\nsub_height=0\r\nmain_top=0\r\nmain_left=0\r\nlevel1_sub_top=0\r\nlevel1_sub_left=0\r\nlevel2_sub_top=0\r\nlevel2_sub_left=0\r\ncomplete_margin_top=16\r\ncomplete_margin_right=16\r\ncomplete_margin_bottom=6\r\ncomplete_margin_left=16\r\ntop_margin_top=0\r\ntop_margin_right=0\r\ntop_margin_bottom=10\r\ntop_margin_left=0\r\nmain_pad_top=11\r\nmain_pad_right=28\r\nmain_pad_bottom=11\r\nmain_pad_left=20\r\nsub_pad_top=9\r\nsub_pad_right=28\r\nsub_pad_bottom=10\r\nsub_pad_left=15\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\ncomplete_background=#3F6AA1\r\nactive_background=#942E8D\r\nmain_back=#225480\r\nmain_over=#163961\r\nsub_back=#3F8296\r\nsub_over=#334787\r\ntop_sub_indicator=images/swmenupro/arrows/whiteleft-on.gif\r\ntop_sub_indicator_align=right\r\ntop_sub_indicator_top=0\r\ntop_sub_indicator_left=0\r\nsub_sub_indicator=images/swmenupro/arrows/blackleft-on.gif\r\nsub_sub_indicator_align=right\r\nsub_sub_indicator_top=0\r\nsub_sub_indicator_left=0\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nmain_font_color=#E3E7ED\r\nmain_font_color_over=#FFE70F\r\nsub_font_color=#FEFFF5\r\nsub_font_color_over=#F0E807\r\nactive_font=#F0F09E\r\nmain_font_size=15\r\nsub_font_size=15\r\nfont_weight=normal\r\nfont_weight_over=normal\r\nmain_align=left\r\nsub_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\nmain_border_over_style=none\r\nmain_border_color_over=#F34AFF\r\nmain_border_over_width=0\r\nsub_border_style=none\r\nsub_border_color=#061C1B\r\nsub_border_width=0\r\nsub_border_over_style=none\r\nsub_border_color_over=#94FFB4\r\nsub_border_over_width=0\r\nc_corner_style=curvycorner\r\nc_corner_size=23\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\nt_corner_style=curvycorner\r\nt_corner_size=10\r\nttl_corner=1\r\nttr_corner=1\r\ntbl_corner=1\r\ntbr_corner=1\r\ns_corner_style=curvycorner\r\ns_corner_size=10\r\nstl_corner=1\r\nstr_corner=1\r\nsbl_corner=1\r\nsbr_corner=1\r\nsi_corner_style=none\r\nsi_corner_size=\r\nmenutype=mainmenu\r\nparentid=0\r\nactive_menu=1\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nhybrid=0\r\ntables=0\r\noverlay_hack=0\r\npadding_hack=0\r\nauto_position=1\r\nflash_hack=0\r\ndisable_jquery=0\r\ntablet_hack=1\r\nextra=1\r\nspecialB=321\r\nspecialA=80\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=mainmenu\r\nimages_preview=1\r\ntitle=superfish2\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=superfishmenu\r\ntask=saveedit\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nreturntask=save\r\ndefaultfolder=swmenupro\r\n'),
(10, 89, 'position=center\norientation=horizontal/down\nmain_width=0\nmain_height=0\nsub_width=175\nsub_height=15\nmain_top=0\nmain_left=0\nlevel1_sub_top=55\nlevel1_sub_left=0\nlevel2_sub_top=0\nlevel2_sub_left=-1\ncomplete_margin_top=0\ncomplete_margin_right=0\ncomplete_margin_bottom=0\ncomplete_margin_left=0\ntop_margin_top=0\ntop_margin_right=0\ntop_margin_bottom=0\ntop_margin_left=0\nmain_pad_top=0\nmain_pad_right=0\nmain_pad_bottom=0\nmain_pad_left=0\nsub_pad_top=10\nsub_pad_right=0\nsub_pad_bottom=10\nsub_pad_left=0\ncomplete_background_image=\ncomplete_background_repeat=repeat\ncomplete_background_position=left top\nactive_background_image=\nactive_background_repeat=repeat\nactive_background_position=left top\nmain_back_image=\ntop_background_repeat=repeat\ntop_background_position=left top\nmain_back_image_over=\ntop_hover_background_repeat=repeat\ntop_hover_background_position=left top\nsub_back_image=images/swmenupro/submenu-normal.png\nsub_background_repeat=repeat-x\nsub_background_position=left top\nsub_back_image_over=images/swmenupro/submenu-hover.png\nsub_hover_background_repeat=repeat-x\nsub_hover_background_position=left top\ncomplete_background=\nactive_background=\nmain_back=\nmain_over=\nsub_back=\nsub_over=\ntop_sub_indicator=\ntop_sub_indicator_align=right\ntop_sub_indicator_top=0\ntop_sub_indicator_left=0\nsub_sub_indicator=images/swmenupro/arrows/blackleft-on.gif\nsub_sub_indicator_align=right\nsub_sub_indicator_top=0\nsub_sub_indicator_left=0\nfont_family=Arial, Helvetica, sans-serif\nsub_font_family=Arial, Helvetica, sans-serif\ntop_ttf=\nsub_ttf=\nmain_font_color=#E3E7ED\nmain_font_color_over=#FFE70F\nsub_font_color=#FFFFFF\nsub_font_color_over=#752900\nactive_font=#F0F09E\nmain_font_size=12\nsub_font_size=12\nfont_weight=normal\nfont_weight_over=bold\nmain_align=left\nsub_align=center\ntop_wrap=nowrap\nsub_wrap=nowrap\ntop_font_extra=\nsub_font_extra=\nmain_border_style=none\nmain_border_color=#17050E\nmain_border_width=0\nmain_border_over_style=none\nmain_border_color_over=#F34AFF\nmain_border_over_width=0\nsub_border_style=none\nsub_border_color=#061C1B\nsub_border_width=0\nsub_border_over_style=none\nsub_border_color_over=#94FFB4\nsub_border_over_width=0\nc_corner_style=none\nc_corner_size=1\nctl_corner=1\nctr_corner=1\ncbl_corner=1\ncbr_corner=1\nt_corner_style=none\nt_corner_size=8\nttl_corner=1\nttr_corner=1\ntbl_corner=1\ntbr_corner=1\ns_corner_style=curvycorner\ns_corner_size=5\nstl_corner=1\nstr_corner=1\nsbl_corner=1\nsbr_corner=1\nsi_corner_style=none\nsi_corner_size=\nmenutype=mainmenu\nparentid=0\nactive_menu=1\nlevels=0\nparent_level=0\ncssload=0\nhybrid=0\ntables=0\noverlay_hack=0\npadding_hack=0\nauto_position=0\nflash_hack=0\ndisable_jquery=0\ntablet_hack=1\nextra=fade\nspecialB=321\nspecialA=100\ncid=on\nautoassign=active\nautoattrib=\nauto_css=\nno_html=0\nmanual=0\nrel_path=http://www.devsite.com.au/regencynew\nmodule=1\nmenuname=mainmenu\nimages_preview=1\ntitle=Top Menu\nborder_hack=0\noption=com_swmenupro\ntmpl=index\nmenustyle=gosumenu\ntask=saveedit\nid=89\ntop_font_face=\nsub_font_face=\nlimit=30\nlimitstart=0\npreview=0\nreturntask=save\ndefaultfolder=swmenupro\n'),
(11, 90, 'position=left\norientation=horizontal/down\nmain_width=0\nmain_height=0\nsub_width=0\nsub_height=16\nmain_top=0\nmain_left=0\nlevel1_sub_top=0\nlevel1_sub_left=0\nlevel2_sub_top=0\nlevel2_sub_left=0\ncomplete_margin_top=0\ncomplete_margin_right=0\ncomplete_margin_bottom=0\ncomplete_margin_left=0\ntop_margin_top=0\ntop_margin_right=0\ntop_margin_bottom=0\ntop_margin_left=0\nmain_pad_top=5\nmain_pad_right=25\nmain_pad_bottom=5\nmain_pad_left=0\nsub_pad_top=10\nsub_pad_right=5\nsub_pad_bottom=10\nsub_pad_left=5\ncomplete_background_image=\ncomplete_background_repeat=repeat\ncomplete_background_position=left top\nactive_background_image=\nactive_background_repeat=repeat\nactive_background_position=left top\nmain_back_image=\ntop_background_repeat=repeat\ntop_background_position=left top\nmain_back_image_over=\ntop_hover_background_repeat=repeat\ntop_hover_background_position=left top\nsub_back_image=images/swmenupro/submenu-normal.png\nsub_background_repeat=repeat-x\nsub_background_position=left top\nsub_back_image_over=images/swmenupro/submenu-hover.png\nsub_hover_background_repeat=repeat-x\nsub_hover_background_position=left top\ncomplete_background=#FFFFFF\nactive_background=#FFFFFF\nmain_back=#FFFFFF\nmain_over=#FFFFFF\nsub_back=#FFFFFF\nsub_over=#752900\ntop_sub_indicator=\ntop_sub_indicator_align=right\ntop_sub_indicator_top=0\ntop_sub_indicator_left=0\nsub_sub_indicator=images/swmenupro/arrows/blackleft-on.gif\nsub_sub_indicator_align=right\nsub_sub_indicator_top=0\nsub_sub_indicator_left=0\nfont_family=Arial, Helvetica, sans-serif\nsub_font_family=Arial, Helvetica, sans-serif\ntop_ttf=\nsub_ttf=\nmain_font_color=#9466B8\nmain_font_color_over=#502C6D\nsub_font_color=#FFFFFF\nsub_font_color_over=#FFFFFF\nactive_font=#FFFFFF\nmain_font_size=11\nsub_font_size=11\nfont_weight=normal\nfont_weight_over=normal\nmain_align=left\nsub_align=left\ntop_wrap=nowrap\nsub_wrap=nowrap\ntop_font_extra=\nsub_font_extra=\nmain_border_style=none\nmain_border_color=#17050E\nmain_border_width=0\nmain_border_over_style=none\nmain_border_color_over=#F34AFF\nmain_border_over_width=0\nsub_border_style=none\nsub_border_color=#061C1B\nsub_border_width=0\nsub_border_over_style=none\nsub_border_color_over=#94FFB4\nsub_border_over_width=0\nc_corner_style=none\nc_corner_size=23\nctl_corner=1\nctr_corner=1\ncbl_corner=1\ncbr_corner=1\nt_corner_style=none\nt_corner_size=10\nttl_corner=1\nttr_corner=1\ntbl_corner=1\ntbr_corner=1\ns_corner_style=none\ns_corner_size=10\nstl_corner=1\nstr_corner=1\nsbl_corner=1\nsbr_corner=1\nsi_corner_style=none\nsi_corner_size=\nmenutype=mainmenu\nparentid=0\nactive_menu=1\nlevels=0\nparent_level=0\ncssload=0\nhybrid=0\ntables=0\noverlay_hack=0\npadding_hack=0\nauto_position=0\nflash_hack=0\ndisable_jquery=0\ntablet_hack=1\nextra=fade\nspecialB=321\nspecialA=100\ncid=on\nautoassign=active\nautoattrib=\nauto_css=\nno_html=0\nmanual=0\nrel_path=http://www.devsite.com.au/regencynew\nmodule=1\nmenuname=mainmenu\nimages_preview=1\ntitle=Footer Menu\nborder_hack=0\noption=com_swmenupro\ntmpl=index\nmenustyle=gosumenu\ntask=saveedit\nid=90\ntop_font_face=\nsub_font_face=\nlimit=30\nlimitstart=0\npreview=0\nreturntask=save\ndefaultfolder=swmenupro\n');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_swmenu_extended`
--

CREATE TABLE `i4aj7_swmenu_extended` (
  `ext_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `image_over` varchar(100) DEFAULT NULL,
  `moduleID` int(11) NOT NULL DEFAULT '0',
  `show_name` int(2) NOT NULL DEFAULT '1',
  `image_align` varchar(20) NOT NULL DEFAULT 'left',
  `target_level` int(11) NOT NULL DEFAULT '1',
  `normal_css` mediumtext,
  `over_css` mediumtext,
  `show_item` int(11) NOT NULL DEFAULT '1',
  `extra` mediumtext,
  `custom_html` text,
  `html_position` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ext_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `i4aj7_swmenu_extended`
--

INSERT INTO `i4aj7_swmenu_extended` (`ext_id`, `menu_id`, `image`, `image_over`, `moduleID`, `show_name`, `image_align`, `target_level`, `normal_css`, `over_css`, `show_item`, `extra`, `custom_html`, `html_position`) VALUES
(1, 2, 'images/swmenupro/history_a.png,,,,', 'images/swmenupro/history_hover.png,,,,', 89, 0, 'left', 1, '', '', 1, '', '', 'before'),
(2, 13, 'images/swmenupro/pre-owned-caravans-n.png,,,,', 'images/swmenupro/pre-owned-caravans-h.png,,,,', 89, 0, 'left', 1, '', '', 1, '', '', 'before'),
(3, 6, 'images/swmenupro/contact-us-n.png,,,,', 'images/swmenupro/contact-us-h.png,,,,', 89, 0, 'left', 1, '', '', 1, '', '', 'before'),
(4, 5, 'images/swmenupro/our-services-n.png,,,,', 'images/swmenupro/our-services-h.png,,,,', 89, 0, 'left', 1, '', '', 1, '', '', 'before'),
(5, 3, 'images/swmenupro/new-caravans-n.png,,,,', 'images/swmenupro/new-caravans-h.png,,,,', 89, 0, 'left', 0, '', '', 1, '', '', 'before'),
(6, 7, '', '', 89, 1, '', 1, '', '', 1, '', '', 'before'),
(7, 8, '', '', 89, 1, '', 1, '', '', 1, '', '', 'before'),
(8, 14, '', '', 89, 1, '', 1, '', '', 1, '', '', 'before'),
(9, 115, 'images/swmenupro/home-n.png,,,,', 'images/swmenupro/home-h.png,,,,', 89, 0, 'left', 1, '', '', 1, '', '', 'before'),
(10, 115, 'images/swmenupro/bottom-home-n.png,,,,', 'images/swmenupro/bottom-home-h.png,,,,', 90, 0, 'left', 1, '', '', 1, '', '', 'before'),
(11, 2, 'images/swmenupro/bottom-about-n.png,,,,', 'images/swmenupro/bottom-about-h.png,,,,', 90, 0, 'left', 1, '', '', 1, '', '', 'before'),
(12, 3, 'images/swmenupro/bottom-new-caravans-n.png,,,,', 'images/swmenupro/bottom-new-caravans-h.png,,,,', 90, 0, 'left', 1, '', '', 1, '', '', 'before'),
(13, 7, '', '', 90, 1, '', 1, '', '', 0, '', '', 'before'),
(14, 8, '', '', 90, 1, '', 1, '', '', 0, '', '', 'before'),
(15, 14, '', '', 90, 1, '', 1, '', '', 0, '', '', 'before'),
(16, 13, 'images/swmenupro/bottom-pre-owned-caravans-n.png,,,,', 'images/swmenupro/bottom-pre-owned-caravans-h.png,,,,', 90, 0, 'left', 1, '', '', 1, '', '', 'before'),
(17, 5, 'images/swmenupro/bottom-our-services-n.png,,,,', 'images/swmenupro/bottom-our-services-h.png,,,,', 90, 0, 'left', 1, '', '', 1, '', '', 'before'),
(18, 6, 'images/swmenupro/bottom-contact-us-n.png,,,,', 'images/swmenupro/bottom-contact-us-h.png,,,,', 90, 0, 'left', 1, '', '', 1, '', '', 'before');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_tags`
--

CREATE TABLE `i4aj7_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `metadesc` varchar(1024) NOT NULL COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) NOT NULL COMMENT 'The meta keywords for the page.',
  `metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tag_idx` (`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_path` (`path`),
  KEY `idx_left_right` (`lft`,`rgt`),
  KEY `idx_alias` (`alias`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `i4aj7_tags`
--

INSERT INTO `i4aj7_tags` (`id`, `parent_id`, `lft`, `rgt`, `level`, `path`, `title`, `alias`, `note`, `description`, `published`, `checked_out`, `checked_out_time`, `access`, `params`, `metadesc`, `metakey`, `metadata`, `created_user_id`, `created_time`, `created_by_alias`, `modified_user_id`, `modified_time`, `images`, `urls`, `hits`, `language`, `version`, `publish_up`, `publish_down`) VALUES
(1, 0, 0, 1, 0, '', 'ROOT', 'root', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{}', '', '', '', 0, '2011-01-01 00:00:01', '', 0, '0000-00-00 00:00:00', '', '', 0, '*', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_template_styles`
--

CREATE TABLE `i4aj7_template_styles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `template` varchar(50) NOT NULL DEFAULT '',
  `client_id` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `home` char(7) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_template` (`template`),
  KEY `idx_home` (`home`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `i4aj7_template_styles`
--

INSERT INTO `i4aj7_template_styles` (`id`, `template`, `client_id`, `home`, `title`, `params`) VALUES
(4, 'beez3', 0, '0', 'Beez3 - Default', '{"wrapperSmall":"53","wrapperLarge":"72","logo":"images\\/joomla_black.gif","sitetitle":"Joomla!","sitedescription":"Open Source Content Management","navposition":"left","templatecolor":"personal","html5":"0"}'),
(5, 'hathor', 1, '0', 'Hathor - Default', '{"showSiteName":"0","colourChoice":"","boldText":"0"}'),
(7, 'protostar', 0, '0', 'protostar - Default', '{"templateColor":"","logoFile":"","googleFont":"1","googleFontName":"Open+Sans","fluidContainer":"0"}'),
(8, 'isis', 1, '1', 'isis - Default', '{"templateColor":"","logoFile":""}'),
(9, 'earthlinkdesign', 1, '0', 'earthlinkdesign - Default', '{"templateColor":"#13294A","headerColor":"#184A7D","logoFile":"","admin_menus":"1","displayHeader":"1","statusFixed":"1","stickyToolbar":"1"}'),
(10, 'regencycaravans', 0, '1', 'RegencyCaravans - Default', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_twojtoolbox`
--

CREATE TABLE `i4aj7_twojtoolbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `params` text NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `state` tinyint(4) NOT NULL,
  `itemid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `i4aj7_twojtoolbox`
--

INSERT INTO `i4aj7_twojtoolbox` (`id`, `title`, `type`, `params`, `checked_out`, `checked_out_time`, `state`, `itemid`) VALUES
(1, 'Regal Caravans', 'gallery', '{"orderby":"0","items":"","preload":"0","preloadImage":"%%CSS_URL%%\\/images\\/ajax-loader.gif","preloadEffect":"1","galleryWidth":"100%","galleryAlign":"centre","galleryBgColor":"transparent","galleryPadding_top":"0","galleryPadding_right":"0","galleryPadding_left":"0","galleryPadding_bottom":"0","galleryBorder":"{\\"enabled\\":0,\\"width\\":1,\\"style\\":\\"solid\\",\\"color\\":\\"#000000\\"}","galleryShadow":"{\\"enabled\\":0,\\"width\\":4,\\"color\\":\\"#000000\\",\\"opacity\\":30}","showTitle":"0","thumbHoverEffect":"0","thumbStyle":"0","thumbStyleBgColor":"#ffffff","thumbStyleBgOpacity":"30","showTitleHover":"0","showDescHover":"0","showButtonHover":"0","clickText":"Click Here","innerborder":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#ffffff\\"}","border":"{\\"enabled\\":0,\\"width\\":1,\\"style\\":\\"solid\\",\\"color\\":\\"#000000\\"}","shadow":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#000000\\",\\"opacity\\":30}","hoverinnerborder":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#ffffff\\"}","hoverborder":"{\\"enabled\\":0,\\"width\\":1,\\"style\\":\\"solid\\",\\"color\\":\\"#000000\\"}","hovershadow":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#000000\\",\\"opacity\\":70}","thumb_width":"160","thumb_height":"160","thumb_type_resizing":"2","thumb_resize_position":"0","thumb_color":"#ffffff","thumbPadding_top":"8","thumbPadding_right":"8","thumbPadding_left":"8","thumbPadding_bottom":"8","showPagination":"0","countPagination":"20","paginationPosition":"1","paginationTheme":"light","goToTopPagination":"0","nextTextPagination":"Next","prevTextPagination":"Prev","showPaginationPagesInBar":"5","lightboxStyle":"1","lightboxDesc":"0","big_type_resizing":"3","big_width":"500","big_height":"375","big_color":"#ffffff","big_resize_position":"0","lightboxBg":"{\\"enabled\\":0,\\"color\\":\\"#000000\\",\\"opacity\\":80}","lightboxIframeWidth":"640","lightboxIframeHeight":"360","lightboxInlineWidth":"98%","lightboxInlineHeight":"98%","lightboxTextCurrent":"image {current} of {total}","lightboxTextPrevious":"previous","lightboxTextNext":"next","lightboxTextClose":"close"}', 0, '0000-00-00 00:00:00', 1, 0),
(2, 'Farren Gallery', 'gallery', '{"orderby":"0","items":"","preload":"0","preloadImage":"%%CSS_URL%%\\/images\\/ajax-loader.gif","preloadEffect":"1","galleryWidth":"100%","galleryAlign":"centre","galleryBgColor":"transparent","galleryPadding_top":"0","galleryPadding_right":"0","galleryPadding_left":"0","galleryPadding_bottom":"0","galleryBorder":"{\\"enabled\\":0,\\"width\\":1,\\"style\\":\\"solid\\",\\"color\\":\\"#000000\\"}","galleryShadow":"{\\"enabled\\":0,\\"width\\":4,\\"color\\":\\"#000000\\",\\"opacity\\":30}","showTitle":"0","thumbHoverEffect":"0","thumbStyle":"0","thumbStyleBgColor":"#ffffff","thumbStyleBgOpacity":"30","showTitleHover":"0","showDescHover":"0","showButtonHover":"0","clickText":"Click Here","innerborder":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#ffffff\\"}","border":"{\\"enabled\\":0,\\"width\\":1,\\"style\\":\\"solid\\",\\"color\\":\\"#000000\\"}","shadow":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#000000\\",\\"opacity\\":30}","hoverinnerborder":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#ffffff\\"}","hoverborder":"{\\"enabled\\":0,\\"width\\":1,\\"style\\":\\"solid\\",\\"color\\":\\"#000000\\"}","hovershadow":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#000000\\",\\"opacity\\":70}","thumb_width":"160","thumb_height":"160","thumb_type_resizing":"2","thumb_resize_position":"0","thumb_color":"#ffffff","thumbPadding_top":"8","thumbPadding_right":"8","thumbPadding_left":"8","thumbPadding_bottom":"8","showPagination":"0","countPagination":"20","paginationPosition":"1","paginationTheme":"light","goToTopPagination":"0","nextTextPagination":"Next","prevTextPagination":"Prev","showPaginationPagesInBar":"5","lightboxStyle":"1","lightboxDesc":"0","big_type_resizing":"3","big_width":"500","big_height":"375","big_color":"#ffffff","big_resize_position":"0","lightboxBg":"{\\"enabled\\":0,\\"color\\":\\"#000000\\",\\"opacity\\":80}","lightboxIframeWidth":"640","lightboxIframeHeight":"360","lightboxInlineWidth":"98%","lightboxInlineHeight":"98%","lightboxTextCurrent":"image {current} of {total}","lightboxTextPrevious":"previous","lightboxTextNext":"next","lightboxTextClose":"close"}', 0, '0000-00-00 00:00:00', 1, 0),
(3, 'Carrington Gallery', 'gallery', '{"orderby":"0","items":"","preload":"0","preloadImage":"%%CSS_URL%%\\/images\\/ajax-loader.gif","preloadEffect":"1","galleryWidth":"100%","galleryAlign":"centre","galleryBgColor":"transparent","galleryPadding_top":"0","galleryPadding_right":"0","galleryPadding_left":"0","galleryPadding_bottom":"0","galleryBorder":"{\\"enabled\\":0,\\"width\\":1,\\"style\\":\\"solid\\",\\"color\\":\\"#000000\\"}","galleryShadow":"{\\"enabled\\":0,\\"width\\":4,\\"color\\":\\"#000000\\",\\"opacity\\":30}","showTitle":"0","thumbHoverEffect":"0","thumbStyle":"0","thumbStyleBgColor":"#ffffff","thumbStyleBgOpacity":"30","showTitleHover":"0","showDescHover":"0","showButtonHover":"0","clickText":"Click Here","innerborder":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#ffffff\\"}","border":"{\\"enabled\\":0,\\"width\\":1,\\"style\\":\\"solid\\",\\"color\\":\\"#000000\\"}","shadow":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#000000\\",\\"opacity\\":30}","hoverinnerborder":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#ffffff\\"}","hoverborder":"{\\"enabled\\":0,\\"width\\":1,\\"style\\":\\"solid\\",\\"color\\":\\"#000000\\"}","hovershadow":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#000000\\",\\"opacity\\":70}","thumb_width":"160","thumb_height":"160","thumb_type_resizing":"2","thumb_resize_position":"0","thumb_color":"#ffffff","thumbPadding_top":"8","thumbPadding_right":"8","thumbPadding_left":"8","thumbPadding_bottom":"8","showPagination":"0","countPagination":"20","paginationPosition":"1","paginationTheme":"light","goToTopPagination":"0","nextTextPagination":"Next","prevTextPagination":"Prev","showPaginationPagesInBar":"5","lightboxStyle":"1","lightboxDesc":"0","big_type_resizing":"3","big_width":"500","big_height":"375","big_color":"#ffffff","big_resize_position":"0","lightboxBg":"{\\"enabled\\":0,\\"color\\":\\"#000000\\",\\"opacity\\":80}","lightboxIframeWidth":"640","lightboxIframeHeight":"360","lightboxInlineWidth":"98%","lightboxInlineHeight":"98%","lightboxTextCurrent":"image {current} of {total}","lightboxTextPrevious":"previous","lightboxTextNext":"next","lightboxTextClose":"close"}', 0, '0000-00-00 00:00:00', 1, 0),
(4, 'Prince Gallery', 'gallery', '{"orderby":"0","items":"","preload":"0","preloadImage":"%%CSS_URL%%\\/images\\/ajax-loader.gif","preloadEffect":"1","galleryWidth":"100%","galleryAlign":"centre","galleryBgColor":"transparent","galleryPadding_top":"0","galleryPadding_right":"0","galleryPadding_left":"0","galleryPadding_bottom":"0","galleryBorder":"{\\"enabled\\":0,\\"width\\":1,\\"style\\":\\"solid\\",\\"color\\":\\"#000000\\"}","galleryShadow":"{\\"enabled\\":0,\\"width\\":4,\\"color\\":\\"#000000\\",\\"opacity\\":30}","showTitle":"0","thumbHoverEffect":"0","thumbStyle":"0","thumbStyleBgColor":"#ffffff","thumbStyleBgOpacity":"30","showTitleHover":"0","showDescHover":"0","showButtonHover":"0","clickText":"Click Here","innerborder":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#ffffff\\"}","border":"{\\"enabled\\":0,\\"width\\":1,\\"style\\":\\"solid\\",\\"color\\":\\"#000000\\"}","shadow":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#000000\\",\\"opacity\\":30}","hoverinnerborder":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#ffffff\\"}","hoverborder":"{\\"enabled\\":0,\\"width\\":1,\\"style\\":\\"solid\\",\\"color\\":\\"#000000\\"}","hovershadow":"{\\"enabled\\":1,\\"width\\":4,\\"color\\":\\"#000000\\",\\"opacity\\":70}","thumb_width":"160","thumb_height":"160","thumb_type_resizing":"2","thumb_resize_position":"0","thumb_color":"#ffffff","thumbPadding_top":"8","thumbPadding_right":"8","thumbPadding_left":"8","thumbPadding_bottom":"8","showPagination":"0","countPagination":"20","paginationPosition":"1","paginationTheme":"light","goToTopPagination":"0","nextTextPagination":"Next","prevTextPagination":"Prev","showPaginationPagesInBar":"5","lightboxStyle":"1","lightboxDesc":"0","big_type_resizing":"3","big_width":"500","big_height":"375","big_color":"#ffffff","big_resize_position":"0","lightboxBg":"{\\"enabled\\":0,\\"color\\":\\"#000000\\",\\"opacity\\":80}","lightboxIframeWidth":"640","lightboxIframeHeight":"360","lightboxInlineWidth":"98%","lightboxInlineHeight":"98%","lightboxTextCurrent":"image {current} of {total}","lightboxTextPrevious":"previous","lightboxTextNext":"next","lightboxTextClose":"close"}', 0, '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_twojtoolbox_config`
--

CREATE TABLE `i4aj7_twojtoolbox_config` (
  `id` int(11) NOT NULL,
  `update` bigint(20) NOT NULL,
  `t` int(11) NOT NULL,
  `version` int(11) NOT NULL,
  `version_available` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i4aj7_twojtoolbox_config`
--

INSERT INTO `i4aj7_twojtoolbox_config` (`id`, `update`, `t`, `version`, `version_available`) VALUES
(1, 1368862551, 0, 1015, 1012);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_twojtoolbox_elements`
--

CREATE TABLE `i4aj7_twojtoolbox_elements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `params` text NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `language` varchar(7) NOT NULL,
  `ordering` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `link` text NOT NULL,
  `link_blank` tinyint(4) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `i4aj7_twojtoolbox_elements`
--

INSERT INTO `i4aj7_twojtoolbox_elements` (`id`, `title`, `catid`, `params`, `img`, `desc`, `language`, `ordering`, `state`, `link`, `link_blank`, `checked_out`, `checked_out_time`) VALUES
(1, 'caravan05', 1, '', 'caravan05.jpg', '', '*', 1, 1, '', 0, 0, '0000-00-00 00:00:00'),
(2, 'caravan09', 1, '', 'caravan09.jpg', '', '*', 2, 1, '', 0, 0, '0000-00-00 00:00:00'),
(3, 'caravan11', 1, '', 'caravan11.jpg', '', '*', 3, 1, '', 0, 0, '0000-00-00 00:00:00'),
(4, 'caravan16', 1, '', 'caravan16.jpg', '', '*', 4, 1, '', 0, 0, '0000-00-00 00:00:00'),
(5, 'caravan17', 1, '', 'caravan17.jpg', '', '*', 5, 1, '', 0, 0, '0000-00-00 00:00:00'),
(6, 'curve01', 1, '', 'curve01.jpg', '', '*', 6, 1, '', 0, 0, '0000-00-00 00:00:00'),
(7, 'curve02', 1, '', 'curve02.jpg', '', '*', 7, 1, '', 0, 0, '0000-00-00 00:00:00'),
(8, 'ford02', 1, '', 'ford02.jpg', '', '*', 8, 1, '', 0, 0, '0000-00-00 00:00:00'),
(9, 'ford03', 1, '', 'ford03.jpg', '', '*', 9, 1, '', 0, 0, '0000-00-00 00:00:00'),
(10, 'holden01', 1, '', 'holden01.jpg', '', '*', 10, 1, '', 0, 0, '0000-00-00 00:00:00'),
(11, 'inside01', 1, '', 'inside01.jpg', '', '*', 11, 1, '', 0, 0, '0000-00-00 00:00:00'),
(12, 'inside03', 1, '', 'inside03.jpg', '', '*', 12, 1, '', 0, 0, '0000-00-00 00:00:00'),
(13, 'inside06', 1, '', 'inside06.jpg', '', '*', 13, 1, '', 0, 0, '0000-00-00 00:00:00'),
(14, 'inside07', 1, '', 'inside07.jpg', '', '*', 14, 1, '', 0, 0, '0000-00-00 00:00:00'),
(15, 'inside14', 1, '', 'inside14.jpg', '', '*', 15, 1, '', 0, 0, '0000-00-00 00:00:00'),
(16, 'inside29', 1, '', 'inside29.jpg', '', '*', 16, 1, '', 0, 0, '0000-00-00 00:00:00'),
(17, 'inside30', 1, '', 'inside30.jpg', '', '*', 17, 1, '', 0, 0, '0000-00-00 00:00:00'),
(18, 'inside31', 1, '', 'inside31.jpg', '', '*', 18, 1, '', 0, 0, '0000-00-00 00:00:00'),
(19, 'inside33', 1, '', 'inside33.jpg', '', '*', 19, 1, '', 0, 0, '0000-00-00 00:00:00'),
(20, 'Farren_2', 2, '', 'Farren_2.jpg', '', '*', 1, 1, '', 0, 0, '0000-00-00 00:00:00'),
(21, 'Farren_3', 2, '', 'Farren_3.jpg', '', '*', 2, 1, '', 0, 0, '0000-00-00 00:00:00'),
(22, 'Farren_4', 2, '', 'Farren_4.jpg', '', '*', 3, 1, '', 0, 0, '0000-00-00 00:00:00'),
(23, 'Farren_5', 2, '', 'Farren_5.jpg', '', '*', 4, 1, '', 0, 0, '0000-00-00 00:00:00'),
(24, 'Farren_6', 2, '', 'Farren_6.jpg', '', '*', 5, 1, '', 0, 0, '0000-00-00 00:00:00'),
(25, 'Farren_7', 2, '', 'Farren_7.jpg', '', '*', 6, 1, '', 0, 0, '0000-00-00 00:00:00'),
(26, 'Farren_8', 2, '', 'Farren_8.jpg', '', '*', 7, 1, '', 0, 0, '0000-00-00 00:00:00'),
(27, 'Internal_1', 2, '', 'Internal_1.jpg', '', '*', 8, 1, '', 0, 0, '0000-00-00 00:00:00'),
(28, 'Internal_2', 2, '', 'Internal_2.jpg', '', '*', 9, 1, '', 0, 0, '0000-00-00 00:00:00'),
(29, 'Internal_3', 2, '', 'Internal_3.jpg', '', '*', 10, 1, '', 0, 0, '0000-00-00 00:00:00'),
(30, 'Internal_4', 2, '', 'Internal_4.jpg', '', '*', 11, 1, '', 0, 0, '0000-00-00 00:00:00'),
(31, 'Internal_5', 2, '', 'Internal_5.jpg', '', '*', 12, 1, '', 0, 0, '0000-00-00 00:00:00'),
(32, 'Internal_6', 2, '', 'Internal_6.jpg', '', '*', 13, 1, '', 0, 0, '0000-00-00 00:00:00'),
(33, 'Internal_7', 2, '', 'Internal_7.jpg', '', '*', 14, 1, '', 0, 0, '0000-00-00 00:00:00'),
(34, 'Internal_8', 2, '', 'Internal_8.jpg', '', '*', 15, 1, '', 0, 0, '0000-00-00 00:00:00'),
(35, 'Internal_9', 2, '', 'Internal_9.jpg', '', '*', 16, 1, '', 0, 0, '0000-00-00 00:00:00'),
(36, 'farren-10', 2, '', 'farren-10.jpg', '', '*', 17, 1, '', 0, 0, '0000-00-00 00:00:00'),
(37, 'farren-11', 2, '', 'farren-11.jpg', '', '*', 18, 1, '', 0, 0, '0000-00-00 00:00:00'),
(38, 'farren-3', 2, '', 'farren-3.jpg', '', '*', 19, 1, '', 0, 0, '0000-00-00 00:00:00'),
(39, 'farren-4', 2, '', 'farren-4.jpg', '', '*', 20, 1, '', 0, 0, '0000-00-00 00:00:00'),
(40, 'farren-6', 2, '', 'farren-6.jpg', '', '*', 21, 1, '', 0, 0, '0000-00-00 00:00:00'),
(41, 'farren-8', 2, '', 'farren-8.jpg', '', '*', 22, 1, '', 0, 0, '0000-00-00 00:00:00'),
(42, 'farren_1', 2, '', 'farren_1.jpg', '', '*', 23, 1, '', 0, 0, '0000-00-00 00:00:00'),
(43, '_MG_9784', 3, '', '_MG_9784.jpg', '', '*', 1, 1, '', 0, 0, '0000-00-00 00:00:00'),
(44, '_MG_9897', 3, '', '_MG_9897.jpg', '', '*', 2, 1, '', 0, 0, '0000-00-00 00:00:00'),
(45, 'carrington', 3, '', 'carrington.jpg', '', '*', 3, 1, '', 0, 0, '0000-00-00 00:00:00'),
(46, 'carrington_9805', 3, '', 'carrington_9805.jpg', '', '*', 4, 1, '', 0, 0, '0000-00-00 00:00:00'),
(47, 'carrington_9867', 3, '', 'carrington_9867.jpg', '', '*', 5, 1, '', 0, 0, '0000-00-00 00:00:00'),
(48, 'carrington_9872', 3, '', 'carrington_9872.jpg', '', '*', 6, 1, '', 0, 0, '0000-00-00 00:00:00'),
(49, 'carrington_9885', 3, '', 'carrington_9885.jpg', '', '*', 7, 1, '', 0, 0, '0000-00-00 00:00:00'),
(50, 'carrington_gallery_2287', 3, '', 'carrington_gallery_2287.jpg', '', '*', 8, 1, '', 0, 0, '0000-00-00 00:00:00'),
(51, 'carrington_gallery_2288', 3, '', 'carrington_gallery_2288.jpg', '', '*', 9, 1, '', 0, 0, '0000-00-00 00:00:00'),
(52, 'carrington_gallery_2291', 3, '', 'carrington_gallery_2291.jpg', '', '*', 10, 1, '', 0, 0, '0000-00-00 00:00:00'),
(53, 'carrington_gallery_2292', 3, '', 'carrington_gallery_2292.jpg', '', '*', 11, 1, '', 0, 0, '0000-00-00 00:00:00'),
(54, 'carrington_gallery_2298', 3, '', 'carrington_gallery_2298.jpg', '', '*', 12, 1, '', 0, 0, '0000-00-00 00:00:00'),
(55, 'carrington_gallery_2299', 3, '', 'carrington_gallery_2299.jpg', '', '*', 13, 1, '', 0, 0, '0000-00-00 00:00:00'),
(56, 'carrington_gallery_2300', 3, '', 'carrington_gallery_2300.jpg', '', '*', 14, 1, '', 0, 0, '0000-00-00 00:00:00'),
(57, 'carrington_gallery_2301', 3, '', 'carrington_gallery_2301.jpg', '', '*', 15, 1, '', 0, 0, '0000-00-00 00:00:00'),
(58, 'carrington_gallery_2303', 3, '', 'carrington_gallery_2303.jpg', '', '*', 16, 1, '', 0, 0, '0000-00-00 00:00:00'),
(59, 'carrington_gallery_2311', 3, '', 'carrington_gallery_2311.jpg', '', '*', 17, 1, '', 0, 0, '0000-00-00 00:00:00'),
(60, 'carrington_gallery_2312', 3, '', 'carrington_gallery_2312.jpg', '', '*', 18, 1, '', 0, 0, '0000-00-00 00:00:00'),
(61, 'carrington_gallery_2316', 3, '', 'carrington_gallery_2316.jpg', '', '*', 19, 1, '', 0, 0, '0000-00-00 00:00:00'),
(62, 'interior_MG_9905', 3, '', 'interior_MG_9905.jpg', '', '*', 20, 1, '', 0, 0, '0000-00-00 00:00:00'),
(63, 'interior_MG_9908', 3, '', 'interior_MG_9908.jpg', '', '*', 21, 1, '', 0, 0, '0000-00-00 00:00:00'),
(64, 'interior_MG_9912', 3, '', 'interior_MG_9912.jpg', '', '*', 22, 1, '', 0, 0, '0000-00-00 00:00:00'),
(65, 'interior_MG_9915', 3, '', 'interior_MG_9915.jpg', '', '*', 23, 1, '', 0, 0, '0000-00-00 00:00:00'),
(66, 'interior_MG_9926', 3, '', 'interior_MG_9926.jpg', '', '*', 24, 1, '', 0, 0, '0000-00-00 00:00:00'),
(67, '_mg_2244', 4, '', '_mg_2244.jpg', '', '*', 1, 1, '', 0, 0, '0000-00-00 00:00:00'),
(68, '_mg_2248', 4, '', '_mg_2248.jpg', '', '*', 2, 1, '', 0, 0, '0000-00-00 00:00:00'),
(69, '_mg_2249', 4, '', '_mg_2249.jpg', '', '*', 3, 1, '', 0, 0, '0000-00-00 00:00:00'),
(70, '_mg_2252', 4, '', '_mg_2252.jpg', '', '*', 4, 1, '', 0, 0, '0000-00-00 00:00:00'),
(71, '_mg_2254', 4, '', '_mg_2254.jpg', '', '*', 5, 1, '', 0, 0, '0000-00-00 00:00:00'),
(72, '_mg_2256', 4, '', '_mg_2256.jpg', '', '*', 6, 1, '', 0, 0, '0000-00-00 00:00:00'),
(73, '_mg_2258', 4, '', '_mg_2258.jpg', '', '*', 7, 1, '', 0, 0, '0000-00-00 00:00:00'),
(74, '_mg_2260', 4, '', '_mg_2260.jpg', '', '*', 8, 1, '', 0, 0, '0000-00-00 00:00:00'),
(75, '_mg_2263', 4, '', '_mg_2263.jpg', '', '*', 9, 1, '', 0, 0, '0000-00-00 00:00:00'),
(76, 'interior_0002', 4, '', 'interior_0002.jpg', '', '*', 10, 1, '', 0, 0, '0000-00-00 00:00:00'),
(77, 'interior_0005', 4, '', 'interior_0005.jpg', '', '*', 11, 1, '', 0, 0, '0000-00-00 00:00:00'),
(78, 'interior_0008', 4, '', 'interior_0008.jpg', '', '*', 12, 1, '', 0, 0, '0000-00-00 00:00:00'),
(79, 'interior_0014', 4, '', 'interior_0014.jpg', '', '*', 13, 1, '', 0, 0, '0000-00-00 00:00:00'),
(80, 'interior_IMG_9975', 4, '', 'interior_IMG_9975.jpg', '', '*', 14, 1, '', 0, 0, '0000-00-00 00:00:00'),
(81, 'interior_MG_9959', 4, '', 'interior_MG_9959.jpg', '', '*', 15, 1, '', 0, 0, '0000-00-00 00:00:00'),
(82, 'interior_MG_9990', 4, '', 'interior_MG_9990.jpg', '', '*', 16, 1, '', 0, 0, '0000-00-00 00:00:00'),
(83, 'interior_MG_9992', 4, '', 'interior_MG_9992.jpg', '', '*', 17, 1, '', 0, 0, '0000-00-00 00:00:00'),
(84, 'prince-gallery_2275', 4, '', 'prince-gallery_2275.jpg', '', '*', 18, 1, '', 0, 0, '0000-00-00 00:00:00'),
(85, 'prince', 4, '', 'prince.jpg', '', '*', 19, 1, '', 0, 0, '0000-00-00 00:00:00'),
(86, 'prince_9717', 4, '', 'prince_9717.jpg', '', '*', 20, 1, '', 0, 0, '0000-00-00 00:00:00'),
(87, 'prince_9766', 4, '', 'prince_9766.jpg', '', '*', 21, 1, '', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_twojtoolbox_menu`
--

CREATE TABLE `i4aj7_twojtoolbox_menu` (
  `id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  PRIMARY KEY (`id`,`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_twojtoolbox_news`
--

CREATE TABLE `i4aj7_twojtoolbox_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_news` int(11) NOT NULL,
  `date_in` int(11) NOT NULL,
  `message` text NOT NULL,
  `read` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `i4aj7_twojtoolbox_news`
--

INSERT INTO `i4aj7_twojtoolbox_news` (`id`, `id_news`, `date_in`, `message`, `read`) VALUES
(1, 3, 1368862551, '<a href=''http://www.2joomla.net/joomla-extensions/2j-scroll-to'' target=''_blank''>2JScrollTo</a> Released - new multifunctional button for your Joomla website', 0),
(2, 2, 1368862551, '<a href=''http://www.2joomla.net/joomla-extensions/2j-news-slider'' target=''_blank''>2JNewsSlider</a> updated - we added CSS edit option in backend', 0),
(3, 1, 1368862551, 'Release of the new <a href=''http://www.2joomla.net/joomla-extensions/2j-gallery'' target=''_blank''>2J Gallery</a> - css3 Joomla! images gallery', 0);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_twojtoolbox_plugins`
--

CREATE TABLE `i4aj7_twojtoolbox_plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `desc` text NOT NULL,
  `install` int(1) NOT NULL,
  `v_install` int(11) NOT NULL,
  `v_server` int(11) NOT NULL,
  `v_active` varchar(255) NOT NULL,
  `adddate` bigint(20) NOT NULL,
  `multi` int(1) NOT NULL,
  `images` int(1) NOT NULL,
  `multitag` int(11) NOT NULL,
  `daemon` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL,
  `desc_small` varchar(255) NOT NULL,
  `price` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `i4aj7_twojtoolbox_plugins`
--

INSERT INTO `i4aj7_twojtoolbox_plugins` (`id`, `title`, `type`, `desc`, `install`, `v_install`, `v_server`, `v_active`, `adddate`, `multi`, `images`, `multitag`, `daemon`, `ordering`, `desc_small`, `price`) VALUES
(1, '2J Gallery', 'gallery', '2JGallery it''s the one of the most effective and attractive ways to organize your images gallery on Joomla! website. You have here all necessary tools for creation of the gallery, upload images and customization of the front end interface. Front end interface is CSS3 based what is most important it''s highly customizable. 2JGallery have 8 pre-configured themes with 4 different animation on Hover effects and 6 lightboxes. It''s possible to insert multiply copies of the gallery at the same page and every gallery could have own settings. No limits for amount of uploaded images and amount of the gallery instances per page.', 1, 1004, 1004, '1004', 1368862023, 1, 1, 0, 0, 0, '2J Gallery it''s an ajax images gallery with css3 front end interface', '30.00'),
(2, '2JCarousel', 'carousel', '2JCarousel - it''s AJAX 3D images carousel, with wide range of customization options (attention!!! around 50 options for customization of the front end carousel or admin backend settings) With 2JCarousel you can add images carousel to the web site, which looks like 3D oval with perspective. With 2JCarousel you receive freedom of creativity: all this options with combination of CSS styles which you can easily modify to make 2JCarousel fit to your web site design and your needs the best way!<br />2JCarousel have advanced images management tools: 3 ways for uploading sets of the images to the component scanning server directory, batch upload , uploading single images (one by one).<br />2JCarousel have implemented smart resizing functionality for thumbnails and big images.', 0, 0, 1006, '', 1368862551, 0, 0, 0, 0, 0, '3D images slideshow. Powerfull extension with advanced images manager and more then 50 configuration options', '45.00'),
(3, '2JImageViewer V2', 'imageviewerv2', '2JImageViewer v2 it''s completely new look and functionality. Great fresh Joomla images slideshow with cool CSS3 themes a lot of new transition animation effects. <br />Full set of front end navigation elements: next/previous buttons, play/pause button, scrolling panel with thumbnails, dot buttons navigation and panel for the image description and title information. All front end interface elements are highly customizable. Very comfortable and easy to use tools for management of the images settings. Advanced tools for uploading images: batch upload, scan and upload multiple images from the directories of the server , upload single images one by one. <br />Fully customizable front end interface: all frond end elements are floatable and all CSS3 styles implemented in component as additional configuration settings. So in the case if you a beginner and don''t have any idea how to edit CSS You don''t have to! Just open component admin section and specify all colors, sizes and positions of the image viewer in native joomla way!', 0, 0, 2001, '', 1368862551, 0, 0, 0, 0, 0, 'images slideshow with great set of configurations, all front end elements are floatable and CSS based', '30.00'),
(4, '2JNewsSlider', 'newsslider', '2J NewsSlider - powerful content slider. 2J NewsSlider component reading content articles from Joomla!(R) category and showing them at front end 2JNewsSlider module, inside Joomla!(R) content article. Very wide range of effects and settings, make it more flexible for personalization. All elements of the front end interface could be easily changed by CSS styles.', 0, 0, 2002, '', 1368862551, 0, 0, 0, 0, 0, 'content slider with great set of settings, all front end elements customizable and CSS based', '30.00'),
(5, '2JTabs', 'tabs', '2J Tabs - it''s a fresh breath for your website layout. Very easy and comfortable way to organize your front end content most effective way. 2J Tabs can emulate multi-pages structure based on the Joomla!(R) content articles as result your visitors will get easy access to the big content articles (no need to scroll through a large page). 2JTabs it''s multi theme tabs with advanced admin settings and highly customizible CSS3 front end.', 0, 0, 1803, '', 1368862551, 0, 0, 0, 0, 0, 'tabs with multi-themes with advanced admin settings and highly customizable CSS3 front end', '30.00'),
(6, '2J ScrollTo', 'scrollto', '2J ScrollTo it''s multifunctional scrolling tool for Joomla! 2J ScrollTo allow you to create multipurpose buttons on selected pages of joomla website which could scroll your page up to the window, to some anchor in content, css id or class on page. Even more you can define custom link for button to the internal or external page. No limits for amount of scroll buttons per page. Front end inerface based on CSS3. Customizable on hover animation effect', 0, 0, 1000, '', 1368862551, 0, 0, 0, 0, 0, '2J ScrollTo it''s multifunctional scrolling tool for Joomla!', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_ucm_base`
--

CREATE TABLE `i4aj7_ucm_base` (
  `ucm_id` int(10) unsigned NOT NULL,
  `ucm_item_id` int(10) NOT NULL,
  `ucm_type_id` int(11) NOT NULL,
  `ucm_language_id` int(11) NOT NULL,
  PRIMARY KEY (`ucm_id`),
  KEY `idx_ucm_item_id` (`ucm_item_id`),
  KEY `idx_ucm_type_id` (`ucm_type_id`),
  KEY `idx_ucm_language_id` (`ucm_language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_ucm_content`
--

CREATE TABLE `i4aj7_ucm_content` (
  `core_content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `core_type_alias` varchar(255) NOT NULL DEFAULT '' COMMENT 'FK to the content types table',
  `core_title` varchar(255) NOT NULL,
  `core_alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `core_body` mediumtext NOT NULL,
  `core_state` tinyint(1) NOT NULL DEFAULT '0',
  `core_checked_out_time` varchar(255) NOT NULL DEFAULT '',
  `core_checked_out_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `core_access` int(10) unsigned NOT NULL DEFAULT '0',
  `core_params` text NOT NULL,
  `core_featured` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `core_metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `core_created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `core_created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `core_created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `core_modified_user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Most recent user that modified',
  `core_modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `core_language` char(7) NOT NULL,
  `core_publish_up` datetime NOT NULL,
  `core_publish_down` datetime NOT NULL,
  `core_content_item_id` int(10) unsigned DEFAULT NULL COMMENT 'ID from the individual type table',
  `asset_id` int(10) unsigned DEFAULT NULL COMMENT 'FK to the #__assets table.',
  `core_images` text NOT NULL,
  `core_urls` text NOT NULL,
  `core_hits` int(10) unsigned NOT NULL DEFAULT '0',
  `core_version` int(10) unsigned NOT NULL DEFAULT '1',
  `core_ordering` int(11) NOT NULL DEFAULT '0',
  `core_metakey` text NOT NULL,
  `core_metadesc` text NOT NULL,
  `core_catid` int(10) unsigned NOT NULL DEFAULT '0',
  `core_xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `core_type_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`core_content_id`),
  KEY `tag_idx` (`core_state`,`core_access`),
  KEY `idx_access` (`core_access`),
  KEY `idx_alias` (`core_alias`),
  KEY `idx_language` (`core_language`),
  KEY `idx_title` (`core_title`),
  KEY `idx_modified_time` (`core_modified_time`),
  KEY `idx_created_time` (`core_created_time`),
  KEY `idx_content_type` (`core_type_alias`),
  KEY `idx_core_modified_user_id` (`core_modified_user_id`),
  KEY `idx_core_checked_out_user_id` (`core_checked_out_user_id`),
  KEY `idx_core_created_user_id` (`core_created_user_id`),
  KEY `idx_core_type_id` (`core_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains core content data in name spaced fields' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_updates`
--

CREATE TABLE `i4aj7_updates` (
  `update_id` int(11) NOT NULL AUTO_INCREMENT,
  `update_site_id` int(11) DEFAULT '0',
  `extension_id` int(11) DEFAULT '0',
  `name` varchar(100) DEFAULT '',
  `description` text NOT NULL,
  `element` varchar(100) DEFAULT '',
  `type` varchar(20) DEFAULT '',
  `folder` varchar(20) DEFAULT '',
  `client_id` tinyint(3) DEFAULT '0',
  `version` varchar(10) DEFAULT '',
  `data` text NOT NULL,
  `detailsurl` text NOT NULL,
  `infourl` text NOT NULL,
  PRIMARY KEY (`update_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Available Updates' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_update_sites`
--

CREATE TABLE `i4aj7_update_sites` (
  `update_site_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `type` varchar(20) DEFAULT '',
  `location` text NOT NULL,
  `enabled` int(11) DEFAULT '0',
  `last_check_timestamp` bigint(20) DEFAULT '0',
  PRIMARY KEY (`update_site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Update Sites' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `i4aj7_update_sites`
--

INSERT INTO `i4aj7_update_sites` (`update_site_id`, `name`, `type`, `location`, `enabled`, `last_check_timestamp`) VALUES
(1, 'Joomla Core', 'collection', 'http://update.joomla.org/core/list.xml', 1, 0),
(2, 'Joomla Extension Directory', 'collection', 'http://update.joomla.org/jed/list.xml', 1, 0),
(3, 'Accredited Joomla! Translations', 'collection', 'http://update.joomla.org/language/translationlist_3.xml', 1, 0),
(4, 'FOF Updates (official releases)', 'extension', 'http://cdn.akeebabackup.com/updates/fof.xml', 1, 0),
(5, 'NoNumber NoNumber Extension Manager', 'extension', 'http://download.nonumber.nl/updates.php?e=nonumbermanager&type=.zip', 1, 0),
(6, 'NoNumber Add to Menu', 'extension', 'http://download.nonumber.nl/updates.php?e=addtomenu&type=.zip', 1, 0),
(7, 'NoNumber Articles Anywhere', 'extension', 'http://download.nonumber.nl/updates.php?e=articlesanywhere&type=.zip', 1, 0),
(8, 'NoNumber Better Preview', 'extension', 'http://download.nonumber.nl/updates.php?e=betterpreview&type=.zip', 1, 0),
(9, 'NoNumber Cache Cleaner', 'extension', 'http://download.nonumber.nl/updates.php?e=cachecleaner&type=.zip', 1, 0),
(10, 'JM Slideshow Responsive', 'extension', 'http://extensions.joomlaman.com/jmslideshow/update.xml', 1, 0),
(11, 'NoNumber Advanced Module Manager', 'extension', 'http://download.nonumber.nl/updates.php?e=advancedmodules&type=.zip', 1, 0),
(12, 'JCE Editor Updates', 'extension', 'https://www.joomlacontenteditor.net/index.php?option=com_updates&view=update&format=xml&id=1&file=extension.xml', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_update_sites_extensions`
--

CREATE TABLE `i4aj7_update_sites_extensions` (
  `update_site_id` int(11) NOT NULL DEFAULT '0',
  `extension_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`update_site_id`,`extension_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Links extensions to update sites';

--
-- Dumping data for table `i4aj7_update_sites_extensions`
--

INSERT INTO `i4aj7_update_sites_extensions` (`update_site_id`, `extension_id`) VALUES
(1, 700),
(2, 700),
(3, 600),
(4, 10033),
(5, 10035),
(6, 10037),
(6, 10057),
(7, 10039),
(7, 10040),
(8, 10042),
(8, 10043),
(9, 10045),
(9, 10046),
(10, 10049),
(11, 10051),
(11, 10052),
(12, 10056);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_usergroups`
--

CREATE TABLE `i4aj7_usergroups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Adjacency List Reference Id',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `title` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_usergroup_parent_title_lookup` (`parent_id`,`title`),
  KEY `idx_usergroup_title_lookup` (`title`),
  KEY `idx_usergroup_adjacency_lookup` (`parent_id`),
  KEY `idx_usergroup_nested_set_lookup` (`lft`,`rgt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `i4aj7_usergroups`
--

INSERT INTO `i4aj7_usergroups` (`id`, `parent_id`, `lft`, `rgt`, `title`) VALUES
(1, 0, 1, 18, 'Public'),
(2, 1, 8, 15, 'Registered'),
(3, 2, 9, 14, 'Author'),
(4, 3, 10, 13, 'Editor'),
(5, 4, 11, 12, 'Publisher'),
(6, 1, 4, 7, 'Manager'),
(7, 6, 5, 6, 'Administrator'),
(8, 1, 16, 17, 'Super Users'),
(9, 1, 2, 3, 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_users`
--

CREATE TABLE `i4aj7_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `sendEmail` tinyint(4) DEFAULT '0',
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `lastResetTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Date of last password reset',
  `resetCount` int(11) NOT NULL DEFAULT '0' COMMENT 'Count of password resets since lastResetTime',
  PRIMARY KEY (`id`),
  KEY `idx_name` (`name`),
  KEY `idx_block` (`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=708 ;

--
-- Dumping data for table `i4aj7_users`
--

INSERT INTO `i4aj7_users` (`id`, `name`, `username`, `email`, `password`, `block`, `sendEmail`, `registerDate`, `lastvisitDate`, `activation`, `params`, `lastResetTime`, `resetCount`) VALUES
(64, 'client services', 'client.services', 'client.services@earthlinkdesign.com.au', '15168fe46863dd8c2ff4d71da02afc34:NsIXtf1pHemhw4JPN5IpcumWmd6SVRd6', 0, 0, '2011-08-21 12:43:29', '2012-10-07 04:05:33', '', '{"admin_language":"","language":"","editor":"","helpsite":"","timezone":""}', '0000-00-00 00:00:00', 0),
(65, 'Keith', 'Keith', 'sales@regencycaravans.com.au', 'ae38d8b1fbdb5522e93b201f5c5ccca2:NUHI9KcabQE7Rn5e5Z5ktCxXVLmgpuOh', 0, 1, '2011-09-13 23:52:05', '2014-01-04 05:39:24', '', '{"admin_language":"","language":"","editor":"","helpsite":"","timezone":"","admin_style":""}', '0000-00-00 00:00:00', 0),
(706, 'Super User', 'edadmin', 'andrew@earthlinkdesign.com.au', 'a5b696c88615a837f8ebb3e40b1518da:vfZDb0h8tV0mCPMdaosE77v66pAEW04i', 0, 1, '2013-05-18 04:12:25', '2014-03-21 05:22:49', '0', '', '0000-00-00 00:00:00', 0),
(707, 'Jimmy', 'jimmy', 'jimmy@earthlinkdesign.com.au', '9e3d58a0600d736068cb51cd27fbba2f:D3buQ6nvOvWXBfFhv4BTDlqwqUwzayDf', 0, 0, '2014-03-21 05:56:05', '0000-00-00 00:00:00', '', '{"admin_style":"","admin_language":"","language":"","editor":"","helpsite":"","timezone":""}', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_user_notes`
--

CREATE TABLE `i4aj7_user_notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(100) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `review_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_category_id` (`catid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_user_profiles`
--

CREATE TABLE `i4aj7_user_profiles` (
  `user_id` int(11) NOT NULL,
  `profile_key` varchar(100) NOT NULL,
  `profile_value` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `idx_user_id_profile_key` (`user_id`,`profile_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Simple user profile storage table';

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_user_usergroup_map`
--

CREATE TABLE `i4aj7_user_usergroup_map` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__users.id',
  `group_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__usergroups.id',
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i4aj7_user_usergroup_map`
--

INSERT INTO `i4aj7_user_usergroup_map` (`user_id`, `group_id`) VALUES
(64, 2),
(65, 8),
(706, 8),
(707, 2),
(707, 8);

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_viewlevels`
--

CREATE TABLE `i4aj7_viewlevels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `title` varchar(100) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_assetgroup_title_lookup` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `i4aj7_viewlevels`
--

INSERT INTO `i4aj7_viewlevels` (`id`, `title`, `ordering`, `rules`) VALUES
(1, 'Public', 0, '[1]'),
(2, 'Registered', 1, '[6,2,8]'),
(3, 'Special', 2, '[6,3,8]'),
(5, 'Guest', 0, '[9]');

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_weblinks`
--

CREATE TABLE `i4aj7_weblinks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `url` varchar(250) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `language` char(7) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if link is featured.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `images` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i4aj7_wf_profiles`
--

CREATE TABLE `i4aj7_wf_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `users` text NOT NULL,
  `types` text NOT NULL,
  `components` text NOT NULL,
  `area` tinyint(3) NOT NULL,
  `device` varchar(255) NOT NULL,
  `rows` text NOT NULL,
  `plugins` text NOT NULL,
  `published` tinyint(3) NOT NULL,
  `ordering` int(11) NOT NULL,
  `checked_out` tinyint(3) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `i4aj7_wf_profiles`
--

INSERT INTO `i4aj7_wf_profiles` (`id`, `name`, `description`, `users`, `types`, `components`, `area`, `device`, `rows`, `plugins`, `published`, `ordering`, `checked_out`, `checked_out_time`, `params`) VALUES
(1, 'Default', 'Default Profile for all users', '', '3,4,5,6,8,7', '', 0, 'desktop,tablet,phone', 'help,newdocument,undo,redo,spacer,bold,italic,underline,strikethrough,justifyfull,justifycenter,justifyleft,justifyright,spacer,blockquote,formatselect,styleselect,removeformat,cleanup;fontselect,fontsizeselect,forecolor,backcolor,spacer,clipboard,indent,outdent,lists,sub,sup,textcase,charmap,hr;directionality,fullscreen,preview,source,print,searchreplace,spacer,table;visualaid,visualchars,visualblocks,nonbreaking,style,xhtmlxtras,anchor,unlink,link,imgmanager,spellchecker,article,filemanager,imgmanager_ext,mediamanager', 'charmap,contextmenu,browser,inlinepopups,media,help,clipboard,searchreplace,directionality,fullscreen,preview,source,table,textcase,print,style,nonbreaking,visualchars,visualblocks,xhtmlxtras,imgmanager,anchor,link,spellchecker,article,lists,filemanager,imgmanager_ext,mediamanager', 1, 1, 0, '0000-00-00 00:00:00', ''),
(2, 'Front End', 'Sample Front-end Profile', '', '3,4,5', '', 1, 'desktop,tablet,phone', 'help,newdocument,undo,redo,spacer,bold,italic,underline,strikethrough,justifyfull,justifycenter,justifyleft,justifyright,spacer,formatselect,styleselect;clipboard,searchreplace,indent,outdent,lists,cleanup,charmap,removeformat,hr,sub,sup,textcase,nonbreaking,visualchars,visualblocks;fullscreen,preview,print,visualaid,style,xhtmlxtras,anchor,unlink,link,imgmanager,spellchecker,article', 'charmap,contextmenu,inlinepopups,help,clipboard,searchreplace,fullscreen,preview,print,style,textcase,nonbreaking,visualchars,visualblocks,xhtmlxtras,imgmanager,anchor,link,spellchecker,article,lists', 0, 2, 0, '0000-00-00 00:00:00', ''),
(3, 'Blogger', 'Simple Blogging Profile', '', '3,4,5,6,8,7', '', 0, 'desktop,tablet,phone', 'bold,italic,strikethrough,lists,blockquote,spacer,justifyleft,justifycenter,justifyright,spacer,link,unlink,imgmanager,article,spellchecker,fullscreen,kitchensink;formatselect,underline,justifyfull,forecolor,clipboard,removeformat,charmap,indent,outdent,undo,redo,help', 'link,imgmanager,article,spellchecker,fullscreen,kitchensink,clipboard,contextmenu,inlinepopups,lists', 0, 3, 0, '0000-00-00 00:00:00', '{"editor":{"toggle":"0"}}'),
(4, 'Mobile', 'Sample Mobile Profile', '', '3,4,5,6,8,7', '', 0, 'tablet,phone', 'undo,redo,spacer,bold,italic,underline,formatselect,spacer,justifyleft,justifycenter,justifyfull,justifyright,spacer,fullscreen,kitchensink;styleselect,lists,spellchecker,article,link,unlink', 'fullscreen,kitchensink,spellchecker,article,link,inlinepopups,lists', 0, 4, 0, '0000-00-00 00:00:00', '{"editor":{"toolbar_theme":"mobile","resizing":"0","resize_horizontal":"0","resizing_use_cookie":"0","toggle":"0","links":{"popups":{"default":"","jcemediabox":{"enable":"0"},"window":{"enable":"0"}}}}}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
