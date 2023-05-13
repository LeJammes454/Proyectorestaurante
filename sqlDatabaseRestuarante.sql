CREATE DATABASE  PROYECTORESTAURANT;
USE PROYECTORESTAURANT;

CREATE TABLE USUARIOS(
id int auto_increment primary key,
nombre varchar(50) not null,
direccion varchar(200) not null,
telefono char(10) not null,
email varchar(100) not null,
contrasenia varchar(256) not null
);

INSERT INTO USUARIOS(NOMBRE,DIRECCION,TELEFONO,email,CONTRASENIA) VALUES('JAIME','INDEPENDENCIA','4434198628','juanito','1234');

select * from usuarios;

CREATE TABLE PLATILLOS(
id INT auto_increment primary key,
nombre varchar(100) not null,
descripcion varchar(200) not null,
precio double not null,
calificacion int(1) ,
urlimagen varchar(500) not null
);


INSERT INTO PLATILLOS (nombre, descripcion, precio, calificacion, urlimagen)
VALUES
  ('Enchiladas Verdes', 'Tortillas rellenas de pollo bañadas en salsa verde, acompañadas de arroz y frijoles', 8.99, 4, 'https://images.pexels.com/photos/12097599/pexels-photo-12097599.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
  ('Pizza Margarita', 'Pizza con salsa de tomate, mozzarella fresca y albahaca', 12.99, 5, 'https://images.pexels.com/photos/1146760/pexels-photo-1146760.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
  ('Hamburguesa Clásica', 'Carne de res, lechuga, tomate, cebolla, queso y salsa especial en un pan suave', 9.99, 4, 'https://images.pexels.com/photos/1633578/pexels-photo-1633578.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
  ('Sushi Variado', 'Rollos de sushi de salmón, atún, aguacate y pepino', 18.99, 5, 'https://images.pexels.com/photos/2323398/pexels-photo-2323398.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
  ('Pollo a la Parrilla', 'Pechuga de pollo a la parrilla, acompañada de ensalada y papas fritas', 10.99, 4, 'https://images.pexels.com/photos/8769143/pexels-photo-8769143.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
  ('Sopa de Fideos', 'Sopa de fideos con verduras y pollo', 6.99, 3, 'https://images.pexels.com/photos/3926135/pexels-photo-3926135.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
  ('Tacos de Carne Asada', 'Tacos de carne asada con cebolla y cilantro, acompañados de frijoles y arroz', 7.99, 4, 'https://images.pexels.com/photos/6605212/pexels-photo-6605212.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
  ('Ensalada César', 'Lechuga romana, pollo a la parrilla, queso parmesano, crutones y aderezo César', 8.99, 4, 'https://images.pexels.com/photos/6107787/pexels-photo-6107787.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
('Curry de Pollo', 'Pollo al curry con arroz y naan', 14.99, 4, 'https://images.pexels.com/photos/6113813/pexels-photo-6113813.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
('Papas Fritas', 'Papas fritas crujientes, sazonadas con sal y servidas con ketchup', 3.99, 3, 'https://images.pexels.com/photos/7998092/pexels-photo-7998092.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
('Lasaña de Carne', 'Lasaña de carne molida con salsa de tomate y queso mozzarella', 12.99, 4, 'https://images.pexels.com/photos/5864352/pexels-photo-5864352.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
('Salmón a la Parrilla', 'Filete de salmón a la parrilla con ensalada de espinacas y fresas', 16.99, 5, 'https://images.pexels.com/photos/725991/pexels-photo-725991.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
('Pad Thai', 'Fideos de arroz salteados con pollo, cacahuetes, brotes de soja y cilantro', 11.99, 4, 'https://images.pexels.com/photos/12481161/pexels-photo-12481161.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');