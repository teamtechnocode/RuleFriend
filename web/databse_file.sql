-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2019 at 04:53 AM
-- Server version: 10.3.18-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rulefrie_rulefriend`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(255) NOT NULL,
  `ques_id` int(255) NOT NULL,
  `answer` varchar(5000) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `ques_id`, `answer`, `status`, `user_id`) VALUES
(5, 3, 'DigiLocker has partnered with the Ministry of Road Transport and Highways for making available digital driving license & vehicle registration certificates to Indian citizens. Under this partnership, DigiLocker is now directly integrated with the National Register, which is the national database of driving license and vehicle registration data across the country. Henceforth, DigiLocker users will be able to access their digital RC & DL both on desktop computers and on mobile devices.\r\n\r\nBenefits of this integration -\r\nPaperless Services: Digital driving license and vehicle registration will minimize the use of physical documents.\r\nAuthentic Records: Citizens can share the authentic digital certificates directly from the data source with other departments as identity and address proof resulting in reduction of administrative overhead.\r\nSpot Verification: The digital RC and DL in a DigiLocker account can be spot verified for authenticity either by validating the Digital Signature of MoRTH on the PDF copy of the document or by scanning the QR code on digital documents by using the QR scan facility on DigiLocker mobile app.', 'approved', 13),
(2, 3, 'yes, we can show digital form of DL as it is approved by the RTO.', 'approved', 1),
(3, 7, 'DigiLocker has partnered with the Ministry of Road Transport and Highways for making available digital driving license & vehicle registration certificates to Indian citizens. Under this partnership, DigiLocker is now directly integrated with the National Register, which is the national database of driving license and vehicle registration data across the country. Henceforth, DigiLocker users will be able to access their digital RC & DL both on desktop computers and on mobile devices.\r\n\r\nBenefits of this integration -\r\nPaperless Services: Digital driving license and vehicle registration will minimize the use of physical documents.\r\nAuthentic Records: Citizens can share the authentic digital certificates directly from the data source with other departments as identity and address proof resulting in reduction of administrative overhead.\r\nSpot Verification: The digital RC and DL in a DigiLocker account can be spot verified for authenticity either by validating the Digital Signature of MoRTH on the PDF copy of the document or by scanning the QR code on digital documents by using the QR scan facility on DigiLocker mobile app.', 'approved', 1),
(4, 7, 'Yes, access of digital DL and RC is possible but only through digilocker.', 'approved', 13),
(6, 4, 'According to the Indian Constitution, there are six basic Fundamental Rights of Indian Citizens, which are right to equality, right to freedom of religion, cultural and educational rights, right to freedom, right to constitutional remedies and right against exploitation.', 'approved', 1),
(7, 4, 'right to equality\r\nright to freedom of religion\r\ncultural and educational rights\r\nright to freedom\r\nright to constitutional remedies\r\nright against exploitation', 'approved', 13),
(8, 5, 'Photo Passbook of running bank account in any public sector bank, private sector bank and regional rural banks.\r\nWater bill.\r\nElection Photo ID card.\r\nLandline or Postpaid mobile bill.\r\nProof of Gas Connection.\r\nElection Photo ID card.\r\nSpouse’s passport copy (First and last page of the passport that includes the details of the family and mentions applicants name as spouse of the passport holder).\r\nCertificate from Employer of reputed companies on letter head.\r\nIncome Tax Assessment Order.\r\nAadhaar card.\r\nElectricity Bill.\r\nRent agreement.', 'approved', 1),
(9, 8, 'Download the ITR preparation software for the relevant assessment year to your PC / Laptop from the \"Downloads\" page.\r\nPrepare the Return using the downloaded Software.\r\nLogin to e-Filing website with User ID, Password, Date of Birth /Date of Incorporation and enter the Captcha code.\r\nGo to e-File and click on \"Upload Return\"\r\nSelect the appropriate ITR, Assessment Year and XML file previously saved in Step 2 (using browse button).\r\nUpload Digital Signature Certificate (DSC), if applicable.\r\nClick on \"Submit\" button.\r\nOn successful submission, ITR-V would be displayed (if DSC is not used). Click on the link and download the ITR-V. ITR-V will also be sent to the registered email. If ITR is uploaded with DSC, the Return Filing process is complete.\r\nOR\r\nThe return is not uploaded with DSC, the ITR-V Form should be printed, signed and submitted to CPC within 120 days from the date of e-Filing. The return will be processed only upon receipt of signed ITR-V. Please check your emails/SMS for reminders on .non-receipt of ITR-V.', 'approved', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(5000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `description`) VALUES
(1, 'Traffic rule', 'Rules like on road challans type information included.'),
(2, 'Education rule', 'Rules come under educational ministry or human and research development.'),
(3, 'Financial rule', 'The rule which deals with the financial areas of the daily life'),
(4, 'Transport rule', 'vehicle permits,vehicle licence or road tax type of rules included in this'),
(5, 'Income tax rule', 'All the income tax related queries come under this.'),
(6, 'Custom rule', 'you csn define number of actions based on specific conditions'),
(7, 'Medical rule', 'All the medical related legal rules.'),
(8, 'Human rights rule', 'legal human rights of citizens of india.'),
(9, 'Transection rule', 'Rules included in all transection mode'),
(11, 'Citizenship rule', 'Legal citizenship rights');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(255) NOT NULL,
  `question` varchar(500) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `category` varchar(25) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `description`, `category`, `status`, `user_id`) VALUES
(3, 'should we can show digital DL to traffic police?', 'If we are asked for driving licence then can we show its digital for to the traffic police officer?', '2', 'approved', 1),
(4, 'what are the citizen rights in india?', 'According to the Indian Constitution, there are six basic Fundamental Rights of Indian Citizens, which are right to equality, right to freedom of religion, cultural and educational rights, right to freedom, right to constitutional remedies and right against exploitation.', '11', 'approved', 13),
(5, 'what type of documents are required during passport process?', 'when we go for passport application process what are the documents which are compulsory required', '11', 'approved', 1),
(6, 'Does digital RC is allowed to show to traffic officer?', 'when a traffic police officer asked for as RC to show, then can we provide him digital form of that id?', '1', 'approved', 13),
(7, 'what are the documents in traffic rule which can be shown digitally if asked ?', 'when we are asked by any traffic police officer about any id proof, what are those which we can show digitally to them?', '1', 'approved', 13),
(8, 'How to file your income tax return?', 'if I wan to file an income tax return what are the steps should I follow?', '5', 'approved', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `dob` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pincode` int(10) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `img` varchar(2000) DEFAULT 'https://rulefriend.tk/images/profile.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `dob`, `gender`, `address`, `city`, `state`, `pincode`, `password`, `img`) VALUES
(1, 'vivek singh', 'vivek@gmail.com', '9', '01/12/1997', 'male', 'addre', 'sagar', 'mp', 470002, '12312345', 'https://rulefriend.tk/user_uploads/vivek@gmail.com_9.jpg'),
(12, 'rakesh', 'rakesh@gmail.com', '8969155802', '16-01-1996', 'Male', 'kirani tola khuthari', 'bhagalpur', 'bihar', NULL, '123456789', 'https://rulefriend.tk/images/profile.jpg'),
(4, 'Siddhant', 'Siddhant@xyz.com', '1234567889', NULL, NULL, NULL, NULL, NULL, NULL, '15156', 'https://rulefriend.tk/images/profile.jpg'),
(5, 'Siddhant', 'Siddhant@pqr.outlook.com', '12345678', NULL, NULL, NULL, NULL, NULL, NULL, 'abc', 'https://rulefriend.tk/images/profile.jpg'),
(7, 's0mesh', 'somehs997@gmail.com', '7354401998', NULL, NULL, NULL, NULL, NULL, NULL, '12312345', 'https://rulefriend.tk/images/profile.jpg'),
(8, 'somesh', 'someshs997@gmail.com', '7354401998', NULL, NULL, NULL, NULL, NULL, NULL, '12312345', 'https://rulefriend.tk/images/profile.jpg'),
(9, 'sdf', 'bunty@gmial.com', '1234565432', NULL, NULL, NULL, NULL, NULL, NULL, '123', 'https://rulefriend.tk/images/profile.jpg'),
(13, 'Somesh ksharwani', 'somesh997@gmail.com', '7354401998', '1997-12-01', 'Male', 'ghar', 'sagar', 'mp', NULL, '1212', 'https://rulefriend.tk/user_uploads/somesh997@gmail.com_7354401998.jpg'),
(14, 'rakesh', 'rakesh.raj374@gmail.com', '8319497117', '1996-01-16', NULL, NULL, NULL, NULL, NULL, '123456789', 'https://rulefriend.tk/images/profile.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
