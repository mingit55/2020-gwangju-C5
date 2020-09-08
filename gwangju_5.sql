-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 20-09-08 04:27
-- 서버 버전: 10.1.30-MariaDB
-- PHP 버전: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `gwangju_5`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `festivals`
--

CREATE TABLE `festivals` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `location` varchar(150) NOT NULL,
  `area` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `period` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `images` text NOT NULL,
  `imagePath` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `festivals`
--

INSERT INTO `festivals` (`id`, `no`, `name`, `location`, `area`, `content`, `period`, `start_date`, `end_date`, `images`, `imagePath`) VALUES
(1, 10001, '2017 WTF 세계태권도선수권대회', '전라북도 무주군 설천면 무설로 1482 국립태권도원 T1경기장', '무주', 'WTF 세계태권도선수권대회(World Taekwondo Championship)는 세계태권도연맹(WTF)이 주관하며, 대회의 목적은 태권도를 통하여 세계인들의 우호를 증진하고 경기력 향상에 기여하는 것이다. 하계 올림픽 경기대회 태권도종목과 더불어 최고 권위의 국제태권도대회이다. 1970년대에 이르러 태권도가 세계 각국에 크게 보급되자 대한태권도연맹이 태권도의 세계적인 발전을 위하여 창설하였다. 1973년 5월 25일부터 25일까지 서울 국기원(國技院)에서 19개국의 남자선수와 임원 200명이 참가하여 제1회 세계태권도선수권대회를 개최하였다. 이 때 대회에 참가한 19개국 35명의 대표들이 모여 1973년 5월 28일에는 세계태권도연맹을 창설하였다. 이 대회는 2년마다 개최되는데 1985년 제7회 대회까지는 남자대회만 치러오다가, 1987년 제8회 대회에 처음 여자선수들이 참가함으로써 제1회 세계여자태권도대회가 함께 열리게 되었다. 이 대회를 유치한 세계태권도연맹의 회원국 협회가 조직위원회가 된다. 이와 같이 세계태권도대회를 개최한 결과, 태권도는 1988년 서울올림픽대회와 1992년 바르셀로나올림픽대회에 시범종목으로 채택되어 경기를 성공적으로 치렀다. 그리고 2000년 호주의 시드니올림픽대회에는 정식종목으로 채택되어 성공적으로 경기를 치루었다. 이 대회는 태권도를 세계 각국에 보급시키고, 세계적인 스포츠경기 종목으로 발전시켜 우리문화를 알리는데 지대한 공헌을 하고 있다.', '2017.06.24~06.30', '2017-06-24', '2017-06-30', '[\"10001_1.jpg\",\"10001_2.jpg\",\"10001_3.jpg\",\"10001_4.jpg\"]', '/xml/festivalImages/001_10001'),
(2, 10002, '[새만금상설공연] 해적2', '전라북도 김제시 광활면 창제리 아리울예술창고', '부안', '2018 새만금상설공연 아리울 스토리 시즌3 해적2는 한국무용, 스포츠댄스, 마샬아츠, 타악 퍼포먼스에 최신미디어 영상이 융합된 넌버벌 뮤지컬로, 부족과 연인을 구하기 위해 직접 검을 들고 나선 아리와 해적왕 염왕과의 마지막 결전을 배경으로 더욱 박진감 넘치고 화려한 무대로 새롭게 구성하였다. ', '2018.04.10~11.17', '2018-04-10', '2018-11-17', '[\"10002_1.jpg\",\"10002_2.jpg\",\"10002_3.jpg\",\"10002_4.jpg\"]', '/xml/festivalImages/002_10002'),
(3, 10004, '가맥축제', '전라북도 전주시 덕진구 기린대로 451', '전주', '안주 맛에 놀라고 맥주 맛에 반하다! 오늘 만든 맥주를 오늘 마실 수 있는 유일한 축제', '2019.08.08~08.10', '2019-08-08', '2019-08-10', '[\"10004_1.jpg\",\"10004_2.jpg\",\"10004_3.jpg\",\"10004_4.jpg\"]', '/xml/festivalImages/003_10004'),
(4, 10005, '개암동 벚꽃축제', '전북 부안군 상서면 개암로 248 개암사 입구', '부안', '', '2019.04.06~04.07', '2019-04-06', '2019-04-07', '[\"10005_1.jpg\",\"10005_2.jpg\",\"10005_3.jpg\",\"10005_4.jpg\"]', '/xml/festivalImages/004_10005'),
(5, 10006, '고창 갯벌 축제', '전라북도 고창군 심원면 애향갯벌로 320', '고창', '태고의 생명이 살아 숨 쉬는 곳, 상쾌한 바닷바람이 손짓하는 청정 고창갯벌이 관광객을 손짓하며 부른다. 갯벌 위로 쪼르르 기어가는 게도 보고, 바지락도 캐면서 한참을 웃고 떠들다보면 마음에 추억이 한가득 쌓인다. 석양노을 내려앉은 바람공원의 아름다움 속에 잊지 못할 추억을 선사할 고창갯벌축제가 고창군 심원면 일대에서 펼쳐진다. 고창갯벌체험축제는 유네스코 생물권보전 핵심지역이며 람사르습지로 지정된 고창갯벌에서 그동안 별도로 운영됐던 수산물축제와 갯벌축제를 통합해 더욱 알차고 내실 있는 체험축제로 마련됐다.', '2019.06.07~06.09', '2019-06-07', '2019-06-09', '[\"10006_1.jpg\",\"10006_2.jpg\",\"10006_3.jpg\",\"10006_4.jpg\"]', '/xml/festivalImages/005_10006'),
(6, 10007, '고창 모양성제', '전라북도 고창군 고창읍 모양성로 11', '고창', '모양성에는 축성과 관련된 여러 가지 전설과 풍습이 전해져 오고 있는데 그중 대표적인 것이 답성 민속(놀이)로 손바닥만 한 돌을 머리에 이고 1,684m의 성곽을 따라 도는 전통 민속놀이로 성을 밟아 튼튼하게 하고 유사시 활용하기 위한 선현들의 지혜에서 시작된 것으로 성을 한 바퀴 돌면 다릿병이 낫고, 두 바퀴 돌면 무병장수하며, 세 바퀴 돌면 극락승천한다는 전설이 내려오고 있으며, 해마다 수많은 사람들이 답성 놀이 행렬이 참여하고 있다.', '2019.10.03~10.07', '2019-10-03', '2019-10-07', '[\"10007_1.jpg\",\"10007_2.jpg\",\"10007_3.jpg\",\"10007_4.jpg\"]', '/xml/festivalImages/006_10007'),
(7, 10008, '고창 청보리밭 축제', '전라북도 고창군 공음면 학원농장길 158-6', '고창', '보리가 건강식품으로 자리매김하면서 쌀보다도 더 귀하게 대접받는 시대가 되었다. 이와 더불어 보리밭 경관도 상당히 대접을 받게 되었다. 이에 보답코자 고창 지역주민들과 힘을 합쳐 더 아름답고 더 풍성한 보리밭을 만들어 가고 있다. 고창의 옛 이름인 모양현의 ‘모’는 보리를 뜻하고, ‘양’은 태양을 의미한다. 보리의 고장에서는 청보리가 완연해지는 4월말부터 5월 중순까지 개최되는 고창 청보리밭축제>에서 탁 트인 들판의 청보리밭 속에서 봄의 향기를 듬뿍 맛 보시길 바란다.', '2020.05.10~06.18', '2020-05-10', '2020-06-18', '[\"10008_1.jpg\",\"10008_2.jpg\",\"10008_3.jpg\",\"10008_4.jpg\"]', '/xml/festivalImages/007_10008'),
(8, 10010, '곰소젓갈 발효축제', '[지번]', '부안', '전북 부안지역 특산품인 곰소젓갈과 청정 수산물을 즐길 수 있는 곰소젓갈수산물축제가 10월 23일부터 25일까지 진서면 곰소젓갈마을 일원에서 열린다. 곰소젓갈은 서해 칠산 앞바다에서 잡아올린 수산물을 미네랄이 풍부한 곰소 천일염으로 절여 김장용 양념 등으로 명성을 얻고 있다. 곰소젓갈의 향과 맛을 전국에 알리기 위해 곰소젓갈추진위원회가 마련한 이번 행사는 용왕제와 풍물축제를 시작으로 코믹콩트, 퓨전재즈 음악, 연예인 공연 등이 펼쳐진 행사기간에는 젓갈 무료시식코너와 젓갈할인 체험행사가 상설 진행된다.', '2019.10.03~10.05', '2019-10-03', '2019-10-05', '[\"10010_1.jpg\",\"10010_2.jpg\",\"10010_3.jpg\",\"10010_4.jpg\"]', '/xml/festivalImages/008_10010'),
(9, 10011, '국립무형유산원 토요상설공연', '전북 전주시 완산구 서학로 95', '전주', '우리의 노래, 아리랑은 계속된다! 유네스코 인류무형문화유산으로 등재된 아리랑 공연을 만나러 오세요.', '2018.06.09~06.09', '2018-06-09', '2018-06-09', '[\"10011_1.jpg\",\"10011_2.jpg\",\"10011_3.jpg\",\"10011_4.jpg\"]', '/xml/festivalImages/009_10011'),
(10, 10012, '국사봉 철쭉제', '전북 순창군 쌍치면 종암리 (터실마을 광장)', '순창', '화려한 철쭉의 향연과 함께 둥둥 어깨춤에 여편네 엉덩이 같은 푸짐한 추임새 가락에 매년 풍물놀이, 판소리 등 부풀 듯 피어오르는 봄꽃 소리 장단과 즐길 거리도 제공하고 있답니다. 다가오는 4월 28일, 순창군 쌍치면 종암리 터실마을 광장에 오시면 흰 철쭉을 비롯해 은은하고 수수한 형형색색의 철쭉 장관과 함께 축제의 장을 즐기실 수 있어요!', '2018.04.28~04.28', '2018-04-28', '2018-04-28', '[\"10012_1.jpg\",\"10012_2.jpg\",\"10012_3.jpg\",\"10012_4.jpg\"]', '/xml/festivalImages/010_10012'),
(11, 10014, '군산 꽁당보리축제', '전라북도 군산시 임사길 10', '군산', '나날이 실록의 푸름이 더해가는 5월. 군산에서는 상품의 품질, 명성 등 지리적 원산지에서 인증받는 \"지리적 표시\" 인증을 받은 흰 찰 쌀보리의 우수성과 농업에 대한 인식 전환을 위한 군산꽁당보리 축제를 진행합니다. 세대를 아우르는 각종 프로그램으로 어른들에게는 추억의 향수를 불러일으키고, 아이들에게는 자연학습은 물론 신나는 놀이의 장인 군산꽁당보리 축제로 초대합니다.', '2019.05.03~05.06', '2019-05-03', '2019-05-06', '[\"10014_1.jpg\",\"10014_2.jpg\",\"10014_3.jpg\",\"10014_4.jpg\"]', '/xml/festivalImages/011_10014'),
(12, 10015, '군산새만금 해맞이 행사', '[지번]전북 군산시 비응도동 69', '군산', '군산새만금 해맞이 행사를 다음과 같이 개최하오니 참석하시어 가족과 함께 뜻깊은 연말과 새해 첫 해오름 관망과 새해를 설계하는 행복한 시간 되시기 바랍니다.', '2017.01.01~01.01', '2017-01-01', '2017-01-01', '[\"10015_1.jpg\",\"10015_2.jpg\",\"10015_3.jpg\",\"10015_4.jpg\"]', '/xml/festivalImages/012_10015'),
(13, 10016, '군산시간여행축제', '전북 군산시 내항2길 32', '군산', '즐거운 체험거리, 공연, 먹을거리가 가득한 군산의 대표축제로써 일제강점기 수탈의 역사 속 군산 사람들의 항거와 저항을 기억하고 현재 우리모습을 돌아보는 장으로 당시를 살았던 사람들과 현재를 살아가는 사람들의 시간적 공간적 만남을 통해 새로운 열정을 만드는 축제입니다', '2019.10.04~10.06', '2019-10-04', '2019-10-06', '[\"10016_1.jpg\",\"10016_2.jpg\",\"10016_3.jpg\",\"10016_4.jpg\"]', '/xml/festivalImages/013_10016'),
(14, 10019, '김제지평선축제', '전북 김제시 부량면 벽골제로 442', '김제', '문화체육관광부 지정 2년 연속 대한민국 대표축제인 김제지평선축제는 대한민국에서 가장 큰 곡창지대인 호남평야의 중심지 벽골제에서 우리 한민족의 근간인 아름다운 농경문화의 정체성 계승과 하늘과 땅이 만나는 황금물결 지평선의 비경을 테마로 1999년부터 매년 9월말~10월초에 개최되고 있으며, 한민족의 얼과 함께 면면히 이어온 소중한 도작문화의 전통과 농경문화를 테마로 지역 이미지를 창출하고 주민 소득증대와 연계코자 개최되었다. 황금빛 지평선의 아름다움 속에서 역동적이고 생생한 프로그램들을 온몸으로 즐길 수 있는 전통농경문화체험축제이다.', '2019.09.27~10.06', '2019-09-27', '2019-10-06', '[\"10019_1.jpg\",\"10019_2.jpg\",\"10019_3.jpg\",\"10019_4.jpg\"]', '/xml/festivalImages/014_10019'),
(15, 10020, '김제추억의보리밭축제', '전북 김제시 진봉면 심포10길 94 망해사 인근 보리밭', '김제', '하늘과 땅이 만나는 전국 유일의 지평선 보리밭인 진봉면에서 지평선황금보리 추억의 보리밭축제가 열린다. ', '2019.05.04~05.06', '2019-05-04', '2019-05-06', '[\"10020_1.jpg\",\"10020_2.jpg\",\"10020_3.jpg\",\"10020_4.jpg\"]', '/xml/festivalImages/015_10020'),
(16, 10021, '남원 동동동화축제', '전북 남원시 관한북로 20 남원예촌 일원', '남원', '겨울에 더욱 즐거운 남원 동동동화축제', '2020.01.11~01.27', '2020-01-11', '2020-01-27', '[\"10021_1.jpg\",\"10021_2.jpg\",\"10021_3.jpg\",\"10021_4.jpg\"]', '/xml/festivalImages/016_10021'),
(17, 10022, '남원지리산바래봉철쭉제', '전라북도 남원시 운봉읍 바래봉길 214', '남원', '남원시 운봉읍 가축유전자 시험장(구 축산기술연구소) 뒷편 바래봉 자락에서는 해마다 4월말에서 5월 중순경까지 철쭉이 장관을 이루는데 마치 진홍물감을 풀어 놓은 듯 착각에 빠질 정도로 환상적이다.', '2020.04.30~05.05', '2020-04-30', '2020-05-05', '[\"10022_1.jpg\",\"10022_2.jpg\",\"10022_3.jpg\",\"10022_4.jpg\"]', '/xml/festivalImages/017_10022'),
(18, 10023, '내장산 단풍 겨울빛축제', '전라북도 정읍시 내장동 676', '정읍', '겨울축제는 정읍에서 즐기자! 내장산단풍 겨울빛축제', '2019.12.27~01.31', '2019-12-27', '2020-01-31', '[\"10023_1.jpg\",\"10023_2.jpg\",\"10023_3.jpg\",\"10023_4.jpg\"]', '/xml/festivalImages/018_10023'),
(19, 10025, '무주 초리꽁꽁놀이 축제', '전북 무주군 적상면 초리길1 초리마을 일원', '무주', '손이 꽁! 발이꽁! 무주 초리꽁꽁놀이 축제', '2019.12.21~02.02', '2019-12-21', '2020-02-02', '[\"10025_1.jpg\",\"10025_2.jpg\",\"10025_3.jpg\",\"10025_4.jpg\"]', '/xml/festivalImages/019_10025'),
(20, 10026, '무주남대천 물 축제', '전북 무주군 무주읍 남대천', '무주', '사랑의 다리에서는 물총과 물풍선, 호스와 양동이를 활용한 물싸움(water로 전쟁)이 진행되며 수중난타와 현대무용, 어우동공연, 훌라댄스, DJ파티 등 공연들이 펼쳐진다.', '2018.07.27~07.29', '2018-07-27', '2018-07-29', '[\"10026_1.jpg\",\"10026_2.jpg\",\"10026_3.jpg\",\"10026_4.jpg\"]', '/xml/festivalImages/020_10026'),
(21, 10027, '무주반딧불축제', '전북 무주군 무주읍 한풍루로 326-17', '무주', '천연기념물 제322호로 지정돼 있는 반딧불이와 그 먹이 다슬기 서식지가 소재인 무주반딧불축제는 자연 속에서 자연을 배우며 자연을 즐기는 환경축제로서의 브랜드 가치를 자랑한다.', '2019.08.31~09.08', '2019-08-31', '2019-09-08', '[\"10027_1.jpg\",\"10027_2.jpg\",\"10027_3.jpg\",\"10027_4.jpg\"]', '/xml/festivalImages/021_10027'),
(22, 10028, '무주산골영화제', '전북 무주군 무주읍 당산리 1199-3', '무주', '1996년, 대한민국의 첫 국제영화제였던 부산국제영화제가 첫 항해를 시작한 이후 20여 년의 시간이 흘렀습니다. 그동안 한국에는 많은 국제영화제와 그보다 더 많은 수의 다양한 콘셉트를 가진 영화제들이 연달아 생겼습니다. 그 중 몇몇 영화제들은 잘 성장했고, 몇몇 영화제들은 역사 속으로 사라지기도 했습니다. 현재 대한민국에는 약 100여개의 크고 작은 영화제들이 전국 방방곡곡에서 열리고 있습니다. ', '2020.06.04~06.08', '2020-06-04', '2020-06-08', '[\"10028_1.jpg\",\"10028_2.jpg\",\"10028_3.jpg\",\"10028_4.jpg\"]', '/xml/festivalImages/022_10028'),
(23, 10029, '복분자와 수박 대축제', '전북 고창군 아산면 삼인리 393-4', '고창', '21세기 최고의 웰빙식품, 오감이 만족하는 색다른 체험이 있는 고창의 최고 특산물 고창 복분자, 고창 수박과 함께 하세요.', '2019.06.21~06.23', '2019-06-21', '2019-06-23', '[\"10029_1.jpg\",\"10029_2.jpg\",\"10029_3.jpg\",\"10029_4.jpg\"]', '/xml/festivalImages/023_10029'),
(24, 10030, '부안 님의뽕축제', '전라북도 부안군 변산면 중계리 539-1', '부안', '전북 부안군의 특산물인 뽕과 오디, 가공품을 알리기 위한  \'님의뽕 축제\'가 변산면 부안댐 일대에서 개최된다. 전북의 특산물인 뽕제품 전시와판매, 음악공연, 영화상영, 노래자랑, 체험행사 등으로 이루어져있다. 이밖에 변산반도 인근에서는 상서면 청림청소년수련원의 별 관측, 보안면 청자박물관 도예체험, 변산해변의 갯벌체험 등의 다양한 행사도 즐길 수 있다. 뽕 제품 40여종이 전시 판매되며 얼음 속 뽕술 찾기, 뽕주스 빨리 먹기, 뽕제품 이름 부르기 등의 이벤트 행사가 열린다.', '2018.08.03~08.07', '2018-08-03', '2018-08-07', '[\"10030_1.jpg\",\"10030_2.jpg\",\"10030_3.jpg\",\"10030_4.jpg\"]', '/xml/festivalImages/024_10030'),
(25, 10031, '부안 도깨비 빛 축제', '전북 부안군 변산면 격포로 309-64 부안영상테마파크', '부안', '전통과 빛의 향연이 펼쳐지는 테마파크 전통과ㅑ 현대의 어울림을 함께 체험할 수 있는 부안영상테마파크 입니다.', '2018.07.13~08.19', '2018-07-13', '2018-08-19', '[\"10031_1.jpg\",\"10031_2.jpg\",\"10031_3.jpg\",\"10031_4.jpg\"]', '/xml/festivalImages/025_10031'),
(26, 10032, '부안마실축제', '전라북도 부안군 부안읍 매창로 89', '부안', '산,들,바다가 만들어낸 천혜의 자연경관을 간직한 부안에서 펼쳐지는 부안마실축제는 부안만의 문화와 전통 자연경관을 배경으로 \'마실\'로 대표되는 부안의 포근한 인심과 정을 이웃과 더불어 나누고자 하는 축제이다. \'마실\'은 한반도에서 두루 쓰이는 \'마을\'의 사투리다. 또한 \'마실가다\'란 말은 현대에서도 자주 사용한다. 힘들고 바쁘게 일했던 하루를 마무리하고 이웃들과 함께 소통하며 즐기기 위해, 또 나누기 위해 나서는 길이 바로 \'마실\'이다. 자연과 사람의 어울림이 있는 부안마실축제에서 따뜻한 봄을 느껴보길 바란다.', '2020.05.02~05.05', '2020-05-02', '2020-05-05', '[\"10032_1.jpg\",\"10032_2.jpg\",\"10032_3.jpg\",\"10032_4.jpg\"]', '/xml/festivalImages/026_10032'),
(27, 10033, '비전마을 국악 거리축제', '전라북도 남원시 운봉읍 비전길 7', '남원', '동편제마을 국악 거리축제는 전라북도 남원시 운봉읍 동편제의 고장 \'비전마을, 전촌마을\' 일대에서 벌어지는 국악 거리축제이다. 2015년부터 시작된 본 축제는 일상 속 문화가치 확산을 목적으로 현대차 정몽구 재단과 한국예술종합학교 산학협력단이 작은 시골농촌마을의 특색을 살려, 예술마을로 변화시키는 예술세상 마을 프로젝트의 일환이다.', '2018.05.25~05.27', '2018-05-25', '2018-05-27', '[\"10033_1.jpg\",\"10033_2.jpg\",\"10033_3.jpg\",\"10033_4.jpg\"]', '/xml/festivalImages/027_10033'),
(28, 10034, '산속여우빛축제', '전라북도 완주군 비봉면 천호로 235-38', '완주', '\"산속여우빛\" 축제는 1만여 평의 허브가 있는 정원에 어린 왕자 이야기를 테마로, 정원 곳곳에 LED 조명을 활용해 진행되는 불빛축제이다 \"산속여우빛\" 은 자연과 예술이 조화를 이루어, 불빛의 화려함과 함께 이야기가 있는 볼거리와 공연이 어우러져 타 지역 불빛축제와 차별화를 두었다.', '2018.01.01~12.31', '2018-01-01', '2018-12-31', '[\"10034_1.jpg\",\"10034_2.jpg\",\"10034_3.jpg\",\"10034_4.jpg\"]', '/xml/festivalImages/028_10034'),
(29, 10036, '옥정호꽃걸음빛바람축제', '전북 임실군 운암면 입석1길 59', '임실', '옥정호는 풍광이 아름다운 호반의 도시로서 장장 30.15km 환상적인 명품 드라이브 코스와 물안개길 그리고 수려한 경관의 국사봉, 붕어섬이 있는 천혜의 고장이기도 합니다.', '2019.04.27~04.28', '2019-04-27', '2019-04-28', '[\"10036_1.jpg\",\"10036_2.jpg\",\"10036_3.jpg\",\"10036_4.jpg\"]', '/xml/festivalImages/029_10036'),
(30, 10037, '완주곶감축제', '전라북도 완주군 운주면 장선로 113', '완주', '곶감 판매∙홍보 행사 곶감 품평회. 전시관 운영, 문화공연', '2019.12.20~12.22', '2019-12-20', '2019-12-22', '[\"10037_1.jpg\",\"10037_2.jpg\",\"10037_3.jpg\",\"10037_4.jpg\"]', '/xml/festivalImages/030_10037'),
(31, 10038, '완주와일드푸드축제', '전라북도 완주군 고산면 고산휴양림로 246', '완주', '자연과 문화과 조화를 이루며 살아가는 오성한옥마을에서 오픈가든축제가 열립니다. ', '2019.09.27~09.29', '2019-09-27', '2019-09-29', '[\"10038_1.jpg\",\"10038_2.jpg\",\"10038_3.jpg\",\"10038_4.jpg\"]', '/xml/festivalImages/031_10038'),
(32, 10039, '완주프러포즈축제', '전북 완주군 구이면 모악산길 111-6', '완주', '먼 옛날 경각산은 모악산에게 청혼을 하였습니다. 그들의 아름다운 결혼으로 구이면에는 생명의 근원, 픙요의 상징인 구이저수지가 생겨 물이 넘쳐 흐르게 되었답니다. 이곳에서 사랑을 고백하면 여러분의 사랑도 꼭 이르어질거예요~', '2019.05.25~05.26', '2019-05-25', '2019-05-26', '[\"10039_1.jpg\",\"10039_2.jpg\",\"10039_3.jpg\",\"10039_4.jpg\"]', '/xml/festivalImages/032_10039'),
(33, 10040, '익산 천만송이 국화축제', '전라북도 익산시 하나로 322', '익산', '매년 10월말 ~ 11월초 사이 익산 중앙체육공원에서 열리는 축제이며, 국화 야외 전시 및 우리지역 농특산물 홍보 및 판매, 전국 국화작품 경연대회, 문화공연 등 다채로운 행사가 열린다. 전 시민이 함께하는 지역축제로서 주요도심 국화식재 및 축제기간에 아파트 베란다, 상가, 각급기관, 단체 등에 국화화분 내놓기 범시민운동전개로 통합축제의 성공적 개최 및 익산 도시브랜드 이미지제고 축제이다.', '2019.10.25~11.04', '2019-10-25', '2019-11-04', '[\"10040_1.jpg\",\"10040_2.jpg\",\"10040_3.jpg\",\"10040_4.jpg\"]', '/xml/festivalImages/033_10040'),
(34, 10041, '임실N치즈축제', '전라북도 임실군 성수면 도인2길 50', '임실', '임실N치즈축제는 전북 임실에서 개최된다. 임실치즈가 대한민국 대표 치즈브랜드로서 임실치즈의 우수성을 널리 알리고자 임실치즈와 체험관광을 접목한 새로운 축제를 개최한다. 두메산골 한우와 떠나는 치즈여행이라는 부제로 열리는 임실N치즈축제에서는 암소한우만으로 구성된 한우명품관과 치즈요리를 맛보는 치즈요리관을 만날 수 있고 홈메이드 치즈 제조와 치즈 과학 실험 등 다양한 치즈체험, 낙농체험 등을 즐길 수 있어 즐거움과 배움을 동시에 만족할 수 있다.', '2019.10.03~10.06', '2019-10-03', '2019-10-06', '[\"10041_1.jpg\",\"10041_2.jpg\",\"10041_3.jpg\",\"10041_4.jpg\"]', '/xml/festivalImages/034_10041'),
(35, 10042, '전주국제영화제', '전라북도 전주시 완산구 전주객사 4길 46', '전주', '맛과 멋, 전통 문화의 도시 전주의 아름다움과 함께 성장해온 전주국제영화제, 매년 봄 어김없이 세계 곳곳의 영화 프로그램, 다채로운 기획행사와 이벤트로 \'영화를 통한 세상의 변화\'를 꿈꾸며 국내 최고의 영화축제로 그 위상을 확고히 다지고 있다.', '2020.05.28~06.06', '2020-05-28', '2020-06-06', '[\"10042_1.jpg\",\"10042_2.jpg\",\"10042_3.jpg\",\"10042_4.jpg\"]', '/xml/festivalImages/035_10042'),
(36, 10043, '전주대사습놀이 전국대회', '전라북도 전주시 덕진구 권삼득로 400', '전주', '조선조 숙종대의 마상궁술대회 및 영조대의 물놀이와 판소리, 백일장 등 민속무예놀이를 종합 대사습이라 합니다.', '2019.06.07~06.10', '2019-06-07', '2019-06-10', '[\"10043_1.jpg\",\"10043_2.jpg\",\"10043_3.jpg\",\"10043_4.jpg\"]', '/xml/festivalImages/036_10043'),
(37, 10044, '전주세계소리축제', '전주시 덕진구 소리로 31', '전주', '전주세계소리축제는 우리 전통음악을 중심으로 세계 다양한 월드뮤직을 한자리에서 만날 수 있는 축제입니다. 우리음악을 기반으로 한 다양한 실험과 시도, 해외 뮤지션들과의 콜라보 등 매력적이고 창의적인 기획으로 매해 가을, 관객을 찾아갑니다. 특히 어린이소리축제를 통해 어린이와 가족단위 관람객을 위한 풍성한 공연과 체험, 워크숍이 준비되어 있습니다. 2018 전주세계소리축제는 세계 월드뮤직축제를 대상으로 평가되는 TWMC 베스트 페스티벌에서 1위를 수상하며 우리나라를 뛰어 넘어 세계적인 축제로 그 위상을 인정받았습니다.', '2019.10.02~10.06', '2019-10-02', '2019-10-06', '[\"10044_1.jpg\",\"10044_2.jpg\",\"10044_3.jpg\",\"10044_4.jpg\"]', '/xml/festivalImages/037_10044'),
(38, 10045, '전주한지문화축제', '전라북도 전주시 덕진구 기린대로 451', '전주', '1997년 시작으로 전라북도 전주시에 5월에 개최하는 축제로, 천년전주 한지의 우수성을 널리 알리고, 전통한지공예 경진대회를 통하여 전국의 우수 공예인을 발굴하는 한편, 전주한지 산업화에 기여하고자 합니다.  한지가 가지는 다양한 기능을 문화로 재해석하여 천년동안 사람과 함께 어울렸던 한지를 축제를 통해 표현하고 전주한지의 비전을 제시하고 교류하는 전주를 대표하는 축제입니다.', '2019.05.04~05.06', '2019-05-04', '2019-05-06', '[\"10045_1.jpg\",\"10045_2.jpg\",\"10045_3.jpg\",\"10045_4.jpg\"]', '/xml/festivalImages/038_10045'),
(39, 10046, '춘향제', '전라북도 남원시 요천로 1447', '남원', '대한민국, 춘향에 물들다. 꽃보다 붉은, 춘향과 몽룡의 사랑이 사랑의 도시 남원에서 춘향제로 피어납니다. 민족의 정체성이 위협받는 상황에서 춘향의 정절과 순수한 사랑을 민족운동으로 승화시키며 시작한 춘향제는 90년의 유구한 역사와 전통을 자랑하며 우리들 곁에서 지고지순한 사랑으로 거듭나고 있습니다. 사랑과 만남을 주제로 문화, 공연예술, 체험행사가 가득한 세계적인 사랑 축제의 장으로 여러분을 초대합니다. 대한민국 대표 관광명소 광한루원은 지금 춘향아씨가 그네 타던 그 시절로 돌아가 있답니다. 사랑하는 이와 함께 춘향에 빠져 아름다운 추억을 듬뿍 담아 가시기 바랍니다. ', '2020.09.10~09.13', '2020-09-10', '2020-09-13', '[\"10046_1.jpg\",\"10046_2.jpg\",\"10046_3.jpg\",\"10046_4.jpg\"]', '/xml/festivalImages/039_10046'),
(49, 0, '수정제', '수원정보과학고등학교', '수원', '', '2020.01.01~08.14', '2020-01-01', '2020-08-14', '[]', '/xml/festivalImages/uploads'),
(50, 0, '수정제', '수원시 장안구 매탄동 수원정보과학고', '수원', '', '2020.01.01~08.13', '2020-01-01', '2020-08-13', '[]', '/xml/festivalImages/uploads');

-- --------------------------------------------------------

--
-- 테이블 구조 `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `score` int(11) NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `reviews`
--

INSERT INTO `reviews` (`id`, `user_name`, `content`, `score`, `fid`) VALUES
(4, '일유저', '당신을 위한 사랑은 이 밤하늘을 가득 채워도 모자라.', 3, 1);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `festivals`
--
ALTER TABLE `festivals`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `festivals`
--
ALTER TABLE `festivals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- 테이블의 AUTO_INCREMENT `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
