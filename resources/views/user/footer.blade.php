<!-- jQuery, Bootstrap, DataTables Scripts -->
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/toaster.min.js')}}"></script>
<script src="{{asset('/js/common.min.js')}}"></script>

<?php
if (isset($footer['js'])) {
    for ($i = 0; $i < count($footer['js']); $i++) {
        if (strpos($footer['js'][$i], "https://") !== FALSE || strpos($footer['js'][$i], "http://") !== FALSE)
            echo '<script src="' . $footer['js'][$i] . '"></script>';
        else
            echo '<script src="' . asset($footer['js'][$i]) . '"></script>';
    }
}
?>

<script>
    
</script>
</body>

</html>