<div id="done">
    <?= $this->session->flashdata('alert'); ?>
</div>
<h2 class="page-title">Perhitungan Suara</h2>
<div class="card-deck">
    <div class="card shadow mb-4 col-sm-4">
        <div class="card-header">
            <strong class="card-title">Input Suara</strong>
        </div>
        <div class="card-body">
            <form action="<?= base_url('surat/input') ?>" method="post">
                <input type="hidden" name="id_tps">
                <div class="form-group">
                    <label for="inputAddress">Nama TPS</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama TPS" name="nama_tps">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Jumlah Surat Suara</label>
                    <input type="number" class="form-control" id="inputAddress" placeholder="" name="total">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4"> Suara Sah</label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="" name="total_sah">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4"> Suara Tidak Sah</label>
                        <input type="number" class="form-control" id="inputPassword4" placeholder="" name="total_tdksah">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4"> Paslon 1</label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="" name="no1">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4"> Paslon 2</label>
                        <input type="number" class="form-control" id="inputPassword4" placeholder="" name="no2">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Paslon 3</label>
                        <input type="number" class="form-control" id="inputPassword4" placeholder="" name="no3">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            <strong class="card-title">Hasil Pemilu Sementara</strong>
        </div>

        <div class="card-body">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

            <body>
                <?php

                    $this->db->select('sum(no1_26) as total')->from('surat_26');
                    $no1 = $this->db->get()->row()->total;
                    $this->db->select('sum(no2_26) as total')->from('surat_26');
                    $no2 = $this->db->get()->row()->total;
                    $this->db->select('sum(no3_26) as total')->from('surat_26');
                    $no3 = $this->db->get()->row()->total;
                ?>
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                <script>
                    var xValues = ["Anisa", "Prabroro", "Jangar"];
                    var yValues = [<?= $no1 ?>, <?= $no2 ?>, <?= $no3 ?>];
                    var barColors = [
                        "#b91d47",
                        "#00aba9",
                        "#2b5797"
                    ];

                    new Chart("myChart", {
                        type: "pie",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                            }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: "Pemilu 24"
                            }
                        }
                    });
                </script>

        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
</div>
</div>
</div> <!-- / .card-desk-->