# Host: localhost  (Version 5.5.5-10.4.21-MariaDB)
# Date: 2022-01-25 18:50:22
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "tbl_beli"
#

DROP TABLE IF EXISTS `tbl_beli`;
CREATE TABLE `tbl_beli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merk` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nohp` varchar(45) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kodepos` int(11) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_beli"
#

INSERT INTO `tbl_beli` VALUES (3,'McLaren 720S',1,'Iqbal Sonata','85216311758','Gg nangka sebanga riau',28784,'Bengkalis','iqbalsonata@gmail.com'),(4,'Bugatti Chiron SuperSport',3,'Iqbal Sonata','85216311758','Gg nangka sebanga riau',28784,'Bengkalis','iqbalsonata@gmail.com'),(5,'McLaren 720S',1,'Iqbal Sonata','85216311758','Gg nangka sebanga riau',28784,'Bengkalis','iqbalsonata@gmail.com'),(6,'McLaren 720S',1,'Iqbal Sonata','85216311758','Gg nangka sebanga riau',28784,'Bengkalis','iqbalsonata@gmail.com'),(7,'Ferarri Spider',1,'Reyhan Mubarack','895360057221','GG mawar sebanga duri riau',28784,'Bengkalis','reyhanmubarak@gmail.com'),(8,'Tesla Model 3',3,'Raga Setia Wibawa','895360057221','Jl. Khayangan No. 99, Duri, Riau',28784,'Bengkalis','ragasetia80@gmail.com'),(9,'Bugatti Chiron Super Sport 300+',7,'Iqbal Sonata','85216311758','Gg nangka sebanga riau',28784,'Bengkalis','iqbalsonata@gmail.com');

#
# Structure for table "tbl_jual"
#

DROP TABLE IF EXISTS `tbl_jual`;
CREATE TABLE `tbl_jual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merk` varchar(255) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_jual"
#

/*!40000 ALTER TABLE `tbl_jual` DISABLE KEYS */;
INSERT INTO `tbl_jual` VALUES (30,'McLaren 720S',300),(31,'Tesla Model 3',780),(32,'Bugatti Chiron SuperSport',450),(33,'Lamborghini Aventador',1020),(34,'Ferarri Spider',600),(35,'Toyota Supra',550),(36,'Chevrolet Corvette',175),(37,'Hennessey Venom GT',670),(38,'SSC Tuatara',850),(39,'Bugatti Chiron Super Sport 300+',635);
/*!40000 ALTER TABLE `tbl_jual` ENABLE KEYS */;

#
# Structure for table "tbl_mobil"
#

DROP TABLE IF EXISTS `tbl_mobil`;
CREATE TABLE `tbl_mobil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merk` varchar(200) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `gambar` varchar(25) DEFAULT NULL,
  `warna` varchar(40) DEFAULT NULL,
  `kecepatan` int(11) DEFAULT NULL,
  `transmisi` varchar(255) DEFAULT NULL,
  `duduk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_mobil"
#

INSERT INTO `tbl_mobil` VALUES (1,'McLaren 720S',315000,'61e7d46ba6614.jpg','Light Blue',55000,'Manual',2),(2,'Tesla Model 3',14000,'61e53ecd11be4.jpg','Blue/Red',50000,'Manual',4),(3,'Bugatti Chiron SuperSport',650000,'61e7f063d04d6.jpg','Red-Black',40000,'Manual',2),(4,'Lamborghini Aventador',50000,'61e934d0d8c20.jpg','Blue',80000,'Manual',2),(5,'Ferarri Spider',45000,'61e93509c1f67.jpg','Red',45000,'Manual',2),(6,'Toyota Supra',60000,'61e9355bf2df4.png','Red',70000,'Manual',2),(7,'Chevrolet Corvette',50000,'61e939e2c32ea.jpg','Black',40000,'Manual',2),(8,'Hennessey Venom GT',90000,'61ea65bfdc496.jpg','Gold',65000,'Manual',2),(9,'SSC Tuatara',120000,'61ea6735c58b2.jpg','Black',50000,'Manual',2),(10,'Bugatti Chiron Super Sport 300+',150000,'61ea6819c9240.jpg','Black Orange',55000,'Manual',2);

#
# Structure for table "tbl_stok"
#

DROP TABLE IF EXISTS `tbl_stok`;
CREATE TABLE `tbl_stok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merk` varchar(255) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_stok"
#

/*!40000 ALTER TABLE `tbl_stok` DISABLE KEYS */;
INSERT INTO `tbl_stok` VALUES (1,'McLaren 720S',297),(2,'Tesla Model 3',777),(3,'Bugatti Chiron SuperSport',447),(4,'Lamborghini Aventador',1020),(5,'Ferarri Spider',599),(6,'Toyota Supra',550),(7,'Chevrolet Corvette',175),(8,'Hennessey Venom GT',670),(9,'SSC Tuatara',850),(10,'Bugatti Chiron Super Sport 300+',628);
/*!40000 ALTER TABLE `tbl_stok` ENABLE KEYS */;

#
# Structure for table "tbl_user"
#

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_user"
#

INSERT INTO `tbl_user` VALUES (4,'asda','$2y$10$x7/r9ODmARWnF7kXTjVl0uEAsJAHGrLBEb3d1ejuAFQWF3/iQAiHq','$2y$10$BTQPLlQMAHu/KgjkQ2.AQuD9I33DqSfqOXg0IHN5dsRZSuslkR/cm'),(7,'admin','$2y$10$.2vHz/k6ofKxN5EoO/sql.t024mKoW8slAjKyHXJQmgQE3/aYEi7K','$2y$10$WfXO/03BeBvzjUjdQrBYvOZIow19ehJpcLZV3a8c1cHsZqK.P943i'),(9,'iqbalsonata','$2y$10$W4Kfo9YzwYPlB2t3KAOAEeGSkcBdYHOlXGTw7dwBxhRRjBMXzrJFC','$2y$10$rm6DUDV7ztLaXHPC/cUm8uCenB9qA5euay350PSCY5hFxdM1zgKsq'),(10,'vansblue30','$2y$10$LoJTbdacE9j4i9yWCUl8b.Eubid4kqXUxZlpOl6hOZHbYMxb72cne','$2y$10$uxzHcsLidVTGn7hZ9sqFKOL0II4KbXLnq2vdIc3qxCb26.TJdjBaG'),(11,'car','$2y$10$Mf.MorD6IzSqL/PjQI2.0ep8/35w6tto/Nx0vwzzB.QfSRZ9cITYG','$2y$10$jy9iAY8.ghK3e7.OM6MoheK1hiU3l.q98UwphNdOlP4r4gNhaNBrW'),(12,'asdads','$2y$10$2FY/eXhNDRQPnvYifqJZi.DEyjBV5RxvNV3PNbxzLXTrOofEaUlXa','$2y$10$q6h/jLlTos.R4IFp.aYu6OzVEMWyvWdJsW4LTi8iPi.6FcZUGnN4S'),(13,'dimas','$2y$10$CYiz.WigMGu8wyiCMLDVjOH1QLNqdrXpGgPNZJEdJxPQCO8SsDZqO','$2y$10$kIq5H89qQQQzK5/sGTkuyeXbvQBB8CrklHsRLzsjUwSDzmIwe6L5W');

#
# Trigger "trg_batal_beli"
#

DROP TRIGGER IF EXISTS `trg_batal_beli`;
dbase_mobil

#
# Trigger "trg_beli_mobil"
#

DROP TRIGGER IF EXISTS `trg_beli_mobil`;
dbase_mobil

#
# Trigger "trg_tbl_jual_mobil"
#

DROP TRIGGER IF EXISTS `trg_tbl_jual_mobil`;
dbase_mobil
