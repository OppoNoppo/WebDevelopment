CREATE TABLE `users` (
	`userId` INT(11) NOT NULL AUTO_INCREMENT,
	`userUUID` VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`userUid` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`userName` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`userMail` VARCHAR(128) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`userPwd` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`userId`) USING BTREE,
	UNIQUE INDEX `userUUID` (`userUUID`) USING BTREE
);
