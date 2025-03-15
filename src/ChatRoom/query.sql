CREATE TABLE account
(
	username_account VARCHAR(100) PRIMARY KEY,
    email VARCHAR(60) NOT NULL UNIQUE,
    password_account VARCHAR(150) NOT NULL,
);

CREATE TABLE room
(
    room_name VARCHAR(70) PRIMARY KEY
);

CREATE TABLE message
(
	id_message INT PRIMARY KEY AUTO_INCREMENT,
    content VARCHAR(300) NOT NULL,
    date_pub TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    username_account VARCHAR(100) NOT NULL,
    room_name VARCHAR(70) NOT NULL,
    
    FOREIGN KEY (username_account) REFERENCES account(username_account)
    	ON DELETE RESTRICT
    	ON UPDATE CASCADE,
    FOREIGN KEY (room_name) REFERENCES room(room_name)
    	ON DELETE CASCADE
    	ON UPDATE CASCADE
);