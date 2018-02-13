-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 06:01 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `designers`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_content` text NOT NULL,
  `blog_thumb` text NOT NULL,
  `blog_image` text NOT NULL,
  `blog_created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `blog_updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_title`, `blog_content`, `blog_thumb`, `blog_image`, `blog_created_at`, `blog_updated_at`) VALUES
(1, 'Rana g g', '<p>some content over here again</p>', '26943260_1859427500790063_1919949985_n.jpg', '26941048_1859427100790103_1972758844_n1.jpg', '2018-02-21 09:06:00', '2018-02-12 23:21:16'),
(3, 'Rana g g', '<p>some content over here again</p>', '26943260_1859427500790063_1919949985_n.jpg', '26941048_1859427100790103_1972758844_n1.jpg', '2018-02-21 09:06:00', '2018-02-12 23:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_email` varchar(222) NOT NULL,
  `comment_name` varchar(222) NOT NULL,
  `blog` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_to` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_status` int(11) NOT NULL,
  `comment_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_email`, `comment_name`, `blog`, `comment_by`, `comment_to`, `comment`, `comment_status`, `comment_created_at`, `comment_updated_at`) VALUES
(1, '', '', 3, 1, 0, 'some of the comment', 1, '2018-02-13 00:38:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mailbox`
--

CREATE TABLE `mailbox` (
  `mailbox_id` int(11) NOT NULL,
  `send_from` int(200) NOT NULL,
  `send_to` int(200) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `read_status` int(11) NOT NULL,
  `fileone` text NOT NULL,
  `filetwo` text NOT NULL,
  `msg_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailbox`
--

INSERT INTO `mailbox` (`mailbox_id`, `send_from`, `send_to`, `title`, `message`, `read_status`, `fileone`, `filetwo`, `msg_created_at`, `updated_at`) VALUES
(11, 1, 0, 'dasdkn', '<p>knknjkj</p>', 0, '', '', '2018-02-10 18:11:48', '0000-00-00 00:00:00'),
(12, 1, 3, 'asdasd', '<p>asdasd</p>', 1, '27016501_1859429900789823_2070928390_o1.jpg', '', '2018-02-10 23:39:06', '2018-02-11 14:21:57'),
(13, 1, 3, 'asdasd', '<p>asdasd</p>', 1, '27016501_1859429900789823_2070928390_o2.jpg', '', '2018-02-10 23:42:53', '2018-02-11 14:22:07'),
(14, 1, 1, 'asdasd', '<p>asads</p>', 1, '', '', '2018-02-10 23:43:11', '2018-02-11 13:52:40'),
(15, 1, 1, 'asdasd', '<p>asads</p>', 1, '', '', '2018-02-10 14:22:32', '2018-02-11 14:21:51'),
(16, 1, 1, 'asdasd', '<p>asads</p>', 1, '', '', '2018-02-10 23:51:32', '2018-02-11 13:55:11'),
(17, 1, 1, 'check message', '<p>check if message is getting sended or not cause this is an nakli massgage</p>', 1, '27016501_1859429900789823_2070928390_o4.jpg', '', '2018-02-11 15:43:20', '2018-02-11 15:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(1, 'Test', 'test', 'Hello World !!'),
(2, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', 'Lorem Ipsum is simply dummy text.'),
(3, 'title one', 'title-one', 'texxt here'),
(4, 'Test', 'test', 'asfdsdf');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `plan_order_id` int(111) NOT NULL,
  `order_title` varchar(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `designer_id` int(200) NOT NULL,
  `user_notes` text NOT NULL,
  `admin_notes` text NOT NULL,
  `designer_notes` text NOT NULL,
  `notes_admin_to_designer` text NOT NULL,
  `admin_attachment` varchar(200) NOT NULL,
  `user_attachment` varchar(200) NOT NULL,
  `designer_attachment` text NOT NULL,
  `user_status` int(10) NOT NULL,
  `admin_status` int(10) NOT NULL,
  `admin_status_to_designer` int(10) NOT NULL,
  `designer_status` int(10) NOT NULL,
  `field_1` text NOT NULL,
  `field_2` text NOT NULL,
  `field_3` text NOT NULL,
  `field_4` text NOT NULL,
  `field_5` text NOT NULL,
  `field_6` text NOT NULL,
  `field_7` text NOT NULL,
  `field_8` text NOT NULL,
  `field_9` text NOT NULL,
  `field_10` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `plan_id`, `plan_order_id`, `order_title`, `user_id`, `designer_id`, `user_notes`, `admin_notes`, `designer_notes`, `notes_admin_to_designer`, `admin_attachment`, `user_attachment`, `designer_attachment`, `user_status`, `admin_status`, `admin_status_to_designer`, `designer_status`, `field_1`, `field_2`, `field_3`, `field_4`, `field_5`, `field_6`, `field_7`, `field_8`, `field_9`, `field_10`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'sdfkjnkj', 1, 3, 'user nooottooooss', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 'acfadvdsv', 'svsdvsdv', 'kjnkjn', '', 2, 2, 0, 1, 'kjnkjnk', 'jnkjn', '', '', '', '', '', '', '', '', '2018-01-28 17:03:05', '2018-02-06 22:32:49'),
(2, 3, 4, 'Rana g', 1, 3, 'sdvskjnsdvgsdg  s dgfsdg ', '', '', '0', '', 'attechment', '', 0, 0, 0, 0, 'text one', 'text two', '', '', '', '', '', '', '', '', '2018-01-28 17:04:31', '2018-02-06 22:32:44'),
(3, 3, 22, 'sfsdf', 2, 3, 'user Notoos', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', '0', 'asfsafsdf', 'kjsdkvjnkd', '', 1, 2, 0, 2, 'kjkjnkjk', 'kjkjhkjkjkj', '', '', '', '', '', '', '', '', '2018-01-29 02:41:34', '2018-02-06 22:32:52'),
(4, 3, 5, 'plan #5 buying', 1, 3, 'plan #5 buying', 'admin notesss', 'desi notes', 'notes for des', 'admin attach', 'plan #5 buying', 'asfdsaf', 0, 1, 1, 0, 'plan #5 buying', 'plan #5 buying', '', '', '', '', '', '', '', '', '2018-01-29 23:18:32', '2018-02-06 22:54:55'),
(5, 2, 10, 'daslkdnl', 1, 3, 'lknlkn', 'Admin Notes', 'Designer Notes', 'Notes For Designer\r\n', '', '', '', 0, 0, 0, 0, 'sadlfknln', 'lnlknl', '', '', '', '', '', '', '', '', '2018-01-31 00:02:34', '2018-02-06 22:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(122) UNSIGNED NOT NULL,
  `user_type` varchar(250) DEFAULT NULL,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `user_type`, `data`) VALUES
(1, 'Member', '{\"users\":\"users\"}'),
(2, 'admin', '{\"users\":{\"own_create\":\"1\",\"own_read\":\"1\",\"own_update\":\"1\",\"own_delete\":\"1\",\"all_create\":\"1\",\"all_read\":\"1\",\"all_update\":\"1\",\"all_delete\":\"1\"}}'),
(3, 'Designer', '{\"users\":\"users\"}');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `sub_title` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `notes` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `title`, `sub_title`, `price`, `description`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Plan one', 'subtitle of plan one', '35', '<ul class=\"pricing-content list-unstyled\">\r\n											<li>\r\n												<i class=\"fa fa-tags\"></i> At vero eos\r\n											</li>\r\n											<li>\r\n												<i class=\"fa fa-asterisk\"></i> No Support\r\n											</li>\r\n											<li>\r\n												<i class=\"fa fa-heart\"></i> Fusce condimentum\r\n											</li>\r\n											<li>\r\n												<i class=\"fa fa-star\"></i> Ut non libero\r\n											</li>\r\n											<li>\r\n												<i class=\"fa fa-shopping-cart\"></i> Consecte adiping elit\r\n											</li>\r\n										</ul>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor.', '2018-01-28 15:30:54', '2018-02-07 02:39:53'),
(3, 'Plan three', 'subtitle of plan three', '40', '<ul class=\"pricing-content list-unstyled\">\r\n											<li>\r\n												<i class=\"fa fa-tags\"></i> At vero eos\r\n											</li>\r\n											<li>\r\n												<i class=\"fa fa-asterisk\"></i> No Support\r\n											</li>\r\n											<li>\r\n												<i class=\"fa fa-heart\"></i> Fusce condimentum\r\n											</li>\r\n											<li>\r\n												<i class=\"fa fa-star\"></i> Ut non libero\r\n											</li>\r\n											<li>\r\n												<i class=\"fa fa-shopping-cart\"></i> Consecte adiping elit\r\n											</li>\r\n										</ul>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor.', '2018-01-28 15:31:07', '2018-01-28 21:39:43'),
(4, 'Plan four', 'subtitle of plan four', '50', '<ul class=\"pricing-content list-unstyled\">\r\n											<li>\r\n												<i class=\"fa fa-tags\"></i> At vero eos\r\n											</li>\r\n											<li>\r\n												<i class=\"fa fa-asterisk\"></i> No Support\r\n											</li>\r\n											<li>\r\n												<i class=\"fa fa-heart\"></i> Fusce condimentum\r\n											</li>\r\n											<li>\r\n												<i class=\"fa fa-star\"></i> Ut non libero\r\n											</li>\r\n											<li>\r\n												<i class=\"fa fa-shopping-cart\"></i> Consecte adiping elit\r\n											</li>\r\n										</ul>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor.', '2018-01-28 15:31:12', '2018-01-28 21:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `plan_orders`
--

CREATE TABLE `plan_orders` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_orders`
--

INSERT INTO `plan_orders` (`id`, `plan_id`, `user_id`) VALUES
(3, 3, 1),
(4, 3, 1),
(5, 3, 1),
(10, 2, 1),
(22, 3, 2),
(23, 2, 1),
(24, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(122) UNSIGNED NOT NULL,
  `keys` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `keys`, `value`) VALUES
(1, 'website', 'User Login and Management'),
(2, 'logo', 'logo_1517338288.png'),
(3, 'favicon', 'logo_1517338288.png'),
(4, 'SMTP_EMAIL', ''),
(5, 'HOST', ''),
(6, 'PORT', ''),
(7, 'SMTP_SECURE', ''),
(8, 'SMTP_PASSWORD', ''),
(9, 'mail_setting', 'simple_mail'),
(10, 'company_name', 'Company Name'),
(11, 'crud_list', 'users,User'),
(12, 'EMAIL', 'rm.salman.dev@gmail.com'),
(13, 'UserModules', 'yes'),
(14, 'register_allowed', '1'),
(15, 'email_invitation', '1'),
(16, 'admin_approval', '0'),
(17, 'user_type', '[\"Member\"]');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(121) UNSIGNED NOT NULL,
  `module` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `template_name` varchar(255) DEFAULT NULL,
  `html` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `module`, `code`, `template_name`, `html`) VALUES
(1, 'forgot_pass', 'forgot_password', 'Forgot password', '<html xmlns=\"http://www.w3.org/1999/xhtml\"><head>\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n  <style type=\"text/css\" rel=\"stylesheet\" media=\"all\">\r\n    /* Base ------------------------------ */\r\n    *:not(br):not(tr):not(html) {\r\n      font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\r\n      -webkit-box-sizing: border-box;\r\n      box-sizing: border-box;\r\n    }\r\n    body {\r\n      \r\n    }\r\n    a {\r\n      color: #3869D4;\r\n    }\r\n\r\n\r\n    /* Masthead ----------------------- */\r\n    .email-masthead {\r\n      padding: 25px 0;\r\n      text-align: center;\r\n    }\r\n    .email-masthead_logo {\r\n      max-width: 400px;\r\n      border: 0;\r\n    }\r\n    .email-footer {\r\n      width: 570px;\r\n      margin: 0 auto;\r\n      padding: 0;\r\n      text-align: center;\r\n    }\r\n    .email-footer p {\r\n      color: #AEAEAE;\r\n    }\r\n  \r\n    .content-cell {\r\n      padding: 35px;\r\n    }\r\n    .align-right {\r\n      text-align: right;\r\n    }\r\n\r\n    /* Type ------------------------------ */\r\n    h1 {\r\n      margin-top: 0;\r\n      color: #2F3133;\r\n      font-size: 19px;\r\n      font-weight: bold;\r\n      text-align: left;\r\n    }\r\n    h2 {\r\n      margin-top: 0;\r\n      color: #2F3133;\r\n      font-size: 16px;\r\n      font-weight: bold;\r\n      text-align: left;\r\n    }\r\n    h3 {\r\n      margin-top: 0;\r\n      color: #2F3133;\r\n      font-size: 14px;\r\n      font-weight: bold;\r\n      text-align: left;\r\n    }\r\n    p {\r\n      margin-top: 0;\r\n      color: #74787E;\r\n      font-size: 16px;\r\n      line-height: 1.5em;\r\n      text-align: left;\r\n    }\r\n    p.sub {\r\n      font-size: 12px;\r\n    }\r\n    p.center {\r\n      text-align: center;\r\n    }\r\n\r\n    /* Buttons ------------------------------ */\r\n    .button {\r\n      display: inline-block;\r\n      width: 200px;\r\n      background-color: #3869D4;\r\n      border-radius: 3px;\r\n      color: #ffffff;\r\n      font-size: 15px;\r\n      line-height: 45px;\r\n      text-align: center;\r\n      text-decoration: none;\r\n      -webkit-text-size-adjust: none;\r\n      mso-hide: all;\r\n    }\r\n    .button--green {\r\n      background-color: #22BC66;\r\n    }\r\n    .button--red {\r\n      background-color: #dc4d2f;\r\n    }\r\n    .button--blue {\r\n      background-color: #3869D4;\r\n    }\r\n  </style>\r\n</head>\r\n<body style=\"width: 100% !important;\r\n      height: 100%;\r\n      margin: 0;\r\n      line-height: 1.4;\r\n      background-color: #F2F4F6;\r\n      color: #74787E;\r\n      -webkit-text-size-adjust: none;\">\r\n  <table class=\"email-wrapper\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"\r\n    width: 100%;\r\n    margin: 0;\r\n    padding: 0;\">\r\n    <tbody><tr>\r\n      <td align=\"center\">\r\n        <table class=\"email-content\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\r\n      margin: 0;\r\n      padding: 0;\">\r\n          <!-- Logo -->\r\n\r\n          <tbody>\r\n          <!-- Email Body -->\r\n          <tr>\r\n            <td class=\"email-body\" width=\"100%\" style=\"width: 100%;\r\n    margin: 0;\r\n    padding: 0;\r\n    border-top: 1px solid #edeef2;\r\n    border-bottom: 1px solid #edeef2;\r\n    background-color: #edeef2;\">\r\n              <table class=\"email-body_inner\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" style=\" width: 570px;\r\n    margin:  14px auto;\r\n    background: #fff;\r\n    padding: 0;\r\n    border: 1px outset rgba(136, 131, 131, 0.26);\r\n    box-shadow: 0px 6px 38px rgb(0, 0, 0);\r\n       \">\r\n                <!-- Body content -->\r\n                <thead style=\"background: #3869d4;\"><tr><th><div align=\"center\" style=\"padding: 15px; color: #000;\"><a href=\"{var_action_url}\" class=\"email-masthead_name\" style=\"font-size: 16px;\r\n      font-weight: bold;\r\n      color: #bbbfc3;\r\n      text-decoration: none;\r\n      text-shadow: 0 1px 0 white;\">{var_sender_name}</a></div></th></tr>\r\n                </thead>\r\n                <tbody><tr>\r\n                  <td class=\"content-cell\" style=\"padding: 35px;\">\r\n                    <h1>Hi {var_user_name},</h1>\r\n                    <p>You recently requested to reset your password for your {var_website_name} account. Click the button below to reset it.</p>\r\n                    <!-- Action -->\r\n                    <table class=\"body-action\" align=\"center\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"\r\n      width: 100%;\r\n      margin: 30px auto;\r\n      padding: 0;\r\n      text-align: center;\">\r\n                      <tbody><tr>\r\n                        <td align=\"center\">\r\n                          <div>\r\n                            <!--[if mso]><v:roundrect xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" href=\"{{var_action_url}}\" style=\"height:45px;v-text-anchor:middle;width:200px;\" arcsize=\"7%\" stroke=\"f\" fill=\"t\">\r\n                              <v:fill type=\"tile\" color=\"#dc4d2f\" />\r\n                              <w:anchorlock/>\r\n                              <center style=\"color:#ffffff;font-family:sans-serif;font-size:15px;\">Reset your password</center>\r\n                            </v:roundrect><![endif]-->\r\n                            <a href=\"{var_varification_link}\" class=\"button button--red\" style=\"background-color: #dc4d2f;display: inline-block;\r\n      width: 200px;\r\n      background-color: #3869D4;\r\n      border-radius: 3px;\r\n      color: #ffffff;\r\n      font-size: 15px;\r\n      line-height: 45px;\r\n      text-align: center;\r\n      text-decoration: none;\r\n      -webkit-text-size-adjust: none;\r\n      mso-hide: all;\">Reset your password</a>\r\n                          </div>\r\n                        </td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                    <p>If you did not request a password reset, please ignore this email or reply to let us know.</p>\r\n                    <p>Thanks,<br>{var_sender_name} and the {var_website_name} Team</p>\r\n                   <!-- Sub copy -->\r\n                    <table class=\"body-sub\" style=\"margin-top: 25px;\r\n      padding-top: 25px;\r\n      border-top: 1px solid #EDEFF2;\">\r\n                      <tbody><tr>\r\n                        <td> \r\n                          <p class=\"sub\" style=\"font-size:12px;\">If you are having trouble clicking the password reset button, copy and paste the URL below into your web browser.</p>\r\n                          <p class=\"sub\"  style=\"font-size:12px;\"><a href=\"{var_varification_link}\">{var_varification_link}</a></p>\r\n                        </td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n  </tbody></table>\r\n\r\n\r\n</body></html>'),
(3, 'users', 'invitation', 'Invitation', '<p>Hello <strong>{var_user_email}</strong></p>\r\n\r\n<p>Click below link to register&nbsp;<br />\r\n{var_inviation_link}</p>\r\n\r\n<p>Thanks&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(121) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `var_key` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `is_deleted` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `user_id`, `var_key`, `status`, `is_deleted`, `name`, `password`, `email`, `profile_pic`, `user_type`) VALUES
(1, '1', '', 'active', '0', 'admin', '$2y$10$Kn3PUI53t5XC9splBmK5P.gIYJ1Alz9rjrI9tALeY.hML205D2NRS', 'rm.salman.dev@gmail.com', '14054989_1158349734231180_8629575220316940379_n_1517041641.jpg', 'admin'),
(2, '1', NULL, 'active', '0', 'Rana g', '$2y$10$1akUGTBVTsfYNsJkViDrRe9h1/i6S1mg3WLdH98DoYajVWJTdybre', 'someone@somewhere.com', '18881764_1604918356240980_4094871240513233827_n_1517081710.jpg', 'Member'),
(3, '1', NULL, 'active', '0', 'user designer', '$2y$10$1akUGTBVTsfYNsJkViDrRe9h1/i6S1mg3WLdH98DoYajVWJTdybre', 'someone.com', 'user.png', 'Designer'),
(4, '1', NULL, 'active', '0', 'designer here', '$2y$10$l7oFTTvI31//h/pWe/RdBe2INavRHT2ZlAZEjhYZjAPZ.OpNQtsJe', 'designer@design.com', 'user.png', 'Member'),
(5, '1', NULL, 'active', '0', 'Designer 2', '$2y$10$dwvRVoBWt1W17ePGpZUbKO/WDR1i5gql7nLWphOsMggMo12XeY.wm', 'designer2@design2.com', 'user.png', 'Designer'),
(6, '1', NULL, 'active', '0', 'designer1', '$2y$10$KXUITUYGnEaPMPLzwFm.AuyltvXEPqaWg94KF1alx5TCiPkD9ik76', 'designer1@designer.com', 'user.png', 'Designer'),
(7, '1', NULL, 'active', '0', 'user1', '$2y$10$1akUGTBVTsfYNsJkViDrRe9h1/i6S1mg3WLdH98DoYajVWJTdybre', 'user1@user.com', 'user.png', 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `mailbox`
--
ALTER TABLE `mailbox`
  ADD PRIMARY KEY (`mailbox_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_orders`
--
ALTER TABLE `plan_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mailbox`
--
ALTER TABLE `mailbox`
  MODIFY `mailbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(122) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plan_orders`
--
ALTER TABLE `plan_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(122) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(121) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(121) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
