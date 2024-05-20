create table client_role (
	id serial not null,
	name varchar,
	PRIMARY KEY(id)
);

insert into client_role
(id, name)
values
(1, 'professor'),
(2, 'student'),
(3, 'moderator');


create table client (
	id serial not null,
	full_name varchar not null,
	login varchar unique not null,
	password varchar not null,
	salt varchar not null,
	role_id int not null references client_role(id),
	deleted bool not null default false,
	PRIMARY KEY(id)
);

insert into client
(full_name, login, password, salt, role_id)
values
('Mikhail The Moderator', 'mikeyadmin', '$2y$10$3.JYgEyCYpcyRGxaKQBE5uqps7eK3/y7XIfZqb9cJX/RWEYM3ZGWy', '355994521b84b4fc39513963e7c94174', 3),  -- admin
('Some User The Professor', 'someprof', '$2y$10$YmVql5TG15VkT4ucS0IT7eFWin3G7pADOWB3hwtjEFLr2Z9P.1KMK', 'aed6ed342d16d619d78be9c3d4d47e9c', 2), -- notadmin
('Who is this The Student', 'student', '$2y$10$Ah7zVDWpOSTnbX.M9YuhieLqk9g03Dfm9XBIbqtEgP5ZRIZ5O/2iO', '512267a47bb4ee0a73805baad74d6748', 1); -- student

create table cookie (
	id uuid unique not null default gen_random_uuid(),
	user_id int not null,
	created_at timestamp not null default now(),
	disabled bool not null,
	PRIMARY KEY(id)
);
