<?php
class NavigationController extends Controller
{
    public function FindPage($navigation_variable_name)
    {
        $navigation = filter_input(
                INPUT_GET,
                "$navigation_variable_name",
                FILTER_SANITIZE_STRING);
        $path = ROOT_DIR . $navigation . "_page.php";
        if (file_exists($path))
        {
            return $path;
        }
        else
        {
            die ("Данной страницы не существует: " . $path);
        }
    }
}
?>

