{\rtf1\ansi\ansicpg1252\cocoartf1504
{\fonttbl\f0\fnil\fcharset0 Menlo-Regular;}
{\colortbl;\red255\green255\blue255;\red0\green0\blue0;\red255\green255\blue255;}
{\*\expandedcolortbl;\csgray\c100000;\csgray\c0;\csgray\c100000;}
\margl1440\margr1440\vieww10800\viewh8400\viewkind0
\pard\tx560\tx1120\tx1680\tx2240\tx2800\tx3360\tx3920\tx4480\tx5040\tx5600\tx6160\tx6720\pardirnatural\partightenfactor0

\f0\fs22 \cf2 \cb3 \CocoaLigature0 CREATE TABLE userprofile (user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,firstname VARCHAR(20) NOT NULL,lastname VARCHAR(20) NOT NULL, nickname VARCHAR(20) NOT NULL, encrp_password VARCHAR(100) NOT NULL, email VARCHAR(50) NOT NULL, birth DATE, gender CHAR(1) NOT NULL, status VARCHAR(100), salt VARCHAR(50) NOT NULL);}