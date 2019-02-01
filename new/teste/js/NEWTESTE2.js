(function($) {
  
  var counter = -1;
     
  addRow = function() {
    
    var table = $('#details-table');
    var input = null;
    
    var row = $('<tr>');
    var cols = [];
    
    counter++;

      // Coluna 1
      input = $('<input>').addClass('form-control').attr('name', 'data[ExampleItems][' + counter + '][id]').val(counter);      
      cols.push(
        $('<td>').append(
          $('<div>').addClass('form-group').append(input)
        )        
      );
    
      // Coluna 2
      input = $('<input>').addClass('form-control').attr('name', 'data[ExampleItems][' + counter + '][name]');
      cols.push(
        $('<td>').append(
          $('<div>').addClass('form-group').append(input)
        )
      );
    
      // Button Remove
      cols.push(
        $('<td>').addClass('actions').append(
          $('<button>').addClass('btn btn-danger btn-remove-item').html('&times;').attr('type', 'button').on('click', removeRow)
        )
      );

    row.append(cols);
    table.append(row);

    return false;
  }

  removeRow = function() {
    
    var tr = $(this).closest('tr');

    tr.fadeOut(400, function() {
      tr.remove();  
    });

    return false;
  }
  
  $('#btn-add-item').click(addRow);
})(jQuery);