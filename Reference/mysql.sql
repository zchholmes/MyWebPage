CREATE TABLE User (
 userID INT NOT NULL AUTO_INCREMENT,
 firstName VARCHAR(40),
 lastName VARCHAR(40),
 email VARCHAR(40),
 homeAddress VARCHAR(40),
 homePhone CHAR(13),
 cellPhone CHAR(13),
 PRIMARY KEY (userID)
);

INSERT INTO User (firstName, lastName, email, homeAddress, homePhone, cellPhone) VALUES 
("John", "Creek", "johncreek@cmpe272.cmpe272", "12-345678 Some St. CA 67890", "2345232353", "6276791243"),
("Steven", "White", "stevenw@cmpe272.cmpe272", "56-78 Some St. CO 67891", "2356437547", "2346476596"),
("Thomas", "Sinn", "thomass@cmpe272.cmpe272", "123-4678 Some St. IL 67891", "4524575744", "8664574564"),
("Eva", "Cook", "evac@cmpe272.cmpe272", "12-4 Some St. IL 67892", "1242343463", "3464363466"),
("Josh", "Holmes", "joshh@cmpe272.cmpe272", "4215-678 Some St. TX 67892", "2345252352", "2352341516"),
("Mike", "Lee", "mikel@cmpe272.cmpe272", "1234-8765 Some St. TX 67850", "1424564565", "5483464545"),
("Baraha", "Mohamodh", "baraham@cmpe272.cmpe272", "1-78 Some St. IL 67850", "2344433322", "4364564566"),
("Feng", "Lao", "fengl@cmpe272.cmpe272", "14-8 Some St. VA 67850", "7655678888", "9877894567"),
("Rich", "Jin", "richj@cmpe272.cmpe272", "134-567 Some St. NH 67840", "5675675677", "9774567686"),
("Martin", "Evans", "martine@cmpe272.cmpe272", "1235-67478 Some St. MX 37890", "2532563463", "4754363255"),
("Leo", "Kent", "leok@cmpe272.cmpe272", "124-325 Some St. CA 67190", "6346474848", "4566759677"),
("Qi", "Sun", "qis@cmpe272.cmpe272", "164-63 Some St. CO 67234", "1415265748", "4574562462"),
("Jung", "Kim", "jungk@cmpe272.cmpe272", "78-35678 Some St. HI 97890", "2357377457", "4574566796"),
("Owen", "Washington", "owenw@cmpe272.cmpe272", "254-5678 Some St. NY 67340", "4574564574", "3746343574"),
("Ashley", "Jackson", "ashleyj@cmpe272.cmpe272", "24-5678 Some St. CA 64390", "6344563467", "7533464564"),
("Bruce", "Wood", "brucew@cmpe272.cmpe272", "12-38 Some St. IL 52890", "5422463463", "3456244563"),
("Jack", "Filed", "jackf@cmpe272.cmpe272", "34-5 Some St. IN 71290", "5233453473", "1234323464"),
("Zack", "Gold", "zackg@cmpe272.cmpe272", "145-678 Some St. CA 67836", "6422454577", "2644563463"),
("Jason", "Bond", "jasonb@cmpe272.cmpe272", "12-5678 Some St. WA 23590", "2526374574", "4574573465"),
("Abe", "Bone", "abeb@cmpe272.cmpe272", "123-456 Some St. CA 67620", "2535676879", "4574574686"),
("Winston", "Hart", "winstonh@cmpe272.cmpe272", "45-678 Some St. MI 54890", "4754574757", "3463465678");


CREATE TABLE Product (
	productID INT NOT NULL AUTO_INCREMENT,
	productName VARCHAR(100),
	description VARCHAR(400),
	priceOrig FLOAT(10),
	priceNew FLOAT(10),
	quantity INT,
	rate FLOAT(10),
	rated INT,
	viewed INT,
	smallPicUrl VARCHAR(100),
	largePicUrl VARCHAR(100),
	PRIMARY KEY (productID)
);

INSERT INTO Product (productName, description, priceOrig, priceNew, quantity, rate, rated, viewed, smallPicUrl, largePicUrl) VALUES
("C/C++ 101", "&*&Quick C/C++ introduction from zero C/C++ knowledge base", 29.99, 19.99, 999, 4.87, 101, 402, "/Pic/small/cpp.png", "/Pic/large/cpp.png"),
("Java 101", "&*&Quick Java introduction from zero Java knowledge base", 29.99, 19.99, 999, 4.87, 101, 402, "/Pic/small/java.png", "/Pic/large/java.png"),
("Python 101", "&*&Quick Python introduction from zero Python knowledge base", 29.99, 19.99, 999, 4.87, 101, 402, "/Pic/small/python.png", "/Pic/large/python.png"),
("PHP 101", "&*&Quick PHP introduction from zero PHP knowledge base", 29.99, 19.99, 999, 4.87, 101, 402, "/Pic/small/php.png", "/Pic/large/php.png"),
("MySQL 101", "&*&Quick MySQL introduction from zero MySQL knowledge base", 49.99, 29.99, 999, 4.87, 101, 402, "/Pic/small/mysql.png", "/Pic/large/mysql.png"),
("MongoDB 101", "&*&Quick MongoDB introduction from zero MongoDB knowledge base", 49.99, 29.99, 999, 4.87, 101, 402, "/Pic/small/mongodb.png", "/Pic/large/mongodb.png"),
("Redis 101", "&*&Quick Redis introduction from zero Redis knowledge base", 49.99, 29.99, 999, 4.87, 101, 402, "/Pic/small/redis.png", "/Pic/large/redis.png"),
("Oracle Database 101", "&*&Quick Oracle Database introduction from zero Oracle Database knowledge base", 49.99, 29.99, 999, 4.87, 101, 402, "/Pic/small/oracle.jpg", "/Pic/large/oracle.jpg"),
("SQL Server 101", "&*&Quick SQL Server introduction from zero SQL Server knowledge base", 49.99, 29.99, 999, 4.87, 101, 402, "/Pic/small/sqlserver.png", "/Pic/large/sqlserver.png"),
("PHP+MySQL", "&*&Combination PHP and MySQL professional Course. &*&Include how to use each techniques, how to apply proper PHP together with MySQL and the advatages of the combination", 49.99, 29.99, 999, 4.87, 101, 402, "/Pic/small/php_mysql.png", "/Pic/large/php_mysql.png");








