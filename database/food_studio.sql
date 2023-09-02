-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2022 at 01:47 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `food_studio`
--
CREATE DATABASE IF NOT EXISTS `food_studio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `food_studio`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

CREATE TABLE IF NOT EXISTS `admin_detail` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`admin_id`, `admin_name`, `email_id`, `pwd`) VALUES
(1, 'admin', 'admin@foodstudio.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_master`
--

CREATE TABLE IF NOT EXISTS `recipe_master` (
  `recipe_id` int(10) NOT NULL,
  `region_id` int(10) NOT NULL,
  `dish_name` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `state` varchar(50) NOT NULL,
  `recipe_detail` varchar(2000) NOT NULL,
  `dish_img` varchar(50) NOT NULL,
  `recipe_video` varchar(50) NOT NULL,
  `veg_nonveg` int(1) NOT NULL,
  PRIMARY KEY (`recipe_id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_master`
--

INSERT INTO `recipe_master` (`recipe_id`, `region_id`, `dish_name`, `description`, `state`, `recipe_detail`, `dish_img`, `recipe_video`, `veg_nonveg`) VALUES
(1, 4, 'Rasgulla', 'It is a very famous sweet dish of Kolkata in West Bengal.\r\nRasgulla is a milk-based sweet made by curdling milk, draining the whey and kneading the milk solids to make a ball. These balls are cooked in hot sugar syrup until light and juicy,', 'West Bengal', 'Heat the whole milk in a pan and bring it to boil. Stir it at intervals to avoid the milk getting stuck to the pan.\r\nOnce the milk is boiled, add 2tbsp of lemon juice and switch off the flame and stir it well.At this stage, you can see the milk has curdled and the whey water is separated.\r\nStrain the curdled milk over a strainer lined with a muslin cloth. Rinse the Cheena with cold water 2 to 3 times to remove the lemon flavour.Tie the muslin cloth and keep a heavy object over it to remove any excess water for about 30 minutes.\r\nTransfer the Cheena into a plate and knead for 3 to 5 minutes until you get soft dough consistency without any lumps.', 'dimg/d1_7708.png', 'rvideo/r1_6479.mp4', 1),
(2, 4, 'Litti Chokha', 'A traditional Bihari recipe, Litti Chokha is a delicious recipe that can be included in your lunch or dinner menu. Litti has a hearty filling of sattu along with spices like ajwain and kalonji. Served with Chokha made with mashed potatoes, this is a complete meal.', 'Bihar', 'pinch a small ball sized dough. press the edges and form a cup.\r\nfurther place a ball sized sattu stuffing in the centre.\r\nstart pleating the dough, making sure the stuffing is secured well.\r\npinch off excess dough and roll well.\r\nplace the rolled litti in appe pan heated with oil. or preheat and bake in oven at 180 degree celcius for 45 minutes flipping in between.\r\ncover and cook on low flame for 10 minutes.\r\nflip over and cook both sides. cook for approx 30 minutes in total\r\ncontinue to cook until the litti turns golden brown from all the sides and cooked from inside.\r\nfinally, litti is ready to serve with chokha and ghee.', 'dimg/d2_3659.png', 'rvideo/r2_2480.mp4', 1),
(3, 3, 'Gujarati Dal', 'Gujarati Dal is a sweet, spicy and tangy lentil soup, made with pigeon peas (tuvar dal), lots of warming spices and the sweetness of jaggery. This staple dal from the Gujarat region of India can be enjoyed with rice, roti or as a soup! ', 'Gujarat', 'firstly, in a cooker take ingredients listed for pressure cooking and pressure cook for 5 whistles.\r\ntake off the peanuts cup and keep aside.\r\nwhisk the dal until it turns creamy and smooth.\r\nadd 1Â½ cup water and boiled peanuts.\r\nmix well adjusting consistency as required.\r\nsimmer for 5 minutes, or until the flavours are well absorbed.\r\nnow prepare the tempering and pour over dal, also add 2 tbsp coriander and mix well.\r\nfinally, enjoy gujarati dal recipe tastes great when prepared slightly watery consistency.', 'dimg/d3_7929.png', 'rvideo/r3_5015.mp4', 1),
(4, 3, 'Kothimbir Vadi', 'Kothimbir vadi is a delicious savory crisp snack from the Maharashtrian cuisine made with gram flour (besan), coriander leaves, peanut, sesame seeds and spices. These savory, herby and flavorful bites can be pan-fried or deep-fried. They are a popular tea-time fritter snack loaded with coriander leaves (cilantro)', 'Maharashtra', 'firstly, in a large mixing bowl take 2 cups of chopped coriander leaves.also add 1 cup of besan.\r\nadditionally add 1 tsp ginger-garlic paste, 1 green chilli, Â½ tsp red chilli powder, Â½ tsp turmeric, Â½ tsp coriander powder, Â½ tsp cumin powder, Â¼ tsp garam masala powder, 1 tsp sesame seeds, salt and 1 tsp lemon juice.\r\ncombine well making sure all the spices are mixed well.also squeeze and mix making sure the coriander leaves are squeezed well.\r\nfurther add water as required and begin to knead.knead to soft dough.shape the dough to cylindrical shape greasing hand with oil.\r\nsteam the dough for 15-20 minutes.cool the dough completely and cut them into thick slices.further, deep fry or shallow fry in hot oil.\r\nstir occasionally till the wadi turns crisp and golden brown.finally, serve kothimbir vadi garnished with coriander leaves along with cutting chai.', 'dimg/d4_1707.png', 'rvideo/r4_1745.mp4', 1),
(5, 2, 'Medu Vada', 'Medu vada  is a South Indian fritter made from black lentil. It is usually made in a doughnut shape, with a crispy exterior and soft interior.A popular food item in South Indian and Sri Lankan Tamil cuisines, it is generally eaten as a breakfast or a snack', 'Tamil Nadu', 'wash and soak dal in about 3 cups of water for about 2-3 hours.\r\ndrain all the water from soaked dal. grind urad dal and channa dal together to smooth paste using very little water. i have used authentic grinding stone, but wet grinder or even mixer grinder can be used.\r\nthe batter should be thick and use very little water. the right consistency is very important or otherwise, you will not be able to get the vada shape.\r\nadd coriander, green chilli, ginger and chopped dry coconut to the batter. mix it very well.\r\nadd 2-3 tsp of rice flour. rice flour is added to make it crispy.add pinch of hing to make it more digestible.\r\nheat the oil in a frying pan in medium flame. wet your palms and take a lemon size batter.\r\nmake hole in the center and slide it into the hot oil.the vada should float on top of oil.make sure your oil is not too hot. otherwise the vadas would not cook evenly.\r\nfry on both sides till it becomes golden brown in colour.serve medu vada immediately with chutney collections or sambar collections.', 'dimg/d5_6297.png', 'rvideo/r5_5940.mp4', 1),
(6, 2, 'Mysuru Rasam', 'Rasam is a great digestive to be included in our meal. It has self healing ingredients, cumin and pepper which are great to keep flu at bay. Mysore Rasam is a speciality of Karnataka. It is prepared by making a freshly roasted rasam powder which has aromatic cumin, pepper and whole lot of coconut in it. The cooked dal is then simmered with this freshly ground rasam powder, along with tamarind and jaggery which balances the flavours.', 'Karnataka', 'firstly, in a large kadai take chopped tomatoes and tamarind juice.also add curry leaves, turmeric powder, salt and jaggery.\r\ncover and boil tamarind water for atleast 15 minutes.further add cooked toor dal and water.\r\nboil for a minute till the dal turns frothy.now add 2-3 tsp of mysore rasam powder and continue to boil for 2 minutes.\r\nmeanwhile, in a small kadai heat oil.further, add mustard seeds, hing, dried red chilli and curry leaves.\r\nallow the tempering to splutter and pour over rasam.finally, serve mysore rasam garnishing with chopped coriander leaves.', 'dimg/d6_1642.png', 'rvideo/r6_7396.mp4', 1),
(7, 1, 'Punjabi Lassi', 'Lassi is a refreshing and cooling traditional Indian drink that is made using yogurt as its base ingredient.', 'Punjab', 'firstly, in a blender take 1 cup curd. make sure the curd is thick and chilled.\r\nadd 2 tbsp sugar and Â¼ tsp cardamom powder.blend to make sure everything is well combined.\r\nfinally, pour punjabi lassi in a tall glass and top with malai or cardamom powder.', 'dimg/d7_1564.png', 'rvideo/r7_7331.mp4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `region_master`
--

CREATE TABLE IF NOT EXISTS `region_master` (
  `region_id` int(10) NOT NULL,
  `region_name` varchar(50) NOT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region_master`
--

INSERT INTO `region_master` (`region_id`, `region_name`) VALUES
(1, 'North'),
(2, 'South'),
(3, 'West'),
(4, 'East');

-- --------------------------------------------------------

--
-- Table structure for table `user_regis`
--

CREATE TABLE IF NOT EXISTS `user_regis` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `user_type` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_regis`
--

INSERT INTO `user_regis` (`user_id`, `user_name`, `address`, `city`, `mobile_no`, `gender`, `email_id`, `pwd`, `user_type`) VALUES
(1, 'Gehna', 'Halar', 'valsad', '9876543210', 'FEMALE', 'gehna@yahoo.com', '111111', 1),
(2, 'Pushti', 'gandevi', 'gandevi', '8574123690', 'FEMALE', 'pushti@yahoo.com', '111111', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vlog_master`
--

CREATE TABLE IF NOT EXISTS `vlog_master` (
  `video_id` int(10) NOT NULL,
  `dish_name` varchar(50) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `region_id` int(10) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `video_path` varchar(50) NOT NULL,
  `dish_img` varchar(50) NOT NULL,
  `veg_non_veg` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vlog_master`
--

INSERT INTO `vlog_master` (`video_id`, `dish_name`, `place_name`, `address`, `city`, `region_id`, `mobile_no`, `video_path`, `dish_img`, `veg_non_veg`, `status`, `comments`, `user_id`) VALUES
(1, 'Pav Bhaji', 'Jalaram Bhaji Center', 'Opposite Bai Avabai high school\r\nhalar road\r\n', 'valsad', 3, '9876543210', 'vvideo/v1_8395.mp4', 'vimg/vi1_4828.png', 1, 0, '', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
