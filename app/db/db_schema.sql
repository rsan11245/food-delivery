CREATE TABLE `roles`
(
    id   INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE `users`
(
    id        INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(50)  NOT NULL,
    lastName  VARCHAR(50)  NOT NULL,
    email     VARCHAR(100) NOT NULL UNIQUE,
    password  VARCHAR(100) NOT NULL,
    phone     VARCHAR(100) NOT NULL UNIQUE,
    role_id   INT          NOT NULL DEFAULT 2,
    FOREIGN KEY (role_id) REFERENCES roles (id)
);
