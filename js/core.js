/**
 * [runGraph description]
 * @param  {[type]} container        [description]
 * @param  {[type]} chart_title      [description]
 * @param  {[type]} chart_stacking   [description]
 * @param  {[type]} chart_type       [description]
 * @param  {[type]} chart_categories [description]
 * @param  {[type]} chart_series     [description]
 * @param  {[type]} chart_drilldown  [description]
 * @param  {[type]} chart_size       [description]
 * @param  {[type]} chart_margin     [description]
 * @param  {[type]} color_scheme     [description]
 * @return {[type]}                  [description]
 */
function runGraph(container, chart_title, chart_stacking, chart_type, chart_categories, chart_series, chart_drilldown, chart_length, chart_width, chart_margin, color_scheme) {
    $('#' + container).highcharts({
        colors: color_scheme,
        chart: {
            zoomType: 'x',
            height: chart_length,
            width: chart_width,
            type: chart_type,
            marginBottom: chart_margin
        },
        title: {
            text: chart_title
        },
        xAxis: {
            categories: chart_categories
        },
        yAxis: {
            min: 0,
            title: {
                text: chart_title,
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ''
        },
        plotOptions: {
            series: {
                stacking: chart_stacking
            },
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            },
            bar: {
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        if (this.y != 0 && chart_stacking == 'percent') {
                            return Math.round(this.percentage) + '%';
                        } else {
                            return this.value;
                        }
                    },
                    color: 'white'
                },
                events: {
                    legendItemClick: function() {
                        return false; // <== returning false will cancel the default action
                    }
                }
            }
        },
        legend: {
            layout: 'horizontal',
            align: 'left',
            floating: true,
            borderWidth: 1,
            backgroundColor: '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: chart_series,
        drilldown: {
            series: chart_drilldown
        }
    });
}

/**
 * [loadGraph description]
 * @param  {[type]} base_url      [description]
 * @param  {[type]} function_url  [description]
 * @param  {[type]} graph_section [description]
 * @return {[type]}               [description]
 */
function loadGraph(base_url, function_url, graph_section) {
    $.ajax({
        url: base_url + function_url,
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
            //console.log(data);
            obj = jQuery.parseJSON(data);
            $(graph_section).empty();
            $(graph_section).append('<div id="' + obj.container + '" ></div>');
            runGraph(obj.container, obj.chart_title, obj.chart_stacking, obj.chart_type, obj.chart_categories, obj.chart_series, obj.chart_drilldown, obj.chart_length, obj.chart_width, obj.chart_margin, obj.color_scheme);
        }
    });
}

/**
 * [getCountryInfo description]
 * @param  {[type]} country [description]
 * @return {[type]}         [description]
 */
function getCountryInfo(country) {
    var country_code = '';
    $.ajax({
        async: false,
        url: 'http://localhost/mnh/assets/data/countries.json',
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
            //console.log(data);

            obj = jQuery.parseJSON(data);
            $.each(obj, function(k, v) {
                if (v["name"] == country) {
                    //console.log(v.callingCode[0])
                    country_code = v.callingCode[0];

                }
            });

        }
    });
    return country_code;

}

/**
 * [runNotification description]
 * @param  {[type]} base_url     [description]
 * @param  {[type]} function_url [description]
 * @param  {[type]} messsage     [description]
 * @return {[type]}              [description]
 */
function runNotification(base_url, function_url, messsage) {
    var period = '';
    $.ajax({
        //url: base_url + function_url,
        url: base_url + function_url,
        async: false,
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
            //console.log(data);die;
            obj = jQuery.parseJSON(data);
            $.each(obj, function(k, v) {
                console.log(v.cl_country);
                //console.log(getCountryInfo(v.cl_country));
                phoneNumber = getCountryInfo(v.cl_country) + v.cl_phone_number;
                today = new Date();
                hours = today.getHours();
                console.log(hours);


                if (hours < 12) {
                    period = 'Morning';
                } else if (hours <= 18) {
                    period = 'Afternoon';
                } else if (hours > 18) {
                    period = 'Evening';
                } else {
                    period = '';
                }

                newMessage = period + ' ' + v.cl_name + ',  ' + message;
                console.log(newMessage);
                notify(phoneNumber, newMessage);

            });
        }
    });
}


/**
 * [notify description]
 * @param  {[type]} phoneNumber [description]
 * @param  {[type]} message     [description]
 * @return {[type]}             [description]
 */
function notify(phoneNumber, message) {
    //message="test";
    $.ajax({
        //url: base_url + function_url,
        url: 'http://localhost/mnh/c_admin/notify/sms/' + phoneNumber + '/' + encodeURIComponent(message),
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
            console.log(data);

        }
    });
}