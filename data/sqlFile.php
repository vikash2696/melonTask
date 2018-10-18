<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
CREATE TABLE `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `aboutme` varchar(500) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
);
 


CREATE TABLE `word_library` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `word` varchar(50) NOT NULL,
  `word_hint` varchar(200) NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
);
  
insert into word_library(id,word,word_hint,status) values(1,'apple','a kind of fruit',1);
insert into word_library(id,word,word_hint,status) values(2,'person','human being','1');
insert into word_library(id,word,word_hint,status) values(3,'elephant','an animal','1');

  