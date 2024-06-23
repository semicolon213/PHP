create table message(
    num int(10) auto_increment primary key,
    send_id varchar(20),
    rv_id varchar(20),
    title varchar(200) not null,
    msg text not null,
    regist_day TIMESTAMP not null default CURRENT_TIMESTAMP
);

alter table message 
    add constraint msg_send_id_fk
    foreign key(send_id) references members(id)
    on update cascade on delete set null;

alter table message 
    add constraint msg_rv_id_fk
    foreign key(rv_id) references members(id)
    on update cascade on delete set null;