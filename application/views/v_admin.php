<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div id="app">
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Administrasi Data</h1>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data Perkembangan Kasus</h4>
                <div class="card-header-action">
                  <a href="#" class="btn btn-primary" @click="openmod">
                    Tambah Data
                  </a>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-md">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Tanggal</th>
                        <th>ODP</th>
                        <th>PDP</th>
                        <th>Positif</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                        <th>Pilihan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(stat, index) in data_harians">
                        <td>{{ index + 1 }}</td>
                        <td>{{ moment(stat.tanggal).format('DD-MM-YYYY') }}</td>
                        <td>{{ stat.odp }}</td>
                        <td>{{ stat.pdp }}</td>
                        <td>{{ stat.positif }}</td>
                        <td>{{ stat.sembuh }}</td>
                        <td>{{ stat.meninggal }}</td>=
                        <td>
                          <a href="#" class="btn btn-secondary" @click="edit(stat.id)">Edit</a>
                          <a href="#" class="btn btn-secondary" @click="delete_h(stat.id)">Hapus</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer text-right">
                <nav class="d-inline-block">
                  <ul class="pagination mb-0">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="modal fade" tabindex="-1" role="dialog" id="modal-data">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Input Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control" v-model="data_harian.tanggal">
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>ODP</label>
                <input type="number" class="form-control" v-model="data_harian.odp">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>PDP</label>
                <input type="number" class="form-control" v-model="data_harian.pdp">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Positif</label>
                <input type="number" class="form-control" v-model="data_harian.positif">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Sembuh</label>
                <input type="number" class="form-control" v-model="data_harian.sembuh">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Meninggal</label>
                <input type="number" class="form-control" v-model="data_harian.meninggal">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" 
            @click="save" :class="{'btn-progress': onprogress}">Save changes</button>
        </div>
      </div>
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
        data_harian: {},
        data_harians: [],
        onprogress: false
      }
    },
    mounted: function() {
      this.defaultTanggal()
      this.getList()
    },
    methods: {
      openmod: function () {
        this.data_harian = {}
        this.defaultTanggal()
        $('#modal-data').modal('show')
      },
      defaultTanggal: function() {
        this.data_harian.tanggal = moment().format('YYYY-MM-DD')
      },
      getList: function() {
        axios.get('<?php echo base_url(); ?>admin_api/list')
          .then(res => this.data_harians = res.data)
          .catch(err => alert(err))
      },
      edit: function (id) {
        axios.get('<?php echo base_url(); ?>admin_api/getdata/' + id)
          .then(res => {
            this.data_harian = res.data[0]
            $('#modal-data').modal('show')
          })
          .catch(err => alert(err))
      },
      save: function() {
        this.onprogress = true
        if (!this.data_harian.id) {
          axios.post('<?php echo base_url(); ?>admin_api/save',
              this.data_harian)
            .then(() => {
              alert('Berhasil simpan')
              $('#modal-data').modal('hide')
              this.data_harian = {}
              this.defaultTanggal()
              this.getList()
            })
            .catch(err => alert(err))
            .finally(() => this.onprogress = false)
        } else {
          axios.post('<?php echo base_url(); ?>admin_api/update',
              this.data_harian)
            .then(() => {
              alert('Berhasil ubah')
              $('#modal-data').modal('hide')
              this.data_harian = {}
              this.defaultTanggal()
              this.getList()
            })
            .catch(err => alert(err))
            .finally(() => this.onprogress = false)
        }
      },
      delete_h: function(id) {
        const tanya = confirm('Hapus Data?')
        if (tanya) {
          axios.delete('<?php echo base_url(); ?>admin_api/hapus/' + id)
            .then(res => {
              alert('Berhasil hapus')
              this.getList()
            })
            .catch(err => alert(err))
        }
      }
    }
  })
</script>
<?php $this->load->view('dist/_partials/closing'); ?>