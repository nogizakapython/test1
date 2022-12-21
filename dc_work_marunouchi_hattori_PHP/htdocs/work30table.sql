CREATE TABLE `pictable` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(200) NOT NULL,
  `public_flg` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL
)
ALTER TABLE `pictable`
  ADD PRIMARY KEY (`image_id`);


ALTER TABLE `pictable`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

