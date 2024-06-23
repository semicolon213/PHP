create table musician_board(
    num int(10) auto_increment primary key,
    id varchar(20),
    name varchar(10) not null,
    title varchar(10) not null,
    content text not null,
    rigist_day TIMESTAMP not null default CURRENT_TIMESTAMP,
    view_cnt int(10) not null,
    file_name char(40),
    file_type char(40),
    file_copied char(40)
);

ALTER TABLE musician_board 
    ADD CONSTRAINT mu_id_fk 
    FOREIGN KEY (id) REFERENCES members(id) 
    ON DELETE SET NULL ON UPDATE CASCADE;