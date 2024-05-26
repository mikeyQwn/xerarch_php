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
('Some User The Professor', 'someprof', '$2y$10$YmVql5TG15VkT4ucS0IT7eFWin3G7pADOWB3hwtjEFLr2Z9P.1KMK', 'aed6ed342d16d619d78be9c3d4d47e9c', 1), -- notadmin
('Who is this The Student', 'student', '$2y$10$Ah7zVDWpOSTnbX.M9YuhieLqk9g03Dfm9XBIbqtEgP5ZRIZ5O/2iO', '512267a47bb4ee0a73805baad74d6748', 2); -- student

create table cookie (
	id uuid unique not null default gen_random_uuid(),
	user_id int not null,
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

create table lesson_question(
	id serial not null,
	lesson_id int not null references lesson(id),
	question varchar not null,
	answer varchar not null,
	PRIMARY KEY(id)
);

create table lesson_answer(
	id serial not null,
	lesson_question_id int not null references lesson_question(id),
	client_id int not null references client(id),
	answer varchar not null,
	PRIMARY KEY(id)
);

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

insert into lesson_question
(lesson_id, question, answer)
values
(1, 'Math question 1', 'Math answer 1'),
(1, 'Math question 2', 'Math answer 2'),
(2, 'Math question 3', 'Math answer 3'),
(2, 'Math question 4', 'Math answer 4'),
(3, 'Physics question 1', 'Physics answer 1'),
(3, 'Physics question 2', 'Physics answer 2'),
(4, 'Physics question 3', 'Physics answer 3'),
(4, 'Physics question 4', 'Physics answer 4'),
(5, 'Chemistry question 1', 'Chemistry answer 1'),
(5, 'Chemistry question 2', 'Chemistry answer 2'),
(6, 'Chemistry question 3', 'Chemistry answer 3'),
(6, 'Chemistry question 4', 'Chemistry answer 4');

insert into course_client
(course_id, client_id)
values
(1, 2),
(2, 2),
(3, 2),
(1, 1),
(2, 1),
(3, 1);

