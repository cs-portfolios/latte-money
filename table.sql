

-- posts tableを作成するsql文
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- users tableを作成するsql文
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
