create table client_role (
	id serial not null,
	name varchar,
	PRIMARY KEY(id)
);


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

create table cookie (
	id uuid unique not null default gen_random_uuid(),
	user_id int not null references client(id),
	created_at timestamp not null default now(),
	disabled bool not null,
	PRIMARY KEY(id)
);

create table course(
	id serial not null,
	name varchar not null,
	description varchar not null,
	created_at timestamp not null default now(),
	created_by int not null references client(id),
	deleted bool not null default false,
	PRIMARY KEY(id)
);

create table course_client(
	id serial not null,
	course_id int not null references course(id),
	client_id int not null references client(id),
	PRIMARY KEY(id)
);


create table lesson(
	id serial not null,
	name varchar not null,
	course_id int not null references course(id),
	full_text varchar not null,
	created_at timestamp not null default now(),
	deleted bool not null default false,
	PRIMARY KEY(id)
);

create table test(
	id serial not null,
	course_id int not null references course(id),
	name varchar not null,
	created_at timestamp not null default now(),
	deleted bool not null default false,
	PRIMARY KEY(id)
);

create table question_type(
	id serial not null,
	name varchar not null,
	PRIMARY KEY(id)
);

create table test_question(
	id serial not null,
	test_id int not null references test(id),
	question varchar not null,
	question_type_id int not null references question_type(id),
	choices varchar[],
	answer varchar not null,
	PRIMARY KEY(id)
);

insert into client_role
(id, name)
values
(1, 'professor'),
(2, 'student'),
(3, 'moderator');

insert into client
(full_name, login, password, salt, role_id)
values
('Mikhail The Moderator', 'mikeyadmin', '$2y$10$3.JYgEyCYpcyRGxaKQBE5uqps7eK3/y7XIfZqb9cJX/RWEYM3ZGWy', '355994521b84b4fc39513963e7c94174', 3),  -- admin
('Some User The Professor', 'someprof', '$2y$10$YmVql5TG15VkT4ucS0IT7eFWin3G7pADOWB3hwtjEFLr2Z9P.1KMK', 'aed6ed342d16d619d78be9c3d4d47e9c', 1), -- notadmin
('Who is this The Student', 'student', '$2y$10$Ah7zVDWpOSTnbX.M9YuhieLqk9g03Dfm9XBIbqtEgP5ZRIZ5O/2iO', '512267a47bb4ee0a73805baad74d6748', 2); -- student



insert into question_type
(id, name)
values
(1, 'answer'),
(2, 'choice');


insert into course
(name, description, created_by)
values
('Math', 'Math course', 2),
('Physics', 'Physics course', 2),
('Chemistry', 'Chemistry course', 2);

insert into lesson
(name, course_id, full_text)
values
('Math lesson 1', 1, 'Math lesson 1 text'),
('Math lesson 2', 1, 'Math lesson 2 text'),
('Physics lesson 1', 2, 'Physics lesson 1 text'),
('Physics lesson 2', 2, 'Physics lesson 2 text'),
('Chemistry lesson 1', 3, 'Chemistry lesson 1 text'),
('Chemistry lesson 2', 3, 'Chemistry lesson 2 text');

insert into course_client
(course_id, client_id)
values
(1, 2),
(2, 2),
(3, 2),
(1, 3),
(2, 3),
(3, 3);

insert into test
(course_id, name)
values
(1, 'Math test 1'),
(1, 'Math test 2'),
(2, 'Physics test 1'),
(2, 'Physics test 2'),
(3, 'Chemistry test 1'),
(3, 'Chemistry test 2');
