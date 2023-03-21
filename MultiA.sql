use  MultiA

create table Question(
	Question_id varchar(10),
	question nvarchar(100),
	selections nvarchar(10000),
	correct nvarchar(100),
	level nvarchar(10),
	Quiz_id varchar(10),
	FOREIGN KEY (Quiz_id) REFERENCES Quiz (Quiz_id)
)

create table Quiz(
	Quiz_id varchar(10) primary key,
	examDate date,
	time int,
	quizNum int,
	status nvarchar(30)
)

create table User(
	User_id varchar(10) primary key,
	username nvarchar(50),
	password varchar(20),
)

create table Admin(
	Admin_id varchar(10) primary key,
	username varchar(50),
	password varchar(20),
)

--ketqua cua thanh vien nao, trong de thi nao, cau hoi nao, thành viên chọn đáp án nào.
create table KetQua(
	maND varchar(10),
	maDT varchar(10),
	maCH varchar(10),
	primary key(maND,maDT,maCH),
	FOREIGN KEY (maND) REFERENCES NguoiDung (maND),
	FOREIGN KEY (maDT) REFERENCES DeThi (maDT),
	FOREIGN KEY (maCH) REFERENCES CauHoi (maCH),
	dapAn nvarchar(100)
)
