<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Perkembangan Kasus Corona di Wonosobo</h1>
        </div>
        <div id="app">
            <div class="row">
                <div class="col-md-12">
                    <i>Data diperbarui pada: <span>{{ moment(data_harian.tanggal).format('DD-MM-YYYY') }}</span></i>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-binoculars"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>ODP</h4>
                            </div>
                            <div class="card-body">
                                {{ data_harian.odp }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-hospital"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>PDP</h4>
                            </div>
                            <div class="card-body">
                                {{ data_harian.pdp }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-procedures"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>POSITIF</h4>
                            </div>
                            <div class="card-body">
                                {{ data_harian.positif }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-smile"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Sembuh</h4>
                            </div>
                            <div class="card-body">
                                {{ data_harian.sembuh }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-times-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Meninggal</h4>
                            </div>
                            <div class="card-body">
                                {{ data_harian.meninggal }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistik Dalam 7 Hari Terakhir</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" height="80"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>
<script src="<?php echo base_url(); ?>assets/modules/vue.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/axios.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: function() {
            return {
                data_harian: {}
            }
        },
        mounted: function() {
            this.getData()
        },
        methods: {
            getData: function() {
                axios.get('<?php echo base_url(); ?>api/mutakhir')
                    .then(res => this.data_harian = res.data[0])
                    .catch(err => alert(err))
            }
        }
    })

    $(document).ready(function() {
        const hari_ini = moment().format('YYYY-MM-DD')
        const hari_7 = moment().subtract(7, 'days').format('YYYY-MM-DD')

        axios.get('<?php echo base_url(); ?>api/rentang/' + hari_7 + '/' + hari_ini)
            .then(res => {
                if (res.data.length > 0) {
                    const data = res.data
                    const tanggal = data.map(item => {
                        return moment(item.tanggal).format('DD-MM-YYYY')
                    })
                    const odp = data.map(item => {
                        return item.odp
                    })
                    const pdp = data.map(item => {
                        return item.pdp
                    })
                    const positif = data.map(item => {
                        return item.positif
                    })

                    const paket_data = {
                        labels: tanggal,
                        datasets: [{
                                label: 'ODP',
                                data: odp,
                                borderWidth: 5,
                                borderColor: '#3abaf4',
                                backgroundColor: 'transparent',
                                pointBackgroundColor: '#fff',
                                pointBorderColor: '#3abaf4',
                                pointRadius: 4
                            },
                            {
                                label: 'PDP',
                                data: odp,
                                borderWidth: 5,
                                borderColor: '#ffa426',
                                backgroundColor: 'transparent',
                                pointBackgroundColor: '#fff',
                                pointBorderColor: '#ffa426',
                                pointRadius: 4
                            },
                            {
                                label: 'Positif',
                                data: positif,
                                borderWidth: 5,
                                borderColor: '#fc544b',
                                backgroundColor: 'transparent',
                                pointBackgroundColor: '#fff',
                                pointBorderColor: '#fc544b',
                                pointRadius: 4
                            }
                        ]
                    }

                    makeChart(paket_data)
                }
            })

        function makeChart(paket_data_) {
            var statistics_chart = document.getElementById("myChart").getContext('2d');

            var myChart = new Chart(statistics_chart, {
                type: 'line',
                data: paket_data_,
                options: {
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false,
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                color: '#fbfbfb',
                                lineWidth: 2
                            }
                        }]
                    },
                }
            });
        }
    })
</script>
<?php $this->load->view('dist/_partials/closing'); ?>