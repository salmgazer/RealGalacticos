-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2015 at 02:53 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a6210102_real`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(70) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `admin_password` varchar(80) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` VALUES(1, 'Mohammed Mutaru', 'ahmedcoach', 'ahmed123');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `role` varchar(80) NOT NULL,
  `about` text NOT NULL,
  `date_signed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(60) NOT NULL DEFAULT 'manager.png',
  `video_intro` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` VALUES(9, 'bulo bon23', 'Coach2', 'I make the team work hard', '2014-03-21 02:25:14', 'img/pic1', 'http:somecoolvideo.php');
INSERT INTO `manager` VALUES(8, 'bulo bon23', 'Coach2', 'I make the team work hard', '2014-03-21 02:25:14', 'img/pic1', 'http:somecoolvideo.php');
INSERT INTO `manager` VALUES(10, 'bulo bon23', 'Coach2', 'I make the team work hard', '2014-03-21 02:25:14', 'img/pic1', 'http:somecoolvideo.php');
INSERT INTO `manager` VALUES(11, 'bulo bon23', 'Coach2', 'I make the team work hard', '2014-03-21 02:25:14', 'img/pic1', 'http:somecoolvideo.php');
INSERT INTO `manager` VALUES(12, 'bulo bon23', 'Coach2', 'I make the team work hard', '2014-03-21 02:25:14', 'img/pic1', 'http:somecoolvideo.php');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` enum('Friendly','League','Cup') NOT NULL,
  `venue` varchar(70) NOT NULL,
  `venue_status` enum('home','away') NOT NULL,
  `score` int(2) NOT NULL DEFAULT '0',
  `opponent_score` int(2) NOT NULL DEFAULT '0',
  `match_date` date NOT NULL,
  `man_of_the_match` varchar(70) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `victory` enum('win','lose','draw') NOT NULL DEFAULT 'draw',
  `opponent` varchar(70) NOT NULL,
  `opponent_initials` char(10) NOT NULL,
  `description` text,
  `division` enum('13','15','17') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` VALUES(12, 'Friendly', 'Santiago Bernabeau', 'home', 1, 0, '2015-05-29', '', '2015-05-28 02:42:22', 'draw', 'DeYoungsters', 'DY FC', 'Our toughest match so far, facing one of the best teams in the district. It will test our courage and our preparation for the upcoming league.', '15');
INSERT INTO `matches` VALUES(11, 'Friendly', 'Santiago Bernabeau', 'home', 1, 2, '2015-05-29', '', '2015-05-28 02:40:16', 'draw', 'DeYoungsters', 'DY FC', 'Our toughest match so far, facing one of the best teams in the district. It will test our courage and our preparation for the upcoming league.', '13');
INSERT INTO `matches` VALUES(14, 'Cup', 'ODUMASI SANTIAGO BERNABEAU ', 'home', 0, 2, '2015-06-28', '', '2015-06-28 21:54:06', 'draw', 'SOCCER CALCULATORS', 'S.C', 'HIGHLY ANTICIPATED LOCAL DERBY ', '13');
INSERT INTO `matches` VALUES(15, 'Cup', 'Odumasi Santiago Bernabeau', 'home', 5, 0, '2015-06-28', '', '2015-06-28 21:58:08', 'draw', 'Soccer Calculators', 'S.C', 'Very Highly Anticipated Local Derby', '15');
INSERT INTO `matches` VALUES(16, 'Cup', 'ODUMASI SANTIAGO BERNABEAU', 'home', 2, 0, '2015-07-01', '', '2015-06-30 21:34:20', 'draw', 'KOANS F/C', 'K.F/C', 'THE LONG AWAITED RIVALRY COUNTDOWN IS HERE ,TWO LOCAL CLUBS WITH HIGHLY AMBITIONS MEET TOGETHER TO FIND OUT WHO COMES OUT VICTORIOUS.', '13');
INSERT INTO `matches` VALUES(17, 'Cup', '', 'home', 1, 0, '2015-07-01', '', '2015-06-30 21:34:50', 'draw', 'KOANS F/C', 'K.F/C', 'THE LONG AWAITED RIVALRY COUNTDOWN IS HERE ,TWO LOCAL CLUBS WITH HIGHLY AMBITIONS MEET TOGETHER TO FIND OUT WHO COMES OUT VICTORIOUS.', '15');
INSERT INTO `matches` VALUES(18, 'Friendly', 'Oduman Community Park', 'away', 1, 0, '2015-07-04', '', '2015-07-04 02:07:46', 'draw', 'Mighty Oak F/C', 'M.O F/C', 'Strictly Friendly Encounter', '13');
INSERT INTO `matches` VALUES(19, 'Friendly', 'Oduman Community Park', 'away', 3, 2, '2015-07-04', '', '2015-07-04 02:10:04', 'draw', 'Mighty Oak F/C', 'M.O F/C', 'Testing the Form of the Senior Under 15 Squad with this mouth watering friendly encounter.', '15');
INSERT INTO `matches` VALUES(20, 'Friendly', 'Bernabeau ', 'home', 0, 0, '2015-07-13', '', '2015-07-10 12:21:22', 'draw', 'Banana Team', 'BT', 'A staggering fight', '13');
INSERT INTO `matches` VALUES(21, 'Friendly', 'NSAKINA PARK', 'away', 4, 0, '2015-09-12', '', '2015-09-10 16:08:58', 'draw', 'MIGHTY OAK FOOTBALL CLUB', 'M.O F/C', 'EXHIBITION MATCH', '13');
INSERT INTO `matches` VALUES(22, 'Friendly', 'NSAKINA PARK', 'away', 1, 1, '2015-09-12', '', '2015-09-10 16:09:37', 'draw', 'MIGHTY OAK FOOTBALL CLUB', 'M.O F/C', 'EXHIBITION MATCH', '15');
INSERT INTO `matches` VALUES(23, 'Friendly', 'Nsakina Park', 'away', 1, 1, '2015-09-26', '', '2015-09-26 16:01:21', 'draw', 'Soccer Calculators F/C', 'S.C F/C', 'CRUCIAL ENCOUNTER ', '13');
INSERT INTO `matches` VALUES(24, 'Friendly', 'Nsakina Park', 'away', 3, 2, '2015-09-26', '', '2015-09-26 16:02:14', 'draw', 'Soccer Calculators F/C', 'S.C F/C', 'CRUCIAL ENCOUNTER ', '15');
INSERT INTO `matches` VALUES(25, 'Friendly', 'POKUASI LINES PARK', 'away', 3, 1, '2015-09-28', '', '2015-09-28 14:42:11', 'draw', 'Pokuasi Future Stars', 'P.F.S FC', 'HIGHLY ANTICIPATED MATCH', '15');
INSERT INTO `matches` VALUES(26, 'Friendly', 'OBEYEYE SCHOOL PARK', 'home', 1, 2, '2015-10-17', '', '2015-10-19 03:01:41', 'draw', 'YOUNG WISE FOOTBALL CLUB', 'Y.W F/C', 'HIGHLY EMOTIONAL ENCOUNTER', '13');
INSERT INTO `matches` VALUES(27, 'Friendly', 'OBEYEYE SCHOOL PARK', 'home', 2, 2, '2015-10-17', '', '2015-10-19 03:02:29', 'draw', 'YOUNG WISE FOOTBALL CLUB', 'Y.W. F/C', 'HIGHLY EMOTIONAL ENCOUNTER', '15');

-- --------------------------------------------------------

--
-- Table structure for table `matchgallery`
--

CREATE TABLE `matchgallery` (
  `gallery_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `galleryname` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `match_date` date NOT NULL,
  `description` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `picture` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `matchgallery`
--


-- --------------------------------------------------------

--
-- Table structure for table `matchpicture`
--

CREATE TABLE `matchpicture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `picture` varchar(70) COLLATE latin1_general_ci NOT NULL,
  `match_date` date NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `matchgallery_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `matchpicture`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(60) NOT NULL DEFAULT 'news.png',
  `picture1` varchar(60) DEFAULT NULL,
  `picture2` varchar(60) DEFAULT NULL,
  `news_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(50) NOT NULL DEFAULT 'Real Galacticos',
  `content` text NOT NULL,
  `headline` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` VALUES(3, 'mnythumbnail', 'picture1', 'picture2', '2014-03-21 02:25:14', 'Joe', 'content etc', 'headlinea');
INSERT INTO `news` VALUES(2, 'news.jpg', 'picture1', 'picture2', '2014-03-21 02:25:14', 'Joe', 'content etc', 'headlineb');
INSERT INTO `news` VALUES(4, 'mjgnkn grk', 'picture1', 'picture2', '2014-03-21 02:25:14', 'Joe', 'content etc', 'headlinec');
INSERT INTO `news` VALUES(5, 'kgjnekgnr', 'picture1', 'picture2', '2014-03-21 02:25:14', 'Joe', 'content etc', 'Still testing');
INSERT INTO `news` VALUES(6, 'news.jpg', 'kgbrhgbwh`h`', 'hbgebgrhgbrh', '2015-05-09 21:37:26', 'Real Galacticos', 'We are testing this today', 'The test master');
INSERT INTO `news` VALUES(7, 'news.jpg', 'kdhbgb', 'dhjsdgbhgbh', '2015-05-09 21:49:24', 'Real Galacticos', 'khdbgrb', 'making sure');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `date_of_birth` date NOT NULL,
  `current_division` enum('13','15','17') DEFAULT NULL,
  `current_position` enum('GK','CB','RB','LB','SW','WB','DM','CM','LM','RM','LW','RW','CAM','LAM','RAM','SS','CF') NOT NULL,
  `about` text NOT NULL,
  `date_signed` date NOT NULL,
  `picture` varchar(60) NOT NULL DEFAULT 'player.jpg',
  `goals` int(10) unsigned NOT NULL DEFAULT '0',
  `num_matches` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=292 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` VALUES(93, 'John Sam', '2015-05-13', '15', 'CB', 'One of our players', '2004-09-03', 'johnsam.jpg', 0, 6);
INSERT INTO `player` VALUES(94, 'Dominic Amoah', '2015-05-13', '15', 'CF', 'One of our players', '2004-09-03', 'dominicamoah.jpg', 3, 10);
INSERT INTO `player` VALUES(92, 'Bismark Amu', '2015-05-13', '15', 'LW', 'One of our players', '2004-09-03', 'bismarkamu.jpg', 0, 1);
INSERT INTO `player` VALUES(89, 'Augustine Robert', '2015-05-13', '15', 'CF', 'One of our players', '2004-09-03', 'augustinerobert.jpg', 5, 6);
INSERT INTO `player` VALUES(99, 'Mensah Mark Peny', '2015-05-13', '15', 'CF', 'One of our players', '2004-09-03', 'mensahmarkpeny.jpg', 0, 2);
INSERT INTO `player` VALUES(95, 'Mensah Kakra Ma', '2015-05-13', '15', 'RM', 'One of our players', '2004-09-03', 'mensahmarkkakra.jpg', 3, 11);
INSERT INTO `player` VALUES(278, 'Maclean Mensah', '2015-05-13', '13', 'RB', 'One of our players', '2004-09-03', 'macleanmensah.jpg', 0, 7);
INSERT INTO `player` VALUES(250, 'Paul Gosu', '2015-05-13', '13', 'CM', 'One of our players', '2004-09-03', 'paulgosu.jpg', 1, 5);
INSERT INTO `player` VALUES(131, 'Emmanuel Ofori', '2015-05-13', '13', 'LB', 'One of our players', '2004-09-03', 'emmanuelofori.jpg', 0, 2);
INSERT INTO `player` VALUES(125, 'Shadrack Amoah', '2015-05-13', '13', 'CB', 'One of our players', '2004-09-03', 'shadrackamoah.jpg', 0, 0);
INSERT INTO `player` VALUES(282, 'Ernest Gayina', '2003-05-11', '15', 'RB', '', '2015-07-04', 'ernestkwabinagayina.jpg', 0, 7);
INSERT INTO `player` VALUES(80, 'Mansford Mensah', '2015-05-13', '13', 'GK', 'One of our players', '2004-09-03', 'mansfordmensah.jpg', 0, 4);
INSERT INTO `player` VALUES(123, 'Benjamin Opoku', '2015-05-13', '13', 'LB', 'One of our players', '2004-09-03', 'benjaminopoku.jpg', 0, 1);
INSERT INTO `player` VALUES(122, 'Teye    Emmanuel', '2015-05-13', '13', 'LB', 'One of our players', '2004-09-03', 'teyeemmanuel.jpg', 0, 5);
INSERT INTO `player` VALUES(120, 'Emmanuel Preko', '2015-05-13', '13', 'CM', 'One of our players', '2004-09-03', 'emmanuelpreko.jpg', 0, 5);
INSERT INTO `player` VALUES(260, 'Jordan Preko', '2015-05-13', '13', 'CM', 'One of our players', '2004-09-03', 'jordanpreko.jpg', 0, 4);
INSERT INTO `player` VALUES(124, 'Emmanuel Tetteh', '2015-05-13', '13', 'RW', 'One of our players', '2004-09-03', 'emmanueltetteh.jpg', 1, 4);
INSERT INTO `player` VALUES(74, 'Ebenezer Avornyo', '2015-05-13', '13', 'LW', 'One of our players', '2004-09-03', 'ebenezeravornyo.jpg', 0, 1);
INSERT INTO `player` VALUES(244, 'Abdulkadr Mahama', '2015-05-13', '13', 'CF', 'One of our players', '2004-09-03', 'abdulkadir.jpg', 2, 7);
INSERT INTO `player` VALUES(242, 'Patrick Doe', '2015-05-28', '13', 'RM', 'One of our players', '2014-09-03', 'patrickdoe.jpg', 0, 0);
INSERT INTO `player` VALUES(133, 'Michael Gassinu', '2015-05-28', '13', 'CAM', 'One of our players', '2014-09-03', 'michaelgassinu.jpg', 0, 1);
INSERT INTO `player` VALUES(280, 'Ahmed Asuma', '2015-05-28', '13', 'CM', 'One of our players', '2014-09-03', 'ahmedasuma.jpg', 0, 2);
INSERT INTO `player` VALUES(136, 'Prince Ayitey', '2015-05-28', '13', 'CM', 'One of our players', '2014-09-03', 'princeayitey.jpg', 4, 7);
INSERT INTO `player` VALUES(201, 'Samuel Nyaabah', '2015-05-28', '13', 'CAM', 'One of our players', '2014-09-03', 'samuelnyaabah.jpg', 0, 1);
INSERT INTO `player` VALUES(138, 'Michael Nyaabah', '2015-05-28', '13', 'CF', 'One of our players', '2014-09-03', 'michaelnyaabah.jpg', 0, 4);
INSERT INTO `player` VALUES(273, 'Agyenim Boateng', '2015-05-28', '13', 'LM', 'One of our players', '2014-09-03', 'agyenimboateng.jpg', 7, 8);
INSERT INTO `player` VALUES(208, 'Derry Mohammed', '2015-05-28', '13', 'CAM', 'One of our players', '2014-09-03', 'derrymohammed.jpg', 0, 0);
INSERT INTO `player` VALUES(232, 'Steven Katasu', '2015-05-28', '13', 'CB', 'One of our players', '2014-09-03', 'stevenkatasu.jpg', 0, 2);
INSERT INTO `player` VALUES(205, 'Kissie Daniel', '2015-05-28', '15', 'LW', 'One of our players', '2014-09-03', 'kissiedaniel.jpg', 1, 6);
INSERT INTO `player` VALUES(270, 'Sandy Frimpong', '2015-05-28', '13', 'GK', 'One of our players', '2014-09-03', 'sandyfrimpong.jpg', 0, 8);
INSERT INTO `player` VALUES(230, 'Damptey Edward', '2015-05-28', '13', 'CF', 'One of our players', '2014-09-03', 'dampteyedward.jpg', 0, 5);
INSERT INTO `player` VALUES(206, 'Emmanuel Katasu', '2015-05-28', '13', 'LB', 'One of our players', '2014-09-03', 'emmanuelkatasu.jpg', 0, 0);
INSERT INTO `player` VALUES(217, 'Evans Adjei', '2015-05-28', '15', 'CB', 'One of our players', '2014-09-03', 'evansadjei.jpg', 0, 11);
INSERT INTO `player` VALUES(215, 'Evans Obeng', '2015-05-28', '15', 'CB', 'One of our players', '2014-09-03', 'evansobeng.jpg', 0, 10);
INSERT INTO `player` VALUES(182, 'Isaac Donkor', '2015-05-28', '15', 'LW', 'One of our players', '2014-09-03', 'isaacdonkor.jpg', 0, 0);
INSERT INTO `player` VALUES(153, 'Edmond Akpese', '2015-05-28', '15', 'RM', 'One of our players', '2014-09-03', 'edmondakpese.jpg', 9, 12);
INSERT INTO `player` VALUES(240, 'Andrews Ampomah', '2015-05-28', '13', 'CB', 'One of our players', '2014-09-03', 'andrewsampomah.jpg', 0, 7);
INSERT INTO `player` VALUES(214, 'Louis Essel', '2015-05-28', '15', 'CM', 'One of our players', '2014-09-03', 'louisessel.jpg', 4, 12);
INSERT INTO `player` VALUES(188, 'Isaac Okai', '2015-05-28', '15', 'GK', 'One of our players', '2014-09-03', 'isaacokai.jpg', 0, 1);
INSERT INTO `player` VALUES(212, 'Isaiah Acheampong', '2015-05-28', '15', 'RW', 'One of our players', '2014-09-03', 'isaiahacheampong.jpg', 5, 10);
INSERT INTO `player` VALUES(281, 'Isaac Opare', '0000-00-00', '15', 'CF', 'One of our players', '2014-09-03', 'isaacopare.jpg', 8, 9);
INSERT INTO `player` VALUES(283, 'N. Akwei Allotey', '2000-04-10', '15', 'CB', '', '2014-10-10', 'niiakwei.jpg', 0, 10);
INSERT INTO `player` VALUES(284, 'Raphael Ashong', '1998-10-08', '15', 'CF', '', '2015-08-12', 'raphaelashong.jpg', 3, 1);
INSERT INTO `player` VALUES(285, 'Isaac Odoi', '1998-10-08', '15', 'RB', 'A new player from Obyeyie', '2015-10-06', 'isaacodoi.jpg', 0, 3);
INSERT INTO `player` VALUES(286, 'Yakubu Zakari', '1998-10-08', '13', 'CM', 'A new player ', '2015-10-06', 'zakaria.jpg', 0, 0);
INSERT INTO `player` VALUES(287, 'Isaac Lamptey', '1998-10-08', '15', 'CM', 'A new player ', '2015-10-06', 'isaaclamptey.jpg', 0, 2);
INSERT INTO `player` VALUES(290, 'Fifi Asante', '2002-10-08', '13', 'CF', 'A new player ', '2015-10-06', 'fifiasante.jpg', 0, 0);
INSERT INTO `player` VALUES(291, 'Benjamin Ochere', '2002-10-08', '13', 'CF', 'A new player ', '2015-10-06', 'benjaminochere.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstline` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `secondline` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `picture` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `slide_status` enum('on','off') COLLATE latin1_general_ci NOT NULL DEFAULT 'off',
  `slide_position` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` VALUES(1, 'Real Galacticos U15 ready to face Declem FC', 'Will coach Mohammed and his team go for victory?', '5-2victory.jpg', 'off', 1);
INSERT INTO `slide` VALUES(2, 'Real Galacticos wins a 5:2 victory', 'How did the youngsters change the game on its head', '5-2victory1.jpg', 'off', 4);
INSERT INTO `slide` VALUES(3, 'Declem FC ready for a tough match against the Gala', '90 minutes to separate the boys from the men', '5-2defeat.jpg', 'off', 2);
INSERT INTO `slide` VALUES(5, '2 goals each for the the fighting teams', '45 minutes more to fight for victory', '2-2halftime.jpg', 'off', 3);
INSERT INTO `slide` VALUES(6, 'Testing', 'Tst', 'cr72.jpg', 'off', NULL);
INSERT INTO `slide` VALUES(8, 'kdfjntkj', 'krjntkjn', 'kjrngktje', 'off', NULL);
INSERT INTO `slide` VALUES(9, 'Real Galacticos U-13 facing the toughest challenge', 'Meeting with the supposedly called best team', 'Galacticos U13-final.jpg', 'off', 1);
INSERT INTO `slide` VALUES(10, 'DeYongsters to face Real Galacticos U-13', 'The toughest team to face the stinging Galacticos', 'Dyong.jpg', 'off', 2);
INSERT INTO `slide` VALUES(11, 'The U-15 squad that thrashed the DeYongsters'' U-17', 'A Victory worth remembering...', 'galactcos U15 DY.jpg', 'off', 4);
INSERT INTO `slide` VALUES(12, 'The U-17 DeYongsters team that suffered defeat', 'Only 90 minutes could stop the thrilling game', 'DY17.jpg', 'off', 5);
INSERT INTO `slide` VALUES(13, 'Gratitude to the Maker after a wonderful victory.', 'RG enjoys a 1:0 victory courtesy great teamwork', 'prayers.jpg', 'off', 6);
INSERT INTO `slide` VALUES(14, 'A great day for the Galacticos', 'Both U-13 and U-15  sides win against Koans FC', 'greatvictory.jpg', 'off', 1);
INSERT INTO `slide` VALUES(15, 'Koans FC U-15 before the bitter defeat', 'As usual, Koans FC gave us a good challenge', 'koansfc15.jpg', 'off', 2);
INSERT INTO `slide` VALUES(16, 'Gratitude to the creator', 'Amazing 5:0 victory against Soccer Caculators U15', 'koansvic15.jpg', 'off', 3);
INSERT INTO `slide` VALUES(19, 'Celebrations after the first victory', 'Our U-15 team defeated the first opponent', 'firstvic-min.jpg', 'on', 2);
INSERT INTO `slide` VALUES(18, 'The Team that won this year''s Homowo Tournament', 'The tournament was made up 20 teams.', 'teambm-min.jpg', 'on', 1);
INSERT INTO `slide` VALUES(20, 'The Creator leads us against 19 division teams', 'We do our part and the creator leads.', 'prayersbm-min.jpg', 'on', 0);
INSERT INTO `slide` VALUES(21, 'RG is the winner of homowo tournament', 'The Captain receives the well deserved trophy.', 'trophy-min.jpg', 'on', 3);

-- --------------------------------------------------------

--
-- Table structure for table `stunts`
--

CREATE TABLE `stunts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `player_id` int(10) unsigned NOT NULL,
  `youtube_url` text NOT NULL,
  `description` varchar(250) NOT NULL,
  `stunt_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `stunts`
--


-- --------------------------------------------------------

--
-- Table structure for table `traininggallery`
--

CREATE TABLE `traininggallery` (
  `gallery_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `galleryname` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `training_date` date NOT NULL,
  `description` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `picture` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `traininggallery`
--


-- --------------------------------------------------------

--
-- Table structure for table `trainingpicture`
--

CREATE TABLE `trainingpicture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `picture` varchar(70) COLLATE latin1_general_ci NOT NULL,
  `training_date` date NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `traininggallery_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `trainingpicture`
--


-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `video_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(300) NOT NULL,
  `youtube_url` text NOT NULL,
  `kind` enum('training','stunt','match') DEFAULT NULL,
  `player_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` VALUES(1, 'Abdul-Kadir scores his second for the day', '2015-05-09 22:20:56', 'msdhb kfghbr kuhgkr krhgkr kughkr', 'https://www.youtube.com/watch?v=Q_YmQGMuovs', NULL, NULL);
