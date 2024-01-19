create DATABASE MVC_Project;
USE MVC_Project;
ALTER DATABASE MVC_Project CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE `users` (
	`Id` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`Role` ENUM('admin','doctor','patient') NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`Email` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`Password` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`FullName` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`Phone` VARCHAR(20) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`Address` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`Url_Image` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`Id`) USING BTREE,
	UNIQUE INDEX `Id` (`Id`) USING BTREE,
	UNIQUE INDEX `Email` (`Email`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;

CREATE TABLE `doctors` (
	`Id` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`UserId` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`Specialization` VARCHAR(200) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`Hospital` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`Id`) USING BTREE,
	UNIQUE INDEX `Id` (`Id`) USING BTREE,
	INDEX `UserId` (`UserId`) USING BTREE,
	CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;

CREATE TABLE `patients` (
	`Id` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`UserId` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`Id`) USING BTREE,
	UNIQUE INDEX `Id` (`Id`) USING BTREE,
	INDEX `UserId` (`UserId`) USING BTREE,
	CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;

CREATE TABLE `admins` (
	`Id` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`UserId` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`Id`) USING BTREE,
	UNIQUE INDEX `Id` (`Id`) USING BTREE,
	INDEX `UserId` (`UserId`) USING BTREE,
	CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;

CREATE TABLE `booking` (
	`Id` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`PatientId` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`DoctorId` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`TimeBooking` TIME NOT NULL,
	`DateBooking` DATE NOT NULL,
	`TotalPrice` DECIMAL(10,2) NULL DEFAULT NULL,
	PRIMARY KEY (`Id`) USING BTREE,
	INDEX `PatientId` (`PatientId`) USING BTREE,
	INDEX `DoctorId` (`DoctorId`) USING BTREE,
	CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`PatientId`) REFERENCES `patients` (`Id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`DoctorId`) REFERENCES `doctors` (`Id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;
CREATE TABLE `listtimedoctor` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`time` TIME NOT NULL,
	`price` DECIMAL(10,2) NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=11
;

CREATE TABLE `posts` (
	`Id` INT(10) NOT NULL AUTO_INCREMENT,
	`UserId` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`Content` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`Url_Image` VARCHAR(200) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`CreatedAt` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`Id`) USING BTREE,
	INDEX `UserId` (`UserId`) USING BTREE,
	CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=21
;

CREATE TABLE `comments` (
	`CommentId` INT(10) NOT NULL AUTO_INCREMENT,
	`PostId` INT(10) NOT NULL,
	`UserId` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`CommentContent` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`CreatedAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`CommentId`) USING BTREE,
	INDEX `PostId` (`PostId`) USING BTREE,
	INDEX `UserId` (`UserId`) USING BTREE,
	CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`PostId`) REFERENCES `posts` (`Id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=23
;


-- USE mvc_project_php;
INSERT INTO `users` (Id, Role, Email, Password, Fullname, Phone, Address, Url_Image)
VALUES
  ('202401181038', 'admin', 'admin1@mentalheath.management', 'admin1', 'Nguyen Viet Chung', '0921237456', '123 Nguyen Quang Trung street, TP.HCM', 'https://cdn.bookingcare.vn/fo/w256/2021/05/20/172934-bs-nguyen-viet-chung.jpg'),
  ('202401181049', 'doctor', 'nguyenkhanh@mental.health.care.hospital', 'nguyenkhanhMentalHealthCare#1234#', 'Nguyen Khanh', '0933586459', '456 Le Loi Street, District 5, HCM', 'https://cdn.bookingcare.vn/fo/w256/2022/06/14/103841-bs-tuan.png'),
  ('202401181040', 'doctor', 'haanh@mental.health.care.hospital', 'haanhMentalHealthCare#1234#', 'Nguyen Ha Anh', '0993345459', '321 Nguyen Thi Minh Khai street, Distric 1, TP.HCM', 'https://cdn.bookingcare.vn/fo/w256/2022/08/05/170642-bs-hoa-lao-khoa.jpg'),
  ('202401181041', 'doctor', 'tuantrong@mental.health.care.hospital', 'tuantrongMentalHealthCare#1234#', 'Nguyen Trong Tuan', '09667835240', '322 Nguyen Thi Minh Khai street, Distric 1, TP.HCM', 'https://cdn.bookingcare.vn/fo/w256/2022/06/14/103841-bs-tuan.png'),
  ('202401181042', 'doctor', 'nguyenhoa@mental.health.care.hospital', 'nguyenhoaMentalHealthCare#1234#', 'Nguyen Thi Hoa', '0369725439', '125 Nguyen Thi Minh Khai street, Distric 1, TP.HCM', 'https://cdn.bookingcare.vn/fo/w256/2022/08/05/170642-bs-hoa-lao-khoa.jpg'),
  ('202401181043', 'doctor', 'anhthu@mental.health.care.hospital', 'anhthuMentalHealthCare#1234#', 'Nguyen Ngoc Anh Thu', '0945673238', '321 Nguyen Thi Minh Khai street, Distric 1, TP.HCM', 'https://cdn.bookingcare.vn/fo/w256/2023/09/07/091402-bs-anh-thu1.jpg'),  
  ('202401181044', 'patient', 'am.y25@student.passerellesnumeriques.org', 'amyMentalHealthCare#1234#', 'Am Army', '0369735240', '654 Nguyen Van B street, Distric 10, TP.HCM', 'https://res.cloudinary.com/dttfevbw6/image/upload/v1705565184/MentalHealthCare/urjaedqxuknbsqbvagwo.jpg'),
  ('202401181045', 'patient', 'yam532004@gmail.com', 'halangamMentalHealthCare#1234#', 'Am hii', '0937682999', '321 Nguyen Van An street, Distric 2, TP.HCM', 'https://res.cloudinary.com/dttfevbw6/image/upload/v1705565184/MentalHealthCare/fcr21v5oqgmatlqypjop.jpgusers'),
  ('202401181046', 'patient', 'nghiamai532004@gmail.com', 'nghiamaiMentalHealthCare#1234#', 'Mai Xuan Nghia', '0354031164', '101B Le Huu Trac street, Son Tra, Da Nang', 'https://res.cloudinary.com/dttfevbw6/image/upload/v1705566118/MentalHealthCare/nkzznnlgmaoerjomdfoz.jpg'),
  ('202401181047', 'patient', 'sinhdang532004@gmail.com', 'sinhdangMentalHealthCare#1234#', 'Dang Van Sinh', '0937682999', 'Son Tra, Da Nang', 'https://res.cloudinary.com/dttfevbw6/image/upload/v1705566118/MentalHealthCare/csuh5vcjws61hespfnye.jpg'),
  ('202401181048', 'patient', 'luantran532004@gmail.com', 'luantranMentalHealthCare#1234#', 'Tran Thanh Luan', '0369735240', 'Ly Thuong Kiet, Hai Chau, Da Nang', 'https://res.cloudinary.com/dttfevbw6/image/upload/v1705566118/MentalHealthCare/kqlbgvuqakrkpmevciix.jpg') 

INSERT INTO `doctors` (Id, UserId, Specialization, Hospital)
VALUES
  ('202401181040','202401181040', 'Psychology', 'Central Psychiatric Hospital'),
  ('202401181049','202401181049', 'Clinical psychiatry', 'Hue Psychiatric Hospital'),
  ('202401181042','202401181042', 'Psychotherapy', 'Hanoi Psychiatric Hospital'),
  ('202401181043','202401181043', 'Child and adolescent psychiatry', 'Ho Chi Minh City Psychiatric Hospital HCM'),
  ('202401181041','202401181041', 'Brain psychiatry', 'Da Nang Psychiatric Hospital')

INSERT INTO `patients` (Id, UserId)
VALUES
  ('202401181044','202401181044'),
  ('202401181045','202401181045'),
   ('202401181046','202401181046'),
   ('202401181047', '202401181047'),
   ('202401181048','202401181048');

INSERT INTO `admins` (Id, UserId)
VALUES
  ('202401181038','202401181038'),

INSERT INTO `comments` (`PostId`, `UserId`, `CommentContent`) VALUES 
(1, '202401181044', 'This is a greate website'),
(1, '202401181045', 'Great post!'),
(2, '202401181046', 'I have a question. Can you explain further?'),
(3, '202401181047', 'Thanks for sharing this information.'),
(3, '202401181048', 'I disagree with your point of view.');

INSERT INTO `posts` (`UserId`, `Content`, `Url_Image`) VALUES 
('202401181044', 'I Want to say Thank you for the flatform. It make me an easy-to-find mental health doctor. Thanks', 'https://res.cloudinary.com/dttfevbw6/image/upload/v1705565184/MentalHealthCare/fcr21v5oqgmatlqypjop.jpg'),
('202401181045', 'My Mental Heath is better', 'https://res.cloudinary.com/dttfevbw6/image/upload/v1705565184/MentalHealthCare/urjaedqxuknbsqbvagwo.jpg'),
('202401181046', 'What should I do if my son don`t want to talk with any person?', 'https://res.cloudinary.com/dttfevbw6/image/upload/v1705566121/MentalHealthCare/pf07ekq7aa8lsudijkx1.png'),
('202401181047', 'I just want to say thank you', Null),
('202401181048', 'Hoping the website anh the hospital is better', NULL);


INSERT INTO `listtimeDoctor` (time, price) VALUES 
    ('08:00:00', 500.00),
    ('09:00:00', 500.00),
    ('10:00:00', 500.00),
    ('11:00:00', 500.00),
    ('12:00:00', 500.00),
    ('13:00:00', 500.00),
    ('14:00:00', 500.00),
    ('15:00:00', 500.00),
    ('16:00:00', 500.00),
    ('17:00:00', 500.00)

INSERT INTO `booking`(Id, PatientId, DoctorId, TimeBooking, DateBooking, TotalPrice)
VALUES
   ('1', '202401181044', '202401181049', '11:00:00', '2023-08-01', 500.00),
   ('2', '202401181044', '202401181040', '10:00:00', '2023-18-01', 00.00),
   ('3', '202401181044', '202401181042', '09:00:00', '2023-25-01', 500.00),
   ('4', '202401181044', '202401181043', '10:00:00', '2023-15-01', 500.00),
   ('5', '202401181044', '202401181041', '09:00:00', '2023-20-01', 500.00)