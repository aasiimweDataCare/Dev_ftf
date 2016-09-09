<?php
class FtFRepLevelTwoDataMining{
 var $LevelTwoSubIndicatorID;
 var $Query;
 
 	

 
							function FtFRepLevelTwoDataMining($LevelTwoSubIndicatorID)
							{
							$this->IndicatorID;
							}
							//MiningIndicator15($LevelTwoSubIndicatorID=15,$opening_year,$closure_year,$resultValue)
							
							function l2MiningIndicator($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							 
							switch($LevelTwoSubIndicatorID){
							case 1: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandBeansMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 2: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandBeansFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 3: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandBeansJoint($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 4: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandBeansAssoc($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 5: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandBeansHa($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 6: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandBeansTP($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 9: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandBeansVS($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 10: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandBeansQTY($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 11: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandBeansCOST($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 12: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandCoffeeMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 13: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandCoffeeFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 14: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandCoffeeJoint($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 15: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandCoffeeAssoc($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 16: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandCoffeeHa($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 17: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandCoffeeTP($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 18: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandCoffeeVS($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 19: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandCoffeeQTY($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 20: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandCoffeeCOST($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 21: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandMaizeMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 22: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandMaizeFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 23: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandMaizeJoint($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 24: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandMaizeAssoc($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 25: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandMaizeHa($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 26: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandMaizeTP($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 27: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandMaizeVS($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 28: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandMaizeQTY($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 29: 
							$x=FtFRepLevelTwoDataMining::grossMarginPerUnitOfLandMaizeCOST($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 30: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesBeansTABs($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 31: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesBeansTBs($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 32: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesBeansRY($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 33: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesBeansVS($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 34: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesBeansNB($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 35: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesCoffeeTABs($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 36: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesCoffeeTBs($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 37: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesCoffeeRY($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 38: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesCoffeeVS($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 39: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesCoffeeNB($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 40: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesMaizeTABs($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 41: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesMaizeTBs($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 42: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesMaizeRY($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 43: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesMaizeVS($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

							case 44: 
							$x=FtFRepLevelTwoDataMining::valueOfIncrementalSalesMaizeNB($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 45: 
							$x=FtFRepLevelTwoDataMining::shortTermAgriculturalFoodsecurityTrainingTypePROD($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 46: 
							$x=FtFRepLevelTwoDataMining::shortTermAgriculturalFoodsecurityTrainingTypeGOV($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 47: 
							$x=FtFRepLevelTwoDataMining::shortTermAgriculturalFoodsecurityTrainingTypePSV($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 48: 
							$x=FtFRepLevelTwoDataMining::shortTermAgriculturalFoodsecurityTrainingTypePCS($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 49: 
							$x=FtFRepLevelTwoDataMining::shortTermAgriculturalFoodsecurityTrainingTypeDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 50: 
							$x=FtFRepLevelTwoDataMining::shortTermAgriculturalFoodsecurityTrainingSexMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 51: 
							$x=FtFRepLevelTwoDataMining::shortTermAgriculturalFoodsecurityTrainingSexFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 52: 
							$x=FtFRepLevelTwoDataMining::shortTermAgriculturalFoodsecurityTrainingSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 53: 
							$x=FtFRepLevelTwoDataMining::appliedTechnologiesManagementPracticeFarmersSex($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 54: 
							$x=FtFRepLevelTwoDataMining::appliedTechnologiesManagementPracticeFarmersTP($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 55: 
							$x=FtFRepLevelTwoDataMining::appliedTechnologiesManagementPracticeOthersSex($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 56: 
							$x=FtFRepLevelTwoDataMining::appliedTechnologiesManagementPracticeOthersTP($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 57: 
							$x=FtFRepLevelTwoDataMining::numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganizationPE($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 58: 
							$x=FtFRepLevelTwoDataMining::numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganizationPO($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 59: 
							$x=FtFRepLevelTwoDataMining::numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganizationWA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 60: 
							$x=FtFRepLevelTwoDataMining::numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganizationWG($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 61: 
							$x=FtFRepLevelTwoDataMining::numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganizationTBA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 62: 
							$x=FtFRepLevelTwoDataMining::numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganizationCBO($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 63: 
							$x=FtFRepLevelTwoDataMining::numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganizationDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 64: 
							$x=FtFRepLevelTwoDataMining::numFarmersFoodsecurityPrivateEnterprisesNOCNew($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 65: 
							$x=FtFRepLevelTwoDataMining::numFarmersFoodsecurityPrivateEnterprisesNOCOLD($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 66: 
							$x=FtFRepLevelTwoDataMining::numFarmersFoodsecurityPrivateEnterprisesNOCDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 67: 
							$x=FtFRepLevelTwoDataMining::numProducerOrgsTO($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 68: 
							$x=FtFRepLevelTwoDataMining::numProducerOrgsCBO($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 69: 
							$x=FtFRepLevelTwoDataMining::numProducerOrgsDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 70: 
							$x=FtFRepLevelTwoDataMining::numProducerOrgsSexMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 71: 
							$x=FtFRepLevelTwoDataMining::numProducerOrgsSexFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 72: 
							$x=FtFRepLevelTwoDataMining::numProducerOrgsSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 73: 
							$x=FtFRepLevelTwoDataMining::numPrivateEnterprisesAppleiedTechnologyTypePE($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 74: 
							$x=FtFRepLevelTwoDataMining::numPrivateEnterprisesAppleiedTechnologyTypePO($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 75: 
							$x=FtFRepLevelTwoDataMining::numPrivateEnterprisesAppleiedTechnologyTypeWA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 76: 
							$x=FtFRepLevelTwoDataMining::numPrivateEnterprisesAppleiedTechnologyTypeWG($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 77: 
							$x=FtFRepLevelTwoDataMining::numPrivateEnterprisesAppleiedTechnologyTypeTBA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 78: 
							$x=FtFRepLevelTwoDataMining::numPrivateEnterprisesAppleiedTechnologyTypeCBO($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 79: 
							$x=FtFRepLevelTwoDataMining::numPrivateEnterprisesAppleiedTechnologyTypeDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 80: 
							$x=FtFRepLevelTwoDataMining::numPrivateEnterprisesAppleiedTechnologyNOCNEW($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 81: 
							$x=FtFRepLevelTwoDataMining::numPrivateEnterprisesAppleiedTechnologyNOCOLD($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 82: 
							$x=FtFRepLevelTwoDataMining::numPrivateEnterprisesAppleiedTechnologyNOCDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 83: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeTechCG($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 84: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeTechCP($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 85: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeTechPM($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 86: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeTechDM($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 87: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeTechSF($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 88: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeTechIRR($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 89: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeTechWM($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 90: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeTechCM($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 91: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeTechOther($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 92: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeTechTot($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 93: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeTechDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 94: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeSexMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 95: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeSexFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 96: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeSexJoint($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 97: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeSexAA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 98: 
							$x=FtFRepLevelTwoDataMining::hectaresTechnologiesManagementPracticeSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 99: 
							$x=FtFRepLevelTwoDataMining::ruralHouseholdsBenefitingNOCNew($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 100: 
							$x=FtFRepLevelTwoDataMining::ruralHouseholdsBenefitingNOCOld($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 101: 
							$x=FtFRepLevelTwoDataMining::ruralHouseholdsBenefitingNOCDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 102: 
							$x=FtFRepLevelTwoDataMining::ruralHouseholdsBenefitingGHTFemaleNoMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 103: 
							$x=FtFRepLevelTwoDataMining::ruralHouseholdsBenefitingGHTMaleNoFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 104: 
							$x=FtFRepLevelTwoDataMining::ruralHouseholdsBenefitingGHTMaleAndFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 105: 
							$x=FtFRepLevelTwoDataMining::ruralHouseholdsBenefitingGHTChildHeaded($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 106: 
							$x=FtFRepLevelTwoDataMining::ruralHouseholdsBenefitingGHTDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							
							case 107: 
							$x=FtFRepLevelTwoDataMining::jobsAttributedToFtFImplementationLocationUrban($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 108: 
							$x=FtFRepLevelTwoDataMining::jobsAttributedToFtFImplementationLocationRural($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 109: 
							$x=FtFRepLevelTwoDataMining::jobsAttributedToFtFImplementationLocationDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 110: 
							$x=FtFRepLevelTwoDataMining::jobsAttributedToFtFImplementationNOCNew($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 111: 
							$x=FtFRepLevelTwoDataMining::jobsAttributedToFtFImplementationNOCOld($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 112: 
							$x=FtFRepLevelTwoDataMining::jobsAttributedToFtFImplementationNOCDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 113: 
							$x=FtFRepLevelTwoDataMining::jobsAttributedToFtFImplementationSexJobHolderMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 114: 
							$x=FtFRepLevelTwoDataMining::jobsAttributedToFtFImplementationSexJobHolderFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 115: 
							$x=FtFRepLevelTwoDataMining::jobsAttributedToFtFImplementationSexJobHolderDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							
							case 116: 
							$x=FtFRepLevelTwoDataMining::ValueofAgriculturalRuralLoansTypeLRProducers($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 117: 
							$x=FtFRepLevelTwoDataMining::ValueofAgriculturalRuralLoansTypeLRLT($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 118: 
							$x=FtFRepLevelTwoDataMining::ValueofAgriculturalRuralLoansTypeLRWP($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 119: 
							$x=FtFRepLevelTwoDataMining::ValueofAgriculturalRuralLoansTypeLROthers($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 120: 
							$x=FtFRepLevelTwoDataMining::ValueofAgriculturalRuralLoansTypeLRDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 121: 
							$x=FtFRepLevelTwoDataMining::ValueofAgriculturalRuralLoansSexMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 122: 
							$x=FtFRepLevelTwoDataMining::ValueofAgriculturalRuralLoansSexFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 123: 
							$x=FtFRepLevelTwoDataMining::ValueofAgriculturalRuralLoansSexJoint($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 124: 
							$x=FtFRepLevelTwoDataMining::ValueofAgriculturalRuralLoansSexNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 125: 
							$x=FtFRepLevelTwoDataMining::ValueofAgriculturalRuralLoansSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 126: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsReceivingUSGSizeMicro($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 127: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsReceivingUSGSizeSmall($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 128: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsReceivingUSGSizeMedium($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 129: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsReceivingUSGSizeDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 130: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsReceivingUSGSexMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 131: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsReceivingUSGSexFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 132: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsReceivingUSGSexJoint($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 133: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsReceivingUSGSexNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 134: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsReceivingUSGSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 135: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersSizeMicro($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 136: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersSizeSmall($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 137: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersSizeMedium($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 138: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersSizeDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 139: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersSexMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							case 140: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersSexeFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 141: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersSexJoint($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 142: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersSexNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 143: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 144: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersMsmeTypeProducer($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 145: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersMsmeTypeSupplier($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 146: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersMsmeTypeTrader($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 147: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersMsmeTypeProcessors($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 148: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersMsmeTypeNonAgriculture($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 149: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersMsmeTypeOther($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 150: 
							$x=FtFRepLevelTwoDataMining::NumMSMEsIncludingFarmersMsmeTypeDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 151: 
							$x=FtFRepLevelTwoDataMining::RiskReducingPracticesTypeAgriculture($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							case 152: 
							$x=FtFRepLevelTwoDataMining::RiskReducingPracticesTypeWater($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 153: 
							$x=FtFRepLevelTwoDataMining::RiskReducingPracticesTypeHealth($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 154: 
							$x=FtFRepLevelTwoDataMining::RiskReducingPracticesTypeDisasterRiskManagement($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 155: 
							$x=FtFRepLevelTwoDataMining::RiskReducingPracticesTypeUrban($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 156: 
							$x=FtFRepLevelTwoDataMining::RiskReducingPracticesTypeOther($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							case 157: 
							$x=FtFRepLevelTwoDataMining::RiskReducingPracticesTypeDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 158: 
							$x=FtFRepLevelTwoDataMining::RiskReducingPracticesSexMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 159: 
							$x=FtFRepLevelTwoDataMining::RiskReducingPracticesSexFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 160: 
							$x=FtFRepLevelTwoDataMining::RiskReducingPracticesSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							
							
							
							
							
							
							
							
							
							
							
							
							
								}/* End of Switch  statement */

}/* End of l2MiningIndicator method */


################################################## Disaggregates Methods level two #################################################################


//Start:1 Gross margin per unit of land, kilogram, or animal of[Beans>>Male] ...
function grossMarginPerUnitOfLandBeansMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Beans(TP)--------------------------- */
							$x="SELECT 1 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 1=1
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$TotProdBeansYr1=$result['TotProdBeansYr1'];
								$TotProdBeansYr2=$result['TotProdBeansYr2'];
								$TotProdBeansYr3=$result['TotProdBeansYr3'];
								$TotProdBeansYr4=$result['TotProdBeansYr4'];
								$TotProdBeansYr5=$result['TotProdBeansYr5'];
								$TotProdBeansYr6=$result['TotProdBeansYr6'];
								
							/* --------Form 6 Value of sales(VS)--------------------------- */
							$x="SELECT 1 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 1=1
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSalesBeansYr1=convertShillingsToDollars($result['VolSalesBeansYr1']);
								$VolSalesBeansYr2=convertShillingsToDollars($result['VolSalesBeansYr2']);
								$VolSalesBeansYr3=convertShillingsToDollars($result['VolSalesBeansYr3']);
								$VolSalesBeansYr4=convertShillingsToDollars($result['VolSalesBeansYr4']);
								$VolSalesBeansYr5=convertShillingsToDollars($result['VolSalesBeansYr5']);
								$VolSalesBeansYr6=convertShillingsToDollars($result['VolSalesBeansYr6']);
								
							/* --------Form 6 Volume sold(QS)--------------------------- */
							$x="SELECT 1 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 1=1
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSoldBeansYr1=$result['VolSoldBeansYr1'];
								$VolSoldBeansYr2=$result['VolSoldBeansYr2'];
								$VolSoldBeansYr3=$result['VolSoldBeansYr3'];
								$VolSoldBeansYr4=$result['VolSoldBeansYr4'];
								$VolSoldBeansYr5=$result['VolSoldBeansYr5'];
								$VolSoldBeansYr6=$result['VolSoldBeansYr6'];
								
							/* --------Form 6 Input Cost(IC)--------------------------- */
							$x="SELECT 1 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 1=1
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$inputCostBeansYr1=convertShillingsToDollars($result['inputCostBeansYr1']);
								$inputCostBeansYr2=convertShillingsToDollars($result['inputCostBeansYr2']);
								$inputCostBeansYr3=convertShillingsToDollars($result['inputCostBeansYr3']);
								$inputCostBeansYr4=convertShillingsToDollars($result['inputCostBeansYr4']);
								$inputCostBeansYr5=convertShillingsToDollars($result['inputCostBeansYr5']);
								$inputCostBeansYr6=convertShillingsToDollars($result['inputCostBeansYr6']);
								
							/* --------Form 6 Unit of Production/Area(UP)--------------------------- */
							$x="SELECT 1 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 1=1
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$unitProductionBeansYr1=convertAcresToHectares($result['unitProductionBeansYr1']);
								$unitProductionBeansYr2=convertAcresToHectares($result['unitProductionBeansYr2']);
								$unitProductionBeansYr3=convertAcresToHectares($result['unitProductionBeansYr3']);
								$unitProductionBeansYr4=convertAcresToHectares($result['unitProductionBeansYr4']);
								$unitProductionBeansYr5=convertAcresToHectares($result['unitProductionBeansYr5']);
								$unitProductionBeansYr6=convertAcresToHectares($result['unitProductionBeansYr6']);
								
								/* Calculating Gross Margin Per Unit of land (BEANS) based on the following formula:
								(((TP*(VS/QS))-IC)/UP)*Extrapolation Factor	 */

							$st=ExtrapolationFactor(1);
							$query=@Execute($st) or die(http("FtFRepLOne-163"));
							$result=FetchRecords($query);
							$extrapolationFactorYr1=$result['exFactorYr1'];
							$extrapolationFactorYr2=$result['exFactorYr2'];
							$extrapolationFactorYr3=$result['exFactorYr3'];
							$extrapolationFactorYr4=$result['exFactorYr4'];
							$extrapolationFactorYr5=$result['exFactorYr5'];
							$extrapolationFactorYr6=$result['exFactorYr6'];






								$GrossMarginPerUnitOfLandRecomputedBeansYr1=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr1,$VolSalesBeansYr1,$VolSoldBeansYr1,$inputCostBeansYr1,$unitProductionBeansYr1,$extrapolationFactorYr1);
								$GrossMarginPerUnitOfLandRecomputedBeansYr2=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr2,$VolSalesBeansYr2,$VolSoldBeansYr2,$inputCostBeansYr2,$unitProductionBeansYr2,$extrapolationFactorYr2);
								$GrossMarginPerUnitOfLandRecomputedBeansYr3=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr3,$VolSalesBeansYr3,$VolSoldBeansYr3,$inputCostBeansYr3,$unitProductionBeansYr3,$extrapolationFactorYr3);
								$GrossMarginPerUnitOfLandRecomputedBeansYr4=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr4,$VolSalesBeansYr4,$VolSoldBeansYr4,$inputCostBeansYr4,$unitProductionBeansYr4,$extrapolationFactorYr4);
								$GrossMarginPerUnitOfLandRecomputedBeansYr5=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr5,$VolSalesBeansYr5,$VolSoldBeansYr5,$inputCostBeansYr5,$unitProductionBeansYr5,$extrapolationFactorYr5);
								$GrossMarginPerUnitOfLandRecomputedBeansYr6=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr6,$VolSalesBeansYr6,$VolSoldBeansYr6,$inputCostBeansYr6,$unitProductionBeansYr6,$extrapolationFactorYr6);

								$result['actualYr1'] = $GrossMarginPerUnitOfLandRecomputedBeansYr1;
								$result['actualYr2'] = $GrossMarginPerUnitOfLandRecomputedBeansYr2;
								$result['actualYr3'] = $GrossMarginPerUnitOfLandRecomputedBeansYr3;
								$result['actualYr4'] = $GrossMarginPerUnitOfLandRecomputedBeansYr4;
								$result['actualYr5'] = $GrossMarginPerUnitOfLandRecomputedBeansYr5;
								$result['actualYr6'] = $GrossMarginPerUnitOfLandRecomputedBeansYr6;
								return $result[$resultValue];
							}
//End:1 Gross margin per unit of land, kilogram, or animal of[Beans>>Male] ...

//Start:2 Gross margin per unit of land, kilogram, or animal of[Beans>>Female] ...
function grossMarginPerUnitOfLandBeansFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Beans(TP)--------------------------- */
							$x="SELECT 2 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 2=2
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$TotProdBeansYr1=$result['TotProdBeansYr1'];
								$TotProdBeansYr2=$result['TotProdBeansYr2'];
								$TotProdBeansYr3=$result['TotProdBeansYr3'];
								$TotProdBeansYr4=$result['TotProdBeansYr4'];
								$TotProdBeansYr5=$result['TotProdBeansYr5'];
								$TotProdBeansYr6=$result['TotProdBeansYr6'];
								
							/* --------Form 6 Value of sales(VS)--------------------------- */
							$x="SELECT 2 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 2=2
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSalesBeansYr1=convertShillingsToDollars($result['VolSalesBeansYr1']);
								$VolSalesBeansYr2=convertShillingsToDollars($result['VolSalesBeansYr2']);
								$VolSalesBeansYr3=convertShillingsToDollars($result['VolSalesBeansYr3']);
								$VolSalesBeansYr4=convertShillingsToDollars($result['VolSalesBeansYr4']);
								$VolSalesBeansYr5=convertShillingsToDollars($result['VolSalesBeansYr5']);
								$VolSalesBeansYr6=convertShillingsToDollars($result['VolSalesBeansYr6']);
								
							/* --------Form 6 Volume sold(QS)--------------------------- */
							$x="SELECT 2 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 2=2
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSoldBeansYr1=$result['VolSoldBeansYr1'];
								$VolSoldBeansYr2=$result['VolSoldBeansYr2'];
								$VolSoldBeansYr3=$result['VolSoldBeansYr3'];
								$VolSoldBeansYr4=$result['VolSoldBeansYr4'];
								$VolSoldBeansYr5=$result['VolSoldBeansYr5'];
								$VolSoldBeansYr6=$result['VolSoldBeansYr6'];
								
							/* --------Form 6 Input Cost(IC)--------------------------- */
							$x="SELECT 2 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 2=2
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$inputCostBeansYr1=convertShillingsToDollars($result['inputCostBeansYr1']);
								$inputCostBeansYr2=convertShillingsToDollars($result['inputCostBeansYr2']);
								$inputCostBeansYr3=convertShillingsToDollars($result['inputCostBeansYr3']);
								$inputCostBeansYr4=convertShillingsToDollars($result['inputCostBeansYr4']);
								$inputCostBeansYr5=convertShillingsToDollars($result['inputCostBeansYr5']);
								$inputCostBeansYr6=convertShillingsToDollars($result['inputCostBeansYr6']);
								
							/* --------Form 6 Unit of Production/Area(UP)--------------------------- */
							$x="SELECT 2 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 2=2
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$unitProductionBeansYr1=convertAcresToHectares($result['unitProductionBeansYr1']);
								$unitProductionBeansYr2=convertAcresToHectares($result['unitProductionBeansYr2']);
								$unitProductionBeansYr3=convertAcresToHectares($result['unitProductionBeansYr3']);
								$unitProductionBeansYr4=convertAcresToHectares($result['unitProductionBeansYr4']);
								$unitProductionBeansYr5=convertAcresToHectares($result['unitProductionBeansYr5']);
								$unitProductionBeansYr6=convertAcresToHectares($result['unitProductionBeansYr6']);
								
								/* Calculating Gross Margin Per Unit of land (BEANS) based on the following formula:
								(((TP*(VS/QS))-IC)/UP)*Extrapolation Factor	 */

							$st=ExtrapolationFactor(1);
							$query=@Execute($st) or die(http("FtFRepLOne-163"));
							$result=FetchRecords($query);
							$extrapolationFactorYr1=$result['exFactorYr1'];
							$extrapolationFactorYr2=$result['exFactorYr2'];
							$extrapolationFactorYr3=$result['exFactorYr3'];
							$extrapolationFactorYr4=$result['exFactorYr4'];
							$extrapolationFactorYr5=$result['exFactorYr5'];
							$extrapolationFactorYr6=$result['exFactorYr6'];






								$GrossMarginPerUnitOfLandRecomputedBeansYr1=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr1,$VolSalesBeansYr1,$VolSoldBeansYr1,$inputCostBeansYr1,$unitProductionBeansYr1,$extrapolationFactorYr1);
								$GrossMarginPerUnitOfLandRecomputedBeansYr2=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr2,$VolSalesBeansYr2,$VolSoldBeansYr2,$inputCostBeansYr2,$unitProductionBeansYr2,$extrapolationFactorYr2);
								$GrossMarginPerUnitOfLandRecomputedBeansYr3=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr3,$VolSalesBeansYr3,$VolSoldBeansYr3,$inputCostBeansYr3,$unitProductionBeansYr3,$extrapolationFactorYr3);
								$GrossMarginPerUnitOfLandRecomputedBeansYr4=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr4,$VolSalesBeansYr4,$VolSoldBeansYr4,$inputCostBeansYr4,$unitProductionBeansYr4,$extrapolationFactorYr4);
								$GrossMarginPerUnitOfLandRecomputedBeansYr5=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr5,$VolSalesBeansYr5,$VolSoldBeansYr5,$inputCostBeansYr5,$unitProductionBeansYr5,$extrapolationFactorYr5);
								$GrossMarginPerUnitOfLandRecomputedBeansYr6=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr6,$VolSalesBeansYr6,$VolSoldBeansYr6,$inputCostBeansYr6,$unitProductionBeansYr6,$extrapolationFactorYr6);

								$result['actualYr1'] = $GrossMarginPerUnitOfLandRecomputedBeansYr1;
								$result['actualYr2'] = $GrossMarginPerUnitOfLandRecomputedBeansYr2;
								$result['actualYr3'] = $GrossMarginPerUnitOfLandRecomputedBeansYr3;
								$result['actualYr4'] = $GrossMarginPerUnitOfLandRecomputedBeansYr4;
								$result['actualYr5'] = $GrossMarginPerUnitOfLandRecomputedBeansYr5;
								$result['actualYr6'] = $GrossMarginPerUnitOfLandRecomputedBeansYr6;
								return $result[$resultValue];
							}
//End:2 Gross margin per unit of land, kilogram, or animal of[Beans>>Female] ...

//Start:3 Gross margin per unit of land, kilogram, or animal of[Beans>>Joint] ...
function grossMarginPerUnitOfLandBeansJoint($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Beans(TP)--------------------------- */
							$x="SELECT 3 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 3=3
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$TotProdBeansYr1=$result['TotProdBeansYr1'];
								$TotProdBeansYr2=$result['TotProdBeansYr2'];
								$TotProdBeansYr3=$result['TotProdBeansYr3'];
								$TotProdBeansYr4=$result['TotProdBeansYr4'];
								$TotProdBeansYr5=$result['TotProdBeansYr5'];
								$TotProdBeansYr6=$result['TotProdBeansYr6'];
								
							/* --------Form 6 Value of sales(VS)--------------------------- */
							$x="SELECT 3 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 3=3
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSalesBeansYr1=convertShillingsToDollars($result['VolSalesBeansYr1']);
								$VolSalesBeansYr2=convertShillingsToDollars($result['VolSalesBeansYr2']);
								$VolSalesBeansYr3=convertShillingsToDollars($result['VolSalesBeansYr3']);
								$VolSalesBeansYr4=convertShillingsToDollars($result['VolSalesBeansYr4']);
								$VolSalesBeansYr5=convertShillingsToDollars($result['VolSalesBeansYr5']);
								$VolSalesBeansYr6=convertShillingsToDollars($result['VolSalesBeansYr6']);
								
							/* --------Form 6 Volume sold(QS)--------------------------- */
							$x="SELECT 3 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 3=3
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSoldBeansYr1=$result['VolSoldBeansYr1'];
								$VolSoldBeansYr2=$result['VolSoldBeansYr2'];
								$VolSoldBeansYr3=$result['VolSoldBeansYr3'];
								$VolSoldBeansYr4=$result['VolSoldBeansYr4'];
								$VolSoldBeansYr5=$result['VolSoldBeansYr5'];
								$VolSoldBeansYr6=$result['VolSoldBeansYr6'];
								
							/* --------Form 6 Input Cost(IC)--------------------------- */
							$x="SELECT 3 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 3=3
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$inputCostBeansYr1=convertShillingsToDollars($result['inputCostBeansYr1']);
								$inputCostBeansYr2=convertShillingsToDollars($result['inputCostBeansYr2']);
								$inputCostBeansYr3=convertShillingsToDollars($result['inputCostBeansYr3']);
								$inputCostBeansYr4=convertShillingsToDollars($result['inputCostBeansYr4']);
								$inputCostBeansYr5=convertShillingsToDollars($result['inputCostBeansYr5']);
								$inputCostBeansYr6=convertShillingsToDollars($result['inputCostBeansYr6']);
								
							/* --------Form 6 Unit of Production/Area(UP)--------------------------- */
							$x="SELECT 3 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 3=3
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$unitProductionBeansYr1=convertAcresToHectares($result['unitProductionBeansYr1']);
								$unitProductionBeansYr2=convertAcresToHectares($result['unitProductionBeansYr2']);
								$unitProductionBeansYr3=convertAcresToHectares($result['unitProductionBeansYr3']);
								$unitProductionBeansYr4=convertAcresToHectares($result['unitProductionBeansYr4']);
								$unitProductionBeansYr5=convertAcresToHectares($result['unitProductionBeansYr5']);
								$unitProductionBeansYr6=convertAcresToHectares($result['unitProductionBeansYr6']);
								
								/* Calculating Gross Margin Per Unit of land (BEANS) based on the following formula:
								(((TP*(VS/QS))-IC)/UP)*Extrapolation Factor	 */

							$st=ExtrapolationFactor(1);
							$query=@Execute($st) or die(http("FtFRepLOne-163"));
							$result=FetchRecords($query);
							$extrapolationFactorYr1=$result['exFactorYr1'];
							$extrapolationFactorYr2=$result['exFactorYr2'];
							$extrapolationFactorYr3=$result['exFactorYr3'];
							$extrapolationFactorYr4=$result['exFactorYr4'];
							$extrapolationFactorYr5=$result['exFactorYr5'];
							$extrapolationFactorYr6=$result['exFactorYr6'];






								$GrossMarginPerUnitOfLandRecomputedBeansYr1=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr1,$VolSalesBeansYr1,$VolSoldBeansYr1,$inputCostBeansYr1,$unitProductionBeansYr1,$extrapolationFactorYr1);
								$GrossMarginPerUnitOfLandRecomputedBeansYr2=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr2,$VolSalesBeansYr2,$VolSoldBeansYr2,$inputCostBeansYr2,$unitProductionBeansYr2,$extrapolationFactorYr2);
								$GrossMarginPerUnitOfLandRecomputedBeansYr3=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr3,$VolSalesBeansYr3,$VolSoldBeansYr3,$inputCostBeansYr3,$unitProductionBeansYr3,$extrapolationFactorYr3);
								$GrossMarginPerUnitOfLandRecomputedBeansYr4=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr4,$VolSalesBeansYr4,$VolSoldBeansYr4,$inputCostBeansYr4,$unitProductionBeansYr4,$extrapolationFactorYr4);
								$GrossMarginPerUnitOfLandRecomputedBeansYr5=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr5,$VolSalesBeansYr5,$VolSoldBeansYr5,$inputCostBeansYr5,$unitProductionBeansYr5,$extrapolationFactorYr5);
								$GrossMarginPerUnitOfLandRecomputedBeansYr6=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr6,$VolSalesBeansYr6,$VolSoldBeansYr6,$inputCostBeansYr6,$unitProductionBeansYr6,$extrapolationFactorYr6);

								$result['actualYr1'] = $GrossMarginPerUnitOfLandRecomputedBeansYr1;
								$result['actualYr2'] = $GrossMarginPerUnitOfLandRecomputedBeansYr2;
								$result['actualYr3'] = $GrossMarginPerUnitOfLandRecomputedBeansYr3;
								$result['actualYr4'] = $GrossMarginPerUnitOfLandRecomputedBeansYr4;
								$result['actualYr5'] = $GrossMarginPerUnitOfLandRecomputedBeansYr5;
								$result['actualYr6'] = $GrossMarginPerUnitOfLandRecomputedBeansYr6;
								return $result[$resultValue];
							}
//End:3 Gross margin per unit of land, kilogram, or animal of[Beans>>Joint] ...

//Start:4 Gross margin per unit of land, kilogram, or animal of[Beans>>Association-applied] ...
function grossMarginPerUnitOfLandBeansAssoc($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:4 Gross margin per unit of land, kilogram, or animal of[Beans>>Association-applied] ...

//Start:5 Gross margin per unit of land, kilogram, or animal of[Beans>>Hectares planted...] ...
function grossMarginPerUnitOfLandBeansHa($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:5 Gross margin per unit of land, kilogram, or animal of[Beans>>Hectares planted...] ...

//Start:6 Gross margin per unit of land, kilogram, or animal of[Beans>>Total Production ] ...
function grossMarginPerUnitOfLandBeansTP($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Beans(TP)--------------------------- */
	$x="SELECT 6 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr6
		from `tbl_frm6particulars` as `p` 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 6=6
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdBeansYr1=$result['TotProdBeansYr1'];
		$TotProdBeansYr2=$result['TotProdBeansYr2'];
		$TotProdBeansYr3=$result['TotProdBeansYr3'];
		$TotProdBeansYr4=$result['TotProdBeansYr4'];
		$TotProdBeansYr5=$result['TotProdBeansYr5'];
		$TotProdBeansYr6=$result['TotProdBeansYr6'];



	$st=ExtrapolationFactor(6);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:6 Gross margin per unit of land, kilogram, or animal of[Beans>>Total Production ] ...

//Start:9 Gross margin per unit of land, kilogram, or animal of[Beans>>Value of Sales] ...
function grossMarginPerUnitOfLandBeansVS($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) BEANS--------------------------- */
	$x="SELECT 9 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr6
		from  `tbl_frm6particulars` as `p` 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 9=9
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesBeansYr1=convertShillingsToDollars($result['VolSalesBeansYr1']);
		$VolSalesBeansYr2=convertShillingsToDollars($result['VolSalesBeansYr2']);
		$VolSalesBeansYr3=convertShillingsToDollars($result['VolSalesBeansYr3']);
		$VolSalesBeansYr4=convertShillingsToDollars($result['VolSalesBeansYr4']);
		$VolSalesBeansYr5=convertShillingsToDollars($result['VolSalesBeansYr5']);
		$VolSalesBeansYr6=convertShillingsToDollars($result['VolSalesBeansYr6']);



	$st=ExtrapolationFactor(9);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:9 Gross margin per unit of land, kilogram, or animal of[Beans>>Value of Sales] ...

//Start:10 Gross margin per unit of land, kilogram, or animal of[Beans>>Quantity of Sales] ...
function grossMarginPerUnitOfLandBeansQTY($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 10 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr6
		from  `tbl_frm6particulars` as `p` 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 10=10
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldBeansYr1=$result['VolSoldBeansYr1'];
		$VolSoldBeansYr2=$result['VolSoldBeansYr2'];
		$VolSoldBeansYr3=$result['VolSoldBeansYr3'];
		$VolSoldBeansYr4=$result['VolSoldBeansYr4'];
		$VolSoldBeansYr5=$result['VolSoldBeansYr5'];
		$VolSoldBeansYr6=$result['VolSoldBeansYr6'];



	$st=ExtrapolationFactor(10);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:10 Gross margin per unit of land, kilogram, or animal of[Beans>>Quantity of Sales] ...

//Start:11 Gross margin per unit of land, kilogram, or animal of[Beans>>Purchased input costs] ...
function grossMarginPerUnitOfLandBeansCOST($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 11 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr6
		from  `tbl_frm6particulars` as `p` 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 11=11
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostBeansYr1=convertShillingsToDollars($result['inputCostBeansYr1']);
		$inputCostBeansYr2=convertShillingsToDollars($result['inputCostBeansYr2']);
		$inputCostBeansYr3=convertShillingsToDollars($result['inputCostBeansYr3']);
		$inputCostBeansYr4=convertShillingsToDollars($result['inputCostBeansYr4']);
		$inputCostBeansYr5=convertShillingsToDollars($result['inputCostBeansYr5']);
		$inputCostBeansYr6=convertShillingsToDollars($result['inputCostBeansYr6']);
	
	$st=ExtrapolationFactor(11);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:11 Gross margin per unit of land, kilogram, or animal of[Beans>>Purchased input costs] ...

//--coffee--
//Start:12 Gross margin per unit of land, kilogram, or animal of[Coffee>>Male] ...
function grossMarginPerUnitOfLandCoffeeMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Coffee(TP)--------------------------- */
							$x="SELECT 12 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 12=12
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$TotProdCoffeeYr1=$result['TotProdCoffeeYr1'];
								$TotProdCoffeeYr2=$result['TotProdCoffeeYr2'];
								$TotProdCoffeeYr3=$result['TotProdCoffeeYr3'];
								$TotProdCoffeeYr4=$result['TotProdCoffeeYr4'];
								$TotProdCoffeeYr5=$result['TotProdCoffeeYr5'];
								$TotProdCoffeeYr6=$result['TotProdCoffeeYr6'];
								
							/* --------Form 6 Value of sales(VS)--------------------------- */
							$x="SELECT 12 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 12=12
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSalesCoffeeYr1=convertShillingsToDollars($result['VolSalesCoffeeYr1']);
								$VolSalesCoffeeYr2=convertShillingsToDollars($result['VolSalesCoffeeYr2']);
								$VolSalesCoffeeYr3=convertShillingsToDollars($result['VolSalesCoffeeYr3']);
								$VolSalesCoffeeYr4=convertShillingsToDollars($result['VolSalesCoffeeYr4']);
								$VolSalesCoffeeYr5=convertShillingsToDollars($result['VolSalesCoffeeYr5']);
								$VolSalesCoffeeYr6=convertShillingsToDollars($result['VolSalesCoffeeYr6']);
								
							/* --------Form 6 Volume sold(QS)--------------------------- */
							$x="SELECT 12 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 12=12
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSoldCoffeeYr1=$result['VolSoldCoffeeYr1'];
								$VolSoldCoffeeYr2=$result['VolSoldCoffeeYr2'];
								$VolSoldCoffeeYr3=$result['VolSoldCoffeeYr3'];
								$VolSoldCoffeeYr4=$result['VolSoldCoffeeYr4'];
								$VolSoldCoffeeYr5=$result['VolSoldCoffeeYr5'];
								$VolSoldCoffeeYr6=$result['VolSoldCoffeeYr6'];
								
							/* --------Form 6 Input Cost(IC)--------------------------- */
							$x="SELECT 12 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 12=12
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$inputCostCoffeeYr1=convertShillingsToDollars($result['inputCostCoffeeYr1']);
								$inputCostCoffeeYr2=convertShillingsToDollars($result['inputCostCoffeeYr2']);
								$inputCostCoffeeYr3=convertShillingsToDollars($result['inputCostCoffeeYr3']);
								$inputCostCoffeeYr4=convertShillingsToDollars($result['inputCostCoffeeYr4']);
								$inputCostCoffeeYr5=convertShillingsToDollars($result['inputCostCoffeeYr5']);
								$inputCostCoffeeYr6=convertShillingsToDollars($result['inputCostCoffeeYr6']);
								
							/* --------Form 6 Unit of Production/Area(UP)--------------------------- */
							$x="SELECT 12 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 12=12
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$unitProductionCoffeeYr1=convertAcresToHectares($result['unitProductionCoffeeYr1']);
								$unitProductionCoffeeYr2=convertAcresToHectares($result['unitProductionCoffeeYr2']);
								$unitProductionCoffeeYr3=convertAcresToHectares($result['unitProductionCoffeeYr3']);
								$unitProductionCoffeeYr4=convertAcresToHectares($result['unitProductionCoffeeYr4']);
								$unitProductionCoffeeYr5=convertAcresToHectares($result['unitProductionCoffeeYr5']);
								$unitProductionCoffeeYr6=convertAcresToHectares($result['unitProductionCoffeeYr6']);
								
								/* Calculating Gross Margin Per Unit of land (BEANS) based on the following formula:
								(((TP*(VS/QS))-IC)/UP)*Extrapolation Factor	 */

							$st=ExtrapolationFactor(12);
							$query=@Execute($st) or die(http("FtFRepLOne-163"));
							$result=FetchRecords($query);
							$extrapolationFactorYr1=$result['exFactorYr1'];
							$extrapolationFactorYr2=$result['exFactorYr2'];
							$extrapolationFactorYr3=$result['exFactorYr3'];
							$extrapolationFactorYr4=$result['exFactorYr4'];
							$extrapolationFactorYr5=$result['exFactorYr5'];
							$extrapolationFactorYr6=$result['exFactorYr6'];






								$GrossMarginPerUnitOfLandRecomputedCoffeeYr1=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr1,$VolSalesCoffeeYr1,$VolSoldCoffeeYr1,$inputCostCoffeeYr1,$unitProductionCoffeeYr1,$extrapolationFactorYr1);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr2=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr2,$VolSalesCoffeeYr2,$VolSoldCoffeeYr2,$inputCostCoffeeYr2,$unitProductionCoffeeYr2,$extrapolationFactorYr2);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr3=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr3,$VolSalesCoffeeYr3,$VolSoldCoffeeYr3,$inputCostCoffeeYr3,$unitProductionCoffeeYr3,$extrapolationFactorYr3);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr4=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr4,$VolSalesCoffeeYr4,$VolSoldCoffeeYr4,$inputCostCoffeeYr4,$unitProductionCoffeeYr4,$extrapolationFactorYr4);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr5=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr5,$VolSalesCoffeeYr5,$VolSoldCoffeeYr5,$inputCostCoffeeYr5,$unitProductionCoffeeYr5,$extrapolationFactorYr5);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr6=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr6,$VolSalesCoffeeYr6,$VolSoldCoffeeYr6,$inputCostCoffeeYr6,$unitProductionCoffeeYr6,$extrapolationFactorYr6);

								$result['actualYr1'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr1;
								$result['actualYr2'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr2;
								$result['actualYr3'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr3;
								$result['actualYr4'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr4;
								$result['actualYr5'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr5;
								$result['actualYr6'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr6;
								return $result[$resultValue];
							}
//End:12 Gross margin per unit of land, kilogram, or animal of[Coffee>>Male] ...

//Start:13 Gross margin per unit of land, kilogram, or animal of[Coffee>>Female] ...
function grossMarginPerUnitOfLandCoffeeFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Coffee(TP)--------------------------- */
							$x="SELECT 114 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 13=13
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$TotProdCoffeeYr1=$result['TotProdCoffeeYr1'];
								$TotProdCoffeeYr2=$result['TotProdCoffeeYr2'];
								$TotProdCoffeeYr3=$result['TotProdCoffeeYr3'];
								$TotProdCoffeeYr4=$result['TotProdCoffeeYr4'];
								$TotProdCoffeeYr5=$result['TotProdCoffeeYr5'];
								$TotProdCoffeeYr6=$result['TotProdCoffeeYr6'];
								
							/* --------Form 6 Value of sales(VS)--------------------------- */
							$x="SELECT 114 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 13=13
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSalesCoffeeYr1=convertShillingsToDollars($result['VolSalesCoffeeYr1']);
								$VolSalesCoffeeYr2=convertShillingsToDollars($result['VolSalesCoffeeYr2']);
								$VolSalesCoffeeYr3=convertShillingsToDollars($result['VolSalesCoffeeYr3']);
								$VolSalesCoffeeYr4=convertShillingsToDollars($result['VolSalesCoffeeYr4']);
								$VolSalesCoffeeYr5=convertShillingsToDollars($result['VolSalesCoffeeYr5']);
								$VolSalesCoffeeYr6=convertShillingsToDollars($result['VolSalesCoffeeYr6']);
								
							/* --------Form 6 Volume sold(QS)--------------------------- */
							$x="SELECT 114 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 13=13
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSoldCoffeeYr1=$result['VolSoldCoffeeYr1'];
								$VolSoldCoffeeYr2=$result['VolSoldCoffeeYr2'];
								$VolSoldCoffeeYr3=$result['VolSoldCoffeeYr3'];
								$VolSoldCoffeeYr4=$result['VolSoldCoffeeYr4'];
								$VolSoldCoffeeYr5=$result['VolSoldCoffeeYr5'];
								$VolSoldCoffeeYr6=$result['VolSoldCoffeeYr6'];
								
							/* --------Form 6 Input Cost(IC)--------------------------- */
							$x="SELECT 114 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 13=13
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$inputCostCoffeeYr1=convertShillingsToDollars($result['inputCostCoffeeYr1']);
								$inputCostCoffeeYr2=convertShillingsToDollars($result['inputCostCoffeeYr2']);
								$inputCostCoffeeYr3=convertShillingsToDollars($result['inputCostCoffeeYr3']);
								$inputCostCoffeeYr4=convertShillingsToDollars($result['inputCostCoffeeYr4']);
								$inputCostCoffeeYr5=convertShillingsToDollars($result['inputCostCoffeeYr5']);
								$inputCostCoffeeYr6=convertShillingsToDollars($result['inputCostCoffeeYr6']);
								
							/* --------Form 6 Unit of Production/Area(UP)--------------------------- */
							$x="SELECT 114 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 13=13
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$unitProductionCoffeeYr1=convertAcresToHectares($result['unitProductionCoffeeYr1']);
								$unitProductionCoffeeYr2=convertAcresToHectares($result['unitProductionCoffeeYr2']);
								$unitProductionCoffeeYr3=convertAcresToHectares($result['unitProductionCoffeeYr3']);
								$unitProductionCoffeeYr4=convertAcresToHectares($result['unitProductionCoffeeYr4']);
								$unitProductionCoffeeYr5=convertAcresToHectares($result['unitProductionCoffeeYr5']);
								$unitProductionCoffeeYr6=convertAcresToHectares($result['unitProductionCoffeeYr6']);
								
								/* Calculating Gross Margin Per Unit of land (BEANS) based on the following formula:
								(((TP*(VS/QS))-IC)/UP)*Extrapolation Factor	 */

							$st=ExtrapolationFactor(13);
							$query=@Execute($st) or die(http("FtFRepLOne-163"));
							$result=FetchRecords($query);
							$extrapolationFactorYr1=$result['exFactorYr1'];
							$extrapolationFactorYr2=$result['exFactorYr2'];
							$extrapolationFactorYr3=$result['exFactorYr3'];
							$extrapolationFactorYr4=$result['exFactorYr4'];
							$extrapolationFactorYr5=$result['exFactorYr5'];
							$extrapolationFactorYr6=$result['exFactorYr6'];






								$GrossMarginPerUnitOfLandRecomputedCoffeeYr1=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr1,$VolSalesCoffeeYr1,$VolSoldCoffeeYr1,$inputCostCoffeeYr1,$unitProductionCoffeeYr1,$extrapolationFactorYr1);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr2=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr2,$VolSalesCoffeeYr2,$VolSoldCoffeeYr2,$inputCostCoffeeYr2,$unitProductionCoffeeYr2,$extrapolationFactorYr2);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr3=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr3,$VolSalesCoffeeYr3,$VolSoldCoffeeYr3,$inputCostCoffeeYr3,$unitProductionCoffeeYr3,$extrapolationFactorYr3);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr4=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr4,$VolSalesCoffeeYr4,$VolSoldCoffeeYr4,$inputCostCoffeeYr4,$unitProductionCoffeeYr4,$extrapolationFactorYr4);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr5=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr5,$VolSalesCoffeeYr5,$VolSoldCoffeeYr5,$inputCostCoffeeYr5,$unitProductionCoffeeYr5,$extrapolationFactorYr5);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr6=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr6,$VolSalesCoffeeYr6,$VolSoldCoffeeYr6,$inputCostCoffeeYr6,$unitProductionCoffeeYr6,$extrapolationFactorYr6);

								$result['actualYr1'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr1;
								$result['actualYr2'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr2;
								$result['actualYr3'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr3;
								$result['actualYr4'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr4;
								$result['actualYr5'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr5;
								$result['actualYr6'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr6;
								return $result[$resultValue];
							}
//End:13 Gross margin per unit of land, kilogram, or animal of[Coffee>>Female] ...

//Start:14 Gross margin per unit of land, kilogram, or animal of[Coffee>>Joint] ...
function grossMarginPerUnitOfLandCoffeeJoint($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Coffee(TP)--------------------------- */
							$x="SELECT 14 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 14=14
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$TotProdCoffeeYr1=$result['TotProdCoffeeYr1'];
								$TotProdCoffeeYr2=$result['TotProdCoffeeYr2'];
								$TotProdCoffeeYr3=$result['TotProdCoffeeYr3'];
								$TotProdCoffeeYr4=$result['TotProdCoffeeYr4'];
								$TotProdCoffeeYr5=$result['TotProdCoffeeYr5'];
								$TotProdCoffeeYr6=$result['TotProdCoffeeYr6'];
								
							/* --------Form 6 Value of sales(VS)--------------------------- */
							$x="SELECT 14 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 14=14
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSalesCoffeeYr1=convertShillingsToDollars($result['VolSalesCoffeeYr1']);
								$VolSalesCoffeeYr2=convertShillingsToDollars($result['VolSalesCoffeeYr2']);
								$VolSalesCoffeeYr3=convertShillingsToDollars($result['VolSalesCoffeeYr3']);
								$VolSalesCoffeeYr4=convertShillingsToDollars($result['VolSalesCoffeeYr4']);
								$VolSalesCoffeeYr5=convertShillingsToDollars($result['VolSalesCoffeeYr5']);
								$VolSalesCoffeeYr6=convertShillingsToDollars($result['VolSalesCoffeeYr6']);
								
							/* --------Form 6 Volume sold(QS)--------------------------- */
							$x="SELECT 14 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 14=14
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSoldCoffeeYr1=$result['VolSoldCoffeeYr1'];
								$VolSoldCoffeeYr2=$result['VolSoldCoffeeYr2'];
								$VolSoldCoffeeYr3=$result['VolSoldCoffeeYr3'];
								$VolSoldCoffeeYr4=$result['VolSoldCoffeeYr4'];
								$VolSoldCoffeeYr5=$result['VolSoldCoffeeYr5'];
								$VolSoldCoffeeYr6=$result['VolSoldCoffeeYr6'];
								
							/* --------Form 6 Input Cost(IC)--------------------------- */
							$x="SELECT 14 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 14=14
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$inputCostCoffeeYr1=convertShillingsToDollars($result['inputCostCoffeeYr1']);
								$inputCostCoffeeYr2=convertShillingsToDollars($result['inputCostCoffeeYr2']);
								$inputCostCoffeeYr3=convertShillingsToDollars($result['inputCostCoffeeYr3']);
								$inputCostCoffeeYr4=convertShillingsToDollars($result['inputCostCoffeeYr4']);
								$inputCostCoffeeYr5=convertShillingsToDollars($result['inputCostCoffeeYr5']);
								$inputCostCoffeeYr6=convertShillingsToDollars($result['inputCostCoffeeYr6']);
								
							/* --------Form 6 Unit of Production/Area(UP)--------------------------- */
							$x="SELECT 14 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 14=14
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$unitProductionCoffeeYr1=convertAcresToHectares($result['unitProductionCoffeeYr1']);
								$unitProductionCoffeeYr2=convertAcresToHectares($result['unitProductionCoffeeYr2']);
								$unitProductionCoffeeYr3=convertAcresToHectares($result['unitProductionCoffeeYr3']);
								$unitProductionCoffeeYr4=convertAcresToHectares($result['unitProductionCoffeeYr4']);
								$unitProductionCoffeeYr5=convertAcresToHectares($result['unitProductionCoffeeYr5']);
								$unitProductionCoffeeYr6=convertAcresToHectares($result['unitProductionCoffeeYr6']);
								
								/* Calculating Gross Margin Per Unit of land (BEANS) based on the following formula:
								(((TP*(VS/QS))-IC)/UP)*Extrapolation Factor	 */

							$st=ExtrapolationFactor(1);
							$query=@Execute($st) or die(http("FtFRepLOne-163"));
							$result=FetchRecords($query);
							$extrapolationFactorYr1=$result['exFactorYr1'];
							$extrapolationFactorYr2=$result['exFactorYr2'];
							$extrapolationFactorYr3=$result['exFactorYr3'];
							$extrapolationFactorYr4=$result['exFactorYr4'];
							$extrapolationFactorYr5=$result['exFactorYr5'];
							$extrapolationFactorYr6=$result['exFactorYr6'];






								$GrossMarginPerUnitOfLandRecomputedCoffeeYr1=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr1,$VolSalesCoffeeYr1,$VolSoldCoffeeYr1,$inputCostCoffeeYr1,$unitProductionCoffeeYr1,$extrapolationFactorYr1);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr2=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr2,$VolSalesCoffeeYr2,$VolSoldCoffeeYr2,$inputCostCoffeeYr2,$unitProductionCoffeeYr2,$extrapolationFactorYr2);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr3=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr3,$VolSalesCoffeeYr3,$VolSoldCoffeeYr3,$inputCostCoffeeYr3,$unitProductionCoffeeYr3,$extrapolationFactorYr3);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr4=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr4,$VolSalesCoffeeYr4,$VolSoldCoffeeYr4,$inputCostCoffeeYr4,$unitProductionCoffeeYr4,$extrapolationFactorYr4);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr5=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr5,$VolSalesCoffeeYr5,$VolSoldCoffeeYr5,$inputCostCoffeeYr5,$unitProductionCoffeeYr5,$extrapolationFactorYr5);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr6=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr6,$VolSalesCoffeeYr6,$VolSoldCoffeeYr6,$inputCostCoffeeYr6,$unitProductionCoffeeYr6,$extrapolationFactorYr6);

								$result['actualYr1'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr1;
								$result['actualYr2'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr2;
								$result['actualYr3'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr3;
								$result['actualYr4'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr4;
								$result['actualYr5'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr5;
								$result['actualYr6'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr6;
								return $result[$resultValue];
							}
//End:14 Gross margin per unit of land, kilogram, or animal of[Coffee>>Joint] ...

//Start:15 Gross margin per unit of land, kilogram, or animal of[Coffee>>Association-applied] ...
function grossMarginPerUnitOfLandCoffeeAssoc($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:15 Gross margin per unit of land, kilogram, or animal of[Coffee>>Association-applied] ...

//Start:16 Gross margin per unit of land, kilogram, or animal of[Coffee>>Hectares planted...] ...
function grossMarginPerUnitOfLandCoffeeHa($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:16 Gross margin per unit of land, kilogram, or animal of[Coffee>>Hectares planted...] ...

//Start:17 Gross margin per unit of land, kilogram, or animal of[Coffee>>Total Production ] ...
function grossMarginPerUnitOfLandCoffeeTP($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Coffee(TP)--------------------------- */
	$x="SELECT 17 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr6
		from `tbl_frm6particulars` as `p` 
		join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 17=17
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdCoffeeYr1=$result['TotProdCoffeeYr1'];
		$TotProdCoffeeYr2=$result['TotProdCoffeeYr2'];
		$TotProdCoffeeYr3=$result['TotProdCoffeeYr3'];
		$TotProdCoffeeYr4=$result['TotProdCoffeeYr4'];
		$TotProdCoffeeYr5=$result['TotProdCoffeeYr5'];
		$TotProdCoffeeYr6=$result['TotProdCoffeeYr6'];



	$st=ExtrapolationFactor(6);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:17 Gross margin per unit of land, kilogram, or animal of[Coffee>>Total Production ] ...

//Start:18 Gross margin per unit of land, kilogram, or animal of[Coffee>>Value of Sales] ...
function grossMarginPerUnitOfLandCoffeeVS($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) BEANS--------------------------- */
	$x="SELECT 18 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_sold`)*(`b`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr6
		from  `tbl_frm6particulars` as `p` 
		join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 18=18
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesCoffeeYr1=convertShillingsToDollars($result['VolSalesCoffeeYr1']);
		$VolSalesCoffeeYr2=convertShillingsToDollars($result['VolSalesCoffeeYr2']);
		$VolSalesCoffeeYr3=convertShillingsToDollars($result['VolSalesCoffeeYr3']);
		$VolSalesCoffeeYr4=convertShillingsToDollars($result['VolSalesCoffeeYr4']);
		$VolSalesCoffeeYr5=convertShillingsToDollars($result['VolSalesCoffeeYr5']);
		$VolSalesCoffeeYr6=convertShillingsToDollars($result['VolSalesCoffeeYr6']);



	$st=ExtrapolationFactor(9);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:18 Gross margin per unit of land, kilogram, or animal of[Coffee>>Value of Sales] ...

//Start:19 Gross margin per unit of land, kilogram, or animal of[Coffee>>Quantity of Sales] ...
function grossMarginPerUnitOfLandCoffeeQTY($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 19 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr6
		from  `tbl_frm6particulars` as `p` 
		join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 19=19
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldCoffeeYr1=$result['VolSoldCoffeeYr1'];
		$VolSoldCoffeeYr2=$result['VolSoldCoffeeYr2'];
		$VolSoldCoffeeYr3=$result['VolSoldCoffeeYr3'];
		$VolSoldCoffeeYr4=$result['VolSoldCoffeeYr4'];
		$VolSoldCoffeeYr5=$result['VolSoldCoffeeYr5'];
		$VolSoldCoffeeYr6=$result['VolSoldCoffeeYr6'];



	$st=ExtrapolationFactor(10);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:19 Gross margin per unit of land, kilogram, or animal of[Coffee>>Quantity of Sales] ...

//Start:20 Gross margin per unit of land, kilogram, or animal of[Coffee>>Purchased input costs] ...
function grossMarginPerUnitOfLandCoffeeCOST($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 20 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`coffee_improved_cost`) + (`b`.`coffee_fertilizer_cost`) + (`b`.`coffee_chemical_cost`) + (`b`.`coffee_cost_ict`) + (`b`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr6
		from  `tbl_frm6particulars` as `p` 
		join `tbl_frm6production_coffee` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 20=20
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostCoffeeYr1=convertShillingsToDollars($result['inputCostCoffeeYr1']);
		$inputCostCoffeeYr2=convertShillingsToDollars($result['inputCostCoffeeYr2']);
		$inputCostCoffeeYr3=convertShillingsToDollars($result['inputCostCoffeeYr3']);
		$inputCostCoffeeYr4=convertShillingsToDollars($result['inputCostCoffeeYr4']);
		$inputCostCoffeeYr5=convertShillingsToDollars($result['inputCostCoffeeYr5']);
		$inputCostCoffeeYr6=convertShillingsToDollars($result['inputCostCoffeeYr6']);
	
	$st=ExtrapolationFactor(11);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:20 Gross margin per unit of land, kilogram, or animal of[Coffee>>Purchased input costs] ...

//--end coffee--

//--Maize--
//Start:21 Gross margin per unit of land, kilogram, or animal of[Maize>>Male] ...
function grossMarginPerUnitOfLandMaizeMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Maize(TP)--------------------------- */
							$x="SELECT 21 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 21=21
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$TotProdMaizeYr1=$result['TotProdMaizeYr1'];
								$TotProdMaizeYr2=$result['TotProdMaizeYr2'];
								$TotProdMaizeYr3=$result['TotProdMaizeYr3'];
								$TotProdMaizeYr4=$result['TotProdMaizeYr4'];
								$TotProdMaizeYr5=$result['TotProdMaizeYr5'];
								$TotProdMaizeYr6=$result['TotProdMaizeYr6'];
								
							/* --------Form 6 Value of sales(VS)--------------------------- */
							$x="SELECT 21 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 21=21
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSalesMaizeYr1=convertShillingsToDollars($result['VolSalesMaizeYr1']);
								$VolSalesMaizeYr2=convertShillingsToDollars($result['VolSalesMaizeYr2']);
								$VolSalesMaizeYr3=convertShillingsToDollars($result['VolSalesMaizeYr3']);
								$VolSalesMaizeYr4=convertShillingsToDollars($result['VolSalesMaizeYr4']);
								$VolSalesMaizeYr5=convertShillingsToDollars($result['VolSalesMaizeYr5']);
								$VolSalesMaizeYr6=convertShillingsToDollars($result['VolSalesMaizeYr6']);
								
							/* --------Form 6 Volume sold(QS)--------------------------- */
							$x="SELECT 21 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 21=21
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSoldMaizeYr1=$result['VolSoldMaizeYr1'];
								$VolSoldMaizeYr2=$result['VolSoldMaizeYr2'];
								$VolSoldMaizeYr3=$result['VolSoldMaizeYr3'];
								$VolSoldMaizeYr4=$result['VolSoldMaizeYr4'];
								$VolSoldMaizeYr5=$result['VolSoldMaizeYr5'];
								$VolSoldMaizeYr6=$result['VolSoldMaizeYr6'];
								
							/* --------Form 6 Input Cost(IC)--------------------------- */
							$x="SELECT 21 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 21=21
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$inputCostMaizeYr1=convertShillingsToDollars($result['inputCostMaizeYr1']);
								$inputCostMaizeYr2=convertShillingsToDollars($result['inputCostMaizeYr2']);
								$inputCostMaizeYr3=convertShillingsToDollars($result['inputCostMaizeYr3']);
								$inputCostMaizeYr4=convertShillingsToDollars($result['inputCostMaizeYr4']);
								$inputCostMaizeYr5=convertShillingsToDollars($result['inputCostMaizeYr5']);
								$inputCostMaizeYr6=convertShillingsToDollars($result['inputCostMaizeYr6']);
								
							/* --------Form 6 Unit of Production/Area(UP)--------------------------- */
							$x="SELECT 21 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 21=21
								and `f`.`farmersSex` ='Male'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$unitProductionMaizeYr1=convertAcresToHectares($result['unitProductionMaizeYr1']);
								$unitProductionMaizeYr2=convertAcresToHectares($result['unitProductionMaizeYr2']);
								$unitProductionMaizeYr3=convertAcresToHectares($result['unitProductionMaizeYr3']);
								$unitProductionMaizeYr4=convertAcresToHectares($result['unitProductionMaizeYr4']);
								$unitProductionMaizeYr5=convertAcresToHectares($result['unitProductionMaizeYr5']);
								$unitProductionMaizeYr6=convertAcresToHectares($result['unitProductionMaizeYr6']);
								
								/* Calculating Gross Margin Per Unit of land (BEANS) based on the following formula:
								(((TP*(VS/QS))-IC)/UP)*Extrapolation Factor	 */

							$st=ExtrapolationFactor(1);
							$query=@Execute($st) or die(http("FtFRepLOne-163"));
							$result=FetchRecords($query);
							$extrapolationFactorYr1=$result['exFactorYr1'];
							$extrapolationFactorYr2=$result['exFactorYr2'];
							$extrapolationFactorYr3=$result['exFactorYr3'];
							$extrapolationFactorYr4=$result['exFactorYr4'];
							$extrapolationFactorYr5=$result['exFactorYr5'];
							$extrapolationFactorYr6=$result['exFactorYr6'];






								$GrossMarginPerUnitOfLandRecomputedMaizeYr1=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr1,$VolSalesMaizeYr1,$VolSoldMaizeYr1,$inputCostMaizeYr1,$unitProductionMaizeYr1,$extrapolationFactorYr1);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr2=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr2,$VolSalesMaizeYr2,$VolSoldMaizeYr2,$inputCostMaizeYr2,$unitProductionMaizeYr2,$extrapolationFactorYr2);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr3=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr3,$VolSalesMaizeYr3,$VolSoldMaizeYr3,$inputCostMaizeYr3,$unitProductionMaizeYr3,$extrapolationFactorYr3);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr4=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr4,$VolSalesMaizeYr4,$VolSoldMaizeYr4,$inputCostMaizeYr4,$unitProductionMaizeYr4,$extrapolationFactorYr4);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr5=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr5,$VolSalesMaizeYr5,$VolSoldMaizeYr5,$inputCostMaizeYr5,$unitProductionMaizeYr5,$extrapolationFactorYr5);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr6=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr6,$VolSalesMaizeYr6,$VolSoldMaizeYr6,$inputCostMaizeYr6,$unitProductionMaizeYr6,$extrapolationFactorYr6);

								$result['actualYr1'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr1;
								$result['actualYr2'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr2;
								$result['actualYr3'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr3;
								$result['actualYr4'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr4;
								$result['actualYr5'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr5;
								$result['actualYr6'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr6;
								return $result[$resultValue];
							}
//End:21 Gross margin per unit of land, kilogram, or animal of[Maize>>Male] ...

//Start:22 Gross margin per unit of land, kilogram, or animal of[Maize>>Female] ...
function grossMarginPerUnitOfLandMaizeFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Maize(TP)--------------------------- */
							$x="SELECT 22 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 22=22
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$TotProdMaizeYr1=$result['TotProdMaizeYr1'];
								$TotProdMaizeYr2=$result['TotProdMaizeYr2'];
								$TotProdMaizeYr3=$result['TotProdMaizeYr3'];
								$TotProdMaizeYr4=$result['TotProdMaizeYr4'];
								$TotProdMaizeYr5=$result['TotProdMaizeYr5'];
								$TotProdMaizeYr6=$result['TotProdMaizeYr6'];
								
							/* --------Form 6 Value of sales(VS)--------------------------- */
							$x="SELECT 22 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 22=22
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSalesMaizeYr1=convertShillingsToDollars($result['VolSalesMaizeYr1']);
								$VolSalesMaizeYr2=convertShillingsToDollars($result['VolSalesMaizeYr2']);
								$VolSalesMaizeYr3=convertShillingsToDollars($result['VolSalesMaizeYr3']);
								$VolSalesMaizeYr4=convertShillingsToDollars($result['VolSalesMaizeYr4']);
								$VolSalesMaizeYr5=convertShillingsToDollars($result['VolSalesMaizeYr5']);
								$VolSalesMaizeYr6=convertShillingsToDollars($result['VolSalesMaizeYr6']);
								
							/* --------Form 6 Volume sold(QS)--------------------------- */
							$x="SELECT 22 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 22=22
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSoldMaizeYr1=$result['VolSoldMaizeYr1'];
								$VolSoldMaizeYr2=$result['VolSoldMaizeYr2'];
								$VolSoldMaizeYr3=$result['VolSoldMaizeYr3'];
								$VolSoldMaizeYr4=$result['VolSoldMaizeYr4'];
								$VolSoldMaizeYr5=$result['VolSoldMaizeYr5'];
								$VolSoldMaizeYr6=$result['VolSoldMaizeYr6'];
								
							/* --------Form 6 Input Cost(IC)--------------------------- */
							$x="SELECT 22 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 22=22
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$inputCostMaizeYr1=convertShillingsToDollars($result['inputCostMaizeYr1']);
								$inputCostMaizeYr2=convertShillingsToDollars($result['inputCostMaizeYr2']);
								$inputCostMaizeYr3=convertShillingsToDollars($result['inputCostMaizeYr3']);
								$inputCostMaizeYr4=convertShillingsToDollars($result['inputCostMaizeYr4']);
								$inputCostMaizeYr5=convertShillingsToDollars($result['inputCostMaizeYr5']);
								$inputCostMaizeYr6=convertShillingsToDollars($result['inputCostMaizeYr6']);
								
							/* --------Form 6 Unit of Production/Area(UP)--------------------------- */
							$x="SELECT 22 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 22=22
								and `f`.`farmersSex` ='Female'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$unitProductionMaizeYr1=convertAcresToHectares($result['unitProductionMaizeYr1']);
								$unitProductionMaizeYr2=convertAcresToHectares($result['unitProductionMaizeYr2']);
								$unitProductionMaizeYr3=convertAcresToHectares($result['unitProductionMaizeYr3']);
								$unitProductionMaizeYr4=convertAcresToHectares($result['unitProductionMaizeYr4']);
								$unitProductionMaizeYr5=convertAcresToHectares($result['unitProductionMaizeYr5']);
								$unitProductionMaizeYr6=convertAcresToHectares($result['unitProductionMaizeYr6']);
								
								/* Calculating Gross Margin Per Unit of land (BEANS) based on the following formula:
								(((TP*(VS/QS))-IC)/UP)*Extrapolation Factor	 */

							$st=ExtrapolationFactor(1);
							$query=@Execute($st) or die(http("FtFRepLOne-163"));
							$result=FetchRecords($query);
							$extrapolationFactorYr1=$result['exFactorYr1'];
							$extrapolationFactorYr2=$result['exFactorYr2'];
							$extrapolationFactorYr3=$result['exFactorYr3'];
							$extrapolationFactorYr4=$result['exFactorYr4'];
							$extrapolationFactorYr5=$result['exFactorYr5'];
							$extrapolationFactorYr6=$result['exFactorYr6'];






								$GrossMarginPerUnitOfLandRecomputedMaizeYr1=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr1,$VolSalesMaizeYr1,$VolSoldMaizeYr1,$inputCostMaizeYr1,$unitProductionMaizeYr1,$extrapolationFactorYr1);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr2=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr2,$VolSalesMaizeYr2,$VolSoldMaizeYr2,$inputCostMaizeYr2,$unitProductionMaizeYr2,$extrapolationFactorYr2);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr3=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr3,$VolSalesMaizeYr3,$VolSoldMaizeYr3,$inputCostMaizeYr3,$unitProductionMaizeYr3,$extrapolationFactorYr3);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr4=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr4,$VolSalesMaizeYr4,$VolSoldMaizeYr4,$inputCostMaizeYr4,$unitProductionMaizeYr4,$extrapolationFactorYr4);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr5=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr5,$VolSalesMaizeYr5,$VolSoldMaizeYr5,$inputCostMaizeYr5,$unitProductionMaizeYr5,$extrapolationFactorYr5);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr6=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr6,$VolSalesMaizeYr6,$VolSoldMaizeYr6,$inputCostMaizeYr6,$unitProductionMaizeYr6,$extrapolationFactorYr6);

								$result['actualYr1'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr1;
								$result['actualYr2'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr2;
								$result['actualYr3'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr3;
								$result['actualYr4'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr4;
								$result['actualYr5'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr5;
								$result['actualYr6'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr6;
								return $result[$resultValue];
							}
//End:22 Gross margin per unit of land, kilogram, or animal of[Maize>>Female] ...

//Start:23 Gross margin per unit of land, kilogram, or animal of[Maize>>Joint] ...
function grossMarginPerUnitOfLandMaizeJoint($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Maize(TP)--------------------------- */
							$x="SELECT 23 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 23=23
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$TotProdMaizeYr1=$result['TotProdMaizeYr1'];
								$TotProdMaizeYr2=$result['TotProdMaizeYr2'];
								$TotProdMaizeYr3=$result['TotProdMaizeYr3'];
								$TotProdMaizeYr4=$result['TotProdMaizeYr4'];
								$TotProdMaizeYr5=$result['TotProdMaizeYr5'];
								$TotProdMaizeYr6=$result['TotProdMaizeYr6'];
								
							/* --------Form 6 Value of sales(VS)--------------------------- */
							$x="SELECT 23 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 23=23
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSalesMaizeYr1=convertShillingsToDollars($result['VolSalesMaizeYr1']);
								$VolSalesMaizeYr2=convertShillingsToDollars($result['VolSalesMaizeYr2']);
								$VolSalesMaizeYr3=convertShillingsToDollars($result['VolSalesMaizeYr3']);
								$VolSalesMaizeYr4=convertShillingsToDollars($result['VolSalesMaizeYr4']);
								$VolSalesMaizeYr5=convertShillingsToDollars($result['VolSalesMaizeYr5']);
								$VolSalesMaizeYr6=convertShillingsToDollars($result['VolSalesMaizeYr6']);
								
							/* --------Form 6 Volume sold(QS)--------------------------- */
							$x="SELECT 23 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 23=23
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSoldMaizeYr1=$result['VolSoldMaizeYr1'];
								$VolSoldMaizeYr2=$result['VolSoldMaizeYr2'];
								$VolSoldMaizeYr3=$result['VolSoldMaizeYr3'];
								$VolSoldMaizeYr4=$result['VolSoldMaizeYr4'];
								$VolSoldMaizeYr5=$result['VolSoldMaizeYr5'];
								$VolSoldMaizeYr6=$result['VolSoldMaizeYr6'];
								
							/* --------Form 6 Input Cost(IC)--------------------------- */
							$x="SELECT 23 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 23=23
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$inputCostMaizeYr1=convertShillingsToDollars($result['inputCostMaizeYr1']);
								$inputCostMaizeYr2=convertShillingsToDollars($result['inputCostMaizeYr2']);
								$inputCostMaizeYr3=convertShillingsToDollars($result['inputCostMaizeYr3']);
								$inputCostMaizeYr4=convertShillingsToDollars($result['inputCostMaizeYr4']);
								$inputCostMaizeYr5=convertShillingsToDollars($result['inputCostMaizeYr5']);
								$inputCostMaizeYr6=convertShillingsToDollars($result['inputCostMaizeYr6']);
								
							/* --------Form 6 Unit of Production/Area(UP)--------------------------- */
							$x="SELECT 23 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr6
								from  `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 23=23
								and `f`.`farmersSex` ='Joint'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$unitProductionMaizeYr1=convertAcresToHectares($result['unitProductionMaizeYr1']);
								$unitProductionMaizeYr2=convertAcresToHectares($result['unitProductionMaizeYr2']);
								$unitProductionMaizeYr3=convertAcresToHectares($result['unitProductionMaizeYr3']);
								$unitProductionMaizeYr4=convertAcresToHectares($result['unitProductionMaizeYr4']);
								$unitProductionMaizeYr5=convertAcresToHectares($result['unitProductionMaizeYr5']);
								$unitProductionMaizeYr6=convertAcresToHectares($result['unitProductionMaizeYr6']);
								
								/* Calculating Gross Margin Per Unit of land (BEANS) based on the following formula:
								(((TP*(VS/QS))-IC)/UP)*Extrapolation Factor	 */

							$st=ExtrapolationFactor(1);
							$query=@Execute($st) or die(http("FtFRepLOne-163"));
							$result=FetchRecords($query);
							$extrapolationFactorYr1=$result['exFactorYr1'];
							$extrapolationFactorYr2=$result['exFactorYr2'];
							$extrapolationFactorYr3=$result['exFactorYr3'];
							$extrapolationFactorYr4=$result['exFactorYr4'];
							$extrapolationFactorYr5=$result['exFactorYr5'];
							$extrapolationFactorYr6=$result['exFactorYr6'];






								$GrossMarginPerUnitOfLandRecomputedMaizeYr1=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr1,$VolSalesMaizeYr1,$VolSoldMaizeYr1,$inputCostMaizeYr1,$unitProductionMaizeYr1,$extrapolationFactorYr1);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr2=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr2,$VolSalesMaizeYr2,$VolSoldMaizeYr2,$inputCostMaizeYr2,$unitProductionMaizeYr2,$extrapolationFactorYr2);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr3=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr3,$VolSalesMaizeYr3,$VolSoldMaizeYr3,$inputCostMaizeYr3,$unitProductionMaizeYr3,$extrapolationFactorYr3);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr4=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr4,$VolSalesMaizeYr4,$VolSoldMaizeYr4,$inputCostMaizeYr4,$unitProductionMaizeYr4,$extrapolationFactorYr4);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr5=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr5,$VolSalesMaizeYr5,$VolSoldMaizeYr5,$inputCostMaizeYr5,$unitProductionMaizeYr5,$extrapolationFactorYr5);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr6=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr6,$VolSalesMaizeYr6,$VolSoldMaizeYr6,$inputCostMaizeYr6,$unitProductionMaizeYr6,$extrapolationFactorYr6);

								$result['actualYr1'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr1;
								$result['actualYr2'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr2;
								$result['actualYr3'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr3;
								$result['actualYr4'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr4;
								$result['actualYr5'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr5;
								$result['actualYr6'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr6;
								return $result[$resultValue];
							}
//End:23 Gross margin per unit of land, kilogram, or animal of[Maize>>Joint] ...

//Start:24 Gross margin per unit of land, kilogram, or animal of[Maize>>Association-applied] ...
function grossMarginPerUnitOfLandMaizeAssoc($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:24 Gross margin per unit of land, kilogram, or animal of[Maize>>Association-applied] ...

//Start:25 Gross margin per unit of land, kilogram, or animal of[Maize>>Hectares planted...] ...
function grossMarginPerUnitOfLandMaizeHa($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:25 Gross margin per unit of land, kilogram, or animal of[Maize>>Hectares planted...] ...

//Start:26 Gross margin per unit of land, kilogram, or animal of[Maize>>Total Production ] ...
function grossMarginPerUnitOfLandMaizeTP($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Maize(TP)--------------------------- */
	$x="SELECT 26 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr6
		from `tbl_frm6particulars` as `p` 
		join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 26=26
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdMaizeYr1=$result['TotProdMaizeYr1'];
		$TotProdMaizeYr2=$result['TotProdMaizeYr2'];
		$TotProdMaizeYr3=$result['TotProdMaizeYr3'];
		$TotProdMaizeYr4=$result['TotProdMaizeYr4'];
		$TotProdMaizeYr5=$result['TotProdMaizeYr5'];
		$TotProdMaizeYr6=$result['TotProdMaizeYr6'];



	$st=ExtrapolationFactor(26);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:26 Gross margin per unit of land, kilogram, or animal of[Maize>>Total Production ] ...

//Start:27 Gross margin per unit of land, kilogram, or animal of[Maize>>Value of Sales] ...
function grossMarginPerUnitOfLandMaizeVS($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) BEANS--------------------------- */
	$x="SELECT 27 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_sold`)*(`b`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr6
		from  `tbl_frm6particulars` as `p` 
		join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 27=27
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesMaizeYr1=convertShillingsToDollars($result['VolSalesMaizeYr1']);
		$VolSalesMaizeYr2=convertShillingsToDollars($result['VolSalesMaizeYr2']);
		$VolSalesMaizeYr3=convertShillingsToDollars($result['VolSalesMaizeYr3']);
		$VolSalesMaizeYr4=convertShillingsToDollars($result['VolSalesMaizeYr4']);
		$VolSalesMaizeYr5=convertShillingsToDollars($result['VolSalesMaizeYr5']);
		$VolSalesMaizeYr6=convertShillingsToDollars($result['VolSalesMaizeYr6']);



	$st=ExtrapolationFactor(27);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:27 Gross margin per unit of land, kilogram, or animal of[Maize>>Value of Sales] ...

//Start:28 Gross margin per unit of land, kilogram, or animal of[Maize>>Quantity of Sales] ...
function grossMarginPerUnitOfLandMaizeQTY($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 28 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr6
		from  `tbl_frm6particulars` as `p` 
		join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 28=28
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldMaizeYr1=$result['VolSoldMaizeYr1'];
		$VolSoldMaizeYr2=$result['VolSoldMaizeYr2'];
		$VolSoldMaizeYr3=$result['VolSoldMaizeYr3'];
		$VolSoldMaizeYr4=$result['VolSoldMaizeYr4'];
		$VolSoldMaizeYr5=$result['VolSoldMaizeYr5'];
		$VolSoldMaizeYr6=$result['VolSoldMaizeYr6'];



	$st=ExtrapolationFactor(28);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:28 Gross margin per unit of land, kilogram, or animal of[Maize>>Quantity of Sales] ...

//Start:29 Gross margin per unit of land, kilogram, or animal of[Maize>>Purchased input costs] ...
function grossMarginPerUnitOfLandMaizeCOST($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 29 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`maize_improved_cost`) + (`b`.`maize_fertilizer_cost`) + (`b`.`maize_chemical_cost`) + (`b`.`maize_cost_ict`) + (`b`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr6
		from  `tbl_frm6particulars` as `p` 
		join `tbl_frm6production_maize` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 29=29
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostMaizeYr1=convertShillingsToDollars($result['inputCostMaizeYr1']);
		$inputCostMaizeYr2=convertShillingsToDollars($result['inputCostMaizeYr2']);
		$inputCostMaizeYr3=convertShillingsToDollars($result['inputCostMaizeYr3']);
		$inputCostMaizeYr4=convertShillingsToDollars($result['inputCostMaizeYr4']);
		$inputCostMaizeYr5=convertShillingsToDollars($result['inputCostMaizeYr5']);
		$inputCostMaizeYr6=convertShillingsToDollars($result['inputCostMaizeYr6']);
	
	$st=ExtrapolationFactor(29);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:29 Gross margin per unit of land, kilogram, or animal of[Maize>>Purchased input costs] ...

//--end Maize--

//Start:30 	Value of incremental sales (collected at farm level)...[Beans>>Total Adjusted Baseline Sales]
function valueOfIncrementalSalesBeansTABs($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//=====================Form 6 Beans==============
	$x2="SELECT 30 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr6
		FROM `tbl_frm6particulars` as `p`
		join `tbl_frm6production_beans` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 30=30
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x2) or die(http(__line__));
		$result=FetchRecords($query);
		$incrementalSalesBeansYr1=$result['incrementalSalesBeansYr1'];
		$incrementalSalesBeansYr2=$result['incrementalSalesBeansYr2'];
		$incrementalSalesBeansYr3=$result['incrementalSalesBeansYr3'];
		$incrementalSalesBeansYr4=$result['incrementalSalesBeansYr4'];
		$incrementalSalesBeansYr5=$result['incrementalSalesBeansYr5'];
		$incrementalSalesBeansYr6=$result['incrementalSalesBeansYr6'];
		

		//Include Extrapolation factor...
		$st=ExtrapolationFactor(30);
		$query=@Execute($st) or die(http("Activity DataMining-462"));
		$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1']=($extrapolationFactorYr1*convertShillingsToDollars($incrementalSalesBeansYr1));
		$result['actualYr2']=($extrapolationFactorYr2*convertShillingsToDollars($incrementalSalesBeansYr2));
		$result['actualYr3']=($extrapolationFactorYr3*convertShillingsToDollars($incrementalSalesBeansYr3));
		$result['actualYr4']=($extrapolationFactorYr4*convertShillingsToDollars($incrementalSalesBeansYr4));
		$result['actualYr5']=($extrapolationFactorYr5*convertShillingsToDollars($incrementalSalesBeansYr5));
		$result['actualYr6']=($extrapolationFactorYr6*convertShillingsToDollars($incrementalSalesBeansYr6));
		return $result[$resultValue];
	}
//End:30	Value of incremental sales (collected at farm level)...[Beans>>Total Adjusted Baseline Sales]

//Start:31 	Value of incremental sales (collected at farm level)...[Beans>>Total Baseline sales]
function valueOfIncrementalSalesBeansTBs($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//=====================Form 6 Beans==============
	$x2="SELECT 31 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr6
		FROM `tbl_frm6particulars` as `p`
		join `tbl_frm6production_beans` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 31=31
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x2) or die(http(__line__));
		$result=FetchRecords($query);
		$incrementalSalesBeansYr1=$result['incrementalSalesBeansYr1'];
		$incrementalSalesBeansYr2=$result['incrementalSalesBeansYr2'];
		$incrementalSalesBeansYr3=$result['incrementalSalesBeansYr3'];
		$incrementalSalesBeansYr4=$result['incrementalSalesBeansYr4'];
		$incrementalSalesBeansYr5=$result['incrementalSalesBeansYr5'];
		$incrementalSalesBeansYr6=$result['incrementalSalesBeansYr6'];
		

		
		$result['actualYr1']=(convertShillingsToDollars($incrementalSalesBeansYr1));
		$result['actualYr2']=(convertShillingsToDollars($incrementalSalesBeansYr2));
		$result['actualYr3']=(convertShillingsToDollars($incrementalSalesBeansYr3));
		$result['actualYr4']=(convertShillingsToDollars($incrementalSalesBeansYr4));
		$result['actualYr5']=(convertShillingsToDollars($incrementalSalesBeansYr5));
		$result['actualYr6']=(convertShillingsToDollars($incrementalSalesBeansYr6));
	return $result[$resultValue];
}
//End:31	Value of incremental sales (collected at farm level)...[Beans>>Total Baseline sales]

//Start:32 	Value of incremental sales (collected at farm level)...[Beans>>Reporting year sales]
function valueOfIncrementalSalesBeansRY($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//Data Source not clear
		
		$result['actualYr1']='';
		$result['actualYr2']='';
		$result['actualYr3']='';
		$result['actualYr4']='';
		$result['actualYr5']='';
		$result['actualYr6']='';
	return $result[$resultValue];
}
//End:32	Value of incremental sales (collected at farm level)...[Beans>>Reporting year sales]

//Start:33 	Value of incremental sales (collected at farm level)...[Beans>>Volume of sales (mt)]
function valueOfIncrementalSalesBeansVS($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//Data Source not clear
		
		$result['actualYr1']='';
		$result['actualYr2']='';
		$result['actualYr3']='';
		$result['actualYr4']='';
		$result['actualYr5']='';
		$result['actualYr6']='';
	return $result[$resultValue];
}
//End:33	Value of incremental sales (collected at farm level)...[Beans>>Volume of sales (mt)]

//Start:34	Value of incremental sales (collected at farm level)...[Beans>>Number of direct beneficiaries]
function valueOfIncrementalSalesBeansNB($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//Data Source not clear
		
		$result['actualYr1']='';
		$result['actualYr2']='';
		$result['actualYr3']='';
		$result['actualYr4']='';
		$result['actualYr5']='';
		$result['actualYr6']='';
	return $result[$resultValue];
}
//End:34	Value of incremental sales (collected at farm level)...[Beans>>Number of direct beneficiaries]

//Start:35 	Value of incremental sales (collected at farm level)...[Coffee>>Total Adjusted Baseline Sales]
function valueOfIncrementalSalesCoffeeTABs($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//=====================Form 6 Coffee==============
	$x2="SELECT 35 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr6
		FROM `tbl_frm6particulars` as `p`
		join `tbl_frm6production_coffee` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 35=35
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x2) or die(http(__line__));
		$result=FetchRecords($query);
		$incrementalSalesCoffeeYr1=$result['incrementalSalesCoffeeYr1'];
		$incrementalSalesCoffeeYr2=$result['incrementalSalesCoffeeYr2'];
		$incrementalSalesCoffeeYr3=$result['incrementalSalesCoffeeYr3'];
		$incrementalSalesCoffeeYr4=$result['incrementalSalesCoffeeYr4'];
		$incrementalSalesCoffeeYr5=$result['incrementalSalesCoffeeYr5'];
		$incrementalSalesCoffeeYr6=$result['incrementalSalesCoffeeYr6'];
		

		//Include Extrapolation factor...
		$st=ExtrapolationFactor(35);
		$query=@Execute($st) or die(http("Activity DataMining-462"));
		$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1']=($extrapolationFactorYr1*convertShillingsToDollars($incrementalSalesCoffeeYr1));
		$result['actualYr2']=($extrapolationFactorYr2*convertShillingsToDollars($incrementalSalesCoffeeYr2));
		$result['actualYr3']=($extrapolationFactorYr3*convertShillingsToDollars($incrementalSalesCoffeeYr3));
		$result['actualYr4']=($extrapolationFactorYr4*convertShillingsToDollars($incrementalSalesCoffeeYr4));
		$result['actualYr5']=($extrapolationFactorYr5*convertShillingsToDollars($incrementalSalesCoffeeYr5));
		$result['actualYr6']=($extrapolationFactorYr6*convertShillingsToDollars($incrementalSalesCoffeeYr6));
		return $result[$resultValue];
	}
//End:35	Value of incremental sales (collected at farm level)...[Coffee>>Total Adjusted Baseline Sales]

//Start:36 	Value of incremental sales (collected at farm level)...[Coffee>>Total Baseline sales]
function valueOfIncrementalSalesCoffeeTBs($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//=====================Form 6 Coffee==============
	$x2="SELECT 36 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr6
		FROM `tbl_frm6particulars` as `p`
		join `tbl_frm6production_coffee` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 36=36
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x2) or die(http(__line__));
		$result=FetchRecords($query);
		$incrementalSalesCoffeeYr1=$result['incrementalSalesCoffeeYr1'];
		$incrementalSalesCoffeeYr2=$result['incrementalSalesCoffeeYr2'];
		$incrementalSalesCoffeeYr3=$result['incrementalSalesCoffeeYr3'];
		$incrementalSalesCoffeeYr4=$result['incrementalSalesCoffeeYr4'];
		$incrementalSalesCoffeeYr5=$result['incrementalSalesCoffeeYr5'];
		$incrementalSalesCoffeeYr6=$result['incrementalSalesCoffeeYr6'];
		

		
		$result['actualYr1']=(convertShillingsToDollars($incrementalSalesCoffeeYr1));
		$result['actualYr2']=(convertShillingsToDollars($incrementalSalesCoffeeYr2));
		$result['actualYr3']=(convertShillingsToDollars($incrementalSalesCoffeeYr3));
		$result['actualYr4']=(convertShillingsToDollars($incrementalSalesCoffeeYr4));
		$result['actualYr5']=(convertShillingsToDollars($incrementalSalesCoffeeYr5));
		$result['actualYr6']=(convertShillingsToDollars($incrementalSalesCoffeeYr6));
	return $result[$resultValue];
}
//End:36	Value of incremental sales (collected at farm level)...[Coffee>>Total Baseline sales]

//Start:37 	Value of incremental sales (collected at farm level)...[Coffee>>Reporting year sales]
function valueOfIncrementalSalesCoffeeRY($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//Data Source not clear
		
		$result['actualYr1']='';
		$result['actualYr2']='';
		$result['actualYr3']='';
		$result['actualYr4']='';
		$result['actualYr5']='';
		$result['actualYr6']='';
	return $result[$resultValue];
}
//End:37	Value of incremental sales (collected at farm level)...[Coffee>>Reporting year sales]

//Start:38 	Value of incremental sales (collected at farm level)...[Coffee>>Volume of sales (mt)]
function valueOfIncrementalSalesCoffeeVS($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//Data Source not clear
		
		$result['actualYr1']='';
		$result['actualYr2']='';
		$result['actualYr3']='';
		$result['actualYr4']='';
		$result['actualYr5']='';
		$result['actualYr6']='';
	return $result[$resultValue];
}
//End:38	Value of incremental sales (collected at farm level)...[Coffee>>Volume of sales (mt)]

//Start:39	Value of incremental sales (collected at farm level)...[Coffee>>Number of direct beneficiaries]
function valueOfIncrementalSalesCoffeeNB($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//Data Source not clear
		
		$result['actualYr1']='';
		$result['actualYr2']='';
		$result['actualYr3']='';
		$result['actualYr4']='';
		$result['actualYr5']='';
		$result['actualYr6']='';
	return $result[$resultValue];
}
//End:39	Value of incremental sales (collected at farm level)...[Coffee>>Number of direct beneficiaries]

//Start:40 	Value of incremental sales (collected at farm level)...[Maize>>Total Adjusted Baseline Sales]
function valueOfIncrementalSalesMaizeTABs($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//=====================Form 6 Maize==============
	$x2="SELECT 40 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr6
		FROM `tbl_frm6particulars` as `p`
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 40=40
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x2) or die(http(__line__));
		$result=FetchRecords($query);
		$incrementalSalesMaizeYr1=$result['incrementalSalesMaizeYr1'];
		$incrementalSalesMaizeYr2=$result['incrementalSalesMaizeYr2'];
		$incrementalSalesMaizeYr3=$result['incrementalSalesMaizeYr3'];
		$incrementalSalesMaizeYr4=$result['incrementalSalesMaizeYr4'];
		$incrementalSalesMaizeYr5=$result['incrementalSalesMaizeYr5'];
		$incrementalSalesMaizeYr6=$result['incrementalSalesMaizeYr6'];
		

		//Include Extrapolation factor...
		$st=ExtrapolationFactor(40);
		$query=@Execute($st) or die(http("Activity DataMining-462"));
		$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1']=($extrapolationFactorYr1*convertShillingsToDollars($incrementalSalesMaizeYr1));
		$result['actualYr2']=($extrapolationFactorYr2*convertShillingsToDollars($incrementalSalesMaizeYr2));
		$result['actualYr3']=($extrapolationFactorYr3*convertShillingsToDollars($incrementalSalesMaizeYr3));
		$result['actualYr4']=($extrapolationFactorYr4*convertShillingsToDollars($incrementalSalesMaizeYr4));
		$result['actualYr5']=($extrapolationFactorYr5*convertShillingsToDollars($incrementalSalesMaizeYr5));
		$result['actualYr6']=($extrapolationFactorYr6*convertShillingsToDollars($incrementalSalesMaizeYr6));
		return $result[$resultValue];
	}
//End:40	Value of incremental sales (collected at farm level)...[Maize>>Total Adjusted Baseline Sales]

//Start:41 	Value of incremental sales (collected at farm level)...[Maize>>Total Baseline sales]
function valueOfIncrementalSalesMaizeTBs($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//=====================Form 6 Maize==============
	$x2="SELECT 41 as level_two_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr6
		FROM `tbl_frm6particulars` as `p`
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 41=41
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x2) or die(http(__line__));
		$result=FetchRecords($query);
		$incrementalSalesMaizeYr1=$result['incrementalSalesMaizeYr1'];
		$incrementalSalesMaizeYr2=$result['incrementalSalesMaizeYr2'];
		$incrementalSalesMaizeYr3=$result['incrementalSalesMaizeYr3'];
		$incrementalSalesMaizeYr4=$result['incrementalSalesMaizeYr4'];
		$incrementalSalesMaizeYr5=$result['incrementalSalesMaizeYr5'];
		$incrementalSalesMaizeYr6=$result['incrementalSalesMaizeYr6'];
		

		
		$result['actualYr1']=(convertShillingsToDollars($incrementalSalesMaizeYr1));
		$result['actualYr2']=(convertShillingsToDollars($incrementalSalesMaizeYr2));
		$result['actualYr3']=(convertShillingsToDollars($incrementalSalesMaizeYr3));
		$result['actualYr4']=(convertShillingsToDollars($incrementalSalesMaizeYr4));
		$result['actualYr5']=(convertShillingsToDollars($incrementalSalesMaizeYr5));
		$result['actualYr6']=(convertShillingsToDollars($incrementalSalesMaizeYr6));
	return $result[$resultValue];
}
//End:41	Value of incremental sales (collected at farm level)...[Maize>>Total Baseline sales]

//Start:42 	Value of incremental sales (collected at farm level)...[Maize>>Reporting year sales]
function valueOfIncrementalSalesMaizeRY($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//Data Source not clear
		
		$result['actualYr1']='';
		$result['actualYr2']='';
		$result['actualYr3']='';
		$result['actualYr4']='';
		$result['actualYr5']='';
		$result['actualYr6']='';
	return $result[$resultValue];
}
//End:42	Value of incremental sales (collected at farm level)...[Maize>>Reporting year sales]

//Start:43 	Value of incremental sales (collected at farm level)...[Maize>>Volume of sales (mt)]
function valueOfIncrementalSalesMaizeVS($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//Data Source not clear
		
		$result['actualYr1']='';
		$result['actualYr2']='';
		$result['actualYr3']='';
		$result['actualYr4']='';
		$result['actualYr5']='';
		$result['actualYr6']='';
	return $result[$resultValue];
}
//End:43	Value of incremental sales (collected at farm level)...[Maize>>Volume of sales (mt)]

//Start:44	Value of incremental sales (collected at farm level)...[Maize>>Number of direct beneficiaries]
function valueOfIncrementalSalesMaizeNB($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
//Data Source not clear
		
		$result['actualYr1']='';
		$result['actualYr2']='';
		$result['actualYr3']='';
		$result['actualYr4']='';
		$result['actualYr5']='';
		$result['actualYr6']='';
	return $result[$resultValue];
}
//End:44	Value of incremental sales (collected at farm level)...[Maize>>Number of direct beneficiaries]

//Start:45 	Number of Individuals who have received ...[Type of individual>>Producers]
function shortTermAgriculturalFoodsecurityTrainingTypePROD($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 1---------------------------
							$x="SELECT 45 as level_two_sub_indicatorId,
								sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS notrainedFrm1Yr1,
								sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS notrainedFrm1Yr2,
								sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS notrainedFrm1Yr3,
								sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS notrainedFrm1Yr4,
								sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS notrainedFrm1Yr5,
								sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS notrainedFrm1Yr6
								FROM `tbl_participants` p
								join `tbl_lookup` as `l` on `l`.`code` = `p`.`typeOfIndividual`
								JOIN tbl_training t ON ( t.tbl_trainingId = p.`trainingId` )
								where 45 = 45
								and `p`.`typeOfIndividual`<>''
								and `p`.`typeOfIndividual` is not null
								and `l`.`classCode`='25'
								and `l`.`code` = '1'";
								$query=@Execute($x) or die(http("DM-409"));
								$result=FetchRecords($query);
								$notrainedFrm1Yr1=$result['notrainedFrm1Yr1'];
								$notrainedFrm1Yr2=$result['notrainedFrm1Yr2'];
								$notrainedFrm1Yr3=$result['notrainedFrm1Yr3'];
								$notrainedFrm1Yr4=$result['notrainedFrm1Yr4'];
								$notrainedFrm1Yr5=$result['notrainedFrm1Yr5'];
								$notrainedFrm1Yr6=$result['notrainedFrm1Yr6'];
								
								$result['actualYr1']=$notrainedFrm1Yr1;
								$result['actualYr2']=$notrainedFrm1Yr2;
								$result['actualYr3']=$notrainedFrm1Yr3;
								$result['actualYr4']=$notrainedFrm1Yr4;
								$result['actualYr5']=$notrainedFrm1Yr5;
								$result['actualYr6']=$notrainedFrm1Yr6;
								return $result[$resultValue];
							}
//End:45 Number of Individuals who have received ...[Type of individual>>Producers]

//Start:46 	Number of Individuals who have received ...[Type of individual>>People in government]
function shortTermAgriculturalFoodsecurityTrainingTypeGOV($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	//Data source not clear
		$result['actualYr1']='';
		$result['actualYr2']='';
		$result['actualYr3']='';
		$result['actualYr4']='';
		$result['actualYr5']='';
		$result['actualYr6']='';
	
	return $result[$resultValue];
}
//End:46 Number of Individuals who have received ...[Type of individual>>People in government]

//Start:47 	Number of Individuals who have received ...[Type of individual>>People in private sector firms]
function shortTermAgriculturalFoodsecurityTrainingTypePSV($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	//Data source not clear
		$result['actualYr1']='';
		$result['actualYr2']='';
		$result['actualYr3']='';
		$result['actualYr4']='';
		$result['actualYr5']='';
		$result['actualYr6']='';
	
	return $result[$resultValue];
}
//End:47 Number of Individuals who have received ...[Type of individual>>People in private sector firms]

//Start:48 	Number of Individuals who have received ...[Type of individual>>People in civil society]
function shortTermAgriculturalFoodsecurityTrainingTypePCS($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	//Data source not clear
		$result['actualYr1']='';
		$result['actualYr2']='';
		$result['actualYr3']='';
		$result['actualYr4']='';
		$result['actualYr5']='';
		$result['actualYr6']='';
	
	return $result[$resultValue];
}
//End:48 Number of Individuals who have received ...[Type of individual>>People in civil society]

//Start:49 	Number of Individuals who have received ...[Type of individual>>Disaggregates Not Available]
function shortTermAgriculturalFoodsecurityTrainingTypeDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	//--------From 1---------------------------
	$x="SELECT 45 as level_two_sub_indicatorId,
		sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS notrainedFrm1Yr1,
		sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS notrainedFrm1Yr2,
		sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS notrainedFrm1Yr3,
		sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS notrainedFrm1Yr4,
		sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS notrainedFrm1Yr5,
		sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS notrainedFrm1Yr6
		FROM `tbl_participants` p
		join `tbl_lookup` as `l` on `l`.`code` = `p`.`typeOfIndividual`
		JOIN tbl_training t ON ( t.tbl_trainingId = p.`trainingId` )
		where 45 = 45
		and `p`.`typeOfIndividual`<>''
		and `p`.`typeOfIndividual` is not null
		and `l`.`classCode`='25'
		and `l`.`code` <> '1'";
		$query=@Execute($x) or die(http("DM-409"));
		$result=FetchRecords($query);
		$notrainedFrm1Yr1=$result['notrainedFrm1Yr1'];
		$notrainedFrm1Yr2=$result['notrainedFrm1Yr2'];
		$notrainedFrm1Yr3=$result['notrainedFrm1Yr3'];
		$notrainedFrm1Yr4=$result['notrainedFrm1Yr4'];
		$notrainedFrm1Yr5=$result['notrainedFrm1Yr5'];
		$notrainedFrm1Yr6=$result['notrainedFrm1Yr6'];
		
		$result['actualYr1']=$notrainedFrm1Yr1;
		$result['actualYr2']=$notrainedFrm1Yr2;
		$result['actualYr3']=$notrainedFrm1Yr3;
		$result['actualYr4']=$notrainedFrm1Yr4;
		$result['actualYr5']=$notrainedFrm1Yr5;
		$result['actualYr6']=$notrainedFrm1Yr6;
		return $result[$resultValue];
}
//End:49 Number of Individuals who have received ...[Type of individual>>Disaggregates Not Available]

//Start:50 	Number of Individuals who have received ...[Sex>>Male]
function shortTermAgriculturalFoodsecurityTrainingSexMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 1---------------------------
							$x="SELECT 50 as level_two_sub_indicatorId,
								sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS notrainedFrm1Yr1,
								sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS notrainedFrm1Yr2,
								sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS notrainedFrm1Yr3,
								sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS notrainedFrm1Yr4,
								sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS notrainedFrm1Yr5,
								sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS notrainedFrm1Yr6
								FROM `tbl_participants` p
								JOIN tbl_training t ON ( t.tbl_trainingId = p.`trainingId` )
								where 50=50
								and `p`.`sex` like 'M%'";
								$query=@Execute($x) or die(http("DM-409"));
								$result=FetchRecords($query);
								$notrainedFrm1Yr1=$result['notrainedFrm1Yr1'];
								$notrainedFrm1Yr2=$result['notrainedFrm1Yr2'];
								$notrainedFrm1Yr3=$result['notrainedFrm1Yr3'];
								$notrainedFrm1Yr4=$result['notrainedFrm1Yr4'];
								$notrainedFrm1Yr5=$result['notrainedFrm1Yr5'];
								$notrainedFrm1Yr6=$result['notrainedFrm1Yr6'];
								
								$result['actualYr1']=$notrainedFrm1Yr1;
								$result['actualYr2']=$notrainedFrm1Yr2;
								$result['actualYr3']=$notrainedFrm1Yr3;
								$result['actualYr4']=$notrainedFrm1Yr4;
								$result['actualYr5']=$notrainedFrm1Yr5;
								$result['actualYr6']=$notrainedFrm1Yr6;
								return $result[$resultValue];
							}
//End:50 Number of Individuals who have received ...[Sex>>Male]

//Start:51 	Number of Individuals who have received ...[Sex>>Female]
function shortTermAgriculturalFoodsecurityTrainingSexFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	//--------From 1---------------------------
							$x="SELECT 51 as level_two_sub_indicatorId,
								sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS notrainedFrm1Yr1,
								sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS notrainedFrm1Yr2,
								sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS notrainedFrm1Yr3,
								sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS notrainedFrm1Yr4,
								sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS notrainedFrm1Yr5,
								sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS notrainedFrm1Yr6
								FROM `tbl_participants` p
								JOIN tbl_training t ON ( t.tbl_trainingId = p.`trainingId` )
								where 51=51
								and `p`.`sex` like 'F%'";
								$query=@Execute($x) or die(http("DM-409"));
								$result=FetchRecords($query);
								$notrainedFrm1Yr1=$result['notrainedFrm1Yr1'];
								$notrainedFrm1Yr2=$result['notrainedFrm1Yr2'];
								$notrainedFrm1Yr3=$result['notrainedFrm1Yr3'];
								$notrainedFrm1Yr4=$result['notrainedFrm1Yr4'];
								$notrainedFrm1Yr5=$result['notrainedFrm1Yr5'];
								$notrainedFrm1Yr6=$result['notrainedFrm1Yr6'];
								
								$result['actualYr1']=$notrainedFrm1Yr1;
								$result['actualYr2']=$notrainedFrm1Yr2;
								$result['actualYr3']=$notrainedFrm1Yr3;
								$result['actualYr4']=$notrainedFrm1Yr4;
								$result['actualYr5']=$notrainedFrm1Yr5;
								$result['actualYr6']=$notrainedFrm1Yr6;
								return $result[$resultValue];
}
//End:51 Number of Individuals who have received ...[Sex>>Female]

//Start:52 	Number of Individuals who have received ...[Sex>>Disaggregates Not Available]
function shortTermAgriculturalFoodsecurityTrainingSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	//--------From 1---------------------------
							$x="SELECT 52 as level_two_sub_indicatorId,
								sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS notrainedFrm1Yr1,
								sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS notrainedFrm1Yr2,
								sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS notrainedFrm1Yr3,
								sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS notrainedFrm1Yr4,
								sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS notrainedFrm1Yr5,
								sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS notrainedFrm1Yr6
								FROM `tbl_participants` p
								JOIN tbl_training t ON ( t.tbl_trainingId = p.`trainingId` )
								where 52=52
								and `p`.`sex` not like 'M%'
								and `p`.`sex` not like 'F%'";
								$query=@Execute($x) or die(http("DM-409"));
								$result=FetchRecords($query);
								$notrainedFrm1Yr1=$result['notrainedFrm1Yr1'];
								$notrainedFrm1Yr2=$result['notrainedFrm1Yr2'];
								$notrainedFrm1Yr3=$result['notrainedFrm1Yr3'];
								$notrainedFrm1Yr4=$result['notrainedFrm1Yr4'];
								$notrainedFrm1Yr5=$result['notrainedFrm1Yr5'];
								$notrainedFrm1Yr6=$result['notrainedFrm1Yr6'];
								
								$result['actualYr1']=$notrainedFrm1Yr1;
								$result['actualYr2']=$notrainedFrm1Yr2;
								$result['actualYr3']=$notrainedFrm1Yr3;
								$result['actualYr4']=$notrainedFrm1Yr4;
								$result['actualYr5']=$notrainedFrm1Yr5;
								$result['actualYr6']=$notrainedFrm1Yr6;
								return $result[$resultValue];
}
//End:52 Number of Individuals who have received ...[Sex>>Disaggregates Not Available]

//Start:53 Number of farmers and others who have applied new technologies ...[Producers>>Sex]
function appliedTechnologiesManagementPracticeFarmersSex($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							$x="SELECT 53 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' 
								and  (
								`m`.`maize_improved_seeds` ='1' or 
								`m`.`maize_fetilizer_use` = '1' or
								`m`.`maize_chemical_use` = '1' or
								`m`.`maize_mgt_practices` = '1' or
								`m`.`maize_machinery_use` = '1' or
								`b`.`beans_improved_seeds` ='1' or 
								`b`.`beans_fetilizer_use` = '1' or
								`b`.`beans_chemical_use` = '1' or
								`b`.`beans_mgt_practices` = '1' or
								`b`.`beans_machinery_use` = '1' or
								`c`.`coffee_improved_seeds` ='1' or 
								`c`.`coffee_fetilizer_use` = '1' or
								`c`.`coffee_chemical_use` = '1' or
								`c`.`coffee_mgt_practices` = '1' or
								`c`.`coffee_machinery_use` = '1' 
								), 1, 0 ) ) AS numFarmersFrm6Yr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' 
								and (
								`m`.`maize_improved_seeds` ='1' or 
								`m`.`maize_fetilizer_use` = '1' or
								`m`.`maize_chemical_use` = '1' or
								`m`.`maize_mgt_practices` = '1' or
								`m`.`maize_machinery_use` = '1' or
								`b`.`beans_improved_seeds` ='1' or 
								`b`.`beans_fetilizer_use` = '1' or
								`b`.`beans_chemical_use` = '1' or
								`b`.`beans_mgt_practices` = '1' or
								`b`.`beans_machinery_use` = '1' or
								`c`.`coffee_improved_seeds` ='1' or 
								`c`.`coffee_fetilizer_use` = '1' or
								`c`.`coffee_chemical_use` = '1' or
								`c`.`coffee_mgt_practices` = '1' or
								`c`.`coffee_machinery_use` = '1' 
								), 1, 0 ) ) AS numFarmersFrm6Yr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' 
								and (
								`m`.`maize_improved_seeds` ='1' or 
								`m`.`maize_fetilizer_use` = '1' or
								`m`.`maize_chemical_use` = '1' or
								`m`.`maize_mgt_practices` = '1' or
								`m`.`maize_machinery_use` = '1' or
								`b`.`beans_improved_seeds` ='1' or 
								`b`.`beans_fetilizer_use` = '1' or
								`b`.`beans_chemical_use` = '1' or
								`b`.`beans_mgt_practices` = '1' or
								`b`.`beans_machinery_use` = '1' or
								`c`.`coffee_improved_seeds` ='1' or 
								`c`.`coffee_fetilizer_use` = '1' or
								`c`.`coffee_chemical_use` = '1' or
								`c`.`coffee_mgt_practices` = '1' or
								`c`.`coffee_machinery_use` = '1' 
								), 1, 0 ) ) AS numFarmersFrm6Yr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' 
								and (
								`m`.`maize_improved_seeds` ='1' or 
								`m`.`maize_fetilizer_use` = '1' or
								`m`.`maize_chemical_use` = '1' or
								`m`.`maize_mgt_practices` = '1' or
								`m`.`maize_machinery_use` = '1' or
								`b`.`beans_improved_seeds` ='1' or 
								`b`.`beans_fetilizer_use` = '1' or
								`b`.`beans_chemical_use` = '1' or
								`b`.`beans_mgt_practices` = '1' or
								`b`.`beans_machinery_use` = '1' or
								`c`.`coffee_improved_seeds` ='1' or 
								`c`.`coffee_fetilizer_use` = '1' or
								`c`.`coffee_chemical_use` = '1' or
								`c`.`coffee_mgt_practices` = '1' or
								`c`.`coffee_machinery_use` = '1' 
								), 1, 0 ) ) AS numFarmersFrm6Yr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' 
								and (
								`m`.`maize_improved_seeds` ='1' or 
								`m`.`maize_fetilizer_use` = '1' or
								`m`.`maize_chemical_use` = '1' or
								`m`.`maize_mgt_practices` = '1' or
								`m`.`maize_machinery_use` = '1' or
								`b`.`beans_improved_seeds` ='1' or 
								`b`.`beans_fetilizer_use` = '1' or
								`b`.`beans_chemical_use` = '1' or
								`b`.`beans_mgt_practices` = '1' or
								`b`.`beans_machinery_use` = '1' or
								`c`.`coffee_improved_seeds` ='1' or 
								`c`.`coffee_fetilizer_use` = '1' or
								`c`.`coffee_chemical_use` = '1' or
								`c`.`coffee_mgt_practices` = '1' or
								`c`.`coffee_machinery_use` = '1' 
								), 1, 0 ) ) AS numFarmersFrm6Yr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' 
								and (
								`m`.`maize_improved_seeds` ='1' or 
								`m`.`maize_fetilizer_use` = '1' or
								`m`.`maize_chemical_use` = '1' or
								`m`.`maize_mgt_practices` = '1' or
								`m`.`maize_machinery_use` = '1' or
								`b`.`beans_improved_seeds` ='1' or 
								`b`.`beans_fetilizer_use` = '1' or
								`b`.`beans_chemical_use` = '1' or
								`b`.`beans_mgt_practices` = '1' or
								`b`.`beans_machinery_use` = '1' or
								`c`.`coffee_improved_seeds` ='1' or 
								`c`.`coffee_fetilizer_use` = '1' or
								`c`.`coffee_chemical_use` = '1' or
								`c`.`coffee_mgt_practices` = '1' or
								`c`.`coffee_machinery_use` = '1' 
								), 1, 0 ) ) AS numFarmersFrm6Yr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 53=53
								and `f`.`farmersSex` is not null
								and `f`.`farmersSex`<>''
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$num1FarmersFrm6Yr1=$result['numFarmersFrm6Yr1'];
								$num1FarmersFrm6Yr2=$result['numFarmersFrm6Yr2'];
								$num1FarmersFrm6Yr3=$result['numFarmersFrm6Yr3'];
								$num1FarmersFrm6Yr4=$result['numFarmersFrm6Yr4'];
								$num1FarmersFrm6Yr5=$result['numFarmersFrm6Yr5'];
								$num1FarmersFrm6Yr6=$result['numFarmersFrm6Yr6'];


								$st=ExtrapolationFactor(53);
								$query=@Execute($st) or die(http("ActivityDataMining-710"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//Applying extrapolation factor
								$numFarmersFrm6Yr1=($extrapolationFactorYr1*$num1FarmersFrm6Yr1);
								$numFarmersFrm6Yr2=($extrapolationFactorYr2*$num1FarmersFrm6Yr2);
								$numFarmersFrm6Yr3=($extrapolationFactorYr3*$num1FarmersFrm6Yr3);
								$numFarmersFrm6Yr4=($extrapolationFactorYr4*$num1FarmersFrm6Yr4);
								$numFarmersFrm6Yr5=($extrapolationFactorYr5*$num1FarmersFrm6Yr5);
								$numFarmersFrm6Yr6=($extrapolationFactorYr6*$num1FarmersFrm6Yr6);
								
								$result['actualYr1']=$numFarmersFrm6Yr1;
								$result['actualYr2']=$numFarmersFrm6Yr2;
								$result['actualYr3']=$numFarmersFrm6Yr3;
								$result['actualYr4']=$numFarmersFrm6Yr4;
								$result['actualYr5']=$numFarmersFrm6Yr5;
								$result['actualYr6']=$numFarmersFrm6Yr6;
								return $result[$resultValue];
							}
//End:53 Number of farmers and others who have applied new technologies ...[Producers>>Sex]

//Start:54 Number of farmers and others who have applied new technologies ...[Producers>>Technology type]
function appliedTechnologiesManagementPracticeFarmersTP($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	//Data source not clear
		$result['actualYr1']='';
		$result['actualYr2']='';
		$result['actualYr3']='';
		$result['actualYr4']='';
		$result['actualYr5']='';
		$result['actualYr6']='';
	return $result[$resultValue];
}
//End:54 Number of farmers and others who have applied new technologies ...[Producers>>Technology type]

//Start:55 Number of farmers and others who have applied new technologies ...[Others>>Sex]
function appliedTechnologiesManagementPracticeOthersSex($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	//Data source not clear
		$result['actualYr1']='';
		$result['actualYr2']='';
		$result['actualYr3']='';
		$result['actualYr4']='';
		$result['actualYr5']='';
		$result['actualYr6']='';
	return $result[$resultValue];
}
//End:55 Number of farmers and others who have applied new technologies ...[Others>>Sex]

//Start:56 Number of farmers and others who have applied new technologies ...[Others>>Technology type]
function appliedTechnologiesManagementPracticeOthersTP($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							
								//=====================form2==============
								$x2="SELECT 56 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 56=56
								and `t`.`nameOfImprovedTech`<>''
								and `t`.`nameOfImprovedTech` is not null";
								$query=@Execute($x2) or die(http("DM-467"));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								
								$result['actualYr1']=$numFarmersFrm2Yr1;
								$result['actualYr2']=$numFarmersFrm2Yr2;
								$result['actualYr3']=$numFarmersFrm2Yr3;
								$result['actualYr4']=$numFarmersFrm2Yr4;
								$result['actualYr5']=$numFarmersFrm2Yr5;
								$result['actualYr6']=$numFarmersFrm2Yr6;
								return $result[$resultValue];
							}
//End:56 Number of farmers and others who have applied new technologies ...[Others>>Technology type]


//Start:57 Number of food security private enterprises (for profit)...[Type of organization>>Private enterprises (for profit)]
function numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganizationPE($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2---------------------------
							$x="SELECT 57 as level_two_sub_indicatorId,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `ta`
								where 57 = 57
								and ta.`typeOfBusiness` like '%Private enterprises%'";
								$query=@Execute($x) or die(http("FtFRepLOne-446"));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								//=====================form7==============
								$x2="SELECT 57 as level_two_sub_indicatorId,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
								FROM tbl_villageagent_groups as `v`
								where 57=57
								and `v`.`groupName`<>''
								and `v`.`groupType` like '%Private enterprises%'";
								$query=@Execute($x2) or die(http("FtFRepLOne-467"));
								$result=FetchRecords($query);
								$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
								$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
								$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
								$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
								$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
								$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
								
								
								$result['actualYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
								$result['actualYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
								$result['actualYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
								$result['actualYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
								$result['actualYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
								$result['actualYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
								return $result[$resultValue];
							}
//End:57 Number of food security private enterprises (for profit)...[Type of organization>>Private enterprises (for profit)]

//Start:58 Number of food security private enterprises (for profit)...[Type of organization>>Producers organizations]
function numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganizationPO($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2---------------------------
							$x="SELECT 58 as level_two_sub_indicatorId,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `ta`
								where 58 = 58
								and ta.`typeOfBusiness` like 'producer orgs/groups%'";
								$query=@Execute($x) or die(http("FtFRepLOne-446"));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								//=====================form7==============
								$x2="SELECT 58 as level_two_sub_indicatorId,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
								FROM tbl_villageagent_groups as `v`
								where 58=58
								and `v`.`groupName`<>''
								and `v`.`groupType` like 'producer orgs/groups%'";
								$query=@Execute($x2) or die(http("FtFRepLOne-467"));
								$result=FetchRecords($query);
								$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
								$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
								$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
								$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
								$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
								$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
								
								
								$result['actualYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
								$result['actualYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
								$result['actualYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
								$result['actualYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
								$result['actualYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
								$result['actualYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
								return $result[$resultValue];
							}
//End:58 Number of food security private enterprises (for profit)...[Type of organization>>Producers organizations]

//Start:59 Number of food security private enterprises (for profit)...[Type of organization>>Water users associations]
function numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganizationWA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2---------------------------
							$x="SELECT 59 as level_two_sub_indicatorId,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `ta`
								where 59 = 59
								and ta.`typeOfBusiness` like 'Water users associations%'";
								$query=@Execute($x) or die(http("FtFRepLOne-446"));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								//=====================form7==============
								$x2="SELECT 59 as level_two_sub_indicatorId,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
								FROM tbl_villageagent_groups as `v`
								where 59=59
								and `v`.`groupName`<>''
								and `v`.`groupType` like 'Water users associations%'";
								$query=@Execute($x2) or die(http("FtFRepLOne-467"));
								$result=FetchRecords($query);
								$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
								$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
								$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
								$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
								$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
								$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
								
								
								$result['actualYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
								$result['actualYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
								$result['actualYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
								$result['actualYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
								$result['actualYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
								$result['actualYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
								return $result[$resultValue];
							}
//End:59 Number of food security private enterprises (for profit)...[Type of organization>>Water users associations]

//Start:60 Number of food security private enterprises (for profit)...[Type of organization>>Women's groups]
function numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganizationWG($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2---------------------------
							$x="SELECT 60 as level_two_sub_indicatorId,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `ta`
								where 60 = 60
								and ta.`typeOfBusiness` like 'women\'s groups%'";
								$query=@Execute($x) or die(http("FtFRepLOne-446"));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								//=====================form7==============
								$x2="SELECT 60 as level_two_sub_indicatorId,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
								FROM tbl_villageagent_groups as `v`
								where 60=60
								and `v`.`groupName`<>''
								and `v`.`groupType` like 'women\'s groups%'";
								$query=@Execute($x2) or die(http("FtFRepLOne-467"));
								$result=FetchRecords($query);
								$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
								$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
								$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
								$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
								$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
								$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
								
								
								$result['actualYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
								$result['actualYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
								$result['actualYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
								$result['actualYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
								$result['actualYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
								$result['actualYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
								return $result[$resultValue];
							}
//End:60 Number of food security private enterprises (for profit)...[Type of organization>>Women's groups]

//Start:61 Number of food security private enterprises (for profit)...[Type of organization>>Trade and business associations]
function numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganizationTBA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2---------------------------
							$x="SELECT 61 as level_two_sub_indicatorId,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `ta`
								where 61 = 61
								and ta.`typeOfBusiness` like 'trade and business associations%'";
								$query=@Execute($x) or die(http("FtFRepLOne-446"));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								//=====================form7==============
								$x2="SELECT 61 as level_two_sub_indicatorId,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
								FROM tbl_villageagent_groups as `v`
								where 61=61
								and `v`.`groupName`<>''
								and `v`.`groupType` like 'trade and business associations%'";
								$query=@Execute($x2) or die(http("FtFRepLOne-467"));
								$result=FetchRecords($query);
								$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
								$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
								$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
								$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
								$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
								$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
								
								
								$result['actualYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
								$result['actualYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
								$result['actualYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
								$result['actualYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
								$result['actualYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
								$result['actualYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
								return $result[$resultValue];
							}
//End:61 Number of food security private enterprises (for profit)...[Type of organization>>Trade and business associations]

//Start:62 Number of food security private enterprises (for profit)...[Type of organization>>Community-based organizations (CBOs)]
function numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganizationCBO($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2---------------------------
							$x="SELECT 62 as level_two_sub_indicatorId,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `ta`
								where 62 = 62
								and ta.`typeOfBusiness` like 'community-based organizations%'";
								$query=@Execute($x) or die(http("FtFRepLOne-446"));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								//=====================form7==============
								$x2="SELECT 62 as level_two_sub_indicatorId,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
								FROM tbl_villageagent_groups as `v`
								where 62=62
								and `v`.`groupName`<>''
								and `v`.`groupType` like 'community-based organizations%'";
								$query=@Execute($x2) or die(http("FtFRepLOne-467"));
								$result=FetchRecords($query);
								$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
								$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
								$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
								$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
								$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
								$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
								
								
								$result['actualYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
								$result['actualYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
								$result['actualYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
								$result['actualYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
								$result['actualYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
								$result['actualYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
								return $result[$resultValue];
							}
//End:62 Number of food security private enterprises (for profit)...[Type of organization>>Community-based organizations (CBOs)]

//Start:63 Number of food security private enterprises (for profit)...[Type of organization>>Disaggregates Not Available]
function numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganizationDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2---------------------------
							$x="SELECT 63 as level_two_sub_indicatorId,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `ta`
								where 63 = 63
								and ta.`typeOfBusiness` not like 'Private enterprises%'
								and ta.`typeOfBusiness` not like 'producer orgs/groups%'
								and ta.`typeOfBusiness` not like 'Water users associations%'
								and ta.`typeOfBusiness` not like 'women\'s groups%'
								and ta.`typeOfBusiness` not like 'trade and business associations%'
								and ta.`typeOfBusiness` not like 'community-based organizations%'";
								$query=@Execute($x) or die(http("FtFRepLOne-446"));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								//=====================form7==============
								$x2="SELECT 63 as level_two_sub_indicatorId,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
								FROM tbl_villageagent_groups as `v`
								where 63=63
								and `v`.`groupType` like 'Water users associations%'
								and v.`groupType` not like 'Private enterprises%'
								and v.`groupType` not like 'producer orgs/groups%'
								and v.`groupType` not like 'Water users associations%'
								and v.`groupType` not like 'women\'s groups%'
								and v.`groupType` not like 'trade and business associations%'
								and v.`groupType` not like 'community-based organizations%'";
								$query=@Execute($x2) or die(http("FtFRepLOne-467"));
								$result=FetchRecords($query);
								$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
								$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
								$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
								$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
								$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
								$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
								
								
								$result['actualYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
								$result['actualYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
								$result['actualYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
								$result['actualYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
								$result['actualYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
								$result['actualYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
								return $result[$resultValue];
							}
//End:63 Number of food security private enterprises (for profit)...[Type of organization>>Disaggregates Not Available]

//Start:64 Number of food security private enterprises (for profit)...[New/Continuing>>New]
function numFarmersFoodsecurityPrivateEnterprisesNOCNew($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2---------------------------
							$x="SELECT 64 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 64=64
								and durationWithActivity like 'N%'";
								$query=@Execute($x) or die(http("FtFRepLOne-16"));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								//=====================form7==============
								$x2="SELECT 64 as level_two_sub_indicatorId,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
								FROM tbl_villageagent_groups as `v`
								where 64=64
								and `v`.`groupName`<>''
								and groupStatus like 'N%'";
								$query=@Execute($x2) or die(http("FtFRepLOne-467"));
								$result=FetchRecords($query);
								$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
								$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
								$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
								$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
								$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
								$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
								
								
								$result['actualYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
								$result['actualYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
								$result['actualYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
								$result['actualYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
								$result['actualYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
								$result['actualYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
								return $result[$resultValue];
							}
//End:64 Number of food security private enterprises (for profit)...[New/Continuing>>New]

//Start:65 Number of food security private enterprises (for profit)...[New/Continuing>>Continuing]
function numFarmersFoodsecurityPrivateEnterprisesNOCOLD($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2---------------------------
							$x="SELECT 65 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 65=65
								and durationWithActivity like 'O%'";
								$query=@Execute($x) or die(http("FtFRepLOne-16"));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								//=====================form7==============
								$x2="SELECT 65 as level_two_sub_indicatorId,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
								FROM tbl_villageagent_groups as `v`
								where 65=65
								and `v`.`groupName`<>''
								and groupStatus like 'O%'";
								$query=@Execute($x2) or die(http("FtFRepLOne-467"));
								$result=FetchRecords($query);
								$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
								$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
								$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
								$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
								$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
								$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
								
								
								$result['actualYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
								$result['actualYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
								$result['actualYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
								$result['actualYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
								$result['actualYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
								$result['actualYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
								return $result[$resultValue];
							}
//End:65 Number of food security private enterprises (for profit)...[New/Continuing>>Continuing]

//Start:66 Number of food security private enterprises (for profit)...[New/Continuing>>Disaggregates Not Available]
function numFarmersFoodsecurityPrivateEnterprisesNOCDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2---------------------------
							$x="SELECT 66 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 66=66
								and durationWithActivity not like 'N%'
								and durationWithActivity not like 'O%'";
								$query=@Execute($x) or die(http("FtFRepLOne-16"));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								//=====================form7==============
								$x2="SELECT 66 as level_two_sub_indicatorId,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
								FROM tbl_villageagent_groups as `v`
								where 66=66
								and `v`.`groupName`<>''
								and groupStatus not like 'N%'
								and groupStatus not like 'O%'";
								$query=@Execute($x2) or die(http("FtFRepLOne-467"));
								$result=FetchRecords($query);
								$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
								$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
								$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
								$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
								$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
								$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
								
								
								$result['actualYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
								$result['actualYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
								$result['actualYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
								$result['actualYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
								$result['actualYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
								$result['actualYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
								return $result[$resultValue];
							}
//End:66 Number of food security private enterprises (for profit)...[New/Continuing>>Disaggregates Not Available]

//Start:67 Number of members of producer organizations...[Type of organization>>Producer organization]
function numProducerOrgsTO($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7---------------------------
							$x="SELECT 67 as indicator_id,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numGroupsFrm7Yr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numGroupsFrm7Yr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numGroupsFrm7Yr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numGroupsFrm7Yr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numGroupsFrm7Yr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numGroupsFrm7Yr6
								FROM `tbl_villageagent_groups` as `v` join  `tbl_farmers` as `f`
								on (`f`.`tbl_villageagent_groupsId` = `v`.`tbl_villageagent_groupsId`)
								where 67=67
								and `v`.`groupName`<>''
								and `v`.`groupType` like 'producer orgs/groups%'";
								
								$query=@Execute($x) or die(http("FtFRepLOne-3674"));
								$result=FetchRecords($query);
								$numGroupsFrm7Yr1=$result['numGroupsFrm7Yr1'];
								$numGroupsFrm7Yr2=$result['numGroupsFrm7Yr2'];
								$numGroupsFrm7Yr3=$result['numGroupsFrm7Yr3'];
								$numGroupsFrm7Yr4=$result['numGroupsFrm7Yr4'];
								$numGroupsFrm7Yr5=$result['numGroupsFrm7Yr5'];
								$numGroupsFrm7Yr6=$result['numGroupsFrm7Yr6'];
								
								
								$result['actualYr1']=$numGroupsFrm7Yr1;
								$result['actualYr2']=$numGroupsFrm7Yr2;
								$result['actualYr3']=$numGroupsFrm7Yr3;
								$result['actualYr4']=$numGroupsFrm7Yr4;
								$result['actualYr5']=$numGroupsFrm7Yr5;
								$result['actualYr6']=$numGroupsFrm7Yr6;
								return $result[$resultValue];
							}
//End:67 Number of members of producer organizations...[Type of organization>>Producer organization]

//Start:68 Number of members of producer organizations...[Type of organization>>Non-producer-organization CBO]
function numProducerOrgsCBO($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7---------------------------
							$x="SELECT 68 as indicator_id,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numGroupsFrm7Yr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numGroupsFrm7Yr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numGroupsFrm7Yr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numGroupsFrm7Yr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numGroupsFrm7Yr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numGroupsFrm7Yr6
								FROM `tbl_villageagent_groups` as `v` join  `tbl_farmers` as `f`
								on (`f`.`tbl_villageagent_groupsId` = `v`.`tbl_villageagent_groupsId`)
								where 68=68
								and `v`.`groupName`<>''
								and `v`.`groupType` like 'community-based organizations%'";
								
								$query=@Execute($x) or die(http("FtFRepLOne-3710"));
								$result=FetchRecords($query);
								$numGroupsFrm7Yr1=$result['numGroupsFrm7Yr1'];
								$numGroupsFrm7Yr2=$result['numGroupsFrm7Yr2'];
								$numGroupsFrm7Yr3=$result['numGroupsFrm7Yr3'];
								$numGroupsFrm7Yr4=$result['numGroupsFrm7Yr4'];
								$numGroupsFrm7Yr5=$result['numGroupsFrm7Yr5'];
								$numGroupsFrm7Yr6=$result['numGroupsFrm7Yr6'];
								
								
								$result['actualYr1']=$numGroupsFrm7Yr1;
								$result['actualYr2']=$numGroupsFrm7Yr2;
								$result['actualYr3']=$numGroupsFrm7Yr3;
								$result['actualYr4']=$numGroupsFrm7Yr4;
								$result['actualYr5']=$numGroupsFrm7Yr5;
								$result['actualYr6']=$numGroupsFrm7Yr6;
								return $result[$resultValue];
							}
//End:68 Number of members of producer organizations...[Type of organization>>Non-producer-organization CBO]

//Start:69 Number of members of producer organizations...[Type of organization>>Disaggregates Not Available]
function numProducerOrgsDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7---------------------------
							$x="SELECT 69 as indicator_id,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numGroupsFrm7Yr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numGroupsFrm7Yr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numGroupsFrm7Yr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numGroupsFrm7Yr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numGroupsFrm7Yr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numGroupsFrm7Yr6
								FROM `tbl_villageagent_groups` as `v` join  `tbl_farmers` as `f`
								on (`f`.`tbl_villageagent_groupsId` = `v`.`tbl_villageagent_groupsId`)
								where 69=69
								and `v`.`groupName`<>''
								and `v`.`groupType` not like 'community-based organizations%'
								and `v`.`groupType` not like 'producer orgs/groups%'";
								
								$query=@Execute($x) or die(http("FtFRepLOne-3747"));
								$result=FetchRecords($query);
								$numGroupsFrm7Yr1=$result['numGroupsFrm7Yr1'];
								$numGroupsFrm7Yr2=$result['numGroupsFrm7Yr2'];
								$numGroupsFrm7Yr3=$result['numGroupsFrm7Yr3'];
								$numGroupsFrm7Yr4=$result['numGroupsFrm7Yr4'];
								$numGroupsFrm7Yr5=$result['numGroupsFrm7Yr5'];
								$numGroupsFrm7Yr6=$result['numGroupsFrm7Yr6'];
								
								
								$result['actualYr1']=$numGroupsFrm7Yr1;
								$result['actualYr2']=$numGroupsFrm7Yr2;
								$result['actualYr3']=$numGroupsFrm7Yr3;
								$result['actualYr4']=$numGroupsFrm7Yr4;
								$result['actualYr5']=$numGroupsFrm7Yr5;
								$result['actualYr6']=$numGroupsFrm7Yr6;
								return $result[$resultValue];
							}
//End:69 Number of members of producer organizations...[Type of organization>>Disaggregates Not Available]

//Start:70 Number of members of producer organizations...[Sex>>Male]
function numProducerOrgsSexMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7---------------------------
							$x="SELECT 70 as indicator_id,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numGroupsFrm7Yr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numGroupsFrm7Yr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numGroupsFrm7Yr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numGroupsFrm7Yr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numGroupsFrm7Yr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numGroupsFrm7Yr6
								FROM `tbl_farmers` as `f`
								where 70=70
								and `f`.`groupName` <> ''
								and `f`.`groupName` <> 'No Group'
								and `f`.`farmersSex` like 'M%'";
								
								$query=@Execute($x) or die(http("FtFRepLOne-3783"));
								$result=FetchRecords($query);
								$numGroupsFrm7Yr1=$result['numGroupsFrm7Yr1'];
								$numGroupsFrm7Yr2=$result['numGroupsFrm7Yr2'];
								$numGroupsFrm7Yr3=$result['numGroupsFrm7Yr3'];
								$numGroupsFrm7Yr4=$result['numGroupsFrm7Yr4'];
								$numGroupsFrm7Yr5=$result['numGroupsFrm7Yr5'];
								$numGroupsFrm7Yr6=$result['numGroupsFrm7Yr6'];
								
								
								$result['actualYr1']=$numGroupsFrm7Yr1;
								$result['actualYr2']=$numGroupsFrm7Yr2;
								$result['actualYr3']=$numGroupsFrm7Yr3;
								$result['actualYr4']=$numGroupsFrm7Yr4;
								$result['actualYr5']=$numGroupsFrm7Yr5;
								$result['actualYr6']=$numGroupsFrm7Yr6;
								return $result[$resultValue];
							}
//End:70 Number of members of producer organizations...[Type of organization>>Producer organization]

//Start:71 Number of members of producer organizations...[Sex>>Female]
function numProducerOrgsSexFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7---------------------------
							$x="SELECT 71 as indicator_id,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numGroupsFrm7Yr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numGroupsFrm7Yr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numGroupsFrm7Yr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numGroupsFrm7Yr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numGroupsFrm7Yr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numGroupsFrm7Yr6
								FROM `tbl_farmers` as `f`
								where 71=71
								and `f`.`groupName` <> ''
								and `f`.`groupName` <> 'No Group'
								and `f`.`farmersSex` like 'F%'";
								
								$query=@Execute($x) or die(http("FtFRepLOne-3819"));
								$result=FetchRecords($query);
								$numGroupsFrm7Yr1=$result['numGroupsFrm7Yr1'];
								$numGroupsFrm7Yr2=$result['numGroupsFrm7Yr2'];
								$numGroupsFrm7Yr3=$result['numGroupsFrm7Yr3'];
								$numGroupsFrm7Yr4=$result['numGroupsFrm7Yr4'];
								$numGroupsFrm7Yr5=$result['numGroupsFrm7Yr5'];
								$numGroupsFrm7Yr6=$result['numGroupsFrm7Yr6'];
								
								
								$result['actualYr1']=$numGroupsFrm7Yr1;
								$result['actualYr2']=$numGroupsFrm7Yr2;
								$result['actualYr3']=$numGroupsFrm7Yr3;
								$result['actualYr4']=$numGroupsFrm7Yr4;
								$result['actualYr5']=$numGroupsFrm7Yr5;
								$result['actualYr6']=$numGroupsFrm7Yr6;
								return $result[$resultValue];
							}
//End:71 Number of members of producer organizations...[Sex>>Female]

//Start:72 Number of members of producer organizations...[Sex>>Disaggregates Not Available]
function numProducerOrgsSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7---------------------------
							$x="SELECT 72 as indicator_id,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numGroupsFrm7Yr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numGroupsFrm7Yr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numGroupsFrm7Yr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numGroupsFrm7Yr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numGroupsFrm7Yr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numGroupsFrm7Yr6
								FROM `tbl_villageagent_groups` as `v` join  `tbl_farmers` as `f`
								on (`f`.`tbl_villageagent_groupsId` = `v`.`tbl_villageagent_groupsId`)
								where 72=72
								and `f`.`groupName` <> ''
								and `f`.`groupName` <> 'No Group'
								and `f`.`farmersSex` not like 'M%'
								and `f`.`farmersSex` not like 'F%'";
								
								$query=@Execute($x) or die(http("FtFRepLOne-3857"));
								$result=FetchRecords($query);
								$numGroupsFrm7Yr1=$result['numGroupsFrm7Yr1'];
								$numGroupsFrm7Yr2=$result['numGroupsFrm7Yr2'];
								$numGroupsFrm7Yr3=$result['numGroupsFrm7Yr3'];
								$numGroupsFrm7Yr4=$result['numGroupsFrm7Yr4'];
								$numGroupsFrm7Yr5=$result['numGroupsFrm7Yr5'];
								$numGroupsFrm7Yr6=$result['numGroupsFrm7Yr6'];
								
								
								$result['actualYr1']=$numGroupsFrm7Yr1;
								$result['actualYr2']=$numGroupsFrm7Yr2;
								$result['actualYr3']=$numGroupsFrm7Yr3;
								$result['actualYr4']=$numGroupsFrm7Yr4;
								$result['actualYr5']=$numGroupsFrm7Yr5;
								$result['actualYr6']=$numGroupsFrm7Yr6;
								return $result[$resultValue];
							}
//End:72 Number of members of producer organizations...[Sex>>Disaggregates Not Available]

//Start:73 Number of private enterprises (for profit), producer orgs,...[Type of organization>>	Private enterprises (for profit)]
function numPrivateEnterprisesAppleiedTechnologyTypePE($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//=====================form2 techadoption==============
								$x2="SELECT 73 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 73=73
								and t.`typeOfBusiness` like '%Private enterprises%'";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$numEnterprisesFrm2Yr1=$result['numEnterprisesFrm2Yr1'];
								$numEnterprisesFrm2Yr2=$result['numEnterprisesFrm2Yr2'];
								$numEnterprisesFrm2Yr3=$result['numEnterprisesFrm2Yr3'];
								$numEnterprisesFrm2Yr4=$result['numEnterprisesFrm2Yr4'];
								$numEnterprisesFrm2Yr5=$result['numEnterprisesFrm2Yr5'];
								$numEnterprisesFrm2Yr6=$result['numEnterprisesFrm2Yr6'];
								
								$result['actualYr1']=$numEnterprisesFrm2Yr1;
								$result['actualYr2']=$numEnterprisesFrm2Yr2;
								$result['actualYr3']=$numEnterprisesFrm2Yr3;
								$result['actualYr4']=$numEnterprisesFrm2Yr4;
								$result['actualYr5']=$numEnterprisesFrm2Yr5;
								$result['actualYr6']=$numEnterprisesFrm2Yr6;
								return $result[$resultValue];
							}
//End:73 Number of private enterprises (for profit), producer orgs,...[Type of organization>>Private enterprises (for profit)]

//Start:74 Number of private enterprises (for profit), producer orgs,...[Type of organization>>Producers organizations]
function numPrivateEnterprisesAppleiedTechnologyTypePO($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//=====================form2 techadoption==============
								$x2="SELECT 74 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 74=74
								and t.`typeOfBusiness` like 'producer orgs/groups%'";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$numEnterprisesFrm2Yr1=$result['numEnterprisesFrm2Yr1'];
								$numEnterprisesFrm2Yr2=$result['numEnterprisesFrm2Yr2'];
								$numEnterprisesFrm2Yr3=$result['numEnterprisesFrm2Yr3'];
								$numEnterprisesFrm2Yr4=$result['numEnterprisesFrm2Yr4'];
								$numEnterprisesFrm2Yr5=$result['numEnterprisesFrm2Yr5'];
								$numEnterprisesFrm2Yr6=$result['numEnterprisesFrm2Yr6'];
								
								$result['actualYr1']=$numEnterprisesFrm2Yr1;
								$result['actualYr2']=$numEnterprisesFrm2Yr2;
								$result['actualYr3']=$numEnterprisesFrm2Yr3;
								$result['actualYr4']=$numEnterprisesFrm2Yr4;
								$result['actualYr5']=$numEnterprisesFrm2Yr5;
								$result['actualYr6']=$numEnterprisesFrm2Yr6;
								return $result[$resultValue];
							}
//End:74 Number of private enterprises (for profit), producer orgs,...[Type of organization>>Producers organizations]

//Start:75 Number of private enterprises (for profit), producer orgs,...[Type of organization>>Water users associations]
function numPrivateEnterprisesAppleiedTechnologyTypeWA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//=====================form2 techadoption==============
								$x2="SELECT 75 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 75=75
								and t.`typeOfBusiness` like 'Water users associations%'";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$numEnterprisesFrm2Yr1=$result['numEnterprisesFrm2Yr1'];
								$numEnterprisesFrm2Yr2=$result['numEnterprisesFrm2Yr2'];
								$numEnterprisesFrm2Yr3=$result['numEnterprisesFrm2Yr3'];
								$numEnterprisesFrm2Yr4=$result['numEnterprisesFrm2Yr4'];
								$numEnterprisesFrm2Yr5=$result['numEnterprisesFrm2Yr5'];
								$numEnterprisesFrm2Yr6=$result['numEnterprisesFrm2Yr6'];
								
								$result['actualYr1']=$numEnterprisesFrm2Yr1;
								$result['actualYr2']=$numEnterprisesFrm2Yr2;
								$result['actualYr3']=$numEnterprisesFrm2Yr3;
								$result['actualYr4']=$numEnterprisesFrm2Yr4;
								$result['actualYr5']=$numEnterprisesFrm2Yr5;
								$result['actualYr6']=$numEnterprisesFrm2Yr6;
								return $result[$resultValue];
							}
//End:75 Number of private enterprises (for profit), producer orgs,...[Type of organization>>Water users associations]

//Start:76 Number of private enterprises (for profit), producer orgs,...[Type of organization>>Women's groups]
function numPrivateEnterprisesAppleiedTechnologyTypeWG($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//=====================form2 techadoption==============
								$x2="SELECT 75 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 75=75
								and t.`typeOfBusiness` like 'women\'s groups%'";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$numEnterprisesFrm2Yr1=$result['numEnterprisesFrm2Yr1'];
								$numEnterprisesFrm2Yr2=$result['numEnterprisesFrm2Yr2'];
								$numEnterprisesFrm2Yr3=$result['numEnterprisesFrm2Yr3'];
								$numEnterprisesFrm2Yr4=$result['numEnterprisesFrm2Yr4'];
								$numEnterprisesFrm2Yr5=$result['numEnterprisesFrm2Yr5'];
								$numEnterprisesFrm2Yr6=$result['numEnterprisesFrm2Yr6'];
								
								$result['actualYr1']=$numEnterprisesFrm2Yr1;
								$result['actualYr2']=$numEnterprisesFrm2Yr2;
								$result['actualYr3']=$numEnterprisesFrm2Yr3;
								$result['actualYr4']=$numEnterprisesFrm2Yr4;
								$result['actualYr5']=$numEnterprisesFrm2Yr5;
								$result['actualYr6']=$numEnterprisesFrm2Yr6;
								return $result[$resultValue];
							}
//End:76 Number of private enterprises (for profit), producer orgs,...[Type of organization>>Women's groups]

//Start:77 Number of private enterprises (for profit), producer orgs,...[Type of organization>>Trade and business associations]
function numPrivateEnterprisesAppleiedTechnologyTypeTBA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//=====================form2 techadoption==============
								$x2="SELECT 75 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 75=75
								and t.`typeOfBusiness` like 'trade and business associations%'";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$numEnterprisesFrm2Yr1=$result['numEnterprisesFrm2Yr1'];
								$numEnterprisesFrm2Yr2=$result['numEnterprisesFrm2Yr2'];
								$numEnterprisesFrm2Yr3=$result['numEnterprisesFrm2Yr3'];
								$numEnterprisesFrm2Yr4=$result['numEnterprisesFrm2Yr4'];
								$numEnterprisesFrm2Yr5=$result['numEnterprisesFrm2Yr5'];
								$numEnterprisesFrm2Yr6=$result['numEnterprisesFrm2Yr6'];
								
								$result['actualYr1']=$numEnterprisesFrm2Yr1;
								$result['actualYr2']=$numEnterprisesFrm2Yr2;
								$result['actualYr3']=$numEnterprisesFrm2Yr3;
								$result['actualYr4']=$numEnterprisesFrm2Yr4;
								$result['actualYr5']=$numEnterprisesFrm2Yr5;
								$result['actualYr6']=$numEnterprisesFrm2Yr6;
								return $result[$resultValue];
							}
//End:77 Number of private enterprises (for profit), producer orgs,...[Type of organization>>Trade and business associations]

//Start:78 Number of private enterprises (for profit), producer orgs,...[Type of organization>>	Community-based organizations (CBOs)]
function numPrivateEnterprisesAppleiedTechnologyTypeCBO($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//=====================form2 techadoption==============
								$x2="SELECT 75 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 75=75
								and t.`typeOfBusiness` like 'community-based organizations%'";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$numEnterprisesFrm2Yr1=$result['numEnterprisesFrm2Yr1'];
								$numEnterprisesFrm2Yr2=$result['numEnterprisesFrm2Yr2'];
								$numEnterprisesFrm2Yr3=$result['numEnterprisesFrm2Yr3'];
								$numEnterprisesFrm2Yr4=$result['numEnterprisesFrm2Yr4'];
								$numEnterprisesFrm2Yr5=$result['numEnterprisesFrm2Yr5'];
								$numEnterprisesFrm2Yr6=$result['numEnterprisesFrm2Yr6'];
								
								$result['actualYr1']=$numEnterprisesFrm2Yr1;
								$result['actualYr2']=$numEnterprisesFrm2Yr2;
								$result['actualYr3']=$numEnterprisesFrm2Yr3;
								$result['actualYr4']=$numEnterprisesFrm2Yr4;
								$result['actualYr5']=$numEnterprisesFrm2Yr5;
								$result['actualYr6']=$numEnterprisesFrm2Yr6;
								return $result[$resultValue];
							}
//End:78 Number of private enterprises (for profit), producer orgs,...[Type of organization>>	Community-based organizations (CBOs)]

//Start:79 Number of private enterprises (for profit), producer orgs,...[Type of organization>>Disaggregates Not Available]
function numPrivateEnterprisesAppleiedTechnologyTypeDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//=====================form2 techadoption==============
								$x2="SELECT 75 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 75=75
								and t.`typeOfBusiness` not like 'Private enterprises%'
								and t.`typeOfBusiness` not like 'producer orgs/groups%'
								and t.`typeOfBusiness` not like 'Water users associations%'
								and t.`typeOfBusiness` not like 'women\'s groups%'
								and t.`typeOfBusiness` not like 'trade and business associations%'
								and t.`typeOfBusiness` not like 'community-based organizations%'";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$numEnterprisesFrm2Yr1=$result['numEnterprisesFrm2Yr1'];
								$numEnterprisesFrm2Yr2=$result['numEnterprisesFrm2Yr2'];
								$numEnterprisesFrm2Yr3=$result['numEnterprisesFrm2Yr3'];
								$numEnterprisesFrm2Yr4=$result['numEnterprisesFrm2Yr4'];
								$numEnterprisesFrm2Yr5=$result['numEnterprisesFrm2Yr5'];
								$numEnterprisesFrm2Yr6=$result['numEnterprisesFrm2Yr6'];
								
								$result['actualYr1']=$numEnterprisesFrm2Yr1;
								$result['actualYr2']=$numEnterprisesFrm2Yr2;
								$result['actualYr3']=$numEnterprisesFrm2Yr3;
								$result['actualYr4']=$numEnterprisesFrm2Yr4;
								$result['actualYr5']=$numEnterprisesFrm2Yr5;
								$result['actualYr6']=$numEnterprisesFrm2Yr6;
								return $result[$resultValue];
							}
//End:79 Number of private enterprises (for profit), producer orgs,...[Type of organization>>Disaggregates Not Available]

//Start:80 Number of private enterprises (for profit), producer orgs,...[New/Continuing>>New]
function numPrivateEnterprisesAppleiedTechnologyNOCNEW($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//=====================form2 techadoption==============
								$x2="SELECT 80 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 80=80
								and `t`.`durationWithActivity` <> ''
								and `t`.`durationWithActivity` like 'N%'";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$numEnterprisesFrm2Yr1=$result['numEnterprisesFrm2Yr1'];
								$numEnterprisesFrm2Yr2=$result['numEnterprisesFrm2Yr2'];
								$numEnterprisesFrm2Yr3=$result['numEnterprisesFrm2Yr3'];
								$numEnterprisesFrm2Yr4=$result['numEnterprisesFrm2Yr4'];
								$numEnterprisesFrm2Yr5=$result['numEnterprisesFrm2Yr5'];
								$numEnterprisesFrm2Yr6=$result['numEnterprisesFrm2Yr6'];
								
								$result['actualYr1']=$numEnterprisesFrm2Yr1;
								$result['actualYr2']=$numEnterprisesFrm2Yr2;
								$result['actualYr3']=$numEnterprisesFrm2Yr3;
								$result['actualYr4']=$numEnterprisesFrm2Yr4;
								$result['actualYr5']=$numEnterprisesFrm2Yr5;
								$result['actualYr6']=$numEnterprisesFrm2Yr6;
								return $result[$resultValue];
							}
//End:80 Number of private enterprises (for profit), producer orgs,...[New/Continuing>>New]

//Start:81 Number of private enterprises (for profit), producer orgs,...[New/Continuing>>Continuing]
function numPrivateEnterprisesAppleiedTechnologyNOCOLD($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//=====================form2 techadoption==============
								$x2="SELECT 81 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 81=81
								and `t`.`durationWithActivity` <> ''
								and `t`.`durationWithActivity` like 'O%'";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$numEnterprisesFrm2Yr1=$result['numEnterprisesFrm2Yr1'];
								$numEnterprisesFrm2Yr2=$result['numEnterprisesFrm2Yr2'];
								$numEnterprisesFrm2Yr3=$result['numEnterprisesFrm2Yr3'];
								$numEnterprisesFrm2Yr4=$result['numEnterprisesFrm2Yr4'];
								$numEnterprisesFrm2Yr5=$result['numEnterprisesFrm2Yr5'];
								$numEnterprisesFrm2Yr6=$result['numEnterprisesFrm2Yr6'];
								
								$result['actualYr1']=$numEnterprisesFrm2Yr1;
								$result['actualYr2']=$numEnterprisesFrm2Yr2;
								$result['actualYr3']=$numEnterprisesFrm2Yr3;
								$result['actualYr4']=$numEnterprisesFrm2Yr4;
								$result['actualYr5']=$numEnterprisesFrm2Yr5;
								$result['actualYr6']=$numEnterprisesFrm2Yr6;
								return $result[$resultValue];
							}
//End:81 Number of private enterprises (for profit), producer orgs,...[New/Continuing>>Continuing]

//Start:82 Number of private enterprises (for profit), producer orgs,...[New/Continuing>>Disaggregates Not Available]
function numPrivateEnterprisesAppleiedTechnologyNOCDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//=====================form2 techadoption==============
								$x2="SELECT 81 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 81=81
								and `t`.`durationWithActivity` <> ''
								and `t`.`durationWithActivity`not like 'O%'
								and `t`.`durationWithActivity`not like 'N%'";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$numEnterprisesFrm2Yr1=$result['numEnterprisesFrm2Yr1'];
								$numEnterprisesFrm2Yr2=$result['numEnterprisesFrm2Yr2'];
								$numEnterprisesFrm2Yr3=$result['numEnterprisesFrm2Yr3'];
								$numEnterprisesFrm2Yr4=$result['numEnterprisesFrm2Yr4'];
								$numEnterprisesFrm2Yr5=$result['numEnterprisesFrm2Yr5'];
								$numEnterprisesFrm2Yr6=$result['numEnterprisesFrm2Yr6'];
								
								$result['actualYr1']=$numEnterprisesFrm2Yr1;
								$result['actualYr2']=$numEnterprisesFrm2Yr2;
								$result['actualYr3']=$numEnterprisesFrm2Yr3;
								$result['actualYr4']=$numEnterprisesFrm2Yr4;
								$result['actualYr5']=$numEnterprisesFrm2Yr5;
								$result['actualYr6']=$numEnterprisesFrm2Yr6;
								return $result[$resultValue];
							}
//End:82 Number of private enterprises (for profit), producer orgs,...[New/Continuing>>Disaggregates Not Available]


//Start:83 	Number of hectares under improved technologies or...[Technology type>>crop genetics]
function hectaresTechnologiesManagementPracticeTechCG($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							//Data source not clear
								$numAcres1Frm6Yr1='';
								$numAcres1Frm6Yr2='';
								$numAcres1Frm6Yr3='';
								$numAcres1Frm6Yr4='';
								$numAcres1Frm6Yr5='';
								$numAcres1Frm6Yr6='';

								$st=ExtrapolationFactor(83);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								//Data source not clear
								$numAcresFrm8Yr1='';
								$numAcresFrm8Yr2='';
								$numAcresFrm8Yr3='';
								$numAcresFrm8Yr4='';
								$numAcresFrm8Yr5='';
								$numAcresFrm8Yr6='';
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:83 	Number of hectares under improved technologies or...[Technology type>>crop genetics]

//Start:84 	Number of hectares under improved technologies or...[Technology type>>cultural practices]
function hectaresTechnologiesManagementPracticeTechCP($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							//Data source not clear
								$numAcres1Frm6Yr1='';
								$numAcres1Frm6Yr2='';
								$numAcres1Frm6Yr3='';
								$numAcres1Frm6Yr4='';
								$numAcres1Frm6Yr5='';
								$numAcres1Frm6Yr6='';

								$st=ExtrapolationFactor(84);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								//Data source not clear
								$numAcresFrm8Yr1='';
								$numAcresFrm8Yr2='';
								$numAcresFrm8Yr3='';
								$numAcresFrm8Yr4='';
								$numAcresFrm8Yr5='';
								$numAcresFrm8Yr6='';
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:84 	Number of hectares under improved technologies or...[Technology type>>cultural practices]

//Start:85 	Number of hectares under improved technologies or...[Technology type>>pest management]
function hectaresTechnologiesManagementPracticeTechPM($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							//Data source not clear
								$numAcres1Frm6Yr1='';
								$numAcres1Frm6Yr2='';
								$numAcres1Frm6Yr3='';
								$numAcres1Frm6Yr4='';
								$numAcres1Frm6Yr5='';
								$numAcres1Frm6Yr6='';

								$st=ExtrapolationFactor(85);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								//Data source not clear
								$numAcresFrm8Yr1='';
								$numAcresFrm8Yr2='';
								$numAcresFrm8Yr3='';
								$numAcresFrm8Yr4='';
								$numAcresFrm8Yr5='';
								$numAcresFrm8Yr6='';
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:85 	Number of hectares under improved technologies or...[Technology type>>pest management]

//Start:86 	Number of hectares under improved technologies or...[Technology type>>disease management]
function hectaresTechnologiesManagementPracticeTechDM($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							//Data source not clear
								$numAcres1Frm6Yr1='';
								$numAcres1Frm6Yr2='';
								$numAcres1Frm6Yr3='';
								$numAcres1Frm6Yr4='';
								$numAcres1Frm6Yr5='';
								$numAcres1Frm6Yr6='';

								$st=ExtrapolationFactor(86);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								//Data source not clear
								$numAcresFrm8Yr1='';
								$numAcresFrm8Yr2='';
								$numAcresFrm8Yr3='';
								$numAcresFrm8Yr4='';
								$numAcresFrm8Yr5='';
								$numAcresFrm8Yr6='';
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:86 	Number of hectares under improved technologies or...[Technology type>>disease management]

//Start:87 	Number of hectares under improved technologies or...[Technology type>>soil-related fertility and conservation]
function hectaresTechnologiesManagementPracticeTechSF($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							//Data source not clear
								$numAcres1Frm6Yr1='';
								$numAcres1Frm6Yr2='';
								$numAcres1Frm6Yr3='';
								$numAcres1Frm6Yr4='';
								$numAcres1Frm6Yr5='';
								$numAcres1Frm6Yr6='';

								$st=ExtrapolationFactor(87);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								//Data source not clear
								$numAcresFrm8Yr1='';
								$numAcresFrm8Yr2='';
								$numAcresFrm8Yr3='';
								$numAcresFrm8Yr4='';
								$numAcresFrm8Yr5='';
								$numAcresFrm8Yr6='';
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:87	Number of hectares under improved technologies or...[Technology type>>soil-related fertility and conservation]

//Start:88 	Number of hectares under improved technologies or...[Technology type>>irrigation]
function hectaresTechnologiesManagementPracticeTechIRR($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							//Data source not clear
								$numAcres1Frm6Yr1='';
								$numAcres1Frm6Yr2='';
								$numAcres1Frm6Yr3='';
								$numAcres1Frm6Yr4='';
								$numAcres1Frm6Yr5='';
								$numAcres1Frm6Yr6='';

								$st=ExtrapolationFactor(88);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								//Data source not clear
								$numAcresFrm8Yr1='';
								$numAcresFrm8Yr2='';
								$numAcresFrm8Yr3='';
								$numAcresFrm8Yr4='';
								$numAcresFrm8Yr5='';
								$numAcresFrm8Yr6='';
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:88 	Number of hectares under improved technologies or...[Technology type>>irrigation]

//Start:89 	Number of hectares under improved technologies or...[Technology type>>water management (non-irrigation)]
function hectaresTechnologiesManagementPracticeTechWM($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							//Data source not clear
								$numAcres1Frm6Yr1='';
								$numAcres1Frm6Yr2='';
								$numAcres1Frm6Yr3='';
								$numAcres1Frm6Yr4='';
								$numAcres1Frm6Yr5='';
								$numAcres1Frm6Yr6='';

								$st=ExtrapolationFactor(89);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								//Data source not clear
								$numAcresFrm8Yr1='';
								$numAcresFrm8Yr2='';
								$numAcresFrm8Yr3='';
								$numAcresFrm8Yr4='';
								$numAcresFrm8Yr5='';
								$numAcresFrm8Yr6='';
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:89 	Number of hectares under improved technologies or...[Technology type>>water management (non-irrigation)]

//Start:90 	Number of hectares under improved technologies or...[Technology type>>climate mitigation or adaptation]
function hectaresTechnologiesManagementPracticeTechCM($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							//Data source not clear
								$numAcres1Frm6Yr1='';
								$numAcres1Frm6Yr2='';
								$numAcres1Frm6Yr3='';
								$numAcres1Frm6Yr4='';
								$numAcres1Frm6Yr5='';
								$numAcres1Frm6Yr6='';

								$st=ExtrapolationFactor(90);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								//Data source not clear
								$numAcresFrm8Yr1='';
								$numAcresFrm8Yr2='';
								$numAcresFrm8Yr3='';
								$numAcresFrm8Yr4='';
								$numAcresFrm8Yr5='';
								$numAcresFrm8Yr6='';
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:90 	Number of hectares under improved technologies or...[Technology type>>climate mitigation or adaptation]

//Start:91 	Number of hectares under improved technologies or...[Technology type>>Other]
function hectaresTechnologiesManagementPracticeTechOther($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							//Data source not clear
								$numAcres1Frm6Yr1='';
								$numAcres1Frm6Yr2='';
								$numAcres1Frm6Yr3='';
								$numAcres1Frm6Yr4='';
								$numAcres1Frm6Yr5='';
								$numAcres1Frm6Yr6='';

								$st=ExtrapolationFactor(91);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								//Data source not clear
								$numAcresFrm8Yr1='';
								$numAcresFrm8Yr2='';
								$numAcresFrm8Yr3='';
								$numAcresFrm8Yr4='';
								$numAcresFrm8Yr5='';
								$numAcresFrm8Yr6='';
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:91 	Number of hectares under improved technologies or...[Technology type>>Other]

//Start:92 	Number of hectares under improved technologies or...[Technology type>>total w/one or more improved technology]
function hectaresTechnologiesManagementPracticeTechTot($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							//Data source not clear
								$numAcres1Frm6Yr1='';
								$numAcres1Frm6Yr2='';
								$numAcres1Frm6Yr3='';
								$numAcres1Frm6Yr4='';
								$numAcres1Frm6Yr5='';
								$numAcres1Frm6Yr6='';

								$st=ExtrapolationFactor(92);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								//Data source not clear
								$numAcresFrm8Yr1='';
								$numAcresFrm8Yr2='';
								$numAcresFrm8Yr3='';
								$numAcresFrm8Yr4='';
								$numAcresFrm8Yr5='';
								$numAcresFrm8Yr6='';
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:92 	Number of hectares under improved technologies or...[Technology type>>total w/one or more improved technology]

//Start:93 	Number of hectares under improved technologies or...[Technology type>>Disaggregates Not Available]
function hectaresTechnologiesManagementPracticeTechDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							$x="SELECT 93 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ))), 0 )
								) AS numAcresFrm6Yr1,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ))), 0 )
								) AS numAcresFrm6Yr2,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ))), 0 )
								) AS numAcresFrm6Yr3,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ))), 0 )
								) AS numAcresFrm6Yr4,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ))), 0 )
								) AS numAcresFrm6Yr5,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ))), 0 )
								) AS numAcresFrm6Yr6

								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 93=93
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numAcres1Frm6Yr1=$result['numAcresFrm6Yr1'];
								$numAcres1Frm6Yr2=$result['numAcresFrm6Yr2'];
								$numAcres1Frm6Yr3=$result['numAcresFrm6Yr3'];
								$numAcres1Frm6Yr4=$result['numAcresFrm6Yr4'];
								$numAcres1Frm6Yr5=$result['numAcresFrm6Yr5'];
								$numAcres1Frm6Yr6=$result['numAcresFrm6Yr6'];

								$st=ExtrapolationFactor(20);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								$x2="SELECT 93 as level_two_sub_indicatorId,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								), 0 ) ) AS numAcresFrm8Yr1,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								), 0 ) ) AS numAcresFrm8Yr2,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								), 0 ) ) AS numAcresFrm8Yr3,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								), 0 ) ) AS numAcresFrm8Yr4,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								), 0 ) ) AS numAcresFrm8Yr5,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								), 0 ) ) AS numAcresFrm8Yr6

								FROM `tbl_demo_book_details` as `d`
								JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` )
								where 93=93";
								$query=@Execute($x2) or die(http("DM-649"));
								$result=FetchRecords($query);
								$numAcresFrm8Yr1=$result['numAcresFrm8Yr1'];
								$numAcresFrm8Yr2=$result['numAcresFrm8Yr2'];
								$numAcresFrm8Yr3=$result['numAcresFrm8Yr3'];
								$numAcresFrm8Yr4=$result['numAcresFrm8Yr4'];
								$numAcresFrm8Yr5=$result['numAcresFrm8Yr5'];
								$numAcresFrm8Yr6=$result['numAcresFrm8Yr6'];
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:93 	Number of hectares under improved technologies or...[Technology type>>Disaggregates Not Available]

//Start:94 	Number of hectares under improved technologies or...[Sex>>Male]
function hectaresTechnologiesManagementPracticeSexMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							$x="SELECT 94 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ))), 0 )
								) AS numAcresFrm6Yr1,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ))), 0 )
								) AS numAcresFrm6Yr2,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ))), 0 )
								) AS numAcresFrm6Yr3,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ))), 0 )
								) AS numAcresFrm6Yr4,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ))), 0 )
								) AS numAcresFrm6Yr5,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ))), 0 )
								) AS numAcresFrm6Yr6

								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 94=94 
								and `f`.`farmersSex` like 'M%'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numAcres1Frm6Yr1=$result['numAcresFrm6Yr1'];
								$numAcres1Frm6Yr2=$result['numAcresFrm6Yr2'];
								$numAcres1Frm6Yr3=$result['numAcresFrm6Yr3'];
								$numAcres1Frm6Yr4=$result['numAcresFrm6Yr4'];
								$numAcres1Frm6Yr5=$result['numAcresFrm6Yr5'];
								$numAcres1Frm6Yr6=$result['numAcresFrm6Yr6'];

								$st=ExtrapolationFactor(20);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								$x2="SELECT 94 as level_two_sub_indicatorId,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								), 0 ) ) AS numAcresFrm8Yr1,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								), 0 ) ) AS numAcresFrm8Yr2,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								), 0 ) ) AS numAcresFrm8Yr3,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								), 0 ) ) AS numAcresFrm8Yr4,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								), 0 ) ) AS numAcresFrm8Yr5,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								), 0 ) ) AS numAcresFrm8Yr6

								FROM `tbl_demo_book_details` as `d`
								JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` )
								where 94=94
								and `dr`.`farmerGender` like 'M%'";
								$query=@Execute($x2) or die(http("DM-649"));
								$result=FetchRecords($query);
								$numAcresFrm8Yr1=$result['numAcresFrm8Yr1'];
								$numAcresFrm8Yr2=$result['numAcresFrm8Yr2'];
								$numAcresFrm8Yr3=$result['numAcresFrm8Yr3'];
								$numAcresFrm8Yr4=$result['numAcresFrm8Yr4'];
								$numAcresFrm8Yr5=$result['numAcresFrm8Yr5'];
								$numAcresFrm8Yr6=$result['numAcresFrm8Yr6'];
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:94	Number of hectares under improved technologies or...[Sex>>Male]

//Start:95 	Number of hectares under improved technologies or...[Sex>>Female]
function hectaresTechnologiesManagementPracticeSexFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							$x="SELECT 95 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ))), 0 )
								) AS numAcresFrm6Yr1,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ))), 0 )
								) AS numAcresFrm6Yr2,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ))), 0 )
								) AS numAcresFrm6Yr3,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ))), 0 )
								) AS numAcresFrm6Yr4,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ))), 0 )
								) AS numAcresFrm6Yr5,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ))), 0 )
								) AS numAcresFrm6Yr6

								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 95=95 
								and `f`.`farmersSex` like 'F%'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numAcres1Frm6Yr1=$result['numAcresFrm6Yr1'];
								$numAcres1Frm6Yr2=$result['numAcresFrm6Yr2'];
								$numAcres1Frm6Yr3=$result['numAcresFrm6Yr3'];
								$numAcres1Frm6Yr4=$result['numAcresFrm6Yr4'];
								$numAcres1Frm6Yr5=$result['numAcresFrm6Yr5'];
								$numAcres1Frm6Yr6=$result['numAcresFrm6Yr6'];

								$st=ExtrapolationFactor(95);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								$x2="SELECT 95 as level_two_sub_indicatorId,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								), 0 ) ) AS numAcresFrm8Yr1,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								), 0 ) ) AS numAcresFrm8Yr2,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								), 0 ) ) AS numAcresFrm8Yr3,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								), 0 ) ) AS numAcresFrm8Yr4,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								), 0 ) ) AS numAcresFrm8Yr5,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								), 0 ) ) AS numAcresFrm8Yr6

								FROM `tbl_demo_book_details` as `d`
								JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` )
								where 95=95
								and `dr`.`farmerGender` like 'F%'";
								$query=@Execute($x2) or die(http("DM-649"));
								$result=FetchRecords($query);
								$numAcresFrm8Yr1=$result['numAcresFrm8Yr1'];
								$numAcresFrm8Yr2=$result['numAcresFrm8Yr2'];
								$numAcresFrm8Yr3=$result['numAcresFrm8Yr3'];
								$numAcresFrm8Yr4=$result['numAcresFrm8Yr4'];
								$numAcresFrm8Yr5=$result['numAcresFrm8Yr5'];
								$numAcresFrm8Yr6=$result['numAcresFrm8Yr6'];
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:95	Number of hectares under improved technologies or...[Sex>>Female]

//Start:96 	Number of hectares under improved technologies or...[Sex>>Joint]
function hectaresTechnologiesManagementPracticeSexJoint($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							$x="SELECT 96 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ))), 0 )
								) AS numAcresFrm6Yr1,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ))), 0 )
								) AS numAcresFrm6Yr2,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ))), 0 )
								) AS numAcresFrm6Yr3,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ))), 0 )
								) AS numAcresFrm6Yr4,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ))), 0 )
								) AS numAcresFrm6Yr5,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ))), 0 )
								) AS numAcresFrm6Yr6

								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 96=96 
								and `f`.`farmersSex` like 'J%'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numAcres1Frm6Yr1=$result['numAcresFrm6Yr1'];
								$numAcres1Frm6Yr2=$result['numAcresFrm6Yr2'];
								$numAcres1Frm6Yr3=$result['numAcresFrm6Yr3'];
								$numAcres1Frm6Yr4=$result['numAcresFrm6Yr4'];
								$numAcres1Frm6Yr5=$result['numAcresFrm6Yr5'];
								$numAcres1Frm6Yr6=$result['numAcresFrm6Yr6'];

								$st=ExtrapolationFactor(96);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								$x2="SELECT 96 as level_two_sub_indicatorId,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								), 0 ) ) AS numAcresFrm8Yr1,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								), 0 ) ) AS numAcresFrm8Yr2,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								), 0 ) ) AS numAcresFrm8Yr3,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								), 0 ) ) AS numAcresFrm8Yr4,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								), 0 ) ) AS numAcresFrm8Yr5,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								), 0 ) ) AS numAcresFrm8Yr6

								FROM `tbl_demo_book_details` as `d`
								JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` )
								where 96=96
								and `dr`.`farmerGender` like 'J%'";
								$query=@Execute($x2) or die(http("DM-649"));
								$result=FetchRecords($query);
								$numAcresFrm8Yr1=$result['numAcresFrm8Yr1'];
								$numAcresFrm8Yr2=$result['numAcresFrm8Yr2'];
								$numAcresFrm8Yr3=$result['numAcresFrm8Yr3'];
								$numAcresFrm8Yr4=$result['numAcresFrm8Yr4'];
								$numAcresFrm8Yr5=$result['numAcresFrm8Yr5'];
								$numAcresFrm8Yr6=$result['numAcresFrm8Yr6'];
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:96	Number of hectares under improved technologies or...[Sex>>Joint]

//Start:97 	Number of hectares under improved technologies or...[Sex>>Association-applied]
function hectaresTechnologiesManagementPracticeSexAA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							$x="SELECT 97 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ))), 0 )
								) AS numAcresFrm6Yr1,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ))), 0 )
								) AS numAcresFrm6Yr2,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ))), 0 )
								) AS numAcresFrm6Yr3,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ))), 0 )
								) AS numAcresFrm6Yr4,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ))), 0 )
								) AS numAcresFrm6Yr5,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ))), 0 )
								) AS numAcresFrm6Yr6

								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 97=97 
								and `f`.`farmersSex` like 'A%'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numAcres1Frm6Yr1=$result['numAcresFrm6Yr1'];
								$numAcres1Frm6Yr2=$result['numAcresFrm6Yr2'];
								$numAcres1Frm6Yr3=$result['numAcresFrm6Yr3'];
								$numAcres1Frm6Yr4=$result['numAcresFrm6Yr4'];
								$numAcres1Frm6Yr5=$result['numAcresFrm6Yr5'];
								$numAcres1Frm6Yr6=$result['numAcresFrm6Yr6'];

								$st=ExtrapolationFactor(97);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								$x2="SELECT 97 as level_two_sub_indicatorId,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								), 0 ) ) AS numAcresFrm8Yr1,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								), 0 ) ) AS numAcresFrm8Yr2,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								), 0 ) ) AS numAcresFrm8Yr3,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								), 0 ) ) AS numAcresFrm8Yr4,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								), 0 ) ) AS numAcresFrm8Yr5,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								), 0 ) ) AS numAcresFrm8Yr6

								FROM `tbl_demo_book_details` as `d`
								JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` )
								where 97=97
								and `dr`.`farmerGender` like 'A%'";
								$query=@Execute($x2) or die(http("DM-649"));
								$result=FetchRecords($query);
								$numAcresFrm8Yr1=$result['numAcresFrm8Yr1'];
								$numAcresFrm8Yr2=$result['numAcresFrm8Yr2'];
								$numAcresFrm8Yr3=$result['numAcresFrm8Yr3'];
								$numAcresFrm8Yr4=$result['numAcresFrm8Yr4'];
								$numAcresFrm8Yr5=$result['numAcresFrm8Yr5'];
								$numAcresFrm8Yr6=$result['numAcresFrm8Yr6'];
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:97	Number of hectares under improved technologies or...[Sex>>Association-applied]

//Start:98 	Number of hectares under improved technologies or...[Sex>>Disaggregates Not Available]
function hectaresTechnologiesManagementPracticeSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							$x="SELECT 98 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ))), 0 )
								) AS numAcresFrm6Yr1,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ))), 0 )
								) AS numAcresFrm6Yr2,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ))), 0 )
								) AS numAcresFrm6Yr3,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ))), 0 )
								) AS numAcresFrm6Yr4,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ))), 0 )
								) AS numAcresFrm6Yr5,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ))), 0 )
								) AS numAcresFrm6Yr6

								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 98=98 
								and `f`.`farmersSex` not like 'M%'
								and `f`.`farmersSex` not like 'F%'
								and `f`.`farmersSex` not like 'J%'
								and `f`.`farmersSex` not like 'A%'
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numAcres1Frm6Yr1=$result['numAcresFrm6Yr1'];
								$numAcres1Frm6Yr2=$result['numAcresFrm6Yr2'];
								$numAcres1Frm6Yr3=$result['numAcresFrm6Yr3'];
								$numAcres1Frm6Yr4=$result['numAcresFrm6Yr4'];
								$numAcres1Frm6Yr5=$result['numAcresFrm6Yr5'];
								$numAcres1Frm6Yr6=$result['numAcresFrm6Yr6'];

								$st=ExtrapolationFactor(98);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								//applying the extrapolation factor
								$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
								$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
								$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
								$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
								$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
								$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
								
								//=====================form 8(demo book)==============
								$x2="SELECT 98 as level_two_sub_indicatorId,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								), 0 ) ) AS numAcresFrm8Yr1,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								), 0 ) ) AS numAcresFrm8Yr2,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								), 0 ) ) AS numAcresFrm8Yr3,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								), 0 ) ) AS numAcresFrm8Yr4,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								), 0 ) ) AS numAcresFrm8Yr5,

								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."',
								(
								(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								), 0 ) ) AS numAcresFrm8Yr6

								FROM `tbl_demo_book_details` as `d`
								JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` )
								where 98=98
								and `dr`.`farmerGender` not like 'M%'
								and `dr`.`farmerGender` not like 'F%'
								and `dr`.`farmerGender` not like 'J%'
								and `dr`.`farmerGender` not like 'A%'";
								$query=@Execute($x2) or die(http("DM-649"));
								$result=FetchRecords($query);
								$numAcresFrm8Yr1=$result['numAcresFrm8Yr1'];
								$numAcresFrm8Yr2=$result['numAcresFrm8Yr2'];
								$numAcresFrm8Yr3=$result['numAcresFrm8Yr3'];
								$numAcresFrm8Yr4=$result['numAcresFrm8Yr4'];
								$numAcresFrm8Yr5=$result['numAcresFrm8Yr5'];
								$numAcresFrm8Yr6=$result['numAcresFrm8Yr6'];
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:98	Number of hectares under improved technologies or...[Sex>>Disaggregates Not Available]

//Start:99 Number of rural households benefiting directly...[New/Continuing>>New]
function ruralHouseholdsBenefitingNOCNew($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7 NULL---------------------------
							
								
								//=====================Household NOT NULL==============
								$x2="SELECT 99 as level_two_sub_indicatorId,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numNotNullHHYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numNotNullHHYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numNotNullHHYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numNotNullHHYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numNotNullHHYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numNotNullHHYr6
								FROM `tbl_farmers` as `f` join tbl_villageagent_groups as `v`
								on(`v`.`tbl_villageagent_groupsId`=`f`.`tbl_villageagent_groupsId`)	
								where 99=99
								&& `v`.`groupName`<>''
								&& `v`.`groupStatus` like 'N%'";
								$query=@Execute($x2) or die(http("DM-662"));
								$result=FetchRecords($query);
								$numNotNullHHYr1=$result['numNotNullHHYr1'];
								$numNotNullHHYr2=$result['numNotNullHHYr2'];
								$numNotNullHHYr3=$result['numNotNullHHYr3'];
								$numNotNullHHYr4=$result['numNotNullHHYr4'];
								$numNotNullHHYr5=$result['numNotNullHHYr5'];
								$numNotNullHHYr6=$result['numNotNullHHYr6'];
								
								
								$result['actualYr1']=$numNotNullHHYr1;
								$result['actualYr2']=$numNotNullHHYr2;
								$result['actualYr3']=$numNotNullHHYr3;
								$result['actualYr4']=$numNotNullHHYr4;
								$result['actualYr5']=$numNotNullHHYr5;
								$result['actualYr6']=$numNotNullHHYr6;
								return $result[$resultValue];
							}
//End:99 Number of rural households benefiting directly...[New/Continuing>>New]

//Start:100 Number of rural households benefiting directly...[New/Continuing>>Continuing]
function ruralHouseholdsBenefitingNOCOld($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7 NULL---------------------------
							
								
								//=====================Household NOT NULL==============
								$x2="SELECT 100 as level_two_sub_indicatorId,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numNotNullHHYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numNotNullHHYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numNotNullHHYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numNotNullHHYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numNotNullHHYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numNotNullHHYr6
								FROM `tbl_farmers` as `f` join tbl_villageagent_groups as `v`
								on(`v`.`tbl_villageagent_groupsId`=`f`.`tbl_villageagent_groupsId`)	
								where 100=100
								&& `v`.`groupName`<>''
								&& `v`.`groupStatus` like 'O%'";
								$query=@Execute($x2) or die(http("DM-662"));
								$result=FetchRecords($query);
								$numNotNullHHYr1=$result['numNotNullHHYr1'];
								$numNotNullHHYr2=$result['numNotNullHHYr2'];
								$numNotNullHHYr3=$result['numNotNullHHYr3'];
								$numNotNullHHYr4=$result['numNotNullHHYr4'];
								$numNotNullHHYr5=$result['numNotNullHHYr5'];
								$numNotNullHHYr6=$result['numNotNullHHYr6'];
								
								
								$result['actualYr1']=$numNotNullHHYr1;
								$result['actualYr2']=$numNotNullHHYr2;
								$result['actualYr3']=$numNotNullHHYr3;
								$result['actualYr4']=$numNotNullHHYr4;
								$result['actualYr5']=$numNotNullHHYr5;
								$result['actualYr6']=$numNotNullHHYr6;
								return $result[$resultValue];
							}
//End:100 Number of rural households benefiting directly...[New/Continuing>>Continuing]

//Start:101 Number of rural households benefiting directly...[New/Continuing>>Disaggregates Not Available]
function ruralHouseholdsBenefitingNOCDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7 NULL---------------------------
							
								
								//=====================Household NOT NULL==============
								$x2="SELECT 99 as level_two_sub_indicatorId,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numNotNullHHYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numNotNullHHYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numNotNullHHYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numNotNullHHYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numNotNullHHYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numNotNullHHYr6
								FROM `tbl_farmers` as `f` join tbl_villageagent_groups as `v`
								on(`v`.`tbl_villageagent_groupsId`=`f`.`tbl_villageagent_groupsId`)	
								where 99=99
								&& `v`.`groupName`<>''
								&& `v`.`groupStatus` not like 'N%'
								&& `v`.`groupStatus` not like 'O%'";
								$query=@Execute($x2) or die(http("DM-662"));
								$result=FetchRecords($query);
								$numNotNullHHYr1=$result['numNotNullHHYr1'];
								$numNotNullHHYr2=$result['numNotNullHHYr2'];
								$numNotNullHHYr3=$result['numNotNullHHYr3'];
								$numNotNullHHYr4=$result['numNotNullHHYr4'];
								$numNotNullHHYr5=$result['numNotNullHHYr5'];
								$numNotNullHHYr6=$result['numNotNullHHYr6'];
								
								
								$result['actualYr1']=$numNotNullHHYr1;
								$result['actualYr2']=$numNotNullHHYr2;
								$result['actualYr3']=$numNotNullHHYr3;
								$result['actualYr4']=$numNotNullHHYr4;
								$result['actualYr5']=$numNotNullHHYr5;
								$result['actualYr6']=$numNotNullHHYr6;
								return $result[$resultValue];
							}
//End 101 Number of rural households benefiting directly...[New/Continuing>>Disaggregates Not Available]

//Start:102 Number of rural households benefiting directly...[Gendered Household Type>>Adult Female no Adult Male (FNM)]
function ruralHouseholdsBenefitingGHTFemaleNoMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7 NULL---------------------------
							
								
								//=====================Household NOT NULL==============
								$x2="SELECT 102 as level_two_sub_indicatorId,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr6
								FROM `tbl_farmers` as `f` 
								where 102=102
								&& `f`.`hsComposition`<>''
								&& `f`.`hsComposition` is not null
								&& `f`.`hsComposition` like 'femaleNoMale%'";
								$query=@Execute($x2) or die(http("DM-662"));
								$result=FetchRecords($query);
								$numNotNullHHYr1=$result['numNotNullHHYr1'];
								$numNotNullHHYr2=$result['numNotNullHHYr2'];
								$numNotNullHHYr3=$result['numNotNullHHYr3'];
								$numNotNullHHYr4=$result['numNotNullHHYr4'];
								$numNotNullHHYr5=$result['numNotNullHHYr5'];
								$numNotNullHHYr6=$result['numNotNullHHYr6'];
								
								
								$result['actualYr1']=$numNotNullHHYr1;
								$result['actualYr2']=$numNotNullHHYr2;
								$result['actualYr3']=$numNotNullHHYr3;
								$result['actualYr4']=$numNotNullHHYr4;
								$result['actualYr5']=$numNotNullHHYr5;
								$result['actualYr6']=$numNotNullHHYr6;
								return $result[$resultValue];
							}
//End:102 Number of rural households benefiting directly...[Gendered Household Type>>Adult Female no Adult Male (FNM)]

//Start:103 Number of rural households benefiting directly...[Gendered Household Type>>Adult Female no Adult Male (FNM)]
function ruralHouseholdsBenefitingGHTMaleNoFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7 NULL---------------------------
							
								
								//=====================Household NOT NULL==============
								$x2="SELECT 103 as level_two_sub_indicatorId,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr6
								FROM `tbl_farmers` as `f` 
								where 103=103
								&& `f`.`hsComposition`<>''
								&& `f`.`hsComposition` is not null
								&& `f`.`hsComposition` like 'noMaleOrFemale%'";
								$query=@Execute($x2) or die(http("DM-662"));
								$result=FetchRecords($query);
								$numNotNullHHYr1=$result['numNotNullHHYr1'];
								$numNotNullHHYr2=$result['numNotNullHHYr2'];
								$numNotNullHHYr3=$result['numNotNullHHYr3'];
								$numNotNullHHYr4=$result['numNotNullHHYr4'];
								$numNotNullHHYr5=$result['numNotNullHHYr5'];
								$numNotNullHHYr6=$result['numNotNullHHYr6'];
								
								
								$result['actualYr1']=$numNotNullHHYr1;
								$result['actualYr2']=$numNotNullHHYr2;
								$result['actualYr3']=$numNotNullHHYr3;
								$result['actualYr4']=$numNotNullHHYr4;
								$result['actualYr5']=$numNotNullHHYr5;
								$result['actualYr6']=$numNotNullHHYr6;
								return $result[$resultValue];
							}
//End:103 Number of rural households benefiting directly...[Gendered Household Type>>Adult Female no Adult Male (FNM)]

//Start:104 Number of rural households benefiting directly...[Gendered Household Type>>Male and Female Adults]
function ruralHouseholdsBenefitingGHTMaleAndFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7 NULL---------------------------
							
								
								//=====================Household NOT NULL==============
								$x2="SELECT 104 as level_two_sub_indicatorId,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr6
								FROM `tbl_farmers` as `f` 
								where 104=104
								&& `f`.`hsComposition`<>''
								&& `f`.`hsComposition` is not null
								&& `f`.`hsComposition` like 'maleAndFemale%'";
								$query=@Execute($x2) or die(http("DM-662"));
								$result=FetchRecords($query);
								$numNotNullHHYr1=$result['numNotNullHHYr1'];
								$numNotNullHHYr2=$result['numNotNullHHYr2'];
								$numNotNullHHYr3=$result['numNotNullHHYr3'];
								$numNotNullHHYr4=$result['numNotNullHHYr4'];
								$numNotNullHHYr5=$result['numNotNullHHYr5'];
								$numNotNullHHYr6=$result['numNotNullHHYr6'];
								
								
								$result['actualYr1']=$numNotNullHHYr1;
								$result['actualYr2']=$numNotNullHHYr2;
								$result['actualYr3']=$numNotNullHHYr3;
								$result['actualYr4']=$numNotNullHHYr4;
								$result['actualYr5']=$numNotNullHHYr5;
								$result['actualYr6']=$numNotNullHHYr6;
								return $result[$resultValue];
							}
//End:104 Number of rural households benefiting directly...[Gendered Household Type>>Male and Female Adults]

//Start:105 Number of rural households benefiting directly...[Gendered Household Type>>Child No Adults (CNA)]
function ruralHouseholdsBenefitingGHTChildHeaded($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7 NULL---------------------------
							
								
								//=====================Household NOT NULL==============
								$x2="SELECT 105 as level_two_sub_indicatorId,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr6
								FROM `tbl_farmers` as `f` 
								where 105=105
								&& `f`.`hsComposition`<>''
								&& `f`.`hsComposition` is not null
								&& `f`.`hsComposition` like 'childHeaded%'";
								$query=@Execute($x2) or die(http("DM-662"));
								$result=FetchRecords($query);
								$numNotNullHHYr1=$result['numNotNullHHYr1'];
								$numNotNullHHYr2=$result['numNotNullHHYr2'];
								$numNotNullHHYr3=$result['numNotNullHHYr3'];
								$numNotNullHHYr4=$result['numNotNullHHYr4'];
								$numNotNullHHYr5=$result['numNotNullHHYr5'];
								$numNotNullHHYr6=$result['numNotNullHHYr6'];
								
								
								$result['actualYr1']=$numNotNullHHYr1;
								$result['actualYr2']=$numNotNullHHYr2;
								$result['actualYr3']=$numNotNullHHYr3;
								$result['actualYr4']=$numNotNullHHYr4;
								$result['actualYr5']=$numNotNullHHYr5;
								$result['actualYr6']=$numNotNullHHYr6;
								return $result[$resultValue];
							}
//End:105 Number of rural households benefiting directly...[Gendered Household Type>>Child No Adults (CNA)]

//Start:106 Number of rural households benefiting directly...[Gendered Household Type>>	Disaggregates Not Available]
function ruralHouseholdsBenefitingGHTDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7 NULL---------------------------
							
								
								//=====================Household NOT NULL==============
								$x2="SELECT 106 as level_two_sub_indicatorId,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr6
								FROM `tbl_farmers` as `f` 
								where 106=106
								&& `f`.`hsComposition` not like 'femaleNoMale%'
								&& `f`.`hsComposition` not like 'noMaleOrFemale%'
								&& `f`.`hsComposition` not like 'maleAndFemale%'
								&& `f`.`hsComposition` not like 'childHeaded%'";
								$query=@Execute($x2) or die(http("DM-662"));
								$result=FetchRecords($query);
								$numNotNullHHYr1=$result['numNotNullHHYr1'];
								$numNotNullHHYr2=$result['numNotNullHHYr2'];
								$numNotNullHHYr3=$result['numNotNullHHYr3'];
								$numNotNullHHYr4=$result['numNotNullHHYr4'];
								$numNotNullHHYr5=$result['numNotNullHHYr5'];
								$numNotNullHHYr6=$result['numNotNullHHYr6'];
								
								
								$result['actualYr1']=$numNotNullHHYr1;
								$result['actualYr2']=$numNotNullHHYr2;
								$result['actualYr3']=$numNotNullHHYr3;
								$result['actualYr4']=$numNotNullHHYr4;
								$result['actualYr5']=$numNotNullHHYr5;
								$result['actualYr6']=$numNotNullHHYr6;
								return $result[$resultValue];
							}
//End:106 Number of rural households benefiting directly...[Gendered Household Type>>Disaggregates Not Available]

//Start:107  Number of jobs attributed to FTF implementation[Location>>Urban]
function jobsAttributedToFtFImplementationLocationUrban($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue){
//Enterprise and Tech Adoption
			$x1="SELECT 107 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobs1Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobs1Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobs1Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobs1Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobs1Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobs1Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 107=107
								&& `tj`.`nameOfJobHolder` <>''
								&& `tj`.`nameOfJobHolder` not like '-%'
								&& `t`.`businessLocation` like 'U%'";
							
							 	$query=@Execute($x1) or die(http("FtFRepLOne-771"));
								$rTechAdoption=FetchRecords($query);
								$jobYr1=$rTechAdoption['noJobs1Yr1'];
								$jobYr2=$rTechAdoption['noJobs1Yr2'];
								$jobYr3=$rTechAdoption['noJobs1Yr3'];
								$jobYr4=$rTechAdoption['noJobs1Yr4'];
								$jobYr5=$rTechAdoption['noJobs1Yr5'];
								$jobYr6=$rTechAdoption['noJobs1Yr6'];
								
								//Summimg all the Jobs across the different form2's for each of the years
								
								$result['actualYr1']=$jobYr1;
								$result['actualYr2']=$jobYr2;
								$result['actualYr3']=$jobYr3;
								$result['actualYr4']=$jobYr4;
								$result['actualYr5']=$jobYr5;
								$result['actualYr6']=$jobYr6;
																
								return $result[$resultValue];
}
//End:107 Number of jobs attributed to FTF implementation[Location>>Urban]

//Start:108  Number of jobs attributed to FTF implementation[Location>>Rural]
function jobsAttributedToFtFImplementationLocationRural($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue){
//Enterprise and Tech Adoption
			$x1="SELECT 108 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobs1Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobs1Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobs1Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobs1Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobs1Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobs1Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 108=108
								&& `tj`.`nameOfJobHolder` <>''
								&& `tj`.`nameOfJobHolder` not like '-%'
								&& `t`.`businessLocation` like 'R%'";
							
							 	$query=@Execute($x1) or die(http("FtFRepLOne-771"));
								$rTechAdoption=FetchRecords($query);
								$jobYr1=$rTechAdoption['noJobs1Yr1'];
								$jobYr2=$rTechAdoption['noJobs1Yr2'];
								$jobYr3=$rTechAdoption['noJobs1Yr3'];
								$jobYr4=$rTechAdoption['noJobs1Yr4'];
								$jobYr5=$rTechAdoption['noJobs1Yr5'];
								$jobYr6=$rTechAdoption['noJobs1Yr6'];
								
								//Summimg all the Jobs across the different form2's for each of the years
								
								$result['actualYr1']=$jobYr1;
								$result['actualYr2']=$jobYr2;
								$result['actualYr3']=$jobYr3;
								$result['actualYr4']=$jobYr4;
								$result['actualYr5']=$jobYr5;
								$result['actualYr6']=$jobYr6;
																
								return $result[$resultValue];
}
//End:108 Number of jobs attributed to FTF implementation[Location>>Rural]

//Start:109  Number of jobs attributed to FTF implementation[Location>>Disaggregates Not Available]
function jobsAttributedToFtFImplementationLocationDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue){
//Enterprise and Tech Adoption
			$x1="SELECT 109 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobs1Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobs1Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobs1Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobs1Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobs1Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobs1Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 109=109
								&& `tj`.`nameOfJobHolder` <>''
								&& `tj`.`nameOfJobHolder` not like '-%'
								&& `t`.`businessLocation` not like 'U%'
								&& `t`.`businessLocation` not like 'R%'";
							
							 	$query=@Execute($x1) or die(http("FtFRepLOne-771"));
								$rTechAdoption=FetchRecords($query);
								$jobYr1=$rTechAdoption['noJobs1Yr1'];
								$jobYr2=$rTechAdoption['noJobs1Yr2'];
								$jobYr3=$rTechAdoption['noJobs1Yr3'];
								$jobYr4=$rTechAdoption['noJobs1Yr4'];
								$jobYr5=$rTechAdoption['noJobs1Yr5'];
								$jobYr6=$rTechAdoption['noJobs1Yr6'];
								
								//Summimg all the Jobs across the different form2's for each of the years
								
								$result['actualYr1']=$jobYr1;
								$result['actualYr2']=$jobYr2;
								$result['actualYr3']=$jobYr3;
								$result['actualYr4']=$jobYr4;
								$result['actualYr5']=$jobYr5;
								$result['actualYr6']=$jobYr6;
																
								return $result[$resultValue];
}
//End:109 Number of jobs attributed to FTF implementation[Location>>Disaggregates Not Available]

//Start:110  Number of jobs attributed to FTF implementation[New/Continuing>>New]
function jobsAttributedToFtFImplementationNOCNew($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue){
//Enterprise and Tech Adoption
			$x1="SELECT 110 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobs1Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobs1Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobs1Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobs1Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobs1Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobs1Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 110=110
								&& `tj`.`nameOfJobHolder` <>'' 
								&& `tj`.`nameOfJobHolder` not like '-%'
								&& `t`.`durationWithActivity` like 'N%'";
							
							 	$query=@Execute($x1) or die(http("FtFRepLOne-771"));
								$rTechAdoption=FetchRecords($query);
								$jobYr1=$rTechAdoption['noJobs1Yr1'];
								$jobYr2=$rTechAdoption['noJobs1Yr2'];
								$jobYr3=$rTechAdoption['noJobs1Yr3'];
								$jobYr4=$rTechAdoption['noJobs1Yr4'];
								$jobYr5=$rTechAdoption['noJobs1Yr5'];
								$jobYr6=$rTechAdoption['noJobs1Yr6'];
								
								//Summimg all the Jobs across the different form2's for each of the years
								
								$result['actualYr1']=$jobYr1;
								$result['actualYr2']=$jobYr2;
								$result['actualYr3']=$jobYr3;
								$result['actualYr4']=$jobYr4;
								$result['actualYr5']=$jobYr5;
								$result['actualYr6']=$jobYr6;
																
								return $result[$resultValue];
}
//End:110 Number of jobs attributed to FTF implementation[New/Continuing>>New]

//Start:111  Number of jobs attributed to FTF implementation[New/Continuing>>Continuing]
function jobsAttributedToFtFImplementationNOCOld($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue){
//Enterprise and Tech Adoption
			$x1="SELECT 111 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobs1Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobs1Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobs1Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobs1Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobs1Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobs1Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 111=111
								&& `tj`.`nameOfJobHolder` <>'' 
								&& `tj`.`nameOfJobHolder` not like '-%'
								&& `t`.`durationWithActivity` like 'O%'";
							
							 	$query=@Execute($x1) or die(http("FtFRepLOne-771"));
								$rTechAdoption=FetchRecords($query);
								$jobYr1=$rTechAdoption['noJobs1Yr1'];
								$jobYr2=$rTechAdoption['noJobs1Yr2'];
								$jobYr3=$rTechAdoption['noJobs1Yr3'];
								$jobYr4=$rTechAdoption['noJobs1Yr4'];
								$jobYr5=$rTechAdoption['noJobs1Yr5'];
								$jobYr6=$rTechAdoption['noJobs1Yr6'];
								
								//Summimg all the Jobs across the different form2's for each of the years
								
								$result['actualYr1']=$jobYr1;
								$result['actualYr2']=$jobYr2;
								$result['actualYr3']=$jobYr3;
								$result['actualYr4']=$jobYr4;
								$result['actualYr5']=$jobYr5;
								$result['actualYr6']=$jobYr6;
																
								return $result[$resultValue];
}
//End:111 Number of jobs attributed to FTF implementation[New/Continuing>>Continuing]

//Start:112  Number of jobs attributed to FTF implementation[New/Continuing>>Disaggregates Not Available]
function jobsAttributedToFtFImplementationNOCDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue){
//Enterprise and Tech Adoption
			$x1="SELECT 112 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobs1Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobs1Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobs1Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobs1Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobs1Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobs1Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 112=112
								&& `tj`.`nameOfJobHolder` <>'' 
								&& `tj`.`nameOfJobHolder` not like '-%'
								&& `t`.`durationWithActivity` not like 'N%'
								&& `t`.`durationWithActivity` not like 'O%'";
							
							 	$query=@Execute($x1) or die(http("FtFRepLOne-771"));
								$rTechAdoption=FetchRecords($query);
								$jobYr1=$rTechAdoption['noJobs1Yr1'];
								$jobYr2=$rTechAdoption['noJobs1Yr2'];
								$jobYr3=$rTechAdoption['noJobs1Yr3'];
								$jobYr4=$rTechAdoption['noJobs1Yr4'];
								$jobYr5=$rTechAdoption['noJobs1Yr5'];
								$jobYr6=$rTechAdoption['noJobs1Yr6'];
								
								//Summimg all the Jobs across the different form2's for each of the years
								
								$result['actualYr1']=$jobYr1;
								$result['actualYr2']=$jobYr2;
								$result['actualYr3']=$jobYr3;
								$result['actualYr4']=$jobYr4;
								$result['actualYr5']=$jobYr5;
								$result['actualYr6']=$jobYr6;
																
								return $result[$resultValue];
}
//End:112 Number of jobs attributed to FTF implementation[New/Continuing>>Disaggregates Not Available]

//Start:113  Number of jobs attributed to FTF implementation[Sex of job-holder>>Male]
function jobsAttributedToFtFImplementationSexJobHolderMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue){
//Enterprise and Tech Adoption
			$x1="SELECT 113 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobs1Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobs1Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobs1Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobs1Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobs1Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobs1Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 113=113
								&& `tj`.`sexOfJobHolder`<>'' 
								&& `tj`.`sexOfJobHolder` like 'M%' 
								&& `tj`.`sexOfJobHolder` not like '-%' 
								&& `tj`.`nameOfJobHolder` <>'' 
								&& `tj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x1) or die(http("FtFRepLOne-771"));
								$rTechAdoption=FetchRecords($query);
								$jobYr1=$rTechAdoption['noJobs1Yr1'];
								$jobYr2=$rTechAdoption['noJobs1Yr2'];
								$jobYr3=$rTechAdoption['noJobs1Yr3'];
								$jobYr4=$rTechAdoption['noJobs1Yr4'];
								$jobYr5=$rTechAdoption['noJobs1Yr5'];
								$jobYr6=$rTechAdoption['noJobs1Yr6'];
								
			//Labour Saving Technology
			$x2="SELECT 113 as level_two_sub_indicatorId,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_laboursavingtech` as `s`
								join `tbl_labourSavingTech_jobHolder` as `sj` 
								on `sj`.`labour_saving_tech_id`=`s`.`tbl_laboursavingtechId`
								where 113=113
								&& `sj`.`sexOfJobHolder`<>'' 
								&& `sj`.`sexOfJobHolder` like 'M%'
								&& `sj`.`sexOfJobHolder` not like '-%' 
								&& `sj`.`nameOfJobHolder` <>'' 
								&& `sj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x2) or die(http("FtFRepLOne-793"));
								$rJobsLabourSaving=@FetchRecords($query);
								$job2Yr1=$rJobsLabourSaving['noJobsYr1'];
								$job2Yr2=$rJobsLabourSaving['noJobsYr2'];
								$job2Yr3=$rJobsLabourSaving['noJobsYr3'];
								$job2Yr4=$rJobsLabourSaving['noJobsYr4'];
								$job2Yr5=$rJobsLabourSaving['noJobsYr5'];
								$job2Yr6=$rJobsLabourSaving['noJobsYr6'];
								
			//Media Programs
			$x3="SELECT 113 as level_two_sub_indicatorId,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_mediaprograms` as `m`
								join `tbl_mediaProgram_jobHolder` as `mj` 
								on `mj`.`media_program_id`=`m`.`tbl_mediaprogramsId`
								where 113=113
								&& `mj`.`sexOfJobHolder`<>'' 
								&& `mj`.`sexOfJobHolder` like 'M%'
								&& `mj`.`sexOfJobHolder` not like '-%' 
								&& `mj`.`nameOfJobHolder` <>'' 
								&& `mj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x3) or die(http("FtFRepLOne-815"));
								$rJobsMediaPrograms=@FetchRecords($query);
								$job3Yr1=$rJobsMediaPrograms['noJobsYr1'];
								$job3Yr2=$rJobsMediaPrograms['noJobsYr2'];
								$job3Yr3=$rJobsMediaPrograms['noJobsYr3'];
								$job3Yr4=$rJobsMediaPrograms['noJobsYr4'];
								$job3Yr5=$rJobsMediaPrograms['noJobsYr5'];
								$job3Yr6=$rJobsMediaPrograms['noJobsYr6'];
								
			//Youth Apprentice
			$x4="SELECT 113 as level_two_sub_indicatorId,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_youthapprentice` as `y`
								join `tbl_apprenticeship_jobHolder` as `yj` 
								on `yj`.`apprenticeship_id`=`y`.`tbl_youthapprenticeId`
								where 113=113
								&& `yj`.`sexOfJobHolder`<>'' 
								&& `yj`.`sexOfJobHolder` like 'M%'
								&& `yj`.`sexOfJobHolder` not like '-%' 
								&& `yj`.`nameOfJobHolder` <>'' 
								&& `yj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x4) or die(http("FtFRepLOne-0104"));
								$rYouthApprentice=@FetchRecords($query);
								$job4Yr1=$rYouthApprentice['noJobsYr1'];
								$job4Yr2=$rYouthApprentice['noJobsYr2'];
								$job4Yr3=$rYouthApprentice['noJobsYr3'];
								$job4Yr4=$rYouthApprentice['noJobsYr4'];
								$job4Yr5=$rYouthApprentice['noJobsYr5'];
								$job4Yr6=$rYouthApprentice['noJobsYr6'];				
	
	
			//Public private partnership
			$x5="SELECT 113 as level_two_sub_indicatorId,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_public_private_partnership` as `p` 
								join `tbl_partnership_jobHolder` as `pj` 
								on `pj`.`partnership_id`=`p`.`tbl_partnershipId`
								where 113=113
								&& `pj`.`sexOfJobHolder`<>'' 
								&& `pj`.`sexOfJobHolder` like 'M%'
								&& `pj`.`sexOfJobHolder` not like '-%' 
								&& `pj`.`nameOfJobHolder` <>'' 
								&& `pj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x5) or die(http("FtFRepLOne-860"));
								$rPrivatePublic=FetchRecords($query);
								$job5Yr1=$rPrivatePublic['noJobsYr1'];
								$job5Yr2=$rPrivatePublic['noJobsYr2'];
								$job5Yr3=$rPrivatePublic['noJobsYr3'];
								$job5Yr4=$rPrivatePublic['noJobsYr4'];
								$job5Yr5=$rPrivatePublic['noJobsYr5'];
								$job5Yr6=$rPrivatePublic['noJobsYr6'];
			
			
			
			//Bank Loans
			$x6="SELECT 113 as level_two_sub_indicatorId,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_bankloans` as `b`
								join `tbl_bank_loans_jobHolder` as `bj` 
								on `bj`.`bankLoan_id`=`b`.`tbl_bankLoanId`
								where 113=113
								&& `bj`.`sexOfJobHolder`<>'' 
								&& `bj`.`sexOfJobHolder` like 'M%'
								&& `bj`.`sexOfJobHolder` not like '-%' 
								&& `bj`.`nameOfJobHolder` <>'' 
								&& `bj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x6) or die(http("FtFRepLOne-884"));
								$rBankLoans=FetchRecords($query);
								$job6Yr1=$rBankLoans['noJobsYr1'];
								$job6Yr2=$rBankLoans['noJobsYr2'];
								$job6Yr3=$rBankLoans['noJobsYr3'];
								$job6Yr4=$rBankLoans['noJobsYr4'];
								$job6Yr5=$rBankLoans['noJobsYr5'];
								$job6Yr6=$rBankLoans['noJobsYr6'];
								
			//BDS
			$x7="SELECT 113 as level_two_sub_indicatorId,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_businessdev` as `bds`
								join `tbl_bds_jobHolder` as `bdsj` 
								on `bdsj`.`bds_id`=`bds`.`tbl_businessdevId`
								where 113=113
								&& `bdsj`.`sexOfJobHolder`<>'' 
								&& `bdsj`.`sexOfJobHolder` like 'M%'
								&& `bdsj`.`sexOfJobHolder` not like '-%' 
								&& `bdsj`.`nameOfJobHolder` <>'' 
								&& `bdsj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x7) or die(http("FtFRepLOne-906"));
								$rBDS=FetchRecords($query);
								$job7Yr1=$rBDS['noJobsYr1'];
								$job7Yr2=$rBDS['noJobsYr2'];
								$job7Yr3=$rBDS['noJobsYr3'];
								$job7Yr4=$rBDS['noJobsYr4'];
								$job7Yr5=$rBDS['noJobsYr5'];
								$job7Yr6=$rBDS['noJobsYr6'];
								
			//Input Sales
			$x8="SELECT 113 as level_two_sub_indicatorId,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_input_sales` as `i`
								join `tbl_input_sales_meta_data` as `ij` 
								on `ij`.`input_sales_id`=`i`.`id`
								where 113=113
								&& `ij`.`sexOfJobHolder`<>'' 
								&& `ij`.`sexOfJobHolder` like 'M%'
								&& `ij`.`sexOfJobHolder` not like '-%' 
								&& `ij`.`nameOfJobHolder` <>'' 
								&& `ij`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x8) or die(http("FtFRepLOne-94"));
								$rInputSales=FetchRecords($query);
								$job8Yr1=$rInputSales['noJobsYr1'];
								$job8Yr2=$rInputSales['noJobsYr2'];
								$job8Yr3=$rInputSales['noJobsYr3'];
								$job8Yr4=$rInputSales['noJobsYr4'];
								$job8Yr5=$rInputSales['noJobsYr5'];
								$job8Yr6=$rInputSales['noJobsYr6'];
			
			//PHH
			$x9="SELECT 113 as level_two_sub_indicatorId,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_phh` as `p`
								join `tbl_phh_meta_data` as `pj` 
								on `pj`.`phh_id`=`p`.`id`
								where 113=113
								&& `pj`.`sexOfJobHolder`<>'' 
								&& `pj`.`sexOfJobHolder` like 'M%'
								&& `pj`.`sexOfJobHolder` not like '-%' 
								&& `pj`.`nameOfJobHolder` <>'' 
								&& `pj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x9) or die(http("FtFRepLOne-950"));
								$rPHH=FetchRecords($query);
								$job9Yr1=$rPHH['noJobsYr1'];
								$job9Yr2=$rPHH['noJobsYr2'];
								$job9Yr3=$rPHH['noJobsYr3'];
								$job9Yr4=$rPHH['noJobsYr4'];
								$job9Yr5=$rPHH['noJobsYr5'];
								$job9Yr6=$rPHH['noJobsYr6'];
								
								//Summimg all the Jobs across the different form2's for each of the years
								
								$result['actualYr1']=$jobYr1+$job2Yr1+$job3Yr1+$job4Yr1+$job5Yr1+$job6Yr1+$job7Yr1+$job8Yr1+$job9Yr1;
								$result['actualYr2']=$jobYr2+$job2Yr2+$job3Yr2+$job4Yr2+$job5Yr2+$job6Yr2+$job7Yr2+$job8Yr2+$job9Yr2;
								$result['actualYr3']=$jobYr3+$job2Yr3+$job3Yr3+$job4Yr3+$job5Yr3+$job6Yr3+$job7Yr3+$job8Yr3+$job9Yr3;
								$result['actualYr4']=$jobYr4+$job2Yr4+$job3Yr4+$job4Yr4+$job5Yr4+$job6Yr4+$job7Yr4+$job8Yr4+$job9Yr4;
								$result['actualYr5']=$jobYr5+$job2Yr5+$job3Yr5+$job4Yr5+$job5Yr5+$job6Yr5+$job7Yr5+$job8Yr5+$job9Yr5;
								$result['actualYr6']=$jobYr6+$job2Yr6+$job3Yr6+$job4Yr6+$job5Yr6+$job6Yr6+$job7Yr6+$job8Yr6+$job9Yr6;
																
								return $result[$resultValue];
}
//End:113 Number of jobs attributed to FTF implementation[Sex of job-holder>>Male]

//Start:114  Number of jobs attributed to FTF implementation[Sex of job-holder>>Female]
function jobsAttributedToFtFImplementationSexJobHolderFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue){
//Enterprise and Tech Adoption
			$x1="SELECT 114 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobs1Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobs1Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobs1Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobs1Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobs1Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobs1Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 114=114
								&& `tj`.`sexOfJobHolder`<>'' 
								&& `tj`.`sexOfJobHolder` like 'F%' 
								&& `tj`.`sexOfJobHolder` not like '-%' 
								&& `tj`.`nameOfJobHolder` <>'' 
								&& `tj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x1) or die(http("FtFRepLOne-771"));
								$rTechAdoption=FetchRecords($query);
								$jobYr1=$rTechAdoption['noJobs1Yr1'];
								$jobYr2=$rTechAdoption['noJobs1Yr2'];
								$jobYr3=$rTechAdoption['noJobs1Yr3'];
								$jobYr4=$rTechAdoption['noJobs1Yr4'];
								$jobYr5=$rTechAdoption['noJobs1Yr5'];
								$jobYr6=$rTechAdoption['noJobs1Yr6'];
								
			//Labour Saving Technology
			$x2="SELECT 114 as level_two_sub_indicatorId,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_laboursavingtech` as `s`
								join `tbl_labourSavingTech_jobHolder` as `sj` 
								on `sj`.`labour_saving_tech_id`=`s`.`tbl_laboursavingtechId`
								where 114=114
								&& `sj`.`sexOfJobHolder`<>'' 
								&& `sj`.`sexOfJobHolder` like 'F%'
								&& `sj`.`sexOfJobHolder` not like '-%' 
								&& `sj`.`nameOfJobHolder` <>'' 
								&& `sj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x2) or die(http("FtFRepLOne-793"));
								$rJobsLabourSaving=@FetchRecords($query);
								$job2Yr1=$rJobsLabourSaving['noJobsYr1'];
								$job2Yr2=$rJobsLabourSaving['noJobsYr2'];
								$job2Yr3=$rJobsLabourSaving['noJobsYr3'];
								$job2Yr4=$rJobsLabourSaving['noJobsYr4'];
								$job2Yr5=$rJobsLabourSaving['noJobsYr5'];
								$job2Yr6=$rJobsLabourSaving['noJobsYr6'];
								
			//Media Programs
			$x3="SELECT 114 as level_two_sub_indicatorId,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_mediaprograms` as `m`
								join `tbl_mediaProgram_jobHolder` as `mj` 
								on `mj`.`media_program_id`=`m`.`tbl_mediaprogramsId`
								where 114=114
								&& `mj`.`sexOfJobHolder`<>'' 
								&& `mj`.`sexOfJobHolder` like 'F%'
								&& `mj`.`sexOfJobHolder` not like '-%' 
								&& `mj`.`nameOfJobHolder` <>'' 
								&& `mj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x3) or die(http("FtFRepLOne-815"));
								$rJobsMediaPrograms=@FetchRecords($query);
								$job3Yr1=$rJobsMediaPrograms['noJobsYr1'];
								$job3Yr2=$rJobsMediaPrograms['noJobsYr2'];
								$job3Yr3=$rJobsMediaPrograms['noJobsYr3'];
								$job3Yr4=$rJobsMediaPrograms['noJobsYr4'];
								$job3Yr5=$rJobsMediaPrograms['noJobsYr5'];
								$job3Yr6=$rJobsMediaPrograms['noJobsYr6'];
								
			//Youth Apprentice
			$x4="SELECT 114 as level_two_sub_indicatorId,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_youthapprentice` as `y`
								join `tbl_apprenticeship_jobHolder` as `yj` 
								on `yj`.`apprenticeship_id`=`y`.`tbl_youthapprenticeId`
								where 114=114
								&& `yj`.`sexOfJobHolder`<>'' 
								&& `yj`.`sexOfJobHolder` like 'F%'
								&& `yj`.`sexOfJobHolder` not like '-%' 
								&& `yj`.`nameOfJobHolder` <>'' 
								&& `yj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x4) or die(http("FtFRepLOne-0104"));
								$rYouthApprentice=@FetchRecords($query);
								$job4Yr1=$rYouthApprentice['noJobsYr1'];
								$job4Yr2=$rYouthApprentice['noJobsYr2'];
								$job4Yr3=$rYouthApprentice['noJobsYr3'];
								$job4Yr4=$rYouthApprentice['noJobsYr4'];
								$job4Yr5=$rYouthApprentice['noJobsYr5'];
								$job4Yr6=$rYouthApprentice['noJobsYr6'];				
	
	
			//Public private partnership
			$x5="SELECT 114 as level_two_sub_indicatorId,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_public_private_partnership` as `p` 
								join `tbl_partnership_jobHolder` as `pj` 
								on `pj`.`partnership_id`=`p`.`tbl_partnershipId`
								where 114=114
								&& `pj`.`sexOfJobHolder`<>'' 
								&& `pj`.`sexOfJobHolder` like 'F%'
								&& `pj`.`sexOfJobHolder` not like '-%' 
								&& `pj`.`nameOfJobHolder` <>'' 
								&& `pj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x5) or die(http("FtFRepLOne-860"));
								$rPrivatePublic=FetchRecords($query);
								$job5Yr1=$rPrivatePublic['noJobsYr1'];
								$job5Yr2=$rPrivatePublic['noJobsYr2'];
								$job5Yr3=$rPrivatePublic['noJobsYr3'];
								$job5Yr4=$rPrivatePublic['noJobsYr4'];
								$job5Yr5=$rPrivatePublic['noJobsYr5'];
								$job5Yr6=$rPrivatePublic['noJobsYr6'];
			
			
			
			//Bank Loans
			$x6="SELECT 114 as level_two_sub_indicatorId,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_bankloans` as `b`
								join `tbl_bank_loans_jobHolder` as `bj` 
								on `bj`.`bankLoan_id`=`b`.`tbl_bankLoanId`
								where 114=114
								&& `bj`.`sexOfJobHolder`<>'' 
								&& `bj`.`sexOfJobHolder` like 'F%'
								&& `bj`.`sexOfJobHolder` not like '-%' 
								&& `bj`.`nameOfJobHolder` <>'' 
								&& `bj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x6) or die(http("FtFRepLOne-884"));
								$rBankLoans=FetchRecords($query);
								$job6Yr1=$rBankLoans['noJobsYr1'];
								$job6Yr2=$rBankLoans['noJobsYr2'];
								$job6Yr3=$rBankLoans['noJobsYr3'];
								$job6Yr4=$rBankLoans['noJobsYr4'];
								$job6Yr5=$rBankLoans['noJobsYr5'];
								$job6Yr6=$rBankLoans['noJobsYr6'];
								
			//BDS
			$x7="SELECT 114 as level_two_sub_indicatorId,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_businessdev` as `bds`
								join `tbl_bds_jobHolder` as `bdsj` 
								on `bdsj`.`bds_id`=`bds`.`tbl_businessdevId`
								where 114=114
								&& `bdsj`.`sexOfJobHolder`<>'' 
								&& `bdsj`.`sexOfJobHolder` like 'F%'
								&& `bdsj`.`sexOfJobHolder` not like '-%' 
								&& `bdsj`.`nameOfJobHolder` <>'' 
								&& `bdsj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x7) or die(http("FtFRepLOne-906"));
								$rBDS=FetchRecords($query);
								$job7Yr1=$rBDS['noJobsYr1'];
								$job7Yr2=$rBDS['noJobsYr2'];
								$job7Yr3=$rBDS['noJobsYr3'];
								$job7Yr4=$rBDS['noJobsYr4'];
								$job7Yr5=$rBDS['noJobsYr5'];
								$job7Yr6=$rBDS['noJobsYr6'];
								
			//Input Sales
			$x8="SELECT 114 as level_two_sub_indicatorId,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_input_sales` as `i`
								join `tbl_input_sales_meta_data` as `ij` 
								on `ij`.`input_sales_id`=`i`.`id`
								where 114=114
								&& `ij`.`sexOfJobHolder`<>'' 
								&& `ij`.`sexOfJobHolder` like 'F%'
								&& `ij`.`sexOfJobHolder` not like '-%' 
								&& `ij`.`nameOfJobHolder` <>'' 
								&& `ij`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x8) or die(http("FtFRepLOne-94"));
								$rInputSales=FetchRecords($query);
								$job8Yr1=$rInputSales['noJobsYr1'];
								$job8Yr2=$rInputSales['noJobsYr2'];
								$job8Yr3=$rInputSales['noJobsYr3'];
								$job8Yr4=$rInputSales['noJobsYr4'];
								$job8Yr5=$rInputSales['noJobsYr5'];
								$job8Yr6=$rInputSales['noJobsYr6'];
			
			//PHH
			$x9="SELECT 114 as level_two_sub_indicatorId,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_phh` as `p`
								join `tbl_phh_meta_data` as `pj` 
								on `pj`.`phh_id`=`p`.`id`
								where 114=114
								&& `pj`.`sexOfJobHolder`<>'' 
								&& `pj`.`sexOfJobHolder` like 'F%'
								&& `pj`.`sexOfJobHolder` not like '-%' 
								&& `pj`.`nameOfJobHolder` <>'' 
								&& `pj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x9) or die(http("FtFRepLOne-950"));
								$rPHH=FetchRecords($query);
								$job9Yr1=$rPHH['noJobsYr1'];
								$job9Yr2=$rPHH['noJobsYr2'];
								$job9Yr3=$rPHH['noJobsYr3'];
								$job9Yr4=$rPHH['noJobsYr4'];
								$job9Yr5=$rPHH['noJobsYr5'];
								$job9Yr6=$rPHH['noJobsYr6'];
								
								//Summimg all the Jobs across the different form2's for each of the years
								
								$result['actualYr1']=$jobYr1+$job2Yr1+$job3Yr1+$job4Yr1+$job5Yr1+$job6Yr1+$job7Yr1+$job8Yr1+$job9Yr1;
								$result['actualYr2']=$jobYr2+$job2Yr2+$job3Yr2+$job4Yr2+$job5Yr2+$job6Yr2+$job7Yr2+$job8Yr2+$job9Yr2;
								$result['actualYr3']=$jobYr3+$job2Yr3+$job3Yr3+$job4Yr3+$job5Yr3+$job6Yr3+$job7Yr3+$job8Yr3+$job9Yr3;
								$result['actualYr4']=$jobYr4+$job2Yr4+$job3Yr4+$job4Yr4+$job5Yr4+$job6Yr4+$job7Yr4+$job8Yr4+$job9Yr4;
								$result['actualYr5']=$jobYr5+$job2Yr5+$job3Yr5+$job4Yr5+$job5Yr5+$job6Yr5+$job7Yr5+$job8Yr5+$job9Yr5;
								$result['actualYr6']=$jobYr6+$job2Yr6+$job3Yr6+$job4Yr6+$job5Yr6+$job6Yr6+$job7Yr6+$job8Yr6+$job9Yr6;
																
								return $result[$resultValue];
}
//End:114 Number of jobs attributed to FTF implementation[Sex of job-holder>>Female]

//Start:115 Number of jobs attributed to FTF implementation[Sex of job-holder>>DNA]
function jobsAttributedToFtFImplementationSexJobHolderDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue){
//Enterprise and Tech Adoption
			$x1="SELECT 115 as level_two_sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobs1Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobs1Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobs1Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobs1Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobs1Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobs1Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 115=115
								&& `tj`.`sexOfJobHolder` not like 'M%' 
								&& `tj`.`sexOfJobHolder` not like 'F%' 
								&& `tj`.`nameOfJobHolder` <>'' 
								&& `tj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x1) or die(http("FtFRepLOne-771"));
								$rTechAdoption=FetchRecords($query);
								$jobYr1=$rTechAdoption['noJobs1Yr1'];
								$jobYr2=$rTechAdoption['noJobs1Yr2'];
								$jobYr3=$rTechAdoption['noJobs1Yr3'];
								$jobYr4=$rTechAdoption['noJobs1Yr4'];
								$jobYr5=$rTechAdoption['noJobs1Yr5'];
								$jobYr6=$rTechAdoption['noJobs1Yr6'];
								
			//Labour Saving Technology
			$x2="SELECT 115 as level_two_sub_indicatorId,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_laboursavingtech` as `s`
								join `tbl_labourSavingTech_jobHolder` as `sj` 
								on `sj`.`labour_saving_tech_id`=`s`.`tbl_laboursavingtechId`
								where 115=115
								&& `sj`.`sexOfJobHolder` not like 'M%' 
								&& `sj`.`sexOfJobHolder` not like 'F%' 
								&& `sj`.`nameOfJobHolder` <>'' 
								&& `sj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x2) or die(http("FtFRepLOne-793"));
								$rJobsLabourSaving=@FetchRecords($query);
								$job2Yr1=$rJobsLabourSaving['noJobsYr1'];
								$job2Yr2=$rJobsLabourSaving['noJobsYr2'];
								$job2Yr3=$rJobsLabourSaving['noJobsYr3'];
								$job2Yr4=$rJobsLabourSaving['noJobsYr4'];
								$job2Yr5=$rJobsLabourSaving['noJobsYr5'];
								$job2Yr6=$rJobsLabourSaving['noJobsYr6'];
								
			//Media Programs
			$x3="SELECT 115 as level_two_sub_indicatorId,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_mediaprograms` as `m`
								join `tbl_mediaProgram_jobHolder` as `mj` 
								on `mj`.`media_program_id`=`m`.`tbl_mediaprogramsId`
								where 115=115
								&& `mj`.`sexOfJobHolder` not like 'M%' 
								&& `mj`.`sexOfJobHolder` not like 'F%' 
								&& `mj`.`nameOfJobHolder` <>'' 
								&& `mj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x3) or die(http("FtFRepLOne-815"));
								$rJobsMediaPrograms=@FetchRecords($query);
								$job3Yr1=$rJobsMediaPrograms['noJobsYr1'];
								$job3Yr2=$rJobsMediaPrograms['noJobsYr2'];
								$job3Yr3=$rJobsMediaPrograms['noJobsYr3'];
								$job3Yr4=$rJobsMediaPrograms['noJobsYr4'];
								$job3Yr5=$rJobsMediaPrograms['noJobsYr5'];
								$job3Yr6=$rJobsMediaPrograms['noJobsYr6'];
								
			//Youth Apprentice
			$x4="SELECT 115 as level_two_sub_indicatorId,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_youthapprentice` as `y`
								join `tbl_apprenticeship_jobHolder` as `yj` 
								on `yj`.`apprenticeship_id`=`y`.`tbl_youthapprenticeId`
								where 115=115
								&& `yj`.`sexOfJobHolder` not like 'M%' 
								&& `yj`.`sexOfJobHolder` not like 'F%' 
								&& `yj`.`nameOfJobHolder` <>'' 
								&& `yj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x4) or die(http("FtFRepLOne-0104"));
								$rYouthApprentice=@FetchRecords($query);
								$job4Yr1=$rYouthApprentice['noJobsYr1'];
								$job4Yr2=$rYouthApprentice['noJobsYr2'];
								$job4Yr3=$rYouthApprentice['noJobsYr3'];
								$job4Yr4=$rYouthApprentice['noJobsYr4'];
								$job4Yr5=$rYouthApprentice['noJobsYr5'];
								$job4Yr6=$rYouthApprentice['noJobsYr6'];				
	
	
			//Public private partnership
			$x5="SELECT 115 as level_two_sub_indicatorId,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_public_private_partnership` as `p` 
								join `tbl_partnership_jobHolder` as `pj` 
								on `pj`.`partnership_id`=`p`.`tbl_partnershipId`
								where 115=115
								&& `pj`.`sexOfJobHolder` not like 'M%' 
								&& `pj`.`sexOfJobHolder` not like 'F%' 
								&& `pj`.`nameOfJobHolder` <>'' 
								&& `pj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x5) or die(http("FtFRepLOne-860"));
								$rPrivatePublic=FetchRecords($query);
								$job5Yr1=$rPrivatePublic['noJobsYr1'];
								$job5Yr2=$rPrivatePublic['noJobsYr2'];
								$job5Yr3=$rPrivatePublic['noJobsYr3'];
								$job5Yr4=$rPrivatePublic['noJobsYr4'];
								$job5Yr5=$rPrivatePublic['noJobsYr5'];
								$job5Yr6=$rPrivatePublic['noJobsYr6'];
			
			
			
			//Bank Loans
			$x6="SELECT 115 as level_two_sub_indicatorId,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_bankloans` as `b`
								join `tbl_bank_loans_jobHolder` as `bj` 
								on `bj`.`bankLoan_id`=`b`.`tbl_bankLoanId`
								where 115=115
								&& `bj`.`sexOfJobHolder` not like 'M%' 
								&& `bj`.`sexOfJobHolder` not like 'F%' 
								&& `bj`.`nameOfJobHolder` <>'' 
								&& `bj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x6) or die(http("FtFRepLOne-884"));
								$rBankLoans=FetchRecords($query);
								$job6Yr1=$rBankLoans['noJobsYr1'];
								$job6Yr2=$rBankLoans['noJobsYr2'];
								$job6Yr3=$rBankLoans['noJobsYr3'];
								$job6Yr4=$rBankLoans['noJobsYr4'];
								$job6Yr5=$rBankLoans['noJobsYr5'];
								$job6Yr6=$rBankLoans['noJobsYr6'];
								
			//BDS
			$x7="SELECT 115 as level_two_sub_indicatorId,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_businessdev` as `bds`
								join `tbl_bds_jobHolder` as `bdsj` 
								on `bdsj`.`bds_id`=`bds`.`tbl_businessdevId`
								where 115=115
								&& `bdsj`.`sexOfJobHolder` not like 'M%' 
								&& `bdsj`.`sexOfJobHolder` not like 'F%' 
								&& `bdsj`.`nameOfJobHolder` <>'' 
								&& `bdsj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x7) or die(http("FtFRepLOne-906"));
								$rBDS=FetchRecords($query);
								$job7Yr1=$rBDS['noJobsYr1'];
								$job7Yr2=$rBDS['noJobsYr2'];
								$job7Yr3=$rBDS['noJobsYr3'];
								$job7Yr4=$rBDS['noJobsYr4'];
								$job7Yr5=$rBDS['noJobsYr5'];
								$job7Yr6=$rBDS['noJobsYr6'];
								
			//Input Sales
			$x8="SELECT 115 as level_two_sub_indicatorId,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_input_sales` as `i`
								join `tbl_input_sales_meta_data` as `ij` 
								on `ij`.`input_sales_id`=`i`.`id`
								where 115=115
								&& `ij`.`sexOfJobHolder` not like 'M%' 
								&& `ij`.`sexOfJobHolder` not like 'F%' 
								&& `ij`.`nameOfJobHolder` <>'' 
								&& `ij`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x8) or die(http("FtFRepLOne-94"));
								$rInputSales=FetchRecords($query);
								$job8Yr1=$rInputSales['noJobsYr1'];
								$job8Yr2=$rInputSales['noJobsYr2'];
								$job8Yr3=$rInputSales['noJobsYr3'];
								$job8Yr4=$rInputSales['noJobsYr4'];
								$job8Yr5=$rInputSales['noJobsYr5'];
								$job8Yr6=$rInputSales['noJobsYr6'];
			
			//PHH
			$x9="SELECT 115 as level_two_sub_indicatorId,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS noJobsYr1,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS noJobsYr2,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS noJobsYr3,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS noJobsYr4,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS noJobsYr5,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_phh` as `p`
								join `tbl_phh_meta_data` as `pj` 
								on `pj`.`phh_id`=`p`.`id`
								where 115=115
								&& `pj`.`sexOfJobHolder` not like 'M%' 
								&& `pj`.`sexOfJobHolder` not like 'F%' 
								&& `pj`.`nameOfJobHolder` <>'' 
								&& `pj`.`nameOfJobHolder` not like '-%'";
							
							 	$query=@Execute($x9) or die(http("FtFRepLOne-950"));
								$rPHH=FetchRecords($query);
								$job9Yr1=$rPHH['noJobsYr1'];
								$job9Yr2=$rPHH['noJobsYr2'];
								$job9Yr3=$rPHH['noJobsYr3'];
								$job9Yr4=$rPHH['noJobsYr4'];
								$job9Yr5=$rPHH['noJobsYr5'];
								$job9Yr6=$rPHH['noJobsYr6'];
								
								//Summimg all the Jobs across the different form2's for each of the years
								
								$result['actualYr1']=$jobYr1+$job2Yr1+$job3Yr1+$job4Yr1+$job5Yr1+$job6Yr1+$job7Yr1+$job8Yr1+$job9Yr1;
								$result['actualYr2']=$jobYr2+$job2Yr2+$job3Yr2+$job4Yr2+$job5Yr2+$job6Yr2+$job7Yr2+$job8Yr2+$job9Yr2;
								$result['actualYr3']=$jobYr3+$job2Yr3+$job3Yr3+$job4Yr3+$job5Yr3+$job6Yr3+$job7Yr3+$job8Yr3+$job9Yr3;
								$result['actualYr4']=$jobYr4+$job2Yr4+$job3Yr4+$job4Yr4+$job5Yr4+$job6Yr4+$job7Yr4+$job8Yr4+$job9Yr4;
								$result['actualYr5']=$jobYr5+$job2Yr5+$job3Yr5+$job4Yr5+$job5Yr5+$job6Yr5+$job7Yr5+$job8Yr5+$job9Yr5;
								$result['actualYr6']=$jobYr6+$job2Yr6+$job3Yr6+$job4Yr6+$job5Yr6+$job6Yr6+$job7Yr6+$job8Yr6+$job9Yr6;
																
								return $result[$resultValue];
}
//End:115 Number of jobs attributed to FTF implementation[Sex of job-holder>>DNA]

//Start:116 Value of Agricultural and Rural Loans[Type of loan recipient>>Producers]
function ValueofAgriculturalRuralLoansTypeLRProducers($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 116 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
								FROM `tbl_bankloans` where 116=116
								and `typeOfLoanRecepient` like 'Farmer%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$loanYr1=$result['loanYr1'];
								$loanYr2=$result['loanYr2'];
								$loanYr3=$result['loanYr3'];
								$loanYr4=$result['loanYr4'];
								$loanYr5=$result['loanYr5'];
								$loanYr6=$result['loanYr6'];
								
								
								
								$result['actualYr1']=convertShillingsToDollars($loanYr1);
								$result['actualYr2']=convertShillingsToDollars($loanYr1);
								$result['actualYr3']=convertShillingsToDollars($loanYr3);
								$result['actualYr4']=convertShillingsToDollars($loanYr4);
								$result['actualYr5']=convertShillingsToDollars($loanYr5);
								$result['actualYr6']=convertShillingsToDollars($loanYr6);
								return $result[$resultValue];
							}
//End:116 Value of Agricultural and Rural Loans[Type of loan recipient>>Producers]

//Start:117 Value of Agricultural and Rural Loans[Type of loan recipient>>Local traders/assemblers]
function ValueofAgriculturalRuralLoansTypeLRLT($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 117 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
								FROM `tbl_bankloans` where 117=117
								and `typeOfLoanRecepient` like 'Local trader%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$loanYr1=$result['loanYr1'];
								$loanYr2=$result['loanYr2'];
								$loanYr3=$result['loanYr3'];
								$loanYr4=$result['loanYr4'];
								$loanYr5=$result['loanYr5'];
								$loanYr6=$result['loanYr6'];
								
								
								
								$result['actualYr1']=convertShillingsToDollars($loanYr1);
								$result['actualYr2']=convertShillingsToDollars($loanYr1);
								$result['actualYr3']=convertShillingsToDollars($loanYr3);
								$result['actualYr4']=convertShillingsToDollars($loanYr4);
								$result['actualYr5']=convertShillingsToDollars($loanYr5);
								$result['actualYr6']=convertShillingsToDollars($loanYr6);
								return $result[$resultValue];
							}
//End:117 Value of Agricultural and Rural Loans[Type of loan recipient>>Local traders/assemblers]

//Start:118 Value of Agricultural and Rural Loans[Type of loan recipient>>Wholesalers/processors]
function ValueofAgriculturalRuralLoansTypeLRWP($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 118 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
								FROM `tbl_bankloans` where 118=118
								and `typeOfLoanRecepient` like 'Processors%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$loanYr1=$result['loanYr1'];
								$loanYr2=$result['loanYr2'];
								$loanYr3=$result['loanYr3'];
								$loanYr4=$result['loanYr4'];
								$loanYr5=$result['loanYr5'];
								$loanYr6=$result['loanYr6'];
								
								
								
								$result['actualYr1']=convertShillingsToDollars($loanYr1);
								$result['actualYr2']=convertShillingsToDollars($loanYr1);
								$result['actualYr3']=convertShillingsToDollars($loanYr3);
								$result['actualYr4']=convertShillingsToDollars($loanYr4);
								$result['actualYr5']=convertShillingsToDollars($loanYr5);
								$result['actualYr6']=convertShillingsToDollars($loanYr6);
								return $result[$resultValue];
							}
//End:118 Value of Agricultural and Rural Loans[Type of loan recipient>>Wholesalers/processors]

//Start:119 Value of Agricultural and Rural Loans[Type of loan recipient>>Others]
function ValueofAgriculturalRuralLoansTypeLROthers($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 119 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
								FROM `tbl_bankloans` where 119=119
								and `typeOfLoanRecepient` like 'Other%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$loanYr1=$result['loanYr1'];
								$loanYr2=$result['loanYr2'];
								$loanYr3=$result['loanYr3'];
								$loanYr4=$result['loanYr4'];
								$loanYr5=$result['loanYr5'];
								$loanYr6=$result['loanYr6'];
								
								
								
								$result['actualYr1']=convertShillingsToDollars($loanYr1);
								$result['actualYr2']=convertShillingsToDollars($loanYr1);
								$result['actualYr3']=convertShillingsToDollars($loanYr3);
								$result['actualYr4']=convertShillingsToDollars($loanYr4);
								$result['actualYr5']=convertShillingsToDollars($loanYr5);
								$result['actualYr6']=convertShillingsToDollars($loanYr6);
								return $result[$resultValue];
							}
//End:119 Value of Agricultural and Rural Loans[Type of loan recipient>>Others]

//Start:120 Value of Agricultural and Rural Loans[Type of loan recipient>>DNA]
function ValueofAgriculturalRuralLoansTypeLRDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 120 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
								FROM `tbl_bankloans` where 120=120
								and `typeOfLoanRecepient` not like 'Farmer%'
								and `typeOfLoanRecepient` not like 'Local trader%'
								and `typeOfLoanRecepient` not like 'Processors%'
								and `typeOfLoanRecepient` not like 'Other%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$loanYr1=$result['loanYr1'];
								$loanYr2=$result['loanYr2'];
								$loanYr3=$result['loanYr3'];
								$loanYr4=$result['loanYr4'];
								$loanYr5=$result['loanYr5'];
								$loanYr6=$result['loanYr6'];
								
								
								
								$result['actualYr1']=convertShillingsToDollars($loanYr1);
								$result['actualYr2']=convertShillingsToDollars($loanYr1);
								$result['actualYr3']=convertShillingsToDollars($loanYr3);
								$result['actualYr4']=convertShillingsToDollars($loanYr4);
								$result['actualYr5']=convertShillingsToDollars($loanYr5);
								$result['actualYr6']=convertShillingsToDollars($loanYr6);
								return $result[$resultValue];
							}
//End:120 Value of Agricultural and Rural Loans[Type of loan recipient>>DNA]

//Start:121 	Value of Agricultural and Rural Loans[Sex of recipient>>Male]
function ValueofAgriculturalRuralLoansSexMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 121 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
								FROM `tbl_bankloans` where 121=121
								and `recipientSex` like 'M%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$loanYr1=$result['loanYr1'];
								$loanYr2=$result['loanYr2'];
								$loanYr3=$result['loanYr3'];
								$loanYr4=$result['loanYr4'];
								$loanYr5=$result['loanYr5'];
								$loanYr6=$result['loanYr6'];
								
								//=====================form 6 survey Loan Accessed==============
								$x2="SELECT 121 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 121=121
								and `f`.`farmersSex` like 'M%'
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$loanForm6Yr1=$result['loanForm6Yr1'];
								$loanForm6Yr2=$result['loanForm6Yr2'];
								$loanForm6Yr3=$result['loanForm6Yr3'];
								$loanForm6Yr4=$result['loanForm6Yr4'];
								$loanForm6Yr5=$result['loanForm6Yr5'];
								$loanForm6Yr6=$result['loanForm6Yr6'];
								
								
								//Include incremental factor...
								$st=ExtrapolationFactor(27);
								$query=@Execute($st) or die(http("Activity DataMining-462"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								$result['actualYr1']=convertShillingsToDollars($loanYr1+($extrapolationFactorYr1*$loanForm6Yr1));
								$result['actualYr2']=convertShillingsToDollars($loanYr1+($extrapolationFactorYr2*$loanForm6Yr2));
								$result['actualYr3']=convertShillingsToDollars($loanYr3+($extrapolationFactorYr3*$loanForm6Yr3));
								$result['actualYr4']=convertShillingsToDollars($loanYr4+($extrapolationFactorYr4*$loanForm6Yr4));
								$result['actualYr5']=convertShillingsToDollars($loanYr5+($extrapolationFactorYr5*$loanForm6Yr5));
								$result['actualYr6']=convertShillingsToDollars($loanYr6+($extrapolationFactorYr6*$loanForm6Yr6));
								return $result[$resultValue];
							}
//End:121 Value of Agricultural and Rural Loans[Sex of recipient>>Male]

//Start:122 	Value of Agricultural and Rural Loans[Sex of recipient>>Female]
function ValueofAgriculturalRuralLoansSexFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 122 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
								FROM `tbl_bankloans` where 122=122
								and `recipientSex` like 'F%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$loanYr1=$result['loanYr1'];
								$loanYr2=$result['loanYr2'];
								$loanYr3=$result['loanYr3'];
								$loanYr4=$result['loanYr4'];
								$loanYr5=$result['loanYr5'];
								$loanYr6=$result['loanYr6'];
								
								//=====================form 6 survey Loan Accessed==============
								$x2="SELECT 122 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 122=122
								and `f`.`farmersSex` like 'F%'
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$loanForm6Yr1=$result['loanForm6Yr1'];
								$loanForm6Yr2=$result['loanForm6Yr2'];
								$loanForm6Yr3=$result['loanForm6Yr3'];
								$loanForm6Yr4=$result['loanForm6Yr4'];
								$loanForm6Yr5=$result['loanForm6Yr5'];
								$loanForm6Yr6=$result['loanForm6Yr6'];
								
								
								//Include incremental factor...
								$st=ExtrapolationFactor(27);
								$query=@Execute($st) or die(http("Activity DataMining-462"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								$result['actualYr1']=convertShillingsToDollars($loanYr1+($extrapolationFactorYr1*$loanForm6Yr1));
								$result['actualYr2']=convertShillingsToDollars($loanYr1+($extrapolationFactorYr2*$loanForm6Yr2));
								$result['actualYr3']=convertShillingsToDollars($loanYr3+($extrapolationFactorYr3*$loanForm6Yr3));
								$result['actualYr4']=convertShillingsToDollars($loanYr4+($extrapolationFactorYr4*$loanForm6Yr4));
								$result['actualYr5']=convertShillingsToDollars($loanYr5+($extrapolationFactorYr5*$loanForm6Yr5));
								$result['actualYr6']=convertShillingsToDollars($loanYr6+($extrapolationFactorYr6*$loanForm6Yr6));
								return $result[$resultValue];
							}
//End:122 Value of Agricultural and Rural Loans[Sex of recipient>>Female]

//Start:123 Value of Agricultural and Rural Loans[Sex of recipient>>Joint]
function ValueofAgriculturalRuralLoansSexJoint($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 123 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
								FROM `tbl_bankloans` where 123=123
								and `recipientSex` like 'J%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$loanYr1=$result['loanYr1'];
								$loanYr2=$result['loanYr2'];
								$loanYr3=$result['loanYr3'];
								$loanYr4=$result['loanYr4'];
								$loanYr5=$result['loanYr5'];
								$loanYr6=$result['loanYr6'];
								
								//=====================form 6 survey Loan Accessed==============
								$x2="SELECT 123 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 123=123
								and `f`.`farmersSex` like 'J%'
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$loanForm6Yr1=$result['loanForm6Yr1'];
								$loanForm6Yr2=$result['loanForm6Yr2'];
								$loanForm6Yr3=$result['loanForm6Yr3'];
								$loanForm6Yr4=$result['loanForm6Yr4'];
								$loanForm6Yr5=$result['loanForm6Yr5'];
								$loanForm6Yr6=$result['loanForm6Yr6'];
								
								
								//Include incremental factor...
								$st=ExtrapolationFactor(123);
								$query=@Execute($st) or die(http("Activity DataMining-462"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								$result['actualYr1']=convertShillingsToDollars($loanYr1+($extrapolationFactorYr1*$loanForm6Yr1));
								$result['actualYr2']=convertShillingsToDollars($loanYr1+($extrapolationFactorYr2*$loanForm6Yr2));
								$result['actualYr3']=convertShillingsToDollars($loanYr3+($extrapolationFactorYr3*$loanForm6Yr3));
								$result['actualYr4']=convertShillingsToDollars($loanYr4+($extrapolationFactorYr4*$loanForm6Yr4));
								$result['actualYr5']=convertShillingsToDollars($loanYr5+($extrapolationFactorYr5*$loanForm6Yr5));
								$result['actualYr6']=convertShillingsToDollars($loanYr6+($extrapolationFactorYr6*$loanForm6Yr6));
								return $result[$resultValue];
							}
//End:123 Value of Agricultural and Rural Loans[Sex of recipient>>Joint]

//Start:124 Value of Agricultural and Rural Loans[Sex of recipient>>n/a]
function ValueofAgriculturalRuralLoansSexNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 124 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
								FROM `tbl_bankloans` where 124=124
								and `recipientSex` like 'n/a%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$loanYr1=$result['loanYr1'];
								$loanYr2=$result['loanYr2'];
								$loanYr3=$result['loanYr3'];
								$loanYr4=$result['loanYr4'];
								$loanYr5=$result['loanYr5'];
								$loanYr6=$result['loanYr6'];
								
								//=====================form 6 survey Loan Accessed==============
								$x2="SELECT 124 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 124=124
								and `f`.`farmersSex` like 'n/a%'
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$loanForm6Yr1=$result['loanForm6Yr1'];
								$loanForm6Yr2=$result['loanForm6Yr2'];
								$loanForm6Yr3=$result['loanForm6Yr3'];
								$loanForm6Yr4=$result['loanForm6Yr4'];
								$loanForm6Yr5=$result['loanForm6Yr5'];
								$loanForm6Yr6=$result['loanForm6Yr6'];
								
								
								//Include incremental factor...
								$st=ExtrapolationFactor(124);
								$query=@Execute($st) or die(http("Activity DataMining-462"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								$result['actualYr1']=convertShillingsToDollars($loanYr1+($extrapolationFactorYr1*$loanForm6Yr1));
								$result['actualYr2']=convertShillingsToDollars($loanYr1+($extrapolationFactorYr2*$loanForm6Yr2));
								$result['actualYr3']=convertShillingsToDollars($loanYr3+($extrapolationFactorYr3*$loanForm6Yr3));
								$result['actualYr4']=convertShillingsToDollars($loanYr4+($extrapolationFactorYr4*$loanForm6Yr4));
								$result['actualYr5']=convertShillingsToDollars($loanYr5+($extrapolationFactorYr5*$loanForm6Yr5));
								$result['actualYr6']=convertShillingsToDollars($loanYr6+($extrapolationFactorYr6*$loanForm6Yr6));
								return $result[$resultValue];
							}
//End:124 Value of Agricultural and Rural Loans[Sex of recipient>>n/a]

//Start:125 Value of Agricultural and Rural Loans[Sex of recipient>>DNA]
function ValueofAgriculturalRuralLoansSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 125 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
								FROM `tbl_bankloans` where 125=125
								and `recipientSex` not like 'M%'
								and `recipientSex` not like 'F%'
								and `recipientSex` not like 'J%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$loanYr1=$result['loanYr1'];
								$loanYr2=$result['loanYr2'];
								$loanYr3=$result['loanYr3'];
								$loanYr4=$result['loanYr4'];
								$loanYr5=$result['loanYr5'];
								$loanYr6=$result['loanYr6'];
								
								//=====================form 6 survey Loan Accessed==============
								$x2="SELECT 125 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 125=125
								and `f`.`farmersSex` not like 'M%'
								and `f`.`farmersSex` not like 'F%'
								and `f`.`farmersSex` not like 'J%'
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$loanForm6Yr1=$result['loanForm6Yr1'];
								$loanForm6Yr2=$result['loanForm6Yr2'];
								$loanForm6Yr3=$result['loanForm6Yr3'];
								$loanForm6Yr4=$result['loanForm6Yr4'];
								$loanForm6Yr5=$result['loanForm6Yr5'];
								$loanForm6Yr6=$result['loanForm6Yr6'];
								
								
								//Include incremental factor...
								$st=ExtrapolationFactor(125);
								$query=@Execute($st) or die(http("Activity DataMining-462"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								$result['actualYr1']=convertShillingsToDollars($loanYr1+($extrapolationFactorYr1*$loanForm6Yr1));
								$result['actualYr2']=convertShillingsToDollars($loanYr1+($extrapolationFactorYr2*$loanForm6Yr2));
								$result['actualYr3']=convertShillingsToDollars($loanYr3+($extrapolationFactorYr3*$loanForm6Yr3));
								$result['actualYr4']=convertShillingsToDollars($loanYr4+($extrapolationFactorYr4*$loanForm6Yr4));
								$result['actualYr5']=convertShillingsToDollars($loanYr5+($extrapolationFactorYr5*$loanForm6Yr5));
								$result['actualYr6']=convertShillingsToDollars($loanYr6+($extrapolationFactorYr6*$loanForm6Yr6));
								return $result[$resultValue];
							}
//End:125 Value of Agricultural and Rural Loans[Sex of recipient>>DNA]

//Start:126	Number of MSMEs receiving USG...[Size of MSME>>Micro]
function NumMSMEsReceivingUSGSizeMicro($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 126 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and nameMSME <>'', 1, 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and nameMSME <>'', 1, 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and nameMSME <>'', 1, 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and nameMSME <>'', 1, 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and nameMSME <>'', 1, 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and nameMSME <>'', 1, 0 ) ) AS numYr6
								FROM `tbl_bankloans` 
								where 126=126
								and `numberOfFullTimeEmployees` <=> 0 ";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:126 Number of MSMEs receiving USG.[Size of MSME>>Micro]

//Start:127	Number of MSMEs receiving USG...[Size of MSME>>Small]
function NumMSMEsReceivingUSGSizeSmall($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 127 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and nameMSME <>'', 1, 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and nameMSME <>'', 1, 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and nameMSME <>'', 1, 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and nameMSME <>'', 1, 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and nameMSME <>'', 1, 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and nameMSME <>'', 1, 0 ) ) AS numYr6
								FROM `tbl_bankloans` 
								where 127=127
								and `numberOfFullTimeEmployees` between 1 and 5";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:127 Number of MSMEs receiving USG.[Size of MSME>>Small]

//Start:128	Number of MSMEs receiving USG...[Size of MSME>>Medium]
function NumMSMEsReceivingUSGSizeMedium($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 128 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and nameMSME <>'', 1, 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and nameMSME <>'', 1, 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and nameMSME <>'', 1, 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and nameMSME <>'', 1, 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and nameMSME <>'', 1, 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and nameMSME <>'', 1, 0 ) ) AS numYr6
								FROM `tbl_bankloans` 
								where 128=128
								and `numberOfFullTimeEmployees` between 6 and 10";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:128 Number of MSMEs receiving USG.[Size of MSME>>Medium]

//Start:129	Number of MSMEs receiving USG...[Size of MSME>>DNA]
function NumMSMEsReceivingUSGSizeDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 129 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and nameMSME <>'', 1, 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and nameMSME <>'', 1, 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and nameMSME <>'', 1, 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and nameMSME <>'', 1, 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and nameMSME <>'', 1, 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and nameMSME <>'', 1, 0 ) ) AS numYr6
								FROM `tbl_bankloans` 
								where 129=129
								and `numberOfFullTimeEmployees` >= 11";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:129 Number of MSMEs receiving USG.[Size of MSME>>DNA]

//Start:130	Number of MSMEs receiving USG...[Sex of owner>>Male]
function NumMSMEsReceivingUSGSexMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 130 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and nameMSME <>'', 1, 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and nameMSME <>'', 1, 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and nameMSME <>'', 1, 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and nameMSME <>'', 1, 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and nameMSME <>'', 1, 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and nameMSME <>'', 1, 0 ) ) AS numYr6
								FROM `tbl_bankloans` 
								where 130=130
								and `recipientSex` like 'M%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:130 Number of MSMEs receiving USG.[Sex of owner>>Male]

//Start:131	Number of MSMEs receiving USG...[Sex of owner>>Female]
function NumMSMEsReceivingUSGSexFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 131 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and nameMSME <>'', 1, 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and nameMSME <>'', 1, 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and nameMSME <>'', 1, 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and nameMSME <>'', 1, 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and nameMSME <>'', 1, 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and nameMSME <>'', 1, 0 ) ) AS numYr6
								FROM `tbl_bankloans` 
								where 131=131
								and `recipientSex` like 'F%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:131 Number of MSMEs receiving USG.[Sex of owner>>Female]

//Start:132	Number of MSMEs receiving USG...[Sex of owner>>Joint]
function NumMSMEsReceivingUSGSexJoint($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 132 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and nameMSME <>'', 1, 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and nameMSME <>'', 1, 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and nameMSME <>'', 1, 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and nameMSME <>'', 1, 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and nameMSME <>'', 1, 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and nameMSME <>'', 1, 0 ) ) AS numYr6
								FROM `tbl_bankloans` 
								where 132=132
								and `recipientSex` like 'J%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:132 Number of MSMEs receiving USG.[Sex of owner>>Joint]

//Start:133	Number of MSMEs receiving USG...[Sex of owner>>NA]
function NumMSMEsReceivingUSGSexNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 133 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and nameMSME <>'', 1, 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and nameMSME <>'', 1, 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and nameMSME <>'', 1, 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and nameMSME <>'', 1, 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and nameMSME <>'', 1, 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and nameMSME <>'', 1, 0 ) ) AS numYr6
								FROM `tbl_bankloans` 
								where 133=133
								and `recipientSex` like 'n/a%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:133 Number of MSMEs receiving USG.[Sex of owner>>NA]

//Start:134	Number of MSMEs receiving USG...[Sex of owner>>DNA]
function NumMSMEsReceivingUSGSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 134 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and nameMSME <>'', 1, 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and nameMSME <>'', 1, 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and nameMSME <>'', 1, 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and nameMSME <>'', 1, 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and nameMSME <>'', 1, 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and nameMSME <>'', 1, 0 ) ) AS numYr6
								FROM `tbl_bankloans` 
								where 134=134
								and `recipientSex` not like 'M%'
								and `recipientSex` not like 'F%'
								and `recipientSex` not like 'J%'
								and `recipientSex` not like 'n/a%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:134 Number of MSMEs receiving USG.[Sex of owner>>DNA]

//Start:135	Number of MSMEs, including farmers,...[Size of MSME>>Micro]
function NumMSMEsIncludingFarmersSizeMicro($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 135 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 135=135
								and numOfEmployee <=> 0 ";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:135 Number of MSMEs, including farmers,...[Size of MSME>>Micro]

//Start:136	Number of MSMEs, including farmers,...[Size of MSME>>Small]
function NumMSMEsIncludingFarmersSizeSmall($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 136 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 136=136
								and numOfEmployee  between 1 and 5 ";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:136 Number of MSMEs, including farmers,...[Size of MSME>>Small]

//Start:137	Number of MSMEs, including farmers,...[Size of MSME>>Medium]
function NumMSMEsIncludingFarmersSizeMedium($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 137 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 137=137
								and numOfEmployee  between 6 and 10 ";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:137 Number of MSMEs, including farmers,...[Size of MSME>>Medium]

//Start:138	Number of MSMEs, including farmers,...[Size of MSME>>DNA]
function NumMSMEsIncludingFarmersSizeDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 138 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 138=138
								and numOfEmployee  >= 11 ";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:138 Number of MSMEs, including farmers,...[Size of MSME>>DNA]

//Start:139	Number of MSMEs, including farmers,...[Sex>>Male]
function NumMSMEsIncludingFarmersSexMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 139 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 139=139
								and sexOfMSME like 'M%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:139 Number of MSMEs, including farmers,...[Sex>>Male]

//Start:140	Number of MSMEs, including farmers,...[Sex>>Female]
function NumMSMEsIncludingFarmersSexeFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 140 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 140=140
								and sexOfMSME like 'F%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:140 Number of MSMEs, including farmers,...[Sex>>Female]

//Start:141	Number of MSMEs, including farmers,...[Sex>>Joint]
function NumMSMEsIncludingFarmersSexJoint($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 141 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 141=141
								and sexOfMSME like 'J%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:141 Number of MSMEs, including farmers,...[Sex>>Joint]

//Start:142	Number of MSMEs, including farmers,...[Sex>>NA]
function NumMSMEsIncludingFarmersSexNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 142 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 142=142
								and sexOfMSME like 'n/a%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:142 Number of MSMEs, including farmers,...[Sex>>NA]

//Start:143	Number of MSMEs, including farmers,...[Sex>>DNA]
function NumMSMEsIncludingFarmersSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 143 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 143=143
								and sexOfMSME not like 'M%'
								and sexOfMSME not like 'F%'
								and sexOfMSME not like 'J%'
								and sexOfMSME not like 'n/a%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:143 Number of MSMEs, including farmers,...[Sex>>DNA]

//Start:144	Number of MSMEs, including farmers,...[	MSME Type>>Agricultural producer]
function NumMSMEsIncludingFarmersMsmeTypeProducer($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 144 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 144=144
								and typeOfActorServiced like 'Farmers%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:144 Number of MSMEs, including farmers,...[MSME Type>>Agricultural producer]

//Start:145	Number of MSMEs, including farmers,...[	MSME Type>>Input supplier]
function NumMSMEsIncludingFarmersMsmeTypeSupplier($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 145 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 145=145
								and typeOfActorServiced like 'Input supplier%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:145 Number of MSMEs, including farmers,...[MSME Type>>Input supplier]

//Start:146	Number of MSMEs, including farmers,...[	MSME Type>>Trader]
function NumMSMEsIncludingFarmersMsmeTypeTrader($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 146 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 146=146
								and typeOfActorServiced like 'Traders%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:146 Number of MSMEs, including farmers,...[MSME Type>>Trader]

//Start:147	Number of MSMEs, including farmers,...[	MSME Type>>Output processors]
function NumMSMEsIncludingFarmersMsmeTypeProcessors($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 147 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 147=147
								and typeOfActorServiced like 'Exporters%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:147 Number of MSMEs, including farmers,...[MSME Type>>Output processors]

//Start:148	Number of MSMEs, including farmers,...[	MSME Type>>Non agriculture]
function NumMSMEsIncludingFarmersMsmeTypeNonAgriculture($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 148 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 148=148
								and typeOfActorServiced like 'Non agriculture%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:148 Number of MSMEs, including farmers,...[MSME Type>>Non agriculture]

//Start:149	Number of MSMEs, including farmers,...[	MSME Type>>Other]
function NumMSMEsIncludingFarmersMsmeTypeOther($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 149 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 149=149
								and typeOfActorServiced like 'Other%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:149 Number of MSMEs, including farmers,...[MSME Type>>Other]

//Start:150	Number of MSMEs, including farmers,...[	MSME Type>>DNA]
function NumMSMEsIncludingFarmersMsmeTypeDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 150 as level_two_sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
								FROM `tbl_businessdev` 
								where 150=150
								and typeOfActorServiced not like 'Farmers%'
								and typeOfActorServiced not like 'Input supplier%'
								and typeOfActorServiced not like 'Traders%'
								and typeOfActorServiced not like 'Exporters%'
								and typeOfActorServiced not like 'Non agriculture%'
								and typeOfActorServiced not like 'Other%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numYr1=$result['numYr1'];
								$numYr2=$result['numYr2'];
								$numYr3=$result['numYr3'];
								$numYr4=$result['numYr4'];
								$numYr5=$result['numYr5'];
								$numYr6=$result['numYr6'];
								
								$result['actualYr1'] = $numYr1;
								$result['actualYr2'] = $numYr2;
								$result['actualYr3'] = $numYr3;
								$result['actualYr4'] = $numYr4;
								$result['actualYr5'] = $numYr5;
								$result['actualYr6'] = $numYr6;
								
								return $result[$resultValue];
							}
//End:150 Number of MSMEs, including farmers,...[MSME Type>>DNA]

//Start:151 	Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice>>Agriculture]
function RiskReducingPracticesTypeAgriculture($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
								//Data source not clear
								$riskReducingPracticeYr1 = '';
								$riskReducingPracticeYr2 = '';
								$riskReducingPracticeYr3 = '';
								$riskReducingPracticeYr4 = '';
								$riskReducingPracticeYr5 = '';
								$riskReducingPracticeYr6 = '';

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(151);
								$query=@Execute($st) or die(http("DM-1683"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								
								
								$result['actualYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
								$result['actualYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
								$result['actualYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
								$result['actualYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
								$result['actualYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
								$result['actualYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
//End:151 Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice>>Agriculture]

//Start:152 	Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice>>Water]
function RiskReducingPracticesTypeWater($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
								//--------Form 6 Qn 3 and 4---------------------------
								$x="SELECT 152 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
								from `tbl_frm6particulars` as `p` 
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 152=152
								and `q`.`implemented_mgt_climate_action` like '%2%'
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$riskReducingPracticeYr1=$result['riskReducingPracticeYr1'];
								$riskReducingPracticeYr2=$result['riskReducingPracticeYr2'];
								$riskReducingPracticeYr3=$result['riskReducingPracticeYr3'];
								$riskReducingPracticeYr4=$result['riskReducingPracticeYr4'];
								$riskReducingPracticeYr5=$result['riskReducingPracticeYr5'];
								$riskReducingPracticeYr6=$result['riskReducingPracticeYr6'];

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(152);
								$query=@Execute($st) or die(http("DM-1683"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								
								
								$result['actualYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
								$result['actualYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
								$result['actualYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
								$result['actualYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
								$result['actualYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
								$result['actualYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
//End:152 Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice>>Water]

//Start:153 	Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice>>Health]
function RiskReducingPracticesTypeHealth($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
								//--------Form 6 Qn 3 and 4---------------------------
								$x="SELECT 153 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
								from `tbl_frm6particulars` as `p` 
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 153=153
								&& `q`.`implemented_mgt_climate_action` like '%1%'
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$riskReducingPracticeYr1=$result['riskReducingPracticeYr1'];
								$riskReducingPracticeYr2=$result['riskReducingPracticeYr2'];
								$riskReducingPracticeYr3=$result['riskReducingPracticeYr3'];
								$riskReducingPracticeYr4=$result['riskReducingPracticeYr4'];
								$riskReducingPracticeYr5=$result['riskReducingPracticeYr5'];
								$riskReducingPracticeYr6=$result['riskReducingPracticeYr6'];

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(153);
								$query=@Execute($st) or die(http("DM-1683"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								
								
								$result['actualYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
								$result['actualYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
								$result['actualYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
								$result['actualYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
								$result['actualYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
								$result['actualYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
//End:153 Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice>>Health]

//Start:154 	Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice>>Disaster Risk Management]
function RiskReducingPracticesTypeDisasterRiskManagement($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
								//--------Form 6 Qn 3 and 4---------------------------
								$x="SELECT 154 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
								from `tbl_frm6particulars` as `p` 
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 154=154
								&& `q`.`implemented_mgt_climate_action` like '%3%'
								|| `q`.`implemented_mgt_climate_action` like '%4%'
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$riskReducingPracticeYr1=$result['riskReducingPracticeYr1'];
								$riskReducingPracticeYr2=$result['riskReducingPracticeYr2'];
								$riskReducingPracticeYr3=$result['riskReducingPracticeYr3'];
								$riskReducingPracticeYr4=$result['riskReducingPracticeYr4'];
								$riskReducingPracticeYr5=$result['riskReducingPracticeYr5'];
								$riskReducingPracticeYr6=$result['riskReducingPracticeYr6'];

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(154);
								$query=@Execute($st) or die(http("DM-1683"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								
								
								$result['actualYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
								$result['actualYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
								$result['actualYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
								$result['actualYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
								$result['actualYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
								$result['actualYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
//End:154 Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice>>Disaster Risk Management]

//Start:155 	Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice>>Urban]
function RiskReducingPracticesTypeUrban($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
								//--------Form 6 Qn 3 and 4---------------------------
								//Data source not clear
								$riskReducingPracticeYr1 = '';
								$riskReducingPracticeYr2 = '';
								$riskReducingPracticeYr3 = '';
								$riskReducingPracticeYr4 = '';
								$riskReducingPracticeYr5 = '';
								$riskReducingPracticeYr6 = '';

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(155);
								$query=@Execute($st) or die(http("DM-1683"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								
								
								$result['actualYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
								$result['actualYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
								$result['actualYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
								$result['actualYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
								$result['actualYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
								$result['actualYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
//End:155 Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice>>Urban]

//Start:156 	Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice>>Other]
function RiskReducingPracticesTypeOther($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
								//--------Form 6 Qn 3 and 4---------------------------
								$x="SELECT 154 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
								from `tbl_frm6particulars` as `p` 
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 154=154
								&& `q`.`implemented_mgt_climate_action` like '%6%'
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$riskReducingPracticeYr1=$result['riskReducingPracticeYr1'];
								$riskReducingPracticeYr2=$result['riskReducingPracticeYr2'];
								$riskReducingPracticeYr3=$result['riskReducingPracticeYr3'];
								$riskReducingPracticeYr4=$result['riskReducingPracticeYr4'];
								$riskReducingPracticeYr5=$result['riskReducingPracticeYr5'];
								$riskReducingPracticeYr6=$result['riskReducingPracticeYr6'];

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(156);
								$query=@Execute($st) or die(http("DM-1683"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								
								
								$result['actualYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
								$result['actualYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
								$result['actualYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
								$result['actualYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
								$result['actualYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
								$result['actualYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
//End:156 Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice>>Other]

//Start:157 	Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice>>DNA]
function RiskReducingPracticesTypeDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
								//--------Form 6 Qn 3 and 4---------------------------
								$x="SELECT 157 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
								from `tbl_frm6particulars` as `p` 
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 157=157
								&& `q`.`implemented_mgt_climate_action` like '%1%'
								&& `q`.`implemented_mgt_climate_action` like '%2%'
								&& `q`.`implemented_mgt_climate_action` like '%3%'
								&& `q`.`implemented_mgt_climate_action` like '%4%'
								&& `q`.`implemented_mgt_climate_action` like '%5%'
								&& `q`.`implemented_mgt_climate_action` like '%6%'
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$riskReducingPracticeYr1=$result['riskReducingPracticeYr1'];
								$riskReducingPracticeYr2=$result['riskReducingPracticeYr2'];
								$riskReducingPracticeYr3=$result['riskReducingPracticeYr3'];
								$riskReducingPracticeYr4=$result['riskReducingPracticeYr4'];
								$riskReducingPracticeYr5=$result['riskReducingPracticeYr5'];
								$riskReducingPracticeYr6=$result['riskReducingPracticeYr6'];

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(157);
								$query=@Execute($st) or die(http("DM-1683"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								
								
								$result['actualYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
								$result['actualYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
								$result['actualYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
								$result['actualYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
								$result['actualYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
								$result['actualYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
//End:157 Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice>>DNA]

//Start:158 	Number of stakeholders implementing risk-reducing...[Sex>>Male]
function RiskReducingPracticesSexMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
								//--------Form 6 Qn 3 and 4---------------------------
								$x="SELECT 158 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 158=158
								and `f`.`farmersSex` like 'M%'
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$riskReducingPracticeYr1=$result['riskReducingPracticeYr1'];
								$riskReducingPracticeYr2=$result['riskReducingPracticeYr2'];
								$riskReducingPracticeYr3=$result['riskReducingPracticeYr3'];
								$riskReducingPracticeYr4=$result['riskReducingPracticeYr4'];
								$riskReducingPracticeYr5=$result['riskReducingPracticeYr5'];
								$riskReducingPracticeYr6=$result['riskReducingPracticeYr6'];

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(158);
								$query=@Execute($st) or die(http("DM-1683"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								$result['actualYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
								$result['actualYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
								$result['actualYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
								$result['actualYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
								$result['actualYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
								$result['actualYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
//End:158 Number of stakeholders implementing risk-reducing...[Sex>>Male]

//Start:159 	Number of stakeholders implementing risk-reducing...[Sex>>Female]
function RiskReducingPracticesSexFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
								//--------Form 6 Qn 3 and 4---------------------------
								$x="SELECT 159 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 159=159
								and `f`.`farmersSex` like 'F%'
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$riskReducingPracticeYr1=$result['riskReducingPracticeYr1'];
								$riskReducingPracticeYr2=$result['riskReducingPracticeYr2'];
								$riskReducingPracticeYr3=$result['riskReducingPracticeYr3'];
								$riskReducingPracticeYr4=$result['riskReducingPracticeYr4'];
								$riskReducingPracticeYr5=$result['riskReducingPracticeYr5'];
								$riskReducingPracticeYr6=$result['riskReducingPracticeYr6'];

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(159);
								$query=@Execute($st) or die(http("DM-1683"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								$result['actualYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
								$result['actualYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
								$result['actualYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
								$result['actualYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
								$result['actualYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
								$result['actualYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
//End:159 Number of stakeholders implementing risk-reducing...[Sex>>Female]

//Start:160 	Number of stakeholders implementing risk-reducing...[Sex>>DNA]
function RiskReducingPracticesSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
								//--------Form 6 Qn 3 and 4---------------------------
								$x="SELECT 160 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 160=160
								and `f`.`farmersSex` not like 'M%'
								and `f`.`farmersSex` not like 'F%'
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$riskReducingPracticeYr1=$result['riskReducingPracticeYr1'];
								$riskReducingPracticeYr2=$result['riskReducingPracticeYr2'];
								$riskReducingPracticeYr3=$result['riskReducingPracticeYr3'];
								$riskReducingPracticeYr4=$result['riskReducingPracticeYr4'];
								$riskReducingPracticeYr5=$result['riskReducingPracticeYr5'];
								$riskReducingPracticeYr6=$result['riskReducingPracticeYr6'];

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(160);
								$query=@Execute($st) or die(http("DM-1683"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								$result['actualYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
								$result['actualYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
								$result['actualYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
								$result['actualYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
								$result['actualYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
								$result['actualYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
//End:160 Number of stakeholders implementing risk-reducing...[Sex>>DNA]



//End of dissagregated functionality							
							
}/* end of FtFRepLevelTwoDataMining Class */

?>