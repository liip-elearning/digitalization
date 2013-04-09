<?php
 
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
 
/**
 * @package    moodlecore
 * @subpackage backup-moodle2
 * @copyright  2011 Patrick Meyer, Tobias Niedl
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


/**
 * Define the complete digitalization structure for backup, with file and id annotations
 */     
class backup_digitalization_activity_structure_step extends backup_activity_structure_step {

    protected function define_structure() {

        // To know if we are including userinfo
        $userinfo = $this->get_setting_value('userinfo');
 

        // Define each element separated
        // (Note: Params of the class constructor: name, array-of-attributes, array-of-child-elements)
        $digitalization = new backup_nested_element('digitalization', array('id'), array(
            'user', 'name', 'timecreated', 'timemodified', 'status', 'sign', 'isbn', 'issn', 'author', 
            'atitle', 'title', 'volume', 'issue', 'pub_date', 'pages', 'dig_comment')); 

        // Build the tree
        // (not used here)

        // Define sources
        $digitalization->set_source_table('digitalization', array('id' => backup::VAR_ACTIVITYID));
   
 
        // Define id annotations
        // (not used here)
 
        // Define file annotations
        // (not used here)

        // Return the root element (choice), wrapped into standard activity structure
        return $this->prepare_activity_structure($digitalization);

 
    }
}

