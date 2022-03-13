CREATE TABLE `app`.`Company` (
    `CodeCompany` INT NOT NULL AUTO_INCREMENT,
    `nameCompany` VARCHAR(45) NOT NULL,
    `Country` VARCHAR(45) NULL,
    `DateTime` DATETIME NULL,
    PRIMARY KEY (`CodeCompany`),
    UNIQUE INDEX `nameCompany_UNIQUE` (`nameCompany` ASC) VISIBLE,
    UNIQUE INDEX `CodeCompany_UNIQUE` (`CodeCompany` ASC) VISIBLE
);

CREATE TABLE `app`.`Security` (
    `CodeSecurity` INT NOT NULL AUTO_INCREMENT,
    `Instrument` VARCHAR(45) NULL,
    `Bid` VARCHAR(45) NULL,
    `Ask` VARCHAR(45) NULL,
    `yield` VARCHAR(45) NULL,
    `High` VARCHAR(45) NULL,
    `Low` VARCHAR(45) NULL,
    `Currency` VARCHAR(45) NULL,
    `DataPrice` VARCHAR(45) NULL,
    `TimePrice` VARCHAR(45) NULL,
    PRIMARY KEY (`CodeSecurity`),
    UNIQUE INDEX `CodeSecurity_UNIQUE` (`CodeSecurity` ASC) VISIBLE
);

CREATE TABLE `app`.`CompanySecurity` (
    `CodeCompanySecurity` INT NOT NULL AUTO_INCREMENT,
    `CodeCompany` INT NULL,
    `CodeSecurity` INT NULL,
    `DateTime` DATETIME NULL,
    PRIMARY KEY (`CodeCompanySecurity`),
    INDEX `FK_idx` (`CodeCompany` ASC) VISIBLE,
    INDEX `FK_Security_idx` (`CodeSecurity` ASC) VISIBLE,
    CONSTRAINT `FK_Company` FOREIGN KEY (`CodeCompany`) REFERENCES `app`.`Company` (`CodeCompany`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `FK_Security` FOREIGN KEY (`CodeSecurity`) REFERENCES `app`.`Security` (`CodeSecurity`) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO `app`.`Company` ( `nameCompany`, `Country`, `DateTime`) VALUES ('Moon', 'SP', '2022-03-12');
INSERT INTO `app`.`Company` ( `nameCompany`, `Country`, `DateTime`) VALUES ('Sun', 'FR', '2021-03-05');
INSERT INTO `app`.`Company` (`nameCompany`, `Country`, `DateTime`) VALUES ('Star', 'NY', '2018-12-03');
INSERT INTO `app`.`Company` (`nameCompany`, `Country`, `DateTime`) VALUES ('Sky', 'SP', '2019-10-20');

INSERT INTO `app`.`Security` (`Instrument`, `Bid`, `Ask`, `yield`, `High`, `Low`, `Currency`, `DataPrice`, `TimePrice`) VALUES ('test1', '1', 'ask', '1', '2', '3', 'dolar', 'asd', 'dd');
INSERT INTO `app`.`Security` (`Instrument`, `Bid`, `Ask`, `Currency`, `DataPrice`) VALUES ('test2', '2', 'ask', 'euro', '12');
INSERT INTO `app`.`Security` (`Instrument`, `Bid`, `Ask`, `yield`, `High`, `Low`, `Currency`, `DataPrice`) VALUES ('test3', '3', 'askj', '23', '12', '32', 'euro', '13');
INSERT INTO `app`.`Security` (`Instrument`, `Bid`, `Ask`, `Currency`, `DataPrice`, `TimePrice`) VALUES ('test4', '4', '5', 'dolar', '123', '3');
INSERT INTO `app`.`Security` (`Instrument`, `Bid`, `Ask`, `yield`, `High`, `Low`, `Currency`, `DataPrice`) VALUES ('test5', '1', '2', '3', '4', 'asd', 'c', '123');
INSERT INTO `app`.`Security` (`Instrument`, `Bid`, `Ask`, `yield`, `High`) VALUES ('test6', '15', '3', '4', '1');
INSERT INTO `app`.`Security` (`Instrument`, `Bid`, `Ask`, `yield`, `High`, `Low`, `Currency`) VALUES ('test7', '2', 'ask', '222', '31', '2', '3');
INSERT INTO `app`.`Security` (`Instrument`, `Bid`, `Ask`, `yield`) VALUES ('test8', '1', '32', '3');

INSERT INTO `app`.`CompanySecurity` (`CodeCompany`, `CodeSecurity`, `DateTime`) VALUES ('1', '1', '2022-01-12');
INSERT INTO `app`.`CompanySecurity` (`CodeCompany`, `CodeSecurity`, `DateTime`) VALUES ('1', '2', '2022-02-16');
INSERT INTO `app`.`CompanySecurity` (`CodeCompany`, `CodeSecurity`, `DateTime`) VALUES ('1', '6', '2022-03-12');
INSERT INTO `app`.`CompanySecurity` (`CodeCompany`, `CodeSecurity`, `DateTime`) VALUES ('2', '3', '2019-01-12');
INSERT INTO `app`.`CompanySecurity` (`CodeCompany`, `CodeSecurity`, `DateTime`) VALUES ('3', '4', '2021-12-05');
INSERT INTO `app`.`CompanySecurity` (`CodeCompany`, `CodeSecurity`, `DateTime`) VALUES ('4', '5', '2022-01-20');
INSERT INTO `app`.`CompanySecurity` (`CodeCompany`, `CodeSecurity`, `DateTime`) VALUES ('4', '7', '2020-08-19');
INSERT INTO `app`.`CompanySecurity` (`CodeCompany`, `CodeSecurity`, `DateTime`) VALUES ('3', '8', '2022-01-12');

