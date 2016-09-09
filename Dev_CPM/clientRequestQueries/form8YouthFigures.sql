SELECT d . * , bd . *,
v.`pk_cropVarietiesId`,
v.`cropVariety` as nameVariety
FROM `tbl_demo_records_book` d
LEFT JOIN `tbl_demo_book_details` bd ON d.`demoId` = bd.`demoId`
LEFT JOIN `tbl_farmers` f ON f.`tbl_farmersId`=d.`nameHostFarmer`
JOIN `tbl_cropvarieties` v ON v.`pk_cropVarietiesId`=d.`cropVariety`
ORDER BY d.`demoId` DESC