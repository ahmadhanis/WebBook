-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2022 at 08:36 PM
-- Server version: 10.3.32-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slumber6_mybookdepositorydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `book_id` int(5) NOT NULL,
  `book_title` varchar(200) NOT NULL,
  `book_author` varchar(200) NOT NULL,
  `book_isbn` varchar(15) NOT NULL,
  `book_price` float NOT NULL,
  `book_description` varchar(500) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  `book_lang` varchar(100) NOT NULL,
  `book_date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`book_id`, `book_title`, `book_author`, `book_isbn`, `book_price`, `book_description`, `book_pub`, `book_lang`, `book_date`) VALUES
(1, 'It Ends With Us', 'Colleen Hoover', '9781471156267', 37.5, 'A brave and heartbreaking novel that digs its claws into you and doesn\'t let go, long after you\'ve finished it\' Anna Todd, author of the After series \'A glorious and touching read, a forever keeper\' USA Today \'Will break your heart while filling you with hope\' Sarah Pekkanen.', 'Simon & Schuster Ltd', 'English', '2022-01-03 14:10:52.318280'),
(2, 'The Song of Achilles', 'Madeline Miller', '9781408891384', 45.99, 'Greece in the age of heroes. Patroclus, an awkward young prince, has been exiled to the court of King Peleus and his perfect son Achilles. ', 'loomsbury Publishing PLC', 'English', '2022-01-03 14:13:54.511101'),
(3, 'They Both Die at the End', 'Adam Silvera', '9781471166204', 34.71, 'On September 5th, a little after midnight, Death-Cast calls Mateo Torrez and Rufus Emeterio to give them some bad news: they\'re going to die today. Mateo and Rufus are total strangers, but, for different reasons, they\'re both looking to make a new friend on their End Day.', 'Simon & Schuster', 'English', '2022-01-06 13:24:07.484136'),
(4, 'Red, White & Royal Blue', 'Casey McQuiston', '9781250316776', 65.56, 'When his mother became President, Alex Claremont-Diaz was promptly cast as the American equivalent of a young royal. Handsome, charismatic, genius--his image is pure millennial-marketing gold for the White House. ', 'Saint Martin', 'English', '2022-01-06 13:32:38.345380'),
(5, 'One Last Stop', 'Casey Mcquiston', '9781250244499', 56.26, 'For cynical twenty-three-year-old August, moving to New York City is supposed to prove her right: that things like magic and cinematic love stories don\'t exist, and the only smart way to go through life is alone. She can\'t imagine how waiting tables at a 24-hour pancake diner and moving in with too many weird roommates could possibly change that. And there\'s certainly no chance of her subway commute being anything more than a daily trudge through boredom and electrical failures.', 'Saint Martin\'s Griffin', '1', '2022-01-06 13:37:35.645472'),
(6, 'Grandmaster of Demonic Cultivation', 'Mo Dao Zu Shi', '9781648279201', 75.04, 'Also known as MDZS, the blockbuster danmei/Boys\' Love novels from China that inspired comics, animation, and the live-action series The Untamed--which amassed billions of views, including on Netflix! This historical fantasy tale of two powerful men who find each other through life and death is now in English, for the very first time.', 'West Hollywood, United States', 'English', '2022-01-10 12:51:53.056029'),
(7, 'Atomic Habits', 'James Clear', '9781847941831', 82.69, 'People think that when you want to change your life, you need to think big. But world-renowned habits expert James Clear has discovered another way. He knows that real change comes from the compound effect of hundreds of small decisions: doing two push-ups a day, waking up five minutes early, or holding a single short phone call.', 'Cornerstone', 'English', '2022-01-14 20:36:21.855037'),
(8, 'Make, Sew and Mend ', 'Bernadette Banner', '9781645674863', 82.37, 'Whether you are just getting started with sustainable fashion and need to alter your new secondhand finds, or you want an introduction to sewing techniques for making your own clothes, Bernadette Banner\'s signature voice will guide you through all the traditional stitches and techniques you need to extend the life of your favorite pieces and take fashion.', 'Page Street Publishing', 'English', '2022-01-14 20:37:34.825175'),
(9, 'Iron Widow', 'Prentice Hall Press', '9780735269934', 77.29, 'The boys of Huaxia dream of pairing up with girls to pilot Chrysalises, giant transforming robots that can battle the mecha aliens that lurk beyond the Great Wall. It doesn\'t matter that the girls often die from the mental strain.', 'Prentice Hall Press', 'English', '2022-01-14 20:38:26.278539'),
(10, 'Pig-Heart Boy', 'Malorie Blackman', '9780552551663', 35.38, 'You\'re thirteen. All you want is a normal life. But most normal kids don\'t need heart transplants. So there\'s this doctor. He says there\'s a chance for you. But he also says it\'s experimental, controversial and risky. And it\'s never been done before. Shortlisted for the Carnegie Medal, this is a powerful, thought-provoking story from the award-winning Malorie Blackman.\r\n', 'Penguin Random House Children\'s UK', 'English', '2022-01-14 20:39:35.462309'),
(11, 'Thief!', ' Malorie Blackman', '9780552551656', 35.21, 'You\'re the new girl in school. You\'re just trying to fit in - and it\'s not working. Then someone accuses you of theft, and you think things can\'t get any worse. Until you get caught in a freak storm. The next thing you know, you\'re in the future. Being shot at for being out after curfew. You don\'t even recognise your hometown. And you\'re heading for a confrontation from your worst nightmare.', 'Penguin Random House', 'English', '2022-01-14 20:40:46.981943'),
(12, 'A Boy Called Hope', 'Lara Williamson', '9781474922920', 33.84, 'I\'m Dan Hope and deep inside my head I keep a list of things I want to come true. For example, I want my sister, Ninja Grace, to go to university at the North Pole and only come back once a year. I want to help Sherlock Holmes solve his most daring mystery yet. And if it could be a zombie mystery, all the more exciting. I want my dog to stop eating the planets and throwing them up on the carpet.', 'Usborne Publishing Ltd', 'English', '2022-01-14 20:41:50.670354'),
(13, 'The Red Palace', 'June Hur', '9781250800558', 90.39, 'June Hur, critically acclaimed author of The Silence of Bones and The Forest of Stolen Girls, returns with The Red Palace--a third evocative, atmospheric historical mystery perfect for fans of Courtney Summers and Kerri Maniscalco.', 'FEIWEL & FRIENDS', 'English', '2022-01-14 20:42:51.199183'),
(14, 'Jade Fire Gold', 'June C Tan', '9780063056367', 78.44, 'Girls of Paper and Fire meets A Song of Wraiths and Ruin in June CL Tan\'s stunning debut, where ferocious action, shadowy intrigue, rich magic, and a captivating slow-burn romance collide.', 'Harperteen', 'English', '2022-01-14 20:43:42.632659'),
(15, 'Six of Crows', 'Leigh Bardugo', '9781510106284', 75.15, 'A glorious Collector\'s Edition of New York Times bestselling, epic fantasy novel, SIX OF CROWS. Beautifully designed, with an exclusive letter from the author and six stunning full-colour character portraits. This covetable hardback with red sprayed edges is a perfect gift for fans, and a perfect way to discover the unforgettable writing of Leigh Bardugo.', 'Hachette Children', 'English', '2022-01-14 20:48:06.607737'),
(16, 'The Neverending Story', 'Michael Ende', '9780525457589', 92.5, 'From award-winning German author Michael Ende, The Neverending Story is a classic tale of one boy and the book that magically comes to life. When Bastian happens upon an old book called The Neverending Story, he\'s swept into the magical world of Fantastica--so much that he finds he has actually become a character in the story! And when he realizes that this mysteriously enchanted world is in great danger, he also discovers that he is the one chosen to save it.', 'Penguin Putnam Inc', 'English', '2022-01-14 20:49:20.621818'),
(17, 'The Gruffalo', 'Julia Donaldson', '9780142403877', 33.1, 'A mouse is taking a stroll through the deep, dark wood when along comes a hungry fox, then an owl, and then a snake. The mouse is good enough to eat but smart enough to know this, so he invents . . . the gruffalo! As Mouse explains, the gruffalo is a creature with terrible claws, and terrible tusks in its terrible jaws, and knobbly knees and turned-out toes, and a poisonous wart at the end of its nose. But Mouse has no worry to show.', 'Penguin Random House', 'English', '2022-01-14 20:54:32.297160'),
(18, 'The Tiger Who Came to Tea', 'Judith Kerr', '9780007215997', 35.17, 'The classic picture book story of Sophie and her extraordinary teatime guest has been loved by millions of children since it was first published more than fifty years ago. Now an award-winning animation. The doorbell rings just as Sophie and her mummy are sitting down to tea. Who could it possibly be? What they certainly don\'t expect to see at the door is a big furry, stripy tiger!', 'HarperCollins Publishers', 'English', '2022-01-14 20:55:26.917755'),
(19, 'Dear Zoo : A Lift-the-flap Book', 'Rod Campbell', '9781416947370', 30.21, 'Rod Campbell\'s classic lift-the-flap book Dear Zoo has been a firm favorite with toddlers and parents alike ever since it was first published in 1982. Young readers love lifting the flaps to discover the animals the zoo has sent--a monkey, a lion, and even an elephant! But will they ever find the perfect pet?', 'Simon & Schuster', 'English', '2022-01-14 21:02:55.403252'),
(20, 'Hacker', 'Malorie Blackman Share    ', '9780552551649', 35.21, 'MESSAGE: This is the system operator. Who is using this account? Please identify yourself. When Vicky\'s father is arrested, accused of stealing over a million pounds from the bank where he works, she is determined to prove his innocence. But how? There\'s only one way - to attempt to break into the bank\'s computer files.', 'Penguin Random House', 'English', '2022-01-14 21:03:53.668667'),
(21, 'I Know You Did It', ' Sue Wallman', '9780702302701', 33.51, 'On her first day at a new school, Ruby finds a note in her locker saying \"I KNOW YOU DID IT\". She\'s terrified that someone has found out she was responsible for the \r\n eath of a girl called Hannah in a playground when they were both toddlers - a secret that has haunted her for years.\r\n', 'Scholastic', 'English', '2022-01-14 21:04:48.922190'),
(22, 'The Lucky List', ' Rachael Lippincott', '9781398502604', 34.48, 'From the #1 New York Times bestselling co-author of Five Feet Apart comes a gripping new romance, perfect for fans of The Perks of Being a Wallflower and Simon vs. the Homo Sapiens Agenda. Two girls, one list and twelve chances to fall in love this summer ', 'Simon & Schuster Ltd', 'English', '2022-01-14 21:08:04.126776'),
(23, 'Take Me Home Tonight', 'Morgan Matson', '9781471163906', 35.67, 'Ferris Bueller meets Nick and Nora\'s Infinite Playlist in this fun-filled romp through the city that never sleeps, from the New York Times-bestselling author of Since You\'ve Been Gone. at and Stevie - best friends, theatre kids, polar opposites - have snuck away from the suburbs to spend a night in New York City. The plan is simple: see a play, eat at NYC\'s hottest restaurant and have the best night ever\r\n', 'Simon & Schuster Ltd', 'English', '2022-01-14 21:08:58.468607'),
(24, 'Ugly Love', 'Colleen Hoover', '9781471136726', 38.38, 'When Tate Collins finds airline pilot Miles Archer passed out in front of her apartment door, it is definitely not love at first sight. They wouldn\'t even go so far as to consider themselves friends. But what they do have is an undeniable mutual attraction. He doesn\'t want love and she doesn\'t have time for a relationship, but their chemistry cannot be ignored. Once their desires are out in the open, they realize they have the perfect set-up, as long as Tate can stick to two rules', 'Simon & Schuster Ltd', 'English', '2022-01-14 21:10:15.627931'),
(25, 'The Unhoneymooners ', 'Christina Lauren', '9780349417592', 53.02, 'The perfect choice if you\'ve had to cancel your summer holiday but still want to feel the sand between your toes\' Beth O\'Leary. Olive is always unlucky; her identical twin sister Ami, on the other hand, is probably the luckiest person in the world. While she\'s about to marry her dream man, Olive is forced to play nice with her nemesis: the best man, Ethan.\r\n', 'Brown Book Group', 'English', '2022-01-14 21:12:01.410665'),
(26, 'The Flatshare', 'Beth O\'Leary', '9781787474413', 46.58, 'Funny and winning... a Richard Curtis rom-com that also has its feet firmly planted in real life. A real treat The last book to completely emotionally absorb me in this way was Eleanor Oliphant Is Completely Fine, and I think fans of that will adore this. Set to become the romcom of the year - a Sleepless In Seattle for the 21st century\'\r\nSunday Express', 'Quercus Publishing', 'English', '2022-01-14 21:13:09.551575');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carts`
--

CREATE TABLE `tbl_carts` (
  `user_email` varchar(50) NOT NULL,
  `book_id` varchar(10) NOT NULL,
  `cart_qty` int(5) NOT NULL,
  `cart_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_carts`
--

INSERT INTO `tbl_carts` (`user_email`, `book_id`, `cart_qty`, `cart_id`) VALUES
('rebas49969@rezunz.com', '1', 3, 1),
('rebas49969@rezunz.com', '5', 2, 2),
('rebas49969@rezunz.com', '6', 2, 3),
('rebas49969@rezunz.com', '2', 3, 11),
('rebas49969@rezunz.com', '4', 2, 17),
('rebas49969@rezunz.com', '3', 1, 18),
('slumberjer@gmail.com', '2', 1, 52),
('slumberjer@gmail.com', '12', 3, 65),
('slumberjer@gmail.com', '1', 1, 71),
('slumberjer@gmail.com', '4', 1, 72),
('slumberjer@gmail.com', '10', 1, 73);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(5) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `user_regdate` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `user_otp` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_email`, `user_password`, `user_regdate`, `user_otp`) VALUES
(1, 'slumberjer@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '2022-01-10 00:00:00.000000', '1'),
(2, 'rebas49969@rezunz.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '2022-01-13 00:00:00.000000', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `book_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
