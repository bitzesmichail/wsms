<?php
	echo "This is the user controller index";
	if (!empty($data)) {
		if (is_array($data)) {
			foreach ($data as &$value) {
				echo "<br>" . $value->username . " " . $value->password . " " . $value->email;
			}
		}
		else {
			echo "<br>" . $data->username . " " . $data->password . " " . $data->email;
		}
	}
?>