CREATE TABLE `grade_history` (
  `mod_ID` int(11) NOT NULL,
  `grade_ID` int(11) NOT NULL,
  `previous_grade` int(11) DEFAULT NULL,
  `new_grade` varchar(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE `grade_history`
  ADD PRIMARY KEY (`mod_ID`);

ALTER TABLE `grade_history`
  MODIFY `mod_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;