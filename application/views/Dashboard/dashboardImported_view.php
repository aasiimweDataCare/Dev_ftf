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

    <!--start brief row-->
    <div class="row">

        <div class="col-sm-3 dashboard-panel">
            <div class="panel panel-blue">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
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
                            <div><?= $i13_name; ?></div>
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
                                                           
                                                            $data = '<td class="text-right">' . $i13_ds_name . '</td>';
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

        <!--start number of partners-->
        <div class="col-sm-3 dashboard-panel">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php
                            foreach ($data_get_i1_Traders as $rows) {
                                $Traders = $rows->numTraders;
                            }
                            foreach ($data_get_i1_Exporters as $rows) {
                                $Exporters = $rows->numExporters;
                            }
                            $numPartners = ($Traders + $Exporters);
                            /*start details*/
                            foreach ($data_get_i1_Details as $rows) {
                                $i1_name = $rows->indicator_name;
                                $i1_name_modal = $rows->indicator_modal_name;
                                $i1_name_formula = $rows->indicator_formula;
                                $i1_aria_label = $rows->indicator_aria_label;
                            }
                            /*end details*/
                            ?>
                            <div class="huge"><?= number_format($numPartners); ?></div>
                            <div><?= $i1_name; ?></div>
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
                                                                    $value = number_format($Exporters);
                                                                    break;
                                                                case 'Traders':
                                                                    $value = number_format($Traders);
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
                        <div class="col-xs-3">
                            <i class="fa fa-usd fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php
                            foreach ($data_get_i2_Partnerships as $rows) {
                                $valuePartnerships = ($rows->valuePartnerships / cpma_dollar_rate);
                            }

                            /*start details*/
                            foreach ($data_get_i2_Details as $rows) {
                                $i2_name = $rows->indicator_name;
                                $i2_name_modal = $rows->indicator_modal_name;
                                $i2_name_formula = $rows->indicator_formula;
                                $i2_aria_label = $rows->indicator_aria_label;
                            }
                            /*end details*/
                            ?>
                            <div class="huge"><?= number_format($valuePartnerships, 1, '.', ',') . ' USD'; ?></div>
                            <div><?= $i2_name; ?></div>
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
                                    <h4 class="modal-title" id="<?= $i2_aria_label; ?>"><?= $i2_name; ?></h4>
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
                                                            <td class="text-right"><?= number_format($valuePartnerships, 1, '.', ',') . ' USD'; ?></td>
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
                        <div class="col-xs-3">
                            <i class="fa fa-truck fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php
                            foreach ($data_get_i3_VolumesPurchased as $rows) {
                                $val_VolumesPurchased = ($rows->volumesPurchased / 1000);
                            }
                            /*start details*/
                            foreach ($data_get_i3_Details as $rows) {
                                $i3_name = $rows->indicator_name;
                                $i3_name_modal = $rows->indicator_modal_name;
                                $i3_name_formula = $rows->indicator_formula;
                                $i3_aria_label = $rows->indicator_aria_label;
                            }
                            /*end details*/
                            ?>
                            <div
                                class="huge"><?= number_format($val_VolumesPurchased, 1, '.', ',') . ' MT'; ?></div>
                            <div><?= $i3_name; ?></div>
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
                                        <h4 class="modal-title" id="<?= $i3_aria_label; ?>"><?= $i3_name; ?></h4>
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
                                                                <td class="text-right"><?= number_format($val_VolumesPurchased, 1, '.', ',') . ' MT'; ?></td>
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
    <!--end brief row-->

    <div class="row">

        <!--start house holds-->
        <div class="col-sm-3 dashboard-panel">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <!--<i class="fa fa-money fa-5x"></i>-->
                            <i class="fa fa-home fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php
                            /*start details*/
                            foreach ($data_get_i16_Details as $rows) {
                                $i16_name = $rows->indicator_name;
                                $i16_name_modal = $rows->indicator_modal_name;
                                $i16_name_formula = $rows->indicator_formula;
                                $i16_aria_label = $rows->indicator_aria_label;
                            }
                            /*end details*/
                            ?>

                            <div class="huge"><?= number_format($data_get_i1_Households, 0, '.', ','); ?></div>
                            <div>Number of rural households</div>
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
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i4_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                   target="_blank"><?= $i16_ds_name; ?> :Data</a>
                                                            </td>
                                                            <td class="text-right"><?= number_format($data_get_i1_Households, 1, '.', ','); ?></td>
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
                                                    foreach ($data_get_i16_RP as $rows) {
                                                        $i16_rp_name = $rows->report_name;
                                                        $i16_rp_link = $rows->report_link;

                                                        ?>

                                                        <tr>
                                                            <td><?= $i16_rp_name; ?></td>
                                                            <td>
                                                                <a onClick="location.href='<?= prep_url(oldsite_url) . $i4_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
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
        
        <!--end house holds-->


                <!--start e pyaments-->
        <div class="col-sm-3 dashboard-panel">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <!--<i class="fa fa-money fa-5x"></i>-->
                            <i class="fa fa-money fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php
                            /*start details*/
                            foreach ($data_get_i23_Details as $rows) {
                                $i23_name = $rows->indicator_name;
                                $i23_name_modal = $rows->indicator_modal_name;
                                $i23_name_formula = $rows->indicator_formula;
                                $i23_aria_label = $rows->indicator_aria_label;
                            }
                            /*end details*/
                            ?>

                            <div class="huge"><?= number_format($data_get_i1_Epayments, 0, '.', ','); ?></div>
                            <div>Number of e-payments</div>
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
                                                            <td class="text-right"><?= number_format($data_get_i1_Epayments, 0, '.', ','); ?></td>
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
                        <div class="col-xs-3">
                            <!--<i class="fa fa-money fa-5x"></i>-->
                            <i class="fa fa-building fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php
                            /*start details*/
                            foreach ($data_get_i24_Details as $rows) {
                                $i24_name = $rows->indicator_name;
                                $i24_name_modal = $rows->indicator_modal_name;
                                $i24_name_formula = $rows->indicator_formula;
                                $i24_aria_label = $rows->indicator_aria_label;
                            }
                            /*end details*/
                            ?>

                            <div class="huge"><?= number_format($data_get_i1_MSMEs, 0, '.', ','); ?></div>
                            <div>Number of MSMEs</div>
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
                                                            <td class="text-right"><?= number_format($data_get_i1_MSMEs, 0, '.', ','); ?></td>
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



        <!--start e pyaments-->

           <div class="col-sm-3 dashboard-panel">
                <div class="panel panel-red">
                    <div class="panel-heading">

                        <div >Market Prices</div>

                    </div>

                    <div class="panel-footer">

                                            <div class="row">

                            


                        
                            <div class="col-xs-12">
                                <?php
                        /*start details*/
                        foreach ($data_get_i12_Details as $rows) {
                            $i12_name = $rows->indicator_name;
                            $i12_name_modal = $rows->indicator_modal_name;
                            $i12_name_formula = $rows->indicator_formula;
                            $i12_aria_label = $rows->indicator_aria_label;
                        }
                        /*end details*/
                        ?>
                                
                                
                                <div >
                                    <?php
                        /*start Reports*/
                        foreach ($market_prices as $rows) {
                            $maize_price_value = $rows->Maize;
                            $beans_price_value = $rows->Beans;
                            $coffee_price_value = $rows->Coffee;
                        }

                            ?>

                        <table cellspacing='0' border='1' width=100% height=100%>
                            
                          <tr class='evenrow'>
                            <th class="tg-031e">Maize(ugx)</th>
                            <th class="tg-yw4l">Beans(ugx)</th>
                            <th class="tg-yw4l">Coffee(ugx)</th>
                          </tr>
                          <tr>
                            <td class="text-right"><?= $maize_price_value; ?></td>
                            <td class="text-right"><?= $beans_price_value; ?></td>
                            <td class="text-right"><?= $coffee_price_value; ?></td>
                          </tr>
                        </table>
                                </div>
                                
                            </div>
                        </div>



                        <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                data-toggle="modal" data-target="#<?= $i12_name_modal; ?>" style="margin-top: 8px;">
                            View Details
                            <span class="pull-left"></span>
                            <span><i class="fa fa-arrow-circle-right"></i></span>
                        </button>

                        <!--Start volumes sold Modal -->
                        <div class="modal fade " id="<?= $i12_name_modal; ?>" tabindex="-1" role="dialog"
                             aria-labelledby="<?= $i12_aria_label; ?>"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="<?= $i12_aria_label; ?>"><?= $i12_name; ?></h4>
                                    </div>
                                    <div class="tabbable">
                                        <div class="modal-body">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#ds_<?= $i12_name_modal; ?>"
                                                                      data-toggle="tab">Data Sources</a></li>
                                                <li><a href="#rp_<?= $i12_name_modal; ?>" data-toggle="tab">Reports</a>
                                                </li>

                                            </ul>

                                            <!--Start Tab panes -->
                                            <div class="tab-content">
                                                <!--start pane on data-sources-->
                                                <div class="tab-pane active" id="ds_<?= $i12_name_modal; ?>">
                                                    <div class="clearfix"></div>
                                                    <h5 class="text-center"><b><?= $i12_name; ?></b> =
                                                        Market Prices Today</h5>
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
                                                        foreach ($data_get_i12_DS as $rows) {
                                                            $i12_ds_name = $rows->datasource_name;
                                                            $i12_ds_link = $rows->datasource_link;

                                                            ?>

                                                            <tr>
                                                                <td><?= $i12_ds_name; ?></td>
                                                                <td>
                                                                    <a onClick="location.href='<?= prep_url(oldsite_url) . $i12_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                       target="_blank"><?= $i12_ds_name; ?> :Data</a>
                                                                </td>
                                                                <td >
                                                                    <div id="indicator_twelve_opo"></div>

                        <?php
                        /*start Reports*/
                        foreach ($market_prices as $rows) {
                            $maize_price_value = $rows->Maize;
                            $beans_price_value = $rows->Beans;
                            $coffee_price_value = $rows->Coffee;
                        }

                            ?>

                        <table cellspacing='0' border='1' width=100% height=100%>
                            
                          <tr class='evenrow'>
                            <th class="tg-031e">Maize(ugx)</th>
                            <th class="tg-yw4l">Beans(ugx)</th>
                            <th class="tg-yw4l">Coffee(ugx)</th>
                          </tr>
                          <tr>
                            <td class="text-right"><?= $maize_price_value; ?></td>
                            <td class="text-right"><?= $beans_price_value; ?></td>
                            <td class="text-right"><?= $coffee_price_value; ?></td>
                          </tr>
                        </table>
                    </div>

                                                                </td>
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
                                                <div class="tab-pane" id="rp_<?= $i12_name_modal; ?>">
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
                                                        foreach ($data_get_i12_RP as $rows) {
                                                            $i12_rp_name = $rows->report_name;
                                                            $i12_rp_link = $rows->report_link;


                                                            ?>

                                                            <tr>
                                                                <td><?= $i12_rp_name; ?></td>
                                                                <td>
                                                                    <a onClick="location.href='<?= prep_url(oldsite_url) . $i12_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                       target="_blank"><?= $i12_rp_name; ?> :</a>
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
        <!-- /.col-lg-4 -->
       
        <!--end epayements-->
     </div>


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
                                            <h4 class="modal-title" id="<?= $i8_aria_label; ?>"><?= $i8_name; ?></h4>
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
                                                                           target="_blank"><?= $i5_ds_name; ?> :Data</a>
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
                                            <h4 class="modal-title" id="<?= $i6_aria_label; ?>"><?= $i6_name; ?></h4>
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
                                                                           target="_blank"><?= $i5_ds_name; ?> :Data</a>
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
                    foreach ($data_get_i9_Details as $rows) {
                        $i9_name = $rows->indicator_name;
                        $i9_name_modal = $rows->indicator_modal_name;
                        $i9_name_formula = $rows->indicator_formula;
                        $i9_aria_label = $rows->indicator_aria_label;
                    }
                    /*end details*/
                    ?>
                    <i class="fa fa-pie-chart fa-fw dashboard-panel-heading"></i><strong
                        class="dashboard-panel-heading"> <?= $i9_name; ?></strong>

                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                    data-toggle="modal" data-target="#<?= $i9_name_modal; ?>">
                                View Details
                                <span class="caret"></span>
                            </button>
                            <!--Start Hectares Modal -->
                            <div class="modal fade " id="<?= $i9_name_modal; ?>" tabindex="-1" role="dialog"
                                 aria-labelledby="<?= $i9_aria_label; ?>"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="<?= $i9_aria_label; ?>"><?= $i9_name; ?></h4>
                                        </div>
                                        <div class="tabbable">
                                            <div class="modal-body">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#ds_<?= $i9_name_modal; ?>"
                                                                          data-toggle="tab">Data Sources</a></li>
                                                    <li><a href="#rp_<?= $i9_name_modal; ?>" data-toggle="tab">Reports</a>
                                                    </li>

                                                </ul>

                                                <!--Start Tab panes -->
                                                <div class="tab-content">
                                                    <!--start pane on data-sources-->
                                                    <div class="tab-pane active" id="ds_<?= $i9_name_modal; ?>">
                                                        <div class="clearfix"></div>
                                                        <h5 class="text-center"><b><?= $i9_name; ?></b> =
                                                            (<?= $i9_name_formula; ?>)</h5>
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
                                                            foreach ($data_get_i9_DS as $rows) {
                                                                $i5_ds_name = $rows->datasource_name;
                                                                $i5_ds_link = $rows->datasource_link;

                                                                ?>

                                                                <tr>
                                                                    <td><?= $i5_ds_name; ?></td>
                                                                    <td>
                                                                        <a onClick="location.href='<?= prep_url(oldsite_url) . $i5_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                           target="_blank"><?= $i5_ds_name; ?> :Data</a>
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
                                                    <div class="tab-pane" id="rp_<?= $i9_name_modal; ?>">
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
                                                            foreach ($data_get_i9_RP as $rows) {
                                                                $i9_rp_name = $rows->report_name;
                                                                $i9_rp_link = $rows->report_link;

                                                                ?>

                                                                <tr>
                                                                    <td><?= $i9_rp_name; ?></td>
                                                                    <td>
                                                                        <a onClick="location.href='<?= prep_url(oldsite_url) . $i9_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                           target="_blank"><?= $i9_rp_name; ?> :</a>
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
    <!--end row two-->

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
                                            <h4 class="modal-title" id="<?= $i10_aria_label; ?>"><?= $i10_name; ?></h4>
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
                                                                           target="_blank"><?= $i5_ds_name; ?> :Data</a>
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
                                                                           target="_blank"><?= $i10_rp_name; ?> :</a>
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
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="indicator_ten"></div>
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
                    foreach ($data_get_i3_Details as $rows) {
                        $i3_name = $rows->indicator_name;
                        $i3_name_modal = $rows->indicator_modal_name;
                        $i3_name_formula = $rows->indicator_formula;
                        $i3_aria_label = $rows->indicator_aria_label;
                    }
                    /*end details*/
                    ?>
                    <i class="fa fa-pie-chart fa-fw dashboard-panel-heading"></i><strong
                        class="dashboard-panel-heading"> <?= $i3_name; ?></strong>

                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                    data-toggle="modal" data-target="#<?= $i3_name_modal; ?>">
                                View Details
                                <span class="caret"></span>
                            </button>
                            <!--Start Hectares Modal -->
                            <div class="modal fade " id="<?= $i3_name_modal; ?>" tabindex="-1" role="dialog"
                                 aria-labelledby="<?= $i3_aria_label; ?>"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="<?= $i3_aria_label; ?>"><?= $i3_name; ?></h4>
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
                                                    <div class="tab-pane" id="rp_<?= $i12_name_modal; ?>">
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
                            <!--End Hectares Modal -->
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="indicator_three_sold"></div>
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
                    foreach ($data_get_i2_Details as $rows) {
                        $i2_name = $rows->indicator_name;
                        $i2_name_modal = $rows->indicator_modal_name;
                        $i2_name_formula = $rows->indicator_formula;
                        $i2_aria_label = $rows->indicator_aria_label;
                    }
                    /*end details*/
                    ?>
                    <i class="fa fa-pie-chart fa-fw dashboard-panel-heading"></i><strong
                        class="dashboard-panel-heading"> <?= $i2_name; ?></strong>

                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                    data-toggle="modal" data-target="#<?= $i2_name_modal; ?>">
                                View Details
                                <span class="caret"></span>
                            </button>
                            <!--Start Hectares Modal -->
                            <div class="modal fade " id="<?= $i2_name_modal; ?>" tabindex="-1" role="dialog"
                                 aria-labelledby="<?= $i2_aria_label; ?>"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="<?= $i2_aria_label; ?>"><?= $i2_name; ?></h4>
                                        </div>
                                        <div class="tabbable">
                                            <div class="modal-body">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#ds_<?= $i2_name_modal; ?>"
                                                                          data-toggle="tab">Data Sources</a></li>
                                                    <li><a href="#rp_<?= $i2_name_modal; ?>" data-toggle="tab">Reports</a>
                                                    </li>

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
                                                                           target="_blank"><?= $i2_ds_name; ?> :Data</a>
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
                            <!--End Hectares Modal -->
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="indicator_two_partnerships"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->


        </div>




    </div>
    <!--end row three-->




    <div class="row">

        <div class="col-lg-6 dashboard-panel">
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
                                            <h4 class="modal-title" id="<?= $i26_aria_label; ?>"><?= $i26_name; ?></h4>
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
                                                                           target="_blank"><?= $i26_ds_name; ?> :Data</a>
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
                                                                           target="_blank"><?= $i26_rp_name; ?> :</a>
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
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="indicator_dashindicatorGrossmargin"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->


        </div>
    <!-- /.col-lg-4 -->

        <div class="col-lg-6 dashboard-panel">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php
                    /*start details*/
                    foreach ($data_get_i27_Details as $rows) {
                        $i27_name = $rows->indicator_name;
                        $i27_name_modal = $rows->indicator_modal_name;
                        $i27_name_formula = $rows->indicator_formula;
                        $i27_aria_label = $rows->indicator_aria_label;
                    }
                    /*end details*/
                    ?>
                    <i class="fa fa-pie-chart fa-fw dashboard-panel-heading"></i><strong
                        class="dashboard-panel-heading"> Number of farmers implementing risk-reducing practices</strong>

                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                    data-toggle="modal" data-target="#<?= $i27_name_modal; ?>">
                                View Details
                                <span class="caret"></span>
                            </button>
                            <!--Start Hectares Modal -->
                            <div class="modal fade " id="<?= $i27_name_modal; ?>" tabindex="-1" role="dialog"
                                 aria-labelledby="<?= $i27_aria_label; ?>"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="<?= $i27_aria_label; ?>">Number of farmers implementing risk-reducing practices</h4>
                                        </div>
                                        <div class="tabbable">
                                            <div class="modal-body">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#ds_<?= $i27_name_modal; ?>"
                                                                          data-toggle="tab">Data Sources</a></li>
                                                    <li><a href="#rp_<?= $i27_name_modal; ?>" data-toggle="tab">Reports</a>
                                                    </li>

                                                </ul>

                                                <!--Start Tab panes -->
                                                <div class="tab-content">
                                                    <!--start pane on data-sources-->
                                                    <div class="tab-pane active" id="ds_<?= $i27_name_modal; ?>">
                                                        <div class="clearfix"></div>
                                                        <h5 class="text-center"><b><?= $i27_name; ?></b> =
                                                            (<?= $i27_name_formula; ?>)</h5>
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
                                                            foreach ($data_get_i27_DS as $rows) {
                                                                $i27_ds_name = $rows->datasource_name;
                                                                $i27_ds_link = $rows->datasource_link;

                                                                ?>

                                                                <tr>
                                                                    <td><?= $i27_ds_name; ?></td>
                                                                    <td>
                                                                        <a onClick="location.href='<?= prep_url(oldsite_url) . $i27_ds_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                           target="_blank"><?= $i27_ds_name; ?> :Data</a>
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
                                                    <div class="tab-pane" id="rp_<?= $i27_name_modal; ?>">
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
                                                            foreach ($data_get_i27M_RP as $rows) {
                                                                $i27_rp_name = $rows->report_name;
                                                                $i27_rp_link = $rows->report_link;

                                                                ?>

                                                                <tr>
                                                                    <td><?= $i27_rp_name; ?></td>
                                                                    <td>
                                                                        <a onClick="location.href='<?= prep_url(oldsite_url) . $i27_rp_link; ?>&u_id=<?= $this->session->userdata['user_id']; ?>'"
                                                                           target="_blank"><?= $i27_rp_name; ?> :</a>
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
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="indicator_risk_management"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->


        </div>

    </div>
    <!--end row three-->



</div>
<!-- /#page-wrapper -->




