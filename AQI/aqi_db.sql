SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `recorddata` (
  `id` int(7) NOT NULL,
  `sensor` varchar(255) NOT NULL,
  `pm` int(3) NOT NULL,
  `location_id` int(11) NOT NULL,
  `updateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `recorddata` (`id`, `sensor`, `pm`, `location_id`, `updateCreated`) VALUES
(1, 'TEST01', 23, 1, '2023-03-17 07:52:07'),
(3, 'TEST0224', 280, 2, '2023-03-17 07:54:51');

CREATE TABLE `station_info` (
  `location_id` int(11) NOT NULL,
  `sensor_name` varchar(255) NOT NULL,
  `log` float NOT NULL,
  `lag` float NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `station_info` (`location_id`, `sensor_name`, `log`, `lag`, `status`) VALUES
(1, 'Station A1', -231, 232, 1),
(2, 'Station A2', 123, 321, 1);

ALTER TABLE `recorddata`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `station_info`
  ADD PRIMARY KEY (`location_id`);

ALTER TABLE `recorddata`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `station_info`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;