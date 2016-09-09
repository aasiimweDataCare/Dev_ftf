<?php
session_start();
require_once('connections/lib_connect.php');
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <title>CPM MIS:Market Prices</title>
        <script type="text/javascript" src="js/number.js"></script>
        <script type="text/javascript" src="js/addRow.js" language="javascript"></script>
        <script language='javascript'  type='text/javascript' src="js/validation.js"> </script>
        <script type="text/javascript" src="js/jquery-1.7.1.min.js" language="javascript"></script>
        <script type="text/javascript" src="js/loading.js" language="javascript"></script>
        <script type="text/javascript" src="js/check.js" language="javascript"></script>
        <script type="text/javascript" src="js/popup.js" language="javascript"></script>
        <script type="text/javascript" src="js/js.js" language="javascript"></script>
        <script type="text/javascript" src="js/limit_text.js" language="javascript"></script>
        <script type="text/javascript" src="js/add_upload.js" language="javascript"></script>
        <script type="text/javascript" src="js/jquery-2.1.4.js" language="javascript"></script>
        <script type="text/javascript" src="js/sumRows.js" language="javascript"></script>
        <script type="text/javascript" src="js/hoverRows.js" language="javascript"></script>
    </head>

    <body>

        <?php

    if(isset($_POST['save_prices'])){
        $maize=trim($_POST['maize_value']);
        $beans=trim($_POST['beans_value']);
        $coffee=trim($_POST['coffee_value']);

        mysql_query("insert into tbl_market_prices(Maize,Beans,Coffee)values('".$maize."','".$beans."','".$coffee."')")or die("<font color='red'>could not capture prices because ".mysql_error()."</font>");
        
    }

?>

        <table width="870" border="0" align="center" id="content_">
            <tr>
                <td colspan="2" valign="top"><?php require_once('connections/header.php'); ?></td>
            </tr>
            <tr>
                <td width="190" valign="top">
                    <table width="190" border="0">
                        <tr>
                            <td valign="top" align="left"><?php require_once('connections/left_links.php'); ?></td>
                        </tr>
                    </table>
                </td>
                <td width="660" valign="top">

                    <div id="bodyDisplay">
                        <table width='400' border='0'>
                            <tr><td class="greenlinks">Help &raquo; Market Prices</td></tr>
                            <tr><td><hr/></td></tr>

                            <tr>
                                <td>
                                    <form action='market_price.php' method='post' NAME='market_prices' id='prices' enctype='multipart/form-data'>
                                        <table width='535' border='0'>
                                            <tr>
                                                <td width='517'>

                                                    <table border='0'>
                                                        <tr>
                                                            <td>Maize:</td>
                                                            
                                                            <td>
                                                                 <input type='text'  name='maize_value' id='maize_value'>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Beans:</td>

                                                            <td>
                                                                 <input type='text'  name='beans_value' id='beans_value'>
                                                            </td>

                                                         </tr>
                                                        <tr>

                                                            <td>Coffee:</td>

                                                            <td>
                                                                 <input type='text'  name='coffee_value' id='coffee_value'>
                                                            </td>
                                                        </tr>



                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td align='right'><input type='submit' name='save_prices' id='save_prices'  value='Save' /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
            </tr>
        </table>

</body>
</html>
