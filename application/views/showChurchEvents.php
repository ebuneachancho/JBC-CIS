<?php $this->load->view('partial/header');?>

<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Show Church Events</li>
        </ol>

    </div>
    <!-- /.container-fluid -->

    <div class="coontainer" style="margin: 0% 5%">
    <?php if (isset($event_success_added)): ?>
      <div class="alert alert-success" style="margin-top: 10px">
          <?php echo $event_success_added;?>
          <button class="close" data-target="alert" data-dismiss="alert">x</button>
      </div>
    <?php endif ?>
      <div class="col-xs-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Events</button>
      </div>
      <div class="col-xs-10" id="calendar">
        <div>
        </div>
      </div>
    </div>


</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">Add Calendar Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      <?php echo form_open(site_url("event_calendar/add_event"), array("class" => "form-horizontal")) ?>
      <div class="form-group">
                <label for="p-in" class="col-sm-4 label-heading"><strong>Event Name</strong></label>
                <div class="sm-8 ui-front">
                    <input type="text" class="form-control" name="name" value="">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-sm-4 label-heading"><strong>Description</strong></label>
                <div class="sm-8 ui-front">
                    <input type="text" class="form-control" name="description">
                </div>
        </div>
        <div class="form-group date" data-provide="datepicker">
                <label for="p-in" class="col-sm-4 label-heading"><strong>Start Date</strong></label>
                <div class="md-8">
                    <input type="text" class="form-control" name="start_date">
                    
                </div>
        </div>
        <div class="form-group date" data-provide="datepicker">
                <label for="p-in" class="col-sm-4 label-heading"><strong>End Date</strong></label>
                <div class="md-3">
                    <input type="text" class="form-control datepicker" name="end_date">
                     
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Add Event">
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
<!-- // ============== END MODAL FOR ADDING EVENTS TO THE CALENDAR ================ -->

<!-- ========== MODAL FOR EDITING AN EVENT IN THE CALENDAR ============== -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Update Calendar Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>   
      </div>
      <div class="modal-body">
      <?php echo form_open(site_url("event_calendar/edit_event"), array("class" => "form-horizontal")) ?>
      <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Event Name</label>
                <div class="col-md-8 ui-front">
                    <input type="text" class="form-control" name="name" value="" id="name">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Description</label>
                <div class="col-md-8 ui-front">
                    <input type="text" class="form-control" name="description" id="description">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Start Date</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="start_date" id="start_date">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">End Date</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="end_date" id="end_date">
                </div>
        </div>
        <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading">Delete Event</label>
                    <div class="col-md-8">
                        <input type="checkbox" name="delete" value="1">
                    </div>
            </div>
            <input type="hidden" name="eventid" id="event_id" value="0" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Update Event">
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
<!-- // ====== END OF MODAL FOR EDITING AN EVENT ======== -->

<script type="text/javascript">
$(document).ready(function() {
  var date_last_clicked = null;
    $('#calendar').fullCalendar({
      eventSources: [
    {
        events: function(start, end, timezone, callback) {
            $.ajax({
                url: '<?php echo base_url() ?>index.php/event_calendar/get_events',
                dataType: 'json',
                data: {                
                    start: start.unix(),
                    end: end.unix()
                },
                success: function(msg) {
                    var events = msg.events;
                    callback(events);
                }
            });
       }
    },
    ],
    dayClick: function(date, jsEvent, view) {
        date_last_clicked = $(this);
        $(this).css('background-color', '#bed7f3');
        $('#addModal').modal();
    },
    eventClick: function(event, jsEvent, view) {
          $('#name').val(event.title);
          $('#description').val(event.description);
          $('#start_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
          if(event.end) {
            $('#end_date').val(moment(event.end).format('YYYY/MM/DD HH:mm'));
          } else {
            $('#end_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
          }
          $('#event_id').val(event.id);
          $('#editModal').modal();
    },
    });
});
</script>

<?php $this->load->view('partial/footer');?>