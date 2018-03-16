<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div id='modalContentForm'></div>
      </div>
    </div>
  </div>
</div>
<?php 
$script = <<< JS
$('.modalButtonForm').click(function() {
  console.log('click');
  $('#modalForm').modal('show')
    .find('#modalContentForm')
    .load($(this).attr('value'));
});
//deleteButtonForm
$('.deleteButtonForm').on('click', function(){
  var r = confirm("Tem certeza que deseja excluir este item?");
  if (r == true) {
      $.post(
          $(this).attr('value'), function(){
            console.log('success');
          }
      )
      .done(function(result){
          result = JSON.parse(result);
          if(result.status == 'success'){
              $.pjax.reload({container:'#listagemGrid'});
              return false;
          }else{
              console.log(result.message);
          }
      })
      .fail(function(){
          console.log("server error");
      });
      return false;
  } else {
      console.log("cancel action");
  }
});
JS;
$this->registerJS($script);
?>