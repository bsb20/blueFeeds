README:

Welcome to BlueFeeds!  The purpose of this application is to aid in the recording, distribution, and use of descriptive
feedback between instructors and their students.

The proejct uses the following resources

-php 5.5
-Apache 2.2.22
-mySQL 5.5.27
-Ubuntu 12.10
-jQueryMobile 1.7.0
-imagemagick
To deploy this project, the main requirement is setting up a mySQL database to recieve and store all data generated
by the application.  This should look as follows, for a databse named 'test'

+----------------+
| Tables_in_test |
+----------------+
| appointments   |
| comments       |
| courses        |
| feeds          |
| groups         |
| gs             |
| students       |
| su             |
| tags           |
| tu             |
| users          |
+----------------+

appointments
+---------------+--------------+------+-----+---------+-------+
| Field         | Type         | Null | Key | Default | Extra |
+---------------+--------------+------+-----+---------+-------+
| UUID          | varchar(100) | NO   |     | NULL    |       |
| SUID          | varchar(100) | NO   |     | NULL    |       |
| start         | datetime     | NO   |     | NULL    |       |
| isWeekly      | tinyint(4)   | NO   |     | NULL    |       |
| studentAccept | tinyint(4)   | NO   |     | NULL    |       |
| userAccept    | tinyint(4)   | NO   |     | NULL    |       |
| title         | varchar(100) | NO   |     | NULL    |       |
| end           | datetime     | NO   |     | NULL    |       |
| location      | varchar(100) | NO   |     | NULL    |       |
| AUID          | varchar(255) | NO   |     | NULL    |       |
+---------------+--------------+------+-----+---------+-------+

comments
+-------------+--------------+------+-----+---------+-------+
| Field       | Type         | Null | Key | Default | Extra |
+-------------+--------------+------+-----+---------+-------+
| UUID        | varchar(255) | NO   |     | NULL    |       |
| SUID        | varchar(255) | NO   |     | NULL    |       |
| text        | varchar(255) | NO   |     | NULL    |       |
| CUID        | varchar(255) | NO   |     | NULL    |       |
| title       | varchar(255) | NO   |     | NULL    |       |
| date        | datetime     | NO   |     | NULL    |       |
| students    | tinyint(4)   | NO   |     | NULL    |       |
| GUID        | varchar(255) | NO   |     | NULL    |       |
| instructors | tinyint(4)   | NO   |     | NULL    |       |
+-------------+--------------+------+-----+---------+-------+

courses
+-------+--------------+------+-----+---------+-------+
| Field | Type         | Null | Key | Default | Extra |
+-------+--------------+------+-----+---------+-------+
| GUID  | varchar(255) | NO   |     | NULL    |       |
| info  | varchar(255) | NO   |     | NULL    |       |
| UUID  | varchar(255) | NO   |     | NULL    |       |
| title | varchar(255) | NO   |     | NULL    |       |
+-------+--------------+------+-----+---------+-------+

feeds
+-------+-------------+------+-----+---------+-------+
| Field | Type        | Null | Key | Default | Extra |
+-------+-------------+------+-----+---------+-------+
| UUID  | varchar(30) | NO   |     | NULL    |       |
| FUID  | varchar(30) | NO   |     | NULL    |       |
| url   | text        | NO   |     | NULL    |       |
| title | varchar(30) | NO   |     | NULL    |       |
| date  | datetime    | NO   |     | NULL    |       |
+-------+-------------+------+-----+---------+-------+

groups
+-------+--------------+------+-----+---------+-------+
| Field | Type         | Null | Key | Default | Extra |
+-------+--------------+------+-----+---------+-------+
| GUID  | varchar(255) | NO   |     | NULL    |       |
| UUID  | varchar(255) | NO   |     | NULL    |       |
| r     | tinyint(4)   | NO   |     | NULL    |       |
| w     | tinyint(4)   | NO   |     | NULL    |       |
+-------+--------------+------+-----+---------+-------+

gs
+-------+--------------+------+-----+---------+-------+
| Field | Type         | Null | Key | Default | Extra |
+-------+--------------+------+-----+---------+-------+
| GUID  | varchar(255) | NO   |     | NULL    |       |
| SUID  | varchar(255) | NO   |     | NULL    |       |
+-------+--------------+------+-----+---------+-------+

students
+------------+--------------+------+-----+---------+-------+
| Field      | Type         | Null | Key | Default | Extra |
+------------+--------------+------+-----+---------+-------+
| user       | varchar(50)  | NO   |     | NULL    |       |
| pass       | varchar(255) | NO   |     | NULL    |       |
| email      | varchar(100) | NO   |     | NULL    |       |
| SUID       | varchar(255) | NO   |     | NULL    |       |
| photo      | varchar(255) | NO   |     | NULL    |       |
| title      | varchar(100) | NO   |     | NULL    |       |
| speciality | varchar(100) | NO   |     | NULL    |       |
| id         | varchar(100) | NO   |     | NULL    |       |
+------------+--------------+------+-----+---------+-------+

su
+-------+--------------+------+-----+---------+-------+
| Field | Type         | Null | Key | Default | Extra |
+-------+--------------+------+-----+---------+-------+
| SUID  | varchar(255) | NO   |     | NULL    |       |
| UUID  | varchar(255) | NO   |     | NULL    |       |
+-------+--------------+------+-----+---------+-------+

tags
+-------+--------------+------+-----+---------+-------+
| Field | Type         | Null | Key | Default | Extra |
+-------+--------------+------+-----+---------+-------+
| TUID  | varchar(255) | NO   |     | NULL    |       |
| text  | varchar(255) | NO   |     | NULL    |       |
| UUID  | varchar(255) | NO   |     | NULL    |       |
+-------+--------------+------+-----+---------+-------+

tu
+-------+--------------+------+-----+---------+-------+
| Field | Type         | Null | Key | Default | Extra |
+-------+--------------+------+-----+---------+-------+
| TUID  | varchar(255) | NO   |     | NULL    |       |
| CUID  | varchar(255) | NO   |     | NULL    |       |
+-------+--------------+------+-----+---------+-------+

users
+------------+--------------+------+-----+---------+-------+
| Field      | Type         | Null | Key | Default | Extra |
+------------+--------------+------+-----+---------+-------+
| user       | varchar(40)  | NO   |     | NULL    |       |
| pass       | varchar(32)  | NO   |     | NULL    |       |
| email      | varchar(40)  | NO   |     | NULL    |       |
| UUID       | varchar(13)  | NO   |     | NULL    |       |
| photo      | varchar(255) | NO   |     | NULL    |       |
| title      | varchar(50)  | NO   |     | NULL    |       |
| speciality | varchar(50)  | NO   |     | NULL    |       |
+------------+--------------+------+-----+---------+-------+

After this is done, install a current version of imagemagick on the server, and you are ready to go!
