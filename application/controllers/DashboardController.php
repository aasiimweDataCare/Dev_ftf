<?php
/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 9/25/2015
 * Time: 11:55 AM
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('form_validation');
        // $this->load->library('email');

        $this->load->model('Dashindicatordetails_model');

        $this->load->model('Dashindicatorone_model');
        $this->load->model('Dashindicatortwo_model');
        $this->load->model('Dashindicatorthree_model');
        $this->load->model('Dashindicatorfour_model');
        $this->load->model('Dashindicatorfive_model');
        $this->load->model('Dashindicatorsix_model');
        $this->load->model('Dashindicatorseven_model');
        $this->load->model('Dashindicatoreight_model');
        $this->load->model('Dashindicatornine_model');
        $this->load->model('Dashindicatorten_model');
        $this->load->model('Dashindicatortwelve_model');
        $this->load->model('Dashindicatorthirteen_model');
        $this->load->model('Dashindicatorincreamental_model');
        $this->load->model('Dashindicatorgrossmargin_model');
        $this->load->model('Dashboardindicator_risk_model');
        $this->load->model('Menu_model');

        $this->load->library('pagination');
    }


    public function index()
    {
        /*$this->email->from('aasiimwe@dcareug.com', 'Asiimwe Apollo');
        $this->email->to('xarafire@gmail.com');
        $this->email->cc('dkyeyune@dcareug.com');
        $this->email->bcc('aatwiine@dcareug.com');
        $this->email->subject('Dashboard Email Test');
        $this->email->message('Testing the email class for the  Dashboard.');
        $this->email->attach(''.$_SERVER["DOCUMENT_ROOT"].'/assets/images/email_graphs/1_Farmers Trained.png'); // attach file
        $this->email->attach(''.$_SERVER["DOCUMENT_ROOT"].'/assets/images/email_graphs/2_Hectares Under Production.png');
        $this->email->send();*/

        /*start to fetch indicator details*/
        $data['data_get_i1_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(1);
        $data['data_get_i1_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(25);
        $data['data_get_i1_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(1);
        $data['data_get_i2_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(2);
        $data['data_get_i2_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(2);
        $data['data_get_i2_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(2);
        $data['data_get_i3_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(3);
        $data['data_get_i3_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(3);
        $data['data_get_i3_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(3);
        $data['data_get_i4_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(4);
        $data['data_get_i4_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(4);
        $data['data_get_i4_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(4);
        $data['data_get_i5_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(5);
        $data['data_get_i5_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(5);
        $data['data_get_i5_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(5);
        $data['data_get_i6_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(6);
        $data['data_get_i6_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(6);
        $data['data_get_i6_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(6);
        $data['data_get_i7_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(7);
        $data['data_get_i7_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(7);
        $data['data_get_i7_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(7);
        $data['data_get_i8_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(8);
        $data['data_get_i8_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(8);
        $data['data_get_i8_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(8);
        $data['data_get_i9_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(9);
        $data['data_get_i9_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(9);
        $data['data_get_i9_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(9);
        $data['data_get_i10_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(10);
        $data['data_get_i10_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(10);
        $data['data_get_i10_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(10);
        $data['data_get_i11_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(11);
        $data['data_get_i11_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(11);
        $data['data_get_i11_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(11);
        $data['data_get_i12_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(12);
        $data['data_get_i12_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(12);
        $data['data_get_i12_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(12);

        $data['data_get_i13_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(13);
        $data['data_get_i13_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(13);
        $data['data_get_i13_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(2);

        $data['data_get_i16_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(16);
        $data['data_get_i16_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(16);
        $data['data_get_i16_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(3);

        $data['data_get_i23_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(23);
        $data['data_get_i23_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(25);
        $data['data_get_i23P_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(2);

        $data['data_get_i24_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(24);
        $data['data_get_i24_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(24);
        $data['data_get_i24M_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(3);


        $data['data_get_i25_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(25);
        $data['data_get_i25_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(7);
        $data['data_get_i25M_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(2);

        $data['data_get_i26_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(26);
        $data['data_get_i26_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(7);
        $data['data_get_i26M_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(2);

        $data['data_get_i27_Details'] = $this->Dashindicatordetails_model->getIndicatorDetails(27);
        $data['data_get_i27_DS'] = $this->Dashindicatordetails_model->getIndicatorDataSourceLinks(7);
        $data['data_get_i27M_RP'] = $this->Dashindicatordetails_model->getIndicatorReportLinks(2);


        /*end of indicator details*/

        $data['data_get_i13_FarmersMale'] = $this->Dashindicatorthirteen_model->getIndicator13farmersMale();
        $data['data_get_i13_FarmersFemale'] = $this->Dashindicatorthirteen_model->getIndicator13farmersFemale();
        $data['data_get_i13_Farmers'] = $this->Dashindicatorthirteen_model->getIndicator13farmers();
        $data['data_get_i13_Farmers_loa'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(12);

        $data['data_get_14ActivityLifeTime'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(14);
        $data['data_get_i1_Traders'] = $this->Dashindicatorone_model->getIndicator1traders();
        $data['data_get_i1_Exporters'] = $this->Dashindicatorone_model->getIndicator1exporters();
        $data['data_get_i1_Partners_loa'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(31);


        $data['data_get_i6_Households'] = $this->Dashindicatorone_model->getIndicator16Ruralhouseholds();
        $data['data_get_i6_Households_loa'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(27);

        $data['data_get_i24_MSMEs'] = $this->Dashindicatorone_model->getIndicator24MSMEs();
        $data['data_get_i24_MSMEs_loa'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(35);

        $data['data_get_i23_Epayments'] = $this->Dashindicatorone_model->getIndicator23Epayments();
        $data['data_get_i23_Epayments_loa'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(34);

        $data['data_get_i1_EpaymentsT'] = $this->Dashindicatorone_model->getIndicator23EpaymentsT();
        $data['data_get_i1_EpaymentsE'] = $this->Dashindicatorone_model->getIndicator23EpaymentsE();


        $data['data_get_i2_Partnerships'] = $this->Dashindicatortwo_model->getIndicator2valuePartnerships();
        $data['data_get_i2_Partnerships_C'] = $this->Dashindicatortwo_model->getIndicator2valuePartnershipsRegion(1);
        $data['data_get_i2_Partnerships_N'] = $this->Dashindicatortwo_model->getIndicator2valuePartnershipsRegion(2);
        $data['data_get_i2_Partnerships_E'] = $this->Dashindicatortwo_model->getIndicator2valuePartnershipsRegion(3);
        $data['data_get_i2_Partnerships_W'] = $this->Dashindicatortwo_model->getIndicator2valuePartnershipsRegion(4);
        $data['data_get_i2_Partnerships_loa'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(32);

        $data['data_get_i3_VolumesPurchased'] = $this->Dashindicatorthree_model->getIndicator3volumesPurchased();

        $data['data_get_i3_VolumesExportedBeans_Frm3'] = $this->Dashindicatorthree_model->getIndicator3volumesExportedBeans_Frm3();
        $data['data_get_i3_VolumesExportedCoffee_Frm3'] = $this->Dashindicatorthree_model->getIndicator3volumesExportedCoffee_Frm3();
        $data['data_get_i3_VolumesExportedMaize_Frm3'] = $this->Dashindicatorthree_model->getIndicator3volumesExportedMaize_Frm3();
        $data['data_get_i3_VolumesExportedBeans_Frm4'] = $this->Dashindicatorthree_model->getIndicator3volumesExportedBeans_Frm4();
        $data['data_get_i3_VolumesExportedCoffee_Frm4'] = $this->Dashindicatorthree_model->getIndicator3volumesExportedCoffee_Frm4();
        $data['data_get_i3_VolumesExportedMaize_Frm4'] = $this->Dashindicatorthree_model->getIndicator3volumesExportedMaize_Frm4();




        $data['data_get_i3_VolumesPurchased_ValueCentral'] = $this->Dashindicatorthree_model->getIndicator3volumesPurchasedValueChain(1);
        $data['data_get_i3_VolumesPurchased_ValueNorth'] = $this->Dashindicatorthree_model->getIndicator3volumesPurchasedValueChain(2);
        $data['data_get_i3_VolumesPurchased_ValueWest'] = $this->Dashindicatorthree_model->getIndicator3volumesPurchasedValueChain(4);
        $data['data_get_i3_VolumesPurchased_ValueEast'] = $this->Dashindicatorthree_model->getIndicator3volumesPurchasedValueChain(3);




        $data['data_get_i3_VolumesPurchased_Central'] = $this->Dashindicatorthree_model->getIndicator3volumesPurchasedRegion(1);
        $data['data_get_i3_VolumesPurchased_North'] = $this->Dashindicatorthree_model->getIndicator3volumesPurchasedRegion(2);
        $data['data_get_i3_VolumesPurchased_West'] = $this->Dashindicatorthree_model->getIndicator3volumesPurchasedRegion(4);
        $data['data_get_i3_VolumesPurchased_East'] = $this->Dashindicatorthree_model->getIndicator3volumesPurchasedRegion(3);


        $data['data_get_i4_VolumesSold_M_C'] = $this->Dashindicatorfour_model->getIndicator4volumesSold_Maize(1);
        $data['data_get_i4_VolumesSold_B_C'] = $this->Dashindicatorfour_model->getIndicator4volumesSold_Beans(1);
        $data['data_get_i4_VolumesSold_C_C'] = $this->Dashindicatorfour_model->getIndicator4volumesSold_Coffee(1);
        $data['data_get_i4_VolumesSold_M_N'] = $this->Dashindicatorfour_model->getIndicator4volumesSold_Maize(2);
        $data['data_get_i4_VolumesSold_B_N'] = $this->Dashindicatorfour_model->getIndicator4volumesSold_Beans(2);
        $data['data_get_i4_VolumesSold_C_N'] = $this->Dashindicatorfour_model->getIndicator4volumesSold_Coffee(2);
        $data['data_get_i4_VolumesSold_M_E'] = $this->Dashindicatorfour_model->getIndicator4volumesSold_Maize(3);
        $data['data_get_i4_VolumesSold_B_E'] = $this->Dashindicatorfour_model->getIndicator4volumesSold_Beans(3);
        $data['data_get_i4_VolumesSold_C_E'] = $this->Dashindicatorfour_model->getIndicator4volumesSold_Coffee(3);
        $data['data_get_i4_VolumesSold_M_W'] = $this->Dashindicatorfour_model->getIndicator4volumesSold_Maize(4);
        $data['data_get_i4_VolumesSold_B_W'] = $this->Dashindicatorfour_model->getIndicator4volumesSold_Beans(4);
        $data['data_get_i4_VolumesSold_C_W'] = $this->Dashindicatorfour_model->getIndicator4volumesSold_Coffee(4);

        $data['data_get_i4_Increment_yr1'] = $this->Dashindicatorincreamental_model->getIndicator14farmersSales('notrainedYr1');
        $data['data_get_i4_Increment_yr2'] = $this->Dashindicatorincreamental_model->getIndicator14farmersSales('notrainedYr2');
        $data['data_get_i4_Increment_yr3'] = $this->Dashindicatorincreamental_model->getIndicator14farmersSales('notrainedYr3');
        $data['data_get_i4_Increment_yr4'] = $this->Dashindicatorincreamental_model->getIndicator14farmersSales('notrainedYr4');
        $data['data_get_i4_Increment_yr5'] = $this->Dashindicatorincreamental_model->getIndicator14farmersSales('notrainedYr5');
        $data['data_get_i4_Increment_yr6'] = $this->Dashindicatorincreamental_model->getIndicator14farmersSales('notrainedYr6');





        $data['data_get_i5_N'] = $this->Dashindicatorfive_model->indicator5_North();
        $data['data_get_i5_W'] = $this->Dashindicatorfive_model->indicator5_West();
        $data['data_get_i5_E'] = $this->Dashindicatorfive_model->indicator5_East();
        $data['data_get_i5_C'] = $this->Dashindicatorfive_model->indicator5_Central();

        $data['data_get_i5_RegionC'] = $this->Dashindicatorfive_model->indicator5_Regionform8(1);
        $data['data_get_i5_RegionN'] = $this->Dashindicatorfive_model->indicator5_Regionform8(2);
        $data['data_get_i5_RegionE'] = $this->Dashindicatorfive_model->indicator5_Regionform8(3);
        $data['data_get_i5_RegionW'] = $this->Dashindicatorfive_model->indicator5_Regionform8(4);





        $data['data_get_i5_FemaleC'] = $this->Dashindicatorfive_model->getindicator5_Female(1);
        $data['data_get_i5_FemaleN'] = $this->Dashindicatorfive_model->getindicator5_Female(2);
        $data['data_get_i5_FemaleE'] = $this->Dashindicatorfive_model->getindicator5_Female(3);
        $data['data_get_i5_FemaleW'] = $this->Dashindicatorfive_model->getindicator5_Female(4);

        $data['data_get_i5_MaleC'] = $this->Dashindicatorfive_model->getindicator5_Male(1);
        $data['data_get_i5_MaleN'] = $this->Dashindicatorfive_model->getindicator5_Male(2);
        $data['data_get_i5_MaleE'] = $this->Dashindicatorfive_model->getindicator5_Male(3);
        $data['data_get_i5_MaleW'] = $this->Dashindicatorfive_model->getindicator5_Male(4);


        $data['data_get_i6_Coffee'] = $this->Dashindicatorsix_model->getIndicator6acreageCoffee();
        $data['data_get_i6_Coffee_2016_onwards'] = $this->Dashindicatorsix_model->getIndicator6acreageCoffeeFY2016Onwards();

        $data['data_get_i6_Maize'] = $this->Dashindicatorsix_model->getIndicator6acreageMaize();
        $data['data_get_i6_Maize_2016_onwards'] = $this->Dashindicatorsix_model->getIndicator6acreageMaizeFY2016Onwards();

        $data['data_get_i6_Beans'] = $this->Dashindicatorsix_model->getIndicator6acreageBeans();
        $data['data_get_i6_Beans_2016_onwards'] = $this->Dashindicatorsix_model->getIndicator6acreageBeansFY2016Onwards();


        $data['data_get_i7_ImprovedSeed_N'] = $this->Dashindicatorseven_model->getIndicator7ImprovedSeed(2);
        $data['data_get_i7_ImprovedSeed_W'] = $this->Dashindicatorseven_model->getIndicator7ImprovedSeed(4);
        $data['data_get_i7_ImprovedSeed_E'] = $this->Dashindicatorseven_model->getIndicator7ImprovedSeed(3);
        $data['data_get_i7_ImprovedSeed_C'] = $this->Dashindicatorseven_model->getIndicator7ImprovedSeed(1);
        $data['data_get_i7_Fertilizer_N'] = $this->Dashindicatorseven_model->getIndicator7Fertilizer(2);
        $data['data_get_i7_Fertilizer_W'] = $this->Dashindicatorseven_model->getIndicator7Fertilizer(4);
        $data['data_get_i7_Fertilizer_E'] = $this->Dashindicatorseven_model->getIndicator7Fertilizer(3);
        $data['data_get_i7_Fertilizer_C'] = $this->Dashindicatorseven_model->getIndicator7Fertilizer(1);
        $data['data_get_i7_Chemical_N'] = $this->Dashindicatorseven_model->getIndicator7Chemical(2);
        $data['data_get_i7_Chemical_W'] = $this->Dashindicatorseven_model->getIndicator7Chemical(4);
        $data['data_get_i7_Chemical_E'] = $this->Dashindicatorseven_model->getIndicator7Chemical(3);
        $data['data_get_i7_Chemical_C'] = $this->Dashindicatorseven_model->getIndicator7Chemical(1);
        $data['data_get_i7_ManagementPractices_N'] = $this->Dashindicatorseven_model->getIndicator7ManagementPractices(2);
        $data['data_get_i7_ManagementPractices_W'] = $this->Dashindicatorseven_model->getIndicator7ManagementPractices(4);
        $data['data_get_i7_ManagementPractices_E'] = $this->Dashindicatorseven_model->getIndicator7ManagementPractices(3);
        $data['data_get_i7_ManagementPractices_C'] = $this->Dashindicatorseven_model->getIndicator7ManagementPractices(1);
        $data['data_get_i7_Machinery_N'] = $this->Dashindicatorseven_model->getIndicator7Machinery(2);
        $data['data_get_i7_Machinery_W'] = $this->Dashindicatorseven_model->getIndicator7Machinery(4);
        $data['data_get_i7_Machinery_E'] = $this->Dashindicatorseven_model->getIndicator7Machinery(3);
        $data['data_get_i7_Machinery_C'] = $this->Dashindicatorseven_model->getIndicator7Machinery(1);
        $data['data_indicator8_Micro'] = $this->Dashindicatoreight_model->Indicator8micro();
        $data['data_indicator8_Small'] = $this->Dashindicatoreight_model->Indicator8small();
        $data['data_indicator8_Medium'] = $this->Dashindicatoreight_model->Indicator8medium();
        $data['data_indicator9_North'] = $this->Dashindicatornine_model->Indicator9north();
        $data['data_indicator9_Central'] = $this->Dashindicatornine_model->Indicator9central();
        $data['data_indicator9_East'] = $this->Dashindicatornine_model->Indicator9east();
        $data['data_indicator9_West'] = $this->Dashindicatornine_model->Indicator9west();
        $data['data_indicator9_N_notrainedYr1'] = $this->Dashindicatornine_model->Indicator9byregion('notrainedYr1');
        $data['data_indicator9_N_notrainedYr2'] = $this->Dashindicatornine_model->Indicator9byregion('notrainedYr2');
        $data['data_indicator9_N_notrainedYr3'] = $this->Dashindicatornine_model->Indicator9byregion('notrainedYr3');
        $data['data_indicator9_N_notrainedYr4'] = $this->Dashindicatornine_model->Indicator9byregion('notrainedYr4');
        $data['data_indicator9_N_notrainedYr5'] = $this->Dashindicatornine_model->Indicator9byregion('notrainedYr5');
        $data['data_indicator9_N_notrainedYr6'] = $this->Dashindicatornine_model->Indicator9byregion('notrainedYr6');


        $data['data_get_i13_Farmers_N'] = $this->Dashindicatorthirteen_model->getIndicator13farmersByRegion(2);
        $data['data_get_i13_Farmers_C'] = $this->Dashindicatorthirteen_model->getIndicator13farmersByRegion(1);
        $data['data_get_i13_Farmers_E'] = $this->Dashindicatorthirteen_model->getIndicator13farmersByRegion(3);
        $data['data_get_i13_Farmers_W'] = $this->Dashindicatorthirteen_model->getIndicator13farmersByRegion(4);

        //----------------akiwanuka-input sales by region-----------------------------------------------
        $data['data_IndicatorTenRegionCentral'] = $this->Dashindicatorten_model->IndicatorTenRegion(1);//-central
        $data['data_IndicatorTenRegionNorth'] = $this->Dashindicatorten_model->IndicatorTenRegion(2);//North
        $data['data_IndicatorTenRegionEast'] = $this->Dashindicatorten_model->IndicatorTenRegion(3);//East
        $data['data_IndicatorTenRegionWest'] = $this->Dashindicatorten_model->IndicatorTenRegion(4);//West
        $data['data_IndicatorTenDistrict'] = $this->Dashindicatorten_model->IndicatorTenDistrict();
        //-----------market sales- by regions--------
        $data['data_IndicatorTwelveRegionCentral'] = $this->Dashindicatortwelve_model->IndicatorTwelveRegion(1);
        $data['data_IndicatorTwelveRegionNorth'] = $this->Dashindicatortwelve_model->IndicatorTwelveRegion(2);
        $data['data_IndicatorTwelveRegionEast'] = $this->Dashindicatortwelve_model->IndicatorTwelveRegion(3);
        $data['data_IndicatorTwelveRegionWest'] = $this->Dashindicatortwelve_model->IndicatorTwelveRegion(4);
        //------------end of Market sales regions---------
        $data['data_IndicatorTwelveDistrict'] = $this->Dashindicatortwelve_model->IndicatorTwelveDistrict();

        $data['dashindicatorIncreamentalSalesMaize_C'] = $this->Dashindicatorincreamental_model->getIndicator14farmersByRegionMaize(1);
        $data['dashindicatorIncreamentalSalesCoffee_C'] = $this->Dashindicatorincreamental_model->getIndicator14farmersByRegionCoffee(1);
        $data['dashindicatorIncreamentalSalesBeans_C'] = $this->Dashindicatorincreamental_model->getIndicator14farmersByRegionBeans(1);

        $data['dashindicatorIncreamentalSalesMaize_N'] = $this->Dashindicatorincreamental_model->getIndicator14farmersByRegionMaize(2);
        $data['dashindicatorIncreamentalSalesCoffee_N'] = $this->Dashindicatorincreamental_model->getIndicator14farmersByRegionCoffee(2);
        $data['dashindicatorIncreamentalSalesBeans_N'] = $this->Dashindicatorincreamental_model->getIndicator14farmersByRegionBeans(2);

        $data['dashindicatorIncreamentalSalesMaize_W'] = $this->Dashindicatorincreamental_model->getIndicator14farmersByRegionMaize(4);
        $data['dashindicatorIncreamentalSalesCoffee_W'] = $this->Dashindicatorincreamental_model->getIndicator14farmersByRegionCoffee(4);
        $data['dashindicatorIncreamentalSalesBeans_W'] = $this->Dashindicatorincreamental_model->getIndicator14farmersByRegionBeans(4);

        $data['dashindicatorIncreamentalSalesMaize_E'] = $this->Dashindicatorincreamental_model->getIndicator14farmersByRegionMaize(3);
        $data['dashindicatorIncreamentalSalesCoffee_E'] = $this->Dashindicatorincreamental_model->getIndicator14farmersByRegionCoffee(3);
        $data['dashindicatorIncreamentalSalesBeans_E'] = $this->Dashindicatorincreamental_model->getIndicator14farmersByRegionBeans(3);
        $data['dashindicatorIncreamentalFactor'] = $this->Dashindicatorincreamental_model->getIndicator14incrementalfactor();


        $data['notrainedBeansYr1'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandBeans('notrainedYr1');
        $data['notrainedBeansYr2'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandBeans('notrainedYr2');
        $data['notrainedBeansYr3'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandBeans('notrainedYr3');
        $data['notrainedBeansYr4'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandBeans('notrainedYr4');
        $data['notrainedBeansYr5'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandBeans('notrainedYr5');
        $data['notrainedBeansYr6'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandBeans('notrainedYr6');

        $data['notrainedCoffeeYr1'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandCoffee('notrainedYr1');
        $data['notrainedCoffeeYr2'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandCoffee('notrainedYr2');
        $data['notrainedCoffeeYr3'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandCoffee('notrainedYr3');
        $data['notrainedCoffeeYr4'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandCoffee('notrainedYr4');
        $data['notrainedCoffeeYr5'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandCoffee('notrainedYr5');
        $data['notrainedCoffeeYr6'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandCoffee('notrainedYr6');

        $data['notrainedMaizeYr1'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandMaize('notrainedYr1');
        $data['notrainedMaizeYr2'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandMaize('notrainedYr2');
        $data['notrainedMaizeYr3'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandMaize('notrainedYr3');
        $data['notrainedMaizeYr4'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandMaize('notrainedYr4');
        $data['notrainedMaizeYr5'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandMaize('notrainedYr5');
        $data['notrainedMaizeYr6'] = $this->Dashindicatorgrossmargin_model->grossMarginPerUnitOfLandMaize('notrainedYr6');

        $data['riskReducingPracticeC'] = $this->Dashboardindicator_risk_model->getIndicatorRiskByRegion(1);
        $data['riskReducingPracticeN'] = $this->Dashboardindicator_risk_model->getIndicatorRiskByRegion(2);
        $data['riskReducingPracticeE'] = $this->Dashboardindicator_risk_model->getIndicatorRiskByRegion(3);
        $data['riskReducingPracticeW'] = $this->Dashboardindicator_risk_model->getIndicatorRiskByRegion(4);


        $data['riskReducingPracticeBeansC'] = $this->Dashboardindicator_risk_model->getIndicatorRiskBeansByRegion(1);
        $data['riskReducingPracticeBeansN'] = $this->Dashboardindicator_risk_model->getIndicatorRiskBeansByRegion(2);
        $data['riskReducingPracticeBeansE'] = $this->Dashboardindicator_risk_model->getIndicatorRiskBeansByRegion(3);
        $data['riskReducingPracticeBeansW'] = $this->Dashboardindicator_risk_model->getIndicatorRiskBeansByRegion(4);

        $data['riskReducingPracticeCoffeeC'] = $this->Dashboardindicator_risk_model->getIndicatorRiskCoffeeByRegion(1);
        $data['riskReducingPracticeCoffeeN'] = $this->Dashboardindicator_risk_model->getIndicatorRiskCoffeeByRegion(2);
        $data['riskReducingPracticeCoffeeE'] = $this->Dashboardindicator_risk_model->getIndicatorRiskCoffeeByRegion(3);
        $data['riskReducingPracticeCoffeeW'] = $this->Dashboardindicator_risk_model->getIndicatorRiskCoffeeByRegion(4);

        $data['riskReducingPracticeMaizeC'] = $this->Dashboardindicator_risk_model->getIndicatorRiskMaizeByRegion(1);
        $data['riskReducingPracticeMaizeN'] = $this->Dashboardindicator_risk_model->getIndicatorRiskMaizeByRegion(2);
        $data['riskReducingPracticeMaizeE'] = $this->Dashboardindicator_risk_model->getIndicatorRiskMaizeByRegion(3);
        $data['riskReducingPracticeMaizeW'] = $this->Dashboardindicator_risk_model->getIndicatorRiskMaizeByRegion(4);

        $data['market_prices'] = $this->Dashindicatorone_model->getIndicator12MarketPrices();

        $data['data_get_i2_jobs_attributedyr1'] = $this->Dashindicatortwo_model->jobsAttributedToFtFImplementation('notrainedYr1');
        $data['data_get_i2_jobs_attributedyr2'] = $this->Dashindicatortwo_model->jobsAttributedToFtFImplementation('notrainedYr2');
        $data['data_get_i2_jobs_attributedyr3'] = $this->Dashindicatortwo_model->jobsAttributedToFtFImplementation('notrainedYr3');
        $data['data_get_i2_jobs_attributedyr4'] = $this->Dashindicatortwo_model->jobsAttributedToFtFImplementation('notrainedYr4');
        $data['data_get_i2_jobs_attributedyr5'] = $this->Dashindicatortwo_model->jobsAttributedToFtFImplementation('notrainedYr5');
        $data['data_get_i2_jobs_attributedyr6'] = $this->Dashindicatortwo_model->jobsAttributedToFtFImplementation('notrainedYr6');
        $data['data_get_i2_value_of_partnership'] = $this->Dashindicatortwo_model->getIndicator2valuePartnershipsAll();


        $data['data_get_i2_jobs_ActivityLifeTime'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(28);
        $data['data_get_i4_jobs_ActivityLifeTime'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(33);
        $data['data_get_i13_jobs_ActivityLifeTime'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(12);
        $data['data_get_i15_jobs_ActivityLifeTime'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(15);
        $data['data_get_i8_jobs_ActivityLifeTime'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(29);
        $data['data_get_i6_jobs_ActivityLifeTime'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(20);
        $data['data_get_i10_jobs_ActivityLifeTime'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(22);
        $data['data_get_i3_jobs_ActivityLifeTime'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(33);

        $data['data_get_i26_jobs_ActivityLifeTime'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(13);
        $data['data_get_i27_jobs_ActivityLifeTime'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(40);
        $data['data_get_i15_youth'] = $this->Dashindicatorone_model->getIndicator15Youth();
        $data['data_get_i28_jobs_ActivityLifeTime'] = $this->Dashindicatorone_model->getIndicatorActivityLifeTime(26);












        //-----------------akiwanuka-----------------------------------------------

        $data['data_get_cat'] = $this->Menu_model->Categories();
        $data['data_get_subCat'] = $this->Menu_model->SubCategories();
        $this->load->view('header');
        $this->load->view('left_nav_menu', $data);
        $this->load->view('Dashboard/dashboardImported_view', $data);
        $this->load->view('footer',$data);
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/DashboardController.php */