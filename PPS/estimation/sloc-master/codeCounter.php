<!DOCTYPE html>
<html>
<body>



<?php
echo "This output is by using exec()";

exec('node index.js', $out);
var_dump($out);




?> 

</body>
</html>