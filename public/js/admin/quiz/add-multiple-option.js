let multiple_count = 1;
function myFunction() {
      $('#add-option').append(`<label for="name" class="mb-2 fw-bold">Question Option</label><div class="d-flex justify-content-start">
           <div class="form-group">
                <input type="text" name="blank_answer[]" class="form-control" placeholder="option">
           </div>
           <div class="form-check mt-2">
              <input class="form-check-input" type="checkbox" name="is_correct[]" value="${multiple_count}" id="flexCheckDefault${multiple_count}">
              <label class="form-check-label" for="flexCheckDefault${multiple_count}">is correct</label>
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