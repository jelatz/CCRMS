-- INSTRUCTOR
CREATE TABLE Instructor (
    instructor_id int NOT NULL,
	password varchar(255) NOT NULL,
    last_name varchar(255) NOT NULL,
    first_name varchar(255) NOT NULL,
    middle_name varchar(255),
    PRIMARY KEY (instructor_id)
);

-- SUBJECT
CREATE TABLE Subject (
    subject_id int NOT NULL AUTO_INCREMENT,
    subject_code varchar(255) NOT NULL,
    subject_description varchar(255) NOT NULL,
    section varchar(255) NOT NULL,
    class_time varchar(255) NOT NULL,
    class_day varchar(255) NOT NULL,
    room_location varchar(255) NOT NULL,
    semester varchar(255) NOT NULL,
    school_year varchar(255) NOT NULL,
    instructor_id int NOT NULL,
    PRIMARY KEY (subject_id),
    FOREIGN KEY (instructor_id) REFERENCES Instructor (instructor_id)
);

-- STUDENT
CREATE TABLE Student (
    student_id int NOT NULL AUTO_INCREMENT,
	studentid int NOT NULL,
    last_name varchar(255) NOT NULL,
    first_name varchar(255) NOT NULL,
    middle_name varchar(255),
	email_address varchar(255) NOT NULL,
    course varchar(255) NOT NULL,
    year_level varchar(255) NOT NULL,
	subject_id int NOT NULL,
    PRIMARY KEY (student_id),
	FOREIGN KEY (subject_id) REFERENCES Subject (subject_id)
);

-- PeriodicTest 
CREATE TABLE PeriodicTest (
    pt_id int NOT NULL AUTO_INCREMENT,
    part1 float(4,2) NOT NULL,
    part2 float(4,2) NOT NULL,
    total float(4,2) NOT NULL,
    PRIMARY KEY (pt_id)
);

-- QUARTER 
CREATE TABLE Quarter (
    quarter_id int NOT NULL AUTO_INCREMENT,
    quarter varchar(255) NOT NULL,
    PRIMARY KEY (quarter_id)
);
INSERT INTO Quarter (quarter) VALUES 
('Prelim'), 
('Midterm'), 
('Semi-Finals'),
('Finals');

-- Attendance
CREATE TABLE Attendance (
    attendance_id int NOT NULL AUTO_INCREMENT,
    student_id int NOT NULL,
    quarter_id int NOT NULL,
    date varchar(255) NOT NULL,
    score int NOT NULL,
    PRIMARY KEY (attendance_id),
    FOREIGN KEY (student_id) REFERENCES Student (student_id),
    FOREIGN KEY (quarter_id) REFERENCES Quarter (quarter_id)
);

-- GRADES (activities, quizzes, assignments)
CREATE TABLE Grade (
    grade_id int NOT NULL AUTO_INCREMENT,
    student_id int NOT NULL,
    subject_id int NOT NULL,
    quarter_id int NOT NULL,
    name varchar(255) NOT NULL,
    grade float(4,2) NOT NULL,
    out_of float(4,2) NOT NULL,
    PRIMARY KEY (grade_id),
    FOREIGN KEY (student_id) REFERENCES Student (student_id),
    FOREIGN KEY (subject_id) REFERENCES Subject (subject_id),
    FOREIGN KEY (quarter_id) REFERENCES Quarter (quarter_id)
);


-- OVERALL
CREATE TABLE Overall (
    overall_id int NOT NULL AUTO_INCREMENT,
	subject_id int NOT NULL,
	student_id int NOT NULL,
	attendance_id int NOT NULL,
	grade_id int NOT NULL,
	pt_id int NOT NULL,
	quarter_id int NOT NULL,
    other_req float(4,2) NOT NULL,
	percent float(4,2) NOT NULL,
	tentative float(4,2) NOT NULL,
	grade float(4,2) NOT NULL,
    PRIMARY KEY (overall_id),
	FOREIGN KEY (subject_id) REFERENCES Subject (subject_id),
	FOREIGN KEY (student_id) REFERENCES Student (student_id),
	FOREIGN KEY (attendance_id) REFERENCES Attendance (attendance_id),
	FOREIGN KEY (grade_id) REFERENCES Grade (grade_id),
    FOREIGN KEY (pt_id) REFERENCES PeriodicTest (pt_id),
    FOREIGN KEY (quarter_id) REFERENCES Quarter (quarter_id)
);

-- Final Grade
CREATE TABLE FinalGrade (
    finalgrade_id int NOT NULL AUTO_INCREMENT,
    student_id int NOT NULL,
    subject_id int NOT NULL,
    final_grade float(4,2) NOT NULL,
    PRIMARY KEY (finalgrade_id),
    FOREIGN KEY (student_id) REFERENCES Student (student_id),
    FOREIGN KEY (subject_id) REFERENCES Subject (subject_id)
);


-- STUDENT VIEW
CREATE VIEW student_view as
SELECT student.student_id, CONCAT(student.last_name, ", ", student.first_name, " ", student.middle_name) AS student, student.email_address, 
CONCAT(student.course, " ", student.year_level) AS course_year,
CONCAT(subject.subject_code, " ", subject.subject_description) AS subject
FROM student
INNER JOIN subject ON student.subject_id = subject.subject_id

ATTENDANCE VIEW
CREATE VIEW attendance_view as
SELECT attendance.attendance_id, CONCAT(student.last_name, ", ", student.first_name, " ", student.middle_name) AS student, 
CONCAT(subject.subject_code, " ", subject.subject_description) AS subject, subject.section,
quarter.quarter, attendance.date, attendance.score
FROM attendance
INNER JOIN student ON attendance.student_id = student.student_id
INNER JOIN subject ON attendance.subject_id = subject.subject_id
INNER JOIN quarter ON attendance.quarter_id = quarter.quarter_id

GRADE VIEW
CREATE VIEW grade_view as
SELECT grade.grade_id, 
CONCAT(student.last_name, ", ", student.first_name, " ", student.middle_name) AS student, 
CONCAT(subject.subject_code, " ", subject.subject_description) AS subject, subject.section,
quarter.quarter, grade.name, grade.out_of
FROM grade
INNER JOIN student ON grade.student_id = student.student_id
INNER JOIN subject ON grade.subject_id = subject.subject_id
INNER JOIN quarter ON grade.quarter_id = quarter.quarter_id

FINAL GRADE VIEW
CREATE VIEW finalgrade_view as
SELECT finalgrade.finalgrade_id, 
CONCAT(student.last_name, ", ", student.first_name, " ", student.middle_name) AS student, 
CONCAT(subject.subject_code, " ", subject.subject_description) AS subject, subject.section, finalgrade.final_grade
FROM finalgrade
INNER JOIN student ON finalgrade.student_id = student.student_id
INNER JOIN subject ON finalgrade.subject_id = subject.subject_id

QUARTER GRADE VIEW
CREATE VIEW quartergrade_view as
SELECT quartergrade.quartergrade_id, 
CONCAT(student.last_name, ", ", student.first_name, " ", student.middle_name) AS student, 
CONCAT(subject.subject_code, " ", subject.subject_description) AS subject, subject.section, quarter.quarter, quartergrade.quarter_grade
FROM quartergrade
INNER JOIN student ON quartergrade.student_id = student.student_id
INNER JOIN subject ON quartergrade.subject_id = subject.subject_id
INNER JOIN quarter ON quartergrade.quarter_id = quarter.quarter_id