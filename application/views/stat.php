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
                    <i class="ml-2 mb-2">Data diperbarui pada: <strong>{{ moment(data_harian.tanggal).format('DD-MM-YYYY') }}</strong></i>
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
                                <h4>SUSPEK</h4>
                            </div>
                            <div class="card-body">
                                {{ data_harian.suspek }}
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
                                <h4>PROBABEL</h4>
                            </div>
                            <div class="card-body">
                                {{ data_harian.probabel }}
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
                                <h4>KONFIRMASI</h4>
                            </div>
                            <div class="card-body">
                                {{ data_harian.konfirmasi }}
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
            <div class="row">
                <div class="col-md-12">
                    <p class="ml-2 mb-2">Data diambil dari <a href="https://corona.wonosobokab.go.id" target="_blank">Corona Wonosobo</a></p>
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
                        <div class="table-responsive">
                            <canvas id="myChart" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-6">
            <section class="section">
                <div class="section-header">
                    <h3>Terminologi</h3>
                </div>
                <div class="card card-info">
                    <div class="card-body">
                        <p class="text-justify mb-2"><b>SUSPEK</b> Orang dengan ISPA dan pada 14 hari terakhir 
                            sebelum timbul gejala memiliki riwayat perjalanan atau tinggal di wilayah yang 
                            melaporkan transmisi.
                            Orang dengan salah satu gejala/tanda ISPA* dan pada 14 hari terakhir sebelum timbul 
                            gejala memiliki riwayat kontak dengan kasus konfirmasi/probable covid-19.
                            Orang dengan ISPA berat/pneumonia yang membutuhkan perawatan di rumah sakit dan tidak 
                            ada penyebab lain berdasarkan gambaran klinis yang meyakinkan.</p>
                        <p class="text-justify mb-2"><b>PROBABEL</b> Kasus suspek dengan ISPA Berat/ARDS/meninggal 
                            dengan gambaran klinis yang meyakinkan covid-19 dan belum ada hasil pemeriksaan 
                            laboratorium RT-PCR.</p>
                        <p class="text-justify mb-5"><b>KONFIRMASI</b> Seseorang yang dinyatakan positif terinfeksi 
                            virus covid-19 yang dibuktikan dengan pemeriksaan laboratorium RT-PCR.</p>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-6">
            <section class="section">
                <div class="section-header">
                    <h3>Tautan Eksternal</h3>
                </div>
                <div class="card card-info">
                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="https://instagram.com/rsiwonosobo" target="_blank">Instagram RSI Wonosobo</a>
                            </li>
                            <li>
                                <a href="https://corona.wonosobokab.go.id" target="_blank">Corona Wonosobo</a>
                            </li>
                            <li>
                                <a href="https://corona.jatengprov.go.id" target="_blank">Corona Jateng</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="section">
                <div class="section-header">
                    <h3>Hotline Corona</h3>
                </div>
                <div class="card card-info">
                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="tel:6282134088626">RSI Wonosobo: 0821 3408 8626</a>
                            </li>
                            <li>
                                <a href="tel:628112600121" target="_blank">Corona Wonosobo: 0811 2600 121</a>
                            </li>
                            <li>
                                <a href="tel:6282313600560" target="_blank">Corona Jateng: 0823 2360 0650</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
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
                axios.get('<?php echo base_url(); ?>api2/mutakhir')
                    .then(res => this.data_harian = res.data[0])
                    .catch(err => alert(err))
            }
        }
    })

    $(document).ready(function() {
        const hari_ini = moment().format('YYYY-MM-DD')
        const hari_7 = moment().subtract(7, 'days').format('YYYY-MM-DD')

        axios.get('<?php echo base_url(); ?>api2/rentang/' + hari_7 + '/' + hari_ini)
            .then(res => {
                if (res.data.length > 0) {
                    const data = res.data
                    const tanggal = data.map(item => {
                        return moment(item.tanggal).format('DD-MM-YYYY')
                    })
                    const suspek = data.map(item => {
                        return item.suspek
                    })
                    const probabel = data.map(item => {
                        return item.probabel
                    })
                    const konfirmasi = data.map(item => {
                        return item.konfirmasi
                    })

                    const paket_data = {
                        labels: tanggal,
                        datasets: [{
                                label: 'Suspek',
                                data: suspek,
                                borderWidth: 5,
                                borderColor: '#3abaf4',
                                backgroundColor: 'transparent',
                                pointBackgroundColor: '#fff',
                                pointBorderColor: '#3abaf4',
                                pointRadius: 4
                            },
                            {
                                label: 'Probabal',
                                data: probabel,
                                borderWidth: 5,
                                borderColor: '#ffa426',
                                backgroundColor: 'transparent',
                                pointBackgroundColor: '#fff',
                                pointBorderColor: '#ffa426',
                                pointRadius: 4
                            },
                            {
                                label: 'Konfirmasi',
                                data: konfirmasi,
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
                    maintainAspectRatio: false
                }
            });
        }
    })
</script>
<?php $this->load->view('dist/_partials/closing'); ?>