<?php
require(__DIR__. '/../../config.php');
require_once('./simplehtml_form.php');

// $PAGE->set_url(new moodle_url('/local/helloworld/', ['username' => $username]));
$PAGE->set_url(new moodle_url('/local/helloworld'));
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

$username = optional_param('username', null, PARAM_USERNAME);
$PAGE->set_title(get_string('pluginname', 'local_helloworld'));
$PAGE->set_heading(get_string('pluginname', 'local_helloworld'));

echo $OUTPUT->header();


// if($username == null || !is_string($username)) {
    // echo "<h1>Hello world!</h1>";
    // echo "<h1>".get_string('pluginname', 'local_helloworld')."</h1>";

    //Instantiate simplehtml_form 
    $mform = new simplehtml_form();
     
    //Form processing and displaying is done here
    if ($mform->is_cancelled()) {
        //Handle form cancel operation, if cancel button is present on form
    } else if ($fromform = $mform->get_data()) {
      //In this case you process validated data. $mform->get_data() returns data posted in form.
        $username = required_param('username', PARAM_USERNAME);
        
        // $nexturl = new moodle_url('/local/helloworld/', ['username' => $username]);
        echo "<h1>".get_string('hello', 'local_helloworld')." ".$username."!</h1>";
        
        $siteFrontPage = new moodle_url('/');
        $helloMainPage = new moodle_url('/local/helloworld');
        echo '<a href="' . $siteFrontPage . '">'.get_string('gotofrontpage', 'local_helloworld').'</a><br />';
        echo '<a href="' . $helloMainPage . '">'.get_string('gotomainhello', 'local_helloworld').'</a><br />';

        $PAGE->set_url(new moodle_url($PAGE->url, ['username' => $username]));
        $PAGE->set_heading(get_string('hello', 'local_helloworld', $username));

        

        // $nexturl = new moodle_url($PAGE->url, ['username' => $username]);
        // redirect($nexturl);
    } else {
      // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
      // or on the first display of the form.
     
      //Set default data (if any)
    //   $mform->set_data($toform);
      //displays the form

      // echo "<h1>Hello world!</h1>";

      $mform->display();
    }

    // echo '</form>';
// } else {

    // echo "<h1>".get_string('hello', 'local_helloworld')." ".$username."!</h1>";

    // $siteFrontPage = new moodle_url('/');
    // $helloMainPage = new moodle_url('/local/helloworld/');

    // echo '<a href="' . $siteFrontPage . '">'.get_string('gotofrontpage', 'local_helloworld').'</a><br />';
    // echo '<a href="' . $helloMainPage . '">'.get_string('gotomainhello', 'local_helloworld').'</a><br />';

// }
echo $OUTPUT->footer();