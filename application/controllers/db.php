<?php

// load xml file
$newsitems = simplexml_load_file("www.politie.nl/rss/algemeen/nb/alle-nieuwsberichten.xml");


foreach ($newsitems->channel->item as $item) {
  //  echo $course['cat_num'];
    echo $item->title;
  //  echo $course->department['code'];
  //  echo $course->department->dept_short_name;
  //  echo $course->faculty_list->faculty['id'];
}
?> 


