-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: localhost    Database: sri_arogya
-- ------------------------------------------------------
-- Server version	5.5.50

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appointment_details`
--

DROP TABLE IF EXISTS `appointment_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patient_Id` varchar(45) DEFAULT NULL,
  `Token_Number` varchar(45) DEFAULT NULL,
  `Type` varchar(45) DEFAULT NULL,
  `Doctor` varchar(45) DEFAULT NULL,
  `Fees` varchar(45) DEFAULT NULL,
  `Validity_Period` varchar(45) DEFAULT NULL,
  `Time_Slots` varchar(45) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_datetime` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_datetime` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_datetime` datetime DEFAULT NULL,
  `status` enum('Active','Inactive','Deleted') DEFAULT 'Active',
  `op_date` varchar(45) DEFAULT NULL,
  `op_status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Token_Number_UNIQUE` (`Token_Number`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment_details`
--

LOCK TABLES `appointment_details` WRITE;
/*!40000 ALTER TABLE `appointment_details` DISABLE KEYS */;
INSERT INTO `appointment_details` VALUES (1,'3344','15877','Gynic','Dr.Vivek','5000','6 Days','11 A.M - 1 P.M',1,'2021-05-11 15:14:45',7,'2021-05-13 12:03:43',NULL,NULL,'Active','2021-05-13',0),(8,'1009','25342','Gynic','Dr.Vivek','4444','2 Days','3 P.M - 5 P.M',1,'2021-05-11 16:35:38',NULL,NULL,NULL,NULL,'Active','2021-05-11',1);
/*!40000 ALTER TABLE `appointment_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient_registration`
--

DROP TABLE IF EXISTS `patient_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patient_Name` varchar(50) DEFAULT NULL,
  `Patient_Id` varchar(45) DEFAULT NULL,
  `Aadhar_Number` varchar(45) DEFAULT NULL,
  `Relation_Name` varchar(45) DEFAULT NULL,
  `Gender` varchar(45) DEFAULT NULL,
  `Blood_Group` varchar(45) DEFAULT NULL,
  `Date_of_Birth` varchar(45) DEFAULT NULL,
  `Age` varchar(45) DEFAULT NULL,
  `Mobile_Number` varchar(45) DEFAULT NULL,
  `Emergency_Mobile_Number` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Pincode` varchar(45) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `Landmark` varchar(45) DEFAULT NULL,
  `Photo` varchar(45) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_datetime` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_datetime` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_datetime` datetime DEFAULT NULL,
  `status` enum('Active','Inactive','Deleted') DEFAULT 'Active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Aadhar_Number_UNIQUE` (`Aadhar_Number`),
  UNIQUE KEY `Patient_Id_UNIQUE` (`Patient_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_registration`
--

LOCK TABLES `patient_registration` WRITE;
/*!40000 ALTER TABLE `patient_registration` DISABLE KEYS */;
INSERT INTO `patient_registration` VALUES (1,'Anil','3344','998877665544','rohith','Male','A+','2021-05-02','34','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','',NULL,1,'2021-05-11 15:14:10',NULL,NULL,NULL,NULL,'Active'),(10,'venkatesh','1009','78659800','srinivas','Male','A+','2021-05-02','20','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','delhi',NULL,1,'2021-05-11 16:35:09',NULL,NULL,NULL,NULL,'Active'),(13,'nani','nani','124309','srinivas','Male','O+','2021-05-01','20','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','delhi',NULL,1,'2021-05-12 15:44:20',NULL,NULL,NULL,NULL,'Active'),(15,'bobby','bob','7680065444','ravi','Male','B-','2021-05-01','20','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','delhi','../Img/Patient/bobby.jpg',1,'2021-05-12 17:29:09',NULL,NULL,NULL,NULL,'Active'),(16,'manogna','manuuu','94949494','ramesh','Female','A-','2021-05-02','20','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','USA','../Img/Patient/manogna.jpg',7,'2021-05-13 11:22:18',7,'2021-05-13 11:32:13',NULL,NULL,'Active'),(17,'vaeett','vae','9090','ramesh','Male','A+','2021-04-29','20','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','delhi',NULL,7,'2021-05-13 20:20:34',NULL,NULL,NULL,NULL,'Active'),(20,'VARUN','abcd','90909088','rohith','Male','O-','2021-05-02','20','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','delhi',NULL,7,'2021-05-13 20:25:18',NULL,NULL,NULL,NULL,'Active');
/*!40000 ALTER TABLE `patient_registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(45) DEFAULT NULL,
  `r_dv_sph` varchar(45) DEFAULT NULL,
  `r_dv_cyl` varchar(45) DEFAULT NULL,
  `r_dv_axis` varchar(45) DEFAULT NULL,
  `r_dv_vision` varchar(45) DEFAULT NULL,
  `r_add_sph` varchar(45) DEFAULT NULL,
  `r_add_cyl` varchar(45) DEFAULT NULL,
  `r_add_axis` varchar(45) DEFAULT NULL,
  `r_add_vision` varchar(45) DEFAULT NULL,
  `l_dv_sph` varchar(45) DEFAULT NULL,
  `l_dv_cyl` varchar(45) DEFAULT NULL,
  `l_dv_axis` varchar(45) DEFAULT NULL,
  `l_dv_vision` varchar(45) DEFAULT NULL,
  `l_add_sph` varchar(45) DEFAULT NULL,
  `l_add_cyl` varchar(45) DEFAULT NULL,
  `l_add_axis` varchar(45) DEFAULT NULL,
  `l_add_vision` varchar(45) DEFAULT NULL,
  `advice` varchar(200) DEFAULT NULL,
  `ipd` varchar(45) DEFAULT NULL,
  `admit` varchar(45) DEFAULT 'No',
  `created_by` int(11) DEFAULT NULL,
  `created_datetime` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_datetime` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_datetime` datetime DEFAULT NULL,
  `status` enum('Active','Inactive','Deleted') DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription`
--

LOCK TABLES `prescription` WRITE;
/*!40000 ALTER TABLE `prescription` DISABLE KEYS */;
INSERT INTO `prescription` VALUES (5,'3344','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','PolyCarbonate,CR 39,Unifocal,Office Lens,Tint','serious','Yes',NULL,NULL,NULL,NULL,NULL,NULL,'Active'),(6,'1009','Normal','not normal','Normal','not normal','Normal','Normal','Normal','not normal','Normal','Normal','Normal','not normal','Normal','not normal','not normal','not normal','PolyCarbonate,CR 39,Progressive,Tint,Photochromic','serious','Yes',NULL,NULL,NULL,NULL,NULL,NULL,'Active'),(7,'1009','Normal','not normal','Normal','not normal','Normal','Normal','Normal','not normal','Normal','Normal','Normal','not normal','Normal','not normal','not normal','not normal','PolyCarbonate,CR 39,Progressive,Tint,Photochromic','serious','Yes',NULL,NULL,NULL,NULL,NULL,NULL,'Active'),(8,'3344','Normal','Normal','axis1','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','CR 39,Office Lens,Tint','serious','Yes',NULL,NULL,NULL,NULL,NULL,NULL,'Active');
/*!40000 ALTER TABLE `prescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) DEFAULT NULL,
  `privilege` varchar(50) DEFAULT NULL,
  `status` enum('Active','Inactive','Deleted') DEFAULT 'Active',
  `created_by` int(11) DEFAULT NULL,
  `created_datetime` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_datetime` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Admin','1','Active',1,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_registration`
--

DROP TABLE IF EXISTS `staff_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_Name` varchar(50) DEFAULT NULL,
  `Employee_ID` varchar(50) DEFAULT NULL,
  `Department` varchar(45) DEFAULT NULL,
  `Designation` varchar(45) DEFAULT NULL,
  `Date_of_Join` varchar(45) DEFAULT NULL,
  `Role` varchar(45) DEFAULT NULL,
  `Aadhar_Number` varchar(45) DEFAULT NULL,
  `Relation_Name` varchar(45) DEFAULT NULL,
  `Gender` varchar(45) DEFAULT NULL,
  `Blood_Group` varchar(45) DEFAULT NULL,
  `Date_of_Birth` varchar(45) DEFAULT NULL,
  `Age` varchar(45) DEFAULT NULL,
  `Employee_Mobile_Number` varchar(45) DEFAULT NULL,
  `Emergency_Mobile_Number` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Pincode` varchar(45) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `Landmark` varchar(45) DEFAULT NULL,
  `Photo` varchar(45) DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_datetime` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_datetime` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_datetime` datetime DEFAULT NULL,
  `status` enum('Active','Inactive','Deleted') DEFAULT 'Active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Employee_ID_UNIQUE` (`Employee_ID`),
  UNIQUE KEY `Aadhar_Number_UNIQUE` (`Aadhar_Number`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_registration`
--

LOCK TABLES `staff_registration` WRITE;
/*!40000 ALTER TABLE `staff_registration` DISABLE KEYS */;
INSERT INTO `staff_registration` VALUES (1,'manikanta','maniiiii','cse','accountant','2021-05-01','Doctor','22334455666','ramesh','Male','B-','2021-05-04','20','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','delhi','../Img/Staff/mani089.jpg','mani089','mani089',NULL,NULL,7,'2021-05-13 11:34:41',NULL,NULL,'Active'),(7,'varun','2100','cse','student','2001-11-16','Doctor','888888','prasad','Male','A+','2021-05-08','34','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','delhi',NULL,'vama697','vama697',NULL,NULL,NULL,NULL,NULL,NULL,'Active'),(8,'vijay','1234','care','student','2021-05-01','Doctor','9090','rohith','Male','B-','2021-05-03','34','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','delhi',NULL,'vijay','vijay',NULL,NULL,NULL,NULL,NULL,NULL,'Active'),(9,'vinay','vinu','cse','student','2021-05-05','Receptionist','123456734','srinivas','Male','B-','2021-05-07','20','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','delhi',NULL,'vinay123','vinay123',NULL,NULL,NULL,NULL,NULL,NULL,'Active'),(10,'vinay','navv','ece','accountant','2021-05-02','Others','88888845','ramesh','Male','B+','2021-05-02','20','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','delhi','../Img/Staff/vinay.jpg','vinay','naveen',NULL,NULL,NULL,NULL,NULL,NULL,'Active'),(11,'varun','varrrrrrrr','cse','student','2021-05-07','Doctor','223344556664533','srinivas','Male','O+','2021-05-02','34','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','delhi','../Img/Staff/varun1553.jpg','varun1553','varun1553',NULL,NULL,NULL,NULL,NULL,NULL,'Active'),(22,'varun','varuwwww','cse','accountant','2021-05-06','Receptionist','998877665544211','prasad','Male','O+','2021-05-11','20','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','USA','../Img/Staff/34eeerrr.jpg','34eeerrr','34eerrrr',7,'2021-05-13 19:29:28',7,'2021-05-13 19:30:47',NULL,NULL,'Active'),(24,'naveen','nbcc','ece','accountant','2021-04-30','Doctor','99887766554422','ramesh','Transgender','A-','2021-04-26','20','7780609911','7780609911','varun.mahankali39@gmail.com','502278','near delhi wala sweet house','USA','../Img/Staff/naveen3222.jpg','naveen3222','navv333',NULL,NULL,NULL,NULL,NULL,NULL,'Active');
/*!40000 ALTER TABLE `staff_registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `status` enum('Active','Inactive','Deleted') DEFAULT 'Active',
  `created_by` int(11) DEFAULT NULL,
  `created_datetime` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_datetime` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-13 21:12:19
