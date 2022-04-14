$(document).ready(function (e) {

   // Research
   $("#disabled-fullview-R").click(function () {
      alert("You must be Subscribe to View Fulltext")
   });
   
   // Register View
   // Research
   
   $('a.cls').click(function () {
      // alert("Click");
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
            alert("I viewed it "+data);
         }
        });
   });
   
   // Journal
   $('a.cls1').click(function () {
      alert("Click1");
      var id_j = $(this).attr('id');
      var view = $("#jView" + id).val();
      if(isNaN(view)) {
         var view = 0;
      }
      view = parseInt(view);
      view_j = view + 1;

      $.ajax({
         url:"http://localhost/CustomLandingPage/view/citation.php",
         method:"POST",
         data:{view_j:view_j,id_j:id_j},
         success:function(data)
         {
            alert("I viewed 1 it "+data);
         }
        });
   });

   // Article
   $('a.cls2').click(function () {
      alert("Click2");
      var id_a = $(this).attr('id');
      var view = $("#aView" + id).val();
      if(isNaN(view)) {
         var view = 0;
      }
      view = parseInt(view);
      view_a = view + 1;

      $.ajax({
         url:"http://localhost/CustomLandingPage/view/citation.php",
         method:"POST",
         data:{view_a:view_a,id_a:id_a},
         success:function(data)
         {
            alert("I viewed 2 it "+data);
         }
        });
   });
   
   // News
   $('a.cls3').click(function () {
      alert("Click3");
      var id_n = $(this).attr('id');
      var view = $("#nView" + id).val();
      if(isNaN(view)) {
         var view = 0;
      }
      view = parseInt(view);
      view_n = view + 1;

      $.ajax({
         url:"http://localhost/CustomLandingPage/view/citation.php",
         method:"POST",
         data:{view_n:view_n,id_n:id_n},
         success:function(data)
         {
            alert("I viewed 3 it "+data);
         }
        });
   });
   // Register Copied
    // Research
   $('#id-copy-cite').click(function () {
      // alert("Cited");
      var copyTextarea = document.querySelector('#cite-textarea');
      copyTextarea.select();
       try
       {
          var successful = document.execCommand('copy');
          var msg = successful ? 'successful' : 'unsuccessful';
          console.log('Copying text command was ' + msg);

          if (msg == "successful") {
            alert("Cited1");
            //  alert($("#cited_byR").val());
             
            var logged_id = $("#cited_byR").attr("value");
            var id_r = $('h5.cls').attr('id');
            var cite = $("#Cite" + id_r).val();
                  if(isNaN(cite)) {
                     var cite = 0;
                  } 
                  cite = parseInt(cite);
                  cite_r = cite + 1;
                  
                  // alert("Cite: "+cite_r);
                  alert("Logged: "+logged_id);
                  $.ajax({
                     url:"http://localhost/CustomLandingPage/view/citation.php",
                     method:"POST",
                     data:{cite_r:cite_r,id_r:id_r,logged_id:logged_id},
                     success: function (data) {
                        alert("Cited3: Success");
                        alert("Cited2:"+data);
                     }
                  });
          }
          else {
             
          }
       } catch (err){
         console.log('Oops, unable to copy');
        //  alert("Unable to copy citation ");
       } 
      return false;
   });
   // Article
   // Journal
   // News

   // e.preventDefault();
});