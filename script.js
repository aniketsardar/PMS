$(document).ready(function(){

  // <!-- code by ANIKET SARDAR -->
  var dataPoints = [];
  $.getJSON("app/get-data.php", function(data) {

      for (var i = 0; i < data.length; i++) {
        dataPoints.push({ y: parseInt(data[i].power) });
    }
//
    console.log(dataPoints);

  $(function () {
    // <!-- code by ANIKET SARDAR -->
//
  	//Better to construct options first and then pass it as a parameter
  	var options = {
  		exportEnabled: true,
                  animationEnabled: true,
  		title: {
  			text: "Power Consumption Per Day"
  		},
  		data: [
  		{
  			type: "splineArea", //change it to line, area, bar, pie, etc
  			 dataPoints: dataPoints,
        // dataPoints: [
        //   { y: 123},
        //   { y: 120},
        //   { y: 130},
        //   { y: 100},
        //   { y: 112},
        //   { y: 100},
        //   { y: 123},
        //   { y: 110},
        // ],
  		}
  		]
  	};

  	$("#chartContainer").CanvasJSChart(options);

  });
});

// ------- SmoothieChart  -----------
  // var smoothie = new SmoothieChart();
  // smoothie.streamTo(document.getElementById("mycanvas"), 1000);
  // var line1 = new TimeSeries();
  // var line2 = new TimeSeries();
  // //
  // //
  // setInterval(function() {
  //   line1.append(new Date().getTime(), Math.random());
  //   line2.append(new Date().getTime(), Math.random());
  // }, 1000);
  // //
  // smoothie.addTimeSeries(line1);
  // smoothie.addTimeSeries(line2);


  var cur_mode = 0;
  var pilot_mode = 0;
  if (cur_mode != 3) {
    $('.dev-controls .btn').addClass('disabled');
  }

  function changeMode(){
    cur_mode++;
    switch (cur_mode) {
      case 1: $('.mode').removeClass('btn-success');
      $('#mode1').addClass('btn-success');
      $.get("http://192.168.80.10?dev3off=1");
      $.get("http://192.168.80.10?dev2off=1");
      $.get("http://192.168.80.10?dev1on=1");
        break;
      case 2: $('.mode').removeClass('btn-success');
      $('#mode2').addClass('btn-success');
      $.get("http://192.168.80.10?dev3off=1");
      $.get("http://192.168.80.10?dev2off=1");
      $.get("http://192.168.80.10?dev1off=1");
        break;
      case 3: $('.mode').removeClass('btn-success');
              $('#mode3').addClass('btn-success');
              $('.dev-controls .btn').removeClass('disabled');
        break;
      default: location.reload();

    }
    // <!-- code by ANIKET SARDAR -->
  }

  $(document).on('click', '.mode', function(){
    var this_mode = $(this).data('mode');
    if(cur_mode != this_mode){
      $('.mode').removeClass('btn-success');
      $(this).addClass('btn-success');
    }
    if(this_mode == 3){
      $('.dev-controls .btn').removeClass('disabled');
    } else {
      $('.dev-controls .btn').addClass('disabled');
    }
  }).on('click', '.dev-controls .btn', function(){
    console.log($(this).data('dev'));
  })
  .on('click', '.autoPilot', function(){
    pilot_mode = 1;
  })
  .on('click', '.devC', function(){
    var dev = $(this).data('dev');
    var status = $(this).data('status');
    if(status == "on"){
      status = "off";
    }else {
      status = "on";
    }
    $.get("http://192.168.80.10?dev"+dev+status+"=1");
    $(this).text(status);
    $(this).data('status', status);
  });


  window.setInterval(function(){
    if (pilot_mode == 1) {
      changeMode();
    }
  }, 30000);


});
