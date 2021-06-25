ALTER TABLE `employeedata`
  DROP `first_name`,
  DROP `father_name`,
  DROP `last_name`,
  DROP `email_address`,
  DROP `mobile_no`,
  DROP `aadhar_no`,
  DROP `emp_id`,
  DROP `dob`,
  DROP `qualification`,
  DROP `address`,
  DROP `city`,
  DROP `taluka`,
  DROP `district`,
  DROP `state`;

ALTER TABLE `employeedata` ADD `CNI` TEXT NOT NULL AFTER `pass`, ADD `nom` TEXT NOT NULL AFTER `CNI`, ADD `prenom` TEXT NOT NULL AFTER `nom`, ADD `email` TEXT NOT NULL AFTER `prenom`, ADD `mobile` TEXT NOT NULL AFTER `email`, ADD `dn` DATE NOT NULL AFTER `mobile`, ADD `poste` TEXT NOT NULL AFTER `dn`;
ALTER TABLE `employeedata` ADD `adresse` TEXT NOT NULL AFTER `poste`, ADD `ls` TEXT NOT NULL AFTER `adresse`, ADD `lp` TEXT NOT NULL AFTER `ls`;x
ALTER TABLE `manager` ADD `ls` VARCHAR(50) NOT NULL AFTER `age`, ADD `lp` VARCHAR(50) NOT NULL AFTER `ls`;
ALTER TABLE `employeedata` CHANGE `ID` `ID` INT NOT NULL, CHANGE `CNI` `CNI` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL, CHANGE `nom` `nom` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL, CHANGE `prenom` `prenom` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL, CHANGE `email` `email` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL, CHANGE `mobile` `mobile` VARCHAR(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL, CHANGE `poste` `poste` INT NOT NULL, CHANGE `adresse` `adresse` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL;

INSERT INTO `employeedata` (`ID`, `pass`, `CNI`, `nom`, `prenom`, `email`, `mobile`, `dn`, `poste`, `adresse`, `ls`, `lp`) VALUES ('1', 'rootadmin', 'C0116506915', 'Anoh', 'Gnamien Aime', 'anoh@gmail.com', '+2250501020304', '2021-06-08', '0', 'Bramacote', 'https://www.google.com/imgres?imgurl=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fcommons%2F8%2F84%2FRufus_Cabourg_2016.jpg&imgrefurl=https%3A%2F%2Ffr.wikipedia.org%2Fwiki%2FRufus&tbnid=1CoK2_-rBngmIM&vet=12ahUKEwjco93I4bDxAhUE_xoKHbA_A3gQMygUegUIARDYAQ..i&docid=A6Z4WN4ibgbK2M&w=563&h=800&q=rufus&ved=2ahUKEwjco93I4bDxAhUE_xoKHbA_A3gQMygUegUIARDYAQ', 'https://www.google.com/imgres?imgurl=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fcommons%2Fthumb%2F5%2F56%2FAutograph_of_Benjamin_Franklin.svg%2F1200px-Autograph_of_Benjamin_Franklin.svg.png&imgrefurl=https%3A%2F%2Ffr.wikipedia.org%2Fwiki%2FSignature&tbnid=RABSdz9UfwRXJM&vet=12ahUKEwi-77jk4bDxAhUMexoKHWu9AO8QMygBegUIARDAAQ..i&docid=0gDuvkWjckYKWM&w=1200&h=585&q=signature&ved=2ahUKEwi-77jk4bDxAhUMexoKHWu9AO8QMygBegUIARDAAQ');