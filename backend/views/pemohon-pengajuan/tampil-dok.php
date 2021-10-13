<?= \yii2assets\pdfjs\PdfJs::widget([
  'width'=>'100%',
  'height'=> '500px',
  'url'=> './uploads/'.$file_berkas['data_file_upload'],
   
]);
?>

<style>
    .modal-content {
  position: absolute;
    }
  </style>