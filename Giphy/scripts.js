$(document).ready(function(){
      $(document).on('click','.btn', function(){
        if($(".offset").val() === ''){
          $(".offset").val(0);
        }
          $.ajax({
            type:"POST",
            url:"search.php",
            data:{name:$('.input').val(),rating:$('#rating').val(),limit:$("#limit").val(),key:$(".key").val(),offset:$(".offset").val()},
            error:function(xhr, status, error){
              var err = eval("(" + xhr.responseText + ")");
              $(".grid-container").text(err.Message);
            },
            success:function(images){
              $(".grid-container").html(images);
            }
          });
      });
});