-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2021-01-03 20:32:42.852

-- database

CREATE DATABASE bara_natanael;

-- tables
-- Table: sessions
CREATE TABLE sessions (
    id int NOT NULL AUTO_INCREMENT,
    student_class_id int NOT NULL,
    session_time int NOT NULL,
    price_hour int NOT NULL,
    paid int NOT NULL,
    session_data_plc timestamp NOT NULL,
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
    registration_date timestamp NOT NULL,
    active_status boolean NOT NULL DEFAULT true,
    CONSTRAINT students_pk PRIMARY KEY (id)
);

-- Table: student_class
CREATE TABLE student_class (
    id int NOT NULL AUTO_INCREMENT,
    students_id int NOT NULL,
    teacher_class_id int NOT NULL,
    CONSTRAINT student_class_pk PRIMARY KEY (id)
);

-- Table: teacher_class
CREATE TABLE teacher_class(
    id int NOT NULL AUTO_INCREMENT,
    teacher_id int NOT NULL,
    name varchar(100) NOT NULL,
    session_time int NOT NULL,
    hour_cost int NOT NULL,
    date_time timestamp NOT NULL,
    CONSTRAINT teacher_class_pk PRIMARY KEY (id)
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
    active_status boolean NOT NULL DEFAULT true,
    CONSTRAINT teacher_pk PRIMARY KEY (id)
);

-- Table: teacher_settings
CREATE TABLE teacher_settings (
    id int NOT NULL AUTO_INCREMENT,
    teacher_id int NOT NULL,
    themes_id int NOT NULL,
    date_time timestamp NOT NULL,
    CONSTRAINT teacher_settings_pk PRIMARY KEY (id)
);

-- Table: themes
CREATE TABLE themes (
    id int NOT NULL AUTO_INCREMENT,
    teacher_id int NOT NULL,
    name varchar(30) NOT NULL,
    primary_color varchar(7) NOT NULL,
    secondary_color varchar(7) NOT NULL,
    third_color varchar(7) NOT NULL,
    primary_font_color varchar(7) NOT NULL,
    secondary_font_color varchar(7) NOT NULL,
    thirt_font_color varchar(7) NOT NULL,
    plus1 varchar(7) NOT NULL,
    plus2 varchar(7) NOT NULL,
    plus3 varchar(7) NOT NULL,
    data_time timestamp NOT NULL,
    CONSTRAINT themes_pk PRIMARY KEY (id)
);

-- foreign keys
-- Reference: sessions_student_class (table: sessions)
ALTER TABLE sessions ADD CONSTRAINT sessions_student_class FOREIGN KEY sessions_student_class (student_class_id)
    REFERENCES student_class (id);

-- Reference: student_class_teacher_class(table: student_class)
ALTER TABLE student_class ADD CONSTRAINT student_class_teacher_class FOREIGN KEY student_class_teacher_class(teacher_class_id)
    REFERENCES teacher_class(id);

-- Reference: student_class_students (table: student_class)
ALTER TABLE student_class ADD CONSTRAINT student_class_students FOREIGN KEY student_class_students (students_id)
    REFERENCES students (id);

-- Reference: teacher_class_teacher (table: teacher_class)
ALTER TABLE teacher_class ADD CONSTRAINT teacher_class_teacher FOREIGN KEY teacher_class_teacher (teacher_id)
    REFERENCES teacher (id);

-- Reference: teacher_settings_teacher (table: teacher_settings)
ALTER TABLE teacher_settings ADD CONSTRAINT teacher_settings_teacher FOREIGN KEY teacher_settings_teacher (teacher_id)
    REFERENCES teacher (id);

-- Reference: teacher_settings_themes (table: teacher_settings)
ALTER TABLE teacher_settings ADD CONSTRAINT teacher_settings_themes FOREIGN KEY teacher_settings_themes (themes_id)
    REFERENCES themes (id);

-- Reference: themes_teacher (table: themes)
ALTER TABLE themes ADD CONSTRAINT themes_teacher FOREIGN KEY themes_teacher (teacher_id)
    REFERENCES teacher (id);




-- Inserting data into tables
-- Inserting values to table: teacher
INSERT INTO teacher (first_name, last_name, gender, phone, email)
VALUES ('Natanael', 'Bara', 'M', '0745632777', 'baraNatanael@gmail.com');

-- Inserting values to table: themes
INSERT INTO themes (teacher_id, name, primary_color, secondary_color, third_color, primary_font_color, secondary_font_color)
VALUES ('1', 'light', '#FCFCFC', '#EBEBEB', '#0077ff', '#333333', '#57b957');

INSERT INTO themes (teacher_id, name, primary_color, secondary_color, third_color, primary_font_color, secondary_font_color)
VALUES ('1', 'dark', '#333333', '#434343', '#0077ff', '#b5b5b5', '#57b957');

INSERT INTO themes (teacher_id, name, primary_color, secondary_color, third_color, primary_font_color, secondary_font_color)
VALUES ('1', 'old_school', '#2D3047', '#048A81', '#A799B7', '#93B7BE', '#E0CA3C');

-- Inserting values to table: teacher_settings
INSERT INTO teacher_settings (teacher_id, themes_id)
VALUES ('1', '1');

-- End of file.

