INSERT INTO `tbl_training`(`tbl_trainingId`, `district`,
`subcounty`, `parish`,
`trainingVillage`,

`pva`,
`eacmgs`, 
`eacbgs`,
`mpe`,
`cpp`,
`ai`,
`lp`,
`ep`,
`sc`,

`trainingDate`,
`mainValueChain`, `trainingFocus`,
`targetAudience`, `pat_recommendations`)
VALUES
('8890', '111',
'1101104', '110110401',
'demo data',
'',
'', 
'',
'',
'',
'',
'',
'',
'',

'2016-09-07',
'', 
'',
'2',
'')





INSERT INTO `tbl_trainers`(`trainingId`,
`trainers_name`, `trainers_title`,
`trainers_organisation`, `trainers_contact`)
VALUES
('8890',
'rrrrrrr', 'ttttt',
'tyyyy', 'rrreee')


INSERT INTO `tbl_participants`(`trainingId`,
`name`, `age`,`sex`,
`status`, `village`,
`typeOfIndividual`, `telephone`)
VALUES
('8890',
'aaaaa', '23','Male',
'New', 'eee_village',
'2', '+25677777777777')

INSERT INTO `tbl_participants`(`trainingId`,
`name`, `age`,`sex`,
`status`, `village`,
`typeOfIndividual`, `telephone`)
VALUES
('8890',
'eeeee', '45','Female',
'Old', 'eee_village',
'6', '+25688888888888')