#!/bin/bash

working_dir="/home/dh_qi7i23/viviofthevoid.com/wp-content/themes"
theme="vivi-of-the-void"
host="dreamhost"

rsync -v "../$theme.zip" "$host:/$working_dir/"

ssh $host /bin/bash << EOF
	cd "${working_dir}"
	mv $theme "${theme}.bak"
	unzip "${theme}.zip"
	find $theme -type d -exec chmod 755 {} +
	find $theme -type f -exec chmod 644 {} +
	rm "${theme}.zip"
EOF
