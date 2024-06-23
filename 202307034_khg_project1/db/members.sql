create table members(
    num int(10) auto_increment primary key,
    id varchar(20) not null unique,
    pass varchar(20) not null,
    name varchar(10) not null,
    email varchar(80),
    phone varchar(11) default '01000000000',
    address varchar(100),
    introduce varchar(100),
    gender varchar(1) not null,
    hobbys varchar(100) not null,
    img varchar(100),
    level int(1) not null,
    point int(10) default 0,
    regist_day TIMESTAMP not null default CURRENT_TIMESTAMP
);