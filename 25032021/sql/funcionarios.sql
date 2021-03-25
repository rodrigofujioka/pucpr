
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `salary` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `funcionario` (`id`, `name`, `address`, `salary`) VALUES
(1, 'Rodrigo Fujioka', 'Rua X, 67, Japan', 1000),
(2, 'Oda Nobunaga ', 'Oda, Japan', 1500),
(3, 'Hornigold', '25, Ilhas do caribe, Nassau', 4000);
