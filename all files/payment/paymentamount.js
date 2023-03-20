
//this function works for asign the package price as customer wish
function getPackagetype(value)
{
    document.getElementById("package_price").value=value;
}
 
//this jquery function works for restrict input value out from min/max range
$(document).on('keyup', 'input[name=decoration]', function() 
{
  var _this = $(this);
  var min = parseInt(_this.attr('min')) || 1; // if min attribute is not defined, 1 is default
  var max = parseInt(_this.attr('max')) || 100; // if max attribute is not defined, 100 is default
  var val = parseInt(_this.val()) || (min - 1); // if input char is not a number the value will be (min - 1) so first condition will be true
  if (val < min)
    _this.val(min);
  if (val > max)
    _this.val(max);
});

//this function uses for if select decoration option as no, then assign input value set as 0 
function decorationCheck() {
  var d = document.getElementById("is_decoration").value;
  if(d == "no")
  {
    document.getElementById("decoration_hours").value = 0;
    document.getElementById("dec_price").value = 0;
  }  
}

//this function uses for if select rehearsal option as no, then assign input value set as 0 
function rehearsalCheck() {
  var r = document.getElementById("is_rehearsal").value;
  if(r == "no")
  {
    document.getElementById("rehearsal_hours").value=0;
    document.getElementById("rehearsal_price").value=0;
  }
}

//this function uses for if select security option as no, then assign input value set as 0 
function securityCheck() {
  var s = document.getElementById("is_security").value;
  if(s == "no")
  {
    document.getElementById("security_hours").value='no'; 
    //document.getElementById("security_hours").value = 0;
    document.getElementById("security_price").value=0;
  }
}

//this is jquery function when select "no" disable the quantity field decoration
$(document).ready(function () {
  var $input = $('input[name=decoration]');
  $input.attr('disabled', 'disabled');
  $('select[name=decoration_option]').on('change', function () {
      $input.attr('disabled', $(this).val() != "yes");
  });

});

//this is jquery function when select "no" disable the quantity field rehearsal
$(document).ready(function () {
var $input = $('input[name=rehearsal]'); 
  $input.attr('disabled', 'disabled');
  $('select[name=rehearsal_option]').on('change', function () {
      $input.attr('disabled', $(this).val() != "yes");
  });
});

//this is jquery function when select "no" disable the quantity field in security
$(document).ready(function () {
  var $input = $('select[name=security_hours_option]'); 
    $input.attr('disabled', 'disabled');
    $('select[name=security_option]').on('change', function () {
        $input.attr('disabled', $(this).val() != "yes");
    });
});

 

//this function calculate total value of the full payment
function calculateTotal()
{
  
  let unit_price=
  {
    price_package: 1, 
    decoration_per_hour: 5000,
    rehearsal_per_hour: 10000,
    security_per_hour: 15000,   
  };
  let item_price={}
  
  item_price.decoration_per_hour = ($("#decoration_hours").val() * unit_price.decoration_per_hour)
  $("#dec_price").val(item_price.decoration_per_hour);

  item_price.rehearsal_per_hour = ($("#rehearsal_hours").val() * unit_price.rehearsal_per_hour )
  $("#rehearsal_price").val(item_price.rehearsal_per_hour);
  

  item_price.security_per_hour = ($("#security_hours").val() * unit_price.security_per_hour )
  $("#security_price").val(item_price.security_per_hour);
  
  item_price.price_package = ($("#package").val() * unit_price.price_package)
  $("#package_price").val(item_price.price_package);
  

  let total = item_price.decoration_per_hour + item_price.rehearsal_per_hour + item_price.security_per_hour + item_price.price_package;
  $("#total_id").val(total);

  return total

  
}



//this function update total value every time in option changes
$(function()
{
    $(".qty").on("change keyup",calculateTotal)
});

/*var totalValue = $("#total_id").val(total);

$.ajax({
    url: 'uploadslip.php',
    type: 'POST',
    data: { totalValue: totalValue },
    success: function(response) {
        console.log(totalValue);
    },
    error: function(xhr, status, error) {
        console.log('AJAX request failed:', error);
    }
  });*/

  // Get the total value
var total = calculateTotal();
console.log(total);


// Set the value of the hidden input field to the total value
document.getElementById("total_id").setAttribute("value", total);