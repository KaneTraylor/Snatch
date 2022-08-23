$().ready(function () {
  // validate signup form on keyup and submit
  $("#applyForm").validate({
    rules: {
      firstName: "required",
      lastName: "required",
      mobileNumber: {
        required: true,
        minlength: 11
      },
      birthday: {
        required: true,
        minlength: 10
      },
      streetAddress: "required",
      city: "required",
      state: "required",
      zipcode: {
        required: true,
        minlength: 5
      },
      SSN: {
        required: true,
        minlength: 11
      },
      monthlyIncome: "required",
      authorization: "required"
    },
    messages: {
      firstName: "First name is required",
      lastName: "Last name is required",
      mobileNumber: {
        required: "Zipcode is required",
        minlength: "Invalid mobile number"
      },
      birthday: {
        required: "Birthday is required",
        minlength: "Invalid birthday"
      },
      streetAddress: "Street Address is required",
      city: "City is required",
      state: "State is required",
      zipcode: {
        required: "Zipcode is required",
        minlength: "Invalid zipcode"
      },
      SSN: {
        required: "Social security number is required",
        minlength: "Invalid SSN"
      },
      monthlyIncome: "Monthly income is required",
      authorization: "Authorization is required"
    }
  });

});


const stateTopText = document.getElementById("stateTopText");
const stateAbove = document.getElementById("stateAbove");
const customSelect = document.getElementById("state");


function focusInSelect() {
  stateAbove.style.top = "-13px";
  stateAbove.style.left = "17px";
  stateAbove.style.color = "rgb(9, 211, 216)";
  stateAbove.style.backgroundColor = "#FFFFFF";
  stateAbove.style.padding = "0px 5px";
}

function focusOutSelect() {
  stateAbove.style.color = "#6b5755";
}


function checkboxCheck(checkbox) {
  if (checkbox.checked == true) {
    $(".animBtn").addClass("checked");
  } else {
    $(".animBtn").removeClass("checked");
  }
}

// stop the input autocomplete function
$(".form__input").attr("autocomplete", "randomString");



// custom currency formatter

$("input[data-type='currency']").on({
  keyup: function () {
    formatCurrency($(this));
  },
  blur: function () {
    formatCurrency($(this), "blur");
  }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.

  // get input value
  var input_val = input.val();

  // don't validate empty input
  if (input_val === "") { return; }

  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");

  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);

    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }

    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "$" + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "$" + input_val;

    // final formatting
    if (blur === "blur") {
      input_val += "";
      //   input_val += ".00";
    }
  }

  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}


// const authorization = document.getElementById("authorization");
// const animBtn = document.getElementsByClassName("animBtn");

// authorization.addEventListener("click", ()=> {
//     animBtn.style.zIndex = "1";
// })