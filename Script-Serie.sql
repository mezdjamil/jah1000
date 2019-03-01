/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  27/02/2019 14:58:19                      */
/*==============================================================*/


alter table EPISODE 
   drop foreign key FK_EPISODE_APPARTIEN_SERIE;


alter table EPISODE 
   drop foreign key FK_EPISODE_APPARTIEN_SERIE;

drop table if exists EPISODE;

drop table if exists SERIE;

/*==============================================================*/
/* Table : EPISODE                                              */
/*==============================================================*/
create table EPISODE
(
   CODEEPISODES         int not null auto_increment  comment '',
   CODESERIE            int not null  comment '',
   NOMDELEPISODE        varchar(1)  comment '',
   primary key (CODEEPISODES)
);

/*==============================================================*/
/* Table : SERIE                                                */
/*==============================================================*/
create table SERIE
(
   CODESERIE            int not null auto_increment  comment '',
   NOMDELASERIE         varchar(1)  comment '',
   NUMERODELASAISON     int  comment '',
   primary key (CODESERIE)
);

alter table EPISODE add constraint FK_EPISODE_APPARTIEN_SERIE foreign key (CODESERIE)
      references SERIE (CODESERIE);

