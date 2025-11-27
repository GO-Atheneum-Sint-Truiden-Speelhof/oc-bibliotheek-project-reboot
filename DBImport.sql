CREATE TABLE `Book` (
  `ID` INT,
  `Title` TINYTEXT,
  `Author` TINYTEXT,
  `Summary` MEDIUMTEXT,
  `ISBN` TINYTEXT,
  `RentedOut` BOOLEAN,
  `Cover` TINYTEXT,
  `QR` TINYTEXT,
  `Genre` TEXT,
  `Pages` INT,
  `Age` INT,
  PRIMARY KEY (`ID`)
);

CREATE TABLE `Rented` (
  `RentedID` INT,
  `BookID` INT,
  `StudentID` INT,
  `Date` DATETIME,
  PRIMARY KEY (`RentedID`),
  FOREIGN KEY (`BookID`)
      REFERENCES `Book`(`ID`)
);

CREATE TABLE `Student` (
  `ID` INT,
  `Surname` TINYTEXT,
  `Lastname` TINYTEXT,
  `Class` TINYTEXT,
  `Email` TINYTEXT,
  PRIMARY KEY (`ID`),
  FOREIGN KEY (`ID`)
      REFERENCES `Rented`(`StudentID`)
);

CREATE TABLE `User` (
  `ID` INT,
  `Username` TINYTEXT,
  `Password` TINYTEXT,
  `Rol` TINYTEXT,
  PRIMARY KEY (`ID`)
);

CREATE TABLE `Category` (
  `ID` INT,
  `Name` TINYTEXT,
  PRIMARY KEY (`ID`)
);

