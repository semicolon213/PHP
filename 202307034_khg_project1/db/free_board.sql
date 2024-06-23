create table free_board(
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

alter table free_board 
    add constraint fr_name_fk
    foreign key(id) references members(id)
    on update cascade on delete set null;