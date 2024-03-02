CREATE TABLE `roles`
(
    id   INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE `users`
(
    id        INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(50),
    lastName  VARCHAR(50),
    email     VARCHAR(100) UNIQUE,
    password  VARCHAR(100) NOT NULL,
    phone     VARCHAR(100) NOT NULL UNIQUE,
    role_id   INT          NOT NULL DEFAULT 2,
    FOREIGN KEY (role_id) REFERENCES roles (id)
);
