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
