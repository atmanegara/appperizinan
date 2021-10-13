
            <?= $form->field($modelDataPemohon, 'no_npwp')->label('No NPWP Perusahaan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($modelDataPemohon, 'id_jns_bdn_usaha')->label('Jenis Badan Usaha')->textInput(['maxlength' => true]) ?>

            <?= $form->field($modelDataPemohon, 'nm_pemohon')->label('Nama Badan Usaha')->textInput(['maxlength' => true]) ?>

            <?= $form->field($modelDataPemohon, 'nm_pmilik_bu')->label('Nama Pemilik / Penanggung Jawab Perusahaan')->textInput(['maxlength' => true]) ?>
        <?= $form->field($modelDataPemohon, 'no_ktp')->label('No. KTP Pemilik Perusahaan')->textInput(['maxlength' => true]) ?>


            <?= $form->field($modelDataPemohon, 'alamat_pemohon')->label('Alamat')->textInput(['maxlength' => true]) ?>

          

            <?= $form->field($modelDataPemohon, 'email_pemohon')->label('Email Perusahaan (Aktif)')->textInput(['maxlength' => true]) ?>

<?= $form->field($modelDataPemohon, 'telp_pemohon')->label('No. Telp Pemilik /Penanggung Jawab Perusahaan (Aktif)')->textInput(['maxlength' => true]) ?>