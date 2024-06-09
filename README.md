# Graduation project - web app for attendance system

> [!IMPORTANT]
> For the proper functioning of the web app, it is necessary to create:
> * MySQL database "attendance_system" (collation: utf8_general_ci)
> * table "accounts" according to the accounts.sql file
> * table "records" according to the records.sql file
>
<div align="center">
    <img src="https://github.com/martin-vrublovsky/attendance-system/blob/main/assets/img/Screenshot_1.png?raw=true" width="400">
</div>

## Advantages of this web app
:white_check_mark: security by login

:white_check_mark: the administrator password is encrypted using the Bcrypt hash

:white_check_mark: using the more secure HTTP POST method instead of the GET method

:white_check_mark: URL rewriting protection

## Parts of a web app

### Login page
#### Only an administrator can login using:
* **username:** _admin_
* **password:** _test_

![alt text](https://github.com/martin-vrublovsky/attendance-system/blob/main/assets/img/Screenshot_2.png?raw=true)

### An error message that appears after entering an incorrect password
![alt text](https://github.com/martin-vrublovsky/attendance-system/blob/main/assets/img/Screenshot_3.png?raw=true)

### Table of employee attendance records
* option to **edit** a specific record after clicking on the ${\textsf{\color{blue}blue button}}$ with the pen icon
* option to **delete** a specific record after clicking on the ${\textsf{\color{red}red button}}$ with the trash icon
* option to **export** all records after clicking on the ${\textsf{\color{green}green button}}$ "Exportovať"

![alt text](https://github.com/martin-vrublovsky/attendance-system/blob/main/assets/img/Screenshot_4.png?raw=true)

### All employee attendance records exported in an Excel spreadsheet
![alt text](https://github.com/martin-vrublovsky/attendance-system/blob/main/assets/img/Screenshot_5.png?raw=true)

### Editing of a specific employee attendance record
#### Option to edit/add:
* employee name
* time of arrival
* departure time
* notes

![alt text](https://github.com/martin-vrublovsky/attendance-system/blob/main/assets/img/Screenshot_6.png?raw=true)
