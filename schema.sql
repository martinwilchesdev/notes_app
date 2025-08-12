create table notes(
id int AUTO_INCREMENT PRIMARY KEY,
uuid varchar(255) not null unique,
title varchar(255) not null,
content text not null,
updated_at timestamp default CURRENT_TIMESTAMP
);
