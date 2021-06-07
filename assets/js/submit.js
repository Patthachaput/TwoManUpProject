function SubmitFormData() {
  var studentID = $('#studentID').val();
  $.post("submit.php", { studentID: studentID },
  function(data) {
    $('#results').html(data);
    $('#myForm')[0].reset();
  });
}