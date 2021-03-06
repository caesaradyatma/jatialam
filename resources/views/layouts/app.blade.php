<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jati Alam') }}</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">



</head>
<body>
  
        @include('inc.navbar')  

      <div class = "main">  
          <div class="container-fluid">
            @include('inc.alerts')
          </div>
            @yield('content')
      </div>


    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>

    <script>
          var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

      for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var dropdownContent = this.nextElementSibling;
          if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
          } else {
            dropdownContent.style.display = "block";
          }
        });
      }
    </script>
    
    @yield('scripts')

   <script>
        $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var item = button.data('mytitle')
        var length = button.data('itemlength') 
        var width = button.data('itemwidth') 
        var height = button.data('itemheight') 
        var ass = button.data('sku') 
        var qty = button.data('measurement') 
        var itemid = button.data('item_Id') 
        var modal = $(this)

        modal.find('.modal-body #item_name').val(item)
        modal.find('.modal-body #item_length').val(length)
        modal.find('.modal-body #item_width').val(width)
        modal.find('.modal-body #item_height').val(height)
        modal.find('.modal-body #item_assembly').val(ass)
        modal.find('.modal-body #item_qty').val(qty)
        modal.find('.modal-body #itemid').val(itemid)

})

$('#modal-form-submit').on('click', function(e){
var button = $(event.relatedTarget) // Button that triggered the modal
        var item = button.data('mytitle')
        var length = button.data('itemlength') 
        var width = button.data('itemwidth') 
        var height = button.data('itemheight') 
        var ass = button.data('sku') 
        var qty = button.data('measurement') 
        var itemid = button.data('itemId') 
        var modal = $(this)

e.preventDefault();

        modal.find('.modal-body #item_name').val(item)
        modal.find('.modal-body #item_length').val(length)
        modal.find('.modal-body #item_width').val(width)
        modal.find('.modal-body #item_height').val(height)
        modal.find('.modal-body #item_assembly').val(ass)
        modal.find('.modal-body #item_qty').val(qty)
        modal.find('.modal-body #itemid').val(itemid)
$('#modal-form').submit();
});
</script>
</body>
</html>




