# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.34)
# Database: lms
# Generation Time: 2014-08-17 03:25:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table fixtures_original
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fixtures_original`;

CREATE TABLE `fixtures_original` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `round_id` int(11) DEFAULT NULL,
  `home_team_id` int(11) DEFAULT NULL,
  `away_team_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `fixtures_original` WRITE;
/*!40000 ALTER TABLE `fixtures_original` DISABLE KEYS */;

INSERT INTO `fixtures_original` (`id`, `round_id`, `home_team_id`, `away_team_id`)
VALUES
	(1,1,1,5),
	(2,1,3,4),
	(3,1,8,6),
	(4,1,9,14),
	(5,1,11,17),
	(6,1,12,10),
	(7,1,13,7),
	(8,1,15,2),
	(9,1,19,16),
	(10,1,20,18),
	(11,2,2,12),
	(12,2,4,8),
	(13,2,5,20),
	(14,2,6,1),
	(15,2,7,15),
	(16,2,10,9),
	(17,2,14,19),
	(18,2,16,11),
	(19,2,17,3),
	(20,2,18,13),
	(21,3,2,7),
	(22,3,3,11),
	(23,3,6,4),
	(24,3,8,1),
	(25,3,10,15),
	(26,3,12,5),
	(27,3,13,16),
	(28,3,17,19),
	(29,3,18,9),
	(30,3,20,14),
	(31,4,1,10),
	(32,4,4,17),
	(33,4,5,3),
	(34,4,7,20),
	(35,4,9,2),
	(36,4,11,13),
	(37,4,14,12),
	(38,4,15,8),
	(39,4,16,18),
	(40,4,19,6),
	(41,5,2,1),
	(42,5,3,16),
	(43,5,6,5),
	(44,5,8,11),
	(45,5,10,4),
	(46,5,12,7),
	(47,5,13,15),
	(48,5,17,14),
	(49,5,18,19),
	(50,5,20,9),
	(51,6,1,18),
	(52,6,4,2),
	(53,6,5,8),
	(54,6,7,10),
	(55,6,9,6),
	(56,6,11,20),
	(57,6,14,13),
	(58,6,15,12),
	(59,6,16,17),
	(60,6,19,3),
	(61,7,2,10),
	(62,7,4,1),
	(63,7,7,5),
	(64,7,8,3),
	(65,7,9,19),
	(66,7,11,6),
	(67,7,16,15),
	(68,7,17,12),
	(69,7,18,14),
	(70,7,20,13),
	(71,8,1,7),
	(72,8,3,20),
	(73,8,5,4),
	(74,8,6,2),
	(75,8,10,18),
	(76,8,12,8),
	(77,8,13,9),
	(78,8,14,16),
	(79,8,15,17),
	(80,8,19,11),
	(81,9,3,6),
	(82,9,9,7),
	(83,9,11,4),
	(84,9,13,2),
	(85,9,14,15),
	(86,9,16,1),
	(87,9,17,8),
	(88,9,18,12),
	(89,9,19,5),
	(90,9,20,10),
	(91,10,1,3),
	(92,10,2,18),
	(93,10,4,13),
	(94,10,5,16),
	(95,10,6,17),
	(96,10,7,14),
	(97,10,8,19),
	(98,10,10,11),
	(99,10,12,9),
	(100,10,15,20),
	(101,11,3,7),
	(102,11,9,4),
	(103,11,11,5),
	(104,11,13,10),
	(105,11,14,8),
	(106,11,16,6),
	(107,11,17,1),
	(108,11,18,15),
	(109,11,19,12),
	(110,11,20,2),
	(111,12,1,11),
	(112,12,2,14),
	(113,12,4,19),
	(114,12,5,9),
	(115,12,6,20),
	(116,12,7,18),
	(117,12,8,16),
	(118,12,10,17),
	(119,12,12,13),
	(120,12,15,3),
	(121,13,3,2),
	(122,13,9,15),
	(123,13,11,7),
	(124,13,13,8),
	(125,13,14,10),
	(126,13,16,4),
	(127,13,17,5),
	(128,13,18,6),
	(129,13,19,1),
	(130,13,20,12),
	(131,14,3,12),
	(132,14,5,2),
	(133,14,8,9),
	(134,14,11,15),
	(135,14,17,13),
	(136,14,19,20),
	(137,14,6,7),
	(138,14,16,10),
	(139,15,7,19),
	(140,15,9,16),
	(141,15,10,6),
	(142,15,12,4),
	(143,15,13,3),
	(144,15,14,11),
	(145,15,15,1),
	(146,15,18,5),
	(147,15,20,17),
	(148,16,1,12),
	(149,16,3,14),
	(150,16,4,7),
	(151,16,5,15),
	(152,16,6,13),
	(153,16,8,10),
	(154,16,11,9),
	(155,16,16,20),
	(156,16,17,18),
	(157,16,19,2),
	(158,17,2,11),
	(159,17,7,17),
	(160,17,9,1),
	(161,17,10,5),
	(162,17,12,16),
	(163,17,13,19),
	(164,17,14,6),
	(165,17,15,4),
	(166,17,18,3),
	(167,17,20,8),
	(168,18,1,13),
	(169,18,3,9),
	(170,18,4,20),
	(171,18,5,14),
	(172,18,6,15),
	(173,18,8,18),
	(174,18,11,12),
	(175,18,16,7),
	(176,18,17,2),
	(177,18,19,10),
	(178,19,2,16),
	(179,19,7,8),
	(180,19,9,17),
	(181,19,10,3),
	(182,19,12,6),
	(183,19,13,5),
	(184,19,14,4),
	(185,19,15,19),
	(186,19,18,11),
	(187,19,20,1),
	(188,20,2,5),
	(189,20,7,6),
	(190,20,9,8),
	(191,20,10,16),
	(192,20,12,3),
	(193,20,13,17),
	(194,20,14,1),
	(195,20,15,11),
	(196,20,18,4),
	(197,20,20,19),
	(198,21,1,15),
	(199,21,3,13),
	(200,21,4,12),
	(201,21,5,18),
	(202,21,6,10),
	(203,21,8,2),
	(204,21,11,14),
	(205,21,16,9),
	(206,21,17,20),
	(207,21,19,7),
	(208,22,2,9),
	(209,22,3,5),
	(210,22,6,19),
	(211,22,8,15),
	(212,22,10,1),
	(213,22,12,14),
	(214,22,13,11),
	(215,22,17,4),
	(216,22,18,16),
	(217,22,20,7),
	(218,23,1,2),
	(219,23,4,10),
	(220,23,5,6),
	(221,23,7,12),
	(222,23,9,20),
	(223,23,11,8),
	(224,23,14,17),
	(225,23,15,13),
	(226,23,16,3),
	(227,23,19,18),
	(228,24,2,4),
	(229,24,3,19),
	(230,24,6,9),
	(231,24,8,5),
	(232,24,10,7),
	(233,24,12,15),
	(234,24,13,14),
	(235,24,17,16),
	(236,24,18,1),
	(237,24,20,11),
	(238,25,1,8),
	(239,25,5,12),
	(240,25,7,2),
	(241,25,9,18),
	(242,25,11,3),
	(243,25,14,20),
	(244,25,19,17),
	(245,25,4,6),
	(246,25,15,10),
	(247,25,16,13),
	(248,26,2,15),
	(249,26,4,3),
	(250,26,5,1),
	(251,26,6,8),
	(252,26,7,13),
	(253,26,10,12),
	(254,26,14,9),
	(255,26,16,19),
	(256,26,17,11),
	(257,26,18,20),
	(258,27,1,6),
	(259,27,3,17),
	(260,27,8,4),
	(261,27,9,10),
	(262,27,11,16),
	(263,27,12,2),
	(264,27,13,18),
	(265,27,15,7),
	(266,27,19,14),
	(267,27,20,5),
	(268,28,2,19),
	(269,28,7,16),
	(270,28,9,3),
	(271,28,13,1),
	(272,28,14,5),
	(273,28,20,4),
	(274,28,10,8),
	(275,28,12,11),
	(276,28,15,6),
	(277,28,18,17),
	(278,29,1,20),
	(279,29,3,10),
	(280,29,4,14),
	(281,29,5,13),
	(282,29,6,12),
	(283,29,8,7),
	(284,29,11,18),
	(285,29,16,2),
	(286,29,17,9),
	(287,29,19,15),
	(288,30,2,17),
	(289,30,7,4),
	(290,30,9,11),
	(291,30,10,19),
	(292,30,12,1),
	(293,30,13,6),
	(294,30,14,3),
	(295,30,15,5),
	(296,30,18,8),
	(297,30,20,16),
	(298,31,1,9),
	(299,31,3,18),
	(300,31,4,15),
	(301,31,5,10),
	(302,31,6,14),
	(303,31,8,20),
	(304,31,11,2),
	(305,31,16,12),
	(306,31,17,7),
	(307,31,19,13),
	(308,32,3,1),
	(309,32,9,12),
	(310,32,11,10),
	(311,32,13,4),
	(312,32,14,7),
	(313,32,16,5),
	(314,32,17,6),
	(315,32,18,2),
	(316,32,19,8),
	(317,32,20,15),
	(318,33,1,16),
	(319,33,2,13),
	(320,33,4,11),
	(321,33,5,19),
	(322,33,6,3),
	(323,33,7,9),
	(324,33,8,17),
	(325,33,10,20),
	(326,33,12,18),
	(327,33,15,14),
	(328,34,1,4),
	(329,34,3,8),
	(330,34,5,7),
	(331,34,6,11),
	(332,34,10,2),
	(333,34,12,17),
	(334,34,13,20),
	(335,34,14,18),
	(336,34,15,16),
	(337,34,19,9),
	(338,35,2,6),
	(339,35,4,5),
	(340,35,7,1),
	(341,35,8,12),
	(342,35,9,13),
	(343,35,11,19),
	(344,35,16,14),
	(345,35,17,15),
	(346,35,18,10),
	(347,35,20,3),
	(348,36,1,17),
	(349,36,2,20),
	(350,36,4,9),
	(351,36,5,11),
	(352,36,6,16),
	(353,36,7,3),
	(354,36,8,14),
	(355,36,10,13),
	(356,36,12,19),
	(357,36,15,18),
	(358,37,3,15),
	(359,37,9,5),
	(360,37,11,1),
	(361,37,13,12),
	(362,37,14,2),
	(363,37,16,8),
	(364,37,17,10),
	(365,37,18,7),
	(366,37,19,4),
	(367,37,20,6),
	(368,38,1,19),
	(369,38,2,3),
	(370,38,4,16),
	(371,38,5,17),
	(372,38,6,18),
	(373,38,7,11),
	(374,38,8,13),
	(375,38,10,14),
	(376,38,12,20),
	(377,38,15,9);

/*!40000 ALTER TABLE `fixtures_original` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
