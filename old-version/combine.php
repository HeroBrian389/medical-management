
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Smart Scanner</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


  <link href='fullcalendar-master/assets/css/fullcalendar.css' rel='stylesheet' />
  <link href='fullcalendar-master/assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
  <script src='fullcalendar-master/assets/js/jquery-1.10.2.js' type="text/javascript"></script>
  <script src='fullcalendar-master/assets/js/jquery-ui.custom.min.js' type="text/javascript"></script>
  <script src='fullcalendar-master/assets/js/fullcalendar.js' type="text/javascript"></script>
  <script>

  	$(document).ready(function() {
  	    var date = new Date();
  		var d = date.getDate();
  		var m = date.getMonth();
  		var y = date.getFullYear();

  		/*  className colors

  		className: default(transparent), important(red), chill(pink), success(green), info(blue)

  		*/


  		/* initialize the external events
  		-----------------------------------------------------------------*/

  		$('#external-events div.external-event').each(function() {

  			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
  			// it doesn't need to have a start or end
  			var eventObject = {
  				title: $.trim($(this).text()) // use the element's text as the event title
  			};

  			// store the Event Object in the DOM element so we can get to it later
  			$(this).data('eventObject', eventObject);

  			// make the event draggable using jQuery UI
  			$(this).draggable({
  				zIndex: 999,
  				revert: true,      // will cause the event to go back to its
  				revertDuration: 0  //  original position after the drag
  			});

  		});


  		/* initialize the calendar
  		-----------------------------------------------------------------*/

  		var calendar =  $('#calendar').fullCalendar({
  			header: {
  				left: 'title',
  				center: 'agendaDay,agendaWeek,month',
  				right: 'prev,next today'
  			},
  			editable: true,
  			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
  			selectable: true,
  			defaultView: 'month',

  			axisFormat: 'h:mm',
  			columnFormat: {
                  month: 'ddd',    // Mon
                  week: 'ddd d', // Mon 7
                  day: 'dddd M/d',  // Monday 9/7
                  agendaDay: 'dddd d'
              },
              titleFormat: {
                  month: 'MMMM yyyy', // September 2009
                  week: "MMMM yyyy", // September 2009
                  day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
              },
  			allDaySlot: false,
  			selectHelper: true,
  			select: function(start, end, allDay) {
  				var title = prompt('Event Title:');
  				if (title) {
  					calendar.fullCalendar('renderEvent',
  						{
  							title: title,
  							start: start,
  							end: end,
  							allDay: allDay
  						},
  						true // make the event "stick"
  					);
  				}
  				calendar.fullCalendar('unselect');
  			},
  			droppable: true, // this allows things to be dropped onto the calendar !!!
  			drop: function(date, allDay) { // this function is called when something is dropped

  				// retrieve the dropped element's stored Event Object
  				var originalEventObject = $(this).data('eventObject');

  				// we need to copy it, so that multiple events don't have a reference to the same object
  				var copiedEventObject = $.extend({}, originalEventObject);

  				// assign it the date that was reported
  				copiedEventObject.start = date;
  				copiedEventObject.allDay = allDay;

  				// render the event on the calendar
  				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
  				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

  				// is the "remove after drop" checkbox checked?
  				if ($('#drop-remove').is(':checked')) {
  					// if so, remove the element from the "Draggable Events" list
  					$(this).remove();
  				}

  			},

  			events: [
  				{
  					title: 'All Day Event',
  					start: new Date(y, m, 1)
  				},
  				{
  					id: 999,
  					title: 'Repeating Event',
  					start: new Date(y, m, d-3, 16, 0),
  					allDay: false,
  					className: 'info'
  				},
  				{
  					id: 999,
  					title: 'Repeating Event',
  					start: new Date(y, m, d+4, 16, 0),
  					allDay: false,
  					className: 'info'
  				},
  				{
  					title: 'Meeting',
  					start: new Date(y, m, d, 10, 30),
  					allDay: false,
  					className: 'important'
  				},
  				{
  					title: 'Lunch',
  					start: new Date(y, m, d, 12, 0),
  					end: new Date(y, m, d, 14, 0),
  					allDay: false,
  					className: 'important'
  				},
  				{
  					title: 'Birthday Party',
  					start: new Date(y, m, d+1, 19, 0),
  					end: new Date(y, m, d+1, 22, 30),
  					allDay: false,
  				},
  				{
  					title: 'Click for Google',
  					start: new Date(y, m, 28),
  					end: new Date(y, m, 29),
  					url: 'http://google.com/',
  					className: 'success'
  				}
  			],
  		});


  	});

  </script>
  <style>


  	#external-events {
  		float: left;
  		width: 150px;
  		padding: 0 10px;
  		text-align: left;
  		}

  	#external-events h4 {
  		font-size: 16px;
  		margin-top: 0;
  		padding-top: 1em;
  		}

  	.external-event { /* try to mimick the look of a real event */
  		margin: 10px 0;
  		padding: 2px 4px;
  		background: #3366CC;
  		color: #fff;
  		font-size: .85em;
  		cursor: pointer;
  		}

  	#external-events p {
  		margin: 1.5em 0;
  		font-size: 11px;
  		color: #666;
  		}

  	#external-events p input {
  		margin: 0;
  		vertical-align: middle;
  		}

  	#calendar {
  /* 		float: right; */
          margin: 0 auto;
  		width: 900px;
  		background-color: #FFFFFF;
  		  border-radius: 6px;
          box-shadow: 0 1px 2px #C3C3C3;
  		}

  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Scanorama</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Actions
      </div>


      <!-- Nav Item - scan -->
      <li class="nav-item">
        <a class="nav-link" href="uploadPDF.php">
          <i class="fas fa-fw fa-camera"></i>
          <span>Scan Documents</span></a>
      </li>

      <!-- Nav Item - scan -->
      <li class="nav-item">
        <a class="nav-link" href="view.php">
          <i class="fas fa-fw fa-eye"></i>
          <span>View Documents</span></a>
      </li>

      <!-- Nav Item - scan -->
      <li class="nav-item">
        <a class="nav-link" href="users.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Manage users</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - scan -->
      <li class="nav-item">
        <a class="nav-link" href="transcript.php">
          <i class="fas fa-fw fa-microphone"></i>
          <span>Transcript Dictation</span></a>
      </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Card -->
          <div class="row">

            <!-- Left hand side -->
            <div class="col-sm-12">

                  <div class="container-fluid">

                  <div id='calendar'></div>

                  <div style='clear:both'></div>
                  </div>
                </div>



        </div>
        <!-- /.container-fluid -->

      </div></div></div></div>

      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>



</body>

</html>
