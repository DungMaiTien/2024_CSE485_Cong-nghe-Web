-- Bảng Departments
create database dhtl;
CREATE TABLE Departments (
    DepartmentID INT AUTO_INCREMENT PRIMARY KEY,
    DepartmentName VARCHAR(255),
    Address VARCHAR(255),
    Email VARCHAR(255),
    Phone VARCHAR(20),
    Logo VARCHAR(255),
    Website VARCHAR(255),
    ParentDepartmentID INT,
    FOREIGN KEY (ParentDepartmentID) REFERENCES Departments(DepartmentID)
);
select *from Departments;
INSERT INTO Departments (DepartmentName, Address, Email, Phone, Logo, Website, ParentDepartmentID)
VALUES 
  ('Ban Lãnh Đạo', 'Địa chỉ 6', 'ketoan@example.com', '321654987', NULL, NULL, null),
  ('Khoa Công nghệ thông tin', 'Địa chỉ 1', 'khoaCNTT@example.com', '123456789', '"C:\laragon\www\project32\public\media\ktz.jpg"', 'http://www.cntt.example.com', NULL),
  ('Khoa Kinh tế', 'Địa chỉ 2', 'khoaKT@example.com', '987654321', '"C:\laragon\www\project32\public\media\ktz.jpg"', 'http://www.kinhtế.example.com', NULL),
  ('Phòng Tài chính', 'Địa chỉ 3', 'taichinh@example.com', '456789123', NULL, NULL, NULL),
  ('Bộ môn Hệ thống thông tin', 'Địa chỉ 4', 'httt@example.com', '987123456', NULL, NULL, 1),
  ('Bộ môn Kế toán', 'Địa chỉ 5', 'ketoan@example.com', '321654987', NULL, NULL, 3);
-- Bảng Employees
CREATE TABLE Employees (
    EmployeeID INT AUTO_INCREMENT PRIMARY KEY,
    FullName VARCHAR(255),
    Address VARCHAR(255),
    Email VARCHAR(255),
    MobilePhone VARCHAR(20),
    Position VARCHAR(255),
    Avatar VARCHAR(255),
    DepartmentID INT,
    FOREIGN KEY (DepartmentID) REFERENCES Departments(DepartmentID)
);
select *from employees;
INSERT INTO Employees (FullName, Address, Email, MobilePhone, Position, Avatar, DepartmentID)
VALUES 
  ('PGS.TS Nguyễn Hữu Quỳnh', 'Địa chỉ 1', 'tmthu@tlu.edu.vn', '0987654321', 'Trưởng Khoa', 'media/tkcntt.png', 1),
  ('TS. Tạ Quang Chiểu', 'Địa chỉ 2', 'ncanhthai@tlu.edu.vn', '0123456789', 'Phó Hiệu Trưởng', 'media/ptkcntt.jpg', 1),
  ('GS.TS Nguyễn Trung Việt', 'Địa chỉ 3', 'nguyentrungviet@tlu.edu.vn', '0987123456', 'Phó Hiệu Trưởng', 'media/pht2.jpg', 2),
  ('PGS.TS Đỗ Văn Quang', 'Địa chỉ 4', 'quangkttl@tlu.edu.vn', '0123498765', 'Phó Hiệu Trưởng', 'media/pht3.jpg', 4);
UPDATE Employees
SET Position = 'Phó trưởng khoa'
WHERE fullname = "TS. Tạ Quang Chiểu";
SET SQL_SAFE_UPDATES = 0;
DELETE FROM Employees
WHERE fullname = "Dũng trọc hà đông";


-- Bảng Users
CREATE TABLE Users (
    Username VARCHAR(50) PRIMARY KEY,
    Password VARCHAR(100),
    email VARCHAR(20),
    avatar varchar(200),
    EmployeeID INT,
    FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID)
);
INSERT INTO Users (username, password, email, avatar) 
VALUES 
('dungmai', '1', 'john@example.com', null),
('admin', '1', 'jane@example.com', null),
('ktz', '1', 'bob@example.com', null);
