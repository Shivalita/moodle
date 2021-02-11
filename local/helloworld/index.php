<?php
require(__DIR__. '/../../config.php');
require_once('./simplehtml_form.php');

// $PAGE->set_url(new moodle_url('/local/helloworld/', ['username' => $username]));
$PAGE->set_url(new moodle_url('/local/helloworld'));
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

// $username = optional_param('username', null, PARAM_USERNAME);
$PAGE->set_title(get_string('pluginname', 'local_helloworld'));
$PAGE->set_heading(get_string('pluginname', 'local_helloworld'));

echo $OUTPUT->header();

//Instantiate simplehtml_form 
$mform = new simplehtml_form();
  
//Form processing and displaying is done here
if ($mform->is_cancelled()) {
    //Handle form cancel operation, if cancel button is present on form
} else if ($fromform = $mform->get_data()) {
  //In this case you process validated data. $mform->get_data() returns data posted in form.
    
    // echo "<h1>".get_string('hello', 'local_helloworld')." ".$username."!</h1>";
    
    // $siteFrontPage = new moodle_url('/');
    // $helloMainPage = new moodle_url('/local/helloworld');
    // echo '<a href="' . $siteFrontPage . '">'.get_string('gotofrontpage', 'local_helloworld').'</a><br />';
    // echo '<a href="' . $helloMainPage . '">'.get_string('gotomainhello', 'local_helloworld').'</a><br />';
    
    $currentDatetime = new DateTime();
    $createdDate = $currentDatetime->getTimestamp();

    $data = $mform->get_data();
    $data->timecreated = $createdDate;

    $DB->insert_record('local_helloworld_messages', $data, $returnid=true, $bulk=false);

  } else {
    // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
    // or on the first display of the form.
    
    //Set default data (if any)
  //   $mform->set_data($toform);
    //displays the form
    $mform->display();
  }
  
echo ('COUCOU');
$DB->get_records('local_helloworld_messages', $sort='', $fields='*', $limitfrom=0, $limitnum=0);

echo $OUTPUT->footer();