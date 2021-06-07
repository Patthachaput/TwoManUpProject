function SubmitFormData() {
  var studentID = $('#studentID').val();
  $.post("submit_st.php", { studentID: studentID },
  function(data) {
    $('#results').html(data);
    $('#myForm')[0].reset();
  });
}

function SubmitFormData1() {
  var couseID = $('#couseID').val();
  $.post("submit_cs.php", { couseID: couseID },
  function(data) {
    $('#results').html(data);
    $('#myForm')[0].reset();
  });
}