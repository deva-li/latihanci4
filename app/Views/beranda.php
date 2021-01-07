<?=  $this->extend('./layout/template.php'); ?>
<?= $this->section('content'); ?>
    <div class="jumbotron text-center">
        <h1>Portal Informasi Siswa</h1>
        <p> Selamat datang di Porta Informasi Siswa SMA 404</p>
        <a class="btn btn-dark" href="<?= base_url('info-kegiatan')?>" role="button">Info Kegiatan</a>
        <a class="btn btn-primary" href="<?= base_url('data-siswa')?>" role="button">Data Siswa</a>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<?= $this->endSection(); ?>