-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 02:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swiss_collection`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `uploaded_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `product_image`, `price`, `category_id`, `uploaded_date`) VALUES
(1, 'John Martin, Belashazzar\'s feast.\r\n', 'Belshazzar\'s Feast is an oil painting by British painter John Martin. It was first exhibited at the British Institution in February 1821.\r\n', './uploads/art1.jpg', 0, 1, '2022-03-28'),
(2, 'John Martin,Pandemonium.', ' John Martin\'s Le Pandemonium was created in 1841 and is in Musee du Louvre Paris. ', './uploads/art2.jpg', 0, 1, '2022-04-04'),
(3, 'Leonardo Da Vinci,La Monalisa.', 'Mona Lisa, oil painting on a poplar wood panel by Leonardo da Vinci, probably the world\'s most famous painting.', './uploads/art3.jpg', 0, 1, '2022-04-04'),
(4, 'Kevin Carter,The Vulture and the Little Girl.', 'The Vulture and the Little Girl, also known as The Struggling Girl, is a photograph by Kevin Carter which first appeared in The New York Times on 26 March 1993.', './uploads/art4.jpg', 0, 2, '2022-04-04'),
(5, 'Phidias , Statue of Zeus at Olympia .', 'The Statue of Zeus at Olympia was a giant seated figure, about 12.4 m (41 ft) tall, made by the Greek sculptor Phidias around 435 BC .', './uploads/art5.jpg', 0, 3, '2022-04-04'),
(6, 'Michaelangelo , The Creation of Adam.', 'The Creation of Adam is a fresco painting by Italian artist Michelangelo, which forms part of the Sistine Chapel\'s ceiling, painted  c.1508_1512.', './uploads/art6.jpg', 0, 1, '2022-03-24'),
(15, 'Leonardo Da Vinci , The Last Supper', 'The Last Supper was a mural completed by Leonardo da Vinci. This painting depicts the shock and horror of the twelve disciples upon learning that one amongst themselves was going to betray Jesus Christ. The work was commissioned in 1494 by Ludovico Sforza, who was the Duke of Milan.', './uploads/art7.jpg', 500, 1, '2023-12-08'),
(16, 'Prehistory , Cave paintings.', 'These paintings were discovered recently in an undisclosed cave between France and Spain, it most likely has been made by prehistoric humans.', './uploads/art8.jpg', 1000, 1, '2023-12-08'),
(17, 'Thomas Lee , Thousand yard stare.', 'This painting depicts the often blank unfocused gaze of combatants who have become emotionally detached from the traumatizing events around them. It is sometimes used more generally to describe the look of dissociation among victims of other types of trauma.', './uploads/art9.jpg', 0, 1, '2023-12-09'),
(18, ' Charles C. Ebbets , Lunch atop a skyscraper.', 'Lunch atop a Skyscraper is a black-and-white photograph taken on September 20, 1932, of eleven ironworkers sitting on a steel beam 850 feet (260 meters) above the ground on the sixty-ninth floor of the RCA Building in Manhattan, New York City.', './uploads/art10.jpg', 200, 2, '2023-12-09'),
(19, 'Agesander , Laocoon and his sons.', 'This Hellenistic marble sculpture shows Laocoon (Trojan priest) and his sons being strangled by serpents. The sculpture stands out as a masterpiece of ancient Greece.', './uploads/art11.jpg', 100, 3, '2023-12-09'),
(20, 'Thutmose , Nefertiti bust.', 'The Nefertiti Bust is a painted stucco-coated limestone bust of Nefertiti, the Great Royal Wife of Egyptian pharaoh Akhenaten. The work is believed to have been crafted in 1345 BCE by Thutmose.', './uploads/art12.jpg', 250, 3, '2023-12-09'),
(21, 'Steve McCurry , Afghan girl.', 'Afghan Girl is a 1984 photographic portrait of Sharbat Gula, an Afghan refugee in Pakistan during the Sovietâ€“Afghan War. The photograph, taken by American photojournalist Steve McCurry near the Pakistani city of Peshawar, appeared on the June 1985 cover of National Geographic.', './uploads/art13.jpg', 100, 2, '2023-12-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
