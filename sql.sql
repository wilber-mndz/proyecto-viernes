-- Creacion de la base de datos
-- --------------------------------------------------
-- Aumentamos el numero de divice permitidos a 20
sp_configure "number of devices", 20
go
use master
go
-- Creamos los divice (tablespace) para datos y para log
disk init name='friday_dat', physname='/opt/sap/data/friday_dat.dat', size='50m'
go
disk init name='friday_log', physname='/opt/sap/data/friday_log.dat', size='50m'
go
-- Creamos la base de datos utilizando los divice creados previamente
create database dbfriday
on friday_dat = 50
log on friday_log = 50
go

-- Creacion de tablas
-- -------------------------------------------------------
-- Tabla usuarios
CREATE TABLE dbfriday.dbo.tbl_users (
	id_user int,
	name varchar(45) NOT NULL,
	last_name varchar(45) NOT NULL,
	birthdate date NOT NULL,
	gender int NOT NULL,
	email varchar(50) NOT NULL,
	password varchar(400) NOT NULL,
	user_type int NOT NULL,
	status int NOT NULL,
	CONSTRAINT tbl_users_PK PRIMARY KEY (id_user)
) GO

-- Tabla respuestas
-- CREATE TABLE dbfriday.dbo.tbl_answers (
-- 	id_answer int,
-- 	id_user int,
-- 	answer varchar(500) NOT NULL,
-- 	update_date datetime NOT NULL,
-- 	CONSTRAINT tbl_answers_PK PRIMARY KEY (id_answer),
-- 	CONSTRAINT tbl_answers_tbl_users_FK FOREIGN KEY (id_user) REFERENCES dbfriday.dbo.tbl_users(id_user)
-- ) GO

-- Tabla palabras claves
-- CREATE TABLE dbfriday.dbo.tbl_keywords (
-- 	id_keyword int,
-- 	id_answer int NOT NULL,
-- 	keyword varchar(20) NOT NULL,
-- 	CONSTRAINT tbl_keywords_PK PRIMARY KEY (id_keyword),
-- 	CONSTRAINT tbl_keywords_tbl_answers_FK FOREIGN KEY (id_answer) REFERENCES dbfriday.dbo.tbl_answers(id_answer)
-- ) GO

-- Tabla historial de chat
-- CREATE TABLE dbfriday.dbo.tbl_chat_history (
-- 	id_chat_history int,
-- 	id_user int NOT NULL,
-- 	message varchar(500) NOT NULL,
-- 	id_answer int NOT NULL,
-- 	update_date datetime NOT NULL,
-- 	CONSTRAINT tbl_chat_history_PK PRIMARY KEY (id_chat_history),
-- 	CONSTRAINT tbl_chat_history_tbl_users_FK FOREIGN KEY (id_user) REFERENCES dbfriday.dbo.tbl_users(id_user),
-- 	CONSTRAINT tbl_chat_history_tbl_answers_FK FOREIGN KEY (id_answer) REFERENCES dbfriday.dbo.tbl_answers(id_answer)
-- ) GO

-- Tabla bitacora
CREATE TABLE dbfriday.dbo.tbl_binnacle (
	id_binnacle int NOT NULL,
	operation varchar(100) NOT NULL,
	table_name varchar(100) NOT NULL,
	new_data varchar(400) NOT NULL,
	old_data varchar(400) NOT NULL,
	dt datetime NOT NULL
)

-- Insersion de datos
-- ------------------------------------------------------------

-- Insertar datos de usuarios
INSERT INTO dbfriday.dbo.tbl_users (id_user, name, last_name, birthdate, gender, email, password, user_type, status) VALUES(1, 'Wilber', 'Mendez', '1994-06-30', 1, 'mendezwilber94@gmail.com', 'eb920bc48e4b41660947ba8aa0bedb0be46deb719a46a461a65b0dec4d7f58cf047003646ae50d7dba09f1e0e388aa29227f14bc14315429d5e8450dfd6d148b', 2, 1);
INSERT INTO dbfriday.dbo.tbl_users (id_user, name, last_name, birthdate, gender, email, password, user_type, status) VALUES(2, 'Yanci', 'Martinez', '1990-01-01', 2, 'yanci@gmail.com', 'eb920bc48e4b41660947ba8aa0bedb0be46deb719a46a461a65b0dec4d7f58cf047003646ae50d7dba09f1e0e388aa29227f14bc14315429d5e8450dfd6d148b', 1, 1);
INSERT INTO dbfriday.dbo.tbl_users (id_user, name, last_name, birthdate, gender, email, password, user_type, status) VALUES(3, 'Carlos', 'Hernandez', '1994-01-01', 1, 'carlos@gmail.com', 'eb920bc48e4b41660947ba8aa0bedb0be46deb719a46a461a65b0dec4d7f58cf047003646ae50d7dba09f1e0e388aa29227f14bc14315429d5e8450dfd6d148b', 2, 1);


-- Creacion de procedimientos
-- -------------------------------------------------------------

-- Procedimiento para guardar un nuevo usuario
CREATE OR REPLACE proc add_user
	@name VARCHAR(45),
	@last_name VARCHAR(45),
	@birthdate DATE,
	@gender VARCHAR(1),
	@email VARCHAR(50),
	@password VARCHAR(400),
	@user_type VARCHAR(1)
AS
BEGIN
--	Declaramos variable para obtener el id anterior
	DECLARE @id int
	
--	Obtenemos el id anterior
	SELECT @id = isNull(MAX(id_user), 0) + 1
	FROM dbfriday.dbo.tbl_users
	
-- guardamos los datos del usuario
	INSERT INTO dbfriday.dbo.tbl_users
	(id_user, name, last_name, birthdate, gender, email, password, user_type, status)
	VALUES(@id, @name, @last_name, @birthdate, CONVERT(int, @gender), @email, @password, CONVERT(int, @user_type), 1)
END


-- Procedimiento para modificar usuario
CREATE OR REPLACE proc update_user
	@name VARCHAR(45),
	@last_name VARCHAR(45),
	@birthdate DATE,
	@gender VARCHAR(1),
	@email VARCHAR(50),
	@user_type VARCHAR(1),
	@id VARCHAR(10)
AS
BEGIN
-- guardamos los datos del usuario
	UPDATE dbfriday.dbo.tbl_users
	SET name=@name, last_name=@last_name, birthdate = @birthdate, gender=CONVERT(int, @gender), email=@email, user_type=CONVERT(int, @user_type)
	WHERE id_user=CONVERT(int, @id)
END


-- Procedimiento para desactivar usuario
CREATE OR REPLACE proc disable_user
	@id VARCHAR(10)
AS
BEGIN
-- cambiamos el estado del usuario
	UPDATE dbfriday.dbo.tbl_users
	SET status = 0
	WHERE id_user=CONVERT(int, @id)
END


-- Procedimiento para activar usuarios
CREATE OR REPLACE proc enable_user
	@id VARCHAR(10)
AS
BEGIN
-- cambiamos el estado del usuario
	UPDATE dbfriday.dbo.tbl_users
	SET status = 1
	WHERE id_user=CONVERT(int, @id)
END

-- TRIGGERS
-- -----------------------------------------------------------

-- Triger para la tabla tbl_users INSERT
CREATE OR REPLACE TRIGGER dbo.tg_insert_users
ON dbo.tbl_users
FOR INSERT
AS
-- Declaramos variables 
	DECLARE @new_id INT, @new_name VARCHAR(45), @new_last_name VARCHAR(45), @new_birthdate DATE,
	@new_gender INT, @new_email VARCHAR(50), @new_user_type INT, @new_status INT, @id INT,
	@new_data VARCHAR(300)
	
--	Obtenemos los datos nuevos
	SELECT @new_id = id_user, @new_name = name, @new_last_name = last_name, @new_birthdate = birthdate, 
	@new_gender = gender, @new_email = email, @new_user_type = user_type, @new_status = status
	FROM inserted
	
-- creamos la cadena de los datos nuevos
	SET @new_data = 'id_user = ' + convert(varchar, @new_id) + ', name = ' + @new_name +
	', last_name = ' + @new_last_name + ', birthdate = ' + CONVERT(VARCHAR, @new_birthdate) + 
	', gender = ' +	CONVERT(VARCHAR, @new_gender) + ', email = ' + @new_email + ', user_type = ' + 
	CONVERT(VARCHAR, @new_user_type) + ', status = ' + CONVERT(VARCHAR, @new_status)
	
-- Obtenemos el id de la bitacora
	SELECT @id = isNull(MAX(id_binnacle), 0)
	FROM dbfriday.dbo.tbl_binnacle
	
	INSERT INTO dbo.tbl_binnacle(id_binnacle, operation, table_name, new_data, old_data, dt)
	VALUES(@id + 1, 'INSERT', 'TBL_USERS', @new_data , '', getdate())

-- Triger para la tabla tbl_users UPDATE
CREATE OR REPLACE TRIGGER dbo.tg_update_users
ON dbo.tbl_users
FOR UPDATE
AS
-- Declaramos variables 
	DECLARE @old_id INT, @old_name VARCHAR(45), @old_last_name VARCHAR(45), @old_birthdate DATE,
	@old_gender INT, @old_email VARCHAR(50), @old_user_type INT, @old_status INT,
	@new_id INT, @new_name VARCHAR(45), @new_last_name VARCHAR(45), @new_birthdate DATE,
	@new_gender INT, @new_email VARCHAR(50), @new_user_type INT, @new_status INT, @id INT,
	@old_data VARCHAR(300), @new_data VARCHAR(300)
	
--	Obtenemos los datos viejos
	SELECT @old_id = id_user, @old_name = name, @old_last_name = last_name, @old_birthdate = birthdate, 
	@old_gender = gender, @old_email = email, @old_user_type = user_type, @old_status = status
	FROM deleted
		
-- creamos la cadena de los datos viejos
	SET @old_data = 'id_user = ' + convert(varchar, @old_id) + ', name = ' + @old_name +
	', last_name = ' + @old_last_name + ', birthdate = ' + CONVERT(VARCHAR, @old_birthdate) + 
	', gender = ' +	CONVERT(VARCHAR, @old_gender) + ', email = ' + @old_email + ', user_type = ' + 
	CONVERT(VARCHAR, @old_user_type) + ', status = ' + CONVERT(VARCHAR, @old_status)
	
--	Obtenemos los datos nuevos
	SELECT @new_id = id_user, @new_name = name, @new_last_name = last_name, @new_birthdate = birthdate, 
	@new_gender = gender, @new_email = email, @new_user_type = user_type, @new_status = status
	FROM inserted
	
-- creamos la cadena de los datos nuevos
	SET @new_data = 'id_user = ' + convert(varchar, @new_id) + ', name = ' + @new_name +
	', last_name = ' + @new_last_name + ', birthdate = ' + CONVERT(VARCHAR, @new_birthdate) + 
	', gender = ' +	CONVERT(VARCHAR, @new_gender) + ', email = ' + @new_email + ', user_type = ' + 
	CONVERT(VARCHAR, @new_user_type) + ', status = ' + CONVERT(VARCHAR, @new_status)
	
-- Obtenemos el id de la bitacora
	SELECT @id = isNull(MAX(id_binnacle), 0)
	FROM dbfriday.dbo.tbl_binnacle
	
	INSERT INTO dbo.tbl_binnacle(id_binnacle, operation, table_name, new_data, old_data, dt)
	VALUES(@id + 1, 'UPDATE', 'TBL_USERS', @new_data , @old_data, getdate())