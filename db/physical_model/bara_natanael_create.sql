-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2020-12-29 23:16:46.999

-- tables
-- Table: programming_language
CREATE TABLE programming_language (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    hour_cost int NOT NULL,
    CONSTRAINT programming_language_pk PRIMARY KEY (id)
);

-- Table: sessions
CREATE TABLE sessions (
    id int NOT NULL AUTO_INCREMENT,
    students_programming_languages_id int NOT NULL,
    session_time int NOT NULL,
    price_hour int NOT NULL,
    paid int NOT NULL,
    session_data_plc TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    session_data_sch timestamp NOT NULL,
    session_data_act timestamp NOT NULL,
    status boolean NOT NULL,
    CONSTRAINT sessions_pk PRIMARY KEY (id)
);

-- Table: students
CREATE TABLE students (
    id int NOT NULL AUTO_INCREMENT,
    first_name varchar(100) NOT NULL,
    last_name varchar(100) NOT NULL,
    gender char(1) NOT NULL,
    phone varchar(14) NOT NULL,
    email varchar(100) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    active_status boolean NOT NULL,
    CONSTRAINT students_pk PRIMARY KEY (id)
);

-- Table: students_programming_languages
CREATE TABLE students_programming_languages (
    id int NOT NULL AUTO_INCREMENT,
    students_id int NOT NULL,
    programming_language_id int NOT NULL,
    CONSTRAINT students_programming_languages_pk PRIMARY KEY (id)
);

-- foreign keys
-- Reference: sessions_students_programming_languages (table: sessions)
ALTER TABLE sessions ADD CONSTRAINT sessions_students_programming_languages FOREIGN KEY sessions_students_programming_languages (students_programming_languages_id)
    REFERENCES students_programming_languages (id);

-- Reference: students_programming_languages_programming_language (table: students_programming_languages)
ALTER TABLE students_programming_languages ADD CONSTRAINT students_programming_languages_programming_language FOREIGN KEY students_programming_languages_programming_language (programming_language_id)
    REFERENCES programming_language (id);

-- Reference: students_programming_languages_students (table: students_programming_languages)
ALTER TABLE students_programming_languages ADD CONSTRAINT students_programming_languages_students FOREIGN KEY students_programming_languages_students (students_id)
    REFERENCES students (id);

-- End of file.

