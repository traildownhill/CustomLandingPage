$(document).ready(function (e) {

   // Research
   $("#disabled-fullview-R").click(function () {
      alert("You must be Subscribe to View Fulltext")
   });
   
   // Register View
   // Research
   $('a.cls').click(function () {
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
   
   // Journal
   $('a.cls1').click(function () {
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
            // alert("I viewed 1 it "+data);
         }
        });
   });

   // Article
   $('a.cls2').click(function () {
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
            // alert("I viewed 2 it "+data);
         }
        });
   });
   
   // News
   $('a.cls3').click(function () {
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
            // alert("I viewed 3 it "+data);
         }
        }); 
   });
   // Register Copied
    // Research
   // MLA
   $('#id-copy-cite-r1').click(function () {
      var copyTextarea = document.querySelector('#myInput');
      copyTextarea.select();
       try
       {
          var successful = document.execCommand('copy');
          var msg = successful ? 'successful' : 'unsuccessful';
          console.log('Copying text command was ' + msg);

          if (msg == "successful") {
            // alert("Cited1");
            //  alert($("#cited_byR").val());
             
            var logged_id = $("#cited_byR").attr("value");
            var id_r = $('h5.cls').attr('id');
            var cite = $("#Cite" + id_r).val();
                  if(isNaN(cite)) {
                     var cite = 0;
                  } 
                  cite = parseInt(cite);
                  cite_r = cite + 1;
                  $.ajax({
                     url:"http://localhost/CustomLandingPage/view/citation.php",
                     method:"POST",
                     data:{cite_r:cite_r,id_r:id_r,logged_id:logged_id},
                     success: function (data) {
                        alert("Research Cited");
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
   // APA
   $('#id-copy-cite-r2').click(function () {
      var copyTextarea = document.querySelector('#myInput1');
      copyTextarea.select();
       try
       {
          var successful = document.execCommand('copy');
          var msg = successful ? 'successful' : 'unsuccessful';
          console.log('Copying text command was ' + msg);

          if (msg == "successful") {
            // alert("Cited1");
            //  alert($("#cited_byR").val());
             
            var logged_id = $("#cited_byJ").attr("value");
            var id_r = $('h5.cls').attr('id');
            var cite = $("#Cite" + id_r).val();
                  if(isNaN(cite)) {
                     var cite = 0;
                  } 
                  cite = parseInt(cite);
                  cite_r = cite + 1;
                  
                  // alert("Cite: "+cite_r);
                  // alert("Logged: "+logged_id);
                  $.ajax({
                     url:"http://localhost/CustomLandingPage/view/citation.php",
                     method:"POST",
                     data:{cite_r:cite_r,id_r:id_r,logged_id:logged_id},
                     success: function (data) {
                        alert("Research Cited");
                        // alert("Cited2:"+data);
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

   // Journal
   // MLA
   $('#id-copy-cite-j1').click(function () {
      var copyTextarea = document.querySelector('#myInput3');
      copyTextarea.select();
       try
       {
         // alert("Cited1");
          var successful = document.execCommand('copy');
          var msg = successful ? 'successful' : 'unsuccessful';
          console.log('Copying text command was ' + msg);

          if (msg == "successful") {
            // alert("Cited2");
            var logged_id = $("#cited_byJ").attr("value");
            var id_j = $('h5.cls').attr('id');
            // alert(logged_id +'&'+id_j);
            var cite = $("#Cite" + id_j).val();
            if(isNaN(cite)) {
               var cite = 0;
            } 
            cite = parseInt(cite);
            cite_j = cite + 1;
                  
                  // alert("Logged:"+logged_id+'&'+cite_j);
                  $.ajax({
                     url:"http://localhost/CustomLandingPage/view/citation.php",
                     method:"POST",
                     data:{cite_j:cite_j,id_j:id_j,logged_id:logged_id},
                     success: function (data) {
                        alert("Journal Cited");
                     }
                  });
          }
          else {
             alert("failed copy3");
          }
       } catch (err){
         console.log('Oops, unable to copy');
        //  alert("Unable to copy citation ");
       } 
      return false;
   });
   // APA
   $('#id-copy-cite-j2').click(function () {
      var copyTextarea = document.querySelector('#myInput4');
      copyTextarea.select();
       try
       {
          var successful = document.execCommand('copy');
          var msg = successful ? 'successful' : 'unsuccessful';
         //  console.log('Copying text command was ' + msg);

          if (msg == "successful") {
            alert("Cited1");
            
            var logged_id = $("#cited_byJ").attr("value");
            var id_j = $('h5.cls').attr('id');
            var cite = $("#Cite" + id_j).val();
            //  alert(logged_id +'&'+id_j+'&'+cite);
                  if(isNaN(cite)) {
                     var cite = 0;
                  } 
                  cite = parseInt(cite);
                  cite_j = cite + 1;
                  
                  // alert("Cite: "+cite_r);
                  // alert("Logged: "+logged_id);
                  $.ajax({
                     url:"http://localhost/CustomLandingPage/view/citation.php",
                     method:"POST",
                     data:{cite_j:cite_j,id_j:id_j,logged_id:logged_id},
                     success: function (data) {
                        alert("Journal Cited");
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
   // MLA
   $('#id-copy-cite-a1').click(function () {
      var copyTextarea = document.querySelector('#myInput5');
      copyTextarea.select();
       try
       {
          var successful = document.execCommand('copy');
          var msg = successful ? 'successful' : 'unsuccessful';
          console.log('Copying text command was ' + msg);

          if (msg == "successful") {
            var logged_id = $("#cited_byA").attr("value");
            var id_a = $('h5.cls').attr('id');
            var cite = $("#Cite" + id_a).val();
            if(isNaN(cite)) {
               var cite = 0;
            } 
            cite = parseInt(cite);
            cite_a = cite + 1;
                  $.ajax({
                     url:"http://localhost/CustomLandingPage/view/citation.php",
                     method:"POST",
                     data:{cite_a:cite_a,id_a:id_a,logged_id:logged_id},
                     success: function (data) {
                        alert("Journal Cited");
                     }
                  });
          }
          else {
             alert("failed copy3");
          }
       } catch (err){
         console.log('Oops, unable to copy');
        //  alert("Unable to copy citation ");
       } 
      return false;
   });
   // APA
   $('#id-copy-cite-a2').click(function () {
      var copyTextarea = document.querySelector('#myInput6');
      copyTextarea.select();
       try
       {
          var successful = document.execCommand('copy');
          var msg = successful ? 'successful' : 'unsuccessful';
         //  console.log('Copying text command was ' + msg);

          if (msg == "successful") {
            
            var logged_id = $("#cited_byA").attr("value");
            var id_a = $('h5.cls').attr('id');
            var cite = $("#Cite" + id_a).val();
                  if(isNaN(cite)) {
                     var cite = 0;
                  } 
                  cite = parseInt(cite);
                  cite_a = cite + 1;
             
                  $.ajax({
                     url:"http://localhost/CustomLandingPage/view/citation.php",
                     method:"POST",
                     data:{cite_a:cite_a,id_a:id_a,logged_id:logged_id},
                     success: function (data) {
                        alert("Journal Cited");
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
   // News

   // e.preventDefault();
});