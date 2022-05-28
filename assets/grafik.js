function generateGrafik(ROE_FY14, ROE_FY15, REVENUE_FY14, REVENUE_FY15, RWAFY14, RWAFY15,
    TotalLimits_EOP_FY14, TotalLimits_EOP_FY15, Company_Avg_Activity_FY14, Company_Avg_Activity_FY15,
    NPAT_AllocEq_FY14, NPAT_AllocEq_FY15X, Deposits_EOP_FY14, Deposits_EOP_FY15x) {

    var ROE_FY14 = ROE_FY14.replace("%", "");
    var ROE_FY15 = ROE_FY15.replace("%", "");
    /**
     * ======================================
     * PIE CHART
     * ======================================
     */
    Highcharts.chart('pie-chart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: 'ROE FY14 vs ROE FY15'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.2f} %</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.2f} %'
                }
            }
        },
        series: [{
            name: 'Value',
            colorByPoint: true,
            data: [{
                name: 'ROE_FY14',
                y: parseFloat(ROE_FY14),
                sliced: true,
                selected: true
            }, {
                name: 'ROE_FY15',
                y: parseFloat(ROE_FY15)
            }]
        }]
    });

    /**
     * ======================================
     * COLUMN CHART
     * ======================================
     */
    Highcharts.chart('column-chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: 'Revenue & RWA FY14vs FY15'
        },
        xAxis: {
            crosshair: true,
            type: 'category',
        },
        yAxis: {
            labels: {
                formatter: function () {
                    if (this.value >= 1000000) {
                        return this.value / 1000000 + 'Jt';
                    } else {
                        return this.value;
                    }
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: '',
            data: [
                ['RWAFY14', replaceComa(REVENUE_FY14)],
                ['REVENUE_FY14', replaceComa(REVENUE_FY15)],
                ['RWAFY15', replaceComa(RWAFY14)],
                ['REVENUE_FY15', replaceComa(RWAFY15)]
            ],
        }]
    });

    /**
     * ======================================
     * LINE CHART
     * ======================================
     */
    Highcharts.chart('line-chart', {
        chart: {
            type: 'line'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: 'Total Limit EOP FY14 vs FY15'
        },
        xAxis: {
            crosshair: true,
            type: 'category',
        },
        yAxis: {
            labels: {
                formatter: function () {
                    if (this.value >= 1000000) {
                        return this.value / 1000000 + 'Jt';
                    } else {
                        return this.value;
                    }
                }
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: '',
            data: [
                ['TotalLimits_EOP_FY14', replaceComa(TotalLimits_EOP_FY14)],
                ['TotalLimits_EOP_FY15', replaceComa(TotalLimits_EOP_FY15)]
            ],
        }]
    });

    /**
     * ======================================
     * BAR CHART
     * ======================================
     */
    Highcharts.chart('bar-chart', {
        chart: {
            type: 'bar'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: 'Company Average Activity FY14 vs FY15'
        },
        xAxis: {
            categories: ['Avg Regulatory Capital', 'NP AT Allocation', 'Total Limits EOP', 'Deposits EOP'],
            title: {
                text: null
            }
        },
        yAxis: {
            title: {
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'FY14',
            data: [replaceComa(Company_Avg_Activity_FY14), replaceComa(NPAT_AllocEq_FY14), replaceComa(TotalLimits_EOP_FY14), replaceComa(Deposits_EOP_FY14)]
        }, {
            name: 'FY15',
            data: [replaceComa(Company_Avg_Activity_FY15), replaceComa(NPAT_AllocEq_FY15X), replaceComa(TotalLimits_EOP_FY15), replaceComa(Deposits_EOP_FY15x)]
        }]
    });
}