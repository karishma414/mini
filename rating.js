$(function () {
 
    $(".rateYo").rateYo().on("rateyo.change", function(e,data){
      var rating =data.rating;
      $(this).parent().find('.score').text('score:'+$(this).attr('data-rating-score'));
      $(this).parent().find('.result').text('rating:'+rating);
      $(this).parent().find('input[name=rating]').val(rating);
    });
   
  });