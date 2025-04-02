/* 
User(PK(user_name), user_pw)
Link(PK(short_link), original_link, FK(user_name), n_visits)

il link shortato sarà l'md5 tra l'username e il link originale
*/

CREATE TABLE user_account
(
    user_name VARCHAR(40) PRIMARY KEY,
    user_pw VARCHAR(70) NOT NULL
);

CREATE TABLE link
(
    short_link VARCHAR(40) PRIMARY KEY,
    original_link VARCHAR(255) NOT NULL,
    user_name VARCHAR(40) NOT NULL,
    n_visits INT NOT NULL DEFAULT 0,

    FOREIGN KEY (user_name) REFERENCES user_account(user_name)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);