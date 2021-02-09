<?php
//moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");

class simplehtml_form extends moodleform {
    // public $username = optional_param('username', null, PARAM_USERNAME);
    //Add elements to form
    public function definition() {
        global $CFG;
 
        $mform = $this->_form; // Don't forget the underscore! 

        // echo get_string('whatisyourname', 'local_helloworld')."</br>";

        // echo '<form method="get" action="/local/helloworld/', ['username' => $username].'">';

        // echo html_writer::tag('input', '', [
        //     'type' => 'text',
        //     'name' => 'username',
        //     'placeholder' => get_string('enterusername'),
        // ]); 
        
        // html_writer::div(content, class="d-inline p-2 bg-primary text-white", attributes="");

        $mform->addElement('text', 'username', get_string('whatisyourname', 'local_helloworld')); // Add elements to your form
        $mform->setType('username', PARAM_USERNAME);                   //Set type of element
        // $mform->setDefault('username', get_string('enterusername'));        //Default value
        $this->add_action_buttons($cancel = false, $submitlabel=get_string('submit'));
    }
    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}