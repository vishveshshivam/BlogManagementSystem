-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2022 at 06:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'vishvesh shivam',
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pass`) VALUES
(1, 'Vishvesh Shivam', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`) VALUES
(1, 'http://localhost/industrial/admin-demo/uploads/featured-image.jpg'),
(2, 'http://localhost/industrial/admin-demo/uploads/featured-image.jpg'),
(3, 'http://localhost/industrial/admin-demo/uploads/2086922.webp'),
(4, 'http://localhost/industrial/admin-demo/uploads/featured-image100922023743.jpg'),
(5, 'http://localhost/industrial/admin-demo/uploads/featured-image100922024329.jpg'),
(6, 'http://localhost/industrial/admin-demo/uploads/featured-image100922024746.jpg'),
(7, 'http://localhost/industrial/admin-demo/uploads/halo-halo-3-odst-wallpaper-thumb100922024826.jpg'),
(8, 'http://localhost/industrial/admin-demo/uploads/HTML150922082526.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `heading` text NOT NULL,
  `short_description` text NOT NULL,
  `description` longtext NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `heading`, `short_description`, `description`, `thumbnail`, `date`) VALUES
(1, 'PHP md5() Function', 'The md5() function calculates the MD5 hash of a string.', '<h2>Definition and Usage</h2>\r\n<p>The md5() function calculates the MD5 hash of a string.</p>\r\n<p>The md5() function uses the RSA Data Security, Inc. MD5 Message-Digest Algorithm.</p>\r\n<p>From RFC 1321 - The MD5 Message-Digest Algorithm: <i>\"The MD5 message-digest algorithm takes as \r\ninput a message of arbitrary length and produces as output a 128-bit \r\n\"fingerprint\" or \"message digest\" of the input. The MD5 algorithm is intended for digital signature applications, where \r\na large file must be \"compressed\" in a secure manner before being encrypted with \r\na private (secret) key under a public-key cryptosystem such as RSA.\"</i></p>\r\n<p>To calculate the MD5 hash of a file, use the md5_file() function.</p>\r\n<hr>\r\n<h2>Syntax</h2>\r\n<div>\r\nmd5(<em>string,raw</em>)\r\n</div>\r\n<h2>Parameter Values</h2>\r\n<table> \r\n  <tbody><tr>\r\n    <th style=\"width:20%\">Parameter</th>\r\n    <th style=\"width:80%\">Description</th>\r\n  </tr>  \r\n  <tr>\r\n    <td><em>string</em></td>\r\n    <td>Required. The string to be calculated</td>\r\n  </tr>\r\n  <tr>\r\n    <td><em>raw</em></td>\r\n    <td>Optional. Specifies hex or binary output format:<ul>\r\n    <li>TRUE - Raw 16 character binary format</li>\r\n    <li>FALSE - Default. 32 character hex number</li>\r\n </ul>\r\n   </td>\r\n  </tr>\r\n  </tbody></table>\r\n<h2>Technical Details</h2>\r\n<table>\r\n<tbody><tr>\r\n <th style=\"width:20%\">Return Value:</th>\r\n <td style=\"width:80%\">Returns the calculated MD5 hash on success, or FALSE on failure</td>\r\n</tr>\r\n<tr>\r\n  <th>PHP Version:</th>\r\n  <td>4+</td>\r\n</tr>\r\n<tr>\r\n  <th>Changelog:</th>\r\n  <td>The <em>raw</em> parameter became optional in PHP 5.0</td>\r\n</tr>\r\n</tbody></table>', 'http://localhost/industrial/admin-demo/uploads/PHP-MD5.jpg', '2022-09-10 17:40:57'),
(2, 'HTML Introduction', 'HTML is the standard markup language for creating Web pages.', '<h1>HTML <span class=\"color_h1\">Introduction</span></h1>\r\n<p class=\"intro\">HTML is the standard markup language for creating Web pages.</p>\r\n<h2>What is HTML?</h2>\r\n<ul>\r\n<li>HTML stands for Hyper Text Markup Language</li>\r\n  <li>HTML is the standard markup language for creating Web pages</li>\r\n  <li>HTML describes the structure of a Web page</li>\r\n  <li>HTML consists of a series of elements</li>\r\n  <li>HTML elements tell the browser how to display the content</li>\r\n  <li>HTML elements label pieces of content such as \"this is a heading\", \"this \r\n  is a paragraph\", \"this is a link\", etc.</li>\r\n</ul>\r\n<hr>\r\n<h2>A Simple HTML Document</h2>\r\n<div>\r\n<h3>Example</h3>\r\n<div>\r\n <span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\">&lt;</span>!DOCTYPE<span class=\"attributecolor\" style=\"color:red\"> html</span><span class=\"tagcolor\" style=\"color:mediumblue\">&gt;</span></span><br>\r\n<span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\">&lt;</span>html<span class=\"tagcolor\" style=\"color:mediumblue\">&gt;</span></span><br><span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\">&lt;</span>head<span class=\"tagcolor\" style=\"color:mediumblue\">&gt;</span></span><br><span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\">&lt;</span>title<span class=\"tagcolor\" style=\"color:mediumblue\">&gt;</span></span>Page Title<span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\">&lt;</span>/title<span class=\"tagcolor\" style=\"color:mediumblue\">&gt;</span></span><br>\r\n <span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\">&lt;</span>/head<span class=\"tagcolor\" style=\"color:mediumblue\">&gt;</span></span><br>\r\n<span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\">&lt;</span>body<span class=\"tagcolor\" style=\"color:mediumblue\">&gt;</span></span><br><br><span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\">&lt;</span>h1<span class=\"tagcolor\" style=\"color:mediumblue\">&gt;</span></span>My First Heading<span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\">&lt;</span>/h1<span class=\"tagcolor\" style=\"color:mediumblue\">&gt;</span></span><br><span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\">&lt;</span>p<span class=\"tagcolor\" style=\"color:mediumblue\">&gt;</span></span>My first paragraph.<span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\">&lt;</span>/p<span class=\"tagcolor\" style=\"color:mediumblue\">&gt;</span></span><br><br>\r\n    <span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\">&lt;</span>/body<span class=\"tagcolor\" style=\"color:mediumblue\">&gt;</span></span><br><span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\">&lt;</span>/html<span class=\"tagcolor\" style=\"color:mediumblue\">&gt;</span></span>\r\n </div>\r\n\r\n</div>\r\n<h3>Example Explained</h3>\r\n<ul>\r\n<li>The <code class=\"w3-codespan\">&lt;!DOCTYPE html&gt;</code> declaration defines \r\nthat this document is an HTML5 document</li>\r\n<li>The <code class=\"w3-codespan\">&lt;html&gt;</code> element is the root element of an HTML \r\npage</li>\r\n <li>The <code class=\"w3-codespan\">&lt;head&gt;</code> element contains meta information about the \r\n HTML page</li>\r\n <li>The <code class=\"w3-codespan\">&lt;title&gt;</code> element specifies a title for the \r\n HTML page (which is shown in the browser\'s title bar or in the page\'s tab)</li>\r\n <li>The <code class=\"w3-codespan\">&lt;body&gt;</code> element defines the \r\n document\'s body, and is a container for all the visible contents, such as \r\n headings, paragraphs, images, hyperlinks, tables, lists, etc.</li>\r\n <li>The <code class=\"w3-codespan\">&lt;h1&gt;</code> element defines a large heading</li>\r\n <li>The <code class=\"w3-codespan\">&lt;p&gt;</code> element defines a paragraph</li>\r\n</ul>\r\n<hr>\r\n<h2>What is an HTML Element?</h2>\r\n<p>An HTML element is defined by a start tag, some content, and an end tag:</p>\r\n<div style=\"font-size:20px;padding:10px;margin-bottom:10px;\">\r\n<span>\r\n<span >&lt;</span>tagname<span>&gt;</span></span>\r\nContent goes here...\r\n<span>\r\n<span >&lt;</span>/tagname<span>&gt;</span></span>\r\n</div>\r\n<p>The HTML <strong>element</strong> is everything from the start tag to the end tag:</p>\r\n<div style=\"font-size:20px;padding:10px;margin-bottom:10px;\">\r\n<span ><span>&lt;<span>h1</span>&gt;</span></span>My \r\n  First Heading<span><span>&lt;</span>/h1<span>&gt;</span></span>\r\n</div>\r\n<div style=\"font-size:20px;padding:10px;margin-bottom:10px;\">\r\n<span ><span >&lt;</span>p<span>&gt;</span></span>My first paragraph.<span ><span >&lt;</span>/p<span>&gt;</span></span>\r\n</div>\r\n<table>\r\n<tbody><tr>\r\n<th>Start tag</th>\r\n<th>Element content</th>\r\n<th>End tag</th>\r\n</tr>\r\n<tr>\r\n<td>&lt;h1&gt;</td>\r\n<td>My First Heading</td>\r\n<td>&lt;/h1&gt;</td>\r\n</tr>\r\n<tr>\r\n<td>&lt;p&gt;</td>\r\n<td>My first paragraph.</td>\r\n<td>&lt;/p&gt;</td>\r\n</tr>\r\n<tr>\r\n<td>&lt;br&gt;</td>\r\n<td><em>none</em></td>\r\n<td><em>none</em></td>\r\n</tr>\r\n</tbody></table>\r\n<hr>\r\n<div>\r\n<p><strong>Note:</strong> Some HTML elements have no content (like the &lt;br&gt; \r\nelement). These elements are called empty elements. Empty elements do not have an end tag!</p>\r\n</div>', 'http://localhost/industrial/admin-demo/uploads/HTML.jpg', '2022-09-10 18:29:24'),
(3, 'HTML id Attribute', 'The HTML id attribute is used to specify a unique id for an HTML element. You cannot have more than one element with the same id in an HTML document.', '<h2>HTML id Attribute Details</h2>\r\n<p>The HTML id attribute is used to specify a unique id for an HTML element.<br>\r\nYou cannot have more than one element with the same id in an HTML document.\r\n</p>\r\n<div class=\'container-fluid d-flex justify-content-center\' style=\'height:250px; width:inherit;\'>\r\n                <img src=\'http://localhost/industrial/admin-demo/uploads/HTML150922082526.jpg\' class=\'img-fluid\' alt=\'Thumbnail image\'>\r\n              </div>\r\n<h4>Using The id Attribute</h4>\r\n<p>The id attribute specifies a unique id for an HTML element. The value of the id attribute must be unique within the HTML document.<br>\r\nThe id attribute is used to point to a specific style declaration in a style sheet. It is also used by JavaScript to access and manipulate the element with the specific id.<br>\r\nThe syntax for id is: write a hash character (#), followed by an id name. Then, define the CSS properties within curly braces {}.<br>\r\nIn the following example we have an <h1> element that points to the id name \"myHeader\". This <h1> element will be styled according to the #myHeader style definition in the head section:\r\n</p>\r\n<h4>Example</h4>\r\n<div>\r\n  <span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\"><</span>!DOCTYPE<span class=\"attributecolor\" style=\"color:red\"> html</span><span class=\"tagcolor\" style=\"color:mediumblue\">></span></span><br><span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\"><</span>html<span class=\"tagcolor\" style=\"color:mediumblue\">></span></span><br><span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\"><</span>head<span class=\"tagcolor\" style=\"color:mediumblue\">></span></span><br><span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\"><</span>style<span class=\"tagcolor\" style=\"color:mediumblue\">></span></span><span class=\"cssselectorcolor\" style=\"color:brown\"><br>#myHeader <span class=\"cssdelimitercolor\" style=\"color:black\">{</span><span class=\"csspropertycolor\" style=\"color:red\"><br>  \r\n  background-color<span class=\"csspropertyvaluecolor\" style=\"color:mediumblue\"><span class=\"cssdelimitercolor\" style=\"color:black\">:</span> lightblue<span class=\"cssdelimitercolor\" style=\"color:black\">;</span></span><br>  color<span class=\"csspropertyvaluecolor\" style=\"color:mediumblue\"><span class=\"cssdelimitercolor\" style=\"color:black\">:</span> black<span class=\"cssdelimitercolor\" style=\"color:black\">;</span></span><br>  padding<span class=\"csspropertyvaluecolor\" style=\"color:mediumblue\"><span class=\"cssdelimitercolor\" style=\"color:black\">:</span> 40px<span class=\"cssdelimitercolor\" style=\"color:black\">;</span></span><br>  \r\n  text-align<span class=\"csspropertyvaluecolor\" style=\"color:mediumblue\"><span class=\"cssdelimitercolor\" style=\"color:black\">:</span> center<span class=\"cssdelimitercolor\" style=\"color:black\">;</span></span><br></span><span class=\"cssdelimitercolor\" style=\"color:black\">}</span> <br></span><span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\"><</span>/style<span class=\"tagcolor\" style=\"color:mediumblue\">></span></span><br><span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\"><</span>/head<span class=\"tagcolor\" style=\"color:mediumblue\">></span></span><br><span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\"><</span>body<span class=\"tagcolor\" style=\"color:mediumblue\">></span></span><br><br><span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\"><</span>h1<span class=\"attributecolor\" style=\"color:red\"> id<span class=\"attributevaluecolor\" style=\"color:mediumblue\">=\"myHeader\"</span></span><span class=\"tagcolor\" style=\"color:mediumblue\">></span></span>My \r\n  Header<span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\"><</span>/h1<span class=\"tagcolor\" style=\"color:mediumblue\">></span></span><br><br><span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\"><</span>/body<span class=\"tagcolor\" style=\"color:mediumblue\">></span></span><br><span class=\"tagnamecolor\" style=\"color:brown\"><span class=\"tagcolor\" style=\"color:mediumblue\"><</span>/html<span class=\"tagcolor\" style=\"color:mediumblue\">></span></span> </div>\r\n<blockquote class=\"blockquote\">\r\n  <p><b>Note: </b>The id name is case sensitive!<br>\r\n<b>Note:</b> The id name must contain at least one character, cannot start with a number, and must not contain whitespaces (spaces, tabs, etc.).</p>\r\n</blockquote> kjhiug', 'http://localhost/industrial/admin-demo/uploads/HTML-Attributes id.jpg', '2022-09-10 18:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `profilepic` varchar(255) NOT NULL DEFAULT './images/profile.png',
  `dob` datetime NOT NULL,
  `gender` enum('','male','female','other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pass`, `profilepic`, `dob`, `gender`) VALUES
(3, 'vishvesh ', 'vishvesh482003@gmail.com', '1254ac3babba17ea4bb9066fd448dba7', './images/QM3B5l150922084609.png', '2003-08-04 00:00:00', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
