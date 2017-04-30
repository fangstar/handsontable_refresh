<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/handsontable/handsontable.full.min.css">
<script src="<?= base_url() ?>public/handsontable/handsontable.full.min.js"></script>




</head>
<body>


<div id="container">
  <h1>Welcome to Handontable Test!</h1>

  <div id="hot"></div>



  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>

<script>
// var hot = $('#hot');
// $('#hot').handsontable({
//   rowHeaders: true,
//   colHeaders: true
// });

// var container = $('#hot');
var container = document.getElementById("hot");
var hot = new Handsontable(container,
{
  rowHeaders: true,
  colHeaders: true,
  afterChange: function (changes, source) {
    // console.log('source: ', source);
    if (source === 'loadData') {
      return; //don't save this change
    }
    var posting = $.post(
      '<?=site_url('api/data/data');?>',
      { changes: changes }
    );
    // Put the results in a div
    posting.done(function( data ) {
      // var content = $( data ).find( "#content" );
      // $( "#result" ).empty().append( content );
      console.log("POST result status: " + status + " data: " + data);
      hot.loadData(JSON.parse(data));
      hot.render();
    });

   }
}
);


$(function() {
  $.get(
    '<?=site_url('api/data/data');?>',
    function(data, status){
      console.log("GET status: " + status + " data: " + data);
      // console.log("JSON.parse data: " + JSON.parse(data));
      // console.log("eval data: " + eval(data));
      hot.loadData(JSON.parse(data));
      hot.render();
    }
  );
});

</script>


</html>

