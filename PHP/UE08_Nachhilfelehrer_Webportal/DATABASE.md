## Datenbank

```sql
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL DEFAULT '',
  `lastname` varchar(100) NOT NULL DEFAULT '',
  `email` longtext NOT NULL,
  `password` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

```sql
CREATE TABLE `file` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sid` varchar(20) NOT NULL DEFAULT '',
  `mime_type` longtext NOT NULL,
  `file` longtext NOT NULL,
  `name` longtext NOT NULL,
  `comment` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

```sql
CREATE TABLE `news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `headline` varchar(250) NOT NULL DEFAULT '',
  `content` longtext NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(20) NOT NULL DEFAULT '',
  `author` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`),
  KEY `image` (`image`),
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`),
  CONSTRAINT `news_ibfk_2` FOREIGN KEY (`image`) REFERENCES `file` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

```sql
CREATE TABLE `download` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` longtext NOT NULL,
  `file` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `file` (`file`),
  CONSTRAINT `download_ibfk_1` FOREIGN KEY (`file`) REFERENCES `file` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

```sql
CREATE TABLE `infodoc` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` longtext DEFAULT NULL,
  `file` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `file` (`file`),
  CONSTRAINT `infodoc_ibfk_1` FOREIGN KEY (`file`) REFERENCES `file` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

```sql
CREATE TABLE `rating` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  `email` longtext NOT NULL,
  `content` longtext NOT NULL,
  `stars` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

```sql
CREATE TABLE `contact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL DEFAULT '',
  `lastname` varchar(200) NOT NULL DEFAULT '',
  `email` longtext NOT NULL,
  `content` longtext NOT NULL,
  `attachment` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attachment` (`attachment`),
  CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`attachment`) REFERENCES `file` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```