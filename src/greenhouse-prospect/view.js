jQuery(document).ready(function ($) {
  $(".grnhse_prspct_cta .wp-block-button__link").on("click", function () {
    $(".grnhse_prspct").delay(300).fadeIn()
  })
  $(".modal-close").on("click", function () {
    $(".grnhse_prspct").fadeOut()
  })
  $("#ghpros-form").ajaxForm({
    success: function (response) {
      $("#ghpros-form").html("Thank you for submitting your application. We'll be in touch!")
      $(".grnhse_prspct").delay(2000).fadeOut()
      // window.location.pathname = "/thank-you"
    },
    error: function (response) {
      $("#ghpros-form").html("Your application could not be submitted. Please try again")
      console.log(response)
    },
    resetForm: true,
  })
})
