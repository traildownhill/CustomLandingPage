$(document).ready(function () {
   // alert("Hellow");
   $('').click(function () {
      var id_r = $(this).attr('id');
      var view = $("#rView" + id_r).val();
      if(isNaN(view)) {
         var view = 0;
      }
      view = parseInt(view);
      view_r = view + 1;
      // alert("I viewed it " + view_r);
      $.ajax({
         url:"http://localhost/CustomLandingPage/view/citation.php",
         method:"POST",
         data:{view_r:view_r,id_r:id_r},
         success:function(data)
         {
            // alert("I viewed it "+data);
         }
        });
   });

  
});