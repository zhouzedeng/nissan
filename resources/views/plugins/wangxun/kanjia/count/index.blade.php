@extends('layouts.app')

@section('content')
    <!-- 面板 -->
    <blockquote class="layui-elem-quote top-title"><h3>数据统计</h3></blockquote>
    <p id="main" style="width: 600px;height:400px; margin-left: 50px;float: left"></p>

    <p id="main2" style="width: 600px;height:400px; margin-left: 50px;float: left""></p>

    <!-- js -->
    <script>
        var myChart2 = echarts.init(document.getElementById('main2'));
        myChart2.setOption({
        title : {
            text: '某站点用户访问来源',
                subtext: '纯属虚构',
                x:'center'
        },
        tooltip : {
            trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
                left: 'left',
                data: ['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']
        },
        series : [
            {
                name: '访问来源',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:[
                    {value:335, name:'直接访问'},
                    {value:310, name:'邮件营销'},
                    {value:234, name:'联盟广告'},
                    {value:135, name:'视频广告'},
                    {value:1548, name:'搜索引擎'}
                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
        })
        var myChart = echarts.init(document.getElementById('main'));
        myChart.setOption({
            backgroundColor: '#666666',

            title: {
                text: 'Customized Pie',
                left: 'center',
                top: 20,
                textStyle: {
                    color: '#ccc'
                }
            },

            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },

            visualMap: {
                show: false,
                min: 80,
                max: 600,
                inRange: {
                    colorLightness: [0, 1]
                }
            },
            series : [
                {
                    name:'访问来源',
                    type:'pie',
                    radius : '55%',
                    center: ['50%', '50%'],
                    data:[
                        {value:64, name:'访客总数'},
                        {value:310, name:'用户总数'},
                        {value:274, name:'活动总数'},
                        {value:235, name:'商品总数'},
                        {value:235, name:'车系总数'},
                    ].sort(function (a, b) { return a.value - b.value; }),
                    roseType: 'radius',
                    label: {
                        normal: {
                            textStyle: {
                                color: 'rgba(255, 255, 255, 0.3)'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            lineStyle: {
                                color: 'rgba(255, 255, 255, 0.3)'
                            },
                            smooth: 0.2,
                            length: 10,
                            length2: 20
                        }
                    },
                    itemStyle: {
                        normal: {
                            color: '#c23531',
                            shadowBlur: 200,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    },

                    animationType: 'scale',
                    animationEasing: 'elasticOut',
                    animationDelay: function (idx) {
                        return Math.random() * 200;
                    }
                }
            ]
        })
    </script>
@endsection
