$(document).on("keypress", '#CMGUnmaskedName', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        refreshListGrid();
        return false;
    }
});

function refreshListGrid() {
    $('#listGrid').datagrid('reload');
    $('#formUpdateData').hide();
    $('#grafik').hide();
}

function resetListGrid() {
    $('#CMGUnmaskedName').val('');
    $('#ClientTier').val('').change();
    $('#CMGSegmentName').val('').change();
    $('#listGrid').datagrid('reload');
    $('#formUpdateData').hide();
    $('#grafik').hide();
}

function replaceComa(params) {
    if (params == "" || params == '-') {
        return 0;
    }
    return parseInt(params.replace(/,/g, ""));
}

$(function () {
    $('#formUpdateData').hide();
    $('#listGrid').datagrid({
        url: 'data_operation.php',
        width: '100%',
        rownumbers: true,
        singleSelect: true,
        pagination: true,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 10,
        pageList: [10, 20, 50, 100],
        columns: [
            [{
                field: 'CMGUnmaskedID',
                title: 'CMGUnmaskedID',
                width: 150,
                halign: 'center',
                align: 'center',
            }, {
                field: 'CMGUnmaskedName',
                title: 'CMGUnmaskedName',
                width: 250,
                halign: 'center',
            }, {
                field: 'ClientTier',
                title: 'ClientTier',
                width: 130,
                halign: 'center',
            }, {
                field: 'GCPStream',
                title: 'GCPStream',
                width: 200,
                halign: 'center',
            }, {
                field: 'GCPBusiness',
                title: 'GCPBusiness',
                width: 150,
                halign: 'center',
            }, {
                field: 'CMGGlobalBU',
                title: 'CMGGlobalBU',
                width: 200,
                halign: 'center',
            }, {
                field: 'CMGSegmentName',
                title: 'CMGSegmentName',
                width: 200,
                halign: 'center',
            }, {
                field: 'GlobalControlPoint',
                title: 'GlobalControlPoint / GCPGeography',
                width: 220,
                halign: 'center',
            },{
                field: 'GlobalRelationshipManagerName',
                title: 'GlobalRelationshipManagerName',
                width: 200,
                halign: 'center',
            }, {
                field: 'REVENUE_FY14',
                title: 'REVENUE_FY14',
                width: 100,
                halign: 'center',
            }, {
                field: 'REVENUE_FY15',
                title: 'REVENUE_FY15',
                width: 100,
                halign: 'center',
            }, {
                field: 'Deposits_EOP_FY14',
                title: 'Deposits_EOP_FY14',
                width: 100,
                halign: 'center',
            }, {
                field: 'Deposits_EOP_FY15x',
                title: 'Deposits_EOP_FY15x',
                width: 100,
                halign: 'center',
            }, {
                field: 'TotalLimits_EOP_FY14',
                title: 'TotalLimits_EOP_FY14',
                width: 100,
                halign: 'center',
            }, {
                field: 'TotalLimits_EOP_FY15',
                title: 'TotalLimits_EOP_FY15',
                width: 100,
                halign: 'center',
            }, {
                field: 'TotalLimits_EOP_FY15x',
                title: 'TotalLimits_EOP_FY15x',
                width: 100,
                halign: 'center',
            }, {
                field: 'RWAFY15',
                title: 'RWAFY15',
                width: 100,
                halign: 'center',
            }, {
                field: 'RWAFY14',
                title: 'RWAFY14',
                width: 100,
                halign: 'center',
            }, {
                field: 'NPAT_AllocEq_FY14',
                title: 'NPAT_AllocEq_FY14',
                width: 100,
                halign: 'center',
            }, {
                field: 'NPAT_AllocEq_FY15X',
                title: 'NPAT_AllocEq_FY15X',
                width: 100,
                halign: 'center',
            }, {
                field: 'Company_Avg_Activity_FY14',
                title: 'Company_Avg_Activity_FY14',
                width: 100,
                halign: 'center',
            }, {
                field: 'Company_Avg_Activity_FY15',
                title: 'Company_Avg_Activity_FY15',
                width: 100,
                halign: 'center',
            }, {
                field: 'ROE_FY14',
                title: 'ROE_FY14',
                width: 100,
                halign: 'center',
            }, {
                field: 'ROE_FY15',
                title: 'ROE_FY15',
                width: 100,
                halign: 'center',
            }]
        ],
        onBeforeLoad: function (params) {
            params.CMGUnmaskedName = $('#CMGUnmaskedName').val();
            params.ClientTier = $('#ClientTier').val();
            params.CMGSegmentName = $('#CMGSegmentName').val();
            params.action = 'getList';
        },
        onLoadError: function () {
            return false;
        },
        onClickRow: function () {
            var rows = $('#listGrid').datagrid('getSelected');
            var CMGUnmaskedID = rows.CMGUnmaskedID;
            //for pie-chart
            var ROE_FY14 = rows.ROE_FY14;
            var ROE_FY15 = rows.ROE_FY15;
            //for colum-chart
            var REVENUE_FY14 = rows.REVENUE_FY14;
            var REVENUE_FY15 = rows.REVENUE_FY15;
            var RWAFY14 = rows.RWAFY14;
            var RWAFY15 = rows.RWAFY15;
            //for line-chart
            var TotalLimits_EOP_FY14 = rows.TotalLimits_EOP_FY14;
            var TotalLimits_EOP_FY15 = rows.TotalLimits_EOP_FY15;
            //for bar-chart
            var Company_Avg_Activity_FY14 = rows.Company_Avg_Activity_FY14;
            var Company_Avg_Activity_FY15 = rows.Company_Avg_Activity_FY15;
            var NPAT_AllocEq_FY14 = rows.NPAT_AllocEq_FY14;
            var NPAT_AllocEq_FY15X = rows.NPAT_AllocEq_FY15X;
            var Deposits_EOP_FY14 = rows.Deposits_EOP_FY14;
            var Deposits_EOP_FY15x = rows.Deposits_EOP_FY15x;

            setValueForUpdate(ROE_FY14, ROE_FY15, REVENUE_FY14, REVENUE_FY15, RWAFY14, RWAFY15,
                TotalLimits_EOP_FY14, TotalLimits_EOP_FY15, Company_Avg_Activity_FY14, Company_Avg_Activity_FY15,
                NPAT_AllocEq_FY14, NPAT_AllocEq_FY15X, Deposits_EOP_FY14, Deposits_EOP_FY15x, CMGUnmaskedID);
            generateGrafik(ROE_FY14, ROE_FY15, REVENUE_FY14, REVENUE_FY15, RWAFY14, RWAFY15,
                TotalLimits_EOP_FY14, TotalLimits_EOP_FY15, Company_Avg_Activity_FY14, Company_Avg_Activity_FY15,
                NPAT_AllocEq_FY14, NPAT_AllocEq_FY15X, Deposits_EOP_FY14, Deposits_EOP_FY15x);
            $('#grafik').show();
            $('#formUpdateData').show();
            $('html,body').animate({
                scrollTop: $("#grafik").offset().top
            }, 'slow');
        },
        onLoadSuccess: function (data) {}
    });
});

function setValueForUpdate(ROE_FY14, ROE_FY15, REVENUE_FY14, REVENUE_FY15, RWAFY14, RWAFY15,
    TotalLimits_EOP_FY14, TotalLimits_EOP_FY15, Company_Avg_Activity_FY14, Company_Avg_Activity_FY15, 
    NPAT_AllocEq_FY14, NPAT_AllocEq_FY15X, Deposits_EOP_FY14, Deposits_EOP_FY15x, CMGUnmaskedID) {
    $('#text_field_CMGUnmaskedID').val(CMGUnmaskedID);
    $('#text_field_ROE_FY14').val(ROE_FY14.replace("%", ""));
    $('#text_field_ROE_FY15').val(ROE_FY15.replace("%", ""));
    $('#text_field_REVENUE_FY14').val(REVENUE_FY14);
    $('#text_field_REVENUE_FY15').val(REVENUE_FY15);
    $('#text_field_RWAFY14').val(RWAFY14);
    $('#text_field_RWAFY15').val(RWAFY15);
    $('#text_field_TotalLimits_EOP_FY14').val(TotalLimits_EOP_FY14);
    $('#text_field_TotalLimits_EOP_FY15').val(TotalLimits_EOP_FY15);
    $('#text_field_Company_Avg_Activity_FY14').val(Company_Avg_Activity_FY14);
    $('#text_field_Company_Avg_Activity_FY15').val(Company_Avg_Activity_FY15);
    $('#text_filed_NPAT_AllocEq_FY14').val(NPAT_AllocEq_FY14);
    $('#text_filed_NPAT_AllocEq_FY15X').val(NPAT_AllocEq_FY15X);
    $('#text_filed_Deposits_EOP_FY14').val(Deposits_EOP_FY14);
    $('#text_filed_Deposits_EOP_FY15x').val(Deposits_EOP_FY15x);
}

function updateDataCsv() {
    var NPAT_AllocEq_FY14 = $('text_filed_NPAT_AllocEq_FY14').val();
    var NPAT_AllocEq_FY15X = $('text_filed_NPAT_AllocEq_FY15X').val();
    var Deposits_EOP_FY14 = $('text_filed_Deposits_EOP_FY14').val();
    var Deposits_EOP_FY15x = $('text_filed_Deposits_EOP_FY15x').val();
    $.ajax({
        url: 'data_operation.php',
        type: 'POST',
        data: $('#formUpdateData').serialize(),
        success: function (data) {
            $('#listGrid').datagrid('reload');
            generateGrafik(data.ROE_FY14, data.ROE_FY15, data.REVENUE_FY14, data.REVENUE_FY15, data.RWAFY14, data.RWAFY15,
                data.TotalLimits_EOP_FY14, data.TotalLimits_EOP_FY15, data.Company_Avg_Activity_FY14, data.Company_Avg_Activity_FY15,
                NPAT_AllocEq_FY14, NPAT_AllocEq_FY15X, Deposits_EOP_FY14, Deposits_EOP_FY15x);
            // $("#formUpdateData")[0].reset();
        },
    });
}