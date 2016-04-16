
drop view if exists conflicted_courses ;
create view conflicted_courses As SELECT COURSEID from COURSE where START_FROM >= '10:00:00'  AND END_AT <= '11:00:00' AND DAYS LIKE '%W%';
SELECT * from conflicted_courses;


drop view if EXISTS COURSE_id;
create view COURSE_id as SELECT COURSEID from COURSE where TITLE = 'cmps253';

drop view if EXISTS pseudosuggested;
create view pseudosuggested AS SELECT u.USERID, u.FIRSTNAME, u.LASTNAME, u.EMAIL from USER u, ENROLLEMENT e, COURSE_id v where e.COURSEID = v.COURSEID  AND u.USERID = e.USERID;

drop view if EXISTS enrolled_conflict;
create view enrolled_conflict as SELECT usr.USERID, usr.FIRSTNAME, usr.LASTNAME, usr.EMAIL from USER usr, ENROLLEMENT enr, conflicted_courses con where usr.USERID = enr.USERID AND enr.COURSEID = con.COURSEID;

SELECT sg.USERID, sg.FIRSTNAME, sg.LASTNAME, sg.EMAIL FROM pseudosuggested sg LEFT JOIN enrolled_conflict ec on sg.USERID = ec.USERID WHERE ec.USERID IS NULL;

/*select USERID, FIRSTNAME, LASTNAME, EMAIL from enrolled_conflict;*/
