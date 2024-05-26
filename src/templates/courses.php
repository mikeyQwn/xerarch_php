<h1>Список курсов</h1>
<?php 
echo '<ul>';
foreach ($courses as $id => $course_info) {
    echo '<li>';
    printf('<a href="/course.php?id=%s">%s</a><br>', $course_info['id'], $course_info['name']);
    printf('<p>%s</p>', $course_info['description']);
    echo '</li>';
}
echo '</ul>';
?>
