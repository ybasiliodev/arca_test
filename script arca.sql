create database db_bussiness;

use db_bussiness;

CREATE TABLE bussiness (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  phone VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  zip_code VARCHAR(255) NOT NULL,
  city VARCHAR(255) NOT NULL,
  state VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL
);

CREATE TABLE category (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL
);

CREATE TABLE bussiness_categories (
  bussiness_id INT NOT NULL,
  category_id INT NOT NULL,
  PRIMARY KEY (bussiness_id, category_id),
  CONSTRAINT FK_CATEGORYID
    FOREIGN KEY (category_id)
    REFERENCES category (id),
  CONSTRAINT FK_BUSSINESSID
    FOREIGN KEY (bussiness_id)
    REFERENCES bussiness (id)
);

CREATE TABLE user (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(45) NOT NULL,
  login VARCHAR(45) NOT NULL,
  password VARCHAR(45) NOT NULL
);

insert into bussiness values (1, "Jack Music Pub", "(14) 3214-4013", "Av. Duque de Caxias, 8-56 - Vila Tereza", "17012-000", "Bauru", "SP", "In a comfortable and welcoming environment, the festive public gathers to drink and enjoy various musical attractions.");
insert into bussiness values (2, "Academia Bem Estar", "(14) 3243-4550", "Av. Dr. Marcos de Paula Raphael, 9-20 - Mary Dota", "17026-000", "Bauru", "SP", "Attentive teachers and a very pleasant place to stay in shape");
insert into bussiness values (3, "Botter Acessórios Automotivos", "(14) 3232-7010", "R. Antônio Alves, 6-26 - Centro", "17010-170", "Bauru", "SP", "company specialized in parts for vehicles of all brands we also have accessories for any vehicle always at the best price with the best quality");
insert into bussiness values (4, "CVC", "(14) 3206-9990", "Rua Rio Branco, Quadra 20, 40 - Vila Mesquita", "17014-037", "Bauru", "SP", "CVC does everything for a good trip. That is why it works to transform this experience into the best achievement of your life");
insert into bussiness values (5, "Hospital Israelita Albert Einstein", "(11) 2151-1233", "Av. Albert Einstein, 627 - Jardim Leonor", "05652-900", "São Paulo", "SP", "Brazilian hospital, located in the district of Morumbi, south of the municipality of São Paulo");
insert into bussiness values (6, "Beto Carrero World", "(99) 99999-9999", "Jardim Bela Vista", "88385-000", "Penha", "SC", "Beto Carrero World is a theme park located on the northern coast of the state of Santa Catarina, Brazil");
insert into bussiness values (7, "Domino's Pizza", "(14) 3206-9699", " Av. Getúlio Vargas, 22 - 104 - Parque Jardim Europa", "17017-383", "BAuru", "SP", "Delivery / takeaway restaurant chain with a wide variety of pizzas.");
insert into bussiness values (8, "Arena Corinthians", "(99) 99999-9999", "Av. Miguel Ignácio Curi, 111 - Artur Alvim", "08295-005", "São Paulo", "SP", "Arena Corinthians, popularly known as Itaquerão, is a football stadium located in the district of Itaquera, in the East Zone of the municipality of São Paulo, Brazil");
insert into bussiness values (9, "Hamburgueria Tradi", "(11) 2339-7107", "R. Diogo Jacome, 391 - Moema", "04512-001", "São Paulo", "SP", "Artisanal burgers, in addition to thick fries with garlic and rosemary, in a space with rustic architecture.");
insert into bussiness values (10, "Lago San", "14 3018-2953", "R. Luís Fernando Rocha Coelho, 8-103 - Jardim Contorno", "17047-280", "Bauru", "SP", "Honda dealership in Bauru, São Paulo");

insert into category values (1, 'Auto');
insert into category values (2, 'Beauty and Fitness');
insert into category values (3, 'Entertainment');
insert into category values (4, 'Food and Dining');
insert into category values (5, 'Health');
insert into category values (6, 'Sports');
insert into category values (7, 'Travel');

insert into bussiness_categories values (1,3);
insert into bussiness_categories values (1,4);
insert into bussiness_categories values (2,2);
insert into bussiness_categories values (2,5);
insert into bussiness_categories values (3,1);
insert into bussiness_categories values (4,7);
insert into bussiness_categories values (5,5);
insert into bussiness_categories values (6,3);
insert into bussiness_categories values (6,7);
insert into bussiness_categories values (7,4);
insert into bussiness_categories values (8,6);
insert into bussiness_categories values (9,4);
insert into bussiness_categories values (10,1);

insert into user values (1, 'admin', 'admin', '123456');
