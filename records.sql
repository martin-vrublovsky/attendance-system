CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `RFID_tag_UID` bigint(32) NOT NULL,
  `employee_name` varchar(25) NOT NULL,
  `time_of_arrival` varchar(19) NOT NULL,
  `departure_time` varchar(19) NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `records` (`id`, `RFID_tag_UID`, `employee_name`, `time_of_arrival`, `departure_time`, `notes`) VALUES
(1, 83136108149, 'Martin Vrublovský', '2024-04-28 16:45:15', '2024-04-28 16:45:32', ''),
(2, 20923124113, 'Neznáma osoba', '-', '-', ''),
(3, 41409934, 'Neznáma osoba', '-', '-', '');
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1537;
COMMIT;
