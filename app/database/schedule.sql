-- Create table lessen
DROP TABLE IF EXISTS `easydriveforall`.`lessen`;
CREATE TABLE `easydriveforall`.`lessen` 
( `id` INT(10) NOT NULL AUTO_INCREMENT , 
`datum` DATE NOT NULL , 
`leerling` INT(10) NOT NULL , 
`instructeur1` VARCHAR(200) NOT NULL , 
PRIMARY KEY (`id`)) 
ENGINE = InnoDB CHARSET=latin1;

-- Insert data to table lessen
INSERT INTO `lessen` 
(`id`, `datum`, `leerling`, `instructeur1`) 
VALUES 
('45', '2022-05-20', '3', 'groen@mail.nl'), 
('46', '2022-05-20', '6', 'frasi@google.sp'),
('47', '2022-05-21', '4', 'konijn@google.com'),
('48', '2022-05-21', '6', 'frasi@google.sp'),
('49', '2022-05-22', '3', 'groen@mail.nl'),
('50', '2022-05-28', '4', 'konijn@google.com'),
('51', '2022-06-01', '3', 'konijn@google.com'),
('52', '2022-06-12', '3', 'groen@mail.nl'),
('53', '2022-06-12', '3', 'groen@mail.nl');

-- Create table instructeur1
DROP TABLE IF EXISTS `easydriveforall`.`instructeur1`;
CREATE TABLE `easydriveforall`.`instructeur1` 
( `email` varchar(200) NOT NULL , 
`naam` varchar(200) NOT NULL,
PRIMARY KEY(`email`)) 
ENGINE = InnoDB CHARSET=latin1;

-- Insert data to table instructeur1
INSERT INTO `instructeur1` 
(`email`, `naam`) 
VALUES 
('groen@mail.nl', 'Groen'), 
('konijn@google.com', 'Konijn'), 
('frasi@google.sp', 'Frasi');

-- Create table leerling
DROP TABLE IF EXISTS `easydriveforall`.`leerling`;
CREATE TABLE `easydriveforall`.`leerling` 
( `id` int(10) NOT NULL AUTO_INCREMENT, 
`naam` varchar(200) NOT NULL,
PRIMARY KEY(`id`)) 
ENGINE = InnoDB CHARSET=latin1;

-- Insert data to table leerling
INSERT INTO `leerling` 
(`id`, `naam`) 
VALUES 
('3', 'Konijn'), 
('4', 'Slavink'), 
('6', 'Otto');

-- Create table onderwerpen
DROP TABLE IF EXISTS `easydriveforall`.`onderwerpen`;
CREATE TABLE `easydriveforall`.`onderwerpen` 
( `id` int(10) NOT NULL AUTO_INCREMENT, 
`les` int(10) NOT NULL,
`onderwerp` varchar(200) NOT NULL,
PRIMARY KEY(`id`)) 
ENGINE = InnoDB CHARSET=latin1;

-- Insert data to table onderwerpen
INSERT INTO `onderwerpen` 
(`id`, `les`, `onderwerp`) 
VALUES ('2343', '45', 'File parkeren'), 
('2344', '46', 'Achteruit rijden'), 
('2345', '49', 'File parkeren'), 
('2346', '49', 'Invoegen snelweg'), 
('2347', '50', 'Achteruit rijden'), 
('2348', '52', 'Achteruit rijden'), 
('2349', '52', 'Invoegen snelweg'), 
('2350', '52', 'File parkeren');

-- Create table opmerkingen
DROP TABLE IF EXISTS `easydriveforall`.`opmerkingen`;
CREATE TABLE `easydriveforall`.`opmerkingen` 
( `id` int(10) NOT NULL AUTO_INCREMENT, 
`les` int(10) NOT NULL,
`opmerking` varchar(200) NOT NULL,
PRIMARY KEY(`id`)) 
ENGINE = InnoDB CHARSET=latin1;

-- Insert data to table opmerkingen
INSERT INTO `opmerkingen` 
(`id`, `les`, `opmerking`) 
VALUES 
('1123', '45', 'File parkeren kan beter'), 
('1124', '46', 'Beter in spiegel kijken'), 
('1125', '49', 'Opletten op aankomend verkeer'), 
('1126', '49', 'Langer doorrijden bij invoegen'), 
('1127', '50', 'Langzaam aan'), 
('1128', '52', 'Beter in spiegels kijken'), 
('1129', '52', 'richtingaanwijzer aan');

-- Add foreign key constraint to lessen.instructeur1
ALTER TABLE `lessen`
  ADD CONSTRAINT `fk_lessen_instructeur1` 
    FOREIGN KEY (`instructeur1`) 
    REFERENCES `instructeur1` (`email`);

-- Add foreign key constraint to onderwerpen.les
ALTER TABLE `onderwerpen`
  ADD CONSTRAINT `fk_onderwerpen_les_id`
    FOREIGN KEY (`les`)
    REFERENCES `lessen` (`id`);

-- Add foreign key constraint to opmerkingen.les
ALTER TABLE `opmerkingen`
  ADD CONSTRAINT `fk_opmerkingen_les_id`
    FOREIGN KEY (`les`)
    REFERENCES `lessen` (`id`);