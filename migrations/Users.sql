create table users
(
    id       bigint unsigned auto_increment
        primary key,
    login    varchar(255) not null UNIQUE,
    password text         not null
);