
/**
 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão
 */
$('#delete-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data("customer");
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Cliente #' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
});

/**
 * Passa os dados do usuário para o Modal, e atualiza o link para exclusão
 */
$('#delete-user-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data("usuario");
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Usuario #' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
});

/**
 * Passa os dados do filme para o Modal, e atualiza o link para exclusão
 */
$('#delete-filmes-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data("filme");
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Filme #' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
});
