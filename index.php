<!DOCTYPE html>
<html lang="en">
<?php
require_once("selected_search.php");
$selected_search = new SelectedSearch();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="assets/css.css">
    <script src="jquery-easyui/jquery.min.js"></script>
    <script src="jquery-easyui/jquery.easyui.min.js"></script>
    <script src="highcharts/code/highcharts.js"></script>
    <script src="assets/js.js"></script>
    <script src="assets/grafik.js"></script>
    <title>KANO</title>
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="form-row">
                <div class="form-group col">
                    <input type="text" class="form-control" name="CMGUnmaskedName" id="CMGUnmaskedName" placeholder="Search For CMGUnmaskedName">
                    <span style="color: red; font-size: small;">* <b>noted</b> : type search and press enter</span>
                </div>
                <div class="form-group col">
                    <select name="ClientTier" id="ClientTier" class="form-control" onchange="refreshListGrid()">
                        <option value="">-- Search For ClientTier --</option>
                        <?php
                        $resultClientTier = $selected_search->getSelected(2);
                        foreach ($resultClientTier as $key => $value) {
                        ?>
                            <option value="<?php echo $value; ?>">
                                <?php echo $value; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col">
                    <select name="CMGSegmentName" id="CMGSegmentName" class="form-control" onchange="refreshListGrid()">
                        <option value="">-- Search For CMGSegmentName --</option>
                        <?php
                        $resultCMGSegmentName = $selected_search->getSelected(6);
                        foreach ($resultCMGSegmentName as $key => $value) {
                        ?>
                            <option value="<?php echo $value; ?>">
                                <?php echo $value; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col">
                    <button type="button" class="btn btn-danger" onclick="resetListGrid()">
                        Clear
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <span style="color: red; font-size: small;">* <b>noted</b> : click row this table, to show graphic and update data</span>
            <table id="listGrid"></table>
        </div>
        <div id="grafik" class="row mt-3 mb-3">
            <div class="col-md-6">
                <div id="pie-chart"></div>
            </div>
            <div class="col-md-6">
                <div id="column-chart"></div>
            </div>
            <div class="col-md-6">
                <div id="line-chart"></div>
            </div>
            <div class="col-md-6">
                <div id="bar-chart"></div>
            </div>
            <?php require_once("_form_update.php"); ?>
        </div>
    </div>
</body>

</html>