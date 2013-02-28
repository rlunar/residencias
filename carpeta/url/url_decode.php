<?php

$raw_url = "http%3A%2F%2Fcloudfront-secure.vidcaster.com%2Fsites%2F182%2Fvideos%2F2463%2Fh264%2F1280x720.mp4%3FExpires%3D1361984571%26Signature%3DrbnghJGjCOr5ZQB9LYueGKkI2N1jzOLdtq-hNz5Sjd6jF59e0zOQmGg8pU3GYP-3C0R4xLS7Du6p6rAEyMoJwWG~F9VSkbcXSIUxuEw0CRZ8WrOLtvCJ8ylAC1zGGn2LJvhwSaIXunL6lnazvPblcMG4mgW1EZ5EVV3Q1XdFat4_%26Key-Pair-Id%3DAPKAJOFE2BBHFF55HRGA&";

$decoded_url = rawurldecode($raw_url);

echo "<a href='".$decoded_url."'>Kayako</a>";

?>