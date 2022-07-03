@include('components.head')

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    @include('components.navbar')


    <!-- [ Header ] start -->
    @include('components.header')
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ breadcrumb ] start -->
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->


                            <div class="row">
                                <!-- customar project  start -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center m-l-0">
                                                <div class="col-auto">
                                                    <i class="fas fa-user-graduate f-36 text-c-purple"></i>
                                                </div>
                                                <div class="col-auto">
                                                    <h6 class="text-muted m-b-10">Student</h6>
                                                    <h2 class="m-b-0">45</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center m-l-0">
                                                <div class="col-auto">
                                                    <i class="fas fa-users f-36 text-c-red"></i>
                                                </div>
                                                <div class="col-auto">
                                                    <h6 class="text-muted m-b-10">Parents</h6>
                                                    <h2 class="m-b-0">9</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center m-l-0">
                                                <div class="col-auto">
                                                    <i class="fas fa-user-tie f-36 text-c-green"></i>
                                                </div>
                                                <div class="col-auto">
                                                    <h6 class="text-muted m-b-10">Teacher</h6>
                                                    <h2 class="m-b-0">5</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center m-l-0">
                                                <div class="col-auto">
                                                    <i class="fas fa-book-open f-36 text-c-blue"></i>
                                                </div>
                                                <div class="col-auto">
                                                    <h6 class="text-muted m-b-10">Subject</h6>
                                                    <h2 class="m-b-0">25</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- customar project  end -->
                                <!-- subscribe start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account summary</h5>
                                        </div>
                                        <div class="card-body">
                                            <div id="summary-chart" style="min-height: 265px;">
                                                <div id="apexchartssi5l9qt2"
                                                    class="apexcharts-canvas apexchartssi5l9qt2 apexcharts-theme-light"
                                                    style="width: 1197px; height: 250px;"><svg id="SvgjsSvg1234"
                                                        width="1197" height="250" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev"
                                                        class="apexcharts-svg apexcharts-zoomable"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <foreignObject x="0" y="0" width="1197"
                                                            height="250">
                                                            <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                                                xmlns="http://www.w3.org/1999/xhtml"
                                                                style="inset: auto 0px 1px; position: absolute; max-height: 125px;">
                                                                <div class="apexcharts-legend-series" rel="1"
                                                                    seriesname="Expense" data:collapsed="false"
                                                                    style="margin: 2px 5px;"><span
                                                                        class="apexcharts-legend-marker" rel="1"
                                                                        data:collapsed="false"
                                                                        style="background: rgb(255, 82, 82) !important; color: rgb(255, 82, 82); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                                        class="apexcharts-legend-text" rel="1"
                                                                        i="0" data:default-text="Expense"
                                                                        data:collapsed="false"
                                                                        style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Expense</span>
                                                                </div>
                                                                <div class="apexcharts-legend-series" rel="2"
                                                                    seriesname="Income" data:collapsed="false"
                                                                    style="margin: 2px 5px;"><span
                                                                        class="apexcharts-legend-marker" rel="2"
                                                                        data:collapsed="false"
                                                                        style="background: rgb(70, 128, 255) !important; color: rgb(70, 128, 255); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                                        class="apexcharts-legend-text" rel="2"
                                                                        i="1" data:default-text="Income"
                                                                        data:collapsed="false"
                                                                        style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Income</span>
                                                                </div>
                                                            </div>
                                                            <style type="text/css">
                                                                .apexcharts-legend {
                                                                    display: flex;
                                                                    overflow: auto;
                                                                    padding: 0 10px;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom,
                                                                .apexcharts-legend.apx-legend-position-top {
                                                                    flex-wrap: wrap
                                                                }

                                                                .apexcharts-legend.apx-legend-position-right,
                                                                .apexcharts-legend.apx-legend-position-left {
                                                                    flex-direction: column;
                                                                    bottom: 0;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                                .apexcharts-legend.apx-legend-position-right,
                                                                .apexcharts-legend.apx-legend-position-left {
                                                                    justify-content: flex-start;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                    justify-content: center;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                    justify-content: flex-end;
                                                                }

                                                                .apexcharts-legend-series {
                                                                    cursor: pointer;
                                                                    line-height: normal;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                                                                .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                                                    display: flex;
                                                                    align-items: center;
                                                                }

                                                                .apexcharts-legend-text {
                                                                    position: relative;
                                                                    font-size: 14px;
                                                                }

                                                                .apexcharts-legend-text *,
                                                                .apexcharts-legend-marker * {
                                                                    pointer-events: none;
                                                                }

                                                                .apexcharts-legend-marker {
                                                                    position: relative;
                                                                    display: inline-block;
                                                                    cursor: pointer;
                                                                    margin-right: 3px;
                                                                    border-style: solid;
                                                                }

                                                                .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                                                .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                                                    display: inline-block;
                                                                }

                                                                .apexcharts-legend-series.apexcharts-no-click {
                                                                    cursor: auto;
                                                                }

                                                                .apexcharts-legend .apexcharts-hidden-zero-series,
                                                                .apexcharts-legend .apexcharts-hidden-null-series {
                                                                    display: none !important;
                                                                }

                                                                .apexcharts-inactive-legend {
                                                                    opacity: 0.45;
                                                                }
                                                            </style>
                                                        </foreignObject>
                                                        <g id="SvgjsG1236"
                                                            class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(45.63535118103027, 30)">
                                                            <defs id="SvgjsDefs1235">
                                                                <clipPath id="gridRectMasksi5l9qt2">
                                                                    <rect id="SvgjsRect1246"
                                                                        width="1147.3646488189697"
                                                                        height="172.67999954223632" x="-3"
                                                                        y="-1" rx="0" ry="0"
                                                                        opacity="1" stroke-width="0"
                                                                        stroke="none" stroke-dasharray="0"
                                                                        fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasksi5l9qt2"></clipPath>
                                                                <clipPath id="nonForecastMasksi5l9qt2"></clipPath>
                                                                <clipPath id="gridRectMarkerMasksi5l9qt2">
                                                                    <rect id="SvgjsRect1247"
                                                                        width="1157.3646488189697"
                                                                        height="186.67999954223632" x="-8"
                                                                        y="-8" rx="0" ry="0"
                                                                        opacity="1" stroke-width="0"
                                                                        stroke="none" stroke-dasharray="0"
                                                                        fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <line id="SvgjsLine1242" x1="0" y1="0"
                                                                x2="0" y2="170.67999954223632"
                                                                stroke="#b6b6b6" stroke-dasharray="3"
                                                                stroke-linecap="butt" class="apexcharts-xcrosshairs"
                                                                x="0" y="0" width="1"
                                                                height="170.67999954223632" fill="#b1b9c4"
                                                                filter="none" fill-opacity="0.9" stroke-width="1">
                                                            </line>
                                                            <g id="SvgjsG1285" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG1286" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, -4)"><text
                                                                        id="SvgjsText1288"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="81.97646648976026" y="199.67999954223632"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" font-weight="400"
                                                                        fill="#373d3f"
                                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                        <tspan id="SvgjsTspan1289">Feb '19</tspan>
                                                                        <title>Feb '19</title>
                                                                    </text><text id="SvgjsText1291"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="258.5411635446285" y="199.67999954223632"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" font-weight="400"
                                                                        fill="#373d3f"
                                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                        <tspan id="SvgjsTspan1292">Mar '19</tspan>
                                                                        <title>Mar '19</title>
                                                                    </text><text id="SvgjsText1294"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="454.0235067125184" y="199.67999954223632"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" font-weight="400"
                                                                        fill="#373d3f"
                                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                        <tspan id="SvgjsTspan1295">Apr '19</tspan>
                                                                        <title>Apr '19</title>
                                                                    </text><text id="SvgjsText1297"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="643.1999678427344" y="199.67999954223632"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" font-weight="400"
                                                                        fill="#373d3f"
                                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                        <tspan id="SvgjsTspan1298">May '19</tspan>
                                                                        <title>May '19</title>
                                                                    </text><text id="SvgjsText1300"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="838.6823110106243" y="199.67999954223632"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" font-weight="400"
                                                                        fill="#373d3f"
                                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                        <tspan id="SvgjsTspan1301">Jun '19</tspan>
                                                                        <title>Jun '19</title>
                                                                    </text><text id="SvgjsText1303"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="1027.8587721408403" y="199.67999954223632"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" font-weight="400"
                                                                        fill="#373d3f"
                                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                        <tspan id="SvgjsTspan1304">Jul '19</tspan>
                                                                        <title>Jul '19</title>
                                                                    </text><text id="SvgjsText1306"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="1223.3411153087302" y="199.67999954223632"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" font-weight="400"
                                                                        fill="#373d3f"
                                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                        <tspan id="SvgjsTspan1307"></tspan>
                                                                        <title></title>
                                                                    </text></g>
                                                                <line id="SvgjsLine1308" x1="0"
                                                                    y1="171.67999954223632" x2="1141.3646488189697"
                                                                    y2="171.67999954223632" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-width="1"
                                                                    stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1323" class="apexcharts-grid">
                                                                <g id="SvgjsG1324"
                                                                    class="apexcharts-gridlines-horizontal">
                                                                    <line id="SvgjsLine1332" x1="0"
                                                                        y1="0" x2="1141.3646488189697"
                                                                        y2="0" stroke="#e0e0e0"
                                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1333" x1="0"
                                                                        y1="34.13599990844726" x2="1141.3646488189697"
                                                                        y2="34.13599990844726" stroke="#e0e0e0"
                                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1334" x1="0"
                                                                        y1="68.27199981689452" x2="1141.3646488189697"
                                                                        y2="68.27199981689452" stroke="#e0e0e0"
                                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1335" x1="0"
                                                                        y1="102.40799972534178"
                                                                        x2="1141.3646488189697"
                                                                        y2="102.40799972534178" stroke="#e0e0e0"
                                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1336" x1="0"
                                                                        y1="136.54399963378904"
                                                                        x2="1141.3646488189697"
                                                                        y2="136.54399963378904" stroke="#e0e0e0"
                                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1337" x1="0"
                                                                        y1="170.67999954223632"
                                                                        x2="1141.3646488189697"
                                                                        y2="170.67999954223632" stroke="#e0e0e0"
                                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1325"
                                                                    class="apexcharts-gridlines-vertical"></g>
                                                                <line id="SvgjsLine1326" x1="81.97646648976026"
                                                                    y1="171.67999954223632" x2="81.97646648976026"
                                                                    y2="177.67999954223632" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-xaxis-tick"></line>
                                                                <line id="SvgjsLine1327" x1="258.5411635446285"
                                                                    y1="171.67999954223632" x2="258.5411635446285"
                                                                    y2="177.67999954223632" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-xaxis-tick"></line>
                                                                <line id="SvgjsLine1328" x1="454.0235067125184"
                                                                    y1="171.67999954223632" x2="454.0235067125184"
                                                                    y2="177.67999954223632" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-xaxis-tick"></line>
                                                                <line id="SvgjsLine1329" x1="643.1999678427344"
                                                                    y1="171.67999954223632" x2="643.1999678427344"
                                                                    y2="177.67999954223632" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-xaxis-tick"></line>
                                                                <line id="SvgjsLine1330" x1="838.6823110106243"
                                                                    y1="171.67999954223632" x2="838.6823110106243"
                                                                    y2="177.67999954223632" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-xaxis-tick"></line>
                                                                <line id="SvgjsLine1331" x1="1027.8587721408403"
                                                                    y1="171.67999954223632" x2="1027.8587721408403"
                                                                    y2="177.67999954223632" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-xaxis-tick"></line>
                                                                <line id="SvgjsLine1339" x1="0"
                                                                    y1="170.67999954223632" x2="1141.3646488189697"
                                                                    y2="170.67999954223632" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1338" x1="0"
                                                                    y1="1" x2="0"
                                                                    y2="170.67999954223632" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1248"
                                                                class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1249" class="apexcharts-series"
                                                                    seriesName="Expense" data:longestSeries="true"
                                                                    rel="1" data:realIndex="0">
                                                                    <path id="SvgjsPath1265"
                                                                        d="M 0 170.67999954223632L 0 102.40799972534178C 68.41882010876144 102.40799972534178 127.0635230591284 42.669999885559065 195.48234316788984 42.669999885559065C 257.2799871370937 42.669999885559065 310.2493962535542 136.54399963378904 372.0470402227581 136.54399963378904C 440.46586033151954 136.54399963378904 499.11056328188647 93.87399974822998 567.5293833906479 93.87399974822998C 633.7411447862236 93.87399974822998 690.4940831252883 119.47599967956542 756.7058445208639 119.47599967956542C 825.1246646296254 119.47599967956542 883.7693675799923 85.33999977111816 952.1881876887537 85.33999977111816C 1018.3999490843294 85.33999977111816 1075.152887423394 119.47599967956542 1141.3646488189697 119.47599967956542C 1141.3646488189697 119.47599967956542 1141.3646488189697 119.47599967956542 1141.3646488189697 170.67999954223632M 1141.3646488189697 119.47599967956542z"
                                                                        fill="rgba(255,82,82,0.2)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-area" index="0"
                                                                        clip-path="url(#gridRectMasksi5l9qt2)"
                                                                        pathTo="M 0 170.67999954223632L 0 102.40799972534178C 68.41882010876144 102.40799972534178 127.0635230591284 42.669999885559065 195.48234316788984 42.669999885559065C 257.2799871370937 42.669999885559065 310.2493962535542 136.54399963378904 372.0470402227581 136.54399963378904C 440.46586033151954 136.54399963378904 499.11056328188647 93.87399974822998 567.5293833906479 93.87399974822998C 633.7411447862236 93.87399974822998 690.4940831252883 119.47599967956542 756.7058445208639 119.47599967956542C 825.1246646296254 119.47599967956542 883.7693675799923 85.33999977111816 952.1881876887537 85.33999977111816C 1018.3999490843294 85.33999977111816 1075.152887423394 119.47599967956542 1141.3646488189697 119.47599967956542C 1141.3646488189697 119.47599967956542 1141.3646488189697 119.47599967956542 1141.3646488189697 170.67999954223632M 1141.3646488189697 119.47599967956542z"
                                                                        pathFrom="M -1 170.67999954223632L -1 170.67999954223632L 195.48234316788984 170.67999954223632L 372.0470402227581 170.67999954223632L 567.5293833906479 170.67999954223632L 756.7058445208639 170.67999954223632L 952.1881876887537 170.67999954223632L 1141.3646488189697 170.67999954223632">
                                                                    </path>
                                                                    <path id="SvgjsPath1266"
                                                                        d="M 0 102.40799972534178C 68.41882010876144 102.40799972534178 127.0635230591284 42.669999885559065 195.48234316788984 42.669999885559065C 257.2799871370937 42.669999885559065 310.2493962535542 136.54399963378904 372.0470402227581 136.54399963378904C 440.46586033151954 136.54399963378904 499.11056328188647 93.87399974822998 567.5293833906479 93.87399974822998C 633.7411447862236 93.87399974822998 690.4940831252883 119.47599967956542 756.7058445208639 119.47599967956542C 825.1246646296254 119.47599967956542 883.7693675799923 85.33999977111816 952.1881876887537 85.33999977111816C 1018.3999490843294 85.33999977111816 1075.152887423394 119.47599967956542 1141.3646488189697 119.47599967956542"
                                                                        fill="none" fill-opacity="1"
                                                                        stroke="#ff5252" stroke-opacity="1"
                                                                        stroke-linecap="butt" stroke-width="2"
                                                                        stroke-dasharray="0" class="apexcharts-area"
                                                                        index="0"
                                                                        clip-path="url(#gridRectMasksi5l9qt2)"
                                                                        pathTo="M 0 102.40799972534178C 68.41882010876144 102.40799972534178 127.0635230591284 42.669999885559065 195.48234316788984 42.669999885559065C 257.2799871370937 42.669999885559065 310.2493962535542 136.54399963378904 372.0470402227581 136.54399963378904C 440.46586033151954 136.54399963378904 499.11056328188647 93.87399974822998 567.5293833906479 93.87399974822998C 633.7411447862236 93.87399974822998 690.4940831252883 119.47599967956542 756.7058445208639 119.47599967956542C 825.1246646296254 119.47599967956542 883.7693675799923 85.33999977111816 952.1881876887537 85.33999977111816C 1018.3999490843294 85.33999977111816 1075.152887423394 119.47599967956542 1141.3646488189697 119.47599967956542"
                                                                        pathFrom="M -1 170.67999954223632L -1 170.67999954223632L 195.48234316788984 170.67999954223632L 372.0470402227581 170.67999954223632L 567.5293833906479 170.67999954223632L 756.7058445208639 170.67999954223632L 952.1881876887537 170.67999954223632L 1141.3646488189697 170.67999954223632">
                                                                    </path>
                                                                    <g id="SvgjsG1250"
                                                                        class="apexcharts-series-markers-wrap"
                                                                        data:realIndex="0">
                                                                        <g id="SvgjsG1252"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasksi5l9qt2)">
                                                                            <circle id="SvgjsCircle1253"
                                                                                r="3" cx="0"
                                                                                cy="102.40799972534178"
                                                                                class="apexcharts-marker no-pointer-events wvh6xkeqz"
                                                                                stroke="#ff5252" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9" rel="0"
                                                                                j="0" index="0"
                                                                                default-marker-size="3"></circle>
                                                                            <circle id="SvgjsCircle1254"
                                                                                r="3" cx="195.48234316788984"
                                                                                cy="42.669999885559065"
                                                                                class="apexcharts-marker no-pointer-events wk1cj2fi8"
                                                                                stroke="#ff5252" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9" rel="1"
                                                                                j="1" index="0"
                                                                                default-marker-size="3"></circle>
                                                                        </g>
                                                                        <g id="SvgjsG1255"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasksi5l9qt2)">
                                                                            <circle id="SvgjsCircle1256"
                                                                                r="3" cx="372.0470402227581"
                                                                                cy="136.54399963378904"
                                                                                class="apexcharts-marker no-pointer-events wfp6ryseq"
                                                                                stroke="#ff5252" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9" rel="2"
                                                                                j="2" index="0"
                                                                                default-marker-size="3"></circle>
                                                                        </g>
                                                                        <g id="SvgjsG1257"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasksi5l9qt2)">
                                                                            <circle id="SvgjsCircle1258"
                                                                                r="3" cx="567.5293833906479"
                                                                                cy="93.87399974822998"
                                                                                class="apexcharts-marker no-pointer-events wkdi9v4sy"
                                                                                stroke="#ff5252" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9" rel="3"
                                                                                j="3" index="0"
                                                                                default-marker-size="3"></circle>
                                                                        </g>
                                                                        <g id="SvgjsG1259"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasksi5l9qt2)">
                                                                            <circle id="SvgjsCircle1260"
                                                                                r="3" cx="756.7058445208639"
                                                                                cy="119.47599967956542"
                                                                                class="apexcharts-marker no-pointer-events wo8kdpvsf"
                                                                                stroke="#ff5252" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9" rel="4"
                                                                                j="4" index="0"
                                                                                default-marker-size="3"></circle>
                                                                        </g>
                                                                        <g id="SvgjsG1261"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasksi5l9qt2)">
                                                                            <circle id="SvgjsCircle1262"
                                                                                r="3" cx="952.1881876887537"
                                                                                cy="85.33999977111816"
                                                                                class="apexcharts-marker no-pointer-events wyakqmebh"
                                                                                stroke="#ff5252" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9" rel="5"
                                                                                j="5" index="0"
                                                                                default-marker-size="3"></circle>
                                                                        </g>
                                                                        <g id="SvgjsG1263"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasksi5l9qt2)">
                                                                            <circle id="SvgjsCircle1264"
                                                                                r="3" cx="1141.3646488189697"
                                                                                cy="119.47599967956542"
                                                                                class="apexcharts-marker no-pointer-events wanx2u7n3"
                                                                                stroke="#ff5252" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9" rel="6"
                                                                                j="6" index="0"
                                                                                default-marker-size="3"></circle>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1267" class="apexcharts-series"
                                                                    seriesName="Income" data:longestSeries="true"
                                                                    rel="2" data:realIndex="1">
                                                                    <path id="SvgjsPath1283"
                                                                        d="M 0 170.67999954223632L 0 17.067999954223637C 68.41882010876144 17.067999954223637 127.0635230591284 102.40799972534178 195.48234316788984 102.40799972534178C 257.2799871370937 102.40799972534178 310.2493962535542 68.27199981689452 372.0470402227581 68.27199981689452C 440.46586033151954 68.27199981689452 499.11056328188647 136.54399963378904 567.5293833906479 136.54399963378904C 633.7411447862236 136.54399963378904 690.4940831252883 153.61199958801268 756.7058445208639 153.61199958801268C 825.1246646296254 153.61199958801268 883.7693675799923 170.67999954223632 952.1881876887537 170.67999954223632C 1018.3999490843294 170.67999954223632 1075.152887423394 170.67999954223632 1141.3646488189697 170.67999954223632C 1141.3646488189697 170.67999954223632 1141.3646488189697 170.67999954223632 1141.3646488189697 170.67999954223632M 1141.3646488189697 170.67999954223632z"
                                                                        fill="rgba(70,128,255,0.2)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-area" index="1"
                                                                        clip-path="url(#gridRectMasksi5l9qt2)"
                                                                        pathTo="M 0 170.67999954223632L 0 17.067999954223637C 68.41882010876144 17.067999954223637 127.0635230591284 102.40799972534178 195.48234316788984 102.40799972534178C 257.2799871370937 102.40799972534178 310.2493962535542 68.27199981689452 372.0470402227581 68.27199981689452C 440.46586033151954 68.27199981689452 499.11056328188647 136.54399963378904 567.5293833906479 136.54399963378904C 633.7411447862236 136.54399963378904 690.4940831252883 153.61199958801268 756.7058445208639 153.61199958801268C 825.1246646296254 153.61199958801268 883.7693675799923 170.67999954223632 952.1881876887537 170.67999954223632C 1018.3999490843294 170.67999954223632 1075.152887423394 170.67999954223632 1141.3646488189697 170.67999954223632C 1141.3646488189697 170.67999954223632 1141.3646488189697 170.67999954223632 1141.3646488189697 170.67999954223632M 1141.3646488189697 170.67999954223632z"
                                                                        pathFrom="M -1 170.67999954223632L -1 170.67999954223632L 195.48234316788984 170.67999954223632L 372.0470402227581 170.67999954223632L 567.5293833906479 170.67999954223632L 756.7058445208639 170.67999954223632L 952.1881876887537 170.67999954223632L 1141.3646488189697 170.67999954223632">
                                                                    </path>
                                                                    <path id="SvgjsPath1284"
                                                                        d="M 0 17.067999954223637C 68.41882010876144 17.067999954223637 127.0635230591284 102.40799972534178 195.48234316788984 102.40799972534178C 257.2799871370937 102.40799972534178 310.2493962535542 68.27199981689452 372.0470402227581 68.27199981689452C 440.46586033151954 68.27199981689452 499.11056328188647 136.54399963378904 567.5293833906479 136.54399963378904C 633.7411447862236 136.54399963378904 690.4940831252883 153.61199958801268 756.7058445208639 153.61199958801268C 825.1246646296254 153.61199958801268 883.7693675799923 170.67999954223632 952.1881876887537 170.67999954223632C 1018.3999490843294 170.67999954223632 1075.152887423394 170.67999954223632 1141.3646488189697 170.67999954223632"
                                                                        fill="none" fill-opacity="1"
                                                                        stroke="#4680ff" stroke-opacity="1"
                                                                        stroke-linecap="butt" stroke-width="2"
                                                                        stroke-dasharray="0" class="apexcharts-area"
                                                                        index="1"
                                                                        clip-path="url(#gridRectMasksi5l9qt2)"
                                                                        pathTo="M 0 17.067999954223637C 68.41882010876144 17.067999954223637 127.0635230591284 102.40799972534178 195.48234316788984 102.40799972534178C 257.2799871370937 102.40799972534178 310.2493962535542 68.27199981689452 372.0470402227581 68.27199981689452C 440.46586033151954 68.27199981689452 499.11056328188647 136.54399963378904 567.5293833906479 136.54399963378904C 633.7411447862236 136.54399963378904 690.4940831252883 153.61199958801268 756.7058445208639 153.61199958801268C 825.1246646296254 153.61199958801268 883.7693675799923 170.67999954223632 952.1881876887537 170.67999954223632C 1018.3999490843294 170.67999954223632 1075.152887423394 170.67999954223632 1141.3646488189697 170.67999954223632"
                                                                        pathFrom="M -1 170.67999954223632L -1 170.67999954223632L 195.48234316788984 170.67999954223632L 372.0470402227581 170.67999954223632L 567.5293833906479 170.67999954223632L 756.7058445208639 170.67999954223632L 952.1881876887537 170.67999954223632L 1141.3646488189697 170.67999954223632">
                                                                    </path>
                                                                    <g id="SvgjsG1268"
                                                                        class="apexcharts-series-markers-wrap"
                                                                        data:realIndex="1">
                                                                        <g id="SvgjsG1270"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasksi5l9qt2)">
                                                                            <circle id="SvgjsCircle1271"
                                                                                r="3" cx="0"
                                                                                cy="17.067999954223637"
                                                                                class="apexcharts-marker no-pointer-events wenhr7biy"
                                                                                stroke="#4680ff" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9" rel="0"
                                                                                j="0" index="1"
                                                                                default-marker-size="3"></circle>
                                                                            <circle id="SvgjsCircle1272"
                                                                                r="3" cx="195.48234316788984"
                                                                                cy="102.40799972534178"
                                                                                class="apexcharts-marker no-pointer-events wfe4hfpbg"
                                                                                stroke="#4680ff" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9" rel="1"
                                                                                j="1" index="1"
                                                                                default-marker-size="3"></circle>
                                                                        </g>
                                                                        <g id="SvgjsG1273"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasksi5l9qt2)">
                                                                            <circle id="SvgjsCircle1274"
                                                                                r="3" cx="372.0470402227581"
                                                                                cy="68.27199981689452"
                                                                                class="apexcharts-marker no-pointer-events wit31tc8h"
                                                                                stroke="#4680ff" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9" rel="2"
                                                                                j="2" index="1"
                                                                                default-marker-size="3"></circle>
                                                                        </g>
                                                                        <g id="SvgjsG1275"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasksi5l9qt2)">
                                                                            <circle id="SvgjsCircle1276"
                                                                                r="3" cx="567.5293833906479"
                                                                                cy="136.54399963378904"
                                                                                class="apexcharts-marker no-pointer-events wb0ku8j3v"
                                                                                stroke="#4680ff" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9" rel="3"
                                                                                j="3" index="1"
                                                                                default-marker-size="3"></circle>
                                                                        </g>
                                                                        <g id="SvgjsG1277"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasksi5l9qt2)">
                                                                            <circle id="SvgjsCircle1278"
                                                                                r="3" cx="756.7058445208639"
                                                                                cy="153.61199958801268"
                                                                                class="apexcharts-marker no-pointer-events w307jnt7hk"
                                                                                stroke="#4680ff" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9" rel="4"
                                                                                j="4" index="1"
                                                                                default-marker-size="3"></circle>
                                                                        </g>
                                                                        <g id="SvgjsG1279"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasksi5l9qt2)">
                                                                            <circle id="SvgjsCircle1280"
                                                                                r="3" cx="952.1881876887537"
                                                                                cy="170.67999954223632"
                                                                                class="apexcharts-marker no-pointer-events whsh823fv"
                                                                                stroke="#4680ff" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9" rel="5"
                                                                                j="5" index="1"
                                                                                default-marker-size="3"></circle>
                                                                        </g>
                                                                        <g id="SvgjsG1281"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasksi5l9qt2)">
                                                                            <circle id="SvgjsCircle1282"
                                                                                r="3" cx="1141.3646488189697"
                                                                                cy="170.67999954223632"
                                                                                class="apexcharts-marker no-pointer-events wk0tnumns"
                                                                                stroke="#4680ff" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9" rel="6"
                                                                                j="6" index="1"
                                                                                default-marker-size="3"></circle>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1251" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                                <g id="SvgjsG1269" class="apexcharts-datalabels"
                                                                    data:realIndex="1"></g>
                                                            </g>
                                                            <line id="SvgjsLine1340" x1="0" y1="0"
                                                                x2="1141.3646488189697" y2="0"
                                                                stroke="#b6b6b6" stroke-dasharray="0"
                                                                stroke-width="1" stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs"></line>
                                                            <line id="SvgjsLine1341" x1="0" y1="0"
                                                                x2="1141.3646488189697" y2="0"
                                                                stroke-dasharray="0" stroke-width="0"
                                                                stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1342" class="apexcharts-yaxis-annotations">
                                                            </g>
                                                            <g id="SvgjsG1343" class="apexcharts-xaxis-annotations">
                                                            </g>
                                                            <g id="SvgjsG1344" class="apexcharts-point-annotations">
                                                            </g>
                                                            <rect id="SvgjsRect1345" width="0" height="0"
                                                                x="0" y="0" rx="0"
                                                                ry="0" opacity="1" stroke-width="0"
                                                                stroke="none" stroke-dasharray="0" fill="#fefefe"
                                                                class="apexcharts-zoom-rect"></rect>
                                                            <rect id="SvgjsRect1346" width="0" height="0"
                                                                x="0" y="0" rx="0"
                                                                ry="0" opacity="1" stroke-width="0"
                                                                stroke="none" stroke-dasharray="0" fill="#fefefe"
                                                                class="apexcharts-selection-rect"></rect>
                                                        </g>
                                                        <rect id="SvgjsRect1241" width="0" height="0"
                                                            x="0" y="0" rx="0"
                                                            ry="0" opacity="1" stroke-width="0"
                                                            stroke="none" stroke-dasharray="0" fill="#fefefe">
                                                        </rect>
                                                        <g id="SvgjsG1309" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(15.635351181030273, 0)">
                                                            <g id="SvgjsG1310" class="apexcharts-yaxis-texts-g"><text
                                                                    id="SvgjsText1311"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="20" y="31.5" text-anchor="end"
                                                                    dominant-baseline="auto" font-size="11px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1312">100</tspan>
                                                                    <title>100</title>
                                                                </text><text id="SvgjsText1313"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="20" y="65.63599990844726"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1314">80</tspan>
                                                                    <title>80</title>
                                                                </text><text id="SvgjsText1315"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="20" y="99.77199981689452"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1316">60</tspan>
                                                                    <title>60</title>
                                                                </text><text id="SvgjsText1317"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="20" y="133.90799972534177"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1318">40</tspan>
                                                                    <title>40</title>
                                                                </text><text id="SvgjsText1319"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="20" y="168.04399963378904"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1320">20</tspan>
                                                                    <title>20</title>
                                                                </text><text id="SvgjsText1321"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="20" y="202.17999954223632"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1322">0</tspan>
                                                                    <title>0</title>
                                                                </text></g>
                                                        </g>
                                                        <g id="SvgjsG1237" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                                        <div class="apexcharts-tooltip-title"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        </div>
                                                        <div class="apexcharts-tooltip-series-group"
                                                            style="order: 1;"><span class="apexcharts-tooltip-marker"
                                                                style="background-color: rgb(255, 82, 82);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                                        class="apexcharts-tooltip-text-y-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-goals-group"><span
                                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                                        class="apexcharts-tooltip-text-goals-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-z-group"><span
                                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                                        class="apexcharts-tooltip-text-z-value"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="apexcharts-tooltip-series-group"
                                                            style="order: 2;"><span class="apexcharts-tooltip-marker"
                                                                style="background-color: rgb(70, 128, 255);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                                        class="apexcharts-tooltip-text-y-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-goals-group"><span
                                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                                        class="apexcharts-tooltip-text-goals-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-z-group"><span
                                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                                        class="apexcharts-tooltip-text-z-value"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                                        <div class="apexcharts-xaxistooltip-text"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                        <div class="apexcharts-yaxistooltip-text"></div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- subscribe end -->
                                <!-- Tasks start -->
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('components.footer')


</body>

</html>
