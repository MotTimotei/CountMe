-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2020-12-28 18:32:42.829

-- tables
-- Table: programming_languages
CREATE TABLE programming_languages (
    id int NOT NULL,
    name varchar(30) NOT NULL,
    price_hour int NOT NULL,
    CONSTRAINT programming_languages_pk PRIMARY KEY (id)
);

-- Table: sessions
CREATE TABLE sessions (
    id_session int NOT NULL,
    students_id int NOT NULL,
    programming_languages_id int NOT NULL,
    session_time int NOT NULL,
    hour_cost int NOT NULL,
    paid int NOT NULL,
    session_data_placed timestamp NOT NULL,
    session_data_sch datetime NOT NULL,
    session_data_act datetime NOT NULL,
    session_status boolean NOT NULL,
    CONSTRAINT sessions_pk PRIMARY KEY (id_session)
);

-- Table: stud_langs
CREATE TABLE stud_langs (
    id int NOT NULL,
    students_id int NOT NULL,
    prog_lang_id int NOT NULL,
    CONSTRAINT stud_langs_pk PRIMARY KEY (id)
);

-- Table: stud_langs_programming_languages
CREATE TABLE stud_langs_programming_languages (
    stud_langs_id int NOT NULL,
    programming_languages_id int NOT NULL,
    CONSTRAINT stud_langs_programming_languages_pk PRIMARY KEY (stud_langs_id,programming_languages_id)
);

-- Table: stud_langs_students
CREATE TABLE stud_langs_students (
    stud_langs_id int NOT NULL,
    students_id int NOT NULL,
    CONSTRAINT stud_langs_students_pk PRIMARY KEY (stud_langs_id,students_id)
);

-- Table: students
CREATE TABLE students (
    id int NOT NULL,
    first_name varchar(20) NOT NULL,
    last_name varchar(20) NOT NULL,
    phone int NOT NULL,
    email varchar(100) NOT NULL,
    registration_date timestamp NOT NULL,
    active boolean NOT NULL,
    CONSTRAINT students_pk PRIMARY KEY (id)
);

-- foreign keys
-- Reference: sessions_programming_languages (table: sessions)
ALTER TABLE sessions ADD CONSTRAINT sessions_programming_languages FOREIGN KEY sessions_programming_languages (programming_languages_id)
    REFERENCES programming_languages (id);

-- Reference: sessions_students (table: sessions)
ALTER TABLE sessions ADD CONSTRAINT sessions_students FOREIGN KEY sessions_students (students_id)
    REFERENCES students (id);

-- Reference: stud_langs_programming_languages_programming_languages (table: stud_langs_programming_languages)
ALTER TABLE stud_langs_programming_languages ADD CONSTRAINT stud_langs_programming_languages_programming_languages FOREIGN KEY stud_langs_programming_languages_programming_languages (programming_languages_id)
    REFERENCES programming_languages (id);

-- Reference: stud_langs_programming_languages_stud_langs (table: stud_langs_programming_languages)
ALTER TABLE stud_langs_programming_languages ADD CONSTRAINT stud_langs_programming_languages_stud_langs FOREIGN KEY stud_langs_programming_languages_stud_langs (stud_langs_id)
    REFERENCES stud_langs (id);

-- Reference: stud_langs_students_stud_langs (table: stud_langs_students)
ALTER TABLE stud_langs_students ADD CONSTRAINT stud_langs_students_stud_langs FOREIGN KEY stud_langs_students_stud_langs (stud_langs_id)
    REFERENCES stud_langs (id);

-- Reference: stud_langs_students_students (table: stud_langs_students)
ALTER TABLE stud_langs_students ADD CONSTRAINT stud_langs_students_students FOREIGN KEY stud_langs_students_students (students_id)
    REFERENCES students (id);

-- End of file.

