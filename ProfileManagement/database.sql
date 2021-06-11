CREATE TABLE `users` (
	`userId` INT(11) NOT NULL AUTO_INCREMENT,
	`userUUID` VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`userUid` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`userName` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`userMail` VARCHAR(128) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`userPwd` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`serverType` ENUM('user','moderator','admin','') NOT NULL DEFAULT 'user' COLLATE 'utf8mb4_general_ci',
	`profileStatus` ENUM('default','private','banned') NOT NULL DEFAULT 'default' COLLATE 'utf8mb4_general_ci',
	`userNoti` ENUM('online','busy','away','offline','invisible','') NOT NULL DEFAULT 'offline' COLLATE 'utf8mb4_general_ci',
	`userStatus` VARCHAR(250) NULL DEFAULT 'Using A Simple Profile System' COLLATE 'utf8mb4_general_ci',
	`userImage` VARCHAR(250) NULL DEFAULT 'https://pbs.twimg.com/profile_images/453956388851445761/8BKnRUXg.png' COLLATE 'utf8mb4_general_ci',
	`serverAstatus` ENUM('active','pending','deleted','') NOT NULL DEFAULT 'pending' COLLATE 'utf8mb4_general_ci',
	`serverToken` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`userId`) USING BTREE,
	UNIQUE INDEX `userUUID` (`userUUID`) USING BTREE
);