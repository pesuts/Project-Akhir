<?php   include "session.php";
        include "header.php"; ?>
<title>Edit Dream</title>

<body>
    <?php include "navbar.php"; ?>
    <main id="main" class="mt-4 mb-5 ">
        <div id="form-head" class="text-center mb-2">
            <h1 class="h3 fw-bolder">Edit Rencana</h1>
            <!-- <p class="">Ubah isi data dari rencanamu</p>
            <hr> -->
        </div>
        <?php $id_dream = $_GET['id'];
                $sql = "SELECT * FROM dream WHERE id_dream = '$id_dream'"; 
        $query = mysqli_query($connect, $sql); 
        while($data = mysqli_fetch_array($query)): ?>
        <section id="form-dream" class="container form" style="margin-bottom:5%">
            <form method="POST" action="proses/edit_rencana_proses.php">
                    <div class="col-6 bg-info bg-opacity-50 rounded-3 mx-auto px-5 py-3">
                        <input type="hidden" name="id_dream" value="<?= $data['id_dream']; ?>">
                        <label class="mt-3" for=""><b>Rencana</b></label>
                        <input name="rencana" type="text" class="input form-control" placeholder="Rencana *"
                            value="<?= $data['rencana']; ?>">
                        <label class="mt-3" for=""><b>Biaya</b></label>
                        <input name="biaya" type="number" min="0" step="10000" class="input form-control"
                            placeholder="Biaya *" value="<?= $data['jumlah_uang']; ?>">
                        <label class="mt-3" for=""><b>Biaya per Bulan</b></label>
                        <input name="tabungan_bulan" type="number" min="0" step="10000" class="input form-control"
                            placeholder="Biaya per Bulan *" value="<?= $data['tabungan_bulan']; ?>">
                        <input type="hidden" name="dana_terkumpul" value="<?= $data['dana_terkumpul']; ?>">
                        <label class="mt-3" for=""><b>Keterangan</b></label>
                        <?php preg_match('#\((.*?)\)#', $data['keterangan'], $text); ?>
                        <textarea name="keterangan" cols="30" rows="3" class="input form-control my-1" placeholder="Keterangan (opsional)"><?= "$text[1]"; ?></textarea>
                        <div class="p-1 mt-3">
                            <button id="login" class="btn btn-info fw-bold py-1 px-3" type="submit">
                                Submit
                            </button>
                        </div>
                    </div>
            </form>
        </section>
        <?php endwhile; ?>
    </main>
    <?php include "footer.php"; ?>
</body>

</html>