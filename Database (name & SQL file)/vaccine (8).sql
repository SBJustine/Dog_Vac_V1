-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 03:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` int(11) NOT NULL,
  `admin_pic` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `adminContactNumber` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` enum('admin','useradmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `admin_pic`, `fullname`, `email`, `password`, `adminContactNumber`, `date_added`, `type`) VALUES
(1, '', 'Edu L Orig', 'edu@gmail.com', 'edu123', '09090909099', '0000-00-00 00:00:00', 'admin'),
(2, '', 'Jovelyn Geniston', 'jovelyn@gmail.com', 'jov123', '09635293988', '0000-00-00 00:00:00', 'admin'),
(3, '070e1b5c446658f5be660d96e69b575d.jpg', 'Kim Justine Concha', 'kjconcha@gmail.com', 'kj123', '09635293988', '2024-04-16 16:00:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointmentId` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_fullname` varchar(50) NOT NULL,
  `client_address` varchar(100) NOT NULL,
  `appointmentPetName` varchar(50) NOT NULL,
  `petBreed` varchar(50) NOT NULL,
  `service` enum('Vaccination','Treatment','Deworming','Grooming') NOT NULL,
  `appointmentDate` date NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `appointmentTime` enum('9:00-10:00AM','10:00-11:00AM','11:00-12:00AM','1:00-2:00PM','2:00-3:00PM','3:00-4:00PM','4:00-5:00PM','5:00-6:00PM') NOT NULL,
  `appointmentStatus` enum('Pending','Approved','Rescheduled','Cancelled','Done') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentId`, `client_id`, `client_fullname`, `client_address`, `appointmentPetName`, `petBreed`, `service`, `appointmentDate`, `phone_number`, `appointmentTime`, `appointmentStatus`) VALUES
(5, 12, 'Catherine Ramada', 'Loon, Bohol', 'Catherine Ramada', 'Bulldog', 'Vaccination', '2024-04-17', '09073775218', '9:00-10:00AM', 'Approved'),
(15, 1, 'Jovelyn Geniston', 'Loon', 'Sogi', 'Belgian', 'Treatment', '2024-04-25', '09127903673', '10:00-11:00AM', 'Pending'),
(16, 1, 'Jovelyn Geniston', 'Loon', 'Soka', 'Belgian', 'Treatment', '2024-04-18', '09127903673', '4:00-5:00PM', 'Approved'),
(17, 12, 'Catherine Ramada', 'Loon, Bohol', 'Hero', 'Askal', 'Deworming', '2024-04-23', '09073775218', '1:00-2:00PM', 'Pending'),
(18, 12, 'Catherine Ramada', 'Loon, Bohol', 'Hero', 'Askal', 'Treatment', '2024-04-19', '09073775218', '5:00-6:00PM', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_table`
--

CREATE TABLE `attendance_table` (
  `attendanceID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `employeeName` varchar(50) NOT NULL,
  `numOfDaysPresent` int(11) NOT NULL,
  `numOfDaysAbsent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_table`
--

INSERT INTO `attendance_table` (`attendanceID`, `employeeID`, `employeeName`, `numOfDaysPresent`, `numOfDaysAbsent`) VALUES
(1, 6, 'Ricky', 7, 0),
(2, 1, 'Doc Edu', 10, 3),
(3, 3, 'Doc Van', 8, 0),
(4, 2, 'Gardson Binasbas', 9, 1),
(5, 7, 'kji', 6, 0),
(6, 8, 'Doc Willy Ong', 3, 0),
(7, 9, 'Willy Wonka', 2, 0),
(8, 10, 'Jack Chan', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_users`
--

CREATE TABLE `client_users` (
  `client_id` int(11) NOT NULL,
  `client_fullname` varchar(50) NOT NULL,
  `client_address` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `client_status` enum('Active','In-Active') NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_users`
--

INSERT INTO `client_users` (`client_id`, `client_fullname`, `client_address`, `phone_number`, `client_email`, `password`, `sex`, `client_status`, `date_added`) VALUES
(1, 'Jovelyn Geniston', 'Loon', '09127903673', 'jovelyn@gmail.com', 'jovelyn123', 'Female', 'Active', '2023-10-18 01:38:58'),
(2, 'Kim Concha', 'Tubigon', '09127903673', 'kim@gmail.com', 'kim', 'Male', 'Active', '0000-00-00 00:00:00'),
(3, 'Nicole Palwa', 'Tubigon', '09090909090', 'nicole@gmail.com', '12345', 'Male', 'Active', '2023-11-12 16:00:00'),
(4, 'Ken Suson', 'Manila', '09090909090', 'ken@gmail.com', 'ken123', 'Male', 'Active', '2023-11-12 18:03:00'),
(5, 'Do Do Hee', 'Korea', '09090909090', 'dohee@gmail.com', 'dohee', 'Female', 'Active', '2024-01-04 06:59:00'),
(6, 'nicole palwa', 'tubigon', '09090909090', 'cole@gmail.com', 'cole123', 'Female', 'Active', '2024-01-23 22:48:00'),
(7, 'JK ', 'USA', '09090909090', 'jk@gmail.com', 'jk123', 'Male', 'Active', '2024-01-31 18:44:00'),
(8, 'Gardson Binasbas', 'Tubigon', '09090909090', 'gards@gmail.com', '123', 'Male', 'Active', '2024-02-12 01:36:00'),
(9, 'Jay Ar', 'Siquijor', '09127903673', 'jay@gmail.com', 'jay123', 'Male', 'Active', '2024-03-06 18:29:00'),
(10, '121212', 'Tubigon', '09127903673', 'kim@gmail.com', 'admin', 'Male', 'Active', '2024-03-10 19:25:00'),
(11, 'John Doe', 'USA', '09090909090', 'doe@gmail.com', 'doe123', 'Male', 'Active', '2024-04-09 09:33:00'),
(12, 'Catherine Ramada', 'Loon, Bohol', '09073775218', 'cath@gmail.com', 'cath123', 'Female', 'Active', '2024-04-16 10:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_table`
--

CREATE TABLE `employee_table` (
  `employeeID` int(11) NOT NULL,
  `employee_pic` varchar(50) NOT NULL,
  `employeeName` varchar(50) NOT NULL,
  `employeePosition` enum('Veterinarian','Groomer') NOT NULL,
  `employeeAddress` varchar(50) NOT NULL,
  `employeeAge` int(11) NOT NULL,
  `employeeSex` enum('Male','Female') NOT NULL,
  `employeePhoneNum` int(11) NOT NULL,
  `employeeStatus` enum('Active','Inactive') NOT NULL,
  `employeeAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `employeeLastTimeUpdated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_table`
--

INSERT INTO `employee_table` (`employeeID`, `employee_pic`, `employeeName`, `employeePosition`, `employeeAddress`, `employeeAge`, `employeeSex`, `employeePhoneNum`, `employeeStatus`, `employeeAdded`, `employeeLastTimeUpdated`) VALUES
(1, '', 'Doctor Edu', 'Veterinarian', 'Tagbi', 32, 'Male', 2147483647, 'Active', '2024-04-18 08:51:25', '2024-04-18'),
(2, '', 'Gardson Binasbas', 'Groomer', 'Potohan', 30, 'Male', 2147483647, 'Active', '2024-04-18 16:12:43', '2024-04-18'),
(3, '', 'Doc Van', 'Veterinarian', 'Tagbi', 21, 'Female', 2147483647, 'Active', '2024-04-18 16:12:44', '2024-04-18'),
(6, '', 'Ricky', 'Veterinarian', 'Macaas', 21, 'Male', 2147483647, 'Active', '2024-04-18 16:12:45', '2024-04-18'),
(7, '', 'kji', 'Veterinarian', 'Macaas', 21, 'Male', 0, 'Active', '2024-04-18 16:12:46', '2024-04-18'),
(8, '', 'Doc Willy Ong', 'Veterinarian', 'Tagbilaran', 21, 'Male', 2147483647, 'Active', '2024-04-18 16:12:46', '2024-04-18'),
(9, '', 'Willy Wonka', 'Groomer', 'Tagbilaran, Bohol', 21, 'Male', 2147483647, 'Active', '2024-04-18 16:12:47', '2024-04-18'),
(10, '9f77b2c724ef3a5ac4d4b2a965ebc402.jpg', 'Jack Chan', 'Veterinarian', 'Tagbilaran, Bohol', 50, 'Male', 2147483647, 'Active', '2024-04-15 06:11:31', '2024-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `next_appointment`
--

CREATE TABLE `next_appointment` (
  `nextAppointmentId` int(11) NOT NULL,
  `appointmentId` int(11) NOT NULL,
  `appointmentDate` date NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `service` enum('Vaccination','Treatment','Deworming','Grooming') NOT NULL,
  `nextSchedule` date NOT NULL,
  `employeeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pet_users`
--

CREATE TABLE `pet_users` (
  `pet_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_breed` varchar(50) NOT NULL,
  `pet_age` int(11) NOT NULL,
  `pet_gender` enum('Male','Female') NOT NULL,
  `pet_species` enum('Dog','Cat') NOT NULL,
  `pet_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_users`
--

INSERT INTO `pet_users` (`pet_id`, `client_id`, `pet_name`, `pet_breed`, `pet_age`, `pet_gender`, `pet_species`, `pet_color`) VALUES
(7, 2, 'Stark', 'Belgian', 2, 'Male', 'Dog', 'Black'),
(9, 2, 'Browny', 'Askal', 2, 'Male', 'Dog', 'White'),
(21, 3, 'Cici', 'Askal', 2, 'Male', 'Dog', 'Brown, Black'),
(22, 3, 'Kiki', 'Askal', 2, 'Male', 'Dog', 'White'),
(23, 4, 'Kenny', 'Dalmasian', 2, 'Male', 'Dog', 'White'),
(24, 4, 'Kens', 'Dalmasian', 5, 'Male', 'Dog', 'Black'),
(25, 7, 'JACK', 'Dalmasian', 11, 'Male', 'Dog', 'Brown'),
(27, 1, 'Trix', 'Dobberman', 7, 'Female', 'Dog', 'Black, Brown'),
(32, 1, 'Koro', 'Askal', 5, 'Male', 'Dog', 'Black'),
(33, 1, 'Katara', 'Dobberman', 2, 'Female', 'Dog', 'White'),
(34, 2, 'Kiko', 'Dalmasian', 2, 'Male', 'Dog', 'white, black'),
(35, 1, 'Argus', 'Askal', 2, 'Male', 'Dog', 'white, black'),
(36, 1, 'Katara', 'Askal', 2, 'Female', 'Dog', 'Brown, Black'),
(37, 10, 'sadsa', 'Askal', 50, 'Female', 'Dog', 'White'),
(38, 10, 'dsa', 'Belgian', 5, 'Female', 'Cat', 'White'),
(39, 12, 'Moon', 'Belgian', 5, 'Male', 'Dog', 'White'),
(40, 12, 'Stark', 'Belgian', 2, 'Male', 'Dog', 'Brown, Black');

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `productID` int(11) NOT NULL,
  `product_pic` varchar(50) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` enum('Dog','Cat') NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`productID`, `product_pic`, `productName`, `cost`, `quantity`, `category`, `dateAdded`) VALUES
(1, '', 'Royal Dog Food', 220, 5, 'Dog', '0000-00-00 00:00:00'),
(2, '', 'Toys', 250, 10, 'Cat', '0000-00-00 00:00:00'),
(3, '', 'Pet Food', 150, 50, 'Cat', '2024-03-01 22:53:00'),
(4, '3c272d77b38dd26f96619e52dd032b41.jpg', 'Dog Shampoo', 105, 2, 'Dog', '2024-04-14 07:49:00'),
(5, '5512dca6a53f9d9f4d19d7e8a27dccaa.jpg', 'Pet Soap Bar', 150, 5, 'Dog', '2024-04-14 23:50:00'),
(6, '0fec282d894f30e064e2bc62e6de2d1e.jpg', 'Pet Collar', 150, 55, 'Dog', '2024-04-14 23:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_table`
--

CREATE TABLE `purchase_table` (
  `purchaseID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date_purchased` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quantity_purchased` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_table`
--

INSERT INTO `purchase_table` (`purchaseID`, `productID`, `client_id`, `date_purchased`, `quantity_purchased`, `total_cost`) VALUES
(17, 1, 1, '2024-04-09 16:00:00', 2, 400),
(18, 1, 1, '2024-04-09 16:00:00', 3, 600),
(19, 2, 2, '2024-04-09 16:00:00', 2, 500),
(20, 3, 1, '2024-04-09 16:00:00', 2, 300),
(21, 3, 5, '2024-04-13 16:00:00', 2, 300),
(22, 1, 4, '2024-04-13 16:00:00', 1, 220),
(23, 6, 2, '2024-04-14 16:00:00', 3, 450),
(24, 5, 2, '2024-04-14 16:00:00', 2, 300),
(25, 4, 2, '2024-04-14 16:00:00', 2, 210),
(26, 4, 2, '2024-04-14 16:00:00', 2, 210),
(27, 6, 2, '2024-04-14 16:00:00', 2, 300),
(28, 1, 9, '2024-04-15 16:00:00', 4, 880),
(29, 1, 7, '2024-04-15 16:00:00', 2, 440),
(30, 6, 12, '2024-04-17 16:00:00', 3, 450);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `report_appointment` varchar(50) NOT NULL,
  `report_client` varchar(50) NOT NULL,
  `report_pet` varchar(50) NOT NULL,
  `report_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_table`
--

CREATE TABLE `salary_table` (
  `salaryID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `attendanceID` int(11) NOT NULL,
  `employeeSalary` float NOT NULL,
  `total_salary` int(11) NOT NULL,
  `datePaid` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary_table`
--

INSERT INTO `salary_table` (`salaryID`, `employeeID`, `attendanceID`, `employeeSalary`, `total_salary`, `datePaid`) VALUES
(5, 6, 1, 20, 80, '2024-04-10 01:18:00'),
(6, 1, 2, 20, 140, '2024-04-10 01:37:00'),
(7, 3, 3, 20, 100, '2024-04-10 01:42:00'),
(8, 2, 4, 20, 120, '2024-04-10 01:42:00'),
(9, 6, 1, 20, 80, '2024-04-14 06:13:00'),
(10, 1, 2, 20, 100, '2024-04-15 20:19:00'),
(11, 6, 1, 20, 20, '2024-04-15 20:19:00'),
(12, 2, 4, 20, 120, '2024-04-16 09:37:00'),
(13, 1, 2, 20, 40, '2024-04-18 09:23:00'),
(14, 6, 1, 20, 40, '2024-04-18 10:07:00'),
(15, 3, 3, 50000, 400, '2024-04-18 10:08:00'),
(16, 7, 5, 20, 100, '2024-04-18 10:09:00'),
(17, 10, 8, 20000, 20, '2024-04-18 10:11:00'),
(18, 2, 4, 20, 40, '2024-04-18 10:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_records`
--

CREATE TABLE `vaccination_records` (
  `id` int(11) NOT NULL,
  `dog_name` varchar(255) NOT NULL,
  `vaccination_name` varchar(255) NOT NULL,
  `vaccination_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `website_info`
--

CREATE TABLE `website_info` (
  `id` int(1) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `about` varchar(5000) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_info`
--

INSERT INTO `website_info` (`id`, `site_name`, `about`, `contact`, `email`, `location`) VALUES
(3, 'DOG VACCINE 2023', 'VACCINATION', '09095215152', 'kim05@gmail.com', 'Tubigon, Bohol');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointmentId`);

--
-- Indexes for table `attendance_table`
--
ALTER TABLE `attendance_table`
  ADD PRIMARY KEY (`attendanceID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `client_users`
--
ALTER TABLE `client_users`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `employee_table`
--
ALTER TABLE `employee_table`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `next_appointment`
--
ALTER TABLE `next_appointment`
  ADD PRIMARY KEY (`nextAppointmentId`);

--
-- Indexes for table `pet_users`
--
ALTER TABLE `pet_users`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `purchase_table`
--
ALTER TABLE `purchase_table`
  ADD PRIMARY KEY (`purchaseID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `salary_table`
--
ALTER TABLE `salary_table`
  ADD PRIMARY KEY (`salaryID`),
  ADD KEY `employeeID` (`employeeID`),
  ADD KEY `attendanceID` (`attendanceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccination_records`
--
ALTER TABLE `vaccination_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_info`
--
ALTER TABLE `website_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `attendance_table`
--
ALTER TABLE `attendance_table`
  MODIFY `attendanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client_users`
--
ALTER TABLE `client_users`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_table`
--
ALTER TABLE `employee_table`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `next_appointment`
--
ALTER TABLE `next_appointment`
  MODIFY `nextAppointmentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet_users`
--
ALTER TABLE `pet_users`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_table`
--
ALTER TABLE `purchase_table`
  MODIFY `purchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_table`
--
ALTER TABLE `salary_table`
  MODIFY `salaryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccination_records`
--
ALTER TABLE `vaccination_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website_info`
--
ALTER TABLE `website_info`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_table`
--
ALTER TABLE `attendance_table`
  ADD CONSTRAINT `attendance_table_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee_table` (`employeeID`);

--
-- Constraints for table `pet_users`
--
ALTER TABLE `pet_users`
  ADD CONSTRAINT `pet_users_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_users` (`client_id`);

--
-- Constraints for table `purchase_table`
--
ALTER TABLE `purchase_table`
  ADD CONSTRAINT `purchase_table_ibfk_4` FOREIGN KEY (`productID`) REFERENCES `product_table` (`productID`),
  ADD CONSTRAINT `purchase_table_ibfk_5` FOREIGN KEY (`client_id`) REFERENCES `client_users` (`client_id`);

--
-- Constraints for table `salary_table`
--
ALTER TABLE `salary_table`
  ADD CONSTRAINT `salary_table_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee_table` (`employeeID`),
  ADD CONSTRAINT `salary_table_ibfk_2` FOREIGN KEY (`attendanceID`) REFERENCES `attendance_table` (`attendanceID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
