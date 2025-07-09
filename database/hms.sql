-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2025 at 03:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'allah786', '02-07-2025 04:23:20 PM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(1, 'ENT', 1, 1, 500, '2024-05-30', '9:15 AM', '2024-05-15 03:42:11', 1, 1, NULL),
(2, 'Endocrinologists', 2, 2, 800, '2024-05-31', '2:45 PM', '2024-05-16 09:08:54', 1, 1, NULL),
(3, 'General Surgery', 8, 4, 5000, '2-3-2025', '2.00', '2025-06-19 08:35:43', 1, 1, NULL),
(4, 'General Surgery', 0, 1, 800, '03-Oct-2025', '07:00 pm', '2025-07-09 00:43:45', 1, 1, NULL),
(5, 'ENT', 1, 1, 500, '2000-10-02', '14:50', '2025-07-09 00:49:16', 1, 1, NULL),
(6, 'Pediatrics', 4, 6, 700, '2025-07-09', '19:00', '2025-07-09 00:52:38', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_requests`
--

CREATE TABLE `appointment_requests` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reviewed` tinyint(1) DEFAULT 0,
  `replied_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_requests`
--

INSERT INTO `appointment_requests` (`id`, `name`, `number`, `email`, `appointment_date`, `created_at`, `reviewed`, `replied_at`) VALUES
(1, 'Jescie Adams', '11834021488', 'zizaxynad@mail.com', '2025-11-17', '2025-07-06 22:30:42', 0, NULL),
(2, 'Ciaran Mcfarland', '42633444841', 'tuqawyf@mail.com', '2025-07-07', '2025-07-06 22:31:17', 0, NULL),
(3, 'Casey Kane', '39285695347', 'daniflay@gmail.com', '2025-07-07', '2025-07-06 22:33:34', 0, NULL),
(4, 'Mehru nesa', '99267747409', 'mehrunesa@mail.com', '2025-07-07', '2025-07-06 22:37:11', 0, NULL),
(5, 'Steel Beck', '56675675656217', 'mycyrehyl@mail.com', '2025-07-08', '2025-07-09 00:50:48', 0, NULL),
(6, 'Boris Contreras', '894798548646', 'fagis63524@iamtile.com', '2025-07-09', '2025-07-09 11:12:32', 1, '2025-07-09 16:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'karachi', 'active', '2025-07-05 12:17:59', '2025-07-05 15:25:02'),
(2, 'Lahore', 'inactive', '2025-07-05 12:17:59', '2025-07-05 16:02:52'),
(4, 'Islamabad', 'inactive', '2025-07-05 13:22:10', '2025-07-05 13:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_settings`
--

INSERT INTO `company_settings` (`id`, `company_name`, `contact_person`, `address`, `country`, `city`, `state`, `postal_code`, `email`, `phone`, `mobile`, `fax`, `website`) VALUES
(1, 'CARE Hospital', 'Admin', 'nazimabad', 'Pakistan', 'Karachi', 'Sindh', '74600', 'admin@example.com', '021-0000000', '0300-0000000', '+1 (917) 958-5856', 'https://www.carehospital.com');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'ENT', 'Anuj kumar', 'A 123 XYZ Apartment Raj Nagar Ext Ghaziabad', '500', 142536250, 'anujk123@test.com', 'f925916e2754e5e03f75dd58a5733251', '2024-04-10 18:16:52', '2024-05-14 09:26:17'),
(2, 'Endocrinologists', 'Charu Dua', 'X 1212 ABC Apartment Laxmi Nagar New Delhi ', '800', 1231231230, 'charudua12@test.com', 'f925916e2754e5e03f75dd58a5733251', '2024-04-11 01:06:41', '2024-05-14 09:26:28'),
(4, 'Pediatrics', 'Priyanka Sinha', 'A 123 Xyz Aparmtnent Ghaziabad', '700', 74561235, 'p12@t.com', 'f925916e2754e5e03f75dd58a5733251', '2024-05-16 09:12:23', NULL),
(5, 'Orthopedics', 'Vipin Tayagi', 'Yasho Hospital New Delhi', '1200', 95214563210, 'vpint123@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-05-16 09:13:11', NULL),
(6, 'Internal Medicine', 'Dr Romil', 'Max Hospital Vaishali  GZB', '1500', 8563214751, 'drromil12@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-05-16 09:14:11', NULL),
(7, 'Obstetrics and Gynecology', 'Bhavya rathore', 'Shop 12 Indira Puram Ghaziabad', '800', 745621330, 'bhawya12@tt.com', 'f925916e2754e5e03f75dd58a5733251', '2024-05-16 09:15:18', NULL),
(8, 'General Surgery', 'Muhammad Toufique ', 'North Nazimabad ', '5000', 594949475, 'muhammadtoufique648@gmail.com', '75b43eac8d215582f6bcab4532eb854e', '2025-06-19 08:35:03', NULL),
(9, 'Dermatologists', 'Ab Ghani', 'North Karachi', '5000', 62626244, 'ghani@gmail.com', '75b43eac8d215582f6bcab4532eb854e', '2025-06-19 11:16:04', NULL),
(10, 'Ophthalmology', 'Hamish', 'Harum vitae qui volu', '400', 12788281191, 'tinefuxyru@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2025-07-04 15:22:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2024-05-16 05:19:33', NULL, 1),
(2, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2024-05-16 09:01:03', '16-05-2024 02:37:32 PM', 1),
(3, NULL, 'muhammadtoufique648@gmail.com', 0x3a3a3100000000000000000000000000, '2025-06-19 11:22:17', NULL, 0),
(4, 8, 'muhammadtoufique648@gmail.com', 0x3a3a3100000000000000000000000000, '2025-06-19 11:22:26', '19-06-2025 04:52:48 PM', 1),
(5, 9, 'ghani@gmail.com', 0x3a3a3100000000000000000000000000, '2025-06-19 11:23:05', '19-06-2025 04:55:42 PM', 1),
(6, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2025-06-19 11:26:01', NULL, 1),
(7, 9, 'ghani@gmail.com', 0x3a3a3100000000000000000000000000, '2025-06-19 11:31:17', '19-06-2025 05:01:54 PM', 1),
(8, 9, 'ghani@gmail.com', 0x3a3a3100000000000000000000000000, '2025-06-19 11:34:44', '19-06-2025 05:06:16 PM', 1),
(9, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2025-06-22 20:11:05', NULL, 1),
(10, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2025-07-02 08:22:16', '02-07-2025 01:53:20 PM', 1),
(11, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2025-07-07 23:02:46', NULL, 1),
(12, 1, 'anujk123@test.com', 0x3a3a3100000000000000000000000000, '2025-07-08 20:20:22', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Orthopedics', '2024-04-09 18:09:46', '2024-05-14 09:26:47'),
(2, 'Internal Medicine', '2024-04-09 18:09:46', '2024-05-14 09:26:56'),
(3, 'Obstetrics and Gynecology', '2024-04-09 18:09:46', '2024-05-14 09:26:56'),
(4, 'Dermatology', '2024-04-09 18:09:46', '2024-05-14 09:26:56'),
(5, 'Pediatrics', '2024-04-09 18:09:46', '2024-05-14 09:26:56'),
(6, 'Radiology', '2024-04-09 18:09:46', '2024-05-14 09:26:56'),
(7, 'General Surgery', '2024-04-09 18:09:46', '2024-05-14 09:26:56'),
(8, 'Ophthalmology', '2024-04-09 18:09:46', '2024-05-14 09:26:56'),
(9, 'Anesthesia', '2024-04-09 18:09:46', '2024-05-14 09:26:56'),
(10, 'Pathology', '2024-04-09 18:09:46', '2024-05-14 09:26:56'),
(11, 'ENT', '2024-04-09 18:09:46', '2024-05-14 09:26:56'),
(12, 'Dental Care', '2024-04-09 18:09:46', '2024-05-14 09:26:56'),
(13, 'Dermatologists', '2024-04-09 18:09:46', '2024-05-14 09:26:56'),
(14, 'Endocrinologists', '2024-04-09 18:09:46', '2024-05-14 09:26:56'),
(15, 'Neurologists', '2024-04-09 18:09:46', '2024-05-14 09:26:56'),
(35, 'Ophthalmology', '2025-07-04 19:41:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `subcategory` varchar(100) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `category`, `subcategory`, `tags`, `status`, `created_at`) VALUES
(9, 'AI in Healthcare: Transforming Diagnosis with Technology | CARE Hospital', 'Artificial Intelligence (AI) is revolutionizing the way diseases are diagnosed. From analyzing medical images to predicting potential health risks, AI-powered systems are helping doctors deliver faster and more accurate diagnoses than ever before.\r\n\r\nAt CARE Hospital, we are exploring AI solutions that integrate seamlessly with our Health Management System (HMS). These tools can assist in identifying early signs of diseases such as cancer, diabetes, and heart conditions — sometimes even before symptoms appear.\r\n\r\nThis breakthrough in predictive diagnostics means improved patient outcomes, reduced human error, and more personalized treatment plans. Our goal is to make healthcare smarter, safer, and more proactive. Discover how AI is helping doctors detect diseases earlier and more accurately. Learn how CARE Hospital is integrating AI into diagnostics to improve patient care.', 'Medical Technology', 'Artificial Intelligence', '#AIinHealthcare, #MedicalInnovation, #EarlyDiagnosis, #CAREHospital, #HealthTech', 'active', '2025-07-09 13:32:46'),
(10, '10 Medical Symptoms You Should Never Ignore | CARE Hospital', 'Chest pain, shortness of breath, or confusion? Learn 10 urgent symptoms that need immediate medical attention. Stay informed with CARE Hospital’s emergency checklist.\r\nNot every symptom should be ignored. Knowing when to seek immediate medical attention can be the difference between life and death.\r\n\r\nHere are 10 warning signs you should never ignore:\r\n\r\n1. Sudden chest pain or pressure\r\n\r\n2. Difficulty breathing\r\n\r\n3. Uncontrolled bleeding\r\n\r\n4. High fever (especially in children or the elderly)\r\n\r\n5. Sudden weakness or numbness (especially on one side)\r\n\r\n6. Seizures\r\n\r\n7. Severe abdominal pain\r\n\r\n8. Loss of consciousness\r\n\r\n9. Confusion or disorientation\r\n\r\n10. Persistent vomiting or dehydration\r\n\r\nIf you or a loved one experiences any of these symptoms, head to the nearest emergency room or call CARE Hospital immediately. Our Emergency Care Unit is open 24/7 with trained staff and advanced life-saving equipment.\r\n\r\nYour life matters — don’t delay when symptoms are severe.', 'Health Awareness', 'Emergency Care', '#EmergencyCare, #CAREHospital, #HealthAwareness, #KnowTheSigns, #PatientSafety', 'active', '2025-07-09 13:36:04'),
(11, 'Robotic Surgery at CARE Hospital | Safer, Smarter, and Less Invasive', 'CARE Hospital introduces robotic-assisted surgery for faster recovery and better precision. Discover how cutting-edge surgical technology is improving patient outcomes.\r\nRobotic-assisted surgery is transforming the way operations are performed — offering unmatched precision, reduced recovery time, and improved patient outcomes.\r\n\r\nAt CARE Hospital, we’ve introduced robotic surgical systems to assist our surgeons in performing complex procedures with enhanced control and minimal invasiveness. These systems allow surgeons to operate through tiny incisions using robotic arms, high-definition 3D cameras, and advanced instruments that mimic human movement — but with greater accuracy and stability.\r\n\r\nRobotic surgery is especially beneficial in:\r\n\r\nUrological surgeries (e.g., prostatectomy)\r\n\r\nGynecological procedures\r\n\r\nCardiac and thoracic operations\r\n\r\nGastrointestinal and bariatric surgeries\r\n\r\nPatients experience:\r\n\r\nLess blood loss\r\n\r\nReduced pain\r\n\r\nShorter hospital stays\r\n\r\nFaster return to normal activities\r\n\r\nThis is not science fiction — it\'s the future of surgery, and it\'s happening now at CARE Hospital.', 'Medical Innovation', 'Advanced Surgery', '#RoboticSurgery, #MedicalInnovation, #CAREHospital, #AdvancedSurgery, #MinimalInvasive', 'active', '2025-07-09 13:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_images`
--

INSERT INTO `post_images` (`id`, `post_id`, `image_name`) VALUES
(10, 9, 'news-03.jpg'),
(11, 10, 'news-02.jpg'),
(12, 11, 'news-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(1, 'Anuj kumar', 'anujk30@test.com', 1425362514, 'This is for testing purposes.   This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.', '2024-04-20 16:52:03', NULL, '2024-05-14 09:27:15', NULL),
(2, 'Anuj kumar', 'ak@gmail.com', 1111122233, 'This is for testing', '2024-04-23 13:13:41', 'Contact the patient', '2024-04-27 13:13:57', 1),
(3, 'Blaine Bowers', 'johndoe12@test.com', 97553412, 'test msg', '2025-07-02 08:27:10', 'testing', '2025-07-02 08:28:15', 1),
(4, 'Hasorn', 'kakym@mail.com', 6587465876, 'Non ut ipsam sunt si', '2025-07-06 22:12:16', NULL, NULL, NULL),
(5, '', '', 0, '', '2025-07-06 22:30:42', NULL, NULL, NULL),
(6, '', '', 0, '', '2025-07-06 22:31:17', NULL, NULL, NULL),
(7, '', '', 0, '', '2025-07-06 22:33:34', NULL, NULL, NULL),
(8, 'Blaine Bowers', 'johndoe12@test.com', 6587465876, 'testing message', '2025-07-06 22:36:13', NULL, NULL, NULL),
(9, '', '', 0, '', '2025-07-06 22:37:11', NULL, NULL, NULL),
(10, '', '', 0, '', '2025-07-09 00:50:48', NULL, NULL, NULL),
(11, '', '', 0, '', '2025-07-09 11:12:32', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(1, 2, '80/120', '110', '85', '97', 'Dolo,\r\nLevocit 5mg', '2024-05-16 09:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp(),
  `OpenningTime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `OpenningTime`) VALUES
(1, 'aboutus', 'About Us', '<ul style=\"padding: 0px; margin-right: 0px; margin-bottom: 1.313em; margin-left: 1.655em;\" times=\"\" new=\"\" roman\";=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" center;=\"\" background-color:=\"\" rgb(255,=\"\" 246,=\"\" 246);\"=\"\"><li style=\"text-align: left;\"><font color=\"#000000\">The Hospital Management System (HMS) is designed for Any Hospital to replace their existing manual, paper based system. The new system is to control the following information; patient information, room availability, staff and operating room schedules, and patient invoices. These services are to be provided in an efficient, cost effective manner, with the goal of reducing the time and resources currently required for such tasks.</font></li><li style=\"text-align: left;\"><font color=\"#000000\">A significant part of the operation of any hospital involves the acquisition, management and timely retrieval of great volumes of information. This information typically involves; patient personal information and medical history, staff information, room and ward scheduling, staff scheduling, operating theater scheduling and various facilities waiting lists. All of this information must be managed in an efficient and cost wise fashion so that an institution\'s resources may be effectively utilized HMS will automate the management of the hospital making it more efficient and error free. It aims at standardizing data, consolidating data ensuring data integrity and reducing inconsistencies.&nbsp;</font></li></ul>', NULL, NULL, '2020-05-20 07:21:52', NULL),
(2, 'contactus', 'Contact Details', 'D-204, Hole Town South West, Delhi-110096,India', 'info@gmail.com', 1122334455, '2020-05-20 07:24:07', '9 am To 8 Pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(1, 1, 'Rahul Singyh', 452463210, 'rahul12@gmail.com', 'male', 'NA', 32, 'Fever, Cold', '2024-05-16 05:23:35', NULL),
(2, 1, 'Amit', 4545454545, 'amitk@gmail.com', 'male', 'NA', 45, 'Fever', '2024-05-16 09:01:26', NULL),
(3, 9, 'fatima', 54156454, 'muhammadtoufique648@gmail.com', 'female', 'Gulshan e Iqbal Near Millennium Mall, Karachi', 22, 'ijw9ijd', '2025-06-19 11:35:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2024-05-15 03:41:48', NULL, 1),
(2, 2, 'amitk@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-16 09:08:06', '16-05-2024 02:41:06 PM', 1),
(3, 3, 'muhammadtoufique648@gmail.com', 0x3a3a3100000000000000000000000000, '2025-06-16 11:32:23', NULL, 1),
(4, 3, 'muhammadtoufique648@gmail.com', 0x3a3a3100000000000000000000000000, '2025-06-16 11:33:28', '16-06-2025 05:03:39 PM', 1),
(5, 4, 'meer84694@gmail.com', 0x3a3a3100000000000000000000000000, '2025-06-19 08:33:10', NULL, 1),
(6, 3, 'muhammadtoufique648@gmail.com', 0x3a3a3100000000000000000000000000, '2025-06-19 11:18:11', NULL, 1),
(7, NULL, 'jhondoe12@test.com', 0x3a3a3100000000000000000000000000, '2025-06-28 19:30:41', NULL, 0),
(8, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2025-06-28 19:31:33', NULL, 1),
(9, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2025-07-02 08:23:50', NULL, 1),
(10, NULL, 'jhondoe12@test.com', 0x3a3a3100000000000000000000000000, '2025-07-07 22:59:45', NULL, 0),
(11, NULL, 'jhondoe12@test.com', 0x3a3a3100000000000000000000000000, '2025-07-07 22:59:56', NULL, 0),
(12, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2025-07-07 23:01:31', NULL, 1),
(13, 6, 'fatima12@mail.com', 0x3a3a3100000000000000000000000000, '2025-07-08 08:45:55', NULL, 1),
(14, 6, 'fatima12@mail.com', 0x3a3a3100000000000000000000000000, '2025-07-08 09:03:09', NULL, 1),
(15, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2025-07-08 09:51:05', NULL, 1),
(16, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2025-07-08 20:36:43', NULL, 1),
(17, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2025-07-08 20:40:05', NULL, 1),
(18, NULL, 'fatima12@mail.com', 0x3a3a3100000000000000000000000000, '2025-07-09 00:34:37', NULL, 0),
(19, 6, 'fatima12@mail.com', 0x3a3a3100000000000000000000000000, '2025-07-09 00:34:53', NULL, 1),
(20, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2025-07-09 00:42:46', NULL, 1),
(21, 6, 'fatima12@mail.com', 0x3a3a3100000000000000000000000000, '2025-07-09 00:52:12', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(1, 'John Doe', 'A 123 ABC Apartment GZB 201017', 'Ghaziabad', 'male', 'johndoe12@test.com', 'f925916e2754e5e03f75dd58a5733251', '2024-04-20 12:13:56', '2024-05-14 09:28:15'),
(2, 'Amit kumar', 'new Delhi india', 'New Delhi', 'male', 'amitk@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-04-21 13:15:32', '2024-05-14 09:28:23'),
(3, 'Muhammad Toufique', 'Gulshan e Iqbal Near Millennium Mall, Karachi', 'Karachi', 'male', 'muhammadtoufique648@gmail.com', '75b43eac8d215582f6bcab4532eb854e', '2025-06-16 11:32:02', NULL),
(4, 'Muhammad Hassan', 'North Karachi ', 'Gulsahn', 'male', 'meer84694@gmail.com', '75b43eac8d215582f6bcab4532eb854e', '2025-06-19 08:32:10', NULL),
(6, 'Fatima', 'North nazimabad', 'Karachi', 'female', 'fatima12@mail.com', '50ab8d5507e3d91a92fcc7b178b34834', '2025-07-08 08:31:54', NULL),
(7, '', '', '', '', '', '50ab8d5507e3d91a92fcc7b178b34834', '2025-07-08 08:36:36', NULL),
(8, '', '', '', '', 'fatima12@mail.com', '50ab8d5507e3d91a92fcc7b178b34834', '2025-07-08 08:36:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_requests`
--
ALTER TABLE `appointment_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appointment_requests`
--
ALTER TABLE `appointment_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_images`
--
ALTER TABLE `post_images`
  ADD CONSTRAINT `post_images_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
