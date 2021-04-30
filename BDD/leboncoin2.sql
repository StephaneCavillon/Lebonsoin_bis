#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE if NOT EXISTS `le_mauvais_coin` CHARACTER SET 'utf8';
USE `le_mauvais_coin`;

#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE `user`(
        id        Int  Auto_increment  NOT NULL ,
        pseudo    Varchar (50) NOT NULL ,
        mail      Varchar (255) NOT NULL ,
        birthdate Date NOT NULL ,
        password_user  Varchar (255) NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: category
#------------------------------------------------------------

CREATE TABLE `category`(
        id   Int  Auto_increment  NOT NULL ,
        name_cat Varchar (255) NOT NULL
	,CONSTRAINT category_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: article
#------------------------------------------------------------

CREATE TABLE `article`(
        id           Int  Auto_increment  NOT NULL ,
        title        Varchar (255) NOT NULL ,
        description_art Text NOT NULL ,
        price        Int NOT NULL ,
        created_at   Datetime NOT NULL ,
        zipcode      Char (5) NOT NULL ,
        city         Varchar (255) NOT NULL ,
        phone        Varchar (12) NOT NULL,
        id_user      Int NOT NULL ,
        id_category  Int NOT NULL
	,CONSTRAINT article_PK PRIMARY KEY (id)

	,CONSTRAINT article_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
	,CONSTRAINT article_category0_FK FOREIGN KEY (id_category) REFERENCES category(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: photo
#------------------------------------------------------------

CREATE TABLE `photo`(
        id         Int  Auto_increment  NOT NULL ,
        name_img   Varchar (255) NOT NULL ,
        id_article Int NOT NULL
	,CONSTRAINT photo_PK PRIMARY KEY (id)

	,CONSTRAINT photo_article_FK FOREIGN KEY (id_article) REFERENCES article(id)
)ENGINE=InnoDB;


INSERT INTO `user` ( `pseudo` , `mail`, `birthdate` , `password_user`)
VALUES  ('lee888','lee888@live.fr','1999-09-24','password'),
        ('bonvendeur','arnaque@gmail.com','1980-12-12','password'),
        ('Brendon','kekette93@gmail.com','2008-08-01','password');


INSERT INTO `category` (`name_cat`)
VALUES ('Vacances'), 
        ('Emploi'),
        ('Véhicules'),
        ('Immobilier'),
        ('Mode'),
        ('Multimédia'),
        ('Loisirs'),
        ('Animaux'),
        ('Services'),
        ('Maison');

INSERT INTO `article` ( `title` , `description_art`, `price` , `created_at`,`zipcode`,`city`,`phone`,`id_user`,`id_category`)
VALUES  ('Peugeot 206','Vend peugeot 206 1.9 diesel 198500 km','2000','2021-04-10 13:00:00','80000','Amiens','0658203201','1','3'),
    ('Audi a3 sportback','vend audi a3 diesel 98100km contrôle technique ok','14000','2021-04-09 13:00:00','80100','Abbeville','0658203201','2','3'),
    ('BMW 4 Serie Coupé','Vend BMW 4 série coupé diesel 23000 km contrôle technique ok ','23000','2021-04-09 13:00:00','59000','Lille','0658203201','3','3'),
    ('Appartement Duplex 4 pièces','Appartement à vendre 4 pièces en duplex 75m² térasse cuisine ouverte','120000','2021-04-28 14:10:00','80000','Amiens','0658203201','1','4'),
    ('Studio 35m²','Studio à louer de 35 m² exposé plein sud cuisine équipée et meublé 60 euros de charges','600','2021-04-28 14:10:00','80090','Dury','0658203201','2','4'),
    ('Appartement 120m²','Appartement de 120 m² à vendre 2 chambres, cusine équipée, terasse de 40m²','600','2021-04-28 14:10:00','80090','Dury','0658203201','3','4'),
    ('Pc portable Dell','Pc portable Dell 16 Go mémoire vive état comme neuf','450','2021-04-28 14:10:00','80090','Dury','0658203201','2','6'),
     ('Iphone 12','Iphone 12 à vendre parfaite état 120 Go','800','2021-04-28 14:10:00','80090','Dury','0658203201','1','6'),
    ('Ps5','A vendre PS5 Neuve','1100','2021-04-03 15:00:00','80000','Amiens','0658203201','3','6'),
    ("Canapé d\'angle","Vend canapé d'angle convertible état comme neuf",'600','2021-03-03 08:00:00','80000','Amiens','0658203201','1','10'),
    ('Table de jardin','Vend table de jardin extensible bois teck massif et 8 chaise','300','2021-03-03 08:00:00','80000','Amiens','06582032014','1','10'),
    ('Cuisine équipée',"Vend cuisine équipée parfait état pour plus d'informations me contacter",'800','2021-03-03 08:00:00','80000','Amiens','0658203201','3','10'),
('Basket Nike','Vend Nike jamais porté','50','2021-03-03 08:00:00','80000','Amiens','0658203201','3','5');

INSERT INTO `photo` ( `name_img` , `id_article`)
VALUES  ('1.jpg','1'),
        ('2.jpg','2'),
        ('3.jpg','3'),
        ('4.jpg','4'),
        ('5.jpg','5'),
        ('6.jpg','6'),
        ('7.jpg','7'),
        ('8.jpg','8'),
        ('9.jpg','9'),
        ('10.jpg','10'),
        ('11.jpg','11'),
        ('12.jpg','12'),
        ('13.jpg','13');


