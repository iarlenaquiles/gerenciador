    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="<?=base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?=base_url('assets/js/jquery.mask.js');?>"></script>
    <script src="<?=base_url('assets/js/scripts.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery.validate.min.js');?>"></script>
    <script src="<?=base_url('assets/js/additional-methods.min.js');?>"></script>
    <script src="<?=base_url('assets/js/validate.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?=base_url('assets/js/bootstrap-datepicker.min.js');?>"></script>
    <script src="<?=base_url('assets/js/locales/bootstrap-datepicker.pt-BR.min.js');?>"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?=base_url('assets/js/holder.min.js'); ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?=base_url('assets/js/ie10-viewport-bug-workaround.js'); ?>"></script>
    <script>
      $('#data').datepicker({
          format: 'dd/mm/yyyy',
          language: 'pt-BR',
          //weekStart: 0,
          //startDate:'0d',
          clearDates: true,
          todayHighlight: true,
          //defaultViewDate: 'year',
          nextText: 'Proximo',
          prevText: 'Anterior',
          onclose: function(){
              var data = $('#data').val();
              if(dataValidate(data)){
                 $('#div_data').removeClass("has-error");
                 $('#div_data').addClass("has-success");
              }else{
                 alert('Digite uma data válida!');
                 $('#data').val("");
                 $('#div_data').removeClass("has-success");
                 $('#div_data').addClass("has-error");
              }
          }
      });

      $('.input-daterange').each(function(){
        $(this).datepicker({
          format: 'dd/mm/yyyy',
          clearDates: true,
          language: 'pt-BR'});
      });
    </script>
  </body>
</html>