SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `company`
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `company_name` varchar(64) NOT NULL,
  `abbr_name` varchar(64) DEFAULT NULL,
  `company_type` int(1) NOT NULL COMMENT '1 - Private enterprise, 2 - State-owned enterprises, 3 - Foreign company',
  PRIMARY KEY (`id`),
  KEY `fk_company_user_id` (`user_id`),
  CONSTRAINT `fk_company_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of company
-- ----------------------------

-- ----------------------------
-- Table structure for `company_ins_rate`
-- ----------------------------
DROP TABLE IF EXISTS `company_ins_rate`;
CREATE TABLE `company_ins_rate` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `company_id` int(5) NOT NULL,
  `ins_rate_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_company_ins_rate_company_id` (`company_id`) USING BTREE,
  KEY `fk_company_ins_rate_ins_rate_id` (`ins_rate_id`) USING BTREE,
  CONSTRAINT `fk_company_ins_rate_company_id` FOREIGN KEY (`company_id`) REFERENCES `work` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_company_ins_rate_ins_rate_id` FOREIGN KEY (`ins_rate_id`) REFERENCES `insurance_rate` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of company_ins_rate
-- ----------------------------

-- ----------------------------
-- Table structure for `insurance`
-- ----------------------------
DROP TABLE IF EXISTS `insurance`;
CREATE TABLE `insurance` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `salary_id` int(10) NOT NULL,
  `insurance_type` int(5) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_insurance_amount_insurance_id` (`insurance_type`) USING BTREE,
  KEY `fk_insurance_amount_salary_id` (`salary_id`) USING BTREE,
  CONSTRAINT `fk_insurance_salary_id` FOREIGN KEY (`salary_id`) REFERENCES `salary` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of insurance
-- ----------------------------

-- ----------------------------
-- Table structure for `insurance_rate`
-- ----------------------------
DROP TABLE IF EXISTS `insurance_rate`;
CREATE TABLE `insurance_rate` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `insurance_type` int(1) NOT NULL,
  `target` int(1) NOT NULL COMMENT '1 for Company, 2 for Employee',
  `rate` decimal(6,3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of insurance_rate
-- ----------------------------

-- ----------------------------
-- Table structure for `salary`
-- ----------------------------
DROP TABLE IF EXISTS `salary`;
CREATE TABLE `salary` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `company_id` int(5) NOT NULL,
  `year_month` varchar(6) NOT NULL,
  `basic` decimal(8,2) NOT NULL,
  `allowance` decimal(8,2) DEFAULT NULL,
  `income_tax` decimal(8,2) NOT NULL,
  `non_income_tax` decimal(8,2) DEFAULT NULL,
  `credit_amount` decimal(8,2) NOT NULL,
  `insurance_indicator` varchar(20) NOT NULL,
  `payment_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_salary_company_id` (`company_id`) USING BTREE,
  CONSTRAINT `fk_salary_company_id` FOREIGN KEY (`company_id`) REFERENCES `work` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of salary
-- ----------------------------

-- ----------------------------
-- Table structure for `salary_history`
-- ----------------------------
DROP TABLE IF EXISTS `salary_history`;
CREATE TABLE `salary_history` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `company_id` int(5) NOT NULL,
  `basic` decimal(8,2) NOT NULL,
  `allowance` decimal(8,2) DEFAULT NULL,
  `change_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_salary_history_company_id` (`company_id`) USING BTREE,
  CONSTRAINT `fk_salary_history_company_id` FOREIGN KEY (`company_id`) REFERENCES `work` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of salary_history
-- ----------------------------

-- ----------------------------
-- Table structure for `tax_basic`
-- ----------------------------
DROP TABLE IF EXISTS `tax_basic`;
CREATE TABLE `tax_basic` (
  `sequence` int(2) NOT NULL,
  `basic_amount` int(10) NOT NULL,
  `effective_date` date NOT NULL,
  PRIMARY KEY (`sequence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tax_basic
-- ----------------------------

-- ----------------------------
-- Table structure for `tax_calculation`
-- ----------------------------
DROP TABLE IF EXISTS `tax_calculation`;
CREATE TABLE `tax_calculation` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `sequence` int(2) NOT NULL,
  `min_amount` int(10) NOT NULL,
  `max_amount` int(10) NOT NULL,
  `rate` decimal(6,3) NOT NULL,
  `base_amount` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tax_calculation_sequence` (`sequence`) USING BTREE,
  CONSTRAINT `fk_tax_calculation_sequence` FOREIGN KEY (`sequence`) REFERENCES `tax_basic` (`sequence`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tax_calculation
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for `user_log`
-- ----------------------------
DROP TABLE IF EXISTS `user_log`;
CREATE TABLE `user_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `log_type` int(10) NOT NULL,
  `log_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_log_user_id` (`user_id`) USING BTREE,
  CONSTRAINT `fk_user_log_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_log
-- ----------------------------

-- ----------------------------
-- Table structure for `user_profile`
-- ----------------------------
DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE `user_profile` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `province` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `county` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_profile_user_id` (`user_id`) USING BTREE,
  CONSTRAINT `fk_user_profile_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_profile
-- ----------------------------

-- ----------------------------
-- Table structure for `work`
-- ----------------------------
DROP TABLE IF EXISTS `work`;
CREATE TABLE `work` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `company_id` int(5) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `team_name` varchar(30) NOT NULL,
  `sub_team_name` varchar(30) DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `work_nature` int(1) NOT NULL,
  `is_current` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_work_user_id` (`user_id`) USING BTREE,
  KEY `fk_work_company_id` (`company_id`) USING BTREE,
  CONSTRAINT `fk_work_company_id` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_work_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of work
-- ----------------------------
