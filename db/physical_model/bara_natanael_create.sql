-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2020-12-30 10:17:15.957

-- tables
-- Table: programming_language
CREATE TABLE programming_language (
    id int NOT NULL AUTO_INCREMENT,
    name int NOT NULL,
    hour_cost int NOT NULL,
    date_time timestamp NOT NULL,
    CONSTRAINT programming_language_pk PRIMARY KEY (id)
);

-- Table: sessions
CREATE TABLE sessions (
    id int NOT NULL AUTO_INCREMENT,
    students_programming_languages_id int NOT NULL,
    session_time int NOT NULL,
    price_hour int NOT NULL,
    paid int NOT NULL,
    session_data_plc timestamp NOT NULL,
    session_data_sch timestamp NOT NULL,
    session_data_act timestamp NOT NULL,
    status boolean NOT NULL,
    teacher_id int NOT NULL,
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
    registration_date timestamp NOT NULL,
    active_status boolean NOT NULL DEFAULT TRUE,
    CONSTRAINT students_pk PRIMARY KEY (id)
);

-- Table: students_programming_languages
CREATE TABLE students_programming_languages (
    id int NOT NULL AUTO_INCREMENT,
    students_id int NOT NULL,
    programming_language_id int NOT NULL,
    CONSTRAINT students_programming_languages_pk PRIMARY KEY (id)
);

-- Table: teacher
CREATE TABLE teacher (
    id int NOT NULL AUTO_INCREMENT,
    first_name varchar(100) NOT NULL,
    last_name varchar(100) NOT NULL,
    gender char(1) NOT NULL,
    phone varchar(20) NOT NULL,
    email varchar(100) NOT NULL,
    registration_date timestamp NOT NULL,
    active_status boolean NOT NULL DEFAULT TRUE,
    teacher_settings_id int NOT NULL,
    CONSTRAINT teacher_pk PRIMARY KEY (id)
);

-- Table: teacher_settings
CREATE TABLE teacher_settings (
    id int NOT NULL AUTO_INCREMENT,
    themes_id int NOT NULL,
    CONSTRAINT teacher_settings_pk PRIMARY KEY (id)
);

-- Table: themes
CREATE TABLE themes (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    primary_color varchar(7) NOT NULL,
    secondary_color varchar(7) NOT NULL,
    third_color varchar(7) NOT NULL,
    primary_font_color varchar(7) NOT NULL,
    secondary_font_color varchar(7) NOT NULL,
    thirt_font_color varchar(7) NOT NULL,
    plus1 varchar(7) NOT NULL,
    plus2 varchar(7) NOT NULL,
    plus3 varchar(7) NOT NULL,
    CONSTRAINT themes_pk PRIMARY KEY (id)
);

-- foreign keys
-- Reference: sessions_students_programming_languages (table: sessions)
ALTER TABLE sessions ADD CONSTRAINT sessions_students_programming_languages FOREIGN KEY sessions_students_programming_languages (students_programming_languages_id)
    REFERENCES students_programming_languages (id);

-- Reference: sessions_teacher (table: sessions)
ALTER TABLE sessions ADD CONSTRAINT sessions_teacher FOREIGN KEY sessions_teacher (teacher_id)
    REFERENCES teacher (id);

-- Reference: students_programming_languages_programming_language (table: students_programming_languages)
ALTER TABLE students_programming_languages ADD CONSTRAINT students_programming_languages_programming_language FOREIGN KEY students_programming_languages_programming_language (programming_language_id)
    REFERENCES programming_language (id);

-- Reference: students_programming_languages_students (table: students_programming_languages)
ALTER TABLE students_programming_languages ADD CONSTRAINT students_programming_languages_students FOREIGN KEY students_programming_languages_students (students_id)
    REFERENCES students (id);

-- Reference: teacher_settings_themes (table: teacher_settings)
ALTER TABLE teacher_settings ADD CONSTRAINT teacher_settings_themes FOREIGN KEY teacher_settings_themes (themes_id)
    REFERENCES themes (id);

-- Reference: teacher_teacher_settings (table: teacher)
ALTER TABLE teacher ADD CONSTRAINT teacher_teacher_settings FOREIGN KEY teacher_teacher_settings (teacher_settings_id)
    REFERENCES teacher_settings (id);

-- End of file.

