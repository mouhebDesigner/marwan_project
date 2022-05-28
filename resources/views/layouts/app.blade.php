<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- custom css file cdn link  -->
    @yield('style')
    <link rel="stylesheet" href="{{ asset('assets/css/indexList.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" type="text/css">

</head>
<body>
    


    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script>

    AOS.init({
        duration:800,
        delay:400
    });

    </script>
     <!-- Main Javascript file -->
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

    @yield('script')
    <script>
      $(document).ready(function(){
          $("#search_btn").on('click', function(e){
            let sizes = [];
            $(".size_checked").each(function( index ) {
                if(this.checked){
                    // console.log($(this).val());
                    sizes.push($(this).val());
                }
            });
            let categories = [];
            $(".categorie_checked").each(function( index ) {
                if(this.checked){
                    // console.log($(this).val());
                    categories.push($(this).val());
                }
            });
            let colors = [];
            $(".checkedColor").each(function( index ) {
                if(this.checked){
                    // console.log($(this).val());
                    colors.push($(this).val());
                }
            });
            var data = {
                'colors' : colors,
                'categories' : categories,
                'sizes' : sizes,
                'search_by' : $('.search_by').val()
            };
            $.ajax({
                type: "GET",
                url: $(this).data('url'),
                data: data,
                success: function(response){
                    $(".list_table").empty();
                    $(".list_table").html(response.body);
                    $(".listGrid").empty();
                    $(".listGrid").html(response.body);
                }
            })
        });
        $(".search_by").on('keypress', function(e){
            let sizes = [];
            $(".size_checked").each(function( index ) {
                if(this.checked){
                    // console.log($(this).val());
                    sizes.push($(this).val());
                }
            });
            let categories = [];
            $(".categorie_checked").each(function( index ) {
                if(this.checked){
                    // console.log($(this).val());
                    categories.push($(this).val());
                }
            });
            let colors = [];
            $(".checkedColor").each(function( index ) {
                if(this.checked){
                    // console.log($(this).val());
                    colors.push($(this).val());
                }
            });
            var data = {
                'colors' : colors,
                'categories' : categories,
                'sizes' : sizes,
                'search_by' : $('.search_by').val(),
                'price_to': $('#input_to').val(),
                'price_from': $('#input_from').val()
            };
            var code = e.keyCode || e.which;
            if(code == 13) { //Enter keycode
                $.ajax({
                    type: "GET",
                    url: $("#search_btn").data('url'),
                    data: data,
                    success: function(response){
                        $(".list_table").empty();
                        $(".list_table").html(response.body);
                        $(".listGrid").empty();
                        $(".listGrid").html(response.body);
                        $(".paginate_block").empty();
                        $(".paginate_block").html(response.pagination);
                    }
                })
            }
        });
        $(".search_by").on('keydown', function(e){
            
            var data = {
                'value' : $(this).val()
            };
            var code = e.keyCode || e.which;
            $.ajax({
                type: "GET",
                url: $("#search_btn").data('url'),
                data: data,
                success: function(response){
                    console.log("seeeeend");
                    $(".list_table").empty();
                    $(".list_table").html(response.body);
                    $(".listGrid").empty();
                    $(".listGrid").html(response.body);
                    $(".paginate_block").empty();
                    $(".paginate_block").html(response.pagination);
                }
            })
        });
          $(".delete-confirm").on('click', function(e){
          e.preventDefault();
          console.log("jkehdkead");
          var url = $(this).data('url');
          console.log($('meta[name=csrf-token]').attr('content'));
          swal({
                  title: "êtes vous sûr?",
                  text: "Voulez vous supprimer ce "+$(this).data('model'),
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                      var data = {
                          "_token" : $('meta[name="csrf-token"]').attr('content'),
                      };
                      $.ajax({
                          type: "DELETE",
                          url: url,
                          data: data,
                          success: function(response){
                              console.log(response);
                              swal(response.deleted, {
                                  icon: "success",
                              }).then((result) => {
                                  location.reload();
                              });
                          }
                      })
                  } else {
                      swal("Votre action est annulé");
                  }
              });
          });
          $(".edit-confirm").on('click', function(e){
              e.preventDefault();
              console.log($(this).data('model'));
              var id = $(this).closest('tr').find('.product_id').val();
              var href = $(this).attr('href');
              swal({
                  title: "êtes vous sûr?",
                  text: "Voulez vous editer ce "+$(this).data('model'),
                  icon: "primary",
                  buttons: true,
                  dangerMode: false,
              })
              .then((willEdit) => {
                  if (willEdit) {
                      window.location.href = href;
                  } else {
                      swal("Votre action est annulé");
                  }
              });
          });
      });
    </script>
</body>
</html>
