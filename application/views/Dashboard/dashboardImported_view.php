<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="container-fluid header-bottom">
                        <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-kiri" id="bottom_menu">
                                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                <li>
                                    <a href="<?= prep_url(oldsite_url) ?>index.php?u_id=<?= $this->session->userdata['user_id']; ?>"
                                       target="_blank"><i
                                            class="fa fa-wrench"></i>MEL-System</a></li>
                                <!--<li class="dropdown">
                                    <a href="<? /*= site_url() */ ?>/pages/indicator_tables.php"
                                       class="dropdown-toggle" data-toggle="dropdown"
                                       role="button"
                                       aria-expanded="false"><i class="fa fa-table"></i>
                                        Data Tables <span class="caret"></span></a>
                                    <ul class="dropdown-menu menu-top-front" role="menu">
                                        <li><a href="<? /*= site_url() */ ?>/pages/indicator_tables.php">Tracking
                                                Table</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">One more separated link</a></li>
                                    </ul>
                                </li>-->

                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--start brief-panels row one-->
    <div class="row">
        <!--start number of farmers-->
        <div class="col-sm-3 dashboard-panel">
            <div class="panel panel-blue">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-user fa-3x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <?php
                            foreach ($data_get_i13_Farmers as $rows) {
                                $Farmers = $rows->numFarmers;
                            }

                            //$numPartners = ($Traders + $Exporters);
                            /*start details*/
                            foreach ($data_get_i13_Details as $rows) {
                                $i13_name = $rows->indicator_name;
                                $i13_name_modal = $rows->indicator_modal_name;
                                $i13_name_formula = $rows->indicator_formula;
                                $i13_aria_label = $rows->indicator_aria_label;
                            }
                            /*end details*/
                            ?>

                            <div class="huge"><?= number_format($Farmers); ?></div>
                            <div style="white-space: nowrap;">N<u>o</u> of Farmers</div>
                            <?php

                            foreach ($data_get_i13_Farmers_loa as $row_i13_loa) {
                                /*$i13_target = $row_i13_loa->loat;*/
                                $i13_target = '400000';
                                $i13_actual = $Farmers;//$row_i13_loa->fy5_A;
                                $i13_percent = (($i13_actual / $i13_target) * 100);
                                switch (true) {
                                    case($i13_percent > 50):
                                        $i13_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-up' aria-hidden='true'></i>";
                                        break;
                                    default:
                                        $i13_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-down' aria-hidden='true'></i>";
                                        break;
                                }

                            }

                            foreach ($data_get_i13_FarmersMale as $row_i13_male) {
                                $i13_male = $row_i13_male->numFarmersMale;
                            }

                            foreach ($data_get_i13_FarmersFemale as $row_i13_Female) {
                                $i13_female = $row_i13_Female->numFarmersFemale;
                            }

                            ?>
                            <table class="table table-bordered col-xs-12 text-right table-condensed">
                                <thead>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>LOAT</th>
                                    <th>LOAA</th>
                                    <th>%</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>Male</th>
                                    <td>-</td>
                                    <td><?= number_format($i13_male); ?></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th>Female</th>
                                    <td>-</td>
                                    <td><?= number_format($i13_female); ?></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td><?= number_format($i13_target); ?></td>
                                    <td><?= number_format($i13_actual); ?></td>
                                    <td><?= number_format($i13_percent) . $i13_percentage_progress; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                            data-toggle="modal" data-target="#<?= $i13_name_modal; ?>">
                        View Details
                        <span class="pull-left"></span>
                        <span><i class="fa fa-arrow-circle-right"></i></span>
                    </button>

                    <!--Start Partners Modal -->
                    <div class="modal fade " id="<?= $i13_name_modal; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="<?= $i13_aria_label; ?>"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="<?= $i13_aria_label; ?>"><?= $i13_name; ?></h4>
                                </div>
                                <div class="tabbable">
                                    <div class="modal-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#1" data-toggle="tab">Data Sources</a></li>
                                            <li><a href="#2" data-toggle="tab">Reports</a></li>

                                        </ul>

                                        <!--Start Tab panes -->
                                        <div class="tab-content">
                                            <!--start pane on data-sources-->
                                            <div class="tab-pane active" id="1">
                                                <div class="clearfix"></div>
                                                <h5 class="text-center"><b><?= $i13_name; ?></b> =
                                                    (<?= $i13_name_formula; ?>)</h5>
                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                    <tr>
                                                        <th>Data Source</th>
                                                        <th>Data Link</th>
                                                        <th class="text-right">Values</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    /*start dataSources*/
                                                    foreach ($data_get_i13_DS as $rows) {
                                                        $i13_ds_name = $rows->datasource_name;
                                                        $i13_ds_link = $rows->datasource_link;

                                                        ?>

                                                        <tr>
                                                            <td><?= $i13_ds_name; ?></td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i13_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i13_ds_name; ?> :Data</a></td>

                                                            <!--display the correct figures-->
                                                            <?php

                                                            $data = '<td class="text-right">' . $Farmers . '</td>';
                                                            echo $data;
                                                            ?>
                                                        </tr>


                                                        <?php
                                                    }
                                                    /*end dataSources*/
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end pane on data sources-->

                                            <!--start of pane on reports-->
                                            <div class="tab-pane" id="2">
                                                <div class="clearfix"></div>

                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                    <tr>
                                                        <th>Report Name</th>
                                                        <th>Report Link</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    /*start Reports*/
                                                    foreach ($data_get_i13_RP as $rows) {
                                                        $i13_rp_name = $rows->report_name;
                                                        $i13_rp_link = $rows->report_link;

                                                        ?>

                                                        <tr>
                                                            <td><?= $i13_rp_name; ?></td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i13_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i13_rp_name; ?> :</a>
                                                            </td>
                                                        </tr>


                                                        <?php
                                                    }
                                                    /*end Reports*/
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end of pane on reports-->

                                        </div>
                                        <!--end of tab panes-->
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Partners Modal -->
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
        <!--end number of farmers-->
        <!--start number of partners-->
        <div class="col-sm-3 dashboard-panel">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-users fa-3x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <?php
                            foreach ($data_get_i1_Traders as $rows) {
                                $Traders = $rows->numTraders;
                            }
                            foreach ($data_get_i1_Exporters as $rows) {
                                $Exporters = $rows->numExporters;
                            }
                            $numPartners = ($Traders + $Exporters);
                            foreach ($data_get_i1_Partners_loa as $row_i1_loa) {
                                $i1_target = $row_i1_loa->loat;
                                $i1_actual = $row_i1_loa->fy5_A;
                                $i1_percent = (($i1_actual / $i1_target) * 100);
                            }


                            /*start details*/

                            foreach ($data_get_i1_Details as $rows) {
                                $i1_name = $rows->indicator_name;
                                $i1_name_modal = $rows->indicator_modal_name;
                                $i1_name_formula = $rows->indicator_formula;
                                $i1_aria_label = $rows->indicator_aria_label;
                            }
                            /*end details*/
                            ?>
                            <div class="huge"><?= number_format($i1_actual, 0); ?></div>
                            <div style="white-space: nowrap;">No: <?= $i1_name; ?></div>
                            <?php


                            switch (true) {
                                case($i1_percent > 50):
                                    $i1_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-up' aria-hidden='true'></i>";
                                    break;
                                default:
                                    $i1_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-down' aria-hidden='true'></i>";
                                    break;
                            }


                            ?>
                            <table class="table table-bordered col-xs-12 text-right panel-table">
                                <thead>
                                <tr>
                                    <th>LOAT</th>
                                    <th>LOAA</th>
                                    <th>%</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= number_format($i1_target); ?></td>
                                    <td><?= number_format($i1_actual); ?></td>
                                    <td><?= number_format($i1_percent) . $i1_percentage_progress; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="panel-footer">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                            data-toggle="modal" data-target="#<?= $i1_name_modal; ?>">
                        View Details
                        <span class="pull-left"></span>
                        <span><i class="fa fa-arrow-circle-right"></i></span>
                    </button>

                    <!--Start Partners Modal -->
                    <div class="modal fade " id="<?= $i1_name_modal; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="<?= $i1_aria_label; ?>"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="<?= $i1_aria_label; ?>"><?= $i1_name; ?></h4>
                                </div>
                                <div class="tabbable">
                                    <div class="modal-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#1" data-toggle="tab">Data Sources</a></li>
                                            <li><a href="#2" data-toggle="tab">Reports</a></li>

                                        </ul>

                                        <!--Start Tab panes -->
                                        <div class="tab-content">
                                            <!--start pane on data-sources-->
                                            <div class="tab-pane active" id="1">
                                                <div class="clearfix"></div>
                                                <h5 class="text-center"><b><?= $i1_name; ?></b> =
                                                    (<?= $i1_name_formula; ?>)</h5>
                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                    <tr>
                                                        <th>Data Source</th>
                                                        <th>Data Link</th>
                                                        <th class="text-right">Values</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    /*start dataSources*/
                                                    foreach ($data_get_i1_DS as $rows) {
                                                        $i1_ds_name = $rows->datasource_name;
                                                        $i1_ds_link = $rows->datasource_link;

                                                        ?>

                                                        <tr>
                                                            <td><?= $i1_ds_name; ?></td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i1_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i1_ds_name; ?> :Data</a></td>

                                                            <!--display the correct figures-->
                                                            <?php
                                                            switch ($i1_ds_name) {
                                                                case 'Exporters':
                                                                    $value = number_format($i1_actual);
                                                                    break;
                                                                case 'Traders':
                                                                    $value = number_format($i1_actual);
                                                                    break;
                                                                default:
                                                                    break;
                                                            }
                                                            $data = '<td class="text-right">' . $value . '</td>';
                                                            echo $data;
                                                            ?>
                                                        </tr>


                                                        <?php
                                                    }
                                                    /*end dataSources*/
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end pane on data sources-->

                                            <!--start of pane on reports-->
                                            <div class="tab-pane" id="2">
                                                <div class="clearfix"></div>

                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                    <tr>
                                                        <th>Report Name</th>
                                                        <th>Report Link</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    /*start Reports*/
                                                    foreach ($data_get_i1_RP as $rows) {
                                                        $i1_rp_name = $rows->report_name;
                                                        $i1_rp_link = $rows->report_link;

                                                        ?>

                                                        <tr>
                                                            <td>test</td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i1_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i1_rp_name; ?> :</a>
                                                            </td>
                                                        </tr>


                                                        <?php
                                                    }
                                                    /*end Reports*/
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end of pane on reports-->

                                        </div>
                                        <!--end of tab panes-->
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Partners Modal -->
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
        <!--end number of partners-->
        <!--start value of partnerships-->
        <div class="col-sm-3 dashboard-panel">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-usd fa-3x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <?php
                            /*foreach ($data_get_i2_Partnerships as $rows) {
                                $valuePartnerships = ($rows->valuePartnerships / cpma_dollar_rate);
                            }*/
                            foreach ($data_get_i2_Partnerships_loa as $row_i2_loa) {
                                /*to figure out target for 2014 =?????? 527145*/
                                $i2_target = 10450000;//($row_i2_loa->loat - (527145));
                                /*to figure out actuals for 2014 =?????? 3348283*/
                                $i2_actual = $row_i2_loa->loaa;
                                $i2_percent = ((($data_get_i2_value_of_partnership) / ($i2_target)) * 100);
                            }
                            $valuePartnerships = $i2_actual;

                            /*start details*/
                            foreach ($data_get_i2_Details as $rows) {
                                $i2_name = $rows->indicator_name;
                                $i2_name_modal = $rows->indicator_modal_name;
                                $i2_name_formula = $rows->indicator_formula;
                                $i2_aria_label = $rows->indicator_aria_label;
                            }
                            /*end details*/
                            ?>
                            <div class="huge"><?= number_format($data_get_i2_value_of_partnership); ?> USD</div>
                            <div class="dashboard-panel-small-text" style="white-space: nowrap;"><?= $i2_name; ?></div>
                            <?php
                            switch (true) {
                                case($i2_percent > 50):
                                    $i2_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-up' aria-hidden='true'></i>";
                                    break;
                                default:
                                    $i2_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-down' aria-hidden='true'></i>";
                                    break;
                            }
                            ?>
                            <table class="table table-bordered col-xs-12 text-right panel-table">
                                <thead>
                                <tr>
                                    <th>LOAT</th>
                                    <th>LOAA</th>
                                    <th>%</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= number_format($i2_target); ?></td>
                                    <td><?= number_format($data_get_i2_value_of_partnership); ?></td>
                                    <td style="white-space: nowrap;"><?= number_format($i2_percent) . $i2_percentage_progress; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                            data-toggle="modal" data-target="#<?= $i2_name_modal; ?>">
                        View Details
                        <span class="pull-left"></span>
                        <span><i class="fa fa-arrow-circle-right"></i></span>
                    </button>

                    <!--Start partnerships Modal -->
                    <div class="modal fade " id="<?= $i2_name_modal; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="<?= $i2_aria_label; ?>"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="<?= $i2_aria_label; ?>">
                                        N<sup><u>o</u></sup><?= $i2_name; ?></h4>
                                </div>
                                <div class="tabbable">
                                    <div class="modal-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#ds_<?= $i2_name_modal; ?>" data-toggle="tab">Data
                                                    Sources</a></li>
                                            <li><a href="#rp_<?= $i2_name_modal; ?>" data-toggle="tab">Reports</a></li>

                                        </ul>

                                        <!--Start Tab panes -->
                                        <div class="tab-content">
                                            <!--start pane on data-sources-->
                                            <div class="tab-pane active" id="ds_<?= $i2_name_modal; ?>">
                                                <div class="clearfix"></div>
                                                <h5 class="text-center"><b><?= $i2_name; ?></b> =
                                                    (<?= $i2_name_formula; ?>)</h5>
                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                    <tr>
                                                        <th>Data Source</th>
                                                        <th>Data Link</th>
                                                        <th class="text-right">Values</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    /*start dataSources*/
                                                    foreach ($data_get_i2_DS as $rows) {
                                                        $i2_ds_name = $rows->datasource_name;
                                                        $i2_ds_link = $rows->datasource_link;

                                                        ?>

                                                        <tr>
                                                            <td><?= $i2_ds_name; ?></td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i2_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i2_ds_name; ?> :Data</a></td>
                                                            <td class="text-right"><?= number_format($data_get_i2_value_of_partnership, 1, '.', ',') . ' USD'; ?></td>
                                                        </tr>


                                                        <?php
                                                    }
                                                    /*end dataSources*/
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end pane on data sources-->

                                            <!--start of pane on reports-->
                                            <div class="tab-pane" id="rp_<?= $i2_name_modal; ?>">
                                                <div class="clearfix"></div>

                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                    <tr>
                                                        <th>Report Name</th>
                                                        <th>Report Link</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    /*start Reports*/
                                                    foreach ($data_get_i2_RP as $rows) {
                                                        $i2_rp_name = $rows->report_name;
                                                        $i2_rp_link = $rows->report_link;

                                                        ?>

                                                        <tr>
                                                            <td><?= $i2_rp_name; ?></td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i2_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i2_rp_name; ?> :</a>
                                                            </td>
                                                        </tr>


                                                        <?php
                                                    }
                                                    /*end Reports*/
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end of pane on reports-->

                                        </div>
                                        <!--end of tab panes-->
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End partnerships Modal -->
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--end value of partnerships-->
        <!--start volumes purchased-->
        <div class="col-sm-3 dashboard-panel">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-truck fa-3x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <?php

                            /*start details*/
                            foreach ($data_get_i3_Details as $rows) {
                                $i3_name = $rows->indicator_name;
                                $i3_name_modal = $rows->indicator_modal_name;
                                $i3_name_formula = $rows->indicator_formula;
                                $i3_aria_label = $rows->indicator_aria_label;
                            }
                            /*end details*/

                            foreach ($data_get_i4_jobs_ActivityLifeTime as $rows_life) {
                                $i1_target = $rows_life->loat;
                                $i1_actual = $rows_life->loaa;;
                                $i1_percent = (($i1_actual / $i1_target) * 100); //$rows_life->percentage;


                            }
                            ?>
                            <div
                                class="huge"><?= number_format($i1_actual, 0); ?> MT
                            </div>
                            <div class="dashboard-panel-small-text" style="white-space: nowrap;"><?= $i3_name; ?></div>
                            <?php

                            switch (true) {
                                case($i1_percent > 50):
                                    $i1_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-up' aria-hidden='true'></i>";
                                    break;
                                default:
                                    $i1_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-down' aria-hidden='true'></i>";
                                    break;
                            }
                            ?>
                            <table class="table table-bordered col-xs-12 text-right panel-table">
                                <thead>
                                <tr>
                                    <th>LOAT</th>
                                    <th>LOAA</th>
                                    <th>%</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= number_format($i1_target); ?></td>
                                    <td><?= number_format($i1_actual); ?></td>
                                    <td><?= number_format($i1_percent) . $i1_percentage_progress; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                            data-toggle="modal" data-target="#<?= $i3_name_modal; ?>">
                        View Details
                        <span class="pull-left"></span>
                        <span><i class="fa fa-arrow-circle-right"></i></span>
                    </button>

                    <!--Start volumes purchased Modal -->
                    <div class="modal fade " id="<?= $i3_name_modal; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="<?= $i3_aria_label; ?>"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="dashboard-panel-small-text"
                                        style="white-space: nowrap;"><?= $i3_name; ?></h4>
                                </div>
                                <div class="tabbable">
                                    <div class="modal-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#ds_<?= $i3_name_modal; ?>"
                                                                  data-toggle="tab">Data Sources</a></li>
                                            <li><a href="#rp_<?= $i3_name_modal; ?>" data-toggle="tab">Reports</a>
                                            </li>

                                        </ul>

                                        <!--Start Tab panes -->
                                        <div class="tab-content">
                                            <!--start pane on data-sources-->
                                            <div class="tab-pane active" id="ds_<?= $i3_name_modal; ?>">
                                                <div class="clearfix"></div>
                                                <h5 class="text-center"><b><?= $i3_name; ?></b> =
                                                    (<?= $i3_name_formula; ?>)</h5>
                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                    <tr>
                                                        <th>Data Source</th>
                                                        <th>Data Link</th>
                                                        <th class="text-right">Values</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    /*start dataSources*/
                                                    foreach ($data_get_i3_DS as $rows) {
                                                        $i3_ds_name = $rows->datasource_name;
                                                        $i3_ds_link = $rows->datasource_link;

                                                        ?>

                                                        <tr>
                                                            <td><?= $i3_ds_name; ?></td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i3_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i3_ds_name; ?> :Data</a>
                                                            </td>
                                                            <td class="text-right"><?= number_format(691249, 1, '.', ',') . ' MT'; ?></td>
                                                        </tr>


                                                        <?php
                                                    }
                                                    /*end dataSources*/
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end pane on data sources-->

                                            <!--start of pane on reports-->
                                            <div class="tab-pane" id="rp_<?= $i3_name_modal; ?>">
                                                <div class="clearfix"></div>

                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                    <tr>
                                                        <th>Report Name</th>
                                                        <th>Report Link</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    /*start Reports*/
                                                    foreach ($data_get_i3_RP as $rows) {
                                                        $i3_rp_name = $rows->report_name;
                                                        $i3_rp_link = $rows->report_link;

                                                        ?>

                                                        <tr>
                                                            <td><?= $i3_rp_name; ?></td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i3_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i3_rp_name; ?> :</a>
                                                            </td>
                                                        </tr>


                                                        <?php
                                                    }
                                                    /*end Reports*/
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end of pane on reports-->

                                        </div>
                                        <!--end of tab panes-->
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End volumes purchased Modal -->
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--end volumes purchased-->
    </div>
    <!-- /.row -->
    <!--end brief-panels row one-->
    <!--start brief-panels row two-->
    <div class="row">
        <!--start households-->
        <div class="col-sm-3 dashboard-panel">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <!--<i class="fa fa-money fa-5x"></i>-->
                            <i class="fa fa-home fa-3x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <?php
                            /*start details*/
                            foreach ($data_get_i16_Details as $rows) {
                                $i16_name = $rows->indicator_name;
                                $i16_name_modal = $rows->indicator_modal_name;
                                $i16_name_formula = $rows->indicator_formula;
                                $i16_aria_label = $rows->indicator_aria_label;
                            }
                            foreach ($data_get_i6_Households_loa as $row_i16_loa) {
                                $i16_target = ($row_i16_loa->fy5_T);
                                $i16_actual = ($row_i16_loa->fy5_A);
                                $i16_percent = (($i16_actual / $i16_target) * 100);
                            }
                            /*end details*/
                            ?>

                            <div class="huge"><?= number_format($row_i16_loa->fy5_A, 0); ?></div>
                            <div style="white-space: nowrap;"><?= $i16_name; ?></div>
                            <?php

                            switch (true) {
                                case($i16_percent > 50):
                                    $i16_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-up' aria-hidden='true'></i>";
                                    break;
                                default:
                                    $i16_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-down' aria-hidden='true'></i>";
                                    break;
                            }
                            ?>
                            <table class="table table-bordered col-xs-12 text-right panel-table">
                                <thead>
                                <tr>
                                    <th>LOAT</th>
                                    <th>LOAA</th>
                                    <th>%</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= number_format($i16_target); ?></td>
                                    <td><?= number_format($i16_actual); ?></td>
                                    <td><?= number_format($i16_percent) . $i16_percentage_progress; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                            data-toggle="modal" data-target="#<?= $i16_name_modal; ?>">
                        View Details
                        <span class="pull-left"></span>
                        <span><i class="fa fa-arrow-circle-right"></i></span>
                    </button>

                    <!--Start volumes sold Modal -->
                    <div class="modal fade " id="<?= $i16_name_modal; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="<?= $i16_aria_label; ?>"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="<?= $i16_aria_label; ?>"><?= $i16_name; ?></h4>
                                </div>
                                <div class="tabbable">
                                    <div class="modal-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#ds_<?= $i16_name_modal; ?>"
                                                                  data-toggle="tab">Data Sources</a></li>
                                            <li><a href="#rp_<?= $i16_name_modal; ?>" data-toggle="tab">Reports</a>
                                            </li>

                                        </ul>

                                        <!--Start Tab panes -->
                                        <div class="tab-content">
                                            <!--start pane on data-sources-->
                                            <div class="tab-pane active" id="ds_<?= $i16_name_modal; ?>">
                                                <div class="clearfix"></div>
                                                <h5 class="text-center"><b><?= $i16_name; ?></b> =
                                                    (<?= $i16_name_formula; ?>)</h5>
                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                    <tr>
                                                        <th>Data Source</th>
                                                        <th>Data Link</th>
                                                        <th class="text-right">Values</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    /*start dataSources*/
                                                    foreach ($data_get_i16_DS as $rows) {
                                                        $i16_ds_name = $rows->datasource_name;
                                                        $i16_ds_link = $rows->datasource_link;

                                                        ?>

                                                        <tr>
                                                            <td><?= $i16_ds_name; ?></td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i16_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i16_ds_name; ?> :Data</a>
                                                            </td>
                                                            <td class="text-right"><?= number_format($i16_actual, 1, '.', ','); ?></td>
                                                        </tr>


                                                        <?php
                                                    }
                                                    /*end dataSources*/
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end pane on data sources-->

                                            <!--start of pane on reports-->
                                            <div class="tab-pane" id="rp_<?= $i16_name_modal; ?>">
                                                <div class="clearfix"></div>

                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                    <tr>
                                                        <th>Report Name</th>
                                                        <th>Report Link</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    /*start Reports*/
                                                    foreach ($data_get_i16_RP as $rows) {
                                                        $i16_rp_name = $rows->report_name;
                                                        $i16_rp_link = $rows->report_link;

                                                        ?>

                                                        <tr>
                                                            <td><?= $i16_rp_name; ?></td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i16_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i16_rp_name; ?> :</a>
                                                            </td>
                                                        </tr>


                                                        <?php
                                                    }
                                                    /*end Reports*/
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end of pane on reports-->

                                        </div>
                                        <!--end of tab panes-->
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End volumessold Modal -->
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--end households-->        <!--start epayements-->
        <div class="col-sm-3 dashboard-panel">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <!--<i class="fa fa-money fa-5x"></i>-->
                            <i class="fa fa-money fa-3x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <?php
                            /*start details*/
                            foreach ($data_get_i23_Details as $rows) {
                                $i23_name = $rows->indicator_name;
                                $i23_name_modal = $rows->indicator_modal_name;
                                $i23_name_formula = $rows->indicator_formula;
                                $i23_aria_label = $rows->indicator_aria_label;
                            }
                            /*end details*/
                            foreach ($data_get_i23_Epayments_loa as $row_i23_loa) {
                                $i23_target = ($row_i23_loa->loat);
                                $i23_actual = ($row_i23_loa->loaa);
                                $i23_percent = (($i23_actual / $i23_target) * 100);
                            }
                            ?>

                            <div class="huge"><?= number_format($i23_actual, 0) ?></div>
                            <div style="white-space: nowrap;"><?= $i23_name; ?></div>
                            <?php

                            switch (true) {
                                case($i23_percent > 50):
                                    $i23_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-up' aria-hidden='true'></i>";
                                    break;
                                default:
                                    $i23_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-down' aria-hidden='true'></i>";
                                    break;
                            }
                            ?>
                            <table class="table table-bordered col-xs-12 text-right panel-table">
                                <thead>
                                <tr>
                                    <th>LOAT</th>
                                    <th>LOAA</th>
                                    <th>%</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= number_format($i23_target); ?></td>
                                    <td><?= number_format($i23_actual); ?></td>
                                    <td><?= number_format($i23_percent) . $i23_percentage_progress; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                            data-toggle="modal" data-target="#<?= $i23_name_modal; ?>">
                        View Details
                        <span class="pull-left"></span>
                        <span><i class="fa fa-arrow-circle-right"></i></span>
                    </button>

                    <!--Start volumes sold Modal -->
                    <div class="modal fade " id="<?= $i23_name_modal; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="<?= $i23_aria_label; ?>"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="<?= $i23_aria_label; ?>"><?= $i23_name; ?></h4>
                                </div>
                                <div class="tabbable">
                                    <div class="modal-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#ds_<?= $i23_name_modal; ?>"
                                                                  data-toggle="tab">Data Sources</a></li>
                                            <li><a href="#rp_<?= $i23_name_modal; ?>" data-toggle="tab">Reports</a>
                                            </li>

                                        </ul>

                                        <!--Start Tab panes -->
                                        <div class="tab-content">
                                            <!--start pane on data-sources-->
                                            <div class="tab-pane active" id="ds_<?= $i23_name_modal; ?>">
                                                <div class="clearfix"></div>
                                                <h5 class="text-center"><b><?= $i23_name; ?></b> =
                                                    (<?= $i23_name_formula; ?>)</h5>
                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                    <tr>
                                                        <th>Data Source</th>
                                                        <th>Data Link</th>
                                                        <th class="text-right">Values</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    /*start dataSources*/
                                                    foreach ($data_get_i23_DS as $rows) {
                                                        $i23_ds_name = $rows->datasource_name;
                                                        $i23_ds_link = $rows->datasource_link;

                                                        ?>

                                                        <tr>
                                                            <td><?= $i23_ds_name; ?></td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i23_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i23_ds_name; ?> :Data</a>
                                                            </td>
                                                            <td class="text-right"><?= number_format($i23_actual, 0, '.', ','); ?></td>
                                                        </tr>


                                                        <?php
                                                    }
                                                    /*end dataSources*/
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end pane on data sources-->

                                            <!--start of pane on reports-->
                                            <div class="tab-pane" id="rp_<?= $i23_name_modal; ?>">
                                                <div class="clearfix"></div>

                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                    <tr>
                                                        <th>Report Name</th>
                                                        <th>Report Link</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    /*start Reports*/
                                                    foreach ($data_get_i23P_RP as $rows) {
                                                        $i23_rp_name = $rows->report_name;
                                                        $i23_rp_link = $rows->report_link;

                                                        ?>

                                                        <tr>
                                                            <td><?= $i23_rp_name; ?></td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i23_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i23_rp_name; ?> :</a>
                                                            </td>
                                                        </tr>


                                                        <?php
                                                    }
                                                    /*end Reports*/
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end of pane on reports-->

                                        </div>
                                        <!--end of tab panes-->
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End volumessold Modal -->
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--end epayements-->
        <!--start msmes-->
        <div class="col-sm-3 dashboard-panel">
            <div class="panel panel-blue">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <!--<i class="fa fa-money fa-5x"></i>-->
                            <i class="fa fa-building fa-3x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <?php
                            /*start details*/
                            foreach ($data_get_i24_Details as $rows) {
                                $i24_name = $rows->indicator_name;
                                $i24_name_modal = $rows->indicator_modal_name;
                                $i24_name_formula = $rows->indicator_formula;
                                $i24_aria_label = $rows->indicator_aria_label;
                            }

                            foreach ($data_get_i24_MSMEs_loa as $row_i24_loa) {
                                $i24_target = ($row_i24_loa->loat);
                                $i24_actual = ($row_i24_loa->loaa);
                                $i24_percent = (($i24_actual / $i24_target) * 100);
                            }
                            /*end details*/
                            ?>

                            <div class="huge"><?= number_format($i24_actual); ?></div>
                            <div style="white-space: nowrap;"><?= $i24_name; ?></div>
                            <?php

                            switch (true) {
                                case($i24_percent > 50):
                                    $i24_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-up' aria-hidden='true'></i>";
                                    break;
                                default:
                                    $i24_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-down' aria-hidden='true'></i>";
                                    break;
                            }
                            ?>
                            <table class="table table-bordered col-xs-12 text-right panel-table">
                                <thead>
                                <tr>
                                    <th>LOAT</th>
                                    <th>LOAA</th>
                                    <th>%</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= number_format($i24_target); ?></td>
                                    <td><?= number_format($i24_actual); ?></td>
                                    <td><?= number_format($i24_percent) . $i24_percentage_progress; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                            data-toggle="modal" data-target="#<?= $i24_name_modal; ?>">
                        View Details
                        <span class="pull-left"></span>
                        <span><i class="fa fa-arrow-circle-right"></i></span>
                    </button>

                    <!--Start volumes sold Modal -->
                    <div class="modal fade " id="<?= $i24_name_modal; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="<?= $i24_aria_label; ?>"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="<?= $i24_aria_label; ?>"><?= $i24_name; ?></h4>
                                </div>
                                <div class="tabbable">
                                    <div class="modal-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#ds_<?= $i24_name_modal; ?>"
                                                                  data-toggle="tab">Data Sources</a></li>
                                            <li><a href="#rp_<?= $i24_name_modal; ?>" data-toggle="tab">Reports</a>
                                            </li>

                                        </ul>

                                        <!--Start Tab panes -->
                                        <div class="tab-content">
                                            <!--start pane on data-sources-->
                                            <div class="tab-pane active" id="ds_<?= $i24_name_modal; ?>">
                                                <div class="clearfix"></div>
                                                <h5 class="text-center"><b><?= $i24_name; ?></b> =
                                                    (<?= $i24_name_formula; ?>)</h5>
                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                    <tr>
                                                        <th>Data Source</th>
                                                        <th>Data Link</th>
                                                        <th class="text-right">Values</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    /*start dataSources*/
                                                    foreach ($data_get_i24_DS as $rows) {
                                                        $i24_ds_name = $rows->datasource_name;
                                                        $i24_ds_link = $rows->datasource_link;

                                                        ?>

                                                        <tr>
                                                            <td><?= $i24_ds_name; ?></td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i24_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i24_ds_name; ?> :Data</a>
                                                            </td>
                                                            <td class="text-right"><?= number_format($i24_actual, 0, '.', ','); ?></td>
                                                        </tr>


                                                        <?php
                                                    }
                                                    /*end dataSources*/
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end pane on data sources-->

                                            <!--start of pane on reports-->
                                            <div class="tab-pane" id="rp_<?= $i24_name_modal; ?>">
                                                <div class="clearfix"></div>

                                                <table class="table table-striped" id="tblGrid">
                                                    <thead id="tblHead">
                                                    <tr>
                                                        <th>Report Name</th>
                                                        <th>Report Link</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    /*start Reports*/
                                                    foreach ($data_get_i24M_RP as $rows) {
                                                        $i24_rp_name = $rows->report_name;
                                                        $i24_rp_link = $rows->report_link;


                                                        ?>

                                                        <tr>
                                                            <td><?= $i24_rp_name; ?></td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i24_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i24_rp_name; ?> :</a>
                                                            </td>
                                                        </tr>


                                                        <?php
                                                    }
                                                    /*end Reports*/
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end of pane on reports-->

                                        </div>
                                        <!--end of tab panes-->
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End volumessold Modal -->
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--end msme-->
        <!--start market prices-->
        <div class="col-sm-3 dashboard-panel">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2" style="white-space: nowrap;">
                            <!--<i class="fa fa-money fa-5x"></i>-->
                            <i class="fa fa-male fa-2x"></i> <i class="fa fa-female fa-2x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <?php
                            /*start details*/
                            $i12_name = "Number of apprenticeships";
                            $i12_name_modal = "market_prices_modal";
                            $i12_name_formula = "Monthly Prices";
                            $i12_aria_label = "market_prices_aria_label";

                            foreach ($data_get_i28_jobs_ActivityLifeTime as $rows_life) {
                                $i28_jobs_loa = $rows_life->loaa;
                                $i28_jobs_loat = $rows_life->loat;
                                $i28_jobs_percentage = (($i28_jobs_loa / $i28_jobs_loat) * 100);//$rows_life->percentage;

                            }


                            ?>

                            <div class="huge"><?= number_format($i28_jobs_loa, 0); ?></div>
                            <div style="white-space: nowrap;">Number of apprenticeships</div>
                            <?php
                            foreach ($market_prices as $rows) {
                                $maize_price_value = $rows->Maize;
                                $beans_price_value = $rows->Beans;
                                $coffee_price_value = $rows->Coffee;
                            }
                            /*end details*/
                            ?>

                            <?php

                            switch (true) {
                                case($i28_jobs_percentage > 50):
                                    $i24_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-up' aria-hidden='true'></i>";
                                    break;
                                default:
                                    $i24_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-down' aria-hidden='true'></i>";
                                    break;
                            }
                            ?>

                            <table class="table table-bordered col-xs-12 text-right panel-table">
                                <thead>
                                <tr>
                                    <th class="tg-031e">LOAT</th>
                                    <th class="tg-yw4l">LOA</th>
                                    <th class="tg-yw4l">%</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-right"><?= number_format($i28_jobs_loat, 0); ?></td>
                                    <td class="text-right"><?= number_format($i28_jobs_loa, 0); ?></td>
                                    <td class="text-right"><?= round($i28_jobs_percentage) . $i24_percentage_progress; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle">
                        View Details
                        <span class="pull-left"></span>
                        <span><i class="fa fa-arrow-circle-right"></i></span>
                    </button>
                </div>
            </div>
        </div>
        <!--end market prices-->
    </div>
    <!-- /.row -->
    <!--end brief-panels row two-->


    <!--start row-one-->
    <div class="row">
        <!--Volmes exported by region-->
        <div class="col-lg-4 dashboard-panel">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php
                    /*start details*/
                    foreach ($data_get_i4_Details as $rows) {
                        $i4_name = $rows->indicator_name;
                        $i4_name_modal = $rows->indicator_modal_name;
                        $i4_name_formula = $rows->indicator_formula;
                        $i4_aria_label = $rows->indicator_aria_label;
                    }


                    foreach ($data_get_i4_jobs_ActivityLifeTime as $rows_life) {
                        $i1_target = $rows_life->loat;
                        $i1_actual = $rows_life->loaa;
                        $i1_percent = (($i1_actual / $i1_target) * 100); //$rows_life->percentage;


                    }


                    /*end details*/
                    ?>
                    <i class="fa fa-pie-chart fa-fw dashboard-panel-heading"></i><strong
                        class="dashboard-panel-heading"> <?= $i4_name; ?></strong>

                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                    data-toggle="modal" data-target="#<?= $i4_name_modal; ?>">
                                View Details
                                <span class="caret"></span>
                            </button>
                            <!--Start volumes exported Modal -->
                            <div class="modal fade " id="<?= $i4_name_modal; ?>" tabindex="-1" role="dialog"
                                 aria-labelledby="<?= $i4_aria_label; ?>"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="<?= $i4_aria_label; ?>"><?= $i4_name; ?></h4>
                                        </div>
                                        <div class="tabbable">
                                            <div class="modal-body">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#ds_<?= $i4_name_modal; ?>"
                                                                          data-toggle="tab">Data Sources</a></li>
                                                    <li><a href="#rp_<?= $i4_name_modal; ?>"
                                                           data-toggle="tab">Reports</a>
                                                    </li>

                                                </ul>

                                                <!--Start Tab panes -->
                                                <div class="tab-content">
                                                    <!--start pane on data-sources-->
                                                    <div class="tab-pane active" id="ds_<?= $i4_name_modal; ?>">
                                                        <div class="clearfix"></div>
                                                        <h5 class="text-center"><b><?= $i4_name; ?></b> =
                                                            (<?= $i4_name_formula; ?>)</h5>
                                                        <table class="table table-striped" id="tblGrid">
                                                            <thead id="tblHead">
                                                            <tr>
                                                                <th>Data Source</th>
                                                                <th>Data Link</th>
                                                                <th class="text-right">Values</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            /*start dataSources*/
                                                            foreach ($data_get_i4_DS as $rows) {
                                                                $i4_ds_name = $rows->datasource_name;
                                                                $i4_ds_link = $rows->datasource_link;

                                                                ?>

                                                                <tr>
                                                                    <td><?= $i4_ds_name; ?></td>
                                                                    <td>
                                                                        <a onClick="location.href='<?= prep_url(oldsite_url) . $i4_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                           target="_blank"><?= $i4_ds_name; ?>
                                                                            :Data</a>
                                                                    </td>
                                                                    <td class="text-right"><?= $i4_jobs_loa; ?></td>
                                                                </tr>


                                                                <?php
                                                            }
                                                            /*end dataSources*/
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--end pane on data sources-->

                                                    <!--start of pane on reports-->
                                                    <div class="tab-pane" id="rp_<?= $i4_name_modal; ?>">
                                                        <div class="clearfix"></div>

                                                        <table class="table table-striped" id="tblGrid">
                                                            <thead id="tblHead">
                                                            <tr>
                                                                <th>Report Name</th>
                                                                <th>Report Link</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            /*start Reports*/
                                                            foreach ($data_get_i4_RP as $rows) {
                                                                $i4_rp_name = $rows->report_name;
                                                                $i4_rp_link = $rows->report_link;

                                                                ?>

                                                                <tr>
                                                                    <td><?= $i4_rp_name; ?></td>
                                                                    <td>
                                                                        <a onClick="location.href='<?= prep_url(oldsite_url) . $i4_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                           target="_blank"><?= $i4_rp_name; ?> :</a>
                                                                    </td>
                                                                </tr>


                                                                <?php
                                                            }
                                                            /*end Reports*/
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--end of pane on reports-->

                                                </div>
                                                <!--end of tab panes-->
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End volumes exported Modal -->
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div style='margin-top:5px'>
                        <table cellspacing='0' border='1' width=100% height=100%>
                            <tr class='evenrow'>
                                <th class="tg-031e">LOA TARGETS</th>
                                <th class="tg-yw4l">LOA ACTUALS</th>
                                <th class="tg-yw4l">%ACHIEVED</th>
                            </tr>
                            <tr>
                                <td class="text-right"><?= number_format(round($i1_target)); ?></td>
                                <td class="text-right"><?= number_format(round($i1_actual)); ?></td>
                                <td class="text-right"><?= number_format(round($i1_percent)); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body" style="min-height: 430px;">
                    <div id="indicator_four" style="min-width: 200px; height: 258px; margin: 0 auto"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->


        </div>
        <!-- /.col-lg-4 -->
        <!--farmers by region-->
        <div class="col-lg-4 dashboard-panel">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php
                    /*start details*/
                    foreach ($data_get_i13_Details as $rows) {
                        $i13_name = $rows->indicator_name;
                        $i13_name_modal = $rows->indicator_modal_name;
                        $i13_name_formula = $rows->indicator_formula;
                        $i13_aria_label = $rows->indicator_aria_label;
                    }

                    // foreach ($data_get_i13_jobs_ActivityLifeTime as $rows_life) {
                    //     $i13_jobs_loa = $rows_life->loaa;
                    //     $i13_jobs_loat = $rows_life->loat;
                    //     $i13_jobs_percentage = (($i13_jobs_loa / $i13_jobs_loat) * 100);//$rows_life->percentage;

                    // }

                    foreach ($data_get_i13_Farmers_loa as $row_i13_loa) {
                        /*$i13_target = $row_i13_loa->loat;*/
                        $i13_target = '400000';
                        $i13_actual = $Farmers;//$row_i13_loa->fy5_A;
                        $i13_percent = (($i13_actual / $i13_target) * 100);
                        switch (true) {
                            case($i13_percent > 50):
                                $i13_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-up' aria-hidden='true'></i>";
                                break;
                            default:
                                $i13_percentage_progress = "&#37; " . "
                                    <i class='fa fa-caret-down' aria-hidden='true'></i>";
                                break;
                        }

                    }
                    /*end details*/
                    ?>
                    <i class="fa fa-pie-chart fa-fw dashboard-panel-heading"></i><strong
                        class="dashboard-panel-heading"> <?= $i13_name; ?></strong>

                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                    data-toggle="modal" data-target="#<?= $i13_name_modal; ?>">
                                View Details
                                <span class="caret"></span>
                            </button>
                            <!--Start Hectares Modal -->
                            <div class="modal fade " id="<?= $i13_name_modal; ?>" tabindex="-1" role="dialog"
                                 aria-labelledby="<?= $i13_aria_label; ?>"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="<?= $i13_aria_label; ?>"><?= $i13_name; ?></h4>
                                        </div>
                                        <div class="tabbable">
                                            <div class="modal-body">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#ds_<?= $i13_name_modal; ?>"
                                                                          data-toggle="tab">Data Sources</a></li>
                                                    <li><a href="#rp_<?= $i13_name_modal; ?>"
                                                           data-toggle="tab">Reports</a>
                                                    </li>

                                                </ul>

                                                <!--Start Tab panes -->
                                                <div class="tab-content">
                                                    <!--start pane on data-sources-->
                                                    <div class="tab-pane active" id="ds_<?= $i13_name_modal; ?>">
                                                        <div class="clearfix"></div>
                                                        <h5 class="text-center"><b><?= $i13_name; ?></b> =
                                                            (<?= $i13_name_formula; ?>)</h5>
                                                        <table class="table table-striped" id="tblGrid">
                                                            <thead id="tblHead">
                                                            <tr>
                                                                <th>Data Source</th>
                                                                <th>Data Link</th>
                                                                <th class="text-right">Values</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            /*start dataSources*/
                                                            foreach ($data_get_i13_DS as $rows) {
                                                                $i13_ds_name = $rows->datasource_name;
                                                                $i13_ds_link = $rows->datasource_link;

                                                                ?>

                                                                <tr>
                                                                    <td><?= $i13_ds_name; ?></td>
                                                                    <td>
                                                                        <a onClick="location.href='<?= prep_url(oldsite_url) . $i13_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                           target="_blank"><?= $i13_ds_name; ?>
                                                                            :Data</a>
                                                                    </td>
                                                                    <td class="text-right">n/a</td>
                                                                </tr>


                                                                <?php
                                                            }
                                                            /*end dataSources*/
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--end pane on data sources-->

                                                    <!--start of pane on reports-->
                                                    <div class="tab-pane" id="rp_<?= $i13_name_modal; ?>">
                                                        <div class="clearfix"></div>

                                                        <table class="table table-striped" id="tblGrid">
                                                            <thead id="tblHead">
                                                            <tr>
                                                                <th>Report Name</th>
                                                                <th>Report Link</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            /*start Reports*/
                                                            foreach ($data_get_i13_RP as $rows) {
                                                                $i13_rp_name = $rows->report_name;
                                                                $i13_rp_link = $rows->report_link;

                                                                ?>

                                                                <tr>
                                                                    <td><?= $i13_rp_name; ?></td>
                                                                    <td>
                                                                        <a onClick="location.href='<?= prep_url(oldsite_url) . $i13_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                           target="_blank"><?= $i13_rp_name; ?> :</a>
                                                                    </td>
                                                                </tr>


                                                                <?php
                                                            }
                                                            /*end Reports*/
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--end of pane on reports-->

                                                </div>
                                                <!--end of tab panes-->
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Hectares Modal -->
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div style='margin-top:5px'>

                        <table cellspacing='0' border='1' width=100% height=100%>

                            <tr class='evenrow'>
                                <th class="tg-031e">LOA TARGETS</th>
                                <th class="tg-yw4l">LOA ACTUALS</th>
                                <th class="tg-yw4l">%ACHIEVED</th>
                            </tr>
                            <tr>
                                <td class="text-right"><?= number_format(round($i13_target)); ?></td>
                                <td class="text-right"><?= number_format(round($i13_actual)); ?></td>
                                <td class="text-right"><?= number_format($i13_percent) . $i13_percentage_progress; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="indicator_thirteen"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->


        </div>
        <!-- /.col-lg-4 -->
        <!--farmers trained-->
        <div class="col-lg-4 dashboard-panel">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php
                    /*start details*/
                    foreach ($data_get_i5_Details as $rows) {
                        $i5_name = $rows->indicator_name;
                        $i5_name_modal = $rows->indicator_modal_name;
                        $i5_name_formula = $rows->indicator_formula;
                        $i5_aria_label = $rows->indicator_aria_label;
                    }
                    foreach ($data_get_i15_jobs_ActivityLifeTime as $rows_life) {
                        $i15_jobs_loa = $rows_life->loaa;
                        $i15_jobs_loat = $rows_life->loat;
                        $i15_jobs_percentage = (($i15_jobs_loa / $i15_jobs_loat) * 100);//$rows_life->percentage;

                    }
                    /*end details*/
                    ?>
                    <i class="fa fa-bar-chart-o fa-fw dashboard-panel-heading"></i><strong
                        class="dashboard-panel-heading"> <?= $i5_name; ?></strong>

                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                    data-toggle="modal" data-target="#<?= $i5_name_modal; ?>">
                                View Details
                                <span class="caret"></span>
                            </button>
                            <!--Start Farmers Trained Modal -->
                            <div class="modal fade " id="<?= $i5_name_modal; ?>" tabindex="-1" role="dialog"
                                 aria-labelledby="<?= $i5_aria_label; ?>"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="<?= $i5_aria_label; ?>"><?= $i5_name; ?></h4>
                                        </div>
                                        <div class="tabbable">
                                            <div class="modal-body">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#ds_<?= $i5_name_modal; ?>"
                                                                          data-toggle="tab">Data Sources</a></li>
                                                    <li><a href="#rp_<?= $i5_name_modal; ?>"
                                                           data-toggle="tab">Reports</a>
                                                    </li>

                                                </ul>

                                                <!--Start Tab panes -->
                                                <div class="tab-content">
                                                    <!--start pane on data-sources-->
                                                    <div class="tab-pane active" id="ds_<?= $i5_name_modal; ?>">
                                                        <div class="clearfix"></div>
                                                        <h5 class="text-center"><b><?= $i5_name; ?></b> =
                                                            (<?= $i5_name_formula; ?>)</h5>
                                                        <table class="table table-striped" id="tblGrid">
                                                            <thead id="tblHead">
                                                            <tr>
                                                                <th>Data Source</th>
                                                                <th>Data Link</th>
                                                                <th class="text-right">Values</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            /*start dataSources*/
                                                            foreach ($data_get_i5_DS as $rows) {
                                                                $i5_ds_name = $rows->datasource_name;
                                                                $i5_ds_link = $rows->datasource_link;

                                                                ?>

                                                                <tr>
                                                                    <td><?= $i5_ds_name; ?></td>
                                                                    <td>
                                                                        <a onClick="location.href='<?= prep_url(oldsite_url) . $i5_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                           target="_blank"><?= $i5_ds_name; ?> :Data</a>
                                                                    </td>
                                                                    <td class="text-right"><?= $i15_jobs_loa; ?></td>
                                                                </tr>


                                                                <?php
                                                            }
                                                            /*end dataSources*/
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--end pane on data sources-->

                                                    <!--start of pane on reports-->
                                                    <div class="tab-pane" id="rp_<?= $i5_name_modal; ?>">
                                                        <div class="clearfix"></div>

                                                        <table class="table table-striped" id="tblGrid">
                                                            <thead id="tblHead">
                                                            <tr>
                                                                <th>Report Name</th>
                                                                <th>Report Link</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            /*start Reports*/
                                                            foreach ($data_get_i5_RP as $rows) {
                                                                $i5_rp_name = $rows->report_name;
                                                                $i5_rp_link = $rows->report_link;

                                                                ?>

                                                                <tr>
                                                                    <td><?= $i5_rp_name; ?></td>
                                                                    <td>
                                                                        <a onClick="location.href='<?= prep_url(oldsite_url) . $i5_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                           target="_blank"><?= $i5_rp_name; ?> :</a>
                                                                    </td>
                                                                </tr>


                                                                <?php
                                                            }
                                                            /*end Reports*/
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--end of pane on reports-->

                                                </div>
                                                <!--end of tab panes-->
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Farmers Trained Modal -->
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div style='margin-top:5px'>

                        <table cellspacing='0' border='1' width=100% height=100%>

                            <tr class='evenrow'>
                                <th class="tg-031e">LOA TARGETS</th>
                                <th class="tg-yw4l">LOA ACTUALS</th>
                                <th class="tg-yw4l">%ACHIEVED</th>
                            </tr>
                            <tr>
                                <td class="text-right"><?= number_format(round($i15_jobs_loat)); ?></td>
                                <td class="text-right"><?= number_format(round($i15_jobs_loa)); ?></td>
                                <td class="text-right"><?= number_format(round($i15_jobs_percentage)); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="indicator_five"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->


        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
    <!--end row one-->

    <!--start row two-->
    <div class="row">
        <div class="row">
            <div class="col-lg-4 dashboard-panel">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php
                        /*start details*/
                        foreach ($data_get_i8_Details as $rows) {
                            $i8_name = $rows->indicator_name;
                            $i8_name_modal = $rows->indicator_modal_name;
                            $i8_name_formula = $rows->indicator_formula;
                            $i8_aria_label = $rows->indicator_aria_label;
                        }
                        foreach ($data_get_i8_jobs_ActivityLifeTime as $rows_life) {
                            $i8_jobs_loa = $rows_life->loaa;
                            $i8_jobs_loat = $rows_life->loat;
                            $i8_jobs_percentage = (($i8_jobs_loa / $i8_jobs_loat) * 100);//$rows_life->percentage;

                        }
                        /*end details*/
                        ?>
                        <i class="fa fa-pie-chart fa-fw dashboard-panel-heading"></i><strong
                            class="dashboard-panel-heading"> <?= $i8_name; ?></strong>

                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                        data-toggle="modal" data-target="#<?= $i8_name_modal; ?>">
                                    View Details
                                    <span class="caret"></span>
                                </button>
                                <!--Start Hectares Modal -->
                                <div class="modal fade " id="<?= $i8_name_modal; ?>" tabindex="-1" role="dialog"
                                     aria-labelledby="<?= $i8_aria_label; ?>"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"
                                                    id="<?= $i8_aria_label; ?>"><?= $i8_name; ?></h4>
                                            </div>
                                            <div class="tabbable">
                                                <div class="modal-body">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#ds_<?= $i8_name_modal; ?>"
                                                                              data-toggle="tab">Data Sources</a></li>
                                                        <li><a href="#rp_<?= $i8_name_modal; ?>" data-toggle="tab">Reports</a>
                                                        </li>

                                                    </ul>

                                                    <!--Start Tab panes -->
                                                    <div class="tab-content">
                                                        <!--start pane on data-sources-->
                                                        <div class="tab-pane active" id="ds_<?= $i8_name_modal; ?>">
                                                            <div class="clearfix"></div>
                                                            <h5 class="text-center"><b><?= $i8_name; ?></b> =
                                                                (<?= $i8_name_formula; ?>)</h5>
                                                            <table class="table table-striped" id="tblGrid">
                                                                <thead id="tblHead">
                                                                <tr>
                                                                    <th>Data Source</th>
                                                                    <th>Data Link</th>
                                                                    <th class="text-right">Values</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php
                                                                /*start dataSources*/
                                                                foreach ($data_get_i8_DS as $rows) {
                                                                    $i5_ds_name = $rows->datasource_name;
                                                                    $i5_ds_link = $rows->datasource_link;

                                                                    ?>

                                                                    <tr>
                                                                        <td><?= $i5_ds_name; ?></td>
                                                                        <td>
                                                                            <a onClick="location.href='<?= prep_url(oldsite_url) . $i5_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                               target="_blank"><?= $i5_ds_name; ?>
                                                                                :Data</a>
                                                                        </td>
                                                                        <td class="text-right">n/a</td>
                                                                    </tr>


                                                                    <?php
                                                                }
                                                                /*end dataSources*/
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end pane on data sources-->

                                                        <!--start of pane on reports-->
                                                        <div class="tab-pane" id="rp_<?= $i8_name_modal; ?>">
                                                            <div class="clearfix"></div>

                                                            <table class="table table-striped" id="tblGrid">
                                                                <thead id="tblHead">
                                                                <tr>
                                                                    <th>Report Name</th>
                                                                    <th>Report Link</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php
                                                                /*start Reports*/
                                                                foreach ($data_get_i8_RP as $rows) {
                                                                    $i8_rp_name = $rows->report_name;
                                                                    $i8_rp_link = $rows->report_link;

                                                                    ?>

                                                                    <tr>
                                                                        <td><?= $i8_rp_name; ?></td>
                                                                        <td>
                                                                            <a onClick="location.href='<?= prep_url(oldsite_url) . $i8_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                               target="_blank"><?= $i8_rp_name; ?> :</a>
                                                                        </td>
                                                                    </tr>


                                                                    <?php
                                                                }
                                                                /*end Reports*/
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end of pane on reports-->

                                                    </div>
                                                    <!--end of tab panes-->
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Hectares Modal -->
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div style='margin-top:5px'>

                            <table cellspacing='0' border='1' width=100% height=100%>

                                <tr class='evenrow'>
                                    <th class="tg-031e">LOA TARGETS</th>
                                    <th class="tg-yw4l">LOA ACTUALS</th>
                                    <th class="tg-yw4l">%ACHIEVED</th>
                                </tr>
                                <tr>
                                    <td class="text-right"><?= number_format(round($i8_jobs_loat)); ?></td>
                                    <td class="text-right"><?= number_format(round($i8_jobs_loa)); ?></td>
                                    <td class="text-right"><?= number_format(round($i8_jobs_percentage)); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="indicator_eight"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->


            </div>
            <!-- /.col-lg-4 -->
            <!--hectares under production-->
            <div class="col-lg-4 dashboard-panel">
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <?php
                        /*start details*/
                        foreach ($data_get_i6_Details as $rows) {
                            $i6_name = $rows->indicator_name;
                            $i6_name_modal = $rows->indicator_modal_name;
                            $i6_name_formula = $rows->indicator_formula;
                            $i6_aria_label = $rows->indicator_aria_label;
                        }
                        foreach ($data_get_i6_jobs_ActivityLifeTime as $rows_life) {
                            $i6_jobs_loa = $rows_life->loaa;
                            $i6_jobs_loat = $rows_life->loat;
                            $i6_jobs_percentage = (($i6_jobs_loa / $i6_jobs_loat) * 100);//$rows_life->percentage;

                        }
                        /*end details*/
                        ?>
                        <i class="fa fa-pie-chart fa-fw dashboard-panel-heading"></i><strong
                            class="dashboard-panel-heading"> <?= $i6_name; ?></strong>

                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                        data-toggle="modal" data-target="#<?= $i6_name_modal; ?>">
                                    View Details
                                    <span class="caret"></span>
                                </button>
                                <!--Start Hectares Modal -->
                                <div class="modal fade " id="<?= $i6_name_modal; ?>" tabindex="-1" role="dialog"
                                     aria-labelledby="<?= $i6_aria_label; ?>"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"
                                                    id="<?= $i6_aria_label; ?>"><?= $i6_name; ?></h4>
                                            </div>
                                            <div class="tabbable">
                                                <div class="modal-body">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#ds_<?= $i6_name_modal; ?>"
                                                                              data-toggle="tab">Data Sources</a></li>
                                                        <li><a href="#rp_<?= $i6_name_modal; ?>"
                                                               data-toggle="tab">Reports</a>
                                                        </li>

                                                    </ul>

                                                    <!--Start Tab panes -->
                                                    <div class="tab-content">
                                                        <!--start pane on data-sources-->
                                                        <div class="tab-pane active" id="ds_<?= $i6_name_modal; ?>">
                                                            <div class="clearfix"></div>
                                                            <h5 class="text-center"><b><?= $i6_name; ?></b> =
                                                                (<?= $i6_name_formula; ?>)</h5>
                                                            <table class="table table-striped" id="tblGrid">
                                                                <thead id="tblHead">
                                                                <tr>
                                                                    <th>Data Source</th>
                                                                    <th>Data Link</th>
                                                                    <th class="text-right">Values</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php
                                                                /*start dataSources*/
                                                                foreach ($data_get_i6_DS as $rows) {
                                                                    $i5_ds_name = $rows->datasource_name;
                                                                    $i5_ds_link = $rows->datasource_link;

                                                                    ?>

                                                                    <tr>
                                                                        <td><?= $i5_ds_name; ?></td>
                                                                        <td>
                                                                            <a onClick="location.href='<?= prep_url(oldsite_url) . $i5_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                               target="_blank"><?= $i5_ds_name; ?>
                                                                                :Data</a>
                                                                        </td>
                                                                        <td class="text-right">n/a</td>
                                                                    </tr>


                                                                    <?php
                                                                }
                                                                /*end dataSources*/
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end pane on data sources-->

                                                        <!--start of pane on reports-->
                                                        <div class="tab-pane" id="rp_<?= $i6_name_modal; ?>">
                                                            <div class="clearfix"></div>

                                                            <table class="table table-striped" id="tblGrid">
                                                                <thead id="tblHead">
                                                                <tr>
                                                                    <th>Report Name</th>
                                                                    <th>Report Link</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php
                                                                /*start Reports*/
                                                                foreach ($data_get_i6_RP as $rows) {
                                                                    $i6_rp_name = $rows->report_name;
                                                                    $i6_rp_link = $rows->report_link;

                                                                    ?>

                                                                    <tr>
                                                                        <td><?= $i6_rp_name; ?></td>
                                                                        <td>
                                                                            <a onClick="location.href='<?= prep_url(oldsite_url) . $i6_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                               target="_blank"><?= $i6_rp_name; ?> :</a>
                                                                        </td>
                                                                    </tr>


                                                                    <?php
                                                                }
                                                                /*end Reports*/
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end of pane on reports-->

                                                    </div>
                                                    <!--end of tab panes-->
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Hectares Modal -->
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div style='margin-top:5px'>

                            <table cellspacing='0' border='1' width=100% height=100%>

                                <tr class='evenrow'>
                                    <th class="tg-031e">LOA TARGETS</th>
                                    <th class="tg-yw4l">LOA ACTUALS</th>
                                    <th class="tg-yw4l">%ACHIEVED</th>
                                </tr>
                                <tr>
                                    <td class="text-right"><?= number_format(round($i6_jobs_loat)); ?></td>
                                    <td class="text-right"><?= number_format(round($i6_jobs_loa)); ?></td>
                                    <td class="text-right"><?= number_format(round($i6_jobs_percentage)); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" style="min-height: 430px;">
                        <div id="indicator_six" style="min-width: 200px; height: 258px; margin: 0 auto"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->


            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-4 dashboard-panel">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php
                        /*start details*/
                        foreach ($data_get_i25_Details as $rows) {
                            $i25_name = $rows->indicator_name;
                            $i25_name_modal = $rows->indicator_modal_name;
                            $i25_name_formula = $rows->indicator_formula;
                            $i25_aria_label = $rows->indicator_aria_label;
                        }

                        foreach ($data_get_14ActivityLifeTime as $rows_life) {
                            $i25_loa = $rows_life->loaa;
                            $i25_loat = $rows_life->loat;
                            $i25_percentage = (($i25_loa / $i25_loat) * 100);//$rows_life->percentage;

                        }

                        /*end details*/
                        ?>
                        <div>
                            <i class="fa fa-pie-chart fa-fw dashboard-panel-heading"></i><strong
                                class="dashboard-panel-heading"> <?= $i25_name; ?></strong>

                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                            data-toggle="modal" data-target="#<?= $i25_name_modal; ?>">
                                        View Details
                                        <span class="caret"></span>
                                    </button>
                                    <!--Start Hectares Modal -->
                                    <div class="modal fade " id="<?= $i25_name_modal; ?>" tabindex="-1" role="dialog"
                                         aria-labelledby="<?= $i25_aria_label; ?>"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title"
                                                        id="<?= $i25_aria_label; ?>"><?= $i25_name; ?></h4>
                                                </div>
                                                <div class="tabbable">
                                                    <div class="modal-body">
                                                        <!-- Nav tabs -->
                                                        <ul class="nav nav-tabs">
                                                            <li class="active"><a href="#ds_<?= $i25_name_modal; ?>"
                                                                                  data-toggle="tab">Data Sources</a>
                                                            </li>
                                                            <li><a href="#rp_<?= $i25_name_modal; ?>"
                                                                   data-toggle="tab">Reports</a>
                                                            </li>

                                                        </ul>

                                                        <!--Start Tab panes -->
                                                        <div class="tab-content">
                                                            <!--start pane on data-sources-->
                                                            <div class="tab-pane active"
                                                                 id="ds_<?= $i25_name_modal; ?>">
                                                                <div class="clearfix"></div>
                                                                <h5 class="text-center"><b><?= $i25_name; ?></b> =
                                                                    (<?= $i25_name_formula; ?>)</h5>
                                                                <table class="table table-striped" id="tblGrid">
                                                                    <thead id="tblHead">
                                                                    <tr>
                                                                        <th>Data Source</th>
                                                                        <th>Data Link</th>
                                                                        <th class="text-right">Values</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    <?php
                                                                    /*start dataSources*/
                                                                    foreach ($data_get_i25_DS as $rows) {
                                                                        $i25_ds_name = $rows->datasource_name;
                                                                        $i25_ds_link = $rows->datasource_link;

                                                                        ?>

                                                                        <tr>
                                                                            <td><?= $i25_ds_name; ?></td>
                                                                            <td>
                                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i25_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                                   target="_blank"><?= $i25_ds_name; ?>
                                                                                    :Data</a>
                                                                            </td>
                                                                            <td class="text-right"><?= number_format($i25_loa); ?></td>
                                                                        </tr>


                                                                        <?php
                                                                    }
                                                                    /*end dataSources*/
                                                                    ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!--end pane on data sources-->

                                                            <!--start of pane on reports-->
                                                            <div class="tab-pane" id="rp_<?= $i25_name_modal; ?>">
                                                                <div class="clearfix"></div>

                                                                <table class="table table-striped" id="tblGrid">
                                                                    <thead id="tblHead">
                                                                    <tr>
                                                                        <th>Report Name</th>
                                                                        <th>Report Link</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    <?php
                                                                    /*start Reports*/
                                                                    foreach ($data_get_i25_RP as $rows) {
                                                                        $i25_rp_name = $rows->report_name;
                                                                        $i25_rp_link = $rows->report_link;

                                                                        ?>

                                                                        <tr>
                                                                            <td><?= $i25_rp_name; ?></td>
                                                                            <td>
                                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i25_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                                   target="_blank"><?= $i25_rp_name; ?>
                                                                                    :</a>
                                                                            </td>
                                                                        </tr>


                                                                        <?php
                                                                    }
                                                                    /*end Reports*/
                                                                    ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!--end of pane on reports-->

                                                        </div>
                                                        <!--end of tab panes-->
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Hectares Modal -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>

                        <div style='margin-top:5px'>

                            <table cellspacing='0' border='1' width=100% height=100%>

                                <tr class='evenrow'>
                                    <th class="tg-031e">LOA TARGETS</th>
                                    <th class="tg-yw4l">LOA ACTUALS</th>
                                    <th class="tg-yw4l">%ACHIEVED</th>
                                </tr>
                                <tr>
                                    <td class="text-right"><?= number_format(round($i25_loat)); ?></td>
                                    <td class="text-right"><?= number_format(round($i25_loa)); ?></td>
                                    <td class="text-right"><?= number_format(round($i25_percentage)); ?></td>
                                </tr>
                            </table>
                        </div>


                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <div id="indicator_nine"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->


            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.col-lg-4 -->

        <!--start row three-->
        <div class="row">
            <div class="col-lg-4 dashboard-panel">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php
                        /*start details*/
                        foreach ($data_get_i10_Details as $rows) {
                            $i10_name = $rows->indicator_name;
                            $i10_name_modal = $rows->indicator_modal_name;
                            $i10_name_formula = $rows->indicator_formula;
                            $i10_aria_label = $rows->indicator_aria_label;
                        }

                        foreach ($data_get_i10_jobs_ActivityLifeTime as $rows_life) {
                            $i10_jobs_loa = $rows_life->loaa;
                            $i10_jobs_loat = $rows_life->loat;
                            $i10_jobs_percentage = (($i10_jobs_loa / $i10_jobs_loat) * 100);//$rows_life->percentage;

                        }
                        /*end details*/
                        ?>
                        <i class="fa fa-pie-chart fa-fw dashboard-panel-heading"></i><strong
                            class="dashboard-panel-heading"> <?= $i10_name; ?></strong>

                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                        data-toggle="modal" data-target="#<?= $i10_name_modal; ?>">
                                    View Details
                                    <span class="caret"></span>
                                </button>
                                <!--Start Hectares Modal -->
                                <div class="modal fade " id="<?= $i10_name_modal; ?>" tabindex="-1" role="dialog"
                                     aria-labelledby="<?= $i10_aria_label; ?>"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"
                                                    id="<?= $i10_aria_label; ?>"><?= $i10_name; ?></h4>
                                            </div>
                                            <div class="tabbable">
                                                <div class="modal-body">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#ds_<?= $i10_name_modal; ?>"
                                                                              data-toggle="tab">Data Sources</a></li>
                                                        <li><a href="#rp_<?= $i10_name_modal; ?>" data-toggle="tab">Reports</a>
                                                        </li>

                                                    </ul>

                                                    <!--Start Tab panes -->
                                                    <div class="tab-content">
                                                        <!--start pane on data-sources-->
                                                        <div class="tab-pane active" id="ds_<?= $i10_name_modal; ?>">
                                                            <div class="clearfix"></div>
                                                            <h5 class="text-center"><b><?= $i10_name; ?></b> =
                                                                (<?= $i10_name_formula; ?>)</h5>
                                                            <table class="table table-striped" id="tblGrid">
                                                                <thead id="tblHead">
                                                                <tr>
                                                                    <th>Data Source</th>
                                                                    <th>Data Link</th>
                                                                    <th class="text-right">Values</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php
                                                                /*start dataSources*/
                                                                foreach ($data_get_i10_DS as $rows) {
                                                                    $i5_ds_name = $rows->datasource_name;
                                                                    $i5_ds_link = $rows->datasource_link;

                                                                    ?>

                                                                    <tr>
                                                                        <td><?= $i5_ds_name; ?></td>
                                                                        <td>
                                                                            <a onClick="location.href='<?= prep_url(oldsite_url) . $i5_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                               target="_blank"><?= $i5_ds_name; ?>
                                                                                :Data</a>
                                                                        </td>
                                                                        <td class="text-right">n/a</td>
                                                                    </tr>


                                                                    <?php
                                                                }
                                                                /*end dataSources*/
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end pane on data sources-->

                                                        <!--start of pane on reports-->
                                                        <div class="tab-pane" id="rp_<?= $i10_name_modal; ?>">
                                                            <div class="clearfix"></div>

                                                            <table class="table table-striped" id="tblGrid">
                                                                <thead id="tblHead">
                                                                <tr>
                                                                    <th>Report Name</th>
                                                                    <th>Report Link</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php
                                                                /*start Reports*/
                                                                foreach ($data_get_i10_RP as $rows) {
                                                                    $i10_rp_name = $rows->report_name;
                                                                    $i10_rp_link = $rows->report_link;

                                                                    ?>

                                                                    <tr>
                                                                        <td><?= $i10_rp_name; ?></td>
                                                                        <td>
                                                                            <a onClick="location.href='<?= prep_url(oldsite_url) . $i10_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                               target="_blank"><?= $i10_rp_name; ?>
                                                                                :</a>
                                                                        </td>
                                                                    </tr>


                                                                    <?php
                                                                }
                                                                /*end Reports*/
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end of pane on reports-->

                                                    </div>
                                                    <!--end of tab panes-->
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Hectares Modal -->
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div style='margin-top:5px'>

                            <table cellspacing='0' border='1' width=100% height=100%>

                                <tr class='evenrow'>
                                    <th class="tg-031e">LOA TARGETS</th>
                                    <th class="tg-yw4l">LOA ACTUALS</th>
                                    <th class="tg-yw4l">%ACHIEVED</th>
                                </tr>
                                <tr>
                                    <td class="text-right"><?= number_format(round($i10_jobs_loat)); ?></td>
                                    <td class="text-right"><?= number_format(round($i10_jobs_loa)); ?></td>
                                    <td class="text-right"><?= number_format(round($i10_jobs_percentage)); ?></td>
                                </tr>
                            </table>
                        </div>


                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="indicator_ten"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->


            </div>

            <!-- /.col-lg-4 -->
            <div class="col-lg-4 dashboard-panel">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php
                        /*start details*/
                        foreach ($data_get_i25_Details as $rows) {
                            $i25_name = $rows->indicator_name;
                            $i25_name_modal_job = "job_attributed";//$rows->indicator_modal_name;
                            $i25_name_formula = $rows->indicator_formula;
                            $i25_aria_label = $rows->indicator_aria_label;
                        }

                        foreach ($data_get_i2_jobs_ActivityLifeTime as $rows_life) {
                            $i2_jobs_loa = $rows_life->loaa;
                            $i2_jobs_loat = $rows_life->loat;
                            $i2_jobs_percentage = (($i2_jobs_loa / $i2_jobs_loat) * 100);//$rows_life->percentage;

                        }

                        /*end details*/
                        ?>
                        <div>
                            <i class="fa fa-pie-chart fa-fw dashboard-panel-heading"></i><strong
                                class="dashboard-panel-heading"> Number of jobs attributed</strong>

                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                            data-toggle="modal" data-target="#<?= $i25_name_modal_job; ?>">
                                        View Details
                                        <span class="caret"></span>
                                    </button>
                                    <!--Start Hectares Modal -->
                                    <div class="modal fade " id="<?= $i25_name_modal_job; ?>" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="<?= $i25_aria_label; ?>"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="<?= $i25_aria_label; ?>">Number of jobs
                                                        attributed</h4>
                                                </div>
                                                <div class="tabbable">
                                                    <div class="modal-body">
                                                        <!-- Nav tabs -->
                                                        <ul class="nav nav-tabs">
                                                            <li class="active"><a href="#ds_<?= $i25_name_modal_job; ?>"
                                                                                  data-toggle="tab">Data Sources</a>
                                                            </li>
                                                            <li><a href="#rp_<?= $i25_name_modal; ?>"
                                                                   data-toggle="tab">Reports</a>
                                                            </li>

                                                        </ul>

                                                        <!--Start Tab panes -->
                                                        <div class="tab-content">
                                                            <!--start pane on data-sources-->
                                                            <div class="tab-pane active"
                                                                 id="ds_<?= $i25_name_modal; ?>">
                                                                <div class="clearfix"></div>
                                                                <h5 class="text-center"><b>Number of jobs attributed</b>
                                                                    =
                                                                    (<?= $i25_name_formula; ?>)</h5>
                                                                <table class="table table-striped" id="tblGrid">
                                                                    <thead id="tblHead">
                                                                    <tr>
                                                                        <th>Data Source</th>
                                                                        <th>Data Link</th>
                                                                        <th class="text-right">Values</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    <?php
                                                                    /*start dataSources*/
                                                                    foreach ($data_get_i25_DS as $rows) {
                                                                        $i25_ds_name = $rows->datasource_name;
                                                                        $i25_ds_link = $rows->datasource_link;

                                                                        ?>

                                                                        <tr>
                                                                            <td><?= $i25_ds_name; ?></td>
                                                                            <td>
                                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i25_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                                   target="_blank"><?= $i25_ds_name; ?>
                                                                                    :Data</a>
                                                                            </td>
                                                                            <td class="text-right">n/a</td>
                                                                        </tr>


                                                                        <?php
                                                                    }
                                                                    /*end dataSources*/
                                                                    ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!--end pane on data sources-->

                                                            <!--start of pane on reports-->
                                                            <div class="tab-pane" id="rp_<?= $i25_name_modal; ?>">
                                                                <div class="clearfix"></div>

                                                                <table class="table table-striped" id="tblGrid">
                                                                    <thead id="tblHead">
                                                                    <tr>
                                                                        <th>Report Name</th>
                                                                        <th>Report Link</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    <?php
                                                                    /*start Reports*/
                                                                    foreach ($data_get_i25_RP as $rows) {
                                                                        $i25_rp_name = $rows->report_name;
                                                                        $i25_rp_link = $rows->report_link;

                                                                        ?>

                                                                        <tr>
                                                                            <td><?= $i25_rp_name; ?></td>
                                                                            <td>
                                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i25_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                                   target="_blank"><?= $i25_rp_name; ?>
                                                                                    :</a>
                                                                            </td>
                                                                        </tr>


                                                                        <?php
                                                                    }
                                                                    /*end Reports*/
                                                                    ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!--end of pane on reports-->

                                                        </div>
                                                        <!--end of tab panes-->
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Hectares Modal -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>

                        <div style='margin-top:5px'>

                            <table cellspacing='0' border='1' width=100% height=100%>

                                <tr class='evenrow'>
                                    <th class="tg-031e">LOA TARGETS</th>
                                    <th class="tg-yw4l">LOA ACTUALS</th>
                                    <th class="tg-yw4l">%ACHIEVED</th>
                                </tr>
                                <tr>
                                    <td class="text-right"><?= number_format(round($i2_jobs_loat)); ?></td>
                                    <td class="text-right"><?= number_format(round($i2_jobs_loa)); ?></td>
                                    <td class="text-right"><?= number_format(round($i2_jobs_percentage)); ?></td>
                                </tr>
                            </table>
                        </div>


                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <div id="indicator_jobs_attributed"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->


            </div>


            <div class="col-lg-4 dashboard-panel">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php
                        /*start details*/
                        foreach ($data_get_i26_Details as $rows) {
                            $i26_name = $rows->indicator_name;
                            $i26_name_modal = $rows->indicator_modal_name;
                            $i26_name_formula = $rows->indicator_formula;
                            $i26_aria_label = $rows->indicator_aria_label;
                        }

                        foreach ($data_get_i26_jobs_ActivityLifeTime as $rows_life) {
                            $i26_jobs_loa = $rows_life->loaa;
                            $i26_jobs_loat = $rows_life->loat;
                            $i26_jobs_percentage = (($i26_jobs_loa / $i26_jobs_loat) * 100);//$rows_life->percentage;

                        }
                        /*end details*/
                        ?>
                        <i class="fa fa-pie-chart fa-fw dashboard-panel-heading"></i><strong
                            class="dashboard-panel-heading"> Gross Margin</strong>

                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                        data-toggle="modal" data-target="#<?= $i26_name_modal; ?>">
                                    View Details
                                    <span class="caret"></span>
                                </button>
                                <!--Start Hectares Modal -->
                                <div class="modal fade " id="<?= $i26_name_modal; ?>" tabindex="-1" role="dialog"
                                     aria-labelledby="<?= $i26_aria_label; ?>"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"
                                                    id="<?= $i26_aria_label; ?>"><?= $i26_name; ?></h4>
                                            </div>
                                            <div class="tabbable">
                                                <div class="modal-body">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#ds_<?= $i26_name_modal; ?>"
                                                                              data-toggle="tab">Data Sources</a></li>
                                                        <li><a href="#rp_<?= $i26_name_modal; ?>" data-toggle="tab">Reports</a>
                                                        </li>

                                                    </ul>

                                                    <!--Start Tab panes -->
                                                    <div class="tab-content">
                                                        <!--start pane on data-sources-->
                                                        <div class="tab-pane active" id="ds_<?= $i26_name_modal; ?>">
                                                            <div class="clearfix"></div>
                                                            <h5 class="text-center"><b><?= $i26_name; ?></b> =
                                                                (<?= $i26_name_formula; ?>)</h5>
                                                            <table class="table table-striped" id="tblGrid">
                                                                <thead id="tblHead">
                                                                <tr>
                                                                    <th>Data Source</th>
                                                                    <th>Data Link</th>
                                                                    <th class="text-right">Values</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php
                                                                /*start dataSources*/
                                                                foreach ($data_get_i26_DS as $rows) {
                                                                    $i26_ds_name = $rows->datasource_name;
                                                                    $i26_ds_link = $rows->datasource_link;

                                                                    ?>

                                                                    <tr>
                                                                        <td><?= $i26_ds_name; ?></td>
                                                                        <td>
                                                                            <a onClick="location.href='<?= prep_url(oldsite_url) . $i26_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                               target="_blank"><?= $i26_ds_name; ?>
                                                                                :Data</a>
                                                                        </td>
                                                                        <td class="text-right">n/a</td>
                                                                    </tr>


                                                                    <?php
                                                                }
                                                                /*end dataSources*/
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end pane on data sources-->

                                                        <!--start of pane on reports-->
                                                        <div class="tab-pane" id="rp_<?= $i26_name_modal; ?>">
                                                            <div class="clearfix"></div>

                                                            <table class="table table-striped" id="tblGrid">
                                                                <thead id="tblHead">
                                                                <tr>
                                                                    <th>Report Name</th>
                                                                    <th>Report Link</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php
                                                                /*start Reports*/
                                                                foreach ($data_get_i26M_RP as $rows) {
                                                                    $i26_rp_name = $rows->report_name;
                                                                    $i26_rp_link = $rows->report_link;

                                                                    ?>

                                                                    <tr>
                                                                        <td><?= $i26_rp_name; ?></td>
                                                                        <td>
                                                                            <a onClick="location.href='<?= prep_url(oldsite_url) . $i26_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                               target="_blank"><?= $i26_rp_name; ?>
                                                                                :</a>
                                                                        </td>
                                                                    </tr>


                                                                    <?php
                                                                }
                                                                /*end Reports*/
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end of pane on reports-->

                                                    </div>
                                                    <!--end of tab panes-->
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Hectares Modal -->
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!--<div style='margin-top:5px'>

                            <table cellspacing='0' border='1' width=100% height=100%>

                                <tr class='evenrow'>
                                    <th class="tg-031e">LOA TARGETS</th>
                                    <th class="tg-yw4l">LOA ACTUALS</th>
                                    <th class="tg-yw4l">%ACHIEVED</th>
                                </tr>
                                <tr>
                                    <td class="text-right"><? /*= number_format(round($i26_jobs_loat)); */ ?></td>
                                    <td class="text-right"><? /*= number_format(round($i26_jobs_loa)); */ ?></td>
                                    <td class="text-right"><? /*= number_format(round($i26_jobs_percentage)); */ ?></td>
                                </tr>
                            </table>
                        </div>-->
                        &nbsp;<br/>
                        &nbsp;<br/>
                        &nbsp;<br/>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="indicator_dashindicatorGrossmargin"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->


            </div>
        </div>
        <!-- /.col-lg-4 -->

        <!--end row four-->

        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
    <!--end row two-->

</div>
<!-- /#page-wrapper -->




