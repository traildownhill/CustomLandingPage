$(document).ready(function () {
   
   // 
   $("#filter1").on('change',function (e) {
      var value = $(this).val();
      var title = $("#txtsearch").val();
      var type = $("#search_type").val();
      
      if (value == 0) {
         var values = "r";
      }
      else if (value == 1) {
         var values = "v";
      }
      else if (value == 2) {
         var values = "c";
      }
      // alert(values +'&'+ title + '&' +type);

      $.ajax({
         type: "GET",
         url: "http://localhost/CustomLandingPage/result.php",
         data: 'req='+values+'a='+title+'&'+'u='+type,
         beforeSend: function () {
            alert("Waiting..." + 'a=' + title + '&' + 'u=' + type + '&' + 'req=' + values); 
         },
         success: function (data) {
            // alert(data);
            // $('#result-tbl').html(data);

         }
      });
      e.preventDefault();   
   });
   
   // 
   // $("#filter2").on('change',function (e) {
   //    var value = $(this).val();
   //    var title = $("#txtsearch").val();
   //    var type = $("#search_type").val();
      
   //    if (value == 0) {
   //       var values = "r";
   //    }
   //    else if (value == 1) {
   //       var values = "v";
   //    }
   //    else if (value == 2) {
   //       var values = "c";
   //    }
   //    // alert(values +'&'+ title + '&' +type);

   //    $.ajax({
   //       type: "GET",
   //       url: "http://localhost/CustomLandingPage/result.php",
   //       data: 'a=' + title + '&' + 'u=' + type + '&' + 'req =' + values,
   //       beforeSend: function () {
   //          // alert("Waiting..." + 'a=' + title + '&' + 'u=' + type + '&' + 'req=' + values); 
   //       },
   //       success: function (data) {
   //          alert(data);
   //          // $('#result-tbl').html(data);;

   //       }
   //    });
   //    e.preventDefault();   
   //  });
    $('p').click(function () {
      var $this = $(this);
      // Current click count is previous click count +1
      var clickCount = ($this.data("click-count") || 0) + 1;
      // Save current click count
       $this.data("click-count", clickCount);
      if (clickCount %2 === 0) {
         $(this).css({
            'text-overflow': 'ellipsis', 
            'overflow': 'hidden', 
            'white-space': 'nowrap'
         })
       }
       if (clickCount%2 === 1) {
         $(this).css({
            'text-overflow': 'ellipsis', 
            'overflow': 'visible', 
            'white-space': 'normal'
         })
       }
   });
});
