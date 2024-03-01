$(document).ready(function(){ 
  //light and dark mode
  $('input:not([type="file"]):not([type="radio"]):not([type="checkbox"])').addClass('tag');

  $(".btn-close").html('<i class="fa-solid fa-xmark fa-2x"></i>')
  $(".card").addClass('card-theme')
  $(".card-theme").addClass('ps-2 pt-2')
 
  var mode = localStorage.getItem('mode');

  // Apply initial mode
  if (mode === 'light') {
    enableLightMode();
    $('.toggle-btn').html('<i class="fa-solid fa-moon "></i>')
    $('.toggle-btn').attr('title','Enable dark Mode')
   
  } else {
    enableDarkMode();
    $('.toggle-btn').html('<i class="fa-solid fa-lightbulb text-light"></i>')
    $('.toggle-btn').attr('title','Enable light Mode')
  }
  
  // Toggle mode on button click
  $('.toggle-btn').click(function() {
    if (mode === 'light') {
      enableDarkMode();
      mode = 'dark';
      $(".search").removeClass('bg-light text-dark')
      .addClass('bg-dark text-light');
      document.cookie = 'mode=' + mode + '; expires=Fri, 31 Dec 2050 23:59:59 GMT; path=/;';
      $(".btn-close").html('<i class="fa-solid fa-xmark fa-2x"></i>')
      $('.toggle-btn').html('<i class="fa-solid fa-lightbulb text-light"></i>')
      $('.toggle-btn').attr('title','Enable light Mode')
      $(".card-theme").attr('style',' border:1px solid #fff !important;')
    } else {
      enableLightMode();
      mode = 'light';
      $(".search").removeClass('bg-dark text-light')
         .addClass('bg-light text-dark');
      document.cookie = 'mode=' + mode + '; expires=Fri, 31 Dec 2050 23:59:59 GMT; path=/;';
      $(".btn-close").html('<i class="fa-solid fa-xmark fa-2x"></i>')
      $('.toggle-btn').html('<i class="fa-solid fa-moon "></i>')
      $('.toggle-btn').attr('title','Enable dark Mode')
      $(".card-theme").attr('style',' border:1px solid rgba(0, 0, 0, 0.125) !important;')
      
    }
  });
    

    
     // Function to enable dark mode
     function enableDarkMode() {
      $('body, header, select, table, .tag, .modal-content,textarea, .modal-footer, .container, .card, .dropdown-menu, .nav,.navbar-toggler')
        .removeClass('bg-light text-dark')
        .addClass('bg-dark text-light');
    
      // Set the background color of the close button using the `css()` method
      $('.btn-close').addClass('btn btn-dark text-light');
      $(".nav-link-title").removeClass('text-dark').addClass('text-light');
      $(".card-theme").attr('style',' border:1px solid #fff !important;')
      localStorage.setItem('mode', 'dark');
    }
    
     // Function to enable light mode
     function enableLightMode() {
       $('body, header, select, table, .tag, .modal-content,textarea, .modal-footer, .container, .card, .dropdown-menu, .nav,.navbar-toggler')
         .removeClass('bg-dark text-light')
         .addClass('bg-light text-dark');
     
       $(".nav-link-title").removeClass('text-light').addClass('text-dark');
       $('.btn-close').removeClass('btn btn-dark text-light');
       $(".card-theme").attr('style',' border:1px solid rgba(0, 0, 0, 0.125) !important;')
       localStorage.setItem('mode', 'light');
     }

//get current time
function getCurrentTimestamp() {
  const now = new Date();
  const year = now.getFullYear();
  const month = (now.getMonth() + 1).toString().padStart(2, '0');
  const day = now.getDate().toString().padStart(2, '0');
  const hours = now.getHours().toString().padStart(2, '0');
  const minutes = now.getMinutes().toString().padStart(2, '0');
  const seconds = now.getSeconds().toString().padStart(2, '0');
  
  return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
}
$(".currentTimestamp").val(getCurrentTimestamp())

window.addEventListener('close-modal', event => {

  $('.modal').modal('hide');

// $(".form-container").load(location.href + "  .edit_comment")

})



$(".paragraph-comment").each(function() {
  var commentHtml = $(this).html();
  $(".paragraph-content").html(function(index, oldHtml) {
    return oldHtml + commentHtml;
  });
});


//image display

const fileInput = document.querySelector('input[type="file"]');
const imgPreview = document.querySelector('div.image-preview');

fileInput.addEventListener('change', function() {
  if (fileInput.files && fileInput.files[0]) {
    const reader = new FileReader();
imgPreview.innerHTML=''
    reader.onload = function(e) {
      imgPreview.innerHTML = `<img src="${e.target.result}" class="border border-5 rounded-2 border-grey" alt="Image preview" width="280px" height="280px">`;
    };

    reader.readAsDataURL(fileInput.files[0]);
  }
});

      


          });


          // --author--
          $(document).on('submit', '#myForm', function(event) {
  event.preventDefault(); // Prevent form submission

  // Clear previous validation errors
  $('.is-invalid').removeClass('is-invalid');
  $('.invalid-feedback').empty();

  // Serialize form data
  var formData = $(this).serialize();

  // Submit the form using AJAX
  $.ajax({
    url: "/addauthor",
    type: 'POST',
    data: formData,
    beforeSend: function(xhr) {
      xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
    },
    success: function(response) {
  
      $(".parent").load(location.href + "  .child,.chipag")
      
      $('#modal-simple').modal('hide');
      $(".success").html('<div class="alert  alert-success">The author has been added successfully</div>')
    

    },
    error: function(xhr) {
      // Handle error response
      if (xhr.status === 422) {
        var errors = xhr.responseJSON.errors;
        $.each(errors, function(field, messages) {
          if (field === 'direct') {
            // Handle radio input error separately
            var radioContainer = $('input[name="direct"]').closest('.form-check');
            radioContainer.addClass('is-invalid');
            var errorContainer = radioContainer.siblings('.invalid-feedback');
            if (errorContainer.length === 0) {
              errorContainer = $('<div class="invalid-feedback"></div>');
              radioContainer.parent().append(errorContainer);
            }
            errorContainer.html('');
            $.each(messages, function(index, message) {
              errorContainer.append('<span style="color:#dc3545 !important">' + message + '</span>');
            });
          } else {
            $('#' + field).addClass('is-invalid');
            var errorContainer = $('#' + field).siblings('.invalid-feedback');
            if (errorContainer.length === 0) {
              errorContainer = $('<div class="invalid-feedback"></div>');
              $('#' + field).parent().append(errorContainer);
            }
            errorContainer.html('');
            $.each(messages, function(index, message) {
              errorContainer.append('<span style="color:#dc3545 !important">' + message + '</span>');
            });
          }
        });
      } else {
        console.log(xhr.responseText);
      }
    },
    complete: function(xhr) {
      // Check if there are no input validation errors
      if ($('.is-invalid').length === 0) {
        // Clear form inputs
        $('#myForm')[0].reset();
      }
    }
  });
});
$(document).on('submit', '.myFormupdate', function(event) {
  event.preventDefault(); // Prevent form submission

  // Clear previous validation errors
  $(this).find('.is-invalid').removeClass('is-invalid');
  $(this).find('.invalid-feedback').empty();

  // Serialize form data for the current form
  var formData = new FormData(this);

  // Reference to the current form
  var currentForm = $(this);

  // Submit the form using AJAX
  $.ajax({
    url: "/updateauthor", // Use the route helper to generate the URL
    type: 'POST',
    data: formData,
    processData: false, // Prevent jQuery from processing the data
    contentType: false, // Prevent jQuery from setting the content type
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
      if (response == 2) {
        $(".parent").load(location.href + " .child, .chipag"); // Update the desired elements

        $('.modal').modal('hide');
        $(".success").html('<div class="alert alert-success">The author has been updated successfully</div>');
      }
    },
    error: function(xhr) {
      // Handle error response
      if (xhr.status === 422) {
        var errors = xhr.responseJSON.errors;
        $.each(errors, function(field, messages) {
          if (field === 'direct') {
            // Handle radio input error separately
            var radioContainer = currentForm.find('input[name="direct"]').closest('.form-check');
            radioContainer.addClass('is-invalid');
            var errorContainer = radioContainer.siblings('.invalid-feedback');
            if (errorContainer.length === 0) {
              errorContainer = $('<div class="invalid-feedback"></div>');
              radioContainer.parent().append(errorContainer);
            }
            errorContainer.html('');
            $.each(messages, function(index, message) {
              errorContainer.append('<span style="color:#dc3545 !important">' + message + '</span>');
            });
          } else {
            currentForm.find('#' + field).addClass('is-invalid');
            var errorContainer = currentForm.find('#' + field).siblings('.invalid-feedback');
            if (errorContainer.length === 0) {
              errorContainer = $('<div class="invalid-feedback"></div>');
              currentForm.find('#' + field).parent().append(errorContainer);
            }
            errorContainer.html('');
            $.each(messages, function(index, message) {
              errorContainer.append('<span style="color:#dc3545 !important">' + message + '</span>');
            });
          }
        });
      } else {
        console.log(xhr.responseText);
      }
    },
    complete: function(xhr) {
      // Check if there are no input validation errors
      if (currentForm.find('.is-invalid').length === 0) {
        // Clear form inputs for the current form
        currentForm[0].reset();
      }
    }
  });
});

setInterval(function() {
      $(".ss").fadeOut();
  }, 2000);

// --category--


  $(document).on('submit', '#myFormcat', function(event) {
  event.preventDefault(); // Prevent form submission

  // Clear previous validation errors
  $('.is-invalid').removeClass('is-invalid');
  $('.invalid-feedback').empty();

  // Serialize form data
  var formData = $(this).serialize();

  // Submit the form using AJAX
  $.ajax({
    url: "/addcat",
    type: 'POST',
    data: formData,
    beforeSend: function(xhr) {
      xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
    },
    success: function(response) {
  
      $(".parent").load(location.href + "  .child")
      
      $('#modal-simple').modal('hide');
      $(".success").html('<div class="alert  alert-success">The category has been added successfully</div>')
    

    },
    error: function(xhr) {
      // Handle error response
      if (xhr.status === 422) {
        var errors = xhr.responseJSON.errors;
        $.each(errors, function(field, messages) {
            $('#' + field).addClass('is-invalid');
            var errorContainer = $('#' + field).siblings('.invalid-feedback');
            if (errorContainer.length === 0) {
              errorContainer = $('<div class="invalid-feedback"></div>');
              $('#' + field).parent().append(errorContainer);
            }
            errorContainer.html('');
            $.each(messages, function(index, message) {
              errorContainer.append('<span style="color:#dc3545 !important">' + message + '</span>');
            });
        });
      } else {
        console.log(xhr.responseText);
      }
    },
    complete: function(xhr) {
      // Check if there are no input validation errors
      if ($('.is-invalid').length === 0) {
        // Clear form inputs
        $('#myFormcat')[0].reset();
      }
    }
  });
});


$(document).on('submit', '.myFormcat', function(event) {
  event.preventDefault(); // Prevent form submission

  // Clear previous validation errors
  $(this).find('.is-invalid').removeClass('is-invalid');
  $(this).find('.invalid-feedback').empty();

  // Serialize form data for the current form
  var formData = new FormData(this);

  // Reference to the current form
  var currentForm = $(this);

  // Submit the form using AJAX
  $.ajax({
    url: "/updatecat", // Use the route helper to generate the URL
    type: 'POST',
    data: formData,
    processData: false, // Prevent jQuery from processing the data
    contentType: false, // Prevent jQuery from setting the content type
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
      if (response == 2) {
        $(".parent").load(location.href + " .child"); // Update the desired elements

        $('.modal').modal('hide');
        $(".success").html('<div class="alert alert-success">The category has been updated successfully</div>');
      }
    },
    error: function(xhr) {
      // Handle error response
      if (xhr.status === 422) {
        var errors = xhr.responseJSON.errors;
        $.each(errors, function(field, messages) {
            currentForm.find('#' + field).addClass('is-invalid');
            var errorContainer = currentForm.find('#' + field).siblings('.invalid-feedback');
            if (errorContainer.length === 0) {
              errorContainer = $('<div class="invalid-feedback"></div>');
              currentForm.find('#' + field).parent().append(errorContainer);
            }
            errorContainer.html('');
            $.each(messages, function(index, message) {
              errorContainer.append('<span style="color:#dc3545 !important">' + message + '</span>');
            });
        });
      } else {
        console.log(xhr.responseText);
      }
    },
    complete: function(xhr) {
      // Check if there are no input validation errors
      if (currentForm.find('.is-invalid').length === 0) {
        // Clear form inputs for the current form
        currentForm[0].reset();
      }
    }
  });
});

//subcat
$(document).on('submit', '#myFormsub', function(event) {
  event.preventDefault(); // Prevent form submission

  // Clear previous validation errors
  $('.is-invalid').removeClass('is-invalid');
  $('.invalid-feedback').empty();

  // Serialize form data
  var formData = $(this).serialize();

  // Submit the form using AJAX
  $.ajax({
    url: "/addsub",
    type: 'POST',
    data: formData,
    beforeSend: function(xhr) {
      xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
    },
    success: function(response) {
  
      $(".parent").load(location.href + "  .child")
      
      $('#modal-simples').modal('hide');
      $(".success").html('<div class="alert  alert-success">The subcategory has been added successfully</div>')
    

    },
    error: function(xhr) {
      // Handle error response
      if (xhr.status === 422) {
        var errors = xhr.responseJSON.errors;
        $.each(errors, function(field, messages) {
            $('#' + field).addClass('is-invalid');
            var errorContainer = $('#' + field).siblings('.invalid-feedback');
            if (errorContainer.length === 0) {
              errorContainer = $('<div class="invalid-feedback"></div>');
              $('#' + field).parent().append(errorContainer);
            }
            errorContainer.html('');
            $.each(messages, function(index, message) {
              errorContainer.append('<span style="color:#dc3545 !important">' + message + '</span>');
            });
        });
      } else {
        console.log(xhr.responseText);
      }
    },
    complete: function(xhr) {
      // Check if there are no input validation errors
      if ($('.is-invalid').length === 0) {
        // Clear form inputs
        $('#myFormsub')[0].reset();
      }
    }
  });
});


$(document).on('submit', '.myFormsub', function(event) {
  event.preventDefault(); // Prevent form submission

  // Clear previous validation errors
  $(this).find('.is-invalid').removeClass('is-invalid');
  $(this).find('.invalid-feedback').empty();

  // Serialize form data for the current form
  var formData = new FormData(this);

  // Reference to the current form
  var currentForm = $(this);

  // Submit the form using AJAX
  $.ajax({
    url: "/updatesub", // Use the route helper to generate the URL
    type: 'POST',
    data: formData,
    processData: false, // Prevent jQuery from processing the data
    contentType: false, // Prevent jQuery from setting the content type
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
      if (response == 2) {
        $(".parent").load(location.href + " .child"); // Update the desired elements

        $('.modal').modal('hide');
        $(".success").html('<div class="alert alert-success">The subcategory has been updated successfully</div>');
      }
    },
    error: function(xhr) {
      // Handle error response
      if (xhr.status === 422) {
        var errors = xhr.responseJSON.errors;
        $.each(errors, function(field, messages) {
            currentForm.find('#' + field).addClass('is-invalid');
            var errorContainer = currentForm.find('#' + field).siblings('.invalid-feedback');
            if (errorContainer.length === 0) {
              errorContainer = $('<div class="invalid-feedback"></div>');
              currentForm.find('#' + field).parent().append(errorContainer);
            }
            errorContainer.html('');
            $.each(messages, function(index, message) {
              errorContainer.append('<span style="color:#dc3545 !important">' + message + '</span>');
            });
        });
      } else {
        console.log(xhr.responseText);
      }
    },
    complete: function(xhr) {
      // Check if there are no input validation errors
      if (currentForm.find('.is-invalid').length === 0) {
        // Clear form inputs for the current form
        currentForm[0].reset();
      }
    }
  });
});
//comments






$(document).on('click', '.btn-del', function() {
  $('.success').html('<div class="alert ss alert-success">The post has been deleted successfully</div>');
});


var inputField = $('.tags');

// Bind a keyup event to the input field
inputField.on('keyup', function(event) {
  // Get the current value of the input field
  var currentValue = inputField.val();

  // Split the current value into an array of words
  var words = currentValue.split(' ');

  // Remove any empty words from the array
  words = words.filter(function(word) {
    return word !== '';
  });

  // Clear the div element
  $('#div_element').empty();

  // Iterate over the array of words and create a new div element for each word
  for (var i = 0; i < words.length; i++) {
    var word = words[i];

    // Create a new div element
    var divElement = $('<div class="btn btn-secondary d-block h5 rounded-2">');

    // Set the text of the div element to the current word
    divElement.text(word);

    // Append the div element to the existing div element
    $('#div_element').append(divElement);
  }
});
