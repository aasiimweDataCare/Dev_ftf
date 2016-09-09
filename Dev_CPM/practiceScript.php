<?php

$insert_csv['maize_acreage'] = $csv_array[16];
$insert_csv['maize_mapped'] = $csv_array[17];
$insert_csv['maize_improved_seeds'] = $csv_array[18];
$insert_csv['maize_improved_acreage'] = $csv_array[19];
$insert_csv['maize_improved_acreage_mapped'] = $csv_array[20];
$insert_csv['maize_improved_cost'] = $csv_array[21];
$insert_csv['maize_seed_supplier'] = $csv_array[22];
$insert_csv['maize_seed_supplier_other'] = $csv_array[23];
$insert_csv['maize_benefits'] = $csv_array[24];
$insert_csv['maize_benefits_other'] = $csv_array[25];
$insert_csv['maize_fetilizer_use'] = $csv_array[26];
$insert_csv['maize_acreage_fertilizer'] = $csv_array[27];
$insert_csv['maize_fertilizer_cost'] = $csv_array[28];
$insert_csv['maize_fertilizer_supplier'] = $csv_array[29];
$insert_csv['maize_fertilizer_supplier_other'] = $csv_array[30];
$insert_csv['maize_fertilizer_benefits'] = $csv_array[31];
$insert_csv['maize_fertilizer_benefits_other'] = $csv_array[32];
$insert_csv['maize_chemical_use'] = $csv_array[33];
$insert_csv['maize_chemical_acreage'] = $csv_array[34]; 
$insert_csv['maize_chemical_acreage_mapped'] = $csv_array[35];
$insert_csv['maize_chemical_cost'] = $csv_array[36];
$insert_csv['maize_chemical_supplier'] = $csv_array[37];
$insert_csv['maize_chemical_supplier_other'] = $csv_array[38];
$insert_csv['maize_chemical_benefits'] = $csv_array[39];
$insert_csv['maize_chemical_benefits_other'] = $csv_array[40]; 
$insert_csv['maize_mgt_practices'] = $csv_array[41];
$insert_csv['maize_mgt_practices_acreage'] = $csv_array[42];
$insert_csv['maize_mgt_practices_acreage_mapped'] = $csv_array[43];
$insert_csv['maize_cost_ict'] = $csv_array[]; $insert_csv['maize_ ict_supplier'] = $csv_array[44];
$insert_csv['maize_ ict_supplier_other'] = $csv_array[45];
$insert_csv['maize_mgt_benefits'] = $csv_array[46];
$insert_csv['maize_mgt_benefits_other'] = $csv_array[47];
$insert_csv['maize_machinery_use'] = $csv_array[48];
$insert_csv['maize_machinery_acreage'] = $csv_array[49];
$insert_csv['maize_machinery_acreage_mapped'] = $csv_array[50];
$insert_csv['maize_ machinery_cost'] = $csv_array[51];
$insert_csv['maize_ machinery_supplier'] = $csv_array[52];
$insert_csv['maize_ machinery_supplier_other'] = $csv_array[53];
$insert_csv['maize_ machinery_benefits'] = $csv_array[54];
$insert_csv['maize_ machinery_benefits_other'] = $csv_array[55];
$insert_csv['maize_harvested'] = $csv_array[56];
$insert_csv['maize_sold'] = $csv_array[57];
$insert_csv['maize_sold_price'] = $csv_array[58];
$insert_csv['maize_harvest_loss'] = $csv_array[59];


//==============insert values into $table3===================
$stable3= "INSERT INTO ".$table3."(`fk_patId`, `farmer_code`,
`maize_acreage`, `maize_mapped`,
`maize_improved_seeds`, `maize_improved_acreage`,
`maize_improved_acreage_mapped`, `maize_improved_cost`,
`maize_seed_supplier`, `maize_seed_supplier_other`,
`maize_benefits`, `maize_benefits_other`,
`maize_fetilizer_use`, `maize_acreage_fertilizer`,
`maize_fertilizer_cost`, `maize_fertilizer_supplier`,
`maize_fertilizer_supplier_other`, `maize_fertilizer_benefits`,
`maize_fertilizer_benefits_other`, `maize_chemical_use`,
`maize_chemical_acreage`, `maize_chemical_acreage_mapped`,
`maize_chemical_cost`, `maize_chemical_supplier`,
`maize_chemical_supplier_other`, `maize_chemical_benefits`,
`maize_chemical_benefits_other`, `maize_mgt_practices`,
`maize_mgt_practices_acreage`, `maize_mgt_practices_acreage_mapped`,
`maize_cost_ict`, `maize_ ict_supplier`,
`maize_ ict_supplier_other`, `maize_mgt_benefits`,
`maize_mgt_benefits_other`, `maize_machinery_use`,
`maize_machinery_acreage`, `maize_machinery_acreage_mapped`,
`maize_ machinery_cost`, `maize_ machinery_supplier`,
`maize_ machinery_supplier_other`, `maize_ machinery_benefits`,
`maize_ machinery_benefits_other`, `maize_harvested`,
`maize_sold`, `maize_sold_price`,
`maize_harvest_loss`,
`msg_at_readtime`,`readtime`) 
VALUES ('".$insert_csv['fk_patId']."','".$insert_csv['farmer_code']."',
'".$insert_csv['maize_acreage']."', '".$insert_csv['maize_mapped']."',
'".$insert_csv['maize_improved_seeds']."', '".$insert_csv['maize_improved_acreage']."',
'".$insert_csv['maize_improved_acreage_mapped']."', '".$insert_csv['maize_improved_cost']."',
'".$insert_csv['maize_seed_supplier']."', '".$insert_csv['maize_seed_supplier_other']."',
'".$insert_csv['maize_benefits']."', '".$insert_csv['maize_benefits_other']."',
'".$insert_csv['maize_fetilizer_use']."', '".$insert_csv['maize_acreage_fertilizer']."',
'".$insert_csv['maize_fertilizer_cost']."', '".$insert_csv['maize_fertilizer_supplier']."',
'".$insert_csv['maize_fertilizer_supplier_other']."', '".$insert_csv['maize_fertilizer_benefits']."',
'".$insert_csv['maize_fertilizer_benefits_other']."', '".$insert_csv['maize_chemical_use']."',
'".$insert_csv['maize_chemical_acreage']."', '".$insert_csv['maize_chemical_acreage_mapped']."',
'".$insert_csv['maize_chemical_cost']."', '".$insert_csv['maize_chemical_supplier']."',
'".$insert_csv['maize_chemical_supplier_other']."', '".$insert_csv['maize_chemical_benefits']."',
'".$insert_csv['maize_chemical_benefits_other']."', '".$insert_csv['maize_mgt_practices']."',
'".$insert_csv['maize_mgt_practices_acreage']."', '".$insert_csv['maize_mgt_practices_acreage_mapped']."',
'".$insert_csv['maize_cost_ict']."', '".$insert_csv['maize_ ict_supplier']."',
'".$insert_csv['maize_ ict_supplier_other']."', '".$insert_csv['maize_mgt_benefits']."',
'".$insert_csv['maize_mgt_benefits_other']."', '".$insert_csv['maize_machinery_use']."',
'".$insert_csv['maize_machinery_acreage']."', '".$insert_csv['maize_machinery_acreage_mapped']."',
'".$insert_csv['maize_ machinery_cost']."', '".$insert_csv['maize_ machinery_supplier']."',
'".$insert_csv['maize_ machinery_supplier_other']."', '".$insert_csv['maize_ machinery_benefits']."',
'".$insert_csv['maize_ machinery_benefits_other']."', '".$insert_csv['maize_harvested']."',
'".$insert_csv['maize_sold']."', '".$insert_csv['maize_sold_price']."',
'".$insert_csv['maize_harvest_loss']."',
'".$msg_at_readtime."','".$timestamp."')";
//$c=mysql_query($stable3, $connect );
   
   ?>
   