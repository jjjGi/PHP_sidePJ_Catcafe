-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 20-12-26 16:41
-- 서버 버전: 10.4.16-MariaDB
-- PHP 버전: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `20193184`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `num` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `subject` char(200) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) NOT NULL,
  `hit` int(11) NOT NULL,
  `file_name` char(40) DEFAULT NULL,
  `file_type` char(40) DEFAULT NULL,
  `file_copied` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`num`, `id`, `name`, `subject`, `content`, `regist_day`, `hit`, `file_name`, `file_type`, `file_copied`) VALUES
(34, 'admin', 'a', '책상', '귀엽죠?', '2020-12-15 (00:42)', 12, 'images.jpg', 'image/jpeg', '2020_12_15_00_42_22.jpg'),
(35, 'admin', 'a', '안녕하세요?', '여기는 고양이 카페입니다. 잘부탁드립니다.', '2020-12-15 (00:43)', 6, '', '', ''),
(36, 'gildong', '고길동', '길동입니다.', '고양이 좀 보세요.. 너무귀엽죠', '2020-12-15 (00:45)', 6, 'main_img.jpg', 'image/jpeg', '2020_12_15_00_45_05.jpg'),
(37, 'gildong', '고길동', '고', 'ㅇ', '2020-12-15 (00:45)', 4, '', '', ''),
(38, 'gildong', '고길동', '양', 'ㅇㅇㄴ', '2020-12-15 (00:45)', 7, '', '', ''),
(39, 'gildong', '고길동', '이', 'ㅇ', '2020-12-15 (00:45)', 2, '', '', ''),
(41, 'waterf', '물김치', '가입했습니다.', '반가워요', '2020-12-15 (00:47)', 22, 'catpawButton.png', 'image/png', '2020_12_15_00_47_00.png'),
(42, 'waterf', '물김치', 'hello', 'hhhhhhelllo', '2020-12-15 (00:47)', 2, '', '', ''),
(43, 'ddd', '배영재', '안녕?', '.', '2020-12-15 (00:47)', 5, '', '', ''),
(44, 'ddd', '배영재', '게시판이네요', '야호', '2020-12-15 (00:48)', 4, '', '', ''),
(45, 'ddd', '배영재', '저는 배영재입니다.', 'ㅂㄱㅇㅇ', '2020-12-15 (22:44)', 30, '', '', ''),
(46, 'gildong', '고길동', '신기하네요', '오아ㅏ아아아', '2020-12-16 (22:08)', 7, '', '', ''),
(48, 'admin', 'a', '고양이 보실래요?', '캬아악', '2020-12-16 (23:12)', 15, 'backcat.jpg', 'image/jpeg', '2020_12_16_23_12_51.jpg'),
(49, 'abc', 'abc', '캬아아악', 'ㄲ', '2020-12-17 (23:30)', 7, 'cat2.png', 'image/png', '2020_12_17_23_30_33.png'),
(51, 'abc', 'abc', '안녕하세요', 'a', '2020-12-18 (12:30)', 6, '', '', ''),
(53, 'kimsu', '김수한무', '게시판게시판', '글글', '2020-12-19 (01:19)', 5, '', '', ''),
(55, 'abc', 'abc', '멋있는 사진들이 많군요', '와\r\n\r\n', '2020-12-22 (02:34)', 11, '', '', ''),
(62, 'abc', 'abc', '안녕하세요', '요', '2020-12-26 (01:06)', 12, '20193184.sql', 'application/octet-stream', '2020_12_26_16_39_30.sql'),
(63, 'asdf', '김하늘', '이 고양이좀 보세요..', '하품하는중', '2020-12-26 (16:35)', 2, 'yawn_cat.jpg', 'image/jpeg', '2020_12_26_16_35_26.jpg'),
(64, 'asdf', '김하늘', 'ㅎㅎ', 'ㅎㅎ', '2020-12-26 (16:35)', 2, 'mock_cat.jpg', 'image/jpeg', '2020_12_26_16_35_53.jpg');

-- --------------------------------------------------------

--
-- 테이블 구조 `chatting`
--

CREATE TABLE `chatting` (
  `num` int(11) NOT NULL,
  `chatuser` varchar(30) NOT NULL,
  `chattext` varchar(1000) NOT NULL,
  `chatpassword` varchar(10) NOT NULL,
  `chattime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `chatting`
--

INSERT INTO `chatting` (`num`, `chatuser`, `chattext`, `chatpassword`, `chattime`) VALUES
(43, '가명', 'hello', '1234', '2020-12-14 (16:04) Mon'),
(45, '김김김', '(젤리)', 'kimkim', '2020-12-14 (16:07) Mon'),
(46, 'ㅈㅁㅈ', '(하악질)', '1111', '2020-12-14 (16:19) Mon'),
(51, '가명', '가명', 'rkaud', '2020-12-14 (16:23) Mon'),
(99, 'a', '글을 입력합니다. 채팅', '12345', '2020-12-14 (23:45) Mon'),
(104, 'waterf', 'waterf입니다. 다들 잘부탁드려요', '1234', '2020-12-14 (23:56) Mon'),
(106, 'jiw', 'ㅎㅇ', '0000', '2020-12-16 (23:09) Wed'),
(107, 'won', '안녕', '1234', '2020-12-16 (23:09) Wed'),
(108, 'jiw', 'ㅎㅇ(하악질)(젤리)', '0000', '2020-12-16 (23:09) Wed'),
(109, '가가가', '(하악질)(젤리)(하악질)(젤리)\ngdgadgㅎ\nㅎㅇㅎㅇ\n', 'rkrkrk', '2020-12-19 (00:04) Sat'),
(113, '익명', '익명 글 올립니다(젤리)(젤리)(젤리)', '1234', '2020-12-22 (23:24) Tue'),
(114, 'hello', 'hello', 'hello', '2020-12-23 (01:42) Wed');

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `num` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `pass` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `email` char(80) NOT NULL,
  `regist_day` char(20) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `game_result` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `members`
--

INSERT INTO `members` (`num`, `id`, `pass`, `name`, `email`, `regist_day`, `level`, `point`, `game_result`) VALUES
(1, 'admin', 'a', 'a', 'a@a', '2020-11-27 (22:53)', 1, 1200, 2),
(2, 'kimsj', 'sj', '김수정', 'sh@naver.com', '2020-11-27 (22:53)', 0, 100, 11),
(3, 'asdf', 'asdf', '김하늘', 'asdf@naver.com', '2020-11-27 (22:53)', 0, 200, 0),
(4, 'waterf', 'af', '물김치', '물김치@naver.com', '2020-11-27 (22:54)', 0, 400, 10),
(5, 'ddd', 'ddd', '배영재', 'aaaddd@naver.com', '2020-11-27 (22:54)', 0, 300, 1),
(6, 'skykim', 'sky', '강하늘', 'sky@naver.com', '2020-11-27 (22:54)', 0, 100, 0),
(7, 'gildong', 'gil', '고길동', 'gildong@naver.com', '2020-12-13 (17:46)', 0, 800, 0),
(8, 'subsub', 's', '섭섭이', 'subsub@naver.com', '2020-12-13 (22:57)', 0, 0, 0),
(9, 'abc', 'abcd', 'abc', 'abc@naver.com', '2020-12-16 (22:49)', 0, 1800, 23),
(10, 'kimsu', 'k', '김수한무', 'kimsu@naver.com', '2020-12-19 (01:18)', 0, 100, 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `receivemessage`
--

CREATE TABLE `receivemessage` (
  `num` int(11) NOT NULL,
  `send_id` char(20) NOT NULL,
  `rv_id` char(20) NOT NULL,
  `subject` char(200) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) DEFAULT NULL,
  `readtime` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `receivemessage`
--

INSERT INTO `receivemessage` (`num`, `send_id`, `rv_id`, `subject`, `content`, `regist_day`, `readtime`) VALUES
(1, 'admin', 'gildong', '안녕하세요', '길동님 안녕하세요? 가입을 축하드립니다. \r\nㅎㅎ', '2020-12-14 (01:54)', NULL),
(2, 'gildong', 'admin', 'RE: 안녕하세요', '\r\n네 안녕하세요 . 잘부탁드려요\r\n-----------------------------------------------\r\n&gt; 길동님 안녕하세요? 가입을 축하드립니다. \r\n&gt;ㅎㅎ', '2020-12-14 (02:02)', NULL),
(3, 'admin', 'waterf', '안녕하세요!!?!?!?!?!', '안녕하세요~ 가입을 축하드립니다~~~~~~~', '2020-12-14 (02:11)', '2020-12-17 (22:35:16)'),
(4, 'admin', 'gildong', 'RE: RE: 안녕하세요', 'ㄸ또또또 안녕하세요\r\n\r\n-----------------------------------------------\r\n&gt; \r\n&gt;네 안녕하세요 . 잘부탁드려요\r\n&gt;-----------------------------------------------\r\n&gt;&gt; 길동님 안녕하세요? 가입을 축하드립니다. \r\n&gt;&gt;ㅎㅎ', '2020-12-14 (02:12)', '2020-12-17 (22:44:07)'),
(5, 'admin', 'gildong', '안녕하세요322', '/\r\n?\r\n*\r\n&gt;', '2020-12-14 (23:54)', '2020-12-19 (00:05:50)'),
(7, 'waterf', 'ddd', 'RE: 안녕하세요 물김치님', '네안녕하세요 ..\r\n\r\n-----------------------------------------------\r\n&gt; 계씬가요?', '2020-12-15 (22:20)', NULL),
(9, 'waterf', 'admin', 'RE: 안녕하세요!!?!?!?!?!', '답변쪽지\r\n\r\n-----------------------------------------------\r\n&gt; 안녕하세요~ 가입을 축하드립니다~~~~~~~', '2020-12-17 (22:55)', '2020-12-19 (01:08:26)'),
(10, 'abc', 'admin', '뭐하시나요', 'admin씨.. 반가워요', '2020-12-17 (23:29)', '2020-12-18 (12:32:16)'),
(11, 'abc', 'gildong', '와와', '길동님 ㅇ와오아ㅗ아아', '2020-12-17 (23:30)', NULL),
(12, 'admin', 'abc', '안녕하세요abcabc', 'abc', '2020-12-18 (12:32)', '2020-12-25 (20:57:34)'),
(13, 'gildong', 'admin', 'RE: 안녕하세요322', '예예~\r\n\r\n-----------------------------------------------\r\n&gt; /\r\n&gt;?\r\n&gt;*\r\n&gt;&gt;', '2020-12-19 (00:05)', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `sendmessage`
--

CREATE TABLE `sendmessage` (
  `num` int(11) NOT NULL,
  `send_id` char(20) NOT NULL,
  `rv_id` char(20) NOT NULL,
  `subject` char(200) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) DEFAULT NULL,
  `readtime` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `sendmessage`
--

INSERT INTO `sendmessage` (`num`, `send_id`, `rv_id`, `subject`, `content`, `regist_day`, `readtime`) VALUES
(1, 'admin', 'gildong', '안녕하세요', '길동님 안녕하세요? 가입을 축하드립니다. \r\nㅎㅎ', '2020-12-14 (01:54)', NULL),
(3, 'admin', 'waterf', '안녕하세요!!?!?!?!?!', '안녕하세요~ 가입을 축하드립니다~~~~~~~', '2020-12-14 (02:11)', '2020-12-17 (22:35:16)'),
(4, 'admin', 'gildong', 'RE: RE: 안녕하세요', 'ㄸ또또또 안녕하세요\r\n\r\n-----------------------------------------------\r\n&gt; \r\n&gt;네 안녕하세요 . 잘부탁드려요\r\n&gt;-----------------------------------------------\r\n&gt;&gt; 길동님 안녕하세요? 가입을 축하드립니다. \r\n&gt;&gt;ㅎㅎ', '2020-12-14 (02:12)', '2020-12-17 (22:44:07)'),
(5, 'admin', 'gildong', '안녕하세요322', '/\r\n?\r\n*\r\n&gt;', '2020-12-14 (23:54)', '2020-12-19 (00:05:50)'),
(6, 'ddd', 'waterf', '안녕하세요 물김치님', '계씬가요?', '2020-12-15 (00:51)', NULL),
(8, 'waterf', 'gildong', '쪽지입니다.', 'rr', '2020-12-17 (22:39)', '2020-12-17 (22:43:50)'),
(9, 'waterf', 'admin', 'RE: 안녕하세요!!?!?!?!?!', '답변쪽지\r\n\r\n-----------------------------------------------\r\n&gt; 안녕하세요~ 가입을 축하드립니다~~~~~~~', '2020-12-17 (22:55)', '2020-12-19 (01:08:26)'),
(10, 'abc', 'admin', '뭐하시나요', 'admin씨.. 반가워요', '2020-12-17 (23:29)', '2020-12-18 (12:32:16)'),
(11, 'abc', 'gildong', '와와', '길동님 ㅇ와오아ㅗ아아', '2020-12-17 (23:30)', NULL),
(12, 'admin', 'abc', '안녕하세요abcabc', 'abc', '2020-12-18 (12:32)', '2020-12-25 (20:57:34)'),
(13, 'gildong', 'admin', 'RE: 안녕하세요322', '예예~\r\n\r\n-----------------------------------------------\r\n&gt; /\r\n&gt;?\r\n&gt;*\r\n&gt;&gt;', '2020-12-19 (00:05)', NULL);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `receivemessage`
--
ALTER TABLE `receivemessage`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `sendmessage`
--
ALTER TABLE `sendmessage`
  ADD PRIMARY KEY (`num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- 테이블의 AUTO_INCREMENT `chatting`
--
ALTER TABLE `chatting`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 테이블의 AUTO_INCREMENT `receivemessage`
--
ALTER TABLE `receivemessage`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 테이블의 AUTO_INCREMENT `sendmessage`
--
ALTER TABLE `sendmessage`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
