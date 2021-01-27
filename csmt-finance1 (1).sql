-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2018 at 11:26 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csmt-finance1`
--

-- --------------------------------------------------------

--
-- Table structure for table `arm_list`
--

CREATE TABLE `arm_list` (
  `id` int(11) NOT NULL,
  `arm_name` varchar(20) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_arm`
--

CREATE TABLE `class_arm` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `arm_id` int(11) NOT NULL,
  `alias` varchar(30) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_arm_session_term`
--

CREATE TABLE `class_arm_session_term` (
  `id` int(11) NOT NULL,
  `class_arm_id` int(11) NOT NULL,
  `session_term_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_list`
--

CREATE TABLE `class_list` (
  `id` int(11) NOT NULL,
  `class_name` varchar(20) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `id` int(11) NOT NULL,
  `expenditure_item_id` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `session_term_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenditure_budget`
--

CREATE TABLE `expenditure_budget` (
  `id` int(11) NOT NULL,
  `expenditure_item_id` int(11) NOT NULL,
  `amount_budgeted` varchar(20) NOT NULL,
  `session_term_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenditure_item`
--

CREATE TABLE `expenditure_item` (
  `id` int(11) NOT NULL,
  `expenditure_item_name` varchar(50) NOT NULL,
  `sub_head` varchar(5) NOT NULL,
  `expenditure_item_category_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenditure_item_categories`
--

CREATE TABLE `expenditure_item_categories` (
  `id` int(11) NOT NULL,
  `expenditure_item_category_name` varchar(50) NOT NULL,
  `head` varchar(5) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenditure_summary`
--

CREATE TABLE `expenditure_summary` (
  `id` int(11) NOT NULL,
  `expenditure_item_id` int(11) NOT NULL,
  `actual_amount` varchar(20) NOT NULL,
  `session_term_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fee_type_id` int(11) NOT NULL,
  `amount_paid` varchar(10) NOT NULL,
  `payment_date` varchar(30) NOT NULL,
  `count_time` int(11) NOT NULL,
  `class_arm_session_term_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_type`
--

CREATE TABLE `fee_type` (
  `id` int(11) NOT NULL,
  `fee_type_name` varchar(30) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `income_item_id` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `session_term_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income_budget`
--

CREATE TABLE `income_budget` (
  `id` int(11) NOT NULL,
  `income_item_id` int(11) NOT NULL,
  `amount_budgeted` varchar(20) NOT NULL,
  `session_term_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income_budget2`
--

CREATE TABLE `income_budget2` (
  `id` int(11) NOT NULL,
  `budgeted_students` varchar(10) NOT NULL,
  `budgeted_amount` varchar(10) NOT NULL,
  `class_arm_session_term_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income_item`
--

CREATE TABLE `income_item` (
  `id` int(11) NOT NULL,
  `income_item_name` varchar(50) NOT NULL,
  `sub_head` varchar(5) NOT NULL,
  `income_item_category_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income_item_categories`
--

CREATE TABLE `income_item_categories` (
  `id` int(11) NOT NULL,
  `income_item_category_name` varchar(50) NOT NULL,
  `head` varchar(5) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income_summary`
--

CREATE TABLE `income_summary` (
  `id` int(11) NOT NULL,
  `income_item_id` int(11) NOT NULL,
  `actual_amount` varchar(20) NOT NULL,
  `session_term_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(200) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `date_added`) VALUES
(1, 'Edit Fee Entry', '0000-00-00 00:00:00'),
(2, 'Edit Expenditure Entry', '0000-00-00 00:00:00'),
(3, 'Edit Income Entry', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `menu_id`, `user_id`, `date_added`) VALUES
(4, 1, 1, '2018-11-05 03:05:00'),
(5, 2, 2, '2018-11-05 03:05:02'),
(6, 3, 1, '2018-11-05 12:31:46'),
(7, 2, 1, '2018-11-05 12:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2018-09-11 00:00:00', '2018-09-17 00:00:00'),
(2, 'User', '2018-09-17 00:00:00', '2018-09-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `session_list`
--

CREATE TABLE `session_list` (
  `id` int(11) NOT NULL,
  `session_name` varchar(20) NOT NULL,
  `session_status` int(11) NOT NULL DEFAULT '0',
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session_term`
--

CREATE TABLE `session_term` (
  `id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `csmt_id` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `categories_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students_sgst`
--

CREATE TABLE `students_sgst` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `sgst_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE `student_class` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_arm_session_term_id` int(11) NOT NULL,
  `session_term_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fee_type_id` int(11) NOT NULL,
  `amount_paid` varchar(10) NOT NULL,
  `amount_expected` varchar(10) NOT NULL,
  `class_arm_session_term_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_group`
--

CREATE TABLE `student_group` (
  `id` int(11) NOT NULL,
  `student_group_name` varchar(50) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_group_fee_type`
--

CREATE TABLE `student_group_fee_type` (
  `id` int(11) NOT NULL,
  `sgst_id` int(11) NOT NULL,
  `fee_type_id` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_group_session_term`
--

CREATE TABLE `student_group_session_term` (
  `id` int(11) NOT NULL,
  `student_group_id` int(11) NOT NULL,
  `session_term_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_group_session_term1`
--

CREATE TABLE `student_group_session_term1` (
  `id` int(11) NOT NULL,
  `student_group_id` int(11) NOT NULL,
  `session_term_id` int(11) NOT NULL,
  `fee_type_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `term_list`
--

CREATE TABLE `term_list` (
  `id` int(11) NOT NULL,
  `term_name` varchar(20) NOT NULL,
  `term_status` int(11) NOT NULL DEFAULT '0',
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arm_list`
--
ALTER TABLE `arm_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_arm`
--
ALTER TABLE `class_arm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_arm_session_term`
--
ALTER TABLE `class_arm_session_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_list`
--
ALTER TABLE `class_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditure_budget`
--
ALTER TABLE `expenditure_budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditure_item`
--
ALTER TABLE `expenditure_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditure_item_categories`
--
ALTER TABLE `expenditure_item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditure_summary`
--
ALTER TABLE `expenditure_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_type`
--
ALTER TABLE `fee_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_budget`
--
ALTER TABLE `income_budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_budget2`
--
ALTER TABLE `income_budget2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_item`
--
ALTER TABLE `income_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_item_categories`
--
ALTER TABLE `income_item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_summary`
--
ALTER TABLE `income_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_list`
--
ALTER TABLE `session_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_term`
--
ALTER TABLE `session_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_sgst`
--
ALTER TABLE `students_sgst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_class`
--
ALTER TABLE `student_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_group`
--
ALTER TABLE `student_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_group_fee_type`
--
ALTER TABLE `student_group_fee_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_group_session_term`
--
ALTER TABLE `student_group_session_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_group_session_term1`
--
ALTER TABLE `student_group_session_term1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_list`
--
ALTER TABLE `term_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arm_list`
--
ALTER TABLE `arm_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_arm`
--
ALTER TABLE `class_arm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_arm_session_term`
--
ALTER TABLE `class_arm_session_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_list`
--
ALTER TABLE `class_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenditure_budget`
--
ALTER TABLE `expenditure_budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenditure_item`
--
ALTER TABLE `expenditure_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenditure_item_categories`
--
ALTER TABLE `expenditure_item_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenditure_summary`
--
ALTER TABLE `expenditure_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_type`
--
ALTER TABLE `fee_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_budget`
--
ALTER TABLE `income_budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_budget2`
--
ALTER TABLE `income_budget2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_item`
--
ALTER TABLE `income_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_item_categories`
--
ALTER TABLE `income_item_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_summary`
--
ALTER TABLE `income_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `session_list`
--
ALTER TABLE `session_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session_term`
--
ALTER TABLE `session_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students_sgst`
--
ALTER TABLE `students_sgst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_class`
--
ALTER TABLE `student_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_group`
--
ALTER TABLE `student_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_group_fee_type`
--
ALTER TABLE `student_group_fee_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_group_session_term`
--
ALTER TABLE `student_group_session_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_group_session_term1`
--
ALTER TABLE `student_group_session_term1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `term_list`
--
ALTER TABLE `term_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
