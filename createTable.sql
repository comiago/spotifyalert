USE spotifyalert;

CREATE TABLE IF NOT EXISTS user(
    idUser INT NOT NULL AUTO_INCREMENT,
    fullName VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    approvated BOOLEAN DEFAULT false NOT NULL,
    role int NOT NULL DEFAULT 2,
	PRIMARY KEY (idUser)
);