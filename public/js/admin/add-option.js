let multiple_count = 1;
function myFunction() {
      $('#add-option').append(`<div>
           <div class="form-group">
                <input type="text" name="list_content[]" class="form-control" placeholder="Write list content" width="100">
           </div>
           
        </div>`);
      multiple_count++;      
}
//multiple choice option selection start
function hitMultipleChoice(key,option_key) {
    let input_var = "user_multiple_choice_"+option_key;
    var element = document.getElementById(input_var).value = key;
    let myid = "#multipleColorChange_"+option_key+key;
    let myclass = ".option_item"+option_key;
    $(myclass).removeClass("mltiple_choice_option_correct");
    $(myid).addClass("mltiple_choice_option_correct");
}
//multiple choice option selection end

$(document).ready(function() {
    // $(".submit_btn").click(function(){ 
    //     var lsthmtl = $(".clone").html();
    //     $(".increment").after(lsthmtl);
    // });
    $("body").on("click",".remove_btn",function(){ 
        $(this).parents(".demo").remove();
    });
  });
  function remove_item(key){
    const box = document.getElementById('demo_'+key);
    box.remove();
  }