<?php 
foreach ($courses as $id => $course_info) {
    printf('<a href="/course.php?id=%s">%s</a><br>', $course_info['id'], $course_info['name']);
    printf('<p>%s</p>', $course_info['description']);
}
?>
